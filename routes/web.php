<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BIPsController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\BeritaController;

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PelacakanController;
use App\Http\Controllers\FnQsController;
use App\Http\Controllers\PanduanLayananController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\DropzoneController;

use App\Http\Controllers\ProsedurController;


Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
//flyer pengumuman
Route::post('/flyer', [HomeController::class, 'flyer']);
//bip
Route::get('bip', [BIPsController::class, 'index'])->name('bip.index');
Route::get('serverside_bip', [BIPsController::class, 'serverside_bip'])->name('bip.serverside_bip');
//surat
Route::get('surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('serverside_surat', [SuratController::class, 'serverside_surat'])->name('surat.serverside_surat');
//berita
Route::get('berita', [BeritaController::class, 'index'])->name('berita');

Route::match(['get', 'post'], '/search', [PencarianController::class, 'index']);

Route::get('/pendaftaran_online', [PendaftaranController::class, 'index']);
Route::post('/checking_data_existing', [PendaftaranController::class, 'checking_data_existing']);
Route::post('/get_wilayah', [PendaftaranController::class, 'get_wilayah']);
Route::post('/submit_pendaftaran', [PendaftaranController::class, 'submit_pendaftaran']);
Route::get('/send_email_verification', [PendaftaranController::class, 'send_email']);
Route::match(['get', 'post'], '/verifikasi_pendaftaran', [PendaftaranController::class, 'verifikasi_pendaftaran']);


Route::get('/prosedur', [ProsedurController::class, 'index']);





Route::get('/pelacakan', [PelacakanController::class, 'index']);
Route::get('/detail_fnq', [FnQsController::class, 'index']);
Route::get('/panduan_layanan', [PanduanLayananController::class, 'index']);

 /** General Controller for dropzone **/
 Route::post('/projects/media-one', [DropzoneController::class, 'storeMediaOne']);
 Route::post('/projects/media/delete', [DropzoneController::class, 'deleteMedia']);


