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

// mis rutas
// RUTAS DE PERFIL
Route::get('/perfil', 'UserController@index')->name('perfil')->middleware('auth');
Route::get('/perfil/{id}', 'UserController@show')->name('perfilid')->middleware('auth');
Route::put('perfil/edit/{id}', 'UserController@update')->middleware('auth');
Route::get('perfil/{id}/seguidores', 'UserController@getFollowers')->middleware('auth');
Route::get('perfil/{id}/dibujos', 'UserController@showDraws')->middleware('auth');
Route::get('perfil/{id}/follow', 'FollowController@create')->middleware('auth');
Route::get('perfil/{id}/unfollow', 'FollowController@destroy')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
