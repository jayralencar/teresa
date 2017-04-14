<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'cad_questao';
    protected $primaryKey = "id_questao";

    protected $fillable = ['nome_questao','enunciado_questao','entrada_questao','saida_questao','pontuacao','ativo'];

    public function testes()
    {
    	return $this->hasMany("App\model\Teste", "id_questao");
    }
}
