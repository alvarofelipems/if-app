<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['cursos'];
    
    public function disciplinas()
    {
        return $this->hasMany('App\Disciplina');
    }
}
