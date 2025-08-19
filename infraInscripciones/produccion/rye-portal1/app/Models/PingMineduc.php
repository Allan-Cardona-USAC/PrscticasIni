<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:30:24 -0600.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * @property string $nov
 * @property string $cui
 * @property string $reg_titulo
 * @property string $apellidos
 * @property string $nombres
 * @property string $fecha_nacimiento
 * @property string $promovido
 * @property string $fecha_promocion
 * @property string $codigo_carrera
 * @property string $nombre_carrera
 * @property string $codigo_establecimiento
 * @property string $nombre_establecimiento
 * @property string $codigo_sector
 * @property \Illuminate\Database\Eloquent\Collection 
 *
 * @package App\Models
 */
class PingMineduc extends Eloquent
{

    protected $keytype = 'string';
	protected $table = 'ping_mineduc';
	protected $primaryKey = 'nov';
	public $incrementing = false;
	public $timestamps = false;

    
	protected $casts = [
		'nov' => 'varchar', 
		'cui'=> 'varchar',
		'reg_titulo' => 'varchar',
		'apellidos' => 'varchar', 
		'nombres' => 'varchar',
        'fecha_nacimiento' =>  'varchar',
        'promovido' => 'varchar',
        'fecha_promocion' => 'varchar',
        'codigo_carrera' => 'varchar',
        'nombre_carrera' =>  'varchar',
        'codigo_establecimiento' =>  'varchar',
        'nombre_establecimiento' =>  'varchar',
        'codigo_sector' =>  'varchar'
	];

	protected $fillable = [
		'nov',
		'cui',
		'reg_titulo',
		'apellidos',
		'nombres',
        'fecha_nacimiento',
        'promovido',
        'fecha_promocion',
        'codigo_carrera',
        'nombre_carrera',
        'codigo_establecimiento',
        'nombre_establecimiento',
        'codigo_sector'
	];
}
