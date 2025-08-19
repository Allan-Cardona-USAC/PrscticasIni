@extends('layouts.master')

@section('content')
    <div class="card" >
        <div class="card-header">NOV - {{ $aspirante->nov }}</div>
        <div class="card-body" id="imprimible">

            <a href="{{ url('/administrativo/aspirantes') }}" title="Back" id="botonRegresar">
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
                        <th> Número de Orientación Vocacional</th>
                        <td>{{ $aspirante->nov }}</td>
                    </tr>
                    <tr>
                        <th> Nombres</th>
                        <td> {{ $aspirante->nombre1 . ' ' . $aspirante->nombre2 }} </td>
                    </tr>
                    <tr>
                        <th> Apellidos</th>
                        <td> {{ $aspirante->apellido1 . ' ' . $aspirante->apellido2 }} </td>
                    </tr>
                    <tr>
                        <th> Fecha Nacimiento</th>
                        <td> {{ $aspirante->getFechaNacimiento() }} </td>
                    </tr>
                    <tr>
                        <th> Sexo</th>
                        <td> {{ $aspirante->getGenero() }} </td>
                    </tr>
                    <tr>
                        <th> Direccion</th>
                        <td> {{ $aspirante->direccion }} </td>
                    </tr>
                    <tr>
                        <th> Pruebas Básicas </th>
                        <td>
                        @if (is_array($pcbs) || is_object($pcbs))
                            @foreach($pcbs as $pcb )
                                <li>{{ $pcb }}</li>
                            @endforeach
                        @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
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
            ventana.document.write('<html lang="es"> <head> <title>Aspirante - Departamento de Registro y Estadística</title>');
            ventana.document.write('<meta charset="utf-8"> <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">');
            ventana.document.write('<meta name="keywords" content="USAC,RyE,Primer Ingreso"> <meta name="author" content="USAC">');
            ventana.document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
            ventana.document.write('<link href="{{ asset('pike/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />');
            ventana.document.write('<link href="{{ asset('pike/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/css/style.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('css/Print.css') }}" rel="stylesheet" />');
            ventana.document.write('</head><body>');
            ventana.document.write('<br><h3 class="text-center"> INFORMACIÓN ASPIRANTE</h3>');
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
            var div = document.querySelector("#imprimible");
            imprimirSolicitudInscripcion(div);
            document.getElementById('btnImprimir').style.visibility = 'visible';
            document.getElementById('botonRegresar').style.visibility = 'visible';

        });
    </script>
@endsection
