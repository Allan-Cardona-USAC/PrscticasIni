<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Apr 2019 10:17:12 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Etnium
 * 
 * @property int $cod_discapacidad
 * @property string $discapacidad
 *
 * @package App\Models
 */
class Discapacidad extends Eloquent
{
    protected $table = 'discapacidad';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cod_discapacidad' => 'int'
	];

	protected $fillable = [
		'discapacidad'
	];
}
