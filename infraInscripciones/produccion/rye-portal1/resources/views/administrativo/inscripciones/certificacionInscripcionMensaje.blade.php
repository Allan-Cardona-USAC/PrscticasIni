@extends('layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class='card-header'>
                <h4>Mensaje de solicitud</h6>
            </div>
            <div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
            El estudiante no cuenta con inscripciones en la carrera seleccionada.
            </div>
        </div>
    </div>
@endsection