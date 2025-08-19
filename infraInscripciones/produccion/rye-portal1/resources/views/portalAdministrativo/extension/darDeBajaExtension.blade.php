@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Dar de baja extension - {{ $extension->nombre }} de {{ $extension->unidad_academica->nomfac }}</div>
        <div class="card-body">

            <a href="{{ url('/extension/ext/' .  $extension->codigo_extension  . '/ua/' . $extension->codigo_unidad_academica  ) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div align="center" class="py-2">
                <form method="POST" action="{{ route('extension.extensionDesactivada', [$extension->codigo_extension, $extension->codigo_unidad_academica] ) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline ">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <h5 class="text-left pl-4">Introduzca las razones por las que la extensión es dada de baja:</h5>
                    <br/>
                    @include('portalAdministrativo.include.formObservaciones')

                    <button type="submit" class="btn btn-danger btn-sm col-md-3" title="Dar de baja Extensión" onclick="return confirm('¿Desea dar de baja la extensión {{ $extension->nombre }} de {{ $extension->unidad_academica->nomfac }} ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Dar de Baja</button>
                </form>
            </div>

        </div>
    </div>
@endsection