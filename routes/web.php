<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/daftar', function () {
    return view('daftar');
});
Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/barang', function () {
    return view('barang');
});
Route::get('/tambahbarang', function () {
    return view('tambah_barang');
});
Route::get('/editbarang', function () {
    return view('edit_barang');
});
Route::get('/buku', function () {
    return view('buku.index');
});
Route::get('/md5', function () {
    return view('md5-generator');
});
