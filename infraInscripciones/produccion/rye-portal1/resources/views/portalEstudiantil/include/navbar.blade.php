<header id="header" class="header-horizontal dark">

    <!-- Module - Navigation -->
    <nav id="navigation-main" class="module module-nav">
        <ul class="nav nav-main-horizontal">
            <li><a href="{{url('/')}}">Inicio</a></li>
            <li><a href="{{ route('tramites') }}">Trámites</a></li>
            <li class = "dropdown"><a href="#">Reglamentos</a><i class="bi bi-chevron-down"></i>
                <ul>
                    <ol>
                        <li><a href="{{ route('reglamento.estudiantil') }}">Reg. Estudiantil</a></li>
                        <li><a href="{{ route('reglamento.electoral') }}">Reg. Electoral</a></li>
                    </ol>
                
                </ul>
                
            </li>
        </ul>
        <div class="selector"></div>
    </nav>

    <!-- Module - Objects -->
    <div class="module module-object" align= "center">
        <span class="object-name" ><a href="#"><img src="{{ asset('assets2/img/logo2.svg')}}" width="85" alt=""></a></span>

    </div>

    <!-- Module - Language -->

    <!---- CSS Botones 3D -->
    <link rel="stylesheet" href="{{ asset('assets2/css/estilos_botones3D.css')}}">

    <nav class="module module-language mr-3">
                <ul class="nav nav-main-horizontal nav-language">
                    <a title="https://usac.edu.gt" href="https://usac.edu.gt" target="_blank">
                        <img src="{{ asset('assets2/img/logo_usac.png')}}" width="60" alt="" >
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <li><a href="{{ url('login')}}" style= "" ><button class="btn btn-default btn-lg btn3d">INICIO DE SESIÓN</button></a></li>
                </ul>
            </nav>

    <!-- Module - Navigation Toggle -->
    <div class="module module-nav-toggle">
        <a href="#" id="nav-toggle" class="nav-toggle"><span></span><span></span><span></span><span></span></a>
    </div>

</header>
@include('portalEstudiantil.pages.primerIngreso.calendario-de-inscripcion-capital')
@include('portalEstudiantil.pages.reingreso.calendario-de-inscripciones')
@include('portalEstudiantil.pages.postgrado.calendario-de-inscripciones')
@include('portalEstudiantil.pages.estadisticas.estadisticas')

