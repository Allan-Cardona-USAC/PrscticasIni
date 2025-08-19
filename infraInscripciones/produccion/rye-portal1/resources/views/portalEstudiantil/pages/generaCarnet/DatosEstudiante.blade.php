<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Validacion de Carné - Portal Registro y Estadística</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets2/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets2/img/favicon_60x60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets2/img/favicon_76x76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets2/img/favicon_120x120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets2/img/favicon_152x152.png') }}">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets2/plugins/bootstrap/dist/css/bootstrap.min.css ') }}" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="{{ asset('assets2/css/themify-icons.css ') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/font-awesome/css/font-awesome.min.css ') }}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{ asset('assets2/css/themes/theme-blue.css') }}" />


</head>

<body class="header-horizontal dark-overlay">

    <!-- Body Wrapper -->
    <div id="body-wrapper">

        <!-- Header -->
        <header id="header" class="header-horizontal dark">

            <!-- Module - Navigation Back -->
            <div class="module module-back">
                <a href="{{ url('/') }}" class="nav-back"><i class="fa fa-angle-left"></i></a>
            </div>

            <!-- Module - Navigation -->
            <nav id="navigation-main" class="module module-nav">
                <div class="selector"></div>
            </nav>

            <!-- Module - Objects -->
            <div class="module module-object" align="center">
                <span class="object-name"><a href="#"><img src="{{ asset('assets2/img/logo2.svg') }}" width="85"
                            alt=""></a></span>

            </div>




        </header>
        <!-- Header / End -->

        <!-- Content -->
        <div id="content" style="background: #eceff1 !important; min-height: 100vh;">
            <div class="container mt-5">
                @if (!$error)
                    <div class="row" style="min-height:30vh">
                        <div class="col-12 col-sm-4 col-lg-4 text-center bg-white shadow-sm rounded">
                            <img src="https://registro.usac.edu.gt/images/Carne/{{ $carnetmd5 }}?{{ $uid }}.jpg"
                                class="card-img-top" alt="Fotografia Pendiente"
                                style="width:13rem; height:15rem; margin:auto;">
                            <br>
                            <h5 class="mt-4">{{ $nombreEstudiante }}</h5>
                        </div>
                        <div class="col-0 col-sm-1 col-lg-1"></div>
                        <div class="col-12 col-sm-7 col-lg-7  mt-2 mt-md-0 bg-white shadow-sm rounded ">
                            <div class="row pt-4 pl-2 d-flex">
                                <div class="col-sm-3 align-self-center">
                                    <h6 class="mb-0 ">Nombre Completo</h6>
                                </div>
                                <div class="col-sm-9  align-self-center">
                                    {{ $nombreEstudiante }}
                                </div>
                            </div>
                            <hr class="mt-5 mb-4">
                            <div class="row  pl-2 d-flex">
                                <div class="col-sm-3 align-self-center">
                                    <h6 class="mb-0 ">CUI</h6>
                                </div>
                                <div class="col-sm-9 align-self-center">
                                    {{ $cui }}
                                </div>
                            </div>
                            <hr class="mt-5 mb-4">
                            <div class="row  pl-2 pb-2 d-flex">
                                <div class="col-sm-3 align-self-center">
                                    <h6 class="mb-0 ">Registro Academico</h6>
                                </div>
                                <div class="col-sm-9 align-self-center">
                                    {{ $carnet }}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="text-center"><span class="h5">Inscripciones para el Ciclo
                                    {{ $ciclo }}</span></div>
                            <div class="mt-4">
                                <ul class="list list-inline">
                                    @if (count($carreras) > 0)
                                        @foreach ($carreras as $carrera)
                                            <li class="d-flex justify-content-between bg-white p-4 mt-2">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="ml-3">
                                                        <h6 class="mb-0">{{ $carrera->carrera }}</h6>
                                                        <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                                            <div><i class="fa fa-calendar-o"></i><span
                                                                    class="ml-2">{{ date('d/m/Y', strtotime($carrera->fecha_inscripcion)) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="d-flex flex-column mr-2">
                                                        <div class="p-1" style="font-size:0.9rem;">
                                                            <a class="btn btn-primary" data-toggle="collapse"
                                                                href="#collapseCarrera{{ $carrera->idCarrera }}"
                                                                role="button" aria-expanded="false"
                                                                aria-controls="collapseExample">
                                                                Situacion Academica <span
                                                                    class="badge badge-dark">{{ count($carrera->msj) }}</span>
                                                            </a>

                                                            <div class="collapse mt-2"
                                                                id="collapseCarrera{{ $carrera->idCarrera }}">
                                                                <ul class="list-group">
                                                                    @foreach ($carrera->msj as $mensaje)
                                                                        <li class="list-group-item">{{ $mensaje }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        @if ($existeCarnet)
                                            <div class="alert alert-primary mt-4 text-white"  style="background-color:#1565c0" role="alert">
                                                Este carné fue entregado unicamente en Registro y Estadistica
                                            </div>
                                        @endif
                                    @else
                                        <div class="alert alert-danger" role="alert">
                                            No está inscrito en ninguna carrera
                                        </div>

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row text-center d-flex" style="min-height:80vh;">
                        <div class="col-12 align-self-center">
                            <div class="error-template">
                                <h1>
                                    Oops!</h1>
                                <h2>
                                    404 Not Found</h2>
                                <div class="error-details">
                                    Lo sentimos, se ha producido un error, no se ha encontrado la página solicitada.
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>



        </div>
        <!-- Content / End -->



    </div>



    <!-- JS Plugins -->
    <script src="{{ asset('assets2/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- JS Core -->
    <script src="{{ asset('assets2/js/core.min.js') }}"></script>

</body>

</html>
