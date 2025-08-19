<?php
namespace App\Funciones;

class GestionArchivos
{
    /**
     * Funcion que analiza una imagen
     * consumiendo una funcion lambda
     * en AWS
     */
    public static function analizarFotografia($file)
    {
        //TODO quitar la siguiente linea para habilitar la validación
        return ['statusCode' => 200, 'body' => 'La imagen es correcta'];
        $file_content = file_get_contents($file);
        $bytes = base64_encode($file_content);
        $data = array("image" => $bytes);
        $url = "https://oy4vrliee0.execute-api.us-east-2.amazonaws.com/prod"; //direccion de la funcion lambda que analizara la imagen
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        //Error al consumir la funcion lambda
        if (!$response) return ["statusCode" => 400, "body" => "Error al analizar la fotografia"];

        //Se consume la funcion lambda pero la imagen supera el limite de espera
        if (!str_contains($response, '"statusCode":200')) return ["statusCode" => 400, "body" => "Error al analizar la fotografia"];

        $body = json_decode($response);
        $selfie = GestionArchivos::getLabels($body->body,"Selfie",65);
        if($selfie)  return ["statusCode" => 400, "body" => "No se permiten selfies"];

        $person = GestionArchivos::getLabels($body->body,"Person",90);
        if(!$person) return ["statusCode" => 400, "body" => "La fotografia tiene que ser de una persona"];

        $face =  GestionArchivos::getLabels($body->body,"Face",70);
        if(!$face) return ["statusCode" => 400, "body" => "El rostro tiene que estar descubierto (sin mascarilla)"];

        return ["statusCode" => 200, "body" => "La imagen es correcta"];
    }

    /**
     * Funcion encargada de conectarse
     * por SSH al servidor de imagenes
     * y actualizar la fotografia
     */
    public static function almacenarFotografia($nombre,$file){
        $conexion = GestionArchivos::conexionSSH();
        if(is_string($conexion)) return ["statusCode" => 400, "body" => "Error al conectarse al servidor remoto"];

        //cadena STFP para guardar la imagen
        $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';
        $res = file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $nombre . '.jpg' );
        //Verificar si hay fotos previas
        if($res){
            $intento = 1;
            while(file_exists('ssh2.sftp://'. $stfp . $conexion["path"] . $nombre . '_' . $intento . '.jpg' )){
                $intento++;
            }

            rename('ssh2.sftp://'. $stfp . $conexion["path"]. $nombre . '.jpg','ssh2.sftp://'. $stfp . $conexion["path"] . $nombre .  '_' . $intento . '.jpg');
        }

        $res = ssh2_scp_send($conexion["conexion"],$file,$conexion["path"]. $nombre . '.jpg',0644);

        ssh2_disconnect($conexion["conexion"]);

        return ["statusCode" => 200, "body" => "Imagen Almacenada "];


    }

    /**
     * Funcion encargada de buscar una
     * label en especifico y con un
     * nivel de confidence en especifico
     */
    public static function getLabels($body, $search, $confidence)
    {
        $labels = json_decode($body);
        foreach ($labels as $label) {
            if ($label->Name === $search) {
                if ($label->Confidence >= $confidence) return true;
            }
        }

        return false;
    }
    
    public static function almacenarCertificado($nombre,$file,$extension){
        $conexion = GestionArchivos::conexionSSH();
        if(is_string($conexion)) return ["statusCode" => 400, "body" => "Error al conectarse al servidor remoto"];

        //cadena STFP para guardar la imagen
        $stfp = $conexion["usuario"].':'.$conexion["password"].'@'.$conexion["ip"].':22';
        $res = file_exists('ssh2.sftp://'. $stfp . $conexion["pathCertificado"] . $nombre . '.' . $extension);
        //Verificar si hay fotos previas
        if($res){
            $intento = 1;
            while(file_exists('ssh2.sftp://'. $stfp . $conexion["pathCertificado"] . $nombre . '_' . $intento . '.' . $extension )){
                $intento++;
            }

            rename('ssh2.sftp://'. $stfp . $conexion["pathCertificado"]. $nombre .  '.' . $extension,'ssh2.sftp://'. $stfp . $conexion["pathCertificado"] . $nombre .  '_' . $intento . '.' . $extension);
        }

        $res = ssh2_scp_send($conexion["conexion"],$file,$conexion["pathCertificado"]. $nombre . '.' . $extension,0644);

        ssh2_disconnect($conexion["conexion"]);

        return ["statusCode" => 200, "body" => "Certificado Almacenada "];
    }

    /**
     * Intenta crear una conexion remota
     * mediante ssh con el servidor de
     * fotografias
     */
    public static function conexionSSH(){
        $ip = config('remoto.ip');
        $path = config('remoto.path');
        $pathBoleta = config('remoto.pathBoleta');
        $usuario = config('remoto.usuario');
        $password = config('remoto.password');
        $sshConnection = ssh2_connect($ip, 22);

        if(is_null($sshConnection)) return "No es posible conectarse al servidor remoto";
        $could_auth = ssh2_auth_password($sshConnection,$usuario,$password);

        if(!$could_auth) return "Error de Autentificacion";

        $conexion = [
            "conexion" => $sshConnection,
            "usuario" => $usuario,
            "password" => $password,
            "ip" => $ip,
            "path" => $path,
            "pathBoleta" => $pathBoleta,
            "pathCertificado" => config('remoto.pathCertificado')
        ];

        return $conexion;

    }

    
}