@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Activar Carrera - {{ $carrera->nombre_carrera }}</div>
        <div class="card-body">

            <a href="{{ url('/carrera/'. $carrera->codigo_carrera .'/ext/' .  $carrera->codigo_extension . '/ua/' . $carrera->codigo_unidad_academica) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div align="center" class="py-2">
                <form method="POST" action="{{ route('carrera.carreraActivada', [$carrera->codigo_carrera,$carrera->codigo_extension, $carrera->codigo_unidad_academica] ) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline ">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <h5 class="text-left pl-4">Introduzca las razones por las que la carrera es Activada:</h5>
                    <br/>
                    @include('portalAdministrativo.include.formObservaciones')

                    <button type="submit" class="btn btn-success btn-sm col-md-3" title="Activar carrera" onclick="return confirm('¿Desea activar la carrera {{ $carrera->nombre_carrera }}?')"><i class="fa fa-check-circle" aria-hidden="true"></i> Activar</button>
                </form>
            </div>

        </div>
    </div>
@endsection