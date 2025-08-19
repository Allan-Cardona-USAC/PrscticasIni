@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--<link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css">-->
    <link href="{{ URL::asset('css/CertArchivos.css') }}" rel="stylesheet" type="text/css"
@endsection

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class="d-flex justify-content-center">
<div class="card">
    <div class="card-header">
        <h5>Certificación Archivo</h5>
    </div>
    <div class="card-body">
    <div class="container">
        <div>
            <form action="{{ route('administrativo.archivos.DescargarConstanciaArchivos') }}" method="GET">
            <input hidden value="{{$carnet}}" id="carnet" name="carnet"/>
            <input hidden value="{{$cui}}" id="cui" name="cui">
            <input hidden value="{{$nombre}}" id="nombre" name="nombre"/>
            <input hidden value="{{$cod_ua}}" id="cod_ua" name="cod_ua"/>
            <input hidden value="{{$cod_carrera}}" id="cod_carrera" name="cod_carrera"/>
            <input hidden value="{{$cod_ext}}" id="cod_ext" name="cod_ext"/>
            <input hidden value="{{$jefatura_nombre}}" id="jefe_nombre" name="jefe_nombre"/>
            <input hidden value="{{$jefatura_puesto}}" id="jefe_puesto" name="jefe_puesto"/>
            <input hidden value="{{$facultad}}" id="facultad" name="facultad"/>
            <input hidden value="{{$nombre_carrera}}" id="nombre_carrera" name="nombre_carrera"/>
            <input hidden value="{{$nivel_academico}}" id="nivel" name="nivel"/>
            <input hidden value="{{$transaccion}}" id="transaccion" name="transaccion"/>
            <input hidden value="{{$certificacion_id}}" id="certificacion_id" name="certificacion_id"/>
            <input hidden value="{{$barcode}}" id="barcode" name="barcode"/>
            <input hidden value="{{$usuarioLinea}}" id="usuarioLinea" name="usuarioLinea"/>
            <input hidden value="{{$codNacionalidad}}" id="codNacionalidad" name="codNacionalidad">
            <div style= "background-color:white;">
            <br>
            <p style="text-align:right;" class="barcode-1" >{!! DNS1D::getBarcodeSVG($barcode, 'C93',1)!!}</p>
            <p style="text-align:right; font-size: 12px; padding-top: 0px;margin-top: -10px;" class="validator-1">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$barcode}}</a></p>
            <p style= "text-align:center;">
            <img src="{{ asset('img/logousac.png') }}"></img>
            </p>
            <br/>
            <!--<div style= "text-align:center; font-size:18px;">
                <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                <br/>
            </div>--->
            <div style= "text-align:center; font-size:18px;">
                <strong>CONSTANCIA DE EXPEDIENTE ESTUDIANTIL</br><!--@if($nivel_academico == 1)PREGRADO @elseif($nivel_academico == 2)GRADO @elseif($nivel_academico == 3)POSTGRADO @endif--></strong>
                <br/>
            </div>
            <br/>
            <div style="" class="bloque-1">
            <table style= "width: 100%; text-align:center; font-size: 16px">
            
                <tr>
                    <td style= "text-align: right;"> <b>Para trámite de:</b></td>
                    @if($tipoConstancia == 1 OR $tipoConstancia == 4)
                    <td style= "padding-left: 15px; text-align: left;"><strong>Graduación e Impresión de Título</strong></td>
                    @elseif($tipoConstancia == 2)
                    <td style= "padding-left: 15px; text-align: left;"><strong>Graduación</strong></td>
                    @endif
                </tr>
                <tr>
                <td style= "text-align: right;"> <b>REGISTRO ACADÉMICO:</b></td>
                <td style= "padding-left: 15px; text-align: left;"><strong>{{$carnet}}</strong></td>
                </tr>
                <tr>
                @if($codNacionalidad == 30)
                <td style= "text-align: right;"> <b>CUI:</b></td>
                <td style= "padding-left: 15px; text-align: left;"> <strong>{{$cui}}</strong></td>
                @else
                <td style= "text-align: right;"> <b>PASAPORTE:</b></td>
                <td style= "padding-left: 15px; text-align: left;"> <strong>{{$cui}}</strong></td>
                @endif
                </tr>
                <tr>
                    <td style= "text-align: right;"> <b>Nombre:</b></td>
                    <td style= "padding-left: 15px; text-align: left;"> <strong>{{$nombre}}</strong></td>
                </tr>
                <tr>
                    <td style= "text-align: right;"> <b>Carrera:</b></td>
                    <td style= "padding-left: 15px; text-align: left;"><strong> {{$nombre_carrera}}</strong></td>
                </tr>
            </table>
            </div>
            <br>
            @if($tipoConstancia == 2)
            <div style= "text-align:center; font-size:24px;">
                <strong>Provisional</strong>
            </div>
            @endif
            <div>
            <!--<p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala,</p>
            </div> -->
            <!--<div style= "text-align:center; font-size:18px;">
                <strong>Constancia:</strong>
                <br/>
            </div>-->
            <br>
            @if($usuarioLinea != 1)
            <p style="font-size:16px; text-align:center;" class="parrafo-1">Extendida por el archivo del Departamento de Registro y Estadística, hace constar que el expediente de estudiante se encuentra @if($tipoConstancia == 1 OR $tipoConstancia == 4) <strong> COMPLETO </strong> @elseif($tipoConstancia == 2) <strong> INCOMPLETO </strong> @endif por lo cual se extiende la presente.</p>
            @else
            <p style="font-size:16px; text-align:center;" class="parrafo-1">Generada por el archivo del Departamento de Registro y Estadística, el cual hace constar que el estudiante @if($tipoConstancia == 1 OR $tipoConstancia == 4) <strong> COMPLETÓ </strong> @elseif($tipoConstancia == 2) tiene <strong> INCOMPLETO </strong> @endif los requisitos de inscripción en línea según lo resuelto en el acta No. 09-2017. Punto Séptimo, Inciso 7.2 Para el primer ingreso.</p>
            @endif
            </div>

            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-1">Expediente verificado en la Ciudad de Guatemala, el {{$fecha_usr}}</p>
            <br/>
            <table style= "text-align:left; width: 100%; font-size: 16px">
                <tr>
                    <div style="text-align: right;">
                    <td style="text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div></br> <p style="font-size:14px; text-align:center; margin-top:-30px; font-weight:bold;font-size:1.01em;"><!--{{$certificacion_id}}--></p></td>
                </tr>
            </table>
            <br>
            <hr style="background-color:black; ">
            </div>
            <input type="submit" value="Descargar" class="btn btn-primary"/>
            </form>
        </div>
    </div>
    </div>
</div>
</div>
@endsection