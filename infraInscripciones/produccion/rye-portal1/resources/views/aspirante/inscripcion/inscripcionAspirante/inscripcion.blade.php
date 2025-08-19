@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">
    

@endsection

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <div title="Click para Cerrar" id="carga" style="cursor:pointer;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;box-shadow:inset # 696763 0px 0px 14px;background-position:center;background-size:100%;background-color:# fff;width:300px;color:# fff;text-align:center;height:170px;padding:52px 12px 12px 12px;position:fixed;top:30%;left:40%;z-index:6;">
        <img AlternateText="Loading" src="{{asset('img/25.gif')}}" />
    </div>


    <div class="container">
        <br/>
        {{-- id necesario para el funcionamiento y estetica del formulario --}}
        <div id="multistepform" class = "w-100">

            {{-- Lista de pasos del formulario --}}
            <ul class="nav w-100">
                <li class="col"><a href="#step-1" class="disabled">PASO 1<br /><small>Fotografia</small></a></li>
                <li class="col"><a href="#step-2" class="disabled">PASO 2<br /><small>Identificaci&oacute;n</small></a></li>
                <li class="col"><a href="#step-3" class="disabled">PASO 3<br /><small>Validaci&oacute;n de T&iacute;tulo</small></a></li>
                <li class="col"><a href="#step-4" class="disabled">PASO 4<br /><small>Informaci&oacute;n</small></a></li>
                <li class="col"><a href="#step-5" class="disabled">PASO 5<br /><small>Editar Informaci&oacute;n</small></a></li>
                <li class="col"><a href="#step-6" class="disabled">PASO 6<br /><small>Generar Boleta</small></a></li>
            </ul>

            <div class="">
                {{-- Sube la Fotografia para el Perfil del Aspirante --}}
                <div id="step-1" class="">
                    @include('aspirante.inscripcion.inscripcionAspirante.steps.step-1')
                </div>

                {{-- Verificacion de Identidad --}}
                <div id="step-2" class="">
                    {{-- Carga de Partida de Nacimiento --}}
                    @include('aspirante.inscripcion.inscripcionAspirante.steps.step-2')
                </div>

                <div id="step-3" class="">
                    {{-- Ingreso de CUI para validacion de Titulo --}}
                    <div>
                        @include('aspirante.inscripcion.inscripcionAspirante.steps.step-3')
                    </div>                    
                </div>
                <div id="step-4" class="">
                    {{-- Ingreso de CUI para validacion de Titulo --}}
                    <div>
                        @include('aspirante.inscripcion.inscripcionAspirante.steps.step-4')
                    </div>                    
                </div>

                <div id="step-5">
                    {{-- Edicion de Campos para la Inscripcion del Estudiante --}}
                    <div>
                        @include('aspirante.inscripcion.inscripcionAspirante.steps.step-5')
                    </div>
                </div>

                <div id="step-6" class="">
                    {{-- Boleta de Pago y Constancia de Inscripcion --}}
                    <div>
                        @include('aspirante.inscripcion.inscripcionAspirante.steps.step-6')
                    </div>                    
                </div>
            </div>
        </div>       
    </div>
@endsection


@section('javascript')
{{--Importacion para alertas en forms --}}
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>  

{{--Importacion para Manejo de PDF's--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

{{--Importacion para el manejo de iconos --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ioniWcons@5.5.2/dist/ionicons/ionicons.js"></script>

{{--Importacion para configuraciones de multiStepForm --}}
<script src="{{ asset('js/multiStepForm.js') }}"></script>




<script type="text/javascript">

    $(document).ready(function() {
        cerrar();
        {{-- Configuración del MultiStepForm --}}
        $('#multistepform').smartWizard({
            selected: {{$estadoInscripcion}},   //Selecciona un step en especifico Iniciando desde 0
            keyNavigation:false,                //Quita la navegacion por teclado
            backButtonSupport: false,           //Deshabilita regresar al paso anterior con el teclado
            theme: 'dots',                      //Usa el tema de puntitos engazados
            enableURLhash: false, // Enable selection of the step based on url hash
            lang: {
                next: 'Siguiente',
                previous: 'Anterior'
            },
            anchorSettings: {
                anchorClickable: true,
                removeDoneStepOnNavigateBack: false
            },
            autoAdjustHeight: true,
            cycleSteps: false
        });

    });

    /**
    * Habilita los tooltips de Bootstrap
    */
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    /**
     * Modelado de Funcion Error
    */
   function errorModel(icon, title, message) {
        return {
            icon: icon,
            title: title,
            message: message
        }
   }

    /**
    * Funciones para Animaciones
    */

    function cargando() {
        $("#carga").animate({ "opacity": "1" }, 1000, function () { $("#carga").css("display", "Block"); });
    }

    function cerrar() {
        $("#carga").animate({ "opacity": "0" }, 1000, function () { $("#carga").css("display", "none"); });
    }

    function lanzarErrorSwal(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            html: text
        }); 
    }
                       
    </script>
@endsection
