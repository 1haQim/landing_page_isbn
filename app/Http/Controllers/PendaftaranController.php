<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use \Illuminate\Http\UploadedFile;

class PendaftaranController extends Controller
{
    function index() {

        return view('content.pendaftaran_online');
    }

    //check username
    function checking_data_existing(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->input('username')) {
                $col = 'ISBN_USER_NAME';
                $value = $request->input('username');
            } else if($request->input('admin_email')) {
                $col = 'EMAIL1';
                $value = $request->input('admin_email');
            } else {
                $col = 'EMAIL2';
                $value = $request->input('alternatif_email');
            }

            $filter = [["name"=>$col,"Value"=>$value,"SearchType"=>"Tepat"]];
            $data = kurl('get','getlist', 'PENERBIT', $filter);
            return json_encode($data['Data']['Items']);
        } else {
            return errorResponse();
        }
    }
    //data select 2 wilayah 
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
            $data = kurl('get','getlist', $tbl, $filter);
            return json_encode($data['Data']['Items']);
        } else {
            return errorResponse();
        }
    }

    //send file register
    function upload_file($file, $penerbit_id, $ip) {
        $gagal = [];
        //surat pernyataan
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
        //file akta notaris
        $filePath_two = public_path('img_tmp_upload/'.$file['file_akte']);
        if (File::exists($filePath_one)) {
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
            'status' => 0,
            // 'status' => $sts,
            'message' => $mess
        ];

        return $data;

    }

    //form data
    function submit_pendaftaran(Request $request) {
        if ($request->isMethod('post')) {
            $ip = $request->ip();
            $file = [
                'file_pernyataan' => $request->input('file_surat_pernyataan'),
                'file_akte' => $request->input('file_akte_notaris')
            ];

            dd($request->input());
            
            $call_func = $this->upload_file($file, 3, $ip);

            //jika gagal maka akan dihapus 
            if ($call_func['status'] < 1 ) {
                $this->rollback_pendaftaran(3);
            }

            // $data = kurl('get','getlist', $tbl, $filter);

            dd($call_func);
        }
    }

    function rollback_pendaftaran($penerbit_id) {
        dd($penerbit_id);
        
    }
}
