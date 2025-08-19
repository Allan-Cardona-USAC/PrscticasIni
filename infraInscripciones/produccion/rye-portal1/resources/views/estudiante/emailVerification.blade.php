@extends('portalEstudiantil.layouts.master')

@section('content')
<div class="container">
<br>
<div class="card border-info mb-3">
    <div class="card-header bg-info text-white">
        <i class="fa fa-exclamation-circle"></i> Verificación de correo electrónico
    </div>

    {{-- card body --}}
<div class="card-body text-info text-center">
<h6>Por favor verifica tu correo electrónico. Te hemos enviado un mensaje a {{ $masked }}</h6>
    </div>
    {{-- end card body --}}
</div>
</div>
@endsection