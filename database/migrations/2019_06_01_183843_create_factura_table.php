<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('nit')->nullable();
            $table->string('nombre',50)->nullable();
            $table->date('fecha');
            $table->float('total_importe');
            $table->float('valor_recibido');
            $table->float('cambio');
            $table->char('tipo_pago');
            $table->integer('nro_pedidocliente');
            $table->integer('ci_empleado');

            //asociado a la tabla pedido_cliente(codigo)
            $table->foreign('nro_pedidocliente','fk_codpedidocliente_factura')->references('nro')->on('pedido_cliente')->onDelete('cascade')->onUpdate('cascade');
            
            //asociado a la tabla empleado(ci)
            $table->foreign('ci_empleado','fk_ciempleado_factura')->references('ci')->on('empleado')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('factura');
    }
}
