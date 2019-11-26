<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = ['nombre', 'direccion', 'inmobiliaria_id'];

    //Relación de uno a uno
    public function inmobiliaria() {
    	return $this->belongsTo('App\Inmobiliaria');
    }

    //Relación de uno a muchos
    public function contactos() {
    	return $this->hasMany('App\Contacto');
    }

    //Relación de uno a muchos
    public function clientes() {
        return $this->hasMany('App\Cliente');
    }

    //Relación de uno a uno
    public function estado() {
    	return $this->belongsTo('App\Estado');
    }

    //Relación de uno a muchos
    public function inventarios() {
        return $this->hasMany('App\Inventario');
    }

    public function proyecciones() {
      return $this->belongsTo('App\proyeccionInstalaciones');
    }

}
