<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredienteProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente_producto', function (Blueprint $table) {
            $table->string('cod_productoterminado',4);
            $table->integer('id_insumo');
            $table->float('stock');

            $table->primary(['cod_productoterminado','id_insumo']);

            //asociado a la tabla productoterminado(codigo)
            $table->foreign('cod_productoterminado','fk_idproductoterminado_factura')
            ->references('codigo')->on('producto_terminado')->onDelete('cascade')->onUpdate('cascade');
            
            //asociado a la tabla insumo(id)
            $table->foreign('id_insumo','fk_idinsumo_factura')
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
        Schema::dropIfExists('ingrediente_producto');
    }
}
