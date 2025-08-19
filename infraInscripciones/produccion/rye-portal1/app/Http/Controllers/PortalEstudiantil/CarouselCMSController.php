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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CarouselCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $title = "Carousel";
        $imgs = File::allFiles('/var/www/html/rye-portal/public/img/carousel');
        $imagenes = [];
        foreach($imgs as $path)
        {
            $imagenes[] = pathinfo($path);
        }

        return view('portalEstudiantil.pages.carouselCMS.index', compact('imagenes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $title = "Nueva imagen";
        return view('portalEstudiantil.pages.carouselCMS.create', compact('title'));
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
			'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = $request->file('imagen');
        $path = $image->getClientOriginalName();
        $image->move(public_path('img/carousel'), $path);
        Funciones::crearCarousel();
        
        return redirect('carouselCMS')->with('flash_message', 'Se cargó la imagen');
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
        File::delete(public_path('img/carousel/') . $id); //elimino el archivo
        Funciones::crearCarousel(); //quito la ruta
        return redirect('carouselCMS')->with('flash_message', 'Imagen eliminada');
    }
}
