<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Models\Extension as extension;
use App\Models\NivelAcademico;
use App\Models\CarreraSolicitud as carrera;
use App\Models\PcbCarrera;
use App\Models\UsuarioAccion;
use App\PortalAdministrativo\facultad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class carreraSolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $title="Solicitudes de Carrera";
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'),50);
        $extensiones = null;
        $unidades = facultad::all();
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_niv = $request->input('cod_niv');
        $niveles = NivelAcademico::select('codigo_nivel_academico','nombre')->get();

        if($cod_ua > -1)
        {
            $extensiones = extension::select('codigo_extension','nombre')->where('codigo_unidad_academica',$cod_ua)->orderBy('codigo_extension')->get();
        }

        if (!empty($keyword)) {
            $carrera = carrera::where('codigo_carrera', 'LIKE', "%$keyword%")
                ->orWhere('nombre_carrera', 'LIKE', "%$keyword%")
                ->orWhere('titulo_masculino', 'LIKE', "%$keyword%")
                ->orWhere('titulo_femenino', 'LIKE', "%$keyword%")
                ->when($cod_ua > -1, function ($query) use ($cod_ua,$cod_ext) {
                    return $query->where('codigo_unidad_academica',  $cod_ua)

                        ->when($cod_ext > -1, function ($query) use ($cod_ext) {
                            return $query->where('codigo_extension', $cod_ext);
                        });
                })->when($cod_niv > -1, function ($query) use ($cod_niv) {
                    return $query->where('codigo_nivel', $cod_niv);
                })

                ->paginate($perPage);
        } else {
            $carrera = carrera::when($cod_ua > -1, function ($query) use ($cod_ua,$cod_ext) {
                return $query->where('codigo_unidad_academica',  $cod_ua)

                    ->when($cod_ext > -1, function ($query) use ($cod_ext) {
                        return $query->where('codigo_extension', $cod_ext);
                    });
            })->when($cod_niv > -1, function ($query) use ($cod_niv) {
                return $query->where('codigo_nivel', $cod_niv);
            })
                ->paginate($perPage);
        }
        return view('portalAdministrativo.solicitud-carrera.index', compact('carrera','title','perPage', 'keyword','unidades','cod_ua','extensiones','cod_ext','niveles','cod_niv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title="Solicitud de carrera";
        $unidades = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
        $extensiones = extension::all();
        $niveles = NivelAcademico::select('codigo_nivel_academico','nombre')->get();
        return view('portalAdministrativo.solicitud-carrera.create',compact('title','unidades','extensiones','niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'codigo_unidad_academica' => 'required|min:0|max:255',
            'codigo_extension' => 'required|min:0|max:255',
            'codigo_carrera' => 'required|min:0|max:255',
            'codigo_nivel' => 'required|min:0|max:255',
            'nombre_carrera' => 'required|max:200',
            'titulo_masculino' => 'required|max:200',
            'titulo_femenino' => 'required|max:200',
            'telefono' => 'required|max:20',
            'email' => 'required|max:50',
            'pagina_web' => 'required|max:50',
            'fecha_solicitud' => 'required',
            'fecha_creacion' => 'required',
            'estado_ingreso' => 'min:0|max:1',
            'estado_reingreso' => 'min:0|max:1',
            'estado_peg' => 'min:0|max:1',
            'estado_graduados' => 'min:0|max:1',
            'requiere_cierre' => 'min:0|max:1',
            'requiere_privado' => 'min:0|max:1',
            'requiere_publico' => 'min:0|max:1',
            'requiere_eps' => 'min:0|max:1',
            'requiere_tesis' => 'min:0|max:1',
            'prerequisito' => 'min:0|max:1',
            'descripcion' => 'required|max:250',
            'car_multiple' => 'required|min:0|max:1',
            'pruebaEspecifica' => 'min:0|max:1',
            'copia_acta' => 'required|max:400|nullable',
        ]);

        //Asignación de valores debido a que checkbox no manda valor en request al no estar chequeado.
        $estado_ingreso = isset($request->estado_ingreso) ? 1 : 0;
        $estado_reingreso = isset($request->estado_reingreso) ? 1 : 0;
        $estado_peg = isset($request->estado_peg) ? 1 : 0;
        $estado_graduados = isset($request->estado_graduados) ? 1 : 0;
        $requiere_cierre = isset($request->requiere_cierre) ? 1 : 0;
        $requiere_privado = isset($request->requiere_privado) ? 1 : 0;
        $requiere_publico = isset($request->requiere_publico) ? 1 : 0;
        $requiere_eps = isset($request->requiere_eps) ? 1 : 0;
        $requiere_tesis = isset($request->requiere_tesis) ? 1 : 0;
        $prerequisito = isset($request->prerequisito) ? 1 : 0;

        #Pruebas básicas de carrera.
        $pcb_1 = isset($request->pcb_1) ? 1 : 0;
        $pcb_2 = isset($request->pcb_2) ? 1 : 0;
        $pcb_3 = isset($request->pcb_3) ? 1 : 0;
        $pcb_4 = isset($request->pcb_4) ? 1 : 0;
        $pcb_5 = isset($request->pcb_5) ? 1 : 0;


        $request->merge(['estado_ingreso' => $estado_ingreso]);
        $request->merge(['estado_reingreso' => $estado_reingreso]);
        $request->merge(['estado_peg' => $estado_peg]);
        $request->merge(['estado_graduados' => $estado_graduados]);
        $request->merge(['requiere_cierre' => $requiere_cierre]);
        $request->merge(['requiere_privado' => $requiere_privado]);
        $request->merge(['requiere_publico' => $requiere_publico]);
        $request->merge(['requiere_eps' => $requiere_eps]);
        $request->merge(['requiere_tesis' => $requiere_tesis]);
        $request->merge(['prerequisito' => $prerequisito]);



        #Chequear si ya existe carrera. (Llave primaria compuesta)
        $carrera = \App\PortalAdministrativo\carrera::where('codigo_unidad_academica',$request['codigo_unidad_academica'])
            ->where('codigo_extension',$request['codigo_extension'])
            ->where('codigo_carrera',$request['codigo_carrera'])
            ->first();

        if($carrera != null){
            $request->session()->flash('alert-danger', 'Ya existe carrera con este código en unidad academica específicada y extensión.');
            return redirect('carreraSolicitud/create');
        }

        $requestData = array_merge($request->all(),
            ['fecha_u' => Carbon::now()],
            ['usuario' => Auth::guard('administrativo')->user()->login]);

        //Guardar archivos
        if ($request->hasFile('copia_acta')) {
            $requestData['copia_acta'] = $request->file('copia_acta')
                ->store('uploads/actas_carrera', 'public');
        }

        carrera::create($requestData);

        #Pcbs de carrera
        $pcb_carrera = array_merge(
            ['ua' => $request['codigo_unidad_academica']],
            ['ext' => $request['codigo_extension']],
            ['car' => $request['codigo_carrera']]
        );

        if($pcb_1 == 1)
        {
            $pcb_carrera = array_merge(array_merge($pcb_carrera, ['id_pcb' => 1]));
            PcbCarrera::updateOrCreate($pcb_carrera);
        }

        if($pcb_2 == 1)
        {
            $pcb_carrera = array_merge(array_merge($pcb_carrera, ['id_pcb' => 2]));
            PcbCarrera::updateOrCreate($pcb_carrera);
        }

        if($pcb_3 == 1)
        {
            $pcb_carrera = array_merge(array_merge($pcb_carrera, ['id_pcb' => 3]));
            PcbCarrera::updateOrCreate($pcb_carrera);
        }

        if($pcb_4 == 1)
        {
            $pcb_carrera = array_merge(array_merge($pcb_carrera, ['id_pcb' => 4]));
            PcbCarrera::updateOrCreate($pcb_carrera);
        }

        if($pcb_5 == 1)
        {
            $pcb_carrera = array_merge(array_merge($pcb_carrera, ['id_pcb' => 5]));
            PcbCarrera::updateOrCreate($pcb_carrera);
        }

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 1;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'creó la solicitud de carrera: UA:' . $request['codigo_unidad_academica'] . ' ext:' . $request['codigo_extension'] . ' car:' . $request['codigo_carrera'];
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Solicitud de carrera creada con éxito.');
        return redirect('carreraSolicitud')->with('flash_message', 'carrera added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $title="Ver Carrera";
        $carrera = carrera::findOrFail($id);

        return view('portalAdministrativo.carrera.show', compact('carrera','title'));
    }

    public function showCarreraSolicitud($id,$ext,$ua)
    {
        $title="Ver Solicitud Carrera";
        $carrera = carrera::where('codigo_carrera',$id)->where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();

        return view('portalAdministrativo.solicitud-carrera.show', compact('carrera','title'));
    }

    public function aprobarSolicitudCarrera(Request $request)
    {
        $ua = $request['ua'];
        $ext = $request['ext'];
        $car = $request['car'];

        $carrera = \App\PortalAdministrativo\carrera::where('codigo_unidad_academica',$request['ua'])
            ->where('codigo_extension',$request['ext'])
            ->where('codigo_carrera',$request['car'])
            ->first();

        if($carrera != null){
            $request->session()->flash('alert-danger', 'Ya existe carrera con este código en unidad academica y extensión especificada.');
            return redirect('solicitud-carrera/create');
        }

        DB::select( "INSERT into carrera_temporal SELECT * FROM carrera_solicitud WHERE codigo_unidad_academica = '$ua'
                and codigo_extension = '$ext'
                and codigo_carrera = '$car'"
                );

        DB::delete( "DELETE FROM carrera_solicitud WHERE codigo_unidad_academica = '$ua'
                and codigo_extension = '$ext'
                and codigo_carrera = '$car'
                " );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 6;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Aprobó solicitud de carrera: Unidad Académica ' . $ua . ' Extensión '. $ext . ' Carrera ' . $car;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        return redirect( 'carreraSolicitud');
    }

    public function rechazarSolicitudCarrera(Request $request)
    {
        $ua = $request['ua'];
        $ext = $request['ext'];
        $car = $request['car'];

        DB::delete( "DELETE FROM carrera_solicitud WHERE codigo_unidad_academica = '$ua'
                and codigo_extension = '$ext'
                and codigo_carrera = '$car'
                "  );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 6;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Denegó solicitud de carrera: Unidad Académica ' . $ua . ' Extensión '. $ext . ' Carrera ' . $car;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        return redirect( 'carreraSolicitud');
    }

}
