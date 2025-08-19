<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 00:09:15 -0600.
 */

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EventoElectoral
 * 
 * @property int $ciclo
 * @property int $correlativo
 * @property int $ua
 * @property int $num_evento
 * @property bool $agrupacion
 * @property int $ext
 * @property int $car
 * @property bool $tipo
 * @property string $eleccion
 * @property Carbon $vuelta_1
 * @property Carbon $vuelta_2
 * @property Carbon $vuelta_3
 * @property Carbon $f_congelamiento
 * @property Carbon $f_entrega_calificacion
 * @property int $electores
 * @property int $blancas
 * @property int $bol_inicial
 * @property int $bol_final
 * @property bool $cancelado
 * @property Carbon $fechaListaInicial
 * @property Carbon $f_entrega_material
 * @property bool $evento_resuelto
 * @property int $bol_utilizadas
 * @property int $regla
 * @property bool $calificacion_en_linea
 * @property bool $dobleFecha
 *
 * @package App\Models
 */
class EventoElectoral extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     */
    protected  $primaryKey = ['ciclo', 'correlativo'];

	protected $table = 'evento_electoral';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ciclo' => 'int',
		'correlativo' => 'int',
		'ua' => 'int',
		'num_evento' => 'int',
		'agrupacion' => 'bool',
		'ext' => 'int',
		'car' => 'int',
		'tipo' => 'bool',
		'electores' => 'int',
		'blancas' => 'int',
		'bol_inicial' => 'int',
		'bol_final' => 'int',
		'cancelado' => 'bool',
		'evento_resuelto' => 'bool',
		'bol_utilizadas' => 'int',
		'regla' => 'int',
		'calificacion_en_linea' => 'bool',
		'dobleFecha' => 'bool'
	];

	protected $dates = [
		'vuelta_1',
		'vuelta_2',
		'vuelta_3',
		'f_congelamiento',
		'f_entrega_calificacion',
		'fechaListaInicial',
		'f_entrega_material'
	];

	protected $fillable = [
		'ua',
		'num_evento',
		'agrupacion',
		'ext',
		'car',
		'tipo',
		'eleccion',
		'vuelta_1',
		'vuelta_2',
		'vuelta_3',
		'f_congelamiento',
		'f_entrega_calificacion',
		'electores',
		'blancas',
		'bol_inicial',
		'bol_final',
		'cancelado',
		'fechaListaInicial',
		'f_entrega_material',
		'evento_resuelto',
		'bol_utilizadas',
		'regla',
		'calificacion_en_linea',
		'dobleFecha'
	];
}
