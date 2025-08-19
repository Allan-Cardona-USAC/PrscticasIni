<?php

namespace App\Funciones;

use App\PortalAdministrativo\aspirante as aspirante;
use Carbon\Carbon;


class ConsultaOV
{

    public static function consultarAspiranteOV($nov){
        
        $token ='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJyeWUudXNhYy5lZHUuZ3QiLCJhdXRoIjoxLCJhZG1pbiI6InJ5ZWluZm9ybWF0aWNhMjAyMEBnbWFpbC5jb20iLCJ2IjoyLCJpc3MiOiJvdiIsImF1ZCI6InZhcGkudXNhYy5lZHUuZ3QiLCJpYXQiOjE2Mzg0Nzc3Njl9.S5GoCtB6LpYDWSeZrFzz5-Xts2F9ie5TfeXKPnIT6zQ';
        $curl = curl_init();
        $nov = (string)$nov;
        $data_json = json_encode(array('nov' => $nov));
        $headers = array(
        'Content-Type: application/json',
        'Authorization: bearer '.$token
        );

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://vapi.usac.edu.gt/public/v1/users/search',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data_json,
        CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($response, true);

        if (array_key_exists('status',$json) && $json['status'] == 404){
            return 'Verificar NOV, ya que no se encuentra en los datos de SUN';
        };

        $sexo =1;
        if (array_key_exists('gender',$json) && $json['gender'] ==0){
            $sexo=2;
        };

        $aspirante = new aspirante();
        $aspirante -> nov = $json['nov'];
        $aspirante -> nombre = $json['name'];
        $aspirante -> apellido = $json['last_name'];
        $aspirante -> direccion = array_key_exists('dir',$json)?$json['dir']:"";
        $aspirante -> fecha_nacimiento = $json['birthday_str'];
        $aspirante -> estado_civil = array_key_exists('civil',$json)?$json ['civil']:0;
        $aspirante -> sexo = $sexo;
        //$aspirante -> pin = ;
        $cod_establecimiento = array_key_exists('school',$json)?$json['school']:0;
        $aspirante -> cod_establecimiento =$cod_establecimiento? $cod_establecimiento:0;
        $aspirante -> correo = array_key_exists('email',$json)?$json['email']:"";
        $aspirante -> fec_carga =  Carbon::now();
        $aspirante -> save();


        return true;
    }


}