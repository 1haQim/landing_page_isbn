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

use App\Http\Controllers\StatistikController;



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
//isbn info
Route::get('/isbn_info', [HomeController::class, 'isbn_info']);
//pencarian home
Route::get('/search', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/serverside_search', [PencarianController::class, 'search'])->name('pencarian.search');
//bip
Route::get('bip', [BIPsController::class, 'index'])->name('bip.index');
Route::get('serverside_bip', [BIPsController::class, 'serverside_bip'])->name('bip.serverside_bip');
//surat
Route::get('surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('serverside_surat', [SuratController::class, 'serverside_surat'])->name('surat.serverside_surat');
//berita
Route::get('berita', [BeritaController::class, 'index'])->name('berita');

Route::get('/pendaftaran_online', [PendaftaranController::class, 'index']);
Route::get('/jenis_penerbit', [PendaftaranController::class, 'jenis_penerbit']);
Route::post('/checking_data_existing', [PendaftaranController::class, 'checking_data_existing']);
Route::post('/get_wilayah', [PendaftaranController::class, 'get_wilayah']);
Route::post('/submit_pendaftaran', [PendaftaranController::class, 'submit_pendaftaran']);
Route::get('/send_email_verification', [PendaftaranController::class, 'send_email']);
Route::match(['get', 'post'], '/verifikasi_pendaftaran', [PendaftaranController::class, 'verifikasi_pendaftaran']);
Route::get('/timeOtp', [PendaftaranController::class, 'timeOtp']);

Route::get('/prosedur', [ProsedurController::class, 'index']);

Route::get('/statistik', [StatistikController::class, 'index']);
Route::get('/kota_terbitan_terbanyak', [StatistikController::class, 'kota_terbitan_terbanyak']);
Route::get('/kota_penerbit_terbanyak', [StatistikController::class, 'kota_penerbit_terbanyak']);
Route::match(['get', 'post'],'/isbn_periode', [StatistikController::class, 'isbn_periode']);



Route::get('/pelacakan', [PelacakanController::class, 'index']);
Route::POST('/request_pelacakan', [PelacakanController::class, 'serverside_pelacakan'])->name('tracking.resi');


Route::get('/detail_fnq', [FnQsController::class, 'index']);
Route::get('/panduan_layanan', [PanduanLayananController::class, 'index']);

 /** General Controller for dropzone **/
 Route::post('/projects/media-one', [DropzoneController::class, 'storeMediaOne']);
 Route::post('/projects/media/delete', [DropzoneController::class, 'deleteMedia']);


