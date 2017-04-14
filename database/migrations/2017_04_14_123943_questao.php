<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_questao', function (Blueprint $table) {
            $table->increments('id_questao');
            $table->char("nome_questao", 100);
            $table->text("enunciado_questao");
            $table->text("entrada_questao");
            $table->text("saida_questao");
            $table->integer("pontuacao");
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
        Schema::dropIfExists('cad_questao');
    }
}
