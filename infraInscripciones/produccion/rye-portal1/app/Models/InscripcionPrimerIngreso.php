<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Jun 2019 08:18:00 -0600.
 */

namespace App\Models;

use App\PortalAdministrativo\carrera;
use App\PortalAdministrativo\extension;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class InscripcionPrimerIngreso
 *
 * @property int $nov
 * @property bool $sinProblemas
 * @property Carbon $cita
 * @property bool $foto
 * @property bool $certificadoNacimiento
 * @property bool $pasaporte
 * @property bool $tituloDiversificado
 * @property bool $cierrePensum
 * @property int $unidadAcademica
 * @property int $extension
 * @property int $carrera
 * @property bool $confirmoCarrera
 *
 * @package App\Models
 */
class InscripcionPrimerIngreso extends Eloquent
{
	protected $table = 'inscripcionPrimerIngreso';
	protected $primaryKey = 'nov';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nov' => 'int',
		'sinProblemas' => 'bool',
		'foto' => 'int',
		'certificadoNacimiento' => 'int',
		'pasaporte' => 'int',
		'tituloDiversificado' => 'int',
		'cierrePensum' => 'int',
		'unidadAcademica' => 'int',
		'extension' => 'int',
		'carrera' => 'int',
		'confirmoCarrera' => 'bool',
		'ciclo' => 'int'
	];

	protected $datetime = [
		'cita'
	];

	protected $fillable = [
		'sinProblemas',
		'cita',
		'foto',
		'certificadoNacimiento',
		'pasaporte',
		'tituloDiversificado',
		'cierrePensum',
		'unidadAcademica',
		'extension',
		'carrera',
		'confirmoCarrera',
		'ciclo'
	];

	public function esExtranjero(){
        if($this->pasaporte==0)
        {
            return false;
        }else
        {
            return true;
        }
    }

	public function getNombreCompleto(){
	    return InformacionAspirante::find($this->nov)->getNombreCompleto();
    }

    public  function  getDatos(){
	    return InformacionAspirante::find($this->nov);
    }


    public  function  getFechaNacimiento(){
        return Carbon::parse($this->getDatos()->fecha_nacimiento)->format('d/m/Y');
    }

    public function getCodigoDosDigitos($codigo){
	    return str_pad($codigo, 2, "0", STR_PAD_LEFT);
    }

    public function getnombreCarrera(){
	    $carrera = carrera::where('codigo_unidad_academica',$this->unidadAcademica)
            ->where('codigo_extension',$this->extension)
            ->where('codigo_carrera',$this->carrera)
            ->first();
        return $carrera->nombre_carrera;
    }

    public function getnombreUA(){
        $ua = Facultad::find($this->unidadAcademica);
	    return $ua->nomfac;
    }

    public function getnombreExtension(){
        $extension = extension::where('codigo_unidad_academica',$this->unidadAcademica)
            ->where('codigo_extension',$this->extension)
            ->first();

        return $extension->nombre;
    }

    public function lugarExtension()
    {
        $extensionLugar = ExtensionLugar::where('codigo_unidad_academica',$this->unidadAcademica)
            ->where('codigo_extension',$this->extension)->first();
        return  $extensionLugar->lugar_estudios;
    }


}
