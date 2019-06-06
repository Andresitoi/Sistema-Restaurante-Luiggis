<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_ingreso', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('fecha');
            $table->integer('ci_proveedor');
            $table->integer('cod_almacen');

            //asociado a la tabla proveedor(ci)
            $table->foreign('ci_proveedor','fk_ciproveedor_notaingreso')->references('ci')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
            
            //asociado a la tabla almacen(cod)
            $table->foreign('cod_almacen','fk_codalmacen_notaingreso')->references('codigo')->on('almacen')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_ingreso');
    }
}
