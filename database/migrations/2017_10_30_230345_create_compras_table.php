<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('codigo')->unique();
            $table->unsignedInteger('lote_id')->nullable();
            $table->unsignedInteger('fornecedor_id')->nullable();
            $table->string('num_pedido')->nullable();
            $table->tinyInteger('flg_concluida')->default(0);
            $table->decimal('taxa_imposto',8,2)->default(0.00);
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
        Schema::dropIfExists('compras');
    }
}
