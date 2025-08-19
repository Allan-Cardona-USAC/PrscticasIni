<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Estudiante;
use Illuminate\Http\Request;
use App\Funciones\Expediente;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Postal;
use App\Models\Etnia;
use App\Models\Idioma;
use App\Models\Discapacidad;
use App\Models\CicloActivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

include app_path('/Funciones/Reinscripcion/validarCertificado.php');

class HomeController extends Controller
{

    protected $redirectTo = '/estudiante/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('estudiante.auth:estudiante');
    }

    /**
     * Show the Estudiante dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $uid = uniqid(time(), true);
        $carnetmd5=md5("rye2016".Auth::guard('estudiante')->user()->carnet."usac");
        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

        $departamentos = Departamento::all();
        $ciclo = CicloActivo::first();
        $cicloActivo = $ciclo->ciclo_web_pregrado;
        if (Auth::guard('estudiante')->user()->codigo_departamento_recide){
            $municipios = Municipio::where('cod_depto', Auth::guard('estudiante')->user()->codigo_departamento_recide)->get();
        }else{
            $municipios = Municipio::where('cod_depto', '=', 1)->get();
        }
        if (Auth::guard('estudiante')->user()->codigo_municipio_recide){
            $codigosPostales = Postal::where([
                ['cod_depto', '=', Auth::guard('estudiante')->user()->codigo_departamento_recide],
                ['cod_muni', '=', Auth::guard('estudiante')->user()->codigo_municipio_recide],
            ])->get();
        }else{
            $codigosPostales = Postal::where([
                ['cod_depto', '=', 1],
                ['cod_muni', '=', 1],
            ])->get();
        }

        $etnias = Etnia::all();
        $idiomas = Idioma::all();
        $discapacidades = Discapacidad::all();

        return view('estudiante.home',compact('carnetmd5','uid', 'cert_pendiente','departamentos', 'municipios','codigosPostales', 'etnias', 'idiomas', 'discapacidades', 'cicloActivo'));

    }

    /**
     * Show the Estudiante dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function actualizarDatos(Request $request) {
        //$cui = $request->input('cui');
        $carnet = $request->input('carnet');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $celular = $request->input('celular');
        $nit =$request->input('nit');
        $direccion = $request->input('direccion');
        $idDepto = $request->input('departamento');
        $idMuni = $request->input('municipio');
        $idPostal = $request->input('postal');
        $idEtnia = $request->input('etnia');
        $idiomaMaterno = $request->input('idiomaMaterno');
        $segundoIdioma = $request->input('segundoIdioma');
        $discapacidad = $request->input('discapacidad');


        $estudiante = Estudiante::where('carnet', $carnet)->first();
        $estudiante->fill([
            //'cui'=>$cui,
            'email'=>$email,
            'telefono'=>$telefono,
            'celular'=>$celular,
            'nit'=>$nit,
            'direccion'=>$direccion,
            'codigo_departamento_recide'=> $idDepto,
            'codigo_municipio_recide'=> $idMuni,
            'codigo_postal' => $idPostal,
            'etnia' => $idEtnia,
            'idioma'=> $idiomaMaterno,
            'otroIdioma'=> $segundoIdioma,
            'cod_discapacidad'=> $discapacidad
        ]);
        $estudiante->save();

        return redirect()->route('estudiante.dashboard');
    }

    /**
     * Mensaje de información o error.
     *
     * @return Response
     */
    public function mensaje(Request $request) {
        $tipo = $request->input('tipo');
        $texto = $request->input('texto');

        if($tipo == "info")
        {
            $icono = 'fa-exclamation-circle';
            $header = 'Información';
            $style = 'info';
        }
        else
        {
            $icono = 'fa-times-circle-o';
            $header = 'Error';
            $style = 'danger';
        }

        $title = '';
        return view('estudiante.mensaje',compact('title', 'tipo', 'texto', 'icono', 'style', 'header'));
    }

}
