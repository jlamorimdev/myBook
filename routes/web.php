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
    return view('/index');
});

Route::resource('cadastro/tipos', 'TiposController');
Route::resource('cadastro/editoras', 'EditorasController');
Route::resource('cadastro/marcadores', 'MarcadoresController');
Route::resource('livros/compras', 'ComprasController');
