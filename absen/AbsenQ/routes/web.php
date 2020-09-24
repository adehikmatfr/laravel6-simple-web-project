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

Route::get('/','dashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth'); 
// admin group
Route::group(['middleware'=>['auth','RoleCek']],function(){
// dashboard
Route::get('/jurusan','JurusanController@index');
Route::get('/kelas','KelasController@index');
Route::get('/jabatan','JabatanController@index');
Route::get('/admin/user','LevUserController@index');
Route::get('/admin/report','ReportController@index');
Route::get('/admin/report/ownload','ReportController@down')->name('excel');
Route::get('/admin/user','UserController@index');

//insert
Route::post('/jurusan','JurusanController@store');
Route::post('/jabatan','JabatanController@store');
Route::post('/kelas','KelasController@store');
Route::post('user/reg','UserController@store');

//update
Route::put('/jurusan/edit/{id}','JurusanController@update')->name('jurusan.edit');
Route::put('/jabatan/edit/{id}','JabatanController@update')->name('jabatan.edit');
Route::put('/kelas/edit/{id}','KelasController@update')->name('kelas.edit');
Route::put('/user/edit/{id}','UserController@update')->name('user.edit');

// delete
Route::get('/jurusan/{jurusan}/delete','JurusanController@destroy');
Route::get('/jabatan/{jabatan}/delete','JabatanController@destroy');
Route::get('/kelas/{kelas}/delete','KelasController@destroy');
Route::get('/user/{user}/delete','UserController@destroy')->name('user.hapus');;
//edit link form
Route::get('/jurusan/{jurusan}/edit','JurusanController@show');
Route::get('/jabatan/{jabatan}/edit','JabatanController@show');
Route::get('/kelas/{kelas}/edit','KelasController@show');

// walikelas 
Route::get('guru/walikelas','WaliKelasController@index')->name('wali');
Route::put('guru/walikelas/{id}','WaliKelasController@update')->name('wali.edit');
Route::post('guru/walikelas','WaliKelasController@store')->name('wali.ins');
Route::get('guru/walikelas/hapus/{id}','WaliKelasController@destroy')->name('wali.hapus');

//kaprog
Route::get('guru/kaprog','KaprogController@index')->name('kaprog');
Route::post('guru/kaprog','KaprogController@store')->name('kaprog.ins');
Route::put('guru/kaprog/{id}','KaprogController@update')->name('kaprog.edit');
Route::get('guru/Kaprog/hapus/{id}','KaprogController@destroy')->name('kaprog.hapus');
//level user
Route::get('/level/{id}','UserController@level');

});

// siswa
Route::get('siswa/absen','AbsenController@index')->middleware('auth');
Route::post('siswa/absen/reg','AbsenController@store')->middleware('auth');


Route::get('/home/cari','HomeController@cari')->name('cari')->middleware('auth');

// profile user
Route::get('user/profile','UserController@profile')->name('profile')->middleware('auth');
Route::put('user/profile/{id}','UserController@edit')->name('profile.edit')->middleware('auth');

// absen 
Route::post('siswa/absen','AbsenController@absen')->name('absen')->middleware('auth');
Route::get('absen/siswa/{id}','AbsenController@absis')->name('absis')->middleware('auth');
