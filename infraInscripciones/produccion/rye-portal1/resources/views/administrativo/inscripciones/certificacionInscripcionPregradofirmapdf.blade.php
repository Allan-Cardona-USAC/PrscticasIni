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
        <P style="text-align:right; padding-left: 200px; padding-right: 50px; font-size: 10px; padding-top: 0px;margin-top: -10px;">VALIDADOR: <a style="font-size:14px; text-align:right; margin-top:5px; font-weight:bold;font-size:1.01em; color: #0f2649">{{$hash}}</a></P>
        <p style="text-align:center;">
            <img src="{{$img}}"></img>
        </p>
        <br />
        <div style="text-align:center; font-size:16px;">
            <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
        </div>
        <br />
        @if($firma == 1)
        @if($puesto == "Jefe")
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                Consejo Superior Universitario,</p>
        </div>
        @else
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala, con base en el Punto Séptimo, Inciso 7.16 del Acta No. 21-2013 de fecha 14 de Noviembre de 2013, del
                Consejo Superior Universitario,</p>
        </div>
        @endif
        @else
        @if($puesto == "Jefe")
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Jefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala,</p>
        </div>
        @else
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 110px; padding-right: 110px;">La Subjefatura del Departamento de Registro y Estadística de la Universidad de San Carlos
                de Guatemala,</p>
        </div>
        @endif
        @endif
        <div style="text-align:center; font-size:18px;">
            <br/>
            <strong>Certifica:</strong>
            <p style="font-size:16px; text-align:center; margin-top: -5px;">Que según consta en los registros de matrícula</p>
        </div>
        <div style="text-align:center; font-size:18px;">
            <strong>{{$nombreCompleto}}</strong>
        </div>
        <table style="text-align:center; width: 100%; font-size: 18px">
            <tr>
                @if($codNacionalidad == 30)
                <td style="padding-left: 150px;"> <b>CUI:</b></td>
                <td style="padding-right: 5px; font-weight: bold"> {{$cui}}</td>
                @else
                <td style="padding-left: 150px;"> <b>Pasaporte:</b></td>
                <td style="padding-right: 5px; font-weight: bold"> {{$pasaporte}}</td>
                @endif
                <td style="padding-left: 5px;"> <b>REGISTRO ACADÉMICO:</b></td>
                <td style="padding-right: 150px; font-weight: bold">{{$carnet}}</td>
            </tr>
        </table>
        <br/>
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px; word-wrap: break-word;">Es estudiante de la (el) {{$ua}}, carrera: {{$car}}, {{$extension}}, Ciclo académico @foreach($ciclo as $ciclos) @if($ciclos == end($ciclo)) {{$ciclos}}.@else {{$ciclos}}, @endif @endforeach</p>
        </div>
        @if($sitAcademica == 2)
        <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: Pendiente de Exámenes Generales a partir del {{ Carbon\Carbon::parse($fechaCierre)->format('d/m/Y') }}.</p>
        @elseif($sitAcademica == 3)
            @if($activo ==1 && $car == "Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado")
                <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: Pendiente de Exámenes Generales.</p>
                <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Graduado en la Licenciatura en Ciencias Jurídicas y Sociales</p>
            @else
                <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: GRADUADO.</p>
            @endif
        @endif
        @if($sancionTempUA)
        <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: {{$sancionTempUA}}.</p>
        @endif
        @if($sancion)
        <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: {{$sancion}}.</p>
        @endif
        @if($repitencia)
        <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: {{$repitencia}}.</p>
        @endif
        @if($activo == -4)
        <p style="font-size:16px; text-align:center; padding-left: 50px; padding-right: 50px;">Observaciones: <strong> Expulsado </strong>.</p>
        @endif
        <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Extendida en la Ciudad de Guatemala, el {{$fecha}}</p>
        @if($firma == 1)
        <div style="text-align: center; z-index:1;">
            <img src="{{$firmaJefe}}" width="35%"></img>
            <p style="font-size:16px; margin-top: -75px;">{{$jefatura_nombre}}</p>
            <p style="margin-top: -15px;"><strong style="text-transform:uppercase; font-size:16px; ">{{$puesto}}</strong></p>
            <br/>
            <br/>
        </div>
        @else
        <div style="text-align: center;">
            <br/>
            <br/>
            <br/>
            <br/>
            <p style="font-size:16px;">{{$jefatura_nombre}}</p>
            <p style="margin-top: -15px;"><strong style="text-transform:uppercase; font-size:16px; ">{{$puesto}}</strong></p>
            <br/>
            <br/>
        </div>
        @endif
        <br>
        <br>
        <br/>
        <div style="text-align: right; position:fixed; bottom: 80px;">
            <table style="text-align: left; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 150px; text-align: left; font-size: 0.8em;"><span><p>Esta certificación es válida hasta el {{$fechaVencimiento}} y para los usos que la entidad receptora considere, deberá validar su autenticidad a través del código QR o ingresando al enlace: https://portalregistro.usac.edu.gt/estudiante/verificarCertificacion?id={{$cert_transaccion}}</p></span></td>
                <td style="padding-right: 60px; text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarCertificacion?id='.$cert_transaccion))) !!} "></div></br> <p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;">{{$cert_numero}}-{{$cert_ua}}-{{$cert_ciclo}}</p></td>
            </tr>
            </table>
        </div>
        <p style="font-size:0.8em; text-align:left; padding-left: 55px; padding-right: 50px; position:fixed; bottom: 15px;">Elaboró {{$operador}}</p>
        <br>
        <div style="text-align:center; font-size:14px; position:fixed; bottom: 10px; width: 100%;"> 
            <strong>IMPRESA EL {{date('d/m/Y')}} A LAS {{date('H:i:s')}} HORAS</strong>
        </div>
        <div style="position: fixed; bottom: 0; width: 100%;">
        <img src="{{$registro}}" style="width:1000px; z-index:-1; position:relative; opacity: .60;">
        </div>
    </div>
</div>
<html>