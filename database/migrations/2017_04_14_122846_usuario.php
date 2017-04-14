<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->char('nome_usuario',200);
            $table->char('email_usuario',200);
            $table->char('senha_usuario',200);
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
        Schema::dropIfExists('cad_usuario');
    }
}
