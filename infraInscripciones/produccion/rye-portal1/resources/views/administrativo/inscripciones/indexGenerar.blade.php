@extends('layouts.master')

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->

<!--<div class="card mb-3">
    <div class="card-header">
        <h3>Panel de Busqueda</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('administrativo.inscripciones.buscaEstudiantePregrado') }}" class="container-fluid" id="form">
            {{ csrf_field() }}
            <div class="form-row justify-content-start">
                <div class="col-12 col-lg-1" style="align-items: center; display: flex;">
                    <label for="registroAcademico">Registo Académico</label>
                </div>
                <div class="col-12 col-lg-2">
                    <input class="form-control me-2 mr-2  mt-2 mt-md-0" type="number" id="carnet" aria-label="Search" name="carnet" required>
                </div>
                <div class="col-12 col-lg-1">
                    <input type="submit" class="btn btn-success w-100 mt-2 mt-md-0" value="Buscar" onclick="verifica()">
                </div>
            </div>
        </form>
        @if($errors->any())
        <div class="form-row justify-content-center col-12 col-lg-4 alert alert-danger" role="alert">
        {{$errors->first()}}
        </div>
        @endif
    </div>
</div>-->

<div class='container'>
<div class="card mb-3">
    <div class="card-header">
        <h3 style="text-align: center;">Panel de Busqueda | Generar Certificación</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('administrativo.inscripciones.buscaEstudiantePregrado') }}" class="container-fluid" id="form">
            {{ csrf_field() }}
            <div class="form-row justify-content-center">
                <div class="col-12 col-lg-6" style="text-align: center;">
                    <label for="registroAcademico">Registo Académico</label>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="col-12 col-lg-6">
                    <input style="text-align: center;" class="form-control me-2 mr-2  mt-2 mt-md-0" type="number" id="carnet" aria-label="Search" name="carnet" required>
                </div>
            </div>
            <br/>
            <div class="form-row justify-content-center">
                <div class="col-12 col-lg-3">
                    <input type="submit" class="btn btn-success w-100 mt-2 mt-md-0" value="Buscar">
                </div>
            </div>
        </form>
        <br/>
        @if($errors->any())
        <div class="form-row justify-content-center alert alert-danger" role="alert">
        {{$errors->first()}}
        </div>
        @endif
    </div>
</div>
</div>

@endsection

