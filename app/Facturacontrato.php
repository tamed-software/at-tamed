<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacontrato extends Model
{
    protected $table = 'facturacontratos';

    protected $fillable = ['monto', 'fecha', 'descripcion', 'contrato_id'];

    // Una factura pertenece a un contrato
    public function contrato() {
    	return $this->belongsTo('App\Contrato');
    }
}
