<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitasalaventa extends Model
{
    protected $table = 'visitasalaventas'; 

    protected $fillable = ['fecha_visita','observacion','responsable','pdf_visita_sala_venta', 'sala_venta_id'];

    public function Salaventa() {
        return $this->belongsTo('App\Salaventa');
    }
}

