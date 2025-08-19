<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Feb 2019 14:58:51 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Pcb
 * 
 * @property int $nov
 * @property bool $id_prueba
 * @property bool $oportunidad
 * @property bool $resultado
 * @property \Carbon\Carbon $f_aprobado
 * @property string $descripcion
 * @property string $usuario
 * @property \Carbon\Carbon $fec_carga
 * @property int $ciclo
 * @property string $usuario_actualiza
 * @property \Carbon\Carbon $fec_actualiza
 *
 * @package App\Models
 */
class Pcb extends Eloquent
{
	protected $table = 'pcb';
	public $incrementing = false;
	public $timestamps = false;
    protected $primaryKey = 'nov';


	protected $fillable = [
	    'nov',
        'id_prueba',
		'oportunidad',
		'resultado',
		'f_aprobado',
		'descripcion',
		'usuario',
		'fec_carga',
		'ciclo',
		'usuario_actualiza',
		'fec_actualiza'
	];


    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('nov', '=', $this->getAttribute('nov'))
            ->where('id_prueba', '=', $this->getAttribute('id_prueba'));
        return $query;
    }
}
