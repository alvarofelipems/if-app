<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }
    
    public function horarios()
    {
        return $this->hasMany('App\Horario');
    }
}
