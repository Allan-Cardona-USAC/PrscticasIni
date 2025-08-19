@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/estiloConstanciaInscripcion.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <div class="container">
        <h2>Boleta de Pago</h2>
        <div>
            <form action="{{ url('estudiante/BoletaCertificacion') }}" method="GET">
                <input hidden value="{{$idOrdenPago}}" id="idOrdenPago" name="idOrdenPago">
                <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto">
                <input hidden value="{{$ua}}" id="facu" name="facu">  
                <input hidden value="{{$extension}}" id="extension" name="extension"> 
                <input hidden value="{{$car}}" id="car" name="car">  
                <input hidden value="{{$ciclo_anio}}" id="ciclo" name="ciclo"> 
                <table width="100%" cellspacing="2" cellpadding="2" style="margin:0 auto;background-color: white">
                    <tr>
                        <td>Fecha de emisión:</td>
                        <td>{{$fechaGeneracion->format('d/m/Y')}}</td>
                        <td>Fecha de impresión:</td>
                        <td>{{date("d/m/Y")}}</td>
                        <td colspan="2" style="text-align: center;"><b>Para uso exclusivo del banco</b></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center;"><b>Orden de Pago</b></td>
                        <td>Orden de Pago No.</td>
                        <td>{{$idOrdenPago}}</td>
                    </tr>
                    <tr>
                        <td > No.</td>
                        <td colspan="3">{{$idOrdenPago}}</td>
                        <td>Carné</td>
                        <td>{{$carnet}}</td>
                    </tr>
                    <tr>
                        <td>Carné</td>
                        <td colspan="3">{{$carnet}}</td>
                        <td>Total a pagar Q.</td>
                        <td>{{$monto}}.00</td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td colspan="3">{{$nombreCompleto}}</td>
                        <td>Unidad</td>
                        <td>@if($cod_ua<10)0{{$cod_ua}}@else{{$cod_ua}}@endif</td>
                    </tr>
                    <tr>
                        <td>Unidad</td>
                        <td colspan="3">{{$ua}}</td>
                        <td>Extension</td>
                        <td>@if($cod_ext<10)0{{$cod_ext}}@else{{$cod_ext}}@endif</td>
                    </tr>
                    <tr>
                        <td>Extension</td>
                        <td colspan="3">{{$extension}}</td>
                        <td>Carrera</td>
                        <td>@if($cod_car<10)0{{$cod_car}}@else{{$cod_car}}@endif</td>
                    </tr>
                    <tr>
                        <td>Carrera</td>
                        <td colspan="3">{{$car}}</td>
                        <td>Fecha de Emisión</td>
                        <td>{{$fechaGeneracion->format("Ymd")}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"><b>Detalle de pago</b></td>
                        <td>Rubro de pago</td>
                        <td>{{$rubroPago}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Matricula estudiantil anual {{$ciclo_anio}}</td>
                        <td>Q{{$monto}}.00</td>
                        <td>Llave</td>
                        <td>{{$checksum}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total</b></td>
                        <td>Q{{$monto}}.00</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2"> Puede efectuar su pago en cualquier agencia</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2"> o banca virtual de BANRURAL (ATX-253), </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">GyT Continental o BANTRAB. </td>
                    </tr>
                </table>
                <b>**El documento es válido para su pago únicamente hasta el día {{$fechaVencimiento->format('d/m/Y')}}.**</b>
                <br/>
                <input type="submit" value="Descargar Boleta" class="btn btn-primary"/>
                <br/>
                <br/>
                <!--<div class="alert alert-danger animate__animated animate__shakeX">
                <b style="font-size:18px;">NOTA:</b>
                <ul>
                    <li><b style="font-size:18px;">Después de realizar el pago de inscripción, dentro de 48 horas deberá ingresar al portal para descargar su constancia de inscripción.</b></li>
                    </ul>
                </div>-->
                </ul>
            </form>
        </div>
    </div>
@endsection
