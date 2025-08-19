<?php

namespace App\Http\Controllers\PortalEstudiantil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Estudiante\SolicitaCertificacionInscripcion;
use App\Http\Controllers\Estudiante\SolicitarCarnet;
use App\Models\Certificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use Illuminate\Support\Facades\Log;
use App\Funciones\Contadores;

class NormasYProcedimientosController extends Controller
{

    public function Index(){

        return view('portalEstudiantil.ManualNormasProcedimientos');
    }

}