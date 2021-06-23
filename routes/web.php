<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::post('/login', 'App\Http\Controllers\LoginController@varify');

Route::get('/logout', 'App\Http\Controllers\LogOutController@index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');

Route::get('/registration', 'App\Http\Controllers\RegistrationController@index');
Route::post('/registration', 'App\Http\Controllers\RegistrationController@register');

Route::get('system/sales', 'App\Http\Controllers\SalesController@index');

Route::get('system/sales/physical_store', 'App\Http\Controllers\SalesController@physical_store');
Route::get('system/sales/social_media', 'App\Http\Controllers\SalesController@social_media');
Route::get('system/sales/ecommerce', 'App\Http\Controllers\SalesController@ecommerce');