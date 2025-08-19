<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:30:24 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CicloActivo
 * 
 * @property int $ciclo_activo
 * @property int $semestre_activo
 * @property int $ciclo_web
 * @property bool $semestre_web
 * @property bool $oportunidad
 * @property int $ciclo_especificas
 * @property int $ciclo_padep
 * @property int $ciclo_web_pregrado
 * @property int $oportunidad_pregrado
 *
 * @package App\Models
 * @method static first()
 */
class CicloActivo extends Eloquent
{
	protected $table = 'ciclo_activo';
	protected $primaryKey = 'ciclo_activo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ciclo_activo' => 'int',
		'semestre_activo' => 'int',
		'ciclo_web' => 'int',
		'ciclo_especificas' => 'int',
		'semestre_web' => 'int',
		'oportunidad' => 'int',
		'ciclo_padep' => 'int',
		'ciclo_web_pregrado' => 'int',
		'oportunidad_pregrado' => 'int'
	];

	protected $fillable = [
		'semestre_activo',
		'ciclo_web',
		'ciclo_especificas',
		'semestre_web',
		'oportunidad',
		'ciclo_padep',
		'ciclo_web_pregrado',
		'oportunidad_pregrado'
	];
}
