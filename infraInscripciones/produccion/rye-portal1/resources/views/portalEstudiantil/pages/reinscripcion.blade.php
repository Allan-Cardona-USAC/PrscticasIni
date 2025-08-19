@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <br/>
        <h2>Reinscripción</h2>
            <div id="multistepform">
                <ul>
                    <li><a href="#step-1">PASO 1<br /><small>Encuesta Socioeconómica</small></a></li>
                    <li><a href="#step-2">PASO 2<br /><small>Listado de Carreras</small></a></li> 
                </ul>
                <div>
                    <div id="step-1" class="">
                       <div class="embed-responsive embed-responsive-1by1"> {{-- todo Hacer que ocupe más espacio --}}
                            <iframe class="embed-responsive-item" src="{{ $urlEncuesta }}"></iframe>
                        </div> 

                    </div>
                   
                    <div id="step-2" class="">
                   
                        <div class="table-responsive">
                            <h4>Carreras Asígnadas</h4>
                        
                            <table class="table table-borderless">
                                <tbody>
                                {{-- Datos del estdiante --}}
                                <tr>
                                    <td>Ciclo:</td>
                                    <td><strong>{{ $ciclo->ciclo_activo }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Registro Académico:</td>
                                    <td>{{ Auth::guard('estudiante')->user()->carnet }}</td>
                                </tr>
                                <tr>
                                    <td>C.U.I:</td>
                                    <td>{{ Auth::guard('estudiante')->user()->cui }}</td>
                                </tr>
                                <tr>
                                    <td>Nombre:</td>
                                    <td>{{ Auth::guard('estudiante')->user()->getNombreCompleto() }}</td>
                                </tr>
                                
                                @if(!$bloqueado)
                                    @foreach($carreras as $carrera)
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
                                                    <form action="{{ url('estudiante/reinscripcion/pregrado/descargarBoleta') }}" method="get" enctype="text/plain" target="_blank">
                                                        @csrf
                                                        <input type="hidden" value="{{ $carrera->boleta->idOrdenPago }}" name="idOrdenPago">
                                                        <input type="hidden" value="{{ $carnet }}" name="carnet">
                                                        <input type="submit" class="btn btn-sm btn-info" value="Generar Boleta">
                                                    </form>
                                                    @break
                                                    @case(2)
                                                    <form action="{{ url('estudiante/reinscripcion/pregrado/descargarBoleta') }}" method="get" enctype="text/plain" target="_blank">
                                                        @csrf
                                                        <input type="hidden" value="{{ $carrera->boleta->idOrdenPago }}" name="idOrdenPago">
                                                        <input type="hidden" value="{{ $carnet }}" name="carnet">
                                                        <input type="submit" class="btn btn-sm btn-outline-success" value="Descargar Boleta">
                                                    </form>
                                                    @break
                                                    @case(3)
                                                    <form action="{{ url('estudiante/reinscripcion/pregrado/descargarConstancia') }}" method="get" enctype="text/plain" target="_blank">
                                                        @csrf
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

                                    @endforeach
                                @else
                                    {{-- Linea de separacion --}}
                                    <tr>
                                        <td colspan="4">
                                            <hr>                                          
                                        </td>
                                    </tr>
                                    {{-- Mensaje de Biblioteca --}}
                                    <tr>
                                        <td>Estado en biblioteca</td>
                                        @if($bloqueoBiblioteca)
                                            <td>Insolvente</td>
                                        @else
                                            <td>Solvente</td>
                                        @endif
                                    </tr>
                                    {{-- Mensaje de Unidad de Salud --}}
                                    <tr>
                                        <td>Examen de Salud</td>
                                        @if($bloqueoUnidadSalud != false)
                                            <td>{{ $bloqueoUnidadSalud }}</td>
                                        @else
                                            <td>EXAMEN REALIZADO</td>
                                        @endif
                                    </tr>
                                    {{-- Mensaje de Becados --}}
                                    <tr>
                                        <td>Becados Registro y Estadística</td>
                                        @if($bloqueoBecado)
                                            <td>
                                                Por favor ponerse en contacto con Dirección General Financiera, Sección de Cobros<br/>
                                                Teléfonos y correos electrónicos de los encargados de Becas Préstamo: <br/>
                                                <ul>
                                                    <li><strong>Tel.: 5698-6330, Correo: abregofrancisco@usac.edu.gt</strong></li>
                                                    <li><strong>Tel.: 3347-1032, Correo: gerardoa@usac.edu.gt</strong></li>
                                                    
                                                </ul>
                                                <a href='https://secciondecobros.usac.edu.gt'>Página web</a>
                                            </td>
                                        @else
                                            <td>Sin problemas</td>
                                        @endif
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/multiStepForm.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#multistepform').smartWizard({
                keyNavigation:false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                backButtonSupport: false, // Enable the back button support
                theme: 'dots', // Name of the theme to use. Remember to include the theme css also
            
                anchorSettings: {
                    anchorClickable: true,
                    removeDoneStepOnNavigateBack: true
                }
            });

            {{--$("#multistepform").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                return confirm("¿Seguro que quieres salir del paso "+stepNumber+"?");
            });--}}

            $("#multistepform").smartWizard('goToStep', {{ $paso }});
        });
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>
@endsection
