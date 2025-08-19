<?php

namespace App\Http\Controllers\Administrativo;

use App\Models\EstudiaOld as Estudiante;
use App\Http\Controllers\Controller;
use App\Models\CarreraEstudiante;
use Illuminate\Http\Request;
use App\Models\CarreraTemporal;
use App\Models\Extension;
use App\Models\Facultad;
use App\Models\CicloActivo;
use Illuminate\Support\Facades\DB;
use App\Models\BitacoraInscripcion2;
use App\Models\BitacoraInscripcion;
use App\Models\BitacoraInterno;
use App\Models\BitacoraTraslado;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;

class PostDoctorado extends Controller {

    public function __construct(){
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectCertInscripcionesPostgrado');
    }

    public function estudiante(Request $request){
        $carnet = $request->input('carnet');
        $estudiante = Estudiante::find($carnet);
        if (!$estudiante){
            $respuesta = [
                'error'=> 1,
                'descripcion'=> 'No se encontro al estudiante'
            ];

            return response(json_encode($respuesta))
                ->header('Content-Type', 'application/json');
        }

        $resultado = [
            'error' => 0,
            'descripcion' => 'Se consulto con exito',
            'estudiante' => [
                'primer_nombre' => $estudiante['nombre1'],
                'segundo_nombre' => $estudiante['nombre2'],
                'primer_apellido' => $estudiante['primer_apellido'],
                'segundo_apellido' => $estudiante['segundo_apellido'],
                'nombre' => $estudiante['nombre'],
                'carnet' => $estudiante['carnet'],
                'cui' => $estudiante['cui'],
            ]
        ];

        return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
    }


    public function carrera(Request $request){
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_car = $request->input('cod_car');
        
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $cod_ua],
            ['codigo_extension', '=', $cod_ext],
            ['codigo_carrera', '=', $cod_car]
        ])->first();

        if(!$carrera){
            $respuesta = ['error' => 1,
                'mensaje' => 'No se encontro la carrera'
            ];

            return response(json_encode($respuesta))
                ->header('Content-Type', 'application/json');
        }

        if($carrera['codigo_nivel'] <3){
            $respuesta = [
               'error' => 2,
                'mensaje' => 'No es una carrera valida de Postgrado'
            ];

           return response(json_encode($respuesta))
                ->header('Content-Type', 'application/json');
        }

        $respuesta = [
            'error' => 0,
            'mensaje' => 'Se encontro la carrera',
            'carrera' => [
                'nombre_carrera' => $carrera['nombre_carrera'],
                'cod_car' => $cod_car,
                'cod_ua' => $cod_ua,
                'cod_ext' => $cod_ext,
                'nivel' => $carrera['codigo_nivel'],
                'permiso_ingreso' => $carrera['estado_ingreso'],
                'permiso_reingreso' => $carrera['estado_ingreso']
            ]
        ];

        return response(json_encode($respuesta))
            ->header('Content-Type', 'application/json');

    }


    public function unidad_academica(Request $request){
        $cod_ua = $request->input('cod_ua');
        $unidad_academica =  Facultad::where(
            [['codfac','=',$cod_ua]]
            )->first();
        
        if(!$unidad_academica){
            $respuesta = [
                'error' => 1,
                'mensaje' => 'No se encontro la Unidad Académica'
            ];
            return response(json_encode($respuesta))
            ->header('Content-Type', 'application/json');
        }

        $respuesta = [
            'error' => 0,
            'mensaje' => 'Se encontro la Unidad Académica',
            'unidad_academica' => [
                'nombre' => $unidad_academica['nomfac'],
                'cod_ua' => $cod_ua
            ]
        ];

        return response(json_encode($respuesta))
            ->header('Content-Type', 'application/json');
    }


    public function extension(Request $request){
        $cod_ua = $request->input('cod_ua');
        $cod_ext =  $request->input('cod_ext');
        $extension =  Extension::where(
            [
                ['codigo_unidad_academica', '=', $cod_ua],
                ['codigo_extension', '=', $cod_ext ]
            ])->first();
        
        if(!$extension){
            $respuesta = [
                'error' => 1,
                'mensaje' => 'No se encontro la Extensión'
            ];

            return response(json_encode($respuesta))
            ->header('Content-Type', 'application/json');
        }

        $respuesta = [
            'error' => 0,
            'mensaje' => 'Se encontro la Extensión',
            'extension' => [
                'nombre' => $extension['nombre'],
                'cod_ua' => $cod_ua,
                'cod_ext' => $cod_ext
            ]
        ];

        return response(json_encode($respuesta))
            ->header('Content-Type', 'application/json');
    }


    public function carrera_estudiante(Request $request){
        $carnet = $request->input('carnet');

        if(in_array(51,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())) {
            $niveles = " AND ct.codigo_nivel >=3";
        }else{
            $niveles = " AND ct.codigo_nivel =10";
        }

        $carreras = DB::select(DB::raw("SELECT f.codfac, f.nomfac, e.codigo_extension, 
        e.nombre as nombre_extension,
        ct.codigo_carrera, ct.nombre_carrera,
        ct.codigo_nivel,
        ct.estado_reingreso,
        ct.estado_ingreso,
        ce.provisional,
        (   SELECT COUNT(1)
            FROM evento_electoral, ciclo_activo
            WHERE evento_electoral.ciclo = ciclo_activo.ciclo_activo
                AND evento_electoral.ua = f.codfac
                AND DATE(NOW()) BETWEEN evento_electoral.f_congelamiento
                AND DATE_ADD(evento_electoral.vuelta_3,INTERVAL evento_electoral.`dobleFecha` DAY)
                AND !evento_electoral.evento_resuelto
        ) as eventoActivo,
        ( SELECT COUNT(1)
          FROM becado b 
          WHERE b.carnet = ce.carnet 
              AND b.reingresoRegular ) as becas
    FROM carrera_temporal ct, extension e, facultad f, carrera_estudiante ce 
    WHERE ct.codigo_extension = e.codigo_extension  
        AND ct.codigo_unidad_academica = e.codigo_unidad_academica 
        AND ct.codigo_unidad_academica = f.codfac
        AND ct.codigo_unidad_academica = ce.codfac 
        AND ct.codigo_extension = ce.codext 
        AND ct.codigo_carrera = ce.codcar
        $niveles 
        AND ce.carnet = $carnet"));

        $resultado = [
            'error'=> 0,
            'mensaje' => 'Se recuperaron las carreras',
            'carreras' => $carreras
        ];

        return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');

    }

    public function crear_carrera(Request $request){
        //bitacora_interno, carrera_estudiante, bitacora_traslado
        $ciclo = $request->input('ciclo');
        $semestre = $request->input('semestre');
        $carnet =  $request->input('carnet');
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_car = $request->input('cod_car');
        $provisional = $request->input('provisional');
        $tipoRol = $request->input('tipoRol');
        $nivelCarrera = $request->input('nivelCarrera');
        $fecha = Carbon::now();
        $reg_personal = Auth::guard('administrativo')->user()->login;
        $usuario = $reg_personal.'@'.$request->ip();

        $provisional = $provisional == "1"?$provisional:0;

        $validar = $this->validarPregrado($carnet, $cod_ua);
        $validarProvisional = $this->validarProvisional($carnet, $cod_ua);

        if($validarProvisional != 0 && $provisional ==1){
            $resultado =[
                'error'=> 1,
                'mensaje' => 'El estudiante posee una carrera provisional.'
            ];
            return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
        }

        if($nivelCarrera != 10 && $tipoRol ==2){
            $resultado =[
                'error'=> 1,
                'mensaje' => 'La carrera que ingresó no es de Postdoctorado'
            ];
            return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
        }

        if($validar == 0 && $provisional ==1){
            $resultado =[
                'error'=> 1,
                'mensaje' => 'No tiene una carrera de Pregrado en la Unidad Académica en la cual esta intentando crear la carrera.'
            ];
            return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
        }

        $carreraAsignada = $this->verificarCarreraAsignada($carnet, $cod_ua, $cod_ext, $cod_car);

        if($carreraAsignada !=0){
            $resultado =[
                'error'=> 1,
                'mensaje' => 'El estudiante ya cuenta con la carrera que desea tramitar'
            ];
            return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
        }


        $carrera_estudiante = new CarreraEstudiante([
            'carnet' => $carnet,
            'codfac' => $cod_ua,
            'codext' => $cod_ext,
            'codcar' => $cod_car,
            'fecha_entrada' => $fecha,
            'sit_acad' => 0, // regular
            'cal_elect' => 0, //no es elector
            'carnet_ant' => 0,
            'tipo_carnet' => 0,
            'cambio' => 0, 
            'repitencia' => 0,
            'habilitado' => 1,
            'activo' => 1,
            'usuario' => $usuario,
            'fecha_usr' => $fecha,
            'migrar' => 0,
            'estado_graduado' => 0,
            'provisional' => $provisional
        ]);

        $realizado = $carrera_estudiante->save();
        
        if(!$realizado){
            $resultado = [
                'error'=> 1,
                'mensaje' => 'Error al insertar la carrera'
            ];

            return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
        }

        $bitacora_traslado = new BitacoraTraslado([
            'carnet' => $carnet,
            'defac' => 0,
            'deext' => 0,
            'decar' => 0,
            'afac' => $cod_ua,
            'aext' => $cod_ext,
            'acar' => $cod_car,
            'ciclo' => $ciclo,
            'semestre' => $semestre,
            'tipo_tram' => 11,
            'usuario' => $usuario,
            'fecha_usuario' => $fecha 
        ]);

        $bitacora_traslado->save();

        $bitacora_interno = new BitacoraInterno([
            'dependencia' => 'rye',
            'usuario' => $usuario,
            'fecha_operacion' => $fecha,
            'tipo_cambio' => 11,
            'nivel' => 10,
            'tipo_mov' => 2,
            'UA' => $cod_ua,
            'carnet' => $carnet,
            'Ext' => $cod_ext,
            'Car' => $cod_car,
            'ciclo' => $ciclo,
            'semestre' => $semestre
        ]);

        $bitacora_interno->save();

        $resultado = [
            'error' => 0,
            'mensaje' => 'Se creo la carrera'
        ];

        return response(json_encode($resultado))
            ->header('Content-Type', 'application/json');
    }

    public function completoPregrado(Request $request){
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_car = $request->input('cod_car');
        $carnet = $request->input('carnet');
        $reg_personal = Auth::guard('administrativo')->user()->login;
        $usuario = $reg_personal.'@'.$request->ip();

        $completo = CarreraEstudiante::where([
            "carnet" => $carnet,
            "codfac" => $cod_ua,
            "codext" => $cod_ext,
            "codcar" => $cod_car,
        ])->first();

        $completo -> provisional=0;
        $completo -> usuario=$usuario;
        $completo -> fecha_usr=Carbon::now();
        $realizado = $completo->save();
        $ciclo = CicloActivo::first(); 

        $datos_bitacora = [
            'dependencia' => 'rye',
            'usuario' => $usuario,
            'fecha_operacion' => Carbon::now(),
            'tipo_cambio' => 69,
            'nivel' => 3,
            'tipo_mov' => 2,
            'UA' => $cod_ua,
            'carnet' => $carnet,
            'Ext' => $cod_ext,
            'Car' => $cod_car,
            'ciclo' => $ciclo->ciclo_activo,
            'semestre' => $ciclo->semestre_activo,
        ];

        $bitacora = new BitacoraInterno($datos_bitacora);
        $bitacora->save();

        $respuesta = [
            'error'=> 0,
            'mensaje' => 'Se inscribio al estudiante'
        ];

        if (!$realizado){
            $respuesta['error'] = 4;
            $respuesta['mensaje'] = 'Error al guardar la información';
        }

        return response(json_encode($respuesta))
            ->header('Content-Type', 'applicatgion/json');

    }


    public function inscribir(Request $request){
        $ciclo = $request->input('ciclo');
        $semestre = $request->input('semestre');
        $boleta = $request->input('boleta');
        $fecha_boleta = $request->input('fecha_boleta');
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_car = $request->input('cod_car');
        $carnet = $request->input('carnet');
        $reg_personal = Auth::guard('administrativo')->user()->login;
        $usuario = $reg_personal.'@'.$request->ip();
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $cod_ua],
            ['codigo_extension', '=', $cod_ext],
            ['codigo_carrera', '=', $cod_car],
        ])->first();

        if(!$carrera){
            $respuesta = [
                'error' => 1,
                'mensaje' => 'No existe la carrera'
            ];
            return response(json_encode($respuesta))
                ->header('Content-Type', 'application/json');
        }

        if($carrera['codigo_nivel'] < 3){
            $respuesta = [
                'error' => 2,
                'mensaje' => 'No es carrera de postgrado'
            ];

            return response(json_encode($respuesta))
                ->header('Content-Type', 'applicatgion/json');
        }

        $carreraEstudiante = CarreraEstudiante::where([
            ['carnet', '=', $carnet],
            ['codfac', '=', $cod_ua],
            ['codext', '=', $cod_ext],
            ['codcar', '=', $cod_car]
        ]);

        if(!$carreraEstudiante){
            $respuesta = [
                'error' => 3,
                'mensaje' => 'El estudiante no está asignado a esta carrera'
            ];

            return response(json_encode($respuesta))
                ->header('Content-Type', 'applicatgion/json');
        }

        //TODO revisar el nivel del usuario

        $inscripcion =  BitacoraInscripcion::where([
            ['carnet', '=', $carnet],
            ['cod_ua', '=', $cod_ua],
            ['cod_ext', '=', $cod_ext],
            ['cod_car', '=', $cod_car],
            ['ciclo', '=', $ciclo]
        ])->first();

        if($inscripcion){
            $matricula = ($inscripcion->cancelar_matricula==0?
                'regular' : 'cancelada');

            $respuesta = [
                'error' => 4,
                'mensaje' => 'Ya cuenta con una inscripción para el ciclo '
                    .$ciclo.', estado: '. $matricula
            ];

            return response(json_encode($respuesta))
                ->header('Content-Type', 'applicatgion/json');
        }

        $datos = [
            'carnet'=> $carnet,
            'cod_ua' => $cod_ua,
            'cod_ext' => $cod_ext,
            'cod_car' => $cod_car,
            'ciclo' => $ciclo,
            'semestre' => $semestre,
            'fecha_inscripcion' => Carbon::now(),
            'boleta' => $boleta,
            'fecha_boleta' => $fecha_boleta,
            'cancelar_matricula' => 0,
            'usuario' => $usuario,
            'fecha_usuario' => Carbon::now(),
        ];

        $inscripcion = new BitacoraInscripcion2($datos);
        $realizado = $inscripcion->save();
        
        $datos_bitacora = [
            'dependencia' => 'rye',
            'usuario' => $usuario,
            'fecha_operacion' => Carbon::now(),
            'tipo_cambio' => 5,
            'nivel' => 1,
            'tipo_mov' => 2,
            'UA' => $cod_ua,
            'carnet' => $carnet,
            'Ext' => $cod_ext,
            'Car' => $cod_car,
            'ciclo' => $ciclo,
            'semestre' => $semestre
        ];

        $bitacora = new BitacoraInterno($datos_bitacora);
        $bitacora->save();

        $respuesta = [
            'error'=> 0,
            'mensaje' => 'Se inscribio al estudiante'
        ];

        if (!$realizado){
            $respuesta['error'] = 4;
            $respuesta['mensaje'] = 'Error al guardar la información';
        }

        return response(json_encode($respuesta))
            ->header('Content-Type', 'applicatgion/json');

    }


    public function validarPregrado($carnet, $codFac){

        if ($codFac == 7 || $codFac == 70 || $codFac == 77){
            $codFac = "7,70,77";
        } 

        if ($codFac == 5 || $codFac == 55){
            $codFac = "5,55";
        }

        if ($codFac == 12 || $codFac == 46){
            $codFac = "12,46";
        } 

        $carreras = DB::select(DB::raw("SELECT COUNT(1) as resultado from carrera_estudiante ce, carrera_temporal ct
        where ce.carnet=$carnet and ce.codfac in ($codFac) and ce.sit_acad=2 and ct.codigo_nivel =1 and ct.codigo_unidad_academica = ce.codfac and ct.codigo_extension = ce.codext 
        and ct.codigo_carrera = ce.codcar"));

        return $carreras[0]->resultado;
    }

    public function validarProvisional($carnet, $codFac){

        $carreras = DB::select(DB::raw("SELECT COUNT(1) as resultado from carrera_estudiante ce
        where ce.carnet=$carnet and ce.codfac=$codFac and ce.provisional=1"));

        return $carreras[0]->resultado;
    }

    public function verificarCarreraAsignada($carnet, $codFac, $cod_ext, $cod_car){

        $carreras = DB::select(DB::raw("SELECT COUNT(1) as resultado from carrera_estudiante ce
        where ce.carnet=$carnet and ce.codfac=$codFac and ce.codext= $cod_ext and ce.codcar= $cod_car"));

        return $carreras[0]->resultado;
    }

    public static function descargarPDFResolucion(Request $request){

        $ciclo = $request->input("ciclo");
        $carnet = $request->input("carnet");
        error_log($carnet);
        $estudiante = Estudiante::find($carnet);
        $nombreCompleto = $estudiante->getNombreCompleto();
        $cui = $estudiante->cui;
        $ua = $request->input("ua");
        $ext = $request->input("ext");
        $car = $request->input("car");
        $firmaJefe = $request->input('firmaJefe');

        $unidadAcademica = Facultad::where([
            ['codfac', '=', $ua]
        ])->first();

        $extension = Extension::where([
            ['codigo_unidad_academica','=', $ua],
            ['codigo_extension','=', $ext]
        ])->first();

        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $ua],
            ['codigo_extension', '=', $ext],
            ['codigo_carrera', '=', $car],
        ])->first();

        $usuario = Auth::guard('administrativo')->user()->nombre;
        $puestoUsuario =Auth::guard('administrativo')->user()->puesto;
        $inicialesUsuario = Auth::guard('administrativo')->user()->iniciales;

        $nombreUA = $unidadAcademica->nomfac;
        $nombreExt = $extension->nombre;
        $nombreCarrera = $carrera->nombre_carrera;
        log::info("esto trae jefe".$firmaJefe);
        $jefatura = DB::select( DB::raw('SELECT * from usuario u WHERE puesto = "'. $firmaJefe .'" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
        $nombreJefe = $jefatura[0]->nombre;
        $puesto = $jefatura[0]->puesto;
        $date = Carbon::now()->formatLocalized('%d %B %Y');
        $dia = Carbon::now()->day;
        $anio = Carbon::now()->year;
        $mes = SolicitaCertificacionInscripcion::obtenerMesText($date);
       
        $css = '/var/www/html/rye-portal/public/css/constancia.css';
        $img = '/var/www/html/rye-portal/public/img/usacnegro.jpg';
        $borrador = '/var/www/html/rye-portal/public/img/borrador.png';
        $img2 = '/var/www/html/rye-portal/public/img/LogoRegistro.png';
 
        $pdf = PDF::loadView('common.include.resolucionTramite', compact("css","img","borrador", "img2", "ciclo", "carnet", "cui",
                "nombreCompleto", "ua", "ext", "car", "nombreUA", "nombreExt", "nombreCarrera", "usuario", "nombreJefe", "puestoUsuario", "puesto", "inicialesUsuario", "dia","mes", "anio"));

        $pdf->setPaper('letter');
        return $pdf->download('resolucion_'. $carnet . '.pdf');

    }

     //POSTDOCTORADO

    public function crearPostdoctorado(){
        $title='Crear Carrera';
        return view('portalAdministrativo.postDoctorado.crearPostdoctorado', compact('title'));

    }

    public function inscribirPostdoctorado(){
        $title = 'Inscripción';
        return view('portalAdministrativo.postDoctorado.inscribirPostdoctorado', compact('title'));

    }
}