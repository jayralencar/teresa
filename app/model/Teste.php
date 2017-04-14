<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    protected $table = 'cad_teste';
    protected $primaryKey = "id_teste";
    protected $fillable = ['entrada','saida','id_questao','ativo'];

    public function questao()
    {
    	return $this->belongsTo("App/model/Questao", "id_questao");
    }
}
