@extends('layouts.master')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">

    <style>
        .ocultarDiv{
            display: none;
        }
    </style>

    <base targert='_parent'>
@endsection
@section('content')


    <div class="card">
        <div class="card-header">
            <h3>Información del Aspirante</h3>
        </div>
        <div class="card-body">
            <form id="formDatos" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputNov" class="col-md-2 col-form-label">N.O.V:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="inputNov" name="inputNov" autocomplete="off" pattern="\d{10}"
                            required/>
                    </div>
                    <label for="inputPIN" class="col-md-2 col-form-label">PIN:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="8" id="inputPIN" name="inputPIN" required/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputNombre1" class="col-md-2 col-form-label">Primer Nombre:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" required id="inputNombre1" name="inputNombre1" required/>
                    </div>
                    <label for="inputNombre2" class="col-md-2 col-form-label">Segundo Nombre:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="inputNombre2" name="inputNombre2"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputApellido1" class="col-md-2 col-form-label">Primer Apellido:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="inputApellido1" name="inputApellido1" required/>
                    </div>
                    <label for="inputApellido2" class="col-md-2 col-form-label">Segundo Apellido:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="inputApellido2" name="inputApellido2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFecha" class="col-md-2 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-md-2">
                        <input type="date" class="form-control" id="inputFecha" name="inputFecha" required/>
                    </div>
                    <label for="inputSexo" class="col-md-2 col-form-label">Genero: </label>
                    <div class="col-md-2">
                        <select class="form-control custom-select" required id="inputSexo" name="inputSexo">
                            <option value="0">Femenino</option>
                            <option value="1">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEstCivil" class="col-md-2 col-form-label">Estado civil:</label>
                    <div class="col-md-2">
                        <select class="form-control custom-select" required id="inputEstCivil" name="inputEstCivil">
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCodColegio" class="col-md-2 col-form-label">Código de Colegio:</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" required id="inputCodColegio" name="inputCodColegio"/>
                    </div>
                    <label for="inputColegio" class="col-md-2 col-form-label">Nombre del Colegio</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" required id="inputColegio" name="inputColegio"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <input type="reset" value="Cancelar" class="btn btn-danger">
                    </div>
                <div>
            </form>
        </div>
    </div>
@endsection
