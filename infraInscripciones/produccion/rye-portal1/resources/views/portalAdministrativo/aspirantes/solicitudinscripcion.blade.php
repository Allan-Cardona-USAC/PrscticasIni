@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <h3 align="center">
                    Solicitud De Inscripción
                </h3>
            </h2>
        </div>
        <div class="card-body" id="imprimible">
            <div class="row ml-3">
                <table>
                    <tr>
                        <td class="align-middle">
                            <img alt="logo" src="{{ asset('img/logo-usac.png') }}"/>
                        </td>
                        <td class=" pl-5 align-middle text-center">
                            <br>
                            <h1>Solicitud de Inscripción</h1>
                        </td>
                    </tr>
                </table>
            </div>
            <form method="GET" action="{{ route('administrativo.solicitudInscripcion') }}" accept-charset="UTF-8" role="search">

                {{-- Información personal --}}
                <div class="card mb-2">
                    <div class="card-header">
                        <h3><i class="fa fa-info-circle"></i> Información personal</h3>
                    </div>

                    {{-- card body --}}
                    <div class="card-body">
                        {{-- NOV  y Registro Academico--}}
                        <div class="form-group row pl-2">
                            <table>
                                <tr>
                                    <td>
                                        <label for="nov">N.O.V</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="nov" name="nov"  autocomplete="off" placeholder="{{ isset($estudiante) ? $estudiante->getNov() : 'NOV'}}" value="{{''}}" >
                                            <span class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" id="buscarNov" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="pl-2">
                                        <label for="carne">Registro Académico</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="carne" name="carne" autocomplete="off" placeholder="{{ isset($estudiante->carnet) ? $estudiante->carnet : 'Registro Académico'}}" value="{{''}}">
                                            <span class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" id="buscarCarne" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>

                                    </td>
                                    <td class="pl-2">
                                        <label for="inputCUI">CUI</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="cui" name="cui" autocomplete="off" placeholder="{{ isset($estudiante) ? $estudiante->getCui() : 'CUI'}}" value="{{''}}">
                                            <span class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" id="buscarCui" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                    <td colspan="2" rowspan="2">
                                        <img src="">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-2">
                                        <label for="pasaporte">Pasaporte</label>
                                        <div class="input-group">
                                        <input type="text" class="form-control" id="pasaporte" name="pasaporte" autocomplete="off" placeholder="{{ isset($estudiante) ? $estudiante->numero_registro : 'Pasaporte'}}" value="{{''}}">
                                        <span class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" id="buscarPasaporte" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                        </span>
                                        </div>
                                    </td>
                                    <td class="pl-2 pt-2">
                                        <label for="inputNombre1">Primer nombre</label>
                                        <input type="text" class="form-control" id="inputNombre1" placeholder="Primer nombre" autocomplete="off" value="{{ isset($estudiante) ? $estudiante->nombre1 : ''}}" readonly>
                                    </td>
                                    <td class="pl-2 pt-2">
                                        <label for="inputNombre2">Segundo nombre</label>
                                        <input type="text" class="form-control" id="inputNombre2" placeholder="Segundo nombre" autocomplete="off" value="{{ isset($estudiante) ? $estudiante->nombre2 : ''}}" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        {{-- end NOV --}}

                        {{-- nombres --}}
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputApellido1">Primer apellido</label>
                                <input type="text" class="form-control" id="inputApellido1"
                                       placeholder="Primer nombre" autocomplete="off"
                                       value="{{ isset($estudiante) ? $estudiante->getApellido1() : ''}}" readonly>
                            </div>
                            <div class="form-group col">
                                <label for="inputApellido2">Segundo apellido</label>
                                <input type="text" class="form-control" id="inputApellido2"
                                       placeholder="Primer nombre" autocomplete="off"
                                       value="{{ isset($estudiante) ? $estudiante->getApellido2() : ''}}" readonly>
                            </div>
                        </div>
                        {{-- end nombres --}}

                        {{-- otros nombres, fecha de nacimiento y genero --}}
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputNombre3">Otros Nombres</label>
                                <input type="text" id="inputNombre3"
                                       class="form-control"
                                       value="{{ isset($estudiante) ? $estudiante->getOtrosNombres() : ''}}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSexo">Genero</label>
                                <input type="text" id="inputSexo"
                                       class="form-control"
                                       value="{{ isset($estudiante) ? $estudiante->getGenero() : ''}}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                                <input type="text" id="inputFechaNacimiento"
                                       class="form-control"
                                       value="{{ isset($estudiante) ? $estudiante->getFechaNacimiento() : ''}}" readonly>
                            </div>
                        </div>
                        {{-- end otros nombres, fecha de nacimiento y sexo --}}
                    </div>
                    {{-- end card body --}}
                </div>
                {{-- end información personal--}}

                {{-- Información de contacto --}}
                <div class="card mb-2">
                    <div class="card-header">
                        <h3><i class="fa fa-address-card"></i> Información de contacto</h3>
                    </div>

                    {{-- card body --}}
                    <div class="card-body">
                        {{-- Dirección --}}
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCalle">Dirección Completa</label>
                                <input type="text" id="inputDireccion"
                                       class="form-control"
                                       placeholder="Dirección completa"
                                       value="{{ isset($estudiante) ? $estudiante->direccion : ''}}" readonly>
                            </div>
                        </div>

                        {{-- Departamento, Municipio y Zona --}}
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputDepartamento">Departamento</label>
                                <input type="text" id="inputDepartamento"
                                       class="form-control"
                                       placeholder="Departamento"
                                       value="{{ isset($estudiante) ? $estudiante->departamento->nombre : ''}}" readonly>
                            </div>
                            <div class="form-group col">
                                <label for="inputMunicipio">Municipio</label>
                                <input type="text" id="inputMunicipio"
                                       class="form-control"
                                       placeholder="Municipio"
                                       value="{{ isset($estudiante) ? $estudiante->getMunicipio()->municipio  : ''}}" readonly>
                            </div>
                            <div class="form-group col">
                                <label for="inputCodigoPostal">Zona / Cod. Postal</label>
                                <input type="text" id="inputCodigoPostal"
                                       class="form-control"
                                       placeholder="Zona"
                                       value="{{ isset($estudiante->postal) ? $estudiante->postal->cod_postal . ' - ' . $estudiante->postal->pais : ''}}" readonly>
                            </div>
                        </div>

                        {{-- Teléfono de Casa, Celular y Correo electrónico --}}
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputTelefono">Teléfono de Casa</label>
                                <input type="number" id="inputTelefono"
                                       class="form-control"
                                       placeholder="Teléfono de Casa"
                                       value="{{ isset($estudiante) ? $estudiante->telefono : ''}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCelular">Teléfono Celular</label>
                                <input type="number" id="inputCelular"
                                       class="form-control"
                                       placeholder="Teléfono Celular"
                                       value="{{ isset($estudiante) ? $estudiante->celular : ''}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Correo Electrónico</label>
                                <input type="email" id="inputEmail"
                                       class="form-control"
                                       value="{{ isset($estudiante) ? $estudiante->getCorreo() : ''}}" readonly>
                            </div>
                        </div>

                    </div>
                    {{-- end card body --}}
                </div>
                {{-- end información de contacto--}}

                {{-- Nacionalidad --}}
                <div class="card mb-2">
                    <div class="card-header">
                        <h3><i class="fa fa-globe"></i> Lugar de nacimiento y nacionalidad</h3>
                    </div>

                    {{-- card body --}}
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputLugarNacimientoPais">Pais</label>
                                <input type="text" id="inputLugarNacimientoPais"
                                       class="form-control"
                                       value="{{ isset($estudiante) ? $estudiante->paisNacimiento->nombre : ''}}" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputLugarNacimientoDepartamento">Departamento</label>
                                <input type="text" id="inputLugarNacimientoDepartamento"
                                       class="form-control"
                                       placeholder="Departamento"
                                       value="{{ isset($estudiante->departamentoNacimiento->nombre) ? $estudiante->departamentoNacimiento->nombre : ''}}" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputLugarNacimientoMunicipio">Municipio</label>
                                <input type="text" id="inputLugarNacimientoMunicipio"
                                       class="form-control"
                                       placeholder="Municipio"
                                       value="{{ isset($estudiante->municipioNacimiento->municipio) ? $estudiante->municipioNacimiento->municipio : ''}}" readonly>
                            </div>
                        </div>

                        {{-- Nacionalidad--}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputNacionalidad">Nacionalidad</label>
                                <input type="text" id="inputNacionalidad"
                                       class="form-control"
                                       value="{{ isset($estudiante) ? $estudiante->paisNacimiento->nacionalidad : ''}}" readonly>
                            </div>
                        </div>
                    </div>
                    {{-- end card body --}}
                </div>
                {{-- end nacionalidad --}}

                {{-- Carrera --}}
                <div class="card" style="height: 15rem;">
                    <div class="card-header">
                        <h3><i class="fa fa-graduation-cap"></i> Datos de la Carrera</h3>
                    </div>
                    {{-- card body --}}
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputSede">Sede Universitaria</label>
                                <input type="text" id="inputSede"
                                       class="form-control"
                                       value="{{ isset($lugarEstudios) ?  $lugarEstudios: ''}}" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputUA">Unidad Académica</label>
                                <input type="text" id="inputUA"
                                       class="form-control"
                                       value="{{ isset($unidad_academica) ? $unidad_academica : ''}}" readonly>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEXT">Extensión/Sección/Plan/Jornada</label>
                                <input type="text" id="inputEXT"
                                       class="form-control"
                                       value="{{ isset($extension) ?  $extension : ''}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="inputCarrera">Carrera</label>
                                    <input type="text" id="inputCarrera"
                                           class="form-control "
                                           value="{{ isset($nombreCarrera) ? $nombreCarrera  : ''}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end card body --}}
                </div>
                {{-- end carrera --}}
            </form>
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
            ventana.document.write('<html lang="es"> <head> <title>Solicitud Inscripcion - Departamento de Registro y Estadística</title>');
            ventana.document.write('<meta charset="utf-8"> <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">');
            ventana.document.write('<meta name="keywords" content="USAC,RyE,Primer Ingreso"> <meta name="author" content="USAC">');
            ventana.document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
            ventana.document.write('<link href="{{ asset('pike/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />');
            ventana.document.write('<link href="{{ asset('pike/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('pike/css/style.css') }}" rel="stylesheet" type="text/css" />');
            ventana.document.write('<link href="{{ asset('css/Print.css') }}" rel="stylesheet" />');
            ventana.document.write('</head><body>');
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
            document.getElementById('buscarNov').style.visibility = 'hidden';
            document.getElementById('buscarCarne').style.visibility = 'hidden';
            document.getElementById('buscarCui').style.visibility = 'hidden';
            document.getElementById('buscarPasaporte').style.visibility = 'hidden';
            var div = document.querySelector("#imprimible");
            imprimirSolicitudInscripcion(div);
            document.getElementById('btnImprimir').style.visibility = 'visible';
            document.getElementById('buscarNov').style.visibility = 'visible';
            document.getElementById('buscarCarne').style.visibility = 'visible';
            document.getElementById('buscarCui').style.visibility = 'visible';
            document.getElementById('buscarPasaporte').style.visibility = 'visible';

        });
    </script>
@endsection