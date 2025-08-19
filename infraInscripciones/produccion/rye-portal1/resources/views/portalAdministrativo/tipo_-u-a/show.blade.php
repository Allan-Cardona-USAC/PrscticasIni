@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">tipo_UA {{ $tipo_ua->tipo }}</div>
                    <div class="card-body">

                        <a href="{{ url('/tipo_-u-a') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/tipo_-u-a/' . $tipo_ua->tipo . '/edit') }}" title="Edit tipo_UA"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('tipo_ua' . '/' . $tipo_ua->tipo) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete tipo_UA" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tipo_ua->tipo }}</td>
                                    </tr>
                                    <tr><th> Tipo </th><td> {{ $tipo_ua->tipo }} </td></tr><tr><th> Descripcion </th><td> {{ $tipo_ua->descripcion }} </td></tr><tr><th> Prioridad </th><td> {{ $tipo_ua->prioridad }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
