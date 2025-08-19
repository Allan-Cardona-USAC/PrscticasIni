<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:30:24 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * 
 * 
 * 
 */
class PingRegistro extends Eloquent
{
	protected $table = 'ping_registro';
	protected $primaryKey = 'nov';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nov' => 'bigint',
		'foto'=> 'tinyint',
		'certificado' => 'tinyint',
		'cui' => 'decimal:13', //Numero de decimales requerido
		'registro_titulo' => 'varchar',
        'ua' =>  'tinyint',
        'ext' => 'tinyint',
        'car' => 'tinyint',
        'validaciones' => 'tinyint',
        'ciclo' => 'int'
	];

	protected $fillable = [
		'nov',
		'foto',
		'certificado',
		'cui',
		'registro_titulo',
        'ua',
        'ext',
        'car',
        'validaciones',
        'ciclo'
	];
}
