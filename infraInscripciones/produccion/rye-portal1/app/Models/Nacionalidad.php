<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 12 Apr 2019 11:11:16 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Nacionalidad
 * 
 * @property int $codigo_nacionalidad
 * @property int $codigo_area_geografica
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class Nacionalidad extends Eloquent
{
	protected $table = 'nacionalidad';
	protected $primaryKey = 'codigo_nacionalidad';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_nacionalidad' => 'int',
		'codigo_area_geografica' => 'int'
	];

	protected $fillable = [
		'codigo_area_geografica',
		'nombre',
		'descripcion'
	];
}
