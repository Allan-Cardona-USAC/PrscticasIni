@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Nueva solicitud de carrera</div>
        <div class="card-body">
            <a href="{{ url('/carreraSolicitud') }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
            <br />
            <br />

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form autocomplete="off" method="POST" action="{{ url('/carreraSolicitud') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('portalAdministrativo.solicitud-carrera.form', ['formMode' => 'create'])

            </form>

        </div>
    </div>
@endsection
