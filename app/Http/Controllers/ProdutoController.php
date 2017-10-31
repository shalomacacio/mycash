<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;


use Illuminate\Http\Request;
use App\Model\Produto;
use App\Model\Categoria;
use App\Model\Marca;

class ProdutoController extends Controller
{
    
	public function __construct(Produto $produto ){
		$this->produto = $produto;
	}

	public function index(){
		$marcas = Marca::all()->pluck('descricao', 'id');
		$categorias = Categoria::all()->pluck('descricao', 'id');
		$produtos = Produto::where('flg_ativo', 1)->get();
		return view('produto.index', compact('marcas', 'categorias'));
	}

	public function addMarca(Request $request){
		$input = Marca::create($request->all());
		$marcas = Marca::all()->pluck('descricao', 'id');
		return Response::json($marcas);
	}

	public function addCategoria(Request $request){
		$input = $request->all();
		Categoria::create($input);
		return view('produto.index');
	}

	public function store(Request $request){
		$input = $request->except('_token');
		return dd($input);
	}
}
