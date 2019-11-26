<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividadordentrabajo extends Model
{
    protected $table = 'actividadesordentrabajo'; 

    protected $fillable = ['actividad', 'observacion', 'ejecutado', 'orden_id'];

    //Relación de uno a muchos
    public function orden() {
    	//return $this->hasOne('App\Estado'); 
    	return $this->hasMany('App\Ordentrabajo');
    }

}
