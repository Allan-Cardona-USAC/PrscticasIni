@extends('portalEstudiantil.layouts.master')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="col-lg-12">
             <img value="estudiante" src="{{ asset('assets2/img/objects/pina.png')}}" width="80%">
             <h4 align="center">Primer Ingreso</h4>
        </div>
        <div class='card-body'>
            <form id='formDatos'>
                <div class='form-group row' align = "right">
                    <label for='nov' class='col-md-5 col-form-label'><strong>Número de Orientación Vocacional (N.O.V.)</strong></label>
                    <div class='col-md-4'>
                        <input type='text' id='nov' name='nov' class='form-control' autocomplete='off' pattern='\d+' required placeholder='2021000000'/>
                    </div>
                </div>
                <div class='form-group row' align = "right">
                    <label for='fNacimiento' class='col-md-5 col-form-label'><strong>Fecha de Nacimiento</strong></label>
                    <div class='col-md-4'>
                        <input type='date' id='fNacimiento' name='fNacimiento' class='form-control' required />
                    </div>
                </div>
                <div class="form-group" align="center">
                    <div id="validador" ></div>
                </div>
                <div class='form-group row' align = "center">
                    <div class='col-md-6'>
                        <input type='submit' value='Consultar' class='btn btn-primary'/>
                    </div>
                    <div class='col-md-6'>
                        <input type='reset' value='Cancelar' class='btn btn-danger'/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<div class='modal fade' id='dialogo' role='dialog'>
    <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header' style='background: #0F2949;'>
                <h5 class='modal-title' style='color: white;'>PIN</h5>
            </div>
            <div class='modal-body'>
                <div id='mensaje'>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type='text/javascript'>
    let gtoken = '';
    function eventoCaptcha(val){
        gtoken = val;
    }

    function eventoExpiro(val){
        gtoken = '';
    }
    $( window ).on( "load", function() { 
        let conf = {
            'callback': eventoCaptcha,
            'expired-callback': eventoExpiro,
            'sitekey': '6LcpF8kZAAAAAGfe7hLzvrfvlNVwivK-_2kKWryW'
        };
        grecaptcha.render('validador', conf);
     });

    $(document).ready( function(){
        $('#formDatos').submit( function(event){
            event.preventDefault();
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });

            if(gtoken.length == 0){
                let mensaje = '<br/><h4 align="center">Resuelva el captcha porfavor</h4>';
                mostrarMensaje(mensaje);
                return;
            }

            $.ajax({
                url:'/consulta_pin_aspirante',
                type: 'GET',
                dataType: 'JSON',
                contentType: false,
                data: {
                    'nov': $('#nov').val(),
                    'fNacimiento': $('#fNacimiento').val(),
                    'gtoken': gtoken
                },

                success: function(data){
                    let mensaje = data.estado?
                        '<h3 align = "center">'+ data.nombre1 +' '+ data.nombre2 + ' '+ data.apellido1 + ' '+ data.apellido2 + ' </h3><br><h4 align = "center"><strong>Tu pin es</strong></h4><h4 id= "pinexitoso" align = "center" style="font-family: \'Courier New\', monospace;">' + data.pin+'</h4>':
                        '<br><h4 align= "center"><strong>Los datos ingresados son incorrectos</strong></h4>';
                    mostrarMensaje(mensaje);
                },
                error: function(data){
                    let mensaje = '<br><h4 align= "center"><strong>Error de comunicación, intenta más tarde</strong><h4>'
                }
            });
        });
    });

    function mostrarMensaje(mensaje){
        $('#mensaje').empty();
        $('#mensaje').append(mensaje);
        $('#dialogo').modal('show');
    }
</script>
@endsection
