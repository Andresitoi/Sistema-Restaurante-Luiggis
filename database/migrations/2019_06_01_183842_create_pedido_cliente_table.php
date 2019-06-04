<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_cliente', function (Blueprint $table) {
            $table->integer('nro')->primary();
            $table->date('fecha');
            $table->decimal('total_venta',12,2);
            $table->integer('ci_cliente');
            $table->integer('ci_empleado');

            //asociado a la tabla cliente(ci)
            $table->foreign('ci_cliente','fk_cicliente_pedidocliente')
            ->references('nit')->on('cliente')->onDelete('cascade')->onUpdate('cascade');


            //asociado a la tabla empleado(ci)
            $table->foreign('ci_empleado','fk_ciempleado_pedidocliente')
            ->references('ci')->on('empleado')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('pedido_cliente');
    }
}
