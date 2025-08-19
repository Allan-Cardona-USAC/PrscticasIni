<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <input class="form-control" name="tipo" type="number" id="tipo" value="{{ isset($tipo_ua->tipo) ? $tipo_ua->tipo : ''}}" required>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" required>{{ isset($tipo_ua->descripcion) ? $tipo_ua->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('prioridad') ? 'has-error' : ''}}">
    <label for="prioridad" class="control-label">{{ 'Prioridad' }}</label>
    <textarea class="form-control" rows="5" name="prioridad" type="textarea" id="prioridad" required>{{ isset($tipo_ua->prioridad) ? $tipo_ua->prioridad : ''}}</textarea>
    {!! $errors->first('prioridad', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
