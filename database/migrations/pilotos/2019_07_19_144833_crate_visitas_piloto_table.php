<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateVisitasPilotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitaspiloto', function (Blueprint $table){
            $table->increments('id');
            $table->date('fecha_visita')->nullable($value = true); 
            $table->longText('observacion')->nullable($value = true);   
            $table->string('responsable')->nullable($value = true);
            $table->string('pdf_visita_piloto', 150)->nullable($value = true);    
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
        //
    }
}
