@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Administrativo :: Perfil</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="row ">
                {{-- Datos Personales--}}
                <div class="offset-sm-3 col-sm-6">
                    <div class="card  bg-light">
                        <div class="card-header" style="background-color: #0F2949; color: white">
                            <b>Datos Personales</b>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('administrativo.guardarPerfil') }}" accept-charset="UTF-8" id="FormPerfil">
                                {{ csrf_field() }}
                                {{-- Nombre --}}
                                <div class="form-group row ">
                                    <label for="inputNombre" class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputNombre" value="{{Auth::guard('administrativo')->user()->nombre}}" readonly>
                                    </div>
                                </div>
                                {{-- End Nombre--}}
                                {{-- Nombre Corto --}}
                                <div class="form-group row ">
                                    <label for="inputNombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputNombreCorto"  name="nom_corto" value="{{Auth::guard('administrativo')->user()->nom_corto}}" readonly>
                                    </div>
                                </div>
                                {{-- End Nombre Corto--}}
                                {{-- Puesto --}}
                                <div class="form-group row">
                                    <label for="inputPuesto" class="col-sm-3 col-form-label">Puesto</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputPuesto" value="{{Auth::guard('administrativo')->user()->puesto}}" readonly>
                                    </div>
                                </div>
                                {{-- End Puesto--}}
                                {{-- Correo --}}
                                @php
                                    $correos = str_replace(",","\n",Auth::guard('administrativo')->user()->mail);
                                @endphp
                                <div class="form-group row {{ $errors->has('mail') ? 'has-error' : ''}}">
                                    <label for="inputCorreo" class="col-sm-3 col-form-label">Correo</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="inputCorreo" name="mail" rows="2">{{$correos}}</textarea>
                                    </div>
                                </div>
                                {{-- End Correo--}}
                                {{-- Fecha desactivacion --}}
                                @if(Auth::guard('administrativo')->user()->fecha_desactivacion === '0000-00-00')
                                    @php $fecha = 'Indefinido'@endphp
                                @else
                                    @php
                                        $fecha = Carbon\Carbon::parse(Auth::guard('administrativo')->user()->fecha_desactivacion)->format('d/m/Y')
                                    @endphp
                                @endif
                                <div class="form-group row">
                                    <label for="inputFechaDesactivción" class="col-sm-3 col-form-label">Fecha Desactivación</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputFechaDesactivción" value="{{$fecha}}"  readonly>
                                    </div>
                                </div>
                                {{-- End Fecha desactivacion--}}
                                {{-- Telefono --}}
                                @php
                                    $telefonos = str_replace(",","\n",Auth::guard('administrativo')->user()->cel);
                                @endphp
                                <div class="form-group row {{ $errors->has('cel') ? 'has-error' : ''}}">
                                    <label for="inputCel" class="col-sm-3 col-form-label">Teléfono</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="inputCel" name="cel" rows="2">{{$telefonos}}</textarea>
                                    </div>
                                </div>
                                {{-- End Telefono--}}
                                <div align="center">
                                    <button type="submit" class="btn btn-primary btn-sm col-sm-5">
                                        {{ __('Guardar') }}
                                    </button>
                                    <a href="{{ route('administrativo.dashboard') }}" class="btn btn-danger btn-sm col-sm-5">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End Datos Personales--}}
            </div>
        </div>
    </div>
@endsection
