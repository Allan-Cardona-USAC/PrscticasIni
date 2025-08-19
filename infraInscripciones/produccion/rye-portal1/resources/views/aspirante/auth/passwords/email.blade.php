@extends('portalEstudiantil.layouts.master')

@section('content')
<div class="container">
    <div class="row"><br/></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recuperar contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('aspirante.password.email') }}" aria-label="{{ __('Recuperar contraseña') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nov" class="col-md-4 col-form-label text-md-right">{{ __('NOV') }}</label>

                            <div class="col-md-6">
                                <input id="nov" type="text" class="form-control{{ $errors->has('nov') ? ' is-invalid' : '' }} form-control-sm" name="nov" value="{{ old('nov') }}" required>

                                @if ($errors->has('nov'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nov') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }} form-control-sm" name="fecha" value="{{ old('fecha') }}" required>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de correo') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }} form-control-sm" name="correo" value="{{ old('correo') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Enviar link de recuperación') }}
                                </button>
                            </div>

                        {{--    <div class="col-md-6 offset-md-1">
                                <a class="btn btn-link" href="{{ route('aspirante.email.request') }}">
                                    {{ __('¿Deseas registrar un correo diferente o reenviar el correo de confirmación?') }}
                                </a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
