<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventariostand extends Model
{
    protected $table = 'inventariostands';

    protected $fillable = ['tiempo_instalacion_hora', 'tiempo_configuracion_hora', 'cantidad', 'total', 'salaventa_id', 'producto_id'];

    // Un inventariostand pertenece a un producto
    public function producto() {
    	return $this->belongsTo('App\Producto');
    }

    // Un inventariostand pertenece a una sala de venta
    public function salaventa() {
        return $this->belongsTo('App\Salaventa');
    }
    
}
