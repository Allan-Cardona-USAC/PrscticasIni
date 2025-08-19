<?php

namespace App\Http\Controllers\PortalAdministrativo;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\BitacoraCarnet;
use App\Funciones\Boletas;
use App\Models\CarnetBoleta;
use Carbon\Carbon;
use App\Models\CicloActivo;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\EstudiaOld;


use App\Models\BitacoraInscripcion;
use App\Models\CarreraEstudiante;
use App\Models\Facultad;
use App\Models\CarreraTemporal;
use App\Models\Extension;

use Exception;
use Maatwebsite\Excel\Facades\Excel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use \DateTime;



class ImprimirCarnet extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Se comienza la vista para el estado 1 de parte del administrativo
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }


    /**
     * Funcion para retornar la vista modificada de 'PendientePagoCarnetEstudiante' para el administrativo con estado 1, 2 y 3
     * Estado 1: para validar SIIF o ingresar boleta manualmente
     * Estado 2: imprimir carnet si esta en estado 2 
     * y eliminar la foto en cualquier estado
     */
    public function PendientePagoCarnetEstudiante(){
        $uid = uniqid(time(), true);
        $page = (is_numeric(Input::get('page'))) ? Input::get('page') : 1;
        $page = ($page <= 0) ? 1 : $page;
        $maxLength = (is_numeric(Input::get('length'))) ? Input::get('length') : 9;
        $start = ($page - 1) * $maxLength;
        $info = $this->getAllBoletas();
        $data = array_slice($info["data"],$start,$maxLength);
        $cantidad = $info["cantidad"];
        $pages = ceil($cantidad / $maxLength);
        $previus = (($page - 1 ) <= 0) ? 1 : ($page - 1 );
        $next = (($page + 1 ) > $pages) ? $page : ($page + 1 );

        return view('portalAdministrativo.ImprimirCarnetEstudiante.PendientePagoCarnetEstudiante',
                    compact('data','pages','page','previus','next','uid'));

    } 

    /**
     * Funcion para retornar la vista 'PendientePagoCarnetEstudiante' para el administrativo representando el estado 1, validar con SIIF o ingresar boleta manualmente
     */
    public function PendientePagoCarnetEstudianteold(){
        $uid = uniqid(time(), true);
        $page = (is_numeric(Input::get('page'))) ? Input::get('page') : 1;
        $page = ($page <= 0) ? 1 : $page;
        $maxLength = (is_numeric(Input::get('length'))) ? Input::get('length') : 9;
        $start = ($page - 1) * $maxLength;
        $info = $this->getBoletas(1);
        $data = array_slice($info["data"],$start,$maxLength);
        $cantidad = $info["cantidad"];
        $pages = ceil($cantidad / $maxLength);
        $previus = (($page - 1 ) <= 0) ? 1 : ($page - 1 );
        $next = (($page + 1 ) > $pages) ? $page : ($page + 1 );

        return view('portalAdministrativo.ImprimirCarnetEstudiante.PendientePagoCarnetEstudiante',
                    compact('data','pages','page','previus','next','uid'));

    }

    /**
     * Funcion para devolver las carreras en simultaneo que tienen los estudiantes
     */
    public function buscarCarrerasSimultaneo(Request $request){
        $carnet = $request["carnet"];
        $ciclo_actual = date("Y");

        $carreras = DB::table('bitacora_inscripcion as bi')
        ->select('bi.carnet', 'bi.cod_ua', 'bi.cod_ext', 'bi.cod_car', 'bi.ciclo', 'fa.nomfac as nomcorto', 'ct.nombre_carrera', DB::raw('LENGTH(ct.nombre_carrera) AS tamano'), 'ex.nombre AS extension', DB::raw('LENGTH(ex.nombre) AS tam_ext'))
        ->join('carrera_estudiante as ce', function ($join) {
            $join->on('bi.carnet', '=', 'ce.carnet')
                ->on('bi.cod_ua', '=', 'ce.codfac')
                ->on('bi.cod_ext', '=', 'ce.codext')
                ->on('bi.cod_car', '=', 'ce.codcar');
        })
        ->join('facultad as fa', 'bi.cod_ua', '=', 'fa.codfac')
        ->join('carrera_temporal as ct', function ($join) {
            $join->on('bi.cod_ua', '=', 'ct.codigo_unidad_academica')
                ->on('bi.cod_ext', '=', 'ct.codigo_extension')
                ->on('bi.cod_car', '=', 'ct.codigo_carrera');
        })
        ->join('extension as ex', function ($join) {
            $join->on('ct.codigo_unidad_academica', '=', 'ex.codigo_unidad_academica')
                ->on('ct.codigo_extension', '=', 'ex.codigo_extension');
        })
        ->where('bi.carnet', $carnet)
        ->where('bi.ciclo', $ciclo_actual)
        ->where('ce.activo', 1)
        ->where('bi.cancelar_matricula', '!=', 1)
        ->orderBy('bi.cod_ua', 'ASC')
        ->get();   

            

        $data = [];
        foreach($carreras as $carre){
            $data[] = [
                'carnet' => $carre->carnet,
                'cod_ua' => $carre->cod_ua,
                'cod_ext' => $carre->cod_ext,
                'cod_car' => $carre->cod_car,
                'ciclo' => $carre->ciclo,
                'nomcorto' => $carre->nomcorto,
                'nombre_carrera' => $carre->nombre_carrera,
                'tamano' => $carre->tamano,
                'extension' => $carre->extension,
                'tam_ext' => $carre->tam_ext
            ];
        }

        // $cantidad = count($data);
        return response()->json(['statusCode' => 200, 'body' => $data]);        
    }
    

    /**
     * Funcion para retornar la vista 'ImprimirCarnetEstudiante' para el administrativo representando el estado 2, eliminar foto/generar PDF
     */

    public function ImprimirCarnetEstudiante(){
        $uid = uniqid(time(), true);
        $page = (is_numeric(Input::get('page'))) ? Input::get('page') : 1;
        $page = ($page <= 0) ? 1 : $page;
        $maxLength = (is_numeric(Input::get('length'))) ? Input::get('length') : 9;
        $start = ($page - 1) * $maxLength;
        $info = $this->getBoletas(2);
        $data = array_slice($info["data"],$start,$maxLength);
        $cantidad = $info["cantidad"];
        $pages = ceil($cantidad / $maxLength);
        $previus = (($page - 1 ) <= 0) ? 1 : ($page - 1 );
        $next = (($page + 1 ) > $pages) ? $page : ($page + 1 );

        return view('portalAdministrativo.ImprimirCarnetEstudiante.ImprimirCarnetEstudiante',
                    compact('data','pages','page','previus','next','uid'));

    }


    /**
     * Funcion para retornar la vista 'CarnetsGenerados' para el administrativo representando el estado 3, estado de entregado (final)
     */
    public function CarnetsGenerados(){
        $uid = uniqid(time(), true);
        $page = (is_numeric(Input::get('page'))) ? Input::get('page') : 1;
        $page = ($page <= 0) ? 1 : $page;
        $maxLength = (is_numeric(Input::get('length'))) ? Input::get('length') : 9;
        $start = ($page - 1) * $maxLength;
        $info = $this->getBoletas(3);
        $data = array_slice($info["data"],$start,$maxLength);
        $cantidad = $info["cantidad"];
        $pages = ceil($cantidad / $maxLength);
        $previus = (($page - 1 ) <= 0) ? 1 : ($page - 1 );
        $next = (($page + 1 ) > $pages) ? $page : ($page + 1 );

        return view('portalAdministrativo.ImprimirCarnetEstudiante.CarnetsGenerados',
                    compact('data','pages','page','previus','next','uid'));
    }


    /*
    * Regresa un Arreglo con todas las boletas
    * del ciclo actual
    */
    public static function getAllBoletas(){
        $fecha_minima = date("Y-m-d");
        $fechaVencimiento = new DateTime($fecha_minima);
        $fechaVencimiento = $fechaVencimiento->modify('-1 day')->format('Y-m-d');
        $ciclo_actual = date("Y");
        $fechaVencimiento2 = $ciclo_actual.'-00-00';
        $boletasValidas = [];
        $cantidad = 0;

        $cantidad = CarnetBoleta::where([
            ['estado', '=', 2],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 4],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 5], //Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 1], //Estado 1
            ['fecha_entrega', '>', date($fechaVencimiento)]
        ])
        ->orWhere([
            ['estado', '=', 3], //Estado 3
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 6], //Estado 3
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orderBy('fecha_generacion', 'DESC')
        ->take(90)->get()->count();


        $boletasValidas = CarnetBoleta::where([
            ['estado', '=', 2],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 4],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 5],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 1],//Estado 1
            ['fecha_generacion', '>', date($fechaVencimiento)]
        ])
        ->orWhere([
            ['estado', '=', 3], //Estado 3
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['estado', '=', 6], //Estado 3
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orderBy('fecha_generacion', 'DESC')
        ->take(90)->get();



        $data = [];
        foreach($boletasValidas as $boleta){
            $estudia_old = EstudiaOld::find($boleta->carnet);
            
            $estado = $boleta->estado;
            if($estado == 2 || $estado == 4 || $estado == 5){
                $estado = 2;
            }else if ($estado == 1){
                $estado = 1;
            }else if ( $estado == 3 || $estado == 6){
                $estado = 3;
            }

            $data[] = [
                'nombre' => $estudia_old->getNombreCompleto(),
                'carnet' => $boleta->carnet,
                'id_orden_pago' => $boleta->id_orden_pago,
                'estado' => $estado,
                'carnetmd5' => md5("rye2016".$boleta->carnet."usac")
            ];
        }

        $cantidad = count($data);
        return ['data' => $data, 'cantidad' => $cantidad];
    }


    /*
    * Regresa un Arreglo con todas las boletas
    * del ciclo actual
    * Segun  estado
    */
    public static function getBoletas($estado){
        $fecha_minima = date("Y-m-d");
        $fechaVencimiento = new DateTime($fecha_minima);
        $fechaVencimiento = $fechaVencimiento->modify('-1 day')->format('Y-m-d');
        $boletasValidas = [];
        $cantidad = 0;
        if($estado != 0 && $estado != 1) {
            $ciclo_actual = date("Y");
            $fechaVencimiento = $ciclo_actual.'-00-00';
        }

        if($estado == 3){
            $estado = 3;
            $cantidad = CarnetBoleta::where([
                ['estado', '=', $estado],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['estado', '=', 6],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->take(90)->get()->count();

            $boletasValidas = CarnetBoleta::where([
                ['estado', '=', $estado],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['estado', '=', 6],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->take(90)->get();
        }
        else if($estado == 2){

            $cantidad = CarnetBoleta::where([
                ['estado', '=', 2],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['estado', '=', 4],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['estado', '=', 5],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->take(90)->get()->count();


            $boletasValidas = CarnetBoleta::where([
                ['estado', '=', 2],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['estado', '=', 4],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['estado', '=', 5],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->take(90)->get();
        }
        else{
            $cantidad = CarnetBoleta::where([
                ['estado', '=', $estado],
                ['fecha_generacion', '>', date($fechaVencimiento)]
            ])->get()->count();

            $boletasValidas = CarnetBoleta::where([
                ['estado', '=', $estado],
                ['fecha_generacion', '>', date($fechaVencimiento)]
            ])->take(90)->get();
        }


        $data = [];
        foreach($boletasValidas as $boleta){
            $estudia_old = EstudiaOld::find($boleta->carnet);
            $data[] = [
                'nombre' => $estudia_old->getNombreCompleto(),
                'carnet' => $boleta->carnet,
                'id_orden_pago' => $boleta->id_orden_pago,
                'carnetmd5' => md5("rye2016".$boleta->carnet."usac")
            ];
        }

        $cantidad = count($data);
        return ['data' => $data, 'cantidad' => $cantidad];
    }


    /**
     * Buscar una boleta en especifico
     * por carnet y estado
     */
    public function buscarImprimeCarnet(Request $request){
        $carnet = $request["carnet"];
        $estado = $request["estado"];
        $fecha_minima = date("Y-m-d");
        $fechaVencimiento = new DateTime($fecha_minima);
        $fechaVencimiento = $fechaVencimiento->modify('-1 day')->format('Y-m-d');

        if($estado != 0) {
            $ciclo_actual = date("Y");
            $fechaVencimiento = $ciclo_actual.'-00-00';
        }

        $boleta = CarnetBoleta::where([
            ['carnet', '=', $carnet],
            ['estado', '=', $estado],
            ['fecha_generacion', '>', date($fechaVencimiento)]
        ])
        ->orderBy('fecha_generacion', 'DESC')
        ->first();

        if($estado == 2){
            $boleta = CarnetBoleta::where([
                ['carnet', '=', $carnet],
                ['estado', '=', 2],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['carnet', '=', $carnet],
                ['estado', '=', 4],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['carnet', '=', $carnet],
                ['estado', '=', 5],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])->first();
        }
        else if($estado == 3){
            $boleta = CarnetBoleta::where([
                ['carnet', '=', $carnet],
                ['estado', '=',3],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])
            ->orWhere([
                ['carnet', '=', $carnet],
                ['estado', '=', 6],
                ['fecha_entrega', '>', date($fechaVencimiento)]
            ])->first();
        }



        if($boleta != null){
            $estudia_old = EstudiaOld::find($carnet);
            $data[] = [
                'nombre' => $estudia_old->getNombreCompleto(),
                'carnet' => $carnet,
                'id_orden_pago' => $boleta->id_orden_pago,
                'carnetmd5' => md5("rye2016".$carnet."usac")
            ];



            return response()->json(['statusCode' => 200, 'body' => $data]);
        }

        return response()->json(['statusCode' => 400, 'body' => "No tiene boletas para el presente ciclo"]);


    }

    /**
     * Buscar una boleta en especifico
     * por carnet
     */
    public function buscarImprimeCarnetSinEstado(Request $request){
        $carnet = $request["carnet"];
        $estado = $request["estado"];
        $fecha_minima = date("Y-m-d");
        $fechaVencimiento = new DateTime($fecha_minima);
        $fechaVencimiento = $fechaVencimiento->modify('-1 day')->format('Y-m-d');
        $ciclo_actual = date("Y");
        $fechaVencimiento2 = $ciclo_actual.'-00-00';

        $boleta = CarnetBoleta::where([
            ['carnet', '=', $carnet],
            ['estado', '=', 2],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['carnet', '=', $carnet],
            ['estado', '=', 4],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['carnet', '=', $carnet],
            ['estado', '=', 5],//Estado 2
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['carnet', '=', $carnet],
            ['estado', '=', 1],//Estado 1
            ['fecha_generacion', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['carnet', '=', $carnet],
            ['estado', '=', 3], //Estado 3
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orWhere([
            ['carnet', '=', $carnet],
            ['estado', '=', 6], //Estado 3
            ['fecha_entrega', '>', date($fechaVencimiento2)]
        ])
        ->orderBy('fecha_generacion', 'DESC')
        ->first();
        



        if($boleta != null){
            $estudia_old = EstudiaOld::find($carnet);
            $estado = $boleta->estado;
            if($estado == 2 || $estado == 4 || $estado == 5){
                $estado = 2;
            }else if ($estado == 1){
                $estado = 1;
            }else if ( $estado == 3 || $estado == 6){
                $estado = 3;
            }
            $data[] = [
                'nombre' => $estudia_old->getNombreCompleto(),
                'carnet' => $carnet,
                'estado' => $estado,
                'id_orden_pago' => $boleta->id_orden_pago,
                'carnetmd5' => md5("rye2016".$carnet."usac")
            ];



            return response()->json(['statusCode' => 200, 'body' => $data]);
        }

        return response()->json(['statusCode' => 400, 'body' => "No tiene gestiones para el presente ciclo"]);


    }
    /**
     * Consulta la boleta a SIIF y retorna la informacion de pago
     */
    function ValidarBoletaSiif($idOrdenPago, $carnet){
        $boleta = Boletas::validarBoleta($idOrdenPago, $carnet);
        return $boleta;
    }

    /**
     * Valida la boleta con siif
     * si esta pagada la pasa a estado 2
     */
    public function validarBoletaEstado1(Request $request){

        $result = $this->ValidarBoletaSiif($request["id"],$request["carnet"]);
        if($result["cancelada"] == false)
            return response()->json(['statusCode' => 400, 'body' => "No se ha pagado la boleta"]);
        $boletaPagada = CarnetBoleta::where([
            ['id_orden_pago', '=', $request["id"]]
        ])->first();
        //Si la fecha de entrega es null, se setea la de la fecha actual
        if($boletaPagada->fecha_fecha_entrega == null) {
            $fecha_minima = date("Y-m-d");
            $fechaVencimiento = new DateTime($fecha_minima);
            $boletaPagada->fecha_entrega = $fechaVencimiento;
        }
        $boletaPagada->banco = $result['banco'];
        $boletaPagada->no_boleta_deposito = $result['noBoletaDeposito'];
        $boletaPagada->no_transferencia_bancaria = $result['noTransferenciaBancaria'];
        $boletaPagada->fecha_certificado_banco = strtotime($result['fechaCertificadoBanco']);
        $boletaPagada->estado = $result['estado'];
    
        $boletaPagada->save();

        return response()->json(['statusCode' => 200, 'body' => $result["cancelada"]. $result["estado"]]);
    }

    /**
     * Eliminar la fotografia del Estudiante
     * desde el estado 2
     */
    public function eliminarFotografia(Request $request){

        $carnet = $request["carnet"];
        $carnet_int = $request["carnet2"];
        $hoy = date("Y-m-d");
        $fechahoy = new DateTime($hoy);

        // Se guarda la informacion en la bitacora
        $BitacoraCarnet = new BitacoraCarnet();
        $BitacoraCarnet->descripcion = 'Eliminación de Fotografía' ;
        $BitacoraCarnet->carnet = $carnet_int;
        $BitacoraCarnet->fecha = $fechahoy;
        $BitacoraCarnet->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $BitacoraCarnet->usuario_login = Auth::guard('administrativo')->user()->login;
        $BitacoraCarnet->save();

        //Conexion SSH
        $conexion = $this->conexionSSH();
        if(is_string($conexion)) return response()->json(['statusCode' => 400, 'body' => "Error al eliminar la imagen"]);
        $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';

        $res = file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnet . '.jpg' );
        if(!$res) return response()->json(['statusCode' => 400, 'body' => "La foto ya ha sido eliminada"]);
        //Verificar si hay fotos previas
        if($res){
            $intento = 1;
            while(file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnet . '_' . $intento . '.jpg' )){
                $intento++;
            }

            rename('ssh2.sftp://'. $stfp . $conexion["path"]. $carnet . '.jpg','ssh2.sftp://'. $stfp . $conexion["path"] . $carnet .  '_' . $intento . '.jpg');

        }
        ssh2_disconnect($conexion["conexion"]);

        return response()->json(['statusCode' => 200, 'body' => "Eliminada con Exito"]);
    }

    /**
     * Generar e imprimir carnet
     */
    public function imprimirCarnetPDF(Request $request){
        $carnetmd5 = $request["carnetmd5"];
        $carnet = $request["carnet"];
        $hoy = date("Y-m-d");
        $fechahoy = new DateTime($hoy);

        // Se guarda la informacion en la bitacora
        $BitacoraCarnet = new BitacoraCarnet();
        $BitacoraCarnet->descripcion = 'Se ha generado, impreso y movido al estado 3 al carnet: ' .$carnet ;
        $BitacoraCarnet->carnet = $carnet;
        $BitacoraCarnet->fecha = $fechahoy;
        $BitacoraCarnet->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $BitacoraCarnet->usuario_login = Auth::guard('administrativo')->user()->login;
        $BitacoraCarnet->save();

        //Conexion SSH
        $conexion = $this->conexionSSH();
        if(is_string($conexion)) return response()->json(['statusCode' => 400, 'body' => "Error con la conexion al servidor remoto"]);
        $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';

        $res = file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $carnetmd5 . '.jpg' );
        //Verificar si existe la fotografia
        if(!$res) return response()->json(['statusCode' => 400, 'body' => "No se puede imprimir el carnet, sin una fotografia valida"]);
        $boletaPagada = CarnetBoleta::where([
            ['id_orden_pago', '=', $request["id"]]
        ])->first();
        $boletaPagada->estado = 3;
        $boletaPagada->save();
        return response()->json(['statusCode' => 200, 'body' => "Carnet Impreso"]);
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
     * Regresa un carnet del
     * estado Impreso (3)
     * a estado de pagado (2)
     */
    public function regresarEstado2(Request $request){

        $id = $request["id"];
        $carnet = $request["carnet"];
        $hoy = date("Y-m-d");
        $fechahoy = new DateTime($hoy);

        // Se guarda la informacion en la bitacora
        $BitacoraCarnet = new BitacoraCarnet();
        $BitacoraCarnet->descripcion = 'Se ha regresado a estado 2 la boleta: '. $id ;
        $BitacoraCarnet->carnet = $carnet;
        $BitacoraCarnet->fecha = $fechahoy;
        $BitacoraCarnet->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $BitacoraCarnet->usuario_login = Auth::guard('administrativo')->user()->login;
        $BitacoraCarnet->save();

        $boletaPagada = CarnetBoleta::where([
            ['id_orden_pago', '=', $request["id"]]
        ])->first();
        $boletaPagada->estado = 2;
        $boletaPagada->save();
        return response()->json(['statusCode' => 200, 'body' => "Estado Actualizado"]);
    }


    /**
     * Ingreso de Boletas Manuales
     * Generadas en SIIF
     */
    public function boletaManual(Request $request){
        $file = $request->file('boleta');
        $file_tmp= $_FILES['boleta']['tmp_name'];
        $file_content = file_get_contents( $file_tmp );
        $extensionArchivo = $file->extension();
        $carnet = $request["carnet"];
        $idboleta = $request["idboleta"];
        $boletaDeposito = $request["boletaDeposito"];
        $transferenciaBancaria = $request["transferenciaBancaria"];
        $monto = $request["monto"];
        $banco = $request["banco"];
        $hoy = date("Y-m-d");
        $fechahoy = new DateTime($hoy);

        $estudia_old = EstudiaOld::find($carnet);
        if(!EstudiaOld::where('carnet', $carnet)->exists()) 
            return response()->json(['statusCode' => 400, 'body' => "Ingrese un numero de carnet valido"]);
        $nombreEstudiante = $estudia_old->getNombreCompleto();
        $variante = ($monto == 5) ? 1 : 2;

        $conexion = $this->conexionSSH();
        if(is_string($conexion)) return response()->json(['statusCode' => 400, 'body' => "Error con la conexion al servidor remoto"]);
        $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';

        //Guardar la boleta
        $res = ssh2_scp_send($conexion["conexion"],$_FILES['boleta']['tmp_name'],$conexion["pathBoleta"]. $boletaDeposito."_".$carnet . '.'.$extensionArchivo,0644);
        ssh2_disconnect($conexion["conexion"]);

        // Se guarda la informacion en la bitacora
        $BitacoraCarnet = new BitacoraCarnet();
        $BitacoraCarnet->descripcion = 'Se ha agregado la boleta pagada: '.$idboleta. ' para el carnet: '.$carnet ;
        $BitacoraCarnet->carnet = $carnet;
        $BitacoraCarnet->fecha = $fechahoy;
        $BitacoraCarnet->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $BitacoraCarnet->usuario_login = Auth::guard('administrativo')->user()->login;
        $BitacoraCarnet->save();

        // recuperando boleta y actualizando datos
        $carnetboletaDB = CarnetBoleta::find($idboleta);
        $carnetboletaDB->banco = $banco;
        $carnetboletaDB->no_boleta_deposito = $boletaDeposito;
        $carnetboletaDB->no_transferencia_bancaria = $transferenciaBancaria;
        $carnetboletaDB->fecha_certificado_banco = $fechahoy;
        $carnetboletaDB->estado = 2;
        $carnetboletaDB->fecha_entrega = $fechahoy;
        $carnetboletaDB->save();

        return response()->json(['statusCode' => 200, 'body' => "Direccion:".$conexion["pathBoleta"]]);
    }


    public function BusquedaGeneral(){
        $uid = uniqid(time(), true);
        $page = (is_numeric(Input::get('page'))) ? Input::get('page') : 1;
        $page = ($page <= 0) ? 1 : $page;
        $maxLength = (is_numeric(Input::get('length'))) ? Input::get('length') : 9;
        $start = ($page - 1) * $maxLength;
        $info = $this->getBoletas(1);
        $data = array_slice($info["data"],$start,$maxLength);
        $cantidad = $info["cantidad"];
        $pages = ceil($cantidad / $maxLength);
        $previus = (($page - 1 ) <= 0) ? 1 : ($page - 1 );
        $next = (($page + 1 ) > $pages) ? $page : ($page + 1 );

        return view('portalAdministrativo.ImprimirCarnetEstudiante.BusquedaGeneral',
                    compact('data','pages','page','previus','next','uid'));

    }
}
