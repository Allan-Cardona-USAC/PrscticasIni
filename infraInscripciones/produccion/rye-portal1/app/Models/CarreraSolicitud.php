<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 29 Jul 2019 23:20:48 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CarreraSolicitud
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
 * @property Carbon $fecha_solicitud
 * @property Carbon $fecha_creacion
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
 * @property Carbon $fecha_u
 * @property int $car_multiple
 * @property string $regimen
 * @property bool $pruebaEspecifica
 * @property string $observacioens
 *
 * @package App\Models
 */
class CarreraSolicitud extends Eloquent
{
	protected $table = 'carrera_solicitud';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_unidad_academica' => 'int',
		'codigo_extension' => 'int',
		'codigo_carrera' => 'int',
		'codigo_nivel' => 'bool',
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
		'fecha_solicitud',
		'fecha_creacion',
		'fecha_u'
	];

	protected $fillable = [
        'codigo_unidad_academica',
        'codigo_extension',
        'codigo_carrera',
        'codigo_nivel',
        'estado',
        'nombre_carrera',
        'titulo_masculino',
        'titulo_femenino',
        'telefono',
        'email',
        'pagina_web',
        'fecha_solicitud',
        'fecha_creacion',
        'estado_ingreso',
        'estado_reingreso',
        'estado_peg',
        'estado_graduados',
        'requiere_cierrre',
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
        'pruebaEspecifica',
        'observaciones',
        'copia_acta'

    ];


    public function unidad_academica()
    {
        return $this->belongsTo('App\PortalAdministrativo\facultad', 'codigo_unidad_academica','codfac');
    }

    public function extension()
    {
        return $this->belongsTo('App\PortalAdministrativo\extension', 'codigo_extension','codigo_extension')->where('codigo_unidad_academica',$this->codigo_unidad_academica);
    }

    public function nivel_academico()
    {
        return $this->belongsTo('App\Models\NivelAcademico', 'codigo_nivel','codigo_nivel_academico');
    }

    /**
     * Override para poder actualizar registros con llave primaria compuesta.
     *
     *
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('codigo_carrera', '=', $this->getAttribute('codigo_carrera'))
            ->where('codigo_extension', '=', $this->getAttribute('codigo_extension'))
            ->where('codigo_unidad_academica', '=', $this->getAttribute('codigo_unidad_academica'));
        return $query;
    }


    public  function  getCodigoCarrera()
    {
        return str_pad($this->codigo_carrera, 2, "0", STR_PAD_LEFT);
    }






}
