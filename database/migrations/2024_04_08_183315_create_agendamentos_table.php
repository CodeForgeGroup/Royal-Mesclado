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
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
            $table->date('dataAgendamento');
            $table->time('horarioInicial');
            $table->time('horarioFinal');
            $table->string('statusServico', 50);
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
        Schema::dropIfExists('agendamento');
    }
};
