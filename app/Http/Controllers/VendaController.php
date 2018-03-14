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
        return redirect()->route('venda.novoPedido', $venda->id);
    }


    public function novoPedido($id){ 
        $venda = Venda::find($id);    
        $produtos = Produto::pluck('nome', 'preco_venda');
        return view('venda.pdv', compact('venda', 'produtos'));
    }

    public function addItem( Request $request){
       $venda = Venda::find($request['id']);
       $produto = Produto::find($request['produto_id']);

       if($request['qtd'] > $produto->estoque){
         Session::flash('flash_danger', 'estoque insuficiente'  );
         return redirect()->route('venda.novoPedido', $venda->id);
       }else{
        DB::table('produtos')->where('id', $produto->id)->decrement('estoque', $request['qtd']);

        $venda->produtos()->attach($produto->id,['preco_venda'=>$request['preco_venda'],  'qtd'=> $request['qtd'], 'desconto'=> $request['desconto'],'subtotal'=>$request['subtotal']]);
        return redirect()->route('venda.novoPedido', $venda->id);
       }  
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
            return redirect()->route('venda.novoPedido', $venda->id);
    }

    public function excluirPedido($id){ 
        $venda = Venda::find($id);
        //verifica se existem itens no pedido 
        if($venda->venda_items){
             Session::flash('flash_alert', 'exclua os itens do pedido');
        }else{
             Session::flash('flash_alert', 'teste');
        }
        
        //se houver alerta para excluir  ex "exclua todos os itens antes de cancelar a venda"
        //senao exclui a venda
        return view('venda.pdv', compact('venda', 'produtos'));
    }

    public function finalizarVenda($id){ 
        $venda = Venda::find($id);
        //abre um formulario com os campos a serem preenchidos
        //preenche os campos
        //finaliza a venda.
        return view('venda.finalizar_venda', compact('venda'));
    }


     public function update(Request $request, $id)
    {
        $input = $request->except('_method', '_token');
        $venda = Venda::find($id);
    
        try{
        $venda->update($input);
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('venda.index', $venda->id);
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('venda.index', $venda->id);
        }
    }
 

}
