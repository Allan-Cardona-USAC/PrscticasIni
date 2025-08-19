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
            {!!$errors->first()!!}
        </div>
    </div>
        @endif
        @foreach($carreras as $carrera)
    <div class="card mb-3">
        <div class='card-header' style="text-align: center">
            <h6><i class='fa fa-info-circle'></i> Detalle de la carrera</h6>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="{{route('administrativo.archivos.GeneraConstanciaArchivos')}}" enctype="multipart/form-data">
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
                    @if($codNacionalidad == 30)
                    <div class="form-group col-md-4">
                        <label for="cui">CUI</label>
                        <input type="text" class="form-control" id="cui" name="cui" value="{{$cui}}" readonly>
                    </div>
                    @else
                    <div class="form-group col-md-4">
                        <label for="cui">Pasaporte</label>
                        <input type="text" class="form-control" id="cui" name="cui" value="{{$cui}}" readonly>
                    </div>
                    @endif
                    <div class="form-group col-md-4">
                        <label for="codigo_carrera">Código Carrera</label>
                        <input type="text" class="form-control" id="codigo_carrera" name="codigo_carrera" value="{{$carrera->idFacultad}} - {{$carrera->idExtension}} - {{$carrera->idCarrera}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label for="nombre_carrera">Carrera</label>
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$carrera->carrera}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label for="facultad">Facultad</label>
                        <input type="text" class="form-control" id="facultad" name="facultad" value="{{$carrera->facultad}}" readonly>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="situacionAcademica">Situación Académica</label>
                        <input type="text" class="form-control" id="situacionAcademica" name="situacionAcademica" value="{{$carrera->situacion}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipoConstancia">Tipo Constancia</label>
                        <select onchange="mostrarOcultar(this);" required id="firma{{$loop->index}}" name="tipoConstancia" class="form-select form-control">
                        <option value="" disabled selected>Seleccionar opción</option>    
                        <option value="1">Expediente Completo</option>    
                        <option value="2">Expediente Provisional</option>
                        <option value="3">Expediente Traslado a Otras Universidades</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div id="documentosIncompleto{{$loop->index}}" class="form-group col-md-8" style="display: none; text-align: center; background-color: rgb(233, 236, 239);
                        border-radius: 10px;">
                            <p for="documentosIncompleto" style="font-weight: 500; border: 1px; border-color: black; border-bottom: groove; color: #495057;">Documentación</p>
                            <div class="form-row justify-content-around" style="color: #495057;">
                                <div>
                                    <input type="checkbox" id="documentosIncompleto1{{$loop->index}}" name="documentosIncompleto1{{$loop->index}}" value=1 >
                                    <label for="documentosIncompleto1{{$loop->index}}" style="padding-left: 10px"> Solvencia Matricula Estudiantil </label><br>
                                </div>
                                <div>
                                    <input type="checkbox" id="documentosIncompleto2{{$loop->index}}" name="documentosIncompleto2{{$loop->index}}" value=2 >
                                    <label for="documentosIncompleto2{{$loop->index}}" style="padding-left: 10px"> Solvencia Biblioteca Central</label><br>
                                </div>
                                <div>
                                    <input type="checkbox" id="documentosIncompleto3{{$loop->index}}" name="documentosIncompleto3{{$loop->index}}" value=2 >
                                    <label for="documentosIncompleto3{{$loop->index}}" style="padding-left: 10px"> Solvencia Centros</label><br>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div id="motivos{{$loop->index}}" class="form-group col-md-8" style="display: none;">
                        <label for="motivo">Motivo</label>
                        <select id="motivos{{$loop->index}}" name="motivo" class="form-select form-control">
                            <option value="1">Traslado a Otras Universidades</option>    
                            <!--<option value="2">Traslado de Unidades Académicas</option>-->
                        </select>
                    </div>
                </div>
                @foreach($errors->all() as $error)
                @if(str_contains($error, 'Lo sentimos, no podemos generar la constancia debido a que los datos del título registrado en nuestro sistema no coinciden con los del Mineduc.'))
                <input hidden value="1" id="exception" name="exception">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label for="motivo">Observaciones</label>
                        <input type="text" class="form-control" id="observacion" name="observacion" value="" required>
                    </div>
                </div>
                @endif
                @if(str_contains($error, 'Lo sentimos, no se encontró ningún título registrado en el Mineduc. Favor dirigirse a la ventanilla de archivos en el edificio de Registro y Estadística.'))
                <input hidden value="1" id="exception" name="exception">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label for="motivo">Observaciones</label>
                        <input type="text" class="form-control" id="observacion" name="observacion" value="" required>
                    </div>
                </div>
                @endif
                @if(str_contains($error, 'CO3 - No existen registros en MINEDUC'))
                <input hidden value="1" id="exception" name="exception">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label for="motivo">Observaciones</label>
                        <input type="text" class="form-control" id="observacion" name="observacion" value="" required>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="form-row justify-content-center">
                    <div id="documentos{{$loop->index}}" class="form-group col-md-8" style="display: none; text-align: center; background-color: rgb(233, 236, 239);
                        border-radius: 10px;">
                            <p for="documentos" style="font-weight: 500; border: 1px; border-color: black; border-bottom: groove; color: #495057;">Documentación</p>
                            <div class="form-row justify-content-around" style="color: #495057;">
                                <div>
                                    <input type="checkbox" id="document1{{$loop->index}}" name="document1{{$loop->index}}" value=1 >
                                    <label for="document1{{$loop->index}}" style="padding-left: 10px"> Documento Identificación </label><br>
                                </div>
                                <div>
                                    <input type="checkbox" id="document2{{$loop->index}}" name="document2{{$loop->index}}" value=2 >
                                    <label for="document2{{$loop->index}}" style="padding-left: 10px"> Certificación Mineduc</label><br>
                                </div>
                                <!--<div>
                                    <input type="checkbox" id="document3{{$loop->index}}" name="document3{{$loop->index}}" value=2 >
                                    <label for="document3{{$loop->index}}" style="padding-left: 10px"> Formato Solicitud</label><br>
                                </div>-->
                            </div>
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
<script>
function mostrarOcultar(that) {
    if (that.value == "3") {
        var index = that.id; 
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("motivos"+index).style.display = "block";
        document.getElementById("documentos"+index).style.display = "none";
        document.getElementById("documentosIncompleto"+index).style.display = "block";
        document.getElementById("document1"+index).required = false;
        document.getElementById("document2"+index).required = false;
        //document.getElementById("document3"+index).required = false;
        document.getElementById("documentosIncompleto1"+index).required = true;
        document.getElementById("documentosIncompleto2"+index).required = true;
        document.getElementById("documentosIncompleto3"+index) = true;
    }else if(that.value == "2"){
        var index = that.id; 
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("motivos"+index).style.display = "none";
        document.getElementById("documentos"+index).style.display = "block";
        document.getElementById("documentosIncompleto"+index).style.display = "none";
        document.getElementById("document1"+index).required = true;
        document.getElementById("document2"+index).required = true;
        //document.getElementById("document3"+index).required = true;
        document.getElementById("documentosIncompleto1"+index).required = false;
        document.getElementById("documentosIncompleto2"+index).required = false;
        document.getElementById("documentosIncompleto3"+index) = false;
    }else {
        var index = that.id;
        index = index.replace(/[^0-9]+/g, "");
        document.getElementById("motivos"+index).style.display = "none";
        document.getElementById("documentos"+index).style.display = "none";
        document.getElementById("documentosIncompleto"+index).style.display = "none";
        document.getElementById("document1"+index).required = false;
        document.getElementById("document2"+index).required = false;
        //document.getElementById("document3"+index).required = false;
        document.getElementById("documentosIncompleto1"+index).required = false;
        document.getElementById("documentosIncompleto2"+index).required = false;
        document.getElementById("documentosIncompleto3"+index) = false;
    }
}

</script>

@endsection