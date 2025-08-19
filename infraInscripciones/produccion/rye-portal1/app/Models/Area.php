<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Area
 * 
 * @property int $codigo_area
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class Area extends Eloquent
{
	protected $table = 'area';
	protected $primaryKey = 'codigo_area';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_area' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion'
	];
}
