<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    public $fillable = ['turma_id', 'disciplina_id'];
}
