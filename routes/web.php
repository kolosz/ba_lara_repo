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

Route::get('/admin_base', function () {
    return view('admin_base');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
//Route::get('/home', 'HomeController@getName');

// Route::get('/admin_base', 'HomeController@index')->name('admin_base');
