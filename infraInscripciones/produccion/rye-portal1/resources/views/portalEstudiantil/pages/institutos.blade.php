<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
 
    <!-- Title -->
    <title>Institutos - Portal Registro y Estadística</title>

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
	<link rel="stylesheet" href="{{ asset('assets2/css/estilos_institutos.css')}}">	


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
                                                    src="{{ asset('assets2/img/objects/institutos/object01.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_1">
                                                31 - Instituto Técnico Maya de Estudios Superiores</a></h5>
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
                                                    src="{{ asset('assets2/img/objects/institutos/object02.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla2_1">
                                                90 - Instituto de Administración Pública
                                            </a></h5>
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
                                                    src="{{ asset('assets2/img/objects/institutos/object03.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="object-content">
                                            <h5 class="object-title"><a class="link-inherit" href="#" id="tabla3_1">
                                                36 - Instituto Tecnólogico Universitario Guatemala Sur
                                            </a></h5>
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


                            </div>
                        </div>


                        <div id="list_view" class="tab-pane fade" role="tabpanel">
                            <!-- Objects - List -->
                            <div class="objects-list">
                                <!-- Object - Horizontal -->
                                <div class="object object-horizontal">
                                    <div class="object-image">
                                        <a class="link-inherit" href="#" id="tabla1_3"><img
                                                src="{{ asset('assets2/img/objects/institutos/object01.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_4">
                                            31 - Instituto Técnico Maya de Estudios Superiores</a></h5>
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
                                                src="{{ asset('assets2/img/objects/institutos/object02.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla2_4">
                                                90 - Instituto de Administración Pública
                                            </a>
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
                                                src="{{ asset('assets2/img/objects/institutos/object03.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="object-content">
                                        <h5 class="object-title">
                                            <a class="link-inherit" href="#" id="tabla3_4">
                                                36 - Instituto Tecnólogico Universitario Guatemala Sur
                                            </a>
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





    <!-- TABLA PARA Instituto Técnico Maya de Estudios Superiores -->
    <div id="tabla_1" class="modal">
        <div class="t1" id="t1">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">31 - Instituto Técnico Maya de Estudios Superiores - Guía de Inscripción 2024</h2>
                    <span class="close" id="close1"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                        <thead>
                            <tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
								<th colspan="3" class="penultimo">Plan de estudios</th>
								<th colspan="5" class="ultimo">Horario de clases</th>
                                <th colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
							</tr>


							<tr class="segunda_fila">
								<th>
									<p class="verticalText">U.A.</p>
								</th>
								<th>
									<p class="verticalText">Extensión</p>
								</th>
								<th>
									<p class="verticalText">Carrera</p>
								</th>


								<th>
									<p class="verticalText">Diario</p>
								</th>
								<th>
									<p class="verticalText">Sabatino</p>
								</th>
								<th>
									<p class="verticalText">Dominical</p>
								</th>

								<th>
									<p class="verticalText">Matutina</p>
								</th>
								<th>
									<p class="verticalText">Vespertina</p>
								</th>
								<th>
									<p class="verticalText">Nocturna</p>
								</th>
								<th>
									<p class="verticalText">Única</p>
								</th>
								<th>
									<p class="verticalText">Otra</p>
								</th>
                                <th>
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th>
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th>
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th>
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th>
                                    <p class="verticalText">Quimica</p>
                                </th>
							</tr>
                        </thead>
                        <tbody>

                            <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                <td>31</td>
                                <td>00</td>
                                <td>01</td>
                                <td style="vertical-align:middle;" class="minimizar" rowspan="4">Plan Diario</td>
                                <td>Ingeniería en Industria Alimentaria</S></td>
                                <td>8</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="vertical-align:middle;" rowspan="2">08:00 - 17:00</td>
                                <td></td>
                                
                                <td style="vertical-align:middle;" rowspan="4">Finca Municipal Chipar, San Juan Chamelco Alta Verapaz</td>
                                  <td style="vertical-align:middle;" rowspan="4">02 de febrero 2024</td>
                                  <td style="vertical-align:middle;" rowspan="4">16 y 17  de febrero 2024</td>

                                  <td></td>
                                  <td></td>
                                  <td>X</td>
                                  <td>X</td>
                                  <td></td>
                                  
                                  <td>X</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->
                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                <td>31</td>
                                <td>00</td>
                                <td>02</td>
                                <td>Ingeniería en Industria del Bosque</S></td>
                                <td>9</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                                                

                                  <td></td>
                                  <td></td>
                                  <td>X</td>
                                  <td>X</td>
                                  <td></td>
                                  
                                  <td>X</td>
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                <td>31</td>
                                <td>00</td>
                                <td>03</td>
                                <td>Licenciatura en Administración y Finanzas</S></td>
                                <td>10</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="vertical-align:middle;" rowspan="2">7:00 - 17:30</td>
                                <td></td>
                                                                

                                  <td></td>
                                  <td></td>
                                  <td>X</td>
                                  <td>X</td>
                                  <td></td>
                                  
                                  <td>X</td>
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                            <!-- VALOR DE TUPLA 4-->
                            <tr>
                                <td>31</td>
                                <td>00</td>
                                <td>04</td>
                                <td>Licenciatura en Agronegocios Internacionales</S></td>
                                <td>10</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                                                

                                  <td></td>
                                  <td></td>
                                  <td>X</td>
                                  <td>X</td>
                                  <td></td>
                                  
                                  <td>X</td>
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->


                        </tbody>
                    </table>

                    <a id="sitio" href="https://tecmaya.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
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
    <!-- TABLA PARA Instituto Técnico Maya de Estudios Superiores -->

    <!-- TABLA PARA Instituto de Administración Pública -->
    <div id="tabla_2" class="modal">
        <div class="t2" id="t2">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">90 - Instituto de Administración Pública - Guía de Inscripción 2024</h2>
                    <span class="close" id="close2"></span>
                </div>
                <div class="modal-body">
                    <!--<table class="table caption-top">
                        <thead>
                            <tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
								<th colspan="3" class="penultimo">Plan de estudios</th>
								<th colspan="5" class="ultimo">Horario de clases</th>
							</tr>


							<tr class="segunda_fila">
								<th>
									<p class="verticalText">U.A.</p>
								</th>
								<th>
									<p class="verticalText">Extensión</p>
								</th>
								<th>
									<p class="verticalText">Carrera</p>
								</th>


								<th>
									<p class="verticalText">Diario</p>
								</th>
								<th>
									<p class="verticalText">Sabatino</p>
								</th>
								<th>
									<p class="verticalText">Dominical</p>
								</th>

								<th>
									<p class="verticalText">Matutina</p>
								</th>
								<th>
									<p class="verticalText">Vespertina</p>
								</th>
								<th>
									<p class="verticalText">Nocturna</p>
								</th>
								<th>
									<p class="verticalText">Única</p>
								</th>
								<th>
									<p class="verticalText">Otra</p>
								</th>


							</tr>
                        </thead>
                        <tbody>-->

                            <!-- VALOR DE TUPLA 1 -->
                            <!--<tr>
                                <td>90</td>
                                <td>00</td>
                                <td>01</td>
                                <td class="minimizar"></td>
                                <td>Maestría en Administración Pública</S></td>
                                <td></td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>-->
                            <!-- VALOR DE TUPLA 1 -->


                        <!--</tbody>
                    </table>-->

                    <a id="sitio" href="https://inap.gob.gt/app/portafolio" class="object-btn btn btn-secondary " target="_blank">Ir al
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
    <!-- TABLA PARA Instituto de Administración Pública -->

    <!-- TABLA PARA Instituto Tecnólogico Universitario Guatemala Sur -->
    <div id="tabla_3" class="modal">
        <div class="t3" id="t3">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="titulo_modal">36 - Instituto Tecnólogico Universitario Guatemala Sur - Guía de Inscripción 2024</h2>
                    <span class="close" id="close3"></span>
                </div>
                <div class="modal-body">
                    <table class="table caption-top">
                        <thead>
                            <tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en semestres</th>
								<th colspan="3" class="penultimo">Plan de estudios</th>
								<th colspan="5" class="ultimo">Horario de clases</th>
                                <th colspan="1" rowspan="2" class="edificio">Módulo o Edificio</th>
                                 <th colspan="1" rowspan="2" class="fec_inicio">Fecha de inicio de Clases</th>
                                 <th colspan="1" rowspan="2" class="fec_asignacion">Fecha de Asignación de Cursos</th>
                                 <th colspan="5" class="conocimientos_basicos">Prueba de Conocimientos Básicos</th>
                                 <th colspan="1" rowspan="2" class="prueba_especifica">Prueba Especifica</th>
							</tr>


							<tr class="segunda_fila">
								<th>
									<p class="verticalText">U.A.</p>
								</th>
								<th>
									<p class="verticalText">Extensión</p>
								</th>
								<th>
									<p class="verticalText">Carrera</p>
								</th>


								<th>
									<p class="verticalText">Diario</p>
								</th>
								<th>
									<p class="verticalText">Sabatino</p>
								</th>
								<th>
									<p class="verticalText">Dominical</p>
								</th>

								<th>
									<p class="verticalText">Matutina</p>
								</th>
								<th>
									<p class="verticalText">Vespertina</p>
								</th>
								<th>
									<p class="verticalText">Nocturna</p>
								</th>
								<th>
									<p class="verticalText">Única</p>
								</th>
								<th>
									<p class="verticalText">Otra</p>
								</th>
                                <th>
                                    <p class="verticalText">Biologia</p>
                                </th>
                                <th>
                                    <p class="verticalText">Fisica</p>
                                </th>
                                <th>
                                    <p class="verticalText">Lenguaje</p>
                                </th>
                                <th>
                                    <p class="verticalText">Matematica</p>
                                </th>
                                <th>
                                    <p class="verticalText">Quimica</p>
                                </th>

							</tr>
                        </thead>
                        <tbody>

                        <!-- VALOR DE TUPLA 1 -->
                            <tr>
                                <td>36</td>
                                <td>00</td>
                                <td>01</td>
                                <td style="vertical-align:middle;" class="minimizar" rowspan="6">ITUGS</td>
                                <td>Técnico Universitario en Procesos de Manufactura</S></td>
                                <td>6</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>Módulo -08</td>
                                <td style="vertical-align:middle;" rowspan="6">01/22/2024</td>
                                <td style="vertical-align:middle;" rowspan="6">20 al 24 feb</td>

                                <td></td>
                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td style="vertical-align:middle;" rowspan="6">Matemática, Psicomotricidad Fina y Gruesa</td>
                            </tr>
                            <!-- VALOR DE TUPLA 1 -->
                            <!-- VALOR DE TUPLA 2 -->
                            <tr>
                                <td>36</td>
                                <td>00</td>
                                <td>02</td>
                                <td>Técnico Universitario en Metal Mecánica</S></td>
                                <td>6</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>Módulo -08</td>

                                <td></td>
                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            <!-- VALOR DE TUPLA 2 -->
                            <!-- VALOR DE TUPLA 3 -->
                            <tr>
                                <td>36</td>
                                <td>00</td>
                                <td>03</td>
                                <td>Técnico Universitario en Electrónica</S></td>
                                <td>6</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>Modulo - 07</td>

                                <td></td>
                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            <!-- VALOR DE TUPLA 3 -->
                            <!-- VALOR DE TUPLA 4 -->
                            <tr>
                                <td>36</td>
                                <td>00</td>
                                <td>04</td>
                                <td>Técnico Universitario en Refrigeración y Aire Acondicionado</S></td>
                                <td>6</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>Modulo - 10</td>

                                <td></td>
                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                            
                            </tr>
                            <!-- VALOR DE TUPLA 4 -->
                            <!-- VALOR DE TUPLA 5 -->
                            <tr>
                                <td>36</td>
                                <td>00</td>
                                <td>07</td>
                                <td>Técnico Universitario en Procesos Productivos y Calidad Alimentaria</S></td>
                                <td>6</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>Modulo - 06</td>

                                <td></td>
                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                            
                            </tr>
                            <!-- VALOR DE TUPLA 5 -->
                            <!-- VALOR DE TUPLA 6 -->
                            <tr>
                                <td>36</td>
                                <td>00</td>
                                <td>08</td>
                                <td>Técnico Universitario en Mantenimiento Automotriz</S></td>
                                <td>6</td>

                                <td>X</td>
                                <td></td>
                                <td></td>

                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>Modulo - 12</td>

                                <td></td>
                                <td>X</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            <!-- VALOR DE TUPLA 6 -->

                        </tbody>
                    </table>


                    <a id="sitio" href="https://tecnologico.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
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
    <!-- TABLA PARA Instituto Tecnólogico Universitario Guatemala Sur -->




    <script src="{{ asset('assets2/js/main_institutos.js')}}"></script>
</body>

</html>