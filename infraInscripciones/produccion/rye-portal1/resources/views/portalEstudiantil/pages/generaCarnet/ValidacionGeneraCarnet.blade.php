@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-7 mx-auto">
                <div class="card mx-auto">
                    <div class="card-header text-center">
                        <h2>Validación de Datos </h2>
                    </div>
                    <div class="card-body">
                        <h5>Nombre: {{$nombreEstudiante}}</h5>
                        <h5>Registro Académico: {{$carnet}}</h5>
                        <h5 >CUI/PASAPORTE: <div id="cui" style="display:inline;"> 
                        @if($nacionalidad == 30)
                            {{$cui}}
                        @else
                            {{$pasaporte}}
                        @endif
                        </div></h5>
                        <br/>
                        <ul class="list-unstyled list-group" style="font-size: 1.4em;">
                            <li class="list-group-item border-0" >
                                @if($existeFoto)
                                    <i style="color:#388e3c;" class="fa fa-check-square mr-4"></i>  Fotografia
                                @else
                                    <i style="color:#c62828;" class="fa fa-window-close mr-4"></i>  Fotografia
                                @endif
                                <input type="hidden" class="hide" id="existeFoto" value = "{{$existeFoto}}"/>
                            </li>

                            <li class="list-group-item border-0">
                                @if($cui || $pasaporte)
                                    <i style="color:#388e3c;" class="fa fa-check-square mr-4"></i> CUI/PASAPORTE
                                @else
                                    <i style="color:#c62828;" class="fa fa-window-close mr-4"></i>  CUI/PASAPORTE
                                @endif

                            </li>

                            <li class="list-group-item border-0">
                                Carreras del Estudiante
                                 <ul class="list-group mt-3 ">
                                    <input type="hidden" class="hide" id="problemaCarrera" value = "{{$problemaCarrera}}"/>
                                    @foreach($carreras as $carrera)
                                        @if($carrera->inscrito == 1 && $carrera->situacionAcademica < 3 )
                                            <li class="list-group-item border-0">
                                                <i style="color:#388e3c;" class="fa fa-check-square mr-1"></i> {{$carrera->carrera}}
                                            </li>
                                        @endif
                                        @if($carrera->inscrito != 1 || $carrera->situacionAcademica > 2)
                                            <li class="list-group-item border-0">
                                                <i style="color:#c62828;" class="fa fa-window-close mr-1"></i> {{$carrera->carrera}}
                                            </li>
                                        @endif

                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <input type="button" name="btn" value="Generar Boleta" id="submitBtn"  onclick="validar()" class="btn btn-primary btn-lg btn-block mt-2" />
                    </div>
                </div>
            </div>
        <div>

    </div>
    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>
@endsection



@section('javascript')
 <script>
    function validar(){
       let cui = document.getElementById("cui").innerText
       let existeFoto = document.getElementById("existeFoto").value
       let problemaCarrera = document.getElementById("problemaCarrera").value

        if(!existeFoto){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Necesitas actualizar tu foto'
            })
            return;
        }

       if(cui.length === 0){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Necesitas actualizar tu CUI'
            })
            return;
       }

       if(problemaCarrera){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes estar inscrito en al menos una carrera activa'
            })
            return;
       }

       window.location.href = "{{ url('estudiante/BoletaGeneraCarnet') }}";

    }
 </script>
@endsection
