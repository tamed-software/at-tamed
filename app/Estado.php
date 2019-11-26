<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = ['nombre'];

    //Relación de uno a muchos
    /*
    public function clientes() {
    	return $this->hasMany('App\Cliente');
    }
    */
    //Relación de uno a uno
    /*
    public function cliente() {
    	return $this->hasOne('App\Cliente');
    }
	*/
}
