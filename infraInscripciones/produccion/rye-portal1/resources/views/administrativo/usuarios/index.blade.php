@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Usuarios</div>
        <div class="card-body">
            <form method="GET" action="{{ route('administrativo.usuarios') }}" accept-charset="UTF-8" role="search">
                <div class="row form-inline my-2 my-lg-0 float-right pr-md-3 pr-sm-1">
                    <div class="input-group">
                        <input type="number" min="1" max="50" class="form-control form-control-sm" name="page_size"
                               placeholder="#" value="{{ isset($perPage) ? $perPage : '' }}">
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">
                                <i class="fa fa-hashtag"></i>
                            </button>
                        </span>
                    </div>
                    <div class="input-group ml-2">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..."
                               value="{{  isset($keyword) ? $keyword : ''}}">
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Dependencia</th>
                        <th>Login</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->dependencia }}</td>
                            <td>{{ $item->login }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td style="width: 320px">
                                <a href="{{ route('administrativo.usuarios.show',[$item->dependencia,$item->login]) }}"
                                   title="Ver Usuario">
                                    <button class="btn btn-info btn-sm col-md-3"><i class="fa fa-eye"
                                                                                    aria-hidden="true"></i>Ver
                                    </button>
                                </a>
                                <a href="{{ route('administrativo.usuarios.editarPermisos',[$item->dependencia,$item->login]) }}"
                                   title="Editar Usuario">
                                    <button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o"
                                                                                       aria-hidden="true"></i>Editar
                                    </button>
                                </a>
                                @if($item->fecha_desactivacion > \Carbon\Carbon::now() || $item->fecha_desactivacion === '0000-00-00')
                                    <a href="{{ route('administrativo.usuarios.usuarioDesactivado',[$item->dependencia,$item->login] ) }}"
                                       title="Desactivar Usuario">
                                        <button class="btn btn-danger btn-sm col-md-5"
                                                onclick="return confirm('¿Desea desactivar el usuario {{ $item->nombre }}?')">
                                            <i class="fa fa-user-times" aria-hidden="true"></i> Desactivar
                                        </button>
                                    </a>
                                @else
                                    <span class="badge badge-danger">usuario desactivado</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $usuarios->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection