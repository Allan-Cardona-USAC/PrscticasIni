@extends('layouts.master')

@section('content')
<div class="container">
<div class="card border-{{ $style }} mb-3">
    <div class="card-header bg-{{ $style }} text-white">
        <h3><i class="fa {{ $icono }}"></i> {{ $header }}</h3>
    </div>

    {{-- card body --}}
<div class="card-body text-{{ $style }}">
        <h6>{{ $texto }}</h6>
    </div>
    {{-- end card body --}}
</div>
</div>
@endsection