<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Portal Registro y Estadística</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets2/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets2/img/favicon_76x76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets2/img/favicon_120x120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets2/img/favicon_152x152.png')}}">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets2/plugins/bootstrap/dist/css/bootstrap.min.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/slick-carousel/slick/slick.css ')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/animate.css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/animsition/dist/css/animsition.min.css ') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/photoswipe/dist/photoswipe.css ') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/photoswipe/dist/default-skin/default-skin.css') }}" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="{{ asset('assets2/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/plugins/font-awesome/css/font-awesome.min.css')}}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{ asset('assets2/css/themes/theme-blue.css')}}" />

</head>

<body class="header-horizontal dark-overlay">

    <!-- Body Wrapper -->
    <div id="body-wrapper" class="animsition" data-animsition-overlay="true">

        <!-- Header -->
        <header id="header" class="header-horizontal dark">

            <!-- Module - Navigation -->
            <nav id="navigation-main" class="module module-nav">
                <ul class="nav nav-main-horizontal">
                    <li><a href="#home">Inicio</a></li>
                    <li class="dropdown"><a href="#about">Nosotros</a><i class="bi bi-chevron-down"></i>
                        <ul>
                            <ol><a href="#historia">Historia</a></ol>
                            <ol><a href="#mision">Misión</a></ol>
                            <ol><a href="#vision">Visión</a></ol>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#infoUsac">InfoUSAC</a><i class="bi bi-chevron-down"></i>
                        <!-- <ul>
                            <ol><a href="#historia">Facultades</a></ol>
                            <ol><a href="#mision">Centros</a></ol>
                            <ol><a href="#mision">Escuelas</a></ol>
                            <ol><a href="#mision">Institutos</a></ol>
                        </ul> -->
                    </li>


                    <li><a href="#features">Servicios</a></li>
                    <li class = "dropdown"><a href="#">Documentos de Apoyo</a><i class="bi bi-chevron-down"></i>
                        <ul>
                            <ol>
                                <li><a href="#">Reglamento Estudiantil</a></li>
                                <li><a href="#">Reglamento Electoral</a></li>
                            </ol>
                        
                        </ul>
                       
                    </li>
                    <li><a href="#quedateEnCasa">#QuédateEnCasa</a></li>
                    <li><a href="#contact">Contáctanos</a></li>
                    <li><a href="/blog.html">Trámites</a></li>
                </ul>
                <div class="selector"></div>
            </nav>

            <!-- Module - Objects -->
            <div class="module module-object" data-toggle="panel-objects">
                <img class="object-image" src="{{ asset('assets2/img/photos/object_thumbnail.jpg')}}" alt="">
                <span class="object-name" >RYE</span>
                <span class="object-indicator"><i class="ti ti-menu"></i></span>
            </div>

            <!-- Module - Language -->
            <nav class="module module-language mr-3">
                <ul class="nav nav-main-horizontal nav-language">
                    <li><a class="active" href="#">ES</a></li>
                    <li><a href="{{ url('login')}}">INICIO DE SESIÓN</a></li>
                </ul>
            </nav>

            <!-- Module - Navigation Toggle -->
            <div class="module module-nav-toggle">
                <a href="#" id="nav-toggle" class="nav-toggle"><span></span><span></span><span></span><span></span></a>
            </div>

        </header>
        <!-- Header / End -->

        <!-- Content -->
        <div id="content">

            <!-- Section / Home -->
            <section id="home" class="section h-fullheight bg-dark cover dark">

                <!-- Slider Main -->
                <div class="slider-main slider-kenburns inner-controls">
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider03.jpg')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                            <h1>Registro y Estadística</h1>
                        </div>
                    </div>
                    <!--Slide-->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider04.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                            <h1>Id y enseñad a todos</h1>
                        </div>
                    </div>
                    <!-- Slide-->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider01.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                            <h1>Registro y Estadística</h1>
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider02.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                            <h1>Id y enseñad a todos</h1>
                        </div>
                    </div>
                    <!-- Slide -->

                    <!-- Slide -->

                    <!-- Slide -->
                    <!-- <div class="slide">
                    <div class="slide-bg bg-image-holder bg-image-fixed">
                        <img src="assets/img/photos/slider05.jpg" alt="">
                    </div>
                    <div class="slide-content container text-center">
                        <h1>Feel the nature</h1>
                    </div>
                </div> -->
                </div>

                <!-- Slider Navigation -->
                <div class="slider-main-nav">
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider03_thumbnail.jpg ')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider04_thumbnail.jpg ')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider01_thumbnail.jpg ')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider02_thumbnail.jpg ')}}" alt=""></div>
                    <!-- <div class="slide"><img src="assets/img/photos/slider05_thumbnail.jpg" alt=""></div> -->
                </div>

                <!-- Gallery Toggle -->
                <a href="#" class="fullscreen-toggle" data-items="gallerySliderItems" data-toggle="gallery">
                    <span class="arrow-tl"></span>
                    <span class="arrow-tr"></span>
                </a>

            </section>

            <!-- Section / About -->
            <section id="about" class="section">
                <br />
                <div class="container rounder shadow" id="historia">
                    <br />
                    <div class="row gutters-lg align-items-center">
                        <div class="col-lg-4" align="center">
                            <h1 class="mb-0">Historia</h1>
                            <!-- Feature #1 -->
                            <div class="feature feature-1 mb-0 center">
                                <img class="rounded shadow" src="{{ asset('assets2/img/photos/about01.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-4" data-local-scroll>
                            <p class="lead">El Departamento de Registro y Estadística inició sus labores como Oficina de
                                registro el primero de enero del año 1962, bajo la dirección del Licencidado Felipe de
                                Jesús Mendizábal y Mendizábal, desarrollando un plan de centralización de los registros
                                universitarios en la forma siguiente: </p>
                            <ul>
                                <li>En 1962, se centralizaron los registros de los estudiantes de primer ingreso.</li>
                                <li>En 1963, se centralizó la inscripción y los registros de los estudiantes de primero
                                    y segundo año.</li>
                                <li>En 1964, se centralizó la inscripción y los registros de toda la universidad.</li>
                            </ul>

                            <p>En el inicio de sus labores la Oficina de Registro y Estadística planificó un
                                procedimiento mecanizado que puso en práctica a través de un contrado con IBM e
                                Guatemala. Este permitiría el registro y control exacto de la inscripción de los
                                estudiantes, para poder ofrecer a las Unidades Académicas listas oficiales de matrícula,
                                listas por cuso en orden alfabético, actas de exámenes, reporte de calificaciones a
                                estudiantes e información estadística de los datos personales, demográficos y
                                educacionales. Para lo cual fue necesaria la codificación general de los cursos que
                                formaban los planes de estudios de las distintas facultades, trabajo que se encuentra
                                concluido.</p>
                        </div>
                    </div>
                </div>
                <br />
                <br />
                <div class="container rounder shadow ">
                    <br>
                    <div class="row gutters-lg align-items-center" id="mision">
                        <div class="col-lg-4" align="center">
                            <h1 class="mb-0">Misión</h1>
                            <!-- Feature #1 -->
                            <div class="feature feature-1 mb-0 center">
                                <img class="rounded shadow" src="{{ asset('assets2/img/photos/about02.png')}}" alt="">
                            </div>
                            <br />
                        </div>
                        <div class="col-lg-8 col-md-5" data-local-scroll>
                            <p class="lead">Llevar el control de servicios estudiantiles que presta el Departamento
                                a través de un registro sistematizado, actualizado, eficiente y eficaz. </p>
                            <br />
                        </div>
                    </div>

                </div>
                <br />
                <br />
                <div class="container rounder shadow">
                    <br>
                    <div class="row gutters-lg align-items-center" id="vision">
                        <div class="col-lg-4" align="center">
                            <h1 class="mb-0">Visión</h1>
                            <!-- Feature #1 -->
                            <div class="feature feature-1 mb-0 center">
                                <img class="rounded shadow" src="{{ asset('assets2/img/photos/about03.png')}}" alt="">
                            </div>
                            <br />
                        </div>
                        <div class="col-lg-8 col-md-5" data-local-scroll>
                            <p class="lead">El Departamento de Registro y Estadística es responsable del proceso de
                                inscripción, recolecció, análisis e interpretación de información estadística. Para
                                ofrecer a los estudiantes, autoridades universitarias, profesionales y público en
                                general información que los oriente adecuadamente en las distintas actividades
                                académicas y administrativas de la Universidad. </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section / infoUsac -->
            <section id="infoUsac" class="section bg-light pt-0 pb-5">


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
                                            <a class="link-inherit" href="{{ url('/Facultades')}}"><img
                                                    src="{{ asset('assets2/img/objects/object01.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('/Facultades')}}">Facultades</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total facultades:</span> 10</li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('/Facultades')}}" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Ver Opciones</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="{{ url('Centros')}}"><img
                                                    src="{{ asset('assets2/img/objects/object02.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('Centros')}}">Centros</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total centros:</span> 14 </li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('Centros')}}" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Ver Opciones</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="{{ url('/escuelas')}}"><img
                                                    src="{{ asset('assets2/img/objects/object03.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('/escuelas')}}">Escuelas</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total escuelas:</span> 9</li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('/escuelas')}}" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Ver Opciones</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="{{ url('Institutos')}}"><img
                                                    src="{{ asset('assets2/img/objects/object04.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('Institutos')}}">Institutos</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total institutos:</span> 3</li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('Institutos')}}" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Ver Opciones</a>
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
                                        <a class="link-inherit" href="{{ url('Facultades')}}"><img
                                                src="assets/img/objects/object01.png" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="{{ url('Facultades')}}">Facultades</a></h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total facultades:</span> 10</li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('Facultades')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver </span> Opciones</a>
                                </div>
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="{{ url('Centros')}}"><img
                                                src="{{ asset('assets2/img/objects/object02.png')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="{{ url('Centros')}}">Centros</a>
                                        </h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total centros:</span> 14 </li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('Centros')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver</span> Opciones</a>
                                </div>
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="{{ url('/escuelas')}}"><img
                                                src="{{ asset('assets2/img/objects/object03.png')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="{{ url('/escuelas')}}">Escuelas</a></h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total escuelas: </span> 9 </li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Total area:</span>
                                                92m<sup>2</sup></li> -->
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('/escuelas')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver</span> Opciones</a>
                                </div>
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="{{ url('Institutos')}}"><img
                                                src="{{ asset('assets2/img/objects/object04.png')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="{{ url('Institutos')}}">Institutos</a>
                                        </h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total institutos:</span> 3</li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('Institutos')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver</span> Opciones</a>
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

            <!-- Section / Features -->
            <!-- <section id="features" class="section">

                <div class="container">
                    <div class="row align-items-center" data-local-scroll>
                        <div class="col-lg-6 col-md-9">
                           
                            <div class="card">
                                <img src="assets/img/photos/feature01.jpg" alt="" class="card-image">
                                <div class="card-block">
                                    <h5 class="mb-0">Perfect Details</h5>
                                    <p class="text-muted mb-0">Sed ut faucibus est, eu egestas mi.</p>
                                </div>
                            </div>
                            
                            <div class="card">
                                <img src="assets/img/photos/feature02.jpg" alt="" class="card-image">
                                <div class="card-block">
                                    <h5 class="mb-0">Best Quality</h5>
                                    <p class="text-muted mb-0">Sed ut faucibus est, eu egestas mi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-9">
                            
                            <div class="card">
                                <img src="assets/img/photos/feature03.jpg" alt="" class="card-image">
                                <div class="card-block">
                                    <h5 class="mb-0">Nice neighbourhood</h5>
                                    <p class="text-muted mb-0">Sed ut faucibus est, eu egestas mi.</p>
                                </div>
                            </div>
                           
                            <div class="card">
                                <img src="assets/img/photos/feature04.jpg" alt="" class="card-image">
                                <div class="card-block">
                                    <h5 class="mb-0">Close to nature</h5>
                                    <p class="text-muted mb-0">Sed ut faucibus est, eu egestas mi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section> -->

            <!-- Section / Gallery -->
            <!-- <section id="gallery" class="section bg-black cover dark">

                <h2 class="sr-only">Gallery</h2>

                <div class="carousel-gallery">
                    <a href="#" data-toggle="gallery" data-items="galleryCarouselItems" data-slide="0"><img
                            src="assets/img/gallery/gallery01.jpg" alt=""></a>
                    <a href="#" data-toggle="gallery" data-items="galleryCarouselItems" data-slide="1"><img
                            src="assets/img/gallery/gallery02.jpg" alt=""></a>
                    <a href="#" data-toggle="gallery" data-items="galleryCarouselItems" data-slide="2"><img
                            src="assets/img/gallery/gallery03.jpg" alt=""></a>
                    <a href="#" data-toggle="gallery" data-items="galleryCarouselItems" data-slide="3"><img
                            src="assets/img/gallery/gallery04.jpg" alt=""></a>
                    <a href="#" data-toggle="gallery" data-items="galleryCarouselItems" data-slide="4"><img
                            src="assets/img/gallery/gallery05.jpg" alt=""></a>
                    <a href="#" data-toggle="gallery" data-items="galleryCarouselItems" data-slide="5"><img
                            src="assets/img/gallery/gallery06.jpg" alt=""></a>
                </div>

            </section> -->

            <!-- Section / Who we are? -->
            <section id="quedateEnCasa" class="section">

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <figure class="media-box">
                                <div class="image"><img src="{{ asset('assets2/img/photos/about02.jpg')}}" alt=""></div>
                                <button class="btn-play animated" data-animation="fadeInUp" data-toggle="video-modal"
                                    data-target="#modalVideo"
                                    data-video="https://www.youtube.com/embed/gRpM7-aChvI"></button>
                            </figure>
                        </div>
                        <div class="col-lg-5 push-lg-1 col-md-6">
                            <h1>USAC FRENTE AL CORONA VIRUS</h1>
                            <ul class="nav nav-icons" role="tablist">
                                <li class="nav-item"><a href="#tab_about" data-toggle="tab" class="nav-link active"><i
                                            class="ti-comment"></i>Precauciones</a></li>
                                <li class="nav-item"><a href="#tab_history" data-toggle="tab" class="nav-link"><i
                                            class="ti-time"></i>Sintomas </a></li>
                            </ul>
                            <div class="tab-content" data-local-scroll>
                                <div id="tab_about" class="tab-pane fade show active" role="tabpanel">
                                    <p class="lead"><li>Lávate las manos con frecuencia. Usa agua y jabón o un desinfectante de manos a base de alcohol.</li></p>
                                    <p class="lead"><li>Mantén una distancia de seguridad con personas que tosan o estornuden.</li></p>
                                    <p class="lead"><li>Utiliza mascarilla cuando no sea posible mantener el distanciamiento físico.</li></p>
                                    <p class="lead"><li>No te toques los ojos, la nariz ni la boca.</li></p>

                                    <p class="mb-5"> Las mascarillas pueden ayudar a prevenir que las personas que las llevan propaguen el virus y lo contagien 
                                        a otras personas. Sin embargo, no protegen frente a la COVID-19 por sí solas, sino que deben combinarse con el 
                                        distanciamiento físico y la higiene de manos. Sigue las recomendaciones de los organismos de salud pública de tu zona.</p>
                                </div>

                                <div id="tab_history" class="tab-pane" role="tabpanel">
                                    <p class="lead"> Los síntomas más habituales son los siguientes: <li>Fiebre</li>  <li>Tos seca </li> <li>Cansancio</li>  <br>
                                        Los síntomas graves son los siguientes: <br><li>Dificultad para respirar o sensación de falta de aire</li>  
                                        <li>Dolor o presión en el pecho</li> <li>Incapacidad para hablar o moverse</li>
                                    </p>
                                    <p class="mb-5">Si presentas síntomas graves, busca atención médica inmediata. Sin embargo, siempre debes 
                                        llamar a tu doctor o centro de atención sanitaria antes de presentarte en el lugar en cuestión.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Section / Contact -->
            <section id="contact" class="section section-double bg-light">

                <div class="row">
                    <div class="content col-xl-4 col-md-5">
                        <h2 class="mb-0">Contactanos!</h2>
                        <hr class="hr-primary">
                        <address>
                            Edificio DIGA<br>
                            Zona 12<br>
                            Ciudad Universitaria<br>
                        </address>
                        <p class="lead">
                            P: +502 2418-7900 / 02
                        </p>
                        <a href="#" class="icon icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.1943370271183!2d-90.55285184894288!3d14.587999489760533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a13d8b20d2e9%3A0x8d70b585ba3b9346!2sRegistro%20Y%20Estadistica%20USAC!5e0!3m2!1ses-419!2sgt!4v1617994939147!5m2!1ses-419!2sgt" width="1000" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

            </section>

        </div>
        <!-- Content / End -->

        <!-- Footer -->
        <footer id="footer" class="footer-fixed bg-dark dark">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left mb-5 mb-md-0">
                        <a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
                    </div>
                    <div class="col-md-6 text-center text-md-right">
                        <ul class="nav nav-footer mr-4">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#" target="_blank">Documentation</a></li>
                        </ul>
                        <ul class="nav nav-footer">
                            <li><a class="active" href="#">ES</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>
        <!-- Footer / End -->

        <!-- Body Overlay -->
        <div id="body-overlay"></div>

    </div>

    <!--ARREGLAR ESTE NAV CON LAS NUEVAS IMAGENES DE LAS FACULTADES, ESCUELAS, INSTITUTOS, CENTROS-->
    <!-- Panel - Objects -->
    <nav id="panel-objects">

        <div class="panel-objects-container container dark">

            <h3 class="text-center mb-5">Fotografías</h3>

            <div class="panel-objects-list row">
                <div class="col-md-4 col-sm-6">
                    <!-- Panel Objects Item -->
                    <div class="panel-objects-item">
                        <a href="#" class="panel-objects-item-image"><img
                                src="{{ asset('assets2/img/objects/panel-object01.jpg')}}" alt=""></a>
                        <div class="panel-objects-item-content">
                            <a href="#" class="link-reset">
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Panel Objects Item -->
                    <div class="panel-objects-item">
                        <a href="#" class="panel-objects-item-image"><img
                                src="{{ asset('assets2/img/objects/panel-object02.jpg')}}" alt=""></a>
                        <div class="panel-objects-item-content">
                            <a href="#" class="link-reset">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Panel Objects Item -->
                    <div class="panel-objects-item">
                        <a href="#" class="panel-objects-item-image"><img
                                src="{{ asset('assets2/img/objects/panel-object02.jpg')}}" alt=""></a>
                        <div class="panel-objects-item-content">
                            <a href="#" class="link-reset">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Close -->
            <button class="panel-objects-close close" data-toggle="panel-objects"></button>

        </div>

    </nav>

    <!-- Video Modal / Demo -->
    <div class="modal modal-video fade" id="modalVideo" role="dialog">
        <button class="close dark" data-bs-dismiss="modal"></button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <iframe height="500"></iframe>
            </div>
        </div>
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

    <!-- JS Gallery -->
    <script>
        var gallerySliderItems = [
            {
                src: '{{ asset(\'assets2/img/photos/slider03.jpg \')}}',
                w: 1920,
                h: 1080
            },
            {
                src: '{{ asset(\'assets2/img/photos/slider04.jpg \')}}',
                w: 1920,
                h: 1080
            },

            {
                src: '{{ asset(\'assets2/img/photos/slider01.jpg \')}}',
                w: 4032,
                h: 3024
            },
            {
                src: '{{ asset(\'assets2/img/photos/slider02.jpg \')}}',
                w: 4032,
                h: 2268
            }

        ];

        var galleryCarouselItems = [
            {
                src: '{{ asset(\'assets2/img/gallery/gallery01.jpg \')}}',
                w: 1100,
                h: 750
            },
            {
                src: '{{ asset(\'assets2/img/gallery/gallery02.jpg \')}}',
                w: 1100,
                h: 750
            },
            {
                src: '{{ asset(\'assets2/img/gallery/gallery03.jpg \')}}',
                w: 1100,
                h: 750
            },
            {
                src: '{{ asset(\'assets2/img/gallery/gallery04.jpg \')}}',
                w: 1100,
                h: 750
            }
        ];
    </script>

    <!-- JS Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>

</body>

</html>