<?php

namespace App\Http\Controllers\PortalEstudiantil;

use App\Models\Pcb;
use App\Models\PruebaEspecifica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrimerIngreso extends Controller
{
    public function consultaDePCB(){
        $title = 'Pruebas Básicas';

        if (Auth::guard('aspirante')->check()){
            $nov = Auth::guard('aspirante')->user()->nov;
        }else{
            $nov = Auth::guard('estudiante')->user()->cod_orien;
        }

        $basicos = Pcb::select('tipo_pcb.nombre as nombre')
            ->join('tipo_pcb', 'pcb.id_prueba', '=', 'tipo_pcb.id_pcb')
            ->where('nov', '=', $nov)
            ->get();

        $especificos = PruebaEspecifica::select('facultad.nomfac as unidadAcademica', 'extension.nombre as extension', 'carrera_temporal.nombre_carrera as carrera')
            ->join('ciclo_activo', DB::raw('YEAR(PruebaEspecifica.fechaCarga)'), '=', 'ciclo_activo.ciclo_activo')
            ->join('facultad', 'facultad.codfac', '=', 'PruebaEspecifica.ua')
            ->join('extension', function($join){
                $join->on('extension.codigo_unidad_academica', '=', 'PruebaEspecifica.ua');
                $join->on('extension.codigo_extension', '=', 'PruebaEspecifica.ext');
            })
            ->join('carrera_temporal', function($join){
                $join->on('carrera_temporal.codigo_unidad_academica', '=', 'PruebaEspecifica.ua');
                $join->on('carrera_temporal.codigo_extension', '=', 'PruebaEspecifica.ext');
                $join->on('carrera_temporal.codigo_carrera', '=', 'PruebaEspecifica.car');
            })->where([
                ['PruebaEspecifica.resultado', '=', 'Satisfactorio'],
                ['PruebaEspecifica.nov', '=', $nov]
            ])
            ->get();
        return view('portalEstudiantil.pages.primerIngreso.consultaDePCB', compact('title','basicos', 'especificos'));
    }
}
