<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/**
 * deprecated  
 */
Route::middleware(['auth'])->group(function () {
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

/**
 * New routes web in development
 */
Route::group([
    'as' => 'site.',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'DashboardController@index')->name('index');

    Route::group([
        'prefix' => 'categorias',
        'as' => 'categories.'
    ], function () {
        Route::get('/', 'CategoriesController@index')->name('index');
        Route::get('/{category}', 'CategoriesController@show')->name('show');
        Route::get('/criar', 'CategoriesController@create')->name('create');
        Route::get('/edit/{category}', 'CategoriesController@edit')->name('edit');
        Route::post('/store', 'CategoriesController@store')->name('store');
        Route::put('/update/{category}', 'CategoriesController@update')->name('update');
    });
});
