@if($formMode == 'edit')
<div class="form-group {{ $errors->has('idCategoria') ? 'has-error' : ''}}">
    <label for="idCategoria" class="control-label">{{ 'Idcategoria' }}</label>
    <input class="form-control" name="idCategoria" type="number" id="idCategoria" value="{{ isset($categoriaCMS->idCategoria) ? $categoriaCMS->idCategoria : ''}}" required>
    {!! $errors->first('idCategoria', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <textarea class="form-control" rows="5" name="nombre" type="textarea" id="nombre" required>{{ isset($categoriaCMS->nombre) ? $categoriaCMS->nombre : ''}}</textarea>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="custom-select" id="estado" required>
        @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($categoriaCMS->estado) && $categoriaCMS->estado == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
