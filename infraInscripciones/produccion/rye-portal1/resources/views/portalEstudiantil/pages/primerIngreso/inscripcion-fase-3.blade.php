@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .ocultarDiv{
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <br/>
        <h2>Fase 1 de 3</h2>

        {{-- id necesario para el funcionamiento y estetica del formulario --}}
        <div id="multistepform">

            {{-- Lista de pasos del formulario --}}
            <ul>
                <li><a href="#step-1">PASO 1<br /><small>Orden de Pago</small></a></li>
                <li><a href="#step-2">PASO 2<br /><small>Resumen - Constancia de Inscripcion</small></a></li>
            </ul>

            {{-- div que no hace nada pero sin el no sirve el formulario --}}
            <div>
                {{-- PASO 9: Orden de Pago --}}
                <div id="step-1" class="">
                    <table class="table table-borderless">
                        <tbody>
                        {{-- Datos del estdiante --}}
                        <tr>
                            <td>Ciclo:</td>
                            <td><strong>{{ $ciclo->ciclo_activo }}</strong></td>
                        </tr>
                        <tr>
                            <td>Registro Académico:</td>
                            <td>{{ Auth::guard('aspirante')->user()->carnet }}</td>
                        </tr>
                        <tr>
                            <td>C.U.I:</td>
                            <td>{{ Auth::guard('aspirante')->user()->cui }}</td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td>{{ Auth::guard('aspirante')->user()->getNombreCompleto() }}</td>
                        </tr>

                                {{-- Linea de separacion --}}
                                <tr>
                                    <td colspan="4">
                                        <hr>
                                    </td>
                                </tr>
                                {{-- Carrera 1 --}}
                                <tr>
                                    <td>Unidad académica:</td>
                                    <td><strong>{{ $carrera->idFacultad }}</strong> {{ $carrera->facultad }}</td>
                                    <td>
                                        @switch($carrera->boleta->estado)
                                            @case(0)
                                            <strong>Estado:</strong> <h1>Carrera con problemas</h1>
                                            @break
                                            @case(1)
                                            <strong>Estado:</strong> Pendiente de Generar Boleta
                                            @break
                                            @case(2)
                                            <strong>Estado:</strong>Pendiente de Pagar Boleta
                                            @break
                                            @case(3)
                                            <strong>Estado:</strong>Boleta Pagada
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <td>Extensión:</td>
                                    <td><strong>{{ $carrera->idExtension }}</strong> {{ $carrera->extension }}</td>
                                    <td>
                                        @switch($carrera->boleta->estado)
                                            @case(0)
                                            <button type="button" class="btn btn-sm btn-danger"
                                                    data-toggle="popover"
                                                    data-content="{{ $carrera->mensajeBloqueo }}"
                                                    data-html="true">Ver detalles</button>
                                            @break
                                            @case(1)
                                            <form action="{{ url('reinscripcion/pregrado/descararBoleta') }}" method="get" enctype="text/plain" target="_blank">
                                                @csrf
                                                <input type="hidden" value="{{ $nombreEstudiante }}" name="nombreEstudiante">
                                                <input type="hidden" value="{{ json_encode($carrera->boleta) }}" name="boleta">
                                                <input type="submit" class="btn btn-sm btn-info" value="Generar Boleta">
                                            </form>
                                            @break
                                            @case(2)
                                            <form action="{{ url('reinscripcion/pregrado/descararBoleta') }}" method="get" enctype="text/plain" target="_blank">
                                                @csrf
                                                <input type="hidden" value="{{ $nombreEstudiante }}" name="nombreEstudiante">
                                                <input type="hidden" value="{{ json_encode($carrera->boleta) }}" name="boleta">
                                                <input type="submit" class="btn btn-sm btn-outline-success" value="Descargar Boleta">
                                            </form>
                                            @break
                                            @case(3)
                                            <form action="{{ url('reinscripcion/pregrado/descararConstancia') }}" method="get" enctype="text/plain" target="_blank">
                                                @csrf
                                                <input type="hidden" value="{{ $nombreEstudiante }}" name="nombreEstudiante">
                                                <input type="hidden" value="{{ $carrera->idFacultad }}" name="idFacultad">
                                                <input type="hidden" value="{{ $carrera->idExtension }}" name="idExtension">
                                                <input type="hidden" value="{{ $carrera->idCarrera }}" name="idCarrera">
                                                <input type="submit" class="btn btn-sm btn-success" value="Imprimir Constancia">
                                            </form>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carrera:</td>
                                    <td><strong>{{ $carrera->idCarrera }}</strong> {{ $carrera->carrera }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                {{-- PASO 10: Resumen - Constancia de Inscripcion --}}
                <div id="step-2" class="">
                    Resumen
                </div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/multiStepForm.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            {{-- Configuración del MultiStepForm --}}
            $('#multistepform').smartWizard({
                keyNavigation:false, {{-- Deshabilita la navegacion con las flechas del teclado --}}
                backButtonSupport: false, {{-- Deshabilita regresar al paso anterior con el teclado --}}
                theme: 'dots', {{-- Usa el tema de puntitos engazados --}}
                lang: {
                    next: 'Siguiente',
                    previous: 'Anterior'
                },
                anchorSettings: {
                    anchorClickable: true,
                    removeDoneStepOnNavigateBack: true
                }
            });
        });
    </script>
@endsection
