<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantidadInsumoAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidad_insumo_almacen', function (Blueprint $table) {
            $table->integer('cod_almacen');
            $table->integer('id_insumo');

            $table->primary(['cod_almacen','id_insumo']);

            //asociado a la tabla almacen(codigo)
            $table->foreign('cod_almacen','fk_cantinsumoalmacen_sucursal')
            ->references('codigo')->on('almacen')->onDelete('restrict')->onUpdate('restrict');
            //asociado a la tabla insumo(id)
            $table->foreign('id_insumo','fk_cantinsumoalmacen_insumo')
            ->references('id')->on('insumo')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('cantidad_insumo_almacen');
    }
}
