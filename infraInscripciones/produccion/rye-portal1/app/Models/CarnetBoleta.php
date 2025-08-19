<?php

/**
 * Created by Reliese Model.
 * Date: Tuesday, 03 Ag 2021 11:42:00 -0600.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BitacoraInscripcion
 *
 * @property int $id_orden_pago
 * @property int $carnet
 * @property int $monto
 * @property int $cheksum
 * @property int $rubro_pago
 * @property string $banco
 * @property string $no_boleta_deposito
 * @property string $no_transferencia_bancaria
 * @property \Carbon\Carbon $fecha_certificado_banco
 * @property \Carbon\Carbon $fecha_generacion
 * @property int $estado
 * @property \Carbon\Carbon $fecha_entrega
 * @property int $cantidad
 *
 * @package App\Models
 */
class CarnetBoleta extends Eloquent
{
	protected $table = 'carne_boleta';
	public $incrementing = false;
	public $timestamps = false;
	protected $primaryKey = 'id_orden_pago';

	protected $casts = [
		'id_orden_pago' => 'int',
		'carnet' => 'int',
		'monto' => 'int',
		'cheksum' => 'int',
		'rubro_pago' => 'int',
		'estado' => 'int'
	];

	protected $dates = [
		'fecha_certificado_banco',
		'fecha_generacion',
		'fecha_entrega'
	];

	protected $fillable = [
	    'id_orden_pago',
	    'carnet',
	    'monto',
	    'cheksum',
	    'rubro_pago',
	    'banco',
		'no_boleta_deposito',
		'no_transferencia_bancaria',
		'fecha_certificado_banco',
		'fecha_generacion',
		'estado',
		'fecha_entrega'
	];
}
