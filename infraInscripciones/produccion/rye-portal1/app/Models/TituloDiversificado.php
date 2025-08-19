<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 11:38:17 -0600.
 */

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TituloDiversificado
 * 
 * @property int $codigo_titulo_diversificado
 * @property int $codigo_tipo_titulo_diversificado
 * @property int $ctitulo
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class TituloDiversificado extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected $primaryKey = ['codigo_titulo_diversificado', 'codigo_tipo_titulo_diversificado'];

	protected $table = 'titulo_diversificado';
	public $timestamps = false;

	protected $casts = [
		'codigo_tipo_titulo_diversificado' => 'int',
		'ctitulo' => 'int'
	];

	protected $fillable = [
		'ctitulo',
		'nombre',
		'descripcion'
	];
}
