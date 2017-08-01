<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public $fillable = ['calendario_id', 'grade_id'];
    
    public function calendario()
    {
        return $this->belongsTo('App\Calendario');
    }
    
    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }
    
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
}
