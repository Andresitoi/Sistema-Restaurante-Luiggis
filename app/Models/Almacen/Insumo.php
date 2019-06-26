<?php

namespace App\Models\Almacen;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $fillable = ['id','nombre','tipo_insumo'];
    protected $guarded = ['id'];
}
