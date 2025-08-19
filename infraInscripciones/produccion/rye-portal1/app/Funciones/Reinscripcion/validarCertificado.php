<?php
use Illuminate\Support\Facades\DB;

function validarCertificado($carnet){
        $carnet_min = date('Y') . '00000';
        $carnet_max = date('Y') . '89999';
        if(!($carnet >= $carnet_min && $carnet <= $carnet_max)){
            return 0;
        }

        $certificado_pendiente = DB::select(DB::raw(
            "SELECT COUNT(1) as certificado
                FROM documentos_estudiante de,
	            estudia_old eo,
	            carnet_nvo cn, ciclo_activo ca 
             WHERE de.carnet_universitario = eo.carnet 
	            AND eo.annioi = ca.ciclo_activo 
	            AND cn.nov = eo.cod_orien 
	            AND cn.usuario LIKE 'pingenlinea%'
	            AND de.partida_nacimiento = 0
                AND eo.carnet = ". $carnet
        ))[0]->certificado;

        return $certificado_pendiente;

    }