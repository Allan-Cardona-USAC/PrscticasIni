<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UsuarioAccion;
use App\PortalAdministrativo\facultad;
use App\PortalAdministrativo\extension;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class extensionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.abcEXT:administrativo',
            ['only' => [
                'create',
                'edit',
                'editExtension',
                'darDeBajaExtension',
                'activarExtension'
            ]]);
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $title="Extensiones";
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'),50);
        $unidades = facultad::all();
        $cod_ua = $request->input('cod_ua');


        if (!empty($keyword)) {
            $extension = extension::where('codigo_extension', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->when($cod_ua > -1, function ($query) use ($cod_ua) {
                    return $query->where('codigo_unidad_academica', $cod_ua);
                })
                ->paginate($perPage);
        } else {
            $extension = extension::when($cod_ua > -1, function ($query) use ($cod_ua) {
                return $query->where('codigo_unidad_academica',  $cod_ua);
            })
            ->paginate($perPage);
        }


        return view('portalAdministrativo.extension.index', compact('extension','title','perPage', 'keyword','unidades','cod_ua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $title="Crear Extensión";
        $unidades = facultad::all();
        return view('portalAdministrativo.extension.create',compact('title','unidades'));
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
			'codigo_unidad_academica' => 'required|integer',
			'codigo_extension' => 'required|integer',
			'nombre' => 'nullable|max:250',
			'fecha_creacion' => 'required',
			'activa' => 'integer'
		]);



        #Chequear si ya existe extensión. (Llave primaria compuesta)
        $extension = extension::where('codigo_extension',$request['codigo_extension'])
            ->where('codigo_unidad_academica',$request['codigo_unidad_academica'])
            ->first();

        if($extension != null){
            $request->session()->flash('alert-danger', 'Ya existe extensión con este código en unidad academica específicada.');
            return redirect('extension/create');
        }

        #Para colocar fecha de creación se utilizó  "['fecha_creacion' => Carbon::now()]"
        $requestData = array_merge($request->all(),
            ['fecha_U' => Carbon::now()],
            ['usuario' => Auth::guard('administrativo')->user()->login]
        );

        extension::create($requestData);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 1;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'creó la extension: UA:' . $request['codigo_unidad_academica'] . ' ext:' . $request['codigo_extension'];
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Extensión creada con éxito.');
        return redirect('extension')->with('flash_message', 'extension added!');
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
        $title="Ver Extensión";
        $extension = extension::where('codigo_extension',$id)->firstOrFail();

        return view('portalAdministrativo.extension.show', compact('extension','title'));
    }

    public function showExtension($ext,$ua)
    {
        $title="Ver Extensión";
        $extension = extension::where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();

        return view('portalAdministrativo.extension.show', compact('extension','title'));
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
        $title="Editar Extensión";
        $extension = extension::findOrFail($id);
        $unidades = facultad::all();
        return view('portalAdministrativo.extension.edit', compact('extension','title','unidades'));
    }

    public function editExtension($ext,$ua)
    {
        $title="Editar Extensión";
        $extension = extension::where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();
        $unidades = facultad::all();
        return view('portalAdministrativo.extension.edit', compact('extension','title','unidades'));
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
			'codigo_unidad_academica' => 'required|integer',
			'codigo_extension' => 'required|integer',
			'nombre' => 'nullable|max:250',
			'activa' => 'integer'
		]);
        $requestData = array_merge($request->all(),
            ['fecha_U' => Carbon::now('America/Guatemala')],
            ['usuario' => Auth::guard('administrativo')->user()->login]
        );

        $extension = extension::where('codigo_extension',$id)
            ->where('codigo_unidad_academica',$request['codigo_unidad_academica'])
            ->firstOrFail();
        $extension->update($requestData);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 2;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'actualizó la extension: UA:' . $request['codigo_unidad_academica'] . ' ext:' . $id;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Extensión actualizada con éxito.');
        return redirect('extension')->with('flash_message', 'extension updated!');
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
        extension::destroy($id);

        return redirect('extension')->with('flash_message', 'extension deleted!');
    }

    public function darDeBajaExtension($ext,$ua)
    {
        $title="Dar de Baja Extensión";
        $extension = extension::where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();
        return view('portalAdministrativo.extension.darDeBajaExtension', compact('extension','title'));
    }


    public function extensionDesactivada(Request $request, $ext,$ua)
    {
        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);
        $extension = extension::where('codigo_extension','=',$ext)->where('codigo_unidad_academica','=',$ua);
        $extension->update(
            ['observaciones' => $request->observaciones,'activa' => 0]
        );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 3;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se desactivo la extensión: UA:' . $ua . ' ext:' . $ext;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-danger', 'La extensión fue dada de baja con éxito.');
        return redirect('extension');
    }


    public function activarExtension($ext,$ua)
    {
        $title="Activar Extensión";
        $extension = extension::where('codigo_extension',$ext)->where('codigo_unidad_academica',$ua)->firstOrFail();
        return view('portalAdministrativo.extension.activarExtension', compact('extension','title'));
    }


    public function extensionActivada(Request $request, $ext,$ua)
    {
        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);
        $extension = extension::where('codigo_extension','=',$ext)->where('codigo_unidad_academica','=',$ua);
        $extension->update(
            ['observaciones' => $request->observaciones,'activa' => 1]
        );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 4;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se activo la extensión: UA:' . $ua . ' ext:' . $ext;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'La extensión fue activada con éxito.');
        return redirect('extension');
    }

    public function get_by_ua(Request $request)
    {
        if ($request->codigo_unidad_academica < 0) {
            $html = '<option value="">'.trans('--').'</option>';
        } else {
            $html = '';
            $extensiones = extension::where('codigo_unidad_academica', $request->codigo_unidad_academica)->get();
            foreach ($extensiones as $extension) {
                $html .= '<option value="'.$extension->codigo_extension. '">'.$extension->nombre.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    public function get_active_ext_by_ua(Request $request)
    {
        if ($request->codigo_unidad_academica < 0) {
            $html = '<option value="">'.trans('--').'</option>';
        } else {
            $html = '';
            $extensiones = extension::where('codigo_unidad_academica', $request->codigo_unidad_academica)->where('activa',1)->get();
            foreach ($extensiones as $extension) {
                $html .= '<option value="'.$extension->codigo_extension. '">'.$extension->nombre.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }
}
