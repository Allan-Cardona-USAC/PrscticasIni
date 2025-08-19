@extends('layouts.master')



@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card mb-3">
            <div class='card-header'>
                <h6><i class='fa fa-info-circle'></i> Error</h6>
            </div>
            <div class="card-body" style="text-align: center">
                <p>A ocurrido un error al obtener los datos de nuestro servicio.</p>
            </div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js">
</script>

@endsection