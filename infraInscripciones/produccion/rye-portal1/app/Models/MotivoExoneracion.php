<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 16 Jun 2019 23:47:52 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class MotivoExoneracion
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class MotivoExoneracion extends Eloquent
{
	protected $table = 'motivoExoneracion';
	public $timestamps = false;

	protected $fillable = [
	    'id',
		'nombre',
		'descripcion'
	];
}
