<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Aplicacion
 * 
 * @property int $codigo
 * @property string $nombre
 * @property float $version
 * 
 * @property Collection $permisos
 *
 * @package App\Models
 */
class Aplicacion extends Eloquent
{
	protected $table = 'aplicacion';
    protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'version' => 'float'
	];

	protected $fillable = [
		'nombre'
	];

	public function permisos()
	{
		return $this->hasMany(Permiso::class, 'cod_aplicacion');
	}
}
