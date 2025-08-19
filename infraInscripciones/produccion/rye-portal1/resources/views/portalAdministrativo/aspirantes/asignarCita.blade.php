@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Asignar Cita - NOV - {{ $aspirante->nov }}</div>
        <div class="card-body">

            <a href="{{ route('administrativo.Citas','sinCita') }}" title="Back">
                <button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Regresar
                </button>
            </a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th> Número de Orientación Vocacional</th>
                        <td>{{ $aspirante->nov }}</td>
                        {{-- todo mostrar los documentos (foto, certificados, etc) de forma correcta--}}
                        <td class="table-bordered text-center" rowspan="5"><img src="{{$expedinteFoto}}"></td>
                    </tr>
                    <tr>
                        <th> Nombre Completo</th>
                        <td > {{ $aspirante->getNombreCompleto() }}</td>
                    </tr>
                    <tr>
                        <th> Fecha Nacimiento</th>
                        <td > {{ $aspirante->getFechaNacimiento() }} </td>
                    </tr>
                    <tr>
                        <th> Género</th>
                        <td > {{ $aspirante->getDatos()->getGenero() }} </td>
                    </tr>
                    <tr>
                        <th> Direccion</th>
                        <td> {{ $aspirante->getDatos()->direccion }} </td>
                    </tr>
                    <tr class="thead-dark">
                        <th>Unidad Académica</th>
                        <th>Extension</th>
                        <th>Carrera</th>
                    </tr>
                    <tr>
                        <td>{{$aspirante->getCodigoDosDigitos($aspirante->unidadAcademica) . ' - ' . $aspirante->getnombreUA()}}</td>
                        <td>{{$aspirante->getCodigoDosDigitos($aspirante->extension) . ' - ' . $aspirante->getnombreExtension()}}</td>
                        <td>{{$aspirante->getCodigoDosDigitos($aspirante->carrera) . ' - ' . $aspirante->getnombreCarrera()}}</td>
                    </tr>
                    <tr class="thead-dark"><th colspan="3" class="text-center"> Documentos </th></tr>
                    @if(($aspirante->certificadoNacimiento === false) && ($aspirante->tituloDiversificado === false) && ($aspirante->cierrePensum === false ) &&($aspirante->pasaporte === false))
                        <tr>
                            <td colspan="3" class="text-center text-danger">
                                El usuario no subió documentos.
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3">
                                <div class="text-center">
                                    @if($aspirante->esExtranjero())
                                        <button class="btn  btn-sm btn-success col-md-3" type="button" data-toggle="collapse" data-target="#collapsePasaporte" aria-expanded="false" aria-controls="Cierre de Pasaporte">Pasaporte</button>
                                    @endif
                                        <a class="btn btn-sm btn-success col-md-3" data-toggle="collapse" href="#collapseCertificado" role="button" aria-expanded="false" aria-controls="Certificado de Nacimiento">Certificado de Nacimiento</a>
                                        <button class="btn  btn-sm btn-success col-md-3" type="button" data-toggle="collapse" data-target="#collapsePensum" aria-expanded="false" aria-controls="Cierre de Pensum">Cierre de Pensum</button>
                                        <button class="btn  btn-sm btn-success col-md-3" type="button" data-toggle="collapse" data-target="#collapseTítulo" aria-expanded="false" aria-controls="Título">Título</button>
                                </div>
                                @if($aspirante->esExtranjero())
                                <br>
                                <div class="collapse multi-collapse" id="collapsePasaporte">

                                    <div class="text-center">
                                        <hr>
                                        <h1><span class="badge badge-dark">Pasaporte</span></h1>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Pasaporte',1])}}" title="Aceptar Pasaporte">
                                            <button class="btn  btn-sm btn-primary col-md-3" type="button"
                                                    aria-controls="Aceptar Cierre">Aceptar Pasaporte
                                            </button>
                                        </a>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Pasaporte',0])}}" title="Rechazar Pasaporte">
                                            <button class="btn  btn-sm btn-danger col-md-3" type="button"
                                                    aria-controls="Rechazar Cierre">Rechazar Pasaporte
                                            </button>
                                        </a>
                                    </div>
                                    <br>
                                    @if($aspirante->pasaporte === true)
                                        <div class="card card-body embed-responsive embed-responsive-16by9">
                                            <embed src="{{$expedientePasaporte}}" >
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <b class="text-danger">No subio pasaporte</b>
                                        </div>
                                    @endif
                                </div>
                                @endif
                                <br>
                                <div class="collapse multi-collapse" id="collapseCertificado">

                                    <div class="text-center">
                                        <hr>
                                        <h1><span class="badge badge-dark">Certificado de Nacimiento</span></h1>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Certificado',1])}}" title="Aceptar Certificado">
                                            <button class="btn  btn-sm btn-primary col-md-3" type="button"
                                                    aria-controls="Aceptar Certificado">Aceptar Certificado
                                            </button>
                                        </a>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Certificado',0])}}" title="Rechazar Certificado">
                                            <button class="btn  btn-sm btn-danger col-md-3" type="button"
                                                    aria-controls="Rechazar Certificado">Rechazar Certificado
                                            </button>
                                        </a>
                                    </div>
                                    <br>
                                    @if($aspirante->certificadoNacimiento === true)
                                        <div class="card card-body embed-responsive embed-responsive-16by9">
                                            <embed src="{{ $expedienteCertificadoNac}}" >
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <b class="text-danger">No subio certificado de Nacimiento</b>
                                        </div>
                                    @endif
                                </div>
                                <div class="collapse multi-collapse" id="collapsePensum">

                                    <div class="text-center">
                                        <hr>
                                        <h1><span class="badge badge-dark">Cierre de Pensum</span></h1>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Pensum',1])}}" title="Aceptar Cierre">
                                            <button class="btn  btn-sm btn-primary col-md-3" type="button"
                                                    aria-controls="Aceptar Cierre">Aceptar Cierre
                                            </button>
                                        </a>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Pensum',0])}}" title="Rechazar Cierre">
                                            <button class="btn  btn-sm btn-danger col-md-3" type="button"
                                                    aria-controls="Rechazar Cierre">Rechazar Cierre
                                            </button>
                                        </a>
                                    </div>
                                    <br>
                                    @if($aspirante->cierrePensum === true)
                                        <div class="card card-body embed-responsive embed-responsive-16by9">
                                            <embed src="{{$expedientePensum}}" >
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <b class="text-danger">No subio cierre de pensum</b>
                                        </div>
                                    @endif
                                </div>
                                <div class="collapse multi-collapse" id="collapseTítulo">
                                    <div class="text-center">
                                        <hr>
                                        <h1><span class="badge badge-dark">Título</span></h1>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Titulo',1])}}" title="Aceptar Título">
                                            <button class="btn  btn-sm btn-primary col-md-3" type="button"
                                                    aria-controls="Aceptar Título">Aceptar Título
                                            </button>
                                        </a>
                                        <a href="{{route('administrativo.CambiarEstado',[$aspirante->nov,'Titulo',0])}}" title="Rechazar Título">
                                            <button class="btn  btn-sm btn-danger col-md-3" type="button"
                                                    aria-controls="Rechazar Título">Rechazar Título
                                            </button>
                                        </a>
                                    </div>
                                    <br>
                                    @if($aspirante->tituloDiversificado === true)
                                        <div class="card card-body embed-responsive embed-responsive-16by9">
                                            <embed src="{{ $expedienteTituloDiversificado}}" >
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <b class="text-danger">No subio titulo de diversificado</b>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif
                    <tr class="thead-dark"><th colspan="3" class="text-center"> Asignar Cita </th></tr>
                    <tr>
                        <td colspan="3">
                            <form method="POST" action="{{route('administrativo.crearCita',$aspirante->nov)}}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline " name="formAsignarCita">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="cita" class="col-sm-4 col-form-label col-form-label-sm text-md-right">{{ __('Fecha de Cita') }}</label>
                                    <div class="col-md-4">
                                        <input id="cita" type="datetime-local" class="form-control form-control-sm" name="cita" >
                                    </div>
                                    {!! $errors->first('cita', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm col-md-3 " title="Asignar Cita" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Asignar Cita</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
