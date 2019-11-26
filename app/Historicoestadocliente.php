<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historicoestadocliente extends Model
{
    protected $table = 'historicoestadosclientes';

    protected $fillable = ['cant_sin_info', 'cant_no_contactados', 'cant_contactados','cant_agendados', 'cant_instalados', 'cant_con_observacion','cant_ins_cap','fecha_respaldo'];

}
