<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class AreaGeografica
 * 
 * @property int $codigo_area_geografica
 * @property int $codigo_area_superior
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class AreaGeografica extends Eloquent
{
	protected $table = 'area_geografica';
	protected $primaryKey = 'codigo_area_geografica';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_area_geografica' => 'int',
		'codigo_area_superior' => 'int'
	];

	protected $fillable = [
		'codigo_area_superior',
        'pais',
		'nombre',
		'descripcion'
	];
}
