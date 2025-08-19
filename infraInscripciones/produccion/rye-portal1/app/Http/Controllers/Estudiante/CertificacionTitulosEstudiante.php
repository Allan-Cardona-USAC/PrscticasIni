<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\EstudiaOld;
use Illuminate\Http\Request;
use \stdClass;
use Illuminate\Support\Facades\Log;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\CertificacionTitulos;
use App\Models\Planilla;
use App\Services\PayUService\Exception;
use App\Models\CicloActivo;
include app_path('/Funciones/Reinscripcion/validarCertificado.php');

class CertificacionTitulosEstudiante extends Controller 
{
    public function CarrerasCertificacionTitulos(Request $request)
    {
        $carnet= Auth::guard('estudiante')->user()->carnet;

        $estudia_old = EstudiaOld::find($carnet); 
        $nombreCompleto= $estudia_old->getNombreCompleto();
        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

        
        try {
        $token = $this->obtenerToken();
        
        $data = $this->obtenerDatoTitulo($carnet, $token);

    } catch (\Exception $e) {

        return view('portalEstudiantil.pages.certiTitulos.CarrerasTitulosError', compact('cert_pendiente'));

    }
        $title = "Registro y Estadística";

        return view('portalEstudiantil.pages.certiTitulos.CarrerasCertificarTitulos',
        compact('carnet', 'data', 'nombreCompleto', 'cert_pendiente'));

    }

    public function obtenerToken(){

        $data = http_build_query(array(
            "username" => config('apiTitulos.usuario'),
            "password"=> config('apiTitulos.password')
        ));

        $opts = array('http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config('apiTitulos.ip').'/titulos/token', false, $context);
        $json = json_decode($result, true);
        error_log('resultado' . $json['access_token']);

        return $json['access_token'];

    }

    public function obtenerDatoTitulo($registroAcademico, $token){

        $header = array('Content-type: application/json',
            'Authorization: Bearer '. $token);

        $opts = array('http'=> array(
            'method' => 'GET',
            'header' => $header
        ));
          
        $context = stream_context_create($opts);
        
        $result = file_get_contents(config('apiTitulos.ip').'/titulos/get_titulo?registro_academico='.$registroAcademico, false, $context);
        $json = json_decode($result, true);
        
        return $json;

    }

    public function VisualizaCertificacion(Request $request)
    {
        //$user = Auth::guard('administrativo')->user()->iniciales;
        //$userLogin = Auth::guard('administrativo')->user()->login;
        //$userNombre = Auth::guard('administrativo')->user()->nombre;
        $userLogin= Auth::guard('estudiante')->user()->carnet;
        //$estudia_old = EstudiaOld::find($userLogin); 
        //$userNombre= $estudia_old->getNombreCompleto();
        $user = "";

        $carnet = $request['registroAcademico'];
        $nombre = $request['nombre'];
        $cui = $request['cui'];
        $nombre_carrera = $request['nombre_carrera'];
        $nivel_academico = $request['nivel_academico'];
        $fecha_graduacion = $request['fecha_graduacion'];
        $facultad = $request['facultad'];
        $estado = $request['estado'];
        $tipo_tramite = $request['tipo_tramite'];
        $no_titulo = $request['no_titulo'];
        $codcar = $request['codcar'];
        $codfac = $request['codfac'];
        $codext = $request['codext'];

        $ciclo = CicloActivo::first();
        $ciclo = $ciclo['ciclo_activo'];

        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
        $fecha = self::fechaLetras($fecha_formato);

        $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
        foreach($jefatura as $datos){
        $jefatura_nombre = $datos->nombre;
        $jefatura_puesto = $datos->puesto;
        }

        $fecha_graduacion_format = date('Y-m-d', strtotime($fecha_graduacion));

        $fecha_usr = Carbon::now();
        Log::info('fecha_usr: '.$fecha_usr);
        $fecha_usr = date('Y-m-d', strtotime($fecha_usr));
        Log::info('fecha_usr format: '.$fecha_usr);

        $tipo_solicitud = 1; // solicitu de tipo firma digital

        //DB::select('CALL proc_certificaciones_titulos_laravel(?,?,?,?,?,?,?,?,?)',array($carnet,$cui,$nombre,$nombre_carrera,$nivel_academico,$fecha_graduacion_format, $facultad, $estado, $userLogin)); //crea una certificacion por medio del procedimientos almacenado
        $certificacion = CertificacionTitulos::where([
            ['carnet', '=', $carnet],
            ['cui', '=', $cui],
            ['nombre', '=', $nombre], 
            ['nombre_carrera', '=', $nombre_carrera], 
            ['nivel_academico', '=', $nivel_academico],
            ['fecha_graduacion', '=', $fecha_graduacion_format], 
            ['facultad', '=', $facultad], 
            ['estado', '=', $estado],
            ['tipo_solicitud', '=', $tipo_solicitud],
        ])->whereDate('fecha_usr', $fecha_usr)->orderBy('correlativo', 'desc')->take(1)->get();//busqueda de certificaciones

        foreach($certificacion as $data){ // recorremos datos
            $cert_transaccion = $data->transaccion;
            $cert_barcode = $data->barcode;
            $cod_ua = $data->cod_ua;
            $cod_extension = $data->cod_ext;
            $cod_carrera = $data->cod_car;
            $correlativo = $data->correlativo;
            $ciclo = $data->ciclo;
        }

        if($certificacion->isEmpty()){
        DB::select('CALL proc_certificaciones_titulos_laravel(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cui,$nombre,$nombre_carrera,$nivel_academico,$fecha_graduacion_format, $facultad, $estado, $userLogin, $tipo_tramite, $no_titulo, $tipo_solicitud, $codfac, $codext, $codcar, $ciclo)); //crea una certificacion por medio del procedimientos almacenado

        $certificacion = CertificacionTitulos::where([
            ['carnet', '=', $carnet],
            ['cui', '=', $cui],
            ['nombre', '=', $nombre], 
            ['nombre_carrera', '=', $nombre_carrera], 
            ['nivel_academico', '=', $nivel_academico],
            ['fecha_graduacion', '=', $fecha_graduacion_format], 
            ['facultad', '=', $facultad], 
            ['estado', '=', $estado], 
            ['tipo_solicitud', '=', $tipo_solicitud],
        ])->orderBy('correlativo', 'desc')->take(1)->get();
        foreach($certificacion as $data){
            $cert_transaccion = $data->transaccion;
            $cert_barcode = $data->barcode;
            $cod_ua = $data->cod_ua;
            $cod_extension = $data->cod_ext;
            $cod_carrera = $data->cod_car;
            $correlativo = $data->correlativo;
            $ciclo = $data->ciclo;
            }

        }

        $key = substr($cert_barcode,  0,8).substr($cert_barcode,  -5);
        $hash = $key;

        Log::info('transaccion: '.$cert_transaccion);
        Log::info('barcode: '.$cert_barcode);
        Log::info('barcode 2: '.$hash);

        return view('portalEstudiantil.pages.certiTitulos.visualizaTitulosCertificacion', compact('carnet', 'nombre',
                        'cui', 'nombre_carrera', 'nivel_academico', 'fecha_graduacion', 'facultad', 'estado', 'jefatura_nombre', 'jefatura_puesto', 'fecha', 'user', 'cert_transaccion', 'hash', 'cert_pendiente', 'tipo_tramite', 'no_titulo', 'cod_ua', 'cod_extension', 'cod_carrera', 'correlativo', 'ciclo'));

    }

    public function descargaCertificacionTitulo(Request $request){
        //$user = Auth::guard('administrativo')->user()->iniciales;
        $user = ""; 
        $carnet = $request['registroAcademico'];
        $nombre = $request['nombre'];
        $cui = $request['cui'];
        $nombre_carrera = $request['nombre_carrera'];
        $nivel_academico = $request['nivel_academico'];
        $fecha_graduacion = $request['fecha_graduacion'];
        $facultad = $request['facultad'];
        $estado = $request['estado'];
        $hash = $request['hash'];
        $cert_transaccion = $request['cert_transaccion'];
        $tipo_tramite = $request['tipo_tramite'];
        $no_titulo = $request['no_titulo'];
        $cod_ua = $request['cod_ua'];
        $cod_extension = $request['cod_extension'];
        $cod_carrera = $request['cod_carrera'];
        $correlativo = $request['correlativo'];
        $ciclo = $request['ciclo'];

        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

        $date = Carbon::now()->format('d/m/Y');

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
        $fecha = self::fechaLetras($fecha_formato);

        $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
        foreach($jefatura as $datos){
        $jefatura_nombre = $datos->nombre;
        $jefatura_puesto = $datos->puesto;
        }

        $coordinacion = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "Coordinador del Área de Títulos" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;;'));
        foreach ($coordinacion as $datos) {
            $coordinacion_nombre = $datos->nombre;
            $coordinacion_puesto = $datos->puesto;
        }

        $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $registro = '/var/www/html/rye-portal/public/img/fJefe/Registro.png';
        $firmaJefe = '/var/www/html/rye-portal/public/img/fJefe/fjefe.png';
        $firmaCoord = '/var/www/html/rye-portal/public/img/fJefe/fCoordinacion.png';

        $pdf = PDF::loadView('portalEstudiantil.pages.certiTitulos.descargarCertificacionTitulos',
        compact('css', 'img', 'registro', 'carnet', 'nombre',
        'cui', 'nombre_carrera', 'nivel_academico', 'fecha_graduacion', 'facultad', 'estado', 'fecha', 'jefatura_nombre',
        'jefatura_puesto', 'user', 'hash', 'cert_transaccion', 'firmaJefe', 'cert_pendiente', 'tipo_tramite', 'no_titulo', 'firmaCoord', 'coordinacion_nombre', 'coordinacion_puesto', 'cod_ua', 'cod_extension', 'cod_carrera', 'correlativo', 'ciclo'));

        $pdf->setPaper('letter');
        return $pdf->download('Certificacion_Titulo_' .$carnet.'_'.$date.'.pdf');

    }

    public static function fechaLetras($fecha){

        $diatext = self::obtenerNumText($fecha);
        $anio = self::obtenerAnioText($fecha);
        $mes = self::obtenerMesText($fecha);
        return $diatext.' de '. $mes.' de '. $anio.'.';
    }

    public static function obtenerNumText($fecha){

        $diastext = array('uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce',
                            'trece', 'catorce', 'quince', 'dieciseis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte',
                            'veintiuno', 'veintidos', 'veintitres', 'veinticuatro', 'veinticinco', 'veintiseis','veinticiete',
                            'veintiocho', 'veintinueve', 'treinta', 'treinta y uno');
        $numtext = $diastext[(date('j', strtotime($fecha))*1)-1];
        return $numtext;
    }

    public static function obtenerMesText($fecha){
        
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mesText = $mes[(date('m', strtotime($fecha))*1)-1];
        return $mesText;
    }


    public static function obtenerAnioText($fecha){

        $anio = date('Y', strtotime($fecha));

        $anioText = self::miles($anio);

        return $anioText;
    }

    //------------------------------Funciones para sacar los años en letras :/----------------------

    public static function miles($anio) {

        $longitud = strlen($anio); 
        $miles = substr($anio,0,$longitud-3); 
        $centenas = substr($anio,-3); 
        
        if($centenas != 0) { 
        
            $cadenaAnio = self::centenas($miles).' mil '. self::centenas($centenas);} 

        else{ 
            
            $cadenaAnio = self::centenas($miles). ' mil'; 

        }
        return $cadenaAnio;
    }

    public static function centenas($centenas) { 
        $cientos = array (100 =>'cien',200 =>'doscientos',300=>'trecientos',
        400=>'cuatrocientos', 500=>'quinientos',600=>'seiscientos',
        700=>'setecientos',800=>'ochocientos', 900 =>'novecientos');

        if( $centenas >= 100) { 

        $centena = substr($centenas,0,1); 
        $decena = '0'.substr($centenas,1,2); 
        $cadenaCentenas = (($centena == 1)?'ciento':$cientos[$centena*100]).' '. self::decenas($decena); 
        
        return $cadenaCentenas;
        
        } else{ 
            
            $cadenaDecenas = self::decenas($centenas); 
            return $cadenaDecenas;
        }
    }

    public static function decenas($decena) { 
        $decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',
        70=>'setenta',80=>'ochenta',90=>'noventa');
        
        if( $decena <= 29){
            $unidades = self::unidades($decena); 
            return $unidades;
        }

        $subunidad = substr($decena,2,1); 

        if (substr($decena,2,1) == 0){ 
            $decena = substr($decena,1); 
            return $decenas[$decena]; 
        }else{
            return $decenas[$decena - $subunidad] . ' y ' . self::unidades($subunidad); 
        }
    }

    public static function unidades($unidades) {
        $unidad = array ('uno','dos','tres','cuatro','cinco','seis','siete','ocho',
        'nueve','diez','once','doce','trece','catorce','quince','dieciséis','diecisiete','dieciocho','diecinueve','veinte','veintiuno ','vientidos ','veintitrés ', 'veinticuatro','veinticinco',
        'veintiséis','veintisiete','veintiocho','veintinueve');
        return $unidad[$unidades - 1];
    }
}