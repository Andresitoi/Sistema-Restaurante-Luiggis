<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido_proveedor', function (Blueprint $table) {
            $table->integer('id_insumo');
            $table->integer('nro_pedidoproveedor');
            $table->integer('cantidad');
            $table->decimal('precio',12,2);

            
            $table->primary(['id_insumo','nro_pedidoproveedor']);

            //asociado a la tabla pedido_proveedor(id)
            $table->foreign('nro_pedidoproveedor','fk_nropedidoproveedor_detallepp')
            ->references('nro')->on('pedido_proveedor')->onDelete('cascade')->onUpdate('cascade');
            //asociado a la tabla insumo(id)
            $table->foreign('id_insumo','fk_idinsumo_detallepp')
            ->references('id')->on('insumo')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('detalle_pedido_proveedor');
    }
}
