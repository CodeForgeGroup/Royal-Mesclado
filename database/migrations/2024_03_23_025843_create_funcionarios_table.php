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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('fotoFuncionario',255);
            $table->string('nomeFuncionario', 100);
            $table->string('sobrenomeFuncionario', 200);
            $table->string('numeroFuncionario', 15);
            $table->string('emailFuncionario', 255);
            $table->string('especialidadeFuncionario', 100)->nullable();
            $table->time('inicioExpedienteFuncionario');
            $table->time('fimExpedienteFuncionario');
            $table->date('dataNascFuncionario');
            $table->string('cargoFuncionario', 30);
            $table->integer('qntCortesFuncionario');
            $table->string('salarioFuncionario', 7);
            $table->string('descricaoFuncionario', 102);
            $table->string('statusFuncionario', 10);
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
        Schema::dropIfExists('funcionarios');
    }
};
