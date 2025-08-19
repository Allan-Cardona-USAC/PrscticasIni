@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Inscritos</div>
        <div class="card-body">
            <form method="GET" action="{{ url('/administrativo/inscritos') }}" accept-charset="UTF-8" autocomplete="off"
                  role="search">

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
                        <input type="number" class="form-control form-control-sm" name="carnet_cui"
                               placeholder="Registro Académico/CUI" value="{{ '' }}">
                        <span class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                    </div>
                    <div class="input-group ml-2">
                        <input type="text" class="form-control form-control-sm" name="nombres" placeholder="Nombres"
                               value="{{  ''}}">
                        <input type="text" class="form-control form-control-sm" name="apellidos" placeholder="Apellidos"
                               value="{{   ''}}">
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
            <div class="table-responsive" >
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="6" class="bg-dark text-light text-right">
                           <h5><span class="badge badge-primary">Resultados:</span>
                               <span class="badge badge-light">{{  $count }}</span></h5>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Carnet</th>
                        <th>CUI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($inscrito))
                        @foreach($inscrito as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->carnet }}</td>
                                <td>{{ $item->cui }}</td>
                                <td>{{ $item->nombre1 . ' ' . $item->nombre2 }}</td>
                                <td> {{ $item->primer_apellido . ' ' . $item->segundo_apellido }}</td>
                                <td style="width: 300px" class="text-center">
                                    <a href="{{ url('/administrativo/inscritos/' . $item->carnet) }}"
                                       title="Ver Inscrito">
                                        <button class="btn btn-info btn-sm col-md-3"><i class="fa fa-eye"
                                                                                        aria-hidden="true"></i>Ver
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($name) || isset($surname))
                    <div class="pagination-wrapper"> {!! $inscrito->appends(['nombres' => Request::get('nombres')])->appends(['apellidos' => Request::get('apellidos')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
                @elseif(isset($carnet_cui))
                    <div class="pagination-wrapper"> {!! $inscrito->appends(['carnet_cui' => Request::get('carnet_cui')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
                @endif
            </div>
        </div>
    </div>
@endsection