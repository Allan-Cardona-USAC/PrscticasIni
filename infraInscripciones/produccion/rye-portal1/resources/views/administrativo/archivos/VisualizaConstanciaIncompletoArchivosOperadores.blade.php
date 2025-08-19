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
            <form action="{{ route('administrativo.archivos.DescargarConstanciaArchivosIncompleto') }}" method="GET">
            <input hidden value="{{$carnet}}" id="carnet" name="carnet"/>
            <input hidden value="{{$cui}}" id="cui" name="cui">
            <input hidden value="{{$nombre}}" id="nombre" name="nombre"/>
            <input hidden value="{{$cod_ua}}" id="cod_ua" name="cod_ua"/>
            <input hidden value="{{$cod_carrera}}" id="cod_carrera" name="cod_carrera"/>
            <input hidden value="{{$cod_ext}}" id="cod_ext" name="cod_ext"/>
            <input hidden value="{{$nivel_academico}}" id="nivel" name="nivel"/>
            <input hidden value="{{$transaccion}}" id="transaccion" name="transaccion"/>
            <input hidden value="{{$certificacion_id}}" id="certificacion_id" name="certificacion_id"/>
            <input hidden value="{{$barcode}}" id="barcode" name="barcode"/>
            <input hidden value="{{$usuarioLinea}}" id="usuarioLinea" name="usuarioLinea"/>
            <input hidden value="{{$ciclos}}" id="ciclos" name="ciclos"/>
            <input hidden value="{{$nomfacultad}}" id="nomfacultad" name="nomfacultad"/>
            <input hidden value="{{$nomextension}}" id="nomextension" name="nomextension"/>
            <input hidden value="{{$nomcarrera}}" id="nomcarrera" name="nomcarrera"/>
            <input hidden value="{{$fecha_usr}}" id="fecha_usr" name="fecha_usr"/> 
            <input hidden value="{{$expediente}}" id="expediente" name="expediente"/>
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
                <strong>El Infrascrito Jefe del Departamento de Registro y Estadística </strong>
                <br/>
            </div>
            <div style= "text-align:center; font-size:18px;">
            <strong>de la Universidad de San Carlos de Guatemala</strong>
            <br/>
            </div>
            <br/>
            <br>
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
                <strong>{{$nombre}}</strong>
            </div>
            <br>
            <table style="text-align:center; width: 100%; font-size: 16px">
                <tr>
                    <td style="padding-left: 300px;"> <b>REGISTRO ACÁDEMICO:</b></td>
                    <td style="padding-right: 15px;"> {{$carnet}}</td>
                    @if($codNacionalidad == 30)
                    <td style="padding-left: 15px;"> <b>CUI:</b></td>
                    <td style="padding-right: 300px;">{{$cui}}</td>
                    @else
                    <td style="padding-left: 15px;"> <b>PASAPORTE:</b></td>
                    <td style="padding-right: 300px;">{{$cui}}</td>
                    @endif
                </tr>
            </table>
            <br />
            <br />
            <br />
            <div>
                <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Es estudiante de la (el){{$nomfacultad}}, {{$nomextension}}, {{$nomcarrera}}, durante el Ciclo Académico {{$ciclos}}.</p>
            </div>

            <div>
                <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;"> Observaciones: @if($usuarioLinea != 1)Documentos que se encuentran en el expediente: @else Estudiante inscrito en línea @endif </p>
            @if($usuarioLinea !=1)
                <ul type="circle" class="" style="padding-left: 450px; padding-right: 200px;">    
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
                    <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">El estudiante completó los requisitos de inscripción en línea según lo resuelto en el acta No. 09-2017. Punto Séptimo, Inciso 7.2 para el primer ingreso.</p>
            @endif
            </div>

            <br>
            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Expediente verificado en la Ciudad de Guatemala, el {{$fecha_usr}}</p>
            <div>
            <!--<p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala,</p>
            </div> -->
            <!--<div style= "text-align:center; font-size:18px;">
                <strong>Constancia:</strong>
                <br/>
            </div>-->
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