<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;
use App\Http\Controllers\Estudiante\SolicitarCarnet;
use App\Models\Certificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use Illuminate\Support\Facades\Log;

class CertificacionInscripcionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectCertInscripciones');
    }

    public function index(){

        $user = Auth::guard('administrativo')->user()->login;

        $ua =  '1'; 
        $solicitud_activa = $this->solicitudActivaUnidad($ua);

        return view('administrativo.inscripciones.index', compact('solicitud_activa'));
    }

    public function generaCertificacionInscripcion(Request $request){

        $user = Auth::guard('administrativo')->user()->login . '@' . $_SERVER["REMOTE_ADDR"]; //user e ip....
        $carnet = $request->input('carnet');
        $cui = $request->input('cui');
        $nombre = $request->input('nombre');
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_carrera = $request->input('cod_carrera');
        $facultad = $request->input('facultad');
        $extension = $request->input('extension');
        $carrera = $request->input('carrera');
        $estado = $request->input('estado');
        $correlativo = $request->input('correlativo');
        $ciclo = $request->input('ciclo'); 
        $fecha_solicitud = $request->input('fecha_solicitud');
        $descripcion = $request->input('descripcion');
        $firma = $request->input('firma');
        $transaccion = $request->input('transaccion');
        $jefe_firma = $request->input('jefe_firma');
        $nivel = $request->input('nivel');
        $hash = $request->input('hash');
        $fechaVencimiento = $request->input('fechaVencimiento');
        $codNacionalidad = $request->input('codNacionalidad');
        $pasaporte = $request->input('pasaporte');
        $sitAcademica = $request->input('sitAcademica');

        $key = substr($hash,  0,8).substr($hash,  -5);
        $hash = $key;

        $academico = SolicitaCertificacionInscripcion::getCarrera($carnet, $cod_carrera, $cod_ext, $cod_ua);
        foreach($academico as $carrera){
            $fechaCierre = $carrera->fechaCierre;
            $ua = $carrera->facultad;
            $extension = $carrera->extension;
            $nivel = $carrera->nivel;
            $carrera = $carrera->carrera;
            }

        $sanciones = SolicitaCertificacionInscripcion::verificarSanciones($carnet, $cod_ua, $cod_ext, $cod_carrera);
        foreach($sanciones as $data){
            $sancionTempUA = $data->sancion_temp_UA;
            $sancion = $data->sancion;
            $repitencia = $data->repitencia;
        }
        

        if($nivel == 1 OR $nivel == 2){

            if ($jefe_firma[0] == "JEFE" OR $jefe_firma[0] == "SUBJEFE") {

                $noBoletaPago = 0;

                $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y');
                $fecha = SolicitaCertificacionInscripcion::fechaLetras($fecha_formato);
    
                $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'. $jefe_firma[0] .'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
                foreach($jefatura as $datos){
                    $jefatura_nombre = $datos->nombre;
                    $jefatura_puesto = $datos->puesto;
                }
    
                $certificacion = new Certificaciones;
    
                $fecha_usr = Carbon::now();
    
                DB::table($certificacion->getTable())->where(
                    'transaccion', $transaccion)->limit(1)->update(
                        ['usuario' => $user,
                        'fecha_usr' => $fecha_usr,
                        'estado' => 2]);

                $firma = '/var/www/html/rye-portal/public/img/fJefe/fjefe.jpg';
                $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
                $registro ='/var/www/html/rye-portal/public/img/fJefe/Registro.png';
    
                return view('administrativo.inscripciones.certificacion', compact('ciclo', 'cod_ua', 'facultad',
                           'cod_carrera', 'carrera', 'carnet', 'cui', 'nombre', 'extension', 'fecha',
                           'jefatura_nombre', 'jefatura_puesto', 'correlativo',
                           'transaccion', 'descripcion', 'fecha_usr', 'noBoletaPago', 'nivel', 'firma', 'sello', 'hash','registro', 'fechaVencimiento', 'sitAcademica', 'fechaCierre', 'codNacionalidad', 'pasaporte', 'sancionTempUA', 'sancion', 'repitencia'));
                        
            }else{
    
                if($jefe_firma == ""){
    
                    return Redirect::back()->withErrors(['msg' => 'No ingreso la firma del jefe o subjefe en la fila correspondiente....']);
    
                }else{
    
                    $certificacion = new Certificaciones; 
                    DB::table($certificacion->getTable())->where(
                        'transaccion', $transaccion)->limit(1)->update(
                            ['estado' => 0]);  // cambia el estado a 0 por vencimiendo de boleta, cambio en la tabla de certificaciones.
        
                    return Redirect::back()->withErrors(['msg' => 'La solicitud ha caducado....']);
    
                }
            }

        }else{

            return Redirect::back()->withErrors(['msg' => 'error al generar la certificacion....']);
        } 
    }

    public static function descargaCertificacion(Request $request){ //cambiar el estado de la certificacion a 2 en este punto?

        $ciclo = $request->input("ciclo");
        $carnet = $request->input("carnet");
        $cui = $request->input("cui");
        $nombre = $request->input("nombre");
        $cod_ua = $request->input("cod_ua");
        $extension = $request->input('extension');
        $carrera = $request->input("carrera");
        $jefatura_nombre = $request->input("jefe_nombre");
        $puesto = $request->input("jefe_puesto");
        $fecha = $request->input("fecha");
        $correlativo = $request->input("correlativo");
        $facultad = $request->input("facultad");
        $transaccion = $request->input("transaccion");
        $descripcion = $request->input("descripcion");
        $descripcion = explode(",", $descripcion);
        $fecha_usr = $request->input('fecha_usr');
        $noBoletaPago = $request->input('noBoletaPago');
        $nivel = $request->input('nivel');
        $hash = $request->input('hash');
        $fechaVencimiento = $request->input("fechaVencimiento");
        $fechaVencimiento = Carbon::createFromFormat('Y-m-d H:i:s', $fechaVencimiento)->format('d/m/y');
        $sitAcademica = $request->input('sitAcademica');
        $fechaCierre = $request->input('fechaCierre');
        $codNacionalidad = $request->input('codNacionalidad');
        $pasaporte = $request->input('pasaporte');
        $sancionTempUA = $request->input('sancionTempUA');
        $sancion = $request->input("sancion");
        $repitencia = $request->input("repitencia");

        $estudia_old = EstudiaOld::find($carnet);
        $activo = $estudia_old->activo;

        $date = Carbon::now()->format('d/m/Y');

        $user = Auth::guard('administrativo')->user()->login;
        $operadores = DB::select( DB::raw('SELECT iniciales FROM usuario u WHERE login = "'.$user.'"'));
        foreach($operadores as $operador){
            $operador = $operador->iniciales;
        }

        $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        if($puesto == 'Jefe'){
        $firma = '/var/www/html/rye-portal/public/img/fJefe/fjefe.jpg';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';
        }elseif($puesto == 'SubJefe'){
        $firma = '';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';
        }

        $pdf = PDF::loadView('administrativo.inscripciones.certificacionpdf',
        compact('css', 'ciclo', 'cod_ua', 'extension',
                'carrera', 'carnet', 'cui', 'nombre', 'img', 'jefatura_nombre', 'puesto', 'fecha',
                'correlativo', 'facultad', 'transaccion', 'descripcion', 'fecha_usr', 'noBoletaPago', 'nivel', 'firma', 'sello', 'hash','registro', 'operador', 'fechaVencimiento', 'sitAcademica', 'fechaCierre', 'codNacionalidad', 'pasaporte', 'activo', 'sancionTempUA', 'sancion', 'repitencia'));

        $pdf->setPaper('letter');
        return $pdf->download('Firma_original_' .$carnet.'_'.$date.'.pdf');

    }

    public function solicitudActivaUnidad($ua){
        $ciclo = CicloActivo::first();
        $ciclo_anio = $ciclo['ciclo_activo'];
        log::info('este es el ciclo en solicitud: '. $ciclo_anio);
        if ($ua == 1){        
            $solicitud_activa = DB::select( DB::raw(
            "SELECT 
 	            c.carnet as carnet,
                eo.cui as cui,
 	            CONCAT(
    	            IF(eo.nombre1 IS NULL OR eo.nombre1 = '', '', CONCAT(eo.nombre1, ' ')),
                    IF(eo.nombre2 IS NULL OR eo.nombre2 = '', '', CONCAT(eo.nombre2, ' ')), 
                    IF(eo.nombre IS NULL  OR eo.nombre = '', '', CONCAT(eo.nombre, ' ')), 
                    IF(eo.primer_apellido IS NULL OR eo.primer_apellido = '', '', CONCAT(eo.primer_apellido, ' ')),
                    IF(eo.segundo_apellido IS NULL  OR eo.segundo_apellido = '', '', CONCAT(eo.segundo_apellido, ' '))) 
                    as nombre,
                c.ua as cod_ua,
                c.extension as cod_ext,
                c.carrera as cod_carrera,
                f.nomfac as facultad,
                e.nombre as extension,
                ct.nombre_carrera as carrera,
                c.estado as estado,
                c.numero as correlativo,
                c.ciclo as ciclo,
                c.usuario as usuario,
                c.fecha_usr as fecha_solicitud,
                c.descripcion as descripcion,
                c.firma as firma,
                c.transaccion as transaccion,
                ct.codigo_nivel as nivel,
                c.barcode as barcode,
                c.fechaVencimiento as fechaVencimiento,
                eo.cod_nac as codNacionalidad,
                eo.numero_pasaporte as pasaporte,
                c.sit_acad as sit_acad
            FROM certificaciones c, estudia_old eo,
	            carrera_estudiante ce, extension e,
	            facultad f, carrera_temporal ct 
            WHERE c.ciclo = ".$ciclo_anio."
	        AND c.carnet = eo.carnet 
	        AND ce.carnet = eo.carnet 
	        AND e.codigo_unidad_academica = ce.codfac 
	        AND e.codigo_extension = ce.codext 
	        AND f.codfac = ce.codfac 
	        AND ct.codigo_unidad_academica = ce.codfac
            AND ce.codfac = c.ua    
	        AND c.extension = ce.codext 
	        AND c.carrera = ce.codcar 
	        AND ct.codigo_extension = ce.codext 
	        AND ct.codigo_carrera = ce.codcar
	        AND c.estado = 1
	        AND ct.codigo_nivel < 3
            AND c.fechaVencimiento >= now() 
            ORDER BY c.carnet ASC;"));
        }else if($ua == 0){
            $solicitud_activa = "";
        }

        return $solicitud_activa;
    }

    public function indexGenerar(){

        $user = Auth::guard('administrativo')->user()->login;

        return view('administrativo.inscripciones.indexGenerar');

        
    }

    public function buscaEstudiantePregrado(Request $request){

        $carnet = $request->input('carnet');
        $carreras = $this->getCarrerasPregrado($carnet);

        if($carreras != null){

        $estudia_old = EstudiaOld::find($carnet);
        $cui = $estudia_old->cui;
        $codNacionalidad = $estudia_old->cod_nac;
        $pasaporte = $estudia_old->numero_pasaporte;
        $nombreCompleto= $estudia_old->getNombreCompleto();
        $ciclo = CicloActivo::first();

        $fec_bitinscripcion = collect();

        foreach($carreras as $carrera){ 

            $fec_bitinscripciones = BitacoraInscripcion::Select(DB::raw('cod_ua, cod_ext, cod_car, ciclo AS Ciclos'))
                                                         ->WHERE([
                                                             ['carnet', '=', $carnet],
                                                             ['cod_ua', '=', $carrera->idFacultad], 
                                                             ['cod_ext', '=', $carrera->idExtension], 
                                                             ['cod_car', '=', $carrera->idCarrera]
                                                         ])->get();

            $fec_bitinscripcion = $fec_bitinscripcion->push($fec_bitinscripciones);
            
             

            Log::info('PRUEBA EXTRAER CICLOS CARRERAS: '.$fec_bitinscripcion);               
                                                                      
        }

        Log::info('PRUEBA EXTRAER CICLOS CARRERAS fuera: '.$fec_bitinscripcion);
    
        return view('administrativo.inscripciones.certificacionPregradoFormulario',
                    compact('carreras', 'carnet', 'cui', 'nombreCompleto', 'ciclo', 'fec_bitinscripcion', 'codNacionalidad', 'pasaporte'));

        }else{

        return Redirect::back()->withErrors(['msg' => 'El registro academico no es valido']);
        
        }
    }

    public function getCarrerasPregrado($carnet){
        $carreras = DB::select( DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
            ce.activo as activo
                FROM 
                    carrera_estudiante ce, 
                    facultad f, 
                    carrera_temporal ct, 
                    extension e
                WHERE 
                    ce.carnet = '.$carnet.'
                AND ce.codfac = f.codfac
                AND ct.codigo_unidad_academica = ce.codfac
                AND ct.codigo_extension = ce.codext
                AND ct.codigo_carrera = ce.codcar
                AND e.codigo_unidad_academica = f.codfac 
                AND e.codigo_extension = ce.codext
                AND ct.codigo_nivel IN (1,2);'
        )); //Consulta carreras

        return $carreras;
    }

    public function certificarPregrado(Request $request){
        $user = Auth::guard('administrativo')->user()->login . '@' . $_SERVER["REMOTE_ADDR"];
        $iniciales = Auth::guard('administrativo')->user()->iniciales; 
        $cod_ua = $request->input('ua'); 
        $cod_ext = $request->input('ext'); 
        $cod_car = $request->input('idCarrera');
        $nivel = $request->input('nivel'); 
        $nombreCompleto= $request->input('nombre');
        $carnet = $request->input('carnet');
        $cui = $request->input('cui'); 
        $extension = $request->input('extension');
        $car = $request->input('nombre_carrera');
        $ua = $request->input('unidad_academica');
        $firma = $request->input('firma');
        $jefe_firma = $request->input('jefe_firma');
        $ciclo = CicloActivo::first();
        $ciclo_anio = $ciclo['ciclo_activo'];
        $estudia_old = EstudiaOld::find($carnet);
        $codNacionalidad = $request->input('codNacionalidad');
        $pasaporte = $request->input('pasaporte');
        $activo = $request->input('activo');

        $ciclo_anio_actual = Carbon::now()->year;

        if(!in_array(52,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())){
            if($codNacionalidad == 30){
                if($cui == null or $cui == 0){ 
                    return view('administrativo.inscripciones.certificacionInscripcionMensaje2');
                }
            }else{
                if($pasaporte == null){ 
                    return view('administrativo.inscripciones.certificacionInscripcionMensaje2');
                 }
            }
        }


        $cat = $request->input('cat');
        if($cat != null){ 
            $caty = implode(',',$cat);
            log::info('consiguiendo los ciclos academicos: '. $caty);

            
            $n = count($cat);
            if($n > 1){
            /*
            $catyprimer = implode(',',array($cat[0]));
            $catyultimo = implode(',',array($cat[$n-1]));

            $prueba = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
            ->WHERE([
                ['carnet', '=', $carnet],
                ['cod_ua', '=', $cod_ua], 
                ['cod_ext', '=', $cod_ext], 
                ['cod_car', '=', $cod_car]
            ])->get();

            $prueba = $prueba[0]->Ciclos; 

            $primer_posicion = strrpos($prueba, "$catyprimer")?strrpos($prueba, "$catyprimer"):null;
            $cadena_primer_ciclo = substr($prueba,$primer_posicion);
            $ultima_posicion = strrpos($cadena_primer_ciclo, "$catyultimo")+4?strrpos($cadena_primer_ciclo, "$catyultimo")+4:null;
            $caty2 = substr($cadena_primer_ciclo,0,$ultima_posicion);*/

            $caty2 = $caty;

            log::info('que sucede: '. $caty2);

            }else{
            $caty2 = $cat[0];
            log::info('consiguiendo unico ciclo: '. $caty2);
            }

             
         }else{
            //$caty = null;
            $prueba = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
            ->WHERE([
                ['carnet', '=', $carnet],
                ['cod_ua', '=', $cod_ua], 
                ['cod_ext', '=', $cod_ext], 
                ['cod_car', '=', $cod_car]
            ])->get();

            $caty2 = $prueba[0]->Ciclos;
         }  

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
        $fecha = SolicitaCertificacionInscripcion::fechaLetras($fecha_formato); //convierto la fecha a letras
     
        $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
                                                    ->WHERE([
                                                        ['carnet', '=', $carnet],
                                                        ['cod_ua', '=', $cod_ua], 
                                                        ['cod_ext', '=', $cod_ext], 
                                                        ['cod_car', '=', $cod_car]
                                                    ])->get(); //obtengo los ciclos inscritos del estudiante

        if($fec_bitinscripcion[0]->Ciclos == null){ 
            return view('administrativo.inscripciones.certificacionInscripcionMensaje');
        }      
     
        $fec_bitinscripcion = $fec_bitinscripcion[0]->Ciclos; // obtengo el array de datos
     
        $ultima_inscrip_posicion = strrpos($fec_bitinscripcion, ",")?strrpos($fec_bitinscripcion, ",")+1:null; // defino la posicion del ultimo año inscrito a traves de la posicion de la coma que separa la ultima fecha       
     
        $ultima_inscripcion = substr($fec_bitinscripcion,$ultima_inscrip_posicion); //asigno posicion y obtengo el ultimo año inscrito

        $fechaVencimiento = Carbon::now()->addMonth();

        $carreras = SolicitaCertificacionInscripcion::getCarrera($carnet, $cod_car, $cod_ext, $cod_ua);
        foreach($carreras as $carrera){
           $sitAcademica = $carrera->sitAcademica;
           $fechaCierre = $carrera->fechaCierre;
           }
     
        DB::select('CALL proc_certificaciones_laravel(?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cod_ua,$ciclo_anio,$user,$cod_ext,$cod_car,$caty2, $firma, $fechaVencimiento, $jefe_firma, $sitAcademica)); //crea una certificacion por medio del procedimientos almacenado
     
            $certificacion = Certificaciones::where([ 
            ['carnet', '=', $carnet],
            ['ua', '=', $cod_ua], 
            ['extension', '=', $cod_ext], 
            ['carrera', '=', $cod_car], 
            ['firma', '=', $firma],
            ['ciclo', '=', $ciclo_anio_actual]
            ])->orderBy('numero', 'desc')->take(1)->get(); //realiza una nueva busqueda de certificaciones
         
            foreach($certificacion as $data){ // recorre los datos
            $cert_numero = $data->numero;
            $cert_ua = $data->ua;
            $cert_ciclo = $data->ciclo;
            $cert_transaccion = $data->transaccion;
            $ciclo = $data->descripcion;
            $barcode_hash = $data->barcode;
            $descripcion = $data->descripcion;
            $sitAcademica = $carrera->sitAcademica;
            }

         $key = substr($barcode_hash,  0,8).substr($barcode_hash,  -5);

         $hash = $key;

        $sanciones = SolicitaCertificacionInscripcion::verificarSanciones($carnet, $cod_ua, $cod_ext, $cod_car);
            foreach($sanciones as $data){
                $sancionTempUA = $data->sancion_temp_UA;
                $sancion = $data->sancion;
                $repitencia = $data->repitencia;
            }

         if($firma == 1){

            $jefe_firma = "JEFE";
            $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$jefe_firma.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
            foreach($jefatura as $datos){
            $jefatura_nombre = $datos->nombre;
            $jefatura_puesto = $datos->puesto;
            }
         }else{

            $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$jefe_firma.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
            foreach($jefatura as $datos){
            $jefatura_nombre = $datos->nombre;
            $jefatura_puesto = $datos->puesto;
            }
         }

         $certificacion = new Certificaciones;

            DB::table($certificacion->getTable())->where(
                    'transaccion', $cert_transaccion)->limit(1)->update(
                        ['estado' => 2]);

            return view('administrativo.inscripciones.certificacionInscripcionPregradoConstancia',
                    compact('ciclo', 'ciclo_anio', 'cod_ua', 'ua',
                            'cod_car', 'car', 'carnet', 'cui', 'nombreCompleto', 'extension', 'fecha', 'jefatura_nombre', 'jefatura_puesto', 'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'hash', 'fechaVencimiento', 'firma', 'iniciales', 'descripcion', 'sitAcademica', 'fechaCierre', 'codNacionalidad', 'pasaporte', 'sancionTempUA', 'sancion', 'repitencia', 'activo'));        
    }


    public static function descargarCertificacionPregrado(Request $request){

        $ciclo = $request->input("ciclo");
        $carnet = $request->input("carnet");
        $cui = $request->input("cui");
        $nombreCompleto = $request->input("nombreCompleto");
        $ua = $request->input("ua");
        $car = $request->input("car");
        $extension = $request->input('extension');
        $jefatura_nombre = $request->input("jefe_nombre");
        $puesto = $request->input("jefe_puesto");
        $fecha = $request->input("fecha");
        $cert_numero = $request->input("cert_numero");
        $cert_ua = $request->input("cert_ua");
        $cert_ciclo = $request->input("cert_ciclo");
        $cert_transaccion = $request->input("id"); //idTransaccion
        $hash = $request->input("hash");
        $fechaVencimiento = $request->input("fechaVencimiento");
        $fechaVencimiento = Carbon::createFromFormat('Y-m-d H:i:s', $fechaVencimiento)->format('d/m/y');
        $firma = $request->input("firma");
        $operador = $request->input("iniciales");
        $descripcion = $request->input("descripcion");
        $ciclo = explode(",", $ciclo);
        $sitAcademica = $request->input('sitAcademica');
        $fechaCierre = $request->input('fechaCierre');
        $codNacionalidad = $request->input('codNacionalidad');
        $pasaporte = $request->input('pasaporte');
        $sancionTempUA = $request->input('sancionTempUA');
        $sancion = $request->input("sancion");
        $repitencia = $request->input("repitencia");
        $activo = $request->input('activo');

        $date = Carbon::now()->format('d/m/Y');

        $estudia_old = EstudiaOld::find($carnet);
        //$activo = $estudia_old->activo;

        if(empty($jefatura_nombre)){

            $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$puesto.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
            foreach($jefatura as $datos){
            $jefatura_nombre = $datos->nombre;
            $puesto = $datos->puesto;
            }
        }

        if($firma == 1){
        $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $firmaJefe = '/var/www/html/rye-portal/public/img/fJefe/fjefe.png';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';

        $pdf = PDF::loadView('administrativo.inscripciones.certificacionInscripcionPregradofirmapdf',
        compact('css', 'ciclo', 'ua', 'extension',
                'car', 'carnet', 'cui', 'nombreCompleto', 'img', 'jefatura_nombre', 'puesto', 'fecha', 
                'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'firma', 'sello', 'hash', 
                'registro', 'fechaVencimiento', 'descripcion', 'operador', 'firmaJefe', 'sitAcademica', 'fechaCierre',
                'codNacionalidad', 'pasaporte', 'activo', 'sancionTempUA', 'sancion', 'repitencia'));

        $pdf->setPaper('letter');
        return $pdf->download('Certificacion_firma_digital_' .$carnet.'_'.$date.'.pdf');
        }else{

        $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $firmaJefe = '';
        $sello = '';
        $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';
        $pdf = PDF::loadView('administrativo.inscripciones.certificacionInscripcionPregradofirmapdf',
        compact('css', 'ciclo', 'ua', 'extension',
                'car', 'carnet', 'cui', 'nombreCompleto', 'img', 'jefatura_nombre', 'puesto', 'fecha', 
                'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'firma', 'sello', 'hash', 
                'registro', 'fechaVencimiento', 'descripcion', 'operador', 'firmaJefe', 'sitAcademica', 'fechaCierre',
                'codNacionalidad', 'pasaporte', 'activo', 'sancionTempUA', 'sancion', 'repitencia'));

        $pdf->setPaper('letter');
        return $pdf->download('Certificacion_firma_original_' .$carnet.'_'.$date.'.pdf');
        }

    }

    public function indexReimpresion(){

        $user = Auth::guard('administrativo')->user()->login;

        return view('administrativo.inscripciones.indexReimpresion');
    }

    public function buscaCertificacionReimpresionPregrado(Request $request){

        $user = Auth::guard('administrativo')->user()->login . '@' . $_SERVER["REMOTE_ADDR"];
        $iniciales = Auth::guard('administrativo')->user()->iniciales; 
        $carnet = $request->input('carnet');
        $certificacion = $this->getUltimaCertificacion($carnet);

        if($certificacion != null){ // extraer certificacion y rellenar datos.... por hacer....

            $ciclo = CicloActivo::first();
            $ciclo_anio = $ciclo['ciclo_activo'];

            foreach($certificacion as $data){ // recorre los datos
                $cert_numero = $data->numero;
                $cert_ua = $data->idFacultad;
                $extension = $data->extension;
                $cod_ext = $data->idExtension;
                $cod_car = $data->idCarrera;
                $ua = $data->facultad;
                $car= $data->carrera;
                $fecha_usr = $data->fecha_usr;
                $cert_ciclo = $data->ciclo;
                $cert_transaccion = $data->transaccion;
                $barcode_hash = $data->barcode;
                $fechaVencimiento = $data->fechaVencimiento;
                $firma = $data->firma;
                $ciclo = $data->descripcion;
                $descripcion = $data->descripcion;
                $sitAcademica = $data->sit_acad;
                }

            $estudia_old = EstudiaOld::find($carnet);
            $cui = $estudia_old->cui;
            $codNacionalidad = $estudia_old->cod_nac;
            $pasaporte = $estudia_old->numero_pasaporte;
            $nombreCompleto= $estudia_old->getNombreCompleto();

            $fecha_formato = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_usr)->format('m/j/y');
            $fecha = SolicitaCertificacionInscripcion::fechaLetras($fecha_formato);


            $key = substr($barcode_hash,  0,8).substr($barcode_hash,  -5);

            $hash = $key;

            $jefatura_nombre = "";
            $jefatura_puesto = "";

            $carreras = SolicitaCertificacionInscripcion::getCarrera($carnet, $cod_car, $cod_ext, $cert_ua);
            foreach($carreras as $carrera){
               $fechaCierre = $carrera->fechaCierre;
               }

            $sanciones = SolicitaCertificacionInscripcion::verificarSanciones($carnet, $cert_ua, $cod_ext, $cod_car);
               foreach($sanciones as $data){
                   $sancionTempUA = $data->sancion_temp_UA;
                   $sancion = $data->sancion;
                   $repitencia = $data->repitencia;
               }
   

            return view('administrativo.inscripciones.certificacionInscripcionPregradoConstancia',
                    compact('ciclo', 'ciclo_anio', 'ua',
                            'cod_car', 'car', 'carnet', 'cui', 'nombreCompleto', 
                            'extension', 'fecha', 'cert_numero', 'cert_ua', 
                            'cert_ciclo', 'cert_transaccion', 'hash', 'fechaVencimiento', 
                            'firma', 'iniciales', 'descripcion', 'jefatura_nombre', 'jefatura_puesto', 'sitAcademica', 'fechaCierre', 
                            'codNacionalidad', 'pasaporte', 'sancionTempUA', 'sancion', 'repitencia'));

        }else{

        return Redirect::back()->withErrors(['msg' => 'El registro academico ingresado no dispone de ninguna certificacion para reimpresion actualmente']);
        
        }
    }

    public function getUltimaCertificacion($carnet){
        $certificacion = DB::select( DB::raw(
            'SELECT c.numero as numero, c.carnet as carnet, c.ua as idFacultad, c.ciclo as ciclo, c.extension as idExtension, c.carrera as idCarrera,
            f.nomfac as facultad, e.nombre as extension,  ct.nombre_carrera as carrera, c.fecha_usr as fecha_usr, ct.estado as estado_carrera, 
            ct.codigo_nivel as nivel, c.usuario as usuario, c.fecha_usr as fecha_usr, c.transaccion as transaccion, 
            c.descripcion as descripcion, c.firma as firma, c.fechaVencimiento as fechaVencimiento, c.barcode as barcode, c.sit_acad as sit_acad
                FROM
                    certificaciones as c
                INNER JOIN carrera_temporal as ct 
                    ON ct.codigo_unidad_academica = c.ua 
                    AND ct.codigo_extension = c.extension 
                    AND ct.codigo_carrera = c.carrera
                    AND ct.codigo_nivel IN (1,2)
                INNER JOIN extension as e 
                    ON e.codigo_extension  = c.extension 
                    AND e.codigo_unidad_academica = c.ua
                INNER JOIN facultad as f 
                    ON f.codfac = e.codigo_unidad_academica
                WHERE 
                    c.carnet = '.$carnet.'
                AND	c.estado = 2
                AND c.firma = 2
                ORDER BY fecha_usr DESC LIMIT 1;'
        )); //Consulta carreras

        return $certificacion;
    }

    public function buscaListadoReimpresionPregrado(){

        $user = Auth::guard('administrativo')->user()->login;
        $ua =  '1'; 
        $solicitud_activa = $this->solicitudReimpresionUnidad($ua);

        return view('administrativo.inscripciones.index', compact('solicitud_activa'));
    }

    public function solicitudReimpresionUnidad($ua){

        $ciclo = CicloActivo::first();
        $ciclo_anio = $ciclo['ciclo_activo'];
        log::info('este es el ciclo en solicitud: '. $ciclo_anio);
        if ($ua == 1){        
            $solicitud_reimpresion = DB::select( DB::raw(
            "SELECT c.carnet as carnet,
            eo.cui as cui,
             CONCAT(
                IF(eo.nombre1 IS NULL OR eo.nombre1 = '', '', CONCAT(eo.nombre1, ' ')),
                IF(eo.nombre2 IS NULL OR eo.nombre2 = '', '', CONCAT(eo.nombre2, ' ')), 
                IF(eo.nombre IS NULL  OR eo.nombre = '', '', CONCAT(eo.nombre, ' ')), 
                IF(eo.primer_apellido IS NULL OR eo.primer_apellido = '', '', CONCAT(eo.primer_apellido, ' ')),
                IF(eo.segundo_apellido IS NULL  OR eo.segundo_apellido = '', '', CONCAT(eo.segundo_apellido, ' '))) 
                as nombre,
            c.ua as cod_ua,
            c.extension as cod_ext,
            c.carrera as cod_carrera,
            f.nomfac as facultad,
            e.nombre as extension,
            ct.nombre_carrera as carrera,
            c.estado as estado,
            c.numero as correlativo,
            c.ciclo as ciclo,
            c.usuario as usuario,
            c.fecha_usr as fecha_solicitud,
            c.descripcion as descripcion,
            c.firma as firma,
            c.transaccion as transaccion,
            ct.codigo_nivel as nivel,
            c.barcode as barcode,
            c.fechaVencimiento as fechaVencimiento,
            eo.cod_nac as codNacionalidad,
            eo.numero_pasaporte as pasaporte,
            c.sit_acad as sit_acad
        FROM certificaciones c, estudia_old eo,
            carrera_estudiante ce, extension e,
            facultad f, carrera_temporal ct 
        WHERE c.ciclo = ".$ciclo_anio."
        AND c.carnet = eo.carnet 
        AND ce.carnet = eo.carnet 
        AND e.codigo_unidad_academica = ce.codfac 
        AND e.codigo_extension = ce.codext 
        AND f.codfac = ce.codfac 
        AND ct.codigo_unidad_academica = ce.codfac 
        AND ce.codfac = c.ua  
        AND c.extension = ce.codext 
        AND c.carrera = ce.codcar 
        AND ct.codigo_extension = ce.codext 
        AND ct.codigo_carrera = ce.codcar
        AND c.estado = 2
        AND ct.codigo_nivel < 3
        AND c.fechaVencimiento >= now()
        AND c.firma = 2
        GROUP BY c.carnet, c.ua, c.extension, c.carrera
        ORDER BY c.fecha_usr DESC LIMIT 30;"));
        }else if($ua == 0){
            $solicitud_reimpresion = "";
        }

        return $solicitud_reimpresion;
    }

}