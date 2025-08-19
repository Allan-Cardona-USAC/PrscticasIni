<?php


namespace App\Funciones;


use App\Models\EstudiaOld;
use App\Models\InformacionAspirante;
use Exception;
use Illuminate\Support\Facades\Storage;

class Expediente
{
    /**
     * Area de constantes
     */
    const procesoInscripcion = 'Inscripción';
    const fotografia = 'Fotografia.jpg';
    const certificadoNacimiento = 'Certificado_Nacimiento.pdf';
    const tituloDiversificado = 'Titulo_Diversificado.pdf';
    const cierrePensumDiversificado = 'Cierre_Pensum_Diversificado.pdf';
    const pasaporte = 'Pasaporte.pdf';
    const certificadoNacimientoApostillado = 'Certificado_Nacimiento.pdf'; //todo
    const resolucion = 'Resolucion_Mineduc.pdf';

    /**
     * Encriptado ULTRA SECRETO Y ULTRA SEGURO
     * @param string $cui Nacionales = CUI | Extranjeros = ?
     * @return string
     */
    private static function encriptado(string $cui){
        return md5('USAC Grande entre las del mundo,' . $cui . ',343');
    }

    /**
     * Obtiene el nombre de la carpeta del expediente mediante el NOV
     * @param int $nov
     * @return string nombre de la carpeta de su expediente
     */
    private static function encriptadoAspirante(int $nov){
        $aspirante = InformacionAspirante::find($nov);
        if ($aspirante->esExtranjero()){
            return self::encriptado($aspirante->numero_pasaporte);
        }
        return self::encriptado($aspirante->numero_registro);
    }

    /**
     * Obtiene el nombre de la carpeta del expediente mediante el carnet
     * @param int $carnet
     * @return string nombre de la carpeta de su expediente
     */
    private static function encriptadoEstudiante(int $carnet){
        $estudiante = EstudiaOld::find($carnet);
        if ($estudiante->esExtranjero){
            return self::encriptado($estudiante->numero_pasaporte);
        }
        return self::encriptado($estudiante->numero_registro);
    }

    /**
     * Crea un expediente para un aspirante
     * @param int $nov
     */
    public static function crear(int $nov){
        $nombre = self::encriptadoAspirante($nov);
        if(!Storage::disk('expediente')->exists($nombre)){
            Storage::disk('expediente')->makeDirectory($nombre);
        }
        if(!Storage::disk('expediente')->exists($nombre . '/' . self::procesoInscripcion)){
            Storage::disk('expediente')->makeDirectory($nombre . '/' . self::procesoInscripcion);
        }
    }

    /**
     * Recupera el archivo indicado de un expediente
     * @param string $ruta
     * @return string
     */
    private static function getArchivo(string $ruta){
        try{
            return Storage::disk('expediente')->get($ruta);
        }catch (Exception $exception){
            return null;
        }
    }

    private static function getPath(string $ruta){
        try{
            return Storage::disk('expediente')->path($ruta);
        }catch (Exception $exception){
            return '';
        }
    }

    /**
     * Almacena cualquier archivo en el expediente del estudiante
     * @param string $ruta Debe contener la ruta, nombre y expension del archivo 'Carpeta/archivo.extension'
     * @param string $archivo
     * @return bool True = se almaceno | False = Error
     */
    private static function setArchivo(string $ruta, string $archivo){
        try{
            Storage::disk('expediente')->put($ruta, $archivo);
            return true;
        }catch (Exception $exception){
            return false;
        }
    }

    /**
     * Busca un archivo en la carpeta del proceso de inscripcion utilizando el numero de carnet del estudiante
     * @param int $carnet
     * @param string $nombre nombre del archivo a buscar
     * @return string Archivo
     */
    private static function getFromInscripcionCarnet(int $carnet, string $nombre){
        return self::getArchivo(self::encriptadoEstudiante($carnet) . '/' . self::procesoInscripcion .'/' . $nombre);
    }

    /**
     * Busca un archivo en la carpeta del proceso de inscripcion utilizando el numero de orientacion vocacional del estudiante
     * @param int $nov
     * @param string $nombre nombre del archivo a buscar
     * @return string Archivo
     */
    private static function getFromInscripcionNov(int $nov, string $nombre){
        return self::getArchivo(self::encriptadoAspirante($nov) . '/' . self::procesoInscripcion .'/' . $nombre);
    }

    /**
     * Almacena un archivo en el proceso de inscripcion del aspirante
     * @param int $nov
     * @param string $nombreArchivo Nombre del archivo con su extension
     * @param string $archivo
     * @return bool True = se almaceno | False = Error
     */
    private static function setToInscripcion(int $nov, string $nombreArchivo, string $archivo){
        return self::setArchivo(self::encriptadoAspirante($nov) . '/' . self::procesoInscripcion .'/' . $nombreArchivo, $archivo);
    }

    /**
     * Obtiene la fotografia del estudiante
     * @param int $nov
     * @return string Archivo.jpg
     */
    public static function getFotoNov(int $nov){
        return self::getArchivo(self::encriptadoAspirante($nov) . '/' . self::fotografia);
    }

    /**
     * Obtiene la fotografia del estudiante
     * @param int $carnet
     * @return string Archivo.jpg
     */
    public static function getFotoCarnet(int $carnet){
        return self::getArchivo(self::encriptadoEstudiante($carnet) . '/' . self::fotografia);
    }

    /**
     * Guarda la nueva fotografia del estudiante
     * @param int $nov
     * @param string $foto
     */
    public static function setFotoNov(int $nov, string $foto){
        Storage::disk('expediente')->put(self::encriptadoAspirante($nov) . '/' . self::fotografia, $foto);
    }

    /**
     * Guarda la nueva fotografia del estudiante
     * @param string $carnet
     * @param string $foto
     */
    public static function setFotoCarnet(string $carnet, string $foto){
        Storage::disk('expediente')->put(self::encriptadoEstudiante($carnet) . '/' . self::fotografia, $foto);
    }

    public static function getPathCertificacionNacimiento(int $nov){
        return self::getPath(self::encriptadoAspirante($nov) . '/' . self::certificadoNacimiento);
    }

    /**
     * Obtiene el certificado de nacimiento de RENAP
     * @param int $nov
     * @return string Archivo.pdf
     */
    public static function getCertificacionNacimiento(int $nov){
        return self::getArchivo(self::encriptadoAspirante($nov) . '/' . self::certificadoNacimiento);
    }

    public static function setCertificacionNacimiento(int $nov, string $certificado){
        Storage::disk('expediente')->put(self::encriptadoAspirante($nov) . '/' . self::certificadoNacimiento, $certificado);
    }

    /**
     * Obtiene el Titulo de Diversificado subido durante el proceso de inscripcion
     * @param int $nov
     * @return string Archivo.pdf
     */
    public static function getTituloDiversificado(int $nov){
        return self::getFromInscripcionNov($nov, self::tituloDiversificado);
    }

    /**
     * Almacena el Titulo de diversificado en el expediente del aspirante
     * @param int $nov
     * @param string $archivo TituloDiversificado.pdf
     * @return bool True = se almaceno | False = Error
     */
    public static function setTituloDiversificado(int $nov, string $archivo){
        return self::setToInscripcion($nov, self::tituloDiversificado, $archivo);
    }

    /**
     * Obtiene el Cierre de Pensum de diversificado subido durante el proceso de inscripcion
     * @param int $nov
     * @return string Archivo.pdf
     */
    public static function getCierrePensumDiversificado(int $nov){
        return self::getFromInscripcionNov($nov, self::cierrePensumDiversificado);
    }

    /**
     * Almacena el cierre de pensum de diversificado en el expediente del aspirante
     * @param int $nov
     * @param string $archivo CierrePensumDiversificado.pdf
     * @return bool True = se almaceno | False = Error
     */
    public static function setCierrePensumDiversificado(int $nov, string $archivo){
        return self::setToInscripcion($nov, self::cierrePensumDiversificado, $archivo);
    }

    /**
     * Obtiene el pasaporte autenticado por un notario guatemalteco subido durante el proceso de inscripcion
     * @param int $nov
     * @return string Archivo.pdf
     */
    public static function getPasaporte(int $nov){
        return self::getFromInscripcionNov($nov ,self::pasaporte);
    }

    /**
     * Almacena una version escaneada del pasaporte autenticado por un notario guatemalteco en el expediente del aspirante
     * @param int $nov
     * @param string $archivo Pasaporte.pdf
     * @return bool True = se almaceno | False = Error
     */
    public static function setPasaporte(int $nov, string $archivo){
        return self::setToInscripcion($nov, self::pasaporte, $archivo);
    }

    /**
     * Obtiene el certificado de nacimiento apostillado por la embajada correspondiente
     * @param int $nov
     * @return string Archivo.pdf
     */
    public static function getCertificacionNacimientoExtranjeroNov(int $nov){
        return self::getFromInscripcionNov($nov,  self::certificadoNacimientoApostillado);
    }

    /**
     * Obtiene el certificado de nacimiento apostillado por la embajada correspondiente
     * @param int $carnet
     * @return string Archivo.pdf
     */
    public static function getCertificacionNacimientoExtranjeroCarnet(int $carnet){
        return self::getFromInscripcionCarnet($carnet, self::certificadoNacimientoApostillado);
    }

    /**
     * Almacena el Certificado de nacimiento apostillado por la embajada correspondiente en el expediente del aspirante
     * @param int $nov
     * @param string $archivo CertificadoNacimientoApostillado.pdf
     * @return bool True = se almaceno | False = Error
     */
    public static function setCertificacionNacimientoExtranjero(int $nov, string $archivo){
        return self::setToInscripcion($nov, self::certificadoNacimientoApostillado, $archivo);
    }

    public static function inscripcionFotografia(int $nov, string $fotografia){
        self::setFotoNov($nov, $fotografia);
        self::setToInscripcion($nov, self::fotografia, $fotografia);
    }

    /**
     * Almacena Resolucion del tramite de incorporacion del MINEDUC
     * @param int $nov
     * @param string $archivo Resolucion.pdf
     * @return bool True = se almaceno | False = Error
     */
    public static function setResolucion($nov, string $archivo){
        return self::setToInscripcion($nov, self::resolucion, $archivo);
    }
}
