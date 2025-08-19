<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Jun 2019 22:45:46 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use \App\PortalAdministrativo\facultad;

class TempPruebaEspecifica extends Model
{
	protected $table = 'temp_PruebaEspecifica';
	public $incrementing = false;

	public $primaryKey = 'nov';

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

    public $timestamps = false;

    public function unidad_academica()
    {
        return $this->belongsTo('App\PortalAdministrativo\facultad', 'ua','codfac');
    }

    public function extension()
    {
        return $this->belongsTo('App\PortalAdministrativo\extension', 'ext','codigo_extension')->where('codigo_unidad_academica',$this->ua);
    }

    public function carrera()
    {
        return $this->belongsTo('App\PortalAdministrativo\carrera', 'car','codigo_carrera')->where('codigo_unidad_academica',$this->ua)->where('codigo_extension',$this->ext);
    }

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
