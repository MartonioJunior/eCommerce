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

Route::view('/','welcome');
Route::view('/product','product.show');
Route::view('/cart','cart.show');
Route::view('/client/profile','client.profile');
Route::view('/admin/profile','admin.profile');
Route::view('/auth/login','auth.login');
Route::view('/auth/signup','auth.signup');