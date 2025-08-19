<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title='Administrador del Portal';
        return view('portalEstudiantil.admin.index')->with('title',$title);
    }
    public function categorias()
    {
        $title='Administrador del Portal';
        return view('portalEstudiantil.admin.categorias')->with('title',$title);
    }
    public function paginas()
    {
        $title='Administrador del Portal';
        return view('portalEstudiantil.admin.paginas')->with('title',$title);
    }
    public function editor()
    {
        $title='Editor web';
        return view('portalEstudiantil.admin.editor')->with('title',$title);
    }

    public function prueba(Request $request){
        $contenido = $request->input('inputContenido');
        return $contenido;
    }
}
