<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('content.home');
    }

    //ambil data untuk popup modal home first load
    function flyer(Request $request)  {
        if ($request->isMethod('post')) {
            $filter = [["name"=>"VISIBLE","Value"=>"1","SearchType"=>"Tepat"]];
            $data = kurl('get','getlist', 'ISBN_MST_FLYER', $filter, 'KriteriaFilter');
            return json_encode($data['Data']['Items'][0]['DESCRIPTION']);
        } else {
            return errorResponse();
        }
    }

}
