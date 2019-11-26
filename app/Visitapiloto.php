<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitapiloto extends Model
{
    protected $table = 'visitaspiloto'; 

    protected $fillable = ['fecha_visita','observacion','responsable','pdf_visita_piloto','piloto_id'];

    public function Piloto() {
        return $this->belongsTo('App\Piloto');
    }

}

