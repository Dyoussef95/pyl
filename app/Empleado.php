<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'nombre','apellido'
    ];

    protected $attributes = [
        'habilitado' => true,
    ];

    protected $hidden = [
    
    ];

    private $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
    ];
}
