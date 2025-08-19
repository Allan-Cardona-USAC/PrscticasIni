@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Extensión - {{ $extension->nombre }} de {{ $extension->unidad_academica->nomfac }} </div>
        <div class="card-body">

            <a href="{{ url('/extension') }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th> Código Extension </th>
                        <td>{{ $extension->codigo_extension }}</td>
                    </tr>
                    <tr>
                        <th> Nombre </th>
                        <td> {{ $extension->nombre }} </td>
                    </tr>
                    <tr>
                        <th> Unidad Académica </th>
                        <td> {{ $extension->unidad_academica->codfac . ' - ' . $extension->unidad_academica->nomfac }} </td>
                    </tr>
                    <tr>
                        <th> Lugar de Estudios </th>
                        <td> {{ $extension->lugarExtension()}}  </td>
                    </tr>
                    <tr>
                        <th> Fecha Creación </th>
                        <td> {{ $extension->fecha_creacion }}  </td>
                    </tr>
                    <tr>
                        <th> Fecha Última Actualización </th>
                        <td> {{ $extension->fecha_u }}  </td>
                    </tr>
                    <tr>
                        <th> Estado Extensión </th>
                        <td>
                            @if($extension->activa === 1)
                                <span class="badge badge-success">Activa</span>
                            @else
                                <span class="badge badge-danger">Desactivada</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if(in_array(18,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
            <div align="center" class="py-2">
                <a href="{{ url('/extension/ext/' . $extension->codigo_extension . '/ua/' . $extension->codigo_unidad_academica  . '/edit') }}" title="Edit extension"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                @if($extension->activa === 1)
                    <a href="{{ route('extension.darDeBajaExtension',[$extension->codigo_extension, $extension->codigo_unidad_academica] ) }}" title="Dar de baja extensión"><button class="btn btn-danger btn-sm col-md-3"><i class="fa fa-times-circle-o" aria-hidden="true"></i>Dar de baja</button></a>
                @else
                    <a href="{{ route('extension.activarExtension',[$extension->codigo_extension, $extension->codigo_unidad_academica] ) }}" title="Activar extensión"><button class="btn btn-success btn-sm col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i>Activar</button></a>
                @endif
            </div>
            @endif
        </div>
    </div>
@endsection
