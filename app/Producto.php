<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['equipo', 'codigo', 'descripcion', 'cantidad', 'valor_unidad', 'subtotal', 'descuento', 'total'];

    //Relación de uno a muchos 
    public function inventarios() {
        return $this->hasMany('App\Inventario');
    }

    // Un producto esta en muchos inventariostands 
    public function inventariostands() {
        return $this->hasMany('App\Inventariostand');
    }

    // Un producto esta en muchos inventariopilotos 
    public function inventariopilotos() {
        return $this->hasMany('App\Inventariopiloto');
    }
}
