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
 * @property float $id
 * @property string $etnia
 * @property string $idioma
 *
 * @package App\Models
 */
class Etnia extends Eloquent
{
    protected $table = 'etnia';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'float'
	];

	protected $fillable = [
		'etnia',
		'idioma'
	];
}
