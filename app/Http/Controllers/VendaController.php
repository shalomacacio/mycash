<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Model\Venda;
use App\Model\Produto;
use App\Model\Cliente;
use App\Model\VendaItem;

use Carbon\Carbon;
use Auth;
use App\User;


class VendaController extends Controller
{

   	public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index()
    {
        $lista = Venda::orderBy('codigo_venda', 'asc')->paginate(5);
        return view('venda.index', compact('lista'));
    }

    public function create(){
        $codigo_venda = Carbon::now()->format('Ymdgis');
        $venda = new Venda();
        $venda->codigo_venda = $codigo_venda;
        $venda->user_id = Auth::User()->id;
        $venda->save();
        return redirect()->route('venda.novaVenda', $venda->id);
    }

    public function novaVenda($id){ 
        $venda = Venda::find($id);    
        $produtos = Produto::pluck('nome', 'id');
        return view('venda.pdv', compact('venda', 'produtos'));
    }

    public function addItem( Request $request){
       $venda = Venda::find($request['id']);
       $produto = Produto::find($request['produto_id']);

       $venda->produtos()->attach($produto->id,['preco_venda'=>$request['preco_venda'],  'qtd'=> $request['qtd'], 'desconto'=> $request['desconto'],'subtotal'=>$request['subtotal']]);
         return redirect()->route('venda.novaVenda', $venda->id);

    }

        public function delItem( $id , $produto_id){
            $venda = Venda::find($id);
            $venda->produtos()->detach($produto_id);
            return redirect()->route('venda.novaVenda', $venda->id);
    }

     public function edit($id)
    {
       $venda = Venda::find($id);
       return view('venda.edit', compact('venda'));
    }

}
