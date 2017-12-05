<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Produto;
use App\Model\Compra;
use App\Model\Venda;

use DB;

class RelatorioController extends Controller
{
    

/*    public function relComVenEst(){
 		$produtos = Produto::orderBy('nome')->get();
    	return view('relatorios.comvenest', compact('produtos'));
    }
*/
        public function relComVenEst(){
 		$produtos = DB::table ('produtos as p')
 						->leftJoin('compra_items as ci', 'ci.produto_id', '=', 'p.id')
 						->leftJoin('venda_items as vi', 'vi.produto_id', '=', 'p.id')
 						->select('p.codigo_interno','p.nome', DB::raw('SUM(ci.qtd) as compra'), DB::raw('SUM(vi.qtd) as venda'),'p.estoque')
 						->groupBy('p.codigo_interno','p.nome', 'ci.qtd','vi.qtd', 'p.estoque')
 						->get();
 		//return dd($produtos);

    	return view('relatorios.comvenest', compact('produtos'));
    }


    public function estoque(){
    	$produtos = Produto::all();
    	return view('relatorios.comvenest', compact('produtos'));
    }
}
