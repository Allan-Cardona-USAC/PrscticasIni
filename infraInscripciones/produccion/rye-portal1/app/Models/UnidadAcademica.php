<?php

namespace App\models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class UnidadAcademica extends Eloquent
{
    protected $table = 'unidad_academica';
    public $timestamps = false;
    protected $primaryKey = 'codigo_unidad_academica';

    protected $filable = [
        'codigo_unidad_academica',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'pagina_web',
        'fax',
        'fecha_creacion',
        'codigo_tipo_unidad',
        'descripcion'
    ];

    protected $dates = [
        'fecha_creacion'
    ];

    protected $cast = [
        'codigo_unidad_academica' => 'int',
        'codigo_tipo_unidad' => 'int'
    ];
}
