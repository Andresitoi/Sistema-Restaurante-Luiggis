<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo', function (Blueprint $table) {
            $table->string('cod_producto_A',4);
            $table->string('cod_producto_B',4);
            $table->integer('cantidad');

            $table->primary(['cod_producto_A','cod_producto_B']);

            //asociado a la tabla producto_combo(codigo)
            $table->foreign('cod_producto_A','fk_comboa_codproductoterminado')
            ->references('codigo')->on('producto_terminado')->onUpdate('cascade')->onDelete('cascade');

            //asociado a la tabla producto_combo(codigo)
            $table->foreign('cod_producto_B','fk_combob_codproductoterminado')
            ->references('codigo')->on('producto_terminado')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('combo');
    }
}
