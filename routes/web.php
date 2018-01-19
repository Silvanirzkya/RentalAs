<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/barangs/lab', 'BarangsController@lab');
Route::get('/admin/barangs/bengkel', 'BarangsController@bengkel');


Route::group(['middleware' => 'web'], function () {
Route::group(['prefix'=>'admin','middleware'=>['auth']], function () {
	//Route diisi disini ...
	Route::resource('barangs','BarangsController');
	Route::resource('barangslab','BarangsLabController');
	Route::resource(' ','BarangsBengkelController');
});

Route::group(['prefix'=>'lab','middleware'=>['auth']], function () {
	//Route diisi disini ...
	
	Route::resource('barangslab','BarangsLabController');

});

Route::group(['prefix'=>'bengkel','middleware'=>['auth']], function () {
	//Route diisi disini ...

	Route::resource('barangsbengkel','BarangsBengkelController');
});

Route::get('/', 'GuestController@index');
});



