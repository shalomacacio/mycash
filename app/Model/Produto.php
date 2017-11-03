<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

		protected $fillable = 
    [
    	'id',
    	'nome',
    	'codigo_interno',
    	'codigo_fornecedor',
    	'descricao',
    	'preco_venda',
    	'estoque',
    	'estoque_min',
    	'categoria_id',
    	'marca_id',
    	'flg_ativo'
    ];
    
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function marca(){
    	return $this->belongsTo(Marca::class);
    }

    public function fornecedores(){
    	return $this->belongsToMany(Fornecedor::class, 'fornecedor_produto', 'produto_id', 'fornecedor_id');
    }

    public function compras(){
        $this->belongsToMany(Compra::class, 'compra_items', 'produto_id', 'compra_id' )
                            ->withPivot('preco_compra','qtd', 'subtotal');
    }
}
