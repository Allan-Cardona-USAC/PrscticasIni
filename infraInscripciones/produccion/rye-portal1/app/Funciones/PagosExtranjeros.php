<?php


namespace App\Funciones;


use App\Models\MatriculaExtranjero;

class PagosExtranjeros
{
    public static function getDeuda(int $carnet){
        $deuda = MatriculaExtranjero::find($carnet);
        return $deuda->deuda;
    }

    public static function generarBoleta(int $carnet, int $noPagos){
        //todo validar que pueda realizar esa cantidad de pagos
        //todo obtener el monto que corresponde a esa cantidad de pagos

    }

    public static function estaSolvente(int $carnet){
        return (self::getDeuda($carnet) == 0);
    }

    public static function getNumeroDePagosPendientes(int $carnet){
        $deuda = MatriculaExtranjero::find($carnet);
        return $deuda->noPagosRestantes;
    }
}
