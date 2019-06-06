<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleNotaIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_nota_ingreso', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_notaingreso');
            $table->string('detalle',50);
            $table->decimal('cantidad',12,2);
            $table->date('fecha_vencimiento')->nullable();            
            $table->decimal('precio_insumo',12,2);
            $table->integer('id_insumo');

            //asociado a la tabla notaingreso(id)
            $table->foreign('id_notaingreso','fk_idnotaingreso_detallenotaingreso')->references('id')->on('nota_ingreso')->onUpdate('cascade')->onDelete('cascade');
            
            //asociado a la tabla insumo(id)
            $table->foreign('id_insumo','fk_idinsumo_detallenotaingreso')->references('id')->on('insumo')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('detalle_nota_ingreso');
    }
}
