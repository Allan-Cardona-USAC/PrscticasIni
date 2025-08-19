<?php


namespace App\Funciones;


use App\Models\CarreraEstudiante;
use App\Models\CicloActivo;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;

class ConstanciaInscripcion
{
    public static function descargar($carnet, $cui, $nombreCompleto, $idFacultad, $idExtension, $idCarrera){
        $ciclo = CicloActivo::first();
        $ciclo = $ciclo->ciclo_activo;
        $carrera = CarreraEstudiante::select(
            'carrera_estudiante.codfac as idFacultad',
            'facultad.nomfac as facultad',
            'carrera_estudiante.codext as idExtension',
            'extension.nombre as extension',
            'carrera_estudiante.codcar as idCarrera',
            'carrera_temporal.nombre_carrera as carrera',
            'bitacora_inscripcion.fecha_inscripcion as fechaInscripcion',
            'bitacora_inscripcion.boleta as noBoleta',
            'bitacora_inscripcion.fecha_boleta as fechaPago',
            DB::raw('MD5(CONCAT(bitacora_inscripcion.carnet,bitacora_inscripcion.cod_ua,bitacora_inscripcion.cod_ext,bitacora_inscripcion.cod_car,bitacora_inscripcion.ciclo,bitacora_inscripcion.fecha_usuario)) AS clave')
        )
            ->join('facultad', 'carrera_estudiante.codfac', '=', 'facultad.codfac')
            ->join('extension', function($join){
                $join->on('carrera_estudiante.codext', '=', 'extension.codigo_extension');
                $join->on('facultad.codfac', '=', 'extension.codigo_unidad_academica');
            })
            ->join('carrera_temporal', function($join){
                $join->on('carrera_estudiante.codcar', '=', 'carrera_temporal.codigo_carrera');
                $join->on('facultad.codfac', '=', 'carrera_temporal.codigo_unidad_academica');
                $join->on('extension.codigo_extension', '=', 'carrera_temporal.codigo_extension');
            })
            ->join('bitacora_inscripcion', 'carrera_estudiante.carnet', '=', 'bitacora_inscripcion.carnet')
            ->where([
                ['carrera_estudiante.carnet', '=', $carnet],
                ['carrera_temporal.estado_reingreso', '=', 1],
                ['carrera_estudiante.habilitado', '=', 1],
                ['carrera_estudiante.repitencia', '=', 0],
                ['carrera_estudiante.activo', '=', 1],
                ['carrera_estudiante.codfac', '=', $idFacultad],
                ['carrera_estudiante.codext', '=', $idExtension],
                ['carrera_estudiante.codcar', '=', $idCarrera],
            ])
            ->whereIn('carrera_estudiante.sit_acad', [0,2])
            ->first();

        if ($carrera){
            $noBoleta = $carrera->noBoleta;
            $fechaInscripcion = $carrera->fechaInscripcion;
            $fechaPago = $carrera->fechaPago;
            $clave = substr($carrera->clave, 0 , 8) . '-' .
                        substr($carrera->clave, 8 , 8) . '-' .
                        substr($carrera->clave,  16, 8) . '-' .
                        substr($carrera->clave, 24 , 8);
            $facultad = $carrera->facultad;
            $extension = $carrera->extension;
            $carrera = $carrera->carrera;

            return view('common.include.constanciaInscripcion',
                compact('ciclo',
                    'carnet',
                    'cui',
                    'nombreCompleto',
                    'idFacultad',
                    'facultad',
                    'idExtension',
                    'extension',
                    'idCarrera',
                    'carrera',
                    'noBoleta',
                    'fechaInscripcion',
                    'fechaPago',
                    'clave'
                )
            );
        }
        return 'Error encontrando la informacion del estudiante';
    }

}
