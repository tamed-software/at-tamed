<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $fillable = ['numero_protocolo', 'comentario', 'protocolo', 'nombre_receptor', 'rut_receptor', 'firma_rc', 'fecha', 'cliente_id', 'user_id'];

    // Un protocolo pertenece a un cliente
    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }

    // Un protocolo pertenece a un usuario instalador
    public function user() {
        return $this->belongsTo('App\User');
    }

    // Un protocolo tiene muchas preguntas-respuestas
    public function preguntasrespuestas() {
    	return $this->hasMany('App\Preguntasrespuestas');
    }
}
