@extends('layouts.master')

@section('content')
    <div class="container">
            <br/>
        <div class="row">
            <div class="col">
                <form method="post" action="{{ url('/estudiante/actualizarDatos') }}">
                    @csrf
                    <fieldset>
                      <legend>Datos personales</legend>
                      <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="inputCarnet">Registro académico</label>
                                <input type="text" class="form-control-plaintext"
                                       id="inputCarnet" placeholder="Registro académico"
                                       value="{{ Auth::guard('estudiante')->user()->carnet }}" readonly>
                              </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                                <label for="inputPassword1">CUI</label>
                                <input type="text" class="form-control-plaintext"
                                       id="inputPassword1" placeholder="CUI"
                                       value="{{ Auth::guard('estudiante')->user()->cui }}" readonly>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="inputNombres">Nombre Completo</label>
                                <input type="text" class="form-control-plaintext"
                                       id="inputNombres" placeholder="Nombre Completo"
                                       value="{{ Auth::guard('estudiante')->user()->getNombreCompleto }}" readonly>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="inputDireccion">Dirección</label>
                                <input type="text" class="form-control" name="inputDireccion"
                                       id="inputDireccion" placeholder="Dirección"
                                       value="{{ Auth::guard('estudiante')->user()->direccion }}">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <div class="form-group">
                                  <label for="inputDepartamento">Departamento</label>
                                  <select name="inputDepartamento" id="inputDepartamento" class="custom-select">
                                      @foreach($departamentos as $departamento)
                                          <option value="{{ $departamento->codigo }}"
                                                  @if(Auth::guard('estudiante')->user()->codigo_departamento_reside == $departamento->codigo)
                                                    selected
                                                  @endif>{{ $departamento->nombre }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                  <label for="inputMunicipio">Municipio</label>
                                  <select name="inputMunicipio" id="inputMunicipio" class="custom-select">
                                      @foreach($municipios as $municipio)
                                          <option value="{{ $municipio->cod_muni }}"
                                                  @if(Auth::guard('estudiante')->user()->codigo_municipio_reside == $municipio->cod_muni)
                                                  selected
                                                  @endif>{{ $municipio->municipio }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                  <label for="inputCodigoPostal">Código Postal</label>
                                  <select name="inputCodigoPostal" id="inputCodigoPostal" class="custom-select">
                                      @foreach($codigosPostales as $codigo)
                                          <option value="{{ $codigo->cod_postal }}"
                                                  @if(Auth::guard('estudiante')->user()->cod_postal == $codigo->cod_postal)
                                                  selected
                                                  @endif>{{ $codigo->cod_postal }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <div class="form-group">
                                  <label for="inputTelefono">Teléfono domiciliar</label>
                                  <input type="text" class="form-control" name="inputTelefono"
                                         id="inputTelefono" placeholder="Teléfono domiciliar"
                                         value="{{ Auth::guard('estudiante')->user()->telefono }}">
                              </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                                <label for="inputCelular">Teléfono móvil</label>
                                <input type="text" class="form-control" name="inputCelular"
                                       id="inputCelular" placeholder="Teléfono móvil"
                                       value="{{ Auth::guard('estudiante')->user()->celular }}">
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                  <label for="inputEmail">Correo electrónico</label>
                                  <input type="text" class="form-control-plaintext"
                                         id="inputEmail" placeholder="E-mail"
                                         value="{{ Auth::guard('estudiante')->user()->email }}" readonly>
                              </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </fieldset>
                  </form>
            </div>
        </div>
    </div>
    <div id="result"></div>
    <div class="alert alert-danger" style="display:none">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
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

        });
    </script>
@endsection
