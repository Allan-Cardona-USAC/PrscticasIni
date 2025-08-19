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

    <h2 style="text-align:center;">Certificación de Archivos</h2>
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
                <strong>El Infrascrito Jefe del Departamento de Registro y Estadística </strong>
                <br />
            </div>
            <div style= "text-align:center; font-size:16px;">
                <strong>de la Universidad de San Carlos de Guatemala</strong>
                <br />
            </div>
            <br />
            <div style="text-align:center; font-size:18px;">
                <strong>Certifica:</strong>
            </div>
            <div>
                <p style="font-size:16px; text-align:center;">Que según consta en los registros de matrícula</p>
            </div>
            <br>
            <br>
            <div style="text-align:center; font-size:16px;">
                <strong>{{$nombre}}</strong>
            </div>
            <br>
            <div style="" class="bloque-1">
                <table style="text-align:center; width: 100%; font-size: 16px">
                    <tr>
                        <td class="paddingleft300"> <b>REGISTRO ACÁDEMICO:</b></td>
                        <td class="paddingright15"> {{$carnet}}</td>
                        @if($codNacionalidad == 30)
                        <td class="paddingleft15"> <b>CUI:</b></td>
                        <td class="paddingright300">{{$cui}}</td>
                        @else
                        <td class="paddingleft15"> <b>PASAPORTE:</b></td>
                        <td class="paddingright300">{{$cui}}</td>
                        @endif
                    </tr>
                </table>
                <br />
            </div>
            <br>
            <div>
                <p style="font-size:16px; text-align:center;" class="bloque-1">Es estudiante de la (el)<strong>{{$nomfacultad}}, {{$nomextension}}, {{$nomcarrera}}, durante el Ciclo Académico {{$ciclos}}</strong></p>
            </div>
            <div>   
                <p style="font-size:16px; text-align:center;"  class="bloque-1"> Observaciones: @if($usuarioLinea != 1)Documentos que se encuentran en el expediente: @else Estudiante inscrito en línea @endif </p>
            @if($usuarioLinea !=1)
                <ul type="circle" class="documentsblock">
                @foreach($data as $dato)
                @if($dato['entregado'] == "S" AND $dato['expediente_id'] == $expediente AND $dato['obligatorio'] = "S")
                    @if($dato['nombre'] == "Tarjeta PCB")
                        <li style="font-size:16px; text-align:justify; padding-left: 0px; padding-right: 0px;">Pruebas de Conocimientos Básicos</li>
                    @elseif(($dato['nombre'] == "Conocimiento específicos"))
                        <li style="font-size:16px; text-align:justify; padding-left: 0px; padding-right: 0px;">Pruebas específicas</li>
                    @else
                        <li style="font-size:16px; text-align:justify; padding-left: 0px; padding-right: 0px;">{{$dato['nombre']}}</li>
                    @endif    
                @endif
                @endforeach
                </ul>
            @else
                    <p style="font-size:16px; text-align:center; padding-left: 0px; padding-right: 0px;" class="documentsblock">El estudiante completó los requisitos de inscripción en línea según lo resuelto en el acta No. 09-2017. Punto Séptimo, Inciso 7.2 para el primer ingreso.</p>
            @endif
            </div>
            <br>
            <!--<div>
                <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala,</p>
            </div>
            <div style="text-align:center; font-size:18px;">
                <strong>Certifica:</strong>
                <br />
                <br>-->
                <p style="font-size:16px; text-align:center; margin-top: -5px;" class="parrafo-1">Expediente verificado en la Ciudad de Guatemala, el {{$fecha}}</p>
            </div>
            <br />
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