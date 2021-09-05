<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMetodoPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodo_pago', function (Blueprint $table) {
            $table->increments('mpa_id');
            $table->integer('usu_id');
            $table->date('mpa_fecha_expiracion');
            $table->text('mpa_nro_tarjeta');
            $table->text('mpa_cvc');
            $table->text('mpa_titular');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usu_id')->references('usu_id')->on('usuario');
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
        Schema::dropIfExists('metodo_pago');
    }
}
