<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PelacakanController;
use App\Http\Controllers\FnQsController;
use App\Http\Controllers\PanduanLayananController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\DropzoneController;

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/flyer', [HomeController::class, 'flyer']);

Route::match(['get', 'post'], '/search', [PencarianController::class, 'index']);

Route::get('/pendaftaran_online', [PendaftaranController::class, 'index']);
Route::post('/checking_data_existing', [PendaftaranController::class, 'checking_data_existing']);
Route::post('/get_wilayah', [PendaftaranController::class, 'get_wilayah']);
Route::post('/submit_pendaftaran', [PendaftaranController::class, 'submit_pendaftaran']);
Route::get('/send_email_verification', [PendaftaranController::class, 'send_email']);
Route::match(['get', 'post'], '/verifikasi_pendaftaran', [PendaftaranController::class, 'verifikasi_pendaftaran']);




Route::get('/pelacakan', [PelacakanController::class, 'index']);
Route::get('/detail_fnq', [FnQsController::class, 'index']);
Route::get('/panduan_layanan', [PanduanLayananController::class, 'index']);

 /** General Controller for dropzone **/
 Route::post('/projects/media-one', [DropzoneController::class, 'storeMediaOne']);
 Route::post('/projects/media/delete', [DropzoneController::class, 'deleteMedia']);


