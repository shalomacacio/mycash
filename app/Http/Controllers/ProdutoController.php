<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;


use Illuminate\Http\Request;

use App\Model\Fornecedor;
use App\Model\Categoria;
use App\Model\Produto;
use App\Model\Compra;
use App\Model\Marca;
use App\Model\lote;

use DB;
use Session;
use Exception;

class ProdutoController extends Controller
{
    
	public function __construct(Produto $produto ){
		$this->produto = $produto;
	}

	public function index(){
		
		$lista = Produto::where('flg_ativo', 1)->orderBy('nome', 'asc')->paginate(5);
		return view('produto.index', compact('lista'));
	}

	public function create(){
		$marcas = Marca::all()->pluck('descricao', 'id');
		$categorias = Categoria::all()->pluck('descricao', 'id');
		$fornecedores = Fornecedor::all()->pluck('descricao', 'id');
		return view('produto.create', compact('marcas', 'categorias', 'fornecedores'));
	}

	public function edit($id){
		$produto = Produto::find($id);
		return view('produto.edit', compact('produto'));
	}

	public function update(Request $request, $id){
        try{
       	$produto = Produto::findOrFail($id);
        $input = $request->all();
        $produto->fill($input)->save();
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('produto.index');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('produto.index');
        }
	}

	public function addMarca(Request $request){
		$input = Marca::create($request->all());
		return redirect()->route('produto.create');
	}
	
	public function addCategoria(Request $request){
		$input = Categoria::create($request->all());
		return redirect()->route('produto.create');
	}

	public function estoque($id){
		$produto = Produto::find($id);
		return view('produto.estoque', compact('produto'));
	}

	public function atualizaPreco($id){
		$produto = Produto::find($id);
		$compras = Compra::all()->pluck('num_pedido','id');
		return view('produto.atualizaPreco', compact('produto', 'compras'));
	}

	public function searchCompra($id){
		$compra = Compra::find($id);


		//return Response::json($lote);
	}

	public function addPreco(Request $request, $id){
		$produto = Produto::find($id);
		$preco_custo = $request['preco_custo'];
		$produto->preco_custo = $preco_custo;
		$preco_venda = $request['preco_venda'];
		$produto->preco_venda = $preco_venda;
		$produto->save();
		return redirect()->route('produto.index');
	}

	public function addEstoque(Request $request, $id){
		$produto = Produto::find($id);
		$qtd = $request['qtd'];
		$produto->estoque += $qtd;
		$produto->save();
		return redirect()->route('produto.index');
	}

	public function store(Request $request){
		$input = $request->all();
		$this->produto->create($input);
		return redirect()->route('produto.index');
	}

}
