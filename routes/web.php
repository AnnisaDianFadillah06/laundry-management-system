<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('halaman.halaman_signIn');
});
//Route SignIn SignUp
Route::get('/signIn', 'AuthController@signIn')->name('signIn');
Route::get('/signUp', 'AuthController@signUp')->name('signUp');
Route::post('/loginPost', 'AuthController@loginPost')->name('loginPost');
Route::post('/registerPost', 'AuthController@registerPost')->name('registerPost');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
Route::get('/profile', 'AuthController@profile')->name('profile');
Route::post('/postProfile', 'AuthController@postprofile')->name('postProfile');

// Route Modul Master
Route::get('/dataOutlet', 'OutletController@index')->name('dataOutlet');
Route::get('/dataPaket', 'PaketController@index')->name('dataPaket');
    //Route Menu Data Outlet
    Route::post('/postDataOutlet', 'OutletController@post')->name('postDataOutlet');
    Route::post('/hapusDataOutlet', 'OutletController@destroy')->name('hapusDataOutlet');
    //Route Menu Data Paket
    Route::post('/postDataPaket', 'PaketController@post')->name('postDataPaket');
    Route::post('/hapusDataPaket', 'PaketController@destroy')->name('hapusDataPaket');

// Route Modul Transaksi
Route::get('/registrasiPelanggan', 'RegisPelangganController@index')->name('registrasiPelanggan');
Route::get('/dataPelanggan', 'PelangganController@index')->name('dataPelanggan');
Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');
Route::post('/postTransaksiRegis', 'TransaksiController@post')->name('postTransaksiRegis');
    //Route Menu Data Pelanggan
    Route::post('/postDataPelanggan', 'RegisPelangganController@post')->name('postDataPelanggan');
    Route::post('/hapusDataPelanggan', 'PelangganController@destroy')->name('hapusDataPelanggan');
    //Route Menu Transaksi
    Route::get('/inputTransaksi/{member}', 'TransaksiController@input')->name('inputTransaksi');
    Route::post('/postTransaksi/{member}', 'TransaksiController@postinput')->name('postTransaksi');
    Route::post('/statusTransaksi', 'TransaksiController@statusTransaksi')->name('statusTransaksi');
    Route::get('/cetak/{id_transaksi}', 'TransaksiController@postinput')->name('cetakTransaksi');
    Route::delete('/deleteTransaksi{id_transaksi}', 'TransaksiController@destroy')->name('deleteTransaksi');

// Route Modul Pengaturan
Route::get('/dataPengguna', 'PenggunaController@index')->name('dataPengguna');
    //Route Menu Pengaturan
    Route::post('/postDataPengguna', 'PenggunaController@post')->name('postDataPengguna');
    Route::post('/hapusDataPengguna', 'PenggunaController@destroy')->name('hapusDataPengguna');

// Route Modul Laporan
Route::get('/laporanTransaksi', 'LaporanTransaksiController@index')->name('laporanTransaksi');
    //Route Menu Pengaturan
    Route::get('/cetak-transaksi-pertanggal/{tglawal}/{tglakhir}', 'LaporanTransaksiController@cetakTransaksi')->name('cetak-transaksi-pertanggal');
