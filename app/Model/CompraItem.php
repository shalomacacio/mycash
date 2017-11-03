<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompraItem extends Model
{
    protected $fillable = 
    [
    	'compra_id',
    	'produto_id',
    	'preco_compra',
    	'qtd',
    	'subtotal'
    ];
}
