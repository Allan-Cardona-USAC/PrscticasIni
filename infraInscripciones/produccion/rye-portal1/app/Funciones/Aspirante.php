<?php

namespace App\Funciones;

use App\Estudiante;
use App\Models\BitacoraInscripcion;
use App\Models\Preinscripcion;
use App\Models\EstudiaOld;
use App\Models\Calendario;
use App\Models\CarnetBoleta;
use App\Models\CicloActivo;
use App\Models\CarreraTemporal;
use App\Models\InformacionAspirante;
use App\Models\Municipio;
use App\Models\PingBoleta;
use App\Models\PingRegistro;
use App\Models\CarnetNvo;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;
use Request;


class Aspirante
{
    /**
     * Verifica el Status del Aspirante
     */
    public static function VerificarStatus($nov)
    {
        $ciclo = CicloActivo::first(); 
        /**
         * Verifica si el aspirante ya cuenta con la transaccion de Preinscripcion
         */

        $Pre = Preinscripcion::where('nov', '=', $nov)
        ->where('ciclo', '=', $ciclo->ciclo_web_pregrado)
        ->whereNotNull('transaccion')->get()->first();

        $data = InformacionAspirante::find($nov);

        if($Pre && $data->nacionalidad == 30){
            $status = DB::select('select habilitarInscripcion(?,?) as Estado', [$Pre->UA, $nov]);
            $Estado = strval($status[0]->Estado); 
            if($Estado == 1){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    /**
     * Obtiene el Ciclo Actual (Año)
     */
    public static function getCicloActual(){
        $ciclo = CicloActivo::first(); 
        return $ciclo;
    }

    /**
     * Obtiene Nombre de Carrera
     * Obtiene Nombre Unidad Academica
     * Obtiene Nombre Extension Academica
     */
    public static function getInformacionCarrera($nov){
        $ciclo = CicloActivo::first(); 
        $data = Preinscripcion::select(
            "preinscripcion.nov",
            "carrera_temporal.nombre_carrera as carrera",
            "facultad.nomfac as facultad",
            "extension_lugar.lugar_estudios as extension",
            "preinscripcion.car as idCar",
            "preinscripcion.ext as idExt",
            "preinscripcion.UA as idUA"  
        )
        ->join('carrera_temporal', function($join){
            $join->on('carrera_temporal.codigo_unidad_academica', '=', 'preinscripcion.UA');
            $join->on('carrera_temporal.codigo_extension', '=', 'preinscripcion.ext');
            $join->on('carrera_temporal.codigo_carrera', '=', 'preinscripcion.car');
        })
        ->join('facultad', 'facultad.codfac', '=', 'preinscripcion.UA')
        ->join('extension_lugar', function($join){
            $join->on('extension_lugar.codigo_unidad_academica', '=', 'preinscripcion.UA');
            $join->on('extension_lugar.codigo_extension', '=', 'preinscripcion.ext');
        })
        ->where([
            ['preinscripcion.nov', '=', $nov],
            ['ciclo', '=', $ciclo->ciclo_web_pregrado]
        ])->first();

        return $data;
    }

    /**
     * Obtiene informacion de la preinscripcion del aspirante
     */
    public static function getInformacionPreInscripcion($nov){        
        
        $ciclo = CicloActivo::first(); 
        $data = Preinscripcion::where([
            ['nov', '=', $nov],
            ['ciclo', '=', $ciclo->ciclo_web_pregrado]
        ])->first();

        return $data;
    }

    /***
     * Obtiene informacion general del aspirante
     */
    public static function getInformacionAspirante($nov){
        $data = InformacionAspirante::find($nov);
        return $data;
    }

    /**
     * Obtener estado actual de la Inscripcion del Aspirante
     */
    public static function getEstadoInscripcion($nov, $ciclo){
        $data = PingRegistro::where("ciclo","=",$ciclo)->find($nov);
        if($data == NULL){
            return 0;
        }elseif($data->foto == 0){
            return 0;
        }elseif($data->certificado == 0){
            return 1;
        }elseif($data->cui == 0 || strcmp($data->registro_titulo, '0') == 0){
            return 2;
        }elseif($data->validaciones == 0){
            return 3;
        }else{
            return 5;
        }
    }
    /*
     *  =====================================================================================
     * ||                       Metodos para Insertar a la Base de Datos                   ||
     * =====================================================================================
     */

    /**
     * Inserta Informacion del Step1 de Inscripcion Aspirante
     * Inserta el nov en ping_registro en la cual se lleva el control del registro
     * con el estado de Foto en 1
     * STEP-1
     */
    public static function registrarFotografiaBD($nov, $cicloActivo, $ua, $ext, $car){                
        $data = PingRegistro::where("ciclo","=",$cicloActivo)->find($nov);

        if(!$data){
            $pingRegistro = new PingRegistro;
            $pingRegistro->nov = $nov;
            $pingRegistro->foto = 1;
            $pingRegistro->certificado = 0;
            $pingRegistro->cui = 0;
            $pingRegistro->registro_titulo = 0;
            $pingRegistro->ua = $ua;
            $pingRegistro->ext = $ext;
            $pingRegistro->car = $car;
            $pingRegistro->validaciones = 0;
            $pingRegistro->ciclo = $cicloActivo;
            $pingRegistro->save();
        }else{
            $data->nov = $nov;
            $data->foto = 1;
            $data->certificado = 0;
            $data->cui = 0;
            $data->registro_titulo = 0;
            $data->ua = $ua;
            $data->ext = $ext;
            $data->car = $car;
            $data->validaciones = 0;
            $data->ciclo = $cicloActivo;
            $data->save();
        }
    }

    /***
     * Actualiza el valor de partida en la BD
     * STEP-2
     */
    public static function registrarPartidaBD($nov, $ciclo){
        $pingRegistro = PingRegistro::where("ciclo","=",$ciclo)->find($nov);
        $pingRegistro->certificado = 1;
        $pingRegistro->save();
    }

    /**
     * Actualiza el valor del cui y el registro del titulo
     * STEP-3
     */
    public static function registrarTituloBD($nov, $cui, $registro, $ciclo){
        $temp = (int)$cui;
        if($cui == 0){
            $pingRegistro = PingRegistro::where("ciclo", "=", $ciclo)->find($nov);
            $pingRegistro->cui = 1;
            $pingRegistro->registro_titulo = $registro;
            $pingRegistro->save();
        }else{
            $pingRegistro = PingRegistro::where("ciclo", "=", $ciclo)->find($nov);
            $pingRegistro->cui = (int)$cui;
            $pingRegistro->registro_titulo = $registro;
            $pingRegistro->save();
        }
        
        
    }

    /**
     * Actualiza los valores de editar informacion
     * STEP-5
     * Nota: El Step-4 es solo muestra de informacion
     */
    public static function registrarValidacionesBD($nov, $ciclo){
        $pingRegistro = PingRegistro::where("ciclo", "=", $ciclo)->find($nov);
        $pingRegistro->validaciones = 1;
        $pingRegistro->save();
    }


    /***
     * Metodo que actualiza la  informacion del aspirante
     * Nota: Solo aspectos generales
     */
    public static function actualizarInformacion($email, $fechaNacimiento, $telefono, $celular, $operador, $genero, $nov){
        $informacionAspirante = InformacionAspirante::find($nov);
        $informacionAspirante->correo_electronico = $email;
        $informacionAspirante->fecha_nacimiento = $fechaNacimiento;
        $informacionAspirante->telefono = $telefono;
        $informacionAspirante->celular = $celular;
        $informacionAspirante->proveedor_cel = $operador;
        $informacionAspirante->sexo = $genero;
        $informacionAspirante->save();
    }


    /**
     * Metodo para generar carnet
     */
    public static function generarCarnet($nov, $ciclo, $ua, $ext, $reg_titulo_medio){
        $user_inscripcion = strcmp($reg_titulo_medio, 'AUN_NO_HAY_REGISTRO_DE_TITULO') != 0? 
            'pingenlinea@' : 'ping_provisional@';
    
        $usuario = $user_inscripcion.Request::ip();

        $carnet = DB::select('select generarCarnet(?,?,?,?,?) as Carnet', [$nov, $ciclo, $ua, $ext, $usuario]);
        $carnet = strval($carnet[0]->Carnet); 

        //Error en la obtencion del nuevo carnet
        if($carnet == -1) return -1;
        if($carnet == -2) return -2;

        return $carnet;
    }


    public static function obtenerCarnet($nov, $ciclo, $ua, $ext){
        $carnet =  CarnetNvo::where('nov', $nov)->first();
        if ($carnet){
            $newCarnet = strval($carnet->ciclo) . strval($carnet->area) . str_pad($carnet->carnet,4,"0",STR_PAD_LEFT);
            $newCarnet = intval($newCarnet);
            return $newCarnet;
        }else{
            return 0;
        }
    }

    public static function validarPasos($pasoActual, $nov, $ciclo){
        $pasoDB = Aspirante::getEstadoInscripcion($nov, $ciclo);
        if($pasoDB == $pasoActual){
            return true;
        }else{
            return false;
        }
    }
}