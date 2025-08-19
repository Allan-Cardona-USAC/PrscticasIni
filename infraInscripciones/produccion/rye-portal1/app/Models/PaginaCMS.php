<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 05 Mar 2019 20:32:51 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class PaginaCM
 * 
 * @property int $idPagina
 * @property string $nombre
 * @property string $ruta
 * @property Carbon $fechaCreacion
 * @property Carbon $fechaModificacion
 * @property string $estado
 * @property int $idCategoria
 * 
 * @property CategoriaCMS $categoria_c_m
 *
 * @package App\Models
 */
class PaginaCMS extends Eloquent
{
	protected $table = 'PaginaCMS';
	public $primaryKey = "idPagina";
	public $incrementing = true;

    const CREATED_AT = "fechaCreacion";
    const UPDATED_AT = "fechaModificacion";

	protected $fillable = [
	    'idPagina',
		'nombre',
		'ruta',
		'estado',
        'icono',
        'idCategoria'
	];

	public function categoria()
	{
		return $this->belongsTo(CategoriaCMS::class, 'idCategoria');
	}
}
