<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\CertificacionTitulos;
use App\Models\EstudiaOld;
use Illuminate\Http\Request;
use \stdClass;
use Illuminate\Support\Facades\Log;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CertificacionTitulosVerificar extends Controller 
{

    public function verificarCertificacionTitulos(Request $request)
    {
        $transaccion = $request->query('id');
        $certificacion = CertificacionTitulos::where([ //crear modelo para titulos
            ['transaccion', '=', $transaccion]
        ])->first();

        $transaccion = $certificacion->transaccion;


        $title = "Registro y Estadística";

        return view(
            'portalEstudiantil.pages.servicios.verificarCertificacionTitulosBarcode',
            compact('transaccion', 'title')
        );
    }


    public static function fechaLetras($fecha)
    {

        $diatext = self::obtenerNumText($fecha);
        $anio = self::obtenerAnioText($fecha);
        $mes = self::obtenerMesText($fecha);
        return $diatext . ' de ' . $mes . ' de ' . $anio . '.';
    }

    public static function obtenerNumText($fecha)
    {

        $diastext = array(
            'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce',
            'trece', 'catorce', 'quince', 'dieciseis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte',
            'veintiuno', 'veintidos', 'veintitres', 'veinticuatro', 'veinticinco', 'veintiseis', 'veinticiete',
            'veintiocho', 'veintinueve', 'treinta', 'treinta y uno'
        );
        $numtext = $diastext[(date('j', strtotime($fecha)) * 1) - 1];
        return $numtext;
    }

    public static function obtenerMesText($fecha)
    {

        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mesText = $mes[(date('m', strtotime($fecha)) * 1) - 1];
        return $mesText;
    }


    public static function obtenerAnioText($fecha)
    {

        $anio = date('Y', strtotime($fecha));

        $anioText = self::miles($anio);

        return $anioText;
    }

    //------------------------------Funciones para sacar los años en letras :/----------------------

    public static function miles($anio)
    {

        $longitud = strlen($anio);
        $miles = substr($anio, 0, $longitud - 3);
        $centenas = substr($anio, -3);

        if ($centenas != 0) {

            $cadenaAnio = self::centenas($miles) . ' mil ' . self::centenas($centenas);
        } else {

            $cadenaAnio = self::centenas($miles) . ' mil';
        }
        return $cadenaAnio;
    }

    public static function centenas($centenas)
    {
        $cientos = array(
            100 => 'cien', 200 => 'doscientos', 300 => 'trecientos',
            400 => 'cuatrocientos', 500 => 'quinientos', 600 => 'seiscientos',
            700 => 'setecientos', 800 => 'ochocientos', 900 => 'novecientos'
        );

        if ($centenas >= 100) {

            $centena = substr($centenas, 0, 1);
            $decena = '0' . substr($centenas, 1, 2);
            $cadenaCentenas = (($centena == 1) ? 'ciento' : $cientos[$centena * 100]) . ' ' . self::decenas($decena);

            return $cadenaCentenas;
        } else {

            $cadenaDecenas = self::decenas($centenas);
            return $cadenaDecenas;
        }
    }

    public static function decenas($decena)
    {
        $decenas = array(
            30 => 'treinta', 40 => 'cuarenta', 50 => 'cincuenta', 60 => 'sesenta',
            70 => 'setenta', 80 => 'ochenta', 90 => 'noventa'
        );

        if ($decena <= 29) {
            $unidades = self::unidades($decena);
            return $unidades;
        }

        $subunidad = substr($decena, 2, 1);

        if (substr($decena, 2, 1) == 0) {
            $decena = substr($decena, 1);
            return $decenas[$decena];
        } else {
            return $decenas[$decena - $subunidad] . ' y ' . self::unidades($subunidad);
        }
    }

    public static function unidades($unidades)
    {
        $unidad = array(
            'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho',
            'nueve', 'diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte', 'veintiuno ', 'vientidos ', 'veintitrés ', 'veinticuatro', 'veinticinco',
            'veintiséis', 'veintisiete', 'veintiocho', 'veintinueve'
        );
        return $unidad[$unidades - 1];
    }

    public function verificarCertificacionTitulosFinal(Request $request)
    {

        $cert_transaccion = $request->input('cert_transaccion');
        $hash_request = $request->input("hash"); //peticion del hash...
        $hash_request = Str::lower($hash_request);

        $certificacion = CertificacionTitulos::where([ //crear modelo para titulos
            ['transaccion', '=', $cert_transaccion]
        ])->first();

        $barcode_hash = $certificacion->barcode;


        $key = substr($barcode_hash,  0, 8) . substr($barcode_hash,  -5);


        if ($hash_request == $key) {

            $hash = $key;

            $carnet = $certificacion->carnet;
            $cui = $certificacion->cui;
            $nombre = $certificacion->nombre;
            $nombre_carrera = $certificacion->nombre_carrera;
            $nivel_academico = $certificacion->nivel_academico;
            $fecha_graduacion = $certificacion->fecha_graduacion;
            $facultad = $certificacion->facultad;
            $estado = $certificacion->estado;
            $transaccion = $certificacion->transaccion;
            $usuario = $certificacion->usuario;
            $fecha = $certificacion->fecha_usr;
            $barcode = $certificacion->barcode;
            $tipo_tramite = $certificacion->tipo_tramite;
            $no_titulo = $certificacion->no_titulo;
            $cod_ua = $certificacion->cod_ua;
            $cod_extension = $certificacion->cod_ext;
            $cod_carrera = $certificacion->cod_car;
            $correlativo = $certificacion->correlativo;
            $ciclo = $certificacion->ciclo;

            $fecha = self::fechaLetras($fecha);

            $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;;'));
            foreach ($jefatura as $datos) {
                $jefatura_nombre = $datos->nombre;
                $jefatura_puesto = $datos->puesto;
            }

            $coordinacion = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "Coordinador del Área de Títulos" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;;'));
            foreach ($coordinacion as $datos) {
                $coordinacion_nombre = $datos->nombre;
                $coordinacion_puesto = $datos->puesto;
            }

            $user = DB::select(DB::raw('SELECT iniciales from usuario u WHERE login = ' . $usuario . ' ;'));
            //Log::info('fecha en letras: '.$usuario);
            foreach ($user as $datos) {
                $user = $datos->iniciales;
            }

            $title = "Registro y Estadística";

            return view(
                'portalEstudiantil.pages.servicios.verificarCertificacionTitulos',
                compact(
                    'carnet',
                    'cui',
                    'nombre',
                    'nombre_carrera',
                    'nivel_academico',
                    'fecha_graduacion',
                    'title',
                    'facultad',
                    'estado',
                    'transaccion',
                    'fecha',
                    'hash',
                    'jefatura_nombre',
                    'jefatura_puesto',
                    'user',
                    'tipo_tramite',
                    'no_titulo',
                    'coordinacion_nombre',
                    'coordinacion_puesto',
                    'cod_ua',
                    'cod_extension',
                    'cod_carrera',
                    'ciclo',
                    'correlativo'

                )
            );
        } else {

            return Redirect::back()->withErrors(['msg' => 'El codigo de barras ingresado no es el correcto']);
        }
    }
}
