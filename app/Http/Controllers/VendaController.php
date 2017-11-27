<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Venda;
use App\Model\VendaItem;


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


    }

}
