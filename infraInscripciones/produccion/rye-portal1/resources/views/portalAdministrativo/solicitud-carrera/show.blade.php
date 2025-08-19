@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Solicitud Carrera - {{ $carrera->nombre_carrera }} </div>
        <div class="card-body">

            <a href="{{ url('/carreraSolicitud') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Código Carrera</th>
                        <td>{{ $carrera->codigo_carrera }}</td>
                    </tr>
                    <tr>
                        <th> Nombre </th>
                        <td> {{ $carrera->nombre_carrera }} </td>
                    </tr>
                    <tr>
                        <th> Título Masculino </th>
                        <td> {{ $carrera->titulo_masculino }} </td>
                    </tr>
                    <tr>
                        <th> Título Femenino </th>
                        <td> {{ $carrera->titulo_femenino }} </td>
                    </tr>

                    <tr>
                        <th> Unidad Académica </th>
                        <td> {{ $carrera->unidad_academica->codfac . ' - ' .  $carrera->unidad_academica->nomfac }} </td>
                    </tr>
                    <tr>
                        <th> Extensión </th>
                        <td> {{ $carrera->extension->codigo_extension . ' - ' .$carrera->extension->nombre }}</td>
                    </tr>
                    <tr>
                        <th> Régimen </th>
                        <td> {{ $carrera->regimen }} </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a class="btn btn-sm btn-success col-md-2" data-toggle="collapse" href="#collapseCopiaDPI" role="button" aria-expanded="false" aria-controls="Copia DPI">Copia DPI</a>
            </div>
            <div class="collapse multi-collapse" id="collapseCopiaDPI">
                <div class="card card-body embed-responsive embed-responsive-16by9">
                    <embed src="{{ asset('storage/' . $carrera->copia_acta)}}" >
                </div>
            </div>
            <div align="center" class="py-2">
                 <form class="aprobar" style="display: inline;" method="POST" action="{{ route('carreraSolicitud.aprobarSolicitudCarrera') }}" accept-charset="UTF-8"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control" name="ua" type="hidden" id="ua" value="{{ $carrera->unidad_academica->codfac }}" required>
                    <input class="form-control" name="ext" type="hidden" id="ext" value="{{ $carrera->extension->codigo_extension }}" required>
                    <input class="form-control" name="car" type="hidden" id="car" value="{{ $carrera->codigo_carrera }}" required>
                    <button type="submit" class="btn btn-success btn-sm col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i>Aprobar</button>
                </form>
                <form class="rechazar" style="display: inline;" method="POST" action="{{ route('carreraSolicitud.rechazarSolicitudCarrera') }}" accept-charset="UTF-8"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control" name="ua" type="hidden" id="ua" value="{{ $carrera->unidad_academica->codfac }}" required>
                    <input class="form-control" name="ext" type="hidden" id="ext" value="{{ $carrera->extension->codigo_extension }}" required>
                    <input class="form-control" name="car" type="hidden" id="car" value="{{ $carrera->codigo_carrera }}" required>
                    <button type="submit" class="btn btn-danger btn-sm col-md-3"><i class="fa fa-times-circle-o" aria-hidden="true" ></i>Rechazar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
    $(".aprobar").on("submit", function(){
    return confirm("¿Estas seguro que deseas aprobar esta carrera?");
    });
    </script>
    <script>
        $(".rechazar").on("submit", function(){
            return confirm("¿Estas seguro que deseas rechazar esta carrera?");
        });
    </script>
@endsection

