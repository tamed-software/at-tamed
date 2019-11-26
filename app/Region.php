<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regiones';

    protected $fillable = ['nombre', 'pais_id'];

    // Una región pertenece a un país
    public function pais() {
    	return $this->belongsTo('App\Pais');
    }

    // Una región tiene muchas ciudades
    public function ciudades() {
    	return $this->hasMany('App\Ciudad');
    }
}
