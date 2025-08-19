<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Jun 2019 10:43:42 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class MatriculaExtranjero
 * 
 * @property int $id
 * @property int $carnet
 * @property Carbon $ciclo
 * @property int $unidadAcademica
 * @property int $extension
 * @property int $carrera
 * @property float $deuda
 * @property int $noPagosRestantes
 * 
 * @property Collection $boletas_extranjeros
 *
 * @package App\Models
 */
class MatriculaExtranjero extends Eloquent
{
	public $timestamps = false;
	public $table = 'matriculaExtranjeros';

	protected $casts = [
		'carnet' => 'int',
		'unidadAcademica' => 'int',
		'extension' => 'int',
		'carrera' => 'int',
		'deuda' => 'float',
		'noPagosRestantes' => 'int',
        'primerIngreso' => 'boolean'
	];

	protected $dates = [
		'ciclo'
	];

	protected $fillable = [
		'carnet',
		'ciclo',
		'unidadAcademica',
		'extension',
		'carrera',
		'deuda',
		'noPagosRestantes',
        'primerIngreso'
	];

	public function boletas_extranjeros()
	{
		return $this->hasMany(BoletasExtranjero::class, 'matricula');
	}

	public static function getBoletaVigente(int $carnet, int $unidadAcademica, int $extension, int $carrera){
	    return MatriculaExtranjero::where([
	        ['carnet', '=', $carnet],
            ['ciclo', '=', date('Y')],
            ['unidadAcademica', '=', $unidadAcademica],
            ['extension', '=', $extension],
            ['carrera', '=', $carrera]
        ])->with(['boletas_extranjeros' => function($query){
            $query->where([
                ['fecha_generacion', '>=', date('Y-m-d')],
                ['fecha_vencimiento', '<=', date('Y-m-d')]
            ]);
        }])->first();
    }
}
