<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Feb 2019 19:24:14 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class PruebaEspecifica
 * 
 * @property int $nov
 * @property int $ua
 * @property int $ext
 * @property int $car
 * @property string $resultado
 * @property float $nota
 * @property \Carbon\Carbon $fecha_aprobado
 * @property \Carbon\Carbon $fecha_caduca
 * @property int $ciclo
 * @property string $usuario
 * @property \Carbon\Carbon $fechaCarga
 * @property string $autorizacion
 *
 * @package App\Models
 */
class PruebaEspecifica extends Eloquent
{
	protected $table = 'PruebaEspecifica';
	public $incrementing = false;
	public $timestamps = false;


	protected $casts = [
		'nov' => 'int',
		'ua' => 'int',
		'ext' => 'int',
		'car' => 'int',
		'nota' => 'float',
		'ciclo' => 'int'
	];

	protected $dates = [
		'fecha_aprobado',
		'fecha_caduca',
		'fechaCarga'
	];

	protected $fillable = [
	    'nov',
        'ua',
        'ext',
        'car',
		'resultado',
		'nota',
		'fecha_aprobado',
		'fecha_caduca',
		'ciclo',
		'usuario',
		'fechaCarga',
		'autorizacion'
	];


    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('nov', '=', $this->getAttribute('nov'))
            ->where('ua', '=', $this->getAttribute('ua'))
            ->where('ext', '=', $this->getAttribute('ext'))
            ->where('car', '=', $this->getAttribute('car'));
        return $query;
    }
}
