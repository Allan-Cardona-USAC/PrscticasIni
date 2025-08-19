@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/administrativo/listadoExonerados') }}" accept-charset="UTF-8" role="search">

                            <div class="row justify-content-center">
                                <div class="input-group col-sm-5">
                                    <select class="form-control form-control-sm" name="tipo_exo" id="tipo_exo">

                                        <option value=1> Pruebas de conocimiento básicas </option>
                                        <option value=2> Pruebas especificas </option>

                                    </select>
                                    <span class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <br>

                            <div  class="row form-inline my-2 my-lg-0 float-right pr-md-3 pr-sm-1">
                                <div class="input-group">
                                    <input type="number" min="1" max="50" class="form-control form-control-sm" name="page_size" placeholder="#"  value="{{ isset($perPage) ? $perPage : '' }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" type="submit">
                                            <i class="fa fa-hashtag"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group ml-2">
                                    <input type="number" class="form-control form-control-sm" name="nov" placeholder="N.O.V."  value="{{ '' }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group ml-2">
                                    <input type="text" class="form-control form-control-sm" name="nombres" placeholder="Nombres" value="{{  ''}}">
                                    <input type="text" class="form-control form-control-sm" name="apellidos" placeholder="Apellidos" value="{{   ''}}">
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
                                    <th>#</th><th>NOV</th><th>Nombre</th><th>Apellido</th><th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($aspirante))
                                    @foreach($aspirante as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nov }}</td>
                                            <td>{{ $item->nombre1 . ' ' . $item->nombre2 }}</td>
                                            <td> {{ $item->apellido1 . ' ' . $item->apellido2 }}</td>
                                            <td style ="width: 350px">
                                                <a href="{{ url('/administrativo/aspirantes/' . $item->nov) }}" title="Ver Aspirante"><button class="btn btn-info btn-sm col-md-3"><i class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if(isset($name) || isset($surname))
                                <div class="pagination-wrapper"> {!! $aspirante->appends(['nombres' => Request::get('nombres')])->appends(['apellidos' => Request::get('apellidos')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
                            @elseif(isset($nov))
                                <div class="pagination-wrapper"> {!! $aspirante->appends(['nov' => Request::get('nov')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection