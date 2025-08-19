@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
           <h3> <i class="fa fa-info-circle"></i> Seleccione carrera</h3>   
        </div>
        <div class="card-body">
        A continuación se muestran las carreras de pregrado y postgrado en las que está inscrito como estudiante regular en el ciclo <strong>{{$ciclo->ciclo_web_pregrado}}</strong>.
        </div>
    </div>
    @foreach($carreras as $carrera)
        @if($carrera->inscrito == 1 && $carrera->situacionAcademica == 0 || $carrera->situacionAcademica == 2)
            @if($carrera->categorias == 1 || $carrera->categorias == 2) 
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-info-circle"></i> Carrera pregrado</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><strong>Unidad Académica:</strong></div>
                        <div class="col-md-6"><strong>{{$carrera->facultad}}</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Extensión:</strong></div>
                        <div class="col-md-6"><strong>{{$carrera->extension}}</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Carrera:</strong></div>
                        <div class="col-md-6"><strong>{{$carrera->carrera}}</strong></div>
                    </div>                    
                    @if($carrera->situacionAcademica == 2)
                    <div class="row">
                        <div class="col-md-2">
                            <a  href="https://registro.usac.edu.gt/inscripcion_peg/" target="_blank" class="btn btn-primary" >Ingresar a inscripcion externa</a>                            
                        </div>
                    </div>
                    @endif
                    @if($carrera->situacionAcademica == 0)
                    <div class="row">
                        <div class="col-md-2">
                            <a  href="{{url('estudiante/reinscripcion/paso4')}}?ua={{$carrera->idFacultad}}&ext={{$carrera->idExtension}}&idCarrera={{$carrera->idCarrera}}" class="btn btn-primary" >Ver Inscripción</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @if($carrera->categorias > 2 && $carrera->categorias != 5 && $carrera->categorias != 9)
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-info-circle"></i> Carrera postgrado</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><strong>Unidad Académica:</strong></div>
                        <div class="col-md-6"><strong>{{$carrera->facultad}}</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Extensión:</strong></div>
                        <div class="col-md-6"><strong>{{$carrera->extension}}</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Carrera:</strong></div>
                        <div class="col-md-6"><strong>{{$carrera->carrera}}</strong></div>
                    </div>
                    @if($carrera->situacionAcademica == 2)
                    <div class="row">
                        <div class="col-md-2">
                            <a  href="https://registro.usac.edu.gt/inscripcion_peg/" target="_blank" class="btn btn-primary" >Ingresar a inscripcion externa</a>                            
                        </div>
                    </div>
                    @endif
                    @if($carrera->situacionAcademica == 0)
                    <div class="row">
                        <div class="col-md-2">
                            <a  href="{{url('estudiante/reinscripcion/paso4')}}?ua={{$carrera->idFacultad}}&ext={{$carrera->idExtension}}&idCarrera={{$carrera->idCarrera}}" class="btn btn-primary" >Ver Inscripción</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        @endif
    @endforeach
@endsection
