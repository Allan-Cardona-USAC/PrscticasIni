<?php

namespace App\Http\Controllers;

use App\Models\CarreraTemporal;
use App\Models\Departamento;
use App\Models\EstudiaOld;
use App\Models\Municipio;
use App\Models\PcbCarrera;
use App\Models\Postal;
use App\Models\PrecioMatricula;
use App\Models\PruebaEspecifica;
use App\Models\Establecimiento;
use App\Models\BitacoraInscripcion;
use App\Models\Preinscripcion;
use App\Models\UnidadAcademica;
use App\Models\InformacionAspirante;
use App\Models\Facultad;
use App\Models\Extension;
use function foo\func;
use Illuminate\Http\Request;
use App\Models\Pcb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $title='Inicio';
        return view('portalEstudiantil.pages.index')->with('title',$title);
    }
    public function cuotasEstudiantiles()
    {
        $title='Cuotas Estudiantiles';
        return view('portalEstudiantil.pages.cuotas')->with('title',$title);
    }
    public function reglamentoestudiantil()
    {
        $title='Reglamento Estudiantil';
        return view('portalEstudiantil.pages.reglamento-estudiantil')->with('title',$title);
    }
    public function reglamentoelectoral()
    {
        $title='Reglamento Electoral';
        return view('portalEstudiantil.pages.reglamento-electoral')->with('title',$title);
    }

    // contadores inscripciones
    public function contadorFacultades(){
        $title= 'contadorfacultades';
        return view('portalEstudiantil.pages.contadorfacultades')->with('title', $title);
    }
    public function contadorCentros(){
        $title= 'contadorcentros';
        return view('portalEstudiantil.pages.contadorcentros')->with('title', $title);
    }
    public function contadorEscuelas(){
        $title= 'contadorescuelas';
        return view('portalEstudiantil.pages.contadorescuelas')->with('title', $title);
    }
    public function contadorInstitutos(){
        $title= 'contadorinstitutos';
        return view('portalEstudiantil.pages.contadorinstitutos')->with('title', $title);
    }
    
    public function facultades(){
        $title= 'Facultades';
        return view('portalEstudiantil.pages.facultades')->with('title', $title);
    }

    public function escuelas(){
        $title= 'Escuelas';
        return view('portalEstudiantil.pages.escuelas')->with('title', $title);
    }

    public function centros(){
        $title= 'Centros';
        return view('portalEstudiantil.pages.centros')->with('title', $title);
    }

    public function institutos(){
        $title= 'Institutos';
        return view('portalEstudiantil.pages.institutos')->with('title', $title);
    }

    public function tramites(){
        $title= 'Tramites';
        return view('portalEstudiantil.pages.tramites')->with('title', $title);
    }

    public function tramites2(){
        $title= 'Tramites';
        return view('portalEstudiantil.pages.tramites2')->with('title', $title);
    }

    public function incorporados(){
        $title = 'Incorporados';
        return view('portalEstudiantil.pages.formulario-incorporado', compact('title'));
    }

    public function postgrado(){
        $title = 'Incorporados';
        return view('portalEstudiantil.pages.formulario-postgrado', compact('title'));
    }

    public function formulariosadministrativos(){
        $title= 'Formularios Administrativos';
        return view('portalEstudiantil.pages.formulario-administrativo')->with('title', $title);
    }

    public function actaCarnet(){
        $title= 'Acta Carnet';
        return view('portalEstudiantil.pages.acta-carnet')->with('title', $title);
    }

    public function pruebasBasicas(){
        $title = 'Pruebas Básicas';

        $basicos = Pcb::select('tipo_pcb.nombre as nombre')
            ->join('tipo_pcb', 'pcb.id_prueba', '=', 'tipo_pcb.id_pcb')
            ->where('nov', '=', Auth::guard('estudiante')->user()->cod_orien)
            ->get();

        $especificos = PruebaEspecifica::select('facultad.nomfac as unidadAcademica', 'extension.nombre as extension', 'carrera_temporal.nombre_carrera as carrera')
            ->join('ciclo_activo', DB::raw('YEAR(PruebaEspecifica.fechaCarga)'), '=', 'ciclo_activo.ciclo_activo')
            ->join('facultad', 'facultad.codfac', '=', 'PruebaEspecifica.ua')
            ->join('extension', function($join){
                $join->on('extension.codigo_unidad_academica', '=', 'PruebaEspecifica.ua');
                $join->on('extension.codigo_extension', '=', 'PruebaEspecifica.ext');
            })
            ->join('carrera_temporal', function($join){
                $join->on('carrera_temporal.codigo_unidad_academica', '=', 'PruebaEspecifica.ua');
                $join->on('carrera_temporal.codigo_extension', '=', 'PruebaEspecifica.ext');
                $join->on('carrera_temporal.codigo_carrera', '=', 'PruebaEspecifica.car');
            })->where([
                ['PruebaEspecifica.resultado', '=', 'Satisfactorio'],
                ['PruebaEspecifica.nov', '=', ]
            ])
            ->get();
        return view('portalEstudiantil.pages.primer-ingreso.verPruebasAprobadas', compact('title','basicos', 'especificos'));
    }

    public function getMunicipios(Request $request)
    {
        $municipios = Municipio::where('cod_depto', $request->input('departamento'))->pluck("municipio","cod_muni");
        return json_encode($municipios);
    }

    public function getCodigoPostal(Request $request)
    {
        $departamento = $request->input('departamento');
        $municipio = $request->input('municipio');
        $codigosPostales = Postal::where([
            ['cod_depto', '=', $departamento],
            ['cod_muni', '=', $municipio],
        ])->pluck("pais", "cod_postal");
        return json_encode($codigosPostales);
    }

    public function getValorMatricula(Request $request)
    {
        $idNacionalidad = $request->input('idNacionalidad');
        $region = 4;
        switch ($idNacionalidad){
            case 30:
                $region = 1;
                break;
            case 26:
            case 27:
            case 28:
            case 31:
            case 32:
            case 33:
                $region = 2;
                break;
            case 25:
            case 34:
            case 35:
            case 36:
            case 37:
            case 38:
            case 39:
            case 40:
            case 41:
            case 42:
            case 43:
            case 44:
            case 45:
            case 46:
            case 47:
            case 48:
                $region = 3;
                break;
        }
        return PrecioMatricula::where('region', $region)->first()->pregradoTotal;//->pregradoInicial;
    }

    public function actualizarDatosEstudiante(Request $request)
    {
        $estudiante = EstudiaOld::findOrFail(Auth::guard('estudiante')->user()->carnet);
        $estudiante->direccion = $request->input('inputDireccion');
        $estudiante->codigo_departamento_recide = $request->input('inputDepartamento');
        $estudiante->codigo_municipio_recide = $request->input('inputMunicipio');
        $estudiante->cod_postal = $request->input('inputCodigoPostal');
        if ($request->has('inputTelefono'))
            $estudiante->telefono = $request->input('inputTelefono', "");
        if ($request->has('inputCelular'))
            $estudiante->celular = $request->input('inputCelular', "");
        $estudiante->save();
        return $estudiante;
    }

    public function verificarInscripcion(Request $request){

        $transaccion = $request->input('idTransaccion');
        $constancia = BitacoraInscripcion::where([['transaccion', '=', $transaccion]])->first();
        $carnet = $constancia->carnet;
        $estudia_old = EstudiaOld::find($carnet);
        $nombreCompleto = $estudia_old->getNombreCompleto();
        $cui = $estudia_old->cui;
        $ciclo = $constancia->ciclo;
        $fechainscripcion = $constancia->fecha_inscripcion;
        $cod_ua = $constancia->cod_ua;
        $cod_ext = $constancia->cod_ext;
        $cod_car = $constancia->cod_car;
        $unidadAcademica = Facultad::find($cod_ua);
        $nombreUA = $unidadAcademica->nomfac;
        $extension = Extension::where([['codigo_unidad_academica', '=', $cod_ua],
        ['codigo_extension', '=', $cod_ext]])->first();
        $nombreExt = $extension->nombre;
        $carrera = CarreraTemporal::buscarCarrera($cod_ua,$cod_ext,$cod_car);
        $nombreCarrera= $carrera->nombre_carrera;
        $boleta = $constancia->boleta;
        $fechaPago = $constancia->fecha_boleta;
        $transaccion = $constancia->transaccion;
        $title = "Registro y Estadística";


        return view('portalEstudiantil.pages.reinscripcion.verificarInscripcion',
            compact('carnet', 'nombreCompleto', 'cui', 'ciclo', 'fechainscripcion',
                    'nombreUA', 'nombreExt', 'nombreCarrera', 'boleta', 'fechaPago', 'transaccion', 'title'));

    }

    public function verificarPreinscripcion(Request $request){

        $transaccion = $request->input('idTransaccion');
        $preinscripcion = Preinscripcion::where([['transaccion', '=', $transaccion]])->first();
        $nov = $preinscripcion->nov;
        $cicloactivo = $preinscripcion->ciclo;
        $nombreUA = $preinscripcion->getnombreUA();
        $nombreExtension = $preinscripcion->getnombreExtension();
        $nombreCarrera = $preinscripcion->getnombreCarrera();
        $informacionAspirante= InformacionAspirante::find($nov);
        $nombreCompleto = $informacionAspirante->getNombreCompleto();
        $cui = $informacionAspirante->numero_registro;
        $title = "Registro y Estadística";

        return view('portalEstudiantil.pages.reinscripcion.verificarPreinscripcion',
            compact('nov', 'transaccion', 'cicloactivo', 'nombreUA', 'nombreExtension', 'nombreCarrera', 'nombreCompleto', 'cui', 'title'));
    }

    public function getEstablecimiento(Request $request){
        $depto = $request->input('depto');
        $muni = $request->input('muni');
        $sec = $request->input('sec');

        $establecimientos = Establecimiento::query()
            ->select('codigo', 'nombre', 'direccion', 'jornada')->where([
            ['depto', '=', $depto],
            ['muni', '=', $muni],
            ['sec', '=', $sec]
        ])->get();

        return json_encode($establecimientos);
    }

    public function requisitos_primerIngreso(){
        $title = 'Requisitos Primer Ingreso Nacionales';
        return view('portalEstudiantil.pages.requisitos_pe_nachionales',compact('title'));
    }

    public function requisitos_primerIngreso_extranjeros(){
        $title = 'Requisitos Primer Ingreso Extranjeros';
        return view('portalEstudiantil.pages.requisitos_pe_extranjeros',compact('title'));
    }
}
