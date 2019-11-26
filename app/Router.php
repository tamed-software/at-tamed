<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $table = 'routers';

    protected $fillable = ['ip_router', 'usuario', 'clave', 'fecha', 'ssid_id', 'marca_id'];

    // Un router pertenece a un ssid
    public function ssid() {
        return $this->belongsTo('App\Ssid');
    }

    // Un router pertenece a una marca
    public function marca() {
        return $this->belongsTo('App\Marca');
    }

    // Una router tiene muchos hcs
    public function hcs() {
    	return $this->hasMany('App\Hc');
    }
}