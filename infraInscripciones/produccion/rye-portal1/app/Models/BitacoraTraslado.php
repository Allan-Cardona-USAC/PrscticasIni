<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class BitacoraTraslado extends Eloquent {
    protected $table = 'bitacora_traslado';
    public $timestamps = false;

    protected $fillable = [
        'carnet',
        'defac',
        'deext',
        'decar',
        'afac',
        'aext',
        'acar',
        'ciclo',
        'semestre',
        'tipo_tram',
        'usuario',
        'fecha_u'
    ];

    protected $dates = [
        'fecha_u'
    ];

    protected $cast = [
        'carnet' => 'int',
        'defac'=>'int',
        'deext'=>'int',
        'decar'=>'int',
        'afac'=>'int',
        'aext'=>'int',
        'acar'=>'int',
        'ciclo'=>'int',
        'semestre'=>'int',
        'tipo_tram'=>'int',
    ];
}