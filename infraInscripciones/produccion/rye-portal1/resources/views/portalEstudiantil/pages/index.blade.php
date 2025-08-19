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
    <link rel="apple-touch-icon" href="{{ asset('assets2/img/favicon_60x60.png')}}">
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

    <!-- PARA LA TABLA DE CARRERAS -->
	<link rel="stylesheet" href="{{ asset('assets2/css/estilos_nosotros.css')}}">

    <!---- CSS Botones 3D -->
    <link rel="stylesheet" href="{{ asset('assets2/css/estilos_botones3D.css')}}">

    <!---- CSS Iconos 3D -->
    <link rel="stylesheet" href="{{ asset('assets2/css/estilos_articulos3d.css')}}">

    <!---- CSS Tarjeta Con reproductor de Video -->
    <link rel="stylesheet" href="{{ asset('assets2/css/estilos_cardsvideo.css ')}}" />

    <!---- CSS Contador3D -->
    <link rel="stylesheet" href="{{ asset('assets2/css/estilos_contador_slider3d.css ')}}" />

    <!-- VERIFICACION PARA WEBSITE CON GOOGLE -->
        <meta name="google-site-verification" content="Lk2tdiA3CFRjPtRlW9riHA58Z6oVOtdaBvYJ4YgKji0" />

</head>
@php
    $data = App\Http\Controllers\PortalEstudiantil\EstadisticasController::getContadores();
    $ciclo = $data[0]->ciclo;
    $facultadT = $data[0]->total;
    $centrosT = $data[1]->total;
    $escuelasT = $data[2]->total;
    $instiT = $data[3]->total;
    $totalT = (int)$facultadT + (int)$centrosT + (int)$escuelasT + (int)$instiT;
@endphp

<style>
  #copyright {
position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: #0F2949;
  text-align: center;
  padding: 10px 0;
  z-index: 1001;
  }
  #separator {
  position: fixed;
  bottom: 40px;
  width: 100%;
  border: 1px solid #000;
  z-index: 1000;
}
#footerrye{
    height: 65px;
}


</style>

<body class="header-horizontal dark-overlay">

    <!-- Body Wrapper -->
    <div id="body-wrapper" class="animsition" data-animsition-overlay="true">

        <!-- Header -->
        <header id="header" class="header-horizontal dark">

            <!-- Module - Navigation -->
            <nav id="navigation-main" class="module module-nav">
                <ul class="nav nav-main-horizontal">
                    <li><a href="#home">Inicio</a></li>
                    <!--<li><a href="#infoImportante">Información de interés </a></li>-->
                    <li class="dropdown"><a href="#infoUsac">Oferta académica</a></li>

                    <!-- <li><a href="#features">Servicios</a></li> -->

                    <li><a href="#títulos">Títulos</a></li>
                    <li class="dropdown"><a href="#about">Nosotros</a><i class="bi bi-chevron-down"></i>
                        <ul>
                            <ol><a href="#about" id="tabla1">Historia</a></ol>
                            <ol><a href="#about" id="tabla2">Misión</a></ol>
                            <ol><a href="#about" id="tabla3">Visión</a></ol>
                        </ul>
                    </li>



                    <li><a href="{{ route('tramites') }}">Trámites</a></li>
                    <li class = "dropdown"><a href="#">Reglamentos</a><i class="bi bi-chevron-down"></i>
                        <ul style="list-style: none;">
                                <li><a href="{{ route('reglamento.estudiantil') }}">Reg. Estudiantil</a></li>
                                <li><a href="{{ route('reglamento.electoral') }}">Reg. Electoral</a></li>
                                <li><a href="{{ route('portal.manual-normasyprocedimientos') }}">Manual Normas y Procedimientos</a></li>

                        </ul>

                    </li>
                    <li class = "dropdown"><a href="{{ route('formulario.administrativo') }}">Formularios administrativos</a><i class="bi bi-chevron-down"></i>
                    <li><a href="#contact">Contáctanos</a></li>
                    </ul>
                <div class="selector"></div>
            </nav>

            <!-- Module - Objects -->
            <div class="module module-object" align= "center">
                <span class="object-name" ><a href="#"><img src="{{ asset('assets2/img/logo2.svg')}}" width="85" alt=""></a></span>
            </div>

            <!-- Module - Language -->
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
                <a href="#" id="nav-toggle" class="nav-toggle" ><span></span><span></span><span></span><span></span></a>
            </div>
        </header>
        <!-- Header / End -->

        <!-- Content -->
        <div id="content">

            <!-- Section / / -->
            <section id="home" class="section h-fullheight bg-dark cover dark">

                <!-- Slider Main -->
                <div class="slider-main slider-kenburns inner-controls" style="margin-left: 0px; width: 100%;">


                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider03.jpg')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                            <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;"><b>Universidad de San Carlos de Guatemala</b></h1>
                        </div>
                    </div>
                    <div class="slide">
                    <a href="//becas.usac.edu.gt" target="_blank">
                        <div style="border: 15px; solid; color:#fdc134" class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider08.jpg')}}" style="width:50%" alt="">
                        </div>
                        </a>
                    </div>
                    <!--Slide-->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider04.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em; text-shadow: 6px 6px #0F2949;">Registro y Estadística</h1>
                        </div>
                    </div>
                    <!-- Slide-->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider02.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em; text-shadow: 6px 6px #0F2949;">❝Id y enseñad a todos❞</h1>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider09_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">Universidad de San Carlos de Guatemala</h1>
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider10_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">Registro y Estadística</h1>
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider11_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">❝Id y enseñad a todos❞</h1>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider13_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">Universidad de San Carlos de Guatemala</h1>
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider14_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">Registro y Estadística</h1>
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider15_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">❝Id y enseñad a todos❞</h1>
                        </div>
                    </div>
                    <!-- Slide -->
                    <<div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img style="width: 1640px; height: 924px;" src="{{ asset('assets2/img/photos/slider16b_thumbnail.png ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <!--<h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">Registro y Estadística</h1>-->
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider17_thumbnail.jpg ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">❝Id y enseñad a todos❞</h1>
                        </div>
                    </div>
                    <<div class="slide">
                        <div class="slide-bg bg-image-holder bg-image-fixed">
                            <img src="{{ asset('assets2/img/photos/slider18_thumbnail.png ')}}" alt="">
                        </div>
                        <div class="slide-content container text-center">
                        <!--<h1 style = "font-size: 3.7em;text-shadow: 6px 6px #0F2949;">Registro y Estadística</h1>-->
                        </div>
                    </div>

                </div>

                <!-- Slider Navigation -->
                <div class="slider-main-nav">
                    <!-- <div class="slide"><img src="{{ asset('assets2/img/photos/slider05.png')}}" alt=""></div> -->
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider03_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><a href="//becas.usac.edu.gt/" target="_blank"><img src="{{ asset('assets2/img/photos/slider08_thumbnail.jpg')}}" alt=""></a></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider04_thumbnail.jpg')}}" alt=""></div>
                    <!-- <div class="slide"><img src="{{ asset('assets2/img/photos/slider01_thumbnail.jpg')}}" alt=""></div> -->
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider02_thumbnail.jpg')}}" alt=""></div>
                    <!-- <div class="slide"><img src="assets/img/photos/slider05_thumbnail.jpg" alt=""></div> -->


                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider09_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider10_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider11_thumbnail.jpg')}}" alt=""></div>
                    <!-- <div class="slide"><img src="{{ asset('assets2/img/photos/slider12_thumbnail.jpg')}}" alt=""></div> -->
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider13_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider14_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider15_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider16b_thumbnail.png')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider17_thumbnail.jpg')}}" alt=""></div>
                    <div class="slide"><img src="{{ asset('assets2/img/photos/slider18_thumbnail.png')}}" alt=""></div>
                    <!-- FOTOS POSTULANTES PARA SU AGEGACION -->

                </div>

                <!-- Gallery Toggle -->
                <a href="{{url('/')}}" class="fullscreen-toggle" data-items="gallerySliderItems" data-toggle="gallery">
                    <span class="arrow-tl"></span>
                    <span class="arrow-tr"></span>
                </a>

            </section>



            <!-- Section / INFORMACION IMPORTANTE -->
            <section id="infoImportante" class="section-double bg-blue-info " loading="lazy">
                <div class="slide-content container text-center">
                    <br>
                    <h1 style = "font-size: 2.5em; color:white; align: center">Información de Interés</h1>
                    <hr>
                    <div class="row" align= "center">


        <!------------------------------ diseño 3d informacion de interes ---------------------->
        <article>
            <a title="Trámites" href="{{ route('reqPING') }}" >
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/aspirantes.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a title="Trámites" href="{{ route('formulario.administrativo')}}" >
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/tramites.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a title="Obtener Pin Estudiante" href="{{ url('pin_estudiante')}}" >
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/pinEstudiante.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a title="Obtener Pin Aspirante" href="{{ url('pin_aspirante')}}">
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/pinAspirante.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a title="Inscripción de Pendientes de Exámenes Generales" href="https://registro.usac.edu.gt/inscripcion_peg/" target="_blank">
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/inscripcion_peg.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a align="center" title="Incorporación" href="{{ url('formulario_incorporado')}}">
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/incorporados.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a align="center" title="Postgrado" href="{{ url('formulario_postgrado')}}">
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/postgrado.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <article>
            <a align="center" title="Carnet" href="{{ url('acta_carnet')}}">
            <div class="item-wrapper">
                <figure>
                    <div class="image" style="background-image:url({{asset('assets2/img/infoImportante/carnets.svg')}});"></div>
                    <div class="lighting"></div>
                </figure>
            </a>
        </article>
        <!---------------------end 3d articulos ------------>
                    </div>
                </div>
                <hr/>
            </section>


            <!-- Section / infoUsac -->
            <section id="infoUsac" class="section bg-light pt-0 pb-5" loading="lazy">

                <!-- <br/> -->


                <div class="objects-container container" align= "center">
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
                                            <a class="link-inherit" href="{{ url('/facultades')}}"><img
                                                    src="{{ asset('assets2/img/objects/Facultades.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('/facultades')}}">Facultades</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total facultades:</span> 10</li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('/facultades')}}" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Ver Opciones</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="{{ url('/centros')}}"><img
                                                    src="{{ asset('assets2/img/objects/Centros.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('/centros')}}">Centros</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total centros:</span> 14 </li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('/centros')}}" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Ver Opciones</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- Object - Vertical -->
                                    <div class="object object-vertical">
                                        <div class="object-image">
                                            <a class="link-inherit" href="{{ url('/escuelas')}}"><img
                                                    src="{{ asset('assets2/img/objects/Escuelas.png')}}" alt=""></a>
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
                                            <a class="link-inherit" href="{{ url('/institutos')}}"><img
                                                    src="{{ asset('assets2/img/objects/Institutos.png')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="{{ url('/institutos')}}">Institutos</a></h5>
                                            <ul class="object-details list-unstyled">
                                                <li><span class="text-muted">Total institutos:</span> 3</li>
                                                <!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
                                            </ul>
                                            <a href="{{ url('/institutos')}}" class="object-btn btn btn-secondary"><span
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
                                        <a class="link-inherit" href="{{ url('/facultades')}}"><img
                                                src="{{ asset('assets2/img/objects/Facultades.png')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="{{ url('/facultades')}}">Facultades</a></h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total facultades:</span> 10</li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('/facultades')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver </span> Opciones</a>
                                </div>
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="{{ url('/centros')}}"><img
                                                src="{{ asset('assets2/img/objects/Centros.png')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="{{ url('/centros')}}">Centros</a>
                                        </h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total centros:</span> 14 </li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('/centros')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver</span> Opciones</a>
                                </div>
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="{{ url('/escuelas')}}"><img
                                                src="{{ asset('assets2/img/objects/Escuelas.png')}}" alt=""></a>
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
                                        <a class="link-inherit" href="{{ url('/institutos')}}"><img
                                                src="{{ asset('assets2/img/objects/Institutos.png')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="{{ url('/institutos')}}">Institutos</a>
                                        </h5>
                                        <ul class="object-details list-inline">
                                            <li><span class="text-muted">Total institutos:</span> 3</li>
                                            <!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
                                        </ul>
                                    </div>
                                    <a href="{{ url('/institutos')}}" class="object-btn btn btn-secondary"><span
                                            class="hidden-xs-down">Ver</span> Opciones</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>



            <!------------ Interfaz 3D Contadores-------------------->


                <div class="containter-contador bg-light">
                    <!-- container slider--->
                    <div class="slider-container-contador">
                        <div class="containter-titleh3">
                            <h2 class="mb-0 titleh3">INSCRITOS CICLO {{$ciclo}}</h2>
                        </div>
                        <!--- slider items--->
                        <ui class="slider-items">
                            <li class="item-1"><div class="slider-items-cont"><img src="{{ asset('assets2/img/contadores/Total4.png')}}" alt=""><h3 class=" contador_text contador_cantidad" data-cantidad-total="{{$totalT}}">0</h3></div></li>
                            <li class="item-2"><img src="{{ asset('assets2/img/contadores/Facultades2.png')}}"" alt=""><a class="link-inherit" href="{{ url('/contadorfacultades')}}"><div class="slider-items-cont"><h3 class="contador_text contador_cantidad" data-cantidad-total="{{$facultadT}}">0</h3></div></a></li>
                            <li class="item-3"><img src="{{ asset('assets2/img/contadores/Centros2.png')}}" alt=""><a class="link-inherit" href="{{ url('/contadorcentros')}}"><div class="slider-items-cont"><h3 class="contador_text contador_cantidad" data-cantidad-total="{{$centrosT}}">0</h3></div></a></li>
                            <li class="item-4"><img src="{{ asset('assets2/img/contadores/escuelas2.png')}}" alt=""><a class="link-inherit" href="{{ url('/contadorescuelas')}}"><div class="slider-items-cont"><h3 class="contador_text contador_cantidad" data-cantidad-total="{{$escuelasT}}">0</h3></div></a></li>
                            <li class="item-5"><img src="{{ asset('assets2/img/contadores/instituciones2.png')}}" alt=""><a class="link-inherit" href="{{ url('/contadorinstitutos')}}"><div class="slider-items-cont"><h3 class="contador_text contador_cantidad" data-cantidad-total="{{$instiT}}">0</h3></div></a></li>
                        </ui>
                        <!----- slider navigation --->
                        <div class="slider-navigation">
                            <button class="slider-nav prev"> </button>
                            <button class="slider-nav next"> </button>
                        </div>
                        <!------ slider dots --->
                        <div class="slider-dots">
                            <ui>
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ui>
                            <div> <h6><strong>Datos preliminares, para información oficial comunicarse con Registro y Estadística.<strong></h6></div>
                        </div>
                    </div>
                    <!---- -->
                </div>
                <!-- -->


            <!-- TÍTULOS -->
            <section id="títulos" class="section-b bg-light" >
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <figure class="media-box">
                                <div class="image"><img src="{{ asset('img/titulo.png')}}" alt=""></div>
                                <!--button class="btn-play animated" data-toggle="video-modal"
                                    data-target="#modalVideo"
                                    data-video="https://www.youtube.com/embed/hLMH89ImvTo" ></button-->
                            </figure>
                        </div>
                        <div class="col-lg-5 push-lg-1 col-md-6">
                            <h1>TÍTULOS</h1>
                            <ul class="nav nav-icons" role="tablist">
                                <li class="nav-item"><a href="#tab_about" data-toggle="tab" class="nav-link active"><i
                                            class="ti-comment"></i>Información</a></li>
                            </ul>
                            <div class="tab-content" data-local-scroll>
                                <div id="tab_about" class="tab-pane fade show active" role="tabpanel">

                                    <p class="mb-5" align="justify" >
                                        El estudiante de la Universidad de San Carlos de Guatemala podrá iniciar el trámite Título
                                        académico una vez cumpla con los requisitos correspondientes. Cada Unidad Académica se
                                        encarga de ingresar la información correspondiente en el Sistema de Títulos, al finalizar
                                        el proceso de firma, el Departamento de Registro y Estadística, se encarga de la
                                        impresión, verificación y entrega del mismo.
                                    </p>

                                    <a href="https://siti.usac.edu.gt/titulos/login" class="btn btn-primary mb-4" target="_blank">Ir al sitio</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </section>

<div class="objects-container container" loading="lazy" align= "center">
    <div class="tab-content">
        <div id="grid_view" class="tab-pane fade show active" role="tabpanel">
            <!-- Objects - Grid-->
            <div class="objects-grid gutters-sm row">
                <div class="col-lg-4 col-12">
                    <!-- Object - Vertical -->
                    <div class="object object-vertical">
                        <div class="object-image">
                            <a class="link-inherit" href="#about" id="tabla1_1"><img
                            class="rounded shadow" src="{{ asset('assets2/img/photos/historia.png')}}" alt=""></a>
                        </div>
                        <div class="object-content">
                            <h5 class="object-title"><a class="link-inherit" href="#about" id="tabla1_2">Historia</a></h5>
                            <ul class="object-details list-unstyled">
                            </ul>
                            <button class="object-btn btn btn-secondary" onclick="toggle_modal('#tabla_1')" type="button" data-bs-toggle="modal" data-bs-target="#tabla_1">Ver Información</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <!-- Object - Vertical -->
                    <div class="object object-vertical">
                        <div class="object-image">
                            <a class="link-inherit" href="#about" id="tabla2_1"><img
                            class="rounded shadow" src="{{ asset('assets2/img/photos/mision.png')}}" widht = "250" alt=""></a>
                        </div>
                        <div class="object-content">
                            <h5 class="object-title"><a class="link-inherit" href="#about" id="tabla2_2">Misión</a></h5>
                            <ul class="object-details list-unstyled">
                            </ul>
                            <button class="object-btn btn btn-secondary" onclick="toggle_modal('#tabla_2')" type="button" data-bs-toggle="modal" data-bs-target="#tabla_2">Ver Información</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <!-- Object - Vertical -->
                    <div class="object object-vertical">
                        <div class="object-image">
                            <a class="link-inherit" href="#about" id="tabla3_1"><img
                            class="rounded shadow" src="{{ asset('assets2/img/photos/vision.png')}}" alt=""></a>
                        </div>
                        <div class="object-content">
                            <h5 class="object-title"><a class="link-inherit" href="#about" id="tabla3_2">Visión</a></h5>
                            <ul class="object-details list-unstyled">
                            </ul>
                            <button class="object-btn btn btn-secondary" onclick="toggle_modal('#tabla_3')" type="button" data-bs-toggle="modal" data-bs-target="#tabla_1">Ver Información</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>

</section>

            <!-- Section / Contact -->
            <section id="contact" class="section section-double bg-light" loading="lazy">
                <div class="row">
                    <div class="content col-sm-4 ">
                        <h2 class="mb-0">Contáctanos!</h2>

                        <hr class="hr-primary">
                        <address>
                            Edificio DIGA<br>
                            Zona 12<br>
                            Ciudad Universitaria<br>
                        </address>
                        <a href = "tel: +50224187900">
                            PBX: +502 2418-7900
                        </a>
                        <br>
                        <a href = "tel: +50224187902">
                            PBX: +502 2418-7902
                        </a>
                        <hr>
                        <p >
                            <b>Horario de atención:</b>
                            <span/>
                            Lunes a Viernes:  7:30 - 15:30 hrs.
                            <br>
                        </p>
                        <br>
                        <a  align = "center" href="https://www.facebook.com/ryeusac"  target="_blank" class="icon icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <br>
                    </div>

                    <div class="content col-md-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.1943370271183!2d-90.55285184894288!3d14.587999489760533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a13d8b20d2e9%3A0x8d70b585ba3b9346!2sRegistro%20Y%20Estadistica%20USAC!5e0!3m2!1ses-419!2sgt!4v1617994939147!5m2!1ses-419!2sgt"  width="100%" height= "400"style="border:1;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

            </section>

        </div>
        <!-- Content / End -->

        <!-- Footer -->
        <footer id="separator" class="footer-fixed bg-dark dark" loading="lazy">

            <div class="container" id="footerrye">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left mb-5 mb-md-0" >
                        <a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="85" alt=""></a>
                    </div>

                    <div class="col-md-6 text-center text-md-right">
                        <ul class="nav nav-footer mr-4">
                            <li><a href="#">Inicio</a></li>
                            <!-- <li><a href="#" target="_blank">Documentation</a></li> -->
                        </ul>
                        <ul class="nav nav-footer">
                            <li>ES</li>
                        </ul>
                    </div>
            <hr>
            <div align= "center" id="copyright">Copyright&copy; 2021 - Informática, Registro y Estadística - Todos los derechos reservados</div>

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

            <!-- <h3 class="text-center mb-5">Fotografías</h3> -->
            <!-- Close -->
            <button class="panel-objects-close close" data-toggle="panel-objects"></button>

        </div>


    </nav>


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
                src: "{{ asset('assets2/img/photos/slider03.jpg')}}",
                w: 1920,
                h: 1080
            },
            {
                src: "{{ asset('assets2/img/photos/slider04.jpg')}}",
                w: 1920,
                h: 1080
            },

            // {
            //     src: "{{ asset('assets2/img/photos/slider01.jpg')}}",
            //     w: 4032,
            //     h: 3024
            // },
            {
                src: "{{ asset('assets2/img/photos/slider02.jpg')}}",
                w: 4032,
                h: 2268
            }


            ,

            {
                src: "{{ asset('assets2/img/photos/slider09_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider10_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider11_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            // {
            //     src: "{{ asset('assets2/img/photos/slider12_thumbnail.jpg')}}",
            //     w: 4032,
            //     h: 2268
            // },
            {
                src: "{{ asset('assets2/img/photos/slider13_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider14_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider15_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider16b_thumbnail.png')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider17_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            }

        ];

        var galleryCarouselItems = [
            {
                src: "{{ asset('assets2/img/gallery/gallery01.jpg')}}",
                w: 1100,
                h: 750
            },
            {
                src: "{{ asset('assets2/img/gallery/gallery02.jpg')}}",
                w: 1100,
                h: 750
            },
            {
                src: "{{ asset('assets2/img/gallery/gallery03.jpg')}}",
                w: 1100,
                h: 750
            },
            {
                src: "{{ asset('assets2/img/gallery/gallery04.jpg')}}",
                w: 1100,
                h: 750
            }
            ,

            {
                src: "{{ asset('assets2/img/photos/slider09_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider10_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider11_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },

            {
                src: "{{ asset('assets2/img/photos/slider13_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider14_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider15_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            },
            {
                 src: "{{ asset('assets2/img/photos/slider16b_thumbnail.png')}}",
                 w: 4032,
                 h: 2268
            },
            {
                src: "{{ asset('assets2/img/photos/slider17_thumbnail.jpg')}}",
                w: 4032,
                h: 2268
            }
        ];
    </script>


<!-- MODAL PARA LA INFORMACION DE "HISTORIA" -->
    <div id="tabla_1" class="modal" aria-labelledby="tabla_1" aria-hidden="true" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Historia</h2>
					<span class="close" id="close1" onclick="toggle_modal('#tabla_1')"></span>
				</div>
				<div class="modal-body">

                            <h4>El Departamento de Registro y Estadística inició sus labores como Oficina de
                                registro el primero de enero del año 1962, bajo la dirección del Licencidado Felipe de
                                Jesús Mendizábal y Mendizábal, desarrollando un plan de centralización de los registros
                                universitarios en la forma siguiente: </h4>
                            <ul>
                                <li><h4>En 1962, se centralizaron los registros de los estudiantes de primer ingreso.</h4></li>
                                <li><h4>En 1963, se centralizó la inscripción y los registros de los estudiantes de primero
                                    y segundo año.</h4></li>
                                <li><h4>En 1964, se centralizó la inscripción y los registros de toda la universidad.</h4></li>
                            </ul>

                            <h4>En el inicio de sus labores la Oficina de Registro y Estadística planificó un
                                procedimiento mecanizado que puso en práctica a través de un contrado con IBM e
                                Guatemala. Este permitiría el registro y control exacto de la inscripción de los
                                estudiantes, para poder ofrecer a las Unidades Académicas listas oficiales de matrícula,
                                listas por cuso en orden alfabético, actas de exámenes, reporte de calificaciones a
                                estudiantes e información estadística de los datos personales, demográficos y
                                educacionales. Para lo cual fue necesaria la codificación general de los cursos que
                                formaban los planes de estudios de las distintas facultades, trabajo que se encuentra
                                concluido.</h4>

                </div>
				<div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
<!-- MODAL PARA LA INFORMACION DE "HISTORIA" -->

<!-- MODAL PARA LA INFORMACION DE "MISION" -->
<div id="tabla_2" class="modal">
		<div class="t2" id="t2">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Misión</h2>
					<span class="close" id="close2" onclick="toggle_modal('#tabla_2')"></span>
				</div>
				<div class="modal-body">

                            <h4>Llevar el control de servicios estudiantiles que presta el Departamento a través de un registro
                            sistematizado, actualizado, eficiente y eficaz.</h4>

                </div>
				<div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
<!-- MODAL PARA LA INFORMACION DE "MISION" -->

<!-- MODAL PARA LA INFORMACION DE "VISION" -->
<div id="tabla_3" class="modal">
		<div class="t3" id="t3">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Visión</h2>
					<span class="close" id="close3" onclick="toggle_modal('#tabla_3')"></span>
				</div>
				<div class="modal-body">

                            <h4>El Departamento de Registro y Estadística es responsable del proceso de inscripción,
                            recolección, análisis e interpretación de información estadística. Para ofrecer a los
                            estudiantes, autoridades universitarias, profesionales y público en general información
                            que los oriente adecuadamente en las distintas actividades académicas y administrativas
                            de la Universidad.</h4>

                </div>
				<div class="footer">
                    <!-- aqui estara el logo de rye -->

                    <br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
<!-- MODAL PARA LA INFORMACION DE "VISION" -->

<!-- MODAL PARA INDICAR QUE LA INSCRIPCION DE REINGRESO -->
<div id="tabla_5" class="modal">
		<div class="t5" id="t5">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Inscripciones - Reingreso</h2>
					<span class="close" id="close5"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div><img src="{{asset('assets2/img/posts/inscripciones_pregrado.png')}}" width = "100%", height= "550em"></div>
                                    </article>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Content / End -->
    				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->
					<br>
					<a href="#"><img src="{{asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
<!-- MODAL PARA INDICAR QUE LA INSCRIPCION DE REINGRESO -->
<!-- MODAL PARA INDICAR QUE LA INSCRIPCION DE REINGRESO -->



    <!-- MODAL PARA INDICAR QUE LA INSCRIPCION DE REINGRESO -->



    <!-- JS Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
	<!--<script src="{{ asset('assets2/js/main_nosotros.js')}}"></script>-->
    <script src="{{ asset('assets2/js/animacion_contadores.js')}}"></script>


</body>



</html>

<script>
    var articles = $('article > .item-wrapper'),
    lightingRgb = '44,55,95';

articles.mousemove(function(e) {
  var current = $(this),
      x = current.width() - e.offsetX * 2,
      y = current.height() - e.offsetY * 2,
      rx = -x / 30,
      ry = y / 24,
      deg = Math.atan2(y, x) * (180 / Math.PI) + 45;
  current.css({"transform":"scale(1.05) rotateY("+rx+"deg) rotateX("+ry+"deg)"});
  $('figure > .lighting',this).css('background','linear-gradient('+deg+'deg, rgba('+lightingRgb+',0.32) 0%, rgba('+lightingRgb+',0) 70%)');
});

articles.on({
  'mouseenter':function() {
    var current = $(this);
    current.addClass('enter ease').removeClass("leave");
    setTimeout(function(){
      current.removeClass('ease');
    }, 280);
  },
  'mouseleave':function() {
    var current = $(this);
    current.css({"transform":"rotate(0)"});
    current.removeClass('enter').addClass("leave");
    $('figure > .lighting',this).removeAttr('style');
  }}
);

function toggle_modal(id){
    $(id).modal("toggle");
}
</script>

<script src="{{ asset('assets2/js/contadores3d.js')}}"></script>
