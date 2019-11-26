<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialutilizado extends Model
{
    protected $table = 'materialesutilizados'; 

    protected $fillable = ['descripcion', 'unidad', 'cantidades', 'orden_id'];

    //Relación de uno a muchos
    public function orden() {
    	//return $this->hasOne('App\Estado'); 
    	return $this->hasMany('App\Ordentrabajo');
    }

}
