<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('ci');
            $table->string('cargo',50);
            $table->integer('id_sucursal');
            $table->unsignedInteger('id_usuario');
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';

            $table->primary('ci');
            //asociado a la tabla persona(ci) por la herencia
            $table->foreign('ci','fk_ciempleado_persona')->references('ci')->on('persona')->onDelete('cascade')->onUpdate('cascade');

            //asociado a la tabal sucursal(id)
            $table->foreign('id_sucursal','fk_idsucursal_persona')->references('id')->on('sucursal')->onDelete('cascade')->onUpdate('cascade');

            //asociado a la tabla usuario(id)
            $table->foreign('id_usuario','fk_idusuario_persona')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
