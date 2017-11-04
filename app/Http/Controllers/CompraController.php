<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Lote;
use App\Model\Compra;
use App\Model\Produto;
use App\Model\Fornecedor;
use App\Model\CompraItem;

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

        return view('compra.create');
    }

    public function novaCompra(Request $request)
    {
        
        $codigo = Carbon::now()->format('Ymdgis');
       /* $this->compra = new Compra($request->all());
        $this->compra->codigo = $codigo;
        $this->compra->save();
        $compra = Compra::where('codigo', $codigo)->first();*/
        $compra = new Compra();
        $compra->codigo = $codigo;
        $produtos = Produto::pluck('nome','id');
        $lotes = Lote::pluck('descricao','id');
        $fornecedores = Fornecedor::pluck('descricao','id');
        return view('compra.create',compact('compra', 'produtos', 'lotes', 'fornecedores') );
    }

    public function addItem(Request $request)
    {

         //$compra = Compra::updateOrCreate('codigo', $input['codigo']);
        $compra = Compra::updateOrCreate($request->except('_token', 'produto_id','preco_compra', 'qtd', 'subtotal' ));
        $produto = Produto::find($request['produto_id']);

        $compra->produtos()->attach($produto->id,['preco_compra'=>$request['preco_compra'],  'qtd'=> $request['qtd'],'subtotal'=>$request['subtotal']]);

        return redirect()->route('compra.index');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $compra = Compra::find($id);
       return view('compra.edit', compact('compra'));
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
