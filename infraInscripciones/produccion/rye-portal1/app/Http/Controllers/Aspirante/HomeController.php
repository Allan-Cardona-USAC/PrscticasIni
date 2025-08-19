<?php

namespace App\Http\Controllers\Aspirante;

use App\Funciones\Aspirante;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use App\Models\CarreraTemporal;
use App\Models\UnidadAcademica;
use App\Models\Facultad;
use App\Models\Extension;

class HomeController extends Controller
{

    protected $redirectTo = '/aspirante/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aspirante.auth:aspirante');
    }

    /**
     * Show the Aspirante dashboard.
     *
     * @return Response
     */
    public function index() {
        $title ="Perfil de usuario";
        $nov = Auth::guard('aspirante')->user()->nov;
        $inscripcionActiva = Aspirante::VerificarStatus($nov);
        $estudiante = EstudiaOld::where([
                ['cod_orien', '=', $nov]
            ])->get()->first();

        if(!$estudiante) return redirect()->route('aspirante.constancia');
        $ciclo = CicloActivo::first()->ciclo_web_pregrado;
        $carnetestudiante = $estudiante->carnet;
        $cui = $estudiante->cui;
        $nombreCompleto = $estudiante->getNombreCompleto();
        $mostrarConstancia= false;
        $esEstudiante = $estudiante != null;
        $car=null;
        $ua=null;
        $ext=null;
        $no_bol=null;
        $fecha_insc=now();
        $fecha_pago=now();
        $transaccion=null;
        $codCarrera = null;

        if($carnetestudiante>$ciclo*100000){
            $bitInsc = BitacoraInscripcion::where([
                ['carnet', '=', $carnetestudiante],
                ['ciclo', '=', $ciclo],
                ['cancelar_matricula', '=', 0]
            ])->first();

            if(!$bitInsc){
                return view('aspirante.home',compact('title', 'inscripcionActiva', 'esEstudiante', 'ciclo', 'carnetestudiante', 'cui', 'nombreCompleto', 'car',
                'ua', 'car', 'ext', 'no_bol', 'fecha_insc', 'fecha_pago', 'transaccion', 'mostrarConstancia'));            }

            $mostrarConstancia= true;

            $carT = CarreraTemporal::buscarCarrera($bitInsc->cod_ua,
                                                    $bitInsc->cod_ext,
                                                    $bitInsc->cod_car);
        
        
            $car= $carT->nombre_carrera;
            $codCarrera = $carT->codigo_carrera;
            $unidadAc = Facultad::find($carT->codigo_unidad_academica);
            $ua = $unidadAc->nomfac;

            $unidadAcademica = $bitInsc->cod_ua;
            $extension = $bitInsc->cod_ext;
            $no_bol = $bitInsc->boleta;
            $fecha_insc = $bitInsc->fecha_inscripcion;
            $fecha_pago = $bitInsc->fecha_boleta;
            $transaccion = $bitInsc->transaccion;

            $exten = Extension::where([
                ['codigo_unidad_academica', '=', $unidadAcademica],
                ['codigo_extension', '=', $extension]
            ])->first();

            $ext = $exten ->nombre;
            return view('aspirante.home',compact('title', 'inscripcionActiva', 'esEstudiante', 'ciclo', 'carnetestudiante', 'cui', 'nombreCompleto', 'car',
                    'ua', 'car', 'ext', 'no_bol', 'fecha_insc', 'fecha_pago', 'transaccion', 'mostrarConstancia','unidadAcademica','extension','codCarrera'));
        }


        
        return view('aspirante.home',compact('title',  'inscripcionActiva', 'esEstudiante', 'ciclo', 'carnetestudiante', 'cui', 'nombreCompleto', 'car',
        'ua', 'car', 'ext', 'no_bol', 'fecha_insc', 'fecha_pago', 'transaccion', 'mostrarConstancia'));    }

    /**
     * Mensaje de información o error.
     *
     * @return Response
     */
    public function mensaje(Request $request) {
        $tipo = $request->input('tipo');
        $texto = $request->input('texto');

        if($tipo == "info")
        {
            $icono = 'fa-exclamation-circle';
            $header = 'Información';
            $style = 'info';
        }
        else 
        {
            $icono = 'fa-times-circle-o';
            $header = 'Error';
            $style = 'danger';
        }
        
        $title = '';
        return view('aspirante.mensaje',compact('title', 'tipo', 'texto', 'icono', 'style', 'header'));
    }

    /**
     * Despliega un mensaje de error para los usuarios
     * @param string $texto Este parametro contiene el mensaje de error a mostrar
     * @return Factory|View
     */
    public static function mensajeError(string $texto){
        $title = $tipo = $header = 'Error';
        $icono = 'fa-times-circle-o';
        $style = 'danger';
        return view('aspirante.mensaje',compact('title', 'tipo', 'header', 'icono', 'style', 'texto'));

    }

}
