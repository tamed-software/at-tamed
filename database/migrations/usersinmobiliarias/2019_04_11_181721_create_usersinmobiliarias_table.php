<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersinmobiliariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersinmobiliarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('lastname', 100)->nullable($value = true);
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('inmobiliaria_id')->nullable($value = true);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('inmobiliaria_id')->references('id')->on('inmobiliarias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersinmobiliarias');
    }
}
