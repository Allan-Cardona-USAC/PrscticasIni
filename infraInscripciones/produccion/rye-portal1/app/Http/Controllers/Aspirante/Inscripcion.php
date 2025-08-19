<?php

namespace App\Http\Controllers\Aspirante;

use App\Funciones\Aspirante;
use App\Funciones\Boletas;
use App\Funciones\Carnet;
use App\Funciones\ConstanciaInscripcion;
use App\Funciones\Expediente;
use App\Funciones\Utilidades;
use App\Http\Controllers\Aspirante\Auth\ResetPasswordController;
use APP\Http\Controllers\Aspirante\InscripcionAspiranteController;
use App\Http\Controllers\Estudiante\Reinscripcion;
use App\Models\Calendario;
use App\Models\BitacoraInscripcion;
use App\Models\BoletaInscripcion;
use App\Models\BoletasExtranjero;
use App\Models\CarreraEstudiante;
use App\Models\CarreraTemporal;
use App\Models\CicloActivo;
use App\Models\Departamento;
use App\Models\Preinscripcion;
use App\Models\Establecimiento;
use App\Models\EstudiaOld;
use App\Models\Etnia;
use App\Models\Facultad;
use App\Models\InformacionAspirante;
use App\Models\InscripcionPrimerIngreso;
use App\Models\MatriculaExtranjero;
use App\Models\Municipio;
use App\Models\Nacionalidad;
use App\Models\Pais;
use App\Models\Pcb;
use App\Models\PingBoleta;
use App\Models\Postal;
use App\Models\PrecioMatricula;
use App\Models\PruebaEspecifica;
use App\Models\TipoTituloDiversificado;
use App\Models\TipoEstablecimiento;
use App\Models\TituloDiversificado;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use DateTime;
use Exception;
use Carbon\Carbon;
use GuzzleHttp\Client;
use const http\Client\Curl\AUTH_ANY;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use \Validator;
use Illuminate\View\View;
use nusoap_client;
use PDF;
use Request as getIP;
use GuzzleHttp\Exception\ConnectException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Funciones\Mineduc;


class Inscripcion extends Controller
{
    use Mineduc;

    const constantRNF = 'No hay registros';
    protected $redirectTo = '/aspirante/login';

    public $InscripcionActiva = true;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aspirante.auth:aspirante');
    }

 // Para perfil del Aspirante

    public function agregarMensaje($consulta){
        $variable = "";
        $aprobadas = array();
        foreach ($consulta as $prueba){
            array_push($aprobadas, $prueba->id_prueba);
            switch($prueba['id_prueba']){
                case '1':
                    $variable .= ':: Biología';
                    break;
                case '2':
                    $variable .= ':: Física';
                    break;
                case '3':
                    $variable .= ':: Lenguaje';
                    break;
                case '4':
                    $variable .= ':: Matemática';
                    break;
                case '5':
                    $variable .= ':: Química';
                    break;
            }
        }

        return [$variable, $aprobadas];
    }

    public function consultarSun($nov, $request){
        $pruebasGanadas = array();
        $client = new Client();
        $url = "https://resultadospcbws.usac.edu.gt/resultados";
        $comm_error= false;
        try{
            $res = $client->post($url,
                [
                    'auth' => ['RyE_USAC20', 'RyE@2020_1'],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Cache-Control' => 'no-cache',
                    ],
                    'json' => [
                        'nov' => strval($nov),
                        'esCarnet' => false
                    ]
                ]
            );

        } catch(\Exception $ex){
            $comm_error = true;
            $request->session()->flash('alert-warning', 'Error de comunicación o no se encontro datos de aspirante en el servicio de consulta de pruebas básicas del SUN');
        }

        $variable = "";

        if($comm_error)
            return [$variable, $pruebasGanadas];

        // Encuentra el WS y devuelve lo que obtiene de SUN :)
        if($res->getBody() == null)
            return [$variable, $pruebasGanadas];

        $respuesta = json_decode($res->getBody(), true);

        foreach ($respuesta['aprobados'] as $prueba){
            $variable .= ":: ".$prueba;
            switch ($prueba){
                case 'Biología':
                    array_push($pruebasGanadas, 1);
                    break;
                case 'Fisica':
                    array_push($pruebasGanadas, 2);
                    break;
                case 'Lenguaje':
                    array_push($pruebasGanadas, 3);
                    break;
                case 'Matemática':
                    array_push($pruebasGanadas, 4);
                    break;
                case 'Química':
                    array_push($pruebasGanadas, 5);
                    break;
                default:
                    array_push($pruebasGanadas, 5);
            }
        }

        return [$variable, $pruebasGanadas];
    }

    public function perfilAspirante(Request $request) {
        $cui = $request->input('cui');
        $nov = $request->input('nov');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $celular = $request->input('celular');
        $nit =$request->input('nit');

        $aspirante = InformacionAspirante::where('nov', $nov)->first();
        $aspirante->fill([
            'cui'=>$cui,
            'email'=>$email,
            'telefono'=>$telefono,
            'celular'=>$celular,
            'nit'=>$nit
        ]);
        $aspirante->save();

        return redirect()->route('aspirante.perfil');
    }

    /**
    * comprueba que el aspirante no cuente con
    * perfil de estudiante
    **/
    public function esEstudiante(){
        $nov = Auth::guard('aspirante')->user()->nov;
        $estudiante = EstudiaOld::where([['cod_orien', '=', $nov]
            ])->get()->first();
        
        return $estudiante;
    }

    /**
     * Inicio del proceso de inscripciÃ³n
     * Paso 1 - Formulario de Solicitud de inscripcion o Datos personales
     * Paso 2 - Seleccion de departamento o centro de estudios
     * Paso 3 - Seleccion de Unidad Academica
     * Paso 4 - Seleccion de Extension y Carrera
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request){
        /*validando que no sea estudiante*/
        $nov = Auth::guard('aspirante')->user()->nov;
        $ciclo = CicloActivo::first();

        if($this->esEstudiante()){
            return redirect()->route('aspirante.perfil');
        }

        $title = 'Fase 1 de 2 - Solicitud de Pre-Inscripción'; //titulo de la pagina

        $procesos = InscripcionPrimerIngreso::where([
            ['nov', '=', $nov]
        ])->get();

        foreach($procesos as $proceso){
    
            if ($proceso->unidadAcademica == 29 and ($proceso->carrera>=35 or $proceso->carrera<=38) and $proceso->ciclo == $ciclo->ciclo_padep){
                
                return redirect()->route('aspirante.fase2');
            }

            if (!empty($proceso->unidadAcademica) and !empty($proceso->carrera and $proceso->ciclo == $ciclo->ciclo_web_pregrado)){
                
                return redirect()->route('aspirante.fase2');
            }
                
        }
                

        /**
         * Datos para los nombres y nÃºmeros de:
         * - Departamentos
         * - Municipios
         * - CÃ³digos Postales
         * - Pais
         * - Nacionalidad
         * - Etnia
         */
        $departamentos = Departamento::all();
        if (Auth::guard('aspirante')->user()->depto_recide){
            $municipios = Municipio::where('cod_depto', Auth::guard('aspirante')->user()->depto_recide)->get();
        }else{
            $municipios = Municipio::where('cod_depto', '=', 1)->get();
        }
        if (Auth::guard('aspirante')->user()->muni_recide){
            $codigosPostales = Postal::where([
                ['cod_depto', '=', Auth::guard('aspirante')->user()->depto_recide],
                ['cod_muni', '=', Auth::guard('aspirante')->user()->muni_recide],
            ])->get();
        }else{
            $codigosPostales = Postal::where([
                ['cod_depto', '=', 1],
                ['cod_muni', '=', 1],
            ])->get();
        }
        $paises = Pais::all();
        $nacionalidades = Nacionalidad::all();
        $etnia = Etnia::all();

        /**
         * Obtiene el id de las pruebas ganadas por el aspirante y lo convierte en un array
         */
        $pruebasGanadas = array();
        $nov = Auth::guard('aspirante')->user()->nov;

        $pruebasUsuario = pcb::select('id_prueba')->where('nov', '=', $nov)->get();
        $tmp = $this->agregarMensaje($pruebasUsuario);

        if($pruebasUsuario->count() == 0){
            $tmp = $this->consultarSun($nov, $request);
        }

        $variable = $tmp[0];
        $pruebasGanadas = $tmp[1];

        $request->session()->flash('alert-warning', 'Prueba de PCB  Ganadas' . $variable);

        //Obtiene los requisitos de pruebas basicas de cada Lugar de Estudios -> Unidad Academica -> Extension -> Carreras
        $carreras = CarreraTemporal::select(
            'extension_lugar.lugar_estudios AS lugarEstudios',
            'extension_lugar.codigo_extension AS codigoLugar',
            'facultad.codfac AS idFacultad',
            'facultad.nomfac AS facultad',
            'extension.codigo_extension AS idExtension',
            'extension.nombre AS extension',
            'carrera_temporal.codigo_carrera AS idCarrera',
            'carrera_temporal.nombre_carrera AS carrera',
            'p1.id_pcb AS Biologia',
            'p2.id_pcb AS Fisica',
            'p3.id_pcb AS Lenguaje',
            'p4.id_pcb AS Matematica',
            'p5.id_pcb AS Quimica'
        )
            ->join('extension', function ($join){
                $join->on('extension.codigo_unidad_academica', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('extension.codigo_extension', '=', 'carrera_temporal.codigo_extension');
            })
            ->join('extension_lugar', function ($join){
                $join->on('extension.codigo_unidad_academica', '=', 'extension_lugar.codigo_unidad_academica');
                $join->on('extension.codigo_extension', '=', 'extension_lugar.codigo_extension');
            })
            ->join('facultad', 'facultad.codfac', '=', 'carrera_temporal.codigo_unidad_academica')
            ->leftJoin('pcb_carrera as p1', function($join){
                $join->on('p1.ua', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('p1.ext', '=', 'carrera_temporal.codigo_extension');
                $join->on('p1.car', '=', 'carrera_temporal.codigo_carrera');
                $join->on('p1.id_pcb', '=', DB::raw(1));
            })
            ->leftJoin('pcb_carrera as p2', function($join){
                $join->on('p2.ua', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('p2.ext', '=', 'carrera_temporal.codigo_extension');
                $join->on('p2.car', '=', 'carrera_temporal.codigo_carrera');
                $join->on('p2.id_pcb', '=', DB::raw(2));
            })
            ->leftJoin('pcb_carrera as p3', function($join){
                $join->on('p3.ua', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('p3.ext', '=', 'carrera_temporal.codigo_extension');
                $join->on('p3.car', '=', 'carrera_temporal.codigo_carrera');
                $join->on('p3.id_pcb', '=', DB::raw(3));
            })
            ->leftJoin('pcb_carrera as p4', function($join){
                $join->on('p4.ua', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('p4.ext', '=', 'carrera_temporal.codigo_extension');
                $join->on('p4.car', '=', 'carrera_temporal.codigo_carrera');
                $join->on('p4.id_pcb', '=', DB::raw(4));
            })
            ->leftJoin('pcb_carrera as p5', function($join){
                $join->on('p5.ua', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('p5.ext', '=', 'carrera_temporal.codigo_extension');
                $join->on('p5.car', '=', 'carrera_temporal.codigo_carrera');
                $join->on('p5.id_pcb', '=', DB::raw(5));
            })
            ->where([
                ['carrera_temporal.estado', '=', 1],
                ['carrera_temporal.estado_ingreso', '=', 1],
                ['carrera_temporal.prerequisito', '=', 0]
            ])
            ->whereIn('carrera_temporal.codigo_nivel', [1,2])
            ->orderBy('facultad.codfac', 'DESC')
            ->orderBy('extension.codigo_extension', 'DESC')
            ->orderBy('carrera_temporal.codigo_carrera', 'DESC')
            ->get();


        //Ciclo para validar las carreras a las que el usuario puede ingresar
        foreach ($carreras as $key => $carrera){

            $pruebasNecesarias = array(); //arreglo para almacenar la pruebas necesarias para esa carrera
            if(!empty($carrera->Biologia)) array_push($pruebasNecesarias, 1);
            if(!empty($carrera->Fisica)) array_push($pruebasNecesarias, 2);
            if(!empty($carrera->Lenguaje)) array_push($pruebasNecesarias, 3);
            if(!empty($carrera->Matematica)) array_push($pruebasNecesarias, 4);
            if(!empty($carrera->Quimica)) array_push($pruebasNecesarias, 5);

            //si no tiene ninguna prueba ganada
            if (count($pruebasGanadas)==0)
            {
                $carrera->mostrar = false;
            }else{
                //Comparacion si el usuario tiene las pruebas minimas para ingresar a la unidad academica
                if($pruebasNecesarias == array_intersect($pruebasNecesarias, $pruebasGanadas)){
                    $carrera->mostrar = true; //Bandera para mostrar
                }else{
                    $carrera->mostrar = false;
                }
            }

        }

        //Ciclo que elimina las carreras a las que no puede entrar
        foreach ($carreras as $key => $carrera){
            if (!$carrera->mostrar){
                $carreras->forget($key);
            }
        }

        //todo validar si no tiene ninguna carrera mostrar pantalla de error

        //Agrupo lo anterior por Lugares de estudio
        $lugaresDeEstudio = $carreras->sortBy('lugarEstudios')->groupBy('lugarEstudios');

        //Ciclo para agrupar por Unidades Academicas
        foreach ($lugaresDeEstudio as $key => $lugarEstudio){
            $lugaresDeEstudio[$key] = $lugarEstudio->sortBy('idFacultad')->groupBy('facultad');

            //Ciclo para agrupar por extensiÃ³n
            foreach ($lugaresDeEstudio[$key] as $subkey => $facultad){
                $lugaresDeEstudio[$key][$subkey] = $facultad->sortBy('idExtension')->groupBy('extension');
            }
        }

        return view(
            'aspirante.inscripcion.fase1',
            compact(
                'title', //titulo de la pÃ¡gina
                'lugaresDeEstudio' //Variable con todas las carreras a las que el estudiante puede entrar
            )
        );
    }

    /**
     * Fase 2
     * Paso 5 - Subir DocumentaciÃ³n
     * Paso 6 - Encuesta Socio-economica
     * Paso 7 - Datos del MINEDUC
     */
    public function fase2(){

        $ciclo = CicloActivo::first();
        $nov = Auth::guard('aspirante')->user()->nov;
        $preinscripcion = Preinscripcion::where([
            ['nov', '=', $nov],
            ['ciclo', '=', $ciclo->ciclo_web_pregrado]
        ])->get()->first();

        if($preinscripcion && $preinscripcion->transaccion){
            return redirect()->route('aspirante.constancia');
        }
        //  la vista retornara el combo del departamento, municipio y etnia, pais, que necesecita el archivo
        // fase2.blade.php


        $departamentos = Departamento::all();
        if (Auth::guard('aspirante')->user()->depto_recide){
            $municipios = Municipio::where('cod_depto', Auth::guard('aspirante')->user()->depto_recide)->get();
        }else{
            $municipios = Municipio::where('cod_depto', '=', 1)->get();
        }
        if (Auth::guard('aspirante')->user()->muni_recide){
            $codigosPostales = Postal::where([
                ['cod_depto', '=', Auth::guard('aspirante')->user()->depto_recide],
                ['cod_muni', '=', Auth::guard('aspirante')->user()->muni_recide],
            ])->get();
        }else{
            $codigosPostales = Postal::where([
                ['cod_depto', '=', 1],
                ['cod_muni', '=', 1],
            ])->get();
        }
        $paises = Pais::all();
        $nacionalidades = Nacionalidad::all();
        $etnia = Etnia::all();

        //___________________________
        $tipotitulo  = TipoTituloDiversificado::all();
        $tipoestablecimiento= TipoEstablecimiento::all();
        $establecimientos = Establecimiento::where([
            ['postal', '=', Auth::guard('aspirante')->user()->cod_Postal],
            ['sec', '=', 1]
        ])->get();

        //---------------------------
        $title = 'Datos personales y estudios previos - Fase 2 de 2';
        // se hace la consulta al servicio de Mineduc donde se obtiene los datos de diversificado del estudiante
        // numero registro es el CUI

        return view(
            'aspirante.inscripcion.fase2',
            compact(
                'title', //titulo de la pÃ¡gina
                'departamentos',  //Informacion para el dropdown de departamentos
                'municipios',  //Informacion para el dropdown de municipios
                'codigosPostales',  //Informacion para el dropdown de codigos postales o zonas
                'paises', //Informacion para el dropdown de paises
                'nacionalidades',  //Informacion para el dropdown de nacionalidades
                'etnia', //Informacion para el dropdown de Etnias
                'tipotitulo',
                'tipoestablecimiento',
                'establecimientos'
            )
        );

    }

    /**
     * Fase 3
     * Paso 8 - Confirmar carrera
     * Paso 9 - Pago de matricula
     */
    public function fase3(){
        $title = 'Pago de Matricula - Fase 3 de 3';
        $carnet = null;
        $urlEncuesta = config('inscripcionPregrado.encuesta') . Auth::guard('aspirante')->user()->nov;

        $ciclo = CicloActivo::first(); // Obtiene el aÃ±o actual
        $carrera = InscripcionPrimerIngreso::select(
                'inscripcionPrimerIngreso.unidadAcademica as idFacultad',
                'facultad.nomfac as facultad',
                'inscripcionPrimerIngreso.extension as idExtension',
                'extension.nombre as Extension',
                'inscripcionPrimerIngreso.carrera as idCarrera',
                'carrera_temporal.nombre_carrera as Carrera',
                'inscripcionPrimerIngreso.confirmoCarrera',
                'inscripcionPrimerIngreso.foto',
                'inscripcionPrimerIngreso.certificadoNacimiento'

            )
            ->join('facultad', 'inscripcionPrimerIngreso.unidadAcademica', '=', 'facultad.codfac')
            ->join('extension', function($join){
                $join->on('inscripcionPrimerIngreso.unidadAcademica', '=', 'extension.codigo_unidad_academica');
                $join->on('inscripcionPrimerIngreso.extension', '=', 'extension.codigo_extension');
            })
            ->join('carrera_temporal', function($join){
                $join->on('inscripcionPrimerIngreso.unidadAcademica', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('inscripcionPrimerIngreso.extension', '=', 'carrera_temporal.codigo_extension');
                $join->on('inscripcionPrimerIngreso.carrera', '=', 'carrera_temporal.codigo_carrera');
            })
            ->where([['inscripcionPrimerIngreso.nov', '=', Auth::guard('aspirante')->user()->nov],
                ['inscripcionPrimerIngreso.ciclo', '=', $ciclo->ciclo_web_pregrado]])
            ->first();

        //todo validar que tenga foto y certificado y encuesta o lo regreso a la pagina anterior
        if ($carrera->foto == 0 or $carrera->certificadoNacimiento == 0){
            return redirect()->route('aspirante.fase2');
        }

        //if (!$carrera->status){ //status is deprecated, no estoy chingando
            //todo regresarlo a la pantalla de error de que tiene problemas con el titulo
        //}

        /**
         * Estado es utilizado para saber si debemos crear una boleta, descargar una existente o generar constancÃ¬a de inscripciÃ²n
         * 0 = Generar Boleta
         * 1 = Descargar Boleta
         * 2 = Generar Constancia de InscripciÃ³n
         */
//rvista(portal ests)
        //Reviso si el usuario tiene boletas vigentes
        $boleta = $this->getBoletaVigente(Auth::guard('aspirante')->user()->nov, $carrera->idFacultad, $carrera->idExtension, $carrera->idCarrera);
        if ($boleta){
            $boletaPagada = $this->validarBoletaPrimerIngreso($boleta->id_orden_pago, $boleta->carnet);
            $boletaPagada = true; //todo solo para debug

            if (is_string($boletaPagada)){
                return HomeController::mensajeError($boletaPagada);
            }

            if($boletaPagada){
                $carnet = Carnet::generarPrimerIngreso(Auth::guard('aspirante')->user()->nov);
                $this->inscribir($carnet, Auth::guard('aspirante')->user()->nov);
                $estado = 2;
            }else{
                $estado = 1;
            }
        }else{
            $estado = 0;
        }

        return view(
            'aspirante.inscripcion.fase3',
            compact('title', 'ciclo', 'urlEncuesta', 'carrera', 'estado', 'carnet')
        );
    }

    /**
     * Fase 1 - Paso 1 - Formulario de datos personales
     * Este mÃ©todo almacena toda la informaciÃ³n del formulario en la tabla informacion_aspirante
     * @param Request $request
     * @return string
     */
    public function insertarDatos(Request $request){
        $nov = Auth::guard('aspirante')->user()->nov;
        $informacionAspirante = InformacionAspirante::firstOrNew(['nov' => $nov]); //Mi nov 2013002734

        $datosValidos = Validator::make($request->all(), [
            'nov' => 'required|numeric',
            'apellido1' => 'required|string|max:20',
            'apellido2' => 'nullable|string|max:20',
            'nombre1' => 'required|string|max:20',
            'nombre2' => 'nullable|string|max:20',
            'otros_nombres' => 'nullable|string|max:100',
            'direccion' => 'required|string|max:100',
            'muni_recide' => 'required|numeric|min:0',
            'depto_recide' => 'required|numeric|min:0',
            'cod_Postal' => 'required|numeric|min:0',
            'nacionalidad' => 'required|numeric|min:0',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'correo_electronico' => 'required|email',
            'etnia' => 'required|numeric',
            'idioma_etnia' => 'required|numeric',
            'idioma_gt' => 'required|numeric',
            'idioma_no_gt' => 'nullable|string',
            'sexo' => 'required|numeric|min:0|max:2',
            'telefono' => 'nullable|numeric',
            'celular' => 'required|numeric',
            'numero_registro' => 'required',
            'pais_nac' => 'required|numeric|min:0',
            'depto_nac' => 'nullable|numeric|min:0',
            'muni_nac' => 'nullable|numeric|min:0',
            'nit' => 'nullable'
        ]);

        if ($datosValidos->fails()){
            return response(strval($datosValidos->messages()), 500);
        }

        //Aqui se puede dar algun formato especifico o validaciones adicionales al formulario de Solicitud de Ingreso o Datos Personales
        $nacionalidad = $request->input('nacionalidad');
        $numeroRegistro = $request->input('numero_registro');
        $informacionAspirante->nov = $nov;
        $informacionAspirante->apellido1 = ucwords($request->input('apellido1'));
        $informacionAspirante->apellido2 = ucwords($request->input('apellido2'));
        $informacionAspirante->nombre1 = ucwords($request->input('nombre1'));
        $informacionAspirante->nombre2 = ucwords($request->input('nombre2'));
        $informacionAspirante->otros_nombres = ucwords($request->input('otros_nombres'));
        $informacionAspirante->direccion = trim($request->input('direccion'));
        $informacionAspirante->muni_recide = $request->input('muni_recide');
        $informacionAspirante->depto_recide = $request->input('depto_recide');
        $informacionAspirante->cod_Postal = $request->input('cod_Postal');
        $informacionAspirante->nacionalidad = $nacionalidad;
        $informacionAspirante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $informacionAspirante->correo_electronico = $request->input('correo_electronico');
        $informacionAspirante->etnia = $request->input('etnia');
        $informacionAspirante->idioma_etnia = $request->input('idioma_etnia');
        $informacionAspirante->idioma_gt = $request->input('idioma_gt');
        $informacionAspirante->idioma_no_gt = trim($request->input('idioma_no_gt'));
        $informacionAspirante->sexo = $request->input('sexo');
        $informacionAspirante->telefono = $request->input('telefono');
        $informacionAspirante->celular = $request->input('celular');
        $informacionAspirante->numero_orden = ($nacionalidad == 30) ? 'DPI' : 'PAS';
        $informacionAspirante->numero_registro = $numeroRegistro;
        $informacionAspirante->pais_nac = $request->input('pais_nac');
        $informacionAspirante->depto_nac = $request->input('depto_nac');
        $informacionAspirante->muni_nac = $request->input('muni_nac');
        $informacionAspirante->nit = $request->input('nit');


        /**
         * Validacion de homologos por nombre completo y fecha de nacimiento
         */
        $duplicados = InformacionAspirante::where([
            ['apellido1', 'like', $informacionAspirante->apellido1],
            ['apellido2', 'like', $informacionAspirante->apellido2],
            ['nombre1', 'like', $informacionAspirante->nombre1],
            ['nombre2', 'like', $informacionAspirante->nombre2],
            ['fecha_nacimiento', '=', $informacionAspirante->fecha_nacimiento],
            ['nov', '<>', $informacionAspirante->nov]
        ])
            ->whereIn('otros_nombres', array($informacionAspirante->otros_nombres, NULL, ''))
            ->count();

        if ($duplicados > 0){
            $error_duplicado = [
                'error' => 1,
                'mensaje' => 'Usuario duplicado, por favor ir al Departamento de Registro y Estadística a solventar su situación.'
            ];
            return response()->json($error_duplicado, 425);
        }

        $bandera = $informacionAspirante->save();

        Expediente::crear(Auth::guard('aspirante')->user()->nov);

        if(!$bandera){
            return response()->json('Error la información no se pudo almacenar, por favor intentelo más tarde.', 400); //Mensaje de error
        }

        return response()->json("¡Información almacenada exitosamente!", 200); //Mensaje de informacion almacenada
    }

    /**
     * Fase 1 - Paso 4 - SelecciÃ³n de carrera
     * Este paso debe validar que el aspirante tenga las pruebas específicas necesarias para ingresar a la carrera seleccionada
     * Luego almacena esa carrera en la tabla inscripcionPrimerIngreso
     * @param Request $request
     * @return int
     */
    public function registrarCarrera(Request $request){
        $nov =  Auth::guard('aspirante')->user()->nov;
        $ciclo = CicloActivo::first();

        $unidadA= $request->input('idFacultad');
        $ext = $request->input('idExtension');
        $car = $request->input('idCarrera');

        if ($unidadA == 29 && ($car >= 35 or $car<=38)){
            $registro = InscripcionPrimerIngreso::firstOrNew([ 'nov' => $nov, 'ciclo' => $ciclo->ciclo_padep]);
            $registro->nov = $nov;
            $registro->unidadAcademica = $request->input('idFacultad');
            $registro->extension = $request->input('idExtension');
            $registro->carrera = $request->input('idCarrera');

        // Enlace con el sistema antiguo /inscripcionenlinea        
            $preinscripcion =Preinscripcion::firstOrNew([ 'nov' => $nov, 'ciclo'=> $ciclo->ciclo_padep ]);
            $preinscripcion->nov = $nov;
            $preinscripcion->ciclo= $ciclo->ciclo_padep;
            $preinscripcion->UA =  $request->input('idFacultad');
            $preinscripcion->ext =  $request->input('idExtension');
            $preinscripcion->car = $request->input('idCarrera');
            $preinscripcion->fecha_preinscripcion = Carbon::now();
            

        }else{

            $registro = InscripcionPrimerIngreso::firstOrNew([ 'nov' => $nov, 'ciclo' => $ciclo->ciclo_web_pregrado]);
            $registro->nov = $nov;
            $registro->unidadAcademica = $request->input('idFacultad');
            $registro->extension = $request->input('idExtension');
            $registro->carrera = $request->input('idCarrera');

        // Enlace con el sistema antiguo /inscripcionenlinea        
            $preinscripcion =Preinscripcion::firstOrNew([ 'nov' => $nov, 'ciclo'=> $ciclo->ciclo_web_pregrado ]);
            $preinscripcion->nov = $nov;
            $preinscripcion->ciclo= $ciclo->ciclo_web_pregrado;
            $preinscripcion->UA =  $request->input('idFacultad');
            $preinscripcion->ext =  $request->input('idExtension');
            $preinscripcion->car = $request->input('idCarrera');
            $preinscripcion->fecha_preinscripcion = Carbon::now();
        }

        $validacion = $this->consultarPruebaEspecifica(
            $registro->nov,
            Auth::guard('aspirante')->user()->numero_registro,
            $registro->unidadAcademica,
            $registro->extension,
            $registro->carrera
        );

        if (is_string($validacion)){
            return response()->json($validacion, 500); //Mensaje de error de comunicaciÃ³n con ws
        }else{
            if ($validacion){
                $registro->save();
                $preinscripcion->save();
                return response()->json('¡Carrera selecionada exitosamente!', 200); //Mensaje de exito
            }else{
                return response()->json('Prueba especifica con resultado insatisfactorio', 404); //Mensaje de prueba insatisfactoria

            }
        }
    }

    public function dbPruebaEspecifica(int $nov, int $codUA, int $ext, int $carrera, int $ciclo){
        $prueba = PruebaEspecifica::select('resultado')
            ->where([
                ['nov', '=', $nov],
                ['ua', '=', $codUA],
                ['ext', '=', $ext],
                ['car', '=', $carrera],
                ['ciclo', '>=', ($ciclo - 3)]
            ])->first();

        if($prueba && $prueba->resultado == 'Satisfactorio')
            return true;
    
        return 'No se han registrado pruebas específicas para '
            . Facultad::find($codUA)->nomfac
            . ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos.";
    }
    /**
     * Fase 1 - Paso 4 - SelecciÃ³n de carrera
     * Con un switch se usan los ws de las unidades academicas y si no se encuentran se busca en la BD tabla PruebaEspecifica
     * @param int $nov
     * @param int $cui
     * @param int $unidadAcademica
     * @param int $extension
     * @param int $carrera
     * @return bool|string true = Satisfactorio | false = Insatisfactorio | string = Mensaje de error
     */
    //todo revisar con santi el funcionamiento de esto para los mensajes de error o prueba insatisfactoria
    public function consultarPruebaEspecifica(int $nov, string $cui, int $unidadAcademica, int $extension, int $carrera){
        $ciclo = CicloActivo::first();
        switch ($unidadAcademica){
            case 2: //Arquitectura
                try{
                    $textopm_esp="<VERIFICAR_PE>".
                        "<USR>20179543</USR>".
                        "<PWD>cKBu!tTF5p7UrNYutw08</PWD>".
                        "<NOV>$nov</NOV>".
                        "<CUI>$cui</CUI>".
                        "<UA>$unidadAcademica</UA>".
                        "<EXT>$extension</EXT>".
                        "<CAR>$carrera</CAR>".
                        "<CICLO>$ciclo->ciclo_web_pregrado</CICLO>".
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('http://aspirante.arquitectura.usac.edu.gt/soap/wsPrimerIngreso?wsdl','wsdl');
                    $param=array('pxml'=>$textopm_esp,);
                    $response = $client->call('verificar_prueba_especifica_str', $param);
                    $datosEspecifica = Utilidades::xml2array(
                                        utf8_encode(
                                            str_replace("<NOTA/>","",
                                                str_replace('<?xml version="1.0"?>','',$response))));

                    if(
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "Satisfactorio"
                    ){
                        return true; //Satisfactorio
                    } 
                    
                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
                }catch(Exception $x){
                   return 'error de comunicación con '. Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
            case 4: //Derecho
                try{
                    $textopm_esp="<VERIFICAR_PE>".
                        "<USR>a579996707f93f77f5fd85e98d2ac0d4</USR>".
                        "<PWD>0f1b00fbca289bea8865f2e2c995d586</PWD>".

                        "<NOV>$nov</NOV>".
                        "<CUI>$cui</CUI>".
                        "<UA>$unidadAcademica</UA>".
                        "<EXT>$extension</EXT>".
                        "<CAR>$carrera</CAR>".
                        "<CICLO>$ciclo->ciclo_web_pregrado</CICLO>".
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('https://usacderecho.com/wspiderecho/wspiderecho.php?wsdl','wsdl');
                    $param=array('datos'=>$textopm_esp,);
                    $response = $client->call('verificar_PE_NOV', $param);

                    $datosEspecifica = Utilidades::xml2array(utf8_encode($response));
                    if(
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "1"
                    ){
                        return true; //Satisfactorio
                    }

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
                }catch(Exception $x){
                   return 'Error de comunicación con -'. Facultad::find($unidadAcademica)->nomfac;
                }
            case 5: //Medicina201020578
                try{
                    $textopm_esp="<VERIFICAR_PE>".
                        "<USR>parnaso</USR>".
                        "<PWD>00:22:19:61:D4:BB</PWD>".
                        "<NOV>$nov</NOV>".
                        "<CUI>$cui</CUI>".
                        "<UA>$unidadAcademica</UA>".
                        "<EXT>$extension</EXT>".
                        "<CAR>$carrera</CAR>".
                        "<CICLO>$ciclo->ciclo_web_pregrado</CICLO>".
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('http://registro.usac.edu.gt/WSping/especificasMedicina.php?wsdl','wsdl');
                    $param=array('xmlDatos'=>$textopm_esp,);
                    $response = $client->call('especificasMedicina', $param);
                    $datosEspecifica = Utilidades::xml2array(utf8_encode($response['return']));
                    if(
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] === "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] === "Satisfactorio"
                    ){
                        return true; //Satisfactorio
                    }

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
                }catch(Exception $x){
                    return 'Error de comunicacion con '. Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
            case 8: //Ingenieria

                $id_cliente = "WEBSERP";
                $data_array = array("operacion"=> "obtener_resultados_estudiante", "idVocacional" => $nov);
                $data_json = json_encode($data_array);
                $ff = hash_hmac('sha1', $data_json, 'f80pcnol3v68dabspgph', true);
                $hmac = base64_encode($ff);

                $url = 'https://primeringreso.ingenieria.usac.edu.gt/rest.php';
                $data = array('id_cliente' => $id_cliente, 'data' => $data_json, 'hash' => $hmac);
                $ch = curl_init($url);

                $postString = http_build_query($data, '', '&');

                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($ch);
                curl_close($ch);

                $morir = json_decode(json_decode($response,true));

                $pruebas= $morir->pruebasaprobadas; // esto devuelve un 1 : GANO
                if ($pruebas == 1) {
                    return true; //Satisfactorio
                }else if($pruebas == 0){
                    //Busca si es exonerado
                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
                }else{
                    return 'Error de comunicación con ' . Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
            case 12: //CUNOC
                try{
                    $textopm_esp="<VERIFICAR_PE>".
                        "<USR>rye7aC</USR>".
                        "<PWD>3on54y3+</PWD>".
                        "<NOV>$nov</NOV>".
                        "<CUI>$cui</CUI>".
                        "<UA>$unidadAcademica</UA>".
                        "<EXT>$extension</EXT>".
                        "<CAR>$carrera</CAR>".
                        "<CICLO>$ciclo->ciclo_web_pregrado</CICLO>".
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('https://ryca.cunoc.edu.gt/serviciosweb/wsdl_sncunoc.php?wsdl','wsdl');
                    $param=array('parametros'=>$textopm_esp,);
                    $response = $client->call('primerIngreso', $param);
                    $datosEspecifica = Utilidades::xml2array(utf8_encode(str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$response)));
                    if(
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "Satisfactorio"
                    ){
                        return true; //Satisfactorio
                    }

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
                }catch(Exception $x){
                    return 'Error de comunicación con '. Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }

            case 14: // Historia
                $pruebas = PruebaEspecifica::where([
                ['nov', '=', $nov],
                ['ua', '=', $unidadAcademica]
                ])->first();

                if ($pruebas && $pruebas->resultado=='Satisfactorio')
                    return true;
                   
                return 'No se han registrado pruebas específicas para   '
                    . Facultad::find($unidadAcademica)->nomfac
                    . ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos.";
            case 77: //Humanidades
                try{
                    $textopm_esp="<VERIFICAR_PE>".
                        "<USR>rye</USR>".
                        "<PWD>17#pe!20</PWD>".
                        "<NOV>$nov</NOV>".
                        "<CUI>$cui</CUI>".
                        "<UA>$unidadAcademica</UA>".
                        "<EXT>$extension</EXT>".
                        "<CAR>$carrera</CAR>".
                        "<CICLO>$ciclo->ciclo_web_pregrado</CICLO>".
                        "</VERIFICAR_PE>";

                    $client = new nusoap_client('http://humanidades.usac.edu.gt/pruebas_especificas/WS/pe','wsdl');
                    $param=array('entrada'=>$textopm_esp,);
                    $response = $client->call('getResultadoPE', $param);

                    $datosEspecifica = Utilidades::xml2array(utf8_encode($response));
                    if(
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "Satisfactorio"
                    ){
                        return true; //Satisfactorio
                    }

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
        
                }catch(Exception $x){
                    return 'Error de comunicación con '. Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
        }

        return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo->ciclo_web_pregrado);
    }

    /**
    ** Metod insertar en aspirantes, solo carga la informacion del aspirante
    */
    public function insertarAspirante(Request $request){
        $nov = Auth::guard('aspirante')->user()->nov;
        $informacionAspirante = InformacionAspirante::firstOrNew(['nov' => $nov]); //Mi nov 2013002734

        $datosValidos = Validator::make($request->all(), [
            'nov' => 'required|numeric',
            'pin' => 'required|string|max:10',
            'apellido1' => 'required|string|max:20',
            'apellido2' => 'nullable|string|max:20',
            'nombre1' => 'required|string|max:20',
            'nombre2' => 'nullable|string|max:20',
            'otros_nombres' => 'nullable|string|max:100',
            'direccion' => 'required|string|max:100',
            'muni_recide' => 'required|numeric|min:0',
            'depto_recide' => 'required|numeric|min:0',
            'cod_Postal' => 'required|numeric|min:0',
            'nacionalidad' => 'required|numeric|min:0',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'correo_electronico' => 'required|email',
            'etnia' => 'required|numeric',
            'idioma_etnia' => 'required|numeric',
            'idioma_gt' => 'required|numeric',
            'idioma_no_gt' => 'nullable|string',
            'sexo' => 'required|numeric|min:0|max:2',
            'telefono' => 'nullable|numeric',
            'celular' => 'required|numeric',
            'numero_registro' => 'required',
            'pais_nac' => 'required|numeric|min:0',
            'depto_nac' => 'nullable|numeric|min:0',
            'muni_nac' => 'nullable|numeric|min:0',
            'nit' => 'nullable'
        ]);

        if ($datosValidos->fails()){
            return response(strval($datosValidos->messages()), 500);
        }

        //Aqui se puede dar algun formato especifico o validaciones adicionales al formulario de Solicitud de Ingreso o Datos Personales
        $numeroRegistro = $request->input('numero_registro');
        $informacionAspirante->nov = $nov;
        $informacionAspirante->pin = $request->input('pin');
        $informacionAspirante->apellido1 = ucwords($request->input('apellido1'));
        $informacionAspirante->apellido2 = ucwords($request->input('apellido2'));
        $informacionAspirante->nombre1 = ucwords($request->input('nombre1'));
        $informacionAspirante->nombre2 = ucwords($request->input('nombre2'));
        $informacionAspirante->otros_nombres = ucwords($request->input('otros_nombres'));
        $informacionAspirante->direccion = trim($request->input('direccion'));
        $informacionAspirante->muni_recide = $request->input('muni_recide');
        $informacionAspirante->depto_recide = $request->input('depto_recide');
        $informacionAspirante->cod_Postal = $request->input('cod_Postal');
        $informacionAspirante->nacionalidad = $request->input('nacionalidad');
        $informacionAspirante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $informacionAspirante->correo_electronico = $request->input('correo_electronico');
        $informacionAspirante->etnia = $request->input('etnia');
        $informacionAspirante->idioma_etnia = $request->input('idioma_etnia');
        $informacionAspirante->idioma_gt = $request->input('idioma_gt');
        $informacionAspirante->idioma_no_gt = trim($request->input('idioma_no_gt'));
        $informacionAspirante->sexo = $request->input('sexo');
        $informacionAspirante->telefono = $request->input('telefono');
        $informacionAspirante->celular = $request->input('celular');
        $informacionAspirante->numero_orden = ($informacionAspirante->nacionalidad == 30) ? 'DPI' : 'PAS';
        $informacionAspirante->numero_registro = $numeroRegistro;
        $informacionAspirante->pais_nac = $request->input('pais_nac');
        $informacionAspirante->depto_nac = $request->input('depto_nac');
        $informacionAspirante->muni_nac = $request->input('muni_nac');
        $informacionAspirante->nit = $request->input('nit');

        /**
         * Validacion de homologos por nombre completo y fecha de nacimiento
         */
        $duplicados = InformacionAspirante::where([
            ['apellido1', 'like', $informacionAspirante->apellido1],
            ['apellido2', 'like', $informacionAspirante->apellido2],
            ['nombre1', 'like', $informacionAspirante->nombre1],
            ['nombre2', 'like', $informacionAspirante->nombre2],
            ['fecha_nacimiento', '=', $informacionAspirante->fecha_nacimiento],
            ['nov', '<>', $informacionAspirante->nov]
        ])
            ->whereIn('otros_nombres', array($informacionAspirante->otros_nombres, NULL, ''))
            ->count();

        if ($duplicados > 0){
            return response()->json(['Usuario duplicado, por favor ir al Departamento de Registro y Estadistica a solventar su situación.'], 425);
        }

        $bandera = $informacionAspirante->save();

        if(!$bandera){
            return response()->json('Error la información no se pudo almacenar, por favor intentelo más tarde.', 502); //Mensaje de error
        }

        $tipoConsulta = 1;
        $datosMineduc = $this->datosMineduc($numeroRegistro,$tipoConsulta);

        if(!$datosMineduc){
            $respuesta = [
                'encontrado' => false
            ];
            return response()->json($respuesta, 200);
        }

        $nombreDiversificado = explode(' ', $datosMineduc->TituloMedio->nombre_carrera, 2);
        $codigoDiversificado = TipoTituloDiversificado::where('nombre', 'LIKE', substr($nombreDiversificado[0], 0 , 4) . '%')->first();

        $tipo_titulo = 6;

            if ($codigoDiversificado) {
                $tipo_titulo = $codigoDiversificado->codigo_tipo_titulo_diversificado;
            }

        $establecimiento = DB::table('establecimiento')
                ->join('departamento', 'establecimiento.depto', '=', 'departamento.codigo')
                ->join('municipio', 'establecimiento.muni', '=', 'municipio.cod_muni')
                ->where('establecimiento.codigo', '=', $datosMineduc->TituloMedio->codigo_establecimiento)
                ->select('departamento.codigo as cod_depto', 'municipio.cod_muni', 'municipio.municipio', 'establecimiento.sec',
                         'establecimiento.postal', 'establecimiento.codigo', 'establecimiento.nombre', 'establecimiento.direccion',
                         'establecimiento.jornada')
                ->get()->first();

        $municipio='Sin datos';

        if(!$establecimiento){
            $establecimiento = Establecimiento::find($datosMineduc->TituloMedio->codigo_establecimiento);
        }else{
            $municipio=$establecimiento->municipio;
        }

        $respuesta = [
            'encontrado'=>true,
            'cod_depto'=>$establecimiento->cod_depto,
            'cod_muni'=>$establecimiento->cod_muni,
            'municipio'=>$municipio,
            'tipo_establecimiento' => $establecimiento->sec,
            'cod_postal' => $establecimiento->postal,
            'cod_establecimiento' => $establecimiento->codigo,
            'nombre' => $establecimiento->nombre,
            'direccion' => $establecimiento->direccion,
            'jornada' => $establecimiento->jornada,
            'tipo_estudio' => $tipo_titulo
        ];

        return response()->json($respuesta, 200); //Mensaje de informacion almacenada
    }

    

    /**/
    private function insertarEstablecimiento($codigo, $nombreEstablecimiento, $codigoSector){
        $sec = '0';
        $sector = "0-DESCONCIDO";

        error_log("codigo sector: ".$codigoSector);
        switch($codigoSector){
            case "21":
                $sector = "21-oficial";
                $sec = "1";
                break;
            case "22":
                $sector = "22-PRIVADO";
                $sec = "2";
                break;
            case "23":
                $sector = "23-MUNICIPAL";
                $sec = "1";
                break;
            case "24":
                $sector = "24-COOPERATIVA";
                $SEC = "1";
        }

        /*TODO forma de identificarlos si nos metemos en problemas*/
        $fecha = strtotime('2020-12-8');

        $est = new Establecimiento;
        $est->codigo = $codigo;
        $est->nombre = $nombreEstablecimiento;
        $est->sector = $sector;
        $est->sec = $sec;
        $est->fecha = $fecha;

        $est->save();

    }

    public function estudiosPrevios(Request $request){
        $nov = Auth::guard('aspirante')->user()->nov;
        $informacionAspirante = InformacionAspirante::find($nov);
        $tipoTitulo = $request->input('tipoTitulo');
        $tipoEstablecimiento = $request->input('inputTipoEstablecimiento');
        $paisEstudio = $request->input('inputLugarEstudioPais');
        $deptoEstudio = $request->input('inputDepartamentoEstudio');
        $muniEstudio = $request->input('inputMunicipioEstudio');
        $codPostalEstudio = $request->input('inputCodigoPostalEstudio');
        $nombreEstablecimiento = $request->input('inputNombreEstablecimiento');

        /*limpiando datos cuando es extranjero*/
        if($paisEstudio != '30'){
            $codigoPostal = 0;
            $muniEstudio = 0;
            $codPostalEstudio = 0;
            $nombreEstablecimiento = '';
        }

        $informacionAspirante->tipoDiversificado = $tipoTitulo;
        $informacionAspirante->cod_establecimiento = $nombreEstablecimiento;
        $informacionAspirante->tipo_establecimiento = $tipoEstablecimiento;
        $informacionAspirante->pais_establecimiento = $paisEstudio;
        $informacionAspirante->depto_establecimiento = $deptoEstudio;
        $informacionAspirante->muni_establecimiento = $muniEstudio;
        $informacionAspirante->postalEstablecimiento = $codPostalEstudio;

        $informacionAspirante->save();

        DB::select("call proc_laravel_preinscripcion(?)", array($nov));

        return response()->json('se actualizo con exito', 200);
    }
    
    /**
     * Fase 3 - Paso 8 - Confirmar carrera
     * Marca el proceso de inscripciÃ³n como confirmado lo cual hace siempre se le redirija a la Fase 3 - Paso 9 - Pago de Matricula
     * @return JsonResponse
     */
    public function confirmarCarrera(){
        $ciclo  = CicloActivo::first()->ciclo_web_pregrado;
        $nov = Auth::guard('aspirante')->user()->nov;
        $tupla = InscripcionPrimerIngreso::where([
            ['nov', '=', $nov],
            ['ciclo', '', $ciclo]
        ])->get()->first();
        $tupla->confirmoCarrera = 1;
        $bandera = $tupla->save();
        if (!$bandera){
            return response()->json('Error no se pudo confirmar la información, por favor intentelo más tarde.', 500); //Mensaje de error
        }
        return response()->json('Carrera confirmada!', 200); //Mensaje de error
    }

    /**
     * Genera una boleta de pago u obtiene una boleta ya generada que este vigente
     * @return mixed|null stream con el PDF de la boleta o null si es un error
     */
    public function generarBoleta(){
        //todo retornar una boleta quemada :'v
        if(config('inscripcionPregrado.boletaFalsa')){
            $boletaTemp = new PingBoleta();
            $boletaTemp->id_orden_pago = -1;
            $boletaTemp->carnet = 2020000000;
            $boletaTemp->ua = -1;
            $boletaTemp->ext = -1;
            $boletaTemp->car = -1;
            $boletaTemp->monto = -1;
            $boletaTemp->cheksum = -1;
            $boletaTemp->rubroPago = -1;
            $boletaTemp->banco = null;
            $boletaTemp->noBoletaDeposito = null;
            $boletaTemp->noTransferenciaBancaria = null;
            $boletaTemp->fechaCertificadoBanco = null;
            $boletaTemp->fechaGeneracion  = date("Y-m-d");
            $boletaTemp->fechaVencimiento  = date("Y-m-d");
            $boletaTemp->estado = 1;
            return $boletaTemp;
        }
        if (Auth::guard('aspirante')->user()->esExtranjero()){
            $matricula = $this->matricularExtranjero(Auth::guard('aspirante')->user()->nov);
            $monto = PrecioMatricula::find(2)->pregradoInicial; //todo ver como obtener la region
            return Boletas::generarBoletaPrimerIngresoExtranjeros(Auth::guard('aspirante')->user()->nov, Auth::guard('aspirante')->user()->getNombreCompleto(), 1, $monto, $matricula->id);
        }
        return Boletas::generarBoletaPrimerIngreso(Auth::guard('aspirante')->user()->nov, Auth::guard('aspirante')->user()->getNombreCompleto());
    }

    private function getBoletaVigente(int $nov, int $idFacultad, int $idExtension, int $idCarrera){
        if (Auth::guard('aspirante')->user()->esExtranjero()){
            return BoletasExtranjero::getBoletaVigente($nov, $idFacultad, $idExtension, $idCarrera);
        }
        return PingBoleta::getBoletaVigente($nov, $idFacultad, $idExtension, $idCarrera);
    }

    private function validarBoletaPrimerIngreso($idOrdenPago, int $carnet){
        if (Auth::guard('aspirante')->user()->esExtranjero()){
            return BoletasExtranjero::validarBoletaPrimerIngreso($idOrdenPago, $carnet);
        }
        return Boletas::validarBoletaPrimerIngreso($idOrdenPago, $carnet);
    }

    /**
     * Fase 3 - Paso
     * Obtiene los datos necesarios para generar un pdf con la constancia de inscripciÃ³n
     * @param Request $request
     * @return string retorna el pdf o una pantalla de error
     */
    function generarConstanciaInscripcion(Request $request){
        $idFacultad = $request->input('idFacultad');
        $idExtension = $request->input('idExtension');
        $idCarrera = $request->input('idCarrera');

        $tupla = EstudiaOld::where('cod_orien', '=', Auth::guard('aspirante')->user()->nov)->first();

        return ConstanciaInscripcion::descargar($tupla->carnet, $tupla->cui, Auth::guard('aspirante')->user()->getNombreCompleto(), $idFacultad, $idExtension, $idCarrera);
    }

   
    /**
     * Valida que el aspirante haya subido por lo menos uno de los documentos obligatorios de identificacion
     * Nacionales valida certificacion de nacimiento
     * Extranjeros valida Pasaporte o certificacion de nacimiento
     * @return JsonResponse
     */
    public static function validarIdentificacion(){
        $ciclo = CicloActivo::first()->ciclo_web_pregrado;
        $nov = Auth::guard('aspirante')->user()->nov;

        $aspirante = InscripcionPrimerIngreso::where([
            ['nov', '=', $nov],
            ['ciclo', '=', $ciclo]
        ])->get()->first();

        if (Auth::guard('aspirante')->user()->esExtranjero()){
            if ($aspirante->certificadoNacimiento or $aspirante->pasaporte){
                return response()->json('Datos completos', 200);
            }
            return response()->json('No ha subido su Pasaporte o Partida de Nacimiento', 403);
        }else{
            if ($aspirante->certificadoNacimiento){
                return response()->json('Datos completos', 200);
            }
            return response()->json('No ha subido su Certificado de Nacimiento', 403);
        }
    }

    //todo ver que rayos con los pagos de los extranjeros
    public function generarBoletaMensualidad(Request $request){
        $noPagos = $request->input('noPagos');
        $monto = 2456 * $noPagos;
        $matricula = 1;
        return Boletas::generarBoletaPrimerIngresoExtranjeros(
            Auth::guard('aspirante')->user()->nov,
            Auth::guard('aspirante')->user()->getNombreCompleto(),
            $noPagos,
            $monto,
            $matricula
        );
    }

    public function test(Request $request){
        $client = new Client();
        $res = $client->post( 'https://resultadospcbws.usac.edu.gt/resultados',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Cache-Control' => 'no-cache',
                    'Authorization' => 'Basic UmVnaXN0cm95RXN0YWRpc3RpY2ExODpASkVMVjA2ODU='
                ],
                'json' => [
                    'nov' => '201404034',
                    'esCarnet' => true
                ]
            ]
        );
        if ($res->getStatusCode() != 200){
            return 'Error del web service';
        }
        $respuesta = json_decode($res->getBody(), true);
        return $respuesta['aprobados'];
    }

    public function generarPreinscripcion(Request $request){
        $nov = Auth::guard('aspirante')->user()->nov;
        $inscripcionActiva = Aspirante::VerificarStatus($nov);
        $informacionAspirante = InformacionAspirante::find($nov); 
        $nombreCompleto = $informacionAspirante->getNombreCompleto();
        $cui = $informacionAspirante->numero_registro;
        $ciclo = CicloActivo::first();
        $cicloactivo = $ciclo->ciclo_web_pregrado;
        $ciclopadep = $ciclo->ciclo_padep;
        $title = 'Preinscripción - Constancia';

        $preinscripcion = Preinscripcion::where([
            ['nov', '=',$nov],
            ['ciclo', '=', $ciclo->ciclo_web_pregrado]
        ])->get()->first();
        
        $nombreUA = $preinscripcion->getnombreUA();
        $nombreExtension = $preinscripcion->getnombreExtension();
        $nombreCarrera = $preinscripcion->getnombreCarrera();
        $transaccion = $preinscripcion->transaccion;

        return view('aspirante.inscripcion.consPreinscripcion',
                    compact('title', 'nombreUA', 'nombreExtension', 'nombreCarrera', 'nov', 'nombreCompleto', 'cui', 'cicloactivo', 'transaccion', 'inscripcionActiva'));
    }

    public static function descargarPDFPreinscripcion(Request $request){
        $cicloactivo = $request->input("cicloactivo");
        $nov = $request->input("nov");
        $cui = $request->input("cui");
        $nombreCompleto = $request->input("nombreCompleto");
        $nombreUA = $request->input("nombreUA");
        $nombreExtension = $request->input("nombreExtension");
        $nombreCarrera = $request->input("nombreCarrera");
        $transaccion = $request->input("transaccion");
        $img = '/var/www/html/rye-portal/public/img/usacnegro.jpg';

        $pdf = PDF::loadView('aspirante.inscripcion.consPreinscripcion2', 
                compact('cicloactivo', 'nombreUA', 'nombreExtension', 'nombreCarrera','nov', 'cui', 'nombreCompleto','img','transaccion'));
            
        $pdf->setPaper('letter');
        return $pdf->download('preinscripcion.pdf');
    
    }

    // ----------------------------------------------------------------NUEVO WEB SERVICE DE MINEDUC --------------------------------------//
    private function datosMineduc($cuiTitulo, $tipoConsulta){

        $data = $this->consultaMineduc($cuiTitulo, $tipoConsulta);

        if($data['error'] !== 0){
            return null;
        }

        $json = $data['data'];

            if(empty($json->TituloMedio->apellidos)){
                return null; // "NO SE ENCUENTRAN DATOS EN MINEDUC"; //Si viene vacio no encontro carreras e igualmente retorno null
            }else{

                $establecimiento = Establecimiento::where('codigo', '=', $json->TituloMedio->codigo_establecimiento)->first();

                if(!$establecimiento){
                    $usuario = InformacionAspirante::find(Auth::guard('aspirante')->user()->nov);
                    $usuario->cod_establecimiento = $json->TituloMedio->codigo_establecimiento;
                    $usuario->nombre_establecimiento = $json->TituloMedio->nombre_establecimiento;
                    $this->insertarEstablecimiento($usuario->cod_establecimiento,
                                                   $usuario->nombre_establecimiento,
                                                   $json->TituloMedio->codigo_sector);

                    $establecimiento = Establecimiento::where('codigo', '=', $usuario->cod_establecimiento)->first();

                    $usuario->tipo_establecimiento = $establecimiento->sec;
                    $usuario->direccion_establecimiento = trim($establecimiento->direccion);
                    $usuario->pais_establecimiento = 30;
                    $usuario->depto_establecimiento = $establecimiento->depto;
                    $usuario->muni_establecimiento = $establecimiento->muni;
                    $usuario->postalEstablecimiento = $establecimiento->postal;
    
                    $usuario->save();
                }

                return $json;
            }

    }    

}
