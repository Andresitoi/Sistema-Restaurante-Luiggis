<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nombre',50);
            $table->char('tipo_insumo');
            $table->integer('id_unidadmedida');

            //asociado a la tabla unidad_medida(id)
            $table->foreign('id_unidadmedida','fk_insumo_unidadmedida')
            ->references('id')->on('unidad_medida')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('insumo');
    }
}
