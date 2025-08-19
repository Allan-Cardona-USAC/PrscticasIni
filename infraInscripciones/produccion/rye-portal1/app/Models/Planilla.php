<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Certificacion
 * 
 * @property int $carne
 * @property string $nombre
 * @property int $codfac
 * @property int $codext
 * @property int $codcar
 * @property int $cod_titulo
 * @property string $titulo
 * @property string $norec
 * @property int $monto
 * @property date $frecep
 * @property date $fec_cierre
 * @property date $fec_expri
 * @property date $fec_expub
 * @property date $fec_eps
 * @property date $fec_tesis
 * @property date $fec_gradua
 * @property string $actano
 * @property date $fec_recep
 * @property int $carnet_ant
 * @property int $anpla
 * @property int $nopla
 * @property int $noimp
 * @property int $notitulo
 * @property date $fferect
 * @property int $aprec
 * @property int $nprec
 * @property int $registro
 * @property string $usuario
 * @property timestamp $fecha_usuario
 * @property int $tipotramite
 * @property int $cuentareposicion
 * @package App\Models
 */
class Planilla extends Eloquent
{
	protected $table = 'planilla';
	protected $primaryKey = 'carnet';
	public $incrementing = false;
	public $timestamps =false;

	protected $casts = [
        'carne' => 'int',
        'nombre' => 'varchar',
        'codfac' => 'int',
        'codext' => 'int',
        'codcar' => 'int',
        'cod_titulo' => 'int',
        'titulo' => 'varchar',
        'norec' => 'varchar',
        'monto' => 'int',
        'frecep' => 'datetime',
        'fec_cierre' => 'datetime',
        'fec_expri' => 'datetime',
        'fec_expub' => 'datetime',
        'fec_eps' => 'datetime',
        'fec_tesis' => 'datetime',
        'fec_gradua' => 'datetime',
        'actano' => 'varchar',
        'fec_recep' => 'datetime',
        'carnet_ant' => 'int',
        'anpla' => 'int',
        'nopla' => 'int',
        'noimp' => 'int',
        'notitulo' => 'int',
        'fferect' => 'datetime',
        'aprec' => 'int',
        'nprec' => 'int',
        'registro' => 'int',
        'usuario' => 'varchar',
        'fecha_usuario' => 'timestamp',
        'tipotramite' => 'int',
        'cuentareposicion' => 'int'
	];

	protected $fillable = [
        'carne', 
        'nombre',
        'codfac',
        'codext',
        'codcar',
        'cod_titulo',
        'titulo',
        'norec',
        'monto',
        'frecep',
        'fec_cierre',
        'fec_expri',
        'fec_expub',
        'fec_eps',
        'fec_tesis',
        'fec_gradua',
        'actano',
        'fec_recep',
        'carnet_ant',
        'anpla',
        'nopla',
        'noimp',
        'notitulo',
        'fferect',
        'aprec',
        'nprec',
        'registro',
        'usuario',
        'fecha_usuario',
        'tipotramite',
        'cuentareposicion'
	];
}