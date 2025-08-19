<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Feb 2019 21:30:59 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Becado
 * 
 * @property int $carnet
 * @property int $ua
 * @property bool $reingresoRegular
 * @property bool $reingresoPEG
 * @property bool $tramiteTitulo
 * @property string $usuario
 * @property Carbon $fechaRegistro
 *
 * @package App\Models
 */
class Becado extends Eloquent
{
	protected $table = 'becado';
	protected $primaryKey = 'carnet';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'ua' => 'int',
		'reingresoRegular' => 'bool',
		'reingresoPEG' => 'bool',
		'tramiteTitulo' => 'bool'
	];

	protected $dates = [
		'fechaRegistro'
	];

	protected $fillable = [
	    'carnet',
        'ua',
		'reingresoRegular',
		'reingresoPEG',
		'tramiteTitulo',
		'usuario',
		'fechaRegistro'
	];

    public function unidad_academica()
    {
        return $this->belongsTo('App\PortalAdministrativo\facultad', 'ua','codfac');
    }

    public function estudiante()
    {
        return $this->belongsTo('App\Models\EstudiaOld', 'carnet','carnet');
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('carnet', '=', $this->getAttribute('carnet'))
            ->where('ua', '=', $this->getAttribute('ua'));
        return $query;
    }
}
