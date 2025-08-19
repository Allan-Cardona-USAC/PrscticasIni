<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\UsuarioAccion;
use App\PortalAdministrativo\carrera;
use App\PortalAdministrativo\facultad;
use App\Models\Extension as extension;
use App\Models\PcbCarrera;
use App\Models\NivelAcademico;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class carreraController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.abcCarrera:administrativo',
            ['only' => [
                'create',
                'edit',
                'editCarrera',
                'darDeBajaCarrera',
                'activarCarrera'
            ]]);
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $title="Carreras";
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'),50);
        $extensiones = null;
        $unidades = facultad::all();
        $cod_ua = $request->input('cod_ua');
        $cod_ext = $request->input('cod_ext');
        $cod_niv = $request->input('cod_niv');

        if($cod_ua > -1)
        {
            $extensiones = extension::select('codigo_extension','nombre')->where('codigo_unidad_academica',$cod_ua)->orderBy('codigo_extension')->get();
        }

        $niveles = NivelAcademico::select('codigo_nivel_academico','nombre')->get();

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
        return view('portalAdministrativo.carrera.index', compact('carrera','title','perPage', 'keyword','unidades','cod_ua','extensiones','cod_ext','niveles','cod_niv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $title="Crear Carrera";
        $unidades = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
        $extensiones = extension::all();
        $niveles = NivelAcademico::select('codigo_nivel_academico','nombre')->get();
        return view('portalAdministrativo.carrera.create',compact('title','unidades','extensiones','niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
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
			'fecha_activacion' => 'required',
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
			'pruebaEspecifica' => 'min:0|max:1'
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



        #Chequear si ya existe extensión. (Llave primaria compuesta)
        $carrera = carrera::where('codigo_unidad_academica',$request['codigo_unidad_academica'])
            ->where('codigo_extension',$request['codigo_extension'])
            ->where('codigo_carrera',$request['codigo_carrera'])
            ->first();

        if($carrera != null){
            $request->session()->flash('alert-danger', 'Ya existe carrera con este código en unidad academica específicada y extensión.');
            return redirect('carrera/create');
        }

        $requestData = array_merge($request->all(),
            ['fecha_u' => Carbon::now()],
            ['usuario' => Auth::guard('administrativo')->user()->login]);

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
        $auditoria->descripcion = 'creó la carrera: UA:' . $request['codigo_unidad_academica'] . ' ext:' . $request['codigo_extension'] . ' car:' . $request['codigo_carrera'];
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Carrera creada con éxito.');
        return redirect('carrera')->with('flash_message', 'carrera added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function show($id)
    {
        $title="Ver Carrera";
        $carrera = carrera::findOrFail($id);

        return view('portalAdministrativo.carrera.show', compact('carrera','title'));
    }

    public function showCarrera($id,$ext,$ua)
    {
        $title="Ver Carrera";
        $carrera = carrera::where('codigo_carrera',$id)->where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();

        return view('portalAdministrativo.carrera.show', compact('carrera','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function edit($id)
    {
        $title="Editar Carrera";
        $carrera = carrera::findOrFail($id);

        return view('portalAdministrativo.carrera.edit', compact('carrera','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @param $ext
     * @param $ua
     * @return View
     */

    public function editCarrera($id,$ext,$ua)
    {
        $title="Editar Carrera";
        $unidades = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
        $extensiones = extension::select('codigo_extension','nombre')->where('codigo_unidad_academica',$ua)->orderBy('codigo_extension')->get();
        $carrera = carrera::where('codigo_carrera',$id)->where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();
        $pcbs = PcbCarrera::where('ua',$ua)->where('ext',$ext)->where('car',$id)->get();
  	$niveles = NivelAcademico::select('codigo_nivel_academico','nombre')->get();
	return view('portalAdministrativo.carrera.edit', compact('carrera','title','unidades','extensiones','pcbs','niveles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, $id)
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
			'fecha_activacion' => 'required',
			'fecha_creacion' => 'required',
			'estado_ingreso' => 'min:0|max:255',
			'estado_reingreso' => 'min:0|max:255',
			'estado_peg' => 'min:0|max:255',
			'estado_graduados' => 'min:0|max:255',
			'requiere_cierrre' => 'min:0|max:255',
			'requiere_privado' => 'min:0|max:255',
			'requiere_publico' => 'min:0|max:255',
			'requiere_eps' => 'min:0|max:255',
			'requiere_tesis' => 'min:0|max:255',
			'prerequisito' => 'min:0|max:255',
			'descripcion' => 'required|max:250',
			'car_multiple' => 'required|min:0|max:32767',
			'pruebaEspecifica' => 'min:0|max:1'
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
        $pruebaEspecifica = isset($request->pruebaEspecifica) ? 1 : 0;

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
        $request->merge(['prerequisito' => $pruebaEspecifica]);


        $requestData = array_merge($request->all(),
            ['fecha_u' => Carbon::now()],
            ['usuario' => Auth::guard('administrativo')->user()->login]
        );

        $carrera = carrera::where('codigo_unidad_academica',$request['codigo_unidad_academica'])
            ->where('codigo_extension',$request['codigo_extension'])
            ->where('codigo_carrera',$request['codigo_carrera'])
            ->first();
        $carrera->update($requestData);

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



        if($pcb_1 == 0)
        {
            $pcb = PcbCarrera::where('id_pcb', 1)
                ->where('ua',$pcb_carrera['ua'])
                ->where('ext',$pcb_carrera['ext'])
                ->where('car',$pcb_carrera['car'])
                ;
            $pcb->delete();
        }

        if($pcb_2 == 0)
        {
            $pcb = PcbCarrera::where('id_pcb', 2)
                ->where('ua',$pcb_carrera['ua'])
                ->where('ext',$pcb_carrera['ext'])
                ->where('car',$pcb_carrera['car'])
                ;
            $pcb->delete();
        }

        if($pcb_3 == 0)
        {
            $pcb = PcbCarrera::where('id_pcb', 3)
                ->where('ua',$pcb_carrera['ua'])
                ->where('ext',$pcb_carrera['ext'])
                ->where('car',$pcb_carrera['car'])
                ;
            $pcb->delete();
        }

        if($pcb_4 == 0)
        {
            $pcb = PcbCarrera::where('id_pcb', 4)
                ->where('ua',$pcb_carrera['ua'])
                ->where('ext',$pcb_carrera['ext'])
                ->where('car',$pcb_carrera['car'])
                ;
            $pcb->delete();
        }

        if($pcb_5 == 0)
        {
            $pcb = PcbCarrera::where('id_pcb', 5)
                ->where('ua',$pcb_carrera['ua'])
                ->where('ext',$pcb_carrera['ext'])
                ->where('car',$pcb_carrera['car'])
                ;
            $pcb->delete();
        }

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 2;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'actualizó la carrera: UA:' . $request['codigo_unidad_academica'] . ' ext:' . $request['codigo_extension'] . ' car:' . $request['codigo_carrera'];
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Carrera actualizada con éxito.');
        return redirect('carrera')->with('flash_message', 'carrera updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        carrera::destroy($id);

        return redirect('portalAdministrativo.carrera')->with('flash_message', 'carrera deleted!');
    }

    public function darDeBajaCarrera($id,$ext,$ua)
    {
        $title="Dar de Baja Extensión";
        $carrera = carrera::where('codigo_carrera',$id)
            ->where('codigo_extension',$ext)
            ->where('codigo_unidad_academica',$ua)
            ->firstOrFail();
        return view('portalAdministrativo.carrera.darDeBajaCarrera', compact('carrera','title'));
    }


    public function carreraDesactivada(Request $request, $id, $ext,$ua)
    {
        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);

        $carrera = carrera::where('codigo_carrera',$id)
            ->where('codigo_extension',$ext)
            ->where('codigo_unidad_academica',$ua)
            ->firstOrFail();

        $carrera->update(
            ['observaciones' => $request->observaciones,'estado' => 0]
        );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 3;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se desactivo la carrera: UA:' . $ua . ' ext:' . $ext . ' car:' . $id;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-danger', 'La carrera fue dada de baja con éxito.');
        return redirect('carrera');
    }


    public function activarCarrera($id, $ext,$ua)
    {
        $title="Activar Extensión";
        $carrera = carrera::where('codigo_carrera',$id)
            ->where('codigo_extension',$ext)
            ->where('codigo_unidad_academica',$ua)
            ->firstOrFail();
        return view('portalAdministrativo.carrera.activarCarrera', compact('carrera','title'));
    }


    public function carreraActivada(Request $request, $id, $ext,$ua)
    {
        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);
        $carrera = carrera::where('codigo_carrera',$id)
            ->where('codigo_extension',$ext)
            ->where('codigo_unidad_academica',$ua)
            ->firstOrFail();
        $carrera->update(
            ['observaciones' => $request->observaciones,'estado' => 1]
        );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 4;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se activo la carrera: UA:' . $ua . ' ext:' . $ext . ' car:' . $id;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'La carrera fue activada con éxito.');
        return redirect('carrera');
    }

    public function get_by_ext(Request $request)
    {
        if ($request->codigo_extension < 0) {
            $html = '<option value="">'.trans('--').'</option>';
        } else {
            $html = '';
            $carreras = carrera::where('codigo_extension',$request->codigo_extension)
                ->where('codigo_unidad_academica',$request->codigo_unidad_academica)
                ->get();
            foreach ($carreras as $carrera) {
                $html .= '<option value="'.$carrera->codigo_carrera. '">'.$carrera->nombre_carrera.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * Función para obtener con AJAX
     * carreras activas con nivel academico 1 o 2.
     * (Tecnico o Licenciatura) y sin prerrequisito
     * Utilizado para listado de carrerar posibles de exonerar.
     */
    public function get_active_car_by_ext(Request $request)
    {
        if ($request->codigo_extension < 0) {
            $html = '<option value="">'.trans('--').'</option>';
        } else {
            $html = '';
            $carreras = carrera::where('codigo_extension',$request->codigo_extension)
                ->where('codigo_unidad_academica',$request->codigo_unidad_academica)
                ->where('estado',1)
                ->where('prerequisito', 0)
                ->whereIn('codigo_nivel',[1,2])
                ->get();
            foreach ($carreras as $carrera) {
                $html .= '<option value="'.$carrera->codigo_carrera. '">'.$carrera->nombre_carrera.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * Función para obtener con AJAX
     * carreras con nivel academico 1 o 2.
     * (Tecnico o Licenciatura)
     */
    public function get_by_ext_lvl(Request $request)
    {
        if ($request->codigo_extension < 0) {
            $html = '<option value="">'.trans('--').'</option>';
        } else {
            $html = '';
            $carreras = carrera::where('codigo_extension',$request->codigo_extension)
                ->where('codigo_unidad_academica',$request->codigo_unidad_academica)
                ->whereIn('codigo_nivel',[1,2])
                ->get();
            foreach ($carreras as $carrera) {
                $html .= '<option value="'.$carrera->codigo_carrera. '">'.$carrera->nombre_carrera.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }
}
