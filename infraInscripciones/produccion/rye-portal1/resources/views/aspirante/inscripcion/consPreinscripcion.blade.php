@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/constancia2.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <div class="container">
        <h2>Constancia de Pre-Inscripción</h2>
        <div>
            <form action="{{ url('aspirante/inscripcion/constanciaPreinscripcion') }}" method="GET">
            <input hidden value="{{$cicloactivo}}" id="cicloactivo" name="cicloactivo"/>
            <input hidden value="{{$nov}}" id="nov" name="nov"/>
            <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto"/>
            <input hidden value="{{$cui}}" id="cui" name="cui"/>
            <input hidden value="{{$nombreUA}}" id="nombreUA" name="nombreUA"/>
            <input hidden value="{{$nombreCarrera}}" id="nombreCarrera" name="nombreCarrera"/>
            <input hidden value="{{$nombreExtension}}" id="nombreExtension" name="nombreExtension"/>
            <input hidden value="{{$transaccion}}" id="transaccion" name="transaccion"/>
            <div style= "background-color:white;">
            <p style= "text-align:center;">
            <img src="{{ asset('img/usacnegro.jpg') }}"></img>
            </p>
            <br/>
            <div style= "text-align:center; font-size:18px;">
                <strong>DEPARTAMENTO DE REGISTRO Y ESTADÍSTICA</strong>
                <br/>
                <strong style="font-size: 16px;">CONSTANCIA DE PRE-INSCRIPCIÓN</strong>
                <br/>
                <strong style="font-size: 14px;">CICLO ACADÉMICO {{$cicloactivo}}</strong>
            </div>
            <br/>
            <br/>
            <table style= "text-align:left;">
                <tr>
                    <td width="25%"> <b>NÚMERO DE ORIENTACIÓN VOCACIONAL:</b></td>
                    <td>{{$nov}}</td>
                    <td width="8%"> <b>C.U.I.:</b></td>
                    <td>{{$cui}}</td>
                    <td width="40%"></td>
                </tr>
                <tr>
                    <td><b>NOMBRE COMPLETO: </b></td>
                    <td width="40%">{{$nombreCompleto}}</td> 
                </tr>
                <tr>
                    <td><b>DETALLE CARRERA:</b><td>
                    <tr>
                        <td></td>
                        <td>{{$nombreUA}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{$nombreExtension}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{$nombreCarrera}}</td>
                    </tr>
                </tr>
            </table>
            <br/>
            <br/>
            <p style="font-size:16px; text-align:center;"><b>Para continuar con el proceso de inscripción dirigirse al siguiente link, el cual estará habilitado de acuerdo al <i style="font-size: 1.2em;">&nbsp;14 de enero de {{$cicloactivo}}.</i>:</b></p>
            <br/>
            <p style="font-size:16px; text-align:center;"><a style="color:black;" href="https://portalregistro.usac.edu.gt">https://portalregistro.usac.edu.gt</a></p>
            <div class="visible-print text-center">
            <p style="text-align:center;"> 
                <!-- QR CODE-->
                {!! QrCode::size(150)->generate(url("/verificarPreinscripcion?idTransaccion=".$transaccion)); !!}
                <br><a style="color:black;" href="{{url('/verificarPreinscripcion?idTransaccion='.$transaccion)}}">Verificar</a></p>
            </div>
            <br/>
            
            <p style="font-size:16px; text-align:justify;"><strong>Exonerados: Personas con discapacidad, mayores de 65 años, graduados de Universidades privadas del país y extranjeros</strong>  serán atendidos en el Departamento de Registro y Estadística 
                a partir del <b><i style="font-size: 1.2em;">14 de enero de {{$cicloactivo}}</i></b> en horario de <b><i style="font-size: 1.2em;">8:00 a.m</i></b> a <b><i style="font-size: 1.2em;">3:00pm</i></b> de <b><i style="font-size: 1.2em;">lunes</i></b> a  <b><i style="font-size: 1.2em;">viernes</i></b>. Con los requisitos completos en original e impresos.</p>
            <br/>
            <p style="text-align:center; font-size:18px;"> <strong>"Id y Enseñad a todos"</strong></p>
            <br/>
            <p style="font-size:16px; text-align:justify;"><strong><em>Este documento es obligatorio para iniciar el proceso de inscripción.</strong></p>
            <p style="font-size:14px; text-align:justify;"><strong><em>Reglamento Estudiantil, Art. 13 Pre-inscripción. Se llama así al procedimiento mediante el cual se revisan
            y califican los documentos requisitos en el Reglamento para el ingreso a la Universidad. Este procedimiento no presupone la obligación de inscribirse al aspirante.</em></strong></p>
            <br/>
            </div>
            <input type="submit" value="Descargar Constancia" class="btn btn-primary"/>
            </form>
        </div>
    </div>
@endsection
