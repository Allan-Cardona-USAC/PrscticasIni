@extends('layouts.master')

@section('content')

<div class="row w-100">
    @if($esEstudiante)
      @if($carnetestudiante<$ciclo*100000)
        <div class="alert alert-danger w-100" role="alert">
          <h4>Ya eres estudiante regular, ingresa al portal utilizando el grupo "Estudiante"</h4>
        </div>
      @else
        @if($mostrarConstancia)
        <div class="alert alert-success w-100" role="alert">
          <h4>Puedes descargar tu constancia, en el boton "Descargar Constancia Inscripción"</h4>
        </div>
        @else
        <div class="alert alert-warning w-100" role="alert">
          <h4>Su pago aún no se ha registrado, regrese más tarde</h4>
        </div>
        @endif
      @endif
    @endif

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 mx-auto">
    <div class="card mx-auto">
      <div class="card-header">
        <h3><i class="fa fa-address-card-o"></i> Datos personales</h3>
    </div>
    <div class="card-body">
            
          <h1 class="profile-username text-center">
          {{ Auth::guard('aspirante')->user()->nombre1 . ' ' . Auth::guard('aspirante')->user()->apellido1 }}
          </h1>
          <h3 class="text-muted text-center">
              PIN: {{ Auth::guard('aspirante')->user()->pin }}
          </h3>	
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="carnet">N.O.V</label>
                <input type="text" class="form-control" id="carnet" name="carnet" 
                  value="{{ Auth::guard('aspirante')->user()->nov  }}"
                  readonly
                >
            </div>
            <div class="form-group col-md-4">
              <label for="cui">CUI</label>
                <input type="text" class="form-control" id="cui" name="cui"
                  value="{{ Auth::guard('aspirante')->user()->numero_registro }}" readonly />
            </div>
          </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="nombre">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" 
                  value="{{ Auth::guard('aspirante')->user()->getNombreCompleto() }}"
                  readonly
                >
              </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-12">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" 
                value="{{ Auth::guard('aspirante')->user()->direccion }}"
                readonly
              >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-9">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" 
                    value="{{ Auth::guard('aspirante')->user()->correo_electronico }}"
                    readonly
                >
            </div>
            <div class="form-group col-md-3">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular"  name="celular"
                  value="{{ Auth::guard('aspirante')->user()->celular }}"
                  readonly
              >
            </div>
            @if($mostrarConstancia)
              <form action="{{ url('estudiante/reinscripcion/constancia') }}" method="GET"> 
                <input hidden value="{{$ciclo}}" id="ciclo" name="ciclo"/>
                <input hidden value="{{$carnetestudiante}}" id="carnet" name="carnet"/>
                <input hidden value="{{$cui}}" id="cui" name="cui">
                <input hidden value="{{$nombreCompleto}}" id="nombreCompleto" name="nombreCompleto"/>
                <input hidden value="{{$car}}" id="car" name="car"/>
                <input hidden value="{{$ua}}" id="ua" name="ua"/>
                <input hidden value="{{$ext}}" id="ext" name="ext"/>
                <input hidden value="{{$no_bol}}" id="no_bol" name="no_bol"/>
                <input hidden value="{{$fecha_insc->format('d/m/Y')}}" id="fecha_insc" name="fecha_insc"/>
                <input hidden value="{{$fecha_pago->format('d/m/Y')}}" id="fecha_pago" name="fecha_pago"/>
                <input hidden value="{{$transaccion}}" id="transaccion" name="transaccion"/>
                <input type="submit" value="Descargar Constancia Inscripción" class="btn btn-primary btn-lg btn-block mt-2"/>
              </form>
            @endif
      </div>
@endsection
