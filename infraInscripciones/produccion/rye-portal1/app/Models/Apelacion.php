<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:11:56 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Apelacion
 * 
 * @property int $ciclo
 * @property int $correlativo
 * @property int $carnet
 * @property int $ua
 * @property \Carbon\Carbon $fechaApelacion
 * @property string $usuario
 * @property \Carbon\Carbon $fechaUsuario
 * @property string $dictamen
 * @property \Carbon\Carbon $fechaDictamen
 * @property bool $conLugar
 * @property \Carbon\Carbon $fechaAudiencia
 * @property string $resolucion
 * @property bool $confirmada
 * @property string $auxReg
 * @property string $usr2
 * @property \Carbon\Carbon $fechaUsr2
 * @property string $usr3
 * @property \Carbon\Carbon $fechaUsr3
 * @property string $observaciones
 *
 * @package App\Models
 */
class Apelacion extends Eloquent
{
	protected $table = 'apelacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ciclo' => 'int',
		'correlativo' => 'int',
		'carnet' => 'int',
		'ua' => 'int',
		'conLugar' => 'bool',
		'confirmada' => 'bool'
	];

	protected $dates = [
		'fechaApelacion',
		'fechaUsuario',
		'fechaDictamen',
		'fechaAudiencia',
		'fechaUsr2',
		'fechaUsr3'
	];

	protected $fillable = [
		'ua',
		'fechaApelacion',
		'usuario',
		'fechaUsuario',
		'dictamen',
		'fechaDictamen',
		'conLugar',
		'fechaAudiencia',
		'resolucion',
		'confirmada',
		'auxReg',
		'usr2',
		'fechaUsr2',
		'usr3',
		'fechaUsr3',
		'observaciones'
	];
}
