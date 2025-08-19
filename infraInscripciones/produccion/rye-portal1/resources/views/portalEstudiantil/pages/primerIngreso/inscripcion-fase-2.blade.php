@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
        <br/>
        <h2>Fase 1 de 3</h2>

        {{-- id necesario para el funcionamiento y estetica del formulario --}}
        <div id="multistepform">

            {{-- Lista de pasos del formulario --}}
            <ul>
                <li><a href="#step-1">PASO 1<br /><small>Subir Fotografìa</small></a></li>
                <li><a href="#step-2">PASO 2<br /><small>Subir Certificado de Nacimiento</small></a></li>
                <li><a href="#step-3">PASO 3<br /><small>Encuesta Socio-Económica</small></a></li>
                <li><a href="#step-4">PASO 4<br /><small>Estudios Previos</small></a></li>
            </ul>

            {{-- div que no hace nada pero sin el no sirve el formulario --}}
            <div>
                {{-- PASO 1: Subir Fotografìa --}}
                <div id="step-1" class="">
                    <h1>Fotografía</h1>
                    <p>Instrucciones y requisitos para subir la foto.</p>
                    <form action="{{ route('aspirante.fase2.subirFoto') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="fotoDescripcion">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" id="foto" name="foto"
                                       class="custom-file-input"
                                       aria-describedby="fotoDescripcion">
                                <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                            <input type="submit" class="btn btn-sm btn-success" value="Subir Foto">
                        </div>
                    </form>
                </div>

                {{-- PASO 2: Subir Certificado de Nacimiento --}}
                <div id="step-2" class="">
                    <h1>Subir certificado de nacimiento</h1>
                    <p>Instrucciones y lineamientos de como escanearlo o subir el pdf</p>
                    <form action="{{ route('aspirante.fase2.subirCertificado') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="certificadoDescripcion">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" id="certificado" name="certificado"
                                       class="custom-file-input"
                                       aria-describedby="certificadoDescripcion">
                                <label class="custom-file-label" for="certificado">Choose file</label>
                            </div>
                            <input type="submit" class="btn btn-sm btn-success" value="Subir Certificado">
                        </div>
                    </form>
                </div>

                {{-- PASO 3: Encuesta Socio-Económica --}}
                <div id="step-3" class="">
                    <div class="embed-responsive embed-responsive-21by9"> {{-- todo Hacer que ocupe más espacio --}}
                        <iframe class="embed-responsive-item" src="{{ $urlEncuesta }}"></iframe>
                    </div>
                </div>

                {{-- PASO 4: Estudios Previos --}}
                <div id="step-4" class="">

                    <form action="{{ route('aspirante.fase2.getDatosMINEDUC')  }}" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cui">CUI</label>
                            <input type="text" class="form-control" id="cui" name="cui" placeholder="CUI">
                        </div>
                        <input type="submit" class="btn btn-sm btn-success" value="Buscar">
                    </form>

                    <form action="{{ route('aspirante.fase2.getDatosMINEDUC')  }}" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="registroTitulo">Registro de titulo</label>
                            <input type="text" class="form-control" id="registroTitulo" name="registroTitulo" placeholder="Número de registro de titulo">
                        </div>
                        <input type="submit" class="btn btn-sm btn-success" value="Buscar">
                    </form>

                    <hr>

                    <form action="#" method="post">

                        {{-- Número de Orientación Vocacional --}}
                        <div class="form-group row">
                            <label for="inputNOV" class="col-form-label col-12 col-md-3">N.O.V.</label>
                            <div class="col-auto">
                                <input type="text" class="form-control-plaintext form-control-sm" id="inputNOV" value="2019123456"
                                       readonly required>
                            </div>
                        </div>

                        {{-- Tipo de Estudio de Diversificado --}}
                        <div class="form-group row">
                            <label for="inputTipoDiversificado" class="col-form-label col-12 col-md-3">Tipo de estudio
                                de diversificado</label>
                            <div class="col-auto">
                                <select class="form-control form-control-sm custom-select" id="inputTipoDiversificado">
                                    <option selected>Bachillerato</option>
                                    <option>Perito</option>
                                </select>
                            </div>
                        </div>

                        {{-- Título de Nivel Medio --}}
                        <div class="form-group row">
                            <label for="inputTituloNivelMedio" class="col-form-label col-12 col-md-3">Título de Nivel
                                Medio</label>
                            <div class="col-auto">
                                <select class="form-control form-control-sm custom-select" id="inputTituloNivelMedio">
                                    <option selected>Bachillerato en Ciencias y Letras</option>
                                    <option>Bachillerato en Computación</option>
                                </select>
                            </div>
                        </div>

                        {{-- Fecha de Graduación --}}
                        <div class="form-group row">
                            <label for="inputFechaGraduacion" class="col-form-label col-12 col-md-3">Fecha de
                                Graduación</label>
                            <div class="col">
                                <input type="date" class="form-control form-control-sm" id="inputFechaGraduacion" required>
                            </div>
                        </div>

                        {{-- Tipo de Establecimiento --}}
                        <div class="form-group row">
                            <label for="inputTipoEstablecimiento" class="col-form-label col-12 col-md-3">Tipo de
                                Establecimiento</label>
                            <div class="col">
                                <select class="form-control form-control-sm custom-select" id="inputTipoEstablecimiento">
                                    <option selected>Publico</option>
                                    <option>Privado</option>
                                </select>
                            </div>
                        </div>

                        {{-- Ubicación del Establecimiento --}}
                        <div class="form-group row">
                            <label for="inputTipoEstablecimiento" class="col-form-label col-12 col-md-3">Ubicación del
                                Establecimiento</label>
                            <div class="col">

                                {{-- Pais --}}
                                <div class="form-group row">
                                    <label for="inputEstablecimientoPais"
                                           class="col-form-label col-12 col-md-4 col-lg-3">País</label>
                                    <div class="col">
                                        <select class="form-control form-control-sm custom-select" id="inputEstablecimientoPais">
                                            <option selected>Guatemala</option>
                                            <option>Holanda</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Departamento --}}
                                <div class="form-group row">
                                    <label for="inputEstablecimientoDepartamento"
                                           class="col-form-label col-12 col-md-4 col-lg-3">Departamento</label>
                                    <div class="col">
                                        <select class="form-control form-control-sm custom-select"
                                                id="inputEstablecimientoDepartamento">
                                            <option selected>Guatemala</option>
                                            <option>Petén</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Municipio --}}
                                <div class="form-group row">
                                    <label for="inputEstablecimientoDepartamento"
                                           class="col-form-label col-12 col-md-4 col-lg-3">Municipio</label>
                                    <div class="col">
                                        <select class="form-control form-control-sm custom-select"
                                                id="inputEstablecimientoDepartamento">
                                            <option selected>Guatemala</option>
                                            <option>Mixco</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <button class="btn btn-primary">Buscar Establecimiento</button>
                                </div>
                            </div>
                        </div>

                        {{-- Nombre del Establecimiento --}}
                        <div class="form-group row">
                            <label for="inputNombreEstablecimiento" class="col-form-label col-12 col-md-3">Nombre del
                                Establecimiento</label>
                            <div class="col">
                                <select class="form-control form-control-sm custom-select" id="inputNombreEstablecimiento">
                                    <option selected>Establecimiento 1</option>
                                    <option>Establecimiento 2</option>
                                </select>
                            </div>
                        </div>

                        {{-- Dirección del Establecimiento --}}
                        <div class="form-group row">
                            <label for="inputDireccionEstablecimiento" class="col-form-label col-12 col-md-3">Dirección
                                del Establecimiento</label>
                            <div class="col">
                                <input type="text" class="form-control-plaintext form-control-sm" id="inputDireccionEstablecimiento"
                                       value="Algun lugar de Zona 1">
                            </div>
                        </div>
                    </form>
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
