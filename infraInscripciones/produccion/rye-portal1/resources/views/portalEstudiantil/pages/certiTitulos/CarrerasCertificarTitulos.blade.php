@extends('layouts.master')



@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-6">
    @if($errors->any())
    <div class="card mb-3">
            <div class='card-header'>
                    <h3>Mensaje</h3>
            </div>
            <div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
                    {{$errors->first()}}
            </div>
    </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <h3>Seleccione Título</h3>
        </div>
    </div>
    @if (!empty($data))
        @foreach($data as $dato)
            @if ($dato['estado'] <= 11 || $dato['estado'] == 17)
    <div class="card mb-3">
        <div class='card-header'>
            <h6><i class='fa fa-info-circle'></i> Detalle de la carrera</h6>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="{{ route('administrativo.visualizaCertTitulos') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden value="{{$dato['reg_academico']}}" id="registroAcademico" name="registroAcademico" />
                <input hidden value="{{$dato['cui']}}" id="cui" name="cui" />
                <input hidden value="{{$dato['nombre']}}" id="nombre" name="nombre" />
                <input hidden value="{{$dato['nombre_carrera']}}" id="nombre_carrera" name="nombre_carrera" />
                <input hidden value="{{$dato['nivel_academico']}}" id="nivel_academico" name="nivel_academico" />
                <input hidden value="{{$dato['fecha_graduacion']}}" id="fecha_graduacion" name="fecha_graduacion" />
                <input hidden value="{{$dato['facultad']}}" id="facultad" name="facultad" />
                <input hidden value="{{$dato['estado']}}" id="estado" name="estado" />
                <input hidden value="{{$dato['tipo_tramite']}}" id="tipo_tramite" name="tipo_tramite" />
                <input hidden value="{{$dato['no_titulo']}}" id="no_titulo" name="no_titulo" />
                <input hidden value="{{$dato['cod_ua']}}" id="codfac" name="codfac" />
                <input hidden value="{{$dato['cod_extension']}}" id="codext" name="codext" />
                <input hidden value="{{$dato['cod_carrera']}}" id="codcar" name="codcar" />
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="registroAcademico">Registo Académico</label>
                        <input type="text" class="form-control" id="registroAcademico" name="registroAcademico" value="{{$dato['reg_academico']}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input type="text" class="form-control" id="cui" name="cui" value="{{$dato['cui']}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nombre_carrera">Carrera</label>
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$dato['nombre_carrera']}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$dato['nombre']}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nivel_academico">Nivel Académico</label>
                        <input type="text" class="form-control" id="nivel_academico" name="nivel_academico" value="{{$dato['nivel_academico']}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_graduacion">Fecha de Graduación</label>
                        <input type="text" class="form-control" id="fecha_graduacion" name="fecha_graduacion" value="{{date('d-m-Y', strtotime($dato['fecha_graduacion']))}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="facultad">Facultad</label>
                        <input type="text" class="form-control" id="facultad" name="facultad" value="{{$dato['facultad']}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="{{$dato['estado']}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <input type="submit" value="Generar" class="btn btn-primary btn-lg btn-block" />
                </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endforeach
    @else
    <div class="card mb-3">
        <div class='card-header'>
            <h6><i class='fa fa-info-circle'></i> Detalle de Titulos</h6>
        </div>
        <div class="card-body">
            <p>El estudiante <strong>{{$nombreCompleto}}</strong> no tiene ningun titulo en proceso.</p>
        </div>
    </div>
    @endif
</div>

</div>

    



<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js">
</script>

@endsection
