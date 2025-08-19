<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Departamento;
use App\Models\TipoUA;
use App\Models\UsuarioAccion;
use App\PortalAdministrativo\facultad;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class facultadController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.abcUA:administrativo',
            ['only' => [
                'create',
                'edit',
                'darDeBajaUnidadAcademica',
                'activarUnidadAcademica'
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
        $title="Unidades Académicas";
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'),50);

        if (!empty($keyword)) {
            $facultad = facultad::where('nomfac', 'LIKE', "%$keyword%")
                ->orWhere('nomcorto', 'LIKE', "%$keyword%")
                ->orWhere('correo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $facultad = facultad::paginate($perPage);
        }

        return view('portalAdministrativo.facultad.index', compact('facultad','title','perPage', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $title = "Crear Unidad Académica";
        $unidades = TipoUA::all();
        $departamentos = Departamento::all();
        return view('portalAdministrativo.facultad.create', compact('title','unidades','departamentos'));
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
			'tipo_ua' => 'integer',
			'codfac' => 'integer',
			'nomfac' => 'max:100',
			'nomcorto' => 'max:30',
			'correo' => 'max:50',
			'niv_tecnico' => 'integer',
			'niv_licenciatura' => 'integer',
			'niv_posgrado' => 'integer',
			'depto' => 'required|integer',
			'rangoCarnet' => 'required|integer',
			'wsPruebaBasica' => 'required|max:200',
			'wsPruebaEspecifica' => 'required|max:200',
            'activa' => 'integer'
		]);

        //Asignación de valores debido a que checkbox no manda valor en request al no estar chequeado.
        $niv_tecnico = isset($request->niv_tecnico) ? 1 : 0;
        $niv_licenciatura = isset($request->niv_licenciatura) ? 1 : 0;
        $niv_posgrado = isset($request->niv_posgrado) ? 1 : 0;

        $request->merge(['niv_tecnico' => $niv_tecnico]);
        $request->merge(['niv_licenciatura' => $niv_licenciatura]);
        $request->merge(['niv_posgrado' => $niv_posgrado]);

        $nueva_unidadacademica = facultad::where('codfac','=',$request['codfac'])->first();

        if ($nueva_unidadacademica != null)
        {
            $request->session()->flash('alert-danger', 'Ya existe unidad academica con este código.');
            return redirect('facultad');
        }


        $requestData = $request->all();

        facultad::create($requestData);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 1;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'creó la UA:' . $request['codfac'] ;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Unidad académica creada con éxito.');


        return redirect('facultad');
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
        $title="Ver Unidad Académica";
        $facultad = facultad::findOrFail($id);

        return view('portalAdministrativo.facultad.show', compact('facultad'))->with('title',$title);
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
        $title="Editar Unidad Académica";
        $facultad = facultad::findOrFail($id);
        $unidades = TipoUA::all();
        $departamentos = Departamento::all();
        return view('portalAdministrativo.facultad.edit', compact('facultad','title','unidades','departamentos'));
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
            'tipo_ua' => 'integer',
            'codfac' => 'integer',
            'nomfac' => 'max:100',
            'nomcorto' => 'max:30',
            'correo' => 'max:50',
            'niv_tecnico' => 'integer',
            'niv_licenciatura' => 'integer',
            'niv_posgrado' => 'integer',
            'depto' => 'required|integer',
            'rangoCarnet' => 'required|integer',
            'wsPruebaBasica' => 'required|max:200',
            'wsPruebaEspecifica' => 'required|max:200',
            //'activa' => 'integer'
		]);

        $niv_tecnico = isset($request->niv_tecnico) ? 1 : 0;
        $niv_licenciatura = isset($request->niv_licenciatura) ? 1 : 0;
        $niv_posgrado = isset($request->niv_posgrado) ? 1 : 0;
        //$activa = isset($request->activa) ? 1 : 0;

        $request->merge(['niv_tecnico' => $niv_tecnico]);
        $request->merge(['niv_licenciatura' => $niv_licenciatura]);
        $request->merge(['niv_posgrado' => $niv_posgrado]);
        //$request->merge(['activa' => $activa]);

        $requestData = $request->all();

        $facultad = facultad::findOrFail($id);
        $facultad->update($requestData);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 2;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'actualizó la UA:' . $request['codfac'] ;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Unidad académica actualizada con éxito.');
        return redirect('facultad')->with('flash_message', 'facultad updated!');
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
        facultad::destroy($id);

        return redirect('facultad')->with('flash_message', 'facultad deleted!');
    }


    public function darDeBajaUnidadAcademica($id)
    {
        $title="Dar de Baja Unidad Académica";
        $facultad = facultad::findOrFail($id);
        $unidades = TipoUA::all();
        return view('portalAdministrativo.facultad.darDeBajaUnidadAcademica', compact('facultad','title','unidades'));
    }


    public function unidadAcademicaDesactivada(Request $request, $id)
    {
        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);
        $facultad = facultad::findOrFail($id);
        $facultad->update(
            ['observaciones' => $request->observaciones,'activa' => 0]
        );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 3;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se desactivo la UA:' . $id;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-danger', 'La Unidad Académica fue dada de baja con éxito.');
        return redirect('facultad');
    }


    public function activarUnidadAcademica($id)
    {
        $title="Activar Unidad Académica";
        $facultad = facultad::findOrFail($id);
        $unidades = TipoUA::all();
        return view('portalAdministrativo.facultad.activarUnidadAcademica', compact('facultad','title','unidades'));
    }


    public function unidadAcademicaActivada(Request $request, $id)
    {
        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);
        $facultad = facultad::findOrFail($id);
        $facultad->update(
            ['observaciones' => $request->observaciones,'activa' => 1]
        );

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 4;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se activo la UA:' . $id;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'La Unidad Académica fue activada con éxito.');
        return redirect('facultad');
    }
}
