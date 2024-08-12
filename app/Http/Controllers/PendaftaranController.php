<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use \Illuminate\Http\UploadedFile;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PendaftaranController extends Controller
{
    function index() {

        return view('content.pendaftaran_online');
    }

    private function generateOTP($length = 6) {
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9);
        }
        return $otp;
    }

    //check username
    function checking_data_existing(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->input('username')) {
                $col = 'USER_NAME';
                $value = $request->input('username');
            } else if($request->input('admin_email')) {
                $col = 'ADMIN_EMAIL';
                $value = $request->input('admin_email');
            } else {
                $col = 'ALTERNATE_EMAIL';
                $value = $request->input('alternatif_email');
            }

            $filter = [["name"=>$col,"Value"=>$value,"SearchType"=>"Tepat"]];
            $data = kurl('get','getlist', 'ISBN_REGISTRASI_PENERBIT', $filter, 'KriteriaFilter');
            return json_encode($data['Data']['Items']);
        } else {
            return errorResponse();
        }
    }
    //data select2 wilayah 
    function get_wilayah(Request $request) {
        if ($request->isMethod('post')) {
            //validasi berdasarakan ...
            if ($request->input('kab_kot')) {
                $tbl = 'KABUPATEN';
                $col = 'propinsiid';
                $value = $request->input('kab_kot');
            }else if($request->input('kec')) {
                $tbl = 'KECAMATAN';
                $col = 'KABUPATENID';
                $value = $request->input('kec');
            } else if($request->input('kel')){
                $tbl = 'KELURAHAN';
                $col = 'KECAMATANID';
                $value = $request->input('kel');
            } else {
                $tbl = 'PROPINSI';
                $col = '';
                $value = '';
            }

            $filter = [["name"=>$col,"Value"=>$value,"SearchType"=>"Tepat"]];
            $data = kurl('get','getlist', $tbl, $filter, 'KriteriaFilter');
            return json_encode($data['Data']['Items']);
        } else {
            return errorResponse();
        }
    }

    //send file register
    function upload_file($file, $penerbit_id, $ip) {
        $gagal = [];
        //surat pernyataan
        if ($file['file_pernyataan']) {
            $filePath_one = public_path('img_tmp_upload/'.$file['file_pernyataan']);
            if (File::exists($filePath_one)) {
                $file_one = new UploadedFile(
                    $filePath_one,
                    $file['file_pernyataan'],
                    File::mimeType($filePath_one),
                    null,
                    true
                );
                $post_pernyataan = kurl_upload('post', 'uploadfilesuratpernyataan', $penerbit_id, $file_one, $ip);
                $res_pernyataan = $post_pernyataan;
                //res status
                $gagal['pernyataan'] = $res_pernyataan['Status'] == "Success" ? 0 : 1;
            }
        }
        //file akta notaris
        if ($file['file_akte']) {
            $filePath_two = public_path('img_tmp_upload/'.$file['file_akte']);
            if (File::exists($filePath_two)) {
                $file_one = new UploadedFile(
                    $filePath_two,
                    $file['file_akte'],
                    File::mimeType($filePath_two),
                    null,
                    true
                );
                $post_akte_notaris = kurl_upload('post', 'uploadfileaktenotaris', $penerbit_id, $file_one, $ip);
                $res_akte = $post_akte_notaris;
                //res status
                $gagal['akte']  = $res_akte['Status'] == "Success" ? 0 : 1;
            }
        }

        $mess = '';
        $sts = '';
        foreach ($gagal as $k => $v) {
            if ($v > 0) {
                $sts = 0;
                $mess = 'gagal upload '. $k;
                break; 
            } else {
                $sts = 1;
                $mess = 'sukses upload semua files';
            }
        }
        $data = [
            // 'status' => 0, // keperluan debug untuk file yang gagal upload
            'status' => $sts,
            'message' => $mess
        ];
        return $data;
    }

    //form data
    function submit_pendaftaran(Request $request) {
        if ($request->isMethod('post')) {
            $ip = $request->ip();
            $file = [
                'file_pernyataan' => $request->input('file_surat_pernyataan') ?? null,
                'file_akte' => $request->input('file_akte_notaris') ?? null
            ];
            //generate OTP
            $otp = $this->generateOTP();

            //encript password
            $encryptedPassword = $this->rijndaelEncryptPassword($request->input('password2'));
            $request->merge([
                'password' => md5($request->input('password')),
                'password2' => $encryptedPassword, //rijndael
                'code_otp' => $otp, //rijndael
                'kd_penerbit' => $request->input('user_name')
            ]);

            $send_data = [];
            foreach ($request->input() as $k => $v) {
                if ($k != 'acceptTerms') { //unset array acceptTerms
                    $send_data[] = [
                        'name' => $k,
                        'Value' => $v,
                    ];
                }
            };
            // dd($send_data);
            
            $data = kurl('post','add', 'ISBN_REGISTRASI_PENERBIT', $send_data, 'ListAddItem');

            if (!empty($data['Data'])) {
                $id = $data['Data']['ID'];
                $call_func = $this->upload_file($file, $id, $ip);
                //jika upload doc gagal maka akan rollback (hapus data)
                if ($call_func['status'] == 0 ) {
                    $hapus_data = $this->rollback_pendaftaran($id);
                    $sts_ket = 'error';
                    $ket = 'gagal upload file';
                    //masukkan kedalam log untuk kegunaan tracking data
                }

                $data_send_otp = [
                    'email_admin' => $request->input('admin_email'),
                    'username'    => $request->input('user_name'),
                    'kode_otp'    => $otp
                ];

                $res_otp = $this->send_email($data_send_otp);
                if ($res_otp) {
                    //return json berhasil
                    $sts_ket = 'success';
                    $ket = 'berhasil pendaftaran silahkan check email anda untuk verifikasi';
                } else {
                    $sts_ket = 'error';
                    $ket = 'Gagal mengirim email klik kirim ulang kode OTP';
                }

                $res_data = [
                    'status' => $sts_ket,
                    'message' => $ket
                ];

                return $res_data;
            }
        }
    }

    function rollback_pendaftaran($penerbit_id) {
        $data = kurl('post','delete', 'ISBN_REGISTRASI_PENERBIT', $penerbit_id , null);
        return $data['Status'];
    }

    //send email verifikasi
    function send_email($res_data) {
        if (filter_var($res_data['email_admin'], FILTER_VALIDATE_EMAIL)) {
            Mail::to($res_data['email_admin'])->send(new SendMail($res_data));
            return 'success';
        }
    }

    function verifikasi_pendaftaran(Request $request) {

        if ($request->isMethod('post')) {
            $tbl = 'ISBN_REGISTRASI_PENERBIT';
            if ($request->input('tipe') == 'generate') {
                $otp = $this->generateOTP();

                 $data_send_otp = [
                    'email_admin' => $request->input('admin_email'),
                    'username'    => $request->input('username'),
                    'kode_otp'    => $otp
                ];
                $this->send_email($data_send_otp);

            } else {
                $filter = [["name"=>"admin_email","Value"=>$request->input('admin_email'), "SearchType"=>"Tepat"]];
                $data = kurl('get','getlist', $tbl, $filter, 'KriteriaFilter');

                dd($data);
                // if ($data['Data']) {
                    
                // }

            }
        }

        return view('content.verifikasi_pendaftaran');
    }

    function rijndaelEncryptPassword($password)
    {
        // Key Size: Ensure the key is 32 bytes long for AES-256.
        // IV Size: Ensure the IV is 16 bytes long for AES-256-CBC

        $key = 'isbn_2021$'; 
        $cipher = 'aes-256-cbc';
        $iv = random_bytes(16);

        $encrypted = openssl_encrypt($password, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        // Combine IV and encrypted data for storage
        return base64_encode($iv . $encrypted);
    }

}
