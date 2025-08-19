@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Activar Unidad Academica - {{ $facultad->nomfac }}</div>
        <div class="card-body">

            <a href="{{ url('/facultad/' .  $facultad->codfac  ) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div align="center" class="py-2">
                <form method="POST" action="{{ route('facultad.unidadAcademicaActivada', $facultad->codfac  ) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline ">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <h5 class="text-left pl-4">Introduzca las razones por las que la Unidad Académica es Activada:</h5>
                    <br/>
                    @include('portalAdministrativo.include.formObservaciones')

                    <button type="submit" class="btn btn-success btn-sm col-md-3" title="Activar Unidad Académica" onclick="return confirm('¿Desea activar la Unidad Académica  {{ $facultad->nomfac }}  ?')"><i class="fa fa-check-circle" aria-hidden="true"></i> Activar</button>
                </form>
            </div>

        </div>
    </div>
@endsection