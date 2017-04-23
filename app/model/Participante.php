<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = 'cad_participante';
    protected $primaryKey = "id_participante";

    protected $fillable = ['nome_participante','id_partida','hora_login', 'ativo'];

    public function submissoes(){
    	return $this->hasMany("App\model\Submissao","id_participante");	
    }

    public function pontuacao(){
    	return $this->submissoes()
		    ->selectRaw('id_participante, ifnull(count(*),0) as qt, sum(pontuacao) as pontuacao')
		    ->groupBy('id_participante');
    }
}
