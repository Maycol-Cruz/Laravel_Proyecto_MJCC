<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->text('usu_username');
            $table->text('password');
            $table->text('usu_email');
            $table->text('usu_nombres');
            $table->text('usu_apellidos');
            $table->text('usu_foto');
            $table->integer('usu_rol');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('usuario');
    }
}
