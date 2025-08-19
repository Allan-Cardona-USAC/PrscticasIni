<div class="form-group {{ $errors->has('tipo_ua') ? 'has-error' : ''}}">
    <label for="tipo_ua" class="control-label">{{ 'Tipo Unidad Académica' }}</label>
    <select class="form-control" name="tipo_ua" id="tipo_ua">
        @if(isset($facultad->tipo_ua))
            <option value="{{ $facultad->tipo_unidad_academica->tipo }}">{{  $facultad->tipo_unidad_academica->descripcion  }}</option>
            @foreach($unidades as $unidad )
                @if($unidad->tipo != $facultad->tipo_ua)
                    <option value="{{ $unidad->tipo }}">{{ $unidad->descripcion }}</option>
                @endif
            @endforeach
        @else
            @foreach($unidades as $unidad )
                <option value="{{ $unidad->tipo }}">{{ $unidad->descripcion }}</option>
            @endforeach
        @endif
    </select>
    {!! $errors->first('tipo_ua', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codfac') ? 'has-error' : ''}}">
    <label for="codfac" class="control-label">{{ 'Código Unidad Académica' }}</label>
    <input class="form-control" name="codfac" type="number" min="0" id="codfac" value="{{ isset($facultad->codfac) ? $facultad->codfac : ''}}" required
            @if(isset($facultad->codfac))
                readonly
            @endif
    >
    {!! $errors->first('codfac', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nomfac') ? 'has-error' : ''}}">
    <label for="nomfac" class="control-label">{{ 'Nombre Unidad Académica' }}</label>
    <input class="form-control" name="nomfac"  type="text" id="nomfac"  value="{{ isset($facultad->nomfac) ? $facultad->nomfac : ''}}" required>
    {!! $errors->first('nomfac', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nomcorto') ? 'has-error' : ''}}">
    <label for="nomcorto" class="control-label">{{ 'Nombre corto' }}</label>
    <input class="form-control" name="nomcorto"  type="text" id="nomcorto"  value="{{ isset($facultad->nomcorto) ? $facultad->nomcorto : ''}}" required>
    {!! $errors->first('nomcorto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
    <label for="correo" class="control-label">{{ 'Correo' }}</label>
    <input class="form-control" name="correo" type="email" id="correo" value="{{ isset($facultad->correo) ? $facultad->correo : ''}}" required>
    {!! $errors->first('correo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-check form-check-inline {{ $errors->has('niv_tecnico') ? 'has-error' : ''}}">
    <input type="checkbox" class="form-check-input" type="number" name="niv_tecnico" id="niv_tecnico" value="1"
            @if(isset($facultad->niv_tecnico))
                @if($facultad ->niv_tecnico > 0)
                    checked
                @endif
            @endif
    >
    <label class="form-check-label" for="niv_tecnico">{{ 'Nivel Técnico' }}</label>
    {!! $errors->first('niv_tecnico', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-check form-check-inline {{ $errors->has('niv_licenciatura') ? 'has-error' : ''}}">
    <input type="checkbox" class="form-check-input" type="number" name="niv_licenciatura" id="niv_licenciatura" value="1"
           @if(isset($facultad->niv_licenciatura))
               @if($facultad ->niv_licenciatura > 0)
                    checked
               @endif
           @endif
    >
    <label class="form-check-label" for="niv_licenciatura">{{ 'Nivel Licenciatura' }}</label>
    {!! $errors->first('niv_licenciatura', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-check form-check-inline {{ $errors->has('niv_posgrado') ? 'has-error' : ''}}">
    <input type="checkbox" class="form-check-input"  type="number" name="niv_posgrado" id="niv_posgrado" value="1"
           @if(isset($facultad->niv_posgrado))
                @if($facultad ->niv_posgrado > 0)
                    checked
                @endif
            @endif
    >
    <label class="form-check-label" for="niv_posgrado">{{ 'Nivel Posgrado' }}</label>
    {!! $errors->first('niv_posgrado', '<p class="help-block">:message</p>') !!}
</div>
<br>
<br>
<div class="form-group {{ $errors->has('depto') ? 'has-error' : ''}}">
    <label for="depto" class="control-label">{{ 'Departamento' }}</label>
    <select class="form-control" name="depto" id="depto">
        @if(isset($facultad->depto))
            <option value="{{ $facultad->departamento->codigo }}">{{  $facultad->departamento->nombre  }}</option>
            @foreach($departamentos as $departamento )
                @if($departamento->codigo != $facultad->depto)
                    <option value="{{ $departamento->codigo }}">{{ $departamento->nombre }}</option>
                @endif
            @endforeach
        @else
            @foreach($departamentos as $departamento )
                <option value="{{ $departamento->codigo }}">{{$departamento->nombre }}</option>
            @endforeach
        @endif
    </select>
    {!! $errors->first('depto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rangoCarnet') ? 'has-error' : ''}}">
    <label for="rangoCarnet" class="control-label">{{ 'Rango carnet' }}</label>
    <input class="form-control" name="rangoCarnet" type="number"  min="0" max="9" id="rangoCarnet" value="{{ isset($facultad->rangoCarnet) ? $facultad->rangoCarnet : ''}}" required>
    {!! $errors->first('rangoCarnet', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('wsPruebaBasica') ? 'has-error' : ''}}">
    <label for="wsPruebaBasica" class="control-label">{{ 'Wspruebabasica' }}</label>
    <input class="form-control" name="wsPruebaBasica"  type="text" id="wsPruebaBasica"  value="{{ isset($facultad->wsPruebaBasica) ? $facultad->wsPruebaBasica : ''}}" required>
    {!! $errors->first('wsPruebaBasica', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('wsPruebaEspecifica') ? 'has-error' : ''}}">
    <label for="wsPruebaEspecifica" class="control-label">{{ 'Wspruebaespecifica' }}</label>
    <input class="form-control" name="wsPruebaEspecifica"  type="text" id="wsPruebaEspecifica"  value="{{ isset($facultad->wsPruebaEspecifica) ? $facultad->wsPruebaEspecifica : ''}}" required>
    {!! $errors->first('wsPruebaEspecifica', '<p class="help-block">:message</p>') !!}
</div>

{{--<div class="form-check form-check-inline {{ $errors->has('activa') ? 'has-error' : ''}}">
    <input type="checkbox" class="form-check-input" type="number" name="activa" id="activa" value="1"
           @if(isset($facultad->activa))
               @if($facultad ->activa > 0)
                    checked
               @endif
           @endif
    >
    <label class="form-check-label" for="activa">{{ 'Activa' }}</label>
    {!! $errors->first('niv_tecnico', '<p class="help-block">:message</p>') !!}
</div>--}}


<div class="form-group">
    <div align="center" class="py-2">
        <input class="btn btn-primary btn-sm col-md-3" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
