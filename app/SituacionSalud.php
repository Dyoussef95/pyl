<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacionSalud extends Model
{
    protected $table = 'situaciones_salud';

    protected $fillable = [
        'interno_id',
        'cobertura_medica',
    ];

    protected $attributes = [
        'habilitado' => true,
        'cobertura_medica' => false,
    ];

    protected $hidden = [
    ];

    private $rules = [
        'interno_id' => 'required',
        'cobertura_medica' => 'required',
    ];

    public function interno()
    {
        return $this->belongsTo('App\Interno','interno_id');
    }

    public function situacion_salud_enfermedad()
    {
        return $this->hasMany('App\SituacionSaludEnfermedad','situacion_salud_id');
    } 
}
