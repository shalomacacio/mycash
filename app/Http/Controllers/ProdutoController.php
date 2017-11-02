<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;


use Illuminate\Http\Request;

use App\Model\Fornecedor;
use App\Model\Categoria;
use App\Model\Produto;
use App\Model\Marca;

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
		$produtos = Produto::where('flg_ativo', 1)->get();
		return view('produto.create', compact('marcas', 'categorias', 'fornecedores'));
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

	public function addEstoque(Request $request, $id){
		$produto = Produto::find($id);
		$qtd = $request['qtd'];
		$produto->estoque += $qtd;
		$produto->save();
		return redirect()->route('produto.index');
	}

	public function store(Request $request){
		$p = $this->produto->create($request->all());
		$fornecedores = $request['fornecedores'];
		try {
			$p->fornecedores()->attach($fornecedores);	
		} catch (Exception $e) {
			Session::flash('flash_danger', 'Erro' . $e);
			return redirect()->route('produto.index');
		}
		$lista = Produto::where('flg_ativo', 1)->orderBy('nome', 'asc')->paginate(5);
		return view('produto.index', compact('lista'));
	}

}
