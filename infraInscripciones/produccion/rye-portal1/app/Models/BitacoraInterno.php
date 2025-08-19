<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class BitacoraInterno extends Eloquent
{
    protected $table = 'bitacora_interno';
    public $timestamps = false;

    protected $fillable = [
        'dependencia',
        'fecha_operacion',
        'tipo_cambio',
        'nivel',
        'tipo_mov',
        'carnet',
        'usuario',
        'UA',
        'Ext',
        'Car',
        'ciclo',
        'semestre'
    ];

    protected $dates = [
        'fecha_operacion'
    ];

    protected $casts = [
        'tipo_cambio' => 'int',
        'nivel' => 'int',
        'tipo_mov' => 'int',
        'UA' => 'int',
        'Ext' => 'int',
        'Car' => 'int',
        'Ciclo' => 'int',
        'semestre' => 'int'
    ];
}