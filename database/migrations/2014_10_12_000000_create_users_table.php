<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo')->nullable($value = true);
            $table->integer('perfil')->nullable($value = true);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
         array(
             'name' =>'Pablo Muñoz Villalobos',
             'email' =>'pablomunozvillalobos@gmail.com',
             'password' => Hash::make('12345678'),
             'logo' => '',
             'perfil' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
