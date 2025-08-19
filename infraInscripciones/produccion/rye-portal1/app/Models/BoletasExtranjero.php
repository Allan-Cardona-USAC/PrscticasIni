<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Jun 2019 10:45:14 -0600.
 */

namespace App\Models;

use App\Funciones\Utilidades;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
use nusoap_client;

/**
 * Class BoletasExtranjero
 * 
 * @property int $id
 * @property int $noMensualidades
 * @property float $monto
 * @property int $checksum
 * @property int $rubroPago
 * @property string $banco
 * @property string $noBoletaDeposito
 * @property string $noTransferenciaBancaria
 * @property Carbon $fechaCertificadoBanco
 * @property Carbon $fechaGeneracion
 * @property Carbon $fechaVencimiento
 * @property int $estado
 * @property int $matricula
 * 
 * @property MatriculaExtranjero $matricula_extranjero
 *
 * @package App\Models
 */
class BoletasExtranjero extends Eloquent
{
	public $timestamps = false;
	public $table = 'boletasExtranjeros';

	protected $casts = [
		'noMensualidades' => 'int',
		'monto' => 'float',
		'checksum' => 'int',
		'rubroPago' => 'int',
		'estado' => 'int',
		'matricula' => 'int'
	];

	protected $dates = [
		'fechaCertificadoBanco',
		'fechaGeneracion',
		'fechaVencimiento'
	];

	protected $fillable = [
		'noMensualidades',
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
		'matricula'
	];

    public static function getBoletaVigente(int $carnet, int $unidadAcademica, int $extension, int $carrera){
        return BoletasExtranjero::where([
            ['fechaGeneracion', '>=', date('Y-m-d')],
            ['fechaVencimiento', '<=', date('Y-m-d')]
        ])->with(['matricula_extranjero' => function($query) use ($carnet, $unidadAcademica, $extension, $carrera){
            $query->where([
                ['carnet', '=', $carnet],
                ['ciclo', '=', date('Y')],
                ['unidadAcademica', '=', $unidadAcademica],
                ['extension', '=', $extension],
                ['carrera', '=', $carrera]
            ]);
        }])->first();
    }

    public function matricula_extranjero()
	{
		return $this->belongsTo(MatriculaExtranjero::class, 'matricula');
	}

    private static function validarBoleta(int $idOrdenPago, int $carnet){
        $xml = "<CONSULTA_ORDEN>
                    <ID_ORDEN_PAGO>$idOrdenPago</ID_ORDEN_PAGO>
                    <ID_PERSONA>$carnet</ID_PERSONA>
                </CONSULTA_ORDEN>";
        $cliente = new nusoap_client('https://pruebassiif.usac.edu.gt/WSGeneracionOrdenPagoV2/WSGeneracionOrdenPagoV2SoapHttpPort?wsdl', 'wsdl');
        $error  = $cliente->getError();

        if ($error){
            return $error;
        }

        $response = $cliente->call('consultaOrdenPago', array('pxml'=>$xml));

        if ($cliente->fault) {
            return print_r($response); //'Error de comunicación con SIIF, porfavor intentelo de nuevo más tarde'; //error
        } else {
            $error = $cliente->getError();
            if ($error) {
                return $error; //error
            } else {
                $resultado = Utilidades::xml2array($response['result']);
                if($resultado['RESPUESTA']['CODIGO_RESP']['value'] == 1){
                    $boleta = [
                        'banco' => $resultado['RESPUESTA']['BANCO']['value'],
                        'noBoletaDeposito' => $resultado['RESPUESTA']['NO_BOLETA_DEPOSITO']['value'],
                        'noTransferenciaBancaria' => $resultado['RESPUESTA']['NO_TRAN_BANCO']['value'],
                        'fechaCertificadoBanco' => $resultado['RESPUESTA']['FECHA_CERTIF_BANCO']['value'],
                        'estado' => 2 //estado de pagado
                    ];
                    return $boleta; //pagado
                }
                return $resultado['RESPUESTA']['DESCRIPCION']['value']; //no pagado
            }
        }
    }

    public static function validarBoletaPrimerIngreso(int $idOrdenPago, int $nov){
        $boleta = BoletasExtranjero::find($idOrdenPago);
        if (is_null($boleta->fecha_certificado_banco)){
            $boletaPagada = self::validarBoleta($idOrdenPago, $nov);

            if (is_string($boletaPagada)){
                return $boletaPagada; //existe un error
            }

            //Actualizo la boleta
            $boleta->banco = $boletaPagada['banco'];
            $boleta->noBoletaDeposito = $boletaPagada['noBoletaDeposito'];
            $boleta->noTransferenciaBancaria = $boletaPagada['noTransferenciaBancaria'];
            $boleta->fechaCertificadoBanco = $boletaPagada['fechaCertificadoBanco'];
            $boleta->estado = $boletaPagada['estado'];

            $boleta->matricula_extranjero()->deuda -= $boleta->monto;
            $boleta->save();
        }
        return true;
    }

    public static function validarBoletaReingreso(int $idOrdenPago, int $carnet){
        $boleta = BoletasExtranjero::find($idOrdenPago);

        if (is_null($boleta->fechaCertificadoBanco)){
            $boletaPagada = self::validarBoleta($idOrdenPago, $carnet);

            if (is_string($boletaPagada)){
                return $boletaPagada;
            }

            $boleta->banco = $boletaPagada['banco'];
            $boleta->noBoletaDeposito = $boletaPagada['noBoletaDeposito'];
            $boleta->noTransferenciaBancaria = $boletaPagada['noTransferenciaBancaria'];
            $boleta->fechaCertificadoBanco = $boletaPagada['fechaCertificadoBanco'];
            $boleta->estado = $boletaPagada['estado'];

            $boleta->matricula_extranjero()->deuda -= $boleta->monto;
            $boleta->save();
        }
        return true;
    }
}
