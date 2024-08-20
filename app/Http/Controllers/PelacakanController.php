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
                $query = "SELECT pi.no_resi, pi.status, pi.createby, pi.createdate, p.name FROM penerbit_isbn pi  JOIN penerbit p ON pi.penerbit_id = p.id WHERE pi.no_resi = '".$resi."'";
            }

            //fetch api
            $data = kurl('get','getlistraw', null, $query, 'sql');
            $responseData = $data['Data'];

            return $responseData;
        }
    }
}
