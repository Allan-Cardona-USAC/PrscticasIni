<?php

namespace App\Http\Controllers\Aspirante;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Funciones\GestionArchivos;
use App\Funciones\Aspirante;
use App\Funciones\Utilidades;
use App\Funciones\Carnet;
use App\Funciones\ResultadoPruebas;
use App\Funciones\ConstanciaInscripcion;
use App\Funciones\Boletas;
use App\Models\PingBoleta;
use App\Models\CicloActivo;
use App\Models\InscripcionPrimerIngreso;
use App\Models\PingMineduc as pingMineduc;
use App\Models\CarreraEstudiante;
use App\Models\BitacoraInscripcion;
use App\Models\EstudiaOld;
use App\Models\PrecioMatricula;
use App\Models\InformacionAspirante;
use App\Models\BoletasExtranjero;
use App\Models\Calendario;
use App\Models\DocumentosEstudiante;
use App\PortalAdministrativo\aspirante as PortalAdministrativoAspirante;
use Error;
use Illuminate\Support\Facades\DB;
use nusoap_client;
use PDF;
use PhpParser\Node\Expr\BinaryOp\NotEqual;
use PHPUnit\Framework\Constraint\IsTrue;
use Request as getIP;
use App\Funciones\Trait\Mineduc;


class InscripcionAspiranteController extends Controller
{
    use Mineduc;

    protected $redirectTo = '/aspirante/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aspirante.auth:aspirante');
    }

    /**
     * Metodo Inicial del Controlador
     */
    public function Index()
    {
        $title = "Proceso de Inscripción"; //Titulo de la Seccion
        $aspirante = Auth::guard('aspirante')->user();

        if($aspirante->nacionalidad!= 30 || $aspirante->pais_establecimiento != 30 ){
            return view(
                'aspirante.inscripcion.inscripcionAspirante.informacionExtranjero',
                compact('title')
            );
        }

        $inscripcion = Aspirante::VerificarStatus($aspirante->nov);
        if(!$inscripcion){
            return redirect('/aspirante/perfil');
        }
        
        $uid = uniqid(time(), true);
        $nov = $aspirante->nov;           //Nov Sobre el que se va a trabajar
        $infoAspirante = InformacionAspirante::find($nov);
        $inscripcionActiva = Aspirante::VerificarStatus($nov);      //Verificacion del Estado del Aspirante
        $dataCarrera = Aspirante::getInformacionCarrera($nov);      //Obtiene la informacion de la carrera del aspirante
        $estadoInscripcion = Aspirante::getEstadoInscripcion($nov, Aspirante::getCicloActual()->ciclo_web_pregrado); //Obtiene el estado del estudiante
        $pruebasBasica = ResultadoPruebas::getResultadosPCB($nov);
        $pruebasBasica = $pruebasBasica[0];
        $pruebasBasica = explode("::", $pruebasBasica); // convertimos las pruebas aprobadas en un arreglo
        $flagBasica = count($pruebasBasica)  == 0;
        if (!$flagBasica) $pruebasBasica = array_slice($pruebasBasica, 1); //eliminamos el primer elemento vacio

        if ($dataCarrera == null) $pruebasEspecificas = "No tienes pruebas especificas para esa carrera";
        else $pruebasEspecificas = ResultadoPruebas::getResultadosEspecificas($nov, $infoAspirante->getCui(), $dataCarrera->idUA, $dataCarrera->idExt, $dataCarrera->idCar);

        //Mensajes de Error
        $mensajeError = "";

        $aspirante = [
            "cui" => $infoAspirante->getCui(),
            "fecha_nacimiento" => $infoAspirante->getFechaNacimiento(),
            "correo_electronico" => $infoAspirante->correo_electronico,
            "telefono" => $infoAspirante->telefono,
            "celular" => $infoAspirante->celular,
            "proveedor_cel" => $infoAspirante->proveedor_cel,
            "genero" => $infoAspirante->getGenero(),
            "departamento" => $infoAspirante->departamento->nombre,
            "municipio" => $infoAspirante->getMunicipio()->municipio,
            "nombre" => $infoAspirante->getNombreCompleto(),
            "carrera" => ($dataCarrera == null) ? "Ninguna" : $dataCarrera->carrera,
            "facultad" => ($dataCarrera == null) ? "Ninguna" : $dataCarrera->facultad,
            "extension" => ($dataCarrera == null) ? "Ninguna" : $dataCarrera->extension,
            "dataCarrera" => $dataCarrera,
            "pcb" => $pruebasBasica,
            "flagPCB" => $flagBasica,
            "pruebasEspecificas" => $pruebasEspecificas
        ];
        $novmd5 = "nov_" . md5("rye2016" . $nov . "usac");
        $ciclo = CicloActivo::first();

        $carnet = Aspirante::obtenerCarnet($nov, $ciclo->ciclo_web_pregrado, $dataCarrera->idUA, $dataCarrera->idExt);
        $boleta = null;
        $estado = 0;
        $mensajeError = "";

        if ($carnet == -1) {
            $boleta = null;
            $mensajeError = "No se encontró el Area asginar el Carnet";
            $estado = -1;
        } else if ($carnet == -2) {
            $boleta = null;
            $mensajeError = "No hay Números de Carné Disponibles";
            $estado = -1;
        } else if ($carnet == 0) {
            $boleta = null;
            $mensajeError = "Sin Generar Carné";
            $estado = 0;
        } else {
            $boleta = PingBoleta::getBoletaVigente($carnet, $dataCarrera->idUA,  $dataCarrera->idExt,  $dataCarrera->idCar);
        }

        if ($boleta != null) {
            $estado = 1;    //pendiente de pago
            $this->inscribir($carnet, $nov);
        } else if ($boleta == null && $carnet != -1 && $carnet != -2) {
            $estado = 0; // Sin generar boleta
        }

        $pathUrl = Storage::url('uploads/temp/fotografias/' . $novmd5 . '.jpg');
        //uploads/temp/fotografias', $nombre . '.jpg', 'public');
        $ruta_carga =  route('aspirante_cert');

        return view(
            'aspirante.inscripcion.inscripcionAspirante.inscripcion',
            compact('title', 'pathUrl', 'nov', 'inscripcionActiva', 'uid', 'novmd5', 'aspirante', 'estado', 'ciclo', 'estadoInscripcion', 
                'carnet', 'mensajeError', 'ruta_carga')
        );
    }

    public function subirFoto(Request $request)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }
        /** si no hay calendario no carga la foto */
        $inscripcion = Aspirante::VerificarStatus($aspirante->nov);
        if(!$inscripcion){
            return redirect('/aspirante/perfil');
        }

        $file = $request->file('foto');
        $file_tmp = $_FILES['foto']['tmp_name'];

        // TODO cuando exista nuevamente aws descomentar las dos siguiente lineas
        // $result =  GestionArchivos::analizarFotografia($file_tmp);
        // if ($result["statusCode"] == 400) return response()->json(['statusCode' => 400, 'body' => $result["body"]]);
        $nov = Auth::guard('aspirante')->user()->nov;
        $nombre = "nov_" . md5("rye2016" . $nov . "usac");

        //Guardar archivos
        $requestData = $request->all();
        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')
                ->storeAs('uploads/temp/fotografias', $nombre . '.jpg', 'public');

            /***
             * Se agrega la Informacion a la BD del paso correspondiente STEP-1
             */
            $informacionAspirante = Aspirante::getInformacionPreInscripcion($nov);
            $ciclo = Aspirante::getCicloActual();
            Aspirante::registrarFotografiaBD($nov, $ciclo->ciclo_web_pregrado, $informacionAspirante->UA, $informacionAspirante->ext, $informacionAspirante->car);

            return response()->json(['statusCode' => 200, 'body' => "Fotografia subida con exito"]);
        } else {
            return response()->json(['statusCode' => 400, 'body' => 'Sin Fotografia Válida']);
        }
    }

    /**
     * Sube el archivo PDF de la partida de Nacimiento
     */
    public function subirPartida(Request $request)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }

        /** si no hay calendario no sube el certificado*/
        $inscripcion = Aspirante::VerificarStatus($aspirante->nov);
        if(!$inscripcion){
            return redirect('/aspirante/perfil');
        }

        $file = $request->file('inputPDF');
        $file_tmp = $_FILES['inputPDF']['tmp_name'];
        $nov = Auth::guard('aspirante')->user()->nov;
        $nombre = "nov_" . md5("rye2016" . $nov . "usac");
        //$extension = $file->extension();
        //$result = GestionArchivos::almacenarCertificado($nombre, $file_tmp, $extension);

        //Guardar archivos
        $requestData = $request->all();
        if ($request->hasFile('inputPDF')) {
            $requestData['inputPDF'] = $request->file('inputPDF')
                ->storeAs('uploads/temp/certificacion', $nombre . '.pdf', 'public');

            /***
             * Se agrega la Informacion a la BD del paso correspondiente STEP2
             */
            $pasosAnterioresValidos = Aspirante::validarPasos(1, $nov, Aspirante::getCicloActual()->ciclo_web_pregrado);
            if($pasosAnterioresValidos){
                Aspirante::registrarPartidaBD($nov, Aspirante::getCicloActual()->ciclo_web_pregrado);
                return response()->json((['statusCode' => 200, 'message' => 'Certificado subido con exito']));
            }
            return response()->json(['statusCode' => 400, 'body' => 'Faltan Pasos Pendientes, Porfavor Recargue la pagina y Complete los Pasos Pendientes']);
        } else {
            return response()->json(['statusCode' => 400, 'body' => 'Sin Archivo PDF']);
        }

        return response()->json(['statusCode' => 400, 'body' => 'Sin Archivo PDF']);
    }

    public function validarTituloMedio(Request $request){
        // tipo consulta -- 1 cui -- 2 reg titulo
        $aspirante = Auth::guard('aspirante')->user();
        $ciclo = Aspirante::getCicloActual()->ciclo_web_pregrado;
        if($aspirante -> nacionalidad != 30 || $aspirante->pais_establecimiento != 30)
            return redirect('inscripcion/automatica');

        $procesoInscripcionActivo = Aspirante::VerificarStatus($aspirante->nov);
        if(!$procesoInscripcionActivo)
            return redirect('/aspirante/perfil');

        $pasosAnterioresValidos = Aspirante::validarPasos(2, $aspirante->nov, $ciclo);
        if(!$pasosAnterioresValidos)
            return response()->json(([
                'statusCode' => 402,
                'message' => 'Tiene paso pendientes de completar, por favor, recargue la página y complete los pasos pendientes'
            ]));

        $tipoConsulta = $request->input('tipoConsulta');
        $registro = $request->input('registro');

        $cicloActual = Aspirante::getCicloActual();
        $informacionAspirante = Aspirante::getInformacionAspirante($aspirante->nov);

        $resultadoMineduc = $this->consultaMineduc($registro, $tipoConsulta);
        if($resultadoMineduc->error !== 0){
            return response()->json(([
                'statusCode' => 404,
                'message' => $resultadoMineduc['mensaje']
            ]));
        }

        //Se pudo consultar a MINEDUC??
        $resultadoMineduc = $resultadoMineduc['data'];
        if($resultadoMineduc->error != '0')
            return response()->json(([
                'statusCode' => 404,
                'message' => 'No se pudo consultar con el Ministerio de Educación intenta más tardes'
            ]));

        $tituloMedio = $resultadoMineduc->TituloMedio;
        if($tituloMedio->no_registro_titulo == 'NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO'
           || empty($tituloMedio->no_registro_titulo))
            return response()->json(([
                'statusCode' => 400,
                'message' => 'No se encontro información del Título en el Ministerio de Educación '. $tituloMedio->no_registro_titulo . 'nada'
            ]));

        // comprobando información
        $nombreMineduc = strtoupper($this->normalizarTexto($resultadoMineduc->TituloMedio->nombres 
                                                           . ' ' .
                                                           $resultadoMineduc->TituloMedio->apellidos));
        $nombreDB = $informacionAspirante->nombre1 . $informacionAspirante->nombre2 
                    . $informacionAspirante->otros_nombres . $informacionAspirante->apellido1
                    . $informacionAspirante->apellido2;

        $nombreDB = strtoupper($this->normalizarTexto($nombreDB));

        $datosValidos = true;

        if(isset($tituloMedio->cui))
            $datosValidos &= strcmp($informacionAspirante->numero_registro, $tituloMedio->cui) == 0;

        $datosValidos &= $this->compare_text($nombreMineduc, $nombreDB);

        if(!$datosValidos)
            return response()->json(([
                'statusCode' => 400,
                'message' => 'La información obtenida del Ministerio de Educación no coincide con la información ingresada en el sistema del Departamento de Registro y Estadística, debes presentare a nuestras instalaciones para resolver el inconveniente'
            ]));

        //guardando la información del aspirante
        $ping_mineduc = PingMineduc::firstorNew(['nov'=>$aspirante->nov]);
        $ping_mineduc->nov = $aspirante->nov;
        $ping_mineduc->nombres = $tituloMedio->nombres;
        $ping_mineduc->reg_titulo = $tituloMedio->no_registro_titulo;
        $ping_mineduc->cui = $tituloMedio->cui;
        $ping_mineduc->apellidos = $tituloMedio->apellidos;
        $ping_mineduc->fecha_nacimiento = $tituloMedio->fecha_nacimiento;
        $ping_mineduc->promovido = $tituloMedio->promovido;
        $ping_mineduc->fecha_promocion = $tituloMedio->fecha_promocion;
        $ping_mineduc->codigo_carrera = $tituloMedio->codigo_carrera;
        $ping_mineduc->nombre_carrera = $tituloMedio->nombre_carrera;
        $ping_mineduc->codigo_establecimiento = $tituloMedio->codigo_establecimiento;
        $ping_mineduc->nombre_establecimiento = $tituloMedio->nombre_establecimiento;
        $ping_mineduc->codigo_sector = $tituloMedio->codigo_sector;
        $ping_mineduc->save();

        $tipoInscripcion = $ping_mineduc->no_registro_titulo == 'AUN_NO_HAY_REGISTRO_DE_TITULO' ?
                        0 : 1;

        Aspirante::registrarTituloBD($aspirante->nov, $tituloMedio->cui, $tituloMedio->no_registro_titulo, $ciclo);
        return response()->json(([
            'statusCode' => 200,
            'tipoInscripcion' => $tipoInscripcion,
            'message' => 'Se ha registrado la información de estudios de nivel medio'
        ]));
    }

    /**
     * Busqueda del Titulo por CUI y Numero de Registro en webservice del MINEDUC
     */
    public function validarTitulo(Request $request)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }

        $cui = $request->input('cui');
        $registro = $request->input('registro');
        $tipoConsulta = $request->input('tipoConsulta');
 
        /**si no hay calendario no valida título */
        $inscripcion = Aspirante::VerificarStatus($aspirante->nov);
        if(!$inscripcion){
            return redirect('/aspirante/perfil');
        }

        if (is_null($request->input('registro'))) $registro = "";
        if (strlen($registro) > 1) $cui = "";

        $cicloActual = Aspirante::getCicloActual();
        $informacionAspirante = Aspirante::getInformacionAspirante(Auth::guard('aspirante')->user()->nov);
        $cui = !$cui?$registro:$cui;

        $datos = $this->consultaMineduc($cui,$tipoConsulta);
        $consultaMineduc = $datos['data'];

        if($datos['error'] !== 0){
            return response()->json((['statusCode' => 404, 'message' =>  $datos['mensaje'], 'ResultadoMineduc' => $resultMineduc, 'CUIIngresado' => $cui, 'registro' => $registro]));
        }

        
        if ($resultMineduc->error != "0"){  
            return response()->json((['statusCode' => 404, 'message' => 'La Información del Título No Se ha Podido Obtener del Ministerio de Educación', 'ResultadoMineduc' => $resultMineduc, 'CUIIngresado' => $cui, 'registro' => $registro]));
        }
        //Normalizamos el texto
        //$resultMineduc->Nombre = $this->normalizarTexto($resultMineduc->Nombre);
        $nombreCompleto = strtoupper($this->normalizarTexto($resultMineduc->TituloMedio->nombres .' '. $resultMineduc->TituloMedio->apellidos));
        $NombreBD = $informacionAspirante->nombre1 . $informacionAspirante->nombre2 . $informacionAspirante->otros_nombres . $informacionAspirante->apellido1 . $informacionAspirante->apellido2;
        $NombreBD = strtoupper($this->normalizarTexto($NombreBD));
        
        // Si MINEDUC retorna mensajes en el registro de título
        if ($resultMineduc->TituloMedio->no_registro_titulo == "NO_SE_TIENE_REGISTRO_DE_TITULO_CON_CUI_PROPORCIONADO" || $resultMineduc->TituloMedio->no_registro_titulo == "AUN_NO_HAY_REGISTRO_DE_TITULO" || empty($resultMineduc->TituloMedio->no_registro_titulo)){
            return response()->json((['statusCode' => 400, 'message' => 'La información del título no se ha podido obtener del Ministerio de Educación', 'CUIING' => $cui, 'RegistroING' => $registro, 'ResultadoMineduc' => $resultMineduc, 'NombreBD' => $NombreBD]));
        }

        //Si existe el CUI se verifica por este de lo contrario verificara el nombre
        if (isset($resultMineduc->TituloMedio->cui)) {
            if (strcmp($informacionAspirante->numero_registro, $resultMineduc->TituloMedio->cui) !== 0
            || ($this->compare_text($nombreCompleto, $NombreBD) == false)){
            
                return response()->json((['statusCode' => 400, 'message' => 'La información obtenida del Ministerio de Educación no coincide con la información ingresada en el Sistema del Departemento de Registro y Estadística, presentate en nuestra instalaciones para resolver el inconveniente', 'CUIING' => $cui, 'RegistroING' => $registro, 'ResultadoMineduc' => $resultMineduc, 'NombreBD' => $NombreBD]));
            }

            $ping_mineduc = PingMineduc::firstorNew(["nov"=>$aspirante->nov]);            
            //$ping_mineduc = new PingMineduc; // se crea la instancia para reali>
            $ping_mineduc->nov = Auth::guard('aspirante')->user()->nov;
            $ping_mineduc->nombres = $resultMineduc->TituloMedio->nombres; // se insertan lo>
            $ping_mineduc->reg_titulo = $resultMineduc->TituloMedio->no_registro_titulo;
            $ping_mineduc->cui = $resultMineduc->TituloMedio->cui;
            $ping_mineduc->apellidos = $resultMineduc->TituloMedio->apellidos;
            $ping_mineduc->fecha_nacimiento = $resultMineduc->TituloMedio->fecha_nacimiento;
            $ping_mineduc->promovido = $resultMineduc->TituloMedio->promovido;
            $ping_mineduc->fecha_promocion = $resultMineduc->TituloMedio->fecha_promocion;
            $ping_mineduc->codigo_carrera = $resultMineduc->TituloMedio->codigo_carrera;
            $ping_mineduc->nombre_carrera = $resultMineduc->TituloMedio->nombre_carrera;
            $ping_mineduc->codigo_establecimiento = $resultMineduc->TituloMedio->codigo_establecimiento;
            $ping_mineduc->nombre_establecimiento = $resultMineduc->TituloMedio->nombre_establecimiento;
            $ping_mineduc->codigo_sector = $resultMineduc->TituloMedio->codigo_sector;
            $ping_mineduc->save();
            
            $nov = Auth::guard('aspirante')->user()->nov;
            $pasosAnterioresValidos = Aspirante::validarPasos(2, $nov, Aspirante::getCicloActual()->ciclo_web_pregrado);
            if($pasosAnterioresValidos){
                Aspirante::registrarTituloBD($nov, $resultMineduc->TituloMedio->cui, $resultMineduc->TituloMedio->no_registro_titulo, Aspirante::getCicloActual()->ciclo_web_pregrado);
                return response()->json((['statusCode' => 200, 'CUIING' => $cui, 'RegistroING' => $registro, 'ResultadoMineduc' => $resultMineduc, 'NombreBD' => $NombreBD]));
            }else{
                //error
                return response()->json((['statusCode' => 402, 'message' => 'Tiene pasos pendientes de completar, porfavor, recargue la página y complete los pasos pendientes']));
            }
            
            
        } else {
            if ($this->compare_text($nombreCompleto, $NombreBD) == false) {
                return response()->json((['statusCode' => 400, 'message' => 'La información del título no se ha podido obtener del Ministerio de Educación', 'CUIING' => $cui, 'RegistroING' => $registro, 'ResultadoMineduc' => $resultMineduc, 'NombreBD' => $NombreBD]));
            }

            $ping_mineduc = PingMineduc::firstorNew(["nov"=>$aspirante->nov]);            
            //$ping_mineduc = new PingMineduc; // se crea la instancia para reali>
            $ping_mineduc->nov = Auth::guard('aspirante')->user()->nov;
            $ping_mineduc->nombres = $resultMineduc->TituloMedio->nombres; // se insertan lo>
            $ping_mineduc->reg_titulo = $resultMineduc->TituloMedio->no_registro_titulo;
            $ping_mineduc->cui = $resultMineduc->TituloMedio->cui;
            $ping_mineduc->apellidos = $resultMineduc->TituloMedio->apellidos;
            $ping_mineduc->fecha_nacimiento = $resultMineduc->TituloMedio->fecha_nacimiento;
            $ping_mineduc->promovido = $resultMineduc->TituloMedio->promovido;
            $ping_mineduc->fecha_promocion = $resultMineduc->TituloMedio->fecha_promocion;
            $ping_mineduc->codigo_carrera = $resultMineduc->TituloMedio->codigo_carrera;
            $ping_mineduc->nombre_carrera = $resultMineduc->TituloMedio->nombre_carrera;
            $ping_mineduc->codigo_establecimiento = $resultMineduc->TituloMedio->codigo_establecimiento;
            $ping_mineduc->nombre_establecimiento = $resultMineduc->TituloMedio->nombre_establecimiento;
            $ping_mineduc->codigo_sector = $resultMineduc->TituloMedio->codigo_sector;
            $ping_mineduc->save();

            $nov = Auth::guard('aspirante')->user()->nov;
            $pasosAnterioresValidos = Aspirante::validarPasos(2, $nov, Aspirante::getCicloActual()->ciclo_web);
            if($pasosAnterioresValidos){
                Aspirante::registrarTituloBD($nov, $informacionAspirante->numero_registro, $resultMineduc->TituloMedio->no_registro_titulo, Aspirante::getCicloActual()->ciclo_web_pregrado);
            
                return response()->json((['statusCode' => 200, 'CUIING' => $cui, 'RegistroING' => $registro, 'ResultadoMineduc' => $resultMineduc, 'NombreBD' => $NombreBD]));
            }else{
                //error
                return response()->json((['statusCode' => 402, 'message' => 'Tiene pasos pendientes de completar, porfavor, recargue la página y complete los pasos pendientes']));
            }
        }
    }

    /**
     * Actualiza los datos del aspirante en la BD
     */

    public function ActualizarDatos(Request $request)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }
        
        /**Si no hay calendario no actualiza datos */
        $inscripcion = Aspirante::VerificarStatus($aspirante->nov);
        if(!$inscripcion){
            return redirect('/aspirante/perfil');
        }
        $email = $request->input('email');
        $fechaNacimiento = $request->input('fechaNacimiento');
        $numeroFijo = $request->input('numeroFijo');
        $numeroCelular = $request->input('numeroCelular');
        $operador = $request->input('operador');
        $genero = $request->input('genero');

        $pasosAnterioresValidos = Aspirante::validarPasos(3, Auth::guard('aspirante')->user()->nov, Aspirante::getCicloActual()->ciclo_web_pregrado);
        
        if($pasosAnterioresValidos){
            Aspirante::actualizarInformacion($email, $fechaNacimiento, $numeroFijo, $numeroCelular, $operador, $genero, Auth::guard('aspirante')->user()->nov);        
            Aspirante::registrarValidacionesBD(Auth::guard('aspirante')->user()->nov, Aspirante::getCicloActual()->ciclo_web_pregrado);
            return response()->json((['statusCode' => 200, 'message' => 'Informacion Actualizada']));
        }else{
            return response()->json((['statusCode' => 402, 'message' => 'Faltan Pasos Pendientes, Porfavor Recargue la pagina y Complete los Pasos Pendientes aca salio']));
        }
    }

    public function GenerarConstanciaInscripcion(Request $request)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }
        $idFacultad = $request->input('idFacultad');
        $idExtension = $request->input('idExtension');
        $idCarrera = $request->input('idCarrera');
        $nov = Auth::guard('aspirante')->user()->nov;
        $estudiante = EstudiaOld::where('cod_orien', '=', $nov)->first();
        return ConstanciaInscripcion::descargar($estudiante->carnet, $estudiante->cui, Auth::guard('aspirante')->user()->getNombreCompleto(), $idFacultad, $idExtension, $idCarrera);
    }

    private function normalizarTexto($cadena)
    {
        $cadenaResult = str_replace(' ', '', $cadena);
        $cadenaResult = strtoupper($cadenaResult);

        //Reemplazamos la A y a
        $cadenaResult = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadenaResult
        );

        //Reemplazamos la E y e
        $cadenaResult = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadenaResult
        );

        //Reemplazamos la I y i
        $cadenaResult = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadenaResult
        );

        //Reemplazamos la O y o
        $cadenaResult = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadenaResult
        );

        //Reemplazamos la U y u
        $cadenaResult = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadenaResult
        );

        //Reemplazamos la N, n, C y c
        $cadenaResult = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadenaResult
        );

        return $cadenaResult;
    }

    private function compare_text($cad1, $cad2)
    {
        //Dara un maximo de 3 intentos para verificar si es el nombre o no
        $attemps = 0;
        $index = 0;

        if (strlen($cad1) >= strlen($cad2)) {
            $index = strlen($cad2);
        } else {
            $index = strlen($cad1);
        }

        for ($i = 0; $i < $index; $i++) {
            if (strcmp($cad1[$i], $cad2[$i]) !== 0) {
                $attemps++;
            }
        }
        if ($attemps >= 3) return false;

        return true;
    }

    /**¨
     * Registrar Estudiante
     */
    public static function inscribir($carnet, $nov)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }
        $ping_mineduc = PingMineduc::where(['nov'=>$aspirante->nov])->first();
        $reg_titulo_medio = $ping_mineduc->reg_titulo;

        $ciclo = CicloActivo::first();
        $datos = InformacionAspirante::find($nov);
        $infoPreinscripcion = Aspirante::getInformacionPreInscripcion($nov);
        $user_inscripcion = strcmp($reg_titulo_medio, 'AUN_NO_HAY_REGISTRO_DE_TITULO') != 0?
            'pingenlinea@' : 'ping_provisional@';

        if (!EstudiaOld::where('carnet', $carnet)->exists()) {
            $estudiaOld = new EstudiaOld();
            $estudiaOld->carnet = $carnet;
            $estudiaOld->lit_orien = '';
            $estudiaOld->cod_orien = $datos->nov;
            $estudiaOld->nombre1 = $datos->nombre1;
            $estudiaOld->nombre2 = $datos->nombre2;
            $estudiaOld->nombre = $datos->otros_nombres;
            $estudiaOld->primer_apellido = $datos->apellido1;
            $estudiaOld->segundo_apellido = $datos->apellido2;
            $estudiaOld->direccion = $datos->direccion;
            $estudiaOld->codigo_municipio_recide = $datos->muni_recide;
            $estudiaOld->codigo_departamento_recide = $datos->depto_recide;
            $estudiaOld->cod_postal = $datos->cod_Postal;
            $estudiaOld->fec_nac = $datos->fecha_nacimiento;
            $estudiaOld->sexo = $datos->sexo;
            $estudiaOld->lug_nac = $datos->depto_nac;
            $estudiaOld->cod_nac = $datos->pais_nac;
            $estudiaOld->est_civ = $datos->estado_civil;
            $estudiaOld->telefono = $datos->telefono;
            $estudiaOld->celular = $datos->celular;
            $estudiaOld->empresa = '';
            $estudiaOld->usuario = $user_inscripcion . getIP::ip();
            $estudiaOld->fecha_u = date('Y-m-d H:i:s');
            $estudiaOld->carnet_ant = 0;
            $estudiaOld->annioi = $ciclo->ciclo_web_pregrado;
            $estudiaOld->email = $datos->correo_electronico;
            $estudiaOld->pin = ($datos->pin == null ? substr(md5($nov), 0, 6) : $datos->pin);
            $estudiaOld->nit = '';
            $estudiaOld->numero_folio = $datos->numero_folio;
            $estudiaOld->numero_libro = $datos->numero_libro;
            $estudiaOld->numero_partida = $datos->numero_partida;
            $estudiaOld->numero_orden = $datos->numero_orden;
            $estudiaOld->numero_registro = $datos->numero_registro;
            $estudiaOld->tipo_cui = $datos->numero_orden;
            $estudiaOld->cui = $datos->numero_registro;
            $estudiaOld->codigo_pais_extendida = $datos->pais_extendida;
            $estudiaOld->codigo_departamento_extendida = $datos->depto_extendida;
            $estudiaOld->codigo_municipio_extendida = $datos->muni_extendida;
            $estudiaOld->codigo_pais_nacimiento = $datos->pais_nac;
            $estudiaOld->codigo_departamento_nacimiento = $datos->depto_nac;
            $estudiaOld->codigo_municipio_nacimiento = $datos->muni_nac;
            $estudiaOld->codigo_titulo_diversificado = $datos->cod_titulo_diversificado;
            $estudiaOld->year_de_graduacion = $datos->f_graduacion->format('Y-m-d');
            $estudiaOld->nombre_establecimiento = $datos->nombre_establecimiento;
            $estudiaOld->codigo_tipo_establecimiento = $datos->tipo_establecimiento;
            $estudiaOld->direccion_establecimiento = $datos->direccion_establecimiento;
            $estudiaOld->codigo_pais_establecimiento = $datos->pais_establecimiento;
            $estudiaOld->codigo_departamento_establecimiento = $datos->depto_establecimiento;
            $estudiaOld->codigo_municipio_establecimiento = $datos->muni_establecimiento;
            $estudiaOld->numero_pasaporte = '';
            $estudiaOld->etnia = $datos->etnia;
            $estudiaOld->idioma = $datos->idioma_etnia;
            $estudiaOld->otroIdioma = $datos->idioma_gt;
            $estudiaOld->activo = 1;
            $estudiaOld->observaciones = '';
            $estudiaOld->pin_hash = $datos->pin_hash;
            $estudiaOld->remember_token = $datos->remember_token; //todo preguntarle a Ali
            $estudiaOld->save();
        }

        if(!DocumentosEstudiante::where('carnet_universitario', $carnet)->exists()){
            $documentosEstudiante = new DocumentosEstudiante();
            $documentosEstudiante->carnet_vocacional = $datos->nov;
            $documentosEstudiante->carnet_universitario = $carnet;
            $documentosEstudiante->tarjeta_pcb = 1;
            $documentosEstudiante->conocimientos_especificos = 1;
            $documentosEstudiante->partida_nacimiento = 1;
            $documentosEstudiante->fotostatica = 1;
            $documentosEstudiante->usuario = $user_inscripcion . getIP::ip();
            $documentosEstudiante->fecha_u = date('Y-m-d H:i:s');
            $documentosEstudiante->save();
        }

        if (!CarreraEstudiante::where('carnet', $carnet)->exists()) {
            $carreraEstudiante = new CarreraEstudiante();
            $carreraEstudiante->carnet = $carnet;
            $carreraEstudiante->codfac = $infoPreinscripcion->UA;
            $carreraEstudiante->codext = $infoPreinscripcion->ext;
            $carreraEstudiante->codcar = $infoPreinscripcion->car;
            $carreraEstudiante->fecha_entrada = date('Y-m-d');
            $carreraEstudiante->sit_acad = 0;
            $carreraEstudiante->fec_block = '0000-00-00';
            $carreraEstudiante->cal_elec = 0;
            $carreraEstudiante->fec_cierre = '0000-00-00';
            $carreraEstudiante->fec_expri = '0000-00-00';
            $carreraEstudiante->fec_tesis = '0000-00-00';
            $carreraEstudiante->fec_eps = '0000-00-00';
            $carreraEstudiante->fec_expub = '0000-00-00';
            $carreraEstudiante->fec_gradua = '0000-00-00';
            $carreraEstudiante->carnet_ant = 0;
            $carreraEstudiante->tipo_carnet = 0;
            $carreraEstudiante->cambio = 0;
            $carreraEstudiante->repitencia = 0;
            $carreraEstudiante->habilitado = 1;
            $carreraEstudiante->activo = 1;
            $carreraEstudiante->usuario = $user_inscripcion . getIP::ip();
            $carreraEstudiante->fecha_usr = date('Y-m-d H:i:s');
            $carreraEstudiante->migrar = 0;
            $carreraEstudiante->estado_graduado = 0;
            $carreraEstudiante->acta_privado = 0;
            $carreraEstudiante->acta_publico = 0;
            $carreraEstudiante->tipoRegistro = 0;
            $carreraEstudiante->save();
        }
    }
    /**
     * --------------------------- Funciones para Boletas -------------------------------------------
     */


    public function GenerarBoleta(Request $request)
    {
        $aspirante = Auth::guard('aspirante')->user();
        if($aspirante->nacionalidad != 30 || $aspirante->pais_establecimiento != 30){
            return redirect('inscripcion/automatica');
        }

        $ping_mineduc = PingMineduc::where(['nov'=>$aspirante->nov])->first();
        $reg_titulo_medio = $ping_mineduc->reg_titulo;
        
        /**si no hay calendario no puede generar boleta */

        $inscripcion = Aspirante::VerificarStatus($aspirante->nov);
        if(!$inscripcion){
            return redirect('/aspirante/perfil');
        }

        $nov = Auth::guard('aspirante')->user()->nov;
        $ciclo = CicloActivo::first();
        $idUA = $request->input('idFacultad');
        $idExt = $request->input('idExtension');
        $dataInformacion = Aspirante::getInformacionAspirante($nov);

        $pasosAnterioresValidos = Aspirante::validarPasos(5, Auth::guard('aspirante')->user()->nov, Aspirante::getCicloActual()->ciclo_web_pregrado);
        if($pasosAnterioresValidos && $dataInformacion->nacionalidad == 30){
            $carnet = Aspirante::generarCarnet($nov, $ciclo->ciclo_web_pregrado, $idUA, $idExt, $reg_titulo_medio);
            if ($carnet == -1 || $carnet == -2) {
                return null;
            } else{
                $this->inscribir($carnet, $nov);
                return $this->generarBoletaPrimerIngreso(Auth::guard('aspirante')->user()->nov, Auth::guard('aspirante')->user()->getNombreCompleto(), $carnet);
            } 
        }
        return null;
    }

    public  function generarBoletaPrimerIngreso($nov, $nombreCompleto, $carnet)
    {
        $dataCarrera = Aspirante::getInformacionCarrera($nov);
        //Reviso si el usuario tiene boletas vigentes
        $boleta = PingBoleta::getBoletaVigente($carnet, $dataCarrera->idUA,  $dataCarrera->idExt,  $dataCarrera->idCar);
        if ($boleta) {
            return $this->descargarBoletaPrimerIngreso($boleta->id_orden_pago, $nov, $carnet);
        }

        $nac = Auth::guard('aspirante')->user()->nacionalidad;

        $respuesta = Boletas::crearBoleta(
            $carnet,
            $dataCarrera->idUA,
            $dataCarrera->idExt,
            $dataCarrera->idCar,
            $nombreCompleto,
            101, //todo preguntar de donde sale
            11, //Primer ingreso Rubro
            1, //Estudiante regular
            $nac
        );
        if (is_string($respuesta)) {
            return HomeController::mensajeError($respuesta);
        }
        if ($respuesta) {
            $boleta = PingBoleta::firstOrNew(['id_orden_pago' => $respuesta['idOrdenPago']]);
            $boleta->id_orden_pago = $respuesta['idOrdenPago'];
            $boleta->carnet = $respuesta['carnet'];
            $boleta->ua = $respuesta['ua'];
            $boleta->ext = $respuesta['ext'];
            $boleta->car = $respuesta['car'];
            $boleta->monto = $respuesta['monto'];
            $boleta->cheksum = $respuesta['checksum'];
            $boleta->rubro_pago = $respuesta['rubroPago'];
            $boleta->fecha_generacion = $respuesta['fechaGeneracion'];
            $boleta->fecha_vencimiento = $respuesta['fechaVencimiento'];
            $boleta->estado = $respuesta['estado'];
            $boleta->save();

            return $this->descargarBoletaPrimerIngreso($respuesta['idOrdenPago'], $nov, $carnet);
        }
        return null; //super error donde murio y valio la vida
    }

    public static function descargarBoletaPrimerIngreso($idOrdenPago, $nov, $carnet)
    {
        //Datos del estudiante
        $datos = InformacionAspirante::find($nov);
        $nombre = $datos->getNombreCompleto();
        $cui = $datos->numero_registro;
        $registro = $nov;
        $tipoRegistro = 'N.O.V.';
        $cicloactivo =  CicloActivo::first()->ciclo_web_pregrado;

        //Datos de la boleta
        $boleta = PingBoleta::find($idOrdenPago);
        $monto = $boleta->monto;
        $rubroPago = $boleta->rubro_pago;
        $checksum = $boleta->cheksum;
        $fechaGeneracion = $boleta->fecha_generacion;
        $fechaVencimiento = date("d/m/Y", strtotime('+7 days', strtotime($fechaGeneracion)));

        //Datos Carrera
        $dataCarrera = Aspirante::getInformacionCarrera($nov);
        $facultad = $dataCarrera->facultad;
        $ua = $dataCarrera->idUA;
        $ext = $dataCarrera->idExt;
        $extension = $dataCarrera->extension;
        $idCarrera = $dataCarrera->idCar;
        $carrera = $dataCarrera->carrera;

        $css = '/var/www/html/rye-portal/public/css/boletaPDF.css';

        $pdf = PDF::loadView('aspirante.inscripcion.inscripcionAspirante.boletaPago', compact(
            "nombre",
            "cui",
            "fechaGeneracion",
            "idOrdenPago",
            "nov",
            "monto",
            "ua",
            "facultad",
            "ext",
            "extension",
            "idCarrera",
            "carrera",
            "rubroPago",
            "checksum",
            "fechaVencimiento",
            "cicloactivo",
            "css",
            "carnet"
        ));

        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('boleta.pdf');
    }
}
