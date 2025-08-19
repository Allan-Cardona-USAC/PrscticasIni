<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 26 Mar 2019 23:37:00 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Aspirante
 * 
 * @property int $nov
 * @property string $apellido1
 * @property string $apellido2
 * @property string $nombre1
 * @property string $nombre2
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 * @property int $celular
 * @property Carbon $fecha_nacimiento
 * @property bool $estado_civil
 * @property bool $sexo
 * @property string $orden
 * @property int $registro
 * @property int $cod_Establecimiento
 * @property string $nombre_establecimiento
 * @property string $direccion_establecimiento
 * @property int $cod_diversificado
 * @property string $titulo_diversificado
 * @property int $status
 * @property string $pin
 * @property string $correo
 * @property bool $enlinea
 * @property Carbon $fec_nov
 * @property Carbon $fec_carga
 * @property string $usuario
 * @property string $pin_hash
 * @property string $remember_token
 * @property string $email_verified_at
 *
 * @package App\Models
 */
class Aspirante extends Eloquent
{
    protected $table = 'aspirantes';
	protected $primaryKey = 'nov';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nov' => 'int',
		'celular' => 'int',
		'estado_civil' => 'int',
		'sexo' => 'int',
		'registro' => 'int',
		'cod_Establecimiento' => 'int',
		'cod_diversificado' => 'int',
		'status' => 'int',
		'enlinea' => 'bool',
		'verification_state' => 'bool'
	];

	protected $dates = [
		'fecha_nacimiento',
		'fec_nov',
		'fec_carga'
	];

	protected $hidden = [
		'remember_token',
		'verification_token'
	];

	protected $fillable = [
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		'nombre',
		'apellido',
		'direccion',
		'telefono',
		'celular',
		'fecha_nacimiento',
		'estado_civil',
		'sexo',
		'orden',
		'registro',
		'cod_Establecimiento',
		'nombre_establecimiento',
		'direccion_establecimiento',
		'cod_diversificado',
		'titulo_diversificado',
		'status',
		'pin',
		'correo',
		'enlinea',
		'fec_nov',
		'fec_carga',
		'usuario',
		'pin_hash',
		'remember_token',
		'email_verified_at',
		'verification_state',
		'verification_token'
	];
}
