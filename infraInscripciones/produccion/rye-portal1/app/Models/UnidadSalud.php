<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 26 Feb 2019 20:06:44 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class UnidadSalud
 * 
 * @property int $carnet
 * @property string $nombre
 *
 * @package App\Models
 */
class UnidadSalud extends Eloquent
{
	protected $table = 'unidadSalud';
	protected $primaryKey = 'carnet';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int'
	];

	protected $fillable = [
		'nombre'
	];
}
