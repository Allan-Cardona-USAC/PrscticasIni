<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Title -->
        <title>Contador Institutos - Portal Registro y Estadística</title>

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
            href="{{ asset('assets2/css/estilos_institutos.css')}}"
        />
    </head>
@php
    $data = App\Http\Controllers\PortalEstudiantil\EstadisticasController::getContadores();
    $inst31 = $data[3]->contadores[0]->total;
    $inst36 = $data[3]->contadores[1]->total;
    $inst90 = $data[3]->contadores[2]->total;
@endphp
    <body class="header-horizontal dark-overlay">
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
                <section id="flats" class="section bg-light pt-0 pb-5">
                    <div class="objects-container container">
                        <!-- Objects - Grid-->
                        <div >
                            <h6><strong>Datos preliminares, para información oficial comunicarse con Registro y Estadística.<strong></h6>
                        </div>
                        <div class="objects-grid gutters-sm row">
                            <div class="col-lg-3 col-6">
                                <!-- Object - Vertical -->
                                <div class="object object-vertical">
                                    <div class="object-image">
                                        <img
                                            src="{{ asset('assets2/img/objects/institutos/object01.jpg')}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            31 - Instituto Técnico Maya de
                                            Estudios Superiores 
                                        </h5>
                                        <div
                                            class="contador_cantidad"
                                            data-cantidad-total="{{$inst31}}"
                                        >
                                            0
                                        </div>
                                        <h3 class="contador_texto">
                                            Inscritos
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- Object - Vertical -->
                                <div class="object object-vertical">
                                    <div class="object-image">
                                        <img
                                            src="{{ asset('assets2/img/objects/institutos/object03.jpg')}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            36 - Instituto Tecnólogico
                                            Universitario Guatemala Sur
                                        </h5>
                                        <div
                                            class="contador_cantidad"
                                            data-cantidad-total="{{$inst36}}"
                                        >
                                            0
                                        </div>
                                        <h3 class="contador_texto">
                                            Inscritos
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- Object - Vertical -->
                                <div class="object object-vertical">
                                    <div class="object-image">
                                        <img
                                            src="{{ asset('assets2/img/objects/institutos/object02.jpg')}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            90 - Instituto de Administración
                                            Pública
                                        </h5>
                                        <div
                                            class="contador_cantidad"
                                            data-cantidad-total="{{$inst90}}"
                                        >
                                            0
                                        </div>
                                        <h3 class="contador_texto">
                                            Inscritos
                                        </h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
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
                                <li><a href="{{url('/')}}">Inicio</a></li>
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
