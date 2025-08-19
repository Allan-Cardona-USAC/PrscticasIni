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

        {{-- id necesario para el funcionamiento y estetica del formulario --}}
        <div id="multistepform">

            {{-- Lista de pasos del formulario --}}
            <ul>
                <li><a href="#step-8">PASO 8<br /><small>Confirmar datos</small></a></li>
                <li><a href="#step-9">PASO 9<br /><small>Orden de Pago</small></a></li>
            </ul>

            {{-- div que no hace nada pero sin el no sirve el formulario --}}
            <div>
                {{-- PASO 8: Orden de Pago --}}
                <div id="step-8" class="">
                    {{-- Confirmación --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-exclamation-circle"></i> Confirmación</h3>
                        </div>

                        {{-- card body --}}
                        <div class="card-body">
                                <table class="table table-borderless table-hover">
                                        <tbody>
                                        {{-- Datos del estdiante --}}
                                        <tr>
                                            <th>Ciclo</th>
                                            <td><strong>{{ $ciclo->ciclo_activo }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>NOV</th>
                                            <td>{{ Auth::guard('aspirante')->user()->nov }}</td>
                                        </tr>
                                        @if(Auth::guard('aspirante')->user()->esExtranjero())
                                            <tr>
                                                <th>Pasaporte</th>
                                                <td>{{ Auth::guard('aspirante')->user()->numero_registro }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>CUI</th>
                                                <td>{{ Auth::guard('aspirante')->user()->numero_registro }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ Auth::guard('aspirante')->user()->getNombreCompleto() }}</td>
                                        </tr>

                                        <tr>
                                            <th>Unidad académica</th>
                                            <td><strong>{{ $carrera->idFacultad }}</strong> {{ $carrera->facultad }}</td>
                                        </tr>
                                        <tr>
                                            <th>Extensión</th>
                                            <td><strong>{{ $carrera->idExtension }}</strong> {{ $carrera->Extension }}</td>
                                        </tr>
                                        <tr>
                                            <th>Carrera</th>
                                            <td><strong>{{ $carrera->idCarrera }}</strong> {{ $carrera->Carrera }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estado</th>
                                            <td>Sin confirmar</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ url('aspirante/inscripcion#step-2') }}" class="btn btn-sm btn-warning">Cambiar carrera</a>
                                    <button class="btn btn-sm btn-info" onclick="paso8()">Confirmar</button>
                        </div>
                        {{-- end card body --}}
                    </div>
                    {{-- end confirmación--}}

                </div>

                {{-- PASO 9: Orden de Pago --}}
                <div id="step-9" class="">
                    {{-- Confirmación --}}
                    <div class="card mb-3">
                        <div class="card-header">

                            <h3>
                                {{--<i class="fa fa-exclamation-circle"></i> Confirmación--}}
                                @switch($estado)
                                    @case(0)
                                        <i class="fa fa-money"></i> Generar boleta de pago
                                    @break
                                    @case(1)
                                        <i class="fa fa-download"></i> Descargar boleta de pago
                                    @break
                                    @case(2)
                                        <i class="fa fa-address-card-o"></i> Constancia de inscripción
                                    @break
                                    @default
                                        <i class="fa fa-exclamation-triangle"></i> Error
                                @endswitch
                            </h3>
                        </div>

                        {{-- card body --}}
                        <div class="card-body">
                                <table class="table table-borderless table-hover">
                                        <tbody>
                                        {{-- Datos del estdiante --}}
                                        <tr>
                                            <th>Ciclo</th>
                                            <td><strong>{{ $ciclo->ciclo_activo }}</strong></td>
                                        </tr>
                                        @if(isset($carnet))
                                            <tr>
                                                <th>Carnet</th>
                                                <td>{{ $carnet }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>NOV</th>
                                            <td>{{ Auth::guard('aspirante')->user()->nov }}</td>
                                        </tr>
                                        @if(Auth::guard('aspirante')->user()->esExtranjero())
                                            <tr>
                                                <th>Pasaporte</th>
                                                <td>{{ Auth::guard('aspirante')->user()->numero_registro }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>CUI</th>
                                                <td>{{ Auth::guard('aspirante')->user()->numero_registro }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ Auth::guard('aspirante')->user()->getNombreCompleto() }}</td>
                                        </tr>

                                        <tr>
                                            <th>Unidad académica</th>
                                            <td><strong>{{ $carrera->idFacultad }}</strong> {{ $carrera->facultad }}</td>
                                        </tr>
                                        <tr>
                                            <th>Extensión</th>
                                            <td><strong>{{ $carrera->idExtension }}</strong> {{ $carrera->Extension }}</td>
                                        </tr>
                                        <tr>
                                            <th>Carrera</th>
                                            <td><strong>{{ $carrera->idCarrera }}</strong> {{ $carrera->Carrera }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estado</th>
                                            <td>
                                                @switch($estado)
                                                    @case(0)
                                                        Pendiente de generar boleta
                                                    @break
                                                    @case(1)
                                                        Pendiente de pagar matrícula
                                                    @break
                                                    @case(2)
                                                        Inscrito
                                                    @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    @switch($estado)
                                        @case(0)
                                            <form action="{{ route('aspirante.fase3.generarBoleta') }}" method="post" target="_blank">
                                                @csrf
                                                <input type="submit" class="btn btn-sm btn-info" value="Generar boleta"> {{-- todo hacer que el boton cambia luego de apacharlo --}}
                                            </form>
                                        @break
                                        @case(1)
                                            <form action="{{ route('aspirante.fase3.generarBoleta') }}" method="get" target="_blank">
                                                @csrf
                                                <input id="botonMagico" type="submit" class="btn btn-sm btn-info" value="Descargar boleta">
                                            </form>
                                        @break
                                        @case(2)
                                            <form action="{{ route('aspirante.fase3.generarConstanciaInscripcion') }}" method="post" target="_blank">
                                                @csrf
                                                <input type="hidden" id="idFacultad" name="idFacultad" value="{{ $carrera->idFacultad }}">
                                                <input type="hidden" id="idExtension" name="idExtension" value="{{ $carrera->idExtension }}">
                                                <input type="hidden" id="idCarrera" name="idCarrera" value="{{ $carrera->idCarrera }}">
                                                <input type="submit" class="btn btn-sm btn-outline-success" value="Descargar constancia de inscripción">
                                            </form>
                                        @break
                                        @default
                                            <form  method="get" target="_blank">
                                                @csrf
                                                <input type="submit" class="btn btn-sm btn-danger" value="Error">
                                            </form>
                                    @endswitch
                        </div>
                        {{-- end card body --}}
                    </div>
                    {{-- end confirmación--}}



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
                {{--lang: {
                    next: 'Siguiente',
                    previous: 'Anterior'
                }, --}}
                anchorSettings: {
                    anchorClickable: true,
                    removeDoneStepOnNavigateBack: true
                }
            });

            $('#multistepform').smartWizard('goToStep', {{ ($carrera->confirmoCarrera) ? 1 : 0 }});
        });

        function paso8(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });

            $.ajax({
                url: "{{ route('aspirante.fase3.confirmarCarrera') }}",
                type: 'GET',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data){
                    alert(data);
                    $('#multistepform').smartWizard('nextStep');
                },
                error: function (data) {
                    alert(JSON.stringify(data)); //todo revisar esto
                    console.log(data);
                }
            });
        }
    </script>
@endsection
