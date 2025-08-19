@extends('layouts.master')

@section('title','Reinscripcion Pregrado')

@section('content')
    <form method="post" action="{{ URL('admin/reinscripcion') }}">
        @csrf
        <div class="form-group row">
            <label for="encuesta" class="col-2 col-form-label">URL Encuesta:</label>
            <div class="col">
                <input type="url" class="form-control" name="encuesta"
                       id="encuesta" placeholder="URL Encuesta Pregrado"
                       value="{{ config('inscripcion.encuesta') }}">
            </div>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                   name="deshabilitarEncuesta" id="deshabilitarEncuesta"
                   @if( config('inscripcion.deshabilitarEncuesta') )
                   checked
                @endif>
            <label for="deshabilitarEncuesta" class="custom-control-label">Validar encuesta socio-economica</label>
        </div>
        <button type="submit" class="btn btn-warning">Guardar</button>
    </form>
@endsection
