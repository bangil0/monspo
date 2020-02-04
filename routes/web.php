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

Route::get('/', function () {
    return view('depan');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pegawai/provinsi/sync/{kodeprov}', 'PegawaiController@syncProvinsi')->name('pegprovinsi.sync');
Route::get('/pegawai/kabkota/sync/{kodekabkota}', 'PegawaiController@syncKabkota')->name('pegkabkota.sync');
Route::get('/pegawai/list','PegawaiController@index')->name('pegawai.list');
