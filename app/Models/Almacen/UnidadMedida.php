<?php

namespace App\Models\Almacen;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 'unidad_medida';
    protected $fillable = ['id','descripcion'];
    protected $guarded = ['id'];
}
