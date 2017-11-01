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
		$lista = Produto::where('flg_ativo', 1)->orderBy('nome', 'asc')->paginate(5);
		return view('produto.index', compact('lista'));
	}

	public function create(){
		$marcas = Marca::all()->pluck('descricao', 'id');
		$categorias = Categoria::all()->pluck('descricao', 'id');
		$produtos = Produto::where('flg_ativo', 1)->get();
		return view('produto.create', compact('marcas', 'categorias'));
	}

	public function addMarca(Request $request){
		$input = Marca::create($request->all());
		return redirect()->route('produto.create');
	}
	
	public function addCategoria(Request $request){
		$input = Categoria::create($request->all());
		return redirect()->route('produto.create');
	}

	public function store(Request $request){
		$input = $request->except('_token');
		return dd($input);
	}
}
