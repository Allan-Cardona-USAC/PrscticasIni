<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Models\BitacoraInscripcion;
use App\Models\EstudiaOld as inscrito;
use App\Models\CarreraEstudiante as carrera;
use App\Models\BitacoraInscripcion as inscripcion;
use App\Models\UsuarioAccion;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
class inscritoController extends Controller
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
     * Se puede buscar a los estudiantes inscritos por medio de
     * CUI, Carnet, Nombres y/o apellidos
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $title="Inscritos";
        $name = $request->get('nombres');
        $surname = $request->get('apellidos');
        $carnet_cui = $request->get('carnet_cui');
        $perPage = min($request->get('page_size'),50);
        $count = 0;

        if(!empty($carnet_cui))
        {
            $inscrito = inscrito::where('carnet',$request['carnet_cui'])
                ->paginate($perPage);
            $count = $inscrito->total();

            if($count == 0)
            {
                $inscrito = inscrito::where('cui',$request['carnet_cui'])
                    ->paginate($perPage);
                $count = $inscrito->total();
            }
            return view('portalAdministrativo.inscrito.index', compact('inscrito','title','perPage','carnet_cui','count'));
        }

        if (!empty($name) || !empty($surname) ) {
            $inscrito = inscrito::whereRaw('concat(nombre1,nombre2) like ?', str_replace(' ','',"%{$name}%"))
                ->when(isset($surname), function ($query) use ($surname) {
                    return $query->whereRaw('concat(primer_apellido,segundo_apellido) like ?',  str_replace(' ','',"%{$surname}%"));
                })
                ->paginate($perPage);


            $count = $inscrito->total();
            return view('portalAdministrativo.inscrito.index', compact('inscrito','title','perPage', 'name','surname','count'));
        }

        return view('portalAdministrativo.inscrito.index', compact('title','perPage','count'));
    }

    /**
     * Muestra la informacion del estudiante inscrito
     * @param $id - este parametro es el carnet del estudiante.
     * @return Factory|View
     */
    public function show($id)
    {
        $title="Ver Inscrito";
        $inscrito = inscrito::findOrFail($id);
        $carreras = carrera::where('carnet',$inscrito['carnet'])->get();
        $inscripciones = inscripcion::where('carnet',$inscrito['carnet'])->get();
        $datosSensibles = Auth::guard('administrativo')->user()->getDatosSensibles();

        return view('portalAdministrativo.inscrito.show', compact('inscrito','carreras','inscripciones','title','datosSensibles'));
    }


    /**
     * Muestra la cantidad de inscritos por Facultades, Escuelas, Institutos
     * Y Centros Universitarios
     * @param Request $request
     * @return Factory|View
     */
    public function resumeninscritos(Request $request)
    {
        $title='Resumen Inscritos';
        if($request['ciclo'] === null) {
            $ciclo = date('Y');
        }else{
            $ciclo = $request['ciclo'];
        }

        if($semestre = $request['semestre'] === null){
            $semestre = 0;
        }else {
            $semestre = $request['semestre'];
        }

        $resumenInscritos = DB::select(
                    DB::raw("SELECT
                            tua.tipo,tua.descripcion,
                            count(CASE WHEN bi.carnet like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Primer_Ingreso,
                            count(CASE WHEN ce.sit_acad=0 AND bi.carnet not like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Regular,
                            count(CASE WHEN ce.sit_acad=1 AND na.clase !='Posgrado' then 1 end) AS Incorporado,
                            count(CASE WHEN ce.sit_acad=2 AND na.clase !='Posgrado' then 1 end) AS PEG,
                            count(CASE WHEn ce.sit_acad=3 AND na.clase !='Posgrado' then 1 end) AS Graduado,
                            count(CASE WHEn na.clase='Posgrado' then 1 end) AS Posgrado
                            FROM
                            bitacora_inscripcion bi,
                            facultad ua,
                            tipo_UA tua,
                            carrera_estudiante ce,
                            carrera_temporal c,
                            nivel_academico na
                            WHERE
                            bi.cancelar_matricula = 0
                            AND bi.ciclo = $ciclo
                            AND IF($semestre,bi.semestre=$semestre,bi.semestre)
                            AND ua.codfac = bi.cod_ua
                            AND tua.tipo  = ua.tipo_ua
                            AND ce.carnet = bi.carnet
                            AND ce.codfac = bi.cod_ua
                            AND ce.codext = bi.cod_ext
                            AND ce.codcar = bi.cod_car
                            AND c.codigo_unidad_academica = bi.cod_ua
                            AND c.codigo_extension = bi.cod_ext
                            AND c.codigo_carrera = bi.cod_car
                            AND na.codigo_nivel_academico = c.codigo_nivel
                            group by tua.tipo
                            order by tua.prioridad")
                    );



        return view('portalAdministrativo.inscrito.resumen.resumeninscritos',compact('title','ciclo','semestre','resumenInscritos'));
    }



    /**
     * Muestra la cantidad de inscritos por cada Unidad academica
     * @param Request $request
     * @return Factory|View
     */
    public function resumeninscritosTipoUA(Request $request,$tipo)
    {
        $title='Resumen Inscritos';
        if($request['ciclo'] === null) {
            $ciclo = date('Y');
        }else{
            $ciclo = $request['ciclo'];
        }

        if($semestre = $request['semestre'] === null){
            $semestre = 0;
        }else {
            $semestre = $request['semestre'];
        }

        $resumenInscritos = DB::select(
            DB::raw("SELECT
                            tua.tipo,tua.descripcion,ua.codfac, ua.nomcorto,
                            count(CASE WHEN bi.carnet like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Primer_Ingreso,
                            count(CASE WHEN ce.sit_acad=0 AND bi.carnet not like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Regular,
                            count(CASE WHEN ce.sit_acad=1 AND na.clase !='Posgrado' then 1 end) AS Incorporado,
                            count(CASE WHEN ce.sit_acad=2 AND na.clase !='Posgrado' then 1 end) AS PEG,
                            count(CASE WHEn ce.sit_acad=3 AND na.clase !='Posgrado' then 1 end) AS Graduado,
                            count(CASE WHEn na.clase='Posgrado' then 1 end) AS Posgrado
                            FROM
                            bitacora_inscripcion bi,
                            facultad ua,
                            tipo_UA tua,
                            carrera_estudiante ce,
                            carrera_temporal c,
                            nivel_academico na
                            WHERE
                            bi.cancelar_matricula = 0
                            AND bi.ciclo = $ciclo
                            AND IF($semestre,bi.semestre=$semestre,bi.semestre)
                            AND ua.codfac = bi.cod_ua
                            AND tua.tipo  = ua.tipo_ua
                            AND ce.carnet = bi.carnet
                            AND ce.codfac = bi.cod_ua
                            AND ce.codext = bi.cod_ext
                            AND ce.codcar = bi.cod_car
                            AND c.codigo_unidad_academica = bi.cod_ua
                            AND c.codigo_extension = bi.cod_ext
                            AND c.codigo_carrera = bi.cod_car
                            AND na.codigo_nivel_academico = c.codigo_nivel
                            AND ua.tipo_ua = $tipo
                            group by tua.tipo,ua.codfac
                            order by tua.prioridad")
        );

        return view('portalAdministrativo.inscrito.resumen.resumeninscritosTipoUA',compact('title','ciclo','semestre','resumenInscritos','tipo'));
    }


    /**
     * Muestra la cantidad de inscritos por cada extension de la Unidad academica
     * seleccionada
     * @param Request $request
     * @param $tipo - Esta variable es el tipo de la unidad academica
     * @param $ua - Esta vadiable es la unidad academica seleccionada
     * @return Factory|View
     */
    public function resumeninscritosUA(Request $request,$tipo,$ua)
    {
        $title='Resumen Inscritos';
        if($request['ciclo'] === null) {
            $ciclo = date('Y');
        }else{
            $ciclo = $request['ciclo'];
        }

        if($semestre = $request['semestre'] === null){
            $semestre = 0;
        }else {
            $semestre = $request['semestre'];
        }

        $resumenInscritos = DB::select(
            DB::raw("SELECT
                            ua.codfac, ua.nomcorto,ext.codigo_extension,ext.nombre,
                            count(CASE WHEN bi.carnet like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Primer_Ingreso,
                            count(CASE WHEN ce.sit_acad=0 AND bi.carnet not like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Regular,
                            count(CASE WHEN ce.sit_acad=1 AND na.clase !='Posgrado' then 1 end) AS Incorporado,
                            count(CASE WHEN ce.sit_acad=2 AND na.clase !='Posgrado' then 1 end) AS PEG,
                            count(CASE WHEn ce.sit_acad=3 AND na.clase !='Posgrado' then 1 end) AS Graduado,
                            count(CASE WHEn na.clase='Posgrado' then 1 end) AS Posgrado
                            FROM
                            bitacora_inscripcion bi,
                            facultad ua,
                            tipo_UA tua,
                            carrera_estudiante ce,
                            extension ext,
                            carrera_temporal c,
                            nivel_academico na
                            WHERE
                            bi.cancelar_matricula = 0
                            AND bi.ciclo = $ciclo
                            AND IF($semestre,bi.semestre=$semestre,bi.semestre)
                            AND ua.codfac = bi.cod_ua
                            AND tua.tipo  = ua.tipo_ua
                            AND ce.carnet = bi.carnet
                            AND ce.codfac = bi.cod_ua
                            AND ce.codext = bi.cod_ext
                            AND ce.codcar = bi.cod_car
                            AND c.codigo_unidad_academica = bi.cod_ua
                            AND c.codigo_extension = bi.cod_ext
                            AND c.codigo_carrera = bi.cod_car
                            AND na.codigo_nivel_academico = c.codigo_nivel
                            AND ua.tipo_ua = $tipo
                            AND ext.codigo_unidad_academica = bi.cod_ua
                            AND ext.codigo_extension = bi.cod_ext
                            AND ua.codfac = $ua
                            group by ua.codfac,ext.codigo_extension
                            order by tua.prioridad")
        );

        return view('portalAdministrativo.inscrito.resumen.resumeninscritosUA',compact('title','ciclo','semestre','resumenInscritos','tipo','ua'));
    }


    /**
     * Muestra la cantidad de inscritos por cada carrera de la extension
     * de la Unidad academica seleccionada
     * @param Request $request
     * @param $tipo - Esta variable es el tipo de la unidad academica
     * @param $ua - Esta variable es la unidad academica seleccionada
     * @param $ext - Esta variable es la extension de la unidad academica seleccionada
     * @return Factory|View
     */
    public function resumeninscritosEXT(Request $request,$tipo,$ua,$ext)
    {
        $title='Resumen Inscritos';
        if($request['ciclo'] === null) {
            $ciclo = date('Y');
        }else{
            $ciclo = $request['ciclo'];
        }

        /** Valores de semestre
         * 0 - Ambos
         * 1 - Primero
         * 2 - Segundo
        **/
        if($semestre = $request['semestre'] === null){
            $semestre = 0;
        }else {
            $semestre = $request['semestre'];
        }

        $resumenInscritos = DB::select(
            DB::raw("SELECT 
                            ua.codfac, ua.nomcorto,ext.codigo_extension,ext.nombre,c.codigo_carrera,c.nombre_carrera,
                            count(CASE WHEN bi.carnet like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Primer_Ingreso,
                            count(CASE WHEN ce.sit_acad=0 AND bi.carnet not like '$ciclo%' AND na.clase !='Posgrado' then 1 end) AS Regular,
                            count(CASE WHEN ce.sit_acad=1 AND na.clase !='Posgrado' then 1 end) AS Incorporado,
                            count(CASE WHEN ce.sit_acad=2 AND na.clase !='Posgrado' then 1 end) AS PEG,
                            count(CASE WHEn ce.sit_acad=3 AND na.clase !='Posgrado' then 1 end) AS Graduado,
                            count(CASE WHEn na.clase='Posgrado' then 1 end) AS Posgrado
                            FROM 
                            bitacora_inscripcion bi,
                            facultad ua, 
                            tipo_UA tua,
                            carrera_estudiante ce,
                            extension ext,
                            carrera_temporal c,
                            nivel_academico na
                            WHERE
                            bi.cancelar_matricula = 0
                            AND bi.ciclo = $ciclo
                            AND IF($semestre,bi.semestre=$semestre,bi.semestre)
                            AND ua.codfac = bi.cod_ua
                            AND tua.tipo  = ua.tipo_ua
                            AND ce.carnet = bi.carnet
                            AND ce.codfac = bi.cod_ua
                            AND ce.codext = bi.cod_ext
                            AND ce.codcar = bi.cod_car
                            AND c.codigo_unidad_academica = bi.cod_ua
                            AND c.codigo_extension = bi.cod_ext
                            AND c.codigo_carrera = bi.cod_car
                            AND na.codigo_nivel_academico = c.codigo_nivel
                            AND ua.tipo_ua = $tipo
                            AND ext.codigo_unidad_academica = bi.cod_ua
                            AND ext.codigo_extension = bi.cod_ext
                            AND ua.codfac = $ua
                            AND bi.cod_ext = $ext
                            group by ua.codfac,ext.codigo_extension,c.codigo_carrera
                            order by tua.prioridad;")
        );

        return view('portalAdministrativo.inscrito.resumen.resumeninscritosEXT',compact('title','ciclo','semestre','resumenInscritos','tipo','ua','ext'));
    }


    /**
     * Muestra los estudiantes inscritos en la carrera seleccionada
     * @param Request $request
     * @param $tipo - Esta variable es el tipo de la unidad academica
     * @param $ua - Esta variable es la unidad academica seleccionada
     * @param $ext - Esta variable es la extension de la unidad academica seleccionada
     * @param $carrera - Esta variable es la carrera seleccionada
     * @return Factory|View
     */
    public function resumeninscritosCARRERA(Request $request, $tipo, $ua, $ext, $carrera)
    {
        $title='Resumen Inscritos';
        if($request['ciclo'] === null) {
            $ciclo = date('Y');
        }else{
            $ciclo = $request['ciclo'];
        }

        /** Valores de semestre
         * 0 - Ambos
         * 1 - Primero
         * 2 - Segundo
         **/
        if($semestre = $request['semestre'] === null){
            $semestre = 0;
        }else {
            $semestre = $request['semestre'];
        }

        $ListadoResumenInscritos = DB::select(
            DB::raw("SELECT 
                            na.clase,ua.codfac, ua.nomcorto,ext.codigo_extension,ext.nombre,c.codigo_carrera,c.nombre_carrera,
                            e.carnet,  trim(CONCAT_WS(' ',e.primer_apellido,e.segundo_apellido,e.nombre1,e.nombre2,e.nombre)) nombre_estudiante,
                            DATE_FORMAT(bi.fecha_inscripcion,'%d/%m/%Y') fecha_inscripcion,
                            concat(ce.sit_acad,' = ',if(ce.sit_acad=1,'incorporado',if(ce.sit_acad=2,'p.e.g.',if(sit_acad=3,'graduado','regular')))
                            ) situacion,
                            if(ce.fec_cierre='0000-00-00','',DATE_FORMAT(ce.fec_cierre,'%d/%m/%Y')) fec_cierre,
                            if(ce.fec_gradua='0000-00-00','',DATE_FORMAT(ce.fec_gradua,'%d/%m/%Y')) graduado,
                            bi.semestre
                            FROM 
                            bitacora_inscripcion bi,
                            facultad ua, 
                            tipo_UA tua,
                            carrera_estudiante ce,
                            extension ext,
                            carrera_temporal c,
                            nivel_academico na,
                            estudia_old e
                            WHERE
                            bi.cancelar_matricula = 0
                            AND bi.ciclo = $ciclo
                            AND IF($semestre,bi.semestre=$semestre,bi.semestre)
                            AND ua.codfac = bi.cod_ua
                            AND tua.tipo  = ua.tipo_ua
                            AND ce.carnet = bi.carnet
                            AND ce.codfac = bi.cod_ua
                            AND ce.codext = bi.cod_ext
                            AND ce.codcar = bi.cod_car
                            AND c.codigo_unidad_academica = bi.cod_ua
                            AND c.codigo_extension = bi.cod_ext
                            AND c.codigo_carrera = bi.cod_car
                            AND na.codigo_nivel_academico = c.codigo_nivel
                            AND ua.tipo_ua = $tipo
                            AND ext.codigo_unidad_academica = bi.cod_ua
                            AND ext.codigo_extension = bi.cod_ext
                            AND ua.codfac = $ua
                            AND bi.cod_ext = $ext
                            AND e.carnet = bi.carnet
                            And c.codigo_carrera = $carrera
                            group by ua.codfac,ext.codigo_extension,c.codigo_carrera,e.carnet,fecha_inscripcion,bi.semestre
                            order by tua.prioridad;")
        );

        //Llamada a método para paginar resultados.
        $resumenInscritos = $this->paginate($ListadoResumenInscritos, $perPage = 15, Paginator::resolveCurrentPage(), ['path' => Paginator::resolveCurrentPath()]);

        return view('portalAdministrativo.inscrito.resumen.resumeninscritosCarrera',compact('title','ciclo','semestre','resumenInscritos','ListadoResumenInscritos','tipo','ua','ext','carrera'));
    }

    /** Paginación de collection o Array
     * Utilizado para paginación de resultado de estudiantes inscritos.
     * @param $items
     * @param $perPage
     * @param $page
     * @param $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    /**
     * @param Request $request
     * @param $ciclo
     * @param $semestre
     * @param $tipo
     * @param $ua
     * @param $ext
     * @param $carrera
     * @param $modo
     * @return mixed
     */
    public function  descargarCSV(Request $request, $ciclo, $semestre, $tipo, $ua, $ext, $carrera)
    {

        $modo = $request['Filtrado'];
        $datosSensibles = Auth::guard('administrativo')->user()->getDatosSensibles();
        $datos = [];
        if ($modo === '0'){
            $modoNombre = 'General';
        }elseif ($modo === '1'){
            $modoNombre  = 'Primer_Ingreso';
        }elseif ($modo === '2'){
            $modoNombre = 'Reingreso';
        }elseif($modo === '3'){
            $modoNombre = 'Posgrado';
        }


        $resumenInscritos= $this->obtenerDatosEstudiante($modo,$ciclo, $semestre, $tipo, $ua, $ext, $carrera);

        if(!$datosSensibles){
            foreach ($resumenInscritos as $fila){
                $fila['telefono'] = "0";
                $fila['celular'] = "0";
                $fila['email'] = " ";
                $datos[] = $fila;
            }
            $resumenInscritos = $datos;
        }

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 8;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Descargó el csv de: ciclo' . $ciclo .' Semestre: ' . $semestre . ' UA: ' . $ua. ' ext: ' . $ext . ' car:' . $carrera;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        return Excel::create('Inscritos_'.$modoNombre. '_'.$resumenInscritos[0]['facultad'] .'_' . $ciclo, function($excel) use ($resumenInscritos,$datosSensibles) {
                $excel->sheet('mySheet', function($sheet) use ($resumenInscritos,$datosSensibles)
                {

                    $sheet->fromArray($resumenInscritos);
                });
            })->download('csv');



    }


    /**
     * @param $modo
     * @param $ciclo
     * @param $semestre
     * @param $tipo
     * @param $ua
     * @param $ext
     * @param $carrera
     * @return array
     */
    public function obtenerDatosEstudiante($modo,$ciclo,$semestre,$tipo,$ua,$ext,$carrera){

        ini_set('memory_limit','384M');
        $datos = DB::select(
            DB::raw("SELECT        
                                bi.carnet, 
                                TRIM(CONCAT_WS(' ',e.primer_apellido,e.segundo_apellido,e.nombre1,e.nombre2,e.nombre)) nombre,
                                bi.cod_ua as UA, bi.cod_ext as ext, bi.cod_car as car, bi.ciclo, bi.semestre,
                                DATE_FORMAT(bi.fecha_inscripcion,'%d-%m-%Y') fecha_inscripcion,
                                CONCAT(ce.sit_acad,' = ',
                                                IF(ce.sit_acad=1,'incorporado',IF(ce.sit_acad=2,'p.e.g.',IF(sit_acad=3,'graduado','regular')))
                                        ) situacion,
                                IF(ce.fec_cierre='0000-00-00','',DATE_FORMAT(ce.fec_cierre,'%d-%m-%Y')) fecha_cierre,
                                IF(ce.fec_gradua='0000-00-00','',DATE_FORMAT(ce.fec_gradua,'%d-%m-%Y')) graduado,
                                e.sexo,e.fec_nac, e.telefono AS telefono, e.celular AS celular, e.email AS email,e.lug_nac, e.cod_nac, ce.carnet_ant,
                                e.cod_orien, c.codigo_nivel nivel, ua.nomfac facultad, ext.nombre extension, c.nombre_carrera carrera, e.pin,
                                (CASE WHEN e.cod_nac=30 AND CHAR_LENGTH(e.cui)=13 THEN e.cui ELSE '' END) AS cui, 
                                (CASE WHEN e.cod_nac!=30 THEN e.numero_registro ELSE '' END) AS numero_pasaporte,
                                e.nombre1,e.nombre2,e.nombre AS otros_nombres,e.primer_apellido,e.segundo_apellido
                          FROM         
                                bitacora_inscripcion bi, ciclo_activo ca,
                                facultad ua, tipo_UA tua,
                                carrera_temporal c,
                                nivel_academico na,
                                carrera_estudiante ce,
                                extension ext,
                                estudia_old e
                         WHERE 
                            bi.cancelar_matricula = 0
                           AND IF($modo = 1,bi.carnet like '$ciclo%' AND na.clase !='Posgrado',1)
                           AND IF($modo = 2,bi.carnet not like '$ciclo%' AND na.clase !='Posgrado',1)
                           AND IF($modo = 3,na.clase='Posgrado',1)
                           AND IF($ua,bi.cod_UA = $ua, bi.cod_ua)
                           AND IF($ext=100,bi.cod_ext<100,bi.cod_ext=$ext)
                           AND IF($carrera,bi.cod_car=$carrera,bi.cod_car)
                           AND bi.ciclo = $ciclo
                           AND IF($semestre,bi.semestre=$semestre,bi.semestre) 
                           AND ua.codfac = bi.cod_ua
                           AND IF($tipo,ua.tipo_ua=$tipo,ua.tipo_ua) 
                           AND tua.tipo  = ua.tipo_ua
                           AND c.codigo_unidad_academica = bi.cod_ua
                           AND c.codigo_extension = bi.cod_ext
                           AND c.codigo_carrera = bi.cod_car
                           AND c.codigo_nivel IN (0,1,2,3,4,5,6,7,8,9) 
                           AND na.codigo_nivel_academico = c.codigo_nivel
                           AND ce.carnet = bi.carnet
                           AND ce.codfac = bi.cod_ua
                           AND ce.codext = bi.cod_ext
                           AND ce.codcar = bi.cod_car
                           AND ext.codigo_unidad_academica = bi.cod_ua
                           AND ext.codigo_extension = bi.cod_ext
                           AND e.carnet = bi.carnet
                         ORDER BY bi.carnet")
        );

        $datos = json_decode( json_encode($datos), true);

        return $datos;

    }

}
