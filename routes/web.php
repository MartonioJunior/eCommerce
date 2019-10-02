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
Route::redirect('/login','/login/client');

Route::view('/','welcome');
Route::view('/product','product.show');
Route::view('/cart','cart.show');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:client'], function() {
	Route::get('/client/profile','ClientController@profile')->name('client');
	Route::post('/purchase', function() {});
});

Route::group(['middleware' => 'auth:admin'], function() {
	Route::view('/admin/profile','admin.profile')->name('admin');
});

Route::group(['middleware' => 'guest'], function() {
	Route::get('/login/client','Auth\LoginController@clientLoginForm');
	Route::get('/login/admin','Auth\LoginController@adminLoginForm');
	Route::get('/signup/client','Auth\RegisterController@clientRegisterForm');
	Route::get('/signup/admin','Auth\RegisterController@adminRegisterForm');

	Route::post('/login/client', 'Auth\LoginController@clientLogin')->name('clientLogin');
	Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('adminLogin');
	Route::post('/signup/client', 'Auth\RegisterController@registerClient')->name('clientSignup');
	Route::post('/signup/admin', 'Auth\RegisterController@registerAdmin')->name('adminSignup');
});
