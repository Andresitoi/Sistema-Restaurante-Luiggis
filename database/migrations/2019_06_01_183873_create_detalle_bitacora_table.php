<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_bitacora', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_bitacora');
            $table->dateTime('fecha_hora');
            $table->string('descripcion',100);

            $table->primary(['id','id_bitacora']);

            //asociado a la tabla bitacora(id)
            $table->foreign('id_bitacora','fk_idbitacora_detallebitacora')
            ->references('id')->on('bitacora')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('detalle_bitacora');
    }
}
