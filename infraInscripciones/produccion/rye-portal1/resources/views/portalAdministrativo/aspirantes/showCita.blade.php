@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Asignar Cita - NOV - {{ $aspirante->nov }}</div>
        <div class="card-body">

            <a href="{{ route('administrativo.Citas','conCita') }}" title="Back">
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
                    <tr class="thead-dark"><th colspan="3" class="text-center"> Reprogramar Cita </th></tr>
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
                                    <button type="submit" class="btn btn-primary btn-sm col-md-3 " title="Asignar Cita" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Reprogramar Cita</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr class="thead-dark"><th colspan="3" class="text-center">INSCRIBIR</th></tr>
                    <tr>
                        <td colspan="3">
                            <br>
                            <div class="text-center">
                                <h1><span class="badge badge-dark">INSCRIBIR</span></h1>
                                <hr>
                                <h5>Toda la documentación se encuentra correcta y es autentica</h5>
                                <a href="{{route('administrativo.realizarInscripcion',$aspirante->nov)}}" title="Realizar Inscripción">
                                    <button class="btn  btn-sm btn-primary col-md-3" type="button"
                                            aria-controls="Aceptar Cierre">Realizar Inscripcion
                                    </button>
                                </a>
                            </div>
                            <br>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
