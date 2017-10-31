<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_items', function (Blueprint $table) {
                        
            $table->integer('venda_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            
            $table->decimal('preco_venda',8,2);
            $table->integer('qtd')->default(0);
            $table->decimal('desconto',8,2);
            $table->decimal('subtotal',8,2);

            $table->foreign('venda_id')->references('id')->on('vendas');
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
        Schema::dropIfExists('venda_items');
    }
}
