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
Route::get('/', function () {return view('auth.login');});

Route::group(['prefix'=>'produto'],function(){
	Route::get('/', 'ProdutoController@index')->name('produto.index');
	Route::get('/anyData', 'ProdutoController@anyData')->name('produto.anyData');
	
	Route::post('/store', 'ProdutoController@store')->name('produto.store');
	Route::get('/{id}/edit', 'ProdutoController@edit')->name('produto.edit');
	Route::get('/create', 'ProdutoController@create')->name('produto.create');
	Route::get('{id}/estoque', 'ProdutoController@estoque')->name('produto.estoque');
	Route::get('{id}/atualizaPreco', 'ProdutoController@atualizaPreco')->name('produto.atualizaPreco');
	Route::get('{id}/searchCompra', 'ProdutoController@searchCompra')->name('produto.searchCompra');
	Route::post('/addMarca', 'ProdutoController@addMarca')->name('produto.addMarca');
	Route::put('/{id}/addEstoque', 'ProdutoController@addEstoque')->name('produto.addEstoque');
	Route::put('/{id}/addPreco', 'ProdutoController@addPreco')->name('produto.addPreco');
	Route::put('/{id}/update', 'ProdutoController@update')->name('produto.update');
	Route::post('/addCategoria', 'ProdutoController@addCategoria')->name('produto.addCategoria');


});

Route::group(['prefix'=>'fornecedor'],function(){
	Route::get('/', 'FornecedorController@index')->name('fornecedor.index');
	Route::post('/store', 'FornecedorController@store')->name('fornecedor.store');
	Route::get('/{id}/edit', 'FornecedorController@edit')->name('fornecedor.edit');
	Route::get('/create', 'FornecedorController@create')->name('fornecedor.create');
	Route::put('/{id}/update', 'FornecedorController@update')->name('fornecedor.update');
});

Route::group(['prefix'=>'lote'],function(){
	Route::get('/', 'LoteController@index')->name('lote.index');
	Route::post('/store', 'LoteController@store')->name('lote.store');
	Route::get('/{id}/edit', 'LoteController@edit')->name('lote.edit');
	Route::get('/create', 'LoteController@create')->name('lote.create');
	Route::put('{id}/update', 'LoteController@update')->name('lote.update');
	Route::get('/{id}/show', 'LoteController@show')->name('lote.show');

});

Route::group(['prefix'=>'compra'],function(){
	Route::get('/', 'CompraController@index')->name('compra.index');
	Route::post('/store', 'CompraController@store')->name('compra.store');
	Route::get('/{id}/edit', 'CompraController@edit')->name('compra.edit');
	Route::get('/create', 'CompraController@create')->name('compra.create');
	Route::put('{id}/update', 'CompraController@update')->name('compra.update');

	Route::get('/{id}/novaCompra', 'CompraController@novaCompra')->name('compra.novaCompra');


	Route::post('/addItem', 'CompraController@addItem')->name('compra.addItem');
	Route::put('/addItem2', 'CompraController@addItem2')->name('compra.addItem2');
	//Route::post('/delItem', 'CompraController@delItem')->name('compra.delItem');
	Route::get('/delItem/{id}/{produto_id}', 'CompraController@delItem')->name('compra.delItem');
	Route::get('/deleteItem/{id}/{produto_id}', 'CompraController@deleteItem')->name('compra.deleteItem');
	Route::post('/finCompra', 'CompraController@finCompra')->name('compra.finCompra');

});


Route::group(['prefix'=>'venda'],function(){
	Route::get('/', 'VendaController@index')->name('venda.index');
	Route::post('/store', 'VendaController@store')->name('venda.store');
	Route::get('/{id}/edit', 'VendaController@edit')->name('venda.edit');
	//Route::get('/{id}/novaVenda', 'VendaController@novaVenda')->name('venda.novaVenda');
	Route::get('/{id}/novoPedido', 'VendaController@novoPedido')->name('venda.novoPedido');
	Route::get('/{id}/excluirPedido', 'VendaController@excluirPedido')->name('venda.excluirPedido');

	Route::post('/addItem', 'VendaController@addItem')->name('venda.addItem');
	Route::get('/delItem/{id}/{produto_id}', 'VendaController@delItem')->name('venda.delItem');

	Route::get('/create', 'VendaController@create')->name('venda.create');
	Route::put('{id}/update', 'VendaController@update')->name('venda.update');

	Route::get('/{id}/show', 'VendaController@show')->name('venda.show');
	Route::get('/{id}/finalizarVenda', 'VendaController@finalizarVenda')->name('venda.finalizarVenda');
	Route::put('{id}/concluirVenda', 'VendaController@concluirVenda')->name('venda.concluirVenda');


});



Route::group(['prefix'=>'relatorios'],function(){
	Route::get('/comvenest', 'RelatorioController@relComVenEst')->name('relatorios.comvenest');
	Route::get('/vendasPeriodo', 'RelatorioController@vendasPeriodo')->name('relatorios.vendasPeriodo');
	Route::get('/getVendasPeriodo', 'RelatorioController@getVendasPeriodo')->name('relatorios.getVendasPeriodo');
	Route::get('/comvenest/anyData', 'RelatorioController@anyData')->name('relatorios.anyData');
		

});