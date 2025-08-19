<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 14:12:01 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BitacoraInscripcion
 * 
 * @property int $carnet
 * @property int $cod_ua
 * @property int $cod_ext
 * @property int $cod_car
 * @property int $ciclo
 * @property int $semestre
 * @property \Carbon\Carbon $fecha_inscripcion
 * @property string $boleta
 * @property \Carbon\Carbon $fecha_boleta
 * @property int $cancelar_matricula
 * @property \Carbon\Carbon $fecha_cancelar
 * @property string $usuario
 * @property \Carbon\Carbon $fecha_usuario
 *
 * @package App\Models
 */
class BitacoraInscripcion2 extends Eloquent
{
	protected $table = 'bitacora_inscripcion2';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'cod_ua' => 'int',
		'cod_ext' => 'int',
		'cod_car' => 'int',
		'ciclo' => 'int',
		'semestre' => 'int',
		'cancelar_matricula' => 'int'
	];

	protected $dates = [
		'fecha_inscripcion',
		'fecha_boleta',
		'fecha_cancelar',
		'fecha_usuario'
	];

	protected $fillable = [
	    'carnet',
	    'cod_ua',
	    'cod_ext',
	    'cod_car',
	    'ciclo',
	    'semestre',
		'fecha_inscripcion',
		'boleta',
		'fecha_boleta',
		'cancelar_matricula',
		'fecha_cancelar',
		'usuario',
		'fecha_usuario'
	];
}
