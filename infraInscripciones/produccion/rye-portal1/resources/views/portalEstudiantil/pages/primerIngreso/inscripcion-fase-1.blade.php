@extends('layouts.master')
{{--@extends('aspirante.layouts.app')--}}

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">
    {{-- Oculta div's del formulario --}}
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
                <li><a href="#step-1">PASO 1<br /><small>Datos personales</small></a></li>
                <li><a href="#step-2">PASO 2<br /><small>Seleccion de Lugar de Estudios</small></a></li>
                <li><a href="#step-3">PASO 3<br /><small>Selección de Unidad Académica</small></a></li>
                <li><a href="#step-4">PASO 4<br /><small>Selección de Carrera</small></a></li>
            </ul>

            {{-- div que no hace nada pero sin el no sirve el formulario --}}
            <div>
                {{-- PASO 1: Llenar Formulario de Datos Personales --}}
                <div id="step-1" class="">
                    <form id="formDatos" action="#">

                        <fieldset class="border border-dark p-2">
                            <legend class="w-auto">Datos Pesonales</legend>

                            {{-- Número de Orientación Vocacional --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputNOV">N.O.V.</label>
                                    <input type="text" class="form-control-plaintext form-control-sm"
                                           id="inputNOV" value="{{ Auth::guard('aspirante')->user()->nov }}"
                                           readonly required>
                                </div>
                            </div>

                            {{-- Nombres y Apellidos --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputApellido1">Primer Apellido</label>
                                    <input type="text" id="inputApellido1"
                                           class="form-control-sm form-control"
                                           placeholder="Primer Apellido"
                                           value="{{ Auth::guard('aspirante')->user()->apellido1 --}}" required>
                                </div>
                                <div class="form-group col">
                                    <label for="inputApellido2">Segundo Apellido</label>
                                    <input type="text" id="inputApellido2"
                                           class="form-control-sm form-control"
                                           placeholder="Segundo Apellido"
                                           value="{{ Auth::guard('aspirante')->user()->apellido2 }}" required>
                                </div>
                                <div class="form-group col">
                                    <label for="inputNombre1">Primer Nombre</label>
                                    <input type="text" id="inputNombre1"
                                           class="form-control-sm form-control"
                                           placeholder="Primer Nombre"
                                           value="{{ Auth::guard('aspirante')->user()->nombre1 }}"  required>
                                </div>
                                <div class="form-group col">
                                    <label for="inputNombre2">Segundo Nombre</label>
                                    <input type="text" id="inputNombre2"
                                           class="form-control-sm form-control"
                                           placeholder="Segundo Nombre"
                                           value="{{ Auth::guard('aspirante')->user()->nombre2 }}">
                                </div>
                            </div>

                            {{-- Otros nombres y Sexo --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputNombre3">Otros Nombres</label>
                                    <input type="text" id="inputNombre3"
                                           class="form-control-sm form-control"
                                           placeholder="Otros Nombres"
                                           value="{{ Auth::guard('aspirante')->user()->otros_nombres }}">
                                </div>
                                <div class="form-group col">
                                    <label for="inputSexo">Sexo</label>
                                    <select class="form-control form-control-sm custom-select" id="inputSexo">
                                        <option value="0"
                                                @if(Auth::guard('aspirante')->user()->sexo == 2)
                                                selected
                                            @endif >Femenino</option>
                                        <option value="1"
                                                @if(Auth::guard('aspirante')->user()->sexo == 1)
                                                selected
                                            @endif >Masculino</option>
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                                    <input type="date" id="inputFechaNacimiento"
                                           class="form-control form-control-sm"
                                           value="{{ Auth::guard('aspirante')->user()->fecha_nacimiento }}" required>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border border-dark p-2">
                            <legend class="w-auto">Datos de contacto</legend>

                            {{-- Dirección --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCalle">Calle</label>
                                    <input type="text" id="inputCalle"
                                           class="form-control form-control-sm"
                                           placeholder="Calle o avenida"
                                           value="{{ (!isset($calle)) ? : $calle }}" required>
                                </div>
                                <div class="form-group col">
                                    <label for="inputNumeroCasa">Número de casa</label>
                                    <input type="text" id="inputNumeroCasa"
                                           class="form-control form-control-sm"
                                           placeholder="# de casa"
                                           value="{{ (!isset($numeroCasa)) ? : $numeroCasa }}" required>
                                </div>
                                <div class="form-group col">
                                    <label for="inputColonia">Colonia</label>
                                    <input type="text" id="inputColonia"
                                           class="form-control form-control-sm"
                                           placeholder="Colonia"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Indique el nombre del Barrio, Colonia, Residencial o Condominio en el que vive"
                                           value="{{ (!isset($colonia)) ? : $colonia }}" required>
                                </div>
                            </div>

                            {{-- Departamento, Municipio y Código Postal --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputDepartamento">Departamento</label>
                                    <select class="form-control form-control-sm custom-select" id="inputDepartamento">
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->codigo }}"
                                                    @if(Auth::guard('aspirante')->user()->depto_recide == $departamento->codigo)
                                                    selected
                                                @endif >{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputMunicipio">Municipio</label>
                                    <select class="form-control form-control-sm custom-select" id="inputMunicipio">
                                        @foreach($municipios as $municipio)
                                            <option value="{{ $municipio->cod_muni }}"
                                                    @if(Auth::guard('aspirante')->user()->muni_recide == $municipio->cod_muni)
                                                    selected
                                                @endif >{{ $municipio->municipio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputCodigoPostal">Código Postal</label>
                                    <select class="form-control form-control-sm custom-select" id="inputCodigoPostal">
                                        @foreach($codigosPostales as $codigo)
                                            <option value="{{ $codigo->cod_postal }}"
                                                    @if(Auth::guard('aspirante')->user()->cod_Postal == $codigo->cod_postal)
                                                    selected
                                                @endif >{{ $codigo->cod_postal }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Teléfono de Casa, Celular y Proveedor --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputTelefono">Teléfono de Casa</label>
                                    <input type="number" id="inputTelefono"
                                           class="form-control form-control-sm"
                                           placeholder="Teléfono de Casa"
                                           value="{{ Auth::guard('aspirante')->user()->telefono }}">
                                </div>
                                <div class="form-group col">
                                    <label for="inputCelular">Teléfono Celular</label>
                                    <input type="number" id="inputCelular"
                                           class="form-control form-control-sm"
                                           placeholder="Teléfono Celular"
                                           value="{{ Auth::guard('aspirante')->user()->celular }}"
                                           required>
                                </div>
                            </div>

                            {{-- Correo Electronico y Fecha de Nacimiento --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputEmail">Correo Electrónico</label>
                                    <input type="email" id="inputEmail"
                                           class="form-control form-control-sm"
                                           value="{{ Auth::guard('aspirante')->user()->correo_electronico }}" required>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border border-dark p-2">
                            <legend class="w-auto">Lugar de Nacimiento</legend>

                            {{-- Lugar de Nacieminto: Pais, Departamento y Municipio --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputLugarNacimientoPais">Pais</label>
                                    <select class="form-control form-control-sm custom-select" id="inputLugarNacimientoPais">
                                        @foreach($paises as $pais)
                                            <option value="{{ $pais->codigo }}"
                                                    @if($pais->codigo == '30')
                                                    selected
                                                @endif>{{ $pais->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputLugarNacimientoDepartamento">Departamento</label>
                                    <select class="form-control form-control-sm custom-select" id="inputLugarNacimientoDepartamento">
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->codigo }}"
                                                @if(Auth::guard('aspirante')->user()->depto_nac == $departamento->codigo)
                                                selected
                                            @endif>{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputLugarNacimientoMunicipio">Municipio</label>
                                    <select class="form-control form-control-sm custom-select" id="inputLugarNacimientoMunicipio">
                                        @foreach($municipios as $municipio)
                                            <option value="{{ $municipio->cod_muni }}"
                                                @if(Auth::guard('aspirante')->user()->muni_nac == $municipio->cod_muni)
                                                selected
                                            @endif>{{ $municipio->municipio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border border-dark p-2">
                            <legend class="w-auto">Nacionalidad y Matricula</legend>

                            {{-- Nacionalidad y Aproximado de Matrícula --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputNacionalidad">Nacionalidad</label>
                                    <select class="form-control form-control-sm custom-select form-control-lg" id="inputNacionalidad">
                                        @foreach($nacionalidades as $nacionalidad)
                                            <option value="{{ $nacionalidad->codigo_nacionalidad }}"
                                                @if($nacionalidad->codigo_nacionalidad == '30')
                                                    selected
                                                @endif>{{ $nacionalidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputMatrícula">Matrícula</label>
                                    <input type="text" class="form-control-plaintext form-control-sm form-control-lg" value="Q24,000.00"
                                           id="inputMatrícula">
                                </div>
                            </div>

                            {{-- Identificación: CUI o Pasaporte --}}
                            <div class="form-row">
                                <div id="cui" class="form-group col">
                                    <label for="inputCUI">CUI</label>
                                    <input type="number" class="form-control form-control-sm"
                                           id="inputCUI"
                                           value="{{ Auth::guard('aspirante')->user()->numero_registro }}">
                                </div>
                                <div id="pasaporte" class="form-group col ocultarDiv">
                                    <label for="inputPasaporte">Pasaporte</label>
                                    <input type="number" class="form-control form-control-sm"
                                           id="inputPasaporte"
                                           value="{{ Auth::guard('aspirante')->user()->numero_registro }}">
                                </div>
                            </div>
                        </fieldset>

                        {{-- <fieldset class="border border-dark p-2">
                            <legend class="w-auto">Certificación de Nacimiento</legend>

                            Cetiicado de Nacimiento
                            <div id="certificadoNacimiento" class="form-row">
                                <div class="form-group col">
                                    <label for="inputLibro">Libro</label>
                                    <input type="number" class="form-control form-control-sm" value="1" id="inputLibro">
                                </div>
                                <div class="form-group col">
                                    <label for="inputFolio">Folio</label>
                                    <input type="number" class="form-control form-control-sm" value="1" id="inputFolio">
                                </div>
                                <div class="form-group col">
                                    <label for="inputActa">Acta</label>
                                    <input type="number" class="form-control form-control-sm" value="1" id="inputActa">
                                </div>
                            </div>
                        </fieldset>--}}

                        <fieldset class="border border-dark p-2">
                            <legend class="w-auto">Atoadscripción Étnica</legend>

                            {{-- Autoadscripción Étnica --}}
                            <div class="form-row">
                                <div id="autoAdscripcionEtnicaEtnia" class="form-group col">
                                    <label for="inputEtnia">Etnia</label>
                                    <select class="form-control form-control-sm custom-select form-control-lg" id="inputEtnia">
                                        @foreach($etnia as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == Auth::guard('aspirante')->user()->etnia or $item->id == '1.00')
                                                    selected
                                                @endif>{{ $item->etnia }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputIdiomaMaterno">Idioma Materno</label>
                                    <select class="form-control form-control-sm custom-select form-control-lg" id="inputIdiomaMaterno">
                                        @foreach($etnia as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == Auth::guard('aspirante')->user()->idioma_etnia or $item->id == '1.00')
                                                    selected
                                                @endif>{{ $item->idioma }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="autoAdscripcionEtnicaIdiomaGuatemalteco" class="form-group col">
                                    <label for="inputIdiomaGuatemalteco">Si domina otro idioma Guatemalteco, indique
                                        cual</label>
                                    <select class="form-control form-control-sm custom-select form-control-lg" id="inputIdiomaGuatemalteco">
                                        <option value="0" selected>No</option>
                                        @foreach($etnia as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == Auth::guard('aspirante')->user()->idioma_gt or $item->id == '1.00')
                                                    selected
                                                @endif>{{ $item->idioma }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputIdiomaNoGuatemalteco">Si domina algún idioma no Guatemalteco, indique
                                        cual</label>
                                    <input type="text" class="form-control form-control-sm"
                                           id="inputIdiomaNoGuatemalteco"
                                           value="{{ (!isset(Auth::guard('aspirante')->user()->idioma_no_gt)) ? : Auth::guard('aspirante')->user()->idioma_no_gt }}" >
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" class="btn btn-sm btn-success" value="Guardar y continuar" id="inputSubmit" onclick="paso1()">
                            </div>
                        </div>
                    </form>
                </div>

                {{-- PASO 2: Seleccion de Lugar de Estudios --}}
                <div id="step-2" class="">
                    <div class="table-responsive table-hover">
                        <table class="table table-hover" id="centrosUniversitarios">
                            <thead>
                            <tr>
                                <th>#</th><th>Lugar de Estudio</th><th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lugaresDeEstudio as $key => $lugar)
                                <tr>
                                    {{-- Número de opcion, la variable loop sale de la nada --}}
                                    <td>{{ $loop->iteration }}</td>

                                    {{-- Nombre del Centro Universitario --}}
                                    <td>{{ $key }}</td>
                                    <td>
                                        <a href="#" title="View facultad">
                                            {{-- sw-btn-next pasa al siguiente formulario al darle click al boton --}}
                                            <button class="btn btn-info btn-sm" onclick="paso3('{{ $key }}')">Elegir</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                {{-- PASO 3: Selección de Unidad Académica --}}
                <div id="step-3" class="">
                    <div class="table-responsive">
                        <table class="table table-hover" id="unidadesAcademicas">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Unidad Académica</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tbodyUA">
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- PASO 4: Selección de Carrera --}}
                <div id="step-4" class="">
                    <div class="table-responsive" id="carreras">
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

            {{-- Dependiendo de la nacionalidad muestra ciertos campos --}}
            $('#inputNacionalidad').on('change', function () {
                var nacionalidad = $(this).val();
                $("div.ocultarDiv").hide();
                if (nacionalidad == 30){ {{-- 30 = código de guatemala --}}
                    $('#cui').show();
                    $('#pasaporte').hide();
                    $('#autoAdscripcionEtnicaEtnia').show();
                    $('#autoAdscripcionEtnicaIdiomaGuatemalteco').show();
                } else {
                    $('#pasaporte').show();
                    $('#cui').hide();
                    $('#autoAdscripcionEtnicaEtnia').hide();
                    $('#autoAdscripcionEtnicaIdiomaGuatemalteco').hide();
                }
            });

            {{-- Obtiene los Municipios del Departamento seleccionado --}}
            $("#inputDepartamento").on('change', function(){
                var idDepartamento = $(this).val();
                if(idDepartamento) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/municipios/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamento
                        },
                        success:function(data) {
                            $("#inputMunicipio").empty();
                            $.each(data, function(key, value){
                                $("#inputMunicipio").append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
            });

            {{-- Obtiene los Códigos Postales del Municipio seleccionado --}}
            $("#inputMunicipio").on('change', function(){
                var idMunicipio = $(this).val();
                var input = document.getElementById("inputDepartamento");
                var idDepartamento = input.options[input.selectedIndex].value;
                if(idMunicipio) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/codigosPostales/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamento,
                            municipio: idMunicipio
                        },
                        success:function(data) {
                            $("#inputCodigoPostal").empty();
                            $.each(data, function(key, value){
                                $("#inputCodigoPostal").append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
            });

            {{-- Dependiendo del pais de nacimiento muestra ciertos campos --}}
            $('#inputLugarNacimientoPais').on('change', function () {
                var pais = $(this).val();
                $("div.ocultarDiv").hide();
                if (pais == 30){ {{-- 30 = código de guatemala --}}
                    $('#inputLugarNacimientoDepartamento').show();
                    $('#inputLugarNacimientoMunicipio').show();
                } else {
                    $('#inputLugarNacimientoDepartamento').hide();
                    $('#inputLugarNacimientoMunicipio').hide();
                }
            });

            {{-- Obtiene los Municipios del Departamento seleccionado para el lugar de nacimiento--}}
            $("#inputLugarNacimientoDepartamento").on('change', function(){
                var idDepartamento = $(this).val();
                if(idDepartamento) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/municipios/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamento
                        },
                        success:function(data) {
                            $("#inputLugarNacimientoMunicipio").empty();
                            $.each(data, function(key, value){
                                $("#inputLugarNacimientoMunicipio").append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
            });

        });

        {{-- Habilita los tooltips de bootstrap --}}
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        function paso1(){

                {{-- Datos personales --}}
            var nov = $('#inputNOV').val();
            var primerApellido = $('#inputApellido1').val();
            var segundoApellido = $('#inputApellido2').val();
            var primerNombre = $('#inputNombre1').val();
            var segundoNombre = $('#inputNombre2').val();
            var nombre = $('#inputNombre3').val();
            var sexo = document.getElementById("inputSexo");
            sexo = sexo.options[sexo.selectedIndex].value;
            var fechaNacimiento = $('#inputFechaNacimiento').val();

                {{-- Datos de contacto --}}
            var calle = $('#inputCalle').val();
            var numeroCasa = $('#inputNumeroCasa').val();
            var colonia = $('#inputColonia').val();
            var departamento = document.getElementById("inputDepartamento");
            departamento = departamento.options[departamento.selectedIndex].value;
            var municipio = document.getElementById("inputMunicipio");
            municipio = municipio.options[municipio.selectedIndex].value;
            var codigoPostal = document.getElementById("inputCodigoPostal");
            codigoPostal = codigoPostal.options[codigoPostal.selectedIndex].value;
            var telefono = $('#inputTelefono').val();
            var celular = $('#inputCelular').val();
            var email = $('#inputEmail').val();

                {{-- Lugar de Nacimiento --}}
            var lugarNacimientoPais = document.getElementById("inputLugarNacimientoPais");
            lugarNacimientoPais = lugarNacimientoPais.options[lugarNacimientoPais.selectedIndex].value;
            var lugarNacimientoDepartamento = document.getElementById("inputLugarNacimientoDepartamento");
            lugarNacimientoDepartamento = lugarNacimientoDepartamento.options[lugarNacimientoDepartamento.selectedIndex].value;
            var lugarNacimientoMunicipio = document.getElementById("inputLugarNacimientoMunicipio");
            lugarNacimientoMunicipio = lugarNacimientoMunicipio.options[lugarNacimientoMunicipio.selectedIndex].value;

                {{-- Nacionalidad y cui o pasaporte --}}
            var nacionalidad = document.getElementById("inputNacionalidad");
            nacionalidad = nacionalidad.options[nacionalidad.selectedIndex].value;
            var numeroRegistro = 0;
            if (nacionalidad == 30){
                numeroRegistro = $('#inputCUI').val();
            } else {
                numeroRegistro = $('#inputPasaporte').val();
            }

                {{-- Autoadscripción Étnica --}}
            var etnia = document.getElementById("inputEtnia");
            etnia = etnia.options[etnia.selectedIndex].value;
            var idiomaMaterno = document.getElementById("inputIdiomaMaterno");
            idiomaMaterno = idiomaMaterno.options[idiomaMaterno.selectedIndex].value;
            var idiomaGuatemalteco = document.getElementById("inputIdiomaGuatemalteco");
            idiomaGuatemalteco = idiomaGuatemalteco.options[idiomaGuatemalteco.selectedIndex].value;
            var idiomaNoGuatemalteco = $('#inputIdiomaNoGuatemalteco').val();

            {{-- Inserta los datos en la tabla información_aspirante --}}
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/aspirante/insertarDatos') }}",
                type:"POST",
                dataType:"json",
                data: {
                    nov: nov,
                    apellido1: primerApellido,
                    apellido2: segundoApellido,
                    nombre1: primerNombre,
                    nombre2: segundoNombre,
                    otros_nombres: nombre,
                    //direccion
                    muni_recide: municipio,
                    depto_recide: departamento,
                    cod_Postal: codigoPostal,
                    nacionalidad: nacionalidad,
                    fecha_nacimiento: fechaNacimiento,
                    correo_electronico: email,
                    etnia: etnia,
                    idioma_etnia: idiomaMaterno,
                    idioma_gt: idiomaGuatemalteco,
                    idioma_no_gt: idiomaNoGuatemalteco,
                    sexo: sexo,
                    telefono: telefono,
                    celular: celular,
                    numero_registro: numeroRegistro,
                    pais_nac: lugarNacimientoPais,
                    depto_nac: lugarNacimientoDepartamento,
                    muni_nac: lugarNacimientoMunicipio,

                    calle: calle,
                    numeroCasa: numeroCasa,
                    colonia: colonia
                },
                success:function(data) {
                    $('#multistepform').smartWizard('nextStep');
                },
                error: function (data) {
                    if (data['status'] == '200'){
                        $('#multistepform').smartWizard('nextStep');
                    } else {
                        console.log(data);
                    }
                }
            });
        }

        {{-- Ejemplo del contenido de la variable $lugaresDeEstudio --}}
        {{--{
            "LUGAR DE ESTUDIOS": {
                "UNIDAD ACADEMICA" : {
                    "EXTENSION" : {
                        "lugarEstudios": "STRING",
                        "idFacultad": INT,
                        "facultad": "STRING",
                        "idExtension": INT,
                        "extension": "STRING",
                        "idCarrera": INT,
                        "carrera": "STRING",
                        "Biologia": NULL | INT,
                        "Fisica": NULL | INT,
                        "Lenguaje": NULL | INT,
                        "Matematica": NULL | INT,
                        "Quimica": NULL | INT,
                        "mostrar": BOOLEAN
                    }
                }
            }
        }--}}

        /**
         * Filtra el conjunto de datos enviados desde el controlador
         * Para crear la tabla de unidades academicas del siguiente paso
         * @param {string} lugarDeEstudio - Nombre del lugar de estudio seleccionado
         */
        function paso3(lugarDeEstudio) {
            {{-- Obtengo la tabla HTML de Unidades academicas y elimino su contenido --}}
            var table = document.getElementById("tbodyUA");
            table.innerHTML="";

            {{-- Obtengo todas las unidades academicas del lugar de estudio seleccionado --}}
            var facultades = {!! $lugaresDeEstudio !!}[lugarDeEstudio];

            {{-- Ciclo para llenar la tabla de unidades academicas --}}
            Object.keys(facultades).forEach(function (key) {
                var row = table.insertRow(table.rows.length); {{-- Añado una fila al final de la tabla --}}
                var codigo = row.insertCell(0);
                var nombre = row.insertCell(1);
                var boton = row.insertCell(2);

                var subkey = Object.keys(facultades[key])[0]; {{-- Obtengo el nombre de la primera extension en la unidad academica --}}
                codigo.innerHTML = facultades[key][subkey][0]['idFacultad']; {{-- Obtengo el codigo de la unidad academica --}}
                nombre.innerHTML = facultades[key][subkey][0]['facultad']; {{-- Obtengo el nombre de la uniadad academica --}}
                boton.innerHTML = "<button class='btn btn-info btn-sm' onclick=\"paso4('".concat(
                    facultades[key][subkey][0]['facultad'],
                    "','",
                    facultades[key][subkey][0]['lugarEstudios'],
                    "')\">Elegir</button>");
            });
            $('#multistepform').smartWizard('nextStep');
        }

        /**
         * Filtra nuevamente el conjunto de datos enviados desde el controlador
         * Para crear una tabla por extension llena de las carreras de dicha extensión
         * @param {string} facultad - nombre de la unidad academica selecionada
         * @param {string} lugarEstudios - nombre del lugar de estudio selecionado
         */
        function paso4(facultad, lugarEstudios){
            var extensiones = {!! $lugaresDeEstudio !!}[lugarEstudios][facultad];

            var carreras = document.getElementById('carreras');
            carreras.innerHTML = "";

            Object.keys(extensiones).forEach(function (key) {
                var tabla = document.createElement('table');
                tabla.classList.add('table');
                tabla.classList.add('table-hover');

                var header = tabla.createTHead();
                header.classList.add('thead-light');
                header = header.insertRow();

                var tituloCodigo = header.insertCell(0);
                var tituloNombre = header.insertCell(1);
                tituloCodigo.innerHTML = extensiones[key][0]['idExtension'];
                tituloNombre.innerHTML = extensiones[key][0]['extension'];
                var body = document.createElement('tbody');

                Object.keys(extensiones[key]).forEach(function (subkey) {
                    var row = body.insertRow();
                    var codigo = row.insertCell(0);
                    var nombre = row.insertCell(1);
                    var boton = row.insertCell(2);
                    codigo.innerHTML = extensiones[key][subkey]['idCarrera'];
                    nombre.innerHTML = extensiones[key][subkey]['carrera'];
                    boton.innerHTML = "<button class='btn btn-info btn-sm' onclick=\"paso5(".concat(
                        extensiones[key][subkey]['idFacultad'],
                        ",",
                        extensiones[key][subkey]['idExtension'],
                        ",",
                        extensiones[key][subkey]['idCarrera'],
                        ")\">Elegir</button>");
                });
                tabla.appendChild(body);
                carreras.appendChild(tabla);
            });
            $('#multistepform').smartWizard('nextStep');
            console.log('Holi');
        }

        //todo paso 5
        function paso5(idFacultad, idExtension, idCarrera){
            alert(
                'Unidad Academica: ' + idFacultad + "\n" +
                'Extension: ' + idExtension + "\n" +
                'Carrera: ' + idCarrera + "\n"
            );
        }
    </script>
@endsection
