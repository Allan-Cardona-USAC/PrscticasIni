@extends('portalEstudiantil.layouts.master')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <br><br>
            </span>
            </span>
                <div class="card-header">{{ __('Ingresa tus credenciales') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="selectRol" class="col-sm-4 col-form-label text-md-right">Elige tu grupo</label>
                        <div class="col-md-6">
                            <a  onchange="SeleccionGrupo(this);" onload="SeleccionGrupo(this);" class="form-control form-control-sm" name="selectRol" id="selectRol">
                                <img @if($rol=='aspirante') selected @endif value="aspirante" src= "{{ asset('assets2/img/login/7.png')}}" width="250" alt="">
                                <option @if($rol=='estudiante') selected @endif value="estudiante">Estudiante</option>
                                <option @if($rol=='administrativo') selected @endif value="administrativo">Personal Administrativo</option>
                            </a>
                        </div>
                    </div>
                    
                    @include('aspirante.auth.login-form')
                    @include('estudiante.auth.login-form')
                    @include('administrativo.auth.login-form')
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="row py-5" style="align-items:center;">
        <div class="mx-auto col-lg-5">
            <div class="card border-primary" >
                <div class="card-body">
                    <legend>Ingresa tus credenciales</legend>
                    <div class="form-group">
                        <label for="selectRol" >Elige tu grupo</label>
                        
                        <a  onchange="SeleccionGrupo(this);" onload="SeleccionGrupo(this);" class="form-control form-control-sm" name="selectRol" id="selectRol">
                            <img @if(request()->get('rol')=='aspirante') selected @endif value="aspirante" src= "{{ asset('assets2/img/login/7.png')}}" width="250" alt="">Aspirante
                            <option @if(request()->get('rol')=='estudiante') selected @endif value="estudiante">Estudiante</option>
                            <option @if(request()->get('rol')=='administrativo') selected @endif value="administrativo">Personal Administrativo</option>
                        </select>
                    </div>
                    <form  method="POST" action="{{ route('aspirante.login') }}" id="FormAspirante"  @if(request()->get('rol')=='aspirante' || request()->get('')==null) style="display: block;" @else style="display: none;" @endif>
                        <fieldset>
                            <div class="form-group">
                                <label for="nov">N.O.V</label>
                                <input type="text" class="form-control form-control-sm" id="nov" name="nov" placeholder="Ingresa tu número de orientación vocacional" required>
                            </div>
                            <div class="form-group">
                                <label for="pin">Pin</label>
                                <input type="password" class="form-control form-control-sm" id="pin" name="pin" placeholder="Pin" required>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
                            </div>
                        </fieldset>
                    </form>
                    <form  method="POST" action="{{ route('estudiante.login') }}" id="FormEstudiante" @if(request()->get('rol')!='estudiante') style="display: none;" @endif>
                        <fieldset>
                            <div class="form-group">
                                <label for="carnet" align= "center">Registro Académico</label>
                                <input type="text" class="form-control form-control-sm" id="carnet" name="carnet" placeholder="Ingresa tu número de registro académico" required>
                            </div>
                            <div class="form-group">
                                <label for="pin" align= "center">Pin</label>
                                <input type="password" class="form-control form-control-sm" id="pin" placeholder="Pin" required>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
                            </div>
                        </fieldset>
                    </form>
                    <form method="POST" action="{{ route('aspirante.login') }}" id="FormAdministrador" @if(request()->get('rol')!='administrativo') style="display: none;" @endif>
                        <fieldset>
                            <div id="inputAdministrativo"  class="form-group">
                                <label for="inputdependencia">Dependencia</label>
                                <input type="text" class="form-control form-control-sm" id="inputdependencia" placeholder="Dependencia" required>
                            </div>
                            <div id="inputAdministrativo1" class="form-group">
                                <label for="inputUsuario">Usuario</label>
                                <input type="text" class="form-control form-control-sm" id="inputUsuario" placeholder="Ingresa CUI" required>
                            </div>
                            <div id="inputAdministrativo2" class="form-group">
                                <label for="inputPassword">Contraseña</label>
                                <input type="password" class="form-control form-control-sm" id="inputPassword" placeholder="Contraseña" required>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <small>Si eres alumno de primer ingreso y aún no tienes una cuenta haz click <a href="{{url('/signup')}}">aquí</a>.</small>
            <br>
            <small>Si eres personal administrativo y olvidaste tu contraseña haz click <a href="{{url('/ingresocui')}}">aquí</a>.</small>
        </div>
    </div>
    --}}
</div>
    <script>
        function SeleccionGrupo(select) {
            if (select.value == "administrativo") {
                document.getElementById("FormAspirante").style.display = "none";
                document.getElementById("FormEstudiante").style.display = "none";
                document.getElementById("FormAdministrador").style.display = "block";
            } else if(select.value == "estudiante"){
                document.getElementById("FormAspirante").style.display = "none";
                document.getElementById("FormEstudiante").style.display = "block";
                document.getElementById("FormAdministrador").style.display = "none";
            } else if(select.value == "aspirante"){
                document.getElementById("FormAspirante").style.display = "block";
                document.getElementById("FormEstudiante").style.display = "none";
                document.getElementById("FormAdministrador").style.display = "none";
            }
        }
    </script>

@endsection