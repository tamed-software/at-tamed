<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdfprotocoloscliente extends Model
{
    protected $table = 'pdfprotocolosclientes';

    protected $fillable = ['cliente_id', 'pdf_protocolo'];

    //Relación de uno a uno
    public function cliente() { 
    	return $this->belongsTo('App\Cliente');
    }
}
