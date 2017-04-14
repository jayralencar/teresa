<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Participante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_participante', function (Blueprint $table) {
            $table->increments('id_participante');
            $table->integer('id_partida')->unsigned();
            $table->foreign("id_partida")->references("id_partida")->on("cad_partida");
            $table->char("nome_participante", 200);
            $table->bigInteger("hora_login");
            $table->tinyInteger("ativo")->default(1);
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
        Schema::dropIfExists('cad_participante');
    }
}
