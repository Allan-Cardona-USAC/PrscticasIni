<?php

namespace App\Http\Controllers\PortalAdministrativo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\BitacoraCarnet;
use App\Funciones\Boletas;
use Carbon\Carbon;
use App\Models\CicloActivo;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\EstudiaOld;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\TipoEstablecimiento;
use App\Models\Establecimiento;
use \DateTime;

class CargaMasivaEstablecimientoController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }


    public function PreviewCargaEstablecimientos(){
        $title = 'Carga Masiva de Establecimientos';
        $solicitudusuario = [];


        return view('portalAdministrativo.CargaMasiva.establecimientosMINEDUC',
            compact('solicitudusuario','title'));
    }


    public function CargaEstablecimientos(Request $request){
        $array = json_decode($_POST['array']);
        $longitud = count((array)$array);
        $problemas = array();
        $duplicados = array();
        $Madurez = 0;
        $cantidad = 0;

        for($i=0; $i<$longitud; $i++){
            // try - catch
            if($array[$i] != null){
                $columna = $array[$i];

                try{
                    $DepartamentoNombre = $columna->DEPARTAMENTO;
                    $MunicipioNombre = $columna->MUNICIPIO;
                    $SectorNombre = $columna->SECTOR;

                    $CodDep = Departamento::where([
                        ['nombre', '=', ucwords(strtolower($DepartamentoNombre))]
                    ])->first();

                    $CodMun = Municipio::where([
                        ['municipio', '=', ucwords(strtolower($MunicipioNombre))],
                        ['cod_depto', '=', $CodDep->codigo],
                    ])->first();

                    $CodSec = TipoEstablecimiento::where([
                        ['nombre', '=', ucwords(strtolower($SectorNombre))]
                    ])->first();

                    if( $CodSec == null)
                        $CodSec = 9;    //Otros
                    else
                        $CodSec = $CodSec->codigo_tipo_establecimiento;

                    // NO DEBEN SER NULL
                    $RecuperarCodigosDeps ['codigo'] = $columna->CODIGO;
                    $RecuperarCodigosDeps ['CodDep'] = $CodDep->codigo;
                    $RecuperarCodigosDeps ['CodMun'] = $CodMun->cod_muni;
                    $RecuperarCodigosDeps ['postal'] = $CodMun->cod_postal;
                    $RecuperarCodigosDeps ['nombre'] = $columna->ESTABLECIMIENTO;
                    $RecuperarCodigosDeps ['direccion'] = $columna->DIRECCION;
                    $RecuperarCodigosDeps ['madurez'] = $Madurez;
                    $RecuperarCodigosDeps ['sec'] = $CodSec;
                    $RecuperarCodigosDeps ['tipo'] = '';
                    $RecuperarCodigosDeps ['observaciones'] = '';

                    if($columna->TELEFONO == null)
                        $columna->TELEFONO = 0;
                    if($columna->JORNADA == null)
                        $columna->JORNADA = '';
                    if($columna->SECTOR == null)
                        $columna->SECTOR = '';
                    if($columna->AREA == null)
                        $columna->AREA = '';
                    if($columna->MODALIDAD == null)
                        $columna->MODALIDAD = '';
                    if($columna->STATUS == null)
                        $columna->STATUS = '';

                    $RecuperarCodigosDeps ['telefono'] = $columna->TELEFONO;
                    $RecuperarCodigosDeps ['jornada'] = $columna->JORNADA;
                    $RecuperarCodigosDeps ['sector'] = $columna->SECTOR;
                    $RecuperarCodigosDeps ['area'] = $columna->AREA;
                    $RecuperarCodigosDeps ['modalidad'] = $columna->MODALIDAD;
                    $RecuperarCodigosDeps ['estado'] = $columna->STATUS;

                    try{
                        // Se guarda la informacion recopilada a establecimientos
                        $EstablecimientoCarga = new Establecimiento();
                        $EstablecimientoCarga->codigo = $RecuperarCodigosDeps ['codigo'] ;
                        $EstablecimientoCarga->depto = $RecuperarCodigosDeps ['CodDep'] ;
                        $EstablecimientoCarga->muni = $RecuperarCodigosDeps ['CodMun'] ;
                        $EstablecimientoCarga->postal = $RecuperarCodigosDeps ['postal'] ;
                        $EstablecimientoCarga->nombre = $RecuperarCodigosDeps ['nombre'] ;
                        $EstablecimientoCarga->direccion = $RecuperarCodigosDeps ['direccion'] ;
                        $EstablecimientoCarga->telefono = $RecuperarCodigosDeps ['telefono'] ;
                        $EstablecimientoCarga->jornada = $RecuperarCodigosDeps ['jornada'] ;
                        $EstablecimientoCarga->observaciones = $RecuperarCodigosDeps ['observaciones'] ;
                        $EstablecimientoCarga->por_madurez = $RecuperarCodigosDeps ['madurez'] ;
                        $EstablecimientoCarga->sector = $RecuperarCodigosDeps ['sector'] ;
                        $EstablecimientoCarga->area = $RecuperarCodigosDeps ['area'] ;
                        $EstablecimientoCarga->tipo = $RecuperarCodigosDeps ['tipo'] ;
                        $EstablecimientoCarga->modalidad = $RecuperarCodigosDeps ['modalidad'] ;
                        $EstablecimientoCarga->sec = $RecuperarCodigosDeps ['sec'] ;
                        $EstablecimientoCarga->estado = $RecuperarCodigosDeps ['estado'] ;
                        $EstablecimientoCarga->save();
                        $cantidad += 1;
                    }
                    catch(Exception $e){
                        array_push($duplicados, $RecuperarCodigosDeps ['codigo']);
                    }

                }
                catch(Exception $e){
                    try{
                        if ($columna->CODIGO != null)
                            array_push($problemas, $columna->CODIGO );
                    }
                    catch(Exception $e){
                        // Ha llegado un undefined (se extrae del resultado de reportes con problemas)
                    }
                }
            }
        }

        $longitudDup = count($duplicados);
        $longitudPro = count($problemas);
        $resultadoFinal = array($duplicados, "|", $problemas);

        if($longitudDup > 0){
            if($longitudPro > 0)
                return response()->json(['statusCode' => 200, 'body' => $resultadoFinal, 'succes' => $cantidad ]);
            else
                return response()->json(['statusCode' => 200, 'body' => $resultadoFinal, 'succes' => $cantidad ]);
        }
        else
            return response()->json(['statusCode' => 200, 'body' => $resultadoFinal, 'succes' => $cantidad ]);

    }


}
