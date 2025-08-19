<?php

namespace App\Funciones;

class Contadores
{
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
        if(!$json) return "";
        return $json->access_token;
    }

    public static function getDataContadores($token){
        
        if($token != ""){
        $curl = curl_init();
        $headers = array(
            'Authorization: bearer '.$token
        );
     
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('contadores.URL_DATA'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);        
        curl_close($curl);

        $json = json_decode($response);
        if ($json)
        return $json;
    }
    
    $response = '[{"facultad": "Facultades", "ciclo": 2024, "total": 0, "contadores": [{"cod_ua": 1, "facultad": "Facultad de Agronomía", "total": 0}, {"cod_ua": 2, "facultad": "Facultad de Arquitectura", "total": 0}, {"cod_ua": 3, "facultad": "Facultad de Ciencias Económicas", "total": 0}, {"cod_ua": 4, "facultad": "Facultad de Ciencias Jurídicas y Sociales", "total": 0}, {"cod_ua": 5, "facultad": "Facultad de Ciencias Médicas", "total": 0}, {"cod_ua": 6, "facultad": "Facultad de Ciencias Químicas y Farmacia", "total": 0}, {"cod_ua": 7, "facultad": "Facultad de Humanidades", "total": 0}, {"cod_ua": 8, "facultad": "Facultad de Ingeniería", "total": 0}, {"cod_ua": 9, "facultad": "Facultad de Odontología", "total": 0}, {"cod_ua": 10, "facultad": "Facultad de Medicina Veterinaria y Zootecnia", "total": 0}, {"cod_ua": 55, "facultad": "Facultad de Ciencias Médicas", "total": 0}, {"cod_ua": 70, "facultad": "Facultad de Humanidades Programa de Formación Inicial Docente plan diario", "total": 0}, {"cod_ua": 77, "facultad": "Facultad de Humanidades", "total": 0}]}, {"facultad": "Centros Universitarios", "ciclo": 2024, "total": 0, "contadores": [{"cod_ua": 12, "facultad": "Centro Universitario de Occidente", "total": 0}, {"cod_ua": 17, "facultad": "Centro Universitario del Norte", "total": 0}, {"cod_ua": 19, "facultad": "Centro Universitario de Oriente", "total": 0}, {"cod_ua": 20, "facultad": "Centro Universitario de Noroccidente", "total": 0}, {"cod_ua": 21, "facultad": "Centro Universitario del Sur", "total": 0}, {"cod_ua": 22, "facultad": "Centro Universitario de Suroccidente", "total": 0}, {"cod_ua": 23, "facultad": "Centro Universitario de Suroriente", "total": 0}, {"cod_ua": 24, "facultad": "Centro de Estudios del Mar y Acuicultura", "total": 0}, {"cod_ua": 25, "facultad": "Centro Universitario de San Marcos", "total": 0}, {"cod_ua": 26, "facultad": "Centro Universitario de Petén", "total": 0}, {"cod_ua": 27, "facultad": "Centro Universitario de Izabal", "total": 0}, {"cod_ua": 32, "facultad": "Centro Universitario de Santa Rosa", "total": 0}, {"cod_ua": 34, "facultad": "Centro Universitario de Jutiapa", "total": 0}, {"cod_ua": 35, "facultad": "Centro Universitario de Chimaltenango", "total": 0}, {"cod_ua": 37, "facultad": "Centro Universitario de Baja Verapaz", "total": 0}, {"cod_ua": 38, "facultad": "Centro Universitario de El Progreso", "total": 0}, {"cod_ua": 39, "facultad": "Centro Universitario de Totonicapán", "total": 0}, {"cod_ua": 40, "facultad": "Centro Universitario de El Quiché", "total": 0}, {"cod_ua": 41, "facultad": "Centro Universitario de Zacapa", "total": 0}, {"cod_ua": 42, "facultad": "Centro Universitario de Sololá", "total": 0}, {"cod_ua": 44, "facultad": "Centro Universitario de Sacatepéquez", "total": 0}, {"cod_ua": 45, "facultad": "Centro Universitario de Retalhuleu", "total": 0}]}, {"facultad": "Escuelas", "ciclo": 2024, "total": 0, "contadores": [{"cod_ua": 13, "facultad": "Escuela de Ciencias Psicológicas", "total": 0}, {"cod_ua": 14, "facultad": "Escuela de Historia", "total": 0}, {"cod_ua": 15, "facultad": "Escuela de Trabajo Social", "total": 0}, {"cod_ua": 16, "facultad": "Escuela de Ciencias de la Comunicación", "total": 0}, {"cod_ua": 28, "facultad": "Escuela de Ciencia Política", "total": 0}, {"cod_ua": 29, "facultad": "Escuela de Formación de Profesores de Enseñanza Media", "total": 0}, {"cod_ua": 30, "facultad": "Escuela de Ciencias Linguisticas", "total": 0}, {"cod_ua": 33, "facultad": "Escuela Superior de Arte", "total": 0}, {"cod_ua": 43, "facultad": "Escuela de Ciencias Fisicas y Matemáticas", "total": 0}]}, {"facultad": "Institutos", "ciclo": 2024, "total": 0, "contadores": [{"cod_ua": 31, "facultad": "Instituto Tecnológico Maya de Estudios Superiores", "total": 0}, {"cod_ua": 36, "facultad": "Instituto Tecnológico Universitario Guatemala - Sur", "total": 0}, {"cod_ua": 90, "facultad": "Instituto Nacional de Administración Pública", "total": 0}]}]'

;

        return json_decode($response);
    }
}

?>