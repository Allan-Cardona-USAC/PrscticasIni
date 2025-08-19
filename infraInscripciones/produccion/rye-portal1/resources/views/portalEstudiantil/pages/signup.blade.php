@extends('portalEstudiantil.layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5" style="align-items:center;">
            <div class="mx-auto col-lg-5">

                <div class="card border-primary" >
                    <div class="card-body">
                        <form>
                            <fieldset>
                                <legend>Regístrate</legend>
                                <div class="form-group">
                                    <label for="inputEmail">Correo electrónico</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputRA">Registro académico</label>
                                    <input type="text" class="form-control" id="inputRA" placeholder="Ingresa tu número de registro académico" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Pin</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Pin" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                {{-- Links para los prototipos --}}
                                <a href="{{ url('/perfilAspirante') }}" class="btn btn-success" role="button">Aspirante</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <small>Si eres personal administrativo, solicita tu usuario <a href="{{url('/administrativo/solicitarusuario')}}">aquí</a>.</small>
            </div>
        </div>
    </div>
@endsection