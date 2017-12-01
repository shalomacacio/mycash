<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Produto;
use App\Model\Compra;
use App\Model\Venda;

use DB;

class RelatorioController extends Controller
{
    

    public function relComVenEst(){
 		$produtos = Produto::orderBy('nome')->get();
    	return view('relatorios.comvenest', compact('produtos'));
    }


    public function estoque(){
    	$produtos = Produto::all();
    	return view('relatorios.comvenest', compact('produtos'));
    }
}
