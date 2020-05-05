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
    if(auth()->user() == true){
        return redirect('home');
    }
    return view('welcome');
});

// mis rutas
// RUTAS DE PERFIL
Route::get('/perfil', 'UserController@index')->name('perfil')->middleware('auth');
Route::get('/perfil/{id}', 'UserController@show')->name('perfilid')->middleware('auth');
Route::put('perfil/edit/{id}', 'UserController@update')->middleware('auth');
Route::get('perfil/{id}/seguidores', 'UserController@getFollowers')->middleware('auth');
Route::get('perfil/{id}/seguidos', 'UserController@getFollows')->middleware('auth');
Route::get('perfil/{id}/dibujos', 'UserController@showDraws')->middleware('auth');
Route::get('perfil/{id}/follow', 'FollowController@create')->middleware('auth');
Route::get('perfil/{id}/unfollow', 'FollowController@destroy')->middleware('auth');

// RUTAS DE DIBUJO
Route::get('/dibujo/libre', 'DrawController@freeDraw')->name('freedraw')->middleware('auth');
Route::get('/dibujo/{id}', 'DrawController@show')->name('drawid')->middleware('auth');
Route::get('/dibujo', 'DrawController@index')->name('drawid')->middleware('auth');
Route::post('/dibujo/crear', 'DrawController@store')->name('drawcreate')->middleware('auth');
Route::get('/dibujo/{id}/editar', 'DrawController@edit')->name('drawedit')->middleware('auth');
Route::put('/dibujo/{id}/update', 'DrawController@update')->name('draweupdate')->middleware('auth');
Route::put('/dibujo/{id}/borrar', 'DrawController@destroy')->name('drawedestroy')->middleware('auth');


// RUTAS DE VOTOS
Route::get('/vote/like/{id}', 'VoteController@like')->name('like')->middleware('auth');
Route::get('/vote/dislike/{id}', 'VoteController@dislike')->name('dislike')->middleware('auth');

// RUTAS DE COMENTARIOS
Route::post('/comentario/{id}/post', 'CommentController@store')->name('commentcreate')->middleware('auth');
Route::get('/comentario/{id}/delete', 'CommentController@destroy')->name('commentdelete')->middleware('auth');
Route::get('/comentario/like/{id}', 'CommentController@like')->name('commentlike')->middleware('auth');
Route::put('/comentario/dislike/{id}', 'CommentController@dislike')->name('commentdislike')->middleware('auth');

// RUTAS DE Home
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

