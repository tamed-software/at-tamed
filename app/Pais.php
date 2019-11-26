<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = ['nombre'];

    //Un país tiene muchas regiones
    public function regiones(){
    	return $this->hasMany('App\Region');
    }
}
