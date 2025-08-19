<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class AreaCarrera
 * 
 * @property int $codigo_area_carrera
 * @property string $nombre
 * @property string $nota
 *
 * @package App\Models
 */
class AreaCarrera extends Eloquent
{
	protected $table = 'area_carrera';
	protected $primaryKey = 'codigo_area_carrera';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_area_carrera' => 'int'
	];

	protected $fillable = [
		'nombre',
		'nota'
	];
}
