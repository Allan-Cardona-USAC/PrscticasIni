{{--@extends('estudiante.layouts.app')--}}
@extends('portalEstudiantil.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 5em;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-bg-primary">
                   <h1>Recuperar Contraseña</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert" role="alert" style="background-color: #FFDB58;">
                            <strong style='font-size: 1.3em; color: #191970;'>
                            {{ session('status') }}
                            <br/>
                            En caso de no recibir el correo de recuperación, debes ponerte en contacto con soporterye@adm.usac.edu.gt indicando tu Registro Académico.
                            </strong>
                        </div>
                    @endif
                    <br/>
                    <form method="POST" action="{{ route('estudiante.password.email') }}" aria-label="Recuperar contraseña">
                        @csrf
                        <div class="form-group row">
                            <label for="carnet" class="col-md-4 col-form-label text-md-right">Registro Académico (Carné)</label>
                            <div class="col-md-6">
                                <input id="carnet" type="text" pattern="\d+" placeholder="201900000" class="form-control{{ $errors->has('carnet') ? ' is-invalid' : '' }} form-control-sm" name="carnet" value="{{ old('carnet') }}" required autofocus>
                                @if ($errors->has('carnet'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('carnet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" id='gtoken' required name='gtoken'/>
                        <div class="form-group" align="center">
                            <div id="validador" ></div>
                            
                        </div>
                        @if ($errors->has('gtoken'))
                            <script>
                                var noToken = true;
                                console.log('{{ $errors->first("gtoken") }}');
                            </script>
                        @endif
                        <br/>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Enviar link de recuperación
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>
<script>
    function eventoCaptcha(val){
        let gtoken = document.getElementById('gtoken');
        gtoken.value = val;
        console.log(val);
    }

    function eventoExpiro(val){
        let gtoken = document.getElementById('gtoken');
        gtoken.value = '';
    }

    $( window ).on( "load", function() {
        let conf = {
            'callback': eventoCaptcha,
            'expired-callback': eventoExpiro,
            'sitekey': '6LcpF8kZAAAAAGfe7hLzvrfvlNVwivK-_2kKWryW'
        };
        grecaptcha.render('validador', conf);
     });
     if(noToken){
         Swal.fire({
            title: 'Captcha',
            text: 'Debe resolver el captcha',
            icon: 'error'
         });
     }
</script>
@endsection
