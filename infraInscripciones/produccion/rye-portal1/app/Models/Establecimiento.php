<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 10:11:03 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Establecimiento
 * 
 * @property string $codigo
 * @property int $depto
 * @property int $muni
 * @property int $postal
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $jornada
 * @property string $observaciones
 * @property string $por_madurez
 * @property string $sector
 * @property string $area
 * @property string $tipo
 * @property string $modalidad
 * @property bool $sec
 * @property string $estado
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Establecimiento extends Eloquent
{
	protected $table = 'establecimiento';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'depto' => 'int',
		'muni' => 'int',
		'postal' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'depto',
		'muni',
		'postal',
		'nombre',
		'direccion',
		'telefono',
		'jornada',
		'observaciones',
		'por_madurez',
		'sector',
		'area',
		'tipo',
		'modalidad',
		'sec',
		'estado',
		'fecha'
	];
}
