<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Feb 2019 17:24:05 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Postal
 * 
 * @property int $codigo_area_geografica
 * @property int $codigo_area_superior
 * @property string $pais
 * @property string $nacionalidad
 * @property int $cod_pais
 * @property int $cod_depto
 * @property int $cod_muni
 * @property int $cod_postal
 * @property string $orden
 * @property string $municipio
 * @property int $cod_postal2
 *
 * @package App\Models
 */
class Postal extends Eloquent
{
	protected $table = 'postal';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_area_geografica' => 'int',
		'codigo_area_superior' => 'int',
		'cod_pais' => 'int',
		'cod_depto' => 'int',
		'cod_muni' => 'int',
		'cod_postal' => 'int',
		'cod_postal2' => 'int'
	];

	protected $fillable = [
		'codigo_area_geografica',
		'codigo_area_superior',
		'pais',
		'nacionalidad',
		'orden',
		'municipio',
		'cod_postal2'
	];
}
