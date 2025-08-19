@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Usuario - {{ $usuarios->nombre }} </div>
        <div class="card-body">

            <a href="{{route('administrativo.usuarios') }}" title="Back">
                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
                </button>
            </a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Última Sesión</th>
                        <td>{{isset($usuarios->ultima_sesion) ? Carbon\Carbon::parse($usuarios->ultima_sesion)->format('d/m/Y, H:i:s') : 'No posee'}}</td>
                    </tr>
                    <tr>
                        <th>Dependencia</th>
                        <td>{{ $usuarios->dependencia }} - {{ $usuarios->getDependenciaNombre() }}</td>
                    </tr>
                    <tr>
                        <th> Nombre</th>
                        <td> {{ $usuarios->nombre }} </td>
                    </tr>
                    <tr>
                        <th> Nombre Corto</th>
                        <td> {{ $usuarios->nom_corto }} </td>
                    </tr>
                    <tr>
                        <th> Fecha Desactivación</th>
                        <td>
                            @if($usuarios->fecha_desactivacion === '0000-00-00')
                                00/00/0000
                            @else
                                {{\Carbon\Carbon::parse($usuarios->fecha_desactivacion)->format('d/m/Y')}}
                            @endif
                            <br>
                            @if($usuarios->fecha_desactivacion > \Carbon\Carbon::now() || $usuarios->fecha_desactivacion === '0000-00-00')
                                <span class="badge badge-success">usuario activo</span>
                            @else
                                <span class="badge badge-danger">usuario desactivado</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th> Correos</th>
                        <td>
                            @foreach(explode(',', $usuarios->mail) as $correo)
                                {{ $correo }}
                                @if(!$loop->last)
                                    <br/>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th> Puesto</th>
                        <td> {{ $usuarios->puesto }} </td>
                    </tr>
                    <tr>
                        <th> Rol</th>
                        <td> {{ isset($usuarios->getRol()->rolAplicaciones->Nombre ) ? $usuarios->getRol()->rolAplicaciones->Nombre : 'Sin Rol'}} </td>
                    </tr>
                    <tr>
                        <th> Permisos</th>
                        <td>
                            @if($usuarios->getPermisosUsuario() != null)
                                @foreach($usuarios->getPermisosUsuario() as $permiso)
                                    <b>-</b>{{$permiso->permiso->nombre_permiso}}
                                    @if(!$loop->last)
                                        <br/>
                                    @endif
                                @endforeach
                            @else
                                <b class="text-danger">El usuario no tiene permisos</b>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div align="center" class="py-2">
                <a href="{{ route('administrativo.usuarios.editarPermisos',[$usuarios->dependencia,$usuarios->login]) }}"
                   title="Editar Usuario">
                    <button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o"
                                                                       aria-hidden="true"></i> Editar
                    </button>
                </a>
                @if($usuarios->fecha_desactivacion > \Carbon\Carbon::now() || $usuarios->fecha_desactivacion === '0000-00-00')
                    <a href="{{ route('administrativo.usuarios.usuarioDesactivado',[$usuarios->dependencia,$usuarios->login] ) }}"
                       title="Desactivar Usuario">
                        <button class="btn btn-danger btn-sm col-md-3"
                                onclick="return confirm('¿Desea desactivar el usuario {{ $usuarios->nombre }}?')"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i>Desactivar
                        </button>
                    </a>
                @endif
            </div>

        </div>
    </div>
@endsection
