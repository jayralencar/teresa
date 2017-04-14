<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Partida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_partida', function (Blueprint $table) {
            $table->increments('id_partida');
            $table->char("nome_partida", 200);
            $table->bigInteger('duracao_ms');
            $table->bigInteger('inicio');
            $table->tinyInteger("status")->defaul(1);
            $table->tinyInteger("ativo")->defaul(1);
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
        Schema::dropIfExists('cad_partida');
    }
}
