<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';

    protected $fillable = ['pregunta'];

    // Una pregunta tiene muchas preguntas-respuestas
    public function preguntasrespuestas() {
    	return $this->hasMany('App\Preguntasrespuestas');
    }
}
