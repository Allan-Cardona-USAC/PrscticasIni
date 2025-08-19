<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Feb 2019 17:21:52 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Municipio
 * 
 * @property float $cod_depto
 * @property float $cod_muni
 * @property float $cod_postal
 * @property string $municipio
 * @property float $postales
 * @property string $orden
 *
 * @package App\Models
 */
class Municipio extends Eloquent
{
	protected $table = 'municipio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cod_depto' => 'float',
		'cod_muni' => 'float',
		'cod_postal' => 'float',
		'postales' => 'float'
	];

	protected $fillable = [
		'municipio',
		'postales',
		'orden'
	];
}
