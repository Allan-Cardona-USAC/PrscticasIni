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
    <h2 style="text-align:center;">Certificación de Titulo</h2>
    <div>
            <div style="background-color:white;">
                <br>
                <p class="formatpadding fontsize16 textalign-right">{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
                <P class="formatpadding fontsize10 textalign-right paddingtop0 margintop-20">VALIDADOR: <a class="validadorformat">{{$hash}}</a></P>
                <p class="textalign-center d-flex justify-content-center">
                    <img src="{{ asset('img/logousac.png') }}"></img>
                </p>
                <br />
                <div class="textalign-center">
                    <strong class="fontsize18">LA JEFATURA DEL DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA DE LA <br> 
                    UNIVERSIDAD DE SAN CARLOS DE GUATEMALA.</strong>
                    <br />
                </div>
                <br />
                <!--<div>
                <p class="formatpadding fontsize16 textalign-center">A solicitud del interesado</p>
                </div>-->
                @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 2) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
                <div style="text-align:center; font-size:18px;">
                    <strong>Certifica:</strong>
                    <br />
                </div>
                @elseif((($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19)  && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 3) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 2))
                <div style="text-align:center; font-size:18px;">
                    <strong>Hace constar que:</strong>
                    <br />
                </div>
                @elseif((($estado <=10 || $estado == 17 || $estado == 18 || $estado == 19)) || $tipo_tramite == 4)
                <div style="text-align:center; font-size:18px;">
                    <strong>Hace constar que:</strong>
                    <br />
                </div>
                @endif
                @if((($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 2) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 3))
                <br/>
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Según consta en los registros digitales del departamento de Registro y Estadística.</p>
                </div>
                <br>
                @endif
                @if(($estado == 11  && $tipo_tramite == 1)  || ($estado == 11 && $tipo_tramite == 2) ||  ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
                <br/>
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Que según consta en los registros digitales del departamento de Registro y Estadística.</p>
                </div>
                <br>
                @endif
                <br>
                <div style="text-align:center; font-size:16px;">
                    <strong>{{$nombre}}</strong>
                </div>
                <br>
                <table style="text-align:center; width: 100%; font-size: 16px">
                    <tr>
                        <td class="paddingleft300"> <b>CUI:</b></td>
                        <td class="paddingright15"> {{$cui}}</td>
                        <td class="paddingleft15"> <b>REGISTRO ACADÉMICO:</b></td>
                        <td class="paddingright300">{{$carnet}}</td>
                    </tr>
                </table>
                <br />
                @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Cuenta con Título Universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong> con el número de registro <strong>{{$no_titulo}}</strong>.</p>
                </div>
                @elseif($estado == 11 && $tipo_tramite == 2)
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Cuenta con Título Universitario de incorporación a esta Universidad en <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} con base al Acuerdo de Rectoría No. 0156-2023, en el cual se le expide su vínculo con la(el) <strong>{{$facultad}}</strong> con el número de registro <strong>{{$no_titulo}}</strong>.</p>
                </div>
                @elseif((($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17 || $estado == 18 || $estado == 19) && $tipo_tramite == 3))
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Inició su trámite de impresión y
                        registro de Título Universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong>.</p>
                </div>
                @elseif($tipo_tramite == 2 && ($estado <=10 || $estado == 17 || $estado == 18 || $estado == 19))
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Inició su trámite de impresión y registro de Título Universitario de incorporación a esta Universidad en <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} con base al Acuerdo de Rectoría No. 0156-2023, en el cual se le expide su vínculo con la(el) <strong>{{$facultad}}</strong>.</p>
                </div>
                @elseif($tipo_tramite == 4 && ($estado <=10 || $estado == 17 || $estado == 18 || $estado == 19))
                <div>
                    <p class="formatpadding fontsize16 textalign-center">Inició su trámite de reposición de Título Universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong>.</p>
                </div>
                @endif
                <br />
                <p class="formatpadding fontsize16 textalign-center">Extendida en la Ciudad de Guatemala, el {{$fecha}}</p>
                <br />
                <!--<div class="visible-print text-center">
                    <p>{{$jefatura_nombre}}</p>
                    <strong style="text-transform:uppercase;">{{$jefatura_puesto}}</strong>
                    <br />
                    <br />
                </div>-->
                <div style="text-align: right;">
                <table style="text-align: left; width: 100%; font-size: 14px;">
                <tr>
                    <td class="paddingleft200 textalign-left paddingright180 displaychange"></td>
                    <td style=" text-align: center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('/estudiante/verificarCertificacionTitulos?id='.$transaccion))) !!} "><p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;">{{$correlativo}}-{{$cod_ua}}-{{$ciclo}}</p></td>
                </tr>
                </table>
                </div>
                <br>
                <hr style="background-color:black; ">
            </div>
    </div>
</div>
@endsection