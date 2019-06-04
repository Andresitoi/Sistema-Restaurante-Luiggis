<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePromocionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_promocion', function (Blueprint $table) {
            $table->string('cod_produtoterminado',4);
            $table->integer('id_promocion');
            $table->integer('cantidad');

            //las llaves primarias
            $table->primary(['cod_produtoterminado','id_promocion']);

            //asociado a la tabla producto_terminado(id)
            $table->foreign('cod_produtoterminado','fk_codprodterminado_dpromocion')
            ->references('codigo')->on('producto_terminado')->onUpdate('cascade')->onDelete('cascade');
            
            //asociado a la tabla promocion(id)
            $table->foreign('id_promocion','fk_idpromoc_detpromocion')
            ->references('id')->on('promocion')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('detalle_promocion');
    }
}
