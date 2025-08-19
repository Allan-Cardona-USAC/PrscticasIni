<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Rap2hpoutre\FastExcel\FastExcel;

ini_set('max_execution_time',600);
ini_set('memory_limit', '356M');

class mcarreraController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectEstadistica');
    }
    
    protected $redirectTo = '/administrativo/login';


    public function ReporteMCarrera(Request $req){ 
        
                function Consulta(){
                    $consulta='Select '; 
                    $consulta .=        "f.`codfac` as 'Código Unidad Académica', ";
                    $consulta .=        "f.`nomfac` as 'Unidad Académica', ";
                    $consulta .=        "ex.`codigo_extension` AS 'Código Extensión', ";
                    $consulta .=        "ex.`nombre` AS 'Extensión', ";
                    $consulta .=        "ct.`codigo_carrera` AS 'Código Carrera', ";
                    $consulta .=        "ct.`nombre_carrera` AS 'Carrera', ";
                    $consulta .=        "ct.`codigo_nivel` AS 'Código Nivel Académico', ";
                    $consulta .=        "na.`nombre` AS 'Nivel Académico', ";
                    $consulta .=        "ct.`estado` AS 'Código Carrera Activa', ";
                    $consulta .=        "(CASE WHEN ct.estado=1 THEN 'Activa' ELSE 'Inactiva' END) AS  'Carrera Activa', ";
                    $consulta .=        "ct.`prerequisito` AS 'Código Prerrequisito', ";
                    $consulta .=        "(CASE WHEN ct.`prerequisito`=1 THEN 'Si requiere' ELSE 'No Requiere' END) AS  'Prerrequisito', ";
                    $consulta .=        "DATE_FORMAT(ct.`fecha_activacion`,'%d-%m-%Y') as 'Fecha Activación', ";
                    $consulta .=        "DATE_FORMAT(ct.`fecha_creacion`,'%d-%m-%Y') as 'Fecha Creación', ";
                    $consulta .=        "ct.`estado_ingreso` AS 'Estado Ingreso', ";
                    $consulta .=        "ct.`estado_reingreso` AS 'Estado Reingreso', ";
                    $consulta .=        "ct.`estado_peg` AS 'Estado Cierre', ";
                    $consulta .=        "ct.`estado_graduados` AS 'Estado Graduado' ";
                    $consulta .=        'FROM ';
                    $consulta .=        'facultad f ';
                    $consulta .=        'LEFT JOIN extension ex '; 
                    $consulta .=         '   ON ( ';
                    $consulta .=         '   f.`codfac` = ex.`codigo_unidad_academica` ';
                    $consulta .=         '   ) ';
                    $consulta .=        'LEFT JOIN carrera_temporal ct '; 
                    $consulta .=        '    ON ( ';
                    $consulta .=        '   ct.`codigo_unidad_academica` = ex.`codigo_unidad_academica` '; 
                    $consulta .=        '    AND ct.`codigo_extension` = ex.`codigo_extension` ';
                    $consulta .=        '    ) ';
                    $consulta .=        'LEFT JOIN nivel_academico na '; 
                    $consulta .=        '    ON ( ';
                    $consulta .=        '    na.`codigo_nivel_academico` = ct.`codigo_nivel` ';
                    $consulta .=        '     ) ';
                    $consulta .=        '    WHERE ct.`codigo_unidad_academica`>0 ';
                    $consulta .=        'ORDER BY f.`codfac`, ';
                    $consulta .=        'ex.`codigo_extension`, ';
                    $consulta .=        'ct.`codigo_carrera` ';

                    return $consulta;
            }

               function Resultados(){
                        $resultados = DB::cursor(Consulta());
                        foreach ($resultados as $result) {
                            yield $result;
                        }
                 }

               return (new FastExcel(Resultados()))->download('ReporteMaestroCarreras.xlsx');
    }
     



}