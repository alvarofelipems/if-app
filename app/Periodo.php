<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }
    
    public function calendarios()
    {
        return $this->hasMany('App\Calendarios');
    }
}
