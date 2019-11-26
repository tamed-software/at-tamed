<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = ['estado_id', 'etapa_id', 'proyecto_id', 'nombre_proyecto', 'total_viviendas_proyecto', 'direccion_proyecto', 'comuna_proyecto', 'fecha_probable_entrega', 'sala_ventas', 'vivienda_piloto', 'comuna_piloto', 'mandante_proyecto', 'rut_mandante_proyecto', 'representante_legal_proyecto', 'ins_personeria_juridica', 'notario_ins_proyecto', 'razon_social', 'giro_factura', 'direccion_factura', 'encargado_finanzas', 'email_encargado_finanzas', 'email_dte', 'email_pdf', 'nombre_responsable', 'cargo_responsable', 'email_responsable', 'telefono_responsable', 'nombre_contacto_mkt', 'cargo_contacto_mkt', 'email_contacto_mkt', 'nombre_agencia_externa', 'url_oficial_proyecto', 'direccion_representante_legal', 'oficina_representante_legal', 'comuna_representante_legal', 'region_representante_legal', 'nombre_inmobiliaria', 'fecha_escritura_personeria', 'notaria_escritura_personeria', 'nombre_notario_publico', 'numero_contrato', 'mes_confeccion_contrato', 'pago1_fecha', 'pago2_fecha', 'pago3_fecha', 'instalacion_piloto', 'capacitacion_personal_ventas', 'monto_contrato','observacion','estado_observacion','estado_mkt', 'estado_at', 'estado_finanza', 'url_drive','fecha_instalacion_personalizada'];

    //Relación de uno a uno
    public function estado() {
    	return $this->belongsTo('App\Estado');
    }

    //Relación de uno a uno
    public function proyecto() {
    	return $this->belongsTo('App\Proyecto');
    }
}
