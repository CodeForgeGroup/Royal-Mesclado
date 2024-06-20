<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('fotoProduto', 255);
            $table->string('nomeProduto', 50);
            $table->string('valorProduto', 100);
            $table->integer('estoqueProduto');
            $table->string('descricaoProduto', 255);
            $table->enum('statusProduto', ['ativo', 'inativo']);
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
};
