<?php

namespace App\Funciones;

use App\Models\Pcb;
use GuzzleHttp\Client;
use App\Models\CicloActivo;
use App\Models\PruebaEspecifica;
use App\Models\Facultad;
use nusoap_client;
use Exception;

class ResultadoPruebas
{

    public static function getResultadosPCB($nov)
    {
        $pruebasUsuario = pcb::select('id_prueba')->where('nov', '=', $nov)->get();
        $tmp = ResultadoPruebas::agregarMensaje($pruebasUsuario);
        if ($pruebasUsuario->count() == 0)  $tmp = ResultadoPruebas::consultarSun($nov); //Si no hay datos en nuestra base de datos se consulta en el SUN

        return $tmp;
    }


    public static function getResultadosEspecificas($nov, $cui, $unidadAcademica, $extension, $carrera)
    {
        $ciclo = CicloActivo::first();
        switch ($unidadAcademica) {
            case 2: //Arquitectura
                try {
                    $textopm_esp = "<VERIFICAR_PE>" .
                        "<USR>20179543</USR>" .
                        "<PWD>cKBu!tTF5p7UrNYutw08</PWD>" .
                        "<NOV>$nov</NOV>" .
                        "<CUI>$cui</CUI>" .
                        "<UA>$unidadAcademica</UA>" .
                        "<EXT>$extension</EXT>" .
                        "<CAR>$carrera</CAR>" .
                        "<CICLO>$ciclo->ciclo_activo</CICLO>" .
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('http://aspirante.arquitectura.usac.edu.gt/soap/wsPrimerIngreso?wsdl', 'wsdl');
                    $param = array('pxml' => $textopm_esp,);
                    $response = $client->call('verificar_prueba_especifica_str', $param);
                    $datosEspecifica = Utilidades::xml2array(
                        utf8_encode(
                            str_replace(
                                "<NOTA/>",
                                "",
                                str_replace('<?xml version="1.0"?>', '', $response)
                            )
                        )
                    );

                    if (
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "Satisfactorio"
                    ) {
                        return true; //Satisfactorio
                    } else {
                        // Busca en la base si tiene PE
                        $pruebas = PruebaEspecifica::where([
                            ['nov', '=', $nov],
                            ['ua', '=', $unidadAcademica],
                            ['ext', '=', $extension],
                            ['car', '=', $carrera]
                        ])->first();
                        if ($pruebas) {
                            if ($pruebas->resultado == 'Satisfactorio') {
                                return true;
                            } else {
                                return 'No se ha encontrado una prueba específica para esta carrera.';
                            }
                        } else
                            return 'No se encontraron pruebas específicas para la  ' . Facultad::find($unidadAcademica)->nomfac .
                                ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos. En caso de duda, le sugerimos ponerse en contacto directamente con su unidad académica.";
                    }
                } catch (Exception $x) {
                    return 'error de comunicacion con ' . Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
                break;
            case 4: //Derecho
                try {
                    $textopm_esp = "<VERIFICAR_PE>" .
                        "<USR>a579996707f93f77f5fd85e98d2ac0d4</USR>" .
                        "<PWD>0f1b00fbca289bea8865f2e2c995d586</PWD>" .

                        "<NOV>$nov</NOV>" .
                        "<CUI>$cui</CUI>" .
                        "<UA>$unidadAcademica</UA>" .
                        "<EXT>$extension</EXT>" .
                        "<CAR>$carrera</CAR>" .
                        "<CICLO>$ciclo->ciclo_activo</CICLO>" .
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('https://usacderecho.com/wspiderecho/wspiderecho.php?wsdl', 'wsdl');
                    $param = array('datos' => $textopm_esp,);
                    $response = $client->call('verificar_PE_NOV', $param);

                    $datosEspecifica = Utilidades::xml2array(utf8_encode($response));
                    if (
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "1"
                    ) {
                        return true; //Satisfactorio
                    } else {
                        // Busca en la base si tiene PE
                        $pruebas = PruebaEspecifica::where([
                            ['nov', '=', $nov],
                            ['ua', '=', $unidadAcademica],
                            ['ext', '=', $extension],
                            ['car', '=', $carrera]
                        ])->first();
                        if ($pruebas) {
                            if ($pruebas->resultado == 'Satisfactorio') {
                                return true;
                            } else {
                                return 'No se ha encontrado una prueba específica para esta carrera.';
                            }
                        } else
                            return 'No se encontraron pruebas específicas para la  ' . Facultad::find($unidadAcademica)->nomfac .
                                ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos. En caso de duda, le sugerimos ponerse en contacto directamente con su unidad académica.";
                    }
                } catch (Exception $x) {
                    return 'Error de comunicación con -' . Facultad::find($unidadAcademica)->nomfac;
                }
                break;
            case 5: //Medicina201020578
                try {
                    $textopm_esp = "<VERIFICAR_PE>" .
                        "<USR>parnaso</USR>" .
                        "<PWD>00:22:19:61:D4:BB</PWD>" .
                        "<NOV>$nov</NOV>" .
                        "<CUI>$cui</CUI>" .
                        "<UA>$unidadAcademica</UA>" .
                        "<EXT>$extension</EXT>" .
                        "<CAR>$carrera</CAR>" .
                        "<CICLO>$ciclo->ciclo_activo</CICLO>" .
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('http://registro.usac.edu.gt/WSping/especificasMedicina.php?wsdl', 'wsdl');
                    $param = array('xmlDatos' => $textopm_esp,);
                    $response = $client->call('especificasMedicina', $param);
                    $datosEspecifica = Utilidades::xml2array(utf8_encode($response['return']));
                    if (
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] === "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] === "Satisfactorio"
                    ) {
                        return true; //Satisfactorio
                    } else {
                        // Busca en la base si tiene PE
                        $pruebas = PruebaEspecifica::where([
                            ['nov', '=', $nov],
                            ['ua', '=', $unidadAcademica],
                            ['ext', '=', $extension],
                            ['car', '=', $carrera]
                        ])->first();
                        if ($pruebas) {
                            if ($pruebas->resultado == 'Satisfactorio') {
                                return true;
                            } else {
                                return 'No se ha encontrado una prueba específica para esta carrera.';
                            }
                        } else
                            return 'No se encontraron pruebas específicas para la  ' . Facultad::find($unidadAcademica)->nomfac .
                                ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos. En caso de duda, le sugerimos ponerse en contacto directamente con su unidad académica.";
                    }
                } catch (Exception $x) {
                    return 'Error de comunicacion con ' . Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
            case 8: //Ingenieria

                $id_cliente = "WEBSERP";
                $data_array = array("operacion" => "obtener_resultados_estudiante", "idVocacional" => $nov);
                $data_json = json_encode($data_array);
                $ff = hash_hmac('sha1', $data_json, 'f80pcnol3v68dabspgph', true);
                $hmac = base64_encode($ff);

                $url = 'https://primeringreso.ingenieria.usac.edu.gt/rest.php';
                $data = array('id_cliente' => $id_cliente, 'data' => $data_json, 'hash' => $hmac);
                $ch = curl_init($url);

                $postString = http_build_query($data, '', '&');

                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($ch);
                curl_close($ch);
                //$pruebas="";
                $morir = json_decode(json_decode($response, true));
                // $pruebas = 1; //todo quitar esto cuando se resuelva el problema con el ws de la prueba especifica
                $pruebas = $morir->pruebasaprobadas; // esto devuelve un 1 : GANO
                if ($pruebas == 1) {
                    return true; //Satisfactorio
                } else if ($pruebas == 0) {
                    // Busca en la base si tiene PE
                    $pruebas = PruebaEspecifica::where([
                        ['nov', '=', $nov],
                        ['ua', '=', $unidadAcademica],
                        ['ext', '=', $extension],
                        ['car', '=', $carrera]
                    ])->first();
                    if ($pruebas) {
                        if ($pruebas->resultado == 'Satisfactorio') {
                            return true;
                        } else {
                            return 'No se ha encontrado una prueba específica para esta carrera.';
                        }
                    } else
                        return 'No se encontraron pruebas específicas para la  ' . Facultad::find($unidadAcademica)->nomfac .
                            ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos. En caso de duda, le sugerimos ponerse en contacto directamente con su unidad académica.";
                } else {
                    return 'Error de comunicación con ' . Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }

            case 12: //CUNOC
                try {
                    $textopm_esp = "<VERIFICAR_PE>" .
                        "<USR>rye7aC</USR>" .
                        "<PWD>3on54y3+</PWD>" .
                        "<NOV>$nov</NOV>" .
                        "<CUI>$cui</CUI>" .
                        "<UA>$unidadAcademica</UA>" .
                        "<EXT>$extension</EXT>" .
                        "<CAR>$carrera</CAR>" .
                        "<CICLO>$ciclo->ciclo_activo</CICLO>" .
                        "</VERIFICAR_PE>";
                    $client = new nusoap_client('https://ryca.cunoc.edu.gt/serviciosweb/wsdl_sncunoc.php?wsdl', 'wsdl');
                    $param = array('parametros' => $textopm_esp,);
                    $response = $client->call('primerIngreso', $param);
                    $datosEspecifica = Utilidades::xml2array(utf8_encode(str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $response)));
                    if (
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "Satisfactorio"
                    ) {
                        return true; //Satisfactorio
                    } else {
                        // Busca en la base si tiene PE
                        $pruebas = PruebaEspecifica::where([
                            ['nov', '=', $nov],
                            ['ua', '=', $unidadAcademica],
                            ['ext', '=', $extension],
                            ['car', '=', $carrera]
                        ])->first();
                        if ($pruebas) {
                            if ($pruebas->resultado == 'Satisfactorio') {
                                return true;
                            } else {
                                return 'No se ha encontrado una prueba específica para esta carrera.';
                            }
                        } else
                            return 'No se encontraron pruebas específicas para la  ' . Facultad::find($unidadAcademica)->nomfac .
                                ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos. En caso de duda, le sugerimos ponerse en contacto directamente con su unidad académica.";
                    }
                } catch (Exception $x) {
                    return 'Error de comunicación con ' . Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
                break;
            case 14: // Historia
                $pruebas = PruebaEspecifica::where([
                    ['nov', '=', $nov],
                    ['ua', '=', $unidadAcademica]
                ])->first();
                if ($pruebas) {
                    if ($pruebas->resultado == 'Satisfactorio') {
                        return true;
                    } else {
                        return 'No se ha encontrado una prueba específica para esta carrera.';
                    }
                }
                break;
            case 77: //Humanidades
                try {
                    $textopm_esp = "<VERIFICAR_PE>" .
                        "<USR>rye</USR>" .
                        "<PWD>17#pe!20</PWD>" .
                        "<NOV>$nov</NOV>" .
                        "<CUI>$cui</CUI>" .
                        "<UA>$unidadAcademica</UA>" .
                        "<EXT>$extension</EXT>" .
                        "<CAR>$carrera</CAR>" .
                        "<CICLO>$ciclo->ciclo_activo</CICLO>" .
                        "</VERIFICAR_PE>";

                    $client = new nusoap_client('http://humanidades.usac.edu.gt/pruebas_especificas/WS/pe', 'wsdl');
                    $param = array('entrada' => $textopm_esp,);
                    $response = $client->call('getResultadoPE', $param);

                    $datosEspecifica = Utilidades::xml2array(utf8_encode($response));
                    if (
                        isset($datosEspecifica['RESPUESTA']['ERROR']['value'])
                        && $datosEspecifica['RESPUESTA']['ERROR']['value'] == "0"
                        && $datosEspecifica['RESPUESTA']['RESULTADO']['value'] == "Satisfactorio"
                    ) {
                        return true; //Satisfactorio
                    } else {
                        // Busca en la base si tiene PE
                        $pruebas = PruebaEspecifica::where([
                            ['nov', '=', $nov],
                            ['ua', '=', $unidadAcademica],
                            ['ext', '=', $extension],
                            ['car', '=', $carrera]
                        ])->first();
                        if ($pruebas) {
                            if ($pruebas->resultado == 'Satisfactorio') {
                                return true;
                            } else {
                                return 'No se ha encontrado una prueba específica para esta carrera.';
                            }
                        } else
                            return 'No se encontraron pruebas específicas para la  ' . Facultad::find($unidadAcademica)->nomfac .
                                ", si ya ha aprobado, por favor espere a que la unidad académica actualice los datos. En caso de duda, le sugerimos ponerse en contacto directamente con su unidad académica.";
                    }
                } catch (Exception $x) {
                    return 'Error de comunicacion con ' . Facultad::find($unidadAcademica)->nomfac; //Error de comunicaciÃ³n
                }
                break;
        }

        $pruebas = PruebaEspecifica::where([
            ['nov', '=', $nov],
            ['ua', '=', $unidadAcademica],
            ['ext', '=', $extension],
            ['car', '=', $carrera]
        ])->first();
        if ($pruebas){
               if($pruebas->resultado=='Satisfactorio')
               {
                  //echo "<script type='text/javascript'>alert('busca en base ');</script>";
                    return true;

               }else{
                    return 'No se ha encontrado una prueba específica para esta carrera.';
               }

        }
        $msj = 'No se han encontrado sus pruebas específicas. Por favor, consulte con   ' . Facultad::find($unidadAcademica)->nomfac . ' para resolver su situación.'.
        ",  Si ya ha aprobado, espere a que la unidad académica actualice los datos o comuníquese directamente con ellos.";
        return $msj;
    }

    /**
     * Crea un arreglo con las pruebas basicas del estudiante
     */
    public static function agregarMensaje($consulta)
    {
        $variable = "";
        $aprobadas = array();
        foreach ($consulta as $prueba) {
            array_push($aprobadas, $prueba->id_prueba);
            switch ($prueba['id_prueba']) {
                case '1':
                    if(count($aprobadas) == 0) $variable .= 'Biología';
                    else $variable .= ':: Biología';
                    break;
                case '2':
                    if(count($aprobadas) == 0) $variable .= 'Física';
                    else $variable .= ':: Física';
                    break;
                case '3':
                    if(count($aprobadas) == 0) $variable .= 'Lenguaje';
                    else $variable .= ':: Lenguaje';
                    break;
                case '4':
                    if(count($aprobadas) == 0) $variable .= 'Matemática';
                    else $variable .= ':: Matemática';
                    break;
                case '5':
                    if(count($aprobadas) == 0) $variable .= 'Química';
                    else $variable .= ':: Química';
                    break;
            }
        }

        return [$variable, $aprobadas];
    }


    /**
     * Funcion para consultar en el SUN las pruebas basicas
     */
    public static function consultarSun($nov)
    {
        $pruebasGanadas = array();
        $client = new Client();
        $url = "https://resultadospcbws.usac.edu.gt/resultados";
        $comm_error = false;
        $variable = "";
        try {
            $res = $client->post(
                $url,
                [
                    'auth' => ['RyE_USAC20', 'RyE@2020_1'],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Cache-Control' => 'no-cache',
                    ],
                    'json' => [
                        'nov' => strval($nov),
                        'esCarnet' => false
                    ]
                ]
            );
        } catch (\Exception $ex) {
            $comm_error = true;
            $variable = "Error de comunición o no se encontro datos de aspirante en el servicio de consulta de pruebas básicas del SUN";
        }


        if ($comm_error)
            return [$variable, $pruebasGanadas];

        // Encuentra el WS y devuelve lo que obtiene de SUN :)
        if ($res->getBody() == null)
            return [$variable, $pruebasGanadas];

        $respuesta = json_decode($res->getBody(), true);

        foreach ($respuesta['aprobados'] as $prueba) {
            $variable .= ":: " . $prueba;
            switch ($prueba) {
                case 'Biología':
                    array_push($pruebasGanadas, 1);
                    break;
                case 'Fisica':
                    array_push($pruebasGanadas, 2);
                    break;
                case 'Lenguaje':
                    array_push($pruebasGanadas, 3);
                    break;
                case 'Matemática':
                    array_push($pruebasGanadas, 4);
                    break;
                case 'Química':
                    array_push($pruebasGanadas, 5);
                    break;
                default:
                    array_push($pruebasGanadas, 5);
            }
        }

        return [$variable, $pruebasGanadas];
    }
}
