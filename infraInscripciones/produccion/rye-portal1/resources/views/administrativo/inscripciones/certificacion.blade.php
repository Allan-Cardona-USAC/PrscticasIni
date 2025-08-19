@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class="card">
    <div class="card-header">
        <h5>Certificación</h5>
    </div>
    <div class="card-body">
    <div class="container">
        <div>
            <form action="{{ route('administrativo.inscripciones.descargaCertificacion') }}" method="GET">
            <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo"/>
            <input hidden value="{{$carnet}}" id="carnet" name="carnet"/>
            <input hidden value="{{$cui}}" id="cui" name="cui">
            <input hidden value="{{$nombre}}" id="nombre" name="nombre"/>
            <input hidden value="{{$cod_ua}}" id="cod_ua" name="cod_ua"/>
            <input hidden value="{{$cod_carrera}}" id="cod_carrera" name="cod_carrera"/>
            <input hidden value="{{$extension}}" id="extension" name="extension"/>
            <input hidden value="{{$jefatura_nombre}}" id="jefe_nombre" name="jefe_nombre"/>
            <input hidden value="{{$jefatura_puesto}}" id="jefe_puesto" name="jefe_puesto"/>
            <input hidden value="{{$fecha}}" id="fecha" name="fecha"/>
            <input hidden value="{{$correlativo}}" id="correlativo" name="correlativo"/>
            <input hidden value="{{$facultad}}" id="facultad" name="facultad"/>
            <input hidden value="{{$transaccion}}" id="transaccion" name="transaccion"/>
            <input hidden value="{{$descripcion}}" id="descripcion" name="descripcion"/>
            <input hidden value="{{$noBoletaPago}}" id="noBoletaPago" name="noBoletaPago"/>
            <input hidden value="{{$fecha_usr}}" id="fecha_usr" name="fecha_usr"/>
            <input hidden value="{{$carrera}}" id="carrera" name="carrera"/>
            <input hidden value="{{$nivel}}" id="nivel" name="nivel"/>
            <input hidden value="{{$hash}}" id="hash" name="hash"/>
            <input hidden value="{{$fechaVencimiento}}" id="fechaVencimiento" name="fechaVencimiento"/>
            <input hidden value="{{$fechaCierre}}" id="fechaCierre" name="fechaCierre" />
            <input hidden value="{{$sitAcademica}}" id="sitAcademica" name="sitAcademica" />
            <input hidden value="{{$codNacionalidad}}" id="codNacionalidad" name="codNacionalidad" />
            <input hidden value="{{$pasaporte}}" id="pasaporte" name="pasaporte" />
            <input hidden value="{{$sancionTempUA}}" id="sancionTempUA" name="sancionTempUA" />
            <input hidden value="{{$sancion}}" id="sancion" name="sancion" /> 
            <input hidden value="{{$repitencia}}" id="repitencia" name="repitencia" />  
            <div style= "background-color:white;">
            <br>
            <p style="text-align:right; padding-left: 200px; padding-right: 50px;" >{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
            <p style="text-align:right; padding-left: 200px; padding-right: 50px; font-size: 12px; padding-top: 0px;margin-top: -10px;">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$hash}}</a></p>
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
            <strong>{{$nombre}}</strong>
            </div>
            <br>
            <table style= "text-align:center; width: 100%; font-size: 16px">
                <tr>
                    @if($codNacionalidad == 30)
                    <td style= "padding-left: 300px;"> <b>CUI:</b></td>
                    <td style= "padding-right: 15px;"> {{$cui}}</td>
                    @else
                    <td style= "padding-left: 300px;"> <b>Pasaporte:</b></td>
                    <td style= "padding-right: 15px;"> {{$pasaporte}}</td>
                    @endif
                    <td style= "padding-left: 15px;"> <b>REGISTRO ACADÉMICO:</b></td>
                    <td style= "padding-right: 300px;">{{$carnet}}</td>
                </tr>
            </table>
            <br/>
            <br/>
            <br/>
            <div>
            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Es estudiante de la (el) {{$facultad}}, carrera: {{$carrera}}, {{$extension}}, en el(los) año(s) {{$descripcion}}.</p>
            </div>
            @if($sitAcademica == 2)
            <br/>
            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Observaciones: Pendiente de Exámenes Generales a partir del {{ Carbon\Carbon::parse($fechaCierre)->format('d/m/Y') }}.</p>
            @elseif($sitAcademica == 3)
            <br/>
            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Observaciones: GRADUADO.</p>
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
            <br/>
            <br/>
            <div class="visible-print text-center"> 
                
                <p>{{$jefatura_nombre}}</p>
                <strong style="text-transform:uppercase;">{{$jefatura_puesto}}</strong>
            </div>
            <br>

            <table style= "text-align:left; width: 100%; font-size: 16px">
                <tr>
                    @if($nivel == 3)
                    <td style= "font-size:13px; padding-left: 200px;"><p>Tasa Universitaria Q20.00<br>Recibo No. {{$noBoletaPago}} de Fecha {{\Carbon\Carbon::parse($fecha_usr)->format('d/m/Y')}}</p></td>
                    <!--<td style= "font-size:13px; padding-right: 200px; text-align:center;" rowspan="0"><p>{!! QrCode::size(80)->generate(url("estudiante/verificarCertificacion?idTransaccion=".$transaccion)); !!}</a></p></td>-->
                    <td style= "font-size:13px; padding-left: 200px; text-align:center;" rowspan="0"><p><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(110)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$transaccion))) !!} "></a><p></td>
                    @else
                    <!--<td style= "font-size:13px; padding-left: 450px; text-align:center;" rowspan="0"><p>{!! QrCode::size(80)->generate(url("estudiante/verificarCertificacion?idTransaccion=".$transaccion)); !!}</a></p></td>-->
                    <div style="text-align: right;">
                    <td style="padding-left: 100px; text-align: left; padding-right: 580px;"></td>
                    <td style="padding-right: 60px; text-align: center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$transaccion))) !!} "></br> <p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;">{{$correlativo}}-{{$cod_ua}}-{{$ciclo}}</p></td>
                    <!--<td style= "font-size:13px; padding-left: 450px; text-align:center;" rowspan="0"><p style="text-align:right; padding-right: 60px;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(110)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$transaccion))) !!} "></a><p></td>-->
                    @endif  
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
@endsection