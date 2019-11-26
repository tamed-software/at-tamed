<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrendatario extends Model
{
    protected $table = 'arrendatarios';

    protected $fillable = ['cliente_id', 'nombre', 'telefono', 'correo'];

    //Relación de uno a uno
    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }
}
