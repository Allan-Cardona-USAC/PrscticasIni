<div class="form-group {{ $errors->has('codigo_unidad_academica') ? 'has-error' : ''}}">
    <label for="codigo_unidad_academica" class="control-label">{{ 'Unidad Académica' }}</label>
    <select class="form-control" name="codigo_unidad_academica" id="codigo_unidad_academica" >
        @if(isset($extension->codigo_unidad_academica))
            @foreach($unidades as $unidad )
                @if($unidad->codfac == $extension->codigo_unidad_academica)
                    <option value="{{ $unidad->codfac }}" selected>{{ $unidad->nomfac }}</option>
                @else
                    <option disabled value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                @endif
            @endforeach
        @else
            @foreach($unidades as $unidad )
                <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
            @endforeach
        @endif
    </select>
    {!! $errors->first('codigo_unidad_academica', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codigo_extension') ? 'has-error' : ''}}">
    <label for="codigo_extension" class="control-label">{{ 'Codigo Extension' }}</label>
    <input class="form-control" name="codigo_extension" type="number" id="codigo_extension" value="{{ isset($extension->codigo_extension) ? $extension->codigo_extension : ''}}"
           @if(isset($extension->codigo_extension))
           readonly
           @endif
           required>
    {!! $errors->first('codigo_extension', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre"  value="{{ isset($extension->nombre) ? $extension->nombre : ''}}" required>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_creacion') ? 'has-error' : ''}}">
    <label for="fecha_creacion" class="control-label">{{ 'Fecha Creacion' }}</label>
    <input class="form-control" name="fecha_creacion" type="date" id="fecha_creacion" value="{{ isset($extension->fecha_creacion) ? $extension->fecha_creacion : ''}}"
           @if(isset($extension->codigo_extension))
           readonly
           @endif
           required>
    {!! $errors->first('fecha_creacion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <div align="center" class="py-2">
        <input class="btn btn-primary btn-sm col-md-3" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
