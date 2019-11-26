<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesordentrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadesordentrabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('actividad')->nullable($value = true);
            $table->longText('observacion')->nullable($value = true);
            $table->string('ejecutado', 100)->nullable($value = true);
            $table->integer('orden_id')->unsigned()->nullable($value = true);
            $table->foreign('orden_id')->references('id')->on('ordenestrabajo')->onDelete('cascade');
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
        Schema::dropIfExists('actividadesordentrabajo');
    }
}
