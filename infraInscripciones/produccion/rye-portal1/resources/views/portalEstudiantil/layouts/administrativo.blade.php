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
    <link href= "{{ asset('assets2/css/themes/theme-blue.css')}}" rel= "stylesheet">
    {{-- Sección para agregar css desde otro archivo --}}
    @yield('css')
</head>

<body>

    @include('portalEstudiantil.include.navbarAdmin')

    <div style="margin-bottom:100px">@yield('content')</div>

    @include('portalEstudiantil.include.footer')

    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{-- Sección para agregar javascripts desde otro archivo --}}
    @yield('javascript')
</body>

</html>