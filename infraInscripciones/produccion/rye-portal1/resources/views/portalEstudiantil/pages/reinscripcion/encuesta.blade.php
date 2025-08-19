@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h2>Encuesta</h2>
        <div class="embed-responsive embed-responsive-1by1">
            <iframe class="embed-responsive-item" src="{{$urlEncuesta}}" ></iframe>
        </div>
        <br/>
        <h5>Para poder continuar debe completar la encuesta</h5>
        <div>
            <form method="GET" action="{{url('estudiante/reinscripcion/paso2')}}">
                @csrf
                <input type="submit" value="Siguiente Paso" class="btn btn-primary" />
            </form>
        <div>
    </div>
@endsection
