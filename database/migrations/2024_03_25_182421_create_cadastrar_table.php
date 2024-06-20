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
        Schema::create('cadastrar', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCadastrar', 100);
            $table->string('sobrenomeCadastrar', 200);
            $table->string('emailCadastrar', 250);
            $table->string('senhaCadastrar', 255);
            $table->string('telefoneCadastrar', 11);
            $table->string('enderecocadastrar', 255);
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
        Schema::dropIfExists('cadastrar');
    }
};
