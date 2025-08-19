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
                       value="{{ config('reinscripcionPregrado.encuesta') }}">
            </div>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                   name="validarBiblioteca" id="validarBiblioteca"
                   @if( config('reinscripcionPregrado.validarBiblioteca') )
                       checked
                   @endif>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                    name="validarTarjetaSaludCUNOC" id="validarTarjetaSaludCUNOC"
                    @if( config('reinscripcionPregrado.validarTarjetaSaludCUNOC') )
                        checked
                    @endif>
            <label for="validarTarjetaSaludCUNOC" class="custom-control-label">Validar examen de salud en CUNOC</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                    name="validarUnidadSalud" id="validarUnidadSalud"
                    @if( config('reinscripcionPregrado.validarUnidadSalud') )
                        checked
                    @endif>
            <label for="validarUnidadSalud" class="custom-control-label">Validar examen de salud</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                    name="validarBecados" id="validarBecados"
                    @if( config('reinscripcionPregrado.validarBecados') )
                        checked
                    @endif>
            <label for="validarBecados" class="custom-control-label">Validar Becados</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                    name="deshabilitarEncuesta" id="deshabilitarEncuesta"
                    @if( config('reinscripcionPregrado.deshabilitarEncuesta') )
                        checked
                    @endif>
            <label for="deshabilitarEncuesta" class="custom-control-label">Validar encuesta socio-economica</label>
        </div>
        <button type="submit" class="btn btn-warning">Guardar</button>
    </form>
@endsection
