<?php

namespace App\Http\Controllers\Estudiante;

use App\Funciones\Boletas;
use App\Funciones\MedicinaApi;
use App\Funciones\Utilidades;
use App\Models\Becado;
use App\Models\BitacoraInscripcion;
use App\Models\BoletasReingreso;
use App\Models\CicloActivo;
use App\Models\EstudiaOld;
use App\Models\UnidadSalud;
use App\Models\CarreraTemporal;
use App\Models\Extension;
use App\Models\Facultad;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysqli;
use nusoap_client;
use App\Models\DocumentosEstudiante;
use PDF;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

include_once app_path('/Funciones/Reinscripcion/validarEncuesta.php');
include_once app_path('/Funciones/Reinscripcion/validarCertificado.php'); //evitando errores

class Reinscripcion extends Controller
{
    /**
     * @return Factory|View
     */
    public function paso2()
    {
        //hay que pasar encuesta
        $val = config('reinscripcionPregrado.llenarEncuesta');
        if($val){
            //ya lleno la encuesta?
            $encuesta = validarEncuesta(Auth::guard('estudiante')->user()->carnet);
            if($encuesta == 'N'){
                return redirect()->route('paso1');
            }
        }   

        $bloqueado=false;
        $ciclo = CicloActivo::first(); // Obtiene el año actual
        $title='Reinscripción - Seleccionar Carrera'; //Título de la página
        $nombreEstudiante = Auth::guard('estudiante')->user()->getNombreCompleto();
        $carnet = Auth::guard('estudiante')->user()->carnet;

        // Tiene bloqueo de biblioteca
        $cui = Auth::guard('estudiante')->user()->cui;
        $bloqueoCui = $this->bloqueoBiblioteca($cui); //cuando sea extranjero validar
        $bloqueoCarnet = $this->bloqueoBiblioteca(Auth::guard('estudiante')->user()->carnet); 
        $bloqueoBiblioteca = $bloqueoCui || $bloqueoCarnet;
        $bloqueoUnidadSalud = $this->bloqueoUnidadSalud($ciclo->ciclo_web_pregrado - 1);
        $bloqueoBecado = $this->bloqueoBecados();
        $cert_pendiente = validarCertificado($carnet);

        //Página que explica porque el estudiante no se puede inscribir
        if(($bloqueoBiblioteca && strlen($cui) == 13) || $bloqueoUnidadSalud[0] || $bloqueoBecado){
            $bloqueado = true;
            $bloqueoEventoElectoral=false;
            $tituloError = 'Estado Académico';
            $extranjero = false;
            $primerIngreso = false;
            $solventemedicina = true;
            $title = 'Reinscripción - Estado Académico';
            return view('portalEstudiantil.pages.reinscripcion.reinscripcion_bloqueado',
                compact('solventemedicina','title', 'tituloError', 'extranjero', 'bloqueoBiblioteca',
                    'bloqueoUnidadSalud', 'bloqueoBecado', 'bloqueoEventoElectoral',
                     'nombreEstudiante', 'primerIngreso', 'cert_pendiente'
                )
            );
        }

        $carreras = $this->getCarreras($carnet);
        
        Reinscripcion::genMensajes($carreras);

        return view('portalEstudiantil.pages.reinscripcion.seleccionar_carrera',
                    compact('title', 'carreras', 'ciclo', 'nombreEstudiante', 'carnet', 'cert_pendiente', 'cui'));
    }

    public function constancias(){
        $ciclo = CicloActivo::first();
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $carreras = $this->getCarreras($carnet);
        $cert_pendiente = validarCertificado($carnet);
        
        # $bloqueoUnidadSalud = $this->bloqueoUnidadSalud($ciclo->ciclo_web_pregrado - 1);
        $bloqueoUnidadSalud = [false, false];

        if($bloqueoUnidadSalud[0]){
            $bloqueado = true;
            $bloqueoEventoElectoral=false;
            $tituloError = 'Bloqueado';
            $extranjero = false;
            $primerIngreso = false;
            $solventemedicina = true;
            $bloqueoBiblioteca = false;
            $bloqueoBecado = false;
            $title = 'Reinscripción - Bloqueado';
            $nombreEstudiante = Auth::guard('estudiante')->user()->getNombreCompleto();
            return view('portalEstudiantil.pages.reinscripcion.reinscripcion_bloqueado',
                compact('solventemedicina','title', 'tituloError', 'extranjero', 'bloqueoBiblioteca',
                    'bloqueoUnidadSalud', 'bloqueoBecado', 'bloqueoEventoElectoral',
                    'nombreEstudiante', 'primerIngreso', 'cert_pendiente'
                )
            );
        }

        return view('portalEstudiantil.pages.reinscripcion.constancias',
                    compact('ciclo', 'carreras', 'cert_pendiente'));
    }

    /**
    * valida el estado actual de cada una de las carreras y les coloca un
    * mensaje si tiene algún problema con la carrera
    */
    public static function genMensajes($carreras){
        foreach( $carreras as $carrera ) {
            $msj = "";
            $error = false;
            if($carrera->estado == "0"){
                $error = true;
                $msj .= "<li>Carrera Inactiva debe presentarse al Departamento de Registro y Estadística.</li>\n";
            }

            if($carrera->estadoReingreso == "0"){
                $error = true;
                $msj .= "<li>Carrera no habilitada para reingreso debe presentarse al Departemento de Registro y Estadística.</li>\n";
            }

            if($carrera->habilitado == "0"){
                $error = true;
                if($carrera->situacionAcademica == "2")
                    $msj .= "<li>Ya posees cierre de pensum.</li>\n";
                else
                    $msj .= "<li>Carrera deshabilitada, reactivar permisos en Registro y Estadística</li>\n";
            }

            if($carrera->situacionAcademica != "0" && $carrera->situacionAcademica != "2"){
                $error = true;
                $msj .= "<li>Estudiante, no regular debe inscribirse en Registro y Estadística</li>\n";
            }else if( $carrera->situacionAcademica == "2"){
                $error = true;
                $msj .= "<li>Pendiente de examenes generales</li>\n";
            }

            if($carrera->repitencia == "1"){
                $error = true;
                $msj .= "<li>¡Deshabilitado por repitencia! solo puede ser resuelto en la Unidad Académica</li>\n";
            }

            $fecha = date("Y-m-d");
            if(($carrera->fechaFin < $fecha || $fecha<$carrera->fechaInicio) && $carrera->codigoNivel<3){
                $error = true;
                $msj .= "<li>Período de inscripciones ha finalizado.</li>\n";
            }

            if($carrera->eventoActivo == "1" and $carrera->codigoNivel < 3){
                $error = true;
                $msj .= "<li>Período de inscripciones congelado por Evento Electoral.</li>\n";
            }

            if($carrera->sancion == 1){
                $error = true;
                $msj .= "<li>".$carrera->mensajeSancion."</li>\n";
            }

            if($carrera->tipo_movimiento==29){
                $error = true;
                $msj .= "<li style=\"color:Red;\">¡¡¡Expulsado de la Unidad Académica!!!!</li>\n";
            }

            $carrera->error = $error;
            $carrera->msj = $msj;
        }
    }


    /**
    * en este paso se valida si el estudiante ya esta inscrito de estar inscrito lo envia
    * al paso cuatro, verifica si ya cuenta con una boleta valida, si no tiene una genera
    * una nueva boleta y le presenta al estudiante la boleta para su impresión
    */
    public function paso3(Request $request){
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $nacionalidad = Auth::guard('estudiante')->user()->cod_nac;
        $ua = $request->input('idFacultad');
        $ext = $request->input('idExtension');
        $idCarrera = $request->input('idCarrera');
        $nombreEstudiante = Auth::guard('estudiante')->user()->getNombreCompleto();
        $facultad = $request->input('facultad');
        $extension = $request->input('extension');
        $carrera = $request->input('carrera');
        $ciclo = CicloActivo::first();
        $cert_pendiente = validarCertificado($carnet);
        $categorias = $request->input('categorias');

        $car = CarreraTemporal::buscarCarrera($ua, $ext, $idCarrera);

        $ciclo_carnet = substr($carnet,  0,4);

        $ciclo_anterior = $ciclo->ciclo_activo-1;

        if($ciclo_carnet == $ciclo_anterior){

            $inscripcionPagada = Reinscripcion::getInscripcionPagada($carnet, $ciclo_carnet);

            if($inscripcionPagada == NULL){
                return Redirect::back()->withErrors(['msg' => 'No realizó inscripción de primer ingreso en el ciclo '.($ciclo->ciclo_activo-1).' comunicarse a Registro y Estadística.']);
            }
        }

        $inscripcion = Reinscripcion::getInscripcion($carnet, $ua, $ext, $idCarrera, $ciclo->ciclo_web_pregrado);
        //ya se pago la boleta?
        if($inscripcion != null){
            //redireccionar al paso 4 constancia de inscripcion
            return redirect()->route('paso4',
            compact('ua', 'ext', 'idCarrera',
            'cert_pendiente'));
        }
        // si el estudiante es extranjero
        // se genera la boleta en caja central
        if($nacionalidad != 30 && $car->codigo_nivel < 3){
            $extranjero = true;
            $cert_pendiente = 0;
            $tituloError = 'Estudiante Extranjero';
            return view('portalEstudiantil.pages.reinscripcion.reinscripcion_bloqueado',
            compact('tituloError', 'extranjero', 'nombreEstudiante',
            'cert_pendiente'));
        }

        if ($ua == 5 && $car->codigo_nivel >=3){
            $medicina = MedicinaApi::consulta_inscripcion($carnet);
            $extranjero = false;
            $solventemedicina = 1;
            $varsol = "SOLVENTE";

            if($medicina-> respuesta == 0 || $medicina-> respuesta == -1 || $medicina->sfinanciera != $varsol ){
                $solventemedicina = 0;
                $cert_pendiente = 0;
                $tituloError = 'Estado Académico - Escuela de Postgrados de Medicina';
                $mensajeMedicina = $medicina->descripcion;
                $bloqueoBiblioteca = false;
                $bloqueoUnidadSalud = [false,false];
                $bloqueoEventoElectoral=false;
                $bloqueoBecado = false;
                $primerIngreso = false;

                return view('portalEstudiantil.pages.reinscripcion.reinscripcion_bloqueado',
                compact('primerIngreso','bloqueoBecado','bloqueoEventoElectoral','bloqueoUnidadSalud','bloqueoBiblioteca','solventemedicina','tituloError', 'extranjero', 'nombreEstudiante',
                'cert_pendiente', 'mensajeMedicina'));
            }
        }
        /*
        *evitando que estudiantes de primer ingreso generen boleta
        *20xx * 100000 = 20xx00000
        */
        $carnetMinimo = $ciclo->ciclo_web_pregrado * 100000;
        $inscripciones = 0;
        /**
        es de primer ingreso?
          Valida si ya esta inscrito en alguna carrera
        */
        if($carnet > $carnetMinimo){
            $ins = BitacoraInscripcion::where([
                ['carnet', '=', $carnet]
            ])->get();

            $inscripciones = $ins->count();
        }

        /**
        * si es carnet nuevo y no tiene inscripcion no lo deja generar una boleta
        **/
        if($carnet > $carnetMinimo && $inscripciones == 0){
            $title = 'Primer Ingreso ';
            $tituloError = 'Primer Ingreso';
            $extranjero = false;
            $primerIngreso = true;
            $bloqueoBiblioteca=false;
            $bloqueoUnidadSalud = [false,false];
            $bloqueoEventoElectoral=false;
            $bloqueoBecado = false;
            $solventemedicina = true;
            return view('portalEstudiantil.pages.reinscripcion.reinscripcion_bloqueado',
                compact('solventemedicina','title', 'tituloError', 'extranjero', 'bloqueoBiblioteca',
                    'bloqueoUnidadSalud', 'bloqueoBecado', 'bloqueoEventoElectoral',
                     'nombreEstudiante', 'primerIngreso', 'cert_pendiente'
                )
            );
        }

        $boleta = Boletas::generarBoletaReingreso($carnet, $ua, $ext, $idCarrera, $nombreEstudiante, $ciclo->semestre_web, $categorias, $nacionalidad);
        $error = $boleta == null;
        $nivel_academico = $car->codigo_nivel;

        if($error){
            return view('portalEstudiantil.pages.reinscripcion.boleta',
                     compact('carnet','error', 'cert_pendiente'));
        }

        $idOrdenPago = $boleta->idOrdenPago;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $rubroPago = $boleta->rubroPago;
        $monto = $boleta->monto;
        $fechaVencimiento = $boleta->fechaVencimiento;
        $checksum = $boleta->checksum;
        $ciclo = CicloActivo::first();
        $cicloactivo = $ciclo->ciclo_web_pregrado;

        $title="Reinscripción - Impresión de Boleta";
        return view('portalEstudiantil.pages.reinscripcion.boleta',
                    compact('carnet', 'nombreEstudiante', 'idOrdenPago', 'fechaGeneracion',
                            'title', 'boleta', 'facultad', 'extension','carrera',
                            'error', 'cicloactivo', 'rubroPago', 'fechaVencimiento',
                            'monto', 'checksum', 'ua', 'ext', 'idCarrera',
                            'cert_pendiente','nivel_academico','categorias'
                        ));
    }

    public function index(Request $request){
        $title =  "Reinscripción - Encuesta";

        $carnet = Auth::guard('estudiante')->user()->carnet;
        $estudia_old = EstudiaOld::find($carnet);
        $activo = $estudia_old->getActivo();

        if ($activo < 0 ){
            return redirect::back()->withErrors(["msg"=>"Usted tiene una sanción administrativa, presentarse en Registro y Estadística para mayor información."]);
        }

        //se debe realizar encuesta?
        $val = config('reinscripcionPregrado.llenarEncuesta');
        if($val){
            //recuperando la encuesta
            $encuesta = validarEncuesta($carnet);
            if($encuesta == 'Y'){
                return redirect()->route('paso2');
            }

            $cert_pendiente = validarCertificado($carnet);

            $urlEncuesta = config('reinscripcionPregrado.encuesta')
                           . $carnet;

            return view('portalEstudiantil.pages.reinscripcion.encuesta',
                        compact('title','urlEncuesta', 'cert_pendiente'));
        }

        return redirect()->route('paso2');
    }

    /**
    *genera la constancia de inscripcion
    **/
    public function paso4(Request $request){
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $ua = $request->input('ua');
        $ext = $request->input('ext');
        $car = $request->input('idCarrera');
        
        $ciclo = CicloActivo::first();
        $estudia_old = EstudiaOld::find($carnet);
        $cui = $estudia_old->cod_nac == 30?$estudia_old->cui:$estudia_old->numero_pasaporte;
        $nombreCompleto= $estudia_old->getNombreCompleto();

        // $cartemp = CarreraTemporal::buscarCarrera($ua, $ext, $car);
        // no se deben generar en portal
        // if($cartemp->codigo_nivel >= 3){
        //     return redirect('estudiante.perfil');
        // }

        $insc = Reinscripcion::getInscripcion($carnet, $ua, $ext,
                                              $car, $ciclo->ciclo_web_pregrado);
        if($insc == null){
            return redirect()->route('paso1');
        }

        $ciclo = $insc['ciclo'];
        $cod_ua = $insc['cod_ua'];
        $ua = $insc['unidad_academica'];
        $cod_ext = $insc['cod_ext'];
        $ext = $insc['extension'];
        $cod_car = $insc['cod_car'];
        $car = $insc['carrera'];
        $fecha_insc = $insc['fecha_inscripcion'];
        $no_bol = $insc['no_boleta'];
        $fecha_pago = $insc['fecha_pago'];
        $transaccion = $insc['transaccion'];
        $title = 'Reinscipción - Constancia';
        $cert_pendiente = validarCertificado($carnet);        

        return view('portalEstudiantil.pages.reinscripcion.constanciaIns',
                    compact('title', 'ciclo', 'cod_ua', 'ua', 'cod_ext', 'ext',
                            'cod_car', 'car', 'fecha_insc', 'no_bol', 'fecha_pago',
                            'carnet', 'cui', 'nombreCompleto', 'transaccion',
                            'cert_pendiente'
                        ));
    }

    /* valida que un estudiante tenga una inscripcion en la unidad,
    *extension y carrera en el ciclo indicado*/
    public static function getInscripcion($carnet, $unidadAcademica, $extension,
                                          $carrera, $ciclo_activo){
        $bitInsc = BitacoraInscripcion::where([
            ['carnet', '=', $carnet],
            ['cod_ua', '=', $unidadAcademica],
            ['cod_ext', '=', $extension],
            ['cod_car', '=', $carrera],
            ['ciclo', '=', $ciclo_activo],
            ['cancelar_matricula', '=', 0]
        ])->first();

        if($bitInsc == null){
            return null;
        }

        $car = CarreraTemporal::buscarCarrera($bitInsc->cod_ua,
                                                  $bitInsc->cod_ext,
                                                  $bitInsc->cod_car);

        if(!$car){
            return null;
        }

        $unidadAc = Facultad::find($car->codigo_unidad_academica);

        $ext = Extension::where([
            ['codigo_unidad_academica', '=', $unidadAcademica],
            ['codigo_extension', '=', $extension]
        ])->first();

        $inscripcion = [
            'inscrito' => true,
            'msj' => 'inscrito',
            'ciclo' => $ciclo_activo,
            'cod_ua' => $unidadAcademica,
            'unidad_academica' => $unidadAc->nomfac,
            'cod_ext' => $extension,
            'extension' => $ext->nombre,
            'cod_car' => $carrera,
            'carrera' => $car->nombre_carrera,
            'fecha_inscripcion' => $bitInsc->fecha_inscripcion,
            'no_boleta' => $bitInsc->boleta,
            'fecha_pago' => $bitInsc->fecha_boleta,
            'transaccion' => $bitInsc->transaccion
        ];

        return $inscripcion;
    }

    /*
    * consulta las carreras que que tiene un estudiante
    */
    public static function getCarreras($carne){
        $carreras = DB::select( DB::raw(
            'SELECT r.carnet as carnet,
            r.idFacultad as idFacultad,
            r.idExtension as idExtension,
            r.idCarrera as idCarrera,
            r.situacionAcademica as situacionAcademica,
            r.habilitado as habilitado,
            r.repitencia as repitencia,
            r.facultad as facultad,
            r.extension as extension,
            r.carrera as carrera,
            r.estado as estado,
            r.codigoNivel as codigoNivel,
            r.estadoReingreso as estadoReingreso,
            r.cicloWeb as cicloWeb,
            r.semestreWeb as semestreWeb,
            r.oportunidad as oportunidad,
            r.categoria as categoria,
            r.categorias as categorias,
            r.nombreNivel as nombreNivel,
            (SELECT COUNT(*) FROM bitacora_inscripcion bi
                WHERE bi.carnet = r.carnet
                AND bi.ciclo = r.cicloWeb
                AND bi.cod_ua = r.idFacultad
                AND bi.cod_ext = r.idExtension
                AND bi.cod_car = r.idCarrera
                AND bi.cancelar_matricula = 0) as inscrito,
            IFNULL(calendario.fecha_inicio, \'0000-00-00\') fechaInicio,
            IFNULL(calendario.fecha_fin, \'0000-00-00\') fechaFin,
            (   SELECT 1
                FROM sanciones s, ciclo_activo
                WHERE s.carnet = r.carnet
                    AND s.ua = r.idFacultad
                    AND r.cicloWeb BETWEEN YEAR(s.del) AND YEAR(s.al)
                    AND s.al >= DATE(NOW())
                    AND s.cod_mov not in (33,32)
            ) sancion,
            (   SELECT s.cod_mov 
                FROM sanciones s, ciclo_activo
                WHERE s.carnet = r.carnet
                    AND s.ua = r.idFacultad
                    AND s.al >= DATE(NOW())
                    AND s.cod_mov not in (33,32)
            ) tipo_movimiento,
            (   SELECT CONCAT(\'Sancionado hasta el \',DATE_FORMAT(s.al, \'%d/%m/%Y\'))
                FROM sanciones s, ciclo_activo
                WHERE s.carnet = r.carnet
                    AND s.ua = r.idFacultad
                    AND r.cicloWeb BETWEEN YEAR(s.del) AND YEAR(s.al)
                    AND s.al >= DATE(NOW())
                    AND s.cod_mov not in (33,32)
            ) mensajeSancion,
            (   SELECT 1
                FROM evento_electoral, ciclo_activo
                WHERE evento_electoral.ciclo = ciclo_activo.ciclo_activo
                    AND evento_electoral.ua = r.idFacultad
                    AND DATE(NOW()) BETWEEN evento_electoral.f_congelamiento
                    AND DATE_ADD(evento_electoral.vuelta_3,INTERVAL evento_electoral.`dobleFecha` DAY)
                    AND !evento_electoral.evento_resuelto
                LIMIT 1
            ) eventoActivo
        FROM(
            SELECT
                carrera_estudiante.carnet as carnet,
                carrera_estudiante.codfac as idFacultad,
                carrera_estudiante.codext as idExtension,
                carrera_estudiante.codcar as idCarrera,
                carrera_estudiante.sit_acad as situacionAcademica,
                carrera_estudiante.habilitado as habilitado,
                carrera_estudiante.repitencia as repitencia,
                facultad.nomfac as facultad,
                extension.nombre as extension,
                carrera_temporal.nombre_carrera as carrera,
                carrera_temporal.estado as estado,
                carrera_temporal.codigo_nivel as codigoNivel,
                carrera_temporal.estado_reingreso as estadoReingreso,
                ciclo_activo.ciclo_web_pregrado as cicloWeb,
                ciclo_activo.semestre_web as semestreWeb,
                ciclo_activo.oportunidad_pregrado as oportunidad,
                nivel_academico.nombre as nombreNivel, -- preguntar aca
                carrera_temporal.codigo_nivel AS categorias,
                (CASE WHEN carrera_temporal.codigo_nivel IN (1, 2) THEN 2 ELSE 3 END) AS categoria
                FROM
                        carrera_estudiante,
                        ciclo_activo,
                        carrera_temporal,
                        nivel_academico,
                        facultad,
                        extension
                    WHERE
                        carrera_estudiante.carnet = '.$carne.'
                            AND carrera_estudiante.activo
                        AND carrera_temporal.codigo_unidad_academica=carrera_estudiante.codfac
                        AND carrera_temporal.codigo_extension = carrera_estudiante.codext
                        AND carrera_temporal.codigo_carrera = carrera_estudiante.codcar
                        AND carrera_temporal.codigo_nivel = nivel_academico.codigo_nivel_academico
                        AND  facultad.codfac = carrera_estudiante.codfac
                        AND extension.codigo_unidad_academica = carrera_estudiante.codfac
                        AND extension.codigo_extension = carrera_estudiante.codext
                ) r
                    LEFT JOIN calendario
                    ON calendario.ua = r.idFacultad
                    AND calendario.ciclo = r.cicloWeb
                    AND calendario.categoria = r.categoria
                    AND r.categoria <= 2
                    AND calendario.oportunidad = r.oportunidad;'
        )); //Consulta horrorosa proporcionada por Eduardo

        return $carreras;
    }

    /**
     * Obtiene xml de biblioteca con el estado del estudiante y verifica si esta "Solvente" o "Insolvente"
     * @param string $cui
     * @return bool
     */
    private static function bloqueoBiblioteca(string $cui){
        $cui = str_replace(' ', '', $cui);
        $consultaBiblioteca = file_get_contents("https://biblos.usac.edu.gt/library/index.php?action=ajax&rs=getSolvencia&usuario=solvencia&pass=RR03ng41lsdt0r0&carnet=".$cui);
        $resultado = json_decode(json_encode(simplexml_load_string($consultaBiblioteca)), true);

        if ($resultado["status"] != "Insolvente"){
            return false;
        }
        return true;
    }

    /**
     * Valida los examenes de salud en CUNOC
     * @param $carnet - Número de carnet del estudiante
     * @param $ciclo - Año a validar
     * @return bool|int
     */
    function verificarTarjetaSaludCUNOC($carnet, $ciclo) {
        if(!config('reinscripcionPregrado.validarTarjetaSaludCUNOC')){
            return false;
        }
        global $v_msg_error;
        global $v_resultado_invoke;

        $xml_verifica_datos = "
			<VERIFICAR_TS>
				<USR>rye7aC</USR>
				<PWD>3on54y3+</PWD>
				<CARNET>$carnet</CARNET>
				<CICLO>$ciclo</CICLO>
			</VERIFICAR_TS>
		";
        $oSoapClient = new nusoap_client('http://www.ryca.cunoc.edu.gt/serviciosweb/wsdl_tarjetas.php?wsdl','wsdl');

        if ($sError = $oSoapClient->getError()) {
            $v_msg_error = "No se pudo realizar la operación [" . $sError . "]";
            $v_resultado_invoke = 0;
            return 0;
        }
        $parametros=array('parametros'=>$xml_verifica_datos);
        $aRespuesta = $oSoapClient->call("reingreso", $parametros);
        if ($oSoapClient->fault) { // Si
            $v_msg_error = "Existe una falla en el servicio 'VerificaPIN' -->";
            if ($sError = $oSoapClient->getError()) {
                $v_msg_error .= " [ Error: " . $sError . "]";
                echo "error 1";
            }
            $v_resultado_invoke = 0;
            return 0;
        }
        else {
            $sError = $oSoapClient->getError();

            // Hay algun error ?
            if ($sError) { // Si
                $v_msg_error = 'Error:' . $sError;
                $v_resultado_invoke = 0;
                echo $v_msg_error;
                return 0;
            }
            else {
                $uSaludCUNOC = Utilidades::xml2array($aRespuesta);
                return ((int)$uSaludCUNOC["RESPUESTA"]["USALUD"]["value"]==1);
            }
        }
    }

    /**
     * Consulta en la base de datos de la unidad de salud y en algo del CUNOC si el estudiante ya tiene su examen de salud
     * Retorna bool false si tiene su examen, de lo contrario retorna un mensaje explicando el error
     * @param $ciclo
     * @return bool|string
     */
    private function bloqueoUnidadSalud($ciclo){
        error_log(config('reinscripcionPregrado.validarUnidadSalud'));
        if(!config('reinscripcionPregrado.validarUnidadSalud')){
            return array(false, 'Sin problemas');
        }

        $carnet = Auth::guard('estudiante')->user()->carnet;

        $url = config('usalud.URL').$carnet;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $json = json_decode($response);

        if(!$json){
            return array(true, 'Error de comunicación con la Unidad de Salud. Por favor, inténtelo nuevamente más tarde.');
        }

        $examen = $json[0]->{'resultado'};
        if($examen == 0)
            return array(true, 'No ha realizado su Examen de Salud.');

        return array(false, "Sin problemas");
    }

    /**
     * Consulta si el usuario tiene un bloqueo por motivo de beca
     * @return bool
     */
    private function bloqueoBecados(){
        if(!config('reinscripcionPregrado.validarBecados')){
            return false;
        }
        $becado = Becado::find(Auth::guard('estudiante')->user()->carnet);
        if ($becado){
            return $becado->reingresoRegular;
        }
        return false;
    }

    public static function descargarPDFBoleta(Request $request){
        $nombre = Auth::guard('estudiante')->user()->getNombreCompleto();
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $idOrdenPago = $request->input("idOrdenPago");
        $boleta = BoletasReingreso::find($idOrdenPago);
        $monto = $boleta->monto;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $ua = $boleta->ua;
        $facultad = $request->input("facultad");
        $ext = $boleta->ext;
        $extension = $request->input("extension");
        $idCarrera = $boleta->car;
        $carrera = $request->input("carrera");
        $rubroPago = $boleta->rubroPago;
        $checksum = $boleta->checksum;
        $fechaVencimiento = $boleta->fechaVencimiento;
        $cicloactivo = $request->input("cicloactivo");
        $categorias = $request->input("categorias");
        
        
        $nivel_academico = null;
        // nivel_academico = 0 = Pregrado
        // nivel_academico = 1 = Maestrías y Especialidades
        // nivel_academico = 2 = Doctorado
        if($categorias == 4 || $categorias == 10){
            $nivel_academico = 2;
        }elseif($categorias == 1 || $categorias == 2){
            $nivel_academico = 0;
        }else{
            $nivel_academico = 1;
        }
        $css = '/var/www/html/rye-portal/public/css/boletaPDF.css';

        $pdf = PDF::loadView('portalEstudiantil.pages.reinscripcion.boleta2', compact("nombre", "carnet", "fechaGeneracion", "idOrdenPago",
            "monto", "ua", "facultad", "ext", "extension", "idCarrera", "carrera", "rubroPago", "checksum", "fechaVencimiento", "cicloactivo", "css", 'nivel_academico'));

        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('boleta.pdf');

    }

    public static function descargarPDFConstancia(Request $request){

        $ciclo = $request->input("ciclo");
        $carnet = $request->input("carnet");
        $cui = $request->input("cui");
        $nombreCompleto = $request->input("nombreCompleto");
        $no_bol= $request->input("no_bol");
        $ua = $request->input("ua");
        $ext = $request->input("ext");
        $car = $request->input("car");
        $fecha_insc = $request->input("fecha_insc");
        $fecha_pago = $request->input("fecha_pago");
        $transaccion = $request->input("transaccion");

        $css = '/var/www/html/rye-portal/public/css/constancia.css';
        $img = '/var/www/html/rye-portal/public/img/usacnegro.jpg';
        $borrador = '/var/www/html/rye-portal/public/img/borrador.png';
        $img2 = '/var/www/html/rye-portal/public/img/LogoRegistro.png';
 
        $pdf = PDF::loadView('portalEstudiantil.pages.reinscripcion.constanciaIns2', compact("css","img","borrador", "img2", "ciclo", "carnet", "cui",
                "nombreCompleto", "no_bol", "ua", "ext", "car", "fecha_insc", "fecha_pago", "transaccion"));

        $pdf->setPaper('letter');
        return $pdf->download('constancia.pdf');

    }

    public function certificado(){
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $title = 'Carga de Certificado';
        $cert_pendiente = validarCertificado($carnet);
        $ruta_carga = route('guardar_cert');

        return view(
            'portalEstudiantil.pages.reinscripcion.certificado_nacimiento',
            compact('title', 'cert_pendiente', 'ruta_carga')
        );
    }

    public function guardar_certificado(Request $request){
        $estudiante = Auth::guard('estudiante')->user();
        $nombre_archivo = 'nov_' . md5('rye2016'. $estudiante->nov . 'usac') . '.pdf';

        if($request->hasFile('inputPDF')){

            $documento = DocumentosEstudiante::where([
                ['carnet_universitario', '=', $estudiante->carnet]
            ])->first();

            $documento->partida_nacimiento = 1;
            $documento->save();

            $request->file('inputPDF')
                ->storeAs('uploads/temp/certificacion', $nombre_archivo,
                    'public');
                    return response()->json([
                        'statusCode' => 200,
                        'message' => 'Certificado subido con éxito'
                    ]);
        }       

        return response()->json([
            'statusCode' => 400,
            'body' => 'Sin Archivo PDF'
        ]);
    }

        public static function getInscripcionPagada($carnet, $ciclo_carnet){
            $bitInscPagada = BitacoraInscripcion::where([
                ['carnet', '=', $carnet],
                ['ciclo', '=', $ciclo_carnet]
            ])->first();
        
            return $bitInscPagada;

        }

}
