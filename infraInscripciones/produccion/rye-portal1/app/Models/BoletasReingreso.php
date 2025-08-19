<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 04 Mar 2019 18:39:50 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BoletasReingreso
 *
 * @property int $idOrdenPago
 * @property int $carnet
 * @property int $ua
 * @property int $ext
 * @property int $car
 * @property float $monto
 * @property int $checksum
 * @property int $rubroPago
 * @property string $banco
 * @property string $noBoletaDeposito
 * @property string $noTransferenciaBancaria
 * @property Carbon $fechaCertificadoBanco
 * @property Carbon $fechaGeneracion
 * @property int $estado
 * @property int $tipo_boleta
 * @property int $ciclo
 *
 * @package App\Models
 */
class BoletasReingreso extends Eloquent
{
    protected $table = 'boletasReingreso';
    protected $primaryKey = 'idOrdenPago';
    public $timestamps = false;

    protected $casts = [
        'idOrdenPago' => 'int',
        'carnet' => 'int',
        'ua' => 'int',
        'ext' => 'int',
        'car' => 'int',
        'monto' => 'float',
        'checksum' => 'int',
        'rubroPago' => 'int',
        'estado' => 'int',
        'tipo_boleta' => 'int',
        'ciclo' => 'int'
    ];

    protected $dates = [
        'fechaCertificadoBanco',
        'fechaGeneracion',
        'fechaVencimiento'
    ];

    protected $fillable = [
        'idOrdenPago',
        'carnet',
        'ua',
        'ext',
        'car',
        'monto',
        'checksum',
        'rubroPago',
        'banco',
        'noBoletaDeposito',
        'noTransferenciaBancaria',
        'fechaCertificadoBanco',
        'fechaGeneracion',
        'fechaVencimiento',
        'estado',
        'tipo_boleta',
        'ciclo'
    ];

    /**
     * Retorna una boleta vigente si tiene, de lo contrario retorna null
     * @param $carnet
     * @param $unidadAcademica
     * @param $extension
     * @param $carrera
     * @return mixed
     */
    public static function getBoletaVigente($carnet, $unidadAcademica, $extension, $carrera){
        return BoletasReingreso::where([
            ['carnet', '=', $carnet],
            ['ua', '=', $unidadAcademica],
            ['ext', '=', $extension],
            ['car', '=', $carrera],
            ['fechaVencimiento', '>=', date('Y-m-d')]
        ])
            ->first();
    }

    public static function getBoletaVigenteCiclo($carnet, $unidadAcademica, $extension, $carrera, $ciclo){
        return BoletasReingreso::where([
            ['carnet', '=', $carnet],
            ['ua', '=', $unidadAcademica],
            ['ext', '=', $extension],
            ['car', '=', $carrera],
            ['ciclo', '=', $ciclo],
            ['fechaVencimiento', '>=', date('Y-m-d')]
        ])
            ->first();
    }

    public static function getBoleta($carnet, $unidadAcademica, $extension, $carrera){
        return BoletasReingreso::where([
            ['carnet', '=', $carnet],
            ['ua', '=', $unidadAcademica],
            ['ext', '=', $extension],
            ['car', '=', $carrera]
        ])->orderBy('fechaGeneracion', 'DESC')->first();
    }
}
