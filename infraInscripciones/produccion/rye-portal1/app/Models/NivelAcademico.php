<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 26 May 2019 00:24:36 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class NivelAcademico
 * 
 * @property string $clase
 * @property bool $codigo_nivel_academico
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class NivelAcademico extends Eloquent
{
	protected $table = 'nivel_academico';
	protected $primaryKey = 'codigo_nivel_academico';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'clase',
		'nombre',
		'descripcion'
	];
}
