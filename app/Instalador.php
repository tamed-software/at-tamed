<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalador extends Model
{
    protected $table = 'instaladores'; 

    protected $fillable = ['id', 'nombre_instalador', 'rut_instalador', 'nivel', 'tipo'];


    //Relación de uno a muchos
    public function ordenes() {
    	return $this->hasMany('App\Ordentrabajo');
    }



}
