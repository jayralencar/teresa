<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = 'cad_participante';
    protected $primaryKey = "id_participante";

    protected $fillable = ['nome_participante','hora_login', 'ativo'];
}
