<?php
include "configEncuesta.php";
use App\Models\BitacoraInscripcion;
use App\Models\CicloActivo;
use Illuminate\Support\Facades\Auth;

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
function validarEncuesta($carnet){
    
    $retorno = 'N';
    $conn = conexion();
    if($conn){
        $sql = sprintf("select completed, emailstatus from %s where token = '%d'",ENCUESTA_REINGRESO_TABLA, $carnet);
        $result = pg_query($conn,$sql);
        if($result){
            $nrst = pg_num_rows($result);
            if($nrst == 0){
                /*si el estudiante no esta en la db de encuesta
                 se crea el registro**/
                $estudiante = Auth::guard('estudiante')->user();
                $query2 = "INSERT INTO " . ENCUESTA_REINGRESO_TABLA . "(firstname, lastname, email, emailstatus, token, language)
                VALUES('".
                    RemoveSpecialChar($estudiante->nombre1) ." " .
                    RemoveSpecialChar($estudiante->nombre2) . "', '" .
                    RemoveSpecialChar($estudiante->primer_apellido) . " ".
                    RemoveSpecialChar($estudiante->segundo_apellido)."', '".
                    $estudiante->email. "', 'OK', '".
                    $estudiante->carnet . "', 'es')";
                $conn = conexion();
                pg_query($conn, $query2);
                return 'N';
            }

            $array = pg_fetch_array($result);
            if( $array['completed'] && $array['completed'] != 'N')
		        $retorno = 'Y';
        }
    }
    return $retorno;
}

function RemoveSpecialChar($str){
    $res = str_replace("'", '', $str);
    return $res;
}
?>
