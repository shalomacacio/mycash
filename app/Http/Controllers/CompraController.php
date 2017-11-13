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
        $lista = Compra::orderBy('codigo', 'asc')->paginate(5);

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
        $produtos = Produto::pluck('nome','id');
        $lotes = Lote::pluck('descricao','id');
        $fornecedores = Fornecedor::pluck('descricao','id');
        return view('compra.create', compact('compra', 'lotes', 'fornecedores', 'produtos'));
    }

    public function addItem(Request $request)
    {
        $input = $request->except('_token','_method', 'produto_id','preco_compra', 'qtd', 'subtotal' );
        $compra = Compra::updateOrCreate($input);
        $produto = Produto::find($request['produto_id']);
        $compra->produtos()->attach($produto->id,['preco_compra'=>$request['preco_compra'],  'qtd'=> $request['qtd'],'subtotal'=>$request['subtotal']]);

        $itens = DB::table('compras as c')
                       ->join('compra_items as ci', 'c.id', '=', 'ci.compra_id' )
                       ->join('produtos as p', 'p.id', '=', 'ci.produto_id')
                        ->where('c.codigo', $request['codigo'])
                        ->get();
        return Response::json($itens);
    }

    public function delItem(Request $request)
    {
        $compra = Compra::where('codigo','=' ,$request['codigo'])->first();
        //$produto = Produto::find($request['produto_id']);
        $compra->produtos()->detach($request['produto_id']);
        //$managementUnit->councils()->where('id', 1)->wherePivot('year', 2011)->detach(1);

        $itens2 = DB::table('compras as c')
                       ->join('compra_items as ci', 'c.id', '=', 'ci.compra_id' )
                       ->join('produtos as p', 'p.id', '=', 'ci.produto_id')
                        ->where('c.codigo', $request['codigo'])
                        ->get();

        return Response::json($itens2);
    }

    public function deleteItem($id , $produto_id){
        $compra = Compra::find($id);
        $compra->produtos()->detach($produto_id);
        $produtos = Produto::pluck('nome','id');
        $lotes = Lote::pluck('descricao','id');
        $fornecedores = Fornecedor::pluck('descricao','id');
       return redirect()->route('compra.edit', compact('compra','produtos', 'lotes', 'fornecedores'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->compra->create($input);
        return redirect()->route('compra.index');
    }

    public function finCompra(Request $request)
    {
        $compra = Compra::where('codigo','=' ,$request['codigo'])->first();
        $compra->flg_concluida=1;
        $compra->update();
         return redirect()->route('compra.index');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::find($id);
        $produtos = Produto::pluck('nome','id');
        $lotes = Lote::pluck('descricao','id');
        $fornecedores = Fornecedor::pluck('descricao','id');
       return view('compra.edit', compact('compra','produtos', 'lotes', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
        $compra = Compra::findOrFail($id);
        $input = $request->all();
        $compra->fill($input)->save();
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('compra.index');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('compra.index');
        }
    }


}
