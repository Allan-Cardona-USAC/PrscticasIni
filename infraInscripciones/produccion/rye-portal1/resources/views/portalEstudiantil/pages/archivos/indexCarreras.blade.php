@extends('layouts.master')



@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

<div class="d-flex justify-content-center">
<div class="col-md-8">
    <div class="card mb-3">
        <div class="card-header">
            <h3>Seleccione Carrera</h3>
        </div>
    </div>
    @if($errors->any())
    <div class="card mb-3">
        <div class='card-header'>
            <h3>Mensaje de error</h3>
        </div>
        <div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
            {{$errors->first()}}
        </div>
    </div>
        @endif
        @foreach($carreras as $carrera)
    <div class="card mb-3">
        <div class='card-header' style="text-align: center">
            <h6><i class='fa fa-info-circle'></i> Detalle de la carrera</h6>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="{{route('estudiante.archivos.ValidarCertificacionArchivos')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden value="{{$carrera->idFacultad}}" id="ua" name="ua" />
                <input hidden value="{{$carrera->idExtension}}" id="ext" name="ext" />
                <input hidden value="{{$carrera->idCarrera}}" id="idCarrera" name="idCarrera">
                <input hidden value="{{$nombreCompleto}}" id="nombre" name="nombre">
                <input hidden value="{{$carnet}}" id="carnet" name="carnet">
                <input hidden value="{{$cui}}" id="cui" name="cui">
                <input hidden value="{{$carrera->nivel}}" id="nivel" name="nivel">
                <input hidden value="{{$carrera->extension}}" id="nombre_extension" name="nombre_extension">
                <input hidden value="{{$codNacionalidad}}" id="codNacionalidad" name="codNacionalidad">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$nombreCompleto}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="registroAcademico">Registo Académico</label>
                        <input type="text" class="form-control" id="registroAcademico" name="registroAcademico" value="{{$carnet}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nombre_carrera">Carrera</label>
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$carrera->carrera}}" readonly>
                    </div>
                    @if($codNacionalidad == 30)
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input type="text" class="form-control" id="cui" name="cui" value="{{$cui}}" readonly>
                    </div>
                    @else
                    <div class="form-group col-md-4">
                        <label for="cui">PASAPORTE</label>
                        <input type="text" class="form-control" id="cui" name="cui" value="{{$cui}}" readonly>
                    </div>
                    @endif
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label for="facultad">Facultad</label>
                        <input type="text" class="form-control" id="facultad" name="facultad" value="{{$carrera->facultad}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <input type="submit" value="Generar" class="btn btn-primary btn-block" />
                </div>
            </form>
        </div>
    </div>
    </div>
    @endforeach
</div>
</div>
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js">
</script>
@endsection

@section('javascript')
<script>
     $(document).ready(function(){
        /*Swal.fire({
                    icon: 'warning',
                    title: 'Información',
                    html: 'Recuerda revisar que tus datos personales sean los correctos y esten actualizados'
                });
            });*/
</script>
@endsection
