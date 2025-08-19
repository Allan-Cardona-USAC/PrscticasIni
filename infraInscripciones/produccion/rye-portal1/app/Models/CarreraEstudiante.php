<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:16:48 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\Traits\HasCompositePrimaryKey;

/**
 * Class CarreraEstudiante
 * 
 * @property int $carnet
 * @property int $codfac
 * @property int $codext
 * @property int $codcar
 * @property \Carbon\Carbon $fecha_entrada
 * @property int $sit_acad
 * @property \Carbon\Carbon $fec_block
 * @property int $cal_elec
 * @property \Carbon\Carbon $fec_cierre
 * @property \Carbon\Carbon $fec_expri
 * @property \Carbon\Carbon $fec_tesis
 * @property \Carbon\Carbon $fec_eps
 * @property \Carbon\Carbon $fec_expub
 * @property \Carbon\Carbon $fec_gradua
 * @property int $carnet_ant
 * @property int $tipo_carnet
 * @property int $cambio
 * @property int $repitencia
 * @property int $habilitado
 * @property int $activo
 * @property string $usuario
 * @property \Carbon\Carbon $fecha_usr
 * @property int $migrar
 * @property int $estado_graduado
 * @property string $acta_privado
 * @property string $acta_publico
 * @property bool $tipoRegistro
 * @property int $provisional
 * 
 * @property \Illuminate\Database\Eloquent\Collection $detalle_planilla_egs
 *
 * @package App\Models
 */
class CarreraEstudiante extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected $primaryKey = ['carnet', 'codfac', 'codext', 'codcar'];

	protected $table = 'carrera_estudiante';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'codfac' => 'int',
		'codext' => 'int',
		'codcar' => 'int',
		'sit_acad' => 'int',
		'cal_elec' => 'int',
		'carnet_ant' => 'int',
		'tipo_carnet' => 'int',
		'cambio' => 'int',
		'repitencia' => 'int',
		'habilitado' => 'int',
		'activo' => 'int',
		'migrar' => 'int',
		'estado_graduado' => 'int',
		'tipoRegistro' => 'bool',
		'provisional' => 'int'
	];

	protected $dates = [
		'fecha_entrada',
		'fec_block',
		'fec_cierre',
		'fec_expri',
		'fec_tesis',
		'fec_eps',
		'fec_expub',
		'fec_gradua',
		'fecha_usr'
	];

	protected $fillable = [
		'fecha_entrada',
		'sit_acad',
		'fec_block',
		'cal_elec',
		'fec_cierre',
		'fec_expri',
		'fec_tesis',
		'fec_eps',
		'fec_expub',
		'fec_gradua',
		'carnet_ant',
		'tipo_carnet',
		'cambio',
		'repitencia',
		'habilitado',
		'activo',
		'usuario',
		'fecha_usr',
		'migrar',
		'estado_graduado',
		'acta_privado',
		'acta_publico',
		'tipoRegistro',
		'carnet',
		'codfac',
		'codext',
		'codcar',
		'provisional'
	];

	public function detalle_planilla_egs()
	{
		return $this->hasMany(\App\Models\DetallePlanillaEg::class, 'carnet');
	}

    public function carrera()
    {
        return $this->belongsTo('App\PortalAdministrativo\carrera', 'codcar','codigo_carrera')
            ->where('codigo_extension',$this->codext)
            ->where('codigo_unidad_academica',$this->codfac)
            ;
    }
    
    public function estado()
    {

        if($this->sit_acad == 0 && $this->activo == 1 && $this->habilitado == 1 && $this->repitencia == 0
            || $this->sit_acad == 1 && $this->activo == 1 && $this->habilitado == 0 && $this->repitencia == 0
            || $this->sit_acad == 2 && $this->activo == 1 && $this->habilitado == 0 && $this->repitencia == 0
            || $this->sit_acad == 3 && $this->activo == 1 && $this->habilitado == 0 && $this->repitencia == 0
            || $this->sit_acad == 4 && $this->activo == 1 && $this->habilitado == 0 && $this->repitencia == 0
        )
        {
            return("Activa");
        }
        else
        {
            return("Inactiva");
        }
    }
}
