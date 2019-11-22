<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoFamiliar extends Model
{
    protected $table = 'grupos_familiares';

    protected $fillable = [
        'apellido_nombre',
        'fecha_nacimiento',
        'sexo',  
        'numero_documento',
        'grado_anio',
        'establecimiento',
        'finalizado',
        'profesion',
        'lugar_trabajo',
        'ingresos',
        'observacion',
        'interno_id',
        'parentesco_id',
        'estado_civil_id',
        'nivel_estudio_id',
        'tipo_documento_id',
        'habilitado'
    ];

    protected $attributes = [
        'habilitado' => true,
    ];
}
