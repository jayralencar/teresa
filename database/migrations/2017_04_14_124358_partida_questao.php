<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartidaQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_partida_questao', function (Blueprint $table) {
            $table->increments('id_partida_questao');
            $table->integer("id_partida")->unsigned();
            $table->integer("id_questao")->unsigned();
            $table->foreign('id_partida')->references("id_partida")->on("cad_partida");
            $table->foreign('id_questao')->references("id_questao")->on("cad_questao");
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
        Schema::dropIfExists('cad_partida_questao');
    }
}
