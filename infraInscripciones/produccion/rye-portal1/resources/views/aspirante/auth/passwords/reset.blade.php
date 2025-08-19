@extends('portalEstudiantil.layouts.master')

@section('content')
<div class="container">
    <div clas="row"><br/></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recuperar contraseña.') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('aspirante.password.request') }}" aria-label="{{ __('Recuperar contraseña') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="nov" class="col-md-4 col-form-label text-md-right">{{ __('NOV') }}</label>

                            <div class="col-md-6">
                                <input id="nov" type="nov" class="form-control{{ $errors->has('nov') ? ' is-invalid' : '' }} form-control-sm" name="nov" value="{{ $nov ?? old('nov') }}" required autofocus>

                                @if ($errors->has('nov'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nov') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-sm" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Recuperar') }}
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
