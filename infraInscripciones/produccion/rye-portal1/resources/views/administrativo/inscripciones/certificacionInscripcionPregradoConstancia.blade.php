@extends('layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        <h5>Certificación Inscripción</h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div>
                <form action="{{route('administrativo.inscripciones.descargarCertificacionPregrado')}}" method="GET">
                    <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo" />
                    <input hidden value="{{$carnet}}" id="carnet" name="carnet" />
                    <input hidden value="{{$cui}}" id="cui" name="cui">
                    <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto" />
                    <input hidden value="{{$ua}}" id="ua" name="ua" />
                    <input hidden value="{{$car}}" id="car" name="car" />
                    <input hidden value="{{$extension}}" id="extension" name="extension" />
                    @if(!empty($jefatura_puesto) AND !empty($jefatura_nombre))
                    <input hidden value="{{$jefatura_nombre}}" id="jefe_nombre" name="jefe_nombre" />
                    <input hidden value="{{$jefatura_puesto}}" id="jefe_puesto" name="jefe_puesto" />
                    @endif
                    <input hidden value="{{$fecha}}" id="fecha" name="fecha" />
                    <input hidden value="{{$cert_numero}}" id="cert_numero" name="cert_numero" />
                    <input hidden value="{{$cert_ua}}" id="cert_ua" name="cert_ua" />
                    <input hidden value="{{$cert_ciclo}}" id="cert_ciclo" name="cert_ciclo" />
                    <input hidden value="{{$cert_transaccion}}" id="id" name="id" />
                    <input hidden value="{{$hash}}" id="hash" name="hash" />
                    <input hidden value="{{$fechaVencimiento}}" id="fechaVencimiento" name="fechaVencimiento" />
                    <input hidden value="{{$firma}}" id="firma" name="firma" />
                    <input hidden value="{{$iniciales}}" id="iniciales" name="iniciales" />
                    <input hidden value="{{$descripcion}}" id="descripcion" name="descripcion" />
                    <input hidden value="{{$fechaCierre}}" id="fechaCierre" name="fechaCierre" />
                    <input hidden value="{{$sitAcademica}}" id="sitAcademica" name="sitAcademica" />
                    <input hidden value="{{$codNacionalidad}}" id="codNacionalidad" name="codNacionalidad" />
                    <input hidden value="{{$pasaporte}}" id="pasaporte" name="pasaporte" />
                    <input hidden value="{{$sancionTempUA}}" id="sancionTempUA" name="sancionTempUA" />
                    <input hidden value="{{$sancion}}" id="sancion" name="sancion" />
                    <input hidden value="{{$repitencia}}" id="repitencia" name="repitencia"/>
                    <input hidden value="{{$activo}}" id="activo" name="activo"/>
                    <div style="background-color:white;">
                        <br>
                        <p style="text-align:right; padding-left: 200px; padding-right: 50px;">{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
                        <P style="text-align:right; padding-left: 200px; padding-right: 50px; font-size: 12px; padding-top: 0px;margin-top: -10px;">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$hash}}</a></P>
                        <p style="text-align:center;">
                            <img src="{{ asset('img/usacnegro.jpg') }}"></img>
                        </p>
                        <br />
                        <div style="text-align:center; font-size:18px;">
                            <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                            <br />
                        </div>
                        <br />
                        <br />
                        @if($firma == 2)
                        @if($jefatura_puesto == "Jefe")
                        <div>
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                                de Guatemala,</p>
                        </div>
                        @else
                        <div>
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                                de Guatemala,</p>
                        </div>
                        @endif
                        <br>
                        <br>
                        @else
                        @if($jefatura_puesto == "Jefe")
                        <div>
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                                de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                                Consejo Superior Universitario,</p>
                        </div>
                        @else
                        <div>
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                                de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                                Consejo Superior Universitario,</p>
                        </div>
                        @endif
                        <br>
                        @endif
                        <div style="text-align:center; font-size:18px;">
                            <strong>Certifica:</strong>
                            <br />
                        </div>
                        <br>
                        <br>
                        <div>
                            <p style="font-size:16px; text-align:center;">Que según consta en los registros de matrícula</p>
                        </div>
                        <br>
                        <br>
                        <div style="text-align:center; font-size:16px;">
                            <strong>{{$nombreCompleto}}</strong>
                        </div>
                        <br>
                        <table style="text-align:center; width: 100%; font-size: 16px">
                            <tr>
                                @if($codNacionalidad == 30)
                                <td style="padding-left: 300px;"> <b>CUI:</b></td>
                                <td style="padding-right: 15px;"> {{$cui}}</td>
                                @else
                                <td style="padding-left: 300px;"> <b>Pasaporte:</b></td>
                                <td style="padding-right: 15px;"> {{$pasaporte}}</td>
                                @endif
                                <td style="padding-left: 15px;"> <b>REGISTRO ACADÉMICO:</b></td>
                                <td style="padding-right: 300px;">{{$carnet}}</td>
                            </tr>
                        </table>
                        <br />
                        <br />
                        <br />
                        <div>
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Es estudiante de la (el){{$ua}}, carrera: {{$car}}, {{$extension}}, en el(los) año(s) {{$ciclo}}.</p>
                        </div>
                        @if($sitAcademica == 2)
                        <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Observaciones: Pendiente de Exámenes Generales a partir del {{ Carbon\Carbon::parse($fechaCierre)->format('d/m/Y') }}.</p>
                        @elseif($sitAcademica == 3)
                            @if($activo ==1 && $car == "Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado")
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Observaciones: Pendiente de Exámenes Generales.</p>
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Graduado en la Licenciatura en Ciencias Jurídicas y Sociales</p>
                            @else
                            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Observaciones: GRADUADO.</p>
                            @endif
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
                        <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Extendida en la ciudad de Guatemala, el {{$fecha}}</p>
                        <br />
                        <br />
                        <div class="visible-print text-center">
                            <p>{{$jefatura_nombre}}</p>
                            <strong style="text-transform:uppercase;">{{$jefatura_puesto}}</strong>
                            <br />
                            <br />
                        </div>
                        <!--<div style="padding-right: 60px; text-align: right;">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br> <p style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; padding-right: 30px;">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p>
            </div>-->
                        <div style="text-align: right;">
                            <table style="text-align: left; width: 100%; font-size: 14px;">
                                <tr>
                                    <td style="padding-left: 100px; text-align: left; padding-right: 510px;">Elaboró {{$iniciales}}</td>
                                    <td style="padding-right: 60px; text-align: center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></br>
                                        <p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <hr style="background-color:black; ">
                    </div>
                    @if(empty($jefatura_puesto) AND empty($jefatura_nombre))
                    <div class="form-row justify-content-start">
                        <div class="col-1.5" style="align-items: center; display: flex;">
                            <label for="jefe_puesto">Linea de Firma</label>
                        </div>
                        <div class="col-12 col-lg-2">
                            <select id="jefe_puesto" name="jefe_puesto" class="form-select form-control">
                                <option value="JEFE">Jefe</option>
                                <option value="SUBJEFE">Subjefe</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-1">
                            <input type="submit" value="Descargar" class="btn btn-primary" />
                        </div>
                    </div>
                    @else
                    <input type="submit" value="Descargar" class="btn btn-primary" />
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection