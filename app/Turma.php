<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
    
    public function periodos()
    {
        return $this->hasMany('App\Periodo');
    }
}
