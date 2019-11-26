<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyeccionInstalacion extends Model
{
    protected $table = 'proyeccionInstalaciones';

    protected $fillable = ['proyecto_id', 'mes_annio_instalacion', 'cantidad_instalacion'];

    //Relación de uno a muchos
    public function proyectos() {
        return $this->hasMany('App\Proyecto');
    }

}
