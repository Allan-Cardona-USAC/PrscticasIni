<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:15:03 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\Traits\HasCompositePrimaryKey;

/**
 * Class CarreraTemporal
 * 
 * @property int $codigo_unidad_academica
 * @property int $codigo_extension
 * @property int $codigo_carrera
 * @property bool $codigo_nivel
 * @property bool $estado
 * @property string $nombre_carrera
 * @property string $titulo_masculino
 * @property string $titulo_femenino
 * @property string $telefono
 * @property string $email
 * @property string $pagina_web
 * @property \Carbon\Carbon $fecha_activacion
 * @property \Carbon\Carbon $fecha_creacion
 * @property bool $estado_ingreso
 * @property bool $estado_reingreso
 * @property bool $estado_peg
 * @property bool $estado_graduados
 * @property bool $requiere_cierre
 * @property bool $requiere_privado
 * @property bool $requiere_publico
 * @property bool $requiere_eps
 * @property bool $requiere_tesis
 * @property bool $prerequisito
 * @property string $descripcion
 * @property string $usuario
 * @property \Carbon\Carbon $fecha_u
 * @property int $car_multiple
 * @property string $regimen
 * @property bool $pruebaEspecifica
 * 
 * @property \Illuminate\Database\Eloquent\Collection $detalle_reglas
 *
 * @package App\Models
 */
class CarreraTemporal extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected  $primaryKey = ['codigo_unidad_academica', 'codigo_extension', 'codigo_carrera'];

	protected $table = 'carrera_temporal';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_unidad_academica' => 'int',
		'codigo_extension' => 'int',
		'codigo_carrera' => 'int',
		'codigo_nivel' => 'int',
		'estado' => 'bool',
		'estado_ingreso' => 'bool',
		'estado_reingreso' => 'bool',
		'estado_peg' => 'bool',
		'estado_graduados' => 'bool',
		'requiere_cierre' => 'bool',
		'requiere_privado' => 'bool',
		'requiere_publico' => 'bool',
		'requiere_eps' => 'bool',
		'requiere_tesis' => 'bool',
		'prerequisito' => 'bool',
		'car_multiple' => 'int',
		'pruebaEspecifica' => 'bool'
	];

	protected $dates = [
		'fecha_activacion',
		'fecha_creacion',
		'fecha_u'
	];

	protected $fillable = [
		'codigo_nivel',
		'estado',
		'nombre_carrera',
		'titulo_masculino',
		'titulo_femenino',
		'telefono',
		'email',
		'pagina_web',
		'fecha_activacion',
		'fecha_creacion',
		'estado_ingreso',
		'estado_reingreso',
		'estado_peg',
		'estado_graduados',
		'requiere_cierre',
		'requiere_privado',
		'requiere_publico',
		'requiere_eps',
		'requiere_tesis',
		'prerequisito',
		'descripcion',
		'usuario',
		'fecha_u',
		'car_multiple',
		'regimen',
		'pruebaEspecifica'
	];

	public function detalle_reglas()
	{
		return $this->hasMany(\App\Models\DetalleRegla::class, 'codigo_unidad_academica');
	}

	public static function buscarCarrera($ua, $ext, $car){
		return CarreraTemporal::where([
			['codigo_unidad_academica', '=', $ua],
			['codigo_extension', '=', $ext],
			['codigo_carrera', '=', $car]
		])->first();
	}
}
