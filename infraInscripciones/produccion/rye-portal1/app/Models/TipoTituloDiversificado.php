<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 17 May 2019 10:46:41 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TipoTituloDiversificado
 * 
 * @property int $codigo_tipo_titulo_diversificado
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class TipoTituloDiversificado extends Eloquent
{
	protected $table = 'tipo_titulo_diversificado';
	protected $primaryKey = 'codigo_tipo_titulo_diversificado';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_tipo_titulo_diversificado' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion'
	];
}
