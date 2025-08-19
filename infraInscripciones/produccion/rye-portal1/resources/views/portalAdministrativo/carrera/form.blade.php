<div class="row text-justify">
    <div class="col">
        <div class="form-group {{ $errors->has('codigo_unidad_academica') ? 'has-error' : ''}}">
            <label for="codigo_unidad_academica" class="control-label">{{ 'Unidad Académica' }}</label>
            <select class="form-control" name="codigo_unidad_academica" id="codigo_unidad_academica" >
                @if(isset($carrera->codigo_unidad_academica))
                    @foreach($unidades as $unidad )
                        @if($unidad->codfac == $carrera->codigo_unidad_academica)
                            <option value="{{ $unidad->codfac }}" selected>{{ $unidad->nomfac }}</option>
                        @else
                            <option disabled value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($unidades as $unidad )
                        <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                    @endforeach
                @endif
            </select>
            {!! $errors->first('Unidad_academica', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('codigo_extension') ? 'has-error' : ''}}">
            <label for="codigo_extension" class="control-label">{{ 'Extensión' }}</label>
            <select class="form-control" name="codigo_extension" id="codigo_extension" >
                @if(isset($carrera->codigo_extension))
                    @foreach($extensiones as $extension )
                        @if($extension->codigo_extension == $carrera->codigo_extension)
                            <option value="{{ $extension->codigo_extension }}" selected>{{ $extension->nombre }}</option>
                        @else
                            <option disabled value="{{ $extension->codigo_extension }}">{{ $extension->nombre }}</option>
                        @endif

                    @endforeach
                @else
                    <option value=""> -- </option>
                @endif
            </select>
            {!! $errors->first('codigo_extension', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('codigo_carrera') ? 'has-error' : ''}}">
        <label for="codigo_carrera" class="control-label">{{ 'Codigo Carrera' }}</label>
        <input class="form-control" name="codigo_carrera" type="number" min="0" id="codigo_carrera" value="{{ isset($carrera->codigo_carrera) ? $carrera->codigo_carrera : ''}}" required>
        {!! $errors->first('codigo_carrera', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('codigo_nivel') ? 'has-error' : ''}}">
            <label for="codigo_nivel" class="control-label">{{ 'Nivel Académico' }}</label>
            <select class="form-control" name="codigo_nivel" id="codigo_nivel" >
                @if(isset($carrera->nivel_academico))
                    @foreach($niveles as $nivel )
			 @if($nivel->codigo_nivel_academico == $carrera->nivel_academico->codigo_nivel)
                            <option value="{{ $nivel->codigo_nivel_academico }}" selected>{{ $nivel->nombre }}</option>
                        @else
                            <option value="{{ $nivel->codigo_nivel_academico }}">{{ $nivel->nombre }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($niveles as $nivel )
                        <option value="{{ $nivel->codigo_nivel_academico }}">{{ $nivel->nombre }}</option>
                    @endforeach
                @endif
            </select>
            {!! $errors->first('codigo_nivel', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('nombre_carrera') ? 'has-error' : ''}}">
    <label for="nombre_carrera" class="control-label">{{ 'Nombre Carrera' }}</label>
    <input class="form-control" name="nombre_carrera" type="text" id="nombre_carrera" value="{{ isset($carrera->nombre_carrera) ? $carrera->nombre_carrera : ''}}" required>
    {!! $errors->first('nombre_carrera', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('titulo_masculino') ? 'has-error' : ''}}">
    <label for="titulo_masculino" class="control-label">{{ 'Titulo Masculino' }}</label>
    <input class="form-control" name="titulo_masculino" type="text" id="titulo_masculino" value="{{ isset($carrera->titulo_masculino) ? $carrera->titulo_masculino : ''}}" required>
    {!! $errors->first('titulo_masculino', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('titulo_femenino') ? 'has-error' : ''}}">
    <label for="titulo_femenino" class="control-label">{{ 'Titulo Femenino' }}</label>
    <input class="form-control" name="titulo_femenino" type="text" id="titulo_femenino" value="{{ isset($carrera->titulo_femenino) ? $carrera->titulo_femenino : ''}}" required>
    {!! $errors->first('titulo_femenino', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-4 form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
        <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
        <input class="form-control" name="telefono" type="number" id="telefono" value="{{ isset($carrera->telefono) ? $carrera->telefono: ''}}" required>
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4 form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="control-label">{{ 'Email' }}</label>
        <input class="form-control" name="email" type="email" id="email" value="{{ isset($carrera->email) ? $carrera->email : ''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4 form-group {{ $errors->has('pagina_web') ? 'has-error' : ''}}">
        <label for="pagina_web" class="control-label">{{ 'Pagina Web' }}</label>
        <input class="form-control" name="pagina_web" type="text" id="pagina_web" value="{{ isset($carrera->pagina_web) ? $carrera->pagina_web : ''}}" required>
        {!! $errors->first('pagina_web', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('fecha_activacion') ? 'has-error' : ''}}">
        <label for="fecha_activacion" class="control-label">{{ 'Fecha Activacion' }}</label>
        <input class="form-control" name="fecha_activacion" type="date" id="fecha_activacion" value="{{ isset($carrera->fecha_activacion) ? $carrera->fecha_activacion : ''}}" required>
        {!! $errors->first('fecha_activacion', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 form-group {{ $errors->has('fecha_creacion') ? 'has-error' : ''}}">
        <label for="fecha_creacion" class="control-label">{{ 'Fecha Creacion' }}</label>
        <input class="form-control" name="fecha_creacion" type="date" id="fecha_creacion" value="{{ isset($carrera->fecha_creacion) ? $carrera->fecha_creacion : ''}}" required>
        {!! $errors->first('fecha_creacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<div class="row text-justify">
    <div class="col">
        <div class="form-check {{ $errors->has('estado_ingreso') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="estado_ingreso" type="number" id="estado_ingreso" value="1"
                   @if(isset($carrera->estado_ingreso))
                   @if($carrera->estado_ingreso > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="estado_ingreso">{{ 'Estado Ingreso' }}</label>
            {!! $errors->first('estado_ingreso', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('estado_reingreso') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="estado_reingreso" type="number" id="estado_reingreso" value="1"
                   @if(isset($carrera->estado_reingreso))
                   @if($carrera->estado_reingreso > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="estado_reingreso">{{ 'Estado Reingreso' }}</label>
            {!! $errors->first('estado_reingreso', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('estado_peg') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="estado_peg" type="number" id="estado_peg"  value="1"
                   @if(isset($carrera->estado_peg))
                   @if($carrera->estado_peg > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="estado_peg">{{ 'Estado PEG' }}</label>
            {!! $errors->first('estado_peg', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('estado_graduados') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="estado_graduados" type="number" id="estado_graduados" value="1"
                   @if(isset($carrera->estado_graduados))
                   @if($carrera->estado_graduados > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="estado_graduados">{{ 'Estado Graduados' }}</label>
            {!! $errors->first('estado_graduados', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-check {{ $errors->has('requiere_cierre') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="requiere_cierre" type="number" id="requiere_cierre" value="1"
                   @if(isset($carrera->requiere_cierre))
                   @if($carrera->requiere_cierre > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="requiere_cierre">{{ 'Requiere Cierre' }}</label>
            {!! $errors->first('requiere_cierre', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('requiere_privado') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="requiere_privado" type="number" id="requiere_privado" value="1"
                   @if(isset($carrera->requiere_privado))
                   @if($carrera->requiere_privado > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="requiere_privado">{{ 'Requiere Privado' }}</label>
            {!! $errors->first('requiere_privado', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('requiere_publico') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="requiere_publico" type="number" id="requiere_publico" value="1"
                   @if(isset($carrera->requiere_publico))
                   @if($carrera->requiere_publico > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="requiere_publico">{{ 'Requiere Público' }}</label>
            {!! $errors->first('requiere_publico', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-check {{ $errors->has('requiere_eps') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="requiere_eps" type="number" id="requiere_eps" value="1"
                   @if(isset($carrera->requiere_eps))
                   @if($carrera->requiere_eps > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="requiere_eps">{{ 'Requiere EPS' }}</label>
            {!! $errors->first('requiere_eps', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('requiere_tesis') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="requiere_tesis" type="number" id="requiere_tesis" value="1"
                   @if(isset($carrera->requiere_tesis))
                   @if($carrera->requiere_tesis > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="requiere_tesis">{{ 'Requiere Tesis' }}</label>
            {!! $errors->first('requiere_tesis', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('prerequisito') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="prerequisito" type="number" id="prerequisito" value="1"
                   @if(isset($carrera->prerequisito))
                   @if($carrera->prerequisito > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="prerequisito">{{ 'Prerrequisito' }}</label>
            {!! $errors->first('prerequisito', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<br/>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" required>{{ isset($carrera->descripcion) ? $carrera->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">

    <div class="col-md-6 form-group {{ $errors->has('car_multiple') ? 'has-error' : ''}}">
        <label for="car_multiple" class="control-label">{{ 'Carrera Multiple' }}</label>
        <input class="form-control" name="car_multiple" type="number" min="0" id="car_multiple" value="{{ isset($carrera->car_multiple) ? $carrera->car_multiple : '0'}}" required>
        {!! $errors->first('car_multiple', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 form-group {{ $errors->has('regimen') ? 'has-error' : ''}}">
        <label for="regimen" class="control-label">{{ 'Regimen' }}</label>
        <select name="regimen" class="form-control" id="regimen" >
            @foreach (json_decode('{"Semestral":"Semestral","Anual":"Anual"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($carrera->regimen) && $carrera->regimen == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('regimen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row text-justify">

    <div class="col">
        <p>Pruebas Básicas</p>
        <div class="form-check {{ $errors->has('pcb_1') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="pcb_1" type="number" id="pcb_1" value="1"
                   @if(isset($carrera->codigo_carrera))
                   @foreach($pcbs as $pcb)
                   @if($pcb->id_pcb == 1)
                   checked
                    @endif
                    @endforeach
                    @endif
            >
            <label class="form-check-label" for="pcb_1">{{ 'Biología' }}</label>
            {!! $errors->first('pcb_1', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('pcb_2') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="pcb_2" type="number" id="pcb_2" value="1"
                   @if(isset($carrera->codigo_carrera))
                   @foreach($pcbs as $pcb)
                   @if($pcb->id_pcb == 2)
                   checked
                    @endif
                    @endforeach
                    @endif
            >
            <label class="form-check-label" for="pcb_2">{{ 'Física' }}</label>
            {!! $errors->first('pcb_2', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('pcb_3') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="pcb_3" type="number" id="pcb_3" value="1"
                   @if(isset($carrera->codigo_carrera))
                   @foreach($pcbs as $pcb)
                   @if($pcb->id_pcb == 3)
                   checked
                    @endif
                    @endforeach
                    @endif
            >
            <label class="form-check-label" for="pcb_3">{{ 'Lenguaje' }}</label>
            {!! $errors->first('pcb_3', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('pcb_4') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="pcb_4" type="number" id="pcb_4" value="1"
                   @if(isset($carrera->codigo_carrera))
                   @foreach($pcbs as $pcb)
                   @if($pcb->id_pcb == 4)
                   checked
                    @endif
                    @endforeach
                    @endif
            >
            <label class="form-check-label" for="pcb_4">{{ 'Matemática' }}</label>
            {!! $errors->first('pcb_4', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-check {{ $errors->has('pcb_5') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="pcb_5" type="number" id="pcb_5" value="1"
                   @if(isset($carrera->codigo_carrera))
                   @foreach($pcbs as $pcb)
                   @if($pcb->id_pcb == 5)
                   checked
                    @endif
                    @endforeach
                    @endif
            >
            <label class="form-check-label" for="pcb_5">{{ 'Química' }}</label>
            {!! $errors->first('pcb_5', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-check form-check-inline {{ $errors->has('pruebaEspecifica') ? 'has-error' : ''}}">
            <input type="checkbox" class="form-check-input" name="pruebaEspecifica" type="number" id="pruebaEspecifica" value="1"
                   @if(isset($carrera->pruebaEspecifica))
                   @if($carrera->pruebaEspecifica > 0)
                   checked
                    @endif
                    @endif
            >
            <label class="form-check-label" for="pruebaEspecifica">{{ 'Prueba Específica' }}</label>
            {!! $errors->first('pruebaEspecifica', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div align="center" class="py-2">
        <input class="btn btn-primary btn-sm col-md-3" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>

@section('javascript')
    <script type="text/javascript">
        $("#codigo_unidad_academica").click(function(){
            $.ajax({
                url: "{{ route('extension.get_by_ua') }}?codigo_unidad_academica=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#codigo_extension').html(data.html);
                }
            });
        });
    </script>
@endsection
