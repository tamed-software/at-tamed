<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportefallo extends Model
{
    protected $table = 'reportefallas'; 

    protected $fillable = ['producto_servicio_falla', 'descripcion_falla', 'orden_id'];

    //Relación de uno a muchos
    public function orden() {
    	//return $this->hasOne('App\Estado'); 
    	return $this->hasMany('App\Ordentrabajo');
    }

}
