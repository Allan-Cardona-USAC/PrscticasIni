<?php


namespace App\Http\Controllers\PortalAdministrativo;

use App\Funciones\Boletas;
use App\Funciones\Carnet;
use App\Funciones\Expediente;
use App\Http\Controllers\Aspirante\Inscripcion;
use App\Models\CarreraEstudiante;
use App\Models\EstudiaOld;
use App\Models\InformacionAspirante;
use App\Models\InscripcionPrimerIngreso;
use App\Models\PingBoleta;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class solicitudInscripcionController extends  Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * @param Request $request
     * @param $mostrar
     * @return View
     */
    public function index(Request $request, $mostrar)
    {
        $title = 'Citas';
        $titleCard='';
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'), 50);

        if($mostrar === 'sinCita') {

            $titleCard = 'Asignar Cita';
            if (!empty($keyword)) {
                $aspirantes = InscripcionPrimerIngreso::where('nov', 'LIKE', "%$keyword%")
                    ->whereNull('cita')
                    ->where('sinProblemas',0)
                    ->paginate($perPage);
            } else {
                $aspirantes = InscripcionPrimerIngreso::whereNull('cita')
                    ->where('sinProblemas',0)
                    ->paginate($perPage);
            }

        }elseif($mostrar === 'conCita'){

            $titleCard = 'Cita Asignada';
            if (!empty($keyword)) {
                $aspirantes = InscripcionPrimerIngreso::where('nov', 'LIKE', "%$keyword%")
                    ->whereNotNull('cita')
                    ->where('sinProblemas',0)
                    ->paginate($perPage);
            } else {
                $aspirantes = InscripcionPrimerIngreso::whereNotNull('cita')
                    ->where('sinProblemas',0)
                    ->paginate($perPage);
            }
        }

        return view('portalAdministrativo.aspirantes.listarCitas', compact('aspirantes','titleCard','title','perPage','keyword','mostrar'));
    }

    /**
     * Metodo que muestra la cita del aspirante para realizar la inscripción
     * o reprogramar la cita
     * @param $nov
     * @return Factory|View
     */
    public function  showCita($nov){
        $title="Mostrar Cita";

        $aspirante = InscripcionPrimerIngreso::findOrFail($nov);
        $expedinteFoto = Expediente::getFotoNov($aspirante->nov);
        return view('portalAdministrativo.aspirantes.showCita', compact('aspirante','title','expedinteFoto'));
    }


    /**
     * Este metodo despliega la información del aspirante en pantalla
     * mostrando los documentos que subió.
     * @param $id
     * @return Factory|View
     */
    public function asignarCita($id)
    {
        $title="Asignar Cita";

        $aspirante = InscripcionPrimerIngreso::findOrFail($id);
        $expedinteFoto = Expediente::getFotoNov($aspirante->nov);
        $expedienteCertificadoNac = Expediente::getPathCertificacionNacimiento($aspirante->nov);
        $expedienteTituloDiversificado = Expediente::getTituloDiversificado($aspirante->nov);
        $expedientePensum = Expediente::getCierrePensumDiversificado($aspirante->nov);
        $expedientePasaporte = Expediente::getPasaporte($aspirante->nov);
        return view('portalAdministrativo.aspirantes.asignarCita', compact('aspirante','title','expedinteFoto','expedienteCertificadoNac','expedienteTituloDiversificado','expedientePensum','expedientePasaporte'));
    }


    /**
     * Envia correo al aspirante informando sobre su cita y lo que debe realizar
     * @param Request $aspirante
     */
    private function enviarCorreoAspirante(Request $aspirante)
    {
        $correo = $aspirante->correo_electronico;
        Mail::send('portalAdministrativo.mails.cita',['aspirante' => $aspirante], function ($message) use ($aspirante, $correo) {
            $message->to($correo)->subject('Cita Para Inscripción Portal Administrativo de Registro y Estadística, USAC');
        });
    }


    /**
     * Crea la cita del aspirante con problema o extranjero para que pueda realizar su inscripción
     * @param Request $request
     * @param $nov
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function crearCita(Request $request, $nov){

        $this->validate($request, [
            'cita' => 'required'
        ]);
        $aspirante = InscripcionPrimerIngreso::findOrFail($nov);
        $aspirante->update(
            ['cita' => $request['cita']]
        );

        $request->request->add(['nov'=> $nov]);
        $request->request->add(['nombre'=>  $aspirante->getNombreCompleto()]);
        $request->request->add(['correo_electronico'=> $aspirante->getDatos()->correo_electronico]);

        $this->enviarCorreoAspirante($request);

        $request->session()->flash('alert-success', 'La cita se creo con exito.');
        return redirect(route('administrativo.Citas','conCita'));
    }


    /**
     * Este metodo cambia el estado de aprobación de los distintos
     * documentos que haya subido el aspirante.
     * @param $nov
     * @param $campo
     * @param $estadoActual
     * @return RedirectResponse|Redirector
     */
    public function cambiarEstado($nov, $campo, $estadoActual){
        $aspirante = InscripcionPrimerIngreso::findOrFail($nov);

        if($campo === 'Certificado') {
            $aspirante->update(
                ['certificadoNacimiento' => $estadoActual]
            );
        }elseif ($campo === 'Titulo'){
            $aspirante->update(
                ['tituloDiversificado' => $estadoActual]
            );
        }elseif($campo === 'Pensum'){
            $aspirante->update(
                ['cierrePensum' => $estadoActual]
            );
        }elseif($campo === 'Pasaporte'){
            $aspirante->update(
                ['pasaporte' => $estadoActual]
            );
        }

        return redirect(route('administrativo.asignarCita',$aspirante->nov));
    }


    /**
     * Realiza la inscripción del aspirante al presentar toda la
     * documentación solicitada de forma correcta.
     * @param $nov
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function  realizarInscripcion($nov, Request $request){
        $aspirante= PingBoleta::where([
            ['carnet','=', $nov],
            //['fecha_generacion', '>=', date('Y-m-d')],
            //['fecha_vencimiento', '<=', date('Y-m-d')],
            //['fecha_generacion', '>=', date('Y-m-d')],
            //['fecha_vencimiento', '>=', date('Y-m-d')],
            ['estado', '=', 1]
        ])->get();
        Log::debug($nov);
        Log::debug("PRUEBA");
        Log::debug($aspirante);

        $boleta = Boletas::validarBoletaPrimerIngreso($aspirante->id_orden_pago, $aspirante->carnet);
        if (is_string($boleta)){
            $request->session()->flash('alert-danger', 'No se puede realizar la inscripción, boleta no pagada');
            return redirect(route('administrativo.showCita',$nov));
        }

        if ($boleta == true){
            $carnet = Carnet::generarPrimerIngreso($nov);
            Inscripcion::inscribir($carnet, $aspirante->carnet);
        }
        $actualizarAspirante = InscripcionPrimerIngreso::findOrFail($nov);
        $actualizarAspirante->update(
            ['sinProblemas' => 1]
        );
        $request->session()->flash('alert-success', 'Se realizo la inscripción con exito');
        return redirect(route('administrativo.Citas','conCita'));
    }

    /**
     * Solicitud Inscripcion
     * Muestra la solicitud de inscripcion de estudiantes y aspirantes
     * @param Request $request
     * @return Factory|View
     */
    public function showSolicitudInscripcion(Request $request)
    {
        $title="Solicitud Inscripción";
        $nov = $request->get('nov');
        $carne = $request->get('carne');
        $cui = $request->get('cui');
        $pasaporte = $request->get('pasaporte');

        //Si se busca por nov
        if (!empty($nov)) {
            //busca primero en estudiantes
            $estudiante = EstudiaOld::where('cod_orien',$nov)->first();
            if($estudiante == null){
                //si no lo encuentra lo busca en informacion_aspirante
                $estudiante = InformacionAspirante::where('nov',$nov)->first();
                if($estudiante != null) {
                    $carrera = InscripcionPrimerIngreso::where('nov', $estudiante->nov)->first();
                    $lugarEstudios = $carrera->getCodigoDosDigitos($carrera->extension) . ' - ' . $carrera->lugarExtension();
                    $unidad_academica = $carrera->getCodigoDosDigitos($carrera->unidadAcademica) . ' - ' . $carrera->getnombreUA();
                    $extension = $carrera->getCodigoDosDigitos($carrera->extension) . ' - ' . $carrera->getnombreExtension();
                    $nombreCarrera = $carrera->getCodigoDosDigitos($carrera->carrera) . ' - ' . $carrera->getnombreCarrera();

                    return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));

                }else{
                    $request->session()->flash('alert-danger', 'El N.O.V '. $nov . ' no existe.');
                    $estudiante =null;
                    $nov = '';

                    return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne'));

                }
            }else{
                //Se guarda en distintas variables los datos de la carrera
                $carrera = CarreraEstudiante::where('carnet',$estudiante->carnet)->first();
                $lugarEstudios = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->lugarExtension();
                $unidad_academica = str_pad($carrera->codfac, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->unidad_academica->nomfac;
                $extension = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->nombre;
                $nombreCarrera = $carrera->carrera->getCodigoCarrera() .' - ' .$carrera->carrera->nombre_carrera;

                return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));

            }
        //Si se busca por Carne
        } elseif(!empty($carne)) {
            //si se busca por carnet
            $estudiante = EstudiaOld::where('carnet',$carne)->first();
            if($estudiante != null) {
                $nov = $estudiante->cod_orien;
                $carrera = CarreraEstudiante::where('carnet',$estudiante->carnet)->first();
                $lugarEstudios = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->lugarExtension();
                $unidad_academica = str_pad($carrera->codfac, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->unidad_academica->nomfac;
                $extension = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->nombre;
                $nombreCarrera = $carrera->carrera->getCodigoCarrera() .' - ' .$carrera->carrera->nombre_carrera;

                return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));

            }else{
                $request->session()->flash('alert-danger', 'El carné '. $carne . ' no existe.');
                $estudiante =null;
                $carne = '';

                return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne'));

            }
        //Si se busca por CUI
        } elseif(!empty($cui)){
            //busca primero en estudiantes
            $estudiante = EstudiaOld::where('cui',$cui)->first();
            if($estudiante == null){
                //si no lo encuentra lo busca en informacion_aspirante
                $estudiante = InformacionAspirante::where('numero_orden','DPI')->where('numero_registro', $cui)->first();
                if($estudiante != null) {
                    $carrera = InscripcionPrimerIngreso::where('nov', $estudiante->nov)->first();
                    $lugarEstudios = $carrera->getCodigoDosDigitos($carrera->extension) . ' - ' . $carrera->lugarExtension();
                    $unidad_academica = $carrera->getCodigoDosDigitos($carrera->unidadAcademica) . ' - ' . $carrera->getnombreUA();
                    $extension = $carrera->getCodigoDosDigitos($carrera->extension) . ' - ' . $carrera->getnombreExtension();
                    $nombreCarrera = $carrera->getCodigoDosDigitos($carrera->carrera) . ' - ' . $carrera->getnombreCarrera();

                    return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));

                }else{
                    $request->session()->flash('alert-danger', 'El CUI '. $cui . ' no existe.');
                    $estudiante =null;
                    $cui = '';

                    return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne'));
                }
            }else{
                //Se guarda en distintas variables los datos de la carrera
                $carrera = CarreraEstudiante::where('carnet',$estudiante->carnet)->first();
                $lugarEstudios = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->lugarExtension();
                $unidad_academica = str_pad($carrera->codfac, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->unidad_academica->nomfac;
                $extension = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->nombre;
                $nombreCarrera = $carrera->carrera->getCodigoCarrera() .' - ' .$carrera->carrera->nombre_carrera;

                return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));
            }
        }elseif(!empty($pasaporte)){
            //busca primero en estudiantes
            $estudiante = EstudiaOld::where('numero_orden','PAS')->where('numero_registro',$pasaporte)->orWhere('numero_pasaporte',$pasaporte)->first();
            if($estudiante == null){
                //si no lo encuentra lo busca en informacion_aspirante
                $estudiante = InformacionAspirante::where('numero_orden','PAS')->where('numero_registro',$pasaporte)->first();
                if($estudiante != null) {
                    $carrera = InscripcionPrimerIngreso::where('nov', $estudiante->nov)->first();
                    $lugarEstudios = $carrera->getCodigoDosDigitos($carrera->extension) . ' - ' . $carrera->lugarExtension();
                    $unidad_academica = $carrera->getCodigoDosDigitos($carrera->unidadAcademica) . ' - ' . $carrera->getnombreUA();
                    $extension = $carrera->getCodigoDosDigitos($carrera->extension) . ' - ' . $carrera->getnombreExtension();
                    $nombreCarrera = $carrera->getCodigoDosDigitos($carrera->carrera) . ' - ' . $carrera->getnombreCarrera();

                    return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));

                }else{
                    $request->session()->flash('alert-danger', 'El pasaporte '. $pasaporte . ' no existe.');
                    $estudiante =null;
                    $pasaporte = '';

                    return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne'));

                }
            }else{
                //Se guarda en distintas variables los datos de la carrera
                $carrera = CarreraEstudiante::where('carnet',$estudiante->carnet)->first();
                $lugarEstudios = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->lugarExtension();
                $unidad_academica = str_pad($carrera->codfac, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->unidad_academica->nomfac;
                $extension = str_pad($carrera->codigo_extension, 2, "0", STR_PAD_LEFT) . ' - ' .$carrera->carrera->extension->nombre;
                $nombreCarrera = $carrera->carrera->getCodigoCarrera() .' - ' .$carrera->carrera->nombre_carrera;

                return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne','estudiante','lugarEstudios','unidad_academica','extension','nombreCarrera'));
            }

        }else{
            $estudiante =null;
        }

        return view('portalAdministrativo.aspirantes.solicitudinscripcion', compact('title','pasaporte','nov','cui','carne'));
    }

}
