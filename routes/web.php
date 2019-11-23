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

Route::get('/', 'ProductController@productsInStock');
Route::get('/product','ProductController@allProducts');
Route::get('/cart','PurchaseController@cartProducts');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:client'], function() {
	Route::get('/client/profile','ClientController@profile')->name('client');
	Route::get('/client/delete','ClientController@delete');
	Route::post('/client/edit','ClientController@update');
	Route::post('/purchase', function() {});

	Route::get('/purchase/{id}/add/{amount}', 'PurchaseController@add');
	Route::get('/purchase/{id}/delete','PurchaseController@delete');
	Route::get('/purchase/save','PurchaseController@save');
});

Route::group(['middleware' => 'auth:admin'], function() {
	Route::get('/admin/profile','AdminController@profile')->name('admin');
	Route::get('/admin/delete','AdminController@delete');
	Route::post('admin/update','AdminController@update');

	Route::get('/product/{id}/delete','ProductController@delete');
	Route::post('/product/{id}/save','ProductController@save');

	Route::get('/category/{id}/delete','CategoryController@delete');
	Route::post('/category/{id}/save','CategoryController@save');

	Route::get('image/upload/{name}','ImageController@upload');
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
