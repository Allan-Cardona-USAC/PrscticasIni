@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/estiloConstanciaInscripcion.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <div class="container">
        <h2>Boleta de Pago</h2>
        <div>
            <form action="{{ url('estudiante/reinscripcion/boleta') }}" method="GET">
            <input hidden value="{{$idOrdenPago}}" id="idOrdenPago" name="idOrdenPago"/>
            <input hidden value="{{$facultad}}" id="facultad" name="facultad"/>
            <input hidden value="{{$extension}}" id="extension" name="extension"/>
            <input hidden value="{{$carrera}}" id="carrera" name="carrera"/>
            <input hidden value="{{$cicloactivo}}" id="cicloactivo" name="cicloactivo"/>
            <input hidden value="{{$categorias}}" id="categorias" name="categorias"/>
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
                        @switch($nivel_academico)
                            @case(1)
                            @case(2)
                                @if($monto == 91)
                                    <td>Matrícula Estudiantil anual {{$cicloactivo}}</td>
                                @else
                                    <td>Matrícula Estudiantil 2do. Semestre - Reingreso {{$cicloactivo}} Estudiante Regular</td>
                                @endif
                                @break
                            @case(3)
                            @case(5)
                                <td> Maestrías Y Especialidades {{$cicloactivo}} Inscripción Para Maestrías</td>
                                @break
                            @case(4)
                                <td> Doctorados {{$cicloactivo}} Inscripción Para Doctorados</td>
                                @break
                            @case(10)
                                <td> Postdoctorados {{$cicloactivo}} Inscripción Para Postdoctorados</td>
                                @break
                        @endswitch
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
                <div class="alert alert-danger animate__animated animate__shakeX">
                <b style="font-size:18px;">NOTA:</b>
                <ul>
                    <li><b style="font-size:18px;">Después de realizar el pago de inscripción, dentro de 48 horas deberá ingresar al portal para descargar su constancia de inscripción.</b></li>
                    <!--li><b style="font-size:18px;"> En caso no se muestre la constancia de inscripción favor de comunicarse a siif@usac.edu.gt adjuntando: </b></li>
                    <ul>
                    <li><b style="font-size:18px;"> Registro Académico (carné)</b></li>
                    <li><b style="font-size:18px;">Unidad Académica</b></li>
                    <li><b style="font-size:18px;">Extensión</b></li>
                    <li><b style="font-size:18px;"> Carrera</b></li>
                    <li><b style="font-size:18px;">Fecha de generación de boleta</b></li>
                    <li><b style="font-size:18px;">Fecha de pago </b></li>
                    <li><b style="font-size:18px;">Foto de la boleta pagada.</b></li -->
                    </ul>
                </div>
                </ul>
            </form>
        </div>
    </div>
@endsection
