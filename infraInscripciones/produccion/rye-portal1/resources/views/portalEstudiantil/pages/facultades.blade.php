<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Facultades - Portal Registro y Estadística</title>

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
	<link rel="stylesheet" href="{{ asset('assets2/css/estilos_facultades.css')}}">

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
        <div class="module module-object"align = "center">
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
                                                    src="{{ asset('assets2/img/objects/facultades/object01.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_1">01 - Facultad de Agronomía </a></h5>
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
                                                    src="{{ asset('assets2/img/objects/facultades/object02.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla2_1">02 - Facultad de Arquitectura</a></h5>
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
                                                    src="{{ asset('assets2/img/objects/facultades/object03.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla3_1">03 - Facultad de Ciencias Económicas</a></h5>
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
                                            <a class="link-inherit"  href="#" id="tabla4"><img
                                                    src="{{ asset('assets2/img/objects/facultades/object04.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla4_1">04 - Facultad de Ciencias Jurídicas y Sociales</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a  href="#" id="tabla4_2" class="object-btn btn btn-secondary"><span
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
                                                    src="{{ asset('assets2/img/objects/facultades/object05.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit"  href="#" id="tabla5_1">05 - Facultad de Ciencias Médicas</a></h5>
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
                                                    src="{{ asset('assets2/img/objects/facultades/object06.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla6_1">06 - Facultad de Ciencias Químicas y Farmacia</a></h5>
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
                                                    src="{{ asset('assets2/img/objects/facultades/object07.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla7_1">07 - Facultad de Humanidades</a></h5>
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
                                                    src="{{ asset('assets2/img/objects/facultades/object08.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla8_1">08 - Facultad de Ingeniería</a></h5>
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
                                                    src="{{ asset('assets2/img/objects/facultades/object09.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit"href="#" id="tabla9_1">09 - Facultad de Odontología</a></h5>
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

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="#" id="tabla10"><img
                                                    src="{{ asset('assets2/img/objects/facultades/object10.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla10_1">10 - Facultad de Medicina Veterinatia y Zootecnía</a></h5>
                                            <ul class="object-details list-unstyled">

                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="#" id="tabla10_2" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Carreras</a>
                                            <!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
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
                                                src="{{ asset('assets2/img/objects/facultades/object01.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_4">01 - Facultad de Agronomía</a></h5>
                                        <ul class="object-details list-inline">
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla1_5" class="object-btn btn btn-secondary " ><span
                                        class="hidden-xs-down">Carreras </span> </a>
                                </div>

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla2_3"><img
                                                src="{{ asset('assets2/img/objects/facultades/object02.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla2_4">02 - Facultad de Arquitectura</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object03.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla3_4">03 - Facultad de Ciencias Económicas</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object04.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla4_4">04 - Facultad de Ciencias Jurídicas y Sociales</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object05.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla5_4">05 - Facultad de Ciencias Médicas</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object06.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla6_4">06 - Facultad de Ciencias Químicas y Farmacia</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object07.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla7_4">07 - Facultad de Humanidades</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object08.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla8_4">08 - Facultad de Ingeniería</a>
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
                                                src="{{ asset('assets2/img/objects/facultades/object09.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla9_4">09 - Facultad de Odontología</a>
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

                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla10_3"><img
                                                src="{{ asset('assets2/img/objects/facultades/object10.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla10_4">10 - Facultad de Medicina Veterinatia y Zootecnía</a>
                                        </h5>
                                        <ul class="object-details list-inline">

                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="#" id="tabla10_5" class="object-btn btn btn-secondary"><span
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
                            <li><a href="{{ url('/')}}">Inicio</a></li>
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



    <!-- TABLA PARA Facultad de Agronomía -->
    <div id="tabla_1" class="modal">
		<div class="t1" id="t1">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">01 - Facultad de Agronomía - Guía de Inscripción 2024</h2>
					<span class="close" id="close1"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(52, 173, 52);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>

                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(52, 173, 52);;">01</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">02</td>
							<td style="border: 1px solid rgb(52, 173, 52);;" style="border: 1px solid green;"class="minimizar" rowspan="4">Campus Central</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">Ingeniería Agronómica en Sistemas de Producción Agrícola</S></td>
							<td style="border: 1px solid rgb(52, 173, 52);;">10</td>

							<td style="border: 1px solid rgb(52, 173, 52);;">X</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>

							<td style="border: 1px solid rgb(52, 173, 52);;">7:00 - 13:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">14:00 - 20:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;" style="border: 1px solid green;"class="minimizar" rowspan="2">T8 y T9</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;">X</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;" style="border: 1px solid green;"class="minimizar" rowspan="4">Matemática y Biología</td>

						  </tr>
                        <!-- VALOR DE TUPLA 1 -->

                        <!-- VALOR DE TUPLA 2 -->
						   <tr>
							<td style="border: 1px solid rgb(52, 173, 52);;">01</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">03</td>
							<!-- <td style="border: 1px solid rgb(52, 173, 52);;" style="border: 1px solid green;">Campus Central</td> -->
							<td style="border: 1px solid rgb(52, 173, 52);;">Ingenieria Agronómica en Recursos Naturales Renovables</S></td>
							<td style="border: 1px solid rgb(52, 173, 52);;">10</td>

							<td style="border: 1px solid rgb(52, 173, 52);;">X</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>

							<td style="border: 1px solid rgb(52, 173, 52);;">7:00 - 13:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">14:00 - 20:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;">X</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 2 -->

                        <!-- VALOR DE TUPLA 3 -->
						   <tr>
							<td style="border: 1px solid rgb(52, 173, 52);;">01</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">04</td>
							<!-- <td style="border: 1px solid rgb(52, 173, 52);;" style="border: 1px solid green;">Campus Central</td> -->
							<td style="border: 1px solid rgb(52, 173, 52);;">Ingenieria en Industrias Agropecuarias y Forestales</S></td>
							<td style="border: 1px solid rgb(52, 173, 52);;">10</td>

							<td style="border: 1px solid rgb(52, 173, 52);;">X</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>

							<td style="border: 1px solid rgb(52, 173, 52);;">7:00 - 13:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">14:00 - 20:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;">T8, T9, T3, T1 y S12</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;">X</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>

						  </tr>
                        <!-- VALOR DE TUPLA 3 -->

                        <!-- VALOR DE TUPLA 4 -->
						   <tr>
							<td style="border: 1px solid rgb(52, 173, 52);;">01</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">07</td>
							<!-- <td style="border: 1px solid rgb(52, 173, 52);;" style="border: 1px solid green;">Campus Central</td> -->
							<td style="border: 1px solid rgb(52, 173, 52);;">Ingenieria en Gestión Ambiental Local</S></td>
							<td style="border: 1px solid rgb(52, 173, 52);;">8</td>

							<td style="border: 1px solid rgb(52, 173, 52);;">X</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>

							<td style="border: 1px solid rgb(52, 173, 52);;">7:00 - 13:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;">14:00 - 20:00</td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
							<td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;">T8 y T9</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;">X</td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>
                            <td style="border: 1px solid rgb(52, 173, 52);;"></td>


						  </tr>
                        <!-- VALOR DE TUPLA 4 -->



						</tbody>
					  </table>

                      <a id="sitio" href="http://fausac.gt/" class="object-btn btn btn-secondary "  target="_blank">Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Agronomía -->

    <!-- TABLA PARA Facultad de Arquitectura -->
    <div id="tabla_2" class="modal">
		<div class="t2" id="t2">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">02 - Facultad de Arquitectura - Guía de Inscripción 2024</h2>
					<span class="close" id="close2"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(223, 209, 18); color: black;">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>

                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid black;">02</td>
							<td style="border: 1px solid black;">00</td>
							<td style="border: 1px solid black;">01</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" rowspan="2" >Campus Central</td>
							<td style="border: 1px solid black;">Licenciatura en Arquitectura</S></td>
							<td style="border: 1px solid black;">11</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;">7:00 - 13:00</td>
							<td style="border: 1px solid black;">14:00 - 20:00</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;;"
                            <td style="border: 1px solid black;;" style="border: 1px solid green;"class="minimizar" rowspan="2">T1 y T2</td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;">X</td>
                            <td style="border: 1px solid black;;">X</td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;" style="border: 1px solid green;"class="minimizar" rowspan="2">Cultura General y Redacción, Dibujo y Geometría, Conocimiento  Numérico</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->

                        <!-- VALOR DE TUPLA 2 -->
						   <tr>
							<td style="border: 1px solid black;">02</td>
							<td style="border: 1px solid black;">00</td>
							<td style="border: 1px solid black;">03</td>


							<td style="border: 1px solid black;">Licenciatura en Diseño Gráfico</S></td>
							<td style="border: 1px solid black;">10</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;">7:00 - 12:20</td>
							<td style="border: 1px solid black;">15:15 - 20:20</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;">X</td>
                            <td style="border: 1px solid black;;">X</td>
                            <td style="border: 1px solid black;;"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 2 -->

						</tbody>
					  </table>

                      <a id="sitio" href="https://farusac.edu.gt/sigaa-2/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Arquitectura -->

    <!-- TABLA PARA Facultad de Ciencias Económicas -->
    <div id="tabla_3" class="modal">
		<div class="t3" id="t3">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">03 - Facultad de Ciencias Económicas - Guía de Inscripción 2024</h2>
					<span class="close" id="close3"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(211, 159, 15);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>

                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">00</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">01</td>
							<td style="border: 1px solid rgb(211, 159, 15);;" class="minimizar" rowspan="6"> Campus Central</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">Contaduría Pública y Auditoría</S></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">11</td>

							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;" class="minimizar" rowspan="3">S3, S6, S9 y S10</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;">X</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;" class="minimizar" rowspan="6"> Contabilidad, Administración y Economía </td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->
                        <!-- VALOR DE TUPLA 2 -->
						   <tr>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">00</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">02</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">Economía</S></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">11</td>

							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;">X</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 2 -->
                        <!-- VALOR DE TUPLA 3 -->
						   <tr>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">00</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">Administración de Empresas</S></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">11</td>

							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;">X</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 3 -->
                        <!-- VALOR DE TUPLA 4 -->
						   <tr>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">02</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">01</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">Contaduría Pública y Auditoría</S></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">11</td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;" class="minimizar" rowspan="3">S3 y S6</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;">X</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 4 -->
                        <!-- VALOR DE TUPLA 5 -->
						   <tr>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">02</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">02</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">Economía (Área Común)</S></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">4</td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>

                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;">X</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 5 -->
                        <!-- VALOR DE TUPLA 6 -->
						   <tr>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">02</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">03</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">Administración de Empresas</S></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">11</td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>
							<td style="border: 1px solid rgb(211, 159, 15);;">X</td>

							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>
							<td style="border: 1px solid rgb(211, 159, 15);;"></td>

                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>
                            <td style="border: 1px solid rgb(211, 159, 15);;">X</td>
                            <td style="border: 1px solid rgb(211, 159, 15);;"></td>

						  </tr>
                        <!-- VALOR DE TUPLA 6 -->


						</tbody>
					  </table>

                      <a id="sitio" href="http://economicas.usac.edu.gt/" class="object-btn btn btn-secondary "  target="_blank">Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Ciencias Económicas -->

    <!-- TABLA PARA Facultad de Ciencias Jurídicas y Sociales -->
    <div id="tabla_4" class="modal">
		<div class="t4" id="t4">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">04 - Facultad de Ciencias Jurídicas y Sociales - Guía de Inscripción 2024</h2>
					<span class="close" id="close4"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(199, 39, 39);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>



                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(199, 39, 39);;">04</td>
							<td style="border: 1px solid rgb(199, 39, 39);;">00</td>
							<td style="border: 1px solid rgb(199, 39, 39);;">01</td>
							<td style="border: 1px solid rgb(199, 39, 39);;" class="minimizar" >Campus Central</td>
							<td style="border: 1px solid rgb(199, 39, 39);;">Licenciatura en Ciencias Jurídicas y Sociales , Abogacia y Notariado</S></td>
							<td style="border: 1px solid rgb(199, 39, 39);;">10</td>

							<td style="border: 1px solid rgb(199, 39, 39);;">X</td>
							<td style="border: 1px solid rgb(199, 39, 39);;">X</td>
							<td style="border: 1px solid rgb(199, 39, 39);;"></td>

							<td style="border: 1px solid rgb(199, 39, 39);;">7:00 - 12:00</td>
							<td style="border: 1px solid rgb(199, 39, 39);;">14:15 - 15:15</td>
							<td style="border: 1px solid rgb(199, 39, 39);;">17:30 - 21:00</td>
							<td style="border: 1px solid rgb(199, 39, 39);;"></td>
							<td style="border: 1px solid rgb(199, 39, 39);;"></td>

                            <td style="border: 1px solid rgb(199, 39, 39);;">S2, S5 y S7</td>
                            <td style="border: 1px solid rgb(199, 39, 39);;"></td>
                            <td style="border: 1px solid rgb(199, 39, 39);;"></td>
                            <td style="border: 1px solid rgb(199, 39, 39);;">X</td>
                            <td style="border: 1px solid rgb(199, 39, 39);;"></td>
                            <td style="border: 1px solid rgb(199, 39, 39);;"></td>
                            <td style="border: 1px solid rgb(199, 39, 39);;">Conceptos Básicos de Derecho y realidad Nacional</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->

						</tbody>
					  </table>

                      <a id="sitio" href="https://www.derecho.cloud/" class="object-btn btn btn-secondary "  target="_blank">Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Ciencias Jurídicas y Sociales -->

    <!-- TABLA PARA Facultad de Ciencias Médicas -->
    <div id="tabla_5" class="modal">
		<div class="t5" id="t5">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">05 - Facultad de Ciencias Médicas - Guía de Inscripción 2024</h2>
					<span class="close" id="close5"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(245, 232, 47); color: black;">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en años</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
                          <tr>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">00</td>
							<td style="border: 1px solid black;">01</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" >CUM</td>
							<td style="border: 1px solid black;">Médico y Cirujano</S></td>
							<td style="border: 1px solid black;">7</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>

                            <td style="border: 1px solid black;">Edificios B, C y D</td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;">Biología Humana y Matemática</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->
                        <!-- VALOR DE TUPLA 2 -->
                        <tr>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">01</td>
							<td style="border: 1px solid black;">03</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" >Escuela Nacional de Enfermería
                                de Guatemala -ENEG-</td>
							<td style="border: 1px solid black;">Técnico en Enfermería </S></td>
							<td style="border: 1px solid black;">6 semestres</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>

                            <td style="border: 1px solid black;;">ENEG</td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;;">Prueba de Conocimientos Específicos en Enfermería y Evaluación Psicométrica y Médica. Entrevista de ingreso </td>

						  </tr>

                        <!-- VALOR DE TUPLA 2 -->
                        <!-- VALOR DE TUPLA 3 -->
                        <tr>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" >Escuela de Terapia Respiratoria</td>
							<td style="border: 1px solid black;">Técnico de Terapia Respiratoria</S></td>
							<td style="border: 1px solid black;">2</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;" class="minimizar" colspan="5">7:00 - 13:00</td>
                            <td style="border: 1px solid black;;">Hospital Roosevelt</td>
                            <td style="border: 1px solid black;;">X</td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;">X</td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;"></td>
                            <td style="border: 1px solid black;;">Terapia Respiratoria</td>



						  </tr>

                        <!-- VALOR DE TUPLA 3 -->
                        <!-- VALOR DE TUPLA 4 -->
                        <tr>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">04</td>
							<td style="border: 1px solid black;">04</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" >Escuela de Terapia Física, Ocupacional y
                                Especial "Dr. Miguel Angel Aguilera Pérez"</td>
							<td style="border: 1px solid black;">Técnico de Fisioterapia</S></td>
							<td style="border: 1px solid black;">6 semestres</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>

                            <td style="border: 1px solid black;;">Escuela de Fisioterapia</td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;">X</td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;"></td>
                            <td style="border: 1px solid black;;">Conocimientos Generales y Aptitud General</td>
						  </tr>
                        <!-- VALOR DE TUPLA 4 -->
                        <!-- VALOR DE TUPLA 5 -->
						  <!-- <tr>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">03</td>
							<td style="border: 1px solid black;">03</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" >Escuela Nacional de Enfermería
                                de Cobán -ENEC-</td>
							<td style="border: 1px solid black;">Técnico en Enfermería <b>Observación B</b></S></td>
							<td style="border: 1px solid black;">6</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
						  </tr>-->
                        <!-- VALOR DE TUPLA 5 -->
                        <!-- VALOR DE TUPLA 6 -->
                        <!--<tr>
							<td style="border: 1px solid black;">05</td>
							<td style="border: 1px solid black;">02</td>
							<td style="border: 1px solid black;">03</td>
							<td style="border: 1px solid black;" style="border: 1px solid black;"class="minimizar" >Escuela Nacional de Enfermería
                                de Occidente -ENEO-</td>
							<td style="border: 1px solid black;">Técnico en Enfermería <b>Observación A</b></S></td>
							<td style="border: 1px solid black;">6</td>

							<td style="border: 1px solid black;">X</td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>

							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
							<td style="border: 1px solid black;"></td>
                             ERROR CON LA HORA
							<td style="border: 1px solid black;">7:00 - 12:00 y 14:00 - 21:00</td>
						  </tr>-->

                        <!-- VALOR DE TUPLA 6 -->

						</tbody>
                    </table>

                      <a id="sitio" href="http://medicina.usac.edu.gt/" class="object-btn btn btn-secondary "  target="_blank">Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Ciencias Médicas -->

    <!-- TABLA PARA Facultad de Ciencias Químicas y Farmacia -->
    <div id="tabla_6" class="modal">
		<div class="t6" id="t6">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">06 - Facultad de Ciencias Químicas y Farmacia - Guía de Inscripción 2024</h2>
					<span class="close" id="close6"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(79, 202, 79);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>

                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">06</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">01</td>
							<td style="border: 1px solid rgb(133, 218, 22);" rowspan="5" class="minimizar" >Campus Central</td>
							<td style="border: 1px solid rgb(133, 218, 22);">Química</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(133, 218, 22);" class="minimizar" rowspan="5">S12</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);" class="minimizar" rowspan="5">Ciencias Naturales y Exactas</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->
                        <!-- VALOR DE TUPLA 2 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">06</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">02</td>

							<td style="border: 1px solid rgb(133, 218, 22);">Química Biológica</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
						  </tr>
                        <!-- VALOR DE TUPLA 2 -->
                        <!-- VALOR DE TUPLA 3 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">06</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">03</td>

                            <td style="border: 1px solid rgb(133, 218, 22);">Química Farmacéutica</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>

						  </tr>
                        <!-- VALOR DE TUPLA 3 -->
                        <!-- VALOR DE TUPLA 4 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">06</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">04</td>

							<td style="border: 1px solid rgb(133, 218, 22);">Biología</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
						  </tr>
                        <!-- VALOR DE TUPLA 4 -->
                        <!-- VALOR DE TUPLA 5 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">06</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">05</td>

							<td style="border: 1px solid rgb(133, 218, 22);">Nutrición</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
                            <td style="border: 1px solid rgb(133, 218, 22);">X</td>
						  </tr>
                        <!-- VALOR DE TUPLA 5 -->

						</tbody>
					  </table>

                      <a id="sitio" href="https://portal.ccqqfar.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank" >Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Ciencias Químicas y Farmacia -->

    <!-- =========================> FALTA LA TABLA DE ESTA FACULTAD <=========================  -->
    <!-- TABLA PARA Facultad de Humanidades -->
    <div id="tabla_7" class="modal">
		<div class="t7" id="t7">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">07 - Facultad de Humanidades - Guía de Inscripción 2024</h2>
					<span class="close" id="close7"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(87, 140, 224);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Código</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Sede</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Fecha de inicio de Clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Fecha de Asignación de Cursos</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Prueba de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>
                                
                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>                               


                            </tr>
						</thead>

						<tbody>
                        <!-- VALOR DE TUPLA 1 -->
                            <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">07</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Licenciatura en Arte</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">10</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4, EFPEM</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Creatividad</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>

                        <!-- VALOR DE TUPLA 2 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseöanza Media en Pedagogia y Promotor de Derechos Humanos y Cultura de Paz </S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">17:00 a 19:30</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 3 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">26</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Artes Plásticas e Historia del Arte</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4, EFPEM, CALUSAC</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Creatividad</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 4 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">27</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Educación Musical</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4, EFPEM, CALUSAC</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Específica de Música</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 5 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;">8:00</td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">17:00 a 19:30</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 6 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">29</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado en Pedagogía y Tecnología de la Información y la Comunicación</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                            <td style="border: 1px solid black;">x</td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Computación</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 7 -->
                            <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">40</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesor en Educación a Distancia y Tecnologías de la Información y Comunicación</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Computación</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 8 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">53</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado en Ciencias de la Información Documental con especialidad en Centros de Recursos para el Aprendizaje Integrados al Currículo (Modalidad b-Learning)</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">01/02/2024</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 9 -->
                            <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">54</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Técnico en Ciencias de la Información Documental con especialidad en Democratización de la Información (Modalidad b-Learning)</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">01/02/2024</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 10 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;">8:00 a 11:00</td> <!-- Matutina -->
                            <td style="border: 1px solid black;">14:00 a 17:00</td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">17:00 a 19:30</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 11 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">00</td> <!-- Extension -->
                            <td style="border: 1px solid black;">61</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Técnico en Restauración de Bienes Muebles</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;">X</td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;">x</td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4, EFPEM, CALUSAC</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Creatividad</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 12 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">07</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Licenciatura en Arte</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">10</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12, S4, M4 Y S5</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->
                            <td style="border: 1px solid black;">Creatividad</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 12 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 13 -->
                            <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">26</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Artes Plásticas e Historia Del Arte</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S5, M4, S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Creatividad</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 14 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">27</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Educación Musical</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4, S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 15 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 15 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 16 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Bibliotecario General</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">03/02/2023</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 17 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">50</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Bibliotecario General</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">03/02/2023</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 18 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">53</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado en Ciencias de la Información Documental con especialidad en Centros de Recursos para el Aprendizaje Integrados al Currículo (Modalidad b-Learning)</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">03/02/2023</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 19 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">54</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Técnico en Ciencias de la Información Documental con Especialidad en Democratización de la Información (b-Learning)</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">03/02/2023</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 20 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                            <!-- VALOR DE TUPLA 21 -->
                            <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">67</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Investigación Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>                        
                        <!-- VALOR DE TUPLA 22 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">01</td> <!-- Extension -->
                            <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 23 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">04</td> <!-- Extension -->
                            <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 24 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">04</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 25 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">04</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;">S12</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 26 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">05</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Amatitlán</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 27 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">05</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Amatitlán</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 28 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">06</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Antigua Guatemala</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 29 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">06</td> <!-- Extension -->
                            <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Antigua Guatemala</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 30 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">07</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Asunción Mita, Jutiapa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 31 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">08</td> <!-- Extension -->
                            <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Barberena, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 32 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">08</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Barberena, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 33 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">08</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Barberena, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 34 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">08</td> <!-- Extension -->
                            <td style="border: 1px solid black;">74</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Barberena, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Educación Intercultural</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 35 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">08</td> <!-- Extension -->
                            <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Barberena, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 36 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">09</td> <!-- Extension -->
                            <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Casillas, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 37 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">09</td> <!-- Extension -->
                            <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Casillas, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 38 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">09</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Casillas, Santa Rosa</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 39 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">10</td> <!-- Extension -->
                            <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 40 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">10</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 41 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">10</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 42 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">10</td> <!-- Extension -->
                            <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 43 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">11</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 44 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">11</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 45 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">11</td> <!-- Extension -->
                            <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Catarina, San Marcos</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 46 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">12</td> <!-- Extension -->
                            <td style="border: 1px solid black;">53</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chimaltenango</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado en Ciencias de la Información Documental con Especialidad en Centros de Recursos para el Aprendizaje integrados al Currículo (b-Learning)</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">CM</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">03/02/2023</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 46 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">12</td> <!-- Extension -->
                            <td style="border: 1px solid black;">54</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chimaltenango</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Técnico en Ciencias de la Información Documental con Especialidad en Democratización de la Información (b-Learning)</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;">x</td> <!-- Única -->
                            <td style="border: 1px solid black;"></td> <!-- Otra -->

                            <td style="border: 1px solid black;">CM</td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;">03/02/2023</td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 47 -->
                            <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">12</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chimaltenango</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 48 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">12</td> <!-- Extension -->
                            <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chimaltenango</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 49 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">13</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 50 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">13</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 51 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">13</td> <!-- Extension -->
                            <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 52 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">13</td> <!-- Extension -->
                            <td style="border: 1px solid black;">74</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Educación Intercultural</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                            <td style="border: 1px solid black;"></td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 53 -->
                        <tr> 
                            <td style="border: 1px solid black;">77</td> <!-- CU -->
                            <td style="border: 1px solid black;">14</td> <!-- Extension -->
                            <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                            <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                            <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                            <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                            <td style="border: 1px solid black;"></td> <!-- Diario -->
                            <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                            <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                            <td style="border: 1px solid black;"></td> <!-- Matutina -->
                            <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                            <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                            <td style="border: 1px solid black;"></td> <!-- Única -->
                            <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                            <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                            <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                            <td style="border: 1px solid black;"></td> <!-- Biología -->
                            <td style="border: 1px solid black;"></td> <!-- Física -->
                            <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                            <td style="border: 1px solid black;"></td> <!-- Matemática -->
                            <td style="border: 1px solid black;"></td> <!-- Química -->

                            <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                        </tr>
                        <!-- VALOR DE TUPLA 54 -->
                        <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">14</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 55 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">15</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Chiquimulilla, Santa Rosa </td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 56 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">15</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Chiquimulilla, Santa Rosa </td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 57 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">16</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Coatepeque, Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 58 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">16</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Coatepeque, Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 59 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">16</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Coatepeque, Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 60 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">16</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Coatepeque, Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 61 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">16</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Coatepeque, Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 62 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">17</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Cobán, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 63 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">17</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Cobán, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 64 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">17</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Cobán, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 65 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">17</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Cobán, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 66 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">18</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Comitancillo, San Marcos</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 67 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">20</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 68 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">20</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 69 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">20</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 70 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">21</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Esquipulas, Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 71 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">21</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Esquipulas, Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 72 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">22</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Fray Bartolomé de las Casas, A.V.</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">X</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 73 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">22</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Fray Bartolomé de las Casas, A.V.</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">X</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 74 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">22</td> <!-- Extension -->
                        <td style="border: 1px solid black;">74</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Fray Bartolomé de las Casas, A.V.</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Educación Intercultural</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">X</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 75 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">23</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >La Gomera,  Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 76 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">23</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >La Gomera,  Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 77 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">24</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 78 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">24</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 79 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">24</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR TUPLA 80 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">25</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Huité, Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    
                        <!-- VALOR DE TUPLA 1 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">25</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Huité, Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 2 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">26</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ipala, Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 3 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">26</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ipala, Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 4 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">93</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ipala, Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 5 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">93</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ipala, Chiquimula</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa </S></td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>

                    <!-- VALOR DE TUPLA 6 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">27</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ixcan, Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 7 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">28</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jacaltenango, Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 8 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">28</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jacaltenango, Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 9 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">28</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jacaltenango, Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 10 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">29</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 11 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">29</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 12 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">29</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 13 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">29</td> <!-- Extension -->
                        <td style="border: 1px solid black;">67</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Investigación Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 14 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">30</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 15 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">30</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 16 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">31</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 17 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">31</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 18 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">31</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 19 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">32</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >La Maquina, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 20 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">32</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >La Maquina, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 21 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">33</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Livingston, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 22 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">33</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Livingston, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 23 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">33</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Livingston, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 24 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">33</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Livingston, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 25 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">33</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Livingston, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 26 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">34</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Masagua, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 27 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">34</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Masagua, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 28 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">35</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Morales, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 29 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">35</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Morales, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 30 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">35</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Morales, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 31 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">35</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Morales, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 32 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">36</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Nebaj, Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 33 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">37</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Nueva Concepción, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;"></td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 34 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">37</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Nueva Concepción, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 35 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">38</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José Ojotenán, San Marcos</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 36 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">38</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José Ojotenán, San Marcos</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 37 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">39</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Pachalum, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 38 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">39</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Pachalum, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 39 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">40</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Patulul, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 40 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">40</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Patulul, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 41 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">41</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Poptún, Petén</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 42 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">41</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Poptún, Petén</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 43 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">42</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Puerto Barrios, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 123 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">42</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Puerto Barrios, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 124 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">42</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Puerto Barrios, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 125 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">42</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Puerto Barrios, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 126 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">43</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Puerto San José, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 127 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">44</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>                    
                    <!-- VALOR DE TUPLA 128 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">44</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 129 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">45</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 130 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">45</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 129 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">45</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 130 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">45</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 131 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">46</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Rabinal, Baja Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 131 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">46</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Rabinal, Baja Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 132 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">46</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Rabinal, Baja Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 133 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">47</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Raxruhá, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 134 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">47</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Raxruhá, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 135 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">47</td> <!-- Extension -->
                        <td style="border: 1px solid black;">74</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Raxruhá, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado en Enseñanza Media en Pedagogía y Educación Intercultural</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 136 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">48</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 137 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">48</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 138 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">48</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 139 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">49</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Río Dulce, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 140 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">49</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Río Dulce, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 141 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">49</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Río Dulce, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 142 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">50</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Salamá, Baja Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 143 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">51</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Diego, Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 144 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">52</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José el Golfo, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 145 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">52</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José el Golfo, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 146 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">53</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José Pinula, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 147 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">53</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José Pinula, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 148 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">53</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San José Pinula, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 149 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">54</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Luis Jilotepeque, Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 150 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">55</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Martín Zapotitlán, Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 151 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">55</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Martín Zapotitlán, Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 152 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">55</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Martín Zapotitlán, Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 152 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">55</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Martín Zapotitlán, Retalhuleu</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 153 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">56</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Miguel Tucurú, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 154 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">57</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Pedro Soloma, Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:01</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 154 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">57</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Pedro Soloma, Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 155 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">58</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Vicente Pacaya, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 155 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">58</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Vicente Pacaya, Escuintla</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 156 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">59</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Sanarate, El Progreso</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 156 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">59</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Sanarate, El Progreso</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 157 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">59</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Sanarate, El Progreso</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 158 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">59</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Sanarate, El Progreso</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 158 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">60</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Catarina Mita, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 159 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">60</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Catarina Mita, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 160 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">60</td> <!-- Extension -->
                        <td style="border: 1px solid black;">74</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Catarina Mita, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado en Enseñanza Media en Pedagogía y Educación Intercultural</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 161 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">60</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Catarina Mita, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 162 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">62</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 162 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">62</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 163 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">63</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Cotzumalguapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 164 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">63</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Cotzumalguapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 165 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">63</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Cotzumalguapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 166 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">65</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Taxisco, Santa Rosa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 166 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">65</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Taxisco, Santa Rosa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 168 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">65</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Taxisco, Santa Rosa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 169 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">66</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Teculután, Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 170 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">66</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Teculután, Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 171 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">66</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Teculután, Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 172 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">67</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Telemán, Panzos, Alta Verapaz</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    
                    <!-- VALOR DE TUPLA 173 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">68</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Totonicapán</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 174 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">69</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Zacapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    
                    <!-- VALOR DE TUPLA 175 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">70</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Zunilito, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 175 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">70</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Zunilito, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 176 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">70</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Zunilito, Suchitepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 176 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">71</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Monjas, Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables </td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 178 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">71</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Monjas, Jalapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 179 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">72</td> <!-- Extension -->
                        <td style="border: 1px solid black;">18</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Chicamán, Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Promotor de Derechos Humanos y Cultura de Paz</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 180 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">72</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Chicamán, Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 181 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">72</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Chicamán, Quiché</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 182 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">73</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >El Estor, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 183 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">73</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >El Estor, Izabal</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 183 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">75</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ayarza, Casillas, Santa Rosa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 183 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">75</td> <!-- Extension -->
                        <td style="border: 1px solid black;">74</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Ayarza, Casillas, Santa Rosa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado en Enseñanza Media en Pedagogía y Educación Intercultural</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 184 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">82</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Rafael Pie de la Cuesta, San Marcos</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 185 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">83</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Villa Nueva, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 185 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">83</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Villa Nueva, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 185 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">83</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Villa Nueva, Guatemala</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 186 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">85</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 187 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">85</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 188 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">85</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Quetzaltenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 189 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">86</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Bartolomé, Milpas Altas, Sacatepéquez</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 190 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">87</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Pablo, San Marcos</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 191 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">87</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Pablo, San Marcos</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 192 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">88</td> <!-- Extension -->
                        <td style="border: 1px solid black;">17</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Yupiltepeque, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Ciencias Económico Contables</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;"></td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 193 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">88</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Yupiltepeque, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 194 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">88</td> <!-- Extension -->
                        <td style="border: 1px solid black;">67</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Yupiltepeque, Jutiapa</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía y Técnico en Investigación Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 195 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">89</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >La Democracia, Huehuetenango</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 196 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">90</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >San Juan La Laguna, Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 197 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">91</td> <!-- Extension -->
                        <td style="border: 1px solid black;">55</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Utatlán, Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 198 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">91</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Utatlán, Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;">x</td> <!-- Sabatico -->
                        <td style="border: 1px solid black;"></td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 199 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">94</td> <!-- Extension -->
                        <td style="border: 1px solid black;">28</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Utatlán, Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza  Media en Pedagogía, Ciencias Sociales y Formación Ciudadana</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 200 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">94</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Utatlán, Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    <!-- VALOR DE TUPLA 201 -->
                    <tr> 
                        <td style="border: 1px solid black;">77</td> <!-- CU -->
                        <td style="border: 1px solid black;">94</td> <!-- Extension -->
                        <td style="border: 1px solid black;">78</td> <!-- Carrera -->
                        <td style="border: 1px solid black;" class="minimizar" >Santa Lucía Utatlán, Sololá</td> <!-- Sede -->
                        <td style="border: 1px solid black;">Profesorado de Enseñanza Media en Pedagogía y Ciencias Naturales con Orientación Ambiental</td> <!-- Carrera -->
                        <td style="border: 1px solid black;">7</td> <!-- Duracion -->

                        <td style="border: 1px solid black;"></td> <!-- Diario -->
                        <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                        <td style="border: 1px solid black;">x</td> <!-- Dominical -->

                        <td style="border: 1px solid black;"></td> <!-- Matutina -->
                        <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                        <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                        <td style="border: 1px solid black;"></td> <!-- Única -->
                        <td style="border: 1px solid black;">7:30 a 17:00</td> <!-- Otra -->

                        <td style="border: 1px solid black;"></td>  <!-- Módulo o Edificio -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de inicio de clases -->
                        <td style="border: 1px solid black;"></td>  <!-- Fecha de Asignacion de Cursos -->

                        <td style="border: 1px solid black;"></td> <!-- Biología -->
                        <td style="border: 1px solid black;"></td> <!-- Física -->
                        <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                        <td style="border: 1px solid black;"></td> <!-- Matemática -->
                        <td style="border: 1px solid black;"></td> <!-- Química -->

                        <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                    </tr>
                    

						</tbody>
                    </table>

                    <h2 class="titulo_modal" >Facultad de Humanidades - FID</h2>

                    <table class="table caption-top">
						<thead style="background: rgb(87, 140, 224);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Código</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Sede</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                
                                
                                <th style="border: 1px solid white;"colspan="5" rowspan="1" class="minimizar">Prueba de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>
                                
                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


                            </tr>
						</thead>

						<tbody>
                        <!-- VALOR DE TUPLA 1 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">00</td> <!-- Extension -->
                                <td style="border: 1px solid black;">01</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Expresión Artística con Especialidad en Educación Musical</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">00</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Campus Central</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">06</td> <!-- Extension -->
                                <td style="border: 1px solid black;">01</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Antigua Guatemala, Sacatepéquez</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Expresión Artística con Especialidad en Educación Musical</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;"></td> <!-- Matutina -->
                                <td style="border: 1px solid black;">x</td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">06</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Antigua Guatemala, Sacatepéquez</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;"></td> <!-- Matutina -->
                                <td style="border: 1px solid black;">x</td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 5 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">12</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Chimaltenango</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 6 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">13</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Chiquimula</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 7 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">24</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Huehuetenango</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 8 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">29</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Jalapa</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 9 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">44</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Santa Cruz del Quiché, El Quiché</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 10 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">48</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Retalhuleu</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 11 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">50</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Salamá, Baja Verapaz</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;"></td> <!-- Matutina -->
                                <td style="border: 1px solid black;">x</td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 12 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">62</td> <!-- Extension -->
                                <td style="border: 1px solid black;">03</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Sololá</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 13 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">68</td> <!-- Extension -->
                                <td style="border: 1px solid black;">03</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Totonicapán</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 14 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">76</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Jocotán, Chiquimula</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 15 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">77</td> <!-- Extension -->
                                <td style="border: 1px solid black;">03</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >San Martín Jilotepeque, Chimaltenango</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 16 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">79</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >San Benito, Petén </td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 16 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">80</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Malacatán, San Marcos</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 18 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">81</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Mazatenango, Suchitepéquez</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 19 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">84</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Sayaxché, Petén</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Educación Primaria Bilingüe Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;"></td> <!-- Matutina -->
                                <td style="border: 1px solid black;">x</td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 20 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">85</td> <!-- Extension -->
                                <td style="border: 1px solid black;">02</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Quetzaltenango</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado en Productividad y Desarrollo</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                            <!-- VALOR DE TUPLA 21 -->
                            <tr> 
                                <td style="border: 1px solid black;">70</td> <!-- CU -->
                                <td style="border: 1px solid black;">85</td> <!-- Extension -->
                                <td style="border: 1px solid black;">04</td> <!-- Carrera -->
                                <td style="border: 1px solid black;" class="minimizar" >Quetzaltenango</td> <!-- Sede -->
                                <td style="border: 1px solid black;">Profesorado de Educación Primaria Intercultural</S></td> <!-- Carrera -->
                                <td style="border: 1px solid black;">6</td> <!-- Duracion -->

                                <td style="border: 1px solid black;">X</td> <!-- Diario -->
                                <td style="border: 1px solid black;"></td> <!-- Sabatico -->
                                <td style="border: 1px solid black;"></td> <!-- Dominical -->

                                <td style="border: 1px solid black;">x</td> <!-- Matutina -->
                                <td style="border: 1px solid black;"></td> <!-- Vespertina -->
                                <td style="border: 1px solid black;"></td> <!-- Nocturna -->
                                <td style="border: 1px solid black;"></td> <!-- Única -->
                                <td style="border: 1px solid black;"></td> <!-- Otra -->

                                <td style="border: 1px solid black;">S4</td>  <!-- Módulo o Edificio -->

                                <td style="border: 1px solid black;"></td> <!-- Biología -->
                                <td style="border: 1px solid black;"></td> <!-- Física -->
                                <td style="border: 1px solid black;">x</td> <!-- Lenguaje -->
                                <td style="border: 1px solid black;">x</td> <!-- Matemática -->
                                <td style="border: 1px solid black;"></td> <!-- Química -->
                                <td style="border: 1px solid black;">Liderazgo Pedagógico</td> <!-- Prueba de Conocimientos Especificos -->
                            </tr>
                        </tbody>
                    </table>

                      <a id="sitio" href="http://www.humanidades.usac.edu.gt/usac/" class="object-btn btn btn-secondary " target="_blank" >Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Humanidades-->

    <!-- TABLA PARA Facultad de Ingeniería -->
    <div id="tabla_8" class="modal">
		<div class="t8" id="t8">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">08 - Facultad de Ingeniería - Guía de Inscripción 2024</h2>
					<span class="close" id="close8"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(122, 125, 131);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">01</td>
							<td style="border: 1px solid rgb(122, 125, 131);" rowspan="10" class="minimizar" >Campus Central</td>
							<td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Civil</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="10">T-1, T-3, T-5, T-7, S-11, S-12</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="10">Matemática para Ingeniería y Conocimientos de Computación</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->
                        <!-- VALOR DE TUPLA 2 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">02</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Quimica</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 2 -->
                        <!-- VALOR DE TUPLA 3 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">03</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Mecánica</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 3 -->
                        <!-- VALOR DE TUPLA 4 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">04</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Eléctrica</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 4 -->
                        <!-- VALOR DE TUPLA 5 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">05</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Industrial</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 5 -->
                        <!-- VALOR DE TUPLA 6 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">06</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Mecánica Eléctrica</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 6 -->
                        <!-- VALOR DE TUPLA 7 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">07</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Mecánica Industrial</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 7 -->
                        <!-- VALOR DE TUPLA 8 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">09</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería en Ciencias y Sistemas</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 8 -->
                        <!-- VALOR DE TUPLA 9 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">13</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Electrónica</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 9 -->
                        <!-- VALOR DE TUPLA 10 -->
                        <tr>
							<td style="border: 1px solid rgb(122, 125, 131);">08</td>
							<td style="border: 1px solid rgb(122, 125, 131);">00</td>
							<td style="border: 1px solid rgb(122, 125, 131);">35</td>

                            <td style="border: 1px solid rgb(122, 125, 131);">Ingeniería Ambiental</S></td>
							<td style="border: 1px solid rgb(122, 125, 131);">10</td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);">X</td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>
							<td style="border: 1px solid rgb(122, 125, 131);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
						  </tr>
                        <!-- VALOR DE TUPLA 10 -->

						</tbody>
					  </table>

                      <a id="sitio" href="https://portal.ingenieria.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank" >Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Ingeniería-->

    <!-- TABLA PARA Facultad de Odontología -->
    <div id="tabla_9" class="modal">
		<div class="t9" id="t9">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">09 - Facultad de Odontología - Guía de Inscripción 2024</h2>
					<span class="close" id="close9"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(138, 111, 212);">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en años</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>

                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(101, 70, 185);;">09</td>
							<td style="border: 1px solid rgb(101, 70, 185);;">00</td>
							<td style="border: 1px solid rgb(101, 70, 185);;">01</td>
							<td style="border: 1px solid rgb(101, 70, 185);;" class="minimizar" >Plan Diario</td>
							<td style="border: 1px solid rgb(101, 70, 185);;">Cirujano Dentista</S></td>
							<td style="border: 1px solid rgb(101, 70, 185);;">6</td>

							<td style="border: 1px solid rgb(101, 70, 185);;">X</td>
							<td style="border: 1px solid rgb(101, 70, 185);;"></td>
							<td style="border: 1px solid rgb(101, 70, 185);;"></td>

							<td style="border: 1px solid rgb(101, 70, 185);;"></td>
							<td style="border: 1px solid rgb(101, 70, 185);;"></td>
							<td style="border: 1px solid rgb(101, 70, 185);;"></td>
							<td style="border: 1px solid rgb(101, 70, 185);;">7:30 - 15:30</td>
							<td style="border: 1px solid rgb(101, 70, 185);;"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="10">Edificio M-1, M-2 y M-4</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="10">
                            <li>Test de habilidades</li>
                            <li>Comprensión Lectora</li>
                            <li>Prueba de ciencias naturales y exactas</li>
                            <li>Psicomotricidad fina</li></td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->


						</tbody>
					  </table>

                      <a id="sitio" href="http://fo.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank" >Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Odontología-->

    <!-- TABLA PARA Facultad de Medicina Veterinatia y Zootecnía -->
    <div id="tabla_10" class="modal">
		<div class="t10" id="t10">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">10 - Facultad de Medicina Veterinatia y Zootecnía - Guía de Inscripción 2024</h2>
					<span class="close" id="close10"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead style="background: rgb(133, 218, 22); color: black;">
                            <tr >
                                <th style="border: 1px solid white;"colspan="3" class="primer">Códigos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Extensión</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="carrera">Carrera</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
                                <th style="border: 1px solid white;"colspan="3" class="penultimo">Plan de estudios</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Horario de clases</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
                            </tr>


                            <tr class="segunda_fila">
                                <th style="border: 1px solid white;"> <p class="verticalText">U.A.</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Extensión</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Carrera</p> </th>


                                <th style="border: 1px solid white;"> <p class="verticalText">Diario</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Sabatico</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Dominical</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Matutina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Vespertina</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Nocturna</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Única</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Otra</p> </th>

                                <th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>

                                
                            </tr>
						</thead>
						<tbody>

                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">02</td>
							<td style="border: 1px solid rgb(133, 218, 22);" class="minimizar" >Campus Central</td>
							<td style="border: 1px solid rgb(133, 218, 22);">Medicina Veterinaria</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">12</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">M6, M7, M8, Granja Experimental</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Biología</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->
                        <!-- VALOR DE TUPLA 1 -->
						   <tr>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>
							<td style="border: 1px solid rgb(133, 218, 22);">00</td>
							<td style="border: 1px solid rgb(133, 218, 22);">03</td>
							<td style="border: 1px solid rgb(133, 218, 22);" class="minimizar" >Campus Central</td>
							<td style="border: 1px solid rgb(133, 218, 22);">Zootecnia</S></td>
							<td style="border: 1px solid rgb(133, 218, 22);">10</td>

							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>
							<td style="border: 1px solid rgb(133, 218, 22);">X</td>
							<td style="border: 1px solid rgb(133, 218, 22);"></td>

                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">M6, M7, Granja Experimental </td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);"></td>
                            <td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Prueba integrada, escrita y práctica</td>
						  </tr>
                        <!-- VALOR DE TUPLA 1 -->

						</tbody>
					  </table>

                      <a id="sitio" href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank" >Ir al sitio<span
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
    <!-- TABLA PARA Facultad de Medicina Veterinatia y Zootecnía-->


	<script src="{{ asset('assets2/js/main_facultades.js')}}"></script>
</body>

</html>