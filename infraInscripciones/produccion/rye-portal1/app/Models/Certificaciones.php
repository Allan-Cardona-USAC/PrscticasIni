<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Certificacion
 * 
 * @property int $numero
 * @property int $ua
 * @property int $ciclo
 * @property int $carnet
 * @property string $usuario
 * @property timestamp $fecha_usr
 * @property string $transaccion
 * @property int $extension
 * @property int $carrera
 * @property string $descripcion
 * @property int $firma
 * @property int $estado
 * @property int $fechaVencimiento
 * @package App\Models
 */
class Certificaciones extends Eloquent
{
	protected $table = 'certificaciones';
	protected $primaryKey = 'numero';
	public $incrementing = false;
	public $timestamps =false;

	protected $casts = [
		'numero' => 'int',
		'ua' => 'int',
		'ciclo' => 'int',
		'carnet' => 'int',
		'usuario' => 'varchar',
		'fecha_usr' => 'datetime',
		'transaccion' => 'varchar',
		'extension' => 'int',
		'carrera' => 'int',
		'decripcion' => 'varchar',
		'firma' => 'int',
		'estado' => 'int',
		'fechaVencimiento'=> 'datetime',
	];

	protected $fillable = [
		'numero',
		'ua',
		'ciclo',
		'carnet',
		'usuario',
		'fecha_usr',
		'transaccion',
		'extension',
		'carrera',
		'descripcion',
		'firma',
		'estado',
		'fechaVencimiento',
	];

	public static function getCertificacionVigente($transaccion){
        return Certificaciones::where([
			['transaccion', '=', $transaccion],
            ['fechaVencimiento', '>=', date('Y-m-d')]
        ])->first();
    }
}