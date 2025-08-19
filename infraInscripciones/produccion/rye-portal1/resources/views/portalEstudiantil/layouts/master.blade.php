<!doctype html>
<html>

<head>
    <title>{{$title}} - Departamento de Registro y Estadística</title>
    <meta charset="utf-8">
    <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">
    <meta name="keywords" content="USAC,RyE,Primer Ingreso">
    <meta name="author" content="USAC">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropdownSubmenu.css') }}" rel="stylesheet">
    <link href= "{{ asset('assets2/css/themes/theme-blue.css')}}" rel= "stylesheet">
    {{-- Sección para agregar css desde otro archivo --}}
    @yield('css')
</head>

<body>

    @include('portalEstudiantil.include.navbar')
    <br>
    <br>
    <div>
        @yield('content')
    </div>

    {{-- Modals --}}

@include('portalEstudiantil.pages.primerIngreso.aspirantesInfoUsac')
@include('portalEstudiantil.pages.contactanos.InforPrimerIngreso')
    @include('portalEstudiantil.pages.contactanos.InfoArchivo')
    @include('portalEstudiantil.pages.contactanos.infoReingreso')
    @include('portalEstudiantil.pages.contactanos.InfoCertificaciones')
    @include('portalEstudiantil.pages.contactanos.InfoDudas')
    @include('portalEstudiantil.pages.contactanos.InfoEquivalencias')
@include('portalEstudiantil.pages.servicios.titulos.titulo')
    @include('portalEstudiantil.pages.servicios.carne.carne')
    @include('portalEstudiantil.pages.estadisticas.estadistica')
@include('portalEstudiantil.pages.equivalencias.equivalencias')
    @include('portalEstudiantil.pages.incorporaciones.incorporaciones')
    @include('portalEstudiantil.pages.titulos.titulos')
    @include('portalEstudiantil.pages.formularios.formularios')
    @include('portalEstudiantil.pages.nosotros.historia')
    @include('portalEstudiantil.pages.nosotros.mision')
    @include('portalEstudiantil.pages.nosotros.vision')
    @include('portalEstudiantil.pages.nosotros.organigrama')
    @include('portalEstudiantil.pages.nosotros.autoridades')
    @include('portalEstudiantil.pages.servicios.archivoEstudiantil')
    @include('portalEstudiantil.pages.servicios.cambiosDeCarrera')
    @include('portalEstudiantil.pages.servicios.carrerasSimultaneas')
    @include('portalEstudiantil.pages.servicios.certificaciones')
    @include('portalEstudiantil.pages.servicios.eventosElectorales')
    @include('portalEstudiantil.pages.servicios.retiroDeMatricula')
    @include('portalEstudiantil.pages.servicios.tramites')
    @include('portalEstudiantil.pages.servicios.traslados')
    @include('portalEstudiantil.pages.servicios.carne.emision')
    @include('portalEstudiantil.pages.servicios.carne.reporteDePerdida')
    @include('portalEstudiantil.pages.servicios.carne.reposicion')
    @include('portalEstudiantil.pages.servicios.estadisticas.publicacionesRecientes')
    @include('portalEstudiantil.pages.servicios.estadisticas.solicitudDeInformacion')
    @include('portalEstudiantil.pages.servicios.inscripciones.pregrado.primerIngreso')
    @include('portalEstudiantil.pages.servicios.inscripciones.pregrado.reingreso')
    @include('portalEstudiantil.pages.servicios.inscripciones.postgrado.primerIngreso')
    @include('portalEstudiantil.pages.servicios.inscripciones.postgrado.reingreso')
    @include('portalEstudiantil.pages.servicios.titulos.impresion')
    @include('portalEstudiantil.pages.servicios.titulos.reimpresion')
    @include('portalEstudiantil.pages.servicios.titulos.reposicion')
    @include('portalEstudiantil.pages.servicios.preinscripcion')
    @include('portalEstudiantil.pages.unidadesAcademicas.agronomia')
    @include('portalEstudiantil.pages.unidadesAcademicas.arquitectura')
    @include('portalEstudiantil.pages.unidadesAcademicas.economicas')
    @include('portalEstudiantil.pages.unidadesAcademicas.juridicas')
    @include('portalEstudiantil.pages.unidadesAcademicas.medicina')
    @include('portalEstudiantil.pages.unidadesAcademicas.farmacia')
    @include('portalEstudiantil.pages.unidadesAcademicas.humanidades')
    @include('portalEstudiantil.pages.unidadesAcademicas.ingenieria')
    @include('portalEstudiantil.pages.unidadesAcademicas.odontologia')
    @include('portalEstudiantil.pages.unidadesAcademicas.veterinaria')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunoc')
    @include('portalEstudiantil.pages.unidadesAcademicas.psicologia')
    @include('portalEstudiantil.pages.unidadesAcademicas.historia')
    @include('portalEstudiantil.pages.unidadesAcademicas.trabajoSocial')
    @include('portalEstudiantil.pages.unidadesAcademicas.comunicacion')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunor')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunori')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunoroc')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunsur')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunsuroc')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunsurori')
    @include('portalEstudiantil.pages.unidadesAcademicas.cema')
    @include('portalEstudiantil.pages.unidadesAcademicas.cusam')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunizab')
    @include('portalEstudiantil.pages.unidadesAcademicas.efpem')
    @include('portalEstudiantil.pages.unidadesAcademicas.linguistica')
    @include('portalEstudiantil.pages.unidadesAcademicas.maya')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunsaro')
    @include('portalEstudiantil.pages.unidadesAcademicas.arte')
    @include('portalEstudiantil.pages.unidadesAcademicas.fisicaMatematica')
    @include('portalEstudiantil.pages.unidadesAcademicas.cunsac')
    @include('portalEstudiantil.pages.unidadesAcademicas.administracionPublica')


    {{-- footer --}}
    @include('portalEstudiantil.include.footer')

    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dropdownSubmenu.js') }}"></script>
    <script src="{{ asset('js/navbar.js')}}"></script>
    {{-- Sección para agregar javascripts desde otro archivo --}}
    @yield('javascript')
</body>

</html>
