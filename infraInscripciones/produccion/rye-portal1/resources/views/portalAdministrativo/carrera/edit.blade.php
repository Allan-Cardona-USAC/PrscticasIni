@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Editar Carrera #{{ $carrera->codigo_carrera }}</div>
        <div class="card-body">
            <a href="{{ url('/carrera') }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
            <br />
            <br />

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form autocomplete="off" method="POST" action="{{ url('/carrera/' . $carrera->codigo_carrera) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('portalAdministrativo.carrera.form', ['formMode' => 'edit'])

            </form>

        </div>
    </div>
@endsection
