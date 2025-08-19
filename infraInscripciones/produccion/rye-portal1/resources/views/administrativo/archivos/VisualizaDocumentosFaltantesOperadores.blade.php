@extends('layouts.master')



@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex justify-content-center">
<div>
    <div class="card mb-3">
        <div class="card-header">
            <h3>Información Archivos</h3>
        </div>
    </div>

        @foreach($data as $dato)
        @if($dato['entregado'] == "N" AND $dato['obligatorio'] == "S") <!--cambiar a entregado N obligatorio S, estado actual para pruebas-->
    <div class="card mb-3">
        <div class='card-header'>
            <h6><i class='fa fa-info-circle'></i> Archivo Faltante</h6>
        </div>
        <div class="card-body">
                <div class="form-row justify-content-start">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$dato['nombre']}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="registroAcademico">Entregado</label>
                        @if($dato['entregado'] == "S")
                        <input type="text" class="form-control" id="registroAcademico" name="registroAcademico" value="Si" readonly>
                        @elseif($dato['entregado'] == "N")
                        <input type="text" class="form-control" id="registroAcademico" name="registroAcademico" value="No" readonly>
                        @endif
                    </div>
                </div>
                <div class="form-row justify-content-start">
                    <div class="form-group col-md-6">
                        <label for="nombre_carrera">Obligatorio</label>
                        @if($dato['obligatorio'] == "S")
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="Si" readonly>
                        @elseif($dato['obligatorio'] == "N")
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="No" readonly>
                        @endif
                    </div>
                </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
</div>

<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js">
</script>

@endsection
