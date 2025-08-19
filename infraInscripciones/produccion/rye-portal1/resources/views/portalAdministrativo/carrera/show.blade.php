@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Carrera - {{ $carrera->nombre_carrera }} </div>
        <div class="card-body">

            <a href="{{ url('/carrera') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

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
                    <tr>
                        <th> Estado </th>
                        <td>
                            @if($carrera->estado === 1)
                                <span class="badge badge-success">Activa</span>
                            @else
                                <span class="badge badge-danger">Desactivada</span>
                            @endif
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            @if(in_array(20,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
            <div align="center" class="py-2">
                <a href="{{ url('/carrera/' . $carrera->codigo_carrera . '/ext/' . $carrera->codigo_extension . '/ua/' . $carrera->codigo_unidad_academica . '/edit') }}" title="Edit carrera"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                    @if($carrera->estado === 1)
                        <a href="{{ route('carrera.darDeBajaCarrera',[$carrera->codigo_carrera,$carrera->codigo_extension, $carrera->codigo_unidad_academica] ) }}" title="Dar de baja carrera"><button class="btn btn-danger btn-sm col-md-3"><i class="fa fa-times-circle-o" aria-hidden="true"></i>Dar de baja</button></a>
                    @else
                        <a href="{{ route('carrera.activarCarrera',[$carrera->codigo_carrera,$carrera->codigo_extension, $carrera->codigo_unidad_academica] ) }}" title="Activar carrera"><button class="btn btn-success btn-sm col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i>Activar</button></a>
                    @endif
            </div>
            @endif

        </div>
    </div>
@endsection
