@extends('layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="{{ URL::asset('css/estiloConstanciaInscripcion.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class='container'>
        <div class="card mb-3">
                <div class='card-header'>
                        <h3 class='card-title'>Datos personales</h3>
                </div>
                <div class='card-body'>
                        <div class="form-row justify-content-start">
                                <div class="form-group row-md-8">
                                        <label>Nombre: </label>
                                        <label>{{$nombreCompleto}}</label>
                                </div>
                        </div>
                        <div class="form-row justify-content-start">
                                <div class="form-group col-md-8">
                                        <label>Registro Académico: </label>
                                        <label>{{$carnet}}</label>
                                </div>
                        </div>
                        @if($cod_nac == 30)
                        <div class="form-row justify-content-start">
                                <div class="form-group col-md-8">
                                        <label>C.U.I.: </label>
                                        <label>{{Auth::guard('estudiante')->user()->cui}}</label>
                                </div>
                        </div>
                        @else
                        <div class="form-row justify-content-start">
                                <div class="form-group col-md-8">
                                        <label>Pasapote: </label>
                                        <label>{{Auth::guard('estudiante')->user()->numero_pasaporte}}</label>
                                </div>
                        </div>
                        @endif
                </div>
        </div>

        <div class="card mb-3">
                <div class="card-header">
                        <h3> <i class="fa fa-info-circle"></i> Contacto del Estudiante</h3>
                </div>
        </div>

        <div class="card mb-3">
                <div class='card-header'>
                        <h6><i class='fa fa-info-circle'> Datos de Contacto del Estudiante</i></h6>
                </div>
                <div class="card-body">
                        <form id="datos-personales" method="POST" action="{{ route('estudiante.certificacion.original') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo">
                                <input hidden value="{{$ciclo_anio}}" id="ciclo_anio" name="ciclo_anio">
                                <input hidden value="{{$cod_ua}}" id="cod_ua" name="cod_ua" />
                                <input hidden value="{{$ua}}" id="ua" name="ua" />
                                <input hidden value="{{$cod_car}}" id="cod_car" name="cod_car">
                                <input hidden value="{{$car}}" id="car" name="car">
                                <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto">  
                                <input hidden value="{{$carnet}}" id="carnet" name="carnet">
                                <input hidden value="{{$extension}}" id="extension" name="extension" />
                                <input hidden value="{{$cod_ext}}" id="cod_ext" name="cod_ext" />
                                <input hidden value="{{$firma}}" id="firma" name="firma">
                                <input hidden value="{{$caty2}}" id="caty" name="caty">
                                <input hidden value="{{Auth::guard('estudiante')->user()->cui}}" id="cui" name="cui">
                                <input hidden value="{{$sitAcademica}}" id="sit_acad" name="sit_acad">

                                <div class="form-row justify-content-start">
                                        <div class="form-group col-md-4">
                                                <label for="correo">Correo Electronico</label>
                                                <input type="text" class="form-control" id="correo" name="correo" value="{{$correo}}" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="telefono">Telefono</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{$telefono}}" minlength="8" maxlength="8" pattern="[0-9]+" title="Se acepta unicamente valores numericos" required>
                                        </div>
                                </div>
                                <div class="form-row justify-content-start">
                                        <div class="form-group col-md-8">
                                                <input type="submit" value="Enviar" class="btn btn-primary" />
                                        </div>
                                </div>
                        </form>
                </div>
        </div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('js/multiStepForm.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

<script type="text/javascript">
        function detalle_archivo(id_archivo) {
                let archivo = id_archivo;

                $(function() {
                        let ruta_completa = document.getElementById('inputGroupFile01' + archivo).value;
                        if (ruta_completa) {
                                let posicion = (ruta_completa.indexOf('\\') >= 0 ? ruta_completa.lastIndexOf('\\') : ruta_completa.lastIndexOf('/'));
                                let nombre_archivo = ruta_completa.substring(posicion);
                                if (nombre_archivo.indexOf('\\') === 0 || nombre_archivo.indexOf('/') === 0) {
                                        nombre_archivo = nombre_archivo.substring(1);
                                };

                                document.getElementById("text_input" + archivo).textContent = nombre_archivo;

                        }


                });
        };
</script>
@endsection