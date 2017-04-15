<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = 'cad_partida';
    protected $primaryKey = "id_partida";

    protected $fillable = ['nome_partida','duracao_ms','inicio','status', 'ativo'];

    public function participantes(){
    	return $this->hasMany('App\model\Participante','id_partida');
    }

    public function partidaQuestoes(){
    	return $this->hasMany("App\model\PartidaQuestao", "id_partida");
    }
}
