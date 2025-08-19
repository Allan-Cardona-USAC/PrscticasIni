@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Pruebas Específicas</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('administrativo.cargaPruebasEspecificas') }}" accept-charset="UTF-8" role="search">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-3 form-group {{ $errors->has('nov') ? 'has-error' : ''}}">
                        <label for="nov" class="control-label">{{ 'NOV' }}</label>
                        <input class="form-control" name="nov" type="number" id="nov" required>
                        {!! $errors->first('nov', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-sm-3 form-group {{ $errors->has('fecha_aprobado') ? 'has-error' : ''}}">
                        <label for="fecha_aprobado" class="control-label">{{ 'Fecha Aprobado' }}</label>
                        <input class="form-control" name="fecha_aprobado" type="date" id="fecha_aprobado" required>
                        {!! $errors->first('fecha_aprobado', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-sm-3 form-group {{ $errors->has('fecha_caduca') ? 'has-error' : ''}}">
                        <label for="fecha_caduca" class="control-label">{{ 'Fecha Vencimiento' }}</label>
                        <input class="form-control" name="fecha_caduca" type="date" id="fecha_caduca" required>
                        {!! $errors->first('fecha_caduca', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-sm-3 form-group {{ $errors->has('resultado') ? 'has-error' : ''}}">
                        <label for="resultado" class="control-label">{{ 'Resultado' }}</label>
                        <select class="form-control form-control" name="resultado" id="resultado">
                            <option value="Satisfactorio">Satisfactorio</option>
                            <option value="Insatisfactorio">Insatisfactorio</option>

                        </select>
                        {!! $errors->first('resultado', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label  class="control-label">{{ 'Unidad Académica' }}</label>
                        <select class="form-control form-control-sm" name="ua" id="ua">
                            @foreach($unidades as $unidad )
                                <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label  class="control-label">{{ 'Extensión' }}</label>
                        <select class="form-control form-control-sm" name="ext" id="ext">
                            <option value=-1> -- </option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="car" class="control-label">{{ 'Carrera' }}</label>
                        <select class="form-control form-control-sm"  name="car" id="car" >
                            <option value=-1> -- </option>
                        </select>
                    </div>
                </div>
                <br/>
                <div align="center" class="py-2">
                    <button type="submit" class="btn btn-primary btn-sm col-md-3">Cargar </button>
                 </div>
            </form>
        </div>


        <div class="card">
            <div class="card-header">
                <h2 align="center">Carga masiva</h2>
            </div>

            <div align="center"  class="form-group{{ $errors->has('csv_pruebas_especificas') ? ' has-error' : '' }}">
                <br>
                <label for="csv_pruebas_especificas" class="col-md-4 control-label">CSV Pruebas Específicas</label>
                <p>Seleccionar archivo .csv con resultados de pruebas específicas. Columnas esperadas: NOV, UA, EXT, CAR, RESULTADO, FECHA APROBACIÓN, CUI</p>
                <a href="{{route('administrativo.descargarPlantillaCSV')}}" >
                    <button class="btn btn-success btn-sm col-md-3">
                        Descargar Plantilla
                    </button>
                </a>
                <br>
                <br>
                <form method="POST" action="{{ route('administrativo.cargaCSVPruebasEspecificas') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-md-6">
                    <input id="csv_pruebas_especificas" type="file" class="form-control" name="csv_pruebas_especificas" required>

                    @if ($errors->has('csv_pruebas_especificas'))
                        <span class="help-block">
                            <strong>{{ $errors->first('csv_pruebas_especificas') }}</strong>
                        </span>
                    @endif
                </div>
                    <div align="center" class="py-2">
                        <button type="submit" class="btn btn-primary btn-sm col-md-3">Cargar</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


@endsection
@section('javascript')
    <script type="text/javascript">
        $("#ua").click(function(){
            $.ajax({
                url: "{{ route('extension.get_by_ua') }}?codigo_unidad_academica=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#ext').html(data.html);
                }
            });
        });
    </script>

    <script type="text/javascript">
        $("#ext").click(function(){
            $.ajax({
                url: "{{ route('carrera.get_by_ext_lvl') }}?codigo_unidad_academica=" + $("#ua").val() + "&codigo_extension=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#car').html(data.html);
                }
            });
        });
    </script>
@endsection
