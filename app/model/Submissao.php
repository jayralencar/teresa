<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Submissao extends Model
{
    protected $table = 'cad_submissao';
    protected $primaryKey = "id_submissao";

    protected $fillable = ['id_participante','id_questao','pontuacao', 'ativo','linguagem'];

}
