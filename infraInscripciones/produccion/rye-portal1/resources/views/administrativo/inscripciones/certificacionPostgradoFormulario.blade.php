@extends('layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

<div class='container'>
    
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
            <form id="datos-personales" method="POST" action="{{ route('administrativo.certificar') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden value="{{$carrera->idFacultad}}" id="ua" name="ua" />
                <input hidden value="{{$carrera->idExtension}}" id="ext" name="ext" />
                <input hidden value="{{$carrera->idCarrera}}" id="idCarrera" name="idCarrera">
                <input hidden value="{{$carrera->nivel}}" id="nivel" name="nivel">
                <input hidden value="{{$cod_nac}}" id="cod_nac" name="cod_nac">
                <input hidden value="{{$carrera->sit_acad}}" name="sit_acad"/>
                <input hidden value="{{$carrera->provisional}}" name="provisional"/>
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
                    @if(in_array(52,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                    @if($cod_nac == 30)
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input style="background-color: #fff;" type="text" class="form-control" id="cui" name="cui" value="{{$cui}}" required>
                    </div>
                    @else
                    <div class="form-group col-md-4">
                        <label for="pasaporte">Pasaporte</label>
                        <input style="background-color: #fff;" type="text" class="form-control" id="pasaporte" name="pasaporte" value="{{$pasaporte}}" required>
                    </div>
                    @endif
                    @else
                    @if($cod_nac == 30)
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="cui" name="cui" value="{{$cui}}" required>
                    </div>
                    @else
                    <div class="form-group col-md-4">
                        <label for="pasaporte">Pasaporte</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="pasaporte" name="pasaporte" value="{{$pasaporte}}" required>
                    </div>
                    @endif
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
                        @if(in_array(52,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                        <label for="boleta">No. Orden de Pago / Referencia</label>
                        <input type="text" class="form-control" id="boleta" name="boleta" value="" required>
                        @else
                        <label for="boleta">No. Orden de Pago</label>
                        <input type="Number" class="form-control" id="boleta" name="boleta" value="" required>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipo_solicitud">Tipo Firma</label>
                        <select onchange="mostrarOcultar(this);" id="firma{{$loop->index}}" name="firma" class="form-select form-control">
                            <option value="2">Firma Manuscrita</option>
                            <option value="1">Firma Digital</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        @if(in_array(52,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                        <label for="fecha">Fecha Boleta / Fecha Ingreso</label>
                        <input type="date" class="form-control form-control-sm" id="fechaboleta" name="fechaboleta" value="{{ \Carbon\Carbon::now()->toDateString()}}" required>
                        @else
                        <label for="fecha">Fecha Boleta</label>
                        <input type="date" class="form-control form-control-sm" id="fechaboleta" name="fechaboleta" value="" required>
                        @endif
                    </div>
                    <div id="lineafirma{{$loop->index}}" class="form-group col-md-4" style="">
                        <label for="jefe_firma{{$loop->index}}">Linea de Firma</label>
                        <select id="jefe_firma{{$loop->index}}" name="jefe_firma" class="form-select form-control">
                            <option value="JEFE">Jefe</option>
                            <option value="SUBJEFE">Subjefe</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <input type="submit" value="Generar Certificación" class="btn btn-primary btn-lg btn-block" />
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
            document.getElementById("jefe_firma"+index).value = "JEFE";
            document.getElementById("lineafirma"+index).style.display = "none";
        }
    }
    
</script>

@endsection