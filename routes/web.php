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
    return view('form.home');
});

Route::get('/identity', function () {
    return view('form.dashboard');
});
//hapus satu data saja
Route::get('identity/delete/{id}', 'FormIdentityController@destroy')->name('delete');
//hapus beberapa data
Route::post('identity/delete_data', 'FormIdentityController@deleteSelected')->name('delete.selected');
//pencarian data
Route::get('identity/cari', 'FormIdentityController@Cari');
//null foto
Route::get('identity/foto', 'FormIdentityController@NullFoto')->name('foto.null');

Route::resource('identity', 'FormIdentityController');

// //nama ab
// Route::get('identity/nama', 'FormIdentityController@NamaAb')->name('nama.ab');
// //umur 20
// Route::get('identity/umur', 'FormIdentityController@Umur')->name('umur');
// //kecamatan cengkareng
// Route::get('identity/kcmtn/cgk', 'FormIdentityController@KcmtnCgk')->name('kcmtn.cgk');
// //kecamatan kedoya
// Route::get('identity/kcmtn/kdy', 'FormIdentityController@KcmtnKdy')->name('kcmtn.kdy');
// //kecamatan neglasari
// Route::get('identity/kcmtn/ngl', 'FormIdentityController@KcmtnNgl')->name('kcmtn.ngl');
// //kecamatan priuk
// Route::get('identity/kcmtn/prk', 'FormIdentityController@KcmtnPrk')->name('kcmtn.prk');
// //kecamatan pulogadung
// Route::get('identity/kcmtn/pgl', 'FormIdentityController@KcmtnPgl')->name('kcmtn.plg');

