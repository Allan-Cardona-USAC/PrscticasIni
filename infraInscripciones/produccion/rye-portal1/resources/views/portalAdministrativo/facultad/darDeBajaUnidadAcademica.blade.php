@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Dar de Baja Unidad Academica - {{ $facultad->nomfac }}</div>
        <div class="card-body">

            <a href="{{ url('/facultad/' .  $facultad->codfac  ) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div align="center" class="py-2">
                <form method="POST" action="{{ route('facultad.unidadAcademicaDesactivada', $facultad->codfac  ) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline ">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <h5 class="text-left pl-4">Introduzca las razones por las que la Unidad Académica es dada de baja:</h5>
                    <br/>
                    @include('portalAdministrativo.include.formObservaciones')
                    <button type="submit" class="btn btn-danger btn-sm col-md-3" title="Dar de baja Unidad Académica" onclick="return confirm('¿Desea dar de baja la Unidad Académica  {{ $facultad->nomfac }}  ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Dar de baja</button>
                </form>
            </div>

        </div>
    </div>
@endsection