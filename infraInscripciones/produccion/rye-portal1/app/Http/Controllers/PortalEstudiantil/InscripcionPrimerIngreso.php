<?php

namespace App\Http\Controllers\PortalEstudiantil;

use App\Models\Extension;
use App\Models\Facultad;
use App\PortalAdministrativo\carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscripcionPrimerIngreso extends Controller
{
    const constantRNF = 'No hay registros';

    public function index(){
        $title = 'Inscripcion Primer Ingreso';
        $facultad = Facultad::where('tipo_ua', '=', 1)->get();

        return view('portalEstudiantil.pages.primerIngreso.solicitud-ingreso', compact('title', 'facultad'));
    }

    public function getCentrosUniversitarios()
    {
        $centrosUniversitarios = facultad::where('tipo_ua', '=', 1)->get();
        if(is_null($centrosUniversitarios) || empty($centrosUniversitarios)){
            return self::constantRNF;
        }
        return $centrosUniversitarios;
    }
    public function getUnidadesAcademicas(Request $request)
    {
        $CentroUniversitario = $request->get('centroUniversitario');
        if (!empty($CentroUniversitario)) {
            $facultades = extension::where('codfac', $CentroUniversitario);
        } else {
            $facultades = extension::all();
        }
        if(is_null($facultades) || empty($facultades)){
            return self::constantRNF;
        }
        return $facultades;
    }
    public function getCarreras(Request $request)
    {
        $UnidadAcademica = $request->get('unidadAcademica');
        $Extension = $request->get('extension');
        if(empty($UnidadAcademica) || empty($Extension)){
            return self::constantRNF;
        }
        $unidadesAcademicas = carrera::where('codigo_unidad_academica', $UnidadAcademica);
        return $unidadesAcademicas::where('codigo_extension', $Extension);
    }
}
