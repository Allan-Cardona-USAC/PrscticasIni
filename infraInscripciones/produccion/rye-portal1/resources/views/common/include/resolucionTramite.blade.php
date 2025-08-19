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
                <p style="font-size: 16px; padding-bottom: -20px;">RESOLUCIÓN DE INSCRIPCIÓN PROVISIONAL</p>
                <p style="font-size: 16px; margin-top: -15px;">CICLO LECTIVO {{$ciclo}}</p>
                </div>
            </div>
            <br/>
           
            <div style="text-align:right;">
                <p>Guatemala, {{$dia}} de {{$mes}} de {{$anio}}</p>
            </div>
            <br/>
           
            <table style= "text-align:left;">
                <tr>
                    <td > <b>REGISTRO ACÁDEMICO:</b></td>
                    <td>{{$carnet}}</td>
                    <td > <b>CUI:</b></td>
                    <td> {{$cui}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>NOMBRE: </b></td>
                    <td>{{$nombreCompleto}}</td> 
                </tr>
            </table>
            <br/>
            
            <p style="font-size:16px; text-align:justify;"> El Departamento de Registro y Estadística de la Universidad de San Carlos de Guatemala, con base en el Punto Octavo Inciso 8.1, Acta 35-2018 de fecha 21 de noviembre de 2018, del Consejo Superior Universitario
                y a solicitud del interesado resuelve <strong>AUTORIZAR</strong> la inscripción provisional de la siguiente manera:</p>
            <table style= "text-align:left;">
                <tr>
                    <td colspan="2"><b>Nuevo Registro:</b></td>
                </tr>
                <tr >
                    <td style = "width:5%;"></td>
                    <td>{{$ua}}    {{$nombreUA}}</td>
                </tr>
                <tr >
                    <td tyle = "width:5%;"></td>
                    <td>{{$ext}}   {{$nombreExt}}</td>
                </tr>
                <tr>
                    <td tyle = "width:5%;"></td>
                    <td >{{$car}}  {{$nombreCarrera}}</td>
                </tr>
            </table>
            <br/>
            <br/>
            <p style="text-align:center; font-size:18px;"> <strong>"Id y Enseñad a todos"</strong></p>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <div style="text-align: right;  position: fixed; bottom: 400px">
            <table style="text-align: center; width: 100%; font-size: 14px;">
            <tr>
                <td style="padding-left: 50px; text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1;">
                        <p style="font-size:16px; ">{{$usuario}}</p>
                        <p style="font-size:16px; margin-top: -10px ">{{$puestoUsuario}}</p>
                    </div>
                </td>
                <td style="padding-right: 90px; text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1;">
                        <p style="font-size:16px; ">Vo.Bo. {{$nombreJefe}}</p>
                        <p style="font-size:16px; margin-top: -10px; ">{{$puesto}}</p>
                    </div>
                </td>
            </tr>
            </table>
            </div>
            <br/>
            <br/>
            <br/>
            <div class="visible-print text-center" style="text-align:justify;">
                <p>Yo, <strong>{{$nombreCompleto}}</strong> me comprometo de manera explícita, que una vez obtenido el título de licenciatura, notificaré al Departamento de Registro y Estadística de la Universidad de San Carlos de Guatemala que cumplo con el requisito indispensable para regular la inscripción y entregar la documentación correspondiente para hacer efectiva la misma.</p>
            </div>
            <br/>
            <div style="text-align: center;  position: fixed; bottom: 90px; ">
            <table style="text-align: center; width: 100%; font-size: 14px;">
            <tr>
                <td style="text-align: center; font-size: 0.8em;">
                    <div style="text-align: center; z-index:1; margin-right:75px;">
                        <p style="font-size:16px; ">{{$nombreCompleto}}</p>
                        <p style="font-size:16px; margin-top: -10px ">CUI: {{$cui}}</p>
                    </div>
                </td>
            </tr>
            </table>
            <br/>
            <br/>
            <br/>
            <div class="visible-print text-center">
            <div style="text-align:left;">
                <p style="margin-top: -15px; padding-bottom: -40px; position:fixed; bottom:110px;">c.c Expediente</p>
                <p style="margin-top: -15px; padding-bottom: -40px; position:fixed; bottom:90px;">/{{$inicialesUsuario}}</p>
            </div>
            <br/>
            <p style="text-align:center; font-size:14px; position: fixed; bottom: 10px; width:85%; border-top:3px solid;">Edificio DIGA, Primer nivel ala oeste, Ciudad Universitaria zona 12. Teléfonos: 24187900-02 <br/><a href="https://portalregistro.usac.edu.gt" style="color:black;">Portal Registro</a></p>
            </div>
            </form>
        </div>

</body>
<html>
