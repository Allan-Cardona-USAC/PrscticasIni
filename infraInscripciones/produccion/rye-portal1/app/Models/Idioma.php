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
 * @property int $cod_idioma
 * @property string $idioma
 *
 * @package App\Models
 */
class Idioma extends Eloquent
{
    protected $table = 'idioma';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cod_idioma' => 'int'
	];

	protected $fillable = [
		'idioma'
	];
}
