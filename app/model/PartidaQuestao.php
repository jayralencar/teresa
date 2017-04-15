<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PartidaQuestao extends Model
{
    protected $table = 'cad_partida_questao';
    protected $primaryKey = "id_partida_questao";
    protected $fillable = ['id_partida','id_questao', 'ativo'];

    public function partida()
    {
    	return $this->belongsTo("App\model\Partida", "id_partida");
    }

    public function questao(){
    	return $this->hasOne("App\model\Questao", 'id_questao');
    }
}
