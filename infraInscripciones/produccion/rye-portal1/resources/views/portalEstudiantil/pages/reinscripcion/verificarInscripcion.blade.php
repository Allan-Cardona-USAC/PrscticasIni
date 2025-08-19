@extends('portalEstudiantil.layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/constancia2.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container">
        <div>
            <div style= "background-color:white;">
            <p style= "text-align:center;">
            <img src="{{ asset('img/usacnegro.jpg') }}"></img>
            </p>
            <br/>
            <div style= "text-align:center; font-size:18px;">
                <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                <br/>
                <strong style="font-size: 16px;">CONSTANCIA DE INSCRIPCIÓN</strong>
            </div>
            <br/>
            <br/>
            <br/>
            <table style= "text-align:left;">
                <tr>
                    <td width="18%"> <b>REGISTRO ACADÉMICO:</b></td>
                    <td>{{$carnet}}</td>
                    <td width="5%"> <b>CUI:</b></td>
                    <td> {{$cui}}</td>
                    <td width="40%"></td>
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
                del año {{$ciclo}} con fecha {{$fechainscripcion->format("d/m/Y")}} en la Unidad Académica {{$nombreUA}}, extensión {{$nombreExt}} y carrera de {{$nombreCarrera}}, presentando como documento de pago la boleta {{$boleta}} con fecha {{$fechaPago->format("d/m/Y")}}.</p>
            <br/>
            <br/>
            <p style="font-size:16px;"> Atentamente, </p>
            <br/>
            <br/>
            <p style="text-align:center; font-size:18px;"> <strong>"Id y Enseñad a todos"</strong></p>
            <div class="visible-print text-center">
            <p style="text-align:right;">{!!  
            QrCode::size(150)->generate(url("/verificarInscripcion?idTransaccion=".$transaccion)); !!} <br/><a style="color:black;" href="{{url('/verificarInscripcion?idTransaccion='.$transaccion)}}">Verificar</a></p>
            </div>
            <br/>
            <p style="text-align:center; font-size:14px;"> Edificio DIGA, Primer nivel ala oeste, Ciudad Universitaria zona 12. Teléfonos: 24187900-02 <br/><a href="https://portalregistro.usac.edu.gt" style="color:black;">Portal Registro</a></p>
            </div>
        </div>
    </div>
@endsection
