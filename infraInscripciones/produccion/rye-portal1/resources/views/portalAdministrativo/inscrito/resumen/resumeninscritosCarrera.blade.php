@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Resumen Inscritos</h2>
        </div>
        <div class="card-body">
            <a href="{{route('administrativo.resumeninscritosEXT',[$tipo,$ua,$ext])}}" title="Back">
                <button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Regresar
                </button>
            </a>
            <br>
            <form method="GET" action="{{ route('administrativo.resumeninscritosCARRERA',[$tipo,$ua,$ext,$carrera]) }}" accept-charset="UTF-8" role="search">
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
                        <th colspan="6" class="text-center" >
                            <h5>U.A.: {{str_pad($ua, 2, "0", STR_PAD_LEFT)}} - {{isset($ListadoResumenInscritos[0]->nomcorto) ? $ListadoResumenInscritos[0]->nomcorto : 'SIN DATOS'}}
                                <br>EXT: {{str_pad($ext, 2, "0", STR_PAD_LEFT)}} - {{isset($ListadoResumenInscritos[0]->nombre) ? $ListadoResumenInscritos[0]->nombre : 'SIN DATOS'}}
                                <br>CARRERA:{{str_pad($carrera, 2, "0", STR_PAD_LEFT)}} - {{isset($ListadoResumenInscritos[0]->nombre_carrera) ? $ListadoResumenInscritos[0]->nombre_carrera : 'SIN DATOS'}}
                            </h5>
                        </th>
                        <th class="text-center"><h5><span class="badge badge-primary ml-auto">Resultados:</span>
                                <span class="badge badge-light">{{  count($ListadoResumenInscritos) }}</span></h5></th>
                    </tr>
                    <tr>
                        <th scope="col" class="text-center">Carnet</th>
                        <th scope="col">Nombre del Estudiante</th>
                        <th scope="col" class="text-center">Semestre</th>
                        <th scope="col" class="text-center">Fecha de Inscripcion</th>
                        <th scope="col" class="text-center">Fecha de Cierre</th>
                        <th scope="col" class="text-center">Fecha de Graduación</th>
                        <th scope="col" class="text-center">Situación Académica</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($resumenInscritos != null)
                    @foreach($resumenInscritos as $resumen)
                        <tr>
                            <td class="text-center align-middle">{{$resumen->carnet}}</td>
                            <td class="align-middle" style="width: 300px">{{$resumen->nombre_estudiante}}</td>
                            <td class="text-center align-middle">{{$resumen->semestre}}</td>
                            <td class="text-center align-middle">{{$resumen->fecha_inscripcion}}</td>
                            <td class="text-center align-middle">{{$resumen->fec_cierre}}</td>
                            <td class="text-center align-middle">{{$resumen->graduado}}</td>
                            <td class="text-center align-middle">{{$resumen->situacion}}</td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td class="alert-info text-center" colspan="7">
                                <i class="fa fa-info-circle"></i> No se encontraron datos
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination-wrapper"> {!! $resumenInscritos->render() !!} </div>
        <div align="center" class="py-2">
            <button class="btn btn-primary btn-sm col-md-3" id="btnImprimir" ><i class="fa fa-print" aria-hidden="true"></i> Imprimir Tabla</button>
        </div>
        <div align="center" class="py-2">
            <button class="btn btn-primary btn-sm col-md-3" id="btnImprimir2" ><i class="fa fa-print" aria-hidden="true"></i> Imprimir Todas las Páginas</button>
        </div>
        <hr>
            <form method="POST" action="{{ route('administrativo.descargaCSV',[$ciclo, $semestre, $tipo, $ua, $ext, $carrera]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="FormDatos">
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

        function imprimirPaginas(elemento) {
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
            ventana.document.write('<table class="table table-striped table-bordered">\n' +
                '            <thead>\n' +
                '            <tr>\n' +
                '            <th colspan="6" class="text-center" >\n' +
                '            <h5>U.A.: {{str_pad($ua, 2, "0", STR_PAD_LEFT)}} - {{isset($ListadoResumenInscritos[0]->nomcorto) ? $ListadoResumenInscritos[0]->nomcorto : 'SIN DATOS'}}\n' +
                '        <br>EXT: {{str_pad($ext, 2, "0", STR_PAD_LEFT)}} - {{isset($ListadoResumenInscritos[0]->nombre) ? $ListadoResumenInscritos[0]->nombre : 'SIN DATOS'}}\n' +
                '        <br>CARRERA:{{str_pad($carrera, 2, "0", STR_PAD_LEFT)}} - {{isset($ListadoResumenInscritos[0]->nombre_carrera) ? $ListadoResumenInscritos[0]->nombre_carrera : 'SIN DATOS'}}\n' +
                '        </h5>\n' +
                '        </th>\n' +
                '        <th class="text-center"><h5><span class="badge badge-primary ml-auto">Resultados:</span>\n' +
                '        <span class="badge badge-light">{{  count($ListadoResumenInscritos) }}</span></h5></th>\n' +
                '        </tr>\n' +
                '        <tr>\n' +
                '        <th scope="col" class="text-center">Carnet</th>\n' +
                '            <th scope="col">Nombre del Estudiante</th>\n' +
                '        <th scope="col" class="text-center">Semestre</th>\n' +
                '            <th scope="col" class="text-center">Fecha de Inscripcion</th>\n' +
                '        <th scope="col" class="text-center">Fecha de Cierre</th>\n' +
                '        <th scope="col" class="text-center">Fecha de Graduación</th>\n' +
                '        <th scope="col" class="text-center">Situación Académica</th>\n' +
                '        </tr>\n' +
                '        </thead>\n' +
                '        <tbody>\n' +
                '        @if($ListadoResumenInscritos != null)\n' +
                '        @foreach($ListadoResumenInscritos as $resumen)\n' +
                '        <tr>\n' +
                '        <td class="text-center align-middle">{{$resumen->carnet}}</td>\n' +
                '            <td class="align-middle" style="width: 300px">{{$resumen->nombre_estudiante}}</td>\n' +
                '            <td class="text-center align-middle">{{$resumen->semestre}}</td>\n' +
                '            <td class="text-center align-middle">{{$resumen->fecha_inscripcion}}</td>\n' +
                '            <td class="text-center align-middle">{{$resumen->fec_cierre}}</td>\n' +
                '            <td class="text-center align-middle">{{$resumen->graduado}}</td>\n' +
                '            <td class="text-center align-middle">{{$resumen->situacion}}</td>\n' +
                '            </tr>\n' +
                '            @endforeach\n' +
                '            @else\n' +
                '            <tr>\n' +
                '            <td class="alert-info text-center" colspan="7">\n' +
                '            <i class="fa fa-info-circle"></i> No se encontraron datos\n' +
                '            </td>\n' +
                '            </tr>\n' +
                '            @endif\n' +
                '            </tbody>\n' +
                '            </table>');
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.onload = function() {
                ventana.print();
                ventana.close();
            };
            return true;
        }

        document.querySelector("#btnImprimir2").addEventListener("click", function() {
            var div = document.querySelector("#imprimible");
            imprimirPaginas(div);
        });




    </script>
@endsection
