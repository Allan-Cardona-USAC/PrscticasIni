<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Title -->
        <title>Contador Facultades - Portal Registro y Estadística</title>

        <!-- Favicons -->
        <link
            rel="shortcut icon"
            href="{{ asset('assets2/img/favicon.png')}}"
        />
        <link
            rel="apple-touch-icon"
            href="{{ asset('assets2/img/favicon_60x60.png')}}"
        />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('assets2/img/favicon_76x76.png')}}"
        />
        <link
            rel="apple-touch-icon"
            sizes="120x120"
            href="{{ asset('assets2/img/favicon_120x120.png')}}"
        />
        <link
            rel="apple-touch-icon"
            sizes="152x152"
            href="{{ asset('assets2/img/favicon_152x152.png')}}"
        />

        <!-- CSS Plugins -->
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/bootstrap/dist/css/bootstrap.min.css ')}}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/slick-carousel/slick/slick.css ')}}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/animate.css/animate.min.css ')}}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/animsition/dist/css/animsition.min.css ')}}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/photoswipe/dist/photoswipe.css ')}}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/photoswipe/dist/default-skin/default-skin.css')}}"
        />

        <!-- CSS Icons -->
        <link
            rel="stylesheet"
            href="{{ asset('assets2/css/themify-icons.css ')}}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets2/plugins/font-awesome/css/font-awesome.min.css ')}}"
        />

        <!-- CSS Theme -->
        <link
            id="theme"
            rel="stylesheet"
            href="{{ asset('assets2/css/themes/theme-blue.css')}}"
        />

        <!-- PARA LA TABLA DE CARRERAS -->
        <link
            rel="stylesheet"
            href="{{ asset('assets2/css/estilos_facultades.css')}}"
        />
    </head>
@php $data =
    App\Http\Controllers\PortalEstudiantil\EstadisticasController::getContadores();
    $facu1 = $data[0]->contadores[0]->total; 
    $facu2 = $data[0]->contadores[1]->total; 
    $facu3 = $data[0]->contadores[2]->total;
    $facu4 = $data[0]->contadores[3]->total;
    $facu5 = $data[0]->contadores[4]->total + $data[0]->contadores[10]->total;
    $facu6 = $data[0]->contadores[5]->total;
    $facu7 = $data[0]->contadores[6]->total + $data[0]->contadores[11]->total + $data[0]->contadores[12]->total;
    $facu8 = $data[0]->contadores[7]->total;
    $facu9 = $data[0]->contadores[8]->total;
    $facu10 = $data[0]->contadores[9]->total;
@endphp
    <body class="header-horizontal dark-overlay">
        <!-- Body Wrapper -->
        <div
            id="body-wrapper"
            class="animsition"
            data-animsition-overlay="true"
        >
            <!-- Header -->
            <header id="header" class="header-horizontal dark">
                <!-- Module - Navigation Back -->
                <div class="module module-back">
                    <a href="{{url('/')}}" class="nav-back"
                        ><i class="fa fa-angle-left"></i
                    ></a>
                </div>

                <!-- Module - Navigation -->
                <nav id="navigation-main" class="module module-nav">
                    <div class="selector"></div>
                </nav>

                <!-- Module - Objects -->
                <div class="module module-object" align="center">
                    <span class="object-name"
                        ><a href="#"
                            ><img
                                src="{{ asset('assets2/img/logo2.svg')}}"
                                width="85"
                                alt="" /></a
                    ></span>
                </div>

                <!-- Module - Language -->
                <nav class="module module-language mr-3">
                    <ul class="nav nav-main-horizontal nav-language">
                        <li><a class="active" href="#">ES</a></li>
                    </ul>
                </nav>
            </header>
            <!-- Header / End -->

            <!-- Content -->
            <div id="content">
                <br />
                <!-- Section / Flats -->

                <div class="container">
                    <!-- Objects - Grid-->
                    <div style="margin-top: 5%;">
                        <h6><strong>Datos preliminares, para información oficial comunicarse con Registro y Estadística.<strong></h6>
                    </div>
                    <div class="objects-grid row">
                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object01.jpg')}}"
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        01 - Facultad de Agronomía
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div class="contador_cantidad" data-cantidad-total="{{$facu1}}">0</div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object02.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        02 - Facultad de Arquitectura
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu2}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object03.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        <a
                                            class="link-inherit"
                                            href="#"
                                            id="tabla3_1"
                                            >03 - Facultad de Ciencias
                                            Económicas</a
                                        >
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu3}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object04.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        04 - Facultad de Ciencias Jurídicas y
                                        Sociales
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu4}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object05.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        05 - Facultad de Ciencias Médicas
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu5}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object06.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        06 - Facultad de Ciencias Químicas y
                                        Farmacia
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu6}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object07.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        07 - Facultad de Humanidades
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu7}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object08.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        08 - Facultad de Ingeniería
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu8}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object09.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        09 - Facultad de Odontología
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu9}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- Object - Vertical -->
                            <div class="object object-vertical">
                                <div class="object-image">
                                    <img
                                        src="{{ asset('assets2/img/objects/facultades/object10.jpg')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="object-content">
                                    <h5 class="object-title">
                                        10 - Facultad de Medicina Veterinatia y
                                        Zootecnía
                                    </h5>
                                    <ul
                                        class="object-details list-unstyled"
                                    ></ul>
                                    <div
                                        class="contador_cantidad"
                                        data-cantidad-total="{{$facu10}}"
                                    >
                                        0
                                    </div>
                                    <h3 class="contador_texto">Inscritos</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Content / End -->

            <!-- Footer -->
            <footer id="footer" class="footer-fixed bg-dark dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div
                            class="col-md-6 text-center text-md-left mb-5 mb-md-0"
                        >
                            <a href="#"
                                ><img
                                    src="{{ asset('assets2/img/logo.svg')}}"
                                    width="200"
                                    alt=""
                            /></a>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <ul class="nav nav-footer mr-4">
                                <li><a href="{{ url('/')}}">Inicio</a></li>
                                <!-- <li><a href="documentation.html" target="_blank">Documentation</a></li> -->
                            </ul>
                            <!-- <ul class="nav nav-footer">
                            <li><a class="active" href="#">ES</a></li>
                        </ul> -->
                        </div>
                    </div>
                </div>
                <hr />
                <div align="center" id="copyright">
                    Copyright&copy; 2021 - Informática, Registro y Estadística -
                    Todos los derechos reservados
                </div>
            </footer>
            <!-- Footer / End -->

            <!-- Body Overlay -->
            <div id="body-overlay"></div>
        </div>

        <!-- JS Plugins -->
        <script src="{{ asset('assets2/plugins/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/animsition/dist/js/animsition.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/tether/dist/js/tether.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/slick-carousel/slick/slick.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/jquery.appear/jquery.appear.js')}}"></script>
        <script src="{{ asset('assets2/plugins/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/jquery.localscroll/jquery.localScroll.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/photoswipe/dist/photoswipe.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>
        <script src="{{ asset('assets2/plugins/twitter-fetcher/js/twitterFetcher_min.js')}}"></script>

        <!-- JS Core -->
        <script src="{{ asset('assets2/js/core.min.js')}}"></script>
        <script src="{{ asset('assets2/js/animacion_contadores.js')}}"></script>
    </body>
</html>
