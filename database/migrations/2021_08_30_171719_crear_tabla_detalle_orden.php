<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDetalleOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_orden', function (Blueprint $table) {
            $table->increments('dor_id');
            $table->integer('ord_id');
            $table->integer('pro_id');
            $table->float('dor_precio_unitario', 10, 2);
            $table->integer('dor_cantidad');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ord_id')->references('ord_id')->on('orden');
            $table->foreign('pro_id')->references('pro_id')->on('producto');
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
        Schema::dropIfExists('detalle_orden');
    }
}
