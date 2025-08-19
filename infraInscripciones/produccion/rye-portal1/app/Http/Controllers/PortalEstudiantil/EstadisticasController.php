<?php

namespace App\Http\Controllers\PortalEstudiantil;
use App\Funciones\Contadores;
use App\Http\Controllers\Controller;

class EstadisticasController extends Controller
{
    /**
     * Return contadores
     *
     * @return response()
     */
    public static function getContadores()
    {
        $ltoken = Contadores::getToken();
    
        $ldata = Contadores::getDataContadores($ltoken);

        return $ldata;
    }
}
?>
