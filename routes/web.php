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

Route::get('/', 'LoginController@authenticated');
Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'LoginController@register')->name('register');
Route::post('login/validating', 'LoginController@logValidate')->name('checklogin');
Route::post('register/validating', 'LoginController@regValidate')->name('checkregister');

Route::middleware('auth')->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('folder/{route}', 'HomeController@inFolder');
    Route::get('file/{id}', 'HomeController@viewFile');
    Route::get('folder', 'LoginController@authenticated');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::post('create/folder', 'FolderController@create');
    Route::put('create/folder/{id}', 'FolderController@createInFolder');
    Route::put('edit/folder/{id}', 'FolderController@edit');
    Route::get('delete/folder/{id}', 'FolderController@delete');

    Route::post('create/file', 'FileController@create');
    Route::put('create/file/{id}', 'FileController@createInFolder');
    Route::put('edit/file/{id}', 'FileController@edit');
    Route::get('delete/file/{id}', 'FileController@delete');
});
