@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ URL::asset('css/estiloConstanciaInscripcion.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class='card-header'>
                <h4>Solicitud de Certificacion</h6>
            </div>
            <div class="card-body">
                <label><strong>{{$nombreCompleto}}</strong>, la solicitud para la certificación de inscripción ha sido enviada, la cual tiene un mes de validez y vence hasta el <strong>{{\Carbon\Carbon::parse($fechaVence)->format('d/m/Y')}}</strong>. Presentarse al Departamento de Registro y Estadística transcurridos 2 días a partir de la fecha en que se realizó la solicitud.</label>
                <label><strong>Nota:</strong> Podrás solicitar una nueva certificación al caducar la fecha de la ultima certificación generada.
            </div>
        </div>
    </div>
@endsection