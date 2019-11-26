<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaventa extends Model
{
    protected $table = 'salaventas';

    protected $fillable = ['fecha_implementacion', 'fecha_capacitacion', 'fecha_retiro', 'stand', 'descripcion', 'contrato_id', 'direccion', 'observacion', 'estado_id'];

    // Un sala de ventas tiene un contrato
    public function contrato() {
    	return $this->belongsTo('App\Contrato');
    }
    // Una sala de ventas tiene un estado
    public function estado() {
        return $this->belongsTo('App\Estado');
    }

    // Un stand o sala de venta esta en muchos inventariostand 
    public function inventariostands() {
        return $this->hasMany('App\Inventariostand');
    }
}
