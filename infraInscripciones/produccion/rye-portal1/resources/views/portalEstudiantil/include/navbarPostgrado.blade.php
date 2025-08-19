<div class="sticky-top">
        {{-- Navbar grande --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">

                {{-- Logo --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-rye-225x75.png') }}"/>
                </a>

                {{-- Botón Responsivo / Botón Hamburguesa --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-gray" aria-controls="navbar-gray" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Links del nav grande --}}
                <div class="collapse navbar-collapse" id="navbar-gray">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="{{ url('/') }}">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="drpReglamentos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reglamentos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="drpReglamentos">
                                <a class="dropdown-item{{ Request::is('reglamentoestudiantil') ? ' active' : '' }}" href="{{ url('/reglamentoestudiantil') }}">Reglamento estudiantil</a>
                                <a class="dropdown-item{{ Request::is('reglamentoelectoral') ? ' active' : '' }}" href="{{ url('/reglamentoelectoral') }}">Reglamento electoral</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('login') ? ' active' : '' }}" href="{{ url('/login') }}">Inicio de sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container ">
                    <ul class="navbar-nav mr-auto py-1">
                        <div class="row"style="float: none; position: absolute; top: 50%;left: 50%; transform: translate(-50%, -50%);">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="drpPrimerIngreso" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Primer Ingreso
                                </a>
                                <div class="dropdown-menu" aria-labelledby="drpPrimerIngreso">
                                    <a class="dropdown-item{{ Request::is('signup') ? ' active' : '' }}" href="{{ url('/signup') }}"">Regístrate</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item disabled" href="#">Calendario de inscripciones</a>
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalCalendarioDeInscripcionesCapital">&emsp;Capital</a>
                                    <a class="dropdown-item" href="#">&emsp;Centros Universitarios</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item disabled" href="#">Valor de la matrícula</a>
                                    <a class="dropdown-item" href="#">&emsp;Guatemaltecos</a>
                                    <a class="dropdown-item" href="#">&emsp;Extranjeros</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="drpReingreso" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Reingreso
                                </a>
                                <div class="dropdown-menu" aria-labelledby="drpReingreso">
                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalReingresoCalendarioDeInscripciones">Calendario de Inscripciones</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="drpPostgrado" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Postgrado
                                </a>
                                <div class="dropdown-menu" aria-labelledby="drpPostgrado">
                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalPostgradoCalendarioDeInscripciones">Calendario de Inscripciones</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-toggle="modal" data-target="#modalEstadisticas">Estadísticas</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav> -->
        {{-- Navbar Pequeño --}}
        <ul class="nav bg-blue justify-content-center">

            {{-- Primer Ingreso --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="drpPrimerIngreso" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Primer Ingreso
                </a>
                <div class="dropdown-menu" aria-labelledby="drpPrimerIngreso">
                    <a class="dropdown-item{{ Request::is('signup') ? ' active' : '' }}" href="{{ url('/signup') }}"">Regístrate</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="#">Calendario de inscripciones</a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalCalendarioDeInscripcionesCapital">&emsp;Capital</a>
                    <a class="dropdown-item" href="#">&emsp;Centros Universitarios</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="#">Valor de la matrícula</a>
                    <a class="dropdown-item" href="#">&emsp;Guatemaltecos</a>
                    <a class="dropdown-item" href="#">&emsp;Extranjeros</a>
                </div>
            </li>

            {{-- Reingreso --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="drpReingreso" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reingreso
                </a>
                <div class="dropdown-menu" aria-labelledby="drpReingreso">
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalReingresoCalendarioDeInscripciones">Calendario de Inscripciones</a>
                </div>
            </li>

            {{-- Postgrado --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="drpPostgrado" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Postgrado
                </a>
                <div class="dropdown-menu" aria-labelledby="drpPostgrado">
                <a class="dropdown-item" href="{{ url('/reinscripcion') }}">Inscripción</a>
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalPostgradoCalendarioDeInscripciones">Calendario de Inscripciones</a>
                </div>
            </li>

            {{-- Estadísticas --}}
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#modalEstadisticas">Estadísticas</a>
            </li>
        </ul>
    </div>
    @include('portalEstudiantil.pages.primerIngreso.calendario-de-inscripcion-capital')
    @include('portalEstudiantil.pages.reingreso.calendario-de-inscripciones')
    @include('portalEstudiantil.pages.postgrado.calendario-de-inscripciones')
    @include('portalEstudiantil.pages.estadisticas.estadisticas')
