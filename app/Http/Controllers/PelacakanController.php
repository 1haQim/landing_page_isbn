<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelacakanController extends Controller
{
    function index() {
        return view('content.pelacakan');
    }
}
