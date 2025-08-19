@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h2>Reinscripción Paso 1</h2>
        <h6>{{$carnet}}</h6>
        <h6>{{$nombreEstudiante}}</h6>
        <br/>
        <br/>
        <h5>Seleccione una Carrera:</h5>
        <div>
        @foreach($carreras as $carrera)
            <hr/>
            <div>
                <form action="{{ url('estudiante/reinscripcion/paso2') }}" method="POST">
                    @csrf
                    <table>
                        <tbody>
                            <tr>
                                <td><strong>Unidad Académica:</strong></td>
                                <td><strong>{{$carrera->facultad}}</strong></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Extensión:</strong></td>
                                <td><strong>{{$carrera->extension}}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Carrera:</strong></td>
                                <td><strong>{{$carrera->carrera}}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <input hidden value="{{$carnet}}" id="carnet" name="carnet"/>
                    <input hidden value="{{$carrera->idFacultad}}" id="idFacultad" name="idFacultad"/>
                    <input hidden value="{{$carrera->facultad}}" id="facultad" name="facultad"/>
                    <input hidden value="{{$carrera->idExtension}}" id="idExtension" name="idExtension"/>
                    <input hidden value="{{$carrera->extension}}" id="extension" name="extension"/>
                    <input hidden value="{{$carrera->idCarrera}}" id="idCarrera" name="idCarrera"/>
                    <input hidden value="{{$carrera->carrera}}" id="carrera" name="carrera"/>
                    <input type="submit" value="Siguiente paso" class="btn btn-primary" />
                </form>
            </div>
        @endforeach
        </div>
    </div>
@endsection
