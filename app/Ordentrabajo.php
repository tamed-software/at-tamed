<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordentrabajo extends Model
{
    protected $table = 'ordenestrabajo'; 

    protected $fillable = ['fecha_pautada', 'hora_pautada', 'tipo_trabajo', 'responsable_asignado_id', 'numero_orden', 'nombre_cliente', 'direccion_cliente', 'responsable_ultima_visita_id', 'codigo_interno', 'obra_gruesa', 'mudanza', 'terminaciones_menores', 'habitada', 'observaciones_visitas_anterior', 'requerimientos_adicionales', 'cliente_id', 'actualizado'];

    //Relación de uno a muchos
    public function cliente() {
    	//return $this->hasOne('App\Estado'); 
    	return $this->hasMany('App\Cliente');
    }

    //Relación de uno a muchos belongsTo
    public function instalador() {
    	return $this->hasMany('App\Instalador');
    }


}
