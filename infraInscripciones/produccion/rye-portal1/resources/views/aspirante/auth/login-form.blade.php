<form method="POST" action="{{ route('aspirante.login') }}" id="FormAspirante"  @if($rol=='aspirante' || $rol==null) style="display: block;" @else style="display: none;" @endif>
    @csrf
    <input type="hidden" id="rgtk_aspirante" name="rgtk_aspirante" />
    <div class="form-group row">
        <label for="nov" class="col-sm-4 col-form-label text-md-right">NOV</label>
        <div class="col-md-6">
            <input id="nov" type="text" class="form-control{{ $errors->has('nov') ? ' is-invalid' : '' }} form-control-sm rounded" name="nov" value="{{ old('nov') }}" required autofocus>
            @if ($errors->has('nov'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nov') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">PIN</label>
        <div class="col-md-6">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-sm rounded" name="password" required>
        </div>
    </div>
    <div class="form-group" align="center">
        @if ($errors->has('recaptcha'))            
            <strong style="color: red; font-size: 1.3em;">{{ $errors->first('recaptcha') }}</strong>
        @endif
        <div id="rg_aspirante" ></div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <!--<div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Recordarme
                </label>
            </div>-->
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <a class="btn btn-link" href="{{ route('pin.aspirante') }}">
                ¿Olvidaste el PIN?
            </a>
            <button type="submit" class="btn btn-primary btn-sm">
                Aceptar
            </button>
            <br><br>
            <!--<a class="btn btn-link" href="{{ route('aspirante.register') }}">
                ¿Primera vez en el portal?
            </a>-->
        </div>
    </div>
</form>


