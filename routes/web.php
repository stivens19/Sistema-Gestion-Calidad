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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::resource('process', 'ProcesoController');
Route::resource('typedocument', 'TypedocumentController');
Route::resource('document','DocumentController');

Route::resource('procedures','ProcedureController');
Route::resource('registers','RegistersController');
Route::post('asociar', 'UserController@asociar')->name('usuario.asociar');