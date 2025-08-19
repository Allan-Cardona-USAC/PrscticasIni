<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 22:34:22 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class PrecioMatricula
 * 
 * @property int $region
 * @property string $nombre
 * @property float $pregradoInicial
 * @property float $pregrado
 * @property float $pregradoTotal
 * @property float $postgrado
 *
 * @package App\Models
 */
class PrecioMatricula extends Eloquent
{
	protected $table = 'precioMatricula';
	protected $primaryKey = 'region';
	public $timestamps = false;

	protected $casts = [
		'pregradoInicial' => 'float',
		'pregrado' => 'float',
		'pregradoTotal' => 'float',
		'postgrado' => 'float'
	];

	protected $fillable = [
		'nombre',
		'pregradoInicial',
		'pregrado',
		'pregradoTotal',
		'postgrado'
	];
}
