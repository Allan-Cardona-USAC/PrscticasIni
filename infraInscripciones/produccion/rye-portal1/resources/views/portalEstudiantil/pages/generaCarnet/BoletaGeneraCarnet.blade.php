@extends('layouts.master')


@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/estiloConstanciaInscripcion.css') }}" rel="stylesheet" type="text/css">

@endsection


@section('content')
    @if($error)
        <div class="alert alert-danger" role="alert">
            {{$mensaje}}
        </div>
    @else
        @if($acceso_estado >= 2)
            <div class="alert alert-success" role="alert">
                {{$mensaje}}
            </div>
        @else
            <div class="container">
                <h2>Boleta de Pago</h2>
                <div>
                    <form action="{{ url('estudiante/BoletaGeneraCarnetPDF') }}" method="GET">
                    <input hidden value="{{$idOrdenPago}}" id="idOrdenPago" name="idOrdenPago"/>
                    <input hidden value="{{$facultad}}" id="facultad" name="facultad"/>
                    <input hidden value="{{$extension}}" id="extension" name="extension"/>
                    <input hidden value="{{$carrera}}" id="carrera" name="carrera"/>
                    <input hidden value="{{$cicloactivo}}" id="cicloactivo" name="cicloactivo"/>
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
                                <td colspan="3">{{$nombreEstudiante}}</td>
                                <td>Unidad</td>
                                <td>@if($ua<10)0{{$ua}}@else{{$ua}}@endif</td>
                            </tr>
                            <tr>
                                <td>Unidad</td>
                                <td colspan="3">{{$facultad}}</td>
                                <td>Extension</td>
                                <td>@if($ext<10)0{{$ext}}@else{{$ext}}@endif</td>
                            </tr>
                            <tr>
                                <td>Extension</td>
                                <td colspan="3">{{$extension}}</td>
                                <td>Carrera</td>
                                <td>@if($idCarrera<10)0{{$idCarrera}}@else{{$idCarrera}}@endif</td>
                            </tr>
                            <tr>
                                <td>Carrera</td>
                                <td colspan="3">{{$carrera}}</td>
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
                                <td>Generacion de Carnet</td>
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


                    </form>
                </div>
            </div>
        @endif
    @endif
@endsection
