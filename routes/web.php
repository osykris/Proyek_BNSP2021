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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/home/arsip/add', 'App\Http\Controllers\HomeController@indexAdd');
Route::post('home/arsip/save', 'App\Http\Controllers\HomeController@add');
Route::get('home/arsip/edit/{id}', 'App\Http\Controllers\HomeController@indexEdit');
Route::post('home/arsip/edit/{id}', 'App\Http\Controllers\HomeController@save');
Route::delete('home/arsip/{id}', 'App\Http\Controllers\HomeController@delete');
Route::get('cari', 'App\Http\Controllers\HomeController@cari');
Route::get('about', 'App\Http\Controllers\AboutController@index');
Route::post('about', 'App\Http\Controllers\AboutController@update');
Route::get('home/lihat/{id}', 'App\Http\Controllers\HomeController@lihat');
Route::get('home/unduh/{id}', 'App\Http\Controllers\HomeController@unduh');