@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Auditoría Usuarios</h2>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('administrativo.auditoria.index') }}" accept-charset="UTF-8" autocomplete="off"
                  role="search">
                <div class="row justify-content-center">
                    <div class="input-group col-sm-5">
                        <select class="form-control form-control-sm" name="categoria" id="categoria">
                            <option value=-1> Todas las acciones </option>
                            @if(isset($idCategoria))
                                @foreach($categorias as $categoria)
                                    @if($categoria->idCategoria == $idCategoria)
                                        <option value="{{ $categoria->idCategoria  }}" selected>{{ $categoria->nombre_categoria }}</option>
                                    @else
                                        <option value="{{ $categoria->idCategoria  }}">{{ $categoria->nombre_categoria }}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach($categorias as $categoria )
                                    <option value="{{ $categoria->idCategoria  }}">{{ $categoria->nombre_categoria }}</option>
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
                <br>
                <div class="row form-inline my-2 my-lg-0 float-right pr-md-3 pr-sm-1">
                    <div class="input-group text-left">
                        <input type="number" min="1" max="50" class="form-control form-control-sm" name="page_size"
                               placeholder="#" value="{{ isset($perPage) ? $perPage : '' }}">
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">
                                <i class="fa fa-hashtag"></i>
                            </button>
                        </span>
                    </div>
                    <div class="input-group ml-2">
                        <input type="number" class="form-control form-control-sm" name="id" placeholder="ID" value="{{ isset($id) ? $id : '' }}">
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <div class="input-group ml-2">
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Nombre" value="{{ isset($name) ? $name : '' }}">
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <div class="input-group ml-2">
                        <input type="date" class="form-control form-control-sm" name="fecha" placeholder="Fecha" value="{{ isset($fecha) ? $fecha : '' }}">
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <br>
            </form>
            <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Dependencia</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Dirección IP</th>
                        <th scope="col">Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($acciones as $accion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- <td>{{ $accion->usuario_login}}</td> -->
                            <td><a href="{{ route('administrativo.usuarios.show',[$accion->usuario_dependencia,$accion->usuario_login]) }}"
                                   title="Ver Usuario">
                                   {{ $accion->usuario_login }}
                                </a>
                            </td>
                            <td>{{ $accion->usuario_dependencia}}</td>
                            <td>{{ $accion->categoria->nombre_categoria}}</td>
                            <td>{{ $accion->descripcion }}</td>
                            <td>{{ $accion->usuario_ip}}</td>
                            <td>{{ Carbon\Carbon::parse($accion->fecha_accion)->format('d/m/Y, H:i:s') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $acciones->appends(['page_size' => Request::get('page_size')])->appends(['categoria' => Request::get('categoria')])->appends(['id' => Request::get('id')])->appends(['name' => Request::get('name')])->appends(['fecha' => Request::get('fecha')])->render() !!} </div>
            </div>
    </div>
@endsection