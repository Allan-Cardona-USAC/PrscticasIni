@extends('layouts.master')

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class='container'>
<div class="card mb-3">
    <div class="card-header">
        <h3 style="text-align: center;">Panel de Busqueda | Reimpresion</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('administrativo.inscripciones.buscaCertificacionReimpresionPregrado') }}" class="container-fluid" id="form">
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
                    <input type="submit" class="btn btn-success w-100 mt-2 mt-md-0" value="Busqueda de Registro">
                </div>
                <div class="col-12 col-lg-3">
                    <input type="button" class="btn btn-success w-100 mt-2 mt-md-0" value="Listado de Busqueda" onclick="window.location='{{route("administrativo.inscripciones.buscaListadoReimpresionPregrado")}}'"> 
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

