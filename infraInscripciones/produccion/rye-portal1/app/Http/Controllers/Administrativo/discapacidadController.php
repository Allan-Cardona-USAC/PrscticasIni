<?php

namespace App\Http\Controllers\Administrativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Rap2hpoutre\FastExcel\FastExcel;
ini_set('max_execution_time', 300);
ini_set('memory_limit', '512M'); 
class discapacidadController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.RedirectEstadistica');
    }
    
    protected $redirectTo = '/administrativo/login';


    private $seleccionar="";
    public function index(){

        return view('administrativo.estadistica.discapacidad');
    }

    

    public function ReporteDiscapacidad(Request $req){ 
        

        function Seleccionados(Request $request){

            $listaCampos=[];
            if($request->input('carnet')=="on"){
   
               $listaCampos[]="eo.carnet as 'Carnet'";
           }
   
           if($request->input('nombre')=="on"){
   
                   $listaCampos[]="LTRIM(CONCAT_WS(' ', LTRIM(RTRIM(eo.primer_apellido)),LTRIM(RTRIM(eo.segundo_apellido)),LTRIM(RTRIM(eo.nombre1)),LTRIM(RTRIM(eo.nombre2)),LTRIM(RTRIM(eo.nombre)))) as 'Nombre Completo'";
           }
           if($request->input('nombres')=="on"){
   
            $listaCampos[]="CONCAT_WS(' ', LTRIM(RTRIM(eo.nombre1)),LTRIM(RTRIM(eo.nombre2))) as 'NOMBRES'";
            }
            if($request->input('apellidos')=="on"){
   
                $listaCampos[]="CONCAT_WS(' ', LTRIM(RTRIM(eo.primer_apellido)),LTRIM(RTRIM(eo.segundo_apellido))) as 'APELLIDOS'";
            }
            if($request->input('celular')=="on"){
    
                $listaCampos[]="eo.celular as 'Celular'";
            }
            if($request->input('fechanac')=="on"){
    
                $listaCampos[]="DATE_FORMAT(eo.fec_nac,'%d-%m-%Y') as 'Fecha de Nacimiento'";
            }
            if($request->input('cui')=="on"){
    
                $listaCampos[]="eo.cui as 'CUI'";
            }
            if($request->input('email')=="on"){
    
                $listaCampos[]="eo.email as 'Email'";
            }

           if($request->input('cua')=="on"){
   
               $listaCampos[]="f.codfac as 'Código de Unidad Académica'";
           }
           if($request->input('ua')=="on"){
   
               $listaCampos[]="f.nomfac as 'Unidad Académica'";
           }
   
           if($request->input('ce')=="on"){
   
               $listaCampos[]="e.codigo_extension as 'Código de Extensión'";
           }
   
           if($request->input('extension')=="on"){
   
               $listaCampos[]="e.nombre as 'Extensión'";
           }
           if($request->input('cc')=="on"){
   
               $listaCampos[]="ct.codigo_carrera as 'Código de Carrera'";
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
   
           if($request->input('direccion')=="on"){
   
               $listaCampos[]="eo.direccion as 'Dirección'";
           }
   
           if($request->input('sa')=="on"){
   
               $listaCampos[]="CASE when ce.sit_acad = 0 then 'Regular' when ce.sit_acad =2 then 'PEG' when ce.sit_acad =3 then 'Graduado' END as 'Situación Académica'";
           }
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
   
               $listaCampos[]="(select d.nombre from departamento d where d.codigo = eo.codigo_departamento_recide) as 'Código Departamento Reside'";
           }
   
           if($request->input('cdn')=="on"){
   
               $listaCampos[]="eo.codigo_departamento_nacimiento as 'Código Departamento Nacimiento'";
           }
           if($request->input('dn')=="on"){
   
               $listaCampos[]="(select d2.nombre from departamento d2 where d2.codigo= eo.codigo_departamento_nacimiento) as 'Departamento Nacimiento'";           }
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
   
               $listaCampos[]="DATE_FORMAT(ce.fec_cierre,'%d-%m-%Y') as 'Fecha De Cierre'";
           }
           if($request->input('fg')=="on"){
   
               $listaCampos[]="DATE_FORMAT(ce.fec_gradua,'%d-%m-%Y') as 'Fecha De Graduación'";
           }
           if($request->input('td')=="on"){
   
               $listaCampos[]="(select td.nombre from titulo_diversificado td where td.codigo_titulo_diversificado =eo.codigo_titulo_diversificado) as 'Título Diversificado'";

           }        
           if($request->input('ted')=="on"){
   
               $listaCampos[]="(select te.nombre from tipo_establecimiento te where te.codigo_tipo_establecimiento=eo.codigo_tipo_establecimiento) as 'Tipo Título Diversificado'";
           }
   
           if($request->input('dfes')=="on"){
   
               $listaCampos[]="(SELECT tmpd.dificultad_escalones FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Dificultad Escalones'";
           }
           if($request->input('apyote')=="on"){
   
               $listaCampos[]="(SELECT tmpd.apoyo_tecnivo FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Apoyo Técnico'";

           }
           if($request->input('ampt')=="on"){
   
               $listaCampos[]="(SELECT tmpd.amputaciones FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Amputaciones'";
           }
   
           if($request->input('aydamv')=="on"){
   
               $listaCampos[]="(SELECT tmpd.ayuda_movilizacion FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Ayuda Movilización'";
           }
           if($request->input('aydamvotr')=="on"){
   
               $listaCampos[]="(SELECT tmpd.ayuda_movilizacion_otros FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Ayuda Movilización Otros'";
   
           }
           if($request->input('dfau')=="on"){
   
               $listaCampos[]="(SELECT tmpd.dificultad_auditiva FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Dificultad Auditiva'";
           }
           if($request->input('dfvis')=="on"){
   
               $listaCampos[]="(SELECT tmpd.dificultad_visual FROM tmp_discapacidad_2015 tmpd WHERE tmpd.carnet=eo.carnet) as 'Dificultad Visual'";
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
                   "and bi.cod_car = ce.codcar and bi.carnet =ce.carnet and bi.cancelar_matricula =0 and bi.ciclo = 2015";
               
               if(count($listaCampos)<=0){
                   return "errorTamanio";
               }
   
   
               return $sqlQuery;
       }

       function Resultados(Request $req){ 
                $consulta='Select ';
                $traidos =  Seleccionados($req);
                $errorTamanio="Debe elegir al menos 1 campo";     
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
        return (new FastExcel($nuevosResultados))->download('ReporteDiscapacidad.xlsx');
        //return Seleccionados($req);
    }





 }
