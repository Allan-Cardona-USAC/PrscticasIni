@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">PaginaCMS {{ $paginaCMS->idPagina }}</div>
                    <div class="card-body">

                        <a href="{{ url('/paginaCMS') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/paginaCMS/' . $paginaCMS->idPagina . '/edit') }}" title="Edit PaginaCM"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('paginaCMS' . '/' . $paginaCMS->idPagina) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete PaginaCMS" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $paginaCMS->idPagina }}</td>
                                    </tr>
                                    <tr><th> IdPagina </th><td> {{ $paginaCMS->idPagina }} </td></tr><tr><th> Nombre </th><td> {{ $paginaCMS->nombre }} </td></tr><tr><th> Ruta </th><td> {{ $paginaCMS->ruta }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div id="summernote" class="contenidoEditable">
                    @if(isset($paginaCMS->contenido))
                        {!! $paginaCMS->contenido !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
