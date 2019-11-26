<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id')->unsigned()->nullable($value = true);
            $table->integer('proyecto_id')->unsigned()->nullable($value = true);
            $table->string('nombre_proyecto')->nullable($value = true);
            $table->integer('total_viviendas_proyecto')->nullable($value = true);
            $table->string('direccion_proyecto')->nullable($value = true);
            $table->string('comuna_proyecto', 100)->nullable($value = true);
            $table->date('fecha_probable_entrega')->nullable($value = true);
            $table->string('sala_ventas', 100)->nullable($value = true);
            $table->string('piloto', 100)->nullable($value = true);
            $table->string('comuna_piloto', 100)->nullable($value = true);
            $table->string('mandante_proyecto')->nullable($value = true);
            $table->string('rut_mandante_proyecto', 20)->nullable($value = true);
            $table->string('representante_legal_proyecto', 100)->nullable($value = true);
            $table->date('ins_personeria_juridica')->nullable($value = true);
            $table->string('notario_ins_proyecto', 100)->nullable($value = true);
            $table->string('razon_social')->nullable($value = true);
            $table->string('giro_factura')->nullable($value = true);
            $table->string('direccion_factura')->nullable($value = true);
            $table->string('encargado_finanzas', 100)->nullable($value = true);
            $table->string('email_encargado_finanzas', 100)->nullable($value = true);
            $table->string('email_dte', 100)->nullable($value = true);
            $table->string('email_pdf', 100)->nullable($value = true);
            $table->string('nombre_responsable', 100)->nullable($value = true);
            $table->string('cargo_responsable', 100)->nullable($value = true);
            $table->string('email_responsable', 100)->nullable($value = true);
            $table->string('telefono_responsable', 50)->nullable($value = true);
            $table->string('nombre_contacto_mkt', 100)->nullable($value = true);
            $table->string('cargo_contacto_mkt', 100)->nullable($value = true);
            $table->string('email_contacto_mkt', 100)->nullable($value = true);
            $table->string('nombre_agencia_externa', 100)->nullable($value = true);
            $table->string('url_oficial_proyecto', 100)->nullable($value = true);
            $table->string('direccion_representante_legal')->nullable($value = true);
            $table->string('oficina_representante_legal', 50)->nullable($value = true);
            $table->string('comuna_representante_legal', 100)->nullable($value = true);
            $table->string('region_representante_legal', 100)->nullable($value = true);
            $table->string('nombre_inmobiliaria', 100)->nullable($value = true);
            $table->date('fecha_escritura_personeria')->nullable($value = true);
            $table->string('notaria_escritura_personeria', 100)->nullable($value = true);
            $table->string('nombre_notario_publico', 100)->nullable($value = true);
            $table->string('numero_contrato', 50)->nullable($value = true);
            $table->string('mes_confeccion_contrato', 50)->nullable($value = true);
            $table->date('pago1_fecha')->nullable($value = true);
            $table->date('pago2_fecha')->nullable($value = true);
            $table->date('pago3_fecha')->nullable($value = true);
            $table->date('pago4_fecha')->nullable($value = true);
            $table->date('pago5_fecha')->nullable($value = true);
            $table->decimal('monto_contrato', 20, 2)->nullable($value = true);
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
