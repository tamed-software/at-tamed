<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventariopiloto extends Model
{
    protected $table = 'inventariopilotos';

    protected $fillable = ['tiempo_instalacion_hora', 'tiempo_configuracion_hora', 'cantidad', 'total', 'piloto_id','producto_id'];

    // Un inventariopiloto tiene un producto
    public function producto() {
    	return $this->belongsTo('App\Producto');
    }
    
    // Un inventariopiloto tiene un piloto
    public function piloto() {
        return $this->belongsTo('App\Piloto');
    }
    
}
