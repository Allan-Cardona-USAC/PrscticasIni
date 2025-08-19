@extends('portalEstudiantil.layouts.master')

@section('content')
<div class="container">
    <div class="row"><br/></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recuperar correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('estudiante.email.change') }}" aria-label="Recuperar contraseña">
                        @csrf

                        <div class="form-group row">
                            <label for="carnet" class="col-md-4 col-form-label text-md-right">Registro académico (Carné)</label>

                            <div class="col-md-6">
                                <input id="carnet" pattern="\d+" placeholder="201900000" type="text" class="form-control{{ $errors->has('carnet') ? ' is-invalid' : '' }} form-control-sm" name="carnet" value="{{ old('carnet') }}" required autofocus>

                                @if ($errors->has('carnet'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('carnet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }} form-control-sm" name="fecha" value="{{ old('fecha') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de correo') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" placeholder="tu@correo.com" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }} form-control-sm" name="correo" value="{{ old('correo') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Aceptar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
