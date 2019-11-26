<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nuevoproyecto extends Model
{
    protected $table = "nuevoproyectos";

    protected $fillable = ['num_documento', 'nombre', 'direccion', 'inmobiliaria_id', 'estado_id', 'fecha_inicio_instalacion', 'fecha_termino_instalacion', 'cantidad'];

}
