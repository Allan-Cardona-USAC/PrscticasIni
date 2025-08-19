@extends('portalEstudiantil.layouts.master')


@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!--- <link href="{{ URL::asset('css/certificacionInscripcion.css') }}" rel="stylesheet" type="text/css"> -->
@endsection


@section('content')
<br>
<br>
<br>
<div class="container justify-content-center" style="display: grid;">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    {{$errors->first()}}
    </div>
    @endif 
    <h2 class="form-row justify-content-center">Constancia de Archivos</h2>
    <div>
        <div style="background-color:white;">
            <form action="{{ url('estudiante/verificarConstanciaArchivos') }}" method="POST">
                {{ csrf_field() }}
                
                <input hidden value="{{$transaccion}}" id="cert_transaccion" name="cert_transaccion" />
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-12">
                        <label for="hash">Ingrese el codigo de barras: </label>
                        <input type="text" class="form-control" id="barcode" name="barcode" value="">
                        <br/>
                        <input type="submit" value="Ingresar" class="btn btn-primary" />
                    </div>
                    
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection