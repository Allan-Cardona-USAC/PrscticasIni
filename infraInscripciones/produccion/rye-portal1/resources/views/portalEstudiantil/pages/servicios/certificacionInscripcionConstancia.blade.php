@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--<link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css">-->
    <link href="{{ URL::asset('css/CertInscrip.css') }}" rel="stylesheet" type="text/css"

@endsection


@section('content')
<div class="card-body">
    <div class="container">
        <h2>Certificación de Inscripción</h2>
        <div class="movil-1">
            <form action="{{ url('estudiante/SolicitaCertificacionInscripcion/descargar_certificacion') }}" method="GET">
            <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo"/>
            <input hidden value="{{$carnet}}" id="carnet" name="carnet"/>
            <input hidden value="{{$cui}}" id="cui" name="cui">
            <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto"/>
            <input hidden value="{{$ua}}" id="ua" name="ua"/>
            <input hidden value="{{$car}}" id="car" name="car"/>
            <input hidden value="{{$extension}}" id="extension" name="extension"/>
            <input hidden value="{{$jefatura_nombre}}" id="jefe_nombre" name="jefe_nombre"/>
            <input hidden value="{{$jefatura_puesto}}" id="jefe_puesto" name="jefe_puesto"/>
            <input hidden value="{{$fecha}}" id="fecha" name="fecha"/>
            <input hidden value="{{$cert_numero}}" id="cert_numero" name="cert_numero"/>
            <input hidden value="{{$cert_ua}}" id="cert_ua" name="cert_ua"/>
            <input hidden value="{{$cert_ciclo}}" id="cert_ciclo" name="cert_ciclo"/>
            <input hidden value="{{$cert_transaccion}}" id="id" name="id"/>
            <input hidden value="{{$hash}}" id="hash" name="hash"/>
            <input hidden value="{{$fechaVence}}" id="fechaVencimiento" name="fechaVencimiento"/>
            <input hidden value="{{$sitAcademica}}" id="sitAcademica" name="sitAcademica">
            <input hidden value="{{$fechaCierre}}" id="fechaCierre" name="fechaCierre">
            <input hidden value="{{$sancionTempUA}}" id="sancionTempUA" name="sancionTempUA">
            <input hidden value="{{$sancion}}" id="sancion" name="sancion">
            <input hidden value="{{$repitencia}}" id="repitencia" name="repitencia">
            <input hidden value="{{$activo}}" id="activo" name="activo">
            <div style= "background-color:white;">
            <br>
            <p style="text-align:right;" class="barcode-1" >{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
            <P style="text-align:right;" class="validator-1">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$hash}}</a></P>
            <p style= "text-align:center;">
            <img src="{{ asset('img/usacnegro.jpg') }}"></img>
            </p>
            <br/>
            <div style= "text-align:center; font-size:18px;">
                <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                <br/>
            </div>
            <br/>
            <br/>
            @if($jefatura_puesto == "Jefe")
            <div>
            <p style="text-align:center;" class="parrafo-0">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del 
                Consejo Superior Universitario,</p>
            </div>
            @else
            <p style="text-align:center;" class="parrafo-0">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del 
                Consejo Superior Universitario,</p>
            </div>
            @endif
            <br>
            <div style= "text-align:center; font-size:18px;">
                <strong>Certifica:</strong>
                <br/>
            </div>
            <br>
            <br>
            <div>
            <p style="font-size:16px; text-align:center;">Que según consta en los registros de matrícula</p>
            </div>
            <br>
            <br>
            <div style= "text-align:center; font-size:16px;">
            <strong>{{$nombreCompleto}}</strong>
            </div>
            <br>
            <table style= "text-align:center; width: 100%; font-size: 16px">
                <tr>
                    @if($cod_nac == 30)
                    <td class="table-1"> <b>CUI:</b></td>
                    <td class="table-2"> {{$cui}}</td>
                    @else
                    <td class="table-1"> <b>Pasaporte:</b></td>
                    <td class="table-2"> {{$pasaporte}}</td>
                    @endif
                    <td class="table-3"> <b>REGISTRO ACADÉMICO:</b></td>
                    <td class="table-4">{{$carnet}}</td>
                </tr>
            </table>
            <br/>
            <br/>
            <div>
            <p style="font-size:16px; text-align:center; " class="parrafo-2">Es estudiante de la (el){{$ua}}, carrera: {{$car}}, {{$extension}}, Ciclo académico {{$ciclo}}.</p>
            </div>
            @if($sitAcademica == 2)
            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-2">Observaciones: Pendiente de Exámenes Generales a partir del {{ Carbon\Carbon::parse($fechaCierre)->format('d/m/Y') }}.</p>
            @elseif($sitAcademica == 3)
            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-2">Observaciones: GRADUADO.</p>
            @endif
            @if($sancionTempUA)
            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-2">Observaciones: {{$sancionTempUA}}.</p>
            @endif
            @if($sancion)
            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-2">Observaciones: {{$sancion}}.</p>
            @endif
            @if($repitencia)
            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-2">Observaciones: {{$repitencia}}.</p>
            @endif
            <br/>
            <p style="font-size:16px; text-align:center;" class="parrafo-2">Extendida en la ciudad de Guatemala, el {{$fecha}}</p>
            <br/>
            <br/>
            <div class="visible-print text-center"> 
                <p>{{$jefatura_nombre}}</p>
                <strong style="text-transform:uppercase;">{{$jefatura_puesto}}</strong>
                <br/>
                <br/>
            </div>
            <!--<div style="padding-right: 60px; text-align: right;">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br> <p style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; padding-right: 30px;">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p>
            </div>-->
            <div style="text-align: right;">
            <table style="text-align: left; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 100px; text-align: left; padding-right: 580px;"></td>
                <td style="padding-right: 60px; text-align: center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br> <p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p></td>
            </tr>
            </table>
            </div>
            <br>
            <hr style="background-color:black; ">
            </div>
            <input type="submit" value="Descargar" class="btn btn-primary"/>
            </form>
        </div>
    </div>
</div>
@endsection