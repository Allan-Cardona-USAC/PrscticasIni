<?php

namespace App\Http\Controllers\Administrativo;

use App\Funciones\Carnet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\Certificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\BitacoraInscripcion;
use PDF;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;

class CertificacionInscripcionPostgradoController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectCertInscripcionesPostgrado');
    }

    public function index(){


        return view('administrativo.inscripciones.certificacionPostgrado');

        
    }

    public function buscaEstudiante(Request $request){

        $carnet = $request->input('carnet');
        $carreras = $this->getCarrerasPostgrado($carnet);

        if($carreras != null){

        $estudia_old = EstudiaOld::find($carnet);
        $cui = $estudia_old->cui;
        $cod_nac = $estudia_old->cod_nac;
        $pasaporte = $estudia_old->numero_pasaporte;
        $nombreCompleto= $estudia_old->getNombreCompleto();
        $ciclo = CicloActivo::first();
    
        return view('administrativo.inscripciones.certificacionPostgradoFormulario',
                    compact('carreras', 'carnet', 'cui', 'nombreCompleto', 'ciclo', 'cod_nac', 'pasaporte'));

        }else{

        return Redirect::back()->withErrors(['msg' => 'El registro academico ingresado no posee carrreras de postgrado']);
        
        }
    }

    public function certificar(Request $request){
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
        $boleta = $request->input('boleta');
        $firma = $request->input('firma');
        $fechaboleta = $request->get('fechaboleta');
        $jefe_firma = $request->input('jefe_firma');
        $ciclo = CicloActivo::first();
        $ciclo_anio = $ciclo['ciclo_activo'];
        $pasaporte = $request->input('pasaporte');
        $cod_nac = $request->input('cod_nac');
        $estudia_old = EstudiaOld::find($carnet);
        $sit_acad = $request->input('sit_acad');
        $provisional = $request->input('provisional');

        $ciclo_anio_actual = Carbon::now()->year;

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
        $fecha = self::fechaLetras($fecha_formato); //convierto la fecha a letras
     
        $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(" ",ciclo) AS Ciclos'))
                                                    ->WHERE([
                                                        ['carnet', '=', $carnet],
                                                        ['cod_ua', '=', $cod_ua], 
                                                        ['cod_ext', '=', $cod_ext], 
                                                        ['cod_car', '=', $cod_car]
                                                    ])->get(); //obtengo los ciclos inscritos del estudiante
     
        $fec_bitinscripcion = $fec_bitinscripcion[0]->Ciclos; // obtengo el array de datos
     
        $ultima_inscrip_posicion = strrpos($fec_bitinscripcion, ",")?strrpos($fec_bitinscripcion, ",")+1:null; // defino la posicion del ultimo año inscrito a traves de la posicion de la coma que separa la ultima fecha       
        
        $ultima_inscripcion = substr($fec_bitinscripcion,$ultima_inscrip_posicion); //asigno posicion y obtengo el ultimo año inscrito
        
        $fechaVencimiento = Carbon::now()->addMonth();
        
        $sanciones = SolicitaCertificacionInscripcion::verificarSanciones($carnet, $cod_ua, $cod_ext, $cod_car);
        foreach($sanciones as $data){
            $sancionTempUA = $data->sancion_temp_UA;
            $sancion = $data->sancion;
            $repitencia = $data->repitencia;
        }

        $activo = $estudia_old->activo;
        $observ = $estudia_old->observaciones;

        DB::select('CALL proc_certificaciones_laravel(?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cod_ua,$ciclo_anio,$user,$cod_ext,$cod_car,$fec_bitinscripcion, $firma, $fechaVencimiento, $jefe_firma, NULL)); //crea una certificacion por medio del procedimientos almacenado
     
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
            }

         $key = substr($barcode_hash,  0,8).substr($barcode_hash,  -5);
         Log::info('uuid key completo: '.$key);

         $hash = $key;

         $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$jefe_firma.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
         foreach($jefatura as $datos){
         $jefatura_nombre = $datos->nombre;
         $jefatura_puesto = $datos->puesto;
         }

         LOG::info("insert fecha:" . $jefe_firma);


         $certificacion = new Certificaciones;

            DB::table($certificacion->getTable())->where(
                    'transaccion', $cert_transaccion)->limit(1)->update(
                        ['no_boleta' => $boleta,
                        'fecha_boleta' => $fechaboleta,
                        'estado' => 2]);


            return view('administrativo.inscripciones.certificacionInscripcionPostgradoConstancia',
                    compact('ciclo', 'ciclo_anio', 'cod_ua', 'ua',
                            'cod_car', 'car', 'carnet', 'cui', 'nombreCompleto', 'extension', 'fecha', 'jefatura_nombre', 'jefatura_puesto', 'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'hash', 'fechaVencimiento', 'firma', 'boleta', 'iniciales', 'descripcion', 'fechaboleta', 'pasaporte', 'cod_nac', 'sancionTempUA', 'sancion', 'repitencia', 'sit_acad', 'provisional', 'activo', 'observ'));             
    }

    public static function descargarCertificacionPostgrado(Request $request){

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
        $boleta = $request->input("boleta");
        $iniciales = $request->input("iniciales");
        $descripcion = $request->input("descripcion");
        $fechaboleta = $request->input("fechaboleta");
        $pasaporte = $request->input('pasaporte');
        $cod_nac = $request->input('cod_nac');
        $sancionTempUA = $request->input('sancionTempUA');
        $sancion = $request->input('sancion');
        $repitencia = $request->input('repitencia');
        $sit_acad = $request->input('sit_acad');
        $provisional = $request->input('provisional');
        $activo = $request->input('activo');
        $observ = $request->input('observ');

        $date = Carbon::now()->format('d/m/Y');
        if($firma == 2){

            $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
            $img = '/var/www/html/rye-portal/public/img/logousac.png';
            $firmaJefe = '';
            $sello = '';
            $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';
            $pdf = PDF::loadView('administrativo.inscripciones.certificacionPostgradofirmapdf',
            compact('css', 'ciclo', 'ua', 'extension',
                    'car', 'carnet', 'cui', 'nombreCompleto', 'img', 'jefatura_nombre', 'puesto', 'fecha', 
                    'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'firma', 'sello', 'hash', 
                    'registro', 'fechaVencimiento', 'descripcion', 'boleta', 'iniciales', 'firmaJefe','fechaboleta', 'pasaporte', 'cod_nac', 'sancionTempUA', 'sancion', 'repitencia', 'sit_acad', 'provisional','activo', 'observ'));
    
            $pdf->setPaper('letter');
            return $pdf->download('Certificacion_postgrado_digital_' .$carnet.'_'.$date.'.pdf');
    

        }else{

        $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $firmaJefe = '/var/www/html/rye-portal/public/img/fJefe/fjefe.png';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';

        $pdf = PDF::loadView('administrativo.inscripciones.certificacionPostgradofirmapdf',
        compact('css', 'ciclo', 'ua', 'extension',
                'car', 'carnet', 'cui', 'nombreCompleto', 'img', 'jefatura_nombre', 'puesto', 'fecha', 
                'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'firma', 'sello', 'hash', 
                'registro', 'fechaVencimiento', 'descripcion', 'boleta', 'iniciales', 'firmaJefe','fechaboleta','pasaporte', 'cod_nac', 'sancionTempUA', 'sancion', 'repitencia', 'sit_acad', 'provisional', 'activo', 'observ'));

        $pdf->setPaper('letter');
        return $pdf->download('Certificacion_postgrado_digital_' .$carnet.'_'.$date.'.pdf');
        }

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
                            'veintiuno', 'veintidos', 'veintitres', 'veinticuatro', 'veinticinco', 'veintiseis','veintisiete',
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

    public function getCarrerasPostgrado($carnet){
        $carreras = DB::select( DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
            ce.sit_acad, ce.provisional as provisional
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
                AND ct.codigo_nivel >= 3;'
        )); //Consulta carreras

        return $carreras;
    }

    public function verificarCarnet(Request $request){
        $carnet = $request->carnet;
        $carreras = $this->getCarrerasPostgrado($carnet);
        
        if($carreras == null){ 
            return response()->json(['statusCode' => 500, 'body' => "error, el objeto esta vacio.."]);;
        }else{
            return response()->json(['statusCode' => 200, 'body' => "Hay respuesta, el carnet existe.."]);;
        }

    }

}