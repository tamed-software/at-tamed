<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = ['nombre', 'telefono', 'correo', 'proyecto_id'];

    //Relación de uno a uno
    public function proyecto() {
    	return $this->belongsTo('App\Proyecto');
    }
}
