@extends('layouts.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="{{ URL::asset('css/CertiTitulos.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class="container">
    <h2>Certificación de Título</h2>
    <div>
        <form action="{{ route('administrativo.descargaTitulos') }}" method="POST">
            @csrf
            <input hidden value="{{$carnet}}" id="registroAcademico" name="registroAcademico" />
            <input hidden value="{{$nombre}}" id="nombre" name="nombre" />
            <input hidden value="{{$cui}}" id="cui" name="cui" />
            <input hidden value="{{$nombre_carrera}}" id="nombre_carrera" name="nombre_carrera" />
            <input hidden value="{{$nivel_academico}}" id="nivel_academico" name="nivel_academico" />
            <input hidden value="{{$fecha_graduacion}}" id="fecha_graduacion" name="fecha_graduacion" />
            <input hidden value="{{$facultad}}" id="facultad" name="facultad" />
            <input hidden value="{{$estado}}" id="estado" name="estado" />
            <input hidden value="{{$cert_transaccion}}" id="cert_transaccion" name="cert_transaccion" />
            <input hidden value="{{$hash}}" id="hash" name="hash" />
            <input hidden value="{{$tipo_tramite}}" id="tipo_tramite" name="tipo_tramite" />
            <input hidden value="{{$no_titulo}}" id="no_titulo" name="no_titulo" />
            <input hidden value="{{$jefatura_puesto}}" id="jefatura_puesto" name="jefatura_puesto" />
            <input hidden value="{{$tipo_firma}}" id="tipo_firma" name="tipo_firma" />
            <input hidden value="{{$tipo_titulo}}" id="tipo_titulo" name="tipo_titulo" />
            <input hidden value="{{$cod_ua}}" id="cod_ua" name="cod_ua" />
            <input hidden value="{{$cod_extension}}" id="cod_extension" name="cod_extension" />
            <input hidden value="{{$cod_carrera}}" id="cod_carrera" name="cod_carrera" />
            <input hidden value="{{$correlativo}}" id="correlativo" name="correlativo" />
            <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo" />
            <div style="background-color:white;">
                <br>
                <p style="text-align:right;" class="barcode-1">{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
                <p style="text-align:right;" class="validator-1">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$hash}}</a></p>
                <p style="text-align:center;">
                    <img src="{{ asset('img/logousac.png') }}"></img>
                </p>
                <br />
                <div style="text-align:center; font-size:18px;">
                    <strong>LA @if($firma == 'SUBJEFE')SUBJEFATURA @else JEFATURA @endif DEL DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA DE LA <br>
                        UNIVERSIDAD DE SAN CARLOS DE GUATEMALA.</strong>
                    <br />
                </div>
                <br />
                <br />
                <!--<div style="width: 100%">
                    <p style="font-size:16px; text-align:center;">A solicitud de él interesado</p> $estado == 18 19 en tramite de titulo
                </div>-->
                <br>
                @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 2) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
                <div style="text-align:center; font-size:18px;">
                    <strong>Certifica:</strong>
                    <br />
                </div>
                @elseif((($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 3) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 2))
                <div style="text-align:center; font-size:18px;">
                    <strong>Hace constar que:</strong>
                    <br />
                </div>
                @elseif((($estado <=10 || $estado == 17 || $estado == 18 || $estado == 19)) || $tipo_tramite == 4) <!--Para 4. Reposicion-->
                <div style="text-align:center; font-size:18px;">
                    <strong>Hace constar que:</strong>
                    <br />
                </div>
                @endif
                <br>
                @if((($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 2) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 3))
                <div style="width: 100%">
                    <p style="font-size:16px; text-align:center;">Según consta en los registros digitales del departamento de Registro y Estadística.</p>
                </div>
                @endif
                @if(($estado == 11  && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 2) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
                <div style="width: 100%">
                    <p style="font-size:16px; text-align:center;">Que según consta en los registros digitales del departamento de Registro y Estadística.</p>
                </div>
                @endif
                <br>
                <br>
                <div style="text-align:center; font-size:16px;">
                    <strong>{{$nombre}}</strong>
                </div>
                <br>
                <table style="text-align:center; width: 100%; font-size: 16px">
                    <tr>
                        <td class="table-1"> <b>CUI:</b></td>
                        <td class="table-2"> {{$cui}}</td>
                        <td class="table-3"> <b>REGISTRO ACADÉMICO:</b></td>
                        <td class="table-4">{{$carnet}}</td>
                    </tr>
                </table>
                <br />
                <br />
                <br />
                @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
                <div>
                    <p style="font-size:16px; text-align:center;" class="parrafo-2">Cuenta con título universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong> con el número de registro <strong>{{$no_titulo}}</strong>.</p>
                </div>
                @elseif($estado == 11 && $tipo_tramite == 2)
                <div>
                    <p style="font-size:16px; text-align:center;" class="parrafo-2">Cuenta con Título Universitario de incorporación a esta Universidad en <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} con base al Acuerdo de Rectoría No. 0156-2023, en el cual se le expide su vínculo con la(el) <strong>{{$facultad}}</strong> con el número de registro <strong>{{$no_titulo}}</strong>.</p>
                </div>
                @elseif((($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 3))
                <div>
                    <p style="font-size:16px; text-align:center;" class="parrafo-2">Inició su trámite de impresión y
                        registro de título universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong>.</p>
                </div>
                @elseif($tipo_tramite == 2 && ($estado <=10 || $estado == 17 || $estado == 18 || $estado == 19))
                <div>
                    <p style="font-size:16px; text-align:center;" class="parrafo-2">Inició su trámite de impresión y registro de Título Universitario de incorporación a esta Universidad en <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} con base al Acuerdo de Rectoría No. 0156-2023, en el cual se le expide su vínculo con la(el) <strong>{{$facultad}}</strong>.</p>
                </div>
                @elseif($tipo_tramite == 4 && ($estado <=10 || $estado == 17 || $estado == 18 || $estado == 19))
                <div>
                    <p style="font-size:16px; text-align:center;" class="parrafo-2">Inició su trámite de reposición de título universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong>.</p>
                </div>
                @endif
                <br />
                <p style="font-size:16px; text-align:center;" class="parrafo-2">Extendida en la Ciudad de Guatemala, el {{$fecha}}</p>
                <br />
                <br />
                <div class="visible-print text-center">

                    <p>{{$jefatura_nombre}}</p>
                    <strong style="text-transform:uppercase;">{{$jefatura_puesto}}</strong>
                </div>
                <br>

                <table style="text-align:left; width: 100%; font-size: 16px">
                    <tr>
                        <div style="text-align: right;">
                            <td style="padding-left: 100px; text-align: left; padding-right: 580px;"></td>
                            <td style="padding-right: 60px; text-align: center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></td>
                    </tr>
                </table>
                <br>
                <hr style="background-color:black; ">
            </div>
            <input type="submit" value="Descargar" class="btn btn-primary" />
        </form>

    </div>
</div>

@endsection