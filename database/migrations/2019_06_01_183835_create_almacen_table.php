<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->integer('codigo')->primary();
            $table->string('descripcion',50);
            $table->integer('id_sucursal');

            //asociada a la tabla sucursal(id)
            $table->foreign('id_sucursal','fk_almacen_sucursal')
            ->references('id')->on('sucursal')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('almacen');
    }
}
