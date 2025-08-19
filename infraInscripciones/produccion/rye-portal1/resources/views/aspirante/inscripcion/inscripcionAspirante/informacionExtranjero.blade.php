@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" >
    <link href="{{asset('css/multiStepForm.css')}}" rel="stylesheet">
    <link href="{{asset('css/multiStepForm_dots.css')}}" rel="stylesheet">
@endsection

@section('content')
<style>
        ion-icon {
            color:#01fc01e0;
            font-size: 24px;
        }
    </style>
<div class="container">
   
    <div class="offset-1 col-md-10 mt-3">
        <div class="card">
                    <div class="card-header" style="background-color: #006994; color:white">
                        Graduados en el extranjero
                    </div>
                    <div class="card-body">
                        <h5>Requisitos de inscripción: </h5>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                                <span>
                                    Una fotografía tamaño cédula reciente y de estudio fotográfico.
                                </span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                                <span>Tarjeta de Orientación Vocacional (extendida por la Sección de Orientación Vocacional).</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Constancia de Prueba de Conocimientos Básicos con resultado SATISFACTORIO (extendida por  el SUN).</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Constancia de Pruebas Específicas con resultado SATISFACTORIO (extendida por la Unidad Académica).</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Preinscripción (Generada desde <a href='portalregistro.usac.edu.gt' >Portal Registro</a>)</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Equiparación de estudios, extendida por el Ministerio de Educación de Guatemala, o en las sedes  de las Dirección Departamentales del Ministerio de Educación. (No se aceptan constancias de  equiparación en trámite).</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Título o diploma (se devuelve después de la confrontación con fotostática).</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Fotostática del Título y de sus auténticas o apostilla, ambos lados, en tamaño 5” x 7” de estudio fotográfico.</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Certificación General de Estudios correspondiente al plan oficial que haya cursado en relación  equivalente al ciclo básico y diversificado. Deberán incluir las materias cursadas, el resultado  obtenido en los exámenes, notas de promoción y/o los métodos de evaluación utilizados  apostillados por su país.</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Partida de nacimiento apostillada o pasaporte y fotocopia del mismo, legalizado por notario guatemalteco.                   </span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Si la redacción está en idioma extranjero debe presentar traducción jurada por traductor jurado autorizado o por dos testigos que conozcan el idiioma original.</span>
                        </div>
                        <div class="mt-3">
                            <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> 
                            <span>Debe presentarse con papeleria completa a EFPEM en horario de 7:30hr a 13:00hr.</span>
                        </div>
                        
                    </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>  
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ioniWcons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection