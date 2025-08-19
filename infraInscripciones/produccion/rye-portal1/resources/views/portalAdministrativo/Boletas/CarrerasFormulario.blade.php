@extends('layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<style>
        .filter-option {

                border: 1px solid #ced4da;
                border-radius: 0.25rem;
        }
</style>
@endsection

@section('content')

@if($errors->any())
        <div class="card mb-3">
        <div class="card-header">
        <h5>Error</h5>
        <h6 style="color: red;">Estado de la solicitud: {{$errors->first()}}</h6>
        </div>
        </div>
@endif

<div class="row justify-content-center">
    <div class="col-xl-6">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <i class="fa fa-info-circle"></i> Seleccione carrera</h3>
        </div>
    </div>

    @foreach($carreras as $carrera)
    <div class="card mb-3">
        <div class='card-header'>
            <h6><i class='fa fa-info-circle'></i> Detalle de la carrera</h6>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="{{Route('administrativo.BoletaController.generarBoleta')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden value="{{$carrera->idFacultad}}" id="ua" name="ua" />
                <input hidden value="{{$carrera->idExtension}}" id="ext" name="ext" />
                <input hidden value="{{$carrera->idCarrera}}" id="idCarrera" name="idCarrera">
                <input hidden value="{{$carrera->nivel}}" id="nivel" name="nivel">
                <input hidden value="{{$codNacionalidad}}" id="codNacionalidad" name="codNacionalidad">
                <input hidden value="{{$pasaporte}}" id="pasaporte" name="pasaporte">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="nombre" name="nombre" value="{{$nombreCompleto}}" readonly required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carnet">Registro Academico</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="carnet" name="carnet" value="{{$carnet}}" readonly required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    @if($codNacionalidad == 30)
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="cui" name="cui" value="{{$cui}}" required>
                    </div>
                    @else
                    <div class="form-group col-md-4">
                        <label for="cui">Pasaporte</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="cui" name="cui" value="{{$pasaporte}}" required>
                    </div>
                    @endif
                    <div class="form-group col-md-4">
                        <label for="extension">Extensión</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="extension" name="extension" value="{{$carrera->extension}}" readonly required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nombre_carrera">Carrera</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$carrera->carrera}}" readonly required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="unidad_academica">Unidad Académica</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="unidad_academica" name="unidad_academica" value="{{$carrera->facultad}}" readonly required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="ciclos">Ciclos</label>
                        <input style="background-color: #fff;" type="number" pattern="\d*" min="2013" max="{{$ciclo}}" class="form-control" id="ciclos" name="ciclos" value="" required>                          
                    </div>
                    <div class="form-group col-md-4">
                            <label for="semestre">Semestre</label>
                            <select id="semestre" name="semestre" class="form-select form-control">
                                <option value="1">Primer Semestre</option>
                                <option value="2">Segundo Semestre</option>
                            </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <input type="submit" value="Generar Boleta" class="btn btn-primary btn-lg btn-block" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endforeach
</div>

@endsection

@section('javascript')

<script>

function mostrarOcultar(that) {
    if (that.value == "2") {
        var index = that.id; 
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("lineafirma"+index).style.display = "block";
    } else {
        var index = that.id;
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("lineafirma"+index).style.display = "none";
    }
}

</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
        $('select').selectpicker();
</script>

@endsection