<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';


    public function produtos(){
    	return $this->belongsToMany(Produto::class, 'fornecedor_produto', 'fornecedor_id', 'produto_id');
    }
}