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