<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstudiaOld;
use App\Models\Aspirante;
use App\Models\InformacionAspirante;
use App\Funciones\Recaptcha;
use App\Funciones\ConsultaOV;

class RecuperarPin extends Controller
{
    public function index(){
        $title = 'Recuperar Pin - Estudiante';
        return view('portalEstudiantil.pages.recuperarPin', compact('title'));
    }

    public function consultaEstudiante(Request $request){
        $carnet = $request->input('carnet');
        $fNacimiento = $request->input('fNacimiento');
        $gtoken = $request->input('gtoken');
        
        $estudiante_rst = [
            'carnet' => 0,
            'pin' => 0,
            'estado' => False,
            'mensaje' => 'Los datos ingresados son incorrectos'
        ];
        //validando con google
        $gvalido = Recaptcha::verificar($gtoken);

        if(!$gvalido){
            $estudiante_rst['mensaje'] = '¿Eres un robot?, vuelve a intentarlo.';
            return json_encode($estudiante_rst);
        }

        $estudiante = EstudiaOld::query()
            ->select('carnet', 'pin', 'verification_state', 'nombre1', 'nombre2', 'primer_apellido', 'segundo_apellido')->where(
            [
                ['carnet', '=', $carnet],
                ['fec_nac', '=', $fNacimiento]
            ]
            )->first();

        if($estudiante){
            if($estudiante->verification_state == 0){
                $estudiante->verification_state = 1;
                $estudiante->save();
            }

            $estudiante_rst = [
                'carnet' => $estudiante->carnet,
                'pin' => $estudiante->pin,
                'estado' => True,
                'nombre1' => $estudiante->nombre1,
                'nombre2' => $estudiante->nombre2,
                'primer_apellido' => $estudiante->primer_apellido,
                'segundo_apellido' => $estudiante->segundo_apellido
            ];

        }

        return json_encode($estudiante_rst);
    }

    public function aspirante(){
        $title = 'Recuperar Pin - Aspirante';
        return view('portalEstudiantil.pages.recuperarPinAspirante',
                    compact('title'));
    }

    public function consultaAspirante(Request $request){
        $nov = $request->nov;
        $fNacimiento = $request->fNacimiento;
        $gtoken = $request->gtoken;

        $aspirante_rst = [
            'nov' => 0,
            'pin' => 0,
            'estado' => False,
            'mensaje' =>''
        ];

        //validando el token de recaptcha
        $gvalido = Recaptcha::verificar($gtoken);
        if(!$gvalido){
            $aspirante_rst['mensaje'] = '¿Eres un Robot?, vuelve a intentarlo.';
            return json_encode($aspirante_rst);
        }

        $aspirante = Aspirante::select()
            ->where([
                ['nov', '=', $nov],
                ['fecha_nacimiento', '=', $fNacimiento]
            ])->first();

        if(!$aspirante){
            $resultado = ConsultaOV::consultarAspiranteOV($nov);

            if(!$resultado){
                $aspirante_rst['mensaje'] = 'Los datos ingresados son incorrectos.';
                return json_encode($aspirante_rst);
            }

            $aspirante = Aspirante::select()
                ->where([
                    ['nov', '=', $nov],
                    ['fecha_nacimiento', '=', $fNacimiento]
                ])
                ->first();
        }

        //TODO activarlo de una vez?
        // consultar si esta en informacion aspirante
        // si no esta insertarlo
        // si esta no hacer nada
        $asp = InformacionAspirante::where([['nov', '=', $aspirante->nov]])
            ->first();
        
        if($asp && $asp->verification_state == 0){
            $asp->verification_state = 1;
            $asp->save();
        }

        if(!$asp){
            $infoAspirante = new InformacionAspirante;
            $infoAspirante->nov = $aspirante->nov;
            $infoAspirante->cod_titulo_diversificado = $aspirante->cod_diversificado? $aspirante->cod_diversificado: 0;
            $infoAspirante->sexo = $aspirante->sexo ? $aspirante->sexo: 0;
            $infoAspirante->estado_civil = $aspirante->estado_civil ? $aspirante->estado_civil: 0;
            $infoAspirante->fecha_nacimiento = $aspirante->fecha_nacimiento? $aspirante->fecha_nacimiento: '0000-00-00';
            $infoAspirante->apellido1 = $aspirante->apellido1? $aspirante->apellido1 : '';
            $infoAspirante->apellido2 = $aspirante->apellido2? $aspirante->apellido2: '';
            $infoAspirante->nombre1 = $aspirante->nombre1? $aspirante->nombre1: '';
            $infoAspirante->nombre2 = $aspirante->nombre2? $aspirante->nombre2: '';
            $infoAspirante->otros_nombres = '';
            $infoAspirante->direccion = $aspirante->direccion? $aspirante->direccion: '';
            $infoAspirante->muni_recide = 0;
            $infoAspirante->depto_recide = 0;
            $infoAspirante->cod_postal = 0;
            $infoAspirante->f_graduacion = '0000-00-00';
            $infoAspirante->tipoDiversificado = 0;
            $infoAspirante->cod_establecimiento = $aspirante->cod_Establecimiento? $aspirante->cod_Establecimiento: 0;
            $infoAspirante->nombre_establecimiento = $aspirante->nombre_establecimiento? $aspirante->nombre_establecimiento: '';
            $infoAspirante->direccion_establecimiento = $aspirante->direccion_establecimiento? $aspirante->direccion_establecimiento: '';
            $infoAspirante->tipo_establecimiento = 0;
            $infoAspirante->pais_establecimiento = 0;
            $infoAspirante->depto_establecimiento = 0;
            $infoAspirante->muni_establecimiento = 0;
            $infoAspirante->postalEstablecimiento = 0;
            $infoAspirante->nacionalidad = 0;
            $infoAspirante->etnia = 0;
            $infoAspirante->idioma_etnia = 0;
            $infoAspirante->idioma_gt = 0;
            $infoAspirante->idioma_no_gt = 0;
            $infoAspirante->proveedor_cel = 'No pro';
            $infoAspirante->numero_orden = '';
            $infoAspirante->numero_pasaporte = '';
            $infoAspirante->numero_partida = '';
            $infoAspirante->numero_libro='';
            $infoAspirante->numero_folio='';
            $infoAspirante->pais_extendida=0;
            $infoAspirante->depto_extendida = 0;
            $infoAspirante->muni_extendida =0;
            $infoAspirante->pais_nac=0;
            $infoAspirante->depto_nac=0;
            $infoAspirante->muni_nac=0;
            $infoAspirante->nit='';
            $infoAspirante->confirmado=0;
            $infoAspirante->verification_state = 1;
            $infoAspirante->numero_registro = $aspirante->registro? $aspirante->registro: 0;
            $infoAspirante->correo_electronico = $aspirante->correo? $aspirante->correo: '';
            $infoAspirante->telefono = $aspirante->telefono? $aspirante->telefono : 0;
            $infoAspirante->celular = $aspirante->celular? $aspirante ->celular: 0;
            $infoAspirante->pin = $aspirante->pin;
            $infoAspirante->save();
        }

        $aspirante_rst = [
            'nov' => $aspirante->nov,
            'pin' => $aspirante->pin,
            'nombre1' => $aspirante->nombre1,
            'nombre2' => $aspirante->nombre2,
            'apellido1' => $aspirante->apellido1,
            'apellido2' => $aspirante->apellido2,
            'estado' => True
        ];

        return json_encode($aspirante_rst);
    }
}
