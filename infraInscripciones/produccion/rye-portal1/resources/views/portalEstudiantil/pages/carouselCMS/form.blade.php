<div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
    <label for="imagen" class="control-label">{{ 'Imagen' }}</label>
    <input type="file" class="form-control" name="imagen" id="imagen" required/>
    {!! $errors->first('imagen', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-sm btn-primary" type="submit" value="'Guardar" onclick="guardarContenido()">
</div>