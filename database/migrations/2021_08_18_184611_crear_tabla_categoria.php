<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_nombre', 50);
            $table->text('cat_descripcion')->nullable();
            //Created_at
            //Update_at
            $table->timestamps();
            //Delete_at
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
        Schema::dropIfExists('categoria');
    }
}
