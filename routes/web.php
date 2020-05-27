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

/*
Route::get('/denied', function () {
    return view('denied');
});
*/

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
});


Auth::routes();


Route::group(['middleware'=> ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::post('/home', 'HomeController@findAction')->name('home.find');
    Route::get('/denied', 'HomeController@permissionDenied')->name('home.permissionDenied');
    // admin rights handled inside of the controller __construct
    Route::get('/admin_base', 'AdminController@index')->name('admin_base');
    Route::get('/manager', 'SuperUserController@index')->name('manager');
    // routes for rights management ->should not be hardcoded; better implementation would be dynamic for every role
    Route::get('/admin_base/remove-admin/{userId}', 'AdminController@removeAdmin');
    Route::get('/admin_base/give-admin/{userId}', 'AdminController@giveAdmin');
});




//Route::get('/home', 'HomeController@index')->name('home.index');
//Route::get('/denied', 'HomeController@permissionDenied')->name('home.permissionDenied');
//Route::post('/home', 'HomeController@findAction')->name('home.find');
//Route::get('/admin_base', 'AdminController@index')->name('admin_base');
//Route::get('/manager', 'SuperUserController@index')->name('manager');
