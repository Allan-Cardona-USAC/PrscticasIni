<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:13:18 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Class DocumentosEstudiante
 * 
 * @property string $carnet_vocacional
 * @property int $carnet_universitario
 * @property int $tarjeta_pcb
 * @property int $conocimientos_especificos
 * @property int $partida_nacimiento
 * @property int $cierre_pensum
 * @property int $fotostatica
 * @property int $certificado_estudios
 * @property int $autenticas
 * @property int $equiparacion
 * @property int $pg_tarjetaInscripcion
 * @property int $pg_cedula
 * @property int $pg_pasaporte
 * @property int $pg_certiActaGraduacion
 * @property int $provisional
 * @property int $fotoPosgrado
 * @property string $usuario
 * @property Carbon $fecha_u
 *
 * @package App\Models
 */

class DocumentosEstudiante extends Eloquent
{
    protected $table = 'documentos_estudiante';
	protected $primaryKey = 'carnet_universitario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet_universitario' => 'int',
		'tarjeta_pcb' => 'int',
		'conocimientos_especificos' => 'int',
		'partida_nacimiento' => 'int',
		'fotostatica' => 'int'
	];

	protected $dates = [
		'fecha_u'
	];

	protected $fillable = [
		'carnet_vocacional',
		'carnet_universitario',
		'tarjeta_pcb',
		'conocimientos_especificos',
		'partida_nacimiento',
		'fotostatica',
		'usuario',
		'fecha_u'
	];
}