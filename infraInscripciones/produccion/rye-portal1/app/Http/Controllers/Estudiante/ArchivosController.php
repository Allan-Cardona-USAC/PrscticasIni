<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\CarnetNvo;
use App\Models\PingMineduc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use PDF;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\Aspirante\InscripcionAspiranteController;
use App\Models\BitacoraInscripcion;
use App\Funciones\Mineduc;

include app_path('/Funciones/Reinscripcion/validarCertificado.php');

class ArchivosController extends Controller
{

    use Mineduc;
    public function indexCarreras()
    {

        $carnet = Auth::guard('estudiante')->user()->carnet;
        $carreras = $this->getCarreras($carnet);

        $estudia_old = EstudiaOld::find($carnet);
        $codNacionalidad = $estudia_old->cod_nac;
        if($codNacionalidad == 30){
            $cui = $estudia_old->cui;
        }else{
            $cui = $estudia_old->numero_pasaporte;
        }
        $nombreCompleto = $estudia_old->getNombreCompleto();
        $ciclo = CicloActivo::first();
        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

        return view('portalEstudiantil.pages.archivos.indexCarreras', compact('carnet', 'cui', 'nombreCompleto', 'ciclo', 'carreras', 'cert_pendiente', 'codNacionalidad'));
    }

    public static function getCarreras($carnet)
    {

        $carreras = DB::select(DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
            CASE
            	WHEN ce.sit_acad= 0 THEN "Regular"
            	WHEN ce.sit_acad= 1 THEN "Incorporación"
            	WHEN ce.sit_acad= 2 THEN "P.E.G"
                WHEN ce.sit_acad= 3 THEN "Graduado"
            	ELSE "No definido"
            END as situacion
                FROM 
                    carrera_estudiante ce, 
                    facultad f, 
                    carrera_temporal ct, 
                    extension e
                WHERE 
                    ce.carnet = ' . $carnet . '
                AND ce.codfac = f.codfac
                AND ct.codigo_unidad_academica = ce.codfac
                AND ct.codigo_extension = ce.codext
                AND ct.codigo_carrera = ce.codcar
                AND e.codigo_unidad_academica = f.codfac 
                AND e.codigo_extension = ce.codext;'
        )); //Consulta carreras

        return $carreras;
    }

    public function ValidarCertificacionArchivos(Request $request)
    {
        // Almacenamos los datos del request en las variables

        $carnet = Auth::guard('estudiante')->user()->carnet;
        $nov = Auth::guard('estudiante')->user()->cod_orien;
        $nivel_academico = $request['nivel'];
        $cod_ua = $request['ua'];
        $cod_ext = $request['ext'];
        $cod_carrera = $request['idCarrera'];
        $nombre = $request['nombre'];
        $cui = $request['cui'];
        $nombre_carrera = $request['nombre_carrera'];
        $facultad = $request['facultad'];
        $nombre_extension = $request['nombre_extension'];
        $cert_pendiente = validarCertificado(Auth::guard('estudiante')->user()->carnet);

        $activo = Auth::guard('estudiante')->user()->activo;
        $observaciones_bloqueo = Auth::guard('estudiante')->user()->observaciones;
        $estudianteenLinea = $this->usuarioEnLinea($nov);
        $codNacionalidad = $request['codNacionalidad'];

        if($estudianteenLinea->isEmpty()){
            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia en línea. Presentarse al Departamento de Registro y Estadística en el área de archivos para solicitar tu constancia.']);
        }

        if ($activo != 1) { // validamos si el usuario se encuentra activo
            if($activo == -3){
                return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia. Es necesario presentarse al Departamento de Registro y Estadística para resolver su situación.']);
            }

            if($activo == 0 && $observaciones_bloqueo == "Pendiente comprobar título en Mineduc, envía tu registro de título a soporterye@adm.usac.edu.gt"){
                return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia. Pendiente de comprobar título en el Mineduc. Es necesario presentarse al Departamento de Registro y Estadística para resolver su situación.']);
            }

            $becados = $this->getBecados($carnet); // verificamos si existe en la lista de becados
            if (empty($becados)) { //validamos si no posee beca
                    return Redirect::back()->withErrors(['msg' => 'Es necesario presentarse al Departamento de Registro y Estadística para resolver su situación.']);
            } else {
                return Redirect::back()->withErrors(['msg' => 'Usuario bloqueado por beca. Favor comunicarse al Tel.: 3347-1032, Correo: gerardoa@usac.edu.gt o al Tel.: 5698-6330, Correo: abregofrancisco@usac.edu.gt.']);
            }
        }

        if (strlen($cod_ua) == 1) { //validamos si es unidad en el codigo de la unidad academica para agregarle el cero correspondiente, solicitado por la base de archivos 
            $cod_ua = "0" . $cod_ua;
        }
        if (strlen($cod_ext) == 1) { //validamos si es unidad en el codigo de la extension para agregarle el cero correspondiente, solicitado por la base de archivos 
            $cod_ext = "0" . $cod_ext;
        }
        if (strlen($cod_carrera) == 1) { //validamos si es unidad en el codigo de la carrera para agregarle el cero correspondiente, solicitado por la base de archivos 
            $cod_carrera = "0" . $cod_carrera;
        }

        if ($carnet >= 202000000 && $carnet < 202300000) {

            $mineducConsulta = PingMineduc::find($nov);
   
            log::info('esto contiene mineducconsulta: '. $mineducConsulta);
   
            if(Empty($mineducConsulta)){
               return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia. Dirígete al Departamento de Registro y Estadística para validar tu información.']);
            }
        }

        $sanciones = $this->verificarSanciones($carnet, $cod_ua, $cod_ext, $cod_carrera);
        foreach($sanciones as $data){
            $sancionTempUA = $data->sancion_temp_UA;
            $sancion = $data->sancion;
            $repitencia = $data->repitencia;
        }

        if( !empty($sancionTempUA) || !empty($sancion) || !empty($repitencia)){
            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia debido a que existe un inconveniente en la carrera de '.$nombre_carrera.'.' ]);
        }

        $token = $this->obtenerToken(); //obtenemos el token para la api_archivo

        $tipoConstancia = 4;

        $constancia = $this->obtenerConstancia($carnet, $cod_ua, $cod_ext, $cod_carrera, $tipoConstancia, $token); // obtenemos el array de datos de la api

        if (!empty($constancia)) { //verificamos si ya existen una constancia

            if(!empty($constancia)){
                $certificacion_id = $constancia[0]['certificacion_id'];
                $nombre = $constancia[0]['nombre'];
                $cui = $constancia[0]['identificacion'];
                $fecha_creacion = $constancia[0]['fecha_creacion'];
                $cod_ua = $constancia[0]['carrera_unidad'];
                $cod_ext = $constancia[0]['carrera_extension'];
                $cod_carrera = $constancia[0]['carrera_carrera'];
                $nombre_carrera = $constancia[0]['nombre_carrera'];
                $facultad = $constancia[0]['nombre_unidad'];
                $nombre_extension = $constancia[0]['nombre_extension'];
                $transaccion = $constancia[0]['transaccion'];
                $carnet = $constancia[0]['carnet'];
                $barcode = $constancia[0]['barcode'];
            }

                $key = substr($barcode,  0, 8) . substr($barcode,  -5);
                $barcode = $key;

                $fecha_creacion = Carbon::now();

                $fecha_usr = self::fechaLetras($fecha_creacion); // convertimos la fecha en letras
            
        } else {

            $estudia_old = EstudiaOld::find($carnet);
            $nombreCompleto = $estudia_old->getNombreCompleto(); // obtenemos el nombre del estudiante
            $usuarioLinea = $this->usuarioEnLinea($nov);

            if ($usuarioLinea->isNotEmpty()) {
                $Titulo = $this->tieneTitulo($nov);
                $tipoConsulta = 1; //consulta por CUI
                $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                $mineducTitulo = $mineducTitulo['data'];

                if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL || $mineducTitulo->TituloMedio->no_registro_titulo == "NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO") {
                    $mineduc_no_titulo = PingMineduc::find($nov);
                    $tipoConsulta = 2;
                    $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                    if($mineducTitulo['error'] !== 0){
                        return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                    }
                    $mineducTitulo = $mineducTitulo['data'];
                    if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado con el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística.']);
                    }
                }

                $nombreMineduc = str_replace(" ","", str_replace("  ","",$this->quitar_tildes(mb_strtoupper($mineducTitulo->TituloMedio->nombres . " " . $mineducTitulo->TituloMedio->apellidos , 'UTF-8'))));
                $nombreEstudiaOld = str_replace(" ","", str_replace("  ","", $this->quitar_tildes(mb_strtoupper($nombreCompleto, 'UTF-8'))));

                if(str_contains($nombreMineduc, $nombreEstudiaOld) == FALSE){
                    return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no podemos generar la constancia debido a que los datos del título registrado en nuestro sistema no coinciden con los del Mineduc.']);  
                }

                if ($Titulo->isEmpty()) {
                    $tipoConsulta = 1; //consulta por CUI
                    $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                    $mineducTitulo = $mineducTitulo['data'];

                    if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                        $mineduc_no_titulo = PingMineduc::find($nov);
                        $tipoConsulta = 2;
                        $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                        if($mineducTitulo['error'] !== 0){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];
                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado con el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística.']);
                        }
                    }

                    $ping_mineduc = PingMineduc::firstorNew(["nov" => $nov]);

                    $ping_mineduc->nov = $nov;
                    $ping_mineduc->nombres = $mineducTitulo->TituloMedio->nombres; // se insertan lo>
                    $ping_mineduc->reg_titulo = $mineducTitulo->TituloMedio->no_registro_titulo;
                    $ping_mineduc->cui = $mineducTitulo->TituloMedio->cui;
                    $ping_mineduc->apellidos = $mineducTitulo->TituloMedio->apellidos;
                    $ping_mineduc->fecha_nacimiento = $mineducTitulo->TituloMedio->fecha_nacimiento;
                    $ping_mineduc->promovido = $mineducTitulo->TituloMedio->promovido;
                    $ping_mineduc->fecha_promocion = $mineducTitulo->TituloMedio->fecha_promocion;
                    $ping_mineduc->codigo_carrera = $mineducTitulo->TituloMedio->codigo_carrera;
                    $ping_mineduc->nombre_carrera = $mineducTitulo->TituloMedio->nombre_carrera;
                    $ping_mineduc->codigo_establecimiento = $mineducTitulo->TituloMedio->codigo_establecimiento;
                    $ping_mineduc->nombre_establecimiento = $mineducTitulo->TituloMedio->nombre_establecimiento;
                    $ping_mineduc->codigo_sector = $mineducTitulo->TituloMedio->codigo_sector;
                    $ping_mineduc->save();
                }
            }

            if ($nivel_academico == 1 or $nivel_academico == 2) { // validamos el tipo de expediente segun el nivel_academico
                $tipo = 1;
            } else {
                $tipo = 2;
            }
            $token = $this->obtenerToken(); //obtenemos el token para la api_archivo

            $data = $this->obtenerDataRequisitos($carnet, $tipo, $token); // obtenemos el array de datos de los requisitos para generar la constancia

            // Realizamos un filtro para conocer el expediente que cumpla con tener la mayor cantidad de obligatorios entregados

            $datoprevio = null;

            $i = 0;

            foreach ($data as $dato) { // recorremos el array de requisitos

                $entrega = "S"; // asignamos la variable como S para comparar con los validos del array
                $obligatoria = "S"; // asignamos la variable como S para comparar con los validos del array
                $expe = $dato['expediente_id']; // obtenemos el expediente_id para validar con el registro previo

                if ($dato['expediente_id'] != $datoprevio) { // si se encuentra un expediente_id diferente, se procede...

                    $cantExpedientes[$i] = ["Expediente" => $expe]; //se almacena el expediente en un nuevo array

                    $cantExpedientes[$i]['Cantidad'] = count(array_filter($data, function ($item) use ($expe, $obligatoria, $entrega) { //se filtra y encuentra aquellos elementos que contengan especificamente los datos que buscamos

                        return ($item['expediente_id'] == $expe && $item['obligatorio'] == $obligatoria && $item['entregado'] == $entrega); //retorna aquellos que cumplen con las condiciones.

                    })); // se almacena la cantidad de expedientes que cumplen con ser obligatorios y entregados en S.

                    $i == $i++; // variable autoincremental para establecer las posiciones dentro del array de datos de los expedientes.

                    $datoprevio = $dato['expediente_id']; //almacenamos el nuevo expediente_id para continuar validando si existen mas expedientes.

                }
            }

            if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                $usuarioLinea = "1"; 
            }else{
                $usuarioLinea = "0"; 
            }

            $areacarnet=substr($carnet, 4,1);

            if (empty($cantExpedientes)) { // validamos si el usuario se encuentra activo

                $cunoc = substr($carnet, 4,1);
                log::info('este es el identificador de carnet: ' . $cunoc);
                if($cunoc == 3){ //valida si el carnet es de cunoc
                    return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a que tu expediente se encuentra en los archivos de CUNOC']);
                }
                elseif($cod_ua == 12 OR $cod_ua == 46){ //valida si pertenece a carreras de cunoc
                    if($cunoc == 9){ // valida si es un postgrado
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a un error al obtener el expediente de los archivos. Favor comunicarse al correo archivorye@adm.usac.edu.gt.']);
                    }else{ 
                    return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a que tu expediente se encuentra en los archivos de CUNOC']);
                    }
                }
                else{ // en caso no encuentra nada al consumir la api
                    return Redirect::back()->withErrors(['msg' => 'Ha ocurrido un error al obtener el expediente de los archivos. Favor comunicarse al correo archivorye@adm.usac.edu.gt.']);
                }
                
            }elseif(!empty($cantExpedientes) && ($cod_ua == 12 ||  $cod_ua == 46) && ($areacarnet == 3 || $areacarnet == 9) && $usuarioLinea == 0) {
                $cantExpedientes = collect($cantExpedientes); // transformamos en una colleccion
                $sortedExpe = $cantExpedientes->sortByDesc('Cantidad')->first(); // ordenamos y obtenemos el expediente que contenga mas obligados y entregados en S.
                $expediente = $sortedExpe['Expediente']; // almacenamos el expediente_id

                foreach ($data as $dato) { //recorremos el array de requisitos

                    $nombre = $dato['nombre'];
                    $entregado = $dato['entregado'];
                    $obligatorio = $dato['obligatorio'];
                    $expediente_id = $dato['expediente_id'];

                    if ($expediente_id == $expediente & $entregado == "N" & $obligatorio == "S") { // validomos si existe alguno entregado es obligado y se encuentra en estado N
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a que tu expediente se encuentra en los archivos de CUNOC']); // rechazamos al no tener expediente completo
                    }
                }
            }

            if (count($cantExpedientes) > 1 ) { // si existe mas de un expediente entramos.

                $cantExpedientes = collect($cantExpedientes); // transformamos en una colleccion
                $sortedExpe = $cantExpedientes->sortByDesc('Cantidad')->first(); // ordenamos y obtenemos el expediente que contenga mas obligados y entregados en S.
                $expediente = $sortedExpe['Expediente']; // almacenamos el expediente_id

                foreach ($data as $dato) { //recorremos el array de requisitos

                    $nombre = $dato['nombre'];
                    $entregado = $dato['entregado'];
                    $obligatorio = $dato['obligatorio'];
                    $expediente_id = $dato['expediente_id'];

                    if ($expediente_id == $expediente & $entregado == "N" & $obligatorio == "S") { // validomos si existe alguno entregado es obligado y se encuentra en estado N
                        return view('portalEstudiantil.pages.archivos.VisualizaDocumentosFaltantes', compact('data' . 'cert_pendiente')); // enviamos a la vista de requisitos faltantes
                    }
                }
            } else { // si solo existe un expediente

                foreach ($data as $dato) { //recorremos el array de requisitos

                    $nombre = $dato['nombre'];
                    $entregado = $dato['entregado'];
                    $obligatorio = $dato['obligatorio'];
                    $expediente_id = $dato['expediente_id'];

                    if ($entregado == "N" & $obligatorio == "S") { // validamos si existe alguno entregado es obligado y se encuentra en estado N
                        return view('portalEstudiantil.pages.archivos.VisualizaDocumentosFaltantes', compact('data', 'cert_pendiente')); // enviamos a la vista de requisitos faltantes
                    }
                }

                $token = $this->obtenerToken(); // obtenemos token

                $expediente = $this->obtenerExpediente($carnet, $tipo, $token); // buscamos el expediente_id

                foreach ($expediente as $dato) {
                    $expediente = $dato; //almacenamos el expediente en la variable
                }
            }

            $usuario_creacion = config('apiArchivos.usuario'); // almacenamos el usuario de la api
            $relacion = "Estudiante";
            $tipo_solicitante = "E";
            $tipo_certificacion_id = 1;
            $nombre = $request['nombre'];

            $certificacion_data = $this->GenerarCertificacionArchivos(
                $expediente,
                $nombre,
                $relacion,
                $cui,
                $usuario_creacion,
                $cod_ua,
                $cod_ext,
                $cod_carrera,
                $nombre_carrera,
                $tipo_solicitante,
                $tipo_certificacion_id,
                $facultad,
                $nombre_extension,
                $carnet,
                $tipoConstancia,
                $token
            ); // enviamos, generamos y almacenamos los datos de la constancia en la base de datos

            log::info("data: " . json_encode($certificacion_data));

            if(!empty($certificacion_data)){
            $certificacion_id = $certificacion_data[0]['certificacion_id']; // almacenamos en la variable el id de la certificacion
            $transaccion = $certificacion_data[0]['transaccion']; // almacenamos en la variable la transaccion
            $barcode = $certificacion_data[0]['barcode'];
            }

            $key = substr($barcode,  0, 8) . substr($barcode,  -5); //fragmentamos y extraemos una parte del uid para el codigo de barras
            $barcode = $key;

            $fecha_usr = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
            $fecha_usr = self::fechaLetras($fecha_usr);
        }

        $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;')); // obtenemos jefatura actual

        foreach ($jefatura as $datos) {
            $jefatura_nombre = $datos->nombre;
            $jefatura_puesto = $datos->puesto;
        }

        $title = "Registro y Estadística";

        $usuarioLinea = $this->usuarioEnLinea($nov);

        if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
            log::info('si entroooo');
            $usuarioLinea = "1"; 
        }else{
            $usuarioLinea = "0"; 
        }

        return view(
            'portalEstudiantil.pages.archivos.VisualizaCertificacionArchivos',
            compact('carnet', 'nombre', 'cod_ua', 'cod_ext', 'cod_carrera', 'cui', 'nombre_carrera', 'facultad', 'nivel_academico', 'jefatura_nombre', 'jefatura_puesto', 'fecha_usr', 'certificacion_id', 'transaccion', 'cert_pendiente', 'barcode', 'usuarioLinea', 'tipoConstancia', 'codNacionalidad')
        );
    }

    public function DescargarCertificacionArchivos(Request $request)
    {
        $carnet = Auth::guard('estudiante')->user()->carnet;
        $nivel_academico = $request['nivel'];
        // quitar los de abajo despues de probar...
        $cod_ua = $request['cod_ua'];
        $cod_ext = $request['cod_ext'];
        $cod_carrera = $request['cod_carrera'];
        $nombre = $request['nombre'];
        $cui = $request['cui'];
        $nombre_carrera = $request['nombre_carrera'];
        $facultad = $request['facultad'];
        $transaccion = $request['transaccion'];
        $certificacion_id = $request['certificacion_id'];
        $barcode = $request['barcode'];
        $usuarioLinea = $request['usuarioLinea'];
        $codNacionalidad = $request['codNacionalidad'];

        $iniciales = null;

        $estudia_old = EstudiaOld::find($carnet);
        $nombreCompleto = $estudia_old->getNombreCompleto();

        $encargado = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "Encargada de Archivo" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));

        foreach ($encargado as $datos) {
            $encargado_nombre = $datos->nombre;
            $encargado_puesto = $datos->puesto;
        }

        $nombreCompleto = explode(" ", $encargado_nombre);
        $encargado_nombre = $nombreCompleto[0] ." ". $nombreCompleto[1] ." ". $nombreCompleto[3];

        $token = $this->obtenerToken(); //obtenemos el token para la api_archivo

        $constancia = $this->obtenerDataTransaccion($transaccion, $token);
        log::info('esto trae constancia: '. json_encode($constancia));
        foreach ($constancia as $dato) { //recorremos y obtenemos los datos de la constancia
            $fecha_creacion = $dato['fecha_creacion'];
            log::info('esto trae fecha_ceacion: '.$fecha_creacion);
            $tipoConstancia = $dato['tipo_constancia'];
            $fechaVencimiento = $dato['fechaVencimiento'];
        }

        $fecha_creacion = Carbon::now();

        $fecha_usr = self::fechaLetras($fecha_creacion); // convertimos la fecha en letras

        log::info('fecha estudiantes: ' . $fecha_usr);

        $date = Carbon::now()->format('d/m/Y');

        $cantidadConstancia = self::setCantidadConstancia($transaccion, $token);

        log::info('esto trae cantidad constancia en estudiantes: '. json_encode($cantidadConstancia));

        $css = '/var/www/html/rye-portal/public/css/constanciaArchivos.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $firma = '/var/www/html/rye-portal/public/img/fJefe/firma_ArchivoSello.png';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro = '/var/www/html/rye-portal/public/img/fJefe/Registro.png';
        $provisional = '/var/www/html/rye-portal/public/img/fJefe/ConstanciaProvisional.png';
        

        $pdf = PDF::loadView(
            'portalEstudiantil.pages.archivos.DescargaCertificacionArchivospdf',
            compact('css', 'img', 'firma', 'sello', 'registro', 'carnet', 'nombre', 'cod_ua', 'cod_ext', 'cod_carrera', 'cui', 'nombre_carrera', 'facultad', 'nivel_academico', 'encargado_nombre', 'encargado_puesto', 'fecha_usr', 'transaccion', 'certificacion_id', 'barcode', 'usuarioLinea', 'tipoConstancia', 'provisional', 'iniciales', 'fechaVencimiento', 'codNacionalidad')
        );

        $pdf->setPaper('letter');
        return $pdf->download('Certificacion_Archivos_' . $carnet . '_' . $date . '.pdf');
    }

    public function verificarConstanciaBarcode(Request $request)
    {

        $transaccion = $request->query('id'); //idTransaccion

        $token = $this->obtenerToken();

        $data = $this->obtenerDataTransaccion($transaccion, $token);

        Log::info("pasa obtenerDataTransaccion...." . "json response: " . json_encode($data));

        foreach ($data as $dato) {
            $transaccion = $dato['transaccion'];
        }

        $title = "Registro y Estadística";

        return view(
            'portalEstudiantil.pages.servicios.archivos.verificarConstanciaArchivosBarcode',
            compact('transaccion', 'title')
        );
    }

    public function verificarConstanciaArchivos(Request $request)
    {

        $transaccion = $request['cert_transaccion']; //idTransaccion
        $barcodePart = $request['barcode'];

        $token = $this->obtenerToken();

        $data = $this->obtenerDataTransaccion($transaccion, $token);

        Log::info("pasa obtenerDataTransaccion...." . "json response: " . json_encode($data));


        foreach ($data as $dato) {

            $certificacion_id = $dato['certificacion_id'];
            $expediente = $dato['expediente_id'];
            $nombre = $dato['nombre'];
            $cui = $dato['identificacion'];
            $usuario_creacion = $dato['usuario_creacion'];
            $fecha_creacion = $dato['fecha_creacion'];
            $carrera_unidad = $dato['carrera_unidad'];
            $carrera_extension = $dato['carrera_extension'];
            $carrera_carrera = $dato['carrera_carrera'];
            $nomcarrera = $dato['nombre_carrera'];
            $nomfacultad = $dato['nombre_unidad'];
            $nomextension = $dato['nombre_extension'];
            $transaccion = $dato['transaccion'];
            $carnet = $dato['carnet'];
            $barcode = $dato['barcode'];
            $tipoConstancia = $dato['tipo_constancia'];
            $fechaVencimiento = $dato['fechaVencimiento'];
        }

        $estudia_old = EstudiaOld::find($carnet);
        $codNacionalidad = $estudia_old->cod_nac;
        $nov = $estudia_old->cod_orien;

        $key = substr($barcode,  0, 8) . substr($barcode,  -5);
        $barcode = $key;

        if ($barcodePart != $barcode) {
            return Redirect::back()->withErrors(['msg' => 'El código de barras ingresado es incorrecto.']);
        }

        $carrera = $this->getCarrera($carnet, $carrera_unidad, $carrera_extension, $carrera_carrera);
        foreach ($carrera as $dato) {
            $nivel = $dato->nivel;
        }

        $fecha = self::fechaLetras($fecha_creacion);

        $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));
        foreach ($jefatura as $datos) {
            $jefatura_nombre = $datos->nombre;
            $jefatura_puesto = $datos->puesto;
        }

        if($tipoConstancia == 3){

            if ($nivel == 1 or $nivel == 2) { // validamos el tipo de expediente segun el nivel_academico
                $tipo = 1;
            } else {
                $tipo = 2;
            }

            $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(" ",ciclo) AS Ciclos'))
            ->WHERE([
                ['carnet', '=', $carnet],
                ['cod_ua', '=', $carrera_unidad], 
                ['cod_ext', '=', $carrera_extension], 
                ['cod_car', '=', $carrera_carrera]
            ])->get(); //obtengo los ciclos inscritos del estudiante

            $ciclos = $fec_bitinscripcion[0]->Ciclos; // obtengo el array de datos

            $data = ArchivosController::obtenerDataRequisitos($carnet, $tipo, $token); // obtenemos el array de datos de los requisitos para generar la constancia
            log::info("esto tiene dataaa1: ". json_encode($data));

            $title = "Registro y Estadística";

            log::info("esto es el nov: " . $nov);

            $mineducConsulta = PingMineduc::find($nov);

            $usuarioLinea = $this->usuarioEnLinea($nov);
            if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                $usuarioLinea = "1"; 
            }else{
                $usuarioLinea = "0";
            }

            return view(
                'portalEstudiantil.pages.servicios.archivos.verificarConstanciaArchivosTraslado',
                compact(
                    'fecha',
                    'certificacion_id',
                    'title',
                    'jefatura_nombre',
                    'jefatura_puesto',
                    'nombre',
                    'usuario_creacion',
                    'fecha_creacion',
                    'carrera_unidad',
                    'carrera_extension',
                    'carrera_carrera',
                    'carrera_carrera',
                    'nomcarrera',
                    'nomfacultad',
                    'nomextension',
                    'transaccion',
                    'nivel',
                    'carnet',
                    'cui',
                    'barcode',
                    'tipoConstancia',
                    'data',
                    'expediente',
                    'ciclos',
                    'usuarioLinea',
                    'codNacionalidad'
                )
            );

        }else{

            log::info("esto es el nov: " . $nov);

            $mineducConsulta = PingMineduc::find($nov);

            $usuarioLinea = $this->usuarioEnLinea($nov);
            if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                $usuarioLinea = "1"; 
                log::info("esto es el usuario en linea: " . $usuarioLinea);
            }else{
                $usuarioLinea = "0";
            }
            log::info("esto es el usuario en linea fuera: " . $usuarioLinea);

            $title = "Registro y Estadística";

            $nombre_carrera = $nomcarrera;
            $nombre_unidad = $nomfacultad;
            $nombre_extension = $nomextension;
            $identificacion = $cui;

            return view(
                'portalEstudiantil.pages.servicios.archivos.verificarConstanciaArchivos',
                compact(
                    'fecha',
                    'certificacion_id',
                    'title',
                    'jefatura_nombre',
                    'jefatura_puesto',
                    'nombre',
                    'usuario_creacion',
                    'fecha_creacion',
                    'carrera_unidad',
                    'carrera_extension',
                    'carrera_carrera',
                    'carrera_carrera',
                    'nombre_carrera',
                    'nombre_unidad',
                    'nombre_extension',
                    'transaccion',
                    'nivel',
                    'carnet',
                    'identificacion',
                    'barcode',
                    'usuarioLinea',
                    'tipoConstancia',
                    'fechaVencimiento',
                    'codNacionalidad'
                )
            );
        }
    }

    public function getCarrera($carnet, $codfac, $codext, $codcar)
    {

        $carrera = DB::select(DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel
                FROM 
                    carrera_estudiante ce, 
                    facultad f, 
                    carrera_temporal ct, 
                    extension e
                WHERE 
                    ce.carnet = ' . $carnet . '
                AND f.codfac = ' . $codfac . '
                AND ce.codfac = f.codfac
                AND ct.codigo_unidad_academica = ce.codfac
                AND ce.codext = ' . $codext . '
                AND ct.codigo_extension = ce.codext
                AND ce.codcar = ' . $codcar . '
                AND ct.codigo_carrera = ce.codcar
                AND e.codigo_unidad_academica = f.codfac 
                AND e.codigo_extension = ce.codext
                AND ct.codigo_nivel IN (1,2,3);'
        )); //Consulta carreras

        return $carrera;
    }


    public static function obtenerToken()
    {

        $data = http_build_query(array(
            "username" => config('apiArchivos.usuario'),
            "password" => config('apiArchivos.password')
        ));

        $opts = array('http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config('apiArchivos.ip').'/token', false, $context);
        $json = json_decode($result, true);
        error_log('resultado' . $json['access_token']);

        return $json['access_token'];
    }

    public static function obtenerDataRequisitos($carnet, $nivel_academico, $token)
    {

        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'GET',
            'header' => $header
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(''.config("apiArchivos.ip").'/get_requisitos?carne=' . $carnet . '&tipo=' . $nivel_academico, false, $context);
        $json = json_decode($result, true);

        return $json;
    }

    public static function GenerarCertificacionArchivos(
        $expediente,
        $nombre,
        $relacion,
        $identificacion,
        $usuario_creacion,
        $cod_ua,
        $cod_ext,
        $cod_carrera,
        $nombre_carrera,
        $tipo_solicitante,
        $tipo_certificacion_id,
        $facultad,
        $nombre_extension,
        $carnet,
        $tipoConstancia,
        $token,
        $observacion = null
    ) {

        $postdata =
            array(
                "expediente_id" => "" . $expediente . "",
                "nombre" => "" . $nombre . "",
                "relacion" => "" . $relacion . "",
                "identificacion" => "" . $identificacion . "",
                "usuario_creacion" => "" . $usuario_creacion . "",
                "carrera_unidad" => "" . $cod_ua . "",
                "carrera_extension" => "" . $cod_ext . "",
                "carrera_carrera" => "" . $cod_carrera . "",
                "nombre_carrera" => "" . $nombre_carrera . "",
                "tipo_solicitante" => "" . $tipo_solicitante . "",
                "tipo_certificacion_id" => "" . $tipo_certificacion_id . "",
                "nombre_unidad" => "" . $facultad . "",
                "nombre_extension" => "" . $nombre_extension . "",
                "carnet" => "" . $carnet . "",
                "tipo_constancia" => "" . $tipoConstancia . "",
                "observacion" => "" . $observacion . ""
            );


        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'POST',
            'header' => $header,
            'content' => json_encode($postdata),
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config("apiArchivos.ip").'/post_certificacion', false, $context);
        if ($result === FALSE) {
            die('Error');
        }
        $json = json_decode($result, true);

        return $json;
    }

    public static function GenerarCertificacionArchivosIncompleto(
        $expediente,
        $nombre,
        $relacion,
        $identificacion,
        $motivo,
        $usuario_creacion,
        $cod_ua,
        $cod_ext,
        $cod_carrera,
        $nombre_carrera,
        $tipo_solicitante,
        $tipo_certificacion_id,
        $facultad,
        $nombre_extension,
        $carnet,
        $tipoConstancia,
        $token,
        $observacion = null
    ) {
        $postdata =
            array(
                "expediente_id" => "" . $expediente . "",
                "nombre" => "" . $nombre . "",
                "relacion" => "" . $relacion . "",
                "identificacion" => "" . $identificacion . "",
                "motivo" => "" . $motivo . "",
                "usuario_creacion" => "" . $usuario_creacion . "",
                "carrera_unidad" => "" . $cod_ua . "",
                "carrera_extension" => "" . $cod_ext . "",
                "carrera_carrera" => "" . $cod_carrera . "",
                "nombre_carrera" => "" . $nombre_carrera . "",
                "tipo_solicitante" => "" . $tipo_solicitante . "",
                "tipo_certificacion_id" => "" . $tipo_certificacion_id . "",
                "nombre_unidad" => "" . $facultad . "",
                "nombre_extension" => "" . $nombre_extension . "",
                "carnet" => "" . $carnet . "",
                "tipo_constancia" => "" . $tipoConstancia . "",
                "observacion" => "" . $observacion . ""
            );

        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'POST',
            'header' => $header,
            'content' => json_encode($postdata),
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config("apiArchivos.ip").'/post_constanciaIncompleto', false, $context);
        if ($result === FALSE) {
            die('Error');
        }
        $json = json_decode($result, true);

        return $json;
    }

    public static function obtenerDataTransaccion($transaccion, $token)
    {

        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'GET',
            'header' => $header
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config("apiArchivos.ip").'/get_certificacion?transaccion=' . $transaccion, false, $context);
        $json = json_decode($result, true);

        return $json;
    }

    public static function obtenerExpediente($carnet, $tipo_expediente, $token)
    {

        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'GET',
            'header' => $header
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config("apiArchivos.ip").'/expediente?carnet=' . $carnet . '&tipo_expediente=' . $tipo_expediente, false, $context);
        $json = json_decode($result, true);

        return $json;
    }

    public static function obtenerConstancia($carnet, $ua, $ext, $car, $tipoConstancia, $token)
    {

        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'GET',
            'header' => $header
        ));

        $context = stream_context_create($opts);

        $ruta = config('apiArchivos.ip');

        $result = file_get_contents($ruta.'/certificacion?carnet=' . $carnet . '&ua=' . $ua . '&ext=' . $ext . '&car=' . $car . '&tipo_constancia=' . $tipoConstancia, false, $context);
        $json = json_decode($result, true);

        return $json;
    }

    /*---------------------------------------- Fechas en letras ------------------------------------------*/
    public static function fechaLetras($fecha)
    {

        $diatext = self::obtenerNumText($fecha);
        $anio = self::obtenerAnioText($fecha);
        $mes = self::obtenerMesText($fecha);
        return $diatext . ' de ' . $mes . ' de ' . $anio . '.';
    }

    public static function obtenerNumText($fecha)
    {

        $diastext = array(
            'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce',
            'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte',
            'veintiuno', 'veintidós', 'veintitrés', 'veinticuatro', 'veinticinco', 'veintiséis', 'veintisiete',
            'veintiocho', 'veintinueve', 'treinta', 'treinta y uno'
        );
        $numtext = $diastext[(date('j', strtotime($fecha)) * 1) - 1];
        return $numtext;
    }

    public static function obtenerMesText($fecha)
    {

        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mesText = $mes[(date('m', strtotime($fecha)) * 1) - 1];
        return $mesText;
    }


    public static function obtenerAnioText($fecha)
    {

        $anio = date('Y', strtotime($fecha));

        $anioText = self::miles($anio);

        return $anioText;
    }

    //------------------------------Funciones para sacar los años en letras :/----------------------

    public static function miles($anio)
    {

        $longitud = strlen($anio);
        $miles = substr($anio, 0, $longitud - 3);
        $centenas = substr($anio, -3);

        if ($centenas != 0) {

            $cadenaAnio = self::centenas($miles) . ' mil ' . self::centenas($centenas);
        } else {

            $cadenaAnio = self::centenas($miles) . ' mil';
        }
        return $cadenaAnio;
    }

    public static function centenas($centenas)
    {
        $cientos = array(
            100 => 'cien', 200 => 'doscientos', 300 => 'trecientos',
            400 => 'cuatrocientos', 500 => 'quinientos', 600 => 'seiscientos',
            700 => 'setecientos', 800 => 'ochocientos', 900 => 'novecientos'
        );

        if ($centenas >= 100) {

            $centena = substr($centenas, 0, 1);
            $decena = '0' . substr($centenas, 1, 2);
            $cadenaCentenas = (($centena == 1) ? 'ciento' : $cientos[$centena * 100]) . ' ' . self::decenas($decena);

            return $cadenaCentenas;
        } else {

            $cadenaDecenas = self::decenas($centenas);
            return $cadenaDecenas;
        }
    }

    public static function decenas($decena)
    {
        $decenas = array(
            30 => 'treinta', 40 => 'cuarenta', 50 => 'cincuenta', 60 => 'sesenta',
            70 => 'setenta', 80 => 'ochenta', 90 => 'noventa'
        );

        if ($decena <= 29) {
            $unidades = self::unidades($decena);
            return $unidades;
        }

        $subunidad = substr($decena, 2, 1);

        if (substr($decena, 2, 1) == 0) {
            $decena = substr($decena, 1);
            return $decenas[$decena];
        } else {
            return $decenas[$decena - $subunidad] . ' y ' . self::unidades($subunidad);
        }
    }

    public static function unidades($unidades)
    {
        $unidad = array(
            'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho',
            'nueve', 'diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte', 'veintiuno ', 'veintidós ', 'veintitrés ', 'veinticuatro', 'veinticinco',
            'veintiséis', 'veintisiete', 'veintiocho', 'veintinueve'
        );
        return $unidad[$unidades - 1];
    }

    public function getBecados($carnet)
    {

        $becados = DB::select(DB::raw(
            'SELECT b.carnet as carnet, b.ua as ua
                FROM 
                    becado b
                WHERE 
                    b.carnet = ' . $carnet . ';'
        )); //Consulta becados

        return $becados;
    }

    public function getCarreraPostgrado($carnet)
    {

        $carreraPostgrado = DB::select(DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel
                FROM 
                    carrera_estudiante ce, 
                    facultad f, 
                    carrera_temporal ct, 
                    extension e
                WHERE 
                    ce.carnet = ' . $carnet . '
                AND ce.codfac = f.codfac
                AND ct.codigo_unidad_academica = ce.codfac
                AND ct.codigo_extension = ce.codext
                AND ct.codigo_carrera = ce.codcar
                AND e.codigo_unidad_academica = f.codfac 
                AND e.codigo_extension = ce.codext
                AND ct.codigo_nivel >= 3;'
        )); //Consulta carreras

        return $carreraPostgrado;
    }

    public static function usuarioEnlinea($nov)
    {
        $usuarioLinea = CarnetNvo::select('usuario')
            ->where('nov', '=', $nov)->where('usuario', 'like', 'pingenlinea%')->limit(1)->get();
        return $usuarioLinea;
    }

    public static function tieneTitulo($nov)
    {
        $titulo = PingMineduc::select('reg_titulo')
            ->where('nov', '=', $nov)->limit(1)->get();
        return $titulo;
    }

    public static function setCantidadConstancia($transaccion, $token)
    {

        $header = array(
            'Content-type: application/json',
            'Authorization: Bearer ' . $token
        );

        $opts = array('http' => array(
            'method' => 'GET',
            'header' => $header
        ));

        $context = stream_context_create($opts);

        $result = file_get_contents(config("apiArchivos.ip").'/set_cantidadConstancia?transaccion=' . $transaccion, false, $context);
        $json = json_decode($result, true);

        return $json;
    }

    public static function verificarSanciones($carnet, $ua, $ext, $car){
        $sanciones = DB::select( DB::raw(
            'SELECT r.carnet as carnet,
                (SELECT tipo_modificacion.nombre
                    FROM sanciones, tipo_modificacion
                    WHERE sanciones.carnet = r.carnet
                        AND sanciones.ua = r.idFacultad
                        AND sanciones.car = r.idCarrera
                        AND r.cicloWeb BETWEEN YEAR(sanciones.del) AND YEAR(sanciones.al)
                        AND sanciones.cod_mov IN ("21")
                        AND tipo_modificacion.codigo = sanciones.cod_mov 
                ) as sancion_temp_UA,
                (SELECT tipo_modificacion.nombre
                    FROM sanciones, tipo_modificacion
                    WHERE sanciones.carnet = r.carnet
                        AND sanciones.ua = r.idFacultad
                        AND sanciones.car = r.idCarrera
                        AND sanciones.cod_mov NOT IN ("33","32","21")
                        AND tipo_modificacion.codigo = sanciones.cod_mov LIMIT 1
                ) as sancion,
                (SELECT tm.nombre 
                    FROM sanciones es, tipo_modificacion tm 
                    WHERE es.carnet = r.carnet 
                        AND es.ua = r.idFacultad
                        AND es.car = r.idCarrera
                        AND tm.codigo = es.cod_mov
                        AND (SELECT COUNT(s.cod_mov) as Total 
                                FROM sanciones s
                                WHERE s.carnet = r.carnet 
                                        AND s.cod_mov in ("33")) < es.cod_mov in ("32") ) as repitencia
            FROM(
                SELECT
                    carrera_estudiante.carnet as carnet,
                    carrera_estudiante.codfac as idFacultad,
                    carrera_estudiante.codext as idExtension,
                    carrera_estudiante.codcar as idCarrera,
                    carrera_estudiante.sit_acad as situacionAcademica,
                    carrera_estudiante.habilitado as habilitado,
                    carrera_estudiante.repitencia as repitencia,
                    facultad.nomfac as facultad,
                    extension.nombre as extension,
                    carrera_temporal.nombre_carrera as carrera,
                    carrera_temporal.estado as estado,
                    carrera_temporal.codigo_nivel as codigoNivel,
                    carrera_temporal.estado_reingreso as estadoReingreso,
                    ciclo_activo.ciclo_web as cicloWeb,
                    ciclo_activo.semestre_web as semestreWeb,
                    ciclo_activo.oportunidad as oportunidad,
                    (CASE WHEN carrera_temporal.codigo_nivel IN (1,2) THEN 2 ELSE 3 END) AS categoria
                FROM
                    carrera_estudiante,
                    ciclo_activo,
                    carrera_temporal,
                    facultad,
                    extension
            WHERE 
                carrera_estudiante.carnet = '.$carnet.' 
                AND carrera_estudiante.codfac = '.$ua.'
                AND carrera_estudiante.codext = '.$ext.'
                AND carrera_estudiante.codcar = '.$car.'
                AND carrera_temporal.codigo_unidad_academica=carrera_estudiante.codfac
                AND carrera_temporal.codigo_extension = carrera_estudiante.codext
                AND carrera_temporal.codigo_carrera = carrera_estudiante.codcar
                AND  facultad.codfac = carrera_estudiante.codfac
                AND extension.codigo_unidad_academica = carrera_estudiante.codfac
                AND extension.codigo_extension = carrera_estudiante.codext
                ) r
            ')); //Consulta sanciones

            return $sanciones;
    }

    public static function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ù","Ã ","è","ì","ò","ù","ç","Ç","â","ê","î","ô","û","Â","Ê","Î","Ô","Û","ü","ö","Ö","ï","ä","«","Ò","Ã","Ä","Ë");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");

        $texto = str_replace($no_permitidas, $permitidas ,$cadena);        
        return $texto;
    }
}
