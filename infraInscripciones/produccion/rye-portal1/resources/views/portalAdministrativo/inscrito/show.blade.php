@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Registro Académico - {{ $inscrito->carnet }}</div>
        <div class="card-body" id="imprimible">

            <a href="{{ url('/administrativo/inscritos') }}" title="Back" id="botonRegresar">
                <button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Regresar
                </button>
            </a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th> Registro Académico</th>
                        <td>{{ $inscrito->carnet }}</td>
                        <th> NOV</th>
                        <td>{{ $inscrito->cod_orien }}</td>
                        <th> PIN</th>
                        <td>{{ $inscrito->pin }}</td>
                    </tr>
                    <tr>
                        <th> CUI</th>
                        <td colspan="2"> {{ $inscrito->cui }} </td>
                        <th> Estado</th>
                        @if($inscrito->activo == 1)
                            <td colspan="2"><span class="badge badge-success">Activo</span></td>
                        @else
                            <td colspan="2"><span class="badge badge-danger">Inactivo</span></td>
                        @endif

                    </tr>
                    <tr>
                        <th> Nombres</th>
                        <td colspan="2"> {{ $inscrito->nombre1 . ' ' . $inscrito->nombre2 . ' ' . $inscrito->nombre }} </td>
                        <th> Apellidos</th>
                        <td colspan="2"> {{ $inscrito->primer_apellido . ' ' . $inscrito->segundo_apellido }} </td>
                    </tr>
                    <tr>
                        <th> Fecha Nacimiento</th>
                        <td colspan="2"> {{ $inscrito->fec_nac->format('d/m/Y') }} </td>
                        <th> Sexo</th>
                        <td colspan="2">
                            @if($inscrito->sexo == 2)
                                F
                            @elseif($inscrito->sexo == 1)
                                M
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th> Direccion</th>
                        <td colspan="5"> {{ $inscrito->direccion }} </td>
                    </tr>
                    @if($datosSensibles)
                    <tr>
                        <th> Teléfono</th>
                        <td colspan="2"> {{ $inscrito->telefono }} </td>
                        <th> Celular</th>
                        <td colspan="2"> {{ $inscrito->celular }} </td>
                    </tr>
                    <tr>
                        <th> Email</th>
                        <td colspan="5"> {{ $inscrito->email }} </td>
                    </tr>
                    @endif
                    </tbody>
                </table>
                <div class="table-responsive">
                    <table class="table table-hover table-sm" id="tablaDatos">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="3" scope="col">Inscripciones</th>
                        </tr>
                        </thead>
                        @foreach($carreras as $carrera)
                            <tbody>
                            <tr class="clickable" style="background-color: #407EC9; color: white" data-toggle="collapse"
                                data-target="#carrera{{$carrera->codcar}}" aria-expanded="false"
                                aria-controls="carrera{{$carrera->codcar}}">
                                <td><i class="fa fa-plus" aria-hidden="true" style="color: black"></i>
                                    <b> {{str_pad($carrera->codfac, 2, "0", STR_PAD_LEFT)}}
                                        - {{str_pad($carrera->codext, 2, "0", STR_PAD_LEFT)}}
                                        - {{str_pad($carrera->codcar, 2, "0", STR_PAD_LEFT)}} {{$carrera->carrera->nombre_carrera}}</b>
                                </td>
                                <td colspan="3">
                                    @if($carrera->fec_gradua->todatestring() != '-0001-11-30' && $carrera->fec_gradua->todatestring() != '0000-00-00' )
                                        <b>{{ "Graduado" }}</b>
                                    @elseif($carrera->fec_cierre->todatestring() != '-0001-11-30' && $carrera->fec_cierre->todatestring() != '0000-00-00' )
                                        <b>{{ "Cierre de Pensum - PEG" }}</b>
                                    @else
                                        <b>{{ $carrera->estado() }}</b>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                            <tbody id="carrera{{$carrera->codcar}}" class="collapse">
                            @if($carrera->fec_cierre->todatestring() != '-0001-11-30' && $carrera->fec_cierre->todatestring() != '0000-00-00' )
                                <tr>
                                    <td class="text-center" colspan="3">Fecha de
                                        cierre: {{ $carrera->fec_cierre->format('d/m/Y')}}</td>
                                </tr>
                            @endif
                            @if($carrera->fec_gradua->todatestring() != '-0001-11-30' && $carrera->fec_gradua->todatestring() != '0000-00-00' )
                                <tr>
                                    <td class="text-center" colspan="3">Fecha de
                                        graduación: {{ $carrera->fec_gradua->format('d/m/Y')}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td><b>Ciclo</b></td>
                                <td><b>Fecha</b></td>
                            </tr>
                            @foreach($inscripciones as $inscripcion)
                                @if($inscripcion->cod_ua == $carrera->codfac && $inscripcion->cod_ext == $carrera->codext && $inscripcion->cod_car == $carrera->codcar)
                                    @if($inscripcion->fecha_inscripcion->todatestring() != '-0001-11-30' && $inscripcion->fecha_inscripcion->todatestring() != '0000-00-00' )
                                        <tr>
                                            <td></td>
                                            <td>{{ $inscripcion->ciclo  }}</td>
                                            <td>{{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion->todatestring())->format('d/m/Y') }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div align="center" class="py-2">
            <button class="btn btn-primary btn-sm col-md-3" id="btnImprimir" ><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        //
        function imprimirSolicitudInscripcion(elemento) {
            var ventana = window.open();
            ventana.document.write('<html lang="es"> <head> <title>Estudiante - Departamento de Registro y Estadística</title>');
            ventana.document.write('<meta charset="utf-8"> <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">');
            ventana.document.write('<meta name="keywords" content="USAC,RyE,Primer Ingreso"> <meta name="author" content="USAC">');
            ventana.document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
            ventana.document.write('<link href="{{ asset('pike/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />');
            ventana.document.write('<link href="{{ asset('pike/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/css/style.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('css/Print.css') }}" rel="stylesheet" />');
            ventana.document.write('</head><body>');
            ventana.document.write('<br><h3 class="text-center"> INFORMACIÓN ESTUDIANTE</h3>');
            ventana.document.write(elemento.innerHTML);
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.onload = function() {
                ventana.print();
                ventana.close();
            };
            return true;
        }

        document.querySelector("#btnImprimir").addEventListener("click", function() {
            document.getElementById('btnImprimir').style.visibility = 'hidden';
            document.getElementById('botonRegresar').style.visibility = 'hidden';
            $('tbody.collapse').addClass('show').css("height", "");
            var div = document.querySelector("#imprimible");
            imprimirSolicitudInscripcion(div);
            document.getElementById('btnImprimir').style.visibility = 'visible';
            document.getElementById('botonRegresar').style.visibility = 'visible';
            $('tbody.collapse').removeClass('show').css("height", "");

        });
    </script>
@endsection
