<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['title','start_date','end_date','color', 'id_instalador', 'id_proyecto','id_cliente', 'estado', 'id_cupo', 'date'];
    protected $table = 'events';
}
