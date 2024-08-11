<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    function index(Request $request) {

        if ($request->isMethod('post')) {

            $filter = '';
            if (!empty($request->input('keyword'))) {
                 $filter = '';
            }

            $data = kurl('GET','getlist', 'ISBN_DATA', $filter, 'KriteriaFilter'); 
            return $data;
        }

        return view('content.pencarian');
    }
}
