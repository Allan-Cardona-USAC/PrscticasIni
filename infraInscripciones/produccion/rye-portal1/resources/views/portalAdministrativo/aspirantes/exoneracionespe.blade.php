@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Exoneración de pruebas específicas</div>
                    <div class="card-body">

                        <a href="{{ url('/administrativo/exoneracion' ) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

                        <br/>
                        <br/>

                        <div align="center" class="py-2">
                            <form method="POST" action="{{ url('/administrativo/exoneracionespe/' . $aspirante->nov) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline ">
                                {{ csrf_field() }}
                                <h5 class="text-left">Seleccionar carrera de la cual se exonera a N.O.V.  {{ $aspirante->nov }}:</h5>
                                <br/>

                                <div class="form-group {{ $errors->has('codigo_unidad_academica') ? 'has-error' : ''}}">
                                    <label for="codigo_unidad_academica" class="control-label">{{ 'Unidad Académica' }}</label>
                                    <select class="form-control" name="ua" id="codigo_unidad_academica" >
                                        @if(isset($carrera->codigo_unidad_academica))
                                            @foreach($unidades as $unidad )
                                                @if($unidad->codfac == $carrera->codigo_unidad_academica)
                                                    <option value="{{ $unidad->codfac }}" selected>{{ $unidad->nomfac }}</option>
                                                @else
                                                    <option disabled value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="-1"> Selecciona Unidad Académica </option>
                                            @foreach($unidades as $unidad )
                                                <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {!! $errors->first('Unidad_academica', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('codigo_extension') ? 'has-error' : ''}}">
                                    <label for="codigo_extension" class="control-label">{{ 'Extensión' }}</label>
                                    <select class="form-control" name="ext" id="codigo_extension" >
                                        @if(isset($carrera->codigo_extension))
                                            @foreach($extensiones as $extension )
                                                @if($extension->codigo_extension == $carrera->codigo_extension)
                                                    <option value="{{ $extension->codigo_extension }}" selected>{{ $extension->nombre }}</option>
                                                @else
                                                    <option disabled value="{{ $extension->codigo_extension }}">{{ $extension->nombre }}</option>
                                                @endif

                                            @endforeach
                                        @else
                                            <option value="-1"> -- </option>
                                        @endif

                                    </select>
                                    {!! $errors->first('codigo_extension', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('codigo_carrera') ? 'has-error' : ''}}">
                                    <label for="codigo_carrera" class="control-label">{{ 'Carrera' }}</label>
                                    <select class="form-control" name="car" id="codigo_carrera" >
                                        @if(isset($carrera->codigo_carrera))
                                            @foreach($carreras as $carrera )
                                                @if($carrera->codigo_carrera == $carrera->codigo_carrera)
                                                    <option value="{{ $carrera->codigo_carrera }}" selected>{{ $carrera->nombre }}</option>
                                                @else
                                                    <option disabled value="{{ $carrera->codigo_carrera }}">{{ $carrera->nombre }}</option>
                                                @endif

                                            @endforeach
                                        @else
                                            <option value="-1"> -- </option>
                                        @endif

                                    </select>
                                    {!! $errors->first('codigo_carrera', '<p class="help-block">:message</p>') !!}
                                </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('fecha_aprobado') ? 'has-error' : ''}}">
                                        <label for="fecha_aprobado" class="control-label">{{ 'Fecha Aprobado' }}</label>
                                        <input class="form-control" name="fecha_aprobado" type="date" id="fecha_aprobado" value="{{ ''}}" required>
                                        {!! $errors->first('fecha_aprobado', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('fecha_caduca') ? 'has-error' : ''}}">
                                        <label for="fecha_caduca" class="control-label">{{ 'Fecha Caduca' }}</label>
                                        <input class="form-control" name="fecha_caduca" type="date" id="fecha_caduca" value="{{ ''}}" required>
                                        {!! $errors->first('fecha_caduca', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                                <button type="submit" class="btn btn-success btn-sm col-md-3" title="Exonerar">Exonerar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $("#codigo_unidad_academica").change(function(){
            $.ajax({
                url: "{{ route('extension.get_by_ua') }}?codigo_unidad_academica=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#codigo_extension').html(data.html);
                }
            });
        });
    </script>

    <script type="text/javascript">
        $("#codigo_extension").click(function(){
            $.ajax({
                url: "{{ route('carrera.get_by_ext') }}?codigo_unidad_academica=" + $("#codigo_unidad_academica").val() + "&codigo_extension=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#codigo_carrera').html(data.html);
                }
            });
        });
    </script>
@endsection