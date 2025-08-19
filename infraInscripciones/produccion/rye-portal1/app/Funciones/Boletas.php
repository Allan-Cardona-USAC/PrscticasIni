<?php


namespace App\Funciones;


use App\Http\Controllers\Aspirante\HomeController;
use App\Models\BoletasExtranjero;
use App\Models\BoletasReingreso;
use App\Models\CarreraTemporal;
use App\Models\CicloActivo;
use App\Models\EstudiaOld;
use App\Models\Extension;
use App\Models\Facultad;
use App\Models\InformacionAspirante;
use App\Models\InscripcionPrimerIngreso;
use App\Models\MatriculaExtranjero;
use App\Models\PingBoleta;
use DateTime;
use function GuzzleHttp\Psr7\modify_request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use nusoap_client;


class Boletas
{
    const vigencia = 7;
    const WSERVICE = 'https://pruebassiif.usac.edu.gt/WSGeneracionOrdenPagoV2/WSGeneracionOrdenPagoV2SoapHttpPort?wsdl';

    /**
     * Esta funcion crea una boleta en Siif y retorna un objeto boleta con todas las propiedades necesarias para ser almacenado en boletaReingreso
     * @param $carnet int Carnet del estudiante
     * @param $unidad int ID de la Unidad Academica
     * @param $extension int ID de la Extension
     * @param $carrera int ID de la Carrera
     * @param $nombre string Nombre del estudiante
     * @param $monto double monto a pagar en Quetzales
     * @param $rubro int ID del rubro de pago
     * @param $varianteRubro int ID de la variante del rubro de pago
     * @return array|null Array boleta si se crea, null si existe un error
     */
    public static function crearBoleta($carnet, $unidad, $extension, $carrera, $nombre, $monto, $rubro, $varianteRubro, $nacionalidad, $ciclo = null){
        
        if($ciclo == null){
        $ciclo = CicloActivo::first()->ciclo_web_pregrado;
        }

        $xml = "<GENERAR_ORDEN>
                    <CARNET>$carnet</CARNET>
                    <UNIDAD>$unidad</UNIDAD>
                    <EXTENSION>$extension</EXTENSION>
                    <CARRERA>$carrera</CARRERA>
                    <NOMBRE>$nombre</NOMBRE>
                    <MONTO>$monto</MONTO>
                    <PAIS>$nacionalidad</PAIS>
                    <DETALLE_ORDEN_PAGO>
                        <ANIO_TEMPORADA>$ciclo</ANIO_TEMPORADA>
                        <ID_RUBRO>$rubro</ID_RUBRO>
                        <ID_VARIANTE_RUBRO>$varianteRubro</ID_VARIANTE_RUBRO>
                        <TIPO_CURSO></TIPO_CURSO>
                        <CURSO></CURSO>
                        <SECCION></SECCION>
                        <SUBTOTAL>$monto</SUBTOTAL>
                    </DETALLE_ORDEN_PAGO>
                 </GENERAR_ORDEN>";

        $cliente = new nusoap_client( self::WSERVICE, 'wsdl');
        /**
         * generarOrdenPago = metodo del ws que genera la boleta
         * pxml = nombre del parametro que recibe el metodo
         * response = resultado de la llamda al metodo
         **/

        //error_log($xml);
        
        $response = $cliente->call('generarOrdenPago', array('pxml'=>$xml));
        $resultado = Utilidades::xml2array($response['result']); //conversion a arreglo para poder acceder facilmente a los datos
        if ($resultado['RESPUESTA']['CODIGO_RESP']['value']) {
            $fecha_sinFormato=substr($resultado['RESPUESTA']['FECHA']['value'], 0 ,4) . '-' . substr($resultado['RESPUESTA']['FECHA']['value'], 4 ,2) . '-' . substr($resultado['RESPUESTA']['FECHA']['value'], 6 ,2);
            $fechaGeneracion = date('Y-m-d',strtotime($fecha_sinFormato));

            $fechaVencimiento = new DateTime($fechaGeneracion);
            $fechaVencimiento = $fechaVencimiento->modify('+'.self::vigencia.' day')->format('Y-m-d'); //aqui esta seteada la duracion de la boleta
            $boleta = [
                'idOrdenPago' => $resultado['RESPUESTA']['ID_ORDEN_PAGO']['value'],
                'carnet' => $carnet,
                'ua' => $resultado['RESPUESTA']['UNIDAD']['value'],
                'ext' => $resultado['RESPUESTA']['EXTENSION']['value'],
                'car' => $resultado['RESPUESTA']['CARRERA']['value'],
                'monto' => $resultado['RESPUESTA']['MONTO']['value'],
                'checksum' => $resultado['RESPUESTA']['CHECKSUM']['value'],
                'rubroPago' => $resultado['RESPUESTA']['RUBROPAGO']['value'],
                'banco' => null,
                'noBoletaDeposito' => null,
                'noTransferenciaBancaria' => null,
                'fechaCertificadoBanco' => null,
                'fechaGeneracion' => $fechaGeneracion,
                'fechaVencimiento' => $fechaVencimiento,
                'estado' => 1,
                'ciclo' => $ciclo
            ];
            return $boleta; //son todos los campos de boletaReingreso
        }
        return $resultado['RESPUESTA']['DESCRIPCION']['value'];
    }

    /**
     * Valida si la boleta ya fue pagado
     * @param $idOrdenPago int
     * @param $carnet int
     * @return array|string objeto boleta si fue pagado, string si existe un error
     */
    public static function validarBoleta(int $idOrdenPago, int $carnet){
        $xml = "<CONSULTA_ORDEN>
                    <ID_ORDEN_PAGO>$idOrdenPago</ID_ORDEN_PAGO>
                    <ID_PERSONA>$carnet</ID_PERSONA>
                </CONSULTA_ORDEN>";
        $cliente = new nusoap_client(self::WSERVICE, 'wsdl');
        $error  = $cliente->getError();

        if ($error){
            return [
                    'cancelada' => false,
                    'descripcion' => $error
                ];
        }

        $response = $cliente->call('consultaOrdenPago', array('pxml'=>$xml));

        if ($cliente->fault) {
            //'Error de comunicación con SIIF, porfavor intentelo de nuevo más tarde';
            return [
                    'cancelada' => false,
                    'descripción' => $response
                ];
        }

        $error = $cliente->getError();
        if ($error) {
            return [
                    'cancelada' => false,
                    'descripcion' => $error
                ]; //error
        }

        //la boleta fue pagada?
        $resultado = Utilidades::xml2array($response['result']);
        if($resultado['RESPUESTA']['CODIGO_RESP']['value'] == 1){
            $boleta = [
                'cancelada' => true,
                'banco' => $resultado['RESPUESTA']['BANCO']['value'],
                'noBoletaDeposito' => $resultado['RESPUESTA']['NO_BOLETA_DEPOSITO']['value'],
                'noTransferenciaBancaria' => $resultado['RESPUESTA']['NO_TRAN_BANCO']['value'],
                'fechaCertificadoBanco' => $resultado['RESPUESTA']['FECHA_CERTIF_BANCO']['value'],
                'estado' => 2 //estado de pagado
            ];
            return $boleta; //pagado
        }

        return [
                'cancelada' => false,
                'descripcion' => $resultado['RESPUESTA']['DESCRIPCION']['value']
            ];
    }

    /**
     * Crea una boleta de matricula para aspirantes universitarios, esta boleta es creada con su N.O.V.
     * El método valida que no tenga boletas vigentes y almacena las boletas generadas en la tabla ping_boleta
     * @param $nov int Número de Orientación Vocacional para identificar al estudiante
     * @param $nombreCompleto string Nombre completo del estudiante
     * @return mixed|null retorna un stream con la boleta o null si existe algun problema
     */
    public static function generarBoletaPrimerIngreso($nov, $nombreCompleto, $nacionalidad){

        $datos = InscripcionPrimerIngreso::find($nov);

        //Reviso si el usuario tiene boletas vigentes
        $boleta = PingBoleta::getBoletaVigente($nov, $datos->unidadAcademica, $datos->extension, $datos->carrera);

        if ($boleta){
            return Boletas::descargarBoletaPrimerIngreso($boleta->id_orden_pago, $nov);
        }

        $respuesta = Boletas::crearBoleta(
            $datos->nov,
            $datos->unidadAcademica,
            $datos->extension,
            $datos->carrera,
            $nombreCompleto,
            101, //todo preguntar de donde sale
            11, //Primer ingreso
            1, //Estudiante regular
            $nacionalidad
        );
        if (is_string($respuesta)){
            return HomeController::mensajeError($respuesta);
        }
        if ($respuesta){
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

            return Boletas::descargarBoletaPrimerIngreso($respuesta['idOrdenPago'], $nov);
        }
        return null; //super error donde murio y valio la vida
    }

    public static function generarBoletaPrimerIngresoExtranjeros(int $nov, string $nombreCompleto, int $noMensualidades, float $monto, int $matricula){
        $datos = InscripcionPrimerIngreso::find($nov);

        $boleta = BoletasExtranjero::getBoletaVigente($nov, $datos->unidadAcademica, $datos->extension, $datos->carrera);

        if ($boleta){
            return Boletas::descargarBoletaPrimerIngreso($boleta->id_orden_pago, $nov);
        }

        $respuesta = Boletas::crearBoleta(
            $datos->nov,
            $datos->unidadAcademica,
            $datos->extension,
            $datos->carrera,
            $nombreCompleto,
            $monto,
            11, //todo preguntar de donde sale
            1 //todo preguntar de donde sale
        );
        if (is_string($respuesta)){
            return HomeController::mensajeError($respuesta);
        }
        if ($respuesta){
            $boleta = BoletasExtranjero::firstOrNew(['id' => $respuesta['idOrdenPago']]);
            $boleta->id = $respuesta['idOrdenPago'];
            $boleta->noMensualidades = $noMensualidades;
            $boleta->monto = $respuesta['monto'];
            $boleta->cheksum = $respuesta['checksum'];
            $boleta->rubroPago = $respuesta['rubroPago'];
            $boleta->fechaGeneracion = $respuesta['fechaGeneracion'];
            $boleta->fechaVencimiento = $respuesta['fechaVencimiento'];
            $boleta->estado = $respuesta['estado'];
            $boleta->matricula = $matricula;
            $boleta->save();

            return Boletas::descargarBoletaPrimerIngresoExtranjeros($respuesta['idOrdenPago'], $nov);
        }
        return null; //super error donde murio y valio la vida
    }

    //todo ver que si sirva
    public static function generarBoletaReingreso($carnet, $unidadAcademica , $extension, $carrera, $nombre, $semestre, $categorias, $nacionalidad, $ciclo = null){
        
        if($ciclo == null){
            $boleta = BoletasReingreso::getBoletaVigente($carnet, $unidadAcademica, $extension, $carrera);
        }else{
            $boleta = BoletasReingreso::getBoletaVigenteCiclo($carnet, $unidadAcademica, $extension, $carrera, $ciclo);
        }

        $monto = 0;
        $rubro =  1;

        $variante = 1;// estudiante regular

        switch($categorias){
            case 1:
            case 2: {
                $rubro = $semestre == 1? 1 : 12;
                $monto = $semestre == 1? 91 : 61;
                break;
            }
            case 5:
            case 3:{
                $rubro = 19;
                $monto = $nacionalidad == 30? 1031 : 2031;
                break;
            }
            case 4: {
                $rubro = 47;
                $monto = $nacionalidad == 30? 1031 : 2031;
                break;
            }
            case 10:{
                $rubro = 161;
                $monto = $nacionalidad == 30? 1031 : 2031;
                break;
            }
        }

        if ($boleta){
            return $boleta;
        }

        //todo crear boleta
        $boletaSiif = Boletas::crearBoleta(
            $carnet,
            $unidadAcademica,
            $extension,
            $carrera,
            $nombre,
            $monto, //todo preguntar de donde sale monto
            $rubro, //todo preguntar de donde sale rubro
            $variante,
            $nacionalidad,
            $ciclo
        );

        //que pasa
        if ($boletaSiif){
            BoletasReingreso::create($boletaSiif);
            $registro = BoletasReingreso::find($boletaSiif["idOrdenPago"]);
            return $registro;
        }

        return null;
    }

    public static function generarBoletaReingresoExtranjeros(int $carnet, string $nombreCompleto, int $noMensualidades, float $monto, int $idMatricula){
        $matricula = MatriculaExtranjero::find($idMatricula);

        $boleta = BoletasExtranjero::getBoletaVigente($carnet, $matricula->unidadAcademica, $matricula->extension, $matricula->carrera);

        if ($boleta){
            return Boletas::descargarBoletaReingreso($boleta->id_orden_pago, $carnet);
        }

        $respuesta = Boletas::crearBoleta(
            $matricula->carnet,
            $matricula->unidadAcademica,
            $matricula->extension,
            $matricula->carrera,
            $nombreCompleto,
            $monto,
            11, //todo preguntar de donde sale
            1 //todo preguntar de donde sale
        );
        if (is_string($respuesta)){
            return HomeController::mensajeError($respuesta);
        }
        if ($respuesta){
            $boleta = BoletasExtranjero::firstOrNew(['id' => $respuesta['idOrdenPago']]);
            $boleta->id = $respuesta['idOrdenPago'];
            $boleta->noMensualidades = $noMensualidades;
            $boleta->monto = $respuesta['monto'];
            $boleta->cheksum = $respuesta['checksum'];
            $boleta->rubroPago = $respuesta['rubroPago'];
            $boleta->fechaGeneracion = $respuesta['fechaGeneracion'];
            $boleta->fechaVencimiento = $respuesta['fechaVencimiento'];
            $boleta->estado = $respuesta['estado'];
            $boleta->matricula = $idMatricula;
            $boleta->save();

            return Boletas::descargarBoletaReingresoExtranjeros($respuesta['idOrdenPago'], $carnet);
        }
        return null; //super error donde murio y valio la vida
    }

    /**
     * Permite descargar una boleta de pago especial para aspirantes
     * @param $idOrdenPago int
     * @param $nov int
     * @return mixed stream con el PDF, se retorna como una vista
     */
    public static function descargarBoletaPrimerIngreso($idOrdenPago, $nov){
        //Datos del estudiante
        $datos = InformacionAspirante::find($nov);
        $nombreCompleto = $datos->getNombreCompleto();
        $CUI = $datos->numero_registro;
        $registro = $nov;
        $tipoRegistro = 'N.O.V.';

        //Datos de la boleta
        $boleta = PingBoleta::find($idOrdenPago);
        $monto = $boleta->monto;
        $rubro = $boleta->rubro_pago;
        $checksum = $boleta->checksum;
        $fechaGeneracion = $boleta->fecha_generacion;
        $fechaVencimiento = date("d/m/Y", strtotime('+7 days', strtotime($fechaGeneracion)));

        //Datos Carrera
        $unidadAcademica = Facultad::find($boleta->ua)->nomfac;
        $idUnidadAcademica = $boleta->ua;
        $extension = Extension::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext]
        ])->first()->nombre;
        $idExtension = $boleta->ext;
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext],
            ['codigo_carrera', '=', $boleta->car]
        ])->first()->nombre_carrera;
        $idCarrera = $boleta->car;

        return PDF::loadView('common.include.boletaPago',
            compact('nombreCompleto',
                'CUI',
                'registro',
                'tipoRegistro',
                'idOrdenPago',
                'monto',
                'rubro',
                'checksum',
                'fechaGeneracion',
                'fechaVencimiento',
                'unidadAcademica',
                'idUnidadAcademica',
                'extension',
                'idExtension',
                'carrera',
                'idCarrera'
            )
        )->stream('Boleta.pdf');
    }

    public static function descargarBoletaPrimerIngresoExtranjeros(int $idOrdenPago, int $nov){
        //Datos del estudiante
        $datos = InformacionAspirante::find($nov);
        $nombreCompleto = $datos->getNombreCompleto();
        $CUI = $datos->numero_registro;
        $registro = $nov;
        $tipoRegistro = 'N.O.V.';

        //Datos de la boleta
        $boleta = BoletasExtranjero::find($idOrdenPago);
        $monto = $boleta->monto;
        $rubro = $boleta->rubroPago;
        $checksum = $boleta->checksum;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $fechaVencimiento = $boleta->fechaVencimiento;

        //Datos Carrera
        $unidadAcademica = Facultad::find($boleta->ua)->nomfac;
        $idUnidadAcademica = $boleta->ua;
        $extension = Extension::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext]
        ])->first()->nombre;
        $idExtension = $boleta->ext;
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext],
            ['codigo_carrera', '=', $boleta->car]
        ])->first()->nombre_carrera;
        $idCarrera = $boleta->car;

        return PDF::loadView('common.include.boletaPago',
            compact('nombreCompleto',
                'CUI',
                'registro',
                'tipoRegistro',
                'idOrdenPago',
                'monto',
                'rubro',
                'checksum',
                'fechaGeneracion',
                'fechaVencimiento',
                'unidadAcademica',
                'idUnidadAcademica',
                'extension',
                'idExtension',
                'carrera',
                'idCarrera'
            )
        )->stream('Boleta.pdf');
    }

    /**
     * Permite descargar una boleta de pago especial para estudiantes
     * @param $idOrdenPago int
     * @param $carnet int
     * @return mixed stream con el PDF, se retorna como una vista
     */
    public static function descargarBoletaReingreso($idOrdenPago, $carnet){
        //Datos del estudiante
        $datos = EstudiaOld::find($carnet);
        $nombreCompleto = $datos->getNombreCompleto();
        $CUI = $datos->cui;
        $registro = $carnet;
        $tipoRegistro = 'Carnet';

        //Datos de la boleta
        $boleta = BoletasReingreso::find($idOrdenPago);
        $monto = $boleta->monto;
        $rubro = $boleta->rubroPago;
        $checksum = $boleta->checksum;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $fechaVencimiento = date("d/m/Y", strtotime('+7 days', strtotime($fechaGeneracion)));

        //Datos Carrera
        $unidadAcademica = Facultad::find($boleta->ua)->nomfac;
        $idUnidadAcademica = $boleta->ua;
        $extension = Extension::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext]
        ])->first()->nombre;
        $idExtension = $boleta->ext;
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext],
            ['codigo_carrera', '=', $boleta->car]
        ])->first()->nombre_carrera;
        $idCarrera = $boleta->car;
        
        
        return view('common.include.boletaPago',
        compact('nombreCompleto',
            'CUI',
            'registro',
            'tipoRegistro',
            'idOrdenPago',
            'monto',
            'rubro',
            'checksum',
            'fechaGeneracion',
            'fechaVencimiento',
            'unidadAcademica',
            'idUnidadAcademica',
            'extension',
            'idExtension',
            'carrera',
            'idCarrera'
        ));

       
    }

    public static function descargarBoletaReingresoExtranjeros(int $idOrdenPago, int $carnet){
        //Datos del estudiante
        $datos = EstudiaOld::find($carnet);
        $nombreCompleto = $datos->getNombreCompleto();
        $CUI = $datos->numero_registro;
        $registro = $carnet;
        $tipoRegistro = 'Carnet';

        //Datos de la boleta
        $boleta = BoletasExtranjero::find($idOrdenPago);
        $monto = $boleta->monto;
        $rubro = $boleta->rubroPago;
        $checksum = $boleta->checksum;
        $fechaGeneracion = $boleta->fechaGeneracion;
        $fechaVencimiento = $boleta->fechaVencimiento;

        //Datos Carrera
        $unidadAcademica = Facultad::find($boleta->ua)->nomfac;
        $idUnidadAcademica = $boleta->ua;
        $extension = Extension::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext]
        ])->first()->nombre;
        $idExtension = $boleta->ext;
        $carrera = CarreraTemporal::where([
            ['codigo_unidad_academica', '=', $boleta->ua],
            ['codigo_extension', '=', $boleta->ext],
            ['codigo_carrera', '=', $boleta->car]
        ])->first()->nombre_carrera;
        $idCarrera = $boleta->car;

        return view('common.include.boletaPago',
        compact('nombreCompleto',
            'CUI',
            'registro',
            'tipoRegistro',
            'idOrdenPago',
            'monto',
            'rubro',
            'checksum',
            'fechaGeneracion',
            'fechaVencimiento',
            'unidadAcademica',
            'idUnidadAcademica',
            'extension',
            'idExtension',
            'carrera',
            'idCarrera'
        ));

       
    }

    public static function validarBoletaPrimerIngreso(int $idOrdenPago, int $nov){
        $boleta = PingBoleta::find($idOrdenPago);
        if (is_null($boleta->fecha_certificado_banco)){
            $boletaPagada = self::validarBoleta($idOrdenPago, $nov);

            if (is_string($boletaPagada)){
                return $boletaPagada; //existe un error
            }

            //Actualizo la boleta
            $boleta->banco = $boletaPagada['banco'];
            $boleta->no_boleta_deposito = $boletaPagada['noBoletaDeposito'];
            $boleta->no_transferencia_bancaria = $boletaPagada['noTransferenciaBancaria'];
            $boleta->fecha_certificado_banco = $boletaPagada['fechaCertificadoBanco'];
            $boleta->estado = $boletaPagada['estado'];
            $boleta->save();
        }
        return true;
    }

    public static function validarBoletaReingreso(int $idOrdenPago, int $carnet){
        $boleta = BoletasReingreso::find($idOrdenPago);

        if (is_null($boleta->fechaCertificadoBanco)){
            $boletaPagada = self::validarBoleta($idOrdenPago, $carnet);

            if (is_string($boletaPagada)){
                return $boletaPagada;
            }

            $boleta->banco = $boletaPagada['banco'];
            $boleta->noBoletaDeposito = $boletaPagada['noBoletaDeposito'];
            $boleta->noTransferenciaBancaria = $boletaPagada['noTransferenciaBancaria'];
            $boleta->fechaCertificadoBanco = $boletaPagada['fechaCertificadoBanco'];
            $boleta->estado = $boletaPagada['estado'];
            $boleta->save();
        }
        return true;
    }
}
