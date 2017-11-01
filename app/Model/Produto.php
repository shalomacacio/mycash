<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function marca(){
    	return $this->belongsTo(Marca::class);
    }

    public function fornecedoress(){
    	return $this->belongsToMany(Fornecedor::class);
    }
}
