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
        <p style="text-align:right; padding-left: 200px; padding-right: 50px; padding-bottom: 0px;" >{!! DNS1D::getBarcodeSVG($barcode, 'C93',1)!!}</p>
        <p style="text-align:right; padding-left: 200px; padding-right: 50px; font-size: 10px; padding-top: 0px; margin-top: -10px;">VALIDADOR: <a style ="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$barcode}}</a></p>
        <p style="text-align:center;">
            <img src="{{$img}}"></img>
        </p>
        <br />
        <div style="text-align:center; font-size: 20px;">
            <strong>CONSTANCIA DE EXPEDIENTE ESTUDIANTIL</br><!--@if($nivel_academico == 1)PREGRADO @elseif($nivel_academico == 2)GRADO @elseif($nivel_academico == 3)POSTGRADO @endif--></strong>
            <br />
        </div>
        <br />
        <div style="padding-left: 110px; padding-right: 110px;">
            <table style= "width: 100%; text-align:center; font-size: 16px">
            
                <tr>
                    <td style= "text-align: left;"> <b>Para trámite de:</b></td>
                    @if($tipoConstancia == 1 OR $tipoConstancia == 4)
                    <td style= "padding-left: 15px; text-align: left;"><strong>Graduación e Impresión de Título</strong></td>
                    @elseif($tipoConstancia == 2)
                    <td style= "padding-left: 15px; text-align: left;"><strong>Graduación</strong></td>
                    @endif
                </tr>
                <tr>
                <td style= "text-align: left;"> <b>REGISTRO ACADÉMICO:</b></td>
                <td style= "padding-left: 15px; text-align: left;"><strong>{{$carnet}}</strong></td>
                </tr>
                <tr>
                @if($codNacionalidad == 30)
                <td style= "text-align: left;"> <b>CUI:</b></td>
                <td style= "padding-left: 15px; text-align: left;"> <strong>{{$cui}}</strong></td>
                @else
                <td style= "text-align: left;"> <b>PASAPORTE:</b></td>
                <td style= "padding-left: 15px; text-align: left;"> <strong>{{$cui}}</strong></td>
                @endif
                </tr>
                <tr>
                    <td style= "text-align: left;"> <b>Nombre:</b></td>
                    <td style= "padding-left: 15px; text-align: left;"> <strong>{{$nombre}}</strong></td>
                </tr>
                <tr>
                    <td style= "text-align: left;"> <b>Carrera:</b></td>
                    <td style= "padding-left: 15px; text-align: left;"><strong> {{$nombre_carrera}}</strong></td>
                </tr>
            </table>
            </div>
            <br>
            @if($tipoConstancia == 2)
                <img style="position: fixed; right: -30;  top: 190; width: 20%;" src="{{$provisional}}"></img>
            @endif
            <br>
        <!--<div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala,</p>
        </div>-->

            <!--<br />
            <strong>Certifica:</strong>
            <br/>-->
            <br>
            @if($usuarioLinea != 1)
            <p style="font-size:16px; text-align:center; margin-top: -5px; padding-left: 110px; padding-right: 110px;">Generada por el archivo del Departamento de Registro y Estadística, el cual hace constar que el expediente de estudiante se encuentra @if($tipoConstancia == 1 OR $tipoConstancia == 4) <strong> COMPLETO </strong> @elseif($tipoConstancia == 2) <strong> INCOMPLETO </strong> @endif por lo que se extiende la presente.</p>
            @else
            <p style="font-size:16px; text-align:center; margin-top: -5px; padding-left: 110px; padding-right: 110px;">Generada por el archivo del Departamento de Registro y Estadística, el cual hace constar que el estudiante @if($tipoConstancia == 1 OR $tipoConstancia == 4)<strong>COMPLETÓ</strong> @elseif($tipoConstancia == 2) tiene <strong> INCOMPLETO </strong> @endif los requisitos de inscripción en línea según lo resuelto en el acta No. 09-2017. Punto Séptimo, Inciso 7.2 Para el primer ingreso.</p>
            @endif
        <br/>
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">Expediente verificado en la Ciudad de Guatemala, el {{$fecha_usr}}</p>
        </div>
        <br>
        <div style="text-align: center; z-index:1;">
            <img src="{{$firma}}" width="35%"></img>
            <p style="font-size:16px; margin-top: -50px;">{{$encargado_nombre}}</p>
            <br/>
            <br/>
        </div>
        <br>
        <!--<div style="text-align: right; width: 100%;">
        <table style= "text-align:left; width: 100%; font-size: 14px;">
                <tr>  
                <td style= "text-align: center;"><div style=""><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div><br/><p style="font-size:14px; text-align:center; margin-top:-15px; font-weight:bold;font-size:1.01em;"></p></td>
                </tr>
                <tr> --> 
                    <!--<td style="padding-left: 200px; padding-right: 200px; text-align: center; font-size: 14px;"><p>Para los usos que la entidad receptora considere, deberá validar su autenticidad a través del código QR o ingresando al enlace: https://portalregistro.usac.edu.gt/estudiante/verificarConstanciaArchivos?id={{$transaccion}}</p></td>-->
                    <!--<td style= "padding-right: 110px; text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div><br/><p style="font-size:14px; text-align:center; margin-top:-15px; font-weight:bold;font-size:1.01em;"></p></td>-->
                <!--</tr>
        </table>-->
        <div style="text-align: right; position:fixed; bottom: 80px;">
            <table style="text-align: left; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 150px; text-align: left; font-size: 0.8em;"><span><p>Esta constancia es válida para los usos que la entidad receptora considere, deberá validar su autenticidad a través del código QR o ingresando al enlace: https://portalregistro.usac.edu.gt/estudiante/verificarConstancia?id={{$transaccion}}</p></span></td>
                <td style="padding-right: 60px; text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div></br> <p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;"></p></td>
            </tr>
            </table>
        </div>
        </div>
        <br>
        @if($iniciales)
        <p style="font-size:0.8em; text-align:left; padding-left: 55px; padding-right: 50px; position: fixed; bottom: 15px">Elaboró {{$iniciales}}</p>
        @endif
        <!--<div style="text-align: right; position:fixed; bottom: 5px; width: 100%;">
                    <p style="padding-left: 0px; padding-right: 0px; text-align: center; font-size: 0.7em;"><strong> Para los usos que la entidad receptora considere, deberá validar su autenticidad a través del código QR o ingresando al enlace: https://portalregistro.usac.edu.gt/estudiante/verificarConstanciaArchivos?id={{$transaccion}}</strong></p></td>-->
                    <!--<td style= "padding-right: 110px; text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div><br/><p style="font-size:14px; text-align:center; margin-top:-15px; font-weight:bold;font-size:1.01em;"></p></td>-->
        <!--</div>-->

        <div style="text-align:center; font-size:14px; position:fixed; bottom: 40px; width: 100%;"> 
            <strong>IMPRESA EL {{date('d/m/Y')}} A LAS {{date('H:i:s')}} HORAS</strong>
        </div>
        @if(!empty($fechaVencimiento))
        <div style="text-align:center; font-size:10px; position:fixed; bottom: 0px; width: 100%;">
            <p style="padding-left: 110px; padding-right: 110px;"> <strong>Esta constancia caduca el {{\Carbon\Carbon::parse($fechaVencimiento)->format('d/m/Y')}}</strong></p>
        </div>
        @else
        <div style="text-align:center; font-size:10px; position:fixed; bottom: 0px; width: 100%;">
            <p style="padding-left: 110px; padding-right: 110px;"> <strong>La constancia efectuada no tiene fecha de caducidad</strong></p>
        </div>
        @endif
        <div style="position: fixed; bottom: 0; width: 100%;">
        <img src="{{$registro}}" style="width:1000px; z-index:-1; position:relative; opacity: .60;">
        </div>
        @if($tipoConstancia == 1 OR $tipoConstancia == 4)
        <div style="text-align:left; font-size:10px; position:fixed; bottom: 15px; left:70px;  width: 100%;"> 
            <strong>DRE-006</strong>
        </div>
        @endif
    </div>
</div>
</body>
<html>