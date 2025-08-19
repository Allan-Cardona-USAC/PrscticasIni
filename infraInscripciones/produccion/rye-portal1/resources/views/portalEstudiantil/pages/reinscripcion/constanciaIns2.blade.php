<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="{{ $css }}" rel="stylesheet" type="text/css">
</head>
    <body>
</body>
        <div>
            <div style= "background-color:white;">
            <p style= "text-align:center;">
            <img src="{{ $img }}"></img>
            </p>
            <br/>
            <div style= "text-align: center; font-size: 18px;">
                <div>
                    <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                </div>
                <div style="margin-top: 20px;">
                <strong style="font-size: 16px;">CONSTANCIA DE INSCRIPCIÓN</strong>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <table style= "text-align:left;">
                <tr>
                    <td > <b>REGISTRO ACADÉMICO:</b></td>
                    <td>{{$carnet}}</td>
                    <td > <b>CUI:</b></td>
                    <td> {{$cui}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>ESTUDIANTE: </b></td>
                    <td>{{$nombreCompleto}}</td> 
                </tr>
            </table>
            <br/>
            <br/>
            <br/>
            <p style="font-size:16px"> Presente </p>
            <br/>
            <p style="font-size:16px; text-align:justify;"> Se hace constar que el estudiante <strong>{{$nombreCompleto}}</strong>, realizó el proceso de inscripción correspondiente al ciclo lectivo
                del año {{$ciclo}} con fecha {{$fecha_insc}} en la Unidad Académica de {{$ua}}, con extensión {{$ext}} y carrera de {{$car}}, presentando como documento de pago la boleta {{$no_bol}} con fecha {{$fecha_pago}}.</p>
            <br/>
            <p style="font-size:16px;"> Atentamente, </p>
            <br/>
            <br/>
            <p style="text-align:center; font-size:18px;"> <strong>"Id y Enseñad a todos"</strong></p>
            <br/>
            <div class="visible-print text-center">
            <p style="text-align:right;">{!!  
            QrCode::size(150)->generate(url("/verificarInscripcion?idTransaccion=".$transaccion)); !!} <br/><a style="color:black;" href="{{url('/verificarInscripcion?idTransaccion='.$transaccion)}}">Verificar</a></p>
            </div>
            <br/>
            <p style="text-align:center; font-size:14px;"> Edificio DIGA, Primer nivel ala oeste, Ciudad Universitaria zona 12. Teléfonos: 24187900-02 <br/><a href="https://portalregistro.usac.edu.gt" style="color:black;">Portal Registro</a></p>
            </div>
            </form>
        </div>

</body>
<html>
