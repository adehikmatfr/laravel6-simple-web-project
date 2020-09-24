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

//all user
Route::get('/', 'HomeController@index')->name('home');
//All User
Route::get('/home','IndexController@index')->middleware('auth');
//admin Role
Route::get('/company','CompanyController@index')->middleware('admin:admin');
Route::get('/profile','UsersController@profile')->name('use.prof')->middleware('auth');
Route::post('/profile/update','UsersController@create')->name('upt.us')->middleware('auth');
// Route::get('/chagePassword','UsersController@editPassword')->name('use.pass')->middleware('auth');
// Route::post('/chagePassword/chng','UsersController@store')->name('add.pass')->middleware('auth');

Route::group(['middleware'=>['auth','Adger']],function(){
//admin and manager
Route::get('/client','ClientController@index');
//admin and manager
Route::get('/reklame','ReklameController@index');
//admin and manager
Route::get('/transaction','TransactionController@index');
//admin manager
Route::get('/report','ReportController@index');
//admin and manager
Route::get('/bilboard','ReklameController@index');
Route::get('/maps','ReklameController@maps');

// Route::get('/company/edit/{id}','CompanyController@show')->name('editon');

// route client  << Admin Role Manager
Route::post('/client','ClientController@store')->name('add.client');
Route::get('/client/{id}','ClientController@destroy')->name('del.client');
Route::get('/client/reset/{id}','ClientController@clean')->name('cln.client');
Route::get('/client/edit/{id}','ClientController@edit')->name('edit.client');
Route::put('/client/update/{id}','ClientController@update')->name('upt.client');
// route bilboard <<Admin Role
Route::post('/bilboard','ReklameController@store')->name('add.bil');
Route::get('/bilboard/detail','ReklameController@detail')->name('det.bil');
Route::get('/bilboard/{id}','ReklameController@destroy')->name('del.bil');
Route::get('/bilboard/reset/{id}','ReklameController@clean')->name('cln.bil');
Route::get('/bilboard/edit/{id}','ReklameController@edit')->name('edit.bil');
Route::put('/bilboard/update/{id}','ReklameController@update')->name('upt.bil');
Route::get('/bilboard/Nonaktive/{id}','ReklameController@nonaktive')->name('non.bil');
Route::get('/bilboard/Aktive/{id}','ReklameController@aktive')->name('akt.bil');

// transksi <<Admin Role Manager
Route::post('/transaction','TransactionController@store')->name('add.trans');
Route::get('/transaction/detail','TransactionController@detail')->name('det.trans');
Route::get('/transaction/{id}','TransactionController@destroy')->name('del.trans');
Route::get('/transaction/edit/{id}','TransactionController@edit')->name('edit.trans');
Route::put('/transaction/update/{id}','TransactionController@update')->name('upt.trans');

});
//ALL USER

// data table client
Route::get('/getclient','ClientController@DataTable')->name('data.client')->middleware('auth');
Route::get('/getbil','ReklameController@DataTable')->name('data.bil')->middleware('auth');
Route::get('/gettrans','TransactionController@DataTable')->name('data.trans')->middleware('auth');
Route::get('/getusers','UsersController@DataTable')->name('data.users')->middleware('auth');
Route::get('/expaired','TransactionController@expaired')->name('exp.trans')->middleware('auth');


// select2 transaction
Route::get('/getclint/select2','ClientController@Select2')->name('select.clint')->middleware('auth');
Route::get('/getbil/select2','ReklameController@Select2')->name('select.bil')->middleware('auth');
// ajax
Route::get('/getclint/img','ClientController@Ajax')->name('ajax.clint')->middleware('auth');
Route::get('/getbil/img','ReklameController@Ajax')->name('ajax.bil')->middleware('auth');


// route company  << Admin Role
Route::post('/company','CompanyController@store')->name('add.company')->middleware('admin:admin');
Route::put('/company/edit/{id}','CompanyController@update')->name('upt.company')->middleware('admin:admin');

//Superadmin Role
Route::get('/users','UsersController@index')->name('use.index')->middleware('admin:SuperAdmin');
Route::get('/users/admin/{id}','UsersController@edit')->name('use.adm')->middleware('admin:SuperAdmin');
Route::get('/users/manager/{id}','UsersController@manager')->name('use.mng')->middleware('admin:SuperAdmin');
Route::get('/users/{id}','UsersController@destroy')->name('use.del')->middleware('admin:SuperAdmin');


