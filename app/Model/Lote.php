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


/*    public function compras(){
		return $this->hasMany(Lote::class, 'id', 'lote_id');
	}*/
    
}
