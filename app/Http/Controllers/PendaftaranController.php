<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    function index() {

        return view('content.pendaftaran_online');
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
            $data = kurl('get','getlist', 'ISBN_REGISTRASI_PENERBIT', $filter);
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
}
