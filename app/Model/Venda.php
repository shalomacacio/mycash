<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{

	protected $fillable = [
		'user_id',
		'codigo_venda',
		'tipo_pagamento',
		'desconto',
		'total_geral',
		'flg_ativo',
		'motivo_cancelamento',
		'num_parcelas',
		'cliente'
	];

	public function user(){
		return $this->hasOne(\App\User::class, 'id', 'user_id');
	}

	public function produtos()
    {
    	return $this->belongsToMany(Produto::class, 'venda_items', 'venda_id', 'produto_id')
    						->withPivot('preco_venda','qtd', 'desconto', 'subtotal');
    }


}
