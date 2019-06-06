<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallaPedidoPromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalla_pedido_promo_', function (Blueprint $table) {
            $table->integer('id_promocion');
            $table->integer('nro_pedidocliente');
            $table->integer('id_tipopedido');
            $table->integer('cantidad');

            //llaves primarias
            $table->primary(['id_promocion','nro_pedidocliente']);

            //asociado a la tabla promocion(id)
            $table->foreign('id_promocion','fk_iddetallapromocion_detallep')->references('id')->on('promocion')->onUpdate('cascade')->onDelete('cascade');
            //asociado a la tabla pedido_cliente(codigo)
            $table->foreign('nro_pedidocliente','fk_codpedidocliente_detallep')->references('nro')->on('pedido_cliente')->onUpdate('cascade')->onDelete('cascade');
            //asociado a la tabla tipo_pedido(id)
            $table->foreign('id_tipopedido','fk_idtipopedido_detallepromo')->references('id')->on('tipo_pedido')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('detalla_pedido_promo_');
    }
}
