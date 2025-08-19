<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 26 Mar 2019 23:41:49 -0600.
 */

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Sancione
 *
 * @property int $carnet
 * @property int $ua
 * @property int $ext
 * @property int $car
 * @property int $cod_mov
 * @property Carbon $del
 * @property Carbon $al
 * @property string $usuario
 * @property Carbon $fecha_u
 * @property string $descripcion
 * @property int $anio
 * @property Carbon $fec_tram
 *
 * @package App\Models
 */
class Sanciones extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     */
    protected  $primaryKey = ['carnet', 'ua', 'ext', 'car', 'cod_mov', 'anio'];

    public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'ua' => 'int',
		'ext' => 'int',
		'car' => 'int',
		'cod_mov' => 'int',
		'anio' => 'int'
	];

	protected $dates = [
		'del',
		'al',
		'fecha_u',
		'fec_tram'
	];

	protected $fillable = [
		'del',
		'al',
		'usuario',
		'fecha_u',
		'descripcion',
		'fec_tram'
	];
}
