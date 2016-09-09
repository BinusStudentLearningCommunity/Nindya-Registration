<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/', array('as' => 'registrasi.index', 'uses' => 'RegistrasiController@index' ));
Route::post('/success/', array('as' => 'registrasi.success', 'uses' => 'RegistrasiController@success' ));
Route::get('/successTest/', array('as' => 'registrasi.successTest', 'uses' => 'RegistrasiController@successTest' ));
Route::get('/download-modul-bslc', array('as' => 'registrasi.download', 'uses' => 'RegistrasiController@download'));

Route::get('/admin/', array('as' => 'Login.index', 'uses' => 'LoginController@index' ));
Route::post('/admin/verif', array('as' => 'Login.verif', 'uses' => 'LoginController@verif' ));

Route::group(array('before' => 'auth'), function(){
    Route::get('/pendaftar', array('as' => 'Pendaftar.index', 'uses' => 'PendaftarController@index'));
    Route::get('/pendaftar/export', array('uses' => 'PendaftarController@export', 'as' => 'pendaftar.users.export'));
    Route::get('/pendaftar/wordexport', array('uses' => 'PendaftarController@wordexport', 'as' => 'pendaftar.users.wordexport'));
    Route::get('/pendaftar/update/{id}', array('as' => 'Pendaftar.update', 'uses' => 'PendaftarController@update' ));
    Route::post('/pendaftar/edit/{id}', array('as' => 'Pendaftar.edit', 'uses' => 'PendaftarController@edit' ));
    Route::get('/pendaftar/delete/{id}', array('as' => 'Pendaftar.delete', 'uses' => 'PendaftarController@hapus' ));
    Route::get('/filedownload/', array('as' => 'filedownload.index', 'uses' => 'filedownload@index' ));
});
	
Route::controller('user', 'UsersController');

Route::controller('interview', 'InterviewController');