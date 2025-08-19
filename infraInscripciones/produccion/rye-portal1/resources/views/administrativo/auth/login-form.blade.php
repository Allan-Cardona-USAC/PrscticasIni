<form method="POST" action="{{ route('administrativo.login') }}"  id="FormAdministrador" @if($rol!='administrativo') style="display: none;" @endif>
    @csrf

    <div class="form-group row">
        <label for="dependencia" class="col-sm-4 col-form-label text-md-right">{{ __('Dependencia') }}</label>
        <input type="hidden" id="rgtk_admin" value="" name="rgtk_admin"/>
        <div class="col-md-6">
            <input id="dependencia" type="text" class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} form-control-sm rounded" name="dependencia" value="{{ old('dependencia') }}" required autofocus>

            @if ($errors->has('dependencia'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('dependencia') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="login" class="col-sm-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-6">
            <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }} form-control-sm rounded" name="login" value="{{ old('login') }}" required autofocus>

            @if ($errors->has('login'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('login') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-sm rounded" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group" align="center">
        @if($errors->has('recaptcha_a'))
            <strong style="font-size: 1.3em; color: red;">{{ $errors->first('recaptcha_a') }}</strong>
        @endif
        <div id="rg_administrativo" ></div>
    </div>

    <!--<div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Recordarme') }}
                </label>
            </div>
        </div>
    </div>-->

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary btn-sm">  
                {{ __('Aceptar') }}
            </button>

            <a class="btn btn-link" href="{{ route('administrativo.password.request') }}">
                {{ __('¿Olvidaste tu contraseña?') }}
            </a>

            <a class="btn btn-link" href="{{ route('administrativo.solicitarusuario') }}">
                {{ __('Solicitar Usuario Aquí') }}
            </a>
        </div>
    </div>
</form>
