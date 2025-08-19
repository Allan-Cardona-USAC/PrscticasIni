<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 May 2019 17:43:41 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class PingBoletum
 *
 * @property int $id_orden_pago
 * @property int $carnet
 * @property int $ua
 * @property int $ext
 * @property int $car
 * @property float $monto
 * @property int $cheksum
 * @property int $rubro_pago
 * @property string $banco
 * @property string $no_boleta_deposito
 * @property string $no_transferencia_bancaria
 * @property Carbon $fecha_certificado_banco
 * @property Carbon $fecha_generacion
 * @property int $estado
 *
 * @package App\Models
 */
class PingBoleta extends Eloquent
{
    protected $table = 'ping_boleta';
	protected $primaryKey = 'id_orden_pago';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_orden_pago' => 'int',
		'carnet' => 'int',
		'ua' => 'int',
		'ext' => 'int',
		'car' => 'int',
		'monto' => 'float',
		'cheksum' => 'int',
		'rubro_pago' => 'int',
		'estado' => 'int'
	];

	protected $dates = [
		'fecha_certificado_banco',
		'fecha_generacion',
        'fecha_vencimiento'
	];

	protected $fillable = [
		'carnet',
		'ua',
		'ext',
		'car',
		'monto',
		'cheksum',
		'rubro_pago',
		'banco',
		'no_boleta_deposito',
		'no_transferencia_bancaria',
		'fecha_certificado_banco',
		'fecha_generacion',
        'fecha_vencimiento',
		'estado'
	];

    /**
     * Retorna una boleta vigente si tiene, de lo contrario retorna null
     * @param $nov
     * @param $unidadAcademica
     * @param $extension
     * @param $carrera
     * @return mixed
     */
    public static function getBoletaVigente($nov, $unidadAcademica, $extension, $carrera){
        return PingBoleta::where([
            ['carnet', '=', $nov],
            ['ua', '=', $unidadAcademica],
            ['ext', '=', $extension],
            ['car', '=', $carrera],
            //['fecha_generacion', '<=', date('Y-m-d')],
            ['fecha_vencimiento', '>=', date('Y-m-d')]
        ])
            ->first();
    }
}
