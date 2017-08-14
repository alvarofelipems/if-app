<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
    
    public function calendarios()
    {
        return $this->hasMany('App\Calendario');
    }
    
    public function aulas()
    {
        return $this->hasMany('App\Aula');
    }
}
