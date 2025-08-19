<?php

namespace App\Funciones;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

class MedicinaApi extends Controller
{
    //echo 'long: '.strlen($_POST['carnet']);
    public static function consulta_inscripcion($carnet){
        if ($carnet>0) {
            Log::info('prueba de logs carnet '.$carnet);  
            // inicializando una nueva sesión de cURL
            $prueba = 'ENTRE A MEDICINA';
            $canal = curl_init();
            $url = "https://postgradomedicina.usac.edu.gt/services/consulta_inscripcion.php?id_persona=".$carnet;
            curl_setopt($canal, CURLOPT_URL, $url);
            curl_setopt($canal, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($canal);
            if (curl_errno($canal)){
                $jsonMedicina = '{"respuesta": -1, "descripcion":"Error de comunicación con el Servidor de Postgrado Medicina" }';
                return json_decode($jsonMedicina);
            }
            $respuestajson = json_decode($respuesta);
            $respuesta = file_get_contents($url);
            if (curl_errno($canal)) {
                $error_msg = curl_error($canal);
                echo 'Error de conexión a la API';
            } else {
                curl_close($canal);
                return $respuestajson;
            }
        }
    }
}