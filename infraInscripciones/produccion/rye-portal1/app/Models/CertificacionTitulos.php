<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:30:24 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CertificacionTitulos
 * 
 * @property int $correlativo
 * @property int $carnet
 * @property int $cui
 * @property string $nombre
 * @property string $nombre_carrera
 * @property string $nivel_academico
 * @property date $fecha_graduacion
 * @property string $facultad
 * @property int $estado
 * @property string $transaccion
 * @property string $usuario
 * @property date $fecha_usr
 * @property string $string
 *
 * @package App\Models
 * @method static first()
 */
class CertificacionTitulos extends Eloquent
{
	protected $table = 'certificacion_titulos';
	protected $primaryKey = 'correlativo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
        'correlativo' => 'int',
		'carnet' => 'int',
		'cui' => 'int',
		'nombre' => 'string',
		'nombre_carrera' => 'string',
		'nivel_academico' => 'string',
		'fecha_graduacion' => 'date',
		'facultad' => 'string',
        'estado' => 'int',
        'transaccion' => 'string',
        'usuario' => 'string',
        'fecha_usr' => 'date',
        'barcode' => 'string'
	];

	protected $fillable = [
        'correlativo',
		'carnet',
		'cui',
		'nombre',
		'nombre_carrera',
		'nivel_academico',
		'fecha_graduacion',
		'facultad',
        'estado',
        'transaccion',
        'usuario',
        'fecha_usr',
        'barcode'
	];
}
