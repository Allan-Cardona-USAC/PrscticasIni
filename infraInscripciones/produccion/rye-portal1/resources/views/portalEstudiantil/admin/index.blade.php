@extends('layouts.master')
@section('content')
<div class="row">

        <div class="info-card-b col-4">
            <div class="center-content">
                <a href="{{ url('/admin/categorias') }}">
                    <img class="img-white" src="{{ asset('img/scale-balance.png') }}"/> <br/>
                    <span>Categorías</span>
                </a>
            </div>
        </div>

        <div class="info-card-a  col-4">
            <div class="center-content">
                <a href="{{ url('/admin/paginas') }}">
                    <img src="{{ asset('img/account-plus.png') }}"/> <br/>
                    <span>Páginas</span>
                </a>
            </div>
        </div>

        <div class="info-card-c  col-4">
                <div class="center-content">
                    <a href="{{ url('/admin/editor') }}">
                        <img src="{{ asset('img/certificate.png') }}"/> <br/>
                        <span>Editor</span>
                    </a>
                </div>
            </div>
    </div>
@endsection
