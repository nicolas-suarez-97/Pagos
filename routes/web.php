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
//Redireccion al home
Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes();
//Entrada al home
Route::get('/home', 'HomeController@index')->name('home');
//Entrada get para recibr las transacciones
Route::get('/recibir', 'HomeController@recibir')->name('recibir');
//Entrada get para enviar trnasacciones
Route::get('/enviar', 'HomeController@enviar')->name('enviar');
//Entrada para el perfil
Route::get('/perfil', 'HomeController@perfil')->name('perfil');
