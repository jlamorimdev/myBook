<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/**
 * @deprecated  
 * commented routes were inserted in the new routes
 */
Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'DashboardController@logout');
    // Route::resource('cadastro/tipos', 'TiposController');
    // Route::resource('cadastro/editoras', 'EditorasController');
    // Route::resource('cadastro/marcadores', 'MarcadoresController');
    /* #### verificar depois ###
    Route::resource('cadastro/livro', 'LivroMarcadorController'); VERIFICAR DEPOIS
    */
    // Route::resource('livros/compras', 'ComprasController');
    // Route::resource('livros/livros', 'LivrosController');
    // Route::get('/home', 'HomeController@index')->name('home');
});

/**
 * New routes web in development
 */
Route::group([
    'as' => 'site.',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group([
        'as' => 'register.',
        'prefix' => 'cadastro'
    ], function () {

        Route::group([
            'prefix' => 'categorias',
            'as' => 'categories.'
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/{category}', 'CategoryController@show')->name('show');
            Route::get('/criar', 'CategoryController@create')->name('create');
            Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
            Route::post('/store', 'CategoryController@store')->name('store');
            Route::put('/update/{category}', 'CategoryController@update')->name('update');
        });

        Route::group([
            'prefix' => 'editoras',
            'as' => 'publishers.'
        ], function () {
            Route::get('/', 'PublisherController@index')->name('index');
            Route::get('/{publisher}', 'PublisherController@show')->name('show');
            Route::get('/criar', 'PublisherController@create')->name('create');
            Route::get('/edit/{publisher}', 'PublisherController@edit')->name('edit');
            Route::post('/store', 'PublisherController@store')->name('store');
            Route::put('/update/{publisher}', 'PublisherController@update')->name('update');
            Route::delete('/{publisher}', 'PublisherController@destroy')->name('delete');
        });

        Route::group([
            'prefix' => 'marcadores',
            'as' => 'bookmarks.'
        ], function () {
            Route::get('/', 'BookmarkController@index')->name('index');
            Route::get('/{bookmark}', 'BookmarkController@show')->name('show');
            Route::get('/criar', 'BookmarkController@create')->name('create');
            Route::get('/edit/{bookmark}', 'BookmarkController@edit')->name('edit');
            Route::post('/store', 'BookmarkController@store')->name('store');
            Route::put('/update/{bookmark}', 'BookmarkController@update')->name('update');
            Route::delete('/{bookmark}', 'BookmarkController@destroy')->name('delete');
        });
    });

    Route::group([
        'as' => 'books.',
        'prefix' => 'livros'
    ], function () {
        Route::get('/', 'BookController@index')->name('index');
        Route::get('/{book}', 'BookController@show')->name('show');
        Route::get('/criar', 'BookController@create')->name('create');
        Route::get('/edit/{book}', 'BookController@edit')->name('edit');
        Route::post('/store', 'BookController@store')->name('store');
        Route::put('/update/{book}', 'BookController@update')->name('update');
        Route::delete('/{book}', 'BookController@destroy')->name('delete');

        Route::group([
            'prefix' => 'compras',
            'as' => 'shoppings.'
        ], function () {
            Route::get('/', 'ShoppingController@index')->name('index');
            Route::get('/{shopping}', 'ShoppingController@show')->name('show');
            Route::get('/criar', 'ShoppingController@create')->name('create');
            Route::get('/edit/{shopping}', 'ShoppingController@edit')->name('edit');
            Route::post('/store', 'ShoppingController@store')->name('store');
            Route::put('/update/{shopping}', 'ShoppingController@update')->name('update');
            Route::delete('/{shopping}', 'ShoppingController@destroy')->name('delete');
        });
    });
});
