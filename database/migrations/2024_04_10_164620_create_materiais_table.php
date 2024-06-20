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
        Schema::create('materiais', function (Blueprint $table) {
            $table->id();
            $table->string('fotoMaterial', 255);
            $table->string('nomeMaterial', 50);
            $table->string('marcaMaterial', 50);
            $table->string('fornecedorMaterial', 50);
            $table->string('descricaoMaterial', 255);
            $table->double('valorVendaMaterial', 10.2);
            $table->double('valorCompraMaterial', 10.2);
            $table->integer('estoqueMaterial');
            $table->string('statusMaterial', 20);
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
        Schema::dropIfExists('materiais');
    }
};
