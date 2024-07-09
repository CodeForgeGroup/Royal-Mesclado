<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('usuarios', function(Blueprint $table){
            $table->id();
            $table->string('nome', 50);
            $table->string('email', 155);
            $table->string('senha', 20);
            $table->bigInteger('tipo_usuario_id');
            $table->enum('tipo_usuario_type', ['funcionario', 'cliente'])->default('cliente');
            $table->timestamp('email_verificado_em')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('token_lembrete', 6)->unique();
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

    }
};
