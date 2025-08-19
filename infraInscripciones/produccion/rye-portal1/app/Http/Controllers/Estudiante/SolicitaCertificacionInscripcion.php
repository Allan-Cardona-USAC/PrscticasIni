<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\BitacoraInscripcion;
use App\Models\CicloActivo;
use App\Models\EstudiaOld;
use App\Administrativo;
use App\Models\Certificaciones;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

include app_path('/Funciones/Reinscripcion/validarCertificado.php');

class SolicitaCertificacionInscripcion extends Controller
{

    public function certificacion_inscripcion(){
        $title='Certificación de Inscripción';
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $carreras = $this->getCarrerasPregrado($carnet);
        $estudia_old = EstudiaOld::find($carnet);
        $cui = $estudia_old->cui;
        $nombreCompleto= $estudia_old->getNombreCompleto();
        $ciclo = CicloActivo::first();
        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);
        $cod_nac = Auth::guard('estudiante')->user()->cod_nac;

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

        return view('portalEstudiantil.pages.servicios.certificacionesInscripciones',
                    compact('title','carreras', 'carnet', 'cui', 'nombreCompleto', 'ciclo', 'cert_pendiente', 'fec_bitinscripcion', 'cod_nac'));
    }

    public function certificacion(Request $request){
        $carnet = Auth::guard('estudiante')->user()->carnet; 
        $cod_ua = $request->input('ua'); //obtengo datos del request 
        $cod_ext = $request->input('ext'); 
        $cod_car = $request->input('idCarrera'); 
        $ua = $request->input('unidad_academica');
        $firma = $request->input('firma');
        $ciclo = CicloActivo::first();
        //$ciclo_anio = $ciclo['ciclo_activo'];
        $ciclo_anio = $ciclo['ciclo_web'];
        $estudia_old = EstudiaOld::find($carnet);
        $cui = $estudia_old->cui;
        $nombreCompleto= $estudia_old->getNombreCompleto();
        $extension = $request->input('extension');
        $car = $request->input('nombre_carrera');
        $nivel = $request->input('nivel');
        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);
        $sitAcad = $request->input('sitAcademica');
        $fechaCierre = $request->input('fechaCierre');
        $cod_nac = Auth::guard('estudiante')->user()->cod_nac;
        $pasaporte = Auth::guard('estudiante')->user()->numero_pasaporte;
        $activo = $request->input('activo');

        $ciclo_anio_actual = Carbon::now()->year;
        LOG::info('Año actuali: '. $ciclo_anio_actual);

        $verificaSanciones = self::verificarSanciones($carnet, $cod_ua, $cod_ext, $cod_car);
        foreach($verificaSanciones as $data){
            $sancionTempUA = $data->sancion_temp_UA;
            $sancion = $data->sancion;
            $repitencia = $data->repitencia;
        }

        if($cod_nac == 30){
            if($cui == null or $cui == 0){ 
                return Redirect::back()->withErrors(['msg' => 'Se requiere actualización de datos para generar tu certificación. Favor comunicarse al correo de trámitesadministrativosrye@adm.usac.edu.gt con tu certificado de nacimiento.']);
            }
        }else{
            if($pasaporte == null){ 
                return Redirect::back()->withErrors(['msg' => 'Se requiere actualización de datos para generar tu certificación. Favor comunicarse al correo de trámitesadministrativosrye@adm.usac.edu.gt con tu certificado de nacimiento.']);
             }
        }  

        $cat = $request->input('cat');
        if($cat != null){ 
            $caty = implode(',',$cat);
            log::info('consiguiendo los ciclos academicos: '. $caty);
            
            $n = count($cat);
            if($n > 1){
            /*$catyprimer = implode(',',array($cat[0]));
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
        

        if($firma == 1){

        $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
            $fecha = self::fechaLetras($fecha_formato); //convierto la fecha a letras
     
             $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
                                                         ->WHERE([
                                                             ['carnet', '=', $carnet],
                                                             ['cod_ua', '=', $cod_ua], 
                                                             ['cod_ext', '=', $cod_ext], 
                                                             ['cod_car', '=', $cod_car]
                                                         ])->get(); //obtengo los ciclos inscritos del estudiante

             if($fec_bitinscripcion[0]->Ciclos == null){ 
                return Redirect::back()->withErrors(['msg' => 'No cuentas con inscripciones en la carrera seleccionada']);
             }                                             
             $fec_bitinscripcion = $fec_bitinscripcion[0]->Ciclos; // obtengo el array de datos
     
             $ultima_inscrip_posicion = strrpos($fec_bitinscripcion, ",")?strrpos($fec_bitinscripcion, ",")+1:null; // defino la posicion del ultimo año inscrito a traves de la posicion de la coma que separa la ultima fecha       
     
             $ultima_inscripcion = substr($fec_bitinscripcion,$ultima_inscrip_posicion); //asigno posicion y obtengo el ultimo año inscrito
     
             $certificacion = Certificaciones::where([
                 ['carnet', '=', $carnet],
                 ['ua', '=', $cod_ua], 
                 ['extension', '=', $cod_ext], 
                 ['carrera', '=', $cod_car], 
                 ['firma', '=', $firma],
                 ['ciclo', '=', $ciclo_anio_actual]
             ])->orderBy('numero', 'desc')->take(1)->get(); //busqueda de certificaciones

             if($certificacion->isNotEmpty()){
             $cert_numero = $certificacion[0]['numero'];
             $cert_ua = $certificacion[0]['ua'];
             $cert_ciclo = $certificacion[0]['ciclo'];
             $cert_transaccion = $certificacion[0]['transaccion'];
             $cert_ciclos = $certificacion[0]['descripcion'];
             $cert_firma = $certificacion[0]['firma'];
             $ciclo = $certificacion[0]['descripcion'];
             $barcode_hash = $certificacion[0]['barcode'];
             $sitAcademica = $certificacion[0]['sit_acad'];
             }
     
             /*foreach($certificacion as $data){ // recorremos datos
                 $cert_numero = $data->numero;
                 $cert_ua = $data->ua;
                 $cert_ciclo = $data->ciclo;
                 $cert_transaccion = $data->transaccion;
                 $cert_ciclos = $data->descripcion;
                 $cert_firma = $data->firma;
                 $ciclo = $data->descripcion;
                 $barcode_hash = $data->barcode;
             }*/

             $fechaVencimiento = Carbon::now()->addMonth();
     
             if($certificacion->isEmpty()){ // condicion que verifica si no existen certificaciones

                 $jefe_firma = "JEFE";
     
                 DB::select('CALL proc_certificaciones_laravel(?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cod_ua,$ciclo_anio,$carnet,$cod_ext,$cod_car,$caty2, $firma, $fechaVencimiento, $jefe_firma, $sitAcad)); //crea una certificacion por medio del procedimientos almacenado
                 LOG::info('entre en vacia');
                 $certificacion = Certificaciones::where([ 
                     ['carnet', '=', $carnet],
                     ['ua', '=', $cod_ua], 
                     ['extension', '=', $cod_ext], 
                     ['carrera', '=', $cod_car], 
                     ['firma', '=', $firma],
                     ['ciclo', '=', $ciclo_anio_actual]
                 ])->orderBy('numero', 'desc')->take(1)->get(); //realiza una nueva busqueda de certificaciones
                 LOG::info('entre en vacia pero devuelve esto'. $certificacion[0]['barcode']);

                 if($certificacion->isNotEmpty()){
                    $cert_numero = $certificacion[0]['numero'];
                    $cert_ua = $certificacion[0]['ua'];
                    $cert_ciclo = $certificacion[0]['ciclo'];
                    $cert_transaccion = $certificacion[0]['transaccion'];
                    $ciclo = $certificacion[0]['descripcion'];
                    $barcode_hash = $certificacion[0]['barcode'];
                    $fechaVence = $certificacion[0]['fechaVencimiento'];
                    $sitAcademica = $certificacion[0]['sit_acad'];
                 }
                 
                 /*foreach($certificacion as $data){ // recorre los datos
                     $cert_numero = $data->numero;
                     $cert_ua = $data->ua;
                     $cert_ciclo = $data->ciclo;
                     $cert_transaccion = $data->transaccion;
                     $ciclo = $data->descripcion;
                     $barcode_hash = $data->barcode;
                     $fechaVence = $data->fechaVencimiento;
                 }*/

             }else{ // si existe una certificacion

             $CertificacionValida = Certificaciones::getCertificacionVigente($cert_transaccion);
             LOG::info('entre en existente');
             $ultimo_ciclo_certificado = substr($cert_ciclos, -4,4); // obtenemos el ultimo año certificacado             
             
            if($cert_ciclos== null or empty($CertificacionValida) or $cert_firma != $firma){ //validamos si el ultimo año certifcado esta vacio, si la collecion de certificacionvalida esta vacia y si el tipo de firma en lacertificacion no coincide.             
     
             $jefe_firma = "JEFE";
             // CALL PROCEDIMIENTO
             DB::select('CALL proc_certificaciones_laravel(?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cod_ua,$ciclo_anio,$carnet,$cod_ext,$cod_car,$caty2, $firma, $fechaVencimiento,$jefe_firma, $sitAcad)); // se realiza el procedimiento que inserta la nueva certificacion 
     
             $certificacion = Certificaciones::where([
                 ['carnet', '=', $carnet],
                 ['ua', '=', $cod_ua], 
                 ['extension', '=', $cod_ext], 
                 ['carrera', '=', $cod_car], 
                 ['firma', '=', $firma],
                 ['ciclo', '=', $ciclo_anio_actual]
             ])->orderBy('numero', 'desc')->take(1)->get(); // se realiza la busqueda

             if($certificacion->isNotEmpty()){
             $cert_numero = $certificacion[0]['numero'];
             $cert_ua = $certificacion[0]['ua'];
             $cert_ciclo = $certificacion[0]['ciclo'];
             $cert_transaccion = $certificacion[0]['transaccion'];
             $ciclo = $certificacion[0]['descripcion'];
             $barcode_hash = $certificacion[0]['barcode'];
             $fechaVence = $certificacion[0]['fechaVencimiento'];
             $sitAcademica = $certificacion[0]['sit_acad'];
             }
             /*foreach($certificacion as $data){ // se recorren los datos
                 $cert_numero = $data->numero;
                 $cert_ua = $data->ua;
                 $cert_ciclo = $data->ciclo;
                 $cert_transaccion = $data->transaccion;
                 $ciclo = $data->descripcion;
                 $barcode_hash = $data->barcode;
                 $fechaVence = $data->fechaVencimiento;
             }*/
             }else{ // si la certificacion existe, realiza la busqueda y almacena los datos en las variables...
     
             $certificacion = Certificaciones::where([
                     ['carnet', '=', $carnet],
                     ['ua', '=', $cod_ua],
                     ['extension', '=', $cod_ext], 
                     ['carrera', '=', $cod_car], 
                     ['firma', '=', $firma],
                     ['ciclo', '=', $ciclo_anio_actual]
                 ])->orderBy('numero', 'desc')->take(1)->get();

                 if($certificacion->isNotEmpty()){
                 $cert_numero = $certificacion[0]['numero'];
                 $cert_ua = $certificacion[0]['ua'];
                 $cert_ciclo = $certificacion[0]['ciclo'];
                 $cert_transaccion = $certificacion[0]['transaccion'];
                 $ciclo = $certificacion[0]['descripcion'];
                 $barcode_hash = $certificacion[0]['barcode'];
                 $fechaVence = $certificacion[0]['fechaVencimiento'];
                 $fecha = $certificacion[0]['fecha_usr'];
                 $sitAcademica = $certificacion[0]['sit_acad'];
                 }

                 /*foreach($certificacion as $data){
                     $cert_numero = $data->numero;
                     $cert_ua = $data->ua;
                     $cert_ciclo = $data->ciclo;
                     $cert_transaccion = $data->transaccion;
                     $ciclo = $data->descripcion;
                     $barcode_hash = $data->barcode;
                     $fechaVence = $data->fechaVencimiento;
                     $fecha = $data->fecha_usr;
                     }*/

                $fecha = self::fechaLetras($fecha);
             }
         }

         $key = substr($barcode_hash,  0,8).substr($barcode_hash,  -5);
         Log::info('uuid key completo: '.$key);

         $hash = $key;

            $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
            foreach($jefatura as $datos){
            $jefatura_nombre = $datos->nombre;
            $jefatura_puesto = $datos->puesto;
            }

            return view('portalEstudiantil.pages.servicios.certificacionInscripcionConstancia',
                    compact('ciclo', 'ciclo_anio', 'cod_ua', 'ua',
                            'cod_car', 'car', 'carnet', 'cui', 'nombreCompleto', 'extension', 'fecha', 'jefatura_nombre', 'jefatura_puesto', 'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'hash', 'fechaVence', 'cert_pendiente', 'caty2', 'sitAcademica', 'fechaCierre', 'cod_nac', 'pasaporte', 'sancionTempUA','sancion','repitencia', 'activo'));
                        
        }elseif($firma == 2){

            $correo = Auth::guard('estudiante')->user()->email; 
            $telefono = Auth::guard('estudiante')->user()->celular; 
            $sitAcademica = $sitAcad;

            $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
            ->WHERE([
                ['carnet', '=', $carnet],
                ['cod_ua', '=', $cod_ua], 
                ['cod_ext', '=', $cod_ext], 
                ['cod_car', '=', $cod_car]
            ])->get(); //obtengo los ciclos inscritos del estudiante

            if($fec_bitinscripcion[0]->Ciclos == null){ 
                return Redirect::back()->withErrors(['msg' => 'No se encuentra inscrito']);  
            } 
            
            return view('portalEstudiantil.pages.servicios.certificacionInscripcionNoBoleta',
                compact('ciclo', 'ciclo_anio', 'cod_ua', 'ua','cod_car', 'car',
                 'nombreCompleto', 'cert_pendiente', 'carnet', 'correo', 'telefono','extension', 'cod_ext', 'firma', 'caty2', 'cod_nac', 'pasaporte', 'sitAcademica'));
            
        }
    }

    public static function descargarCertificacion(Request $request){

        $ciclo = $request->input("ciclo");
        $ciclo = explode(",", $ciclo);
        $carnet = $request->input("carnet");
        $cui = $request->input("cui");
        $nombreCompleto = $request->input("nombreCompleto");
        $ua = $request->input("ua");
        $extension = $request->input('extension');
        $car = $request->input("car");
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
        $sitAcademica = $request->input('sitAcademica');
        $fechaCierre = $request->input('fechaCierre');
        $cod_nac = Auth::guard('estudiante')->user()->cod_nac;
        $pasaporte = Auth::guard('estudiante')->user()->numero_pasaporte;
        $activo = $request->input('activo');
        //$activo = Auth::guard('estudiante')->user()->activo;
        $sancionTempUA = $request->input('sancionTempUA');
        $sancion = $request->input('sancion');
        $repitencia = $request->input('repitencia');

        $date = Carbon::now()->format('d/m/Y');

        $css = '/var/www/html/rye-portal/public/css/certificacionInscripcion.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $firma = '/var/www/html/rye-portal/public/img/fJefe/fjefe.png';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro='/var/www/html/rye-portal/public/img/fJefe/Registro.png';

        $pdf = PDF::loadView('portalEstudiantil.pages.servicios.certificacionInscripcionConstanciapdf',
        compact('css', 'ciclo', 'ua', 'extension',
                'car', 'carnet', 'cui', 'nombreCompleto', 'img', 'jefatura_nombre', 'puesto', 'fecha', 'cert_numero', 'cert_ua', 'cert_ciclo', 'cert_transaccion', 'firma', 'sello', 'hash', 'registro', 'fechaVencimiento', 'sitAcademica', 'fechaCierre', 'cod_nac', 'pasaporte', 'activo', 'sancionTempUA', 'sancion', 'repitencia'));

        $pdf->setPaper('letter');
        return $pdf->download('Firma_digital_' .$carnet.'_'.$date.'.pdf');

    }

    public static function fechaLetras($fecha){

        $diatext = self::obtenerNumText($fecha);
        $anio = self::obtenerAnioText($fecha);
        $mes = self::obtenerMesText($fecha);
        return $diatext.' de '. $mes.' de '. $anio.'.';
    }

    public static function obtenerNumText($fecha){

        $diastext = array('uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce',
                            'trece', 'catorce', 'quince', 'dieciseís', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte',
                            'veintiuno', 'veintidós', 'veintitrés', 'veinticuatro', 'veinticinco', 'veintiséis','veintisiete',
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
        'nueve','diez','once','doce','trece','catorce','quince','dieciséis','diecisiete','dieciocho','diecinueve','veinte','veintiuno ','vientidós ','veintitrés ', 'veinticuatro','veinticinco',
        'veintiséis','veintisiete','veintiocho','veintinueve');
        return $unidad[$unidades - 1];
        }

        public function verificarCertificadoinscripcion(Request $request){

            $transaccion = $request->query('id'); //idTransaccion
            $certificacion = Certificaciones::where([
                ['transaccion', '=', $transaccion]
            ])->first();
            
                $cert_transaccion = $certificacion->transaccion;

            $title = "Registro y Estadística";

            return view('portalEstudiantil.pages.servicios.verificarCertificacionInscripcionBarcode',
                    compact('cert_transaccion', 'title'));

        }

            public function getCarreras($carnet){
                $carreras = DB::select( DB::raw(
                    'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
                    f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel, ce.activo as activo
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
                        AND e.codigo_extension = ce.codext;'
                )); //Consulta carreras
        
                return $carreras;
            }

            public static function getCarrera($carne, $carrera, $cod_ext, $cod_fac){
                $carreras = DB::select( DB::raw(
                    'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
                    f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
                    ce.sit_acad as sitAcademica, ce.fec_cierre as fechaCierre, ce.provisional as provisional, ce.activo as activo
                        FROM 
                            carrera_estudiante ce, 
                            facultad f, 
                            carrera_temporal ct, 
                            extension e
                        WHERE 
                            ce.carnet = '.$carne.'
                        AND ce.codfac = f.codfac
                        AND ct.codigo_unidad_academica = ce.codfac
                        AND ct.codigo_extension = ce.codext
                        AND ct.codigo_carrera = ce.codcar
                        AND e.codigo_unidad_academica = f.codfac 
                        AND e.codigo_extension = ce.codext
                        AND ce.codcar = '.$carrera.'
                        AND ce.codext = '.$cod_ext.'
                        AND f.codfac = '.$cod_fac.';'
                )); //Consulta carreras
        
                return $carreras;
            }

            public function getCarrerasPregrado($carnet){
                $carreras = DB::select( DB::raw(
                    'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
                    f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
                    ce.sit_acad as sitAcademica, ce.fec_cierre as fechaCierre, ce.activo as activo
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

            public function verificarCertificadoinscripcionFinal(Request $request){

                $cert_transaccion = $request->input('cert_transaccion');
                $hash_request = $request->input("hash"); //peticion del hash...
                $hash_request = Str::lower($hash_request);

                $certificacion = Certificaciones::where([
                    ['transaccion', '=', $cert_transaccion]
                ])->first();

                    $barcode_hash = $certificacion->barcode;


                $key = substr($barcode_hash,  0,8).substr($barcode_hash,  -5);
           

                if($hash_request == $key){
                
                $hash = $key;

                $carnet = $certificacion->carnet;
                $cert_numero = $certificacion->numero;
                $cert_ua = $certificacion->ua;
                $cert_ciclo = $certificacion->ciclo;
                $cert_transaccion = $certificacion->transaccion;
                $cert_fecha = $certificacion->fecha_usr;
                $cert_extension = $certificacion->extension;
                $cert_carrera = $certificacion->carrera;
                $cert_descripcion = $certificacion->descripcion;
                $usuario = $certificacion->usuario;
                $boleta = $certificacion->no_boleta;
                $fechaboleta = $certificacion->fecha_boleta;
                $cert_firma = $certificacion->firma;
                $jefe_firma = $certificacion->firmado;
                $sitAcademica = $certificacion->sit_acad;

                $fecha = self::fechaLetras($cert_fecha);

                $estudia_old = EstudiaOld::find($carnet);
                $cui = $estudia_old->cui;
                $cod_nac = $estudia_old->cod_nac;
                $pasaporte = $estudia_old->numero_pasaporte;
                $nombreCompleto= $estudia_old->getNombreCompleto();
                //$activo = $estudia_old->activo;
        
                $carreras = $this->getCarrera($carnet, $cert_carrera, $cert_extension, $cert_ua );

                $activo = $carreras[0]->activo;
                
                foreach($carreras as $carrera){
                $fechaCierre = $carrera->fechaCierre;
                $ua = $carrera->facultad;
                $extension = $carrera->extension;
                $nivel = $carrera->nivel;
                $provisional = $carrera->provisional;
                $carrera = $carrera->carrera;
                }

                $sanciones = $this->verificarSanciones($carnet, $cert_ua, $cert_extension, $cert_carrera);
                foreach($sanciones as $data){
                    $sancionTempUA = $data->sancion_temp_UA;
                    $sancion = $data->sancion;
                    $repitencia = $data->repitencia;
                }

                if(Empty($jefe_firma)){
                    $jefe_firma = "JEFE";
                }

                $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'.$jefe_firma.'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
                foreach($jefatura as $datos){
                $jefatura_nombre = $datos->nombre;
                $jefatura_puesto = $datos->puesto;
                }


                $iniciales =""; 

                if($nivel >= 3){

                    $ultima_posicion_usuario = strrpos($usuario, "@")?strrpos($usuario, "@"):null;
                    LOG::info("ultima posicion: ". $ultima_posicion_usuario);
                    $usuario_final = substr($usuario,0,$ultima_posicion_usuario);
                    LOG::info("login: ". $usuario_final);

                    $user = Administrativo::Select(DB::raw('iniciales AS iniciales'))
                    ->WHERE([
                        ['login', '=', $usuario_final],
                    ])->get();

                    $iniciales = $user[0]->iniciales;
                }

                $title = "Registro y Estadística";

                return view('portalEstudiantil.pages.servicios.verificarCertificacionInscripcion',
                            compact('carnet','fecha','cert_numero', 'cert_ua', 'cert_ciclo', 
                            'cert_transaccion', 'title', 'cui', 'nombreCompleto', 'ua', 'extension', 
                            'carrera','jefatura_nombre', 'jefatura_puesto','cert_descripcion', 'hash', 'nivel', 'iniciales', 'boleta', 'fechaboleta', 'cert_firma', 'sitAcademica', 'fechaCierre', 'cod_nac', 'pasaporte', 'activo', 'jefe_firma', 'sancionTempUA', 'sancion', 'repitencia', 'provisional'));
                }else{
                    
                return Redirect::back()->withErrors(['msg' => 'El codigo de barras ingresado no es el correcto']);

                }
            }

            public function certificacionOriginal(Request $request){

                $carnet = Auth::guard('estudiante')->user()->carnet; 
                $cod_ua = $request->input('cod_ua'); //obtengo datos del request 
                $cod_ext = $request->input('cod_ext'); 
                $cod_car = $request->input('cod_car'); 
                $ua = $request->input('ua');
                $firma = $request->input('firma');
                $ciclo = $request->input('ciclo');
                $ciclo_anio = $request->input('ciclo_anio');
                $cui = $request->input('cui');
                $nombreCompleto= $request->input('nombreCompleto');
                $extension = $request->input('extension');
                $car = $request->input('car');
                $correo = $request->input('correo');
                $telefono = $request->input('telefono');
                $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);
                $ciclo_anio_actual = Carbon::now()->year;
                $sitAcademica = $request->input('sit_acad');

                $caty = $request->input('caty');
        
                $fecha_formato = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
                $fecha = self::fechaLetras($fecha_formato); //convierto la fecha a letras
             
                     $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
                                                                 ->WHERE([
                                                                     ['carnet', '=', $carnet],
                                                                     ['cod_ua', '=', $cod_ua], 
                                                                     ['cod_ext', '=', $cod_ext], 
                                                                     ['cod_car', '=', $cod_car]
                                                                 ])->get(); //obtengo los ciclos inscritos del estudiante
             
                     $fec_bitinscripcion = $fec_bitinscripcion[0]->Ciclos; // obtengo el array de datos
             
                     $ultima_inscrip_posicion = strrpos($fec_bitinscripcion, ",")?strrpos($fec_bitinscripcion, ",")+1:null; // defino la posicion del ultimo año inscrito a traves de la posicion de la coma que separa la ultima fecha       
             
                     $ultima_inscripcion = substr($fec_bitinscripcion,$ultima_inscrip_posicion); //asigno posicion y obtengo el ultimo año inscrito
             
                     $certificacion = Certificaciones::where([
                         ['carnet', '=', $carnet],
                         ['ua', '=', $cod_ua], 
                         ['extension', '=', $cod_ext], 
                         ['carrera', '=', $cod_car], 
                         ['firma', '=', $firma],
                         ['ciclo', '=', $ciclo_anio_actual]
                     ])->orderBy('numero', 'desc')->take(1)->get(); //busqueda de certificaciones

                     if($certificacion->isNotEmpty()){

                     $cert_numero = $certificacion[0]['numero'];
                     $cert_ua = $certificacion[0]['ua'];
                     $cert_ciclo = $certificacion[0]['ciclo'];
                     $cert_transaccion = $certificacion[0]['transaccion'];
                     $cert_ciclos = $certificacion[0]['descripcion'];
                     $cert_firma = $certificacion[0]['firma'];
                     $ciclo = $certificacion[0]['descripcion'];
                     $barcode_hash = $certificacion[0]['barcode'];
                     $sitAcademica = $certificacion[0]['sit_acad'];
                    }
             
                     /*foreach($certificacion as $data){ // recorremos datos
                         $cert_numero = $data->numero;
                         $cert_ua = $data->ua;
                         $cert_ciclo = $data->ciclo;
                         $cert_transaccion = $data->transaccion;
                         $cert_ciclos = $data->descripcion;
                         $cert_firma = $data->firma;
                         $ciclo = $data->descripcion;
                         $barcode_hash = $data->barcode;
                     }*/
        
                     $fechaVencimiento = Carbon::now()->addMonth();
             
                     if($certificacion->isEmpty()){ // condicion que verifica si no existen certificaciones
             
                         $jefe_firma = "JEFE";
                         DB::select('CALL proc_certificaciones_laravel(?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cod_ua,$ciclo_anio,$carnet,$cod_ext,$cod_car,$caty, $firma, $fechaVencimiento, $jefe_firma, $sitAcademica)); //crea una certificacion por medio del procedimientos almacenado
             
                         $certificacion = Certificaciones::where([ 
                             ['carnet', '=', $carnet],
                             ['ua', '=', $cod_ua], 
                             ['extension', '=', $cod_ext], 
                             ['carrera', '=', $cod_car], 
                             ['firma', '=', $firma],
                             ['ciclo', '=', $ciclo_anio_actual]
                         ])->orderBy('numero', 'desc')->take(1)->get(); //realiza una nueva busqueda de certificaciones

                         if($certificacion->isNotEmpty()){

                            $cert_numero = $certificacion[0]['numero'];
                            $cert_ua = $certificacion[0]['ua'];
                            $cert_ciclo = $certificacion[0]['ciclo'];
                            $cert_transaccion = $certificacion[0]['transaccion'];
                            $ciclo = $certificacion[0]['descripcion'];
                            $barcode_hash = $certificacion[0]['barcode'];
                            $fechaVence = $certificacion[0]['fechaVencimiento'];
                            $sitAcademica = $certificacion[0]['sit_acad'];
                           }
                 
                         /*foreach($certificacion as $data){ // recorre los datos
                             $cert_numero = $data->numero;
                             $cert_ua = $data->ua;
                             $cert_ciclo = $data->ciclo;
                             $cert_transaccion = $data->transaccion;
                             $ciclo = $data->descripcion;
                             $barcode_hash = $data->barcode;
                             $fechaVence = $data->fechaVencimiento;
                         }*/
                     }else{ // si existe una certificacion
        
                     $CertificacionValida = Certificaciones::getCertificacionVigente($cert_transaccion);
        
                     $ultimo_ciclo_certificado = substr($cert_ciclos, -4,4); // obtenemos el ultimo año certificacado             
                     
                        if($cert_ciclos== null or empty($CertificacionValida) or $cert_firma != $firma){ //validamos si el ultimo año certifcado esta vacio, si la collecion de certificacionvalida esta vacia y si el tipo de firma en lacertificacion no coincide.             
             
                     // CALL PROCEDIMIENTO
                     $jefe_firma = "JEFE";
                     DB::select('CALL proc_certificaciones_laravel(?,?,?,?,?,?,?,?,?,?,?)',array($carnet,$cod_ua,$ciclo_anio,$carnet,$cod_ext,$cod_car,$caty, $firma, $fechaVencimiento,$jefe_firma,$sitAcademica)); // se realiza el procedimiento que inserta la nueva certificacion 
             
                     $certificacion = Certificaciones::where([
                         ['carnet', '=', $carnet],
                         ['ua', '=', $cod_ua], 
                         ['extension', '=', $cod_ext], 
                         ['carrera', '=', $cod_car], 
                         ['firma', '=', $firma],
                         ['ciclo', '=', $ciclo_anio_actual]
                     ])->orderBy('numero', 'desc')->take(1)->get(); // se realiza la busqueda 

                     if($certificacion->isNotEmpty()){

                        $cert_numero = $certificacion[0]['numero'];
                        $cert_ua = $certificacion[0]['ua'];
                        $cert_ciclo = $certificacion[0]['ciclo'];
                        $cert_transaccion = $certificacion[0]['transaccion'];
                        $ciclo = $certificacion[0]['descripcion'];
                        $barcode_hash = $certificacion[0]['barcode'];
                        $fechaVence = $certificacion[0]['fechaVencimiento'];
                        $sitAcademica = $certificacion[0]['sit_acad'];
                       }
             
                     /*foreach($certificacion as $data){ // se recorren los datos
                         $cert_numero = $data->numero;
                         $cert_ua = $data->ua;
                         $cert_ciclo = $data->ciclo;
                         $cert_transaccion = $data->transaccion;
                         $ciclo = $data->descripcion;
                         $barcode_hash = $data->barcode;
                         $fechaVence = $data->fechaVencimiento;
                     }*/

                     }else{ // si la certificacion existe, realiza la busqueda y almacena los datos en las variables...
             
                     $certificacion = Certificaciones::where([
                             ['carnet', '=', $carnet],
                             ['ua', '=', $cod_ua],
                             ['extension', '=', $cod_ext], 
                             ['carrera', '=', $cod_car], 
                             ['firma', '=', $firma],
                             ['ciclo', '=', $ciclo_anio_actual]
                         ])->orderBy('numero', 'desc')->take(1)->get();

                         if($certificacion->isNotEmpty()){

                            $cert_numero = $certificacion[0]['numero'];
                            $cert_ua = $certificacion[0]['ua'];
                            $cert_ciclo = $certificacion[0]['ciclo'];
                            $cert_transaccion = $certificacion[0]['transaccion'];
                            $ciclo = $certificacion[0]['descripcion'];
                            $barcode_hash = $certificacion[0]['barcode'];
                            $fechaVence = $certificacion[0]['fechaVencimiento'];
                            $sitAcademica = $certificacion[0]['sit_acad'];
                        }

                         /*foreach($certificacion as $data){
                             $cert_numero = $data->numero;
                             $cert_ua = $data->ua;
                             $cert_ciclo = $data->ciclo;
                             $cert_transaccion = $data->transaccion;
                             $ciclo = $data->descripcion;
                             $barcode_hash = $data->barcode;
                             $fechaVence = $data->fechaVencimiento;
                             }*/
                     }
                 }
        

                    $estudiante = new EstudiaOld;
                    DB::table($estudiante->getTable())->where(
                        'carnet', $carnet)->limit(1)->update(
                            ['celular' => $telefono,
                            'email' => $correo]);
                    
                    
                return view('portalEstudiantil.pages.servicios.certificacionInscripcionMensaje',
                    compact('nombreCompleto','fechaVence', 'cert_pendiente', 'carnet', 'correo', 'telefono'));
                    
            }

            public function verificarInscripciones(Request $request){

                $carnet = Auth::guard('estudiante')->user()->carnet; 
                $cod_ua = $request->input('ua'); //obtengo datos del request 
                $cod_ext = $request->input('ext'); 
                $cod_car = $request->input('idCarrera'); 
                $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

                $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(ciclo) AS Ciclos'))
                                                         ->WHERE([
                                                             ['carnet', '=', $carnet],
                                                             ['cod_ua', '=', $cod_ua], 
                                                             ['cod_ext', '=', $cod_ext], 
                                                             ['cod_car', '=', $cod_car]
                                                         ])->get();

                return $fec_bitinscripcion;
                
            }

            public static function verificarSanciones($carnet, $ua, $ext, $car){
                $sanciones = DB::select( DB::raw(
                    'SELECT r.carnet as carnet,
                        (SELECT tipo_modificacion.nombre
                            FROM sanciones, tipo_modificacion
                            WHERE sanciones.carnet = r.carnet
                                AND sanciones.ua = r.idFacultad
                                AND sanciones.car = r.idCarrera
                                AND r.cicloWeb BETWEEN YEAR(sanciones.del) AND YEAR(sanciones.al)
                                AND sanciones.cod_mov IN ("21")
                                AND tipo_modificacion.codigo = sanciones.cod_mov 
                        ) as sancion_temp_UA,
                        (SELECT tipo_modificacion.nombre
                            FROM sanciones, tipo_modificacion
                            WHERE sanciones.carnet = r.carnet
                                AND sanciones.ua = r.idFacultad
                                AND sanciones.car = r.idCarrera
                                AND sanciones.cod_mov NOT IN ("33","32","21")
                                AND tipo_modificacion.codigo = sanciones.cod_mov LIMIT 1
                        ) as sancion,
                        (SELECT tm.nombre 
        	                FROM sanciones es, tipo_modificacion tm 
        		            WHERE es.carnet = r.carnet 
        			            AND es.ua = r.idFacultad
                	            AND es.car = r.idCarrera
                	            AND tm.codigo = es.cod_mov
                	            AND r.cicloWeb BETWEEN YEAR(es.del) AND YEAR(es.al)
                	            AND (SELECT COUNT(s.cod_mov) as Total 
                			            FROM sanciones s
								        WHERE s.carnet = r.carnet 
									            AND s.cod_mov in ("33")) < es.cod_mov in ("32") ) as repitencia
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
                            ciclo_activo.ciclo_web as cicloWeb,
                            ciclo_activo.semestre_web as semestreWeb,
                            ciclo_activo.oportunidad as oportunidad,
                            (CASE WHEN carrera_temporal.codigo_nivel IN (1,2) THEN 2 ELSE 3 END) AS categoria
                        FROM
                            carrera_estudiante,
                            ciclo_activo,
                            carrera_temporal,
                            facultad,
                            extension
                    WHERE 
                        carrera_estudiante.carnet = '.$carnet.' 
                        AND carrera_estudiante.codfac = '.$ua.'
                        AND carrera_estudiante.codext = '.$ext.'
                        AND carrera_estudiante.codcar = '.$car.'
                        AND carrera_temporal.codigo_unidad_academica=carrera_estudiante.codfac
                        AND carrera_temporal.codigo_extension = carrera_estudiante.codext
                        AND carrera_temporal.codigo_carrera = carrera_estudiante.codcar
                        AND  facultad.codfac = carrera_estudiante.codfac
                        AND extension.codigo_unidad_academica = carrera_estudiante.codfac
                        AND extension.codigo_extension = carrera_estudiante.codext
                        ) r
                    ')); //Consulta sanciones
        
                    return $sanciones;
            }

}

