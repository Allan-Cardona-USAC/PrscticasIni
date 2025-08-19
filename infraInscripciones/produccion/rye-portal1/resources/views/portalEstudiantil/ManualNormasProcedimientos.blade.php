<!DOCTYPE html>
<html lang="es">
<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title> Manual de Normas y Procedimientos - Portal Registro y Estadística</title>

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

<!-- PARA MODAL DE CADA ANUNCIO -->
<link rel="stylesheet" href="{{ asset('assets2/css/estilos_reglamentos.css')}}">

<!---- CSS Tarjeta Con reproductor de Video -->
<link rel="stylesheet" href="{{ asset('assets2/css/estilos_cardsvideo.css ')}}" />

</head>

<body class="dark-overlay">
<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition" data-animsition-overlay="true">
    <header id="header" class="header-horizontal dark">

        <!-- Module - Navigation Back -->
        <div class="module module-back">
            <a href="{{url('/')}}" class="nav-back"><i class="fa fa-angle-left"></i></a>
        </div>


        <!-- Module - Objects -->
        <div class="module module-object" align= "center">
                <span class="object-name" ><a href="#"><img src="{{ asset('assets2/img/logo2.svg')}}" width="85" alt=""></a></span>

        </div>

        <!-- Module - Language -->
        <nav class="module module-language mr-3">
            <ul class="nav nav-main-horizontal nav-language">
                <li><a class="active" href="#">ES</a></li>
            </ul>
        </nav>
    </header>
    <!-- Content -->
    <div id="content">

        <!-- Section / Intro -->
        <section id="intro" class="section bg-dark dark h-sm">
            <div class="container pos-v-center" data-local-scroll>
                <a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="200" alt=""></a>
                <!-- <h2 class="mb-4 animated" data-animation="fadeIn" data-animation-delay="200"> -->
                <h3> <b>Normas y Procedimientos</b></h3>
            </div>
        </section>

        <!-- Section / Chooser -->
        <section id="chooser" class="section">
            <div class="container" style='text-align: justify;'>
                <div style='font-size: 1.4em; text-align: justify;'>
                    <h2 style="font-size: 3.25rem;">Manual de Normas y Procedimientos</h2>
                    
                </div>
                <p style="font-size: 1.4em; text-align: justify;">Manual de Normas y Procedimientos del Departamento de Registro y Estadística. Este documento proporciona un conjunto detallado de directrices, normativas y procedimientos que rigen las actividades del departamento, con el fin de garantizar una gestión eficiente, organizada y coherente de los procesos de registro y estadística. Su contenido está diseñado para optimizar el desempeño de las funciones administrativas, facilitando el cumplimiento de los objetivos institucionales y asegurando que las operaciones se realicen de manera clara, uniforme y en estricto apego a los estándares establecidos.</p>
                <embed src="{{ asset('assets2/Manuales/Manual-NyP-Registro-y-Estadistica-2024-Acuerdo-Rectoria-0609-2024.pdf')}}" type="application/pdf" width="100%" height="1000px" />               
                <br/>

            </div>

        </section>

    </div>
    
    <!-- Content / End -->

    <!-- Footer -->
    
        <!-- Footer -->
        <footer id="footer" class="footer-fixed bg-dark dark">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left mb-5 mb-md-0">
                      <a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="200" alt=""></a>
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
            <hr>
            <div align= "center" id="copyright">Copyright&copy; 2021 - Informática, Registro y Estadística - Todos los derechos reservados</div>
                

        </footer>
        <!-- Footer / End -->

        <!-- Body Overlay -->
        <div id="body-overlay"></div>

</div>


    <!-- Video Modal / Demo -->
    <div class="modal modal-video fade" id="modalVideo" role="dialog">
        <button class="close dark" data-bs-dismiss="modal"></button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <iframe height="500"></iframe>
            </div>
        </div>
    </div>


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

</body>

</html>
