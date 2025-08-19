@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Extension</div>
        <div class="card-body">


            <form method="GET" action="{{ url('/extension') }}" accept-charset="UTF-8" role="search">
                <div class="row justify-content-center">
                    <div class="input-group col-sm-5">
                        <select class="form-control form-control-sm" name="cod_ua" id="cod_ua">

                            <option value=-1> Todas las unidades académicas </option>
                            @if(isset($cod_ua))
                                @foreach($unidades as $unidad )
                                    @if($unidad->codfac == $cod_ua)
                                        <option value="{{ $unidad->codfac }}" selected>{{ $unidad->nomfac }}</option>
                                    @else
                                        <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                                    @endif
                                @endforeach
                            @else

                                @foreach($unidades as $unidad )
                                    <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                                @endforeach
                            @endif

                        </select>
                        <span class="input-group-append">
                                            <button class="btn btn-sm btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                    </div>
                </div>
                <br/>
                @if(in_array(18,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                    <a href="{{ url('/extension/create') }}" class="btn btn-success btn-sm col-md-3" title="Add New extension">
                        <i class="fa fa-plus" aria-hidden="true"></i> Crear Nueva
                    </a>
                @endif
                <div  class="form-inline my-2 my-lg-0 float-right" >
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
                        <th>#</th><th>Unidad Académica</th><th>Código</th><th>Nombre</th><th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($extension as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style ="width: 230px">{{ $item->unidad_academica->nomfac }}</td>
                            <td>{{ $item->codigo_extension }}</td>
                            <td style ="width: 210px">
                                {{ $item->nombre }}
                                @if($item->activa === 0)
                                    <span class="badge badge-danger">Desactivada</span>
                                @endif
                            </td>
                            <td>
                                @if(in_array(17,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                    <a href="{{ url('/extension/ext/' . $item->codigo_extension . '/ua/' . $item->codigo_unidad_academica ) }}" title="View extension"><button class="btn btn-info btn-sm col-md-3"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                @endif
                                @if(in_array(18,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                    <a href="{{ url('/extension/ext/' . $item->codigo_extension . '/ua/' . $item->codigo_unidad_academica  . '/edit') }}" title="Edit extension"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                    @if($item->activa === 1)
                                        <a href="{{ route('extension.darDeBajaExtension',[$item->codigo_extension, $item->codigo_unidad_academica] ) }}" title="Dar de baja extensión"><button class="btn btn-danger btn-sm col-md-5"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Dar de baja</button></a>
                                    @else
                                        <a href="{{ route('extension.activarExtension',[$item->codigo_extension, $item->codigo_unidad_academica] ) }}" title="Activar extensión"><button class="btn btn-success btn-sm col-md-5"><i class="fa fa-check-circle" aria-hidden="true"></i>Activar</button></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $extension->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->appends(['cod_ua' => Request::get('cod_ua')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
