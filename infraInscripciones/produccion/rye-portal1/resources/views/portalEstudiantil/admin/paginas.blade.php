@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-align-justify"></i> Páginas
                <a
                    href="{{ url('/paginaCMS/create') }}"
                    role="button"
                    class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                    ><i class="fas fa-plus"></i>&nbsp; Nueva Página</a
                >
                </div>
                <div class="card-block">
                <form method="GET" action="{{ url('/paginaCMS') }}" accept-charset="UTF-8" role="search">
                    <div class="row justify-content-md-between">
                    <div class="col col-lg-7 col-xl-5 form-group">
                        <div class="input-group">
                        <input type="text" placeholder="Search" name="search" class="form-control" value="{{ request('search') }}"/>
                        <span class="btn-group input-group-btn"
                            ><button type="button" class="btn btn-primary">
                            <i class="fas fa-search"></i>&nbsp; Buscar
                            </button></span
                        >
                        </div>
                    </div>
                    <div class="col-sm-auto form-group ">
                        <select class="custom-select"
                        ><option value="10">10</option>
                        <option value="25">25</option>
                        <option value="100">100</option></select
                        >
                    </div>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ruta</th>
                        <th>Activo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginaCMS as $pagina)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pagina->idPagina }}</td>
                            <td>{{ $pagina->nombre }}</td>
                            <td>{{ $pagina->ruta }}</td>
                            <td>
                                <form method="POST" action="{{ route('cms.pagina.toggle') }}" name="formToggle">
                                    <input type="hidden" name="id" id="id" value="{{ $pagina->idPagina }}">
                                    <div class="custom-control custom-switch">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            name="customSwitch"
                                            @if($pagina->estado == 1)
                                            checked
                                            @endif
                                        />
                                        <label class="custom-control-label" for="customSwitch1">
                                            @if($pagina->estado == 1)
                                                Activado
                                            @else
                                                Desactivado
                                            @endif
                                        </label>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <a
                                            href="{{ url('/paginaCMS/' . $pagina->idPagina . '/edit') }}"
                                            title="Edit"
                                            role="button"
                                            class="btn btn-sm btn-spinner btn-info"
                                        ><i class="fas fa-edit"></i
                                            ></a>
                                    </div>
                                    <form method="POST" action="{{ url('/paginaCMS' . '/' . $pagina->idPagina) }}" accept-charset="UTF-8" style="display:inline" class="col">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button
                                            type="submit"
                                            title="Delete"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Confirm delete?')"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $paginaCMS->appends(['search' => Request::get('search')])->render() !!} </div>

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('[name="formToggle"]').on("change", "input:checkbox", function(){
                $('[name="formToggle"]').submit();
            });
        });
    </script>
@endsection
