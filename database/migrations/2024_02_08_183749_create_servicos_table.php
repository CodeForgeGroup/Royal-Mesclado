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
            Schema::create('servicos', function (Blueprint $table) {
                $table->id();
                $table->string('nomeServico',50);
                $table->string('fotoServico',255);
                $table->double('valorServico',10.2);
                $table->string('descricaoServico',100);
                $table->time('duracaoServico');
                $table->enum('statusServico', ['ativo', 'inativo']);
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
        Schema::dropIfExists('servicos');
    }
};
