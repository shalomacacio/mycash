<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produto;

class ProdutoController extends Controller
{
    

	public function __construct(Produto $produto ){
		$this->produto = $produto;
	}

	public function index(){
		return view('produto.index');
	}

	public function store(Request $request){
		$input = $request->all();
	}


}
