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

class MapaInscritos extends Controller
{

    public function mapaIndex(){

        $ltoken = $this->getToken();
    
        $geojson = $this->getDataInscritos($ltoken);

        $geojson = json_encode($geojson);

        return view('administrativo.mapaInscritos.mapa', compact('geojson'));
    }

    public function buscaCarreras(Request $request){
        $id = $request->departamento;
        $anio = $request->anio;
        $semestre = $request->semest;
        log::info('esto tiene id: ' . $id);
        log::info('esto tiene id: ' . $anio);
        log::info('esto tiene id: ' . $semestre);

        $ltoken = $this->getToken();
    
        $carreras = $this->getDataCarreras($ltoken, $id, $anio, $semestre);

        $carreras = json_encode($carreras);

        log::info('esto trae de carreras api: ' . $carreras);
        
        if($id == null){ 
            return null;
        }else{
            return $carreras;
        }

    }

    public function buscaInscritosCicloSemestre(Request $request){
        $ciclo = $request->ciclo;
        $semestre = $request->semestre;
        log::info('esto tiene ciclo: ' . $ciclo.' esto tiene semestre: '. $semestre);

        $ltoken = $this->getToken();
    
        $inscritos = $this->getDataInscritosCicloSemestre($ltoken, $ciclo, $semestre);

        $inscritos = json_encode($inscritos);

        log::info('esto trae de carreras api: ' . $inscritos);
        
        return $inscritos;

    }

    public static function getToken(){
        error_log(config('contadores.URL_TOKEN').' configuracion');
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL,config('contadores.URL_TOKEN'));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,
                    "username=".config('contadores.USER')."&password=".config('contadores.PASS'));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($curl);
        curl_close($curl);
        $json = json_decode($response);
        log::info('esto tiene token: '.$response);
        return $json->access_token;
    }

    public static function getDataInscritos($token){
        $curl = curl_init();
        $headers = array(
            'Authorization: bearer '.$token
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('contadores.URL_INS'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);        
        curl_close($curl);

        $json = json_decode($response);
        
        return $json;
    }

    public static function getDataCarreras($token, $id, $anio, $semestre){
        log::info('entro a la funciom de carreras');
        $curl = curl_init();
        $headers = array(
            'Authorization: bearer '.$token
        );
        $ruta = config('contadores.URL_CAR');
        $ruta = $ruta.'?id='.$id.'&ciclo='.$anio.'&semestre='.$semestre;

        log::info('entro a la funciom de carreras con ruta: ' . $ruta);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ruta,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);        
        curl_close($curl);

        $json = json_decode($response);
        
        return $json;
    }

    public static function getDataInscritosCicloSemestre($token, $ciclo, $semestre){
        log::info('entro a la funciom de carreras');
        $curl = curl_init();
        $headers = array(
            'Authorization: bearer '.$token
        );
        $ruta = config('contadores.URL_INSCICLOSEMESTRE');
        $ruta = $ruta.'?ciclo='.$ciclo.'&semestre='.$semestre;

        log::info('entro a la funciom de carreras con ruta: ' . $ruta);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ruta,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);        
        curl_close($curl);

        $json = json_decode($response);
        
        return $json;
    }

}