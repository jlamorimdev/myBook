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

// Route::get('/', function () {
//     return view('/index');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
Route::resource('/', 'DashboardController');
Route::get('logout', 'DashboardController@logout');
Route::resource('cadastro/tipos', 'TiposController');
Route::resource('cadastro/tipos', 'TiposController');
Route::resource('cadastro/editoras', 'EditorasController');
Route::resource('cadastro/marcadores', 'MarcadoresController');
Route::resource('cadastro/livro', 'LivroMarcadorController');
Route::resource('livros/compras', 'ComprasController');
Route::resource('livros/livros', 'LivrosController');
Route::get('/home', 'HomeController@index')->name('home');
});



