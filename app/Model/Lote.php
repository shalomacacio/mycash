<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
       protected $fillable = 
    [
    	'cod_rastreio',
    	'descricao',
    	'num_itens',
    	'taxas',
    	'total',
    ];

/*
    public function compras()
    {
		return $this->belongsTo(Compra::class, 'id', 'lote_id');
	}*/


    public function compras()
    {
        return $this->hasMany(Compra::class, 'lote_id', 'id');
    }
    
}
