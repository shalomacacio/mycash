<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Fornecedor;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(Fornecedor $fornecedor){
        $this->fornecedor = $fornecedor;
    }

    public function index()
    {
        $lista = Fornecedor::orderBy('descricao', 'asc')->paginate(5);
        return view('fornecedor.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedor.create');
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
        $this->fornecedor->create($input);
        return redirect()->route('fornecedor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $fornecedor = Fornecedor::find($id);
       return view('fornecedor.edit', compact('fornecedor'));
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
        $fornecedor = Fornecedor::findOrFail($id);
        $input = $request->all();
        $fornecedor->fill($input)->save();
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('fornecedor.index');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('fornecedor.index');
        }
    }

}
