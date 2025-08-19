@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
<div class='container'>
    <div class="card mb-3">
        <div class='card-header'>
            <h3 class='card-title'>Datos personales</h3>
        </div>
        <div class='card-body'>
            <table>
                <tbody>
                    <tr>
                        <td><strong>Ciclo:</strong></td>
                        <td><strong>{{$ciclo->ciclo_web_pregrado}}</strong></td>
                    </tr>
                    <tr>
                        <td width="25%" ><strong>Registro Académico:</strong></td>
                        <td><strong>{{$carnet}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>C.U.I.:</strong></td>
                        <td><strong>{{$cui}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Nombre:</strong></td>
                        <td><strong>{{$nombreEstudiante}}</strong></td>
                    </tr>
                </tbody>
            </table>
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
    @if(strlen($cui) == 13)
        <div class="card mb-3">
            <div class="card-header">
                <h3> <i class="fa fa-info-circle"></i> Seleccione carrera</h3>   
            </div>
        </div>
        <div class='row'>
            @foreach($carreras as $carrera)
                <div class='col'>
                    <div class="card mb-2">
                        <div class='card-header'>
                            <h6 ><i class='fa fa-info-circle'></i>Detalle de la carrera</h6>
                        </div>
                        <div class='card-body'>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="align-top"><strong>Unidad Académica:</strong></td>
                                        <td><strong style="margin-left: 25px">{{$carrera->facultad}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="align-top"><strong>Extensión:</strong></td>
                                        <td><strong style="margin-left: 25px">{{$carrera->extension}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="align-top"><strong>Carrera:</strong></td>
                                        <td><strong style="margin-left: 25px">{{$carrera->carrera}}</strong></td>
                                    </tr>
                                    @if($carrera->error)
                                        <tr>
                                            <td class="align-top"><strong>Observaciones:</strong></td>
                                            <td><ul>{!! $carrera->msj !!}</ul></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            @if(!$carrera->error)
                            <form action="{{ url('estudiante/reinscripcion/paso3') }}" method="get">
                                @csrf
                                <input hidden value="{{$carrera->idFacultad}}" id="idFacultad" name="idFacultad"/>
                                <input hidden value="{{$carrera->facultad}}" id="facultad" name="facultad"/>
                                <input hidden value="{{$carrera->idExtension}}" id="idExtension" name="idExtension"/>
                                <input hidden value="{{$carrera->extension}}" id="extension" name="extension"/>
                                <input hidden value="{{$carrera->idCarrera}}" id="idCarrera" name="idCarrera"/>
                                <input hidden value="{{$carrera->carrera}}" id="carrera" name="carrera"/>
                                <input hidden value="{{$carrera->categorias}}" id="categorias" name="categorias"/>
                                <input type="submit" value="Siguiente paso" class="btn btn-primary" />
                            </form>
                            @else
                                @if($carrera->situacionAcademica == "2")
                                        Pendiente de Examenes Generales<br/><a class="btn btn-primary" href="https://registro.usac.edu.gt/inscripcion_peg/">Inscripción</a>
                                @endif
                            @endif
                            </div>
                    </div>
                </div>

            @endforeach
        </div>
    @else
        <div class="card mb-3">
            <div class="card-header">
                <h3> <i class="fa fa-info-circle"></i> Observación </h3>   
            </div>
            <div class="card-body">
                <div class="alert alert-warning" role="alert" style="font-size: 1.5em;">
                Para continuar con su inscripción, debe presentarse en el Departamento de Registro y Estadística y entregar un Certificado de Nacimiento reciente, con una antigüedad no superior a 3 meses, emitido por el RENAP.
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
