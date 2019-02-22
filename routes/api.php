<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('transacciones', 'TransationsController');

Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::resource('users','UsersController')->only([
      'index', 'show', 'store', 'update', 'destroy'
  ]);
});


Route::middleware(['auth', 'role:aliado'])->group(function () {
  Route::resource('users','UsersController')->only([
      'index', 'show'
  ]);
});

Route::middleware(['auth', 'role:user'])->group(function () {
  Route::resource('users','UsersController')->only([
      'index', 'show'
  ]);

});
Route::resource('mount','ColPesosController')->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::get('user/showWithWallet', 'UsersController@showWithWallet');
