<?php

namespace App\Http\Controllers\PortalAdministrativo;


use App\Http\Controllers\Controller;
use App\Models\Pcb as pcb;
use App\Models\TempPruebaEspecifica as temp_especifica;
use App\Models\UsuarioAccion;
use App\PortalAdministrativo\aspirante as aspirante2;
use App\Models\InformacionAspirante as aspirante;
use App\Models\CicloActivo as ciclo_especificas;
use App\PortalAdministrativo\carrera;
use App\PortalAdministrativo\extension;
use App\PortalAdministrativo\facultad;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Funciones\ConsultaOV;

define('CICLO_ACTUAL','2022');


class aspiranteController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $title="Aspirantes";
        $name = $request->get('nombres');
        $surname = $request->get('apellidos');
        $nov = $request->get('nov');
        $perPage = min($request->get('page_size'),50);
        $count = 0;

        if(!empty($nov))
        {
            $aspirante = aspirante::where('nov',$request['nov'])
                ->paginate($perPage);
            $count = $aspirante->total();
            return view('portalAdministrativo.aspirantes.index', compact('aspirante','title','perPage','nov','count'));
        }

        if (!empty($name) || !empty($surname) ) {
            $aspirante = aspirante::whereRaw('concat(nombre1,nombre2) like ?', str_replace(' ','',"%{$name}%"))
                ->when(isset($surname), function ($query) use ($surname) {
                    return $query->whereRaw('concat(apellido1,apellido2) like ?',  str_replace(' ','',"%{$surname}%"));
                })
                ->paginate($perPage);

            if($aspirante->isEmpty())
            {
                $aspirante = aspirante2::whereRaw('concat(nombre1,nombre2) like ?', str_replace(' ','',"%{$name}%"))
                ->when(isset($surname), function ($query) use ($surname) {
                    return $query->whereRaw('concat(apellido1,apellido2) like ?',  str_replace(' ','',"%{$surname}%"));

                })
                ->paginate($perPage);
            }
            $count = $aspirante->total();
            return view('portalAdministrativo.aspirantes.index', compact('aspirante','title','perPage', 'name','surname','count'));
        }

        return view('portalAdministrativo.aspirantes.index', compact('title','perPage','count'));
    }

    function scopeWithName($query, $name)
    {
        // Split each Name by Spaces
        $names = explode(" ", $name);

        // Search each Name Field for any specified Name
        return aspirante::where(function($query) use ($names) {
            $query->whereIn('nombre1', $names);
            $query->orWhere(function($query) use ($names) {
                $query->whereIn('nombre2', $names);
            });
        });
    }

    /**
     * Display the specified resource.
     *
     * @param aspirante2 $aspirante
     * @return Response
     */
    public function show($id)
    {
        $title="Ver Aspirante";
        $aspirante = aspirante::find($id);
        if($aspirante == null){
            $aspirante = aspirante2::findOrFail($id);
        }
        $pcbs = $this->consultarPruebaBasicasWSSUN($aspirante['nov']);
        return view('portalAdministrativo.aspirantes.show', compact('aspirante','pcbs','title'));
    }

    public function resumenpreinscritos($orden)
    {
        $title = 'Resumen Preinscritos';
        $year = date('Y');
        $porFecha = 0;
        if ($orden === 'UA') {
            $preinscritos = DB::table('preinscripcion')
                ->leftJoin('vst_estudiante', 'preinscripcion.nov', '=', 'vst_estudiante.NOV')
                ->leftJoin('facultad', 'preinscripcion.UA', '=', 'facultad.codfac')
                ->whereNull('vst_estudiante.carnet')
                ->where('preinscripcion.ciclo', '=', $year)
                ->select('preinscripcion.fecha_inscripcion', 'facultad.nomcorto', 'facultad.codfac', DB::raw("count(preinscripcion.fecha_inscripcion) AS total"))
                ->groupBy('preinscripcion.fecha_inscripcion', 'facultad.nomcorto', 'facultad.codfac')
                ->orderBy('facultad.codfac', 'ASC')
                ->orderBy('preinscripcion.fecha_inscripcion', 'ASC')
                ->get();

            return view('portalAdministrativo.aspirantes.resumenpreinscritos', compact('title', 'preinscritos','porFecha'));
        }else{
            $porFecha = 1;
            $central = DB::table('preinscripcion')
                ->leftJoin('vst_estudiante', 'preinscripcion.nov', '=', 'vst_estudiante.NOV')
                ->leftJoin('facultad', 'preinscripcion.UA', '=', 'facultad.codfac')
                ->whereNull('vst_estudiante.carnet')
                ->where('preinscripcion.ciclo', '=', $year)
                ->whereIn('facultad.tipo_ua',array(2,3))
                ->select('preinscripcion.fecha_inscripcion', DB::raw("count(preinscripcion.fecha_inscripcion) AS total"))
                ->groupBy('preinscripcion.fecha_inscripcion')
                ->orderBy('preinscripcion.fecha_inscripcion', 'ASC')
                ->get();
            $preinscritos = DB::table('preinscripcion')
                ->leftJoin('vst_estudiante', 'preinscripcion.nov', '=', 'vst_estudiante.NOV')
                ->leftJoin('facultad', 'preinscripcion.UA', '=', 'facultad.codfac')
                ->whereNull('vst_estudiante.carnet')
                ->where('preinscripcion.ciclo', '=', $year)
                ->whereIn('facultad.tipo_ua',array(1,4))
                ->select('preinscripcion.fecha_inscripcion', 'facultad.nomcorto', 'facultad.codfac', DB::raw("count(preinscripcion.fecha_inscripcion) AS total"))
                ->groupBy('preinscripcion.fecha_inscripcion', 'facultad.nomcorto', 'facultad.codfac')
                ->orderBy('facultad.codfac', 'ASC')
                ->orderBy('preinscripcion.fecha_inscripcion', 'ASC')
                ->get();

            return view('portalAdministrativo.aspirantes.resumenpreinscritos', compact('title', 'preinscritos','central','porFecha'));
        }
        return view('portalAdministrativo.aspirantes.resumenpreinscritos', compact('title', 'preinscritos','porFecha'));
    }

    public function pruebasespe(Request $request)
    {
        $title='Pruebas Específicas';

        $ua = Auth::guard('administrativo')->user()->ua_validas;

        if($ua == 0)
        {
            $unidades = facultad::select('nomfac','codfac')->orderBy('codfac')->get();
        }
        else
        {
            $unidades = facultad::select('nomfac','codfac')->whereIn('codfac', explode(',',$ua))->orderBy('codfac')->get();
        }
        return view('portalAdministrativo.aspirantes.pruebasespe',compact('title','unidades'));
    }


    private function guardarPrueba($request, $ciclo){
        $nov = $request->get('nov');
        $ua = $request->get('ua');
        $ext = $request->get('ext');
        $car = $request->get('car');

        $requestData = array_merge($request->all(),
            ['ciclo' => $ciclo],
            ['usuario' => Auth::guard('administrativo')->user()->login],
            ['fechaCarga' => Carbon::now()],
            ['autorizacion' => 'Carga Individual Fecha: ' . Carbon::now()] );

        $especifica = temp_especifica::where('nov',$nov)
            ->where('ua',$ua)
            ->where('ext',$ext)
            ->where('car',$car)
            ->first();

        if($especifica == null){
            temp_especifica::create($requestData);
        } else {
            $especifica->update($requestData);
        }
        
        $request->session()->flash('alert-success', 'Prueba específica cargada con éxito.');

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria =11;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Cargó la prueba especifica de: ' . $nov .' en la UA: ' . $ua. ' ext: ' . $ext . ' car:' . $car;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

    }
    /**
     * Función para carga individual de
     * pruebas especificas
     * a tabla temporal para aprobación.
     */
    public function cargaPruebasEspecificas(Request $request)
    {

        $this->validate($request, [
            'nov' => 'required',
            'fecha_aprobado' => 'required',
            'fecha_caduca' => 'required',
        ]);

        $nov = $request->get('nov');
        $year = date('Y');

        $aspirante = aspirante2::where('nov', $nov)->first();

        $ciclo_especificas = ciclo_especificas::where('ciclo_activo', $year)->first();

        if($aspirante == null){
            //llamada api rest
            $consultar = ConsultaOV::consultarAspiranteOV($nov);
            if ($consultar == 0){
                $request->session()->flash('alert-danger', 'Aspirante no existe.');
                return redirect( route('administrativo.PruebasEspecificas'));
            }
        }

        $this->guardarPrueba($request, $ciclo_especificas->ciclo_especificas);
        return redirect( route('administrativo.PruebasEspecificas'));
    }

    /**
     * Función para cargar pruebas específicas
     * desde archivo .csv.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function cargarCSVPruebasEspecificas(Request $request)
    {
        $ua_validas = Auth::guard('administrativo')->user()->ua_validas;

        if (!$request->hasFile('csv_pruebas_especificas')) {
            $request->session()->flash('alert-error', 'No se encontro ningún archivo de carga masiva.');
            return redirect( route('administrativo.PruebasEspecificas'));
        }

        $path = $request['csv_pruebas_especificas'];
        $linea = 0;
        $errores = array();

        Excel::load($path)->each(function (Collection $csvLine)  use ($request,&$linea,&$errores,&$ua_validas) {
            $linea = $linea + 1;
            $nov = $csvLine->get('nov');
            $ua = $csvLine->get('ua');
            $ext = $csvLine->get('ext');
            $car = $csvLine->get('car');
            $resultado = $csvLine->get('resultado');

            /*TODO revisar como vienen las fechas */
            $fecha_aprobado = date("Y-m-d", strtotime($csvLine->get('fecha_aprobacion')));
            $fecha_caduca = date("Y-m-d", strtotime($csvLine->get('fecha_aprobacion')."+ 2 year"));

            $aspirante = aspirante2::where('nov', $nov)->first();
            $unidad_academica = facultad::where('codfac', $ua)->first();
            $extension = extension::where('codigo_extension', $ext)->where('codigo_unidad_academica',$ua)->first();
            $mensajeerror = "";
            $carrera = carrera::where('codigo_carrera', $car)->where('codigo_extension', $ext)->where('codigo_unidad_academica',$ua)->first();
            $error = false;
            
            if($aspirante == null || $unidad_academica == null || $extension == null || ($ua != 14 && $carrera == null) || (strtolower($resultado) != 'satisfactorio' && strtolower($resultado) != 'insatisfactorio'))
            {
                Log::debug("ERROR EN LINEA " . $linea);
                if($aspirante == null)
                {
                    //aqui consumir api de orientacion vocacional
                    $consultar = ConsultaOV::consultarAspiranteOV($nov);

                    if ($consultar == 0){
                        Log::debug("ERROR Aspirante no existe. " . $nov);
                        $mensajeerror =  $mensajeerror . "| Aspirante no existe " . $nov;
                        $error = true;
                    }
                }
                    if($unidad_academica == null)
                    {
                        $error = true;
                        Log::debug("ERROR Unidad Académica no existe. " . $ua);
                        $mensajeerror =  $mensajeerror . "| Unidad Académica no existe UA:" . $ua;
                    }

                    if($extension == null)
                    {
                        $error = true;
                        Log::debug("ERROR Extension no existe. " . $ua . " " . $ext);
                        $mensajeerror =  $mensajeerror . "| Extension no existe UA:" . $ua . ", EXT:" . $ext;
                    }

                    if($ua != 14 && $carrera == null)
                    {
                        $error = true;
                        Log::debug("ERROR Carrera no existe. " . $ua . " " . $ext . " " . $car);
                        $mensajeerror =  $mensajeerror . "| Carrera no existe UA:" . $ua . ", EXT:" . $ext . ", CAR:" . $car;
                    }

                    if((strtolower($resultado) != 'satisfactorio' && strtolower($resultado) != 'insatisfactorio'))
                    {
                        $error = true;
                        Log::debug("El resultado debe ser igual a Satisfactorio o Insatisfactorio");
                        $mensajeerror =  $mensajeerror . "| El resultado debe ser igual a Satisfactorio o Insatisfactorio valor=".strtolower($resultado)." no valido" ;
                    }

                    $errores[] = $linea . "  " . $mensajeerror;
            }

            if (!$error){
                $year = date('Y');
                $ciclo_especificas = ciclo_especificas::where('ciclo_activo', $year)->first();

                $requestData = array_merge(
                    ['nov' => (int)$nov],
                    ['ua' => (int)$ua],
                    ['ext' => (int)$ext],
                    ['car' => (int)$car],
                    ['resultado' => $resultado],
                    ['fecha_aprobado' => $fecha_aprobado],
                    ['fecha_caduca' =>  $fecha_caduca],
                    ['ciclo' => $ciclo_especificas->ciclo_especificas],
                    ['usuario' => Auth::guard('administrativo')->user()->login],
                    ['fechaCarga' => Carbon::now()],
                    ['autorizacion' => 'Carga Masiva Fecha: ' . Carbon::now()]);
                # '10'
                $unidades = explode(',',$ua_validas);
                $permiso = $ua_validas == 0 || in_array($ua, $unidades);

                if($permiso){
                    $especifica = temp_especifica::where('nov',$csvLine->get('nov'))
                        ->where('ua',$ua)
                        ->where('ext',$ext)
                        ->where('car',$car)
                        ->first();

                    if($especifica == null){
                        temp_especifica::create($requestData);
                    }
                    else
                    {
                        $especifica->update($requestData);
                    }
                }
            }
                $request->session()->flash('alert-info', 'Se ha finalizado la carga del archivo y se ha descargado un reporte de carga.');
        });

        $this->descargarReporteCargaPruebaEspe($errores);
        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria =11;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Cargó un CSV con resultados de pruebas especificas';
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();
        
        $request->session()->flash('alert-info', 'Se ha finalizado la carga del archivo y se ha descargado un reporte de carga.');
        return redirect( route('administrativo.PruebasEspecificas'));
    }


    public function  descargarPlantillaCSV()
    {
        $encabezadoPlantilla = [];
        array_push($encabezadoPlantilla,'NOV', 'UA', 'EXT', 'CAR', 'RESULTADO','FECHA APROBACIÓN', 'CUI');
        return Excel::create('Plantilla', function($excel) use ($encabezadoPlantilla) {
            $excel->sheet('mySheet', function($sheet) use ($encabezadoPlantilla)
            {
                $sheet->fromArray($encabezadoPlantilla);
            });
        })->download('csv');
    }


    public function  descargarReporteCargaPruebaEspe(Array $errores)
    {
        $contenido =[];
        array_push($contenido,array('Reporte de carga de pruebas especificas'));
        if(empty($errores))
        {
            array_push($contenido,array('Sin errores.'));
        }
        else
        {
            foreach($errores as $error)
            {
                array_push($contenido,array('ERROR EN LINEA: '.$error));
            }
        }

        return Excel::create('Reporte', function($excel) use ($contenido) {
            $excel->sheet('mySheet', function($sheet) use ($contenido)
            {
                $sheet->fromArray($contenido);
            });
        })->download('txt');

        //Log::debug("ERROR EN LINEA" . $contenido[0]);
    }

    /*
     * Función para aprobar pruebas específicas
     * cargadas en tabla "temp_PruebasEspecificas
     * y pasarlas a tabla "PruebasEspecificas
     * */
    public function listadoPruebasEspecificas(Request $request)
    {
        $title="Aprobar Pruebas Específicas";
        $perPage = min($request->get('page_size'),50);
        $ua = Auth::guard('administrativo')->user()->ua_validas;

        $keyword = $request->get('search');
        $cod_ua = $request->input('cod_ua');

        if($ua == 0)
        {
            $unidades = facultad::select('nomfac','codfac')->orderBy('codfac')->get();
            $pruebas = temp_especifica::select('nov','ua','ext','car','resultado','fecha_aprobado')
                ->when($cod_ua > -1, function ($query) use ($cod_ua) {
                    return $query->where('ua', $cod_ua);
                })->paginate($perPage);
        }
        else
        {

//------------------------------------

//------------------------------------
            $unidades = facultad::select('nomfac','codfac')->whereIn('codfac', explode(',',$ua))->orderBy('codfac')->get();
            $pruebas = temp_especifica::select('nov','ua','ext','car','resultado','fecha_aprobado')
                ->whereIn('ua', explode(',',$ua))
                ->when($cod_ua > -1, function ($query) use ($cod_ua) {
                    return $query->where('ua', $cod_ua);
                })->paginate($perPage);
        }


        return view('portalAdministrativo.aspirantes.aprobarPruebasEspecificas',compact('title','unidades','pruebas','keyword','cod_ua'));
    }


    public function aprobarPEIndividual(Request $request)
    {

        $ua = $request['ua'];
        $ext = $request['ext'];
        $car = $request['car'];
        $nov = $request['nov'];

        DB::select( "REPLACE into PruebaEspecifica SELECT * FROM temp_PruebaEspecifica WHERE ua = '$ua'
                and ext = '$ext'
                and car = '$car'
                and nov = '$nov'"  );

        DB::delete( "DELETE FROM temp_PruebaEspecifica WHERE ua = '$ua'
                and ext = '$ext'
                and car = '$car'
                and nov = '$nov'"  );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 5;
        $auditoria->usuario_ip =  $request->ip();
        $auditoria->descripcion = ' aprobó prueba especifica de: ' . $nov . 'en la carrera:  UA:'. $ua . ' EXT:'. $ext . ' CAR:'. $car ;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();
        $request->session()->flash('alert-success', 'Prueba aprobada.');
        return redirect( route('administrativo.aprobarPruebasEspecificas'));
    }

    public function rechazarPEIndividual(Request $request)
    {

        $ua = $request['ua'];
        $ext = $request['ext'];
        $car = $request['car'];
        $nov = $request['nov'];

        DB::delete( "DELETE FROM temp_PruebaEspecifica WHERE ua = '$ua'
                and ext = '$ext'
                and car = '$car'
                and nov = '$nov'"  );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 6;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = ' rechazó prueba especifica de: ' . $nov . 'en la carrera:  UA:'. $ua . ' EXT:'. $ext . ' CAR:'. $car ;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();
        $request->session()->flash('alert-danger', 'Prueba rechazada.');
        return redirect( route('administrativo.aprobarPruebasEspecificas'));
    }

    public function aprobarPETodas()
    {
        $ua = Auth::guard('administrativo')->user()->ua_validas;

        if($ua == 0)
        {

            DB::select( "REPLACE into PruebaEspecifica SELECT * FROM temp_PruebaEspecifica" );
            temp_especifica::query()->truncate();

        }
        else
        {

            DB::select("REPLACE into PruebaEspecifica  SELECT * FROM temp_PruebaEspecifica WHERE ua IN (".$ua.")" );
            DB::delete("DELETE FROM temp_PruebaEspecifica WHERE ua IN (".$ua.")");
        }

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 5;
        $auditoria->usuario_ip =  request()->ip();
        $auditoria->descripcion = ' aprobó las pruebas especificas de todos los estudiantes en las UA:'. $ua;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();


        return redirect( route('administrativo.aprobarPruebasEspecificas'));

    }

    /**
     * Función para consulta
     * de pruebas específicas con WS de SUN.
     * $url = "https://resultadospcbws.usac.edu.gt/resultados";
     *
     * @param - $nov NOV de aspirante a buscar
     * @return - retorno de arreglo con pruebas obtenidas.
     */
    public static function consultarPruebaBasicasWSSUN($nov)
    {
        $client = new Client();
        $url = "https://resultadospcbws.usac.edu.gt/resultados";

        try {
            /*
             * Se obtiene respuesta de WS
             * de SUN.
             * */
            $response = $client->post($url,
                [
                    'auth' => ['RegistroyEstadistica18', '@JELV0685'],
                    'json' => [
                        'nov' => strval($nov)
                    ]
                ]);

            $statuscode = $response->getStatusCode();

            if ($statuscode === 200) {
                $body = $response->getBody();
                $aspiranteSUN= json_decode($body,true);


                return $aspiranteSUN['aprobados'];
            } else {

            }
        }catch (Exception $ex) {

            /*
             * No sé obtuvieron valores de WS del SUN
             * por se carnet muy antiguo
             * por lo cual se procede a obtener
             * valore de tabla pcb_carrera
             * */

            $pruebas = array();
            $pcbs = pcb::select('id_prueba')->where('nov',$nov)->get();
            foreach($pcbs as $pcb)
            {

                if($pcb['id_prueba'] == '1')
                {
                    $pruebas[] = 'Biologia';
                }
                else if($pcb['id_prueba'] == '2')
                {
                    $pruebas[] = 'Física';
                }
                else if($pcb['id_prueba'] == '3')
                {
                    $pruebas[] = 'Lenguaje';
                }
                else if($pcb['id_prueba'] == '4')
                {
                    $pruebas[] = 'Matemática';
                }
                else if($pcb['id_prueba'] == '5')
                {
                    $pruebas[] = 'Química';
                }
            }
            return $pruebas;
        }
    }

}
