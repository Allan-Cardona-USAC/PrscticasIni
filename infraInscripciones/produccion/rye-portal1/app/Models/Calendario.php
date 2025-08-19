<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:30:24 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * 
 * 
 * 
 */
class Calendario extends Eloquent
{
	protected $table = 'calendario';
	protected $primaryKey = 'ciclo_activo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ua' => 'tinyint',
		'ciclo'=> 'smallint',
		'oportunidad' => 'tinyint',
		'fecha_inicio' => 'date',
		'fecha_fin' => 'date'
	];

	protected $fillable = [
		'ua',
		'ciclo',
		'oportunidad',
		'fecha_inicio',
		'fecha_fin'
	];
}
