<?php

namespace App\Http\Controllers\Administrativo;

use App\Funciones\Expediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;
use App\Models\Certificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use App\Models\PruebaEspecifica;
use App\Models\Facultad;
use App\Models\Pcb;
use Illuminate\Support\Facades\Log;
use App\Funciones\Expendiente;
use nusoap_client;
use App\Funciones\Utilidades;
use App\Models\CarnetNvo;
use Illuminate\Validation\Rules\In;
use App\Funciones\Mineduc;


class ArchivoController extends Controller
{
    use Mineduc;

    public function __construct(){
            $this->middleware('administrativo.auth:administrativo');
            $this->middleware('administrativo.RedirectArchivos');
    }

    public function buscaCarnet(){
        return view('administrativo.archivo.consultaCarnetArchivos');
    }

    public function genera(Request $request){

        $numeroRegistro = $request->input('carnet');
        $datos = EstudiaOld::find($numeroRegistro);

        if(!$datos){
            return Redirect::back()->withErrors(['msg' => 'El carnet ingresado no existe.']);
        }

        $cui = $datos->cui;
        $tipoConsulta = 1;
        $resultado = $this->consultaMineduc($cui,$tipoConsulta)['data']; 

        $nov = $datos->cod_orien;
        $nacionalidad_id = $datos->cod_nac;
        $nombreCompleto = $datos->getNombreCompleto();
        $fechaNacimiento = $datos->getFechaNacimiento();

        $carrera = $this->getFirstCarrera($numeroRegistro);

        if(!$carrera){
            return Redirect::back()->withErrors(['msg' => 'El carnet ingresado no tiene ninguna carrera.']);
        }

        foreach($carrera as $carr){
            $idFacultad = $carr->idFacultad;
            $idExtension = $carr->idExtension;
            $idCarrera = $carr->idCarrera;
            $nivel = $carr->nivel;
            $ciclo = Carbon::createFromFormat('Y-m-d', $carr->Entrada)->format('Y');
        }

        $carrera = json_encode($idFacultad);

        $tipoIngreso = $this->getIngreso($nov);

        $ultimaInscripcion = BitacoraInscripcion::Select(DB::raw('ciclo, fecha_inscripcion'))
                                                         ->WHERE([
                                                             ['carnet', '=', $numeroRegistro],
                                                             ['cod_ua', '=', $idFacultad], 
                                                             ['cod_ext', '=', $idExtension], 
                                                             ['cod_car', '=', $idCarrera]
                                                         ])->orderBy('fecha_inscripcion', 'desc')->get()->take(1);

        if($ultimaInscripcion->isEmpty()){
            return Redirect::back()->withErrors(['msg' => 'EL carnet ingresado no tiene ninguna inscripcion']);
        }

        $validacion = $this->consultarPruebaEspecifica(
                $nov,
                $cui,
                $idFacultad,
                $idExtension,
                $idCarrera,
                $ciclo
        );

        if (is_string($validacion)){
            $pruebasEspecificas =  "Error de comunicación"; //Mensaje de error de comunicaciÃ³n con ws
        }else{
            if ($validacion){
                $pruebasEspecificas =  "Satisfactoria"; //Mensaje de exito
                $pe = "S";
                Log::info("esto viene de pe: ". $pe );
            }else{
                $pruebasEspecificas =  "Insatisfactoria"; //Mensaje de prueba insatisfactoria
                $pe = "N";
                Log::info("esto viene de pe: ". $pe );
            }
        }

        $pruebasBasicas = Pcb::Select(DB::raw('nov, id_prueba, oportunidad, resultado, f_aprobado, descripcion, usuario, fec_carga, ciclo, usuario_actualiza, fec_actualiza'))
        ->WHERE([
            ['nov', '=', $nov]
        ])->get();

        $pb = (!empty($pruebasBasicas))? 'S':'N';

        $uid = uniqid(time(), true);
        $carnetmd5=md5("rye2016".$numeroRegistro."usac");

        $datosMineduc = $resultado;

        $certiNacimiento = md5("rye2016".$nov."usac");

        $certiNacimiento = 'https://registro.usac.edu.gt/images/Carne/certificados/nov_'.$certiNacimiento;

        $url = $certiNacimiento;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpcode == 302){
            $certiNacimiento = NULL;
            log::info('ENTRE A HHTP CODE');
            log::info('get status: '.$certiNacimiento);
        }

        $carnetmd5 = 'https://registro.usac.edu.gt/images/Carne/'.$carnetmd5.'?'.$uid.'.jpg';

        $urll = $carnetmd5;
        $chh = curl_init($urll);
        curl_setopt($chh, CURLOPT_HEADER, true);
        curl_setopt($chh, CURLOPT_NOBODY, true);
        curl_setopt($chh, CURLOPT_POST, 1);
        curl_setopt($chh, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($chh, CURLOPT_TIMEOUT,10);
        $outputt = curl_exec($chh);
        $httpcodex = curl_getinfo($chh, CURLINFO_HTTP_CODE);
        curl_close($chh);

        if($httpcodex == 302){
            $carnetmd5 = NULL;
        }

        return view('administrativo.archivo.ArchivoConsulta', compact('datosMineduc', 'cui', 'nombreCompleto', 'fechaNacimiento', 'numeroRegistro', 'carnetmd5', 'uid', 'pruebasEspecificas', 'pruebasBasicas', 'pb', 'pe', 'certiNacimiento', 'nivel', 'nacionalidad_id', 'ultimaInscripcion', 'tipoIngreso'));
    }

    public function generaData(Request $request){
        
        $registro_academico = $request["carne"];
        $nombres = $request["nombre"];
        $apellidos = $request["apellido"];
        $cui = $request["cui"];
        $nivel = $request["nivel"]; 
        $nacionalidad_id = $request["nacionalidad_id"];

        log::info('registro: ' . $registro_academico. ' nombres: ' . $nombres . ' apellidos: '. $apellidos . ' cui: ' . $cui . ' nivel: '.$nivel.' nacionalidad_id: '.$nacionalidad_id);

        if($nivel == 1 OR $nivel == 2){
            $tipo_expediente = 1;
        }else{
            $tipo_expediente = 2;
        }

        $inscripcion_estudiante = BitacoraInscripcion::where('carnet', $registro_academico)
        ->orderBy('fecha_inscripcion', 'desc')
        ->select('ciclo', 'fecha_inscripcion')
        ->first();

        $ultimo_ciclo_inscrito = $inscripcion_estudiante->ciclo; 
        $ultima_fecha_inscrito = Carbon::parse($inscripcion_estudiante->fecha_inscripcion)->format('Y/m/d');

        $nombre_completo = $nombres .' '.$apellidos;

        $token = $this->obtenerToken();

        $datos = $this->setArchivosExpediente($registro_academico,
        $nombre_completo,
        $cui,
        $tipo_expediente,
        $nacionalidad_id,
        $ultimo_ciclo_inscrito,
        $ultima_fecha_inscrito,
        $token);

        Log::info("pasa obtenerDataTransaccion...." . "json response: " . json_encode($datos));

        return json_encode($datos);
    }
    
     //todo revisar con santi el funcionamiento de esto para los mensajes de error o prueba insatisfactoria
    public function consultarPruebaEspecifica(int $nov, string $cui, int $unidadAcademica, int $extension, int $carrera, int $ciclo){
        //$ciclo = CicloActivo::first();
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
                        "<CICLO>$ciclo</CICLO>".
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
                    
                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
                }catch(Exception $x){
                    return Redirect::back()->withErrors(['msg' => 'error de comunicación con '. Facultad::find($unidadAcademica)->nomfac]); //Error de comunicaciÃ³n
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
                        "<CICLO>$ciclo</CICLO>".
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

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
                }catch(Exception $x){
                    return Redirect::back()->withErrors(['msg' => 'Error de comunicación con -'. Facultad::find($unidadAcademica)->nomfac]);
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
                        "<CICLO>$ciclo</CICLO>".
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

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
                }catch(Exception $x){
                    return Redirect::back()->withErrors(['msg' => 'Error de comunicacion con '. Facultad::find($unidadAcademica)->nomfac]); //Error de comunicaciÃ³n
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
                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
                }else{
                    return Redirect::back()->withErrors(['msg' => 'Error de comunicación con ' . Facultad::find($unidadAcademica)->nomfac]); //Error de comunicaciÃ³n
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
                        "<CICLO>$ciclo</CICLO>".
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

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
                }catch(Exception $x){
                    return Redirect::back()->withErrors(['msg' => 'Error de comunicación con '. Facultad::find($unidadAcademica)->nomfac]); //Error de comunicaciÃ³n
                }

            case 14: // Historia
                $pruebas = PruebaEspecifica::where([
                ['nov', '=', $nov],
                ['ua', '=', $unidadAcademica]
                ])->first();

                if ($pruebas && $pruebas->resultado=='Satisfactorio')
                    return true;
                   
                return 'No tiene Pruebas específicas para  '
                    . Facultad::find($unidadAcademica)->nomfac
                    . ", si ya aprobo espere a qué la unidad académica cargue los datos";
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
                        "<CICLO>$ciclo</CICLO>".
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

                    return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
        
                }catch(Exception $x){
                    return Redirect::back()->withErrors(['msg' => 'Error de comunicación con '. Facultad::find($unidadAcademica)->nomfac]); //Error de comunicaciÃ³n
                }
                
        }
        return $this->dbPruebaEspecifica($nov, $unidadAcademica, $extension, $carrera, $ciclo);
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

        if($prueba && $prueba->resultado == 'Satisfactorio'){
            return true;
        }else{
    
            return false;
        }
    }

    public function getFirstCarrera($carnet){
        $carreras = DB::select( DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
            ce.fecha_entrada as Entrada
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
                AND ct.codigo_nivel IN (1,2) order by fecha_entrada LIMIT 1;'
        )); //Consulta carreras

        return $carreras;
    }

    public function obtenerToken()
    {

        $data = http_build_query(array(
            "username" => config('apiArchivos.usuario'),
            "password" => config('apiArchivos.password')
        ));

        $opts = array('http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config('apiArchivos.ip').'/token', false, $context);
        $json = json_decode($result, true);
        error_log('resultado' . $json['access_token']);

        return $json['access_token'];
    }

    public function setArchivosExpediente(
        $registro_academico,
        $nombres,
        $cui,
        $tipo_expediente,
        $nacionalidad,
        $ultimo_ciclo_inscrito,
        $ultima_fecha_inscrito,
        $token
    ) {

        $registro_academico = intval($registro_academico);
        $cui = intval($cui);
        $tipo_expediente = intval($tipo_expediente);
        $nacionalidad = intval($nacionalidad);
        $ultimo_ciclo_inscrito = intval($ultimo_ciclo_inscrito);

        $postdata =
            array(
                "carne" => $registro_academico,
                "dpi" => $cui,
                "tipo_expediente_id" => $tipo_expediente,
                "nacionalidad_id" => $nacionalidad,
                "nombre" => "" . $nombres . "",
                "direccion" => "",
                "nacionalidad_des" => "",
                "ultimo_ciclo_inscrito" => $ultimo_ciclo_inscrito,
                "ultima_fecha_inscrito" => "" . $ultima_fecha_inscrito . ""
            );


        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'POST',
            'header' => $header,
            'content' => json_encode($postdata),
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config('apiArchivos.ip').'/setArchivo', false, $context);
        if ($result === FALSE) {
            die('Error');
        }
        $json = json_decode($result, true);

        return $json;
    } 

    public function getIngreso(
        $nov
    ) {

        $data = DB::select( DB::raw(
            'SELECT 
            CASE 
                WHEN usuario LIKE "pingenlinea%" THEN 1
                ELSE 2
            END AS tipo
        FROM carnet_nvo 
        WHERE nov ='. $nov
        ));

        foreach($data as $datos){
            $tipo = $datos->tipo;
        }

        return $tipo;
    }

}