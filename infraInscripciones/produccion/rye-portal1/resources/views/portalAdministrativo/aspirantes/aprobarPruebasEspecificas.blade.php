@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Pruebas Específicas</div>
        <div class="card-body">
            <form method="POST" action="{{ route('administrativo.aprobarPETodas') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div align="right" class="py-2">
                    <button type="submit" class="btn btn-primary btn-sm col-md-3">Aprobar todas las pruebas</button>
                </div>
            </form>
            <br/>
            <form method="GET" action="{{ route('administrativo.aprobarPruebasEspecificas') }}" accept-charset="UTF-8" role="search">
                <div class="row">
                    <div  class="form-inline" >
                        <div class="input-group">
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
                    <div  class="form-inline ml-auto" >
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
                </div>
            </form>
            <br>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>NOV</th>
                        <th>Unidad Académica</th>
                        <th>Extensión</th>
                        <th>Carrera</th>
                        <th>Resultado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pruebas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style ="width: 170px">{{ $item->nov }}</td>
                            <td style ="width: 170px">{{ isset($item->unidad_academica) ? $item->unidad_academica->nomfac : '' }}</td>
                            <td style ="width: 170px">{{ isset($item->extension) ? $item->extension->nombre : '' }}</td>

                           <td style ="width: 170px">{{ isset($item->carrera) ? $item->carrera->nombre_carrera : '' }}</td>
                            <td>{{ isset($item->resultado) ? $item->resultado : '' }}</td>
                            <td style ="width: 500px">
                                <form method="POST" action="{{ route('administrativo.aprobarPEIndividual') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input class="form-control" name="nov" type="hidden" id="nov" value="{{ $item->nov }}" required>
                                    <input class="form-control" name="ua" type="hidden" id="ua" value="{{ $item->unidad_academica->codfac }}" required>
                                    <input class="form-control" name="ext" type="hidden" id="ext" value="{{ $item->extension->codigo_extension }}" required>

                                {{--  Validacion que tenga UA  --}}
                                    @if($item->carrera != null)
                                        <input class="form-control" name="car" type="hidden" id="car" value="{{ $item->carrera->codigo_carrera }}" required>
                                        @else

                                        @endif

                                {{--  VAlidacion de la UA14  --}}
                                    @if($unidad->codfac == 14)
                                            <input class="form-control" name="car" type="hidden" id="car" value="No tiene carrera definida" required>
                                        @else

                                        @endif
                                {{--  FIN validacion de la UA 14 --}}
                                        <button type="submit" class="btn btn-success btn-sm col-md-6">Aprobar</button>
                                </form>
                                <form method="POST" action="{{ route('administrativo.rechazarPEIndividual') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input class="form-control" name="nov" type="hidden" id="nov" value="{{ $item->nov }}" required>
                                    <input class="form-control" name="ua" type="hidden" id="ua" value="{{ $item->unidad_academica->codfac }}" required>
                                    <input class="form-control" name="ext" type="hidden" id="ext" value="{{ $item->extension->codigo_extension }}" required>

                                    {{--  Validacion que tenga UA  --}}
                                        @if($item->carrera != null)
                                            <input class="form-control" name="car" type="hidden" id="car" value="{{ $item->carrera->codigo_carrera }}" required>
                                            @else

                                            @endif

                                  {{--  Validacion UA14--}}
                                   @if($unidad->codfac == 14)
                                        <input class="form-control" name="car" type="hidden" id="car" value="No tiene carrera definida" required>
                                        @else

                                    @endif
                                   {{--  FIN VALIDACION UA14 --}}
                                    <button type="submit" class="btn btn-danger btn-sm col-md-6 ">Rechazar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $pruebas->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->appends(['cod_ua' => Request::get('cod_ua')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
