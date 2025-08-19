@extends('portalEstudiantil.layouts.postgrado')
{{-- Comentado para los prototipos @extends('layouts.master') --}}

@section('content')
    <div class="container">
            <br/>
        <div class="row">
            <div class="col">
                <form>
                    <fieldset>
                      <legend>Datos personales</legend>
                      <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Registro académico</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Registro académico">
                              </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">CUI</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="CUI">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="exampleInputNombres">Nombres</label>
                                <input type="text" class="form-control" id="exampleInputNombres" placeholder="Nombres">
                              </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                                <label for="exampleInputApellidos">Apellidos</label>
                                <input type="text" class="form-control" id="exampleInputApellidos" placeholder="Apellidos">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="exampleInputDireccion">Dirección</label>
                                <input type="text" class="form-control" id="exampleInputDireccion" placeholder="Dirección">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail">Correo electrónico</label>
                                <input type="text" class="form-control" id="exampleInputEmail" placeholder="E-mail">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputCelular">Teléfono móvil</label>
                                <input type="text" class="form-control" id="exampleInputCelular" placeholder="Teléfono móvil">
                              </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputCasa">Teléfono domiciliar</label>
                                <input type="text" class="form-control" id="exampleInputCasa" placeholder="Teléfono domiciliar">
                              </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </fieldset>
                  </form>
            </div>
        </div>
    </div>
@endsection