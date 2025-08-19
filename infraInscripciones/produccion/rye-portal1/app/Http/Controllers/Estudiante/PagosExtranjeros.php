<?php

namespace App\Http\Controllers\Estudiante;

use App\Funciones\Boletas;
use App\Models\CarreraEstudiante;
use App\Models\CarreraTemporal;
use App\Models\Extension;
use App\Models\Facultad;
use App\Models\MatriculaExtranjero;
use App\Models\PrecioMatricula;
use const http\Client\Curl\AUTH_ANY;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagosExtranjeros extends Controller
{

    public function index(Request $request){
        $title = 'Pago de Matricula';

        $matricula = MatriculaExtranjero::where('carnet', '=', Auth::guard('estudiante')->user()->carnet)
            ->orWhere('carnet', '=', Auth::guard('estudiante')->user()->cod_orien)
            ->where('deuda', '>', 0)->first();

        $facultad = Facultad::find($matricula->unidadAcademica);
        $matricula->nombreUnidadAcademica = $facultad->nomfac;

        $extension = Extension::where([
            ['codigo_unidad_academica', '=', $matricula->unidadAcademica],
            ['codigo_extension', '=', $matricula->extension]
        ])->first();
        $matricula->nombreExtension = $extension->nombre;

        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $matricula->unidadAcademica],
            ['codigo_extension', '=', $matricula->extension],
            ['codigo_carrera', '=', $matricula->carrera]
        ])->first();
        $matricula->nombreCarrera = $carrera->nombre_carrera;

        $valores = PrecioMatricula::find(3); //todo ver como averiguar la region a partir del carnet

        return view(
            'estudiante.extranjeros.pagos',
            compact(
                'title',
                'matricula',
                'valores'
            )
        );
    }

    public static function generarBoleta(Request $request){
        $idMatricula = $request->input('idMatricula');
        $noPagos = $request->input('noPagos');

        $monto = PrecioMatricula::find(3)->pregrado * $noPagos;

        return Boletas::generarBoletaReingresoExtranjeros(Auth::guard('estudiante')->user()->carnet, Auth::guard('estudiante')->user()->getNombreCompleto(), $noPagos, $monto, $idMatricula);
    }
}
