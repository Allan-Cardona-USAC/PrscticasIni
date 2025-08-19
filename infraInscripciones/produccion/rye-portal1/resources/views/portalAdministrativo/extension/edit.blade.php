@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Editar Extensión <b>{{ $extension->nombre }} de {{ $extension->unidad_academica->nomfac }}</b></div>
        <div class="card-body">
            <a href="{{ url('/extension') }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
            <br />
            <br />

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ url('/extension/' . $extension->codigo_extension) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('portalAdministrativo.extension.form', ['formMode' => 'edit'])

            </form>

        </div>
    </div>
@endsection
