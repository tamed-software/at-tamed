<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = ['tiempo_instalacion_hora', 'tiempo_configuracion_hora', 'cantidad', 'total', 'proyecto_id', 'producto_id'];

    //Relación de uno a uno
    public function proyecto() {
    	return $this->belongsTo('App\Proyecto');
    }

    //Relación de uno a uno
    public function producto() {
    	return $this->belongsTo('App\Producto');
    }
}
