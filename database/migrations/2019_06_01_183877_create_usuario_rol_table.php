<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedInteger('rol_id');
            $table->unsignedInteger('usuario_id');
            $table->boolean('estado');

            //asociado a la tabla rol(id)
            $table->foreign('rol_id','fk_usuariorol_rol')
            ->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');

            //asociado a la tabla usuario(id)
            $table->foreign('usuario_id','fk_usuariorol_usuario')
            ->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('usuario_rol');
    }
}
