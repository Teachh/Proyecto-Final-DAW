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

// RUTAS XML
Route::get('/xml/usuarios', function () {
    // XML
    $users = App\User::all();

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('usuarios');
    foreach($users as $user) {
        $xml->startElement('usuario');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('name', $user->name);
        $xml->writeAttribute('email', $user->email);
        $xml->writeAttribute('biography', $user->biography);
        $xml->writeAttribute('rol', $user->rol);
        $xml->writeAttribute('profile_picture', $user->profile_picture);
        $xml->writeAttribute('background', $user->background);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});
Route::get('/xml/votos', function () {
    $users = App\Vote::all();

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('votos');
    foreach($users as $user) {
        $xml->startElement('voto');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('draw_id', $user->draw_id);
        $xml->writeAttribute('vote', $user->vote);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});
Route::get('/xml/comentarios', function () {
    $users = App\Comment::all();

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('comentarios');
    foreach($users as $user) {
        $xml->startElement('comentario');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('draw_id', $user->draw_id);
        $xml->writeAttribute('text', $user->text);
        $xml->writeAttribute('like', $user->like);
        $xml->writeAttribute('dislike', $user->dislike);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});
Route::get('/xml/dibujos', function () {
    // XML
    $users = App\Draw::all();

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('dibujos');
    foreach($users as $user) {
        $xml->startElement('dibujo');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('title', $user->title);
        $xml->writeAttribute('description', $user->description);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('draw', $user->draw);
        $xml->writeAttribute('image', $user->image);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});
Route::get('/xml/seguidores', function () {
    // XML
    $users = App\Follow::all();

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('seguidores');
    foreach($users as $user) {
        $xml->startElement('seguidor');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('user_id_request', $user->user_id_request);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});
Route::get('/xml/todo', function () {
    // XML
    $followers = App\Follow::all();
    $users = App\User::all();
    $votes = App\Vote::all();
    $comments = App\Comment::all();
    $users = App\Draw::all();

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('todo');
    $xml->startElement('usuarios');
    foreach($users as $user) {
        $xml->startElement('usuario');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('name', $user->name);
        $xml->writeAttribute('email', $user->email);
        $xml->writeAttribute('biography', $user->biography);
        $xml->writeAttribute('rol', $user->rol);
        $xml->writeAttribute('profile_picture', $user->profile_picture);
        $xml->writeAttribute('background', $user->background);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->startElement('dibujos');
    foreach($users as $user) {
        $xml->startElement('dibujo');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('title', $user->title);
        $xml->writeAttribute('description', $user->description);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('draw', $user->draw);
        $xml->writeAttribute('image', $user->image);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->startElement('votos');
    foreach($votes as $user) {
        $xml->startElement('voto');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('draw_id', $user->draw_id);
        $xml->writeAttribute('vote', $user->vote);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->startElement('comentarios');
    foreach($users as $user) {
        $xml->startElement('comentario');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('draw_id', $user->draw_id);
        $xml->writeAttribute('text', $user->text);
        $xml->writeAttribute('like', $user->like);
        $xml->writeAttribute('dislike', $user->dislike);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->startElement('seguidores');
    foreach($followers as $user) {
        $xml->startElement('seguidor');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('user_id', $user->user_id);
        $xml->writeAttribute('user_id_request', $user->user_id_request);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});

// RUTAS DE LOGIN Y REGISTRO
Auth::routes();

