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
                                        <label>Pasaporte: </label>
                                        <label>{{Auth::guard('estudiante')->user()->numero_pasaporte}}</label>
                                </div>
                        </div>
                        @endif
                </div>
        </div>

        @if($errors->any())
        <div class="card mb-3">
                <div class='card-header'>
                        <h3>Mensaje de solicitud</h3>
                </div>
                <div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
                        {{$errors->first()}}
                </div>
        </div>
        @endif

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
                        <form id="datos-personales" method="POST" action="{{ url('estudiante/SolicitaCertificacionInscripcion/certificacion')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input hidden value="{{$carrera->idFacultad}}" id="ua" name="ua" />
                                <input hidden value="{{$carrera->idExtension}}" id="ext" name="ext" />
                                <input hidden value="{{$carrera->idCarrera}}" id="idCarrera" name="idCarrera">
                                <input hidden value="{{$nombreCompleto}}" id="nombre" name="nombre">
                                <input hidden value="{{$carnet}}" id="carnet" name="carnet">
                                <input hidden value="{{$cui}}" id="cui" name="cui">
                                <input hidden value="{{$carrera->nivel}}" id="nivel" name="nivel">
                                <input hidden value="{{$carrera->sitAcademica}}" id="sitAcademica" name="sitAcademica">
                                <input hidden value="{{$carrera->fechaCierre}}" id="fechaCierre" name="fechaCierre">
                                <input hidden value="{{$carrera->activo}}" id="activo" name="activo">
                                <div class="form-row justify-content-start">
                                        <div class="form-group col-md-4">
                                                <label for="unidad_academica">Unidad Académica</label>
                                                <input type="text" class="form-control" id="unidad_academica" name="unidad_academica" value="{{$carrera->facultad}}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="extension">Extensión</label>
                                                <input type="text" class="form-control" id="extension" name="extension" value="{{$carrera->extension}}" readonly>
                                        </div>
                                </div>
                                <div class="form-row justify-content-start">
                                        <div class="form-group col-md-4">
                                                <label for="nombre_carrera">Carrera</label>
                                                <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$carrera->carrera}}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="tipo_solicitud">Tipo de Solicitud</label>
                                                <select id="firma" name="firma" class="form-select form-control">
                                                        <option value="1">Firma Digital</option>
                                                        <option value="2">Firma Original</option>
                                                </select>
                                        </div>

                                </div>
                                <div class="form-row justify-content-start">
                                        <div class="form-group col-md-2">
                                                <label for="cat">Ciclos</label>
                                                <select class="js-example-basic-single" multiple data-live-search="true" name="cat[]">
                                                        @foreach($fec_bitinscripcion[$loop->index] as $inscripciones)
                                                        @if($carrera->idFacultad == $inscripciones->cod_ua AND $carrera->idExtension == $inscripciones->cod_ext AND $carrera->idCarrera == $inscripciones->cod_car )
                                                        <option value="{{$inscripciones->Ciclos}}">{{$inscripciones->Ciclos}}</option>
                                                        @endif
                                                        @endforeach
                                                </select>
                                                
                                        </div>
                                </div>
                                <div class="form-row justify-content-start">
                                                        <div class="form-group col-md-8">
                                                                <input type="submit" value="Solicitar Certificación" class="btn btn-primary" />
                                                        </div>
                                                </div>
                        </form>
                </div>
               
        </div>
        @endforeach
       
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
        $('select').selectpicker();
</script>

</script>
@endsection