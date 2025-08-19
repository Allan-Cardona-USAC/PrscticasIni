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
            <div class="row pl-3">
                <h6>Última Sesión: {{isset(Auth::guard('administrativo')->user()->ultima_sesion) ? Carbon\Carbon::parse(Auth::guard('administrativo')->user()->ultima_sesion)->format('d/m/Y, H:i:s') : ''}}</h6>
            </div>
            <div class="row">
                {{-- Datos Personales--}}
                <div class="col-sm-6">
                    <div class="card  bg-light">
                        <div class="card-header" style="background-color: #0F2949; color: white">
                            <b>Datos Personales</b>
                        </div>
                        <div class="card-body">
                                {{-- Nombre --}}
                                <div class="form-group row ">
                                    <label for="inputNombre" class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputNombre" value="{{Auth::guard('administrativo')->user()->nombre}}" readonly>
                                    </div>
                                </div>
                                {{-- End Nombre--}}
                                {{-- Nombre Corto--}}
                                <div class="form-group row ">
                                    <label for="inputNombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputNombreCorto" value="{{Auth::guard('administrativo')->user()->nom_corto}}" readonly>
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
                                        <textarea class="form-control" id="inputCorreo" name="mail" rows="2" readonly>{{$correos}}</textarea>
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
                                        <textarea class="form-control" id="inputCel" name="cel" rows="2" readonly>{{$telefonos}}</textarea>
                                    </div>
                                </div>
                                {{-- End Telefono--}}
                                <div align="center">
                                    <a href="{{ route('administrativo.editarPerfil') }}" class="btn btn-primary btn-sm col-sm-5">Editar</a>
                                </div>
                        </div>
                    </div>
                </div>
                {{-- End Datos Personales--}}
                {{-- Cambiar Contraseña--}}
                <div class="col-sm-6">
                    <div class="card bg-light">
                        <div class="card-header" style="background-color: #0F2949; color: white">
                            <b>Cambiar Contraseña</b>
                        </div>
                        <div class="card-body">
                            {{-- contraseña actual --}}
                            <form method="POST" action="{{ route('administrativo.cambiarPassword') }}" accept-charset="UTF-8" id="FormPassword">
                                {{ csrf_field() }}
                                <div class="form-group row {{ $errors->has('passActual') ? 'has-error' : ''}}">
                                    <label for="passActual" class="col-sm-6 col-form-label">Contraseña Actual</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="passActual"  name="passActual" type="password">
                                    </div>
                                </div>
                                {{-- End contraseña actual--}}
                                {{-- contraseña nueva --}}
                                <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password" class="col-sm-6 col-form-label">Contraseña Nueva</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="password" name="password" type="password">
                                    </div>
                                </div>
                                {{-- End contraseña nueva--}}
                                {{-- contraseña nueva --}}
                                <div class="form-group row">
                                    <label for="passConfirmar" class="col-sm-6 col-form-label">Confirmar Contraseña</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="passConfirmar" name="password_confirmation" type="password">
                                    </div>
                                </div>
                                {{-- End contraseña nueva--}}
                                <div align="center">
                                    <button type="submit" class="btn btn-primary btn-sm col-sm-5">
                                        {{ __('Cambiar Contraseña') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card alert-warning">
                        <div class="card-body" style="height: 9.5em;">
                            La contraseña debe tener:
                            <ul>
                                <li>Al menos 8 caracteres</li>
                                <li>Al menos una mayúscula</li>
                                <li>Al menos una minúscula</li>
                                <li>Al menos un número</li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- End Cambiar Contraseña--}}
            </div>
        </div>
    </div>
@endsection

