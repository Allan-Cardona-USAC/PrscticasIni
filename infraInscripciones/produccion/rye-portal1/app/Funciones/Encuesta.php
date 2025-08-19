<?php


namespace App\Funciones;

define('ENCUESTA_PRIMER_INGRESO_TABLA','lime_tokens_733218');
//define('ENCUESTA_PRIMER_INGRESO_HOST','192.168.2.31');
define('ENCUESTA_PRIMER_INGRESO_HOST','db_encuesta');
define('ENCUESTA_PRIMER_INGRESO_DB','encuestas');
define('ENCUESTA_PRIMER_INGRESO_USER','limesurvey');
//define('ENCUESTA_PRIMER_INGRESO_PWD','3st4d20!3');
define('ENCUESTA_PRIMER_INGRESO_PWD','123456');
define('ENCUESTA_PRIMER_INGRESO_PORT','5432');
define('ENCUESTA_REINGRESO_TABLA','lime_tokens_733218');

class Encuesta
{
    /**
     * Crea la conexion a la base de datos postgres que contiene las encuestas llenadas por los estudiantes
     * @return resource|null - Devuelve una conexión a la base de datos si esta disponible y los datos correctos, de lo contrario devuelve null
     */
    function conexion(){
        $connString = "host=".ENCUESTA_PRIMER_INGRESO_HOST." port=".ENCUESTA_PRIMER_INGRESO_PORT." dbname=".ENCUESTA_PRIMER_INGRESO_DB." user=".ENCUESTA_PRIMER_INGRESO_USER." password=".ENCUESTA_PRIMER_INGRESO_PWD;
        $conn = pg_connect($connString);
        return (!$conn ? null : $conn);
    }

    /**
     * Obtiene el token de encuesta realizada de la tabla donde se almacenan los datos de la encuesta solicitada.
     * @param $tabla - Nombre de la tabla en la que deseamos buscar
     * @param $nov - Número de Orientación Vocacional que deseamos buscar
     * @return int - Devuelve el token si ya termino la encuesta, de lo contrario devuelve 0
     */
    public function validarEncuesta($id){
        $retorno = 0;
        $conn = conexion();
        if($conn){
            $sql = sprintf("select token from %s where usesleft > 0 and completed = 'N' and token = '%d'",ENCUESTA_REINGRESO_TABLA, $id);
            $result = pg_query($conn,$sql);
            if($result){
                while($array = pg_fetch_array($result)){
                    $retorno = $array['token'];
                }
            }
        }
        return $retorno;
    }
}
