<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:22:24 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Facultad
 * 
 * @property bool $tipo_ua
 * @property int $codfac
 * @property string $nomfac
 * @property string $nomcorto
 * @property string $correo
 * @property bool $niv_tecnico
 * @property bool $niv_licenciatura
 * @property bool $niv_posgrado
 * @property int $depto
 * @property bool $rangoCarnet
 * @property string $wsPruebaBasica
 * @property string $wsPruebaEspecifica
 * 
 * @property \App\Models\TipoUA $tipo_u_a
 * @property \Illuminate\Database\Eloquent\Collection $extensions
 * @property \Illuminate\Database\Eloquent\Collection $planilla_egs
 * @property \Illuminate\Database\Eloquent\Collection $reglas
 * @property \Illuminate\Database\Eloquent\Collection $tipo_prueba_especificas
 *
 * @package App\Models
 */
class Facultad extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facultad';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'codfac';
	public $incrementing = false;
	public $timestamps = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
	protected $fillable = [
		'tipo_ua',
        'codfac',
		'nomfac',
		'nomcorto',
		'correo',
		'niv_tecnico',
		'niv_licenciatura',
		'niv_posgrado',
		'depto',
		'rangoCarnet',
		'wsPruebaBasica',
		'wsPruebaEspecifica'
	];

	public function tipo_unidad_academica()
	{
		return $this->belongsTo(\App\Models\TipoUA::class, 'tipo_ua','tipo');
	}

    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class,'depto','codigo');
    }

	public function extensions()
	{
		return $this->hasMany(\App\Models\Extension::class, 'codigo_unidad_academica');
	}

	public function planilla_egs()
	{
		return $this->hasMany(\App\Models\PlanillaEg::class, 'unidad');
	}

	public function reglas()
	{
		return $this->hasMany(\App\Models\Regla::class, 'codfac');
	}

	public function tipo_prueba_especificas()
	{
		return $this->hasMany(\App\Models\TipoPruebaEspecifica::class, 'ua');
	}
}
