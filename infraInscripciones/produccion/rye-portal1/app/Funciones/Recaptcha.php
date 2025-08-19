<?php
namespace App\Funciones;

class Recaptcha {
    const SITE_KEY = '6LcpF8kZAAAAAGfe7hLzvrfvlNVwivK-_2kKWryW';
    const SECRET_KEY = '6LcpF8kZAAAAAGju2sbFxQvcAXSZ9ciW2r7uNCMe';
    const URL = 'https://www.google.com/recaptcha/api/siteverify';
    
    public static function verificar($token){
        
        $len = strlen($token);
        if(!$len)
            return false;

        $data = [
            "secret" => self::SECRET_KEY,
            "response" => $token
        ];
        $llamada = array(
            "http" => array (
                'header'=> 'Content-type: application/x-www-form-urlencoded\r\n',
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $contexto = stream_context_create($llamada);

        $rst = file_get_contents(self::URL, false, $contexto);

        if(!$rst)
            return false;
        
        $respuesta = json_decode($rst);

        return $respuesta->success;
    }
}