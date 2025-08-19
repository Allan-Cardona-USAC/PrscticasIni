@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Unidad Académica</div>
        <div class="card-body">
            <form method="GET" action="{{ url('/facultad') }}" accept-charset="UTF-8" role="search">
                @if(in_array(16,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                <a href="{{ url('/facultad/create') }}" class="btn btn-success btn-sm col-md-3"
                   title="Add New facultad">
                    <i class="fa fa-plus" aria-hidden="true"></i> Crear Nueva
                </a>
                @endif
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
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Rango Carnet</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($facultad as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->codfac }}</td>
                            <td>{{ $item->nomfac }}
                                @if($item->activa === 0)
                                    <span class="badge badge-danger">Desactivada</span>
                                @endif
                            </td>
                            <td>{{ $item->rangoCarnet }}</td>
                            <td style="width: 350px;">
                                @if(in_array(15,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                    <a href="{{ url('/facultad/' . $item->codfac) }}" title="Ver Unidad Académica">
                                        <button class="btn btn-info btn-sm col-md-3">
                                            <i class="fa fa-eye" aria-hidden="true"></i>Ver
                                        </button>
                                    </a>
                                @endif
                                @if(in_array(16,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                    <a href="{{ url('/facultad/' . $item->codfac . '/edit') }}"
                                       title="Editar Unidad Académica">
                                        <button class="btn btn-primary btn-sm col-md-3 ">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar
                                        </button>
                                    </a>
                                    @if($item->activa === 1)
                                        <a href="{{ route('facultad.darDeBajaUnidadAcademica',$item->codfac ) }}"
                                           title="Dar de baja Unidad Académica">
                                            <button class="btn btn-danger btn-sm col-md-5">
                                                <i class="fa fa-times-circle-o" aria-hidden="true"></i> Dar de baja
                                            </button>
                                        </a>
                                    @else
                                        <a href="{{ route('facultad.activarUnidadAcademica',$item->codfac ) }}"
                                           title="Activar Unidad Académica">
                                            <button class="btn btn-success btn-sm col-md-5">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>Activar
                                            </button>
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $facultad->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
