<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class Compra extends Model
{

	protected $fillable = [
		'codigo',
		'lote',
		'fornecedor',
		'num_pedido'
	];

    public function produtos()
    {
    	$this->belongsToMany(Produto::class, 'compra_items', 'compra_id', 'produto_id')
    						->withPivot('preco_compra','qtd', 'subtotal');
    }



}
