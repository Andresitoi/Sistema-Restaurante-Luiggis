<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidoClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido_cliente', function (Blueprint $table) {
            $table->integer('nro_pcliente');
            $table->string('cod_pterminado',4);
            $table->integer('cantidad');
            $table->integer('id_tipopedido');

            $table->primary(['nro_pcliente','cod_pterminado']);

            //asociado a la tabla pedido_cliente(codigo)
            $table->foreign('nro_pcliente','fk_nro_pcliente_detalle')
            ->references('nro')->on('pedido_cliente')->onUpdate('cascade')->onDelete('cascade');
            
            //asociado a la tabla producto_terminado(codigo)
            $table->foreign('cod_pterminado','fk_cod_pterminado_detalle')
            ->references('codigo')->on('producto_terminado')->onUpdate('cascade')->onDelete('cascade');

            //asociado a la tabla tipo_pedido(id)
            $table->foreign('id_tipopedido','fk_idtipopedido_detalle')
            ->references('id')->on('tipo_pedido')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('detalle_pedido_cliente');
    }
}
