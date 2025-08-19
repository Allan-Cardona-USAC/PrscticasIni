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
        <div style="text-align:center; font-size: 18px;">
            <strong>El Infrascrito Jefe del Departamento de Registro y Estadística </strong>
            <br/>
        </div>
        <div style= "text-align:center; font-size:18px;">
        <strong>de la Universidad de San Carlos de Guatemala</strong>
        <br />
        </div>
        <br/>
        <div style="text-align:center; font-size:18px;">
                <strong>Certifica:</strong>
                <br />
        </div>
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
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Es estudiante de la (el)<strong>{{$nomfacultad}}, {{$nomextension}}, {{$nomcarrera}}, durante el Ciclo Académico {{$ciclos}}</strong></p>
        </div>
        <div>
            <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;"> Observaciones: @if($usuarioLinea != 1)Documentos que se encuentran en el expediente: @else Estudiante inscrito en línea @endif </p>
            @if($usuarioLinea != 1)
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
        <p style="font-size:16px; text-align:center; padding-left: 200px; padding-right: 200px;">Expediente verificado en la Ciudad de Guatemala, el {{$fecha_usr}}</p>
        <br>
        <br>
        <br>
        <div style="text-align: right;">
            <table style="text-align: left; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 150px; text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1;">
                        <img src="{{$firma}}" width="92%" style="margin-bottom: 10px;"></img>
                        <p style="font-size:16px; margin-top: -60px;">{{$encargado_nombre}}</p>
                    </div>
                    <p style="font-size:16px; margin-top: -20px;">{{$encargado_puesto}}</p>
                </td>
                <td style="padding-right: 150px; text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1;">
                        <img src="{{$firmajef}}" width="88%" style="margin-top: 10px;"></img>
                        <p style="font-size:16px; margin-top: -70px;">{{$jefatura_nombre}}</p>
                    </div>
                    <p style="font-size:16px; margin-top: -20px;">{{$jefatura_puesto}}</p>
                </td>
            </tr>
            </table>
        </div>
        <br>
        <div style="text-align: right; position:fixed; bottom: 80px;">
            <table style="text-align: left; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 150px; text-align: left; font-size: 0.8em;"><span><p>Esta constancia es válida para los usos que la entidad receptora considere, deberá validar su autenticidad a través del código QR o ingresando al enlace: https://portalregistro.usac.edu.gt/estudiante/verificarConstancia?id={{$transaccion}}</p></span></td>
                <td style="padding-right: 60px; text-align: center;"><div style="border: 10px; border-style:solid; border-color:white;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/assets2/img/logo2.png', .4)->size(150)->errorCorrection('H')->generate(url('estudiante/verificarConstancia?id='.$transaccion))) !!} "></div></br> <p style="font-size:14px; text-align:center; margin-top:5px; font-weight:bold;font-size:1.01em;"></p></td>
            </tr>
            </table>
        </div>
        <br>
        <p style="font-size:0.8em; text-align:left; padding-left: 55px; padding-right: 50px; position: fixed; bottom: 15px">Elaboró {{$iniciales}}</p>
        <br>
        <div style="text-align:center; font-size:10px; position:fixed; bottom: 0px; width: 100%;">
            <p style="padding-left: 110px; padding-right: 110px;"> <strong>La certificación efectuada no tiene fecha de caducidad</strong></p>
        </div>
        <div style="text-align:center; font-size:14px; position:fixed; bottom: 30px; width: 100%;"> 
            <strong>IMPRESA EL {{date('d/m/Y')}} A LAS {{date('H:i:s')}} HORAS</strong>
        </div>
        <div style="position: fixed; bottom: 0; width: 100%;">
        <img src="{{$registro}}" style="width:1100px; z-index:-1; position:relative; opacity: .60;">
        </div>
        <!--<div style="text-align:left; font-size:10px; position:fixed; bottom: 15px; left:70px;  width: 100%;"> 
            <strong>DRE-006</strong>
        </div>-->
    </div>
</div>
</body>
<html>