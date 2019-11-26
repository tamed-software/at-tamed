<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = ['address', 'fecha', 'comuna_id', 'cliente_id', 'proyecto_id'];

    // Una dirección pertenece a una comuna
    public function comuna() {
    	return $this->belongsTo('App\Comuna');
    }

    // Una dirección pertenece a un cliente
    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }

    // Una dirección pertenece a un proyecto
    public function proyecto() {
    	return $this->belongsTo('App\Proyecto');
    }

    // Una direccion tiene muchos ssid
    public function ssids() {
    	return $this->hasMany('App\Ssid');
    }
}

