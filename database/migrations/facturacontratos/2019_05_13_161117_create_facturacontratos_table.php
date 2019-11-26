<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacontratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacontratos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('monto', 20, 2)->nullable($value = true);
            $table->date('fecha')->nullable($value = true);
            $table->text('descripcion')->nullable($value = true);
            $table->integer('contrato_id')->unsigned()->nullable($value = true);
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
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
        Schema::dropIfExists('facturacontratos');
    }
}
