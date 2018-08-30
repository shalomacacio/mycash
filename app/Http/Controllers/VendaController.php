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
        $lista = Venda::where('flg_ativo',1)
                        ->where('situacao', null)
                        ->orderBy('codigo_venda', 'desc')
                        ->paginate(5);              
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
        $produtos = Produto::pluck('nome', 'id');
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
        // return dd($venda);
        //verifica se existem itens no pedido 
         if($venda->produtos->count() <= 0){
            $venda->flg_ativo = 0;
            $venda->situacao = "can";
            $venda->update();
            Session::flash('flash_success', 'inativado com sucesso');
            return redirect()->route('venda.index', $venda->id);
         }else {
            Session::flash('flash_danger', 'exclua todos os itens da venda');
            return redirect()->route('venda.index', $venda->id);
         }        
    }

    public function finalizarVenda($id){ 
        $venda = Venda::find($id);
        //abre um formulario com os campos a serem preenchidos
        //preenche os campos
        //finaliza a venda.
        return view('venda.finalizar_venda', compact('venda'));
    }

        public function concluirVenda(Request $request, $id)
    {
        $input = $request->except('_method', '_token');
        $venda = Venda::find($id);
        $venda->situacao = "concl";
    
        try{
        $venda->update($input);
        Session::flash('flash_success', 'concluida com sucesso');
        return redirect()->route('venda.index');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('venda.index');
        }
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

    public function ajaxprod(Request $request){
        //$id = $request['produto_id'];
        $produto = Produto::find($request['produto_id']);
        //$json = json_enconde($produto->preco_venda);
        return response()->json($produto->preco_venda);
    }
}
