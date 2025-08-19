@extends('portalEstudiantil.layouts.master')

@section('content')

<div class="slide-content container text-center" loading="lazy" >

    <div class="row" >
    <style>
        .botones {
            background-color: #C2E4F4; 
            color: #0f2649;
            border: solid gray;
            font-family: Courier, 'Lucida Console', monospace; 
            font-size: 18px;
            margin-bottom: 10%;
            margin-top:10%;
        }
    </style>
        <div class="col-xl align-self-center  border border-primary" style=" background-color: white; border-radius: 3%; box-shadow: 20px 20px 0px rgb(181, 179, 179); margin-left: 4%; margin-top: 5%; margin-right: 2%;margin-bottom:3.5%; border: 4.5px solid rgb(22, 22, 107);" >
                <div class="row-sm  " >
                    <img  src="{{ asset('assets2/img/login/7.svg')}}" alt="Aspirante" style="width: 100%; height:100%;">
                </div>
                <div>
                <a class="btn btn-primary btn-lg botones" href='#FormAspirante' onclick="SeleccionGrupo('aspirante');" role="button">Iniciar Sesión </a>
                </div>
        </div>
        
        <div class="col-xl align-self-center  border border-primary" style=" background-color: white; border-radius: 3%; box-shadow: 20px 20px 0px rgb(181, 179, 179); margin-left: 3%; margin-top: 5%; margin-right: 2%;margin-bottom:3.5%; border: 4.5px solid rgb(22, 22, 107);" >
                <div class="row-sm  " >
                    <img  src="{{ asset('assets2/img/login/5.svg')}}" alt="Estudiante" style="width: 100%; height:100%;">
                </div>
                <div>
                <a class="btn btn-primary btn-lg botones" href='#FormEstudiante' onclick="SeleccionGrupo('estudiante'); " role="button">Iniciar Sesión </a>
                
                </div>
        </div>

        <div class="col-xl align-self-center  border border-primary" style=" background-color: white; border-radius: 3%; box-shadow: 20px 20px 0px rgb(181, 179, 179); margin-left: 3%; margin-top: 5%; margin-right: 5%;margin-bottom:3.5%; border: 4.5px solid rgb(22, 22, 107);" >
                <div class="row-sm  " >
                    <img  src="{{ asset('assets2/img/login/6.svg')}}" alt="PersonalAdministrativo" style="width: 100%; height:100%;">
                </div>
                <div>
                <a class="btn btn-primary btn-lg botones"  href='#FormAdministrador' onclick="SeleccionGrupo('administrativo'); " role="button">Iniciar Sesión </a>
                
                </div>
        </div>

        <div  class ="col-lg-12" id= "card" align = "center" style="background-color: #0f2949, color: #ffffff">
            <br>
            <br>
            <div class="card"  style="background-color: #0f2949, color: #ffffff" >

                <div class="card-body border border-primary rounded"  style="background-color: white;  box-shadow: 20px 20px 0px rgb(181, 179, 179);">
                    <div class="card-text" id="bienvenida-aspirante" @if($rol=='aspirante' || $rol==null) style="display: block;" @else style="display: none;" @endif>
                        <h5>Bienvenido al portal de aspirantes de la Universidad de San Carlos de Guatemala. </h5>
                        <b>Para realizar preinscripción ingresa con tu Número de Orientación Vocacional (NOV) y PIN.</b>
                    </div>
                    <div class="card-text" id="bienvenida-estudiante" @if($rol=='estudiante' || $rol==null) style="display: block;" @else style="display: none;" @endif>
                        <h5>Bienvenido al portal estudiantil de la Universidad de San Carlos de Guatemala.</h5>
                        <b>Para obtener más información ingresa con tu Registro Académico (Carné) y contraseña.</b>
                    </div>
                    <div class="card-text" id="bienvenida-administrativo" @if($rol=='administrativo' || $rol==null) style="display: block;" @else style="display: none;" @endif>
                        <h5>Bienvenido al Portal Administrativo de la Universidad de San Carlos de Guatemala.</h5>
                        <a href="https://portalregistro.usac.edu.gt/img/documentos/Cargapruebasespecificas.pdf">Procedimiento para subir pruebas especificas</a>
                        <a href="https://portalregistro.usac.edu.gt/img/documentos/SOLICITUDDEUSUARIOPORTALREGISTRO.pdf">Procedimiento para solicitar usuario</a>
                    </div> 

                    @if ($errors->has('usuario'))
                    <p style="color:red"><strong>{{ $errors->first('usuario') }}</strong></p>
                @endif
                    <br/>
                            

                    @include('aspirante.auth.login-form')
                    <!-- aspirante login form - end -->

                    <!-- estudiante login form - start -->
                    @include('estudiante.auth.login-form')
                    <!-- estudiante login form - end -->

                    <!-- administrativo login form - start -->
                    @include('administrativo.auth.login-form')
                    <!-- administrativo login form - end -->
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
    
@endsection
@section('javascript')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
        function SeleccionGrupo(select) {
            if (select == "administrativo") {
                document.getElementById("card").style.display = "block";
                document.getElementById("FormAspirante").style.display = "none";
                document.getElementById("FormEstudiante").style.display = "none";
                document.getElementById("FormAdministrador").style.display = "block";

                document.getElementById("bienvenida-aspirante").style.display = "none";
                document.getElementById("bienvenida-estudiante").style.display = "none";
                document.getElementById("bienvenida-administrativo").style.display = "block";
            } else if(select == "estudiante"){
                document.getElementById("FormAspirante").style.display = "none";
                document.getElementById("card").style.display = "block";

                document.getElementById("FormEstudiante").style.display = "block";
                document.getElementById("FormAdministrador").style.display = "none";

                document.getElementById("bienvenida-aspirante").style.display = "none";
                document.getElementById("bienvenida-estudiante").style.display = "block";
                document.getElementById("bienvenida-administrativo").style.display = "none";
            } else if(select == "aspirante"){
                document.getElementById("FormAspirante").style.display = "block";
                document.getElementById("card").style.display = "block";
                document.getElementById("FormEstudiante").style.display = "none";
                document.getElementById("FormAdministrador").style.display = "none";

                document.getElementById("bienvenida-aspirante").style.display = "block";
                document.getElementById("bienvenida-estudiante").style.display = "none";
                document.getElementById("bienvenida-administrativo").style.display = "none";
            }else{
                document.getElementById("FormAdministrador").style.display = "none";
                document.getElementById("FormAspirante").style.display = "none";
                document.getElementById("card").style.display = "none";
                document.getElementById("FormEstudiante").style.display = "none";

                document.getElementById("bienvenida-aspirante").style.display = "none";
                document.getElementById("bienvenida-estudiante").style.display = "none";
                document.getElementById("bienvenida-administrativo").style.display = "none";
            }
        }
    let sl = document.getElementById("selectRol");
    SeleccionGrupo(sl);
    //document.getElementById("selectRol").style.display = "none";
    $( window ).on( "load", function() { 
            let stkey = '6LcpF8kZAAAAAGfe7hLzvrfvlNVwivK-_2kKWryW'
            
            grecaptcha.render('rg_estudiante', {
                'sitekey': stkey,
                'callback': function(val){
                    $('#rgtk_estudiante').val(val);
                },
                'expiered-callback': function(val){
                    $('#rgtk_estudiante').val(None);
                }
            });
            grecaptcha.render('rg_administrativo', {
                'sitekey': stkey,
                'callback': function(val){
                    $('#rgtk_admin').val(val);
                },
                'expiered-callback': function(val){
                    $('#rgtk_admin').val(None);
                }
            });
            grecaptcha.render('rg_aspirante', {
                'sitekey': stkey,
                'callback' : function(val){
                    $('#rgtk_aspirante').val(val);
                },
                'expired-callback': function(val){
                    $('#rgtk_aspirante').val(None);
                }
            });
        });
</script>
@endsection