<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    protected $table = 'pilotos';

    protected $fillable = ['fecha_implementacion', 'fecha_capacitacion', 'fecha_retiro', 'direccion', 'descripcion', 'contrato_id', 'observacion', 'estado_id'];

    // Un piloto pertenece a un contrato
    public function contrato() {
    	return $this->belongsTo('App\Contrato');
    }

    // Un piloto tiene un estado
    public function estado() {
        return $this->belongsTo('App\Estado');
    }

    // Un piloto esta en muchos inventariopiloto
    public function inventariopilotos() {
        return $this->hasMany('App\Inventariopiloto');
    }

}
