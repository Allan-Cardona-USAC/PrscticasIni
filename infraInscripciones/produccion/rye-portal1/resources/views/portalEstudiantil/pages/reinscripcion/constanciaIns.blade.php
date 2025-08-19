@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/constancia2.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <div class="container">
        <h2>Constancia de Inscripción</h2>
        <div>
            <form action="{{ url('estudiante/reinscripcion/constancia') }}" method="GET">
            <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo"/>
            <input hidden value="{{$carnet}}" id="carnet" name="carnet"/>
            <input hidden value="{{$cui}}" id="cui" name="cui">
            <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto"/>
            <input hidden value="{{$no_bol}}" id="no_bol" name="no_bol"/>
            <input hidden value="{{$ua}}" id="ua" name="ua"/>
            <input hidden value="{{$ext}}" id="ext" name="ext"/>
            <input hidden value="{{$car}}" id="car" name="car"/>
            <input hidden value="{{$fecha_insc->format('d/m/Y')}}" id="fecha_insc" name="fecha_insc"/>
            <input hidden value="{{$fecha_pago->format('d/m/Y')}}" id="fecha_pago" name="fecha_pago"/>
            <input hidden value="{{$transaccion}}" id="transaccion" name="transaccion"/>
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
                del año {{$ciclo}} con fecha {{$fecha_insc->format("d/m/Y")}} en la Unidad Académica de {{$ua}}, extensión {{$ext}} y carrera de {{$car}}, presentando como documento de pago la boleta {{$no_bol}} con fecha {{$fecha_pago->format("d/m/Y")}}.</p>
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
            </div>
            <input type="submit" value="Descargar Constancia" class="btn btn-primary"/>
            </form>
        </div>
    </div>
@endsection
