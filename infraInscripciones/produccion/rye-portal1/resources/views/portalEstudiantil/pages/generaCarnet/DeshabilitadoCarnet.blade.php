@extends('layouts.master')



@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
@endsection


@section('content')
    <link href="{{asset('css/arbolito.css')}}" rel="stylesheet">
    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 col-12 mt-2 text-left">
            <h5>La emisión de carnet estará activa a partir del 09 de enero de 2025.</h5>
        </div>
    </div>
@endsection

