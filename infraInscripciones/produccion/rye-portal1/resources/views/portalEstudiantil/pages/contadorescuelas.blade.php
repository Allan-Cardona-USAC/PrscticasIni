<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Contador Escuelas - Portal Registro y Estadística</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets2/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{ asset('assets2/img/favicon_60x60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets2/img/favicon_76x76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets2/img/favicon_120x120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets2/img/favicon_152x152.png')}}">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets2/plugins/bootstrap/dist/css/bootstrap.min.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/slick-carousel/slick/slick.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/animate.css/animate.min.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/animsition/dist/css/animsition.min.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/photoswipe/dist/photoswipe.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/photoswipe/dist/default-skin/default-skin.css')}}" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="{{ asset('assets2/css/themify-icons.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/font-awesome/css/font-awesome.min.css ')}}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{ asset('assets2/css/themes/theme-blue.css')}}" />

    <!-- PARA LA TABLA DE CARRERAS -->
	<link rel="stylesheet" href="{{ asset('assets2/css/estilos_escuelas.css')}}">	

</head>
@php $data =
    App\Http\Controllers\PortalEstudiantil\EstadisticasController::getContadores();
    $esc13 = $data[2]->contadores[0]->total; 
    $esc14 = $data[2]->contadores[1]->total; 
    $esc15 = $data[2]->contadores[2]->total;
    $esc16 = $data[2]->contadores[3]->total;
    $esc28 = $data[2]->contadores[4]->total;
    $esc29 = $data[2]->contadores[5]->total;
    $esc30 = $data[2]->contadores[6]->total;
    $esc33 = $data[2]->contadores[7]->total;
    $esc43 = $data[2]->contadores[8]->total;
@endphp
<body class="header-horizontal dark-overlay">

    <!-- Body Wrapper -->
    <div id="body-wrapper" class="animsition" data-animsition-overlay="true">

        <!-- Header -->
        <header id="header" class="header-horizontal dark">

            <!-- Module - Navigation Back -->
            <div class="module module-back">
                <a href="{{url('/')}}" class="nav-back"><i class="fa fa-angle-left"></i></a>
            </div>

            <!-- Module - Navigation -->
            <nav id="navigation-main" class="module module-nav">
                <div class="selector"></div>
            </nav>

            <!-- Module - Objects -->
            <div class="module module-object" align = "center">
                 <span class="object-name" ><a href="#"><img src="{{ asset('assets2/img/logo2.svg')}}" width="85" alt=""></a></span>

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
        <div id="content" class="objects-container container-fluid">
            <br>
                <div class="container">
                            <!-- Objects - Grid-->
                    <div style="margin-top: 5%;">
                        <h6><strong>Datos preliminares, para información oficial comunicarse con Registro y Estadística.<strong></h6>
                    </div>
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object01.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">13 - Escuela de Ciencias Psicol-lg-3 col-6ógicas</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc13}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object02.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">14 - Escuela de Historia</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc14}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object03.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">15 - Escuela de Trabajo Social</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc15}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object04.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">16 - Escuela de Ciencias de la Comunicación</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc16}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object05.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">33 - Escuela Superior de Arte</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc33}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object06.jpeg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">28 - Escuela de Ciencia Política</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc28}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object07.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">29 - E.F.P.E.M.</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc29}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <<img src="{{ asset('assets2/img/objects/escuelas/calusac.jpeg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">30 - Escuela de Ciencias Lingüísticas</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc30}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <img src="{{ asset('assets2/img/objects/escuelas/object09.jpg')}}" alt="">
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title">43 - Escuela de Ciencias Físicas y Matemáticas</h5>
                                            <div class="contador_cantidad" data-cantidad-total="{{$esc43}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <div style="margin-top: 5%; margin-left: 10%; font-weight: 2em;">
                    <h6><strong>Datos preliminares, para información oficial comunicarse con Registro y Estadística.<strong></h6>
                </div>
        </div>
        <!-- Content / End -->

        <!-- Footer -->
        <footer id="footer" class="footer-fixed bg-dark dark">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-6-md-6 text-center text-md-left mb-5 mb-md-0">
                    <a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="200" alt=""></a>
                    </div>
                    <div class="col-lg-3 col-6-md-6 text-center text-md-right">
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
            <hr>
            <div align= "center" id="copyright">Copyright&copy; 2021 - Informática, Registro y Estadística - Todos los derechos reservados</div>
                

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