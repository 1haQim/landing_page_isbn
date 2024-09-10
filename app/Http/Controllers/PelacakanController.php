<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelacakanController extends Controller
{
    function index() {
        return view('content.pelacakan');
    }

    function serverside_pelacakan(Request $request) {
        if ($request->isMethod('post')) {

            $resi = $request->input('resi');

            $query = "";
            if ($resi) {
                $query = "SELECT
                    PT.NORESI,
                    PT.TITLE,
                    PT.KEPENG,
                    PT.TEMPAT_TERBIT,
                    PT.TAHUN_TERBIT,
                    PT.MOHON_DATE,
                    PT.STATUS,
                    P.NAME AS NAMA_PENERBIT,
                    PT.JILID_VOLUME
                FROM
                    PENERBIT_TERBITAN PT
                    JOIN PENERBIT P ON PT.PENERBIT_ID = P.ID 
                WHERE
                    PT.NORESI = '".$resi."'";
            }

            //fetch api
            $data = kurl('get','getlistraw', null, $query, 'sql');
            $responseData = $data['Data'];

            return $responseData;
        }
    }
}
