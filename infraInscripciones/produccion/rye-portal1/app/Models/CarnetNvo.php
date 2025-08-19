<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 May 2019 08:49:03 -0600.
 */

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CarnetNvo
 * 
 * @property int $ciclo
 * @property int $area
 * @property int $carnet
 * @property int $nov
 * @property string $usuario
 * @property Carbon $fecha_usuario
 *
 * @package App\Models
 * @method static where(array $array)
 */
class CarnetNvo extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected $primaryKey = ['ciclo', 'area', 'carnet'];
	protected $table = 'carnet_nvo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ciclo' => 'int',
		'area' => 'int',
		'carnet' => 'int',
		'nov' => 'int'
	];

	protected $dates = [
		'fecha_usuario'
	];

	protected $fillable = [
	    'ciclo',
        'area',
        'carnet',
		'nov',
		'usuario',
		'fecha_usuario'
	];
}
