@extends('layouts.master')

@section('css')

<style>
.selected {
  opacity: 1
}
.unselected {
  opacity: 0.5
}
</style>
@endsection

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class="card">
    <div class="card-header">
        <h5>Administrativo :: Certificación Inscripciones</h5>
        @if($errors->any())
        <h6 style="color: red;">Estado de la solicitud: {{$errors->first()}}</h6>
        @endif
    </div>
    <div class="card-body">
    <div class="form-row justify-content-center bg-dark border-bottom border-dark">
            <div class="form-group col-sm-1 text-center my-auto">
            <p class="text-white my-auto">Carnet</p>
            </div>
            <div class="form-group col-sm-2 text-center my-auto">
            <p class="text-white my-auto">Cui/Pasaporte</p>
            </div>
            <div class="form-group col-sm-2 text-center my-auto">
            <p class="text-white my-auto">Nombre</p>
            </div>
            <div class="form-group col-sm-2 text-center my-auto">
            <p class="text-white my-auto">Facultad</p>
            </div>
            <div class="form-group col-sm-3 text-center my-auto">
            <p class="text-white my-auto">Carrera</p>
            </div>
            <div class="form-group col-sm-1 text-center my-auto">
            <p class="text-white my-auto">Firma</p>
            </div>
            <div class="form-group col-sm-1 text-center my-auto">
            <p class="text-white my-auto">Verificar</p>
            </div>
    </div>
    @if($solicitud_activa == null)
    <div class="form-row justify-content-center alert alert-danger" role="alert">Lo sentimos, no tienes ninguna solicitud de certificación activa...</div>
    <div class="form-row justify-content-center border-bottom">
    @endif
    @if(is_array($solicitud_activa) || is_object($solicitud_activa))
    @foreach($solicitud_activa as $solicitud_activa)
    <form id="cert_inscripciones" method="POST" action="{{route('administrativo.inscripciones.generaCertificacionInscripcion')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input hidden value="{{$solicitud_activa->carnet}}" id="carnet" name="carnet" />
    <input hidden value="{{$solicitud_activa->cui}}" id="cui" name="cui" /> 
    <input hidden value="{{$solicitud_activa->nombre}}" id="nombre" name="nombre" />
    <input hidden value="{{$solicitud_activa->cod_ua}}" id="cod_ua" name="cod_ua" />
    <input hidden value="{{$solicitud_activa->cod_ext}}" id="cod_ext" name="cod_ext" />
    <input hidden value="{{$solicitud_activa->cod_carrera}}" id="cod_carrera" name="cod_carrera" />
    <input hidden value="{{$solicitud_activa->facultad}}" id="facultad" name="facultad" />
    <input hidden value="{{$solicitud_activa->extension}}" id="extension" name="extension" />
    <input hidden value="{{$solicitud_activa->carrera}}" id="carrera" name="carrera" />
    <input hidden value="{{$solicitud_activa->estado}}" id="estado" name="estado" />
    <input hidden value="{{$solicitud_activa->correlativo}}" id="correlativo" name="correlativo" />  
    <input hidden value="{{$solicitud_activa->ciclo}}" id="ciclo" name="ciclo" /> 
    <input hidden value="{{$solicitud_activa->descripcion}}" id="descripcion" name="descripcion" /> 
    <input hidden value="{{$solicitud_activa->fecha_solicitud}}" id="fecha_solicitud" name="fecha_solicitud" />
    <input hidden value="{{$solicitud_activa->firma}}" id="firma" name="firma" /> 
    <input hidden value="{{$solicitud_activa->transaccion}}" id="transaccion" name="transaccion" />
    <input hidden value="{{$solicitud_activa->nivel}}" id="nivel" name="nivel"/>
    <input hidden value="{{$solicitud_activa->barcode}}" id="hash" name="hash"/>
    <input hidden value="{{$solicitud_activa->fechaVencimiento}}" id="fechaVencimiento" name="fechaVencimiento"/>
    <input hidden value="{{$solicitud_activa->codNacionalidad}}" id="codNacionalidad" name="codNacionalidad" />
    <input hidden value="{{$solicitud_activa->pasaporte}}" id="pasaporte" name="pasaporte" />
    <input hidden value="{{$solicitud_activa->sit_acad}}" id="sitAcademica" name="sitAcademica" />  
    <div class="form-row justify-content-center border-bottom border-left border-right">
        <div class="form-group col-sm-1 my-auto text-center">
        <p class="my-auto">{{$solicitud_activa->carnet}}</p>
        </div>
        @if($solicitud_activa->codNacionalidad == 30)
        <div class="form-group col-sm-2 my-auto text-center">
        <p class="my-auto">{{$solicitud_activa->cui}}</p>
        </div>
        @else
        <div class="form-group col-sm-2 my-auto text-center">
        <p class="my-auto">{{$solicitud_activa->pasaporte}}</p>
        </div>
        @endif
        <div class="form-group col-sm-2 my-auto">
        <p class="my-auto">{{$solicitud_activa->nombre}}</p>
        </div>
        <div class="form-group col-sm-2 my-auto text-center">
        <p class="my-auto">{{$solicitud_activa->facultad}}</p>
        </div>
        <div class="form-group col-sm-3 my-auto text-center">
        <p class="my-auto">{{$solicitud_activa->carrera}}</p>
        </div>
        <!--<div class="form-group col-sm-1 my-auto text-center">
        <p class="my-auto">{{\Carbon\Carbon::parse($solicitud_activa->fecha_solicitud)->format('d/m/Y')}}</p>
        </div> -->
        <div class="form-group col-sm-1 my-auto text-left">
        <input class="form-check-input" type="checkbox" value="JEFE" id="jefe{{$loop->index}}" name="jefe_firma[]" required>
        <label class="form-check-label" style="font-weight: 400;"  for="jefe{{$loop->index}}">Jefe</label>
        <br>
        <input class="form-check-input" type="checkbox" value="SUBJEFE" id="subjefe{{$loop->index}}" name="jefe_firma[]" required>
        <label class="form-check-label" style="font-weight: 400;" for="subjefe{{$loop->index}}">SubJefe</label>
        </div>
        <div class="form-group col-sm-1 my-auto text-center">
        <button type="submit" class="btn-sm btn-info my-auto">Generar</button>
        </div>
        </form>
    </div>
    @endforeach
    @endif
</div>
</div>

@endsection

@section('javascript')

<script>
    $('button[type="submit"]').on('click', function() {
        $cbx_group = $("input:checkbox[name='jefe_firma[]']");

        $cbx_group.prop('required', true);
        if($cbx_group.is(":checked")){
        $cbx_group.prop('required', false);
        }
    });
    
</script>

@endsection
