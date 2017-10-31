<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_items', function (Blueprint $table) {

            $table->integer('compra_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            
            $table->decimal('preco_compra',8,2);
            $table->integer('qtd')->default(0);
            $table->decimal('subtotal',8,2);

            $table->foreign('compra_id')->references('id')->on('compras');
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
        Schema::dropIfExists('compra_items');
    }
}
