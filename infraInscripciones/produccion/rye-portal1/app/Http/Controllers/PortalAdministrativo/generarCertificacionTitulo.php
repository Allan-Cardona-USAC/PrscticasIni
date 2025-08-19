<?php

namespace App\Http\Controllers\PortalAdministrativo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\CertificacionTitulos;
use App\Models\EstudiaOld;
use Illuminate\Http\Request;
use \stdClass;
use Illuminate\Support\Facades\Log;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Planilla;
use App\Models\NivelAcademico;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;
use App\Http\Controllers\Estudiante\SolicitarCarnet;
use App\Models\CicloActivo;

class generarCertificacionTitulo extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectCertiTitulos');
    }

    public function buscarTitulo(){

        ##https://www.php.net/manual/en/context.curl.php

        return view('portalAdministrativo.generarCertificacionTitulo.generarCertificacion');

    }

    public function obtenerTitulos(Request $request){

        $carnet= $request['registroAcademico'];

        $estudia_old = EstudiaOld::find($carnet); 
        $nombreCompleto= $estudia_old->getNombreCompleto();

        $planilla = Planilla::where([
            ['carnet', '=', $carnet],
        ])->get();//busqueda de titulos


        try{

        $token = $this->obtenerToken();
        
        $data = $this->obtenerDatoTitulo($carnet, $token);
        }catch (\Exception $e){
            return view('portalEstudiantil.pages.certiTitulos.CarrerasTitulosError',);
        }

        return view('portalAdministrativo.generarCertificacionTitulo.obtenerTitulos', compact('carnet', 'data', 'nombreCompleto', 'planilla'));

    }

    public function visualizaTitulos(Request $request){

        $tipo_titulo = $request['tipo_titulo'];

        $user = Auth::guard('administrativo')->user()->iniciales;
        $userLogin = Auth::guard('administrativo')->user()->login;
        $userNombre = Auth::guard('administrativo')->user()->nombre;  
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
        $firma = $request['firma'];
        $tipo_firma = $request['tipo_firma'];
        $codcar = $request['codcar'];
        $codfac = $request['codfac'];
        $codext = $request['codext'];

        $ciclo = CicloActivo::first();
        $ciclo = $ciclo['ciclo_activo'];

        if($tipo_titulo == 2){

        $estudia_old = EstudiaOld::find($carnet);
        $nombre = $estudia_old->getNombreCompleto();
        $cui = $estudia_old->cui;
        
        if($no_titulo == 0){
            $estado = 0;
            //return Redirect::back()->withErrors(['msg' => 'El titulo seleccionado no tiene numero de titulo, porfavor realizar el proceso correspondiente para asignar el registro e intentar nuevamente.']);
        }else{
            $planilla_data = Planilla::where([
                                            ["carnet","=",$carnet],
                                            ["codfac","=",$codfac],
                                            ["codext","=",$codext],
                                            ["codcar","=",$codcar]])->update([
                                                "registro" => $no_titulo,
                                                "usuario" => $userLogin. '@' . $_SERVER["REMOTE_ADDR"]
                                                ]);
            if($tipo_tramite == 4){
                $estado = 10;
            }else{                                    
                $estado = 11;
            }
        }

        $getCarrera = SolicitaCertificacionInscripcion::getCarrera($carnet, $codcar, $codext, $codfac);

        foreach($getCarrera as $getData){
            $facultad = $getData->facultad;
            $nivel = $getData->nivel;
        }

        $nivelAcademico = NivelAcademico::where([
            ['codigo_nivel_academico', '=', $nivel],
        ])->get()->first();//busqueda de titulos

        $nivel_academico = $nivelAcademico->nombre;

        }

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
        $fecha = self::fechaLetras($fecha_formato);

        $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$firma.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
        foreach($jefatura as $datos){
        $jefatura_nombre = $datos->nombre;
        $jefatura_puesto = $datos->puesto;
        }

        $coordinacion = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "Coordinador del Área de Títulos" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;;'));
        foreach ($coordinacion as $datos) {
            $coordinacion_nombre = $datos->nombre;
            $coordinacion_puesto = $datos->puesto;
        }

        $fecha_graduacion_format = date('Y-m-d', strtotime($fecha_graduacion));

        $fecha_usr = Carbon::now();
        Log::info('fecha_usr: '.$fecha_usr);
        $fecha_usr = date('Y-m-d', strtotime($fecha_usr));
        Log::info('fecha_usr format: '.$fecha_usr);

        $tipo_solicitud = 2;

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

        /*if($certificacion->isEmpty()){
        DB::select('CALL proc_certificaciones_titulos_laravel(?,?,?,?,?,?,?,?,?)',array($carnet,$cui,$nombre,$nombre_carrera,$nivel_academico,$fecha_graduacion_format, $facultad, $estado, $userLogin)); //crea una certificacion por medio del procedimientos almacenado

        $certificacion = CertificacionTitulos::where([
            ['carnet', '=', $carnet],
            ['cui', '=', $cui],
            ['nombre', '=', $nombre], 
            ['nombre_carrera', '=', $nombre_carrera], 
            ['nivel_academico', '=', $nivel_academico],
            ['fecha_graduacion', '=', $fecha_graduacion_format], 
            ['facultad', '=', $facultad], 
            ['estado', '=', $estado], 
        ])->orderBy('correlativo', 'desc')->take(1)->get();
        foreach($certificacion as $data){
            $cert_transaccion = $data->transaccion;
            $cert_barcode = $data->barcode;
            }

        }*/

        $key = substr($cert_barcode,  0,8).substr($cert_barcode,  -5);
        $hash = $key;

        Log::info('transaccion: '.$cert_transaccion);
        Log::info('barcode: '.$cert_barcode);
        Log::info('barcode 2: '.$hash);

        return view('portalAdministrativo.generarCertificacionTitulo.visualizaCertificacion', compact('carnet', 'nombre',
                        'cui', 'nombre_carrera', 'nivel_academico', 'fecha_graduacion', 'facultad', 'estado', 'jefatura_nombre', 'jefatura_puesto', 'fecha', 'user', 'cert_transaccion', 'hash', 'tipo_tramite', 'no_titulo', 'coordinacion_nombre', 'coordinacion_puesto', 'firma', 'tipo_firma', 'tipo_titulo', 'cod_ua', 'cod_extension', 'cod_carrera', 'correlativo', 'ciclo'));

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

    public function descargaTitulos(Request $request){
        $user = Auth::guard('administrativo')->user()->iniciales; 
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
        $firma = $request['jefatura_puesto'];
        $tipo_firma = $request['tipo_firma'];
        $tipo_titulo = $request['tipo_titulo'];
        $cod_ua = $request['cod_ua'];
        $cod_extension = $request['cod_extension'];
        $cod_carrera = $request['cod_carrera'];
        $correlativo = $request['correlativo'];
        $ciclo = $request['ciclo'];
        

        $date = Carbon::now()->format('d/m/Y');

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
        $fecha = self::fechaLetras($fecha_formato);

        $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$firma.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
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

        if($tipo_firma == 2){
            $firmaJefe = '/var/www/html/rye-portal/public/img/fJefe/fjefe.png';
            $firmaCoord = '/var/www/html/rye-portal/public/img/fJefe/fCoordinacion.png';
            $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        }else{
            $firmaJefe = '';
            $firmaCoord = '';
            $sello = '';
        }

        $pdf = PDF::loadView('portalAdministrativo.generarCertificacionTitulo.descargaCertificacion',
        compact('css', 'img', 'registro', 'carnet', 'nombre',
        'cui', 'nombre_carrera', 'nivel_academico', 'fecha_graduacion', 'facultad', 'estado', 'fecha', 'jefatura_nombre',
        'jefatura_puesto', 'user', 'hash', 'cert_transaccion', 'tipo_tramite', 'no_titulo', 'coordinacion_nombre', 'coordinacion_puesto', 'firma', 'tipo_firma', 'firmaJefe', 'firmaCoord', 'sello', 'tipo_titulo', 'cod_ua', 'cod_extension', 'cod_carrera', 'correlativo', 'ciclo'));

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

    public function verificarCarnet(Request $request){
        $carnet = $request->carnet;
        $estudia_old = EstudiaOld::find($carnet);
        
        if($estudia_old == null){ 
            return response()->json(['statusCode' => 500, 'body' => "error, el objeto esta vacio.."]);;
        }else{
            return response()->json(['statusCode' => 200, 'body' => "Hay respuesta, el carnet existe.."]);;
        }

    }

}