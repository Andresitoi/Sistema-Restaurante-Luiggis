<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_egreso', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('fecha');
            $table->string('descripcion',100);
            $table->integer('cod_almacen');

            //asociada a la tabla almacen(codigo)
            $table->foreign('cod_almacen','fk_codigoalmacen_notaegreso')
            ->references('codigo')->on('almacen')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('nota_egreso');
    }
}
