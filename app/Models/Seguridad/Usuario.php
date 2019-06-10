<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table= 'usuario';
    protected $fillable = ['usuario', 'nombre', 'password',];
    protected $guarded = ['id'];
}
