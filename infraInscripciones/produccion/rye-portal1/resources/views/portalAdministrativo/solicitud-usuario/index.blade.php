@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Solicitudes de Usuario</div>
        <div class="card-body">

            <form method="GET" action="{{ url('/solicitud-usuario') }}" accept-charset="UTF-8" role="search">
                <div class="row justify-content-center">
                    <div class="input-group col-sm-3">
                        <select  name="tipo" class="form-control form-control-sm " id="tipo">
                            <option @if($tipo =='T') selected @endif value="T">Todos</option>
                            <option @if($tipo =='I') selected @endif value="I">Interno</option>
                            <option @if($tipo =='E') selected @endif value="E">Externo</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">Seleccionar</button>
                        </div>
                    </div>
                </div>
                <br/>
                <a href="{{ url('/solicitud-usuario/create') }}" class="btn btn-success btn-sm col-md-3" title="Add New solicitudUsuario">
                    <i class="fa fa-plus" aria-hidden="true"></i> Crear Nueva
                </a>
                <div class="row form-inline my-2 my-lg-0 float-right pr-md-3 pr-sm-1">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{  isset($keyword) ? $keyword : ''}}">
                        <span class="input-group-append">
                                    <button class="btn btn-sm btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                    </div>
                    <div class="input-group ml-2">
                        <input type="number" min="1" max="50" class="form-control form-control-sm" name="page_size" placeholder="#"  value="{{ isset($perPage) ? $perPage : '' }}">
                        <span class="input-group-append">
                                    <button class="btn btn-sm btn-secondary" type="submit">
                                        <i class="fa fa-hashtag"></i>
                                    </button>
                                </span>
                    </div>
                </div>
            </form>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th><th>Tipo</th><th>CUI</th><th>Nombre</th><th>Apellidos</th><th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($solicitudusuario as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if($item->tipo === 'I')
                                <td>Interno</td>
                            @else
                                <td>Externo</td>
                            @endif
                            <td>{{ $item->CUI }}</td><td>{{ $item->nombre }}</td><td>{{ $item->apellidos }}</td>
                            <td>
                                <a href="{{ url('/solicitud-usuario/' . $item->idsolicitud) }}" title="View solicitudUsuario"><button class="btn btn-info btn-sm col-md-8 col-sm-8"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                {{-- <a href="{{ url('/solicitud-usuario/' . $item->idsolicitud . '/edit') }}" title="Edit solicitudUsuario"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                 <form method="POST" action="{{ url('/solicitud-usuario' . '/' . $item->idsolicitud) }}" accept-charset="UTF-8" style="display:inline">
                                     {{ method_field('DELETE') }}
                                     {{ csrf_field() }}
                                     <button type="submit" class="btn btn-danger btn-sm col-md-3" title="Delete solicitudUsuario" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                 </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $solicitudusuario->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
