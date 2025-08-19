@extends('layouts.master')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="w-100 row justify-content-md-center">
            <div class="p-0 col-12 col-md-10 align-self-center mt-3" >
                <div class="row">
                    <div class="col-12 text-right">
                        <button id="btnSummernote" class="btn btn-sm btn-outline-info" onclick="editSummernote()" type="button">Editar</button>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ url('/admin/prueba') }}">
                            @csrf
                            <div id="summernote" class="contenidoEditable"></div>
                            <input type="hidden" id="inputContenido" name="inputContenido">
                            <input type="submit" class="btn btn-sm btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script src="{{ asset('js/summernoteConfig.js') }}"></script>
@endsection
