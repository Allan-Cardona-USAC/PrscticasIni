<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->

    <title>Trámites - Portal Registro y Estadística</title>

<!-- Favicons -->
<link rel="shortcut icon" href="{{asset('assets2/img/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('assets2/img/favicon_60x60.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets2/img/favicon_76x76.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets2/img/favicon_120x120.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets2/img/favicon_152x152.png')}}">

<!-- CSS Plugins -->
<link rel="stylesheet" href="{{asset('assets2/plugins/bootstrap/dist/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets2/plugins/slick-carousel/slick/slick.css')}}" />
<link rel="stylesheet" href="{{asset('assets2/plugins/animate.css/animate.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets2/plugins/animsition/dist/css/animsition.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets2/plugins/photoswipe/dist/photoswipe.css')}}" />
<link rel="stylesheet" href="{{asset('assets2/plugins/photoswipe/dist/default-skin/default-skin.css')}}" />

<!-- CSS Icons -->
<link rel="stylesheet" href="{{asset('assets2/css/themify-icons.css')}}" />
<link rel="stylesheet" href="{{asset('assets2/plugins/font-awesome/css/font-awesome.min.css')}}" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="{{asset('assets2/css/themes/theme-blue.css')}}" />

<!-- PARA MODAL DE CADA ANUNCIO -->
<link rel="stylesheet" href="{{asset('assets2/css/estilos_publicidad.css')}}">

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
            <ul class="nav nav-main-horizontal">
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
                <li><a class="active" href="#">ES</a></li>
            </ul>
        </nav>



    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title dark bg-dark">
            <!-- BG Image -->
            <div class="bg-image-holder bg-image-fixed"><img src="{{asset('assets2/img/photos/slider03.jpg')}}" alt=""></div>
            <div class="container text-center">
                <h1 style="font-size: 3.0em; text-shadow: 3px 3px #0f2949"><b>Trámites</b></h1>
                <p class="lead mb-0"> <b><b> En esta sección se ingresan todos los anuncios con su respectiva información, requisitos y procedimientos actualizados. </b></b> </p>
            </div>
        </div>

        <!-- Section / Blog -->
        <section id="blog" class="section pb-2">

            <h2 class="sr-only">Posts List</h2>

            <div class="page-content container">

                <!-- Main -->
                <div class="page-main left">
                    <div class="row gutters-lg masonry">
                        <div class="masonry-sizer col-sm-6 col-12"></div>

                        <!-- Post para Certificaciones -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post - Item -->
                            <article class="post item">
                                <div class="post-image">
                                    <a  href="#" id="tabla11"><img src="{{asset('assets2/img/posts/Certificaciones.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla11_1">Certificaciones</a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Certificaciones -->
                                            <li><a href="#" id="fecha"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>

                                    </ul>
                                </div>
                            </article>
                        </div>
                        <!-- Post para Certificaciones -->

                        <!-- Post para Títulos -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post - Item -->
                            <article class="post item">
                                <div class="post-image">
                                    <a href="#" id="tabla12"><img src="{{asset('assets2/img/posts/Títulos.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla12_1">Títulos</a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Títulos -->
                                            <li><a href="#" id="fecha2"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>
                                    </ul>
                                    <!-- <p>Si por alguna razón no logra finalizar o realizar su proceso, comunicarse al correo: </p>  -->
                                </div>
                            </article>
                        </div>
                        <!-- Post para Títulos -->

                        <!-- Post para las Estadística -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post - Item -->
                            <article class="post item">
                                <div class="post-image">
                                    <a href="#" id="tabla15"><img src="{{asset('assets2/img/posts/Estadística.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla15_1">Estadística
                                    </a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Estadística -->
                                            <li><a href="#" id="fecha3"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <!-- Post para las Estadística -->

                        <!-- Post para Carné -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post para Carné -->
                            <article class="post item">
                                <div class="post-image">
                                    <a href="#" id="tabla16"><img src="{{asset('assets2/img/posts/Carné.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla16_1">Carné</a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Carné -->
                                            <li><a href="#" id="fecha4"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <!-- Post para Carné -->

                        <!-- Post para Traslados -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post - Item -->
                            <article class="post item">
                                <div class="post-image">
                                    <a href="#" id="tabla17"><img src="{{asset('assets2/img/posts/Traslados.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla17_1">Traslados</a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Traslados -->
                                            <li><a href="#" id="fecha15"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>
                                    </ul>
                                    <!-- <p>Si por alguna razón no logra finalizar o realizar su proceso, comunicarse al correo: </p>  -->
                                </div>
                            </article>
                        </div>
                        <!-- Post para Traslados -->

                        <!-- Post para Retiro de Matrícula -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post para Retiro de Matrícula -->
                            <article class="post item">
                                <div class="post-image">
                                    <a href="#" id="tabla18"><img src="{{asset('assets2/img/posts/Retiro_de_Matrícula.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla18_1">Retiro de Matrícula</a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Retiro de Matrícula -->
                                            <li><a href="#" id="fecha16"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <!-- Post para Retiro de Matrícula -->

                        <!-- Post para Certificaciones de Autentica -->
                        <div class="masonry-item col-sm-6 col-12">
                            <!-- Post para Certificaciones de Autentica -->
                            <article class="post item">
                                <div class="post-image">
                                    <a href="#" id="tabla19"><img src="{{asset('assets2/img/posts/certificados_autentica.png')}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="#" id="tabla19_1">Certificaciones de Auténtica
                                    </a></h4>
                                    <ul class="post-meta">
                                        <!-- Fecha de publicacion para Certificaciones de Autentica -->
                                            <li><a href="#" id="fecha17"></a></li>

                                        <li><a href="https://registro.usac.edu.gt">by Registro</a></li>
                                        <li><a href="#">RyE</a>, <a href="#">DIGA</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <!-- Post para Certificaciones de Autentica -->

                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="{{ route('tramites2') }}" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                    <span class="sr-only" >Previous</span>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link " href="{{ route('tramites') }}">1</a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Pagination -->
                </div>

                <!-- Sidebar -->
                <div class="page-sidebar right">
                    <!-- Widget - Recent posts -->
                    <div class="widget widget-recent-posts">
                        <h6 class="text-muted">Posts recientes</h6>
                        <ul class="list-posts">
                            <li>
                                <div class="image">
                                    <a href="#" id="tabla1_2"><img src="{{asset('assets2/img/posts/aspirantes.jpg')}}" alt=""></a>
                                </div>
                                <div class="content">
                                    <a class="title" href="#" id="tabla1_3">Inscripciones para Aspirantes</a>
                                    <span class="date" id="fecha6"></span>
                                </div>
                            </li>
                            <li>
                                <div class="image">
                                    <a href="#" id="tabla2_2"><img src="{{asset('assets2/img/posts/inscripcion_reingreso.jpg')}}" alt=""></a>
                                </div>
                                <div class="content">
                                    <a class="title" href="#" id="tabla2_3">Inscripciones para Reingreso</a>
                                    <span class="date" id="fecha7"></span>
                                </div>
                            </li>
                            <li>
                                <div class="image">
                                    <a href="#" id="tabla3_2"><img src="{{asset('assets2/img/posts/inscripciones_postgrado.jpg')}}" alt=""></a>
                                </div>
                                <div class="content">
                                    <a class="title" href="#" id="tabla3_3">Inscripciones para Postgrado</a>
                                    <span class="date" id="fecha8"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Widget - Twitter -->
                    <!-- <div class="widget widget-twitter">
                        <h6 class="text-muted">Latest Tweets</h6>
                        <div id="twitter-feed" class="twitter-feed"></div>
                    </div> -->
                </div>

            </div>

        </section>

    </div>
    <!-- Content / End -->

    <!-- Footer -->
    <footer id="footer" class="footer-fixed bg-dark dark">

        <div class="container-custom">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left mb-5 mb-md-0">
                     <a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="200" alt=""></a>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <ul class="nav nav-footer mr-4">
                        <li><a href="{{url('/')}}">Inicio</a></li>
                    </ul>
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
<script src="{{asset('assets2/plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets2/plugins/animsition/dist/js/animsition.min.js')}}"></script>
<script src="{{asset('assets2/plugins/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('assets2/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets2/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('assets2/plugins/jquery.appear/jquery.appear.js')}}"></script>
<script src="{{asset('assets2/plugins/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets2/plugins/jquery.localscroll/jquery.localScroll.min.js')}}"></script>
<script src="{{asset('assets2/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets2/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets2/plugins/masonry-layout/dist/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('assets2/plugins/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets2/plugins/photoswipe/dist/photoswipe.min.js')}}"></script>
<script src="{{asset('assets2/plugins/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('assets2/plugins/twitter-fetcher/js/twitterFetcher_min.js')}}"></script>

<!-- JS Core -->
<script src="{{asset('assets2/js/core.min.js')}}"></script>


<!-- JS Google Map -->
<script src="https://maps.googleapis.com/maps/api/js"></script>


    <!-- POST PARA LAS PUBLICACIONES RECIENTES -->

    <!-- TABLA PARA Inscripciones para Aspirantes -->
	<div id="tabla_1" class="modal">
		<div class="t1" id="t1">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Inscripciones para Primer Ingreso</h2>
					<span class="close" id="close1"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div>
                                                <img src="{{asset('assets2/img/posts/aspirantes.jpg')}}" width = "100%", height= "550em">
                                        </div>
                                        <div class="post-content">
                                            <!-- <h1 class="post-title text-center">Inscripciones para Aspirantes</h1> -->
                                            <hr>
                                            <h2 align = "center">Requisitos de Inscripción</h2>
                                            <p align = "center" class="lead">
                                                <ul><li type="circle">Prueba orientación vocacional</li></ul>
                                                <ul><li type="circle">Pruebas básicas y específicas</li></ul>
                                                <ul><li type="circle">Título a nivel medio</li></ul>
                                                <ul><li type="circle">Certificación general de estudios</li></ul>
                                                <ul><li type="circle">Certificado de nacimiento</li></ul>
                                                <ul><li type="circle">Fotografía en formato JPG</li></ul>
                                            </p>

                                            <hr>
                                            <h2 align = "center">Requisitos de Inscripción Casos Especiales</h2>
                                            <br>
                                            <div class = "row mb-5">
                                                <div class="col-sm-6">
                                                    <h3 align = "center"> Personas con estudios y nacionalidad extranjera</h3>
                                                        <p class="lead">
                                                            <ul><li type="circle">Constancias de pruebas (básicas, especificas, Tarjeta NOV)</li></ul>
                                                            <ul><li type="circle">Fotografía (Blanco y negro, o a color) </li></ul>
                                                            <ul><li type="circle">Solicitud de Ingreso</li></ul>
                                                            <ul><li type="circle">Hoja de equiparación de estudios emitida por MINEDUC original</li></ul>
                                                            <ul><li type="circle">Fotostática de título y su apostilla</li></ul>
                                                            <ul><li type="circle">Certificación de Cursos con su apostilla</li></ul>
                                                            <ul><li type="circle">Copia de Pasaporte autenticado por un abogado guatemalteco  O Certificación de nacimiento apostillado por su país.</li></ul>
                                                        </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3 align= "center">Personas con estudios en Guatemala y nacionalidad extranjera</h3>
                                                        <p class="lead">
                                                            <ul><li type="circle">Constancias de pruebas (básicas, especificas, Tarjeta NOV)</li></ul>
                                                            <ul><li type="circle">Fotografía (Blanco y negro, o a color) </li></ul>
                                                            <ul><li type="circle">Solicitud de Ingreso</li></ul>
                                                            <ul><li type="circle">Fotostática de título o cierre de pensum</li></ul>
                                                            <ul><li type="circle">Certificación de Cursos</li></ul>
                                                            <ul><li type="circle">Copia de Pasaporte autenticado por un abogado guatemalteco  O Certificación de nacimiento apostillado por su país.</li></ul>
                                                        </p>
                                                </div>
                                            </div>
                                            <div class = "row mb-5">
                                                <div class="col-sm-6">
                                                    <h3 align = "center"> Personas con estudios en el extranjero y nacionalidad guatemalteca</h3>
                                                        <p class="lead">
                                                            <ul><li type="circle">Constancias de pruebas (básicas, especificas, Tarjeta NOV)</li></ul>
                                                            <ul><li type="circle">Fotografía (Blanco y negro, o a color) </li></ul>
                                                            <ul><li type="circle">Solicitud de Ingreso</li></ul>
                                                            <ul><li type="circle">Hoja de equiparación de estudios emitida por MINEDUC original</li></ul>
                                                            <ul><li type="circle">Fotostática de título y su apostilla</li></ul>
                                                            <ul><li type="circle">Certificación de Cursos con su apostilla</li></ul>
                                                            <ul><li type="circle">Certificación de nacimiento</li></ul>
                                                        </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3 align = "center"> Exonerados de otras universidades</h3>
                                                        <p class="lead">
                                                            <ul><li type="circle">Constancias de exoneración emitida por Orientación Vocacional (original)</li></ul>
                                                            <ul><li type="circle">Fotografía (Blanco y negro, o a color) </li></ul>
                                                            <ul><li type="circle">Solicitud de Ingreso</li></ul>
                                                            <ul><li type="circle">Fotostática de Titulo de Nivel Universitario</li></ul>
                                                            <ul><li type="circle">Fotostática de título del Nivel Medio</li></ul>
                                                            <ul><li type="circle">Certificación de Cursos del Nivel Medio</li></ul>
                                                            <ul><li type="circle">Certificación de nacimiento</li></ul>
                                                        </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">

                                                    <h3 align = "center">Exonerados por discapacidad </h3>
                                                    <p class="lead">
                                                                <ul><li type="circle">Constancias de exoneración emitida por Orientación Vocacional (original)</li></ul>
                                                                <ul><li type="circle">Fotografía (Blanco y negro, o a color) </li></ul>
                                                                <ul><li type="circle">Solicitud de Ingreso</li></ul>
                                                                <ul><li type="circle">Fotostática de Titulo de Nivel Medio</li></ul>
                                                                <ul><li type="circle">Certificación de Cursos del Nivel Medio</li></ul>
                                                                <ul><li type="circle">Certificación de nacimiento</li></ul>
                                                    </p>
                                                </div>
                                            </div>





                                            <!-- Blockquote -->
                                            <blockquote class="blockquote" style="text-align: justify;">
                                                <h3 style="text-align: center;">Solicitud de Inscripción</h3>
                                                <hr >
                                                    <h4>Registra tu Correo</h4>
                                                        <li type="disc">Ingresa a: <a href="{{url('/login')}}" style="color: blue; text-decoration: underline;">Iniciar Sesion</a> </li>
                                                        <li type="disc">Elige la opción: Aspirantes y selecciona <b><b>¿Primera vez en el portal?</b></b> y activa
                                                            tu NOV ingresandola información que se solicita.</li>
                                                        <li type="disc">Actualiza tu correo seleccionando la opción <b><b>¿Olvidaste tu contraseña?</b></b> </li>
                                                        <li type="disc">Ingresa los datos que se le solicitan. </li>
                                                        <li type="disc">Click en <b><b>Enviar link de recuperación.</b></b> </li>
                                                        <br><br>

                                                    <h4>Revisa tu Correo Electrónico</h4>
                                                        <li type="disc">Recibirás 2 correos: </li>
                                                        <ul>
                                                            1. Solicitud en formulario impreso. <br>
                                                            2. Correo restablecimiento de contraseña. Clic en <b><b>Restablecer contraseña.</b></b>
                                                        </ul>
                                                        <br><br>

                                                    <h4>Cambia tu Contraseña</h4>
                                                        <li type="disc">Correo restablecimiento de contraseña. Clic en  <b><b>Restablecer contraseña.</b></b></li>
                                                        <li type="disc">Ingresa tu NOV y tu contraseña. </li>
                                                        <li type="disc">Confirmar </li>
                                                        <br><br>

                                                    <h4>Ingreso al Portal</h4>
                                                        <li type="disc">Ingresa a: <a href="{{url('/login')}}" style="color: blue; text-decoration: underline;">Iniciar Sesion</a> </li>
                                                        <li type="disc">Elige la opción: Aspirantes.</li>
                                                        <li type="disc">Ingresa tu NOV y tu contraseña.</li>
                                                        <br><br>

                                                    <h4>Realiza tu Solicitud</h4>
                                                        <li type="disc">Elige el Centro donde estudiarás.</li>
                                                        <li type="disc">Elige la Facultad.</li>
                                                        <li type="disc">Elige la carrera.</li>
                                                        <li type="disc">Ingresa tus datos personales.</li>
                                                        <li type="disc">Ingresa los datos de tu carrera.</li>
                                                        <li type="disc">Genera tu solicitud de Inscripción.</li>
                                                        <li type="disc">Imprime tu solicitud de Inscripción.</li>
                                                        <br/><br/>




                                                <!-- <p>Ingresa a: </p>
                                                <p style="color: blue;">www.registro.usac.edu.gt</p>
                                                <br> -->

                                            </blockquote>


                                            <hr>

                                        </div>
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
	<!-- TABLA PARA Inscripciones para Aspirantes -->

	<!-- TABLA PARA Inscripciones para Reingreso -->
	<div id="tabla_2" class="modal">
		<div class="t2" id="t2">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Inscripciones para Reingreso</h2>
					<span class="close" id="close2"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div>
                                                <br><br><br>
                                                <img src="{{asset('assets2/img/posts/inscripcion_reingreso.jpg')}}" width = "100%", height= "550em">
                                        </div>
                                        <div class="post-content">
                                            <!-- <h1 class="post-title text-center">Inscripciones para Aspirantes</h1> -->
                                            <hr>

                                            <!-- Blockquote -->
                                            <blockquote class="blockquote" style="text-align: justify;">
                                                <h3 style="text-align: center;">Solicitud de Inscripción</h3>
                                                <hr >
                                                    <h4>Ingresa al Portal</h4>
                                                        <li type="disc">Ingresa a: <a href="{{url('/login')}}" style="color: blue; text-decoration: underline;">Iniciar Sesion</a> </li>
                                                        <li type="disc">Elige la opción:  <b><b>Estudiante.</b></b></li>
                                                        <li type="disc">Ingresa los datos que se le solicitan: </li>
                                                            <ul>
                                                                1. Registro académico. <br>
                                                                2. Contraseña.
                                                            </ul>
                                                        <br><br>

                                                    <h4>Actualiza los Datos</h4>
                                                        <li type="disc">Actualiza los datos solicitados</li>
                                                        <li type="disc">Acepta la <b><b>Declaración de Responsabilidad</b></b> </li>
                                                        <br><br>

                                                    <h4>Responde la Encuesta</h4>
                                                        <li type="disc">Clic en la opción <b><b>Inscripción.</b></b></li>
                                                        <li type="disc">Responde la encuesta de Registro y Estadística para continuar con el proceso de inscripción.</li>
                                                        <li type="disc">Al terminar de responder la encuesta clic en <b><b>Siguiente Paso.</b></b> </li>
                                                        <br><br>

                                                    <h4>Genera Orden de Pago</h4>
                                                        <li type="disc">Seleccione la carrera para generar la orden de pago.</a> </li>
                                                        <li type="disc">Descarga tu orden de pago.</li>
                                                        <li type="disc">Dirigete al banco autorizado para realizar el pago de la boleta.</li>
                                                        <br><br>

                                                    <h4>Imprime Constancia de Inscripción</h4>
                                                        <li type="disc">Luego de 48 horas que realizaste el pago, dirigete al portal e
                                                            <a href="{{url('/login')}}" style="color: blue; text-decoration: underline;">Inicia Sesión.</a></li>
                                                        <li type="disc">Clic en carrera a la que corresponde el pago.</li>
                                                        <li type="disc">Descarga tu constancia de Inscripción.</li>
                                                        <li type="disc"><b><b>Bienvenido al ciclo 2,021 !</b></b></li>


                                                <!-- <p>Ingresa a: </p>
                                                <p style="color: blue;">www.registro.usac.edu.gt</p>
                                                <br> -->

                                            </blockquote>


                                            <hr>

                                        </div>
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
	<!-- TABLA PARA Inscripciones para Reingreso -->

	<!-- TABLA PARA Inscripciones para Postgrado -->
	<div id="tabla_3" class="modal">
		<div class="t3" id="t3">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Inscripciones para Postgrado</h2>
					<span class="close" id="close3"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div>
                                                <br><br><br>
                                                <img src="{{asset('assets2/img/posts/inscripciones_postgrado.jpg')}}" width = "100%", height= "550em">
                                        </div>
                                        <div class="post-content">
                                            <!-- <h1 class="post-title text-center">Inscripciones para Aspirantes</h1> -->
                                            <hr>
                                            <p id="fecha10" class="lead"></p>


                                            <hr>

                                        </div>
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
	<!-- TABLA PARA Inscripciones para Postgrado -->



<!-- POST DE TODOS LOS TRAMITES EN GENERAL -->

	<!-- TABLA PARA Certificaciones -->
	<div id="tabla_11" class="modal">
		<div class="t11" id="t11">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Certificaciones</h2>
					<span class="close" id="close11"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div class="post-image">
                                                <br><br><br>
                                                <img src="{{asset('assets2/img/posts/Certificaciones.png')}}" alt="">
                                        </div>
                                        <div class="post-content">
                                            <!-- <h1 class="post-title text-center">Inscripciones para Aspirantes</h1> -->
                                            <hr>

                                            <p class="lead">Certificación, documento extendido al estudiante de la Universidad de
                                                San Carlos como constancia de un trámite administrativo.
                                            </p>

                                            <h3>Certificaciones:</h3>
                                            <p class="lead">
                                                <ul><li type="circle">Certificación de Inscripción.</li></ul>
                                                <ul><li type="circle">Certificación trámite de Traslado de Carrera.</li></ul>
                                                <ul><li type="circle">Certificación trámite de Carreras Simultáneas.</li></ul>
                                            </p>



                                            <hr>

                                        </div>
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
					<a href="#"><img src="assets/img/logo.svg" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA Certificaciones -->

	<!-- TABLA PARA Títulos -->
	<div id="tabla_12" class="modal">
		<div class="t12" id="t12">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Títulos</h2>
					<span class="close" id="close12"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div class="post-image">
                                                <br><br><br>
                                                <img src="{{asset('assets2/img/posts/Títulos.png')}}" alt="">
                                        </div>
                                        <div class="post-content">
                                            <!-- <h1 class="post-title text-center">Inscripciones para Aspirantes</h1> -->
                                            <hr>

                                            <!-- Blockquote -->
                                            <!-- <blockquote class="blockquote" style="text-align: justify;"> -->
                                                <hr >

                                                    <p class="lead">El estudiante de la Universidad de San Carlos de Guatemala podrá iniciar
                                                        el trámite Título académico una vez cumpla con los requisitos correspondientes. Cada Unidad Académica
                                                        se encarga de ingresar la información correspondiente en el Sistema de Títulos, al finalizar el proceso de
                                                        firma, el Departamento de Registro y Estadística, se encarga de la impresión, verificación y entrega del mismo.
                                                        Procesos realizados por el Departamento de Registro y Estadística:
                                                    </p>

                                                        <li type="disc">Reposición de Título Universitario.</a> </li>
                                                        <li type="disc">Registro de usuarios en sistema informático de títulos.</a> </li>
                                                        <li type="disc">Emisión de constancia de título universitario en trámite y certificación de
                                                            autenticidad de título universitario.</a> </li>
                                                        <li type="disc">Impresión y registro de título universitario para incorporaciones y reconocimientos de especialidad.</a> </li>
                                                        <li type="disc">Duplicado de título universitario.</a> </li>


                                            <!-- </blockquote> -->


                                            <hr>

                                        </div>
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
					<a href="#"><img src="assets/img/logo.svg" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA Títulos -->

	<!-- TABLA PARA Estadística -->
	<div id="tabla_5" class="modal">
		<div class="t5" id="t5">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Estadística</h2>
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
                                        <div class="post-image"><img src="{{asset('assets2/img/posts/Estadística.png')}}" alt=""></div>
                                        <div class="post-content">
                                            <hr>


                                            <h3>El área de Estadística es el ente que tiene a su cargo desarrollar las siguientes funciones:</h3>

                                            <li type="circle">Crear cuadros Estadísticos con información especial requerida.</li>
                                            <li type="circle">Crear catálogo de Estudios.</li>
                                            <li type="circle">Recepción, revisión y proceso de información de graduados.</li>
                                            <li type="circle">Creación de Código de Unidad Académica, sede o secciones departamentales, plan de estudio y carrera.</li>
                                            <li type="circle">Publicaciones Estadísticas.</li>



                                            <hr>

                                        </div>
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
					<a href="#"><img src="assets/img/logo.svg" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA Estadística -->

	<!-- TABLA PARA Carné -->
	<div id="tabla_6" class="modal">
		<div class="t6" id="t6">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Carné</h2>
					<span class="close" id="close6"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div class="post-image">
                                                <br><br><br>
                                                <img src="{{asset('assets2/img/posts/Carné.png')}}" alt="">
                                        </div>
                                        <div class="post-content">
                                            <!-- <h1 class="post-title text-center">Inscripciones para Aspirantes</h1> -->
                                            <hr>

                                            <!-- Blockquote -->
                                            <!-- <blockquote class="blockquote" style="text-align: justify;"> -->
                                                <hr >

                                                    <p class="lead">El estudiante de la Universidad de San Carlos de Guatemala puede solicitar el
                                                        documento que lo acredita como estudiante universitario, siempre y cuando su estado sea
                                                        inscrito en el año solicitado
                                                    </p>

                                                    <h3>Costo:</h3>

                                                        <li type="disc">Primer carné <b><b>Q.5.00</b></b></a> </li>
                                                        <li type="disc">Segundo carné en adelante <b><b>Q.15.00</b></b></a> </li>


                                            <!-- </blockquote> -->


                                            <hr>

                                        </div>
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
					<a href="#"><img src="assets/img/logo.svg" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA Carné -->

	<!-- TABLA PARA Traslados -->
	<div id="tabla_7" class="modal">
		<div class="t7" id="t7">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Traslados</h2>
					<span class="close" id="close7"></span>
				</div>
				<div class="modal-body">


                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div class="post-image"><img src="{{asset('assets2/img/posts/Traslados.png')}}" alt=""></div>
                                        <div class="post-content">
                                            <hr>

                                            <h3>Todo estudiante de la Universidad de San Carlos de Guatemala puede realizar el trámite de traslado de
                                                matrícula de una Unidad Académica a otra. Existen dos tipos:</h3>

                                            <p class="lead">
                                                <ol>
                                                    <li type="circle">Estudiantes no inscritos en el ciclo que se inicia.</li>
                                                    <li type="circle">Estudiantes inscritos</li>
                                                </ol>
                                            </p>


                                            <h3>Requisitos:</h3>

                                            <p class="lead">
                                                <ol>
                                                    <li type="circle">Llenar formulario de Trámites Administrativos.</li>
                                                    <li type="circle">Pruebas de Conocimientos Básicos y Específicos (Si aplica)</li>
                                                    <li type="circle">Solvencia extendida por el Departamento de Caja.</li>
                                                    <li type="circle">Solicitud de traslado en formulario impreso proporcionado por el
                                                        Departamento de Registro y Estadística.</li>
                                                </ol>
                                            </p>




                                            <hr>

                                        </div>
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
					<a href="#"><img src="assets/img/logo.svg" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA Traslados -->

	<!-- TABLA PARA Retiro de Matrícula -->
	<div id="tabla_8" class="modal">
		<div class="t8" id="t8">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Retiro de Matrícula</h2>
					<span class="close" id="close8"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div class="post-image"><img src="{{asset('assets2/img/posts/Retiro_de_Matrícula.png')}}" alt=""></div>
                                        <div class="post-content">
                                            <hr>

                                            <p class="lead">
                                                El estudiante de la Universidad de San Carlos de Guatemala puede solicitar retiro de matrícula estudiantil.
                                            </p>

                                            <h2>Requisitos:</h2>


                                            <p class="lead">
                                                <ol>
                                                    <li type="circle">Presentar por escrito la solicitud de cancelación de matrícula estudiantil.</li>
                                                </ol>
                                            </p>


                                            <hr>

                                        </div>
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
					<a href="#"><img src="assets/img/logo.svg" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA Retiro de Matrícula -->

	<!-- TABLA PARA Certificaciones de Autentica -->
	<div id="tabla_9" class="modal">
		<div class="t9" id="t9">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Certificaciones de Auténtica</h2>
					<span class="close" id="close9"></span>
				</div>
				<div class="modal-body">

                        <!-- Content -->
                        <div id="content">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 push-lg-1">

                                    <!-- Post / Single -->
                                    <article class="post single">
                                        <div class="post-image"><img src="{{asset('assets2/img/posts/certificados_autentica.png')}}" alt=""></div>
                                        <div class="post-content">
                                            <hr>

                                            <h3>Solicitud de certificación de auténtica</h3>

                                            <p class="lead">
                                                Se le informa a estudiantes y egresados de la Universidad de San Carlos de Guatemala que el proceso para solicitar
                                                certificación de auténtica en Secretaria General se realizará vía electrónica en el siguiente 
                                                <b><a class="btn btn-primary" href="https://secgen.usac.edu.gt/index.php/autentica-de-certificaciones/" target= "_blank">link</a>.</b>
                                        </div>
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
	<!-- TABLA PARA Certificaciones de Autentica -->




    <!-- MODAL PARA MOSTRAR LA INFORMACION DE CADA PUBLICACION INGRESADA -->
    <script src="{{asset('assets2/js/main_publicaciones2.js')}}"></script>


<script>
    var f=new Date();
    // Fechas para los Post
    document.getElementById("fecha").innerHTML = "01 Enero, " + f.getFullYear()
    document.getElementById("fecha2").innerHTML = "01 Enero, " + f.getFullYear()
    document.getElementById("fecha3").innerHTML = "01 Enero, " + f.getFullYear()
    document.getElementById("fecha4").innerHTML = "01 Enero, " + f.getFullYear()

    // Fechas para Post laterales "RECENT POSTS"
    document.getElementById("fecha6").innerHTML = "01 Enero, " + f.getFullYear()
    document.getElementById("fecha7").innerHTML = "01 Enero, " + f.getFullYear()
    document.getElementById("fecha8").innerHTML = "01 Enero, " + f.getFullYear()

    document.getElementById("fecha10").innerHTML = "Ingresa a la página <a href=\"https:\/\/registro.usac.edu.gt/\" style=\"color: blue; text-decoration: underline;\">https://registro.usac.edu.gt/</a>"
    + " Del 01 de Diciembre " + (f.getFullYear() - 1) + " al 31 de Enero " + f.getFullYear()


</script>

</body>

</html>
