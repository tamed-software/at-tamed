<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

    protected $fillable = ['marca'];

    // Una marca tiene muchos routers
    public function routers() {
    	return $this->hasMany('App\Router');
    }
}
