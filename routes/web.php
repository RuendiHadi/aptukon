<?php

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
Route::get('/redirect',"LoginRegister\LoginController@redirect");

Route::get('/callback',"LoginRegister\LoginController@callback");

Route::get('/',"LoginRegister\LoginController@index");

Route::get('/register',"LoginRegister\RegisterController@index");

Route::post('/regis/mhs',"LoginRegister\RegisterController@register");

Route::get('/koor/home',"KoorController@index");

Route::post('/auth/login',"LoginRegister\LoginController@login");

Route::get('/auth/logout',"LoginRegister\LoginController@logout");

Route::get('/mahasiswa/home',"MahasiswaController@index");

Route::get('/dosen/home',"DosenController@index");

Route::get('/koor/daftar/mahasiswa',"KoorController@daftar_mhs");

Route::post('/update/mhs/profile/aksi/{id}',"MahasiswaController@update_profile_aksi");

Route::get('/update/mhs/profile/{id}',"MahasiswaController@update_profile");

Route::get('/mahasiswa/pengajuan/konsultasi/{id}',"MahasiswaController@data_konsultasi");

Route::get('/mahasiswa/pengajuan/konsultasi/tambah/{id}',"MahasiswaController@konsultasi_tambah");

Route::post('/mahasiswa/pengajuan/konsultasi/tambah/aksi',"MahasiswaController@konsultasi_tambah_aksi");

Route::get('/mahasiswa/pengajuan/konsultasi/ubah/{id}',"MahasiswaController@konsultasi_ubah");

Route::post('/mahasiswa/pengajuan/konsultasi/ubah/aksi/{id}',"MahasiswaController@konsultasi_ubah_aksi");