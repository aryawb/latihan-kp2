<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\DataPegawaiController;
// use App\Http\Controllers\ImageUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);

// Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('dashboard/{id}', [DashboardController::class, 'index'])->name('dashboard');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::post('/save', [ DashboardController::class, 'imageUploadPost' ]);
// Route::get('dashboard',[DashboardController::class,'viewdata']);
Route::get('pegawai/ubah/{id}', [DashboardController::class, 'ubahpegawai']);
Route::post('pegawai/update', [DashboardController::class, 'updatepegawai'])->name('updatepegawai')->middleware('auth');
Route::post('download-qr-code/{type}', [DashboardController::class, 'downloadQRCode'])->name('qrcode.download');

Route::get('/post/view/{created_by}', [DashboardController::class, 'viewImage'])->name('post');
Route::get('/post/view/{created_by}#{id}', [DashboardController::class, 'viewImage'])->name('postupdate');
Route::get('post/ubah/{idpost}', [DashboardController::class, 'ubahpost']);
Route::post('post/update/{idpost}', [DashboardController::class, 'updatepost'])->name('updatepost')->middleware('auth');
Route::delete("delete/{idpost}", [DashboardController::class, "deletepost"])->name("delete");
Route::post("deleteprofile/{id}", [DashboardController::class, "deleteprofile"])->name("deleteprofile");
Route::post("deletesampul/{id}", [DashboardController::class, "deletesampul"])->name("deletesampul");
