<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('pag_id');
            $table->integer('ord_id');
            $table->integer('mpa_id');
            $table->date('pag_fecha');
            $table->float('pag_monto', 10, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ord_id')->references('ord_id')->on('orden');
            $table->foreign('mpa_id')->references('mpa_id')->on('metodo_pago');
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
        Schema::dropIfExists('pago');
    }
}
