<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            //Opcional codigo do fornecedor 
            $table->unsignedBigInteger('codigo_fornecedor')->nullable();
            $table->unsignedBigInteger('codigo_interno')->unique();
            $table->string('nome')->unique();
            $table->text('descricao')->nullable();
            $table->decimal('preco_venda', 8,2);
            $table->unsignedInteger('estoque')->default(0);
            $table->unsignedInteger('estoque_min')->default(0);
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('marca_id');
            $table->unsignedInteger('compra_id');
            $table->tinyInteger('flg_ativo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
