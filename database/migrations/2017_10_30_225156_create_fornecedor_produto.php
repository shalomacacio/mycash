<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedorProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor_produto', function (Blueprint $table) {
            
            $table->integer('fornecedor_id')->unsigned();
            $table->integer('produto_id')->unsigned();

            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('produto_id')->references('id')->on('produtos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
