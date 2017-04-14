<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Submissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_submissao', function (Blueprint $table) {
            $table->increments('id_submissao');
            $table->integer('id_participante')->unsigned();
            $table->integer('id_questao')->unsigned();
            $table->foreign("id_participante")->references('id_participante')->on("cad_participante");
            $table->foreign("id_questao")->references('id_questao')->on("cad_questao");
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
        Schema::dropIfExists('cad_submissao');
    }
}
