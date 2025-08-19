@if( $formMode == 'edit')
<div class="form-group {{ $errors->has('idPagina') ? 'has-error' : ''}}">
    <label for="idPagina" class="control-label">{{ 'idpagina' }}</label>
    <input class="form-control" name="idPagina" type="number" id="idPagina" value="{{ isset($paginaCMS->idPagina) ? $paginaCMS->idPagina : ''}}" required>
    {!! $errors->first('idPagina', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <textarea class="form-control" rows="1" name="nombre" type="textarea" id="nombre" required>{{ isset($paginaCMS->nombre) ? $paginaCMS->nombre : ''}}</textarea>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
@if( $formMode == 'edit')
<div class="form-group {{ $errors->has('ruta') ? 'has-error' : ''}}">
    <label for="ruta" class="control-label">{{ 'Ruta' }}</label>
    <textarea class="form-control" rows="1" name="ruta" type="textarea" id="ruta" required>{{ isset($paginaCMS->ruta) ? $paginaCMS->ruta : ''}}</textarea>
    {!! $errors->first('ruta', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="custom-select" id="estado" required>
    @foreach (json_decode('{"1":"Activo","0":"Inactivo"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($paginaCMS->estado) && $paginaCMS->estado == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    </select>
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('icono') ? 'has-error' : ''}}">
    <label for="icono" class="control-label">{{ 'Icono' }}</label>
    <textarea class="form-control" rows="1" name="icono" type="textarea" id="icono" required>{{ isset($paginaCMS->icono) ? $paginaCMS->icono : ''}}</textarea>
    {!! $errors->first('icono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idCategoria') ? 'has-error' : ''}}">
    <label for="idCategoria" class="control-label">{{ 'idCategoria' }}</label>
    <select name="idCategoria" class="custom-select" id="idCategoria" required>
        @foreach ($categoriaCMS as $categoria)
            <option value="{{ $categoria->idCategoria }}" {{ (isset($paginaCMS->idCategoria) && $paginaCMS->idCategoria == $categoria->idCategoria) ? 'selected' : ''}}>{{ $categoria->nombre }}</option>
        @endforeach
    </select>
    {!! $errors->first('idCategoria', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-sm btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}" onclick="guardarContenido()">
    <input class="btn btn-sm btn-info" type="button" value="{{ $formMode === 'edit' ? 'Editar' : 'Vista Previa' }}" id="btnSummernote" onclick="{{ $formMode === 'edit' ? 'editSummernote()' : 'saveSummernote()' }}">
</div>
<input type="hidden" id="contenido" name="contenido">

