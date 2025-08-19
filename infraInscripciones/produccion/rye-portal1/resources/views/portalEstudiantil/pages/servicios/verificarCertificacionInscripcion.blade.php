@extends('portalEstudiantil.layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!--<link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css">-->
<link href="{{ URL::asset('css/CertiInscripcion.css') }}" rel="stylesheet" type="text/css"
@endsection


@section('content')
<br>
<br>
<br>
<div class="container">

    <h2 style="text-align:center;">Certificación de Inscripción</h2>
    <div>
        <div style="background-color:white;">
            <br>
            <p style="" class="formatpadding fontsize16 textalign-right">{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
            <P style="" class="formatpadding fontsize10 textalign-right paddingtop0 margintop-20">VALIDADOR: <a style="" class="validadorformat">{{$hash}}</a></P>
            <p style="" class="textalign-center d-flex justify-content-center">
                <img src="{{ asset('img/usacnegro.jpg') }}"></img>
            </p>
            <br />
            <div style="" class="textalign-center">
                <strong class="fontsize18">DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                <br />
            </div>
            <br />
            @if($nivel >= 3)
            @if($jefatura_puesto == "Jefe")
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                    Consejo Superior Universitario,</p>
            </div>
            @else
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                    Consejo Superior Universitario,</p>
            </div>
            @endif
            @elseif($nivel < 3 && $cert_firma == 2)
            @if($jefatura_puesto == "Jefe")
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala,</p>
            </div>
            @else
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala,</p>
            </div>
            @endif
            @else
            @if($jefatura_puesto == "Jefe")
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                    Consejo Superior Universitario,</p>
            </div>
            @else
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                    de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                    Consejo Superior Universitario,</p>
            </div>
            @endif
            @endif
            <br>
            <div style="" class="fontsize18 textalign-center">
                <strong>Certifica:</strong>
                <br />
            </div>
            <br>
            <div>
                <p style="" class="fontsize16 textalign-center">Que según consta en los registros de matrícula</p>
            </div>
            <br>
            <div style="" class="fontsize16 textalign-center">
                <strong>{{$nombreCompleto}}</strong>
            </div>
            <br>
            <table style="" class="width100 fontsize16 textalign-center d-flex justify-content-center">
                <tr>
                    @if($cod_nac == 30)
                    <td style="" class="paddingleft300"> <b>CUI:</b></td>
                    <td style="" class="paddingright15"> {{$cui}}</td>
                    @else
                    <td style="" class="paddingleft300"> <b>Pasaporte:</b></td>
                    <td style="" class="paddingright15"> {{$pasaporte}}</td>
                    @endif
                    <td style="" class="paddingleft15"> <b>REGISTRO ACADÉMICO:</b></td>
                    <td style="" class="paddingright300">{{$carnet}}</td>
                </tr>
            </table>
            <br />
            @if($nivel >= 3)
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">Es estudiante de la (el) {{$ua}}, carrera: {{$carrera}} , {{$extension}} , en el(los) año(s) {{$cert_descripcion}}.</p>
            </div>
            @elseif($nivel < 3 && $cert_firma == 2)
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">Es estudiante de la (el) {{$ua}}, carrera: {{$carrera}} , {{$extension}} , en el(los) año(s) {{$cert_descripcion}}.</p>
            </div>
            @else
            <div>
                <p style="" class="formatpadding fontsize16 textalign-center">Es estudiante de la (el) {{$ua}}, carrera: {{$carrera}} , {{$extension}} , Ciclo académico {{$cert_descripcion}}.</p>
            </div>
            @endif
            @if($sitAcademica == 2)
            <p style="" class="formatpadding fontsize16 textalign-center">Observaciones: Pendiente de Exámenes Generales a partir del {{ Carbon\Carbon::parse($fechaCierre)->format('d/m/Y') }}.</p>
            @elseif($sitAcademica == 3)
                @if($activo ==1 && $carrera == "Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado")
                    <p class="formatpadding fontsize16 textalign-center">Observaciones: Pendiente de Exámenes Generales.</p>
                    <p class="formatpadding fontsize16 textalign-center">Graduado en la Licenciatura en Ciencias Jurídicas y Sociales</p>
                    @else
                    <p class="formatpadding fontsize16 textalign-center">Observaciones: GRADUADO.</p>
                    @endif
            @endif
            @if($activo == -4)
            <p style="" class="formatpadding fontsize16 textalign-center">Observaciones: <strong>Expulsado.</strong></p>
            @endif
            @if($sancionTempUA)
            <p class="formatpadding fontsize16 textalign-center">Observaciones: {{$sancionTempUA}}.</p>
            @endif
            @if($sancion)
            <p class="formatpadding fontsize16 textalign-center">Observaciones: {{$sancion}}.</p>
            @endif
            @if($repitencia)
            <p class="formatpadding fontsize16 textalign-center">Observaciones: {{$repitencia}}.</p>
            @endif
            @if($provisional == 1)
            <p class="formatpadding fontsize16 textalign-center">Observaciones: Inscripción Provisional. Con
                base en el Punto Octavo Inciso 8.1, Acta 35-2018 de fecha 21 de noviembre de 2018, del
                Consejo Superior Universitario.</p>
            @endif
            <p style="" class="formatpadding fontsize16 textalign-center">Extendida en la ciudad de Guatemala, el {{$fecha}}</p>
            <br />
            <div class="visible-print text-center">
                <p>{{$jefatura_nombre}}</p>
                <strong style="text-transform:uppercase;">{{$jefatura_puesto}}</strong>
                <br />
                <br />
                <!--<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br><a style="color:black;" href="{{url('estudiante/verificarCertificacion?id='.$cert_transaccion)}}">Verificar</a>-->
            </div>
            @if($nivel >= 3)
            <div style="" class="textalign-center d-flex justify-content-center">
            <table style="" class="textalign-left widht100 fontsize14">
            <tr>
            @if(is_numeric($boleta))
            <td style="" class="textalign-left">Tasa Universitaria Q20.00<br/>Recibo No. {{$boleta}} de fecha {{\Carbon\Carbon::parse($fechaboleta)->format('d/m/Y')}}<br/>Elaboró {{$iniciales}}</td>
            @else
            <td style="" class="textalign-left"><br/>Elaboró {{$iniciales}}</td>
            @endif
            <td style="" class="paddingright130 textalign-center"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br> <p style="" class="qrformat">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p></td>
            </tr>    
            </table>
            @else
            <div style="" class="textalign-right ">
            <table style="" class="textalign-left width100 fontsize14 d-flex justify-content-center">
            <tr>
                <td style="" class="paddingleft200 textalign-left paddingright180 displaychange"></td>
                <td style="" class="textalign-center"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br> <p style="" class="qrformat">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p></td>
            </tr>
            </table>
            </div>
            @endif
            
            <br>
            <hr style="background-color:black; ">
        </div>
    </div>
</div>
@endsection