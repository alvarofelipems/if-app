<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }
    
    public function horarios()
    {
        return $this->hasMany('App\Horario');
    }
}
