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


Route::prefix('taxas')->group(function() {
    Route::get('/', 'TaxasController@index');
    Route::get('create', 'TaxasController@create');
    Route::post('/', 'TaxasController@store');
    Route::get('{id}/edit', 'TaxasController@edit');
    Route::put('{id}', 'TaxasController@update');
    Route::delete('{id}', 'TaxasController@destroy');
});

Route::prefix('mensalistas')->group(function() {
    Route::get('/', 'MensalistaController@index');
    Route::get('create', 'MensalistaController@create');
    Route::post('/', 'MensalistaController@store');
    Route::get('{id}/edit', 'MensalistaController@edit');
    Route::put('{id}', 'MensalistaController@update');
    Route::delete('{id}', 'MensalistaController@destroy');
});