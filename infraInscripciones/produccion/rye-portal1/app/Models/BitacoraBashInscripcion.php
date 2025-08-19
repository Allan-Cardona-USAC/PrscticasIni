<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Jun 2019 12:29:45 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BitacoraBashInscripcion
 * 
 * @property int $id
 * @property int $carnet
 * @property int $unidadAcademica
 * @property int $extension
 * @property int $carrera
 * @property Carbon $fecha
 * @property bool $tipoInscripcion
 * @property string $error
 *
 * @package App\Models
 */
class BitacoraBashInscripcion extends Eloquent
{
	protected $table = 'bitacoraBashInscripcion';
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'unidadAcademica' => 'int',
		'extension' => 'int',
		'carrera' => 'int',
		'tipoInscripcion' => 'bool'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'carnet',
		'unidadAcademica',
		'extension',
		'carrera',
		'fecha',
		'tipoInscripcion',
		'error'
	];
}
