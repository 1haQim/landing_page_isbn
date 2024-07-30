<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FnQsController extends Controller
{
    function index() {
        return view('content.fnq');
    }
}
