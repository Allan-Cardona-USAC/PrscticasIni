@extends('portalEstudiantil.layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!--<link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css">-->
<link href="{{ URL::asset('css/CertArchivos.css') }}" rel="stylesheet" type="text/css"
@endsection


@section('content')
<br>
<br>
<br>
<div class="container">

    <h2 style="text-align:center;">Constancia de Archivos</h2>
    <div>
        <div style="background-color:white;">
            <br>
            <p style="text-align:right; padding-left: 200px; padding-right: 200px;" >{!! DNS1D::getBarcodeSVG($barcode, 'C93',1)!!}</p>
            <p style="text-align:right; padding-left: 200px; padding-right: 200px; font-size: 12px; padding-top: 0px;margin-top: -10px;">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$barcode}}</a></p>
            <p style="text-align:center;">
                <img src="{{ asset('img/usacnegro.jpg') }}"></img>
            </p>
            <br />
            <div style="text-align:center; font-size:16px;">
                <strong>CONSTANCIA DE EXPEDIENTE ESTUDIANTIL</br><!--@if($nivel == 1)PREGRADO @elseif($nivel == 2)GRADO @elseif($nivel == 3)POSTGRADO @endif--></strong>
                <br />
            </div>
            <br />
            <div style="" class="bloque-1">
                <table style="width: 100%; text-align:center; font-size: 16px">

                    <tr>
                        <td style="text-align: right;"> <b>Para trámite de:</b></td>
                        @if($tipoConstancia == 1 OR $tipoConstancia == 4)
                        <td style="padding-left: 15px; text-align: left;"><strong>Graduacion e Impresion de Titulo</strong></td>
                        @elseif($tipoConstancia == 2)
                        <td style="padding-left: 15px; text-align: left;"><strong>Graduacion</strong></td>
                        @endif
                    </tr>
                    <tr>
                        <td style="text-align: right;"> <b>REGISTRO ACÁDEMICO:</b></td>
                        <td style="padding-left: 15px; text-align: left;"><strong>{{$carnet}}</strong></td>
                    </tr>
                    <tr>
                        @if($codNacionalidad == 30)
                        <td style="text-align: right;"> <b>CUI:</b></td>
                        <td style="padding-left: 15px; text-align: left;"> <strong>{{$identificacion}}</strong></td>
                        @else
                        <td style="text-align: right;"> <b>PASAPORTE:</b></td>
                        <td style="padding-left: 15px; text-align: left;"> <strong>{{$identificacion}}</strong></td>
                        @endif
                    </tr>
                    <tr>
                        <td style="text-align: right;"> <b>Nombre:</b></td>
                        <td style="padding-left: 15px; text-align: left;"> <strong>{{$nombre}}</strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"> <b>Carrera:</b></td>
                        <td style="padding-left: 15px; text-align: left;"><strong> {{$nombre_carrera}}</strong></td>
                    </tr>
                </table>
            </div>
            <br>
            @if($tipoConstancia == 2)
            <div style= "text-align:center; font-size:24px;">
                <strong>Provisional</strong>
            </div>
            @endif
            <br>
            <!--<div>
                <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala,</p>
            </div>
            <div style="text-align:center; font-size:18px;">
                <strong>Certifica:</strong>
                <br />
                <br>-->
                @if($usuarioLinea != 1)
                <p style="font-size:16px; text-align:center; margin-top: -5px;" class="parrafo-1">Generada por el archivo del Departamento de Registro y Estadística, el cual hace constar que el expediente de estudiante se encuentra @if($tipoConstancia == 1 OR $tipoConstancia == 4) <strong> COMPLETO </strong> @elseif($tipoConstancia == 2) <strong> INCOMPLETO </strong> @endif por lo que se extiende la presente.</p>
                @else
                <p style="font-size:16px; text-align:center; margin-top: -5px;" class="parrafo-1">Generada por el archivo del Departamento de Registro y Estadística, el cual hace constar que el estudiante @if($tipoConstancia == 1 OR $tipoConstancia == 4)<strong>COMPLETÓ</strong> @elseif($tipoConstancia == 2) tiene <strong> INCOMPLETO </strong> @endif los requisitos de inscripción en línea según lo resuelto en el acta No. 09-2017. Punto Séptimo, Inciso 7.2 Para el primer ingreso.</p>
                @endif
            </div>
            <br />
            <div>
                <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;"> Expediente verificado en la Ciudad de Guatemala, {{$fecha}}</p>
            </div>
            @if(!empty($fechaVencimiento))
            <div>
                <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;"> Esta constancia caduca el {{\Carbon\Carbon::parse($fechaVencimiento)->format('d/m/Y')}}</p>
            </div>
            @endif
            <!--
            <div style="text-align: center; z-index:1;">

                <p style="font-size:16px;">{{$jefatura_nombre}}</p>
                <strong style="text-transform:uppercase; font-size:16px;">{{$jefatura_puesto}}</strong>
                <br />
                <br />
            </div>-->
            <br>
                <table style="text-align:left; width: 100%; font-size: 14px;">
                    <tr>
                        <div style="text-align: right;">
                        <td style="text-align: center;">    
                            <div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div><br />
                        </td>
                    </tr>
                </table>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection