<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ApPrograma
 * 
 * @property int $aplicacion
 * @property int $id
 * @property string $archivo
 * @property string $descripcion
 *
 * @package App\Models
 */
class ApPrograma extends Eloquent
{
	protected $table = 'ap_programa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'aplicacion' => 'int',
		'id' => 'int'
	];

	protected $fillable = [
		'archivo',
		'descripcion'
	];
}
