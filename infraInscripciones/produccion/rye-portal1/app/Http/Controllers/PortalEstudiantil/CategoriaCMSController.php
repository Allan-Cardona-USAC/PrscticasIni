<?php

namespace App\Http\Controllers\PortalEstudiantil;

use App\Http\Controllers\Controller;

use App\Models\CategoriaCMS;
use App\Utilidades\CMS\Funciones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CategoriaCMSController extends Controller
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

        if (!empty($keyword)) {
            $categoriaCMS = CategoriaCMS::where('idCategoria', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $categoriaCMS = CategoriaCMS::paginate($perPage);
        }

        return view('portalEstudiantil.pages.categoriaCMS.index', compact('categoriaCMS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('portalEstudiantil.pages.categoriaCMS.create');
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
			'nombre' => 'required|max:50',
			'estado' => 'required|integer'
		]);
        $requestData = $request->all();
        
        CategoriaCMS::create($requestData);

        Storage::makeDirectory("portalEstudiantil/admin/" . Str::camel($request->input("nombre"))); //Creo carpeta de la categoria
        Funciones::crearHTML(); //refresco el HTML del nav
        return redirect('categoriaCMS')->with('flash_message', 'Categoria added!');
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
        $categoriaCMS = CategoriaCMS::findOrFail($id);

        return view('portalEstudiantil.pages.categoriaCMS.show', compact('categoriaCMS'));
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
        $categoriaCMS = CategoriaCMS::findOrFail($id);

        return view('portalEstudiantil.pages.categoriaCMS.edit', compact('categoriaCMS'));
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
			'idCategoria' => 'required|integer',
			'nombre' => 'required|max:50',
			'estado' => 'required|integer'
		]);
        $requestData = $request->all();
        
        $categoriaCMS = CategoriaCMs::findOrFail($id);
        if ($categoriaCMS->nombre != $request->input('nombre')) {
            Storage::move("portalEstudiantil/admin/" . Str::camel($categoriaCMS->nombre), "portalEstudiantil/admin/" . Str::camel($request->input('nombre'))); //renombro la carpeta
        }
        $categoriaCMS->update($requestData);
        Funciones::crearHTML();//refresco el HTML del nav
        return redirect('categoriaCMS')->with('flash_message', 'Categoria updated!');
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
        $nombre = CategoriaCMS::find($id)->nombre;
        CategoriaCMs::destroy($id);

        Storage::deleteDirectory("portalEstudiantil/admin/" . Str::camel($nombre)); //Elimino la carpeta de la categoria
        Funciones::crearHTML();//refresco el HTML del nav
        return redirect('categoriaCMS')->with('flash_message', 'Categoria deleted!');
    }

    public function toggle(Request $request){
        $idCategoria = $request->input('id');
        $categoria = CategoriaCMS::find($idCategoria);
        $categoria->estado = 1 - $categoria->estado; //toggle entre 0 y 1 //si lo quieren cambiar hay que modificar el modelo
        $bandera = $categoria->save();
        if ($bandera){
            return response()->json('Estado actualizado', 200);
        }
        return response()->json('Porfavor intentelo más tarde', 500);
    }
}
