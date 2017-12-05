<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Model\Lote;
use App\Model\Compra;
use App\Model\Produto;
use App\Model\Fornecedor;
use App\Model\CompraItem;

use DB;
use Session;
use Carbon\Carbon;

class CompraController extends Controller
{
   public function __construct(Compra $compra){
        $this->compra = $compra;
    }

    public function index()
    {
        $lista = Compra::orderBy('codigo', 'desc')->paginate(5);

        return view('compra.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigo = Carbon::now()->format('Ymdgis');
        $compra = new Compra();
        $compra->codigo = $codigo;
        $compra->save();
        return redirect()->route('compra.novaCompra', $compra->id);
    }

        public function novaCompra($id){ 
        $compra = Compra::find($id);  
        $lotes = Lote::pluck('descricao', 'id');
        $fornecedores = Fornecedor::pluck('descricao', 'id');  
        $produtos = Produto::pluck('nome', 'id');
        return view('compra.novaCompra', compact('compra', 'produtos', 'lotes', 'fornecedores'));
    }

    public function addItem( Request $request){

       $compra = Compra::find($request['id']);
       $produto = Produto::find($request['produto_id']);

        $compra->produtos()->attach($produto->id,['preco_compra'=>$request['preco_compra'],  'qtd'=> $request['qtd'],'subtotal'=>$request['subtotal']]);

        return redirect()->route('compra.novaCompra', $compra->id);
        
    }
    
    public function delItem( $id , $produto_id){
            $compra = Compra::find($id);
            $produto = Produto::find($produto_id);

            $compra->produtos()->detach($produto->id);

            return redirect()->route('compra.novaCompra', $compra->id);
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $compra = Compra::find($id);

        return dd ($input);
    
        try{
        $compra->update($input);
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('compra.novaCompra', $compra->id);
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('compra.novaCompra', $compra->id);
        }
    }


}
