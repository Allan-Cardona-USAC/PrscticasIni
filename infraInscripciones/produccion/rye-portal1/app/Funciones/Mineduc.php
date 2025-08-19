<?php

namespace App\Funciones;

trait Mineduc {

    public function consultaMineduc($cuiTitulo, $tipoConsulta){
        $curl = curl_init();
        $headers = array(
            'Content-Type: application/json; charset=utf-8'
            );

        curl_setopt_array($curl, array(    
        CURLOPT_URL => 'http://10.18.1.250/consulta_titulo?identificador='.$cuiTitulo.'&tipo='.$tipoConsulta,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => $headers
        ));

        $response = curl_exec($curl);

        $error = curl_errno($curl);

        error_log($response);

        if($error){
            return array('error' => $error, 'mensaje' => 'CO1 - No se puede comunicar con MINEDUC');
        }

        curl_close($curl);
        $json = json_decode($response, false);

        if(!$json){
            return array('error' => 89, 'mensaje' => 'CO2 - No se pudo procesar la respuesta de MINEDUC ' . $error);
        }

        if(empty($json->TituloMedio->apellidos)){
            return array('error' => 90, 'mensaje' => 'CO3 - No existen registros en MINEDUC', "data" => $json);
        }else{
            return  array('error' => 0, 'mensaje' => 'Consulta exitosa', 'data'=>$json);
        }
    }
}
