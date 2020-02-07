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
Auth::routes();

Route::get('/', function () {
    // Only authenticated users may enter...
    return view('depan');
})->middleware('auth');

/*
Route::get('/', function () {
    return view('depan');
});
*/
Route::group(['middleware' => ['auth']], function () {
//Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/pegawai/provinsi/sync/{kodeprov}', 'PegawaiController@syncProvinsi')->name('pegprovinsi.sync');
    Route::get('/pegawai/kabkota/sync/{kodekabkota}', 'PegawaiController@syncKabkota')->name('pegkabkota.sync');
    Route::get('/pegawai/list','PegawaiController@index')->name('pegawai.list');
    Route::get('/pegawai/bps/{kodebps}','PegawaiController@PegApi')->name('pegawai.bps');
    Route::get('/tim/list','TimController@index')->name('tim.list');
    Route::post('/tim/simpan','TimController@simpan')->name('tim.simpan');
    Route::post('/tim/simpanmap','TimController@TimMapping')->name('tim.simpanmap');
    Route::post('/tim/simpanopd','TimController@TimMapOPD')->name('tim.simpanopd');
    Route::get('/opd/list','OpdController@index')->name('opd.list');
    Route::post('/opd/simpan','OpdController@simpan')->name('opd.simpan');
    Route::post('/opd/update','OpdController@updatedata')->name('opd.update');
    Route::post('/opd/hapus','OpdController@hapus')->name('opd.hapus');
    Route::get('/opd/tim/{kodebps}','OpdController@OpdApi')->name('opd.api');
});
//Route::get('logout', 'Auth\LoginController@logout');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
