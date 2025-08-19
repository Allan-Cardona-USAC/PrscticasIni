<?php


namespace App\Funciones;


use App\Models\CarnetNvo;
use App\Models\CicloActivo;
use App\Models\EstudiaOld;
use Request;

class Carnet
{
    public static function generarPrimerIngreso(int $nov){
        return self::generarCarnet($nov, 0);
    }

    public static function generarCUNOC(int $nov){
        return self::generarCarnet($nov, 3);
    }

    public static function generarCentros(int $nov){
        return self::generarCarnet($nov, 4);
    }

    public static function generarExtranjeros(int $nov){
        return self::generarCarnet($nov, 8);
    }

    public static function generarPostgrado(int $nov){
        return self::generarCarnet($nov, 9);
    }

    private static function generarCarnet(int $nov, int $area ){
        $ciclo = CicloActivo::first();

        $duplicado =  CarnetNvo::where('nov', $nov)->first();
        if ($duplicado){
            return $duplicado->ciclo . $duplicado->area . sprintf('%04d', $duplicado->carnet);
        }

        if($area == 0){
            $correlativo = CarnetNvo::selectRaw('MAX(CONCAT(AREA, carnet)) as correlativo')
            ->whereRaw('AREA IN (0,1,2) AND `ciclo` = ?', $ciclo->ciclo_activo)->first();
            $correlativo = (int)$correlativo->correlativo;
        }else{
            $correlativo = CarnetNvo::where([
                ['ciclo', '=', $ciclo->ciclo_activo],
                ['area', '=', $area]
            ])->max('carnet');
        }
        $noCarnet =  '' . $ciclo->ciclo_activo . $area . sprintf('%04d', $correlativo++);

        while (EstudiaOld::where('carnet', $noCarnet)->exists()){
            if ($correlativo == 9999){
                $noCarnet =  '' . $ciclo->ciclo_activo . $area++ . sprintf('%04d', $correlativo);
                if(!EstudiaOld::where('carnet', $noCarnet)->exists()){
                    $area--;
                }
                $correlativo = 0;
                $area++;
            }
            $noCarnet =  '' . $ciclo->ciclo_activo . $area . sprintf('%04d', ($correlativo++));
        }

        $carnet = new CarnetNvo();
        $carnet->ciclo = $ciclo->ciclo_activo;
        $carnet->area = $area;
        $carnet->carnet = $correlativo;
        $carnet->nov = $nov;
        $carnet->usuario = 'pingEnLinea@' . Request::ip();
        $carnet->fecha_usuario = date('Y-m-d H:i:s');
        $carnet->save();

        return $noCarnet;
    }
}
