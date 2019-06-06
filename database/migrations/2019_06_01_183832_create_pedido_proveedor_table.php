<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_proveedor', function (Blueprint $table) {
            $table->integer('nro')->primary();
            $table->date('fecha');
            $table->float('montototal');
            $table->integer('ci_empleado'); 
            $table->integer('ci_proveedor');
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';


            //asociado a la tabla empleado(ci)
            $table->foreign('ci_empleado','fk_ciempleado_pedido_proveedor')->references('ci')->on('empleado')->onUpdate('cascade')->onDelete('cascade');
            //asociado a la tabla proveedor(ci)
            $table->foreign('ci_proveedor','fk_ciproveedor_pedido_proveedor')->references('ci')->on('proveedor')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('pedido_proveedor');
    }
}
