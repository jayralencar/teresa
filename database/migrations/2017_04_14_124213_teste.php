<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Teste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_teste', function (Blueprint $table) {
            $table->increments('id_teste');
            $table->integer('id_questao')->unsigned();
            $table->foreign("id_questao")->references("id_questao")->on("cad_questao");
            $table->text("entrada");
            $table->text("saida");
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
        Schema::dropIfExists('cad_teste');
    }
}
