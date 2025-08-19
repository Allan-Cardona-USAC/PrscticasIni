<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;
use App\Http\Controllers\Estudiante\SolicitarCarnet;
use App\Http\Controllers\PortalAdministrativo\aspiranteController;
use App\Models\Certificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\EstudiaOld;
use App\Models\Aspirante;
use App\Models\PruebaEspecifica;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use App\PortalAdministrativo\aspirante as PortalAdministrativoAspirante;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Funciones\ConsultaOV;
use App\Models\Pcb;
use Illuminate\Http\Response;

class ExoneradosController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectExonerados');
    }

    public function index(){

        return view('administrativo.exonerados.formularioExonerados');

    }

    public function busquedaNov(Request $request){

        $nov = $request->input('nov');

        $aspirante = Aspirante::select()
        ->where([
            ['nov', '=', $nov]
        ])->first();

        if(!$aspirante){

            if($aspirante == null)
            {
                //api de orientacion vocacional
                $consultar = ConsultaOV::consultarAspiranteOV($nov);

                if ($consultar == 0){
                    //return Redirect::back()->withErrors(['msg' => 'El numero de orientacion vocacional ingresado no existe']);
                    return response()->json(['nov' => 0], 400);;
                }
            }

            //return Redirect::back()->withErrors(['msg' => 'El numero de orientacion vocacional ingresado no existe']);
        }

        $pruebasBasicas = Pcb::Select(DB::raw('nov, id_prueba, oportunidad, resultado, f_aprobado, descripcion, usuario, fec_carga, ciclo, usuario_actualiza, fec_actualiza'))
        ->WHERE([
            ['nov', '=', $nov]
        ])->get();
        
        if($pruebasBasicas->isEmpty()){
            return response()->json(['PruebasBasicas' => 0], 401);//
        }

        /*
        $pruebasBasicas = aspiranteController::consultarPruebaBasicasWSSUN($nov);
        log::info('Este tiene pruebas sun: '. json_encode($pruebasBasicas));
        if($pruebasBasicas == null){
            return response()->json(['PruebasBasicas' => 0], 401);//
        }*/

        return json_encode($aspirante);

    }

    public function generar(Request $request){

        $nov = $request["nov"];
        $ua = $request["ua"];
        $ext = $request["ext"];
        $car = $request["car"];
        $autorizacion = $request["autorizacion"];
        $fechaAprobado = $request["fechaAprobado"];

        $fechaCarga = Carbon::now();

        $ciclo = CicloActivo::first();
        $date = Carbon::parse(''.$fechaAprobado.'')->addYear(2);
        $usuario = Auth::guard('administrativo')->user()->login.'@portalregistro.usac.edu.gt';

        try{
        $PruebaEspecificaSet = new PruebaEspecifica();
        $PruebaEspecificaSet->nov = $nov;
        $PruebaEspecificaSet->ua = $ua;
        $PruebaEspecificaSet->ext = $ext;
        $PruebaEspecificaSet->car = $car;
        $PruebaEspecificaSet->resultado = "Satisfactorio";
        $PruebaEspecificaSet->nota = 0;
        $PruebaEspecificaSet->fecha_aprobado = $fechaAprobado;
        $PruebaEspecificaSet->fecha_caduca = $date;
        $PruebaEspecificaSet->ciclo = $ciclo->ciclo_especificas;
        $PruebaEspecificaSet->usuario = $usuario;
        $PruebaEspecificaSet->fechaCarga = $fechaCarga;
        $PruebaEspecificaSet->autorizacion = $autorizacion;
        $PruebaEspecificaSet->save();
        }catch(Exception $e){

            $UpdatePruebaEspecifica = new PruebaEspecifica;
                    DB::table($UpdatePruebaEspecifica->getTable())->where(
                        ['nov'=>$nov, 'ua'=>$ua, 'ext'=>$ext, 'car'=>$car])->limit(1)->update(
                            ['usuario' => $usuario,
                            'resultado' => 'Satisfactorio',
                            'nota' => 0,
                            'fecha_aprobado' => $fechaAprobado,
                            'fecha_caduca' => $date,
                            'ciclo' => $ciclo->ciclo_especificas,
                            'fechaCarga' => $fechaCarga,
                            'autorizacion' => $autorizacion
                        ]);

            /*return response()->json(['statusCode' => 401, 'body' => "Imposible de realizar, ya existe una exoneracíon con esa unidad academica, extension y carrera."]);;*/
        }

        /*$UpdatePruebaEspecifica = new PruebaEspecifica;
                    DB::table($UpdatePruebaEspecifica->getTable())->where(
                        ['nov'=>$nov, 'ua'=>$ua, 'ext'=>$ext, 'car'=>$car])->limit(1)->update(
                            ['usuario' => $usuario]);*/

        return json_encode($nov);

    }

    public function CarreraExonerar(Request $request){

        $ua = $request["ua"];
        $ext = $request["ext"];
        $car = $request["car"];

        $carreras = $this->getCarrera($ua, $ext, $car);

        if(!$carreras){
            return response()->json(['statusCode' => 401, 'body' => "Imposible de realizar, los datos ingresados en los campos de unidad academica, extension o carrera no son correctos."]);;
        }

        return json_encode($carreras);

    }

    public static function getCarrera($cod_ua, $cod_ext, $cod_fac){
        $carreras = DB::select( DB::raw(
            'SELECT f.nomfac as "unidad_academica" , ct.nombre_carrera as "carrera", e.nombre as "extension"
            from carrera_temporal ct, extension e, facultad f
        WHERE ct.codigo_unidad_academica = e.codigo_unidad_academica
            and e.codigo_unidad_academica = f.codfac 
            and ct.codigo_extension = e.codigo_extension
            and f.codfac = '.$cod_ua.' and e.codigo_extension = '.$cod_ext.' and ct.codigo_carrera = '.$cod_fac.';'
        )); //Consulta carreras

        return $carreras;
    }

}