@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Resumen Inscritos</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('administrativo.resumeninscritosTipoUA',$tipo) }}" title="Back">
                <button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Regresar
                </button>
            </a>
            <br>
            <form method="GET" action="{{ route('administrativo.resumeninscritosUA',[$tipo,$ua]) }}" accept-charset="UTF-8" role="search">
                <div id="imprimible">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <label for="ciclo" class="col-md-4 col-form-label col-form-label-lg">CICLO: </label>
                        <input type="number" class="form-control form-control-lg" id="ciclo" name="ciclo" placeholder="{{ isset($ciclo) ? $ciclo : ''}}" value="{{ ''}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="semestre" class="col-md-5 col-form-label col-form-label-lg">SEMESTRE</label>
                        <div class="input-group form-inline">
                            <select  name="semestre" class="form-control form-control-lg" id="semestre">
                                <option @if($semestre ==='0') selected @endif value="0">Ambos</option>
                                <option @if($semestre ==='1') selected @endif value="1">Primero</option>
                                <option @if($semestre ==='2') selected @endif value="2">Segundo</option>
                            </select>
                        </div>
                    </div>
                </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-secondary col-md-5" type="submit">Seleccionar</button>
                </div>
            </form>
            <br>
            <div class="table-responsive">
                <div id="imprimible2">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center"><h5>U.A.: {{str_pad($ua, 2, "0", STR_PAD_LEFT)}} - {{isset($resumenInscritos[0]->nomcorto)? $resumenInscritos[0]->nomcorto : 'SIN DATOS'}}</h5></th>
                        <th rowspan="2" class="text-center">PRIMER INGRESO</th>
                        <th colspan="5" class="text-center">REINGRESO</th>
                        <th rowspan="2" class="text-center">POSTGRADO</th>
                        <th rowspan="2" class="text-center">TOTAL INSCRITOS</th>
                    </tr>
                    <tr>
                        <th scope="col" class="text-center">Regular</th>
                        <th scope="col" class="text-center">Incorporado</th>
                        <th scope="col" class="text-center">P.E.G</th>
                        <th scope="col" class="text-center">Graduados</th>
                        <th scope="col" class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalPrimerIngreso = 0;
                        $totalRegular = 0;
                        $totalIncorporado = 0;
                        $totalPEG = 0;
                        $totalGraduados = 0;
                        $totalReingreso = 0;
                        $totalPosgrado = 0;
                        $totalInscritos = 0;
                    @endphp
                    @if($resumenInscritos != null)
                    @foreach($resumenInscritos as $resumen)
                        <tr>
                            <th scope="row">
                                <h5>
                                    <a href="{{route('administrativo.resumeninscritosEXT',[$tipo,$ua,$resumen->codigo_extension])}}" class="badge badge-info" >
                                        {{str_pad($resumen->codigo_extension, 2, "0", STR_PAD_LEFT)}} -
                                        @php
                                           $nombre = explode("\n",wordwrap($resumen->nombre,18,"\n",false))
                                        @endphp
                                        @foreach($nombre as $palabra)
                                            @if($loop->last)
                                                {{$palabra}}
                                            @else
                                                {{$palabra}}<br>
                                            @endif
                                        @endforeach
                                    </a>
                                </h5>
                            </th>
                            <td class="text-center align-middle">{{$resumen->Primer_Ingreso}}</td>
                            <td class="text-center align-middle">{{$resumen->Regular}}</td>
                            <td class="text-center align-middle">{{$resumen->Incorporado}}</td>
                            <td class="text-center align-middle">{{$resumen->PEG}}</td>
                            <td class="text-center align-middle">{{$resumen->Graduado}}</td>
                            <td class="text-center align-middle">{{$resumen->Regular + $resumen->Incorporado + $resumen->PEG + $resumen->Graduado}}</td>
                            <td class="text-center align-middle">{{$resumen->Posgrado}}</td>
                            <td class="text-center align-middle">{{$resumen->Primer_Ingreso + $resumen->Regular + $resumen->Incorporado + $resumen->PEG + $resumen->Graduado + $resumen->Posgrado}}</td>

                        </tr>
                        @php
                            $totalPrimerIngreso = $totalPrimerIngreso + $resumen->Primer_Ingreso;
                            $totalRegular = $totalRegular + $resumen->Regular;
                            $totalIncorporado = $totalIncorporado + $resumen->Incorporado;
                            $totalPEG = $totalPEG + $resumen->PEG;
                            $totalGraduados = $totalGraduados + $resumen->Graduado ;
                            $totalReingreso = $totalReingreso + $resumen->Regular + $resumen->Incorporado + $resumen->PEG + $resumen->Graduado;
                            $totalPosgrado = $totalPosgrado + $resumen->Posgrado;
                            $totalInscritos = $totalInscritos + $resumen->Primer_Ingreso + $resumen->Regular + $resumen->Incorporado + $resumen->PEG + $resumen->Graduado + $resumen->Posgrado ;
                        @endphp
                    @endforeach
                    <tr>
                        <th scope="row" class="table-info text-center" ><h5>Total</h5></th>
                        <td class="table-info text-center" >{{$totalPrimerIngreso}}</td>
                        <td class="table-info text-center">{{$totalRegular}}</td>
                        <td class="table-info text-center">{{$totalIncorporado}}</td>
                        <td class="table-info text-center">{{$totalPEG}}</td>
                        <td class="table-info text-center">{{$totalGraduados}}</td>
                        <td class="table-info text-center">{{$totalReingreso}}</td>
                        <td class="table-info text-center">{{$totalPosgrado}}</td>
                        <td class="table-info text-center">{{$totalInscritos}}</td>
                    </tr>
                    @else
                        <tr>
                            <td class="alert-info text-center" colspan="9">
                                <i class="fa fa-info-circle"></i> No se encontraron datos
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            </div>
                <div align="center" class="py-2">
                    <button class="btn btn-primary btn-sm col-md-3" id="btnImprimir" ><i class="fa fa-print" aria-hidden="true"></i> Imprimir Tabla</button>
                </div>
                <hr>
            <form method="POST" action="{{ route('administrativo.descargaCSV',[$ciclo, $semestre, $tipo, $ua, 100, 0]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="FormDatos">
                {{ csrf_field() }}
                <h5 class="text-center">Descargar Información</h5>
                <div class="row justify-content-center">
                    <div class="card alert-warning" style="width: 40rem;">
                        <div class="card-body" >
                            Al presionar el botón "DESCARGAR CSV", obtendrá un archivo .csv con la información de todos los estudiantes
                            segun el filtrado que elija:
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <label for="Filtrado" class="col-md-5 col-form-label ">Filtrado</label>
                        <div class="input-group form-inline">
                            <select  name="Filtrado" class="form-control " id="Filtrado">
                                <option value="0">General</option>
                                <option value="1">Primer Ingreso</option>
                                <option value="2">Reingreso</option>
                                <option value="3">Posgrado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div align="center" class="py-2">
                    <button type="submit" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-cloud-download"></i> Descargar CSV</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        //
        function imprimirSolicitudInscripcion(elemento,elemento2) {
            var ventana = window.open();
            ventana.document.write('<html lang="es"> <head> <title>Solicitud Inscripcion - Departamento de Registro y Estadística</title>');
            ventana.document.write('<meta charset="utf-8"> <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">');
            ventana.document.write('<meta name="keywords" content="USAC,RyE,Primer Ingreso"> <meta name="author" content="USAC">');
            ventana.document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
            ventana.document.write('<link href="{{ asset('pike/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />');
            ventana.document.write('<link href="{{ asset('pike/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/css/style.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('css/printResumenInscritos.css') }}" rel="stylesheet" />');
            ventana.document.write('</head><body><h3 class="text-center" >Resumen Inscritos</h3>');
            ventana.document.write(elemento.innerHTML);
            ventana.document.write(elemento2.innerHTML);
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
            var div = document.querySelector("#imprimible");
            var div2 = document.querySelector("#imprimible2");
            imprimirSolicitudInscripcion(div,div2);
        });
    </script>
@endsection
