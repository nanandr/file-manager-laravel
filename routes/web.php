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

Route::get('login', 'LoginController@index')->name('login');
Route::post('login/validating', 'LoginController@validating')->name('checklogin');

Route::middleware('auth')->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'LoginController@logout')->name('logout');

});
