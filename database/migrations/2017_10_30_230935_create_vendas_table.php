<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('cliente')->nullable()->default(null);
            $table->unsignedBigInteger('codigo_venda')->unique();
            $table->string('tipo_pagamento')->nullable()->default(null);
            $table->string('situacao')->nullable()->default(null);
            $table->string('motivo')->nullable()->default(null);
            $table->decimal('desconto',8,2)->default(0);
            $table->decimal('total_geral',8,2)->default(0.00);
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
        Schema::dropIfExists('vendas');
    }
}
