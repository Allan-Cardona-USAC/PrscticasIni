<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 22 Sep 2021
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BitacoraCarnet
 *
 * @property int $codigo
 * @property string $carnet
 * @property date $fecha
 * @property varchar $descripcion
 * @property varchar $usuario_dependencia
 * @property varchar $usuario_login
 *
 * @property Collection $permisos
 *
 * @package App\Models
 */
class BitacoraCarnet extends Eloquent
{
	protected $table = 'bitacora_imprime_carnet';
    protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'carnet' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'descripcion',
		'usuario_dependencia',
		'usuario_login'
	];

}
