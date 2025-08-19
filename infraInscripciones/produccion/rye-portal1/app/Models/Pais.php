<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 16 Apr 2019 19:49:37 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Pais
 *
 * @property int $codigo
 * @property string $nombre
 * @property string $nacionalidad
 *
 * @package App\Models
 */
class Pais extends Eloquent
{
    protected $table = 'pais';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'nacionalidad'
	];
}
