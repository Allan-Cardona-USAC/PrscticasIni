<div class="card mb-3">
    <div class="card-header">
        <h3><i class="fa fa-users"></i> Estudios previos</h3>
    </div>
    {{-- card body --}}
    <div class="card-body">
        <div class="alert alert-success" role="alert" id="di_msj_establecimiento">
            <h5>Los datos de su establecimiento fueron obtenidos del Mineduc, presione clic en "continuar" para generar su constancia de pre-inscripción</h5>
        </div>
        <form method="POST" id="formEstudiosPrevios" action="#">
            @csrf
            <input type="text" id="almacenar" name="almacenar" value="1" hidden/>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputNOV" class="col-md-3 col-form-label">Número de Orientación Vocacional</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" id="inputNOV" name="inputNOV" autocomplete="off" value="{{ Auth::guard('aspirante')->user()->nov }}"
                                readonly required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tipoTitulo">Tipo de Estudio de Diversificado</label>
                            <select class="form-control custom-select" id="tipoTitulo" name="tipoTitulo">
                                @foreach($tipotitulo as $tipot)
                                    <option value="{{ $tipot->codigo_tipo_titulo_diversificado }}"
                                            @if($tipot->codigo_tipo_titulo_diversificado==1) selected @endif
                                        >{{ ucwords(strtolower($tipot->nombre)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTipoEstablecimiento">Tipo Establecimiento</label>
                            <select class="form-control custom-select" id="inputTipoEstablecimiento" name="inputTipoEstablecimiento">
                                @foreach($tipoestablecimiento as $tipo)
                                    <option value="{{ $tipo->codigo_tipo_establecimiento }}"
                                            @if($tipo->codigo_tipo_establecimiento==1) selected @endif
                                        >{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Ubicación del Establecimiento</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputLugarEstudioPais">País</label>
                        <select class="form-control custom-select" id="inputLugarEstudioPais" name="inputLugarEstudioPais">
                            @foreach($paises as $pais)
                                <option value="{{ $pais->codigo }}"
                                    @if($pais->codigo == '30')
                                        selected
                                    @endif >{{ ucwords(strtolower($pais->nombre)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3" id="di_departamento">
                        <label for="inputDepartamentoEstudio">Departamento</label>
                        <select class="form-control custom-select" id="inputDepartamentoEstudio" name="inputDepartamentoEstudio">
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->codigo }}"
                                    @if(Auth::guard('aspirante')->user()->depto_recide == $departamento->codigo)
                                        selected
                                    @endif >{{ $departamento->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3" id="di_municipio">
                        <label for="inputMunicipioEstudio">Municipio</label>
                        <select class="form-control custom-select" id="inputMunicipioEstudio" name="inputMunicipioEstudio">
                            @foreach($municipios as $municipio)
                                <option value="{{ $municipio->cod_muni }}"
                                    @if(Auth::guard('aspirante')->user()->muni_recide == $municipio->cod_muni)
                                        selected
                                    @endif >{{ $municipio->municipio }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3" id="di_postal">
                        <label for="inputCodigoPostalEstudio">Código postal</label>
                        <select class="form-control custom-select" id="inputCodigoPostalEstudio" name="inputCodigoPostalEstudio">
                            @foreach($codigosPostales as $codigo)
                                <option value="{{ $codigo->cod_postal }}"
                                    @if(Auth::guard('aspirante')->user()->cod_Postal == $codigo->cod_postal)
                                        selected
                                    @endif >{{ $codigo->cod_postal }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row" id="di_establecimiento">
                    <div class= "form-group col-md-9">
                        <label for="inputNombreEstablecimiento">Nombre del Establecimiento</label>
                        <select class="form-control custom-select" id="inputNombreEstablecimiento" name="inputNombreEstablecimiento">
                            @foreach($establecimientos as $establecimiento)
                                <option value="{{ $establecimiento->codigo }}"
                                    @if(($establecimiento->depto == $departamento->codigo)and ($establecimiento->muni== $municipio->cod_muni) and ($establecimiento->sec == $codigo->cod_postal))
                                        selected
                                    @endif >{{($establecimiento->nombre)}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row" id="di_direccion">
                    <div class= "form-group col-md-9">
                        <label for="inputDireccionEstablecimiento">Dirección del Establecimiento</label>
                        <input id="inputDireccionEstablecimiento" style="width: 100%;" readonly />
                    </div>
                </div>
                <div class="form-row" id="di_jornada">
                    <div class="form-group col-md-9">
                        <label for="">Jornada</label>
                        <input id="inputJornadaEst" readonly style="width: 100%;"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col text-right">
                <input type="button" class="btn btn-primary" value="Continuar" onclick="saveEstudiosPrevios()">
            </div>
        </div>
    </form>
    <br>
    </div>
</div>

