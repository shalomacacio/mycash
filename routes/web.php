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
	Route::post('/store', 'ProdutoController@index')->name('produto.store');
});
