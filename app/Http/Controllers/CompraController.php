<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Compra;
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
        $this->compra = new Compra($request->all());
        $this->compra->codigo = $codigo;
        $this->compra->save();
        $compra = Compra::where('codigo', $codigo)->first();
        return view('compra.create',compact('compra') );
    }

    public function addItem(Request $request)
    {
        $input = $request->all();
        $compra = Compra::where('codigo', $input['codigo'])->first();
        $compra = Compra::find($input['numero_pedido']);

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
