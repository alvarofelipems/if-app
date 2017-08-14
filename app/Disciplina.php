<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
    
    public function professores()
    {
        return $this->belongsToMany('App\Professor', 'disciplinas_professores');
    }
}
