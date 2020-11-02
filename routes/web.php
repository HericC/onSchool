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

Route::get('/laravel', function () {
    return view('welcome');
});

// Principais Routes
Route::redirect('/', '/home');
Route::post('/home', function () {
    redirect('/');
});

// Authenticação
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// My Routes
Route::group(['prefix' => 'user'], function () {
    Route::post('editarPerfil', 'userController@editarPerfil');
    Route::post('search', 'userController@search');
});

Route::group(['prefix' => 'turmas'], function () {
    Route::post('criarTurma', 'turmasController@criarTurma');
    Route::get('sairTurma/{turma_id}', 'turmasController@sairTurma');
    Route::post('entrarTurma', 'turmasController@entrarTurma');
    Route::post('editarTurma', 'turmasController@editarTurma');
});

Route::group(['prefix' => 'conteudo'], function () {
    Route::post('postarPostagem', 'conteudoController@postarPostagem');
    Route::post('postarAtividade', 'conteudoController@postarAtividade');
    Route::post('postarComments', 'conteudoController@postarComments');

    Route::get('excluirPostagem/{postagem_id}', 'conteudoController@excluirPostagem');
    Route::get('excluirAtividade/{atividade_id}', 'conteudoController@excluirAtividade');
    Route::get('excluirComentPostagem/{comentPostagem_id}', 'conteudoController@excluirComentPostagem');
    Route::get('excluirComentAtividade/{comentAtividade_id}', 'conteudoController@excluirComentAtividade');

    Route::post('editarPostagem', 'conteudoController@editarPostagem');
    Route::post('editarAtividade', 'conteudoController@editarAtividade');
});
