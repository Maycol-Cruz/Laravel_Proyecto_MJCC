<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->increments('ord_id');
            $table->integer('usu_id');
            $table->text('ord_codigo');
            $table->float('ord_precio_total', 10, 2);
            $table->date('ord_fecha');
            $table->integer('ord_confirmado');
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
        Schema::dropIfExists('orden');
    }
}
