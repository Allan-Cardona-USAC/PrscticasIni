<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TipoUA as tipo_UA;
use Illuminate\Http\Request;

class tipo_UAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tipo_ua = tipo_UA::where('tipo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('prioridad', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $tipo_ua = tipo_UA::paginate($perPage);
        }

        return view('portalAdministrativo.tipo_-u-a.index', compact('tipo_ua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('portalAdministrativo.tipo_-u-a.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'tipo' => 'required|integer',
			'descripcion' => 'required|max:30',
			'prioridad' => 'required|max:1'
		]);
        $requestData = $request->all();
        
        tipo_UA::create($requestData);

        return redirect('tipo_-u-a')->with('flash_message', 'tipo_UA added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $tipo_ua = tipo_UA::findOrFail($id);

        return view('portalAdministrativo.tipo_-u-a.show', compact('tipo_ua'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tipo_ua = tipo_UA::findOrFail($id);

        return view('portalAdministrativo.tipo_-u-a.edit', compact('tipo_ua'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'tipo' => 'required|integer',
			'descripcion' => 'required|max:30',
			'prioridad' => 'required|max:1'
		]);
        $requestData = $request->all();
        
        $tipo_ua = tipo_UA::findOrFail($id);
        $tipo_ua->update($requestData);

        return redirect('tipo_-u-a')->with('flash_message', 'tipo_UA updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        tipo_UA::destroy($id);

        return redirect('tipo_-u-a')->with('flash_message', 'tipo_UA deleted!');
    }
}
