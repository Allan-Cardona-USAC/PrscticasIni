<form id="formDatos" action="#">

    {{-- Información personal --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-info-circle"></i> Información personal</h3>
        </div>

        {{-- card body --}}
        <div class="card-body">
            {{-- NOV --}}
            <div class="form-group row">
                <label for="inputNOV" class="col-md-3 col-form-label">Número de Orientación Vocacional</label>
                <div class="col-md-6">
                    <input type="text" class="form-control-plaintext" id="inputNOV" autocomplete="off" value="{{ Auth::guard('aspirante')->user()->nov }}"
                           readonly required>
                </div>
                <label for="inputPIN" class="col-md-3 col-form-label">PIN</label>
                <div class="col-md-6">
                    <input type="text" class="form-control-plaintext" id="inputPIN" autocomplete="off" value="{{ Auth::guard('aspirante')->user()->pin }}"
                            required>
                </div>
            </div>
            {{-- end NOV --}}

            {{-- nombres --}}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNombre1">Primer nombre</label>
                    <input type="text" class="form-control" id="inputNombre1"
                           placeholder="Primer nombre" autocomplete="off"
                           value="{{ Auth::guard('aspirante')->user()->nombre1 }}"
                           required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputNombre2">Segundo nombre</label>
                    <input type="text" class="form-control" id="inputNombre2"
                           placeholder="Segundo nombre" autocomplete="off"
                           value="{{ Auth::guard('aspirante')->user()->nombre2 }}"
                    >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputApellido1">Primer apellido</label>
                    <input type="text" class="form-control" id="inputApellido1"
                           placeholder="Primer nombre" autocomplete="off"
                           value="{{ Auth::guard('aspirante')->user()->apellido1 }}"
                           required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputApellido2">Segundo apellido</label>
                    <input type="text" class="form-control" id="inputApellido2"
                           placeholder="Segundo apellido" autocomplete="off"
                           value="{{ Auth::guard('aspirante')->user()->apellido2 }}"
                           >
                </div>
            </div>
            {{-- end nombres --}}

            {{-- otros nombres, fecha de nacimiento y genero --}}
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre3">Otros Nombres</label>
                    <input type="text" id="inputNombre3"
                           class="form-control"
                           placeholder="Otros Nombres"
                           value="{{ Auth::guard('aspirante')->user()->otros_nombres }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputSexo">Genero</label>
                    <select class="form-control custom-select" id="inputSexo">
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

                <div class="form-group col-md-3">
                    <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="inputFechaNacimiento"
                           class="form-control"
                           value="{{ Auth::guard('aspirante')->user()->fecha_nacimiento }}" required>
                </div>
            </div>
            {{-- end otros nombres, fecha de nacimiento y sexo --}}
        </div>
        {{-- end card body --}}
    </div>
    {{-- end información personal--}}

    {{-- Información de contacto --}}
    <div class="card mb-3">
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
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Indique el número de la calle o avenida, o el nombre del bulevar, alameda o número de kilómetro."
                           aria-describedby="ejemplosDireccion"
                           value="{{ Auth::guard('aspirante')->user()->direccion }}" required>
                    <small id="ejemplosDirección" class="form-text text-muted">
                        Ejemplos:<br>
                        Colonia Ejemplo 5 calle 12-34 zona 6<br>
                        Kilometro 70 calle Principal 1-23 Aldea Ejemplo<br>
                        Canton Ejemplar Sector 1 Escuintla <br>
                        Calle Central Guanagazapa Escuintla <br>
                        Boulever Principal 12-34 Edificio Ejemplo Apartamento 5A Zona 6
                    </small>
                </div>
            </div>

            {{-- Departamento, Municipio y Zona --}}
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputDepartamento">Departamento</label>
                    <select class="form-control custom-select" id="inputDepartamento">
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
                    <select class="form-control custom-select" id="inputMunicipio">
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->cod_muni }}"
                                    @if(Auth::guard('aspirante')->user()->muni_recide == $municipio->cod_muni)
                                    selected
                                @endif >{{ $municipio->municipio }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputCodigoPostal">Zona</label>
                    <select class="form-control custom-select" id="inputCodigoPostal">
                        @foreach($codigosPostales as $codigo)
                            <option value="{{ $codigo->cod_postal }}"
                                    @if(Auth::guard('aspirante')->user()->cod_Postal == $codigo->cod_postal)
                                    selected
                                @endif >{{ $codigo->pais }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Teléfono de Casa, Celular y Correo electrónico --}}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputTelefono">Teléfono de Casa</label>
                    <input type="number" id="inputTelefono"
                           class="form-control"
                           placeholder="Teléfono de Casa"
                           value="{{ Auth::guard('aspirante')->user()->telefono }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCelular">Teléfono Celular</label>
                    <input type="number" id="inputCelular"
                           class="form-control"
                           placeholder="Teléfono Celular"
                           value="{{ Auth::guard('aspirante')->user()->celular }}"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Correo Electrónico</label>
                    <input type="email" id="inputEmail"
                           class="form-control"
                           value="{{ Auth::guard('aspirante')->user()->correo_electronico }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputNIT">NIT</label>
                    <input type="text" id="inputNIT"
                           class="form-control"
                           placeholder="NIT"
                           value="{{ Auth::guard('aspirante')->user()->NIT }}"
                           required>
                </div>
            </div>

        </div>
        {{-- end card body --}}
    </div>
    {{-- end información de contacto--}}

    {{-- Nacionalidad --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-globe"></i> Lugar de nacimiento y nacionalidad</h3>
        </div>

        {{-- card body --}}
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputLugarNacimientoPais">Pais</label>
                    <select class="form-control custom-select" id="inputLugarNacimientoPais">
                        @foreach($paises as $pais)
                            <option value="{{ $pais->codigo }}"
                                    @if($pais->codigo == '30')
                                    selected
                                @endif>{{ ucwords(strtolower($pais->nombre)) }}</option> ̣{{-- todo arreglar mayusculas --}}
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputLugarNacimientoDepartamento">Departamento</label>
                    <select class="form-control custom-select" id="inputLugarNacimientoDepartamento">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->codigo }}"
                                    @if(Auth::guard('aspirante')->user()->depto_nac == $departamento->codigo)
                                    selected
                                @endif>{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputLugarNacimientoMunicipio">Municipio</label>
                    <select class="form-control custom-select" id="inputLugarNacimientoMunicipio">
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->cod_muni }}"
                                    @if(Auth::guard('aspirante')->user()->muni_nac == $municipio->cod_muni)
                                    selected
                                @endif>{{ $municipio->municipio }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nacionalidad y Aproximado de Matrícula --}}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNacionalidad">Nacionalidad</label>
                    <select class="form-control custom-select" id="inputNacionalidad">
                        @foreach($nacionalidades as $nacionalidad)
                            <option value="{{ $nacionalidad->codigo_nacionalidad }}"
                                    @if($nacionalidad->codigo_nacionalidad == '30')
                                    selected
                                @endif>{{ ucwords(strtolower($nacionalidad->nombre)) }}</option> {{-- todo arreglar mayusculas --}}
                        @endforeach
                    </select>
                </div>
                <div id="cui" class="form-group col-md-3">
                    <label for="inputCUI">CUI</label>
                    <input type="number" class="form-control"
                           id="inputCUI"
                           value="{{ Auth::guard('aspirante')->user()->numero_registro }}" required>
                </div>
                <div id="pasaporte" class="form-group col-md-3 ocultarDiv">
                    <label for="inputPasaporte">Pasaporte</label>
                    <input type="number" class="form-control"
                           id="inputPasaporte"
                           value="{{ Auth::guard('aspirante')->user()->numero_registro }}" required>
                </div>
            </div>

            {{-- Valor de la matrícula --}}
            <div class="form-row">
                <div class="col-md-9"></div>
                <div id="valorMatricula" class="form-group col-md-3">
                    <label for="inputMatricula">Valor de la matrícula</label>
                    <input type="text" class="form-control-plaintext form-control-lg" value="Q101.00"
                           id="inputMatricula" readonly>
                </div>
            </div>
        </div>
        {{-- end card body --}}
    </div>
    {{-- end nacionalidad --}}

    {{-- Autoadscripción étnica --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-users"></i> Autoadscripción étnica</h3>
        </div>

        {{-- card body --}}
        <div class="card-body">

            <div class="form-row">
                <div id="autoAdscripcionEtnicaEtnia" class="form-group col">
                    <label for="inputEtnia">Etnia</label>
                    <select class="form-control custom-select" id="inputEtnia">
                        @foreach($etnia as $item)
                            <option value="{{ $item->id }}"
                                    @if($item->id == Auth::guard('aspirante')->user()->etnia or $item->id == '1.00')
                                    selected
                                @endif>{{ $item->etnia }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputIdiomaMaterno">Idioma materno</label>
                    <select class="form-control custom-select" id="inputIdiomaMaterno">
                        @foreach($etnia as $item)
                            <option value="{{ $item->id }}"
                                    @if($item->id == Auth::guard('aspirante')->user()->idioma_etnia or $item->id == '1.00')
                                    selected
                                @endif>{{ $item->idioma }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="autoAdscripcionEtnicaIdiomaGuatemalteco" class="form-group col">
                    <label for="inputIdiomaGuatemalteco">Otros idiomas guatemaltecos</label>
                    <select class="form-control custom-select"
                            id="inputIdiomaGuatemalteco"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="¿Domina otro idioma guatemalteco? Indique cual.">
                        <option value="0" selected>No</option>
                        @foreach($etnia as $item)
                            <option value="{{ $item->id }}"
                                    @if($item->id == Auth::guard('aspirante')->user()->idioma_gt or $item->id == '0.00')
                                    selected
                                @endif>{{ $item->idioma }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputIdiomaNoGuatemalteco">Idiomas no guatemaltecos</label>
                    <input type="text" class="form-control"
                           id="inputIdiomaNoGuatemalteco"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="¿Domina algún idioma no guatemalteco? Indique cual."
                           value="{{ (!isset(Auth::guard('aspirante')->user()->idioma_no_gt)) ? : Auth::guard('aspirante')->user()->idioma_no_gt }}" >
                </div>
            </div>
        </div>
        {{-- end card body --}}
    </div>
    {{-- end nacionalidad --}}

    <div class="form-row">
        <div class="form-group col text-right">
            <input type="button" class="btn btn-primary" value="Continuar-" id="inputSubmit" onclick="paso1()">
        </div>
    </div>
</form>
