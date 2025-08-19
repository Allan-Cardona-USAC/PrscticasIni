<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BoletaInscripcion
 * 
 * @property int $carnet
 * @property int $ciclo_vigente
 * @property int $cod_unidad
 * @property int $cod_extension
 * @property int $cod_carrera
 * @property string $no_boleta
 * @property \Carbon\Carbon $fecha_certificacion
 * @property \Carbon\Carbon $fecha_boleta
 * @property bool $tipo_boleta
 * @property float $monto
 *
 * @package App\Models
 */
class BoletaInscripcion extends Eloquent
{
	protected $table = 'BoletaInscripcion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'ciclo_vigente' => 'int',
		'cod_unidad' => 'int',
		'cod_extension' => 'int',
		'cod_carrera' => 'int',
		'tipo_boleta' => 'int',
		'monto' => 'float'
	];

	protected $dates = [
		'fecha_certificacion',
		'fecha_boleta'
	];

	protected $fillable = [
	    'carnet',
	    'ciclo_vigente',
	    'cod_unidad',
	    'cod_extension',
	    'cod_carrera',
		'no_boleta',
		'fecha_certificacion',
		'fecha_boleta',
		'tipo_boleta',
		'monto'
	];
}
