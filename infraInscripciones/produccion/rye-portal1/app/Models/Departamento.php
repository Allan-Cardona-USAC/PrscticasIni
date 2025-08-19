<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Feb 2019 17:20:27 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Departamento
 * 
 * @property int $codigo
 * @property string $nombre
 * @property int $codPostal
 * @property string $orden
 *
 * @package App\Models
 */
class Departamento extends Eloquent
{
	protected $table = 'departamento';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'codPostal' => 'int'
	];

	protected $fillable = [
		'nombre',
		'codPostal',
		'orden'
	];
}
