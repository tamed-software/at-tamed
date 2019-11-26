<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactabilidad extends Model
{
    protected $table = 'contactabilidades';

    protected $fillable = ['cliente_id', 'pregunta', 'respuesta', 'fecha'];

    //Relación de uno a uno
    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }
}
