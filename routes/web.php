<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PelacakanController;
use App\Http\Controllers\FnQsController;
use App\Http\Controllers\PanduanLayananController;

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/pendaftaran_online', [PendaftaranController::class, 'index']);
Route::get('/pelacakan', [PelacakanController::class, 'index']);
Route::get('/detail_fnq', [FnQsController::class, 'index']);
Route::get('/panduan_layanan', [PanduanLayananController::class, 'index']);

