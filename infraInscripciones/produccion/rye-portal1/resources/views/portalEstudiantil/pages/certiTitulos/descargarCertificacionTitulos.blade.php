<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ $css }}" rel="stylesheet" type="text/css">
</head>

<body>
<div>

</div>
</body>
<div class="fondo">
    <br/>
    <div>
        <br/>
        <p style="text-align:right; padding-left: 200px; padding-right: 50px; padding-bottom: 0px;" >{!! DNS1D::getBarcodeSVG($hash, 'C93',1)!!}</p>
        <P style="text-align:right; padding-left: 200px; padding-right: 50px; font-size: 10px; padding-top: 0px; margin-top: -10px;">VALIDADOR: <a style ="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$hash}}</a></P>
        <p style="text-align:center;">
            <img src="{{$img}}"></img>
        </p>
        <br />
        <div style="text-align:center; font-size:16px; padding-left: 150px; padding-right: 150px;">
            <strong>LA JEFATURA DEL DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA DE LA 
                    UNIVERSIDAD DE SAN CARLOS DE GUATEMALA.</strong>
            <br />
        </div>
        <br />
        <!--<div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">A solicitud del interesado</p>
        </div>-->
        @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 2) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
        <div style="text-align:center; font-size:18px;">
            <br />
            <strong>Certifica:</strong>
        </div>
        @elseif((($estado <= 10 || $estado == 17) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17) && $tipo_tramite == 3) || (($estado <= 10 || $estado == 17) && $tipo_tramite == 2))
        <div style="text-align:center; font-size:18px;">
            <br />
            <strong>Hace constar que:</strong>
        </div>
        @elseif((($estado <=10 || $estado == 17)) || $tipo_tramite == 4)
        <div style="text-align:center; font-size:18px;">
            <br />
            <strong>Hace constar que:</strong>
        </div>
        @endif
        @if((($estado <= 10 || $estado == 17) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17) && $tipo_tramite == 2) || (($estado <= 10 || $estado == 17) && $tipo_tramite == 3))
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">Según consta en los registros digitales del departamento de Registro y Estadística.</p>
        </div>
        @endif
        @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 2) ||  ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">Que según consta en los registros digitales del departamento de Registro y Estadística.</p>
        </div>
        @endif
        <br/>
        <div style="text-align:center; font-size:18px;">
            <strong>{{$nombre}}</strong>
        </div>
        <table style="text-align:center; width: 100%; font-size: 18px">
            <tr>
                <td style="padding-left: 150px;"> <b>CUI:</b></td>
                <td style="padding-right: 5px; font-weight: bold"> {{$cui}}</td>
                <td style="padding-left: 5px;"> <b>REGISTRO ACADÉMICO:</b></td>
                <td style="padding-right: 150px; font-weight: bold">{{$carnet}}</td>
            </tr>
        </table>
        <br/>
        @if(($estado == 11 && $tipo_tramite == 1) || ($estado == 11 && $tipo_tramite == 3) || ($estado == 11 && $tipo_tramite == 4))
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Cuenta con Título Universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong> con el número de registro <strong>{{$no_titulo}}</strong>.</p>
        </div>
        @elseif((($estado <= 10 || $estado == 17) && $tipo_tramite == 1) || (($estado <= 10 || $estado == 17) && $tipo_tramite == 3) )
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Inició su trámite de impresión y
                registro de Título Universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong>.</p>
        </div>
        @elseif($tipo_tramite == 2 && $estado == 11)
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Cuenta con Título Universitario de incorporación a esta Universidad en <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} con base al Acuerdo de Rectoría No. 0156-2023, en el cual se le expide su vínculo con la(el) <strong>{{$facultad}}</strong> con el número de registro <strong>{{$no_titulo}}</strong>.</p>
        </div>
        @elseif($tipo_tramite == 2 && ($estado <=10 || $estado == 17))
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Inició su trámite impresión y registro de Título Universitario de incorporación a esta Universidad en <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} con base al Acuerdo de Rectoría No. 0156-2023, en el cual se le expide su vínculo con la(el) <strong>{{$facultad}}</strong>.</p>
        </div>
        @elseif($tipo_tramite == 4 && ($estado <=10 || $estado == 17))
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Inició su trámite de reposición de Título Universitario de <strong>{{$nombre_carrera}}</strong> en el grado académico de {{$nivel_academico}} en la(el) <strong>{{$facultad}}</strong>.</p>
        </div>
        @endif
        <p style="font-size:16px; text-align:center; padding-left: 100px; padding-right: 100px;">Extendida en la Ciudad de Guatemala, el {{$fecha}}</p>
        <!--<div style="text-align: center; z-index:1;">
            <img src="{{$firmaJefe}}" width="35%""></img>
            <p style="font-size:16px; margin-top: -75px;">{{$jefatura_nombre}}</p>
            <p style="margin-top: -15px;"><strong style="text-transform:uppercase; font-size:16px;">{{$jefatura_puesto}}</strong></p>
            <br/>
            <br/>
        </div>-->
        <div style="text-align: right;  position: fixed; bottom: 400px">
            <table style="text-align: center; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 150px; text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1;">
                        <div style="width: 300px; margin:0 auto; margin-bottom: -65px">
                        <img src="{{$firmaCoord}}" width="100%" style=""></img>
                        </div>
                        <p style="font-size:16px; ">{{$coordinacion_nombre}}</p>
                        <p style="font-size:16px; margin-top: -10px ">{{$coordinacion_puesto}}</p>
                    </div>
                </td>
                <td style="padding-right: 150px; text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1;">
                        <div style="width: 300px; margin:0 auto;">
                        <img src="{{$firmaJefe}}" width="100%" style="margin-bottom: -70px"></img>
                        </div>
                        <p style="font-size:16px; ">{{$jefatura_nombre}}</p>
                        <p style="font-size:16px; margin-top: -10px; ">{{$jefatura_puesto}}</p>
                    </div>
                </td>
            </tr>
            </table>
        </div>
        <br>
        <br>
        <div style="text-align: right; position: fixed; bottom: 80px">
        <table style= "text-align:left; width: 100%; font-size: 14px">
                <tr>  
                    <td style="padding-left: 150px; text-align: left; font-size: 0.8em;"><p>Para los usos que la entidad receptora considere, deberá validar su autenticidad a través del código QR o ingresando al enlace: https://portalregistro.usac.edu.gt/estudiante/verificarCertificacionTitulos?id={{$cert_transaccion}}</p></td>
                    <td style= "padding-right: 60px; text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacionTitulos?id='.$cert_transaccion))) !!} "></div><p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;">{{$correlativo}}-{{$cod_ua}}-{{$ciclo}}</p></td> 
                </tr>
        </table>
        </div>
        <p style="font-size:0.8em; text-align:left; padding-left: 55px; padding-right: 50px; position: fixed; bottom: 20px"><br/>Cc/ Archivo</p>
        <br>
        <div style="text-align:center; font-size:14px; position:fixed; bottom: 10px; width: 100%;"> 
            <strong>IMPRESA EL {{date('d/m/Y')}} A LAS {{date('H:i:s')}} HORAS</strong>
        </div>
        <div style="position: fixed; bottom: 0; width: 100%;">
        <img src="{{$registro}}" style="width:1000px; z-index:-1; position:relative; opacity: .60;">
        </div>
    </div>
</div>
</body>
<html>