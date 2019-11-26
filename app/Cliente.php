<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; 

    protected $fillable = ['estado_id', 'proyecto_id', 'vivienda', 'num_documento', 'nombre', 'apellido', 'fecha_nacimiento', 'telefono1', 'telefono2', 'correo', 'pregunta1', 'respuesta1', 'pregunta2', 'respuesta2', 'pregunta3', 'respuesta3'];

    //Relación de uno a uno
    public function estado() {
    	//return $this->hasOne('App\Estado'); 
    	return $this->belongsTo('App\Estado');
    }

    //Relación de uno a muchos
    public function arrendatarios() {
    	return $this->hasMany('App\Arrendatario');
    }


    //Relación de uno a muchos
    public function contactabilidades() {
    	return $this->hasMany('App\Contactabilidad');
    }

    //Relación de uno a muchos
    public function pdfprotocolosclientes() {
        return $this->hasMany('App\Pdfprotocoloscliente');
    }

    //Relación de uno a uno
    public function cliente() {
    	return $this->belongsTo('App\Proyecto');
    }

}
