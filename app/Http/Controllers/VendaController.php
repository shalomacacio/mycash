<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Model\Venda;
use App\Model\Produto;
use App\Model\Cliente;
use App\Model\VendaItem;
use App\User;

use Carbon\Carbon;
use Session;
use Auth;
use DB;



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

       DB::table('produtos')->where('id', $produto->id)->decrement('estoque', $request['qtd']);

        $venda->produtos()->attach($produto->id,['preco_venda'=>$request['preco_venda'],  'qtd'=> $request['qtd'], 'desconto'=> $request['desconto'],'subtotal'=>$request['subtotal']]);
        return redirect()->route('venda.novaVenda', $venda->id);
        
    }
    
    public function delItem( $id , $produto_id){
            $venda = Venda::find($id);
            $produto = Produto::find($produto_id);

            $result = DB::table('venda_items')
                ->where('produto_id','=', $produto_id)
                ->where('venda_id', '=', $id )
                ->select('qtd')
                ->first()->qtd;

            $venda->produtos()->detach($produto->id);

            DB::table('produtos')->where('id', $produto_id)->increment('estoque', $result);
            return redirect()->route('venda.novaVenda', $venda->id);
    }


     public function update(Request $request, $id)
    {

        $input = $request->all();
        $venda = Compra::findOrFail($id);
        try{
        $venda->fill($input)->save();
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('venda.novaVenda', $venda->id);
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('venda.novaVenda', $venda->id);
        }
    }

}
