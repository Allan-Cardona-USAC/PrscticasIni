<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Apr 2019 19:50:22 -0600.
 */

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class PcbCarrera
 * 
 * @property int $ua
 * @property int $ext
 * @property int $car
 * @property int $id_pcb
 *
 * @package App\Models
 */
class PcbCarrera extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected $primaryKey = ['ua', 'ext', 'car', 'id_pcb'];

	protected $table = 'pcb_carrera';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ua' => 'int',
		'ext' => 'int',
		'car' => 'int',
		'id_pcb' => 'int'
	];

    protected $fillable = [
        'ua' ,
        'ext',
        'car',
        'id_pcb'
    ];


    /**
     * Override para poder actualizar registros con llave primaria compuesta.
     *
     *
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('ua', '=', $this->getAttribute('ua'))
            ->where('ext', '=', $this->getAttribute('ext'))
            ->where('car', '=', $this->getAttribute('car'))
            ->where('id_pcb', '=', $this->getAttribute('id_pcb'));
        return $query;
    }


}
