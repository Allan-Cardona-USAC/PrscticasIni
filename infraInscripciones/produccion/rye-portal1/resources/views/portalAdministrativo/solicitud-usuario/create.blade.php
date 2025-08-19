@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Nueva Solicitud de Usuario</div>
        <div class="card-body">
            <a href="{{ url('/solicitud-usuario') }}" title="Regresar"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
            <br />
            <br />

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-3 form-group ">
                    <label for="select_tipo" class="control-label">{{ 'Tipo Solicitud' }}</label>
                    <select name="select_tipo" class="form-control" id="select_tipo" onchange=SeleccionTipo(this) >
                        @foreach (json_decode('{"I":"Interno","E":"Externo"}', true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}" >{{ $optionValue }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @include ('portalAdministrativo.solicitud-usuario.form', ['formMode' => 'create'])
            @include ('portalAdministrativo.solicitud-usuario.formExterno', ['formMode' => 'create'])

        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function SeleccionTipo(select) {
            if (select.value === "I") {
                document.getElementById("FormExterno").style.display = "none";
                document.getElementById("FormInterno").style.display = "block";
            } else if(select.value === "E"){
                document.getElementById("FormInterno").style.display = "none";
                document.getElementById("FormExterno").style.display = "block";
            }
        }
    </script>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
@endsection
