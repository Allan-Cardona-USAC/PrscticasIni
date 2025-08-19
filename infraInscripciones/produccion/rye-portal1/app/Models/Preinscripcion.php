<?php

namespace App\Models;

use App\PortalAdministrativo\carrera;
use App\PortalAdministrativo\extension;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model  as Eloquent;

class Preinscripcion extends Eloquent
{
	protected $table = 'preinscripcion';
	protected $primaryKey = 'nov';
	public $incrementing = false;
	public $timestamps = false;


	protected $casts = [
		'nov' => 'int',
		'ciclo' => 'int',
		'UA' => 'int',
		'car' => 'int',
		'ext' => 'int'
	];

	protected $dates = [
		'fecha_preinscripcion',
		'fecha_inscripcion'
	];
	protected $fillable = [
	    'nov',
        'ciclo',
        'UA',
        'ext',
		'car',
		'fecha_preinscripcion'

	];


	 public function getnombreCarrera(){
	    $carrera = carrera::where('codigo_unidad_academica',$this->UA)
            ->where('codigo_extension',$this->ext)
            ->where('codigo_carrera',$this->car)
            ->first();
        return $carrera->nombre_carrera;
    }

    public function getnombreUA(){
        $ua = Facultad::find($this->UA);
	    return $ua->nomfac;
    }

    public function getnombreExtension(){
        $extension = extension::where('codigo_unidad_academica',$this->UA)
            ->where('codigo_extension',$this->ext)
            ->first();

        return $extension->nombre;
    }




}
