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

    function isbn_info() {
        $menu = [
            'Pengertian ISBN','Fungsi ISBN','Struktur ISBN','Terbitan yang dapat diberikam','Terbitan yang tidak dapat diberikan','Pencantuman ISBN','Anggota Baru','Anggota Lama'
        ];
        return view('content.isbn_info', compact('menu'));
    }

}


