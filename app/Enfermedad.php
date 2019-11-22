<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table = 'enfermedades';

    protected $fillable = [
        'nombre'
    ];

    protected $attributes = [
        'habilitado' => true,
    ];

    protected $hidden = [
    
    ];

    private $rules = [
        'nombre' => 'required',
    ];
}
