<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Escuelas - Portal Registro y Estadística</title>

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
        <div id="content">


            <br>

            <!-- Section / Flats -->
            <section id="flats" class="section bg-light pt-0 pb-5">


                <div class="objects-container container">
                    <div class="text-right">
                        <!-- Objects - Change Display -->
                        <ul class="nav nav-view" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#grid_view"><i
                                        class="fa fa-th"></i></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#list_view"><i
                                        class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="grid_view" class="tab-pane fade show active" role="tabpanel">
                            <!-- Objects - Grid-->
                            <div class="objects-grid gutters-sm row">
                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla1"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object01.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_1">13 -
                                                    Escuela de Ciencias Psicológicas</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla1_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://fausac.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla2"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object02.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla2_1">14 -
                                                    Escuela de Historia</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla2_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="https://farusac.edu.gt/sigaa-2/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla3"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object03.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla3_1">15 -
                                                    Escuela de Trabajo Social</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla3_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://economicas.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla4"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object04.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla4_1">16 -
                                                    Escuela de Ciencias de la Comunicación</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla4_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://derecho.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla5"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object05.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla5_1">33 -
                                                    Escuela Superior de Arte</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla5_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://medicina.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla6"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object06.jpeg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla6_1">28 -
                                                    Escuela de Ciencia Política</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla6_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://c3.usac.edu.gt/facfarmacia.usac.edu.gt/public_html/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla7"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object07.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla7_1">29 -
                                                    E.F.P.E.M.</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla7_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://www.humanidades.usac.edu.gt/usac/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla8"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/calusac.jpeg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla8_1">30 -
                                                    Escuela de Ciencias Lingüísticas</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla8_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="https://portal.ingenieria.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla9"><img
                                                    src="{{ asset('assets2/img/objects/escuelas/object09.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla9_1">43 -
                                                    Escuela de Ciencias Físicas y Matemáticas</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla9_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://fo.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div id="list_view" class="tab-pane fade" role="tabpanel">
                            <!-- Objects - List -->
                            <div class="objects-list">
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla1_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object01.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_4">13 -
                                                Escuela de Ciencias Psicológicas</a></h5>
                                        <ul class="object-details list-inline">
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla1_5" class="object-btn btn btn-secondary "><span
                                            class="hidden-xs-down">Carreras </span> </a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla2_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object02.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla2_4">14 - Escuela de Historia</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla2_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla3_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object03.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla3_4">15 - Escuela de Trabajo
                                                Social</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla3_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla4_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object04.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla4_4">16 - Escuela de Ciencias de
                                                la Comunicación</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla4_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla5_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object05.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla5_4">33 - Escuela Superior de
                                                Arte</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla5_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla6_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object06.jpeg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla6_4">28 - Escuela de Ciencia
                                                Política</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla6_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla7_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object07.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla7_4">29 - E.F.P.E.M.</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla7_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla8_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/calusac.jpeg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla8_4">30 - Escuela de Ciencias
                                                Lingüísticas</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla8_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla9_3"><img
                                                src="{{ asset('assets2/img/objects/escuelas/object09.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla9_4">43 - Escuela de Ciencias
                                                Físicas y Matemáticas</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla9_5" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Carreras</span></a>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <!-- <nav class="mt-4">
                        <ul class="pagination justify-content-end">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                </div>

            </section>




        </div>
        <!-- Content / End -->

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



    <!-- TABLA PARA Escuela de Ciencias Psicológicas -->
    <div id="tabla_1" class="modal">
        <div class="t1" id="t1">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">13 - Escuela de Ciencias Psicológicas - Guía de Inscripción 2024</h2>
                    <span class="close" id="close1"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(202, 30, 122);">
                            <tr>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th style="border: 1px solid white;" >
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>


                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >01</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Licenciatura en Psicología</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >10</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >A</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);; vertical-align: middle;"  style="border: 1px solid rgb(202, 30, 122);;" rowspan="5" >22 de enero 2024</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);; vertical-align: middle;"  style="border: 1px solid rgb(202, 30, 122);;" rowspan="5" >15 de enero 2024</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(202, 30, 122);; vertical-align: middle;"  style="border: 1px solid rgb(202, 30, 122);" rowspan="5"  >Una sola prueba compuesta de  dos evaluaciones : Evaluación  de comprensión lectora y Evaluación  de personalidad</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >03</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Técnico Orientación Vocacional y Laboral</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >T-1,T-3,T-5,T-7,S-11,S-12</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  

                            </tr>
                            <!-- VALOR DE TUPLA 2 -->

                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >04</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Terapía Ocupacional y Recreativa</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >A</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  

                            </tr>
                            <!-- VALOR DE TUPLA 3 -->

                            <!-- VALOR DE TUPLA 4 -->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >05</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Terapía del Lenguaje</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >A</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->

                            <!-- VALOR DE TUPLA 5-->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >06</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Profesorado en Educación Especial</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >A</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  
                            </tr>
                            <!-- VALOR DE TUPLA 5-->


                            <!-- VALOR DE TUPLA 6-->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >07</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Profesorado de Enseanza Media en Educación Física</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" rowspan="2" >17:30 a 20:30</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" rowspan="2" >M-3</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" rowspan="2" >1/22/2024</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" rowspan="2" >2/19/2024</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Prueba de Actitud Fisica</td>
                            </tr>
                            <!-- VALOR DE TUPLA 6-->

                            <!-- VALOR DE TUPLA 7-->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >08</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Técnico en Deportes</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Prueba de Actitud Fisica</td>
                            </tr>

                            <!-- VALOR DE TUPLA 8-->
                            <tr>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >13</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >00</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >14</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;"  class="minimizar">CUM</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >Profesorado de Enseñanza Media en Psicologia con Especialidad en Gestión</S></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >6</td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >A</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>

                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" >X</td>
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(202, 30, 122);;"  style="border: 1px solid rgb(202, 30, 122);;" ></td>
                            </tr>

                        </tbody>
                    </table>

                    <a id="sitio" href="https://psicologia.usac.edu.gt/?page_id=139378" class="object-btn btn btn-secondary "
                        target="_blank">Ir al sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Ciencias Psicológicas -->

    <!-- TABLA PARA Escuela de Historia -->
    <div id="tabla_2" class="modal">
        <div class="t2" id="t2">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">14 - Escuela de Historia - Guía de Inscripción 2024</h2>
                    <span class="close" id="close2"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(138, 139, 136); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" clsass="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                                 
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>


                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >14</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >01</td>
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="4" class="minimizar">Campus Central</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Historia</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >10</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="4" >T-1,T-3,T-5,T-7,S-11,S-12</td>
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="4" colspan="2">Consultar en la Unidad Académica</td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >Ciencias Sociales</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >14</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >03</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Antropología</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >9</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >Ciencias Sociales</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->

                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >14</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >04</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Arquelogía</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >9</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >Ciencias Sociales</td>
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->

                            <!-- VALOR DE TUPLA 4 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >14</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >02</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Profesorado de Enseñanza Media en Historia y Ciencias Sociales </S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >7</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >Ciencias Sociales</td>
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->
                        </tbody>
                    </table>

                    <a id="sitio" href="http://escuelahistoria.usac.edu.gt/" class="object-btn btn btn-secondary "
                        target="_blank">Ir al
                        sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Historia -->

    <!-- TABLA PARA Escuela de Trabajo Social -->
    <div id="tabla_3" class="modal">
        <div class="t3" id="t3">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">15 - Escuela de Trabajo Social - Guía de Inscripción 2024</h2>
                    <span class="close" id="close3"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(212, 44, 22); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >15</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >00</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >02</td>
                                 <td style="vertical-align:middle; border: 1px solid rgb(212, 44, 22);;" rowspan="2" class="minimizar">Campus Central</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >Licenciatura en Trabajo Social</S></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >10</td>

                                 <td style="border: 1px solid rgb(212, 44, 22);;" >X</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>

                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >17:00 a 20:00</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>

                                 <td style="vertical-align:middle; border: 1px solid rgb(212, 44, 22);;" rowspan="2" >T-1, T-3, T-5, T-7, S-11, S-12</td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>

                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" >X</td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(2212, 44, 22);;" >Realidad Nacional</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >15</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >01</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >03</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >Técnico en Gestión Social para la Atención de la Primera Infancia</S></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >6</td>

                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >X</td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>

                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                 <td style="border: 1px solid rgb(212, 44, 22);;" >07:30 a 17:30</td>

                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>

                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" >X</td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  <td style="border: 1px solid rgb(212, 44, 22);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(2212, 44, 22);;" >Auto evaluación de Inteligencia emocional</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                        </tbody>
                    </table>


                    <a id="sitio" href="https://trabajosocial.usac.edu.gt/?page_id=4130"
                        class="object-btn btn btn-secondary " target="_blank">Ir al
                        sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Trabajo Social -->

    <!-- TABLA PARA Escuela de Ciencias de la Comunicación -->
    <div id="tabla_4" class="modal">
        <div class="t4" id="t4">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">16 - Escuela de Ciencias de la Comunicación - Guía de Inscripción 2024</h2>
                    <span class="close" id="close4"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(105, 204, 221); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >16</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >02</td>
                                 <td style="vertical-align:middle; border: 1px solid rgb(24, 158, 235); " rowspan="6"  class="minimizar">Campus Central</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Periodismo Profesional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >17:30 a 20:30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 
                                 <td style="vertical-align:middle; border: 1px solid rgb(24, 158, 235);;" rowspan="6" >T-1, T-3, T-5, T-7, S-11, S-12</td>
                                  <td style="vertical-align:middle; border: 1px solid rgb(24, 158, 235);;" rowspan="6" >22 de enero de 2024</td>
                                  <td style="vertical-align:middle; border: 1px solid rgb(24, 158, 235);;" rowspan="6" >marzo de 2024</td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Lingüística, Realidad Nacional, Matemática, Periodismo</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >16</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >04</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Locución Profesional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >17:30 a 20:30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Lingüística, Realidad Nacional, Matemática, Locución</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >16</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >05</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Publicidad Profesional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >14:00 a 17:00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >17:30 a 20:30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Lingüística, Realidad Nacional, Matemática, Publicidad</td>
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                            <!-- VALOR DE TUPLA 4 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >16</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >01</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >02</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Periodismo Profesional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >8:00  a 18:00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Lingüística, Realidad Nacional, Matemática, Periodismo</td>
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->
                            <!-- VALOR DE TUPLA 5 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >16</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >01</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >04</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Locución Profesional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >8:00  a 18:00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Lingüística, Realidad Nacional, Matemática, Locución</td>
                            </tr>
                            <!-- VALOR DE TUPLA 5 -->
                            <!-- VALOR DE TUPLA 6 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >16</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >01</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >05</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Publicidad Profesional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >8:00  a 18:00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Lingüística, Realidad Nacional, Matemática, Publicidad</td>
                            </tr>
                            <!-- VALOR DE TUPLA 6 -->
                            
                        </tbody>
                    </table>

                    <a id="sitio" href="https://comunicacion1.usac.edu.gt/" class="object-btn btn btn-secondary "
                        target="_blank">Ir al
                        sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Ciencias de la Comunicación -->

    <!-- TABLA PARA Escuela Superior de Arte -->
    <div id="tabla_5" class="modal">
        <div class="t5" id="t5">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">33 - Escuela Superior de Arte - Guía de Inscripción 2024</h2>
                    <span class="close" id="close5"></span>
                </div>
                <div class="modal-body">
                    <!--<table class="table caption-top">
                         <thead style="background: rgb(128, 104, 88); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>-->

                            <!-- VALOR DE TUPLA 1 -->
                            <!--<tr>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >33</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >00</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >01</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);"  class="minimizar"></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >Licenciatura en Arte Dramático con Especialización en Actuación</S></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >12</td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>

                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                            </tr>-->
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <!--<tr>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >33</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >00</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >03</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);"  class="minimizar"></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >Licenciatura en Artes Visuales con Especialización en Pintura</S></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >12</td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>

                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                            </tr>-->
                            <!-- VALOR DE TUPLA 2 -->
                            <!-- VALOR DE TUPLA 3 -->
                            <!--<tr>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >33</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >00</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >06</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);"  class="minimizar"></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >Licenciatura en Danza Contemporánea y Coreografía</S></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >12</td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>

                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                            </tr>-->
                            <!-- VALOR DE TUPLA 3 -->
                            <!-- VALOR DE TUPLA 4 -->
                            <!--<tr>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >33</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >00</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >01</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);"  class="minimizar"></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >Licenciatura en Música</S></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >12</td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" >X</td>
                                 <td style="border: 1px solid rgb(128, 104, 88);" ></td>

                                 <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>

                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(128, 104, 88);;" ></td>
                            </tr>-->
                            <!-- VALOR DE TUPLA 4 -->

                        <!--</tbody>
                    </table>-->

                    <a id="sitio" href="https://escuelasuperiordearte.usac.edu.gt/" class="object-btn btn btn-secondary "
                        target="_blank">Ir al
                        sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela Superior de Arte -->
    <!--PENDIENTE DE GUIA-->
    <div id="tabla_6" class="modal">
        <div class="t6" id="t6">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">28 - Escuela de Ciencia Política - Guía de Inscripción 2024</h2>
                    <span class="close" id="close6"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(138, 139, 136); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" clsass="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                                 
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>


                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >28</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >01</td>
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="4" class="minimizar"></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Ciencia Politíca</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >10</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3">7:30-10:30</td>
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3">17:30-20:30</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" >M5</td>
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3">22 de enero 2024</td>
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3">23 al 26 de enero 2024</td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="vertical-align:middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3">X</td>
                                  <td style="vertical-align:middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3">X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="vertical-align:middle; border: 1px solid rgb(138, 139, 136);;" rowspan="3" >Ciencias Sociales, Situación Nacional y Mundial, Historia,  Sistema Político y Administrativo guatemalteco, Investigación Científica</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >28</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >02</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Sociologia</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >10</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 
                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" >M6 - M5</td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->

                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >28</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >03</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en relaciones Internacionales</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >10</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="vertical-align: middle; border: 1px solid rgb(138, 139, 136);;" >M5</td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                        </tbody>
                    </table>

                    <a id="sitio" href="https://cienciapolitica.usac.edu.gt/" class="object-btn btn btn-secondary "
                        target="_blank">Ir al sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Ciencia Política -->

    <!-- TABLA PARA E.F.P.E.M. -->
    <div id="tabla_7" class="modal">
        <div class="t7" id="t7">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">29 - E.F.P.E.M. - Guía de Inscripción 2024</h2>
                    <span class="close" id="close7"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: #7F0020 ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatino</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >00</td>
                                 <td style="border: 1px solid #7F0020;" >10</td>
                                 <td style="vertical-align:middle; border: 1px solid #7F0020;"  class="minimizar" rowspan="8">Campus Central</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Física Matemática</S></td>
                                 <td style="border: 1px solid #7F0020;" >6</td>

                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >17:00 a 20:30</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="vertical-align:middle; border: 1px solid #7F0020;" rowspan="3" >Módulo C</td>
                                  <td style="border: 1px solid #7F0020;" >01/22/2024</td>
                                  <td style="border: 1px solid #7F0020;" >03/01/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >00</td>
                                 <td style="border: 1px solid #7F0020;" >11</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Química Biología</S></td>
                                 <td style="border: 1px solid #7F0020;" >6</td>

                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >17:00 a 20:30</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 
                                  <td style="border: 1px solid #7F0020;" >01/16/2024</td>
                                  <td style="border: 1px solid #7F0020;" >03/01/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >00</td>
                                 <td style="border: 1px solid #7F0020;" >30</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Computación e Informática</S></td>
                                 <td style="border: 1px solid #7F0020;" >6</td>

                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >17:00 a 20:30</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                  <td style="border: 1px solid #7F0020;" >01/16/2024</td>
                                  <td style="border: 1px solid #7F0020;" >03/01/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                            <!-- VALOR DE TUPLA 4 -->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >01</td>
                                 <td style="border: 1px solid #7F0020;" >10</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado en Enseñanza Media en Fisica - Matematica</S></td>
                                 <td style="border: 1px solid #7F0020;" >8</td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" colspan="2" >7:00 a 17:00</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" rowspan="2" >Módulo D</td>
                                  <td style="border: 1px solid #7F0020;" >01/20/2024</td>
                                  <td style="border: 1px solid #7F0020;" >03/02/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->
                            <!-- VALOR DE TUPLA 5 -->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >01</td>
                                 <td style="border: 1px solid #7F0020;" >11</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Química Biología</S></td>
                                 <td style="border: 1px solid #7F0020;" >8</td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" colspan="2" >7:00 a 17:00</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                  <td style="border: 1px solid #7F0020;" >01/20/2024</td>
                                  <td style="border: 1px solid #7F0020;" >03/02/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!-- VALOR DE TUPLA 5 -->
                            <!-- VALOR DE TUPLA 6 -->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >01</td>
                                 <td style="border: 1px solid #7F0020;" >16</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Lengua y Literatura</S></td>
                                 <td style="border: 1px solid #7F0020;" >7</td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" colspan="2" >7:00 a 17:00</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" rowspan="3" >Módulo Martínez Durán</td>
                                  <td style="border: 1px solid #7F0020;" >01/20/2024</td>
                                  <td style="border: 1px solid #7F0020;" >03/02/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!-- VALOR DE TUPLA 6 -->

                            <!--VALOR DE TUPLA 7-->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >01</td>
                                 <td style="border: 1px solid #7F0020;" >17</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Ciencias Económico Contables</S></td>
                                 <td style="border: 1px solid #7F0020;" >7</td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" colspan="2" >7:00 a 17:00</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                  <td style="border: 1px solid #7F0020;" >20/01/2024</td>
                                  <td style="border: 1px solid #7F0020;" >2/03/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>
                            <!--VALOR DE TUPLA 7-->

                            <!--VALOR DE TUPLA 8-->
                            <tr>
                                 <td style="border: 1px solid #7F0020;" >29</td>
                                 <td style="border: 1px solid #7F0020;" >01</td>
                                 <td style="border: 1px solid #7F0020;" >62</td>
                                 <td style="border: 1px solid #7F0020;" >Profesorado de Enseñanza Media en Educación Bilingüe  Intercultural con Énfasis en Cultura Maya</S></td>
                                 <td style="border: 1px solid #7F0020;" >6</td>

                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" >X</td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                 <td style="border: 1px solid #7F0020;" colspan="2" >7:00 a 17:00</td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>
                                 <td style="border: 1px solid #7F0020;" ></td>

                                  <td style="border: 1px solid #7F0020;" >20/01/2024</td>
                                  <td style="border: 1px solid #7F0020;" >2/03/2024</td>

                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" >X</td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  <td style="border: 1px solid #7F0020;" ></td>
                                  
                                  <td style="border: 1px solid #7F0020;" >Tendencias Docentes</td>
                            </tr>

                        </tbody>
                    </table>

                    <a id="sitio" href="https://www.efpemusac.org/admisiones" class="object-btn btn btn-secondary "
                        target="_blank">Ir al sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA E.F.P.E.M.-->

    <!-- TABLA PARA Escuela de Ciencias Lingüísticas -->
    <div id="tabla_8" class="modal">
        <div class="t8" id="t8">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">30 - Escuela de Ciencias Lingüísticas - Guía de Inscripción 2024</h2>
                    <span class="close" id="close8"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(24, 158, 235); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatico</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >01</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); "  class="minimizar">Campus Central</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >Técnico en Traducción y Correspondencia Internacional</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " >07:00 a 13:30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235);;" >M2</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >24/01/2024</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >Prueba de Conocimientos de Inglés</td>
                            </tr>
                            <!-- VALOR DE TUPLA  -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >08</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); "  class="minimizar" rowspan="2">Virtual</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " rowspan="2">Técnico Universitario Intérprete en Lengua de Señas  Guatemala</S></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >lunes a viernes 17:30 a 20:30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235);;" rowspan="2">Edificio B, CUM, tercer Nivel</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" rowspan="2">24/01/2024</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" rowspan="2"></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(24, 158, 235);;" rowspan="2">Prueba de Lengua de Señas  Guatemala</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->

                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >00</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >08</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >6</td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >sábado 07:30 a 13:30</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " >X</td>
                                 <td style="border: 1px solid rgb(24, 158, 235); " ></td>

                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" >X</td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  <td style="border: 1px solid rgb(24, 158, 235);;" ></td>
                                  
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                        </tbody>
                    </table>

                    <a id="sitio" href="https://calusacusac.usac.edu.gt/" target="_blank"
                        class="object-btn btn btn-secondary ">Ir
                        al sitio<span class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Ciencias Lingüísticas-->

    <!-- TABLA PARA Escuela de Ciencias Físicas y Matemáticas -->
    <div id="tabla_9" class="modal">
        <div class="t9" id="t9">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">43 - Escuela de Ciencias Físicas y Matemáticas - Guía de Inscripción 2024
                    </h2>
                    <span class="close" id="close9"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                         <thead style="background: rgb(40, 42, 37); ">
                            <tr>
                                 <th style="border: 1px solid white;"  colspan="3" class="primer">Códigos</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="carrera">Carrera</th>
                                 <th style="border: 1px solid white;"  colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                 <th style="border: 1px solid white;"  colspan="3" class="penultimo">Plan de estudios</th>
                                 <th style="border: 1px solid white;"  colspan="5" class="ultimo">Horario de clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th style="border: 1px solid white;"  style="border: 1px solid white;" colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
                            </tr>


                            <tr class="segunda_fila">
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">U.A.</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Extensión</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Carrera</p>
                                </th>


                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Diario</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Sabatico</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Dominical</p>
                                </th>

                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Matutina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Vespertina</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Nocturna</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Única</p>
                                </th>
                                 <th style="border: 1px solid white;" >
                                    <p class="verticalText">Otra</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th style="border: 1px solid white;"  style="border: 1px solid white;" >
                                    <p class="verticalText">Quimica</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >43</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >01</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;"  class="minimizar">Campus Central</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Física Aplicada</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >10</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" rowspan="2" >Edificio T2 y T3 Facultad de Ingeniería</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" rowspan="2" >T-1, T-3, T-5, T-7, S-11, S-12</td>

                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >Matemática</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->

                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >43</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >00</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >02</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;"  class="minimizar">Campus Central</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >Licenciatura en Matemática Aplicada</S></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" >10</td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>

                                 <td style="border: 1px solid rgb(138, 139, 136);;" ></td>


                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >X</td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  <td style="border: 1px solid rgb(138, 139, 136);;" ></td>
                                  
                                  <td style="border: 1px solid rgb(138, 139, 136);;" >Matemática</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                        </tbody>
                    </table>
                    <a id="sitio" href="https://ecfm.usac.edu.gt/aspirantes/" target="_blank" class="object-btn btn btn-secondary ">Ir al sitio<span
                            class="hidden-xs-down"> </span> </a>

                </div>
                <div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA PARA Escuela de Ciencias Físicas y Matemáticas-->



	<script src="{{ asset('assets2/js/main_escuelas.js')}}"></script>
</body>

</html>