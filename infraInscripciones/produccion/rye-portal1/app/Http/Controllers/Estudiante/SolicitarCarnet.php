<?php

namespace App\Http\Controllers\Estudiante;

use App\Funciones\Boletas;
use App\Models\CarnetBoleta;
use App\Models\CicloActivo;
use App\Models\Extension;
use App\Models\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PDF;
use \DateTime;
use App\Models\EstudiaOld;
use App\Http\Controllers\Estudiante\Reinscripcion;
use Intervention\Image\ImageManagerStatic as Image;
include_once app_path('/Funciones/Reinscripcion/validarCertificado.php');



class SolicitarCarnet extends Controller
{

    /*
        Validaciones para la Generacion del carnet del ESTUDIANTE
    */
    public function PerfilgeneraCarnet(){

        $ciclo = CicloActivo::first();
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $cert_pendiente = validarCertificado($carnet);

        if ($ciclo->ciclo_activo != $ciclo->ciclo_web){
            
            return view('portalEstudiantil.pages.generaCarnet.DeshabilitadoCarnet',
                compact('cert_pendiente'));
        }

        $carreras = Reinscripcion::getCarreras($carnet);
        $carnetmd5 = md5("rye2016".Auth::guard('estudiante')->user()->carnet."usac");


        $conexion = $this->conexionSSH();
        //Si hay Error de conexion, mostramos un SinFoto
        if(is_string($conexion)) $carnetmd5 = "SinFoto";
        else{
            $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';
            $res = file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnetmd5 . '.jpg' );
            if(!$res) $carnetmd5 = "SinFoto";
        }



        return view('portalEstudiantil.pages.generaCarnet.PerfilGeneraCarnet',
                    compact('ciclo', 'carreras','carnetmd5', 'cert_pendiente'));
    }


    public function ValidaciongeneraCarnet(){
        $carnet=Auth::guard('estudiante')->user()->carnet;
        $carnetmd5 = md5("rye2016".$carnet."usac");
        $cert_pendiente = validarCertificado($carnet);
        $existeFoto = true;
        $conexion = $this->conexionSSH();
        //Hay un error en la comunicacion con el servidor de fotos
        if(is_string($conexion)) $existeFoto = false;
        else{
            $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';
            $res = file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnetmd5 . '.jpg' );
            $existeFoto = $res;
        }

        $ciclo = CicloActivo::first();
        $carreras = Reinscripcion::getCarreras($carnet);
        $nombreEstudiante = Auth::guard('estudiante')->user()->getNombreCompleto();
        $cui = Auth::guard('estudiante')->user()->cui;
        $pasaporte = Auth::guard('estudiante')->user()->numero_pasaporte;
        $nacionalidad = Auth::guard('estudiante')->user()->cod_nac;
        $problemaCarrera = true;
        foreach( $carreras as $carrera ){
            if($carrera->inscrito == 1 && ($carrera->situacionAcademica < 3) ) $problemaCarrera = false;
        }


        return view('portalEstudiantil.pages.generaCarnet.ValidacionGeneraCarnet',
                    compact('ciclo', 'carreras','carnet','nombreEstudiante','cui','existeFoto','problemaCarrera', 'pasaporte', 'nacionalidad', 'cert_pendiente'));
    }


    public function BoletaGeneraCarnet(){
        $ciclo = CicloActivo::first();
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $nacionalidad = Auth::guard('estudiante')->user()->cod_nac;
        $cert_pendiente = validarCertificado($carnet); //validando inscripcion
        $carreras = Reinscripcion::getCarreras($carnet);
        $cui = Auth::guard('estudiante')->user()->cui;
        $nombreEstudiante = Auth::guard('estudiante')->user()->getNombreCompleto();
        $acceso_estado = 1;
        $ciclo_actual = date("Y");
        $fecha_minima = $ciclo_actual.'-00-00';

        // Se valida si debe pagar emision o reimpresion
        $bitInsc = CarnetBoleta::where([
            ['carnet', '=', $carnet],
            ['estado', '>', 0],
            ['fecha_entrega', '>', date($fecha_minima)]
        ])->get()->count();

        if( $bitInsc == 0 ){
            // Si el estudiante NO ha generado una boleta para generar su carnet EN EL PRESENTE CICLO

            $variante = 1; // Cobro de Q5.00
            $result = $this->CreandoyGuardandoBoletaDB($variante, $carnet, $cui, $nombreEstudiante, $carreras, $ciclo, $nacionalidad);
            $idOrdenPago = $result['idOrdenPago'];
            $fechaGeneracion = $result['fechaGeneracion'];
            $title = $result['title'];
            $boleta = $result['boleta'];
            $facultad = $result['facultad'];
            $extension = $result['extension'];
            $carrera = $result['carrera'];
            $error = $result['error'];
            $cicloactivo = $result['cicloactivo'];
            $rubroPago = $result['rubroPago'];
            $fechaVencimiento = $result['fechaVencimiento'];
            $monto = $result['monto'];
            $checksum = $result['checksum'];
            $ua = $result['ua'];
            $ext = $result['ext'];
            $idCarrera = $result['idCarrera'];

            return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                        compact('carnet', 'nombreEstudiante', 'idOrdenPago', 'fechaGeneracion',
                                'title', 'boleta', 'facultad', 'extension','carrera',
                                'error', 'cicloactivo', 'rubroPago', 'fechaVencimiento',
                                'monto', 'checksum', 'ua', 'ext', 'idCarrera', 'acceso_estado', 'cert_pendiente'));
        }
        else{
            // Aqui entra cuando el estudiante ya ha generado 1 boleta EN EL PRESENTE CICLO, se cobra reimpresion

            $boleta_es_valida = false;
            $boletaValida = CarnetBoleta::where([
                ['carnet', '=', $carnet],
                ['estado', '=', 1],
                ['fecha_entrega', '>', date($fecha_minima)]
            ])->first();
            if($boletaValida != null){
                $fecha_boleta = strtotime($boletaValida->fecha_entrega);
                $fechaGeneracion = strtotime(date("Y-m-d",time()));
                if($fecha_boleta >= $fechaGeneracion)
                    $boleta_es_valida = true;
            }

            if( $boleta_es_valida == true && $boletaValida->estado == 1 ){
                // El estudiante tiene una boleta ACTIVA, se verifica con siif si ya la pago

                $result = $this->ValidarBoletaSiif($boletaValida->id_orden_pago, $carnet);
                $error = 0; // sin error

                if(is_string($result)){
                    $mensaje = $result;
                    $error = 1;
                    error_log($mensaje);

                    return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                            compact('ciclo', 'carreras','mensaje','error', 'acceso_estado', 'cert_pendiente'));
                }

                else if( $result['cancelada'] == false ){
                    // Se verifico la boleta, pero el estudiante aun NO ha pagado

                    $idOrdenPago = $boletaValida->id_orden_pago;
                    $fechaGeneracion = new DateTime($boletaValida->fechaGeneracion);
                    $boleta = $boletaValida->boleta;
                    $rubroPago = $boletaValida->rubro_pago;
                    $fechaVencimiento = ($boletaValida->fecha_entrega);
                    $monto = $boletaValida->monto;
                    $checksum = $boletaValida->cheksum;
                    $ua = 00;
                    $ext = 00;
                    $idCarrera = 00;
                    $facultad = 00;
                    $extension = 00;
                    $carrera = 00;
                    $cicloactivo = 2021;
                    $title= "Generación de Carné - Impresión de Boleta";


                    return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                        compact('carnet', 'nombreEstudiante', 'idOrdenPago', 'fechaGeneracion',
                                'title', 'boleta', 'facultad', 'extension','carrera',
                                'error', 'cicloactivo', 'rubroPago', 'fechaVencimiento',
                                'monto', 'checksum', 'ua', 'ext', 'idCarrera', 'acceso_estado', 'cert_pendiente'));

                }
                else{
                    // Se verifico la boleta y  el estudia SI ha pagado
                    $boletaPagada = CarnetBoleta::where([
                        ['id_orden_pago', '=', $boletaValida->id_orden_pago]
                    ])->first();
                        $boletaPagada->banco = $result['banco'];
                        $boletaPagada->no_boleta_deposito = $result['noBoletaDeposito'];
                        $boletaPagada->no_transferencia_bancaria = $result['noTransferenciaBancaria'];
                        $boletaPagada->fecha_certificado_banco = strtotime($result['fechaCertificadoBanco']);
                        $boletaPagada->estado = $result['estado'];
                        $boletaPagada->save();

                    $mensaje="Generación de Carné, Debe presentarse al Departamento de Registro y Estadística en ventanilla de carnet, para recoger su carné en PVC.";
                    $acceso_estado = 2;
                    $error = false;
                    $verificacion_boleta = false;
                    if ($verificacion_boleta == false)
                        $verificacion_boleta = $this-> VerificarEstadoBoletasDB(2, $carnet);

                    return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                            compact('ciclo', 'carreras','mensaje','error', 'acceso_estado', 'cert_pendiente'));

                }
            }
            else if($boletaValida == null){
                // El estudiante ya pago la boleta, se le indica que debe realizar su cita (esto por pandemia)
                /* el estado mayor a 3 es carne generado, 4 firmado,5 impreso y 6 entregado*/

                $verificacion_boleta = false;

                if ($verificacion_boleta == false)
                    $verificacion_boleta = $this-> VerificarEstadoBoletasDB(2, $carnet);
                if ($verificacion_boleta == false){
                    // Se considera que la boleta se encuentra en estado 3 o 0, se crea una nueva (tiene minimo 1 boleta)
                    $variante=2;
                    $result = $this->CreandoyGuardandoBoletaDB($variante, $carnet, $cui, $nombreEstudiante, $carreras, $ciclo, $nacionalidad);
                    $idOrdenPago = $result['idOrdenPago'];
                    $fechaGeneracion = $result['fechaGeneracion'];
                    $title =  $result['title'];
                    $boleta = $result['boleta'];
                    $facultad = $result['facultad'];
                    $extension = $result['extension'];
                    $carrera = $result['carrera'];
                    $error = $result['error'];
                    $cicloactivo = $result['cicloactivo'];
                    $rubroPago = $result['rubroPago'];
                    $fechaVencimiento = $result['fechaVencimiento'];
                    $monto = $result['monto'];
                    $checksum = $result['checksum'];
                    $ua = $result['ua'];
                    $ext = $result['ext'];
                    $idCarrera = $result['idCarrera'];
                    $acceso_estado = 1;

                    return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                                compact('carnet', 'nombreEstudiante', 'idOrdenPago', 'fechaGeneracion',
                                        'title', 'boleta', 'facultad', 'extension','carrera',
                                        'error', 'cicloactivo', 'rubroPago', 'fechaVencimiento',
                                        'monto', 'checksum', 'ua', 'ext', 'idCarrera', 'acceso_estado', 'cert_pendiente'));
                }

                $acceso_estado = $verificacion_boleta['acceso_estado'];
                $mensaje = $verificacion_boleta['mensaje'];
                $error = $verificacion_boleta['error'];
                $title = $verificacion_boleta['title'];

                return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                compact('ciclo', 'carreras','mensaje','acceso_estado', 'error','title', 'cert_pendiente'));

            }
            else{
                // El estudiante no tiene boleta ACTIVA, se debe generar una nueva

                $title="Generación de Carné, Debe presentarse al Departamento de Registro y Estadística en ventanilla de carnet, para recoger su carné en PVC.";
                $boletaVencida = CarnetBoleta::where([
                    ['id_orden_pago', '=', $boletaValida->id_orden_pago]
                ])->first();

                if($boletaVencida->estado == 1){
                    $boletaVencida->estado = 0;
                    $boletaVencida->save();
                }
                
                // se valida si el monto vencido es 5 para cobrar nuevamente la emisión de primer carnet
                $variante=2;
                if ($boletaVencida->monto == 5){
                    $variante=1;
                }
                
                $result = $this->CreandoyGuardandoBoletaDB($variante, $carnet, $cui, $nombreEstudiante, $carreras, $ciclo, $nacionalidad);
                $idOrdenPago = $result['idOrdenPago'];
                $fechaGeneracion = $result['fechaGeneracion'];
                $title = $result['title'];
                $boleta = $result['boleta'];
                $facultad = $result['facultad'];
                $extension = $result['extension'];
                $carrera = $result['carrera'];
                $error = $result['error'];
                $cicloactivo = $result['cicloactivo'];
                $rubroPago = $result['rubroPago'];
                $fechaVencimiento = $result['fechaVencimiento'];
                $monto = $result['monto'];
                $checksum = $result['checksum'];
                $ua = $result['ua'];
                $ext = $result['ext'];
                $idCarrera = $result['idCarrera'];
                $acceso_estado = 1;

                return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                            compact('carnet', 'nombreEstudiante', 'idOrdenPago', 'fechaGeneracion',
                                    'title', 'boleta', 'facultad', 'extension','carrera',
                                    'error', 'cicloactivo', 'rubroPago', 'fechaVencimiento',
                                    'monto', 'checksum', 'ua', 'ext', 'idCarrera', 'acceso_estado', 'cert_pendiente'));
            }


        }


    }

    function VerificarEstadoBoletasDB($estado, $carnet){
        $boleta_es_valida = false;
        $ciclo_actual = date("Y");
        $fecha_minima = $ciclo_actual.'-00-00';
        $boletaValida = CarnetBoleta::where([
            ['carnet', '=', $carnet],
            ['estado', '=', $estado],
            ['fecha_entrega', '>', date($fecha_minima)]
        ])->get()->count();
        if($boletaValida != 0){
            $boleta_es_valida = true;
        }

        if($boleta_es_valida){
            // El estudiante espera que pase al estado 6
            $acceso_estado = $estado;
            $mensaje = "El pago ha sido validado. Debe presentarse al Departamento de Registro y Estadística en ventanilla de carnet, para recoger su carné en PVC";
            $error = 0;
            $title="Generación de Carné - Impresión de Boleta " ;

            $result['acceso_estado'] = $estado;
            $result['mensaje'] = $mensaje;
            $result['error'] = $error;
            $result['title'] = $title;

            return $result ;
        }
        else{
            return false;
        }
    }

    function CreandoyGuardandoBoletaDB($variante, $carnet, $cui, $nombreEstudiante, $carreras, $ciclo, $nacionalidad){
        $boleta = Boletas::crearBoleta($carnet,00,00,00,$nombreEstudiante,($variante == 1) ? 5 : 15,90,$variante, $nacionalidad);

        if(is_string($boleta)){
            $mensaje = $boleta;
            $error = 1;
            error_log($mensaje);

            return view('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnet',
                    compact('ciclo', 'carreras','mensaje','error'));
        }
        else{
            $facultad = 00;
            $extension = 00;
            $carrera = 00;
            $idOrdenPago = $boleta['idOrdenPago'];
            $rubroPago = $boleta['rubroPago'];
            $monto = $boleta['monto'];
            $checksum = $boleta['checksum'];
            $cicloactivo = CicloActivo::first()->ciclo_web_pregrado;
            $ua = 00;
            $ext = 00;
            $idCarrera = 00;
            $error = 0;
            $fechaGeneracion = new DateTime($boleta['fechaGeneracion']);
            $fechaVencimiento = new DateTime($boleta['fechaVencimiento']);
            $title="Generación de Carné - Impresión de Boleta";


            // Variables necesarias para agregar tupla a la base de datos
            $banco = $boleta['banco'];
            $no_boleta_deposito = $boleta['noBoletaDeposito'];
            $no_transferencia_bancaria = $boleta['noTransferenciaBancaria'];
            $estado = 1;

            if( $banco != null)
                $estado = 2;

            // Creando y guardando info de boleta en la base de datos
            $carnetboletaDB = new CarnetBoleta();
            $carnetboletaDB->id_orden_pago = $idOrdenPago;
            $carnetboletaDB->carnet = $carnet;
            $carnetboletaDB->monto = $monto;
            $carnetboletaDB->cheksum = $checksum;
            $carnetboletaDB->rubro_pago = $rubroPago;
            $carnetboletaDB->banco = $banco;
            $carnetboletaDB->no_boleta_deposito = $no_boleta_deposito;
            $carnetboletaDB->no_transferencia_bancaria = $no_transferencia_bancaria;
            $carnetboletaDB->fecha_certificado_banco = $fechaGeneracion;
            $carnetboletaDB->fecha_generacion = $fechaGeneracion;
            $carnetboletaDB->estado = $estado;
            $carnetboletaDB->fecha_entrega = $fechaVencimiento;
            $carnetboletaDB->save();

            $array_boleta ['idOrdenPago'] = $idOrdenPago;
            $array_boleta ['fechaGeneracion'] = $fechaGeneracion;
            $array_boleta ['title'] = $title;
            $array_boleta ['boleta'] = $boleta;
            $array_boleta ['facultad'] = $facultad;
            $array_boleta ['extension'] = $extension;
            $array_boleta ['carrera'] = $carrera;
            $array_boleta ['error'] = $error;
            $array_boleta ['cicloactivo'] = $cicloactivo;
            $array_boleta ['rubroPago'] = $rubroPago;
            $array_boleta ['fechaVencimiento'] = $fechaVencimiento;
            $array_boleta ['monto'] = $monto;
            $array_boleta ['checksum'] = $checksum;
            $array_boleta ['ua'] = $facultad;
            $array_boleta ['ext'] = $extension;
            $array_boleta ['idCarrera'] = $carrera;
            return $array_boleta;
        }
    }
    function ValidarBoletaSiif($idOrdenPago, $carnet){
        $boleta = Boletas::validarBoleta($idOrdenPago, $carnet);
        return $boleta;
    }



    public function updateFotoCarnet(Request $request){
        $file = $request->file('foto');
        $file_tmp= $_FILES['foto']['tmp_name'];
        $file_content = file_get_contents( $file_tmp );

        $bytes = base64_encode($file_content);
        $data = array("image" => $bytes);
        /* TODO descomentar el bloque para volver a validar imagenes
        $url = "https://oy4vrliee0.execute-api.us-east-2.amazonaws.com/prod";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        if(!$response) return response()->json(['statusCode' => 400, 'body' => "Error al analizar la fotografia. Recuerda que las dimensiones de la fotografía no deben superarse de 900x900 px"]);
        if(!str_contains($response,'"statusCode":200')) return response()->json(['statusCode' => 400, 'body' => "Error al analizar la fotografia. Recuerda que las dimensiones de la fotografía no deben superarse de 900x900 px."]);
        $body = json_decode($response);
        $selfie = $this->getLabels($body->body,"Selfie",65);
        if($selfie) return response()->json(['statusCode' => 400, 'body' => "No se permiten Selfies"]);
        $person = $this->getLabels($body->body,"Person",90);
        if(!$person) return response()->json(['statusCode' => 400, 'body' => "La fotografia tiene que ser de una persona"]);
        $face =  $this->getLabels($body->body,"Face",70);
        if(!$face) return response()->json(['statusCode' => 400, 'body' => "El rostro tiene que estar descubierto (sin mascarilla)"]);
        */


        $conexion = $this->conexionSSH();
        $carnetmd5 = md5("rye2016".Auth::guard('estudiante')->user()->carnet."usac");
        //Conexion SSH
        if(is_string($conexion)) return response()->json(['statusCode' => 400, 'body' => "Error al subir la imagen"]);

        //Guardar la nueva foto
        $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';

        $res = file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnetmd5 . '.jpg' );
        //Verificar si hay fotos previas
        if($res){
            $intento = 1;
            while(file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnetmd5 . '_' . $intento . '.jpg' )){
                $intento++;
            }

            rename('ssh2.sftp://'. $stfp . $conexion["path"]. $carnetmd5 . '.jpg','ssh2.sftp://'. $stfp . $conexion["path"] . $carnetmd5 .  '_' . $intento . '.jpg');
        }
        //Guardar la nueva foto
        $res = ssh2_scp_send($conexion["conexion"],$_FILES['foto']['tmp_name'],$conexion["path"]. $carnetmd5 . '.jpg',0644);

        ssh2_disconnect($conexion["conexion"]);

        return response()->json(['statusCode' => 200, 'body' => "Actualizacion Exitosa"]);

    }

    /**
     * Intenta crear una conexion remota
     * mediante ssh con el servidor de
     * fotografias
     */
    public static function conexionSSH(){
        $ip = config('remoto.ip');
        $path = config('remoto.path');
        $pathBoleta = config('remoto.pathBoleta');
        $usuario = config('remoto.usuario');
        $password = config('remoto.password');
        $sshConnection = ssh2_connect($ip, 22);

        if(is_null($sshConnection)) return "No es posible conectarse al servidor remoto";
        $could_auth = ssh2_auth_password($sshConnection,$usuario,$password);

        if(!$could_auth) return "Error de Autentificacion";

        $conexion = [
            "conexion" => $sshConnection,
            "usuario" => $usuario,
            "password" => $password,
            "ip" => $ip,
            "path" => $path,
            "pathBoleta" => $pathBoleta
        ];

        return $conexion;

    }

    /**
     * Analiza todas las labels y
     * busca una especifica con
     * una confidence especifica
     */
    public static function getLabels($body,$search,$confidence){
        $labels = json_decode($body);
        foreach($labels as $label){
            if($label->Name === $search){
                if($label->Confidence >= $confidence) return true;
            }
        }

        return false;

    }


    public static function BoletaGeneraCarnetPDF(Request $request){
        $nombre = Auth::guard('estudiante')->user()->getNombreCompleto();
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $idOrdenPago = $request->input("idOrdenPago");
        $boleta = CarnetBoleta::find($idOrdenPago);
        $monto = $boleta->monto;
        $fechaGeneracion = $boleta->fecha_generacion;
        $ua = 00;
        $ext = 00;
        $facultad = 00;
        $extension = 00;
        $idCarrera = $boleta->car;
        $carrera = $request->input("carrera");
        $rubroPago = $boleta->rubro_pago;
        $checksum = $boleta->cheksum;
        $fechaVencimiento = $boleta->fecha_entrega;
        $cicloactivo = $request->input("cicloactivo");

        $css = '/var/www/html/rye-portal/public/css/boletaPDF.css';

        $pdf = PDF::loadView('portalEstudiantil.pages.generaCarnet.BoletaGeneraCarnetPDF', compact("nombre", "carnet", "fechaGeneracion", "idOrdenPago",
            "monto", "ua", "facultad", "ext", "extension", "idCarrera", "carrera", "rubroPago", "checksum", "fechaVencimiento", "cicloactivo", "css"));

        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('boleta.pdf');

    }


    /**
     * Controlador para la vista
     * que muestra la validacion
     * de datos
     */
    public function DatosEstudiante(Request $request){
        $error = false;
        $cert_pendiente = 0;
        if(!Input::get('rac')){
            $error = true;
            return view('portalEstudiantil.pages.generaCarnet.DatosEstudiante',
                    compact('error', $cert_pendiente));
        }
        $carnetmd5 = Input::get('rac');
        $uid = uniqid(time(), true);
        $ciclo_actual = date("Y");
        $fecha_minima = $ciclo_actual.'-00-00';

        $ciclo = CicloActivo::first()->ciclo_web_pregrado;
        $estudiante = EstudiaOld::where(DB::raw('MD5(CONCAT("rye2016",carnet,"usac"))') , $carnetmd5)->first();
        if($estudiante == null){
            $error = true;
            return view('portalEstudiantil.pages.generaCarnet.DatosEstudiante',
                    compact('error', $cert_pendiente));
        }
        $nombreEstudiante = $estudiante->getNombreCompleto();
        $carnet = $estudiante->carnet;
        $cert_pendiente = validarCertificado($carnet);
        $carreras = $this->getCarreras($carnet);
        $cui = $estudiante->getCui();

        $boleta = CarnetBoleta::where([
            ['carnet', '=', $carnet],
            ['estado', '=',3],
            ['fecha_entrega', '>', date($fecha_minima)]
        ])
        ->orWhere([
            ['carnet', '=', $carnet],
            ['estado', '=', 6],
            ['fecha_entrega', '>', date($fecha_minima)]
        ])->get()->count();

        $existeCarnet = ($boleta > 0) ? 1 : 0; //Si ya tiene un carnet generado en el presente ciclo

        $this->getMensajes($carreras);
        return view('portalEstudiantil.pages.generaCarnet.DatosEstudiante',
                    compact('carnetmd5','uid','nombreEstudiante','cui','carnet','ciclo','carreras','existeCarnet','error', 'cert_pendiente'));
    }


     /**
    * valida el estado actual de cada una de las carreras y les coloca un
    * mensaje si tiene algún problema con la carrera
    */
    public static function getMensajes($carreras){
        foreach( $carreras as $carrera ) {
            $carrera->msj = array();
            if($carrera->estado == "0"){
                $carrera->msj[] = "Carrera Inactiva debe presentarse al Departamento de Registro y Estadística";
            }
            if($carrera->habilitado == "0"){
                if($carrera->situacionAcademica == "2")
                    $carrera->msj[] = "Estudiante no regular";
                else
                    $carrera->msj[] = "Carrera deshabilitada, reactivar permisos en Registro y Estadística";
            }

            if($carrera->situacionAcademica != "0" && $carrera->situacionAcademica != "2"){
                $carrera->msj[] = "Estudiante no regular";
            }else if( $carrera->situacionAcademica == "2"){
                $carrera->msj[] = "Pendiente de examenes generales";
            }

            if($carrera->inscrito == "1" && $carrera->situacionAcademica == "0"){
                $carrera->msj[] = "Estudiante regular";
            }

            if($carrera->sancion == 1){
                $carrera->msj[] = $carrera->msgSancion;
            }

        }
    }


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
        (SELECT COUNT(*) FROM bitacora_inscripcion bi
            WHERE bi.carnet = r.carnet
            AND bi.ciclo = r.cicloWeb
            AND bi.cod_ua = r.idFacultad
            AND bi.cod_ext = r.idExtension
            AND bi.cod_car = r.idCarrera
            AND bi.cancelar_matricula = 0) as inscrito,
        (SELECT bi.fecha_inscripcion  FROM bitacora_inscripcion bi
            WHERE bi.carnet = r.carnet
            AND bi.ciclo = r.cicloWeb
            AND bi.cod_ua = r.idFacultad
            AND bi.cod_ext = r.idExtension
            AND bi.cod_car = r.idCarrera
            AND bi.cancelar_matricula = 0) as fecha_inscripcion,
        IFNULL(calendario.fecha_inicio,\'0000-00-00\') fechaInicio,
        IFNULL(calendario.fecha_fin,\'0000-00-00\') fechaFin,
        (   SELECT 1
            FROM sanciones, ciclo_activo
            WHERE sanciones.carnet = r.carnet
                AND sanciones.ua = r.idFacultad
                AND r.cicloWeb BETWEEN YEAR(sanciones.del) AND YEAR(sanciones.al)
                AND DATE(NOW()) <= sanciones.al
        ) sancion,
        (   SELECT CONCAT(\'Sancionado hasta el \',DATE_FORMAT(sanciones.al,\'%d/%m/%Y\'))
            FROM sanciones, ciclo_activo
            WHERE sanciones.carnet = r.carnet
                AND sanciones.ua = r.idFacultad
                AND r.cicloWeb BETWEEN YEAR(sanciones.del) AND YEAR(sanciones.al)
                AND DATE(NOW()) <= sanciones.al
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
        FROM (
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
                (CASE WHEN carrera_temporal.codigo_nivel IN (1,2) THEN 2 ELSE 3 END) AS categoria
            FROM
                carrera_estudiante,
                ciclo_activo,
                carrera_temporal,
                facultad,
                extension
            WHERE
                carrera_estudiante.carnet = '. $carne .
                    ' AND carrera_estudiante.activo
                AND carrera_temporal.codigo_unidad_academica=carrera_estudiante.codfac
                AND carrera_temporal.codigo_extension = carrera_estudiante.codext
                AND carrera_temporal.codigo_carrera = carrera_estudiante.codcar
                AND  facultad.codfac = carrera_estudiante.codfac
                AND extension.codigo_unidad_academica = carrera_estudiante.codfac
                AND extension.codigo_extension = carrera_estudiante.codext
        ) r LEFT JOIN calendario
                ON calendario.ua = r.idFacultad
                AND calendario.ciclo = r.cicloWeb
                AND calendario.categoria = 2
                AND calendario.categoria = r.categoria
                AND calendario.oportunidad = r.oportunidad'
                ));

        return $carreras;
    }

}
