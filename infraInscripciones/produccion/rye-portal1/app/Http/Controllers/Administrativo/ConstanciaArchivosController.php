<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Estudiante\ArchivosController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\EstudiaOld;
use App\Models\CicloActivo;
use App\Models\BitacoraInscripcion;
use Illuminate\Support\Facades\Log;
use App\Models\PingMineduc;
use App\Funciones\Mineduc;


class ConstanciaArchivosController extends Controller
{
    use Mineduc;

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectArchivos');
    }

    public function index(){

        return view('administrativo.archivos.IndexConstanciaCarnet');
    }

    public function muestraCarreras(Request $request){
        $carnet = $request['carnet'];

        if(strlen($carnet) == 13){

            $data = DB::select( DB::raw(
                'SELECT carnet from estudia_old WHERE cui ='.$carnet.';'
            ));

            if(!$data){
                return Redirect::back()->withErrors(['msg' => 'El dpi ingresado no se encuentra registrado, el estudiante debe actualizar sus datos.']);
            }

            $carnet = $data[0]->carnet;
            
        }

        $carreras = ArchivosController::getCarreras($carnet);

        $estudia_old = EstudiaOld::find($carnet);
        if(!$estudia_old){
            return Redirect::back()->withErrors(['msg' => 'El carnet ingresado no existe.']);
        }
        $codNacionalidad = $estudia_old->cod_nac;
        if($codNacionalidad == 30){
            $cui = $estudia_old->cui;
        }else{
            $cui = $estudia_old->numero_pasaporte;
        }
        $nombreCompleto = $estudia_old->getNombreCompleto();
        $ciclo = CicloActivo::first();
        $cert_pendiente = validarCertificado($carnet);

        return view('administrativo.archivos.CarrerasConstanciaArchivos', compact('carnet', 'cui', 'nombreCompleto', 'ciclo', 'carreras', 'codNacionalidad'));
    }

    public function GeneraConstancia(Request $request){

        $tipoConstancia = $request->input('tipoConstancia');
        $justificacion = $request->input('justificacion');

        $carnet = $request['carnet'];
        $nivel_academico = $request['nivel'];
        $cod_ua = $request['ua'];
        $cod_ext = $request['ext'];
        $cod_carrera = $request['idCarrera'];
        $nombre = $request['nombre'];
        $cui = $request['cui'];
        $nombre_carrera = $request['nombre_carrera'];
        $facultad = $request['facultad'];
        $nombre_extension = $request['nombre_extension'];
        $motivo = $request['motivo'];
        $exception = $request['exception'];
        $observacion = $request['observacion'];
        $codNacionalidad = $request['codNacionalidad'];

        $datos = EstudiaOld::find($carnet);
        $nov = $datos->cod_orien;
        $observaciones_bloqueo = $datos->observaciones;

        $activo = $datos->activo;
        if ($activo != 1) { // validamos si el usuario se encuentra activo
            if($activo == -3){
                return Redirect::back()->withErrors(['msg' => 'Usuario expulsado. Es necesario presentarse al Departamento de Registro y Estadística para resolver su situación.']);
            }
            if($activo == 0 && $observaciones_bloqueo == "Pendiente comprobar título en Mineduc, envía tu registro de título a soporterye@adm.usac.edu.gt"){
                return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia. Pendiente comprobar el título en el Mineduc.']);
            }
            $becados = $this->getBecados($carnet); // verificamos si existe en la lista de becados
            if (empty($becados)) { //validamos si no posee beca
                return Redirect::back()->withErrors(['msg' => 'Usuario bloqueado. Es necesario presentarse al Departamento de Registro y Estadística para resolver su situación.']);
            } else {
                return Redirect::back()->withErrors(['msg' => 'Usuario bloqueado por beca. Favor comunicarse al Tel. 3347-1032, Correo: gerardoa@usac.edu.gt o al Tel. 5698-6330, Correo: abregofrancisco@usac.edu.gt.']);
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
        }

        $sanciones = ArchivosController::verificarSanciones($carnet, $cod_ua, $cod_ext, $cod_carrera);
        foreach($sanciones as $data){
            $sancionTempUA = $data->sancion_temp_UA;
            $sancion = $data->sancion;
            $repitencia = $data->repitencia;
        }

        if( !empty($sancionTempUA) || !empty($sancion) || !empty($repitencia)){
            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se pudo realizar la constancia debido a que existe un inconveniente o sanción con el estudiante en la carrera de '.$nombre_carrera.'.' ]);
        }

        if($tipoConstancia == 1){
            $motivo = "";
            $estudia_old = EstudiaOld::find($carnet);
            $nombreCompleto = $estudia_old->getNombreCompleto(); // obtenemos el nombre del estudiante
            $usuarioLinea = ArchivosController::usuarioEnLinea($nov);

                if ($usuarioLinea->isNotEmpty()) {
                    $Titulo = ArchivosController::tieneTitulo($nov);

                    $tipoConsulta = 1; //consulta por CUI
                    $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                    $mineducTitulo = $mineducTitulo['data'];

                    if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL || $mineducTitulo->TituloMedio->no_registro_titulo == "NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO") {
                        $mineduc_no_titulo = PingMineduc::find($nov);
                        $tipoConsulta = 2;
                        $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                        if($mineducTitulo['error'] !==0  && empty($observacion)){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];

                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']); 
                        }
                    }

                    $nombreMineduc = str_replace(" ","", str_replace("  ","",ArchivosController::quitar_tildes(mb_strtoupper($mineducTitulo->TituloMedio->nombres . " " . $mineducTitulo->TituloMedio->apellidos , 'UTF-8'))));
                    $nombreEstudiaOld = str_replace(" ","", str_replace("  ","", ArchivosController::quitar_tildes(mb_strtoupper($nombreCompleto, 'UTF-8'))));

                    if(str_contains($nombreMineduc, $nombreEstudiaOld) == FALSE && empty($observacion) ){
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no podemos generar la constancia debido a que los datos del título registrado en nuestro sistema no coinciden con los del Mineduc. Datos de Mineduc: '.$mineducTitulo->TituloMedio->nombres.' '.$mineducTitulo->TituloMedio->apellidos . '. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
                    }
    
                    if ($Titulo->isEmpty()) {
                        $tipoConsulta = 1; //consulta por CUI
                        $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                        if($mineducTitulo['error'] !==0 && empty($observacion)){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];
    
                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                            $mineduc_no_titulo = PingMineduc::find($nov);
                            $tipoConsulta = 2;
                            $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                            if($mineducTitulo['error'] !==0 && empty($observacion)){
                                return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                            }
                            $mineducTitulo = $mineducTitulo['data'];

                            if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                                return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
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

                $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo    
                $data = ArchivosController::obtenerDataRequisitos($carnet, $tipo, $token); // obtenemos el array de datos de los requisitos para generar la constancia

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
                    if($cunoc == 3 && $cod_ua = 12){ //valida si el carnet es de cunoc
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a que tu expediente se encuentra en los archivos de CUNOC']);
                    }
                    elseif($cod_ua == 12 OR $cod_ua == 46){ //valida si pertenece a carreras de cunoc
                        if($cunoc == 9){ // valida si es un postgrado
                            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a un error al obtener el expediente de archivos. Favor comunicarse al correo de archivorye@adm.usac.edu.gt.']);
                        }else{ 
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no puedes realizar tu constancia debido a que tu expediente se encuentra en los archivos de CUNOC']);
                        }
                    }
                    else{ // en caso no encuentra nada al consumir la api
                        return Redirect::back()->withErrors(['msg' => 'Ha ocurrido un error al obtener el expediente de archivos. Favor comunicarse al correo archivorye@adm.usac.edu.gt.']);
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

                if (count($cantExpedientes) > 1) { // si existe mas de un expediente entramos.
    
                    $cantExpedientes = collect($cantExpedientes); // transformamos en una colleccion
                    $sortedExpe = $cantExpedientes->sortByDesc('Cantidad')->first(); // ordenamos y obtenemos el expediente que contenga mas obligados y entregados en S.
                    $expediente = $sortedExpe['Expediente']; // almacenamos el expediente_id

                    foreach ($data as $dato) { //recorremos el array de requisitos    
                        $nombre = $dato['nombre'];
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];
    
                        if ($expediente_id == $expediente & $entregado == "N" & $obligatorio == "S") { // validomos si existe alguno entregado es obligado y se encuentra en estado N    
                            return view('administrativo.archivos.VisualizaDocumentosFaltantesOperadores', compact('data')); // enviamos a la vista de requisitos faltantes
                        }
                    }
                } else { // si solo existe un expediente

                    foreach ($data as $dato) { //recorremos el array de requisitos    
                        $nombre = $dato['nombre'];
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];

                        if ($entregado == "N" & $obligatorio == "S") { // validamos si existe alguno entregado es obligado y se encuentra en estado N
                            return view('administrativo.archivos.VisualizaDocumentosFaltantesOperadores', compact('data')); // enviamos a la vista de requisitos faltantes
                        }
                    }

                    $token = ArchivosController::obtenerToken(); // obtenemos token    
                    $expediente = ArchivosController::obtenerExpediente($carnet, $tipo, $token); // buscamos el expediente_id
                    foreach ($expediente as $dato) {
                        $expediente = $dato; //almacenamos el expediente en la variable
                    }
                }
      
                $token = ArchivosController::obtenerToken(); // obtenemos token
                $usuario_creacion = (int)Auth::guard('administrativo')->user()->login; // almacenamos el usuario de la api
                $obtener_usuario = $this->obtenerUsuario($usuario_creacion, $token);
                $usuario_creacion = $obtener_usuario['usuario'];
                $relacion = "Estudiante";
                $tipo_solicitante = "E";
                $tipo_certificacion_id = 1;
                $nombre = $request['nombre'];

                $certificacion_data = ArchivosController::GenerarCertificacionArchivos(
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
                    $token,
                    $observacion
                ); // enviamos, generamos y almacenamos los datos de la constancia en la base de datos

                if(!empty($certificacion_data)){
                    $certificacion_id = $certificacion_data[0]['certificacion_id']; // almacenamos en la variable el id de la certificacion
                    $transaccion = $certificacion_data[0]['transaccion']; // almacenamos en la variable la transaccion
                    $barcode = $certificacion_data[0]['barcode'];
                }

                $key = substr($barcode,  0, 8) . substr($barcode,  -5); //fragmentamos y extraemos una parte del uid para el codigo de barras
                $barcode = $key;
    
                $fecha_usr = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
                $fecha_usr = ArchivosController::fechaLetras($fecha_usr);
    
            $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;')); // obtenemos jefatura actual
    
            foreach ($jefatura as $datos) {
                $jefatura_nombre = $datos->nombre;
                $jefatura_puesto = $datos->puesto;
            }
    
            $title = "Registro y Estadística";
    
            $usuarioLinea = ArchivosController::usuarioEnLinea($nov);
            if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                $usuarioLinea = "1"; 
            }else{
                $usuarioLinea = "0"; 
            }
    
            return view(
                'administrativo.archivos.VisualizaCertificacionArchivosOperadores',
                compact('carnet', 'nombre', 'cod_ua', 'cod_ext', 'cod_carrera', 'cui', 'nombre_carrera', 'facultad', 'nivel_academico', 'jefatura_nombre', 'jefatura_puesto', 'fecha_usr', 'certificacion_id', 'transaccion', 'barcode', 'usuarioLinea', 'tipoConstancia', 'codNacionalidad')
            );
        
        }elseif($tipoConstancia == 2){
            $motivo = "";

            $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo

            $ConstanciaCompleta = 2; // El tipo de constancia 1 = constancia completa

            $constancia = ArchivosController::obtenerConstancia($carnet, $cod_ua, $cod_ext, $cod_carrera, $tipoConstancia, $token); // obtenemos el array de datos de la api    
                $estudia_old = EstudiaOld::find($carnet);
                $nombreCompleto = $estudia_old->getNombreCompleto(); // obtenemos el nombre del estudiante
                $usuarioLinea = ArchivosController::usuarioEnLinea($nov);

                if ($usuarioLinea->isNotEmpty()) {    

                    $Titulo = ArchivosController::tieneTitulo($nov);
                    $tipoConsulta = 1; //consulta por CUI
                    $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                    if($mineducTitulo['error'] !==0 && empty($observacion)){
                        return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                    }
                    $mineducTitulo = $mineducTitulo['data'];

                  if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL || $mineducTitulo->TituloMedio->no_registro_titulo == "NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO") {
                        $mineduc_no_titulo = PingMineduc::find($nov);
                        $tipoConsulta = 2;
                        $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                        if($mineducTitulo['error'] !==0 && empty($observacion)){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];

                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
                        }
                    }

                    $nombreMineduc = str_replace(" ","", str_replace("  ","",ArchivosController::quitar_tildes(mb_strtoupper($mineducTitulo->TituloMedio->nombres . " " . $mineducTitulo->TituloMedio->apellidos , 'UTF-8'))));
                    $nombreEstudiaOld = str_replace(" ","", str_replace("  ","", ArchivosController::quitar_tildes(mb_strtoupper($nombreCompleto, 'UTF-8'))));

                    if(str_contains($nombreMineduc, $nombreEstudiaOld) == FALSE && empty($observacion)){
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no podemos generar la constancia debido a que los datos del título registrado en nuestro sistema no coinciden con los del Mineduc. Datos de Mineduc: '.$mineducTitulo->TituloMedio->nombres.' '.$mineducTitulo->TituloMedio->apellidos . '. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);  
                    }

                    if ($Titulo->isEmpty()) {
                        $tipoConsulta = 1; //consulta por CUI
                        $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                        if($mineducTitulo['error'] !==0 && empty($observacion)){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];

                       if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                            $mineduc_no_titulo = PingMineduc::find($nov);
                            $tipoConsulta = 2;
                            if($mineducTitulo['error'] !==0 && empty($observacion)){
                                return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                            }
                            $mineducTitulo = $mineducTitulo['data'];

                            if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                                return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
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
                $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo
    
                $data = ArchivosController::obtenerDataRequisitos($carnet, $tipo, $token); // obtenemos el array de datos de los requisitos para generar la constancia

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

                if (empty($cantExpedientes)) { // validamos si el usuario se encuentra activo

                    $cunoc = substr($carnet, 4,1);
                    if($cunoc == 3 && $cod_ua = 12){ //valida si el carnet es de cunoc
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
                }
    
                if (count($cantExpedientes) > 1) { // si existe mas de un expediente entramos.
    
                    $cantExpedientes = collect($cantExpedientes); // transformamos en una colleccion
                    $sortedExpe = $cantExpedientes->sortByDesc('Cantidad')->first(); // ordenamos y obtenemos el expediente que contenga mas obligados y entregados en S.
                    $expediente = $sortedExpe['Expediente']; // almacenamos el expediente_id
    
                    foreach ($data as $dato) { //recorremos el array de requisitos
    
                        $nombre = $dato['nombre'];
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];
    
                        if ($expediente_id == $expediente & $entregado == "N" & $obligatorio == "S") { // validomos si existe alguno entregado es obligado y se encuentra en estado N
    
                            if($nombre == "Fotostática"){

                            }else{
                                return view('administrativo.archivos.VisualizaDocumentosFaltantesOperadores', compact('data')); // enviamos a la vista de requisitos faltantes
                            }
                        }
                    }

                    foreach ($data as $dato) { //recorremos el array de requisitos
    
                        $nombre = $dato['nombre'];
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];
    
                        if($expediente_id == $expediente & $entregado == "S" & $obligatorio == "S" & $nombre == "Fotostática" ){
                            return Redirect::back()->withErrors(['msg' => 'No se puede generar la constancia provisional, debido a que el estudiante tiene su expediente completo.']);
                        }
                        
                    }
                } else { // si solo existe un expediente

                    foreach ($data as $dato) { //recorremos el array de requisitos    
                        $nombre = $dato['nombre'];
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];

                        if ($entregado == "N" & $obligatorio == "S") { // validamos si existe alguno entregado es obligado y se encuentra en estado N
    
                        if($nombre == "Fotostática"){

                            
                        }else{
                            return view('administrativo.archivos.VisualizaDocumentosFaltantesOperadores', compact('data')); // enviamos a la vista de requisitos faltantes
                        }
                        }
                    }

                    foreach ($data as $dato) { //recorremos el array de requisitos
    
                        $nombre = $dato['nombre'];
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];
    
                        if($entregado == "S" & $obligatorio == "S" & $nombre == "Fotostática" ){
                            return Redirect::back()->withErrors(['msg' => 'No se puede generar la constancia provisional, debido a que el estudiante tiene su expediente completo.']);
                        }
                        
                    }
    
                    $token = ArchivosController::obtenerToken(); // obtenemos token
    
                    $expediente = ArchivosController::obtenerExpediente($carnet, $tipo, $token); // buscamos el expediente_id
    
                    foreach ($expediente as $dato) {
                        $expediente = $dato; //almacenamos el expediente en la variable
                    }
                }
    
                $usuario_creacion = (int)Auth::guard('administrativo')->user()->login; // almacenamos el usuario de la api
                $obtener_usuario = $this->obtenerUsuario($usuario_creacion, $token);
                $usuario_creacion = $obtener_usuario['usuario'];
                $relacion = "Estudiante";
                $tipo_solicitante = "E";
                $tipo_certificacion_id = 1;
                $nombre = $request['nombre'];

                $certificacion_data = ArchivosController::GenerarCertificacionArchivos(
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

                if(!empty($certificacion_data)){ 
                    $certificacion_id = $certificacion_data[0]['certificacion_id']; // almacenamos en la variable el id de la certificacion
                    $transaccion = $certificacion_data[0]['transaccion']; // almacenamos en la variable la transaccion
                    $barcode = $certificacion_data[0]['barcode'];
                    $tipoConstancia = $certificacion_data[0]['tipo_constancia'];
                }

                $key = substr($barcode,  0, 8) . substr($barcode,  -5); //fragmentamos y extraemos una parte del uid para el codigo de barras
                $barcode = $key;
    
                $fecha_usr = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
                $fecha_usr = ArchivosController::fechaLetras($fecha_usr);

            $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;')); // obtenemos jefatura actual

            foreach ($jefatura as $datos) {
                $jefatura_nombre = $datos->nombre;
                $jefatura_puesto = $datos->puesto;
            }
    
            $title = "Registro y Estadística";
    
            $usuarioLinea = ArchivosController::usuarioEnLinea($nov);
            if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                $usuarioLinea = "1"; 
            }else{
                $usuarioLinea = "0"; 
            }

            return view(
                'administrativo.archivos.VisualizaCertificacionArchivosOperadores',
                compact('carnet', 'nombre', 'cod_ua', 'cod_ext', 'cod_carrera', 'cui', 'nombre_carrera', 'facultad', 'nivel_academico', 'jefatura_nombre', 'jefatura_puesto', 'fecha_usr', 'certificacion_id', 'transaccion', 'barcode', 'usuarioLinea', 'tipoConstancia', 'codNacionalidad')
            );
        }elseif($tipoConstancia == 3){
            if($motivo == 2){
                $motivo = "Traslado de Unidades Académicas";
            }elseif($motivo == 1){
                $motivo = "Traslado a Otras Universidades";
            }

            $estudia_old = EstudiaOld::find($carnet);
            $nombreCompleto = $estudia_old->getNombreCompleto(); // obtenemos el nombre del estudiante
            $usuarioLinea = ArchivosController::usuarioEnLinea($nov);

            if ($usuarioLinea->isNotEmpty()) {
                $Titulo = ArchivosController::tieneTitulo($nov);

                $tipoConsulta = 1; //consulta por CUI
                $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                if($mineducTitulo['error'] !==0){
                    return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                }
                $mineducTitulo = $mineducTitulo['data'];

               if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL || $mineducTitulo->TituloMedio->no_registro_titulo == "NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO") {
                    $mineduc_no_titulo = PingMineduc::find($nov);
                    $tipoConsulta = 2;
                    $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                    if($mineducTitulo['error'] !==0){
                        return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                    }
                    $mineducTitulo = $mineducTitulo['data'];

                    if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
                    }
                }

                $nombreMineduc = str_replace(" ","", str_replace("  ","",ArchivosController::quitar_tildes(mb_strtoupper($mineducTitulo->TituloMedio->nombres . " " . $mineducTitulo->TituloMedio->apellidos , 'UTF-8'))));
                $nombreEstudiaOld = str_replace(" ","", str_replace("  ","", ArchivosController::quitar_tildes(mb_strtoupper($nombreCompleto, 'UTF-8'))));

                if(str_contains($nombreMineduc, $nombreEstudiaOld) == FALSE && empty($observacion)){
                    return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no podemos generar la constancia debido a que los datos del título registrado en nuestro sistema no coinciden con los del Mineduc. Datos de Mineduc: '.$mineducTitulo->TituloMedio->nombres.' '.$mineducTitulo->TituloMedio->apellidos . '. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);  
                }

                if ($Titulo->isEmpty()) {
                    $tipoConsulta = 1; //consulta por CUI
                    $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                    if($mineducTitulo['error'] !==0){
                        return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                    }
                    $mineducTitulo = $mineducTitulo['data'];

                 if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                        $mineduc_no_titulo = PingMineduc::find($nov);
                        $tipoConsulta = 2;
                        $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                        if($mineducTitulo['error'] !==0){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];

                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
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
    
            $fec_bitinscripcion = BitacoraInscripcion::Select(DB::raw('GROUP_CONCAT(" ",ciclo) AS Ciclos'))
                ->WHERE([
                    ['carnet', '=', $carnet],
                    ['cod_ua', '=', $cod_ua], 
                    ['cod_ext', '=', $cod_ext], 
                    ['cod_car', '=', $cod_carrera]
                ])->get(); //obtengo los ciclos inscritos del estudiante
    
           $ciclos = $fec_bitinscripcion[0]->Ciclos; // obtengo el array de datos

            $carrera = $this->getCarrera($carnet, $cod_carrera, $cod_ext, $cod_ua);
            foreach($carrera as $data){ // recorremos datos
                $nomfacultad = $data->facultad;
                $nomextension = $data->extension;
                $nomcarrera = $data->carrera;
            }

            $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo
            $constancia = ArchivosController::obtenerConstancia($carnet, $cod_ua, $cod_ext, $cod_carrera, $tipoConstancia, $token); // obtenemos el array de datos de la api
    
                $estudia_old = EstudiaOld::find($carnet);
                $nombreCompleto = $estudia_old->getNombreCompleto(); // obtenemos el nombre del estudiante
                $usuarioLinea = ArchivosController::usuarioEnLinea($nov);

                if ($usuarioLinea->isNotEmpty()) {

                    $Titulo = ArchivosController::tieneTitulo($nov);

                    $tipoConsulta = 1; //consulta por CUI
                    $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                    if($mineducTitulo['error'] !==0){
                        return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                    }
                    $mineducTitulo = $mineducTitulo['data'];

                    if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL || $mineducTitulo->TituloMedio->no_registro_titulo == "NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO") {
                        $mineduc_no_titulo = PingMineduc::find($nov);
                        $tipoConsulta = 2;
                        $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                        if($mineducTitulo['error'] !==0){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];

                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {    
                            return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
                        }
                    }

                    $nombreMineduc = str_replace(" ","", str_replace("  ","",ArchivosController::quitar_tildes(mb_strtoupper($mineducTitulo->TituloMedio->nombres . " " . $mineducTitulo->TituloMedio->apellidos , 'UTF-8'))));
                    $nombreEstudiaOld = str_replace(" ","", str_replace("  ","", ArchivosController::quitar_tildes(mb_strtoupper($nombreCompleto, 'UTF-8'))));

                    if(str_contains($nombreMineduc, $nombreEstudiaOld) == FALSE && empty($observacion)){
                        return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no podemos generar la constancia debido a que los datos del título registrado en nuestro sistema no coinciden con los del Mineduc. Datos de Mineduc: '.$mineducTitulo->TituloMedio->nombres.' '.$mineducTitulo->TituloMedio->apellidos . '. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
                    }
                    if ($Titulo->isEmpty()) {
                        $tipoConsulta = 1; //consulta por CUI
                        $mineducTitulo = $this->consultaMineduc($cui, $tipoConsulta);
                        if($mineducTitulo['error'] !==0){
                            return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                        }
                        $mineducTitulo = $mineducTitulo['data'];

                        if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL) {
                            $mineduc_no_titulo = PingMineduc::find($nov);
                            $tipoConsulta = 2;
                            $mineducTitulo = $this->consultaMineduc($mineduc_no_titulo->reg_titulo, $tipoConsulta);
                            if($mineducTitulo['error'] !==0){
                                return Redirect::back()->withErrors(['msg' => $mineducTitulo['mensaje']]);
                            }
                            $mineducTitulo = $mineducTitulo['data'];

                            if ($mineducTitulo->error != "0" || $mineducTitulo->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || $mineducTitulo->TituloMedio->no_registro_titulo === NULL && empty($observacion)) {
                                return Redirect::back()->withErrors(['msg' => 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística. Datos de Mineduc: '.$mineducTitulo->TituloMedio->no_registro_titulo.'. Para más información del mineduc, verificar <a href="http://localhost/administrativo/carnetEstudiante2" target="_blank">aquí</a>.']);
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
                $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo

                $data = ArchivosController::obtenerDataRequisitos($carnet, $tipo, $token); // obtenemos el array de datos de los requisitos para generar la constancia
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

                $usuarioLinea = ArchivosController::usuarioEnLinea($nov);
                if($usuarioLinea->isNotEmpty() ||  (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                    $usuarioLinea = "1"; 
                }else{
                    $usuarioLinea = "0"; 
                }

                $areacarnet=substr($carnet, 4,1);

                if (empty($cantExpedientes)) { // validamos si el usuario se encuentra activo    
                    $cunoc = substr($carnet, 4,1);

                    if($cunoc == 3 && $cod_ua = 12){ //valida si el carnet es de cunoc
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

                if (count($cantExpedientes) > 1) { // si existe mas de un expediente entramos.
                    $cantExpedientes = collect($cantExpedientes); // transformamos en una colleccion
                    $sortedExpe = $cantExpedientes->sortByDesc('Cantidad')->first(); // ordenamos y obtenemos el expediente que contenga mas obligados y entregados en S.
                    $expediente = $sortedExpe['Expediente']; // almacenamos el expediente_id
                    foreach ($data as $dato) { //recorremos el array de requisitos                        
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];

                        if ($expediente_id == $expediente & $entregado == "N" & $obligatorio == "S") { // validomos si existe alguno entregado es obligado y se encuentra en estado N
                            return view('administrativo.archivos.VisualizaDocumentosFaltantesOperadores', compact('data')); // enviamos a la vista de requisitos faltantes    
                        }
                    }
                } else { // si solo existe un expediente

                    $token = ArchivosController::obtenerToken(); // obtenemos token
                    $expediente = ArchivosController::obtenerExpediente($carnet, $tipo, $token); // buscamos el expediente_id
    
                    foreach ($data as $dato) { //recorremos el array de requisitos
                        $entregado = $dato['entregado'];
                        $obligatorio = $dato['obligatorio'];
                        $expediente_id = $dato['expediente_id'];

                        if ($entregado == "N" & $obligatorio == "S") { // validomos si existe alguno entregado es obligado y se encuentra en estado N
                            return view('administrativo.archivos.VisualizaDocumentosFaltantesOperadores', compact('data')); // enviamos a la vista de requisitos faltantes
                        }    
                    }

                    foreach ($expediente as $dato) {
                        $expediente = $dato; //almacenamos el expediente en la variable
                    }
                }

                $usuario_creacion = (int)Auth::guard('administrativo')->user()->login; // almacenamos el usuario de la api
                $obtener_usuario = $this->obtenerUsuario($usuario_creacion, $token);
                $usuario_creacion = $obtener_usuario['usuario'];
                $relacion = "Estudiante";
                $tipo_solicitante = "E";
                $tipo_certificacion_id = 1;
                $nombre = $request['nombre'];
    
                $certificacion_data = ArchivosController::GenerarCertificacionArchivosIncompleto(
                    $expediente,
                    $nombre,
                    $relacion,
                    $cui,
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
                    $observacion
                ); // enviamos, generamos y almacenamos los datos de la constancia en la base de datos

                if(!empty($certificacion_data)){
                    $certificacion_id = $certificacion_data[0]['certificacion_id']; // almacenamos en la variable el id de la certificacion
                    $transaccion = $certificacion_data[0]['transaccion']; // almacenamos en la variable la transaccion
                    $barcode = $certificacion_data[0]['barcode'];
                }

                $key = substr($barcode,  0, 8) . substr($barcode,  -5); //fragmentamos y extraemos una parte del uid para el codigo de barras
                $barcode = $key;

                $fecha_usr = Carbon::now()->formatLocalized('%d %B %Y'); // obtengo la fecha actual
                $fecha_usr = ArchivosController::fechaLetras($fecha_usr);

            $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;')); // obtenemos jefatura actual

            foreach ($jefatura as $datos) {
                $jefatura_nombre = $datos->nombre;
                $jefatura_puesto = $datos->puesto;
            }

            $title = "Registro y Estadística";

            $usuarioLinea = ArchivosController::usuarioEnLinea($nov);
            if($usuarioLinea->isNotEmpty() || (!Empty($mineducConsulta) && $carnet >= 202000000 && $carnet < 202300000)){
                $usuarioLinea = "1"; 
            }else{
                $usuarioLinea = "0"; 
            }

            return view(
                'administrativo.archivos.VisualizaConstanciaIncompletoArchivosOperadores',
                compact('carnet', 'nombre', 'cod_ua', 'cod_ext', 'cod_carrera', 'cui', 'nombre_carrera', 'facultad', 'nivel_academico', 'jefatura_nombre', 'jefatura_puesto', 'fecha_usr', 'certificacion_id', 'transaccion', 'barcode', 'usuarioLinea', 'tipoConstancia', 'nomfacultad', 'nomextension','nomcarrera', 'ciclos', 'data', 'expediente', 'codNacionalidad')
            );
        }
    }

    public function DescargarConstanciaArchivos(Request $request)
    {
        $carnet = $request['carnet'];
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
        $iniciales = Auth::guard('administrativo')->user()->iniciales; 
        $codNacionalidad = $request['codNacionalidad'];

        $estudia_old = EstudiaOld::find($carnet);
        $nombreCompleto = $estudia_old->getNombreCompleto();

        $encargado = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "Encargada de Archivo" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));

        foreach ($encargado as $datos) {
            $encargado_nombre = $datos->nombre;
            $encargado_puesto = $datos->puesto;
        }

        $nombreCompleto = explode(" ", $encargado_nombre);
        $encargado_nombre = $nombreCompleto[0] ." ". $nombreCompleto[1] ." ". $nombreCompleto[3];

        $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo

        /*$constancia = $this->obtenerConstancia($carnet, $cod_ua, $cod_ext, $cod_carrera, $token); */ // obtenemos el array de datos de la api 
        $constancia = ArchivosController::obtenerDataTransaccion($transaccion, $token);
        log::info('esto trae constancia: '. json_encode($constancia));
        foreach ($constancia as $dato) { //recorremos y obtenemos los datos de la constancia
            $fecha_creacion = $dato['fecha_creacion'];
            log::info('esto trae fecha_ceacion: '.$fecha_creacion);
            $tipoConstancia = $dato['tipo_constancia'];
            $fechaVencimiento = $dato['fechaVencimiento'];
        }

        $fecha_usr = ArchivosController::fechaLetras($fecha_creacion); // convertimos la fecha en letras

        $date = Carbon::now()->format('d/m/Y');

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

    public static function getCarrera($carne, $carrera, $cod_ext, $cod_fac){
        $carreras = DB::select( DB::raw(
            'SELECT ce.carnet as carnet, f.codfac as idFacultad, ce.codext as idExtension, ce.codcar as idCarrera,
            f.nomfac as facultad, e.nombre as extension, ct.nombre_carrera as carrera, ct.estado as estado, ct.codigo_nivel as nivel,
            ce.sit_acad as sitAcademica, ce.fec_cierre as fechaCierre 
                FROM 
                    carrera_estudiante ce, 
                    facultad f, 
                    carrera_temporal ct, 
                    extension e
                WHERE 
                    ce.carnet = '.$carne.'
                AND ce.codfac = f.codfac
                AND ct.codigo_unidad_academica = ce.codfac
                AND ct.codigo_extension = ce.codext
                AND ct.codigo_carrera = ce.codcar
                AND e.codigo_unidad_academica = f.codfac 
                AND e.codigo_extension = ce.codext
                AND ce.codcar = '.$carrera.'
                AND ce.codext = '.$cod_ext.'
                AND f.codfac = '.$cod_fac.';'
        )); //Consulta carreras

        return $carreras;
    }

    public function DescargarConstanciaArchivosIncompleto(Request $request)
    {

        $carnet = $request['carnet'];
        $nivel_academico = $request['nivel'];
        // quitar los de abajo despues de probar...
        $cod_ua = $request['cod_ua'];
        $cod_ext = $request['cod_ext'];
        $cod_carrera = $request['cod_carrera'];
        $nombre = $request['nombre'];
        $cui = $request['cui'];
        $nomcarrera = $request['nomcarrera'];
        $nomfacultad = $request['nomfacultad'];
        $nomextension = $request['nomextension'];
        $transaccion = $request['transaccion'];
        $certificacion_id = $request['certificacion_id'];
        $barcode = $request['barcode'];
        $usuarioLinea = $request['usuarioLinea'];
        $ciclos = $request['ciclos'];
        $fecha_usr = $request['fecha_usr'];
        $expediente = $request['expediente'];
        $codNacionalidad = $request['codNacionalidad'];

        $iniciales = Auth::guard('administrativo')->user()->iniciales;

        $estudia_old = EstudiaOld::find($carnet);
        $nombreCompleto = $estudia_old->getNombreCompleto();

        $encargado = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "Encargada de Archivo" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;'));

        foreach ($encargado as $datos) {
            $encargado_nombre = $datos->nombre;
            $encargado_puesto = $datos->puesto;
        }

        $nombreCompleto = explode(" ", $encargado_nombre);
        $encargado_nombre = $nombreCompleto[0] ." ". $nombreCompleto[1] ." ". $nombreCompleto[3];

        $jefatura = DB::select(DB::raw('SELECT * from usuario u WHERE puesto = "JEFE" AND dependencia = "rye" AND fecha_desactivacion = 0000-00-00;')); // obtenemos jefatura actual
    
        foreach ($jefatura as $datos) {
            $jefatura_nombre = $datos->nombre;
            $jefatura_puesto = $datos->puesto;
        }

        $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo

        $constancia = ArchivosController::obtenerDataTransaccion($transaccion, $token);
        log::info('esto trae constancia: '. json_encode($constancia));
        foreach ($constancia as $dato) { //recorremos y obtenemos los datos de la constancia
            $fecha_creacion = $dato['fecha_creacion'];
            log::info('esto trae fecha_ceacion: '.$fecha_creacion);
            $tipoConstancia = $dato['tipo_constancia'];
        }

        $fecha_usr = ArchivosController::fechaLetras($fecha_creacion); // convertimos la fecha en letras

        $token = ArchivosController::obtenerToken(); //obtenemos el token para la api_archivo

        if ($nivel_academico == 1 or $nivel_academico == 2) { // validamos el tipo de expediente segun el nivel_academico
            $tipo = 1;
        } else {
            $tipo = 2;
        }
    
        $data = ArchivosController::obtenerDataRequisitos($carnet, $tipo, $token); // obtenemos el array de datos de los requisitos para generar la constancia
        log::info("esto tiene dataaa1: ". json_encode($data));

        $date = Carbon::now()->format('d/m/Y');

        $css = '/var/www/html/rye-portal/public/css/constanciaArchivos.css';
        $img = '/var/www/html/rye-portal/public/img/logousac.png';
        $firma = '/var/www/html/rye-portal/public/img/fJefe/firma_ArchivoSello.png';
        $firmajef = '/var/www/html/rye-portal/public/img/fJefe/fjefe.png';
        $sello = '/var/www/html/rye-portal/public/img/fJefe/sello.jpg';
        $registro = '/var/www/html/rye-portal/public/img/fJefe/Registro.png';
        $provisional = '/var/www/html/rye-portal/public/img/fJefe/ConstanciaProvisional.png';
        

        $pdf = PDF::loadView(
            'administrativo.archivos.DescargarConstanciaArchivosTrasladopdf',
            compact('css', 'img', 'firma', 'sello', 'registro', 'carnet', 'nombre', 'cod_ua', 'cod_ext', 'cod_carrera', 'cui', 'nivel_academico', 'encargado_nombre', 'encargado_puesto', 'fecha_usr', 'transaccion', 'certificacion_id', 'barcode', 'usuarioLinea', 'tipoConstancia', 'provisional', 'data', 'nomfacultad', 'nomextension','nomcarrera', 'ciclos', 'expediente', 'jefatura_nombre', 'jefatura_puesto', 'firmajef', 'iniciales', 'codNacionalidad')
        );

        $pdf->setPaper('letter');
        return $pdf->download('Certificacion_Archivos_' . $carnet . '_' . $date . '.pdf');
    }

    public static function getCantidadConstancia($carnet, $cod_ua, $cod_extension, $cod_carrera, $tipo_constancia, $token)
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

        $result = file_get_contents(config("apiArchivos.ip").'/get_cantidadConstancia?carne=' . $carnet . '&cod_ua=' . $cod_ua . '&cod_extension=' . $cod_extension . '&cod_carrera=' . $cod_carrera . '&tipo_constancia=' . $tipo_constancia, false, $context);
        $json = json_decode($result, true);

        return $json;
    }

    public static function obtenerUsuario($carnet, $token)
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

        $result = file_get_contents(config("apiArchivos.ip").'/get_usuario?registro_personal=' . $carnet, false, $context);
        $json = json_decode($result, true);

        return $json;
    }
}