@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">{{$titleCard}}</h2>
        </div>
        <div class="card-body">
            <div align="center" class="py-2">
                <a href="{{ route('administrativo.Citas','sinCita') }}" title="Asignar Citas"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-calendar" aria-hidden="true"></i> Asignar Citas</button></a>
                <a href="{{ route('administrativo.Citas','conCita')}}" title="Cita Asignada"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Cita Asignada</button></a>
            </div>

            <form method="GET" action="{{ route('administrativo.Citas',$mostrar) }}" accept-charset="UTF-8" role="search">
                <div class="row form-inline my-2 my-lg-0 float-right pr-md-3 pr-sm-1">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="NOV" value="{{ '' }}">
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
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        @if($mostrar === 'sinCita')
                            <th>#</th><th>NOV</th><th>Nombre</th><th>Acciones</th>
                        @else
                            <th>#</th><th>NOV</th><th>Nombre</th><th>Cita</th><th>Acciones</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aspirantes as $aspirante)
                        <tr>
                            @if($mostrar === 'sinCita')
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $aspirante->nov }}</td>
                                <td>{{ $aspirante->getNombreCompleto() }}</td>
                                <td>
                                    <a href="{{ route('administrativo.asignarCita',$aspirante->nov) }}" title="View asignar Cita aspirante"><button class="btn btn-info btn-sm col-md-8 col-sm-8"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                </td>
                            @else
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $aspirante->nov }}</td>
                                <td>{{ $aspirante->getNombreCompleto() }}</td>
                                <td>{{ Carbon\Carbon::parse($aspirante->cita)->format('d/m/Y H:i')}}</td>
                                <td>
                                    <a href="{{ route('administrativo.showCita',$aspirante->nov) }}" title="ver aspirante"><button class="btn btn-info btn-sm col-md-8 col-sm-8"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $aspirantes->appends(['search' => Request::get('search')])->appends(['page_size' => Request::get('page_size')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
