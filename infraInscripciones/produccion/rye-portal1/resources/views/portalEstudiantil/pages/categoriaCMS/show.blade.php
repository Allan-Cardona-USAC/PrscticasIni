@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">CategoriaCM {{ $categoriacms->idCategoria }}</div>
                    <div class="card-body">

                        <a href="{{ url('/categoriaCMS') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/categoriaCMS/' . $categoriacms->idCategoria . '/edit') }}" title="Edit CategoriaCM"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('categoriaCMS' . '/' . $categoriacms->idCategoria) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete CategoriaCM" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $categoriacms->idCategoria }}</td>
                                    </tr>
                                    <tr><th> IdCategoria </th><td> {{ $categoriacms->idCategoria }} </td></tr><tr><th> Nombre </th><td> {{ $categoriacms->nombre }} </td></tr><tr><th> FechaCreacion </th><td> {{ $categoriacms->fechaCreacion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
