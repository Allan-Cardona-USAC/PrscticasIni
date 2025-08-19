<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Funciones\Boletas;
use App\Http\Controllers\Estudiante\SolicitarCarnet;
use App\Models\Certificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\EstudiaOld;
use App\Models\Aspirante;
use App\Models\PruebaEspecifica;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use App\PortalAdministrativo\aspirante as PortalAdministrativoAspirante;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Funciones\ConsultaOV;
use App\PortalAdministrativo\carrera;
use App\Models\BoletasReingreso;
use App\Models\Facultad;
use App\Models\Extension; 
use App\Models\CarreraTemporal;

class BoletasController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectBoletas');
    }

    public function index(){

        return view('portalAdministrativo.Boletas.buscarEstudiante');

    }

    public function getCarrerasBoleta(Request $request){

        $carnet = $request->input('registroAcademico');
        log::info('Este es el nov:'. $carnet);

        $estudia_old = EstudiaOld::find($carnet);
        
        if($estudia_old == null){ 
            return Redirect::back()->withErrors(['msg' => 'EL carnet ingresado no existe']);
        }

        $carreras = $this->getCarreras($carnet);

        if(empty($carreras)){ 
            return Redirect::back()->withErrors(['msg' => 'EStudiante no posee ninguna carrera']);
        }

        $cui = $estudia_old->cui;
        $codNacionalidad = $estudia_old->cod_nac;
        $pasaporte = $estudia_old->numero_pasaporte;
        $nombreCompleto= $estudia_old->getNombreCompleto();
        $ciclo = CicloActivo::first();

        $ciclo = $ciclo->ciclo_activo;

        return view('portalAdministrativo.Boletas.CarrerasFormulario',
                    compact('carreras', 'cui', 'codNacionalidad', 'pasaporte', 'nombreCompleto', 'carnet', 'ciclo'));

    }

    public function generarBoleta(Request $request){

        $carnet = $request["carnet"];
        $ua = $request["ua"];
        $ext = $request["ext"];
        $car = $request["idCarrera"];
        $nivel = $request["nivel"];
        $codNacionalidad = $request["codNacionalidad"];
        $pasaporte = $request["pasaporte"];
        $nombre = $request["nombre"];
        $cui = $request["cui"];
        $extension = $request["extension"];
        $carrera = $request["nombre_carrera"];
        $unidad = $request["unidad_academica"];
        $ciclo = $request["ciclos"];
        $semestre = $request->input('semestre');

        $boleta = Boletas::generarBoletaReingreso($carnet, $ua, $ext, $car, $nombre, $semestre, $nivel, $codNacionalidad, $ciclo);

        $idOrdenPago = $boleta->idOrdenPago;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $rubroPago = $boleta->rubroPago;
        $monto = $boleta->monto;
        $fechaVencimiento = $boleta->fechaVencimiento;
        $checksum = $boleta->checksum;
        $nombreEstudiante = $nombre;
        $idCarrera = $car;
        $facultad = $carrera;
        $categorias = $nivel;
        $nivel_academico = $nivel;
        $ciclo = $boleta->ciclo;
        $cicloactivo = $ciclo;

        $title="Impresión de Boleta";
        return view('administrativo.reinscripcion.boletaReinscripcion',
                    compact('carnet', 'nombreEstudiante', 'idOrdenPago', 'fechaGeneracion',
                            'title', 'boleta', 'facultad', 'extension','carrera',
                             'cicloactivo', 'rubroPago', 'fechaVencimiento',
                            'monto', 'checksum', 'ua', 'ext', 'idCarrera',
                            'nivel_academico', 'categorias'
                        ));


    }

    public static function descargarBoletaReingresoCiclos(Request $request){

        $idOrdenPago = $request["idOrdenPago"];
        $nivel_academico = $request["nivel"];
        $facultad = $request["facultad"];
        /*$extension = $request["extension"];
        $carrera = $request["carrera"];
        $nombreEstudiante = $request["nombreEstudiante"];*/

        $boleta = BoletasReingreso::find($idOrdenPago);
        
        //Datos del estudiante
        $datos = EstudiaOld::find($boleta->carnet);
        $nombreCompleto = $datos->getNombreCompleto(); 
        $nombreEstudiante = $datos->getNombreCompleto();
        $CUI = $datos->cui;
        $registro = $boleta->carnet;
        $tipoRegistro = 'Carnet';

        //Datos de la boleta
        $carnet = $boleta->carnet;
        $monto = $boleta->monto;
        //$rubroPago = $boleta->rubroPago;
        $rubro = $boleta->rubroPago;
        $checksum = $boleta->checksum;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $fechaVencimiento = date("d/m/Y", strtotime('+7 days', strtotime($fechaGeneracion)));
        $cicloactivo = $boleta->ciclo;
        //Datos Carrera
        $unidadAcademica = Facultad::find($boleta->ua)->nomfac;
        $idUnidadAcademica = $boleta->ua;
        $extension = Extension::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext]
        ])->first()->nombre;
        $idExtension = $boleta->ext;
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext],
            ['codigo_carrera', '=', $boleta->car]
        ])->first()->nombre_carrera;
        $idCarrera = $boleta->car;

        $date = Carbon::now()->format('d/m/Y');
        /*
        return view('administrativo.reinscripcion.boletaReinscripciondescarga',
        compact('nombreCompleto',
            'CUI',
            'registro',
            'tipoRegistro',
            'idOrdenPago',
            'monto',
            'rubro',
            'checksum',
            'fechaGeneracion',
            'fechaVencimiento',
            'unidadAcademica',
            'idUnidadAcademica',
            'extension',
            'idExtension',
            'carrera',
            'idCarrera',
            'nivel_academico',
            'cicloactivo'
        ));*/

        $css = '/var/www/html/rye-portal/public/css/estilo-boleta-pdf.css';

        $pdf = PDF::loadView('administrativo.reinscripcion.boletaReinscripcionpdf',
        compact('nombreCompleto',
        'CUI',
        'registro',
        'tipoRegistro',
        'idOrdenPago',
        'monto',
        'rubro',
        'checksum',
        'fechaGeneracion',
        'fechaVencimiento',
        'unidadAcademica',
        'idUnidadAcademica',
        'extension',
        'idExtension',
        'carrera',
        'idCarrera',
        'nivel_academico',
        'cicloactivo',
        'css'));

        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('boleta_inscripcion' .$carnet.'_'.$date.'.pdf');

       
    }

    public function getCarreras($carnet){ // solo padep hasta nuevo aviso 
        $carreras = DB::select( DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel
                FROM 
                    carrera_estudiante ce, 
                    facultad f, 
                    carrera_temporal ct, 
                    extension e
                WHERE 
                    ce.carnet = '.$carnet.'
                AND f.codfac = 29
                AND ce.codfac = f.codfac
                AND ct.codigo_unidad_academica = ce.codfac
                AND ct.codigo_extension = ce.codext
                AND ce.codcar in (35,36,37,38,80,81)
                AND ct.codigo_carrera = ce.codcar
                AND e.codigo_unidad_academica = f.codfac 
                AND e.codigo_extension = ce.codext
                AND ce.activo = 1
                AND ct.codigo_nivel IN (1,2,3);'
        )); //Consulta carreras

        return $carreras;
    }
}