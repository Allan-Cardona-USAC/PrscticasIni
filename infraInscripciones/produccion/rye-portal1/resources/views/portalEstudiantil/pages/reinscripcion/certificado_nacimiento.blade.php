@extends('layouts.master')
@section('content')
@include('aspirante.inscripcion.inscripcionAspirante.steps.step-2')
@endsection
@section('javascript')
{{--Importacion para alertas en forms --}}
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>  

{{--Importacion para Manejo de PDF's--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

{{--Importacion para el manejo de iconos --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ioniWcons@5.5.2/dist/ionicons/ionicons.js"></script>

@endsection