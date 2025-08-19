@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Solicitud de Carrera</div>
        <div class="card-body">
            <form method="GET" action="{{ url('/carreraSolicitud') }}" accept-charset="UTF-8" role="search">
                <div class="row justify-content-center">
                    <div class="input-group col-sm-5">
                        <select class="form-control form-control-sm" onchange="resetExtension()" name="cod_ua" id="cod_ua">
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
                <div class="row justify-content-center">
                    <div class="input-group col-sm-5">
                        <select class="form-control form-control-sm" name="cod_ext" id="cod_ext">
                            <option value=-1> Todas las extensiones </option>
                            @if($extensiones != null)
                                @if(isset($cod_ext))
                                    @foreach($extensiones as $extension )
                                        @if($extension->codigo_extension == $cod_ext)
                                            <option value="{{ $extension->codigo_extension }}" selected>{{ $extension->nombre }}</option>
                                        @else
                                            <option value="{{ $extension->codigo_extension }}">{{ $extension->nombre }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($extensiones as $extension )
                                        <option value="{{ $extension->codigo_extension }}">{{ $extension->nombre }}</option>
                                    @endforeach
                                @endif

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
                <div class="row justify-content-center">
                    <div class="input-group col-sm-5">
                        <select class="form-control form-control-sm" name="cod_niv" id="cod_niv">
                            <option value=-1> Todos los niveles académicos </option>
                            @if($niveles != null)
                                @if(isset($cod_niv))
                                    @foreach($niveles as $nivel )
                                        @if($nivel->codigo_nivel_academico == $cod_niv)
                                            <option value="{{ $nivel->codigo_nivel_academico }}" selected>{{ $nivel->nombre }}</option>
                                        @else
                                            <option value="{{ $nivel->codigo_nivel_academico }}">{{ $nivel->nombre }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($niveles as $nivel )
                                        <option value="{{ $nivel->codigo_nivel_academico }}">{{ $nivel->nombre }}</option>
                                    @endforeach
                                @endif
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
                <a href="{{ url('/carreraSolicitud/create') }}" class="btn btn-success btn-sm col-md-3" title="Add New extension">
                    <i class="fa fa-plus" aria-hidden="true"></i> Nueva Solicitud
                </a>
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
                        <th>#</th><th>Unidad Academica</th><th>Extensión</th><th>Código</th><th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carrera as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->unidad_academica->nomfac }}</td>
                            <td>{{ $item->extension->nombre }}</td>
                            <td style ="width: 175px">
                                {{ $item->nombre_carrera }}
                                @if($item->estado === 0)
                                    <span class="badge badge-danger">Desactivada</span>
                                @endif
                            </td>
                            <td class="form-inline" style ="width: 350px">
                                <a href="{{ url('/carreraSolicitud/' . $item->codigo_carrera . '/ext/' . $item->codigo_extension . '/ua/' . $item->codigo_unidad_academica ) }}" title="View carrera"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                <form class="aprobar" method="POST" action="{{ route('carreraSolicitud.aprobarSolicitudCarrera') }}" accept-charset="UTF-8" class="form-inline" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input class="form-control" name="ua" type="hidden" id="ua" value="{{ $item->unidad_academica->codfac }}" required>
                                    <input class="form-control" name="ext" type="hidden" id="ext" value="{{ $item->extension->codigo_extension }}" required>
                                    <input class="form-control" name="car" type="hidden" id="car" value="{{ $item->codigo_carrera }}" required>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i>Aprobar</button>
                                </form>
                                <form class="rechazar" method="POST" action="{{ route('carreraSolicitud.rechazarSolicitudCarrera') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input class="form-control" name="ua" type="hidden" id="ua" value="{{ $item->unidad_academica->codfac }}" required>
                                    <input class="form-control" name="ext" type="hidden" id="ext" value="{{ $item->extension->codigo_extension }}" required>
                                    <input class="form-control" name="car" type="hidden" id="car" value="{{ $item->codigo_carrera }}" required>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times-circle-o" aria-hidden="true" ></i>Rechazar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $carrera->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->appends(['cod_ua' => Request::get('cod_ua')])->appends(['cod_ext' => Request::get('cod_ext')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $("#cod_ua").change(function(){
            $.ajax({
                url: "{{ route('extension.get_by_ua') }}?codigo_unidad_academica=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#cod_ext').html(data.html);
                }
            });
        });
    </script>
    <script>
        $(".aprobar").on("submit", function(){
            return confirm("¿Estas seguro que deseas aprobar esta carrera?");
        });
    </script>
    <script>
        $(".rechazar").on("submit", function(){
            return confirm("¿Estas seguro que deseas rechazar esta carrera?");
        });
    </script>
@endsection
