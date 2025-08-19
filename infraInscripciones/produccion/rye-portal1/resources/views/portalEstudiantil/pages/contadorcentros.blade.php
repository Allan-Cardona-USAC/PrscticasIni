<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Title -->
	<title>Contador Centros - Portal Registro y Estadística</title>

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
	<link rel="stylesheet" href="{{ asset('assets2/css/estilos_centros.css')}}">	


</head>
@php $data =
    App\Http\Controllers\PortalEstudiantil\EstadisticasController::getContadores();
	if(isset($data[1]->contadores[22]->total)){
		$cent12 = $data[1]->contadores[0]->total + $data[1]->contadores[22]->total;
	}else{
		$cent12 = $data[1]->contadores[0]->total;
	}
    $cent17 = $data[1]->contadores[1]->total; 
    $cent19 = $data[1]->contadores[2]->total;
    $cent20 = $data[1]->contadores[3]->total;
    $cent21 = $data[1]->contadores[4]->total;
    $cent22 = $data[1]->contadores[5]->total;
    $cent23 = $data[1]->contadores[6]->total;
    $cent24 = $data[1]->contadores[7]->total;
    $cent25 = $data[1]->contadores[8]->total;
    $cent26 = $data[1]->contadores[9]->total;
    $cent27 = $data[1]->contadores[10]->total;
    $cent32 = $data[1]->contadores[11]->total;
    $cent34 = $data[1]->contadores[12]->total;
    $cent35 = $data[1]->contadores[13]->total;
    $cent37 = $data[1]->contadores[14]->total;
    $cent38 = $data[1]->contadores[15]->total;
    $cent39 = $data[1]->contadores[16]->total;
    $cent40 = $data[1]->contadores[17]->total;
    $cent41 = $data[1]->contadores[18]->total;
    $cent42 = $data[1]->contadores[19]->total;
    $cent44 = $data[1]->contadores[20]->total;
    $cent45 = $data[1]->contadores[21]->total;

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
		<div id="content">


			<br/>

			<!-- Section / Flats -->
			<section id="flats" class="section bg-light pt-0 pb-5">


				<div class="objects-container container">
					<div >
                    	<h6><strong>Datos preliminares, para información oficial comunicarse con Registro y Estadística.<strong></h6>
                	</div>
					<div class="tab-content">
						<div class="tab-pane fade show active" role="tabpanel">
							<!-- Objects - Grid-->
							<div class="objects-grid gutters-sm row">
								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object01.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">12 -
													Centro Universitario de Occidente</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent12}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object02.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">17 -
													Centro Universitario del Norte</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent17}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object03.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">19 -
													Centro Universitario de Oriente</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent19}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object04.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">20 -
													Centro Universitario de Nor-Occidente</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent20}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img
													src="{{ asset('assets2/img/objects/centros/object05.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">21 -
													Centro Universitario del Sur</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent21}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object06.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">22 -
													Centro Universitario del Sur-Occidente</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent22}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object07.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">23 - Centro Universitario del Sur-Oriente</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent23}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img
													src="{{ asset('assets2/img/objects/centros/object08.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">24 - Centro de Estudios del Mar y Acuicultura</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent24}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object09.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">25 - Centro Universitario de San Marcos</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent25}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object10.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">26 - Centro Universitario de Petén</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent26}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object11.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">27 - Centro Universitario de Izabal</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent27}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object12.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">32 - Centro Universitario de Santa Rosa</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent32}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object15.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">34 - Centro Universitario de Jutiapa</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent34}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object16.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">35 - Centro Universitario de Chimaltenango</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent35}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object17.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">37 - Centro Universitario de Baja Verapaz</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent37}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object18.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">38 - Centro Universitario de El Progreso</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent38}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object19.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">39 - Centro Universitario de Totonicapán</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent39}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object20.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">40 - Centro Universitario de El Quiché</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent40}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object21.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">41 - Centro Universitario de Zacapa</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent41}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object13.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">42 - Centro Universitario de Sololá</h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent42}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<img src="{{ asset('assets2/img/objects/centros/object14.jpg')}}" alt="">
										</div>
										<div class="object-content">
											<h5 class="object-title">44 - Centro Universitario de Sacatepéquez</a></h5>
											<div class="contador_cantidad" data-cantidad-total="{{$cent44}}">0</div>
                                            <h3 class="contador_texto">Inscritos</h3>
										</div>
									</div>
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
					<div class="col-md-6 text-center text-md-left mb-5 mb-md-0">
						<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="200" alt=""></a>
					</div>
					<div class="col-md-6 text-center text-md-right">
						<ul class="nav nav-footer mr-4">
							<li><a href="index.html">Inicio</a></li>
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
	<!-- JS Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="{{ asset('assets2/js/animacion_contadores.js')}}"></script>
</body>

</html>