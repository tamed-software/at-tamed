<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmobiliaria extends Model
{
    protected $table = 'inmobiliarias';

    protected $fillable = ['nombre', 'num_documento'];

    //Relación de uno a muchos
    public function proyectos() {
    	return $this->hasMany('App\Proyecto');
    }

    //Relación de uno a muchos
    public function contratos() {
        return $this->hasMany('App\Contrato');
    }

    //Relación de uno a uno
    public function estado() {
        //return $this->hasOne('App\Estado');
        return $this->belongsTo('App\Estado');
    }
}
