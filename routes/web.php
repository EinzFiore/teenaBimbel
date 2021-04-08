<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'UsersController@formRegister')->name('home');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

// Route Form Daftar User
Route::resource('users', UsersController::class);
Route::get('/user/registrasiBimbel', 'UsersController@formRegister')->name('formRegister');

// Route Paket
Route::resource('paket', PaketController::class);
Route::get('/getPaket/{id}', 'PaketController@getPaketFromKelas');

// Route Kelas
Route::resource('/kelas', KelasController::class);
Route::get('/getKelas/{id}', 'KelasController@getKelasFromJenjang');

// Route Registrasi
Route::resource('registrasi', RegistrasiController::class);
Route::post('registrasi/cetak/{id}', 'RegistrasiController@cetakKartu')->name('cetakPDF');
Route::get('/export', 'RegistrasiController@export')->name('export');
// Route::get('/tes/{id}', 'RegistrasiController@tes');

// Route Transaksi
Route::resource('transaksi', TransaksiController::class);

// Route Jenjang
Route::resource('jenjang', JenjangController::class);
Route::post('jenjang/kelas/{id}', 'JenjangController@listKelas')->name('jenjang.kelas');