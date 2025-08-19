<form method="POST" action="{{ route('estudiante.login') }}" id="FormEstudiante" @if($rol!='estudiante') style="display: none;" @endif>
    @csrf
    <input type="hidden" value="" id="rgtk_estudiante" name="rgtk_estudiante"/>
    <div class="form-group row">
        <label for="carnet" class="col-sm-4 col-form-label text-md-right">Registro Académico (Carné)</label>
            <div class="col-md-6">
                <input id="carnet" type="text" class="form-control{{ $errors->has('carnet') ? ' is-invalid' : '' }} form-control-sm rounded" placeholder="201900000" pattern="\d+" name="carnet" value="{{ old('carnet') }}" required>

                @if ($errors->has('carnet'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('carnet') }}</strong>
                    </span>
                @endif
            </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}
            form-control-sm rounded" name="password" required placeholder="Contraseña">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group" align="center">
        @if($errors->has('recaptcha_e'))
            <strong style="font-size: 1.3em; color: red;">{{ $errors->first('recaptcha_e') }}</strong>
        @endif
        <div id="rg_estudiante" ></div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <a class="btn btn-link" href="/estudiante/password/reset">
                ¿Olvidaste tu contraseña?
            </a>
            <button type="submit" class="btn btn-primary btn-sm">
                Aceptar
            </button>
            <br/>
            <!--<a class="btn btn-link" href="{{ route('aspirante.register') }}">
                ¿Primera vez en el portal?
            </a>-->
        </div>
    </div>
    <br/>
</form>
