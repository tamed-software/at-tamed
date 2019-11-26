<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoPdf extends Model
{
    protected $table = 'datospdf';

    protected $fillable = [ 'pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 'pregunta5', 'pregunta6', 'pregunta7', 'pregunta8', 'pregunta9', 'pregunta10', 'pregunta11', 'pregunta12', 'pregunta13', 'pregunta14', 'pregunta15', 'pregunta16', 'pregunta17', 'cliente_id', 'direccion_id', 'tecnico_id', 'ultimo_id_hc_ingresado', 'numeroProtocoloCliente', 'comentarioProtocoloCliente', 'hora_inicio_protocolo', 'hora_termino_protocolo', 'nombre_tecnico', 'apellido_tecnico','nombre_cliente','apellido_cliente','telefono_cliente','email_cliente','rut_cliente','inmobiliaria','proyecto'];
    
}