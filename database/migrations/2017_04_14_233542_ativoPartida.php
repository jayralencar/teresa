<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtivoPartida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cad_partida', function (Blueprint $table) {
            $table->integer('ativo')->default(1)->change();
            $table->integer('status')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cad_partida', function (Blueprint $table) {
            //
        });
    }
}
