@extends('layouts.master')



@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

@if($errors->any())
<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card-header" style="background-color: rgb(239 194 194)">
            <h5 style="color: #721c24;">Error</h5>
            </div>
        <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
        </div>
    </div>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-xl-6">
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
            <h6><i class='fa fa-info-circle'></i> Detalle de la carrera | SITI</h6>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="{{ route('administrativo.visualizaTitulos') }}" enctype="multipart/form-data">
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
                <input hidden value="1" id="tipo_titulo" name="tipo_titulo" />
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
                    <!--<div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="{{$dato['estado']}}" readonly>
                    </div>-->
                    <div class="form-group col-md-4">
                        <label for="tipo_solicitud">Tipo Firma</label>
                        <select onchange="mostrarOcultar(this);" id="tipo_firma{{$loop->index}}" name="tipo_firma" class="form-select form-control">
                                <option value="2">Digital</option>
                                <option value="1">Manuscrita</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div id="lineafirma{{$loop->index}}" class="form-group col-md-8" style="display: none">
                        <label for="tipo_solicitud">Firma</label>
                        <select id="firma{{$loop->index}}" name="firma" class="form-select form-control">
                                <option value="JEFE">JEFE</option>
                                <option value="SUBJEFE">SUBJEFE</option>
                        </select>
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
    @elseif(empty($data))
    <div class="card mb-3">
        <div class='card-header'>
            <h6><i class='fa fa-info-circle'></i> Detalle de Titulos</h6>
        </div>
        <div class="card-body">
            <p>El estudiante <strong>{{$nombreCompleto}}</strong> no tiene ningun titulo en proceso.</p>
        </div>
    </div>
    @endif
    @if (!empty($planilla))
    @foreach($planilla as $planillas)
    <!--<div class="card mb-3">
        <div class='card-header'>
            <h6><i class='fa fa-info-circle'></i> Detalle de la carrera | Sistema Antiguo</h6>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="{{ route('administrativo.visualizaTitulos') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden value="{{$planillas->carnet}}" id="registroAcademico" name="registroAcademico" />
                <input hidden value="{{$planillas->nombre}}" id="nombre" name="nombre" />
                <input hidden value="{{$planillas->titulo}}" id="nombre_carrera" name="nombre_carrera" />
                <input hidden value="{{$planillas->fec_gradua}}" id="fecha_graduacion" name="fecha_graduacion" />
                <input hidden value="{{$planillas->codfac}}" id="codfac" name="codfac" />
                <input hidden value="{{$planillas->codext}}" id="codext" name="codext" />
                <input hidden value="{{$planillas->codcar}}" id="codcar" name="codcar" />
                <input hidden value="2" id="tipo_titulo" name="tipo_titulo" />
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="registroAcademico">Registo Académico</label>
                        <input type="text" class="form-control" id="registroAcademico" name="registroAcademico" value="{{$planillas->carnet}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input type="text" class="form-control" id="cui" name="cui" value="{{$planillas->carnet}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="nombre_carrera">Carrera</label>
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$planillas->titulo}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$planillas->nombre}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="fecha_graduacion">Fecha de Graduación</label>
                        <input type="text" class="form-control" id="fecha_graduacion" name="fecha_graduacion" value="{{date('d-m-Y', strtotime($planillas->fec_gradua))}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="no_titulo">No.Titulo</label>
                        <input type="number" class="form-control" id="no_titulo" name="no_titulo" value="{{$planillas->registro}}" @if($planillas->registro > 0) @endif readonly required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="tipo_tramite">Certificación de Titulo</label>
                        <select id="tipo_tramite" name="tipo_tramite" class="form-select form-control">
                                <option value="1">Regular</option>
                                <option value="2">Incorporación</option> -->
                                <!--<option value="4">Reposición</option>-->
                        <!--</select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipo_solicitud">Tipo Firma</label>
                        <select onchange="mostrarOcultar2(this);" id="tipo_firma{{$loop->index}}{{$loop->index}}" name="tipo_firma" class="form-select form-control">
                                <option value="2">Digital</option>
                                <option value="1">Manuscrita</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div  id="lineafirma{{$loop->index}}{{$loop->index}}" class="form-group col-md-8" style="display: none;">
                        <label for="firma">Firma</label>
                        <select id="firma{{$loop->index}}{{$loop->index}}" name="firma" class="form-select form-control">
                                <option value="JEFE">JEFE</option>
                                <option value="SUBJEFE">SUBJEFE</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <input type="submit" value="Generar" class="btn btn-primary btn-lg btn-block" />
                </div>
                </div>
            </form>
        </div>
    </div>-->
    @endforeach
    @endif
    </div>
</div>

<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js">
</script>

@endsection

@section('javascript')
<script>
    window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload() 
    }
    };

    function mostrarOcultar(that) {
    if (that.value == "1") {
        var index = that.id; 
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("lineafirma"+index).style.display = "block";
    } else {
        var index = that.id;
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("lineafirma"+index).style.display = "none";
        document.getElementById("firma"+index).value = "JEFE";
        
    }
}

    function mostrarOcultar2(that) {
    if (that.value == "1") {
        var index = that.id; 
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("lineafirma"+index).style.display = "block";
    } else {
        var index = that.id;
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("lineafirma"+index).style.display = "none";
        document.getElementById("firma"+index).value = "JEFE";
        
    }
}
</script>
@endsection