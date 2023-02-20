
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenabungController;
use App\Http\Controllers\uangkeluarController;
use App\Http\Controllers\uangmasukController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LaporanController;
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

Route::get('/', function () {
    return view('login');
});


//Beranda
Route::get('/welcome', [WelcomeController::class, 'welcome'])->name('welcome')->middleware('auth');

//login
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Penabung
Route::get('/datapenabung', [PenabungController::class, 'datapenabung'])->name('datapenabung');
Route::get('/tambahpenabung', [PenabungController::class, 'tambahpenabung'])->name('tambahpenabung');
Route::post('/insertpenabung', [PenabungController::class, 'insertpenabung'])->name('insertpenabung');
Route::get('/editpenabung/{id}', [PenabungController::class, 'editpenabung'])->name('editpenabung');
Route::post('/updatepenabung/{id}', [PenabungController::class, 'updatepenabung'])->name('updatepenabung');
Route::get('/hapuspenabung/{id}', [PenabungController::class, 'hapuspenabung'])->name('hapuspenabung');

//uangkeluar
Route::get('/uangkeluar', [uangkeluarcontroller::class, 'uangkeluar'])->name('uangkeluar');
Route::get('/tambahuangkeluar', [uangkeluarcontroller::class, 'tambahuangkeluar'])->name('tambahuangkeluar');
Route::post('/insertuangkeluar', [uangkeluarcontroller::class, 'insertuangkeluar'])->name('insertuangkeluar');
Route::get('/edituangkeluar/{id}', [uangkeluarcontroller::class, 'edituangkeluar'])->name('edituangkeluar');
Route::post('/updateuangkeluar/{id}', [uangkeluarcontroller::class, 'updateuangkeluar'])->name('updateuangkeluar');
Route::get('/hapusuangkeluar/{id}', [uangkeluarcontroller::class, 'hapusuangkeluar'])->name('hapusuangkeluar');


//uangmasuk
Route::get('/uangmasuk', [uangmasukcontroller::class, 'uangmasuk'])->name('uangmasuk');
Route::get('/tambahuangmasuk', [uangmasukcontroller::class, 'tambahuangmasuk'])->name('tambahuangmasuk');
Route::post('/insertuangmasuk', [uangmasukcontroller::class, 'insertuangmasuk'])->name('insertuangmasuk');
Route::get('/edituangmasuk/{id}', [uangmasukcontroller::class, 'edituangmasuk'])->name('edituangmasuk');
Route::post('/updateuangmasuk/{id}', [uangmasukcontroller::class, 'updateuangmasuk'])->name('updateuangmasuk');
Route::get('/hapusuangmasuk/{id}', [uangmasukcontroller::class, 'hapusuangmasuk'])->name('hapusuangmasuk');


//Histori
Route::get('/histori', [HistoriController::class, 'histori'])->name('histori');


//Laporan
Route::get('/laporanmasuk', [LaporanController::class, 'laporanmasuk'])->name('laporanmasuk');
Route::post('/laporanmasuk', [LaporanController::class, 'searchmasuk'])->name('laporanmasuk');
Route::get('/laporankeluar', [LaporanController::class, 'laporankeluar'])->name('laporankeluar');
Route::post('/laporankeluar', [LaporanController::class, 'searchkeluar'])->name('laporankeluar');
// Route::get('/hapuspenabung', [PenabungController::class, 'hapuspenabung'])->name('hapuspenabung');


//PDF
Route::get('/masukpdf', [LaporanController::class, 'masukpdf'])->name('masukpdf');
Route::get('/keluarpdf', [LaporanController::class, 'keluarpdf'])->name('keluarpdf');
