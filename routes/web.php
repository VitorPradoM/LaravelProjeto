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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


Route::group(['middleware'=>['web']], function(){
	Route::resource('contatos','ContatosController');
});
Route::any('contatos/{id}/destroy','ContatosController@destroy');

Route::group(['middleware'=>['web']], function(){
	Route::resource('usuarios','UsuariosController');
});

Route::any('usuarios/{id}/destroy','UsuariosController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
