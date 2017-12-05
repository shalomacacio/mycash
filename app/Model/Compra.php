<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class Compra extends Model
{

	protected $fillable = [
		'codigo',
		'lote_id',
		'fornecedor_id',
		'num_pedido',
		'flg_concluida',
		'taxa_imposto'
	];

	public function lote(){
		return $this->hasOne(Lote::class, 'id', 'lote_id');
	}

	public function fornecedor(){
		return $this->belongsTo(Fornecedor::class);
	}

    public function produtos()
    {
    	return $this->belongsToMany(Produto::class, 'compra_items', 'compra_id', 'produto_id')
    						->withPivot('preco_compra','qtd', 'subtotal');
    }



}
