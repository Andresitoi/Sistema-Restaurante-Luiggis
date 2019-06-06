<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_egreso', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->decimal('cantidad',12,2);
            $table->string('detalle',50);
            $table->integer('id_notaegreso');
            
            //asociado a la tabla nota egreso(id)
            $table->foreign('id_notaegreso','fk_idnotaegreso_detallegreso')->references('id')->on('nota_egreso')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('detalle_egreso');
    }
}
