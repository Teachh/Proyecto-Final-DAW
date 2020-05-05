<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Añadir api
// rutas sin aut
Route::resource('draw', 'APIDrawController',['only' => ['index', 'show']]);
Route::resource('follow', 'APIFollowController',['only' => ['index', 'show']]);
Route::resource('user', 'APIUserController',['only' => ['index', 'show']]);
Route::resource('vote', 'APIVoteController',['only' => ['index', 'show']]);
Route::resource('comment', 'APICommentController',['only' => ['index', 'show']]);
// rutas con aut
Route::resource('draw', 'APIDrawController',['except' => ['index', 'show']])->middleware('auth.basic.once');
Route::resource('follow', 'APIFollowController',['except' => ['index', 'show']])->middleware('auth.basic.once');
Route::resource('user', 'APIUserController',['except' => ['index', 'show']])->middleware('auth.basic.once');
Route::resource('vote', 'APIVoteController',['except' => ['index', 'show']])->middleware('auth.basic.once');
Route::resource('comment', 'APICommentController',['except' => ['index', 'show']])->middleware('auth.basic.once');
