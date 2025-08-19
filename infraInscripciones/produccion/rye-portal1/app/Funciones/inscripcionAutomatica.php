<?php


namespace App\Funciones;


use App\Http\Controllers\Aspirante\HomeController;
use App\Http\Controllers\Aspirante\Inscripcion;
use App\Http\Controllers\Estudiante\Reinscripcion;
use App\Models\BoletasReingreso;
use App\Models\PingBoleta;
use Illuminate\Support\Facades\Auth;

class inscripcionAutomatica
{
    public static function inscribirPrimerIngreso(){
        $aspirantes = PingBoleta::where([
            ['fecha_generacion', '>=', date('Y-m-d')],
            ['fecha_vencimiento', '<=', date('Y-m-d')],
            ['estado', '=', 1]
        ])->get();

        foreach ($aspirantes as $aspirante){
            $boleta = Boletas::validarBoletaPrimerIngreso($aspirante->id_orden_pago, $aspirante->carnet);
            if (is_string($boleta)){
                //todo error de que no ha pagado //return HomeController::mensajeError($boleta);
                break;
            }

            if ($boleta == true){
                $carnet = Carnet::generarPrimerIngreso(Auth::guard('aspirante')->user()->nov);
                Inscripcion::inscribir($carnet, $aspirante->carnet);
            }
        }
    }

    public static function inscribirPrimerIngresoExtranjeros(){

    }

    public static function inscribirReingreso(){
        $estudiantes = BoletasReingreso::where([
            ['fecha_generacion', '>=', date('Y-m-d')],
            ['fecha_vencimiento', '<=', date('Y-m-d')],
            ['estado', '=', 1]
        ])->get();

        foreach ($estudiantes as $estudiante){
            $boleta = Boletas::validarBoletaReingreso($estudiante->idOrdenPago, $estudiante->carnet);

            if (is_string($boleta)){
                break; //todo error de que no ha pagado
            }

            if ($boleta == true){
                Reinscripcion::inscribir($estudiante->carnet, $estudiante->ua, $estudiante->ext, $estudiante->car);
            }
        }
    }

    public static function inscribirReingresoExtranjeros(){

    }
}
