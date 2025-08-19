@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Exoneraciones</h2>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ url('/administrativo/exoneracion') }}" accept-charset="UTF-8" role="search">
                <div class="row">
                    <div class="offset-4 col-md-4">
                        <div class="input-group">
                            <input type="number" class="form-control" name="novnum" placeholder="Buscar N.O.V.." value="{{ request('nov') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>

            <br>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th> Número de Orientación Vocacional </th><td>{{ isset($aspirante->nov) ? $aspirante->nov : '' }}</td>
                    </tr>
                   <tr>
                        <th> Nombres </th>
                        <td> {{ isset($aspirante->nov) ? $aspirante->nombre1 . ' ' . $aspirante->nombre2 : '' }} </td>
                    </tr>
                       <tr>
                          <th> Apellidos  </th>
                          <td> {{ isset($aspirante->nov) ?  $aspirante->apellido1 . ' ' . $aspirante->apellido2 : '' }} </td>
                      </tr>
                      <tr>
                          <th> Fecha Nacimiento  </th>
                          <td> {{ isset($aspirante->nov) ? $aspirante->fecha_nacimiento : '' }} </td>
                      </tr>
                      <tr>
                          <th> Sexo  </th>
                          <td> {{ isset($aspirante->nov) ?  $aspirante->sexo : '' }} </td>
                      </tr>
                      <tr>
                          <th> Direccion </th>
                          <td> {{ isset($aspirante->nov) ?  $aspirante->direccion : ''}} </td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <label class="offset-4 col-md-3">Exoneraciones</label>
            </div>
            <form method="POST" action="{{ route('administrativo.exonerar') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('codigo_unidad_academica') ? 'has-error' : ''}}">
                    <label for="codigo_unidad_academica" class="control-label">{{ 'Unidad Académica' }}</label>
                    <select class="form-control" name="ua" id="codigo_unidad_academica" >
                        <option value="-1"> Selecciona Unidad Académica </option>
                        @foreach($unidades as $unidad )
                            <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('Unidad_academica', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group {{ $errors->has('codigo_extension') ? 'has-error' : ''}}">
                    <label for="codigo_extension" class="control-label">{{ 'Extensión' }}</label>
                    <select class="form-control" name="ext" id="codigo_extension" >
                        <option value="-1"> -- </option>
                    </select>
                    {!! $errors->first('codigo_extension', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group {{ $errors->has('codigo_carrera') ? 'has-error' : ''}}">
                    <label for="codigo_carrera" class="control-label">{{ 'Carrera' }}</label>
                    <select class="form-control" name="car" id="codigo_carrera" >
                        <option value="-1"> -- </option>
                    </select>
                    {!! $errors->first('codigo_carrera', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group {{ $errors->has('f_aprobado') ? 'has-error' : ''}}">
                            <label for="f_aprobado" class="control-label">{{ 'Fecha Aprobado' }}</label>
                            <input class="form-control" name="f_aprobado" type="date" id="f_aprobado" value="{{ ''}}" required>
                            {!! $errors->first('f_aprobado', '<p class="help-block">:message</p>') !!}
                        </div>
                     </div>
                    <div class="col-md-3">
                        <div class="form-group {{ $errors->has('fecha_caduca') ? 'has-error' : ''}}">
                            <label for="fecha_caduca" class="control-label">{{ 'Fecha Caduca' }}</label>
                            <input class="form-control" name="fecha_caduca" type="date" id="fecha_caduca" value="{{ ''}}" required>
                            {!! $errors->first('fecha_caduca', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="usuario" class="control-label">{{ 'Motivo de exoneración.' }}</label>
                        <select style="white-space: normal !important;" class="form-control" name="motivo" id="motivo" >
                            @foreach($motivos as $motivo )
                                <option value="{{ $motivo->id }}">{{ $motivo->nombre . ': ' . $motivo->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="nov" name="nov" value="{{ isset($aspirante->nov) ?  $aspirante->nov : ''}}">
                </div>
                <div align="center" class="py-2">
                        @if(isset($aspirante->nov))
                            <button type="submit" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Exonerar</button>
                        @else
                            <button type="submit" disabled class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Exonerar</button>
                       @endif


                </div>

            </form>
        </div>
    </div>
@endsection


@section('javascript')
    <script type="text/javascript">
        $("#codigo_unidad_academica").click(function(){
            $.ajax({
                url: "{{ route('extension.get_active_ext_by_ua') }}?codigo_unidad_academica=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#codigo_extension').html(data.html);
                }
            });
            $('#codigo_carrera').html("<option value=\"-1\"> -- </option>");
        });
    </script>

    <script type="text/javascript">
        $("#codigo_extension").click(function(){
            $.ajax({
                url: "{{ route('carrera.get_active_car_by_ext') }}?codigo_unidad_academica=" + $("#codigo_unidad_academica").val() + "&codigo_extension=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#codigo_carrera').html(data.html);
                }
            });
        });
    </script>
@endsection