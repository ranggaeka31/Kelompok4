
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenabungController;
use App\Http\Controllers\HistoriController;
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

Route::get('/welcome', function () {
    return view('welcome');
});


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
Route::get('/editpenabung', [PenabungController::class, 'editpenabung'])->name('editpenabung');
Route::post('/updatepenabung', [PenabungController::class, 'updatepenabung'])->name('updatepenabung');
Route::get('/hapuspenabung', [PenabungController::class, 'hapuspenabung'])->name('hapuspenabung');

//Histori
Route::get('/histori', [HistoriController::class, 'histori'])->name('histori');
Route::get('/tambahpenabung', [PenabungController::class, 'tambahpenabung'])->name('tambahpenabung');
Route::post('/insertpenabung', [PenabungController::class, 'insertpenabung'])->name('insertpenabung');
Route::get('/editpenabung', [PenabungController::class, 'editpenabung'])->name('editpenabung');
Route::post('/updatepenabung', [PenabungController::class, 'updatepenabung'])->name('updatepenabung');
Route::get('/hapuspenabung', [PenabungController::class, 'hapuspenabung'])->name('hapuspenabung');
