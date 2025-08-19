<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 10 Apr 2019 15:25:31 -0600.
 */

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ExtensionLugar
 * 
 * @property int $codigo_unidad_academica
 * @property int $codigo_extension
 * @property string $lugar_estudios
 *
 * @package App\Models
 */
class ExtensionLugar extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected $primaryKey = ['codigo_unidad_academica', 'codigo_extension'];

	protected $table = 'extension_lugar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_unidad_academica' => 'int',
		'codigo_extension' => 'int'
	];

	protected $fillable = [
		'lugar_estudios'
	];
}
