<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarioat extends Model
{
    protected $table = 'comentariosat';

    protected $fillable = ['fecha_observacion', 'observacion', 'responsable', 'contrato_id'];

    //Relación de uno a uno
    public function contrato() {
    	return $this->belongsTo('App\Contrato');
    }
}
