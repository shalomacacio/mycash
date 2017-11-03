<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Lote;

class LoteController extends Controller
{
   public function __construct(Lote $lote){
        $this->lote = $lote;
    }

    public function index()
    {
        $lista = Lote::orderBy('descricao', 'asc')->paginate(5);
        return view('lote.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lote.create');
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
        $this->lote->create($input);
        return redirect()->route('lote.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $lote = Lote::find($id);
       return view('lote.edit', compact('lote'));
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
        $lote = Lote::findOrFail($id);
        $input = $request->all();
        $lote->fill($input)->save();
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('lote.index');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('lote.index');
        }
    }
}
