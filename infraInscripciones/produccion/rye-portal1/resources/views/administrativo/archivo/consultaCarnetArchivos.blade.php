@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

<div class="row justify-content-center">
<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class="card col-md-6" style="padding: 0px">
    <div class="card-header" style="text-align: center">
        <h5>Panel de Busqueda | Carnet</h5>
    </div>
    <div class="card-body">
        <div class="container">
        <form action="{{ route('administrativo.archivosGenera') }}" method="GET">
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4" style="text-align: center;">
                <label for="carnet">Registro Academico</label>
                <input style="text-align: center;" type="text" class="form-control" id="carnet" name="carnet" value="" required>
            </div>
        </div>
        <div class="form-row col-md-16 justify-content-center">
            <input type="submit" value="Validar" class="btn btn-primary" style="height: 100%;"/>
        </div>
        </form>
        </div>
    </div>
    @if($errors->any())
    <div class="card">
        <div class="alert alert-danger" role="alert" style="margin-bottom: 0px; text-align: center;">
                {{$errors->first()}}
        </div>
    </div>
    @endif

</div>
</div>
@endsection