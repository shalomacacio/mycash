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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {return view('welcome');});

Route::group(['prefix'=>'produto'],function(){
	Route::get('/', 'ProdutoController@index')->name('produto.index');
	Route::post('/store', 'ProdutoController@store')->name('produto.store');
	Route::get('/{id}/edit', 'ProdutoController@edit')->name('produto.edit');
	Route::get('/create', 'ProdutoController@create')->name('produto.create');
	Route::get('{id}/estoque', 'ProdutoController@estoque')->name('produto.estoque');
	Route::post('/addMarca', 'ProdutoController@addMarca')->name('produto.addMarca');
	Route::put('/{id}/addEstoque', 'ProdutoController@addEstoque')->name('produto.addEstoque');
	Route::post('/addCategoria', 'ProdutoController@addCategoria')->name('produto.addCategoria');
});

Route::group(['prefix'=>'fornecedor'],function(){
	Route::get('/', 'FornecedorController@index')->name('fornecedor.index');
	Route::post('/store', 'FornecedorController@store')->name('fornecedor.store');
	Route::get('/{id}/edit', 'FornecedorController@edit')->name('fornecedor.edit');
	Route::get('/create', 'FornecedorController@create')->name('fornecedor.create');
	Route::put('/update', 'FornecedorController@update')->name('fornecedor.update');
});

Route::group(['prefix'=>'lote'],function(){
	Route::get('/', 'LoteController@index')->name('lote.index');
	Route::post('/store', 'LoteController@store')->name('lote.store');
	Route::get('/{id}/edit', 'LoteController@edit')->name('lote.edit');
	Route::get('/create', 'LoteController@create')->name('lote.create');
	Route::put('/update', 'LoteController@update')->name('lote.update');
});

Route::group(['prefix'=>'compra'],function(){
	Route::get('/', 'CompraController@index')->name('compra.index');
	Route::post('/store', 'CompraController@store')->name('compra.store');
	Route::get('/{id}/edit', 'CompraController@edit')->name('compra.edit');
	Route::get('/create', 'CompraController@create')->name('compra.create');
	Route::put('/update', 'CompraController@update')->name('compra.update');
});