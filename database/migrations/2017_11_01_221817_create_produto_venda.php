<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_venda', function (Blueprint $table) {
            
            $table->integer('produto_id')->unsigned();
            $table->integer('venda_id')->unsigned();

            $table->integer('qtd');
            $table->decimal('subtotal');

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('venda_id')->references('id')->on('vendas');
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
