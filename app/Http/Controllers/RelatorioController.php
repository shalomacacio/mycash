<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Model\Produto;
use App\Model\Compra;
use App\Model\Venda;
use App\User;
use Yajra\Datatables\Datatables;

use DB;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function relComVenEst(){
    	return view('relatorios.comvenest');
    }

    public function anyData()
    {
        $produto = Produto::find(10);
             return datatables( DB::table ('produtos as p')
                        ->leftJoin('compra_items as ci', 'ci.produto_id', '=', 'p.id')
                        ->leftJoin('venda_items as vi', 'vi.produto_id', '=', 'p.id')
                        ->select('p.id', 'p.codigo_interno','p.nome', DB::raw('SUM(ci.qtd) as compra'), DB::raw('SUM(vi.qtd) as venda'),'p.estoque')
                        ->groupBy( 'p.id','p.codigo_interno', 'p.nome', 'ci.qtd','vi.qtd', 'p.estoque'))

             ->addColumn('action', function ($data) {
                return '<a href="'.route('produto.edit', $data->id).'" class="btn btn-xs btn-success" title="Editar">Editar</a>';
            })
             ->toJson();
    }

    public function vendasPeriodo(){
        return view('relatorios.vendas_periodo');
    }

        public function getVendasPeriodo(Request $request){

            $inicio =  new Carbon( $request['inicio']);
            /*$fim =  new Carbon( $request['fim']);*/
            $fim =  new Carbon( $request['fim']);
            $fim->setTime(23,59,59);

            $vendas = DB::table('vendas')
                    ->whereBetween('created_at', [$inicio, $fim])
                    ->where('flg_ativo', 1)
                    ->where('situacao', 'concl')
                    ->get();
                    //return dd($vendas);

        return view('relatorios.vendas_periodo', compact('vendas'));
    }

    public function estoque(){
    	$produtos = Produto::all();
    	return view('relatorios.comvenest', compact('produtos'));
    }
}
