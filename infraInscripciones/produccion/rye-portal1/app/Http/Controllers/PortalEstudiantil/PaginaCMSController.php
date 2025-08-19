<?php

namespace App\Http\Controllers\PortalEstudiantil;

use App\Funciones\Utilidades;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CategoriaCMS;
use App\Models\PaginaCMS;
use App\Utilidades\CMS\Funciones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PaginaCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $title = "Páginas";

        if (!empty($keyword)) {
            $paginaCMS = PaginaCMS::where('idPagina', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('ruta', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('icono', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $paginaCMS = PaginaCMS::paginate($perPage);
        }

        return view('portalEstudiantil.pages.paginaCMS.index', compact('paginaCMS', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $title = "Nueva página";
        $categoriaCMS = CategoriaCMS::all();
        return view('portalEstudiantil.pages.paginaCMS.create', compact('title', 'categoriaCMS'));
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
			'nombre' => 'required|max:45',
			'ruta' => 'max:150',
			'estado' => 'required',
            'icono'  => 'max:100',
            'idCategoria' => 'required'
		]);
        $requestData = $request->all();
        $requestData['ruta'] = Utilidades::cleanString(Str::camel(CategoriaCMS::find($requestData['idCategoria'])->nombre) . '/' . Str::camel($requestData['nombre']));
        PaginaCMS::create($requestData);
        $rutaArchivo = Utilidades::cleanString(
            "portalEstudiantil/admin/" .
            Str::camel(CategoriaCMS::where('idCategoria', $requestData['idCategoria'])->first()->nombre) .
            "/" .
            Str::camel($requestData['nombre']) .
            ".blade.php"
        );
	$archivo = '@extends(\'layouts.master\')@section(\'content\')' . $requestData['contenido'] . '@endsection';
        Storage::put($rutaArchivo, $archivo); //creo el archivo
        Funciones::crearRutas(); //añado la ruta
        Funciones::crearHTML(); //refresco el nav
        return redirect('paginaCMS')->with('flash_message', 'PaginaCMS added!');
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
        $paginaCMS = PaginaCMS::findOrFail($id);
        $title = "Editor";

        return view('portalEstudiantil.pages.paginaCMS.show', compact('paginaCMS', 'title'));
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
        $paginaCMS = PaginaCMS::findOrFail($id);
        $title = "Editor";
        $categoriaCMS = CategoriaCMS::all();
            $rutaArchivo = Utilidades::cleanString(
                "portalEstudiantil/admin/" .
                Str::camel($paginaCMS->categoria->nombre) .
                "/" . Str::camel($paginaCMS->nombre) .
                ".blade.php"
            ); //obtengo el HTML del archivo
            $paginaCMS->contenido = Storage::disk('local')->get($rutaArchivo); //mando el html a la vista
        return view('portalEstudiantil.pages.paginaCMS.edit', compact('paginaCMS', 'title', 'categoriaCMS'));
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
			'idPagina' => 'required',
			'nombre' => 'required|max:45',
			'ruta' => 'max:150',
			'estado' => 'required',
            'icono'  => 'max:100',
            'idCategoria' => 'required'
		]);
        $requestData = $request->all();
        $paginaCMS = PaginaCMS::findOrFail($id);
            $rutaOld = Funciones::cleanString("portalEstudiantil/admin/" . Str::camel($paginaCMS->categoria->nombre) . "/" . Str::camel($paginaCMS->nombre) . ".blade.php");
            $paginaCMS->update($requestData);
            $rutaNew = Funciones::cleanString("portalEstudiantil/admin/" . Str::camel($paginaCMS->categoria->nombre) . "/" . Str::camel($paginaCMS->nombre) . ".blade.php");
            if($rutaOld != $rutaNew){
                Storage::move($rutaOld, $rutaNew); //renombro el archivo
            }
            Storage::put($rutaNew, $requestData['contenido']); //pongo el nuevo contenido en el archivo
        Funciones::crearRutas(); //añado la ruta
        Funciones::crearHTML(); //refresco el nav
        return redirect('paginaCMS')->with('flash_message', 'PaginaCMS updated!');
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
        $paginaCMS = PaginaCMS::find($id);
        PaginaCMS::destroy($id);
            Storage::delete("portalEstudiantil/admin/" . Str::camel($paginaCMS->categoria->nombre) . "/" . Str::camel($paginaCMS->nombre) . ".blade.php"); //elimino el archivo
        Funciones::crearRutas(); //quito la ruta
        Funciones::crearHTML(); //refresco el nav
        return redirect('paginaCMS')->with('flash_message', 'PaginaCMS deleted!');
    }

    public function toggle(Request $request){
        $idPagina = $request->input('id');
        $pagina = PaginaCMS::find($idPagina);
        $pagina->estado = 1 - $pagina->estado; //toggle entre 0 y 1 //si lo quieren cambiar hay que modificar el modelo
        $bandera = $pagina->save();
        if ($bandera){
            return response()->json('Estado actualizado', 200);
        }
        return response()->json('Porfavor intentelo más tarde', 500);
    }
}
