<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Rap2hpoutre\FastExcel\FastExcel;
ini_set('max_execution_time',1200);
ini_set('memory_limit', '1024M');

class graduadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectEstadistica');
    }
    
    protected $redirectTo = '/administrativo/login';

    public function Graduadosindex(){
        $title = 'Estadistica';
        $errorTamanio="";
        return view('administrativo.estadistica.graduados',compact('errorTamanio'));
    }

    
    public function ReporteGraduados(Request $req){ 

        $listaHeaders=[];
        function Seleccionados(Request $request){
   
           if($request->input('carnet')=="on"){
               $listaCampos[]="eo.carnet as 'Carnet'";
           }
           if($request->input('cOrientacion')=="on"){
   
               $listaCampos[]="eo.cod_orien as 'Código de Orientación'";
           }
           if($request->input('completo')=="on"){
   
               $listaCampos[]="TRIM(CONCAT_WS(' ', LTRIM(RTRIM(eo.primer_apellido)),LTRIM(RTRIM(eo.segundo_apellido)),LTRIM(RTRIM(eo.nombre1)),LTRIM(RTRIM(eo.nombre2)),LTRIM(RTRIM(eo.nombre)))) as 'Nombre Completo'";
           }
           if($request->input('apellidos')=="on"){
   
               $listaCampos[]="TRIM(CONCAT_WS(' ', LTRIM(RTRIM(eo.primer_apellido)),LTRIM(RTRIM(eo.segundo_apellido)))) as 'Apellidos'";
           }
           if($request->input('nombres')=="on"){
   
               $listaCampos[]="TRIM(CONCAT_WS(' ', LTRIM(RTRIM(eo.nombre1)),LTRIM(RTRIM(eo.nombre2)))) as 'Nombres'";
   
           }
           if($request->input('celular')=="on"){

               $listaCampos[]="eo.celular as 'Celular'";
   
           }
           if($request->input('fnacimiento')=="on"){
   
               $listaCampos[]="DATE_FORMAT(eo.fec_nac,'%d-%m-%Y') as 'Fecha de Nacimiento'";
           }
           if($request->input('cui')=="on"){
   
               $listaCampos[]="eo.cui as 'CUI'";
           }
           if($request->input('email')=="on"){
   
               $listaCampos[]="eo.email as 'Email'";
           }
           if($request->input('codigoUA')=="on"){
   
               $listaCampos[]="f.codfac as 'Código de Unidad Académica'";
           }
           if($request->input('unidadA')=="on"){
   
               $listaCampos[]="f.nomfac as 'Unidad Académica'";
           }
           if($request->input('codigoExt')=="on"){
   
               $listaCampos[]="e.codigo_extension as 'Código de Extensión'";
           }    
           if($request->input('extension')=="on"){
   
               $listaCampos[]="e.nombre as 'Extensión'";
           }
           if($request->input('codigoCarrera')=="on"){
   
               $listaCampos[]="ct.codigo_carrera as 'Código de Carrera'";
           }
           if($request->input('carrera')=="on"){
   
               $listaCampos[]="ct.nombre_carrera as 'Carrera'";
           }
           if($request->input('nivelAc')=="on"){
   
               $listaCampos[]="(select na.nombre from nivel_academico na where na.codigo_nivel_academico=ct.codigo_nivel) as 'Nivel Académico'";
           }
           
           if($request->input('sexo')=="on"){
   
               $listaCampos[]="(select na.nombre from nivel_academico na where na.codigo_nivel_academico=ct.codigo_nivel) as 'NIVEL ACADEMICO',CASE when eo.sexo = 1 then 'Masculino' when eo.sexo= 2 then 'Femenino' END as 'Sexo'";
           }
           if($request->input('estadoCivil')=="on"){
   
               $listaCampos[]="CASE when eo.est_civ =0 then 'Soltero/a' when eo.est_civ = 1 then 'Casado/a' when eo.est_civ = 2 then 'Union de hecho' when eo.est_civ = 3 then 'Separado/a' when eo.est_civ = 4 then 'Divorciado/a' when eo.est_civ = 5 then 'Viudo/a' END as 'Estado Civil'";

           }
           if($request->input('direccion')=="on"){
   
               $listaCampos[]="eo.direccion as 'Dirección'";
   
           }
           if($request->input('codigoPostal')=="on"){
   
               $listaCampos[]="eo.cod_postal as 'Código Postal'";
   
           }
           if($request->input('nombrePostal')=="on"){
   
               $listaCampos[]="(select p.pais from postal p where p.cod_postal= eo.cod_postal and p.cod_depto=eo.codigo_departamento_recide and p.cod_muni= eo.codigo_municipio_recide LIMIT 1) as 'Postal'";
   
           }
           if($request->input('situacionAc')=="on"){
   
               $listaCampos[]="CASE when ce.sit_acad = 0 then 'Regular' when ce.sit_acad = 1 then 'Incorporación' when ce.sit_acad =2 then 'PEG' when ce.sit_acad =3 then 'Graduado' END as 'Situación Académica'";
           }
   
           if($request->input('etnia')=="on"){
   
               $listaCampos[]="(select e2.etnia from etnia e2 where e2.id= eo.etnia) as 'Etnia'";  
           }
           if($request->input('idioma')=="on"){
   
               $listaCampos[]="(select id.idioma from idioma id where id.cod_idioma= eo.idioma) as 'Idioma'";
           }
           if($request->input('idiomados')=="on"){
   
               $listaCampos[]="(select id.idioma from idioma id where id.cod_idioma= eo.otroIdioma) as 'Idioma 2'";  
           }
   
           if($request->input('codigoNac')=="on"){   
               $listaCampos[]="(select e2.etnia from etnia e2 where e2.id= eo.etnia) as 'Etnia',(select id.idioma from idioma id where id.cod_idioma= eo.idioma) as 'Idioma',(select id.idioma from idioma id where id.cod_idioma= eo.otroIdioma) as 'Idioma',n.codigo_nacionalidad as 'Código de Nacionalidad'";
           }
           if($request->input('nacionalidad')=="on"){
   
               $listaCampos[]="n.nombre as 'Nacionalidad'";           
           }
           if($request->input('codigoDepR')=="on"){
   
               $listaCampos[]="eo.codigo_departamento_recide as 'Código Departamento Reside'";
               
           }
           if($request->input('departamentoR')=="on"){
   
               $listaCampos[]="(select d.nombre from departamento d where d.codigo = eo.codigo_departamento_recide) as 'Departamento Reside'";
           }
   
           if($request->input('codigoPaisNac')=="on"){
               $listaCampos[]="eo.codigo_pais_nacimiento as 'Código de Pais'";
           }
           if($request->input('paisNac')=="on"){
   
               $listaCampos[]="(select p2.nombre from pais p2 where p2.codigo= eo.codigo_pais_nacimiento) as 'País de Nacimiento'";
           }
           
           if($request->input('codigoDepNac')=="on"){
   
               $listaCampos[]="eo.codigo_departamento_nacimiento as 'Código de Departamento Nacimiento'";
               
           }
           if($request->input('departamentoNac')=="on"){
   
               $listaCampos[]="(select d2.nombre from departamento d2 where d2.codigo= eo.codigo_departamento_nacimiento) as 'Departamento Nacimiento'";
               
           }
           if($request->input('codigoMunNac')=="on"){
   
               $listaCampos[]="eo.codigo_municipio_nacimiento as 'Código Municipio de Nacimiento'";               
           }
           if($request->input('municipioNac')=="on"){
   
               $listaCampos[]="(select m2.municipio from municipio m2 where m2.cod_depto= eo.codigo_departamento_nacimiento and m2.cod_muni= eo.codigo_municipio_nacimiento) as 'Municipio de Nacimiento'";
               
           }
           if($request->input('codigoMunR')=="on"){
   
               $listaCampos[]="eo.codigo_municipio_recide as 'Código Municipio Recide'";    
           }
           if($request->input('municipioR')=="on"){
   
               $listaCampos[]="(select m.municipio from municipio m where m.cod_muni= eo.codigo_municipio_recide and m.cod_depto= eo.codigo_departamento_recide) as 'Municipio Recide'";
           }
   
           if($request->input('edad')=="on"){
   
               $listaCampos[]="Timestampdiff(YEAR,eo.fec_nac,NOW()) as 'Edad'";
           }
   
           if($request->input('codigoDepDiv')=="on"){
               $listaCampos[]="eo.codigo_departamento_establecimiento as 'Código Departamento de Establecimiento Diversificado'";
           }
   
           if($request->input('departamentoDiv')=="on"){
               $listaCampos[]="(select d3.nombre from departamento d3 where d3.codigo= eo.codigo_departamento_establecimiento) as 'Departamento Establecimiento Diversificado'";
           }
           if($request->input('fechaIni')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fecha_entrada,'%d-%m-%Y') as 'Fecha Inicio de Carrera'";
           }
           if($request->input('fechaCierre')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fec_cierre,'%d-%m-%Y') as 'Fecha de Cierre'";
               
           }
           if($request->input('fechaGraduacion')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fec_gradua,'%d-%m-%Y') as 'Fecha de Graduación'";
           }
           if($request->input('tituloDiv')=="on"){
   
               $listaCampos[]="CONCAT((select ttd.nombre from tipo_titulo_diversificado ttd, titulo_diversificado td where td.codigo_titulo_diversificado =eo.codigo_titulo_diversificado and td.codigo_tipo_titulo_diversificado= ttd.codigo_tipo_titulo_diversificado),' ', (select td.nombre from titulo_diversificado td where td.codigo_titulo_diversificado =eo.codigo_titulo_diversificado)) as 'Título Diversificado'";
               
           }
           if($request->input('tipoDiv')=="on"){
   
               $listaCampos[]="(select te.nombre from tipo_establecimiento te where te.codigo_tipo_establecimiento=eo.codigo_tipo_establecimiento) as 'Tipo Establecimiento Diversificado'";
           }
   
   
   
               $sqlQuery="";
               for ($i=0; $i<count($listaCampos); $i++){
                   
   
                   if($i!=count($listaCampos)-1){
                       $sqlQuery .= $listaCampos[$i] . " , ";    
                   }else{
                       $sqlQuery .= $listaCampos[$i]. " ";
                   }        
               }
   
               $sqlQuery .= "from carrera_estudiante ce, estudia_old eo, facultad f, extension e, ";
               $sqlQuery .= "carrera_temporal ct, nacionalidad n "; 
               $sqlQuery .= "where f.codfac = ce.codfac and eo.carnet =ce.carnet and "; 
               $sqlQuery .= "e.codigo_unidad_academica = f.codfac and ce.codext = e.codigo_extension and ";
               $sqlQuery .= "ct.codigo_unidad_academica = ce.codfac and ct.codigo_extension = ce.codext and ct.codigo_carrera = ce.codcar and ";
              // $sqlQuery .= "n.codigo_nacionalidad = eo.cod_nac and ce.sit_acad =3 and ce.fec_gradua >='". $request->input('fechaInicio') . "' and ce.fec_gradua <= '" . $request->input('fechaFin') ."' ";
               $sqlQuery .= "n.codigo_nacionalidad = eo.cod_nac and ce.sit_acad =3 and ce.fec_gradua BETWEEN '". $request->input('fechaInicio') . "' and '" . $request->input('fechaFin') ."' ";
               if(count($listaCampos)<=0){
                   return "errorTamanio";
               }
   
   
               return $sqlQuery;
       }
        
       function Resultados(Request $req){
            $consulta='Select ';
            $traidos =  Seleccionados($req);
            if($traidos=="errorTamanio"){
                return Redirect::back()->withErrors(['msg' => 'Debe elegir al menos 1 campo']);
            }
            $consulta .=$traidos;
            $resultados = DB::cursor($consulta);
            foreach ($resultados as $result) {
                yield $result;
            }
        }
        $nuevosResultados=Resultados($req);
    
        return (new FastExcel($nuevosResultados))->download('ReporteGraduados.xlsx');
        
    }

}
