<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TipoEstablecimiento extends Eloquent
{
    protected $table = 'tipo_establecimiento';
	protected $primaryKey = 'codigo_tipo_establecimiento';
	public $incrementing = false;
	public $timestamps = false;


	protected $casts = [
		'codigo_tipo_establecimiento' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion'
	];
}
