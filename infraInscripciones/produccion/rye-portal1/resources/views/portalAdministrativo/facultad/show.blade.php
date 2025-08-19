@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Unidad Académica - {{ $facultad->nomfac }}</div>
        <div class="card-body">

            <a href="{{ url('/facultad') }}" title="Back">
                <button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Regresar
                </button>
            </a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Código Unidad Académica</th>
                        <td>{{ $facultad->codfac }}</td>
                    </tr>
                    <tr>
                        <th> Tipo Unidad Académica</th>
                        <td> {{ $facultad->tipo_unidad_academica->descripcion }} </td>
                    </tr>
                    <tr>
                        <th> Nombre</th>
                        <td> {{ $facultad->nomfac }} </td>
                    </tr>
                    <tr>
                        <th> Nombre corto</th>
                        <td> {{ $facultad->nomcorto }} </td>
                    </tr>
                    <tr>
                        <th> Rango carnet</th>
                        <td> {{ $facultad->rangoCarnet }} </td>
                    </tr>
                    <tr>
                        <th> Correo</th>
                        <td> {{ $facultad->correo }} </td>
                    </tr>
                    <tr>
                        <th> Departamento</th>
                        <td> {{ $facultad->departamento->nombre }} </td>
                    </tr>
                    <tr>
                        <th> Estado Unidad Académica</th>
                        <td>
                            @if($facultad->activa === 1)
                                <span class="badge badge-success">Activa</span>
                            @else
                                <span class="badge badge-danger">Desactivada</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if(in_array(16,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
            <div align="center" class="py-2">
                <a href="{{ url('/facultad/' . $facultad->codfac . '/edit') }}" title="Editar Unidad Académica">
                    <button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o"
                                                                       aria-hidden="true"></i> Editar
                    </button>
                </a>
                    @if($facultad->activa === 1)
                        <a href="{{ route('facultad.darDeBajaUnidadAcademica',$facultad->codfac ) }}"
                           title="Dar de baja Unidad Académica">
                            <button class="btn btn-danger btn-sm col-md-3"><i class="fa fa-times-circle-o" aria-hidden="true"></i>Dar
                                de baja
                            </button>
                        </a>
                    @else
                        <a href="{{ route('facultad.activarUnidadAcademica',$facultad->codfac ) }}"
                           title="Activar Unidad Académica">
                            <button class="btn btn-success btn-sm col-md-3"><i class="fa fa-check-circle"
                                                                               aria-hidden="true"></i>Activar
                            </button>
                        </a>
                    @endif
            </div>
            @endif
        </div>
    </div>
@endsection
