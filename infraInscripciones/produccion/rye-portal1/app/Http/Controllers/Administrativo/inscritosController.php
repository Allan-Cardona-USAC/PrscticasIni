<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Illuminate\Support\Facades\Redirect;
use Rap2hpoutre\FastExcel\FastExcel;

ini_set('max_execution_time',600);
ini_set('memory_limit', '1024M');

class inscritosController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectEstadistica');
    }
    
    protected $redirectTo = '/administrativo/login';

    public function index(){
        $errorTamanio="";
        return view('administrativo.estadistica.inscritos',compact('errorTamanio'));
    }

    
    
    
    public function ReporteInscritos(Request $req){ 
        
        function Seleccionados(Request $request){

            $listaCampos=[];
            
            if($request->input('carnet')=="on"){
   
               $listaCampos[]="eo.carnet as 'Carnet'";
           }
        
            if($request->input('cOrientacion')=="on")
                $listaCampos[]="eo.cod_orien as 'Código de Orientación'";
   
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


           if($request->input('cua')=="on"){
   
               $listaCampos[]="f.codfac as 'Código Unidad Académica'";
           }
           if($request->input('ua')=="on"){
   
               $listaCampos[]="f.nomfac as 'Unidad Académica'";
           }
   
           if($request->input('ce')=="on"){
   
               $listaCampos[]="e.codigo_extension as 'Código Extensión'";
           }
   
           if($request->input('extension')=="on"){
   
               $listaCampos[]="e.nombre as 'Extensión'";
           }
           if($request->input('cc')=="on"){
   
               $listaCampos[]="ct.codigo_carrera as 'Código Carrera'";
           }
           if($request->input('carrera')=="on"){
   
               $listaCampos[]="ct.nombre_carrera as 'Carrera'";
           }
           if($request->input('na')=="on"){
   
               $listaCampos[]="(select na.nombre from nivel_academico na where na.codigo_nivel_academico=ct.codigo_nivel) as 'Nivel Académico'";
           }
           if($request->input('sexo')=="on"){
   
               $listaCampos[]="CASE when eo.sexo = 1 then 'Masculino' when eo.sexo= 2 then 'Femenino'END as 'Sexo'";
           }

            if($request->input('estadoCivil')=="on")
                $listaCampos[]="CASE when eo.est_civ =0 then 'Soltero/a' when eo.est_civ = 1 then 'Casado/a' when eo.est_civ = 2 then 'Union de hecho' when eo.est_civ = 3 then 'Separado/a' when eo.est_civ = 4 then 'Divorciado/a' when eo.est_civ = 5 then 'Viudo/a' END as 'Estado Civil'";

           if($request->input('direccion')=="on"){
   
               $listaCampos[]="eo.direccion as 'Dirección'";
           }

            if($request->input('codigoPostal')=="on")
                $listaCampos[]="eo.cod_postal as 'Código Postal'";

            if($request->input('nombrePostal')=="on")
                $listaCampos[]="(select p.pais from postal p where p.cod_postal= eo.cod_postal and p.cod_depto=eo.codigo_departamento_recide and p.cod_muni= eo.codigo_municipio_recide LIMIT 1) as 'Postal'";

            if($request->input('codigoMunR')=="on")
                $listaCampos[]="eo.codigo_municipio_recide as 'Código Municipio Recide'";    

            if($request->input('municipioR')=="on")
                $listaCampos[]="(select m.municipio from municipio m where m.cod_muni= eo.codigo_municipio_recide and m.cod_depto= eo.codigo_departamento_recide) as 'Municipio Recide'";

            if($request->input('sa')=="on"){
   
               $listaCampos[]="CASE when ce.sit_acad = 0 then 'Regular' when ce.sit_acad = 1 then 'Incorporación' when ce.sit_acad =2 then 'PEG' when ce.sit_acad =3 then 'Graduado' END as 'Situación Académica'";           }
           if($request->input('etnia')=="on"){
   
               $listaCampos[]="(select e2.etnia from etnia e2 where e2.id= eo.etnia) as 'Etnia'";

           }
           if($request->input('idioma')=="on"){
   
               $listaCampos[]="(select id.idioma from idioma id where id.cod_idioma= eo.idioma) as 'Idioma'";

           }
           if($request->input('idioma_2')=="on"){
   
               $listaCampos[]="(select id.idioma from idioma id where id.cod_idioma= eo.otroIdioma) as 'Idioma 2'";

           }
           if($request->input('cn')=="on"){
   
               $listaCampos[]="n.codigo_nacionalidad as 'Código Nacionalidad'";

           }
           if($request->input('nacionalidad')=="on"){
   
               $listaCampos[]="n.nombre as 'Nacionalidad'";

           }
           if($request->input('cdr')=="on"){
   
               $listaCampos[]="eo.codigo_departamento_recide as 'Código Departamento Reside'";

           }
           if($request->input('dr')=="on"){
   
               $listaCampos[]="(select d.nombre from departamento d where d.codigo = eo.codigo_departamento_recide) as 'Departamento Reside'";

           }

            if($request->input('codigoPaisNac')=="on")
                $listaCampos[]="eo.codigo_pais_nacimiento as 'Código de Pais'";

            if($request->input('paisNac')=="on")
                $listaCampos[]="(select p2.nombre from pais p2 where p2.codigo= eo.codigo_pais_nacimiento) as 'País de Nacimiento'";                    

           if($request->input('cdn')=="on"){
   
               $listaCampos[]="eo.codigo_departamento_nacimiento as 'Código Departamento Nacimiento'";

           }
           if($request->input('dn')=="on"){
   
               $listaCampos[]="(select d2.nombre from departamento d2 where d2.codigo= eo.codigo_departamento_nacimiento) as 'Departamento Nacimiento'";
 
           }

            if($request->input('codigoMunNac')=="on")
                $listaCampos[]="eo.codigo_municipio_nacimiento as 'Código Municipio de Nacimiento'";               
       
            if($request->input('municipioNac')=="on")
                $listaCampos[]="(select m2.municipio from municipio m2 where m2.cod_depto= eo.codigo_departamento_nacimiento and m2.cod_muni= eo.codigo_municipio_nacimiento) as 'Municipio de Nacimiento'";

           if($request->input('edad')=="on"){
   
               $listaCampos[]="Timestampdiff(YEAR,eo.fec_nac,NOW()) as 'Edad'";
            
           }
           if($request->input('cded')=="on"){
   
               $listaCampos[]="eo.codigo_departamento_establecimiento as 'Código Departamento Establecimiento Diversificado'";

           }
           if($request->input('de')=="on"){
   
               $listaCampos[]="(select d3.nombre from departamento d3 where d3.codigo= eo.codigo_departamento_establecimiento) as 'Departamento Establecimiento'";

           }
           if($request->input('fic')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fecha_entrada,'%d-%m-%Y') as 'Fecha Inicio Carrera'";

           }
           if($request->input('fc')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fec_cierre,'%d-%m-%Y') as 'Fecha Cierre'";

           }
           if($request->input('fg')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fec_gradua,'%d-%m-%Y') as 'Fecha Graduación'";
 
           }
           if($request->input('td')=="on"){
   
               $listaCampos[]="(select td.nombre from titulo_diversificado td where td.codigo_titulo_diversificado =eo.codigo_titulo_diversificado) as 'Título Diversificado'";

           }        
           if($request->input('ted')=="on"){
   
               $listaCampos[]="(select te.nombre from tipo_establecimiento te where te.codigo_tipo_establecimiento=eo.codigo_tipo_establecimiento) as 'Tipo Título Diversificado'";

           }

            if($request->input('ciclo_select') == "on"){
                $listaCampos[] = "bi.ciclo as 'Ciclo Inscripción'";
            }

            if($request->input('semestre') == "on"){
                $listaCampos[] = "bi.semestre as 'Semestre'";
            }

           if($request->input('fInscripcion') == "on"){
                $listaCampos[] = "DATE_FORMAT(bi.fecha_inscripcion, '%d-%m-%Y') as 'Fecha de Inscripción'";
           }

           if($request->input('modIn') == "on"){
            $listaCampos[] = "(SELECT CASE WHEN cn.usuario LIKE 'pingenlinea%' THEN 'En Línea' ELSE 'Presencial' END FROM carnet_nvo cn where cn.nov = eo.cod_orien) as 'Modo ingreso'";
           }
           
               $sqlQuery="";
               
               for ($i=0; $i<count($listaCampos); $i++){
                   
   
                   if($i!=count($listaCampos)-1){
                       $sqlQuery .= $listaCampos[$i] . " , ";    
                   }else{
                       $sqlQuery .= $listaCampos[$i]. " ";
                   }        
               }
   
               $sqlQuery .= " from carrera_estudiante ce, estudia_old eo, facultad f, extension e, " .
                   "carrera_temporal ct, nacionalidad n, bitacora_inscripcion bi " .
                   "where f.codfac = ce.codfac and eo.carnet =ce.carnet and " .
                   "e.codigo_unidad_academica = f.codfac and ce.codext = e.codigo_extension and " .
                   "ct.codigo_unidad_academica = ce.codfac and ct.codigo_extension = ce.codext and ct.codigo_carrera = ce.codcar and " .
                   "n.codigo_nacionalidad = eo.cod_nac  and bi.carnet =eo.carnet and bi.cod_ua =ce.codfac and bi.cod_ext = ce.codext " .
                   "and bi.cod_car = ce.codcar and bi.carnet =ce.carnet and bi.cancelar_matricula =0 and bi.ciclo =" . $request->input('ciclo') . " ";
               
               if(count($listaCampos)<=0){
                   return "errorTamanio";
               }
               error_log($sqlQuery);
               return $sqlQuery;
       }

        function Resultados(Request $req) {

            
            $consulta='Select ';
             $traidos = Seleccionados($req);     
            if($traidos=="errorTamanio"){
                
                return Redirect::back()->withErrors(['msg' => 'Debe elegir al menos 1 campo']);
            }else if($req->input('ciclo')==""){
                return Redirect::back()->withErrors(['msg' => 'Debe Ingresar un ciclo (AÑO)']);
            }

            $consulta .=$traidos;
            $resultados = DB::cursor($consulta);    
            foreach ($resultados as $result) {
                yield $result;
            }
        }
        $nuevosResultados=Resultados($req);
    
        return (new FastExcel($nuevosResultados))->download('ReporteInscritos.xlsx');
    }

}
