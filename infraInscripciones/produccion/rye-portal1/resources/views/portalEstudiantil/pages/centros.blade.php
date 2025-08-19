<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Title -->
	<title>Centros - Portal Registro y Estadística</title>

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
													src="{{ asset('assets2/img/objects/centros/object01.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_1">12 -
													Centro Universitario de Occidente </a></h5>
											<ul class="object-details list-unstyled">
												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla1_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.cunoc.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla2"><img
													src="{{ asset('assets2/img/objects/centros/object02.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla2_1">17 -
													Centro Universitario del Norte</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla2_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="https://virtual.usac.edu.gt/centro-universitario-del-norte/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla3"><img
													src="{{ asset('assets2/img/objects/centros/object03.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla3_1">19 -
													Centro Universitario de Oriente</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla3_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cunori.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla4"><img
													src="{{ asset('assets2/img/objects/centros/object04.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla4_1">20 -
													Centro Universitario de Nor-Occidente</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla4_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.cunoroc.edu.gt/joomla30/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla5"><img
													src="{{ asset('assets2/img/objects/centros/object05.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla5_1">21 -
													Centro Universitario del Sur</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla5_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cunsur.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla6"><img
													src="{{ asset('assets2/img/objects/centros/object06.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla6_1">22 -
													Centro Universitario del Sur-Occidente</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla6_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cunsuroc.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla7"><img
													src="{{ asset('assets2/img/objects/centros/object07.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla7_1">23 -
													Centro Universitario del Sur-Oriente</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla7_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cunsurori.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla8"><img
													src="{{ asset('assets2/img/objects/centros/object08.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla8_1">24 -
													Centro de Estudios del Mar y Acuicultura</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla8_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cema.usac.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla9"><img
													src="{{ asset('assets2/img/objects/centros/object09.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla9_1">25 -
													Centro Universitario de San Marcos</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla9_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="https://www.cusam.edu.gt/" class="object-btn btn btn-secondary"><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla10"><img
													src="{{ asset('assets2/img/objects/centros/object10.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla10_1">26
													- Centro Universitario de Petén</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla10_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://c3.usac.edu.gt/cudep.usac.edu.gt/public_html/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla11"><img
													src="{{ asset('assets2/img/objects/centros/object11.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla11_1">27
													- Centro Universitario de Izabal</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla11_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cunizab.blogspot.com/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla12"><img
													src="{{ asset('assets2/img/objects/centros/object12.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla12_1">32
													- Centro Universitario de Santa Rosa</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla12_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla15"><img
													src="{{ asset('assets2/img/objects/centros/object15.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla15_1">34
													- Centro Universitario de Jutiapa</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla15_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla16"><img
													src="{{ asset('assets2/img/objects/centros/object16.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla16_1">35
													- Centro Universitario de Chimaltenango</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla16_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla17"><img
													src="{{ asset('assets2/img/objects/centros/object17.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla17_1">37
													- Centro Universitario de Baja Verapaz</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla17_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla18"><img
													src="{{ asset('assets2/img/objects/centros/object18.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla18_1">38
													- Centro Universitario de El Progreso</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla18_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla19"><img
													src="{{ asset('assets2/img/objects/centros/object19.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla19_1">39
													- Centro Universitario de Totonicapán</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla19_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla20"><img
													src="{{ asset('assets2/img/objects/centros/object20.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla20_1">40
													- Centro Universitario de El Quiché</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla20_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla21"><img
													src="{{ asset('assets2/img/objects/centros/object21.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla21_1">41
													- Centro Universitario de Zacapa</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla21_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.fmvz.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>



								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla13"><img
													src="{{ asset('assets2/img/objects/centros/object13.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla13_1">42
													- Centro Universitario de Sololá</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla13_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://www.actiweb.es/usac_solola/index.html" class="object-btn btn btn-secondary" ><span
                                                    class="hidden-xs-down"></span> Sitio</a> -->
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-6">
									<!-- Object - Vertical -->
									<div class="object object-vertical">
										<div class="object-image">
											<a class="link-inherit" href="#" id="tabla14"><img
													src="{{ asset('assets2/img/objects/centros/object14.jpg')}}" alt=""></a>
										</div>
										<div class="object-content">
											<h5 class="object-title"><a class="link-inherit" href="#" id="tabla14_1">44
													- Centro Universitario de Sacatepéquez</a></h5>
											<ul class="object-details list-unstyled">

												<!-- <li><span class="text-muted">Bedrooms:</span> 2</li>
                                                <li><span class="text-muted">Floor:</span> 1</li> -->
											</ul>
											<a href="#" id="tabla14_2" class="object-btn btn btn-secondary"><span
													class="hidden-xs-down"></span> Carreras</a>
											<!-- <a href="http://cunsac.usac.edu.gt/" class="object-btn btn btn-secondary" ><span
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
												src="{{ asset('assets2/img/objects/centros/object01.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla1_4">12 -
												Centro Universitario de Occidente</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla1_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla2_3"><img
												src="{{ asset('assets2/img/objects/centros/object02.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla2_4">17 -
												Centro Universitario del Norte</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla2_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla3_3"><img
												src="{{ asset('assets2/img/objects/centros/object03.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla3_4">19 -
												Centro Universitario de Oriente</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla3_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla4_3"><img
												src="{{ asset('assets2/img/objects/centros/object04.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title" style="width: 100%;"><a class="link-inherit" href="#"
												id="tabla4_4">20 - Centro Universitario de Nor-Occidente</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla4_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>

								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla5_3"><img
												src="{{ asset('assets2/img/objects/centros/object04.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla5_4">21 -
												Centro Universitario del Sur
											</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla5_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>

								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla6_3"><img
												src="{{ asset('assets2/img/objects/centros/object06.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla6_4">22 -
												Centro Universitario del Sur-Occidente</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla6_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla7_3"><img
												src="{{ asset('assets2/img/objects/centros/object07.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla7_4">23 -
												Centro Universitario del Sur-Oriente</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla7_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla8_3"><img
												src="{{ asset('assets2/img/objects/centros/object08.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla8_4">24 -
												Centro de Estudios del Mar y Acuicultura</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla8_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla9_3"><img
												src="{{ asset('assets2/img/objects/centros/object09.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla9_4">25 -
												Centro Universitario de San Marcos</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla9_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla10_3"><img
												src="{{ asset('assets2/img/objects/centros/object10.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla10_4">26 -
												Centro Universitario de Petén</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla10_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla11_3"><img
												src="{{ asset('assets2/img/objects/centros/object11.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla11_4">27 -
												Centro Universitario de Izabal</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla11_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla12_3"><img
												src="{{ asset('assets2/img/objects/centros/object12.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla12_4">32 -
												Centro Universitario de Santa Rosa</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla12_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla15_3"><img
												src="{{ asset('assets2/img/objects/centros/object15.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla15_4">34 -
												Centro Universitario de Jutiapa</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla15_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla16_3"><img
												src="{{ asset('assets2/img/objects/centros/object16.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla16_4">35 -
												Centro Universitario de Chimaltenango</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla16_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla17_3"><img
												src="{{ asset('assets2/img/objects/centros/object17.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla17_4">37 -
												Centro Universitario de Baja Verapaz/a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla17_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla18_3"><img
												src="{{ asset('assets2/img/objects/centros/object18.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla18_4">37 -
												Centro Universitario de El Progreso/a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla18_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla19_3"><img
												src="{{ asset('assets2/img/objects/centros/object19.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla19_4">37 -
												Centro Universitario de Totonicapán/a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla19_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla20_3"><img
												src="{{ asset('assets2/img/objects/centros/object20.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla20_4">37 -
												Centro Universitario de El Quiché/a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla20_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla21_3"><img
												src="{{ asset('assets2/img/objects/centros/object21.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla21_4">41 -
												Centro Universitario de Zacapa/a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla21_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->


								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla13_3"><img
												src="{{ asset('assets2/img/objects/centros/object13.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla13_4">42 -
												Centro Universitario de Sololá</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla13_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->

								<!-- Object - Horizontal -->
								<div class="object object-horizontal">
									<div class="object-image">
										<a class="link-inherit" href="#" id="tabla14_3"><img
												src="{{ asset('assets2/img/objects/centros/object14.jpg')}}" alt=""></a>
									</div>
									<div class="object-content">
										<h5 class="object-title"><a class="link-inherit" href="#" id="tabla14_4">44 -
												Centro Universitario de Sacatepéquez</a></h5>
										<ul class="object-details list-inline">
											<!-- <li class="list-inline-item"><span class="text-muted">Bedrooms:</span> 2
                                            </li>
                                            <li class="list-inline-item"><span class="text-muted">Floor:</span> 1</li> -->
										</ul>
									</div>
									<a href="#" id="tabla14_5" class="object-btn btn btn-secondary ">Carreras<span
											class="hidden-xs-down"> </span> </a>
								</div>
								<!-- Object - Horizontal -->


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



	<!-- JS Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js"></script>



	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE OCCIDENTE -->
	<div id="tabla_12" class="modal">
		<div class="t1" id="t1">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Occidente - Guía de Inscripción 2024</h2>
					<span class="close" id="close"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead>
							<tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en semestre</th>
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
								<td>12</td>
								<td>00</td>
								<td>01</td>
								<td style="vertical-align: middle;" class="minimizar" rowspan="14">Plan Diario</td>
								<td>Lic. en Ciencias Jurídicas y Sociales, Abogacia y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Módulo D</td>
								<td style="vertical-align:middle;" rowspan="19">22 de enero</td>
								<td style="vertical-align:middle;" rowspan="20">12 al 18 de febrero</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos básicos del derecho y Realidad nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>02</td>
								<td>Economía</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="3">Módulo E</td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="3">Realidad Económica  y Contabilidad</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>03</td>
								<td>Contaduría Pública y Auditoría</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>04</td>
								<td>Administración de Empresas</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>08</td>
								<td>Profesorado de Enseñanza Media en Psicología</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="2">Módulo 90</td>

								<td>X</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Hábitos de Estudio y Habilidad de Lectura</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>10</td>
								<td>Trabajador Social Rural</S></td>
								<td>7</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>23</td>
								<td>Médico y Cirujano</S></td>
								<td>6 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Módulo D</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td>X</td>

								<td>Biología Humana y Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>24</td>
								<td>Cirujano Dentista</S></td>
								<td>6 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Módulo I</td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td>X</td>

								<td>Aptitud Numérica y Habilidad Manual</td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>30</td>
								<td>Ingeniería Agronómica en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Módulo D</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>33</td>
								<td>Ingeniería Civil</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="vertical-align:middle;" rowspan="4">Módulo I</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="vertical-align:middle;" rowspan="4">Matemática y Conocimientos de Computación</td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							<!-- VALOR DE TUPLA 11 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>34</td>
								<td>Ingeniería Mecánica</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>


								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

							</tr>
							<!-- VALOR DE TUPLA 11 -->

							<!-- VALOR DE TUPLA 12 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>35</td>
								<td>Ingeniería Industrial</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

							</tr>
							<!-- VALOR DE TUPLA 12 -->

							<!-- VALOR DE TUPLA 13 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>36</td>
								<td>Ingeniería Mecánica Industrial</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

							</tr>
							<!-- VALOR DE TUPLA 13 -->

							<!-- VALOR DE TUPLA 14 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>39</td>
								<td>Técnico en Agrimensura</td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Módulo D</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Habilidades Numéricas</td>
							</tr>
							<!-- VALOR DE TUPLA 14 -->

							<!-- VALOR DE TUPLA 15 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>41</td>
								<td rowspan="5"></td>
								<td>Arquitectura</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Módulo I</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>

								<td>Cultura General y Redacción, Dibujo y Geometría</td>
							</tr>
							<!-- VALOR DE TUPLA 15 -->

							<!-- VALOR DE TUPLA 16 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>46</td>
								<td>Ingeniería en Gestión Ambiental Local</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Módulo D</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 16 -->

							<!-- VALOR DE TUPLA 17 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>55</td>
								<td>Profesorado de Enseñanza Media en Pedagogía con Especialización en Computación y
									Lenguaje</td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td rowspan="2">Módulo 90</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Hábitos de Estudio</td>
							</tr>
							<!-- VALOR DE TUPLA 17 -->

							<!-- VALOR DE TUPLA 18 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>56</td>
								<td>Profesorado de Educación Primaria Bilingüe Intercultural</td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Hábitos de Estudio</td>
							</tr>
							<!-- VALOR DE TUPLA 18 -->

							<!-- VALOR DE TUPLA 19 -->
							<tr>
								<td>12</td>
								<td>00</td>
								<td>58</td>
								<td>Ingeniería en Ciencias y Sistemas</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Módulo I</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Conocimientos de Computación</td>
							</tr>

							<!-- VALOR DE TUPLA 19 -->

							<!-- VALOR DE TUPLA 20 -->
							<tr>
								<td>12</td>
								<td>01</td>
								<td>47</td>
								<td>Plan Sabatino</td>
								<td>Profesorado de Enseñanza  Media en Matemática y Física</td>
								<td>8</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Módulo 90</td>
								<td>27 de enero</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>

								<td>Hábitos de Estudio</td>
							</tr>
							<!-- VALOR DE TUPLA 20 -->

						</tbody>
					</table>

					<a id="sitio" href="http://www.cunoc.edu.gt/" class="object-btn btn btn-secondary "
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE OCCIDENTE -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL NORTE -->
	<div id="tabla_17" class="modal">
		<div class="t2" id="t2">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario del Norte - Guía de Inscripción 2024</h2>
					<span class="close" id="close2"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead>
							<tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en semestre</th>
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
								<td>17</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar" rowspan="12">Plan Diario</td>
								<td>Técnico en Producción Agrícola</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00- 13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="2">Edificio "D"</td>
								<td style="vertical-align: middle;" rowspan="10">15/01/2024</td>
								<td style="vertical-align: middle;" rowspan="10">Del 19 al 26 de febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Entrevista.</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>04</td>
								<td>Técnico en Producción Pecuaria</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>14:00 - 20:30</td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Entrevista</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>07</td>
								<td>Técnico en Geología</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00-13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="2">Edificio "F"</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Entrevista diagnóstica.</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>08</td>
								<td>Trabajador Social</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos específicos: trabajo social y realidad socioeconómica.</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>13</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="6">Edificio "H"</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de introducción al derecho.</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>14</td>
								<td>Administración de Empresas</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de ciencias económicas. Conocimientos generales de contabilidad.</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>15</td>
								<td>Contaduría Pública y Auditoria</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de ciencias económicas. Conocimientos generales de contabilidad.</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>30</td>
								<td>Ingeniería en Gestión Ambiental Local</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00- 13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos ambientales.</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->


							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>38</td>
								<td>Medico y Cirujano</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00- 13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td>X</td>

								<td>Prueba de matemática y biología.</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<tr>
								<td>17</td>
								<td>00</td>
								<td>39</td>
								<td>Ingeniería Civil</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00- 13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática para ingeniería. Conocimientos de computación.</td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->

							<tr>
								<td>17</td>
								<td>00</td>
								<td>40</td>
								<td>Ingeniería Industrial</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00- 13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Edificio "H"</td>
								<td>01/15/2024</td>
								<td>Del 19 al 26 de febrero 2024</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática para ingeniería. Conocimientos de computación.</td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->

							<tr>
								<td>17</td>
								<td>00</td>
								<td>41</td>
								<td>Ingeniería en Ciencias y Sistemas</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>07:00- 13:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Edificio "H"</td>
								<td>15/01/2024</td>
								<td style="vertical-align: middle;" rowspan="6">Del 19 al 26 de febrero 2024</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática para ingeniería. Conocimientos de computación.</td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<tr>
								<td>17</td>
								<td>05</td>
								<td>14</td>
								<td>Sección Departamental Cobán</td>
								<td>Administración de Empresas</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00- 18:00</td>
								<td></td>

								<td>Edificio "H" y Edificio "J"</td>
								<td style="vertical-align: middle;" rowspan="5">01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de ciencias económicas. Conocimientos generales de contabilidad.</td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							<!-- VALOR DE TUPLA 11 -->
							<tr>
								<td>17</td>
								<td>05</td>
								<td>15</td>
								<td>Sección Departamental Cobán</td>
								<td>Contaduría Pública  y Auditoria</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00- 18:00</td>
								<td></td>

								<td>Edificio "H" y Edificio "J"</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de ciencias económicas. Conocimientos generales de contabilidad.</td>
							</tr>
							<!-- VALOR DE TUPLA 11 -->

							<!-- VALOR DE TUPLA 12 -->
							<tr>
								<td>17</td>
								<td>05</td>
								<td>17</td>
								<td>Sección Departamental Cobán</td>
								<td>Orientación Vocacional y Laboral</S></td>
								<td>3 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00- 18:00</td>
								<td></td>

								<td>Edificio "H" y Edificio "D"</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de las ciencias psicológicas. Test psicológico de factores neuróticos de la personalidad. Autobiografía. Entrevista.</td>
							</tr>
							<!-- VALOR DE TUPLA 12 -->

							<!-- VALOR DE TUPLA 13 -->
							<tr>
								<td>17</td>
								<td>05</td>
								<td>19</td>
								<td>Sección Departamental Cobán</td>
								<td>Terapia Del Lenguaje</S></td>
								<td>3 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00 - 18:00</td>
								<td></td>

								<td>Edificio "H" y Edificio "D"</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de las ciencia psicológicas. Test psicológico de factores neuróticos de la personalidad. Autobiografía. Entrevista. Test del mecanismo del habla.</td>
							</tr>
							<!-- VALOR DE TUPLA 13 -->

							<!-- VALOR DE TUPLA 14 -->
							<tr>
								<td>17</td>
								<td>05</td>
								<td>31</td>
								<td>Sección Departamental Cobán</td>
								<td>Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00- 18:00</td>
								<td></td>

								<td>Edificio "H" y Edificio "F"</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Habilidades pedagógicas.</td>
							</tr>
							<!-- VALOR DE TUPLA 14 -->
						</tbody>
					</table>

					<a id="sitio" href="https://cunor.edu.gt/"
						class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span class="hidden-xs-down"> </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL NORTE -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE ORIENTE -->
	<div id="tabla_19" class="modal">
		<div class="t3" id="t3">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Oriente - Guía de Inscripción 2024</h2>
					<span class="close" id="close3"></span>
				</div>
				<div class="modal-body">

					<table class="table caption-top">
						<thead>
							<tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en años</th>
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
								<td>19</td>
								<td>00</td>
								<td>06</td>
								<td class="minimizar">CUNORI</td>
								<td>Licenciatura en Zootecnia</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>7:05 - 16:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>B-4</td>
								<td>01/22/2024</td>
								<td style="vertical-align:middle;" rowspan="12">Febrero y Marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Prueba escrita y entrevista de campo</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->

							<tr>
								<td>19</td>
								<td>00</td>
								<td>09</td>
								<td class="minimizar">CUNORI</td>
								<td>Auditor Técnico</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>7:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>C-1</td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de matemática, contabilidad, economía y administración. </td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->

							<tr>
								<td>19</td>
								<td>00</td>
								<td>11</td>
								<td class="minimizar">CUNORI</td>
								<td>Técnico en Administración de Empresas (Plan Sabatino)</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>7:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>C-1</td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de matemática, contabilidad, economía y administración. </td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>19</td>
								<td>06</td>
								<td>11</td>
								<td class="minimizar">Esquipulas</td>
								<td>Técnico en Administración de Empresas (Plan Sabatino)</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>7:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Esquipulas</td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos generales de matemática, contabilidad, economía y administración. </td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>13</td>
								<td class="minimizar">CUNORI</td>
								<td>Medico y Cirujano</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>8:00 - 16:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>D-3</td>
								<td>01/22/2024</td>

								<td></td>
								<td>X</td>
								<td></td>
								<td>X</td>
								<td>X</td>

								<td>Estadística y Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>14</td>
								<td class="minimizar">CUNORI</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>C-4</td>
								<td>01/22/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Introducción al Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>15</td>
								<td class="minimizar">CUNORI</td>
								<td>Técnico Universitario en Agrimensura</S></td>
								<td>3 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>F-1</td>
								<td>01/22/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Cómputo</td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>17</td>
								<td class="minimizar">CUNORI</td>
								<td>Ingeniero Agrónomo  en Sistemas de Producción</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>7:00 - 16:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>B-2</td>
								<td>01/22/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Prueba general de conocimientos agrícolas</td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>18</td>
								<td class="minimizar">CUNORI</td>
								<td>Periodismo Profesional (Plan Sabatino)</S></td>
								<td>3 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>7:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Módulo H</td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos básicos sobre lenguaje, redacción, ley de emisión del pensamiento y géneros periodísticos para medios escritos, radio y televisión. </td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>21</td>
								<td class="minimizar">CUNORI</td>
								<td>Ingeniería Civil</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>13:00 - 20:40</td>
								<td></td>
								<td></td>
								<td></td>

								<td>J-6</td>
								<td>01/22/2024</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Computación</td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							<!-- VALOR DE TUPLA 11 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>22</td>
								<td class="minimizar">CUNORI</td>
								<td>Ingeniería en Ciencias y Sistemas</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>13:00 - 20:40</td>
								<td></td>
								<td></td>
								<td></td>

								<td>J-6</td>
								<td>01/22/2024</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Computación </td>
							</tr>
							<!-- VALOR DE TUPLA 11 -->

							<!-- VALOR DE TUPLA 12 -->

							<tr>
								<td>19</td>
								<td>00</td>
								<td>23</td>
								<td class="minimizar">CUNORI</td>
								<td>Ingeniería en Gestión Ambiental Local</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>7:05 - 16:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>I-5</td>
								<td>01/22/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Prueba de aptitud y conocimiento ambiental </td>
							</tr>
							<!-- VALOR DE TUPLA 12 -->

							<!-- VALOR DE TUPLA 13 -->

							<tr>
								<td>19</td>
								<td>05</td>
								<td>30</td>
								<td class="minimizar">CUNORI</td>
								<td>Profesorado de Enseñanza Media en Ciencias Naturales con Orientación Ambiental</S></td>
								<td>3.5 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td>7:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>C-2</td>
								<td>01/20/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos Generales de las Ciencias de la Educación</td>
							</tr>
							<!-- VALOR DE TUPLA 13 -->

							<!-- VALOR DE TUPLA 14 -->

							<tr>
								<td>19</td>
								<td>00</td>
								<td>31</td>
								<td class="minimizar">CUNORI</td>
								<td>Administración de Empresas</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>B-7</td>
								<td>01/22/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos básicos de un administrador emprendedor </td>
							</tr>
							<!-- VALOR DE TUPLA 14 -->

							<!-- VALOR DE TUPLA 15 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>33</td>
								<td class="minimizar">CUNORI</td>
								<td>Ingeniería Industrial</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>J-6</td>
								<td>01/22/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Computación </td>
							</tr>
							<!-- VALOR DE TUPLA 15 -->

							<!-- VALOR DE TUPLA 16 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>34</td>
								<td class="minimizar">CUNORI</td>
								<td>Licenciatura en ciencia Política</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>I-6</td>
								<td>01/22/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Nociones Generales de las Ciencias Políticas, Relaciones Internacionales y Sociales</td>
							</tr>
							<!-- VALOR DE TUPLA 16 -->

							<!-- VALOR DE TUPLA 17 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>35</td>
								<td class="minimizar">CUNORI</td>
								<td>Licenciatura en Sociología</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>I-6</td>
								<td>01/22/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Nociones Generales de las Ciencias Políticas, Relaciones Internacionales y Sociales</td>
							</tr>
							<!-- VALOR DE TUPLA 17 -->

							<!-- VALOR DE TUPLA 18 -->
							<tr>
								<td>19</td>
								<td>00</td>
								<td>36</td>
								<td class="minimizar">CUNORI</td>
								<td>Licenciatura en Relaciones Internacionales</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00 - 21:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>I-6</td>
								<td>01/22/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Nociones Generales de las Ciencias Políticas, Relaciones Internacionales y Sociales</td>
							</tr>
							<!-- VALOR DE TUPLA 18 -->

							<!-- VALOR DE TUPLA 19-->

							<tr>
								<td>19</td>
								<td>05</td>
								<td>20</td>
								<td class="minimizar">CUNORI</td>
								<td>PEM en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>07:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>C-2</td>
								<td>01/20/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos Generales de las Ciencias de la Educación </td>
							</tr>

							<!-- VALOR DE TUPLA 19-->
							

							<!-- VALOR DE TUPLA 20-->
							<!--<tr>
								<td>19</td>
								<td>00</td>
								<td>30</td>
								<td class="minimizar">CUNORI</td>
								<td>PEM en Ciencias Naturales con Orientación Ambiental</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>07:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!--VALOR de TUPLA 20-->

							<!--VALOR DE TUPLA 21-->
							<tr>
								<td>19</td>
								<td>06</td>
								<td>20</td>
								<td class="minimizar">Esquipulas</td>
								<td>PEM en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>07:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Esquipulas</td>
								<td>01/20/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos Generales de las Ciencias de la Educación </td>
							</tr>
							<!--VALOR DE TUPLA 21-->

							<!--VALOR DE TUPLA 22-->
							
							<tr>
								<td>19</td>
								<td>07</td>
								<td>20</td>
								<td class="minimizar">Zacapa</td>
								<td>PEM en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>3 1/2 años</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>07:30 - 17:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Zacapa</td>
								<td>01/20/2024</td>
								<td>Febrero y marzo</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos Generales de las Ciencias de la Educación </td>
								
							</tr>
							<!--VALOR DE TUPLA 22-->

						</tbody>
					</table>

					<a id="sitio" href="http://cunori.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
							class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE ORIENTE -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE NOR-OCCIDENTE -->
	<div id="tabla_20" class="modal">
		<div class="t4" id="t4">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Nor-Occidente - Guía de Inscripción 2024</h2>
					<span class="close" id="close4"></span>
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
								<td>20</td>
								<td>00</td>
								<td>03</td>
								<td style="vertical-align:middle;" class="minimizar" rowspan="6">Plan Diario</td>
								<td>Técnido en Producción Frutícola</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td>15 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos básicos agronómicos</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>20</td>
								<td>00</td>
								<td>04</td>
								<td>Ingeniería Forestal</S></td>
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
								<td>15 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Aspectos Forestales y Ambientales</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->

							<tr>
								<td>20</td>
								<td>00</td>
								<td>06</td>
								<td>Trabajador Social</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td>15 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Caracterización del contexto guatemalteco y huehueteco</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->

							<tr>
								<td>20</td>
								<td>00</td>
								<td>08</td>
								<td>Licenciatura en Zootecnia con Énfasis en Sistemas de Producción Agropecuaria</S></td>
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
								<td>15 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Prueba de conocimientos agropecuarios general</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->

							<tr>
								<td>20</td>
								<td>00</td>
								<td>09</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacia y Notariado</S></td>
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
								<td>15 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos específicos de la historia general de Guatemala. Constitucionalismo en Guatemala, acuerdos de paz, derechos humanos y normatividad  jurídica.</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->

							<tr>
								<td>20</td>
								<td>00</td>
								<td>22</td>
								<td>Médico y Cirujano</S></td>
								<td>5 años</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td>15 de enero</td>
								<td>1 al 6 abril</td>


								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td>X</td>

								<td>Matemática y Biología Humana </td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->

							<tr>
								<td>20</td>
								<td>05</td>
								<td>10</td>
								<td class="minimizar">Huehuetenango</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td>13 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Examen Psicopedagógico y de Lenguaje</td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
						
							<tr>
								<td>20</td>
								<td>05</td>
								<td>21</td>
								<td class="minimizar">Huehuetenango</td>
								<td>Profesorado de Enseñanza Media en Matemática y Ciencias Económico Contable</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td>13 de enero</td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos elementales de matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->

							<tr>
								<td>20</td>
								<td>08</td>
								<td>10</td>
								<td class="minimizar">Santa Eulalia</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico En Administración Educativa</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td>13 de enero </td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Examen Psicopedagógico y de Lenguaje</td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<tr>
								<td>20</td>
								<td>09</td>
								<td>10</td>
								<td class="minimizar">Santa Cruz Barillas</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico En Administración Educativa</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td>13 de enero </td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Examen Psicopedagógico y de Lenguaje</td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							<!-- VALOR DE TUPLA 11 -->
							<tr>
								<td>20</td>
								<td>09</td>
								<td>20</td>
								<td class="minimizar">Santa Cruz Barillas</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td>13 de enero </td>
								<td>1 al 6 abril</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Lenguaje</td>
							</tr>
							<!-- VALOR DE TUPLA 11 -->
							
						</tbody>
					</table>

					<a id="sitio" href="http://www.cunoroc.edu.gt/joomla30/" class="object-btn btn btn-secondary " target="_blank">Ir al
						sitio<span class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE NOR-OCCIDENTE -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL SUR -->
	<div id="tabla_21" class="modal">
		<div class="t5" id="t5">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario del Sur - Guía de Inscripción 2024</h2>
					<span class="close" id="close5"></span>
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
								<td>21</td>
								<td>00</td>
								<td>05</td>
								<td style="vertical-align: middle;" class="minimizar" rowspan="6">Escuintla</td>
								<td>Técnico en Procesos Agroindustriales</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>15:00-20:15</td>
								<td></td>
								<td></td>
								<td></td>

								<td>Salón 11</td>
								<td>01/22/2024</td>
								<td>8-12/4/2024</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Computación y Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->

							<tr>
								<td>21</td>
								<td>00</td>
								<td>07</td>
								<td>Administración de Empresas</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00-20:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>Salón 10</td>
								<td>01/22/2024</td>
								<td>11-13/4/2024</td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							
							<tr>
								<td>21</td>
								<td>00</td>
								<td>08</td>
								<td>Contaduría Pública  y Auditoria</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>17:00-20:00</td>
								<td></td>
								<td></td>
								<td></td>

								<td>Salón 10</td>
								<td>01/22/2024</td>
								<td>11-13/4/2024</td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->

							<tr>
								<td>21</td>
								<td>00</td>
								<td>11</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>18:00-21:00</td>
								<td></td>
								<td></td>

								<td>Salón 12</td>
								<td>01/22/2024</td>
								<td>11-13/4/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->

							<tr>
								<td>21</td>
								<td>00</td>
								<td>17</td>
								<td>Medico y Cirujano</td>
								<td>12</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>08:00-16:00</td>

								<td>Salón 13</td>
								<td>01/22/2024</td>
								<td>11-13/4/2024</td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td>X</td>

								<td>Matemática, Biología Humana</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->

							<tr>
								<td>21</td>
								<td>00</td>
								<td>10</td>
								<td>Profesorado de Enseñanza  Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>07:30-17:30</td>

								<td>Salón 10</td>
								<td>01/20/2024</td>
								<td>11-13/4/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Didáctica General</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

						</tbody>
					</table>

					<a id="sitio" href="http://cunsur.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
						sitio<span class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL SUR -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL SUR-OCCIDENTE -->
	<div id="tabla_22" class="modal">
		<div class="t6" id="t6">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario del Sur-Occidente - Guía de Inscripción 2024</h2>
					<span class="close" id="close6"></span>
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
								<td>22</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Trabajador Social</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->

							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>06</td>
								<td class="minimizar"></td>
								<td>Técnico en Adminitración de Empresas</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							
							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>08</td>
								<td class="minimizar"></td>
								<td>Técnico en Producción Agrícola</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 3 -->
							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>09</td>
								<td class="minimizar"></td>
								<td>Técnico en Procesamiento de Alimentos</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>17</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>23</td>
								<td class="minimizar"></td>
								<td>Ingeniería en Gestión Ambiental Local</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->

							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>25</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media de Psicopedagogía</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8-->
							<!--<tr>
								<td>22</td>
								<td>00</td>
								<td>33</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media de Pedagogía especializado en Administración Educativa</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 8-->
						
							<!-- VALOR DE TUPLA 9-->
							<!--<tr>
								<td>22</td>
								<td>01</td>
								<td>20</td>
								<td class="minimizar"></td>
								<td>Periodismo Profesional</S></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
							</tr>-->
							<!-- VALOR DE TUPLA 9-->
							
							<!-- VALOR DE TUPLA 10-->
							<!--<tr>
								<td>22</td>
								<td>01</td>
								<td>22</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
							</tr>-->
							<!--VALOR DE TUPLA 10-->

							<!--VALOR DE TUPLA 11-->
							<!--<tr>
								<td>22</td>
								<td>01</td>
								<td>32</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Ciencias Naturales con Orientación Ambiental</S></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
							</tr>
						</tbody>
					</table>-->
					<a id="sitio" href="http://cunsuroc.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
						sitio<span class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL SUR-OCCIDENTE -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL SUR-ORIENTE -->
	<div id="tabla_23" class="modal">
		<div class="t7" id="t7">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario del Sur-Oriente - Guía de Inscripción 2024</h2>
					<span class="close" id="close7"></span>
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
								<td>23</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Técnico en Producción Pecuaria</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conocimientos Básicos de la Zootecnia (Entrevista) </td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>23</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Técnico en Producción Agrícola</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales de la Biología General</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>23</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar"></td>
								<td>Trabajador Social</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Realidad Nacional de Guatemala</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>23</td>
								<td>00</td>
								<td>08</td>
								<td class="minimizar"></td>
								<td>Técnico en Administración de Empresas</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>x</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>La Administración de Empresas y la Contabilidad </td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>23</td>
								<td>00</td>
								<td>10</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Juridicas y Sociales, Abogacia y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Evaluación de Conceptos Básicos de Derecho y Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>23</td>
								<td>03</td>
								<td>22</td>
								<td class="minimizar">Modalidad Virtual</td>
								<td>Técnico en Criminología y Criminalística</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Plataforma Moodle</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Evaluación de Conceptos Básicos de Derecho y Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<tr>
								<td>23</td>
								<td>05</td>
								<td>11</td>
								<td class="minimizar">Plan Sabatino</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Liderazgo</td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8-->
							<tr>
								<td>23</td>
								<td>09</td>
								<td>11</td>
								<td class="minimizar">Sección Departamental de Mataquescuintla  -Plan Sabatino-</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>Cantón Barrios, zona 5, Municipio de Mataquescuintla, Jalapa (%)</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Liderazgo</td>
							</tr>
							<!-- VALOR DE TUPLA 8-->
						
							<!-- VALOR DE TUPLA 9-->
							<tr>
								<td>23</td>
								<td>04</td>
								<td>11</td>
								<td class="minimizar">Plan Dominical</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>CUNSURORI</td>
								<td></td>
								<td>X</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Liderazgo</td>
							</tr>
							<!-- VALOR DE TUPLA 9-->
							
						</tbody>
					</table>

					<a id="sitio" href="https://cunsurori.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
						sitio<span class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DEL SUR-ORIENTE -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios del Mar y Acuicultura -->
	<div id="tabla_24" class="modal">
		<div class="t8" id="t8">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Estudios del Mar y Acuicultura - Guía de
						Inscripción 2024</h2>
					<span class="close" id="close8"></span>
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
								<td>24</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Técnico en Acuicultura</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>7:00-15:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>T-14</td>
								<td>01/22/2024</td>
								<td>4-5-6/03/2023</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>

								<td>Psicomotricidad Gruesa</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<!--<tr>
								<td>24</td>
								<td>00</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Acuicultura</S></td>
								<td>4</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 2-->

							<!-- VALOR DE TUPLA 3 -->
							<!--<tr>
								<td>24</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Recursos Hidrobiológicos y Auicultura</S></td>
								<td>4</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 3-->

							<!-- VALOR DE TUPLA 4 -->
							<!--<tr>
								<td>24</td>
								<td>00</td>
								<td></td>
								<td class="minimizar"></td>
								<td>Maestría en Ciencias Marinas y Costeras</S></td>
								<td>4</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 4-->
						</tbody>
					</table>


					<a id="sitio" href="http://cema.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
							class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios del Mar y Acuicultura -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de San Marcos -->
	<div id="tabla_25" class="modal">
		<div class="t9" id="t9">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de San Marcos - Guía de Inscripción 2024</h2>
					<span class="close" id="close9"></span>
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
								<td>25</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar">CUSAM</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</S></td>
								<td>7</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Lenguaje</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar">CUSAM</td>
								<td>Técnico en Producción Agrícola</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Biología y Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar">CUSAM</td>
								<td>Técnico en Administración de Empresas</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar">CUSAM</td>
								<td>Trabajador Social</S></td>
								<td>7</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Básicos de Trabajo Social y Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>09</td>
								<td class="minimizar">CUSAM</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>2</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Básicos de Derecho y Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>12</td>
								<td class="minimizar">CUSAM</td>
								<td>Médico y Cirujano</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>2</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td>X</td>
								<td>X</td>

								<td>Biología y Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>13</td>
								<td class="minimizar">CUSAM</td>
								<td>Profesorado de Educación Primaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Pedagogía Didáctica, Matemáticas, Diversidad Biológica y Cultural, Corrientes Psicológicas, Antropología y Sociología, Habilidades Lingüísticas, Comunicación y Lenguaje </td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8-->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>14</td>
								<td class="minimizar">CUSAM</td>
								<td>Ingeniería Civil</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Computación</td>
							</tr>
							<!-- VALOR DE TUPLA 8-->
						
							<!-- VALOR DE TUPLA 9-->
							<tr>
								<td>25</td>
								<td>00</td>
								<td>15</td>
								<td class="minimizar">CUSAM</td>
								<td>Contaduría Pública y Auditoría</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 9-->
							
							<!-- VALOR DE TUPLA 10-->
							<tr>
								<td>25</td>
								<td>01</td>
								<td>01</td>
								<td class="minimizar">CUSAM</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Matemática y Lenguaje</td>
							</tr>
							<!--VALOR DE TUPLA 10-->

							<!--VALOR DE TUPLA 11-->
							<tr>
								<td>25</td>
								<td>01</td>
								<td>16</td>
								<td class="minimizar">CUSAM</td>
								<td>Licenciatura en Relaciones Internacionales </S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>

								<td style="vertical-align: middle" rowspan="3">Historia, Ciencias Sociales, Sistema Político Administrativo Guatemalteco, Realidad Nacional y Mundial</td>
							</tr>
							<!--VALOR DE TUPLA 11-->

							<!--VALOR DE TUPLA 12-->
							<tr>
								<td>25</td>
								<td>01</td>
								<td>18</td>
								<td class="minimizar">CUSAM</td>
								<td>Licenciatura en Sociología</S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>

							</tr>
							<!--VALOR DE TUPLA 12-->


							<!--VALOR DE TUPLA 13-->
							<tr>
								<td>25</td>
								<td>05</td>
								<td>18</td>
								<td class="minimizar">CUSAM</td>
								<td>Licenciatura en Ciencias Políticas</S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>1</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
							</tr>
							<!--VALOR DE TUPLA 13-->

							<!--VALOR DE TUPLA 14-->
							<tr>
								<td>25</td>
								<td>05</td>
								<td>01</td>
								<td class="minimizar">Malacatán</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Malacatán</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Lenguaje</td>
							</tr>
							<!--VALOR DE TUPLA 14-->

							<!--VALOR DE TUPLA 15-->
							<tr>
								<td>25</td>
								<td>05</td>
								<td>03</td>
								<td class="minimizar">Malacatán</td>
								<td>Técnico en Producción Agrícola</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Malacatán</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Biología y Matemática</td>
							</tr>
							<!--VALOR DE TUPLA 15-->

							<!--VALOR DE TUPLA 16-->
							<tr>
								<td>25</td>
								<td>05</td>
								<td>04</td>
								<td class="minimizar">Malacatán</td>
								<td>Técnico en Administración de Empresas</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Malacatán</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Matemática</td>
							</tr>
							<!--VALOR DE TUPLA 16-->

							<!--VALOR DE TUPLA 17-->
							<tr>
								<td>25</td>
								<td>05</td>
								<td>05</td>
								<td class="minimizar">Malacatán</td>
								<td>Trabajador Social</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Malacatán</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Básicos de Trabajo Social y Realidad Nacional</td>
							</tr>
							<!--VALOR DE TUPLA 17-->

							<!--VALOR DE TUPLA 18-->
							<tr>
								<td>25</td>
								<td>06</td>
								<td>01</td>
								<td class="minimizar">Tejutla</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Tejutla</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática Y Lenguaje</td>
							</tr>
							<!--VALOR DE TUPLA 18-->

							<!--VALOR DE TUPLA 19-->
							<tr>
								<td>25</td>
								<td>07</td>
								<td>01</td>
								<td class="minimizar">Tacaná</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Tacaná</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática Y Lenguaje</td>
							</tr>
							<!--VALOR DE TUPLA 19-->

							<!--VALOR DE TUPLA 20-->
							<tr>
								<td>25</td>
								<td>09</td>
								<td>13</td>
								<td class="minimizar">Tuichilupe, Comitancillo</td>
								<td>Profesorado de Educación Primaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td>Tuichilupe, Comitancillo</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Pedagogía Didáctica, Matemáticas, Diversidad Biológica y Cultural, Corrientes Psicológicas, Antropología y Sociología, Habilidades Lingüísticas, Comunicación y Lenguaje  </td>
							</tr>
							<!--VALOR DE TUPLA 20-->

							<!--VALOR DE TUPLA 21-->
							<tr>
								<td>25</td>
								<td>10</td>
								<td>01</td>
								<td class="minimizar">Ixchiguán</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Ixchiguán</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática y Lenguaje</td>
							</tr>
							<!--VALOR DE TUPLA 21-->

							<!--VALOR DE TUPLA 22-->
							<tr>
								<td>25</td>
								<td>10</td>
								<td>09</td>
								<td class="minimizar">Ixchiguán</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td>Ixchiguán</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Básicos de Derecho y Realidad Nacional</td>
							</tr>
							<!--VALOR DE TUPLA 22-->

						</tbody>
					</table>

					<a id="sitio" href="https://www.cusam.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
						sitio<span class="hidden-xs-down" > </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de San Marcos -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Petén -->
	<div id="tabla_26" class="modal">
		<div class="t10" id="t10">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Petén - Guía de Inscripción 2024</h2>
					<span class="close" id="close10"></span>
				</div>
				<div class="modal-body">
					<table class="table caption-top">
						<thead>
							<tr>
								<th colspan="3" class="primer">Códigos</th>
								<th colspan="1" rowspan="2" class="minimizar">Extensión</th>
								<th colspan="1" rowspan="2" class="carrera">Carrera</th>
								<th colspan="1" rowspan="2" class="minimizar">Duración en semestre</th>
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
								<td>26</td>
								<td>00</td>
								<td>04</td>
								<td style="vertical-align: middle" rowspan="9" class="minimizar">Santa Elena</td>
								<td>Técnico en Arqueología</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="vertical-align: middle" rowspan="9">Doble</td>

								<td></td>
								<td style="vertical-align: middle" rowspan="9">16/01/2024</td>
								<td style="vertical-align: middle" rowspan="9">Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos de Arqueología</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>07</td>
								<td>Ingeniería Forestal</S></td>
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
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Ciencias Naturales</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>09</td>
								<td>Licenciatura en Administración de Recursos Turísticos</S></td>
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
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Ciencias Naturales</td>

							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>12</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
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
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Comprensión  Lectora, Leyes</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>15</td>
								<td>Técnico Universitario en Agrimensura</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Matemática, Algebra, Trigonometría y Admón. de Tierras</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>17</td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agropecuaria</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td></td>

								<td>X</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>23</td>
								<td>Licenciatura en Psicología</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>

								<td>X</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Psicología y Fisiología</td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>26</td>
								<td>Profesorado de Educación Primaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Redacción, Gramática</td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->
							<tr>
								<td>26</td>
								<td>00</td>
								<td>27</td>
								<td>Médico y Cirujano</S></td>
								<td>5 Años</td>

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
								<td></td>
								<td>X</td>
								<td>X</td>

								<td>Habilidad numérica y Verbal y Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<tr>
								<td>26</td>
								<td>01</td>
								<td>05</td>
								<td style="vertical-align: middle" rowspan="5">Santa Elena</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="vertical-align: middle" rowspan="5">Doble</td>

								<td></td>
								<td style="vertical-align: middle" rowspan="5">16/01/2024</td>
								<td style="vertical-align: middle" rowspan="5">Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Redacción y Gramática</td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							<!-- VALOR DE TUPLA 11 -->
							<tr>
								<td>26</td>
								<td>01</td>
								<td>13</td>
								<td>Técnico en Trabajo Social</td>
								<td>6</td>

								<td></td>
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
								<td></td>
								<td></td>

								<td>Social Humanística</td>
							</tr>
							<!-- VALOR DE TUPLA 11 -->

							<!-- VALOR DE TUPLA 12 -->
							<tr>
								<td>26</td>
								<td>01</td>
								<td>18</td>
								<td>Técnico en Periodismo Profesional</td>
								<td>6</td>

								<td></td>
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
								<td></td>
								<td></td>

								<td>Lenguaje y Literatura</td>
							</tr>
							<!-- VALOR DE TUPLA 12 -->

							<!-- VALOR DE TUPLA 13 -->
							<tr>
								<td>26</td>
								<td>01</td>
								<td>21</td>
								<td>Profesorado de Enseñanza Media en Pedagogía con Orientación en Medio Ambiente</td>
								<td>6</td>

								<td></td>
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
								<td></td>
								<td></td>

								<td>Gramática y Redacción</td>
							</tr>
							<!-- VALOR DE TUPLA 13 -->

							<!-- VALOR DE TUPLA 14 -->
							<tr>
								<td>26</td>
								<td>01</td>
								<td>22</td>
								<td>Profesorado en Enseñanza Media con Especialización en Matemáticas y Física</td>
								<td>6</td>

								<td></td>
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
								<td></td>
								<td></td>

								<td>Introducción a la Matemática</td>
							</tr>
							<!-- VALOR DE TUPLA 14 -->

							<!-- VALOR DE TUPLA 15 -->
							<tr>
								<td>26</td>
								<td>04</td>
								<td>12</td>
								<td>Poptún</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Doble</td>

								<td></td>
								<td>16/01/2024</td>
								<td>Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Comprensión Lectora, Leyes</td>
							</tr>
							<!-- VALOR DE TUPLA 15 -->

							<!-- VALOR DE TUPLA 16 -->
							<tr>
								<td>26</td>
								<td>06</td>
								<td>05</td>
								<td>Poptún</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Ciencias de la Educación</td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Doble</td>

								<td></td>
								<td>16/01/2024</td>
								<td>Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Lenguaje</td>
							</tr>
							<!-- VALOR DE TUPLA 16 -->

							<!-- VALOR DE TUPLA 17 -->
							<tr>
								<td>26</td>
								<td>06</td>
								<td>13</td>
								<td>Poptún</td>
								<td>Técnico en Trabajo Social</td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Doble</td>

								<td></td>
								<td>16/01/2024</td>
								<td>Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Social Humanística</td>
							</tr>
							<!-- VALOR DE TUPLA 17 -->

							<!-- VALOR DE TUPLA 18 -->
							<tr>
								<td>26</td>
								<td>07</td>
								<td>24</td>
								<td>Chinchillá, San Luis</td>
								<td>Profesorado de Enseñanza Media en Educación Bilingüe Intercultural con Énfasis en Cultura Maya</td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Doble</td>

								<td></td>
								<td>16/01/2024</td>
								<td>Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Lenguaje aplicado a la Cultura maya</td>
							</tr>
							<!-- VALOR DE TUPLA 18 -->

							<!-- VALOR DE TUPLA 19 -->
							<tr>
								<td>26</td>
								<td>08</td>
								<td>24</td>
								<td>Sayaxché</td>
								<td>Profesorado de Enseñanza Media en Educación Bilingüe Intercultural con Énfasis en Cultura Maya</td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Doble</td>

								<td></td>
								<td>16/01/2024</td>
								<td>Tercera Semana de Febrero 2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Lenguaje aplicado a la Cultura maya</td>
							</tr>
							<!-- VALOR DE TUPLA 19 -->
						</tbody>
					</table>
					<!--PENDIENTE-->
					<a id="sitio" href="https://cudep-usac.wixsite.com/cudep"
						class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span class="hidden-xs-down"> </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Petén -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Izabal -->
	<div id="tabla_27" class="modal">
		<div class="t11" id="t11">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Izabal - Guía de Inscripción 2024</h2>
					<span class="close" id="close11"></span>
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
								<td>27</td>
								<td>00</td>
								<td>06</td>
								<td class="minimizar">Puerto Barrios</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogado y Notario</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle;" rowspan="4">Edificio Administrativo y módulos del Cunizab</td>
								<td>01/15/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 1 -->
							<tr>
								<td>27</td>
								<td>02</td>
								<td>13</td>
								<td class="minimizar">Puerto Barrios</td>
								<td>Licenciatura en Contaduría Publica y Auditoría</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>01/13/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de Contabilidad</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->


							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>27</td>
								<td>00</td>
								<td>14</td>
								<td class="minimizar">Puerto Barrios</td>
								<td>Ingeniería en Gestión Ambiental Local</S></td>
								<td>8</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>01/15/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de biología</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>27</td>
								<td>00</td>
								<td>18</td>
								<td class="minimizar">Puerto Barrios</td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td>01/15/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de biología</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>27</td>
								<td>03</td>
								<td>15</td>
								<td class="minimizar">Morales</td>
								<td>Licenciatura en Trabajo Social</S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Ed. Docente-administrativo Las Posas, Morales</td>
								<td>01/13/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<tr>
								<td>27</td>
								<td>00</td>
								<td>22</td>
								<td class="minimizar">Puerto Barrios</td>
								<td>Licenciatura en Psicología</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="vertical-align: middle" rowspan="2">Edificio Administrativo y módulos del Cunizab</td>
								<td>01/15/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td>X</td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>

								<td>Comprensión lectora y personalidad</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>27</td>
								<td>02</td>
								<td>23</td>
								<td class="minimizar">Puerto Barrios</td>
								<td>Licenciatura en Administración de Empresas</S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>01/13/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>27</td>
								<td>03</td>
								<td>23</td>
								<td class="minimizar">Morales</td>
								<td>Licenciatura en Administración de Empresas</S></td>
								<td>10</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Ed. Docente-administrativo Las Posas, Morales</td>
								<td>01/13/2024</td>
								<td>12/02/2024-18/03/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Fundamentos teóricos de Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->
						
						</tbody>
					</table>

					<a id="sitio" href="https://www.cunizab.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Izabal -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Santa Rosa -->
	<div id="tabla_32" class="modal">
		<div class="t12" id="t12">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Santa Rosa - Guía de Inscripción 2024</h2>
					<span class="close" id="close12"></span>
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
								<td>32</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar">Cuilapa</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td colspan="2"> 18:00-21:00</td>
								<td></td>
								<td></td>

								<td>CUNSARO Cuilapa</td>
								<td>01/15/2024</td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales del Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>32</td>
								<td>00</td>
								<td>12</td>
								<td class="minimizar">Cuilapa</td>
								<td>Técnico en Administración de Empresas</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td colspan="2">18:00-21:01</td>
								<td></td>
								<td></td>

								<td>CUNSARO Cuilapa</td>
								<td>01/15/2024</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Conceptos Generales de Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>32</td>
								<td>00</td>
								<td>14</td>
								<td class="minimizar">Nueva Santa Rosa</td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td colspan="2">15:00-21:00</td>
								<td></td>
								<td></td>

								<td>CUNSARO Nueva Santa Rosa</td>
								<td>01/15/2024</td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>32</td>
								<td>05</td>
								<td>05</td>
								<td class="minimizar">Chiquimulilla</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td colspan="2">18:00-21:00</td>
								<td></td>
								<td></td>

								<td>CUNSARO Chiquimulilla</td>
								<td>01/15/2024</td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales del Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>32</td>
								<td>05</td>
								<td>06</td>
								<td class="minimizar">Chiquimulilla</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00-17:00</td>
								<td></td>
								
								<td>CUNSARO Chiquimulilla</td>
								<td></td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales de Pedagogía</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>32</td>
								<td>05</td>
								<td>12</td>
								<td class="minimizar">Chiquimulilla</td>
								<td>Técnico en Administración de Empresas</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td colspan="2">18:00-21:00</td>
								<td></td>
								<td></td>

								<td>CUNSARO Chiquimulilla</td>
								<td>01/15/2024</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td>Conceptos Generales de Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>32</td>
								<td>06</td>
								<td>06</td>
								<td class="minimizar">Cuilapa</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00-17:00</td>
								<td></td>
								
								<td>CUNSARO Cuilapa</td>
								<td></td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales de Pedagogía</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>32</td>
								<td>07</td>
								<td>06</td>
								<td class="minimizar">Taxisco</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>07:00-17:00</td>
								<td></td>

								<td>CUNSARO Taxisco</td>
								<td></td>
								<td>01/20/2024</td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales de Pedagogía</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>32</td>
								<td>08</td>
								<td>05</td>
								<td class="minimizar">Nueva Santa Rosa</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td colspan="2">18:00-21:00</td>
								<td></td>
								<td></td>

								<td>CUNSARO Nueva Santa Rosa</td>
								<td>01/15/2024</td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td>Conceptos Generales del Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

						</tbody>
					</table>

					<!-- <a id="sitio" href="" class="object-btn btn btn-secondary "  >Ir al sitio<span
                        class="hidden-xs-down"> </span> </a> -->

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Santa Rosa -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Jutiapa -->
	<div id="tabla_34" class="modal">
		<div class="t15" id="t15">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Jutiapa - Guía de Inscripción 2024</h2>
					<span class="close" id="close15"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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

								<th style="border: 1px solid white;"> <p class="verticalText">Biología</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Física</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Lenguaje</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Matemática</p> </th>
                                <th style="border: 1px solid white;"> <p class="verticalText">Química</p> </th>


							</tr>
						</thead>
						<tbody>

						<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>34</td>
								<td>00</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Instituto Experimental</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos básicos de Contabilidad</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>34</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Escuela Oficial Urbana Mixta Barrio Latino</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos Básicos sobre Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 1 -->
							<tr>
								<td>34</td>
								<td>04</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Administración de Empresas</S></td>
								<td>11</td>

								<td></td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Escuela El Cóndor o Instituto Experimental</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Historia y Conceptos Básicos de Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>34</td>
								<td>05</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Contaduría Pública y Auditoría</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Escuela El Cóndor</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Contabilidad, Administración y Economía</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->


							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>34</td>
								<td>05</td>
								<td>06</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Escuela Tipo Federación "Salomón Carrillo Ramírez"</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conceptos Básicos sobre Pedagogía</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							

							
						</tbody>
					</table>

					<a id="sitio" href="https://jusac.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Jutiapa -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Chimaltenango-->
	<div id="tabla_35" class="modal">
		<div class="t16" id="t16">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Chimaltenango - Guía de Inscripción 2024</h2>
					<span class="close" id="close16"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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
								<td>35</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Contaduría Pública y Auditoría</td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="4">Interior Escuela Normal Pedro Molina, Chimaltenango</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos básicos de Contabilidad</td>
						  </tr>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>35</td>
								<td>00</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos básicos del Derecho y Realidad Nacional</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>35</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Técnico en Turismo</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos básicos del Turismo</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>35</td>
								<td>00</td>
								<td>15</td>
								<td class="minimizar"></td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agrícola</S></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->


							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>35</td>
								<td>00</td>
								<td>17</td>
								<td class="minimizar"></td>
								<td>Administración de Empresas</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="2">Interior Escuela Normal Pedro Molina, Chimaltenango</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos básicos de Administración</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

								

							<!-- VALOR DE TUPLA 6 -->
							<tr>
								<td>35</td>
								<td>05</td>
								<td>06</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos básicos de Pedagogía</td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							
						</tbody>
					</table>

					<a id="sitio" href="https://cundech.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Chimaltenango -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Baja Verapaz-->
	<div id="tabla_37" class="modal">
		<div class="t17" id="t17">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Baja Verapaz - Guía de Inscripción 2024</h2>
					<span class="close" id="close17"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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
								<td>37</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S><>/td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="4">CUNBAV</td>
                           q	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Nociones Generales de Ciencias Jurídicas y Sociales</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>37</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Administración de Empresas</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Nociones Generales de las Ciencias Económicas.</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>37</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar"></td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Biología</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>37</td>
								<td>01</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Habilidades Pedagógicas, estadística y Matemática Básica.</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

						</tbody>
					</table>

					<a id="sitio" href="https://cunbav.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Baja Verapaz -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de El Progreso-->
	<div id="tabla_38" class="modal">
		<div class="t18" id="t18">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de El Progreso - Guía de Inscripción 2024</h2>
					<span class="close" id="close18"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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
								<td>38</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S><>/td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="5">CUN PROGRESO</td>
                           		<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos y conceptos básicos de derecho y realidad nacional </td>
						  </tr>

						  </tr>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>38</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar"></td>
								<td>Ingeniero Agrónomo en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos de conceptos básicos de botánica y biología</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>38</td>
								<td>01</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos en aspectos didácticos pedagógicos y de evaluación</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>38</td>
								<td>01</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Administración de Empresas</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Conocimientos de Administración, economía, contabilidad.</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>38</td>
								<td>01</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Matemática y Física</S></td>
								<td>8</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Aritmética, conjuntos, lógica matemática, algebra, funciones, problemas de razonamiento, geometría analítica, geometría y trigonometría</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

						</tbody>
					</table>

					<a id="sitio" href="https://www.cunprogreso.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de El Progreso -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Totonicapán-->
	<div id="tabla_39" class="modal">
		<div class="t19" id="t19">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Totonicapán - Guía de Inscripción 2024</h2>
					<span class="close" id="close19"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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
								<td>39</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S><>/td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="5"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="2">Realidad Regional</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>39</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Ingeniería Forestal</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>39</td>
								<td>00</td>
								<td>06</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Realidad Nacional, Conceptos Básicos de Derecho</td>

							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>39</td>
								<td>01</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Adinistración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="2">Realidad Regional</td>

							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>39</td>
								<td>01</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Educación Intercultural</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>

							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<!--<tr>
								<td>39</td>
								<td>01</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Pedagogía y Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<!--<tr>
								<td>39</td>
								<td>01</td>
								<td>05</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Pedagogía e Interculturalidad</S></td>
								<td></td>

								<td></td>
								<td>X</td>
								<td></td>

								<td>X</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
							<!--<tr>
								<td>39</td>
								<td>01</td>
								<td>07</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Educación Bilingüe Intercultural con Énfasis en Cultura Maya</S></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 8 -->


						</tbody>
					</table>

					<a id="sitio" href="https://cuntoto.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Totonicapán -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de El Quiché-->
	<div id="tabla_40" class="modal">
		<div class="t20" id="t20">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de El Quiché - Guía de Inscripción 2024</h2>
					<span class="close" id="close20"></span>
				</div>
				<div class="modal-body">
					<!--table class="table caption-top">
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
						<tbody>

							<!-- VALOR DE TUPLA 1 -->
							<!--tr>
								<td>40</td>
								<td>00</td>
								<td>02</td>
								<td class="minimizar">Santa Cruz El Quiché</td>
								<td>Profesorado de Enseñanza Media en Matemática y Física</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<!--tr>
								<td>40</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar">Santa Cruz El Quiché</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<!--tr>
								<td>40</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar">Santa Cruz El Quiché</td>
								<td>Ingeniería Agronómica en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<!--tr>
								<td>40</td>
								<td>00</td>
								<td>06</td>
								<td class="minimizar">Santa Cruz El Quiché</td>
								<td>Administración de Empresas</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<!--tr>
								<td>40</td>
								<td>01</td>
								<td>01</td>
								<td class="minimizar">Santa Cruz El Quiché</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<!--tr>
								<td>40</td>
								<td>09</td>
								<td>08</td>
								<td class="minimizar">Santa Cruz El Quiché</td>
								<td>Profesorado en Educación Primaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<!--tr>
								<td>40</td>
								<td>03</td>
								<td>10</td>
								<td class="minimizar">Lancerillo, Uspantán, El Quiché</td>
								<td>Profesorado de Enseñanza Media en Educación Bilingüe Intercultural con Énfasis en Cultura Maya</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
							<!--tr>
								<td>40</td>
								<td>07</td>
								<td>08</td>
								<td class="minimizar">San Miguel Uspantán, Quiché</td>
								<td>Profesorado en Educación PRimaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->
							<!--tr>
								<td>40</td>
								<td>06</td>
								<td>01</td>
								<td class="minimizar">Santa María Nebaj</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<!--tr>
								<td>40</td>
								<td>06</td>
								<td>04</td>
								<td class="minimizar">Santa María Nebaj</td>
								<td>Ingeniería Agronómica en Sistemas de Producción Agricola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							<!-- VALOR DE TUPLA 11 -->
							<!--tr>
								<td>40</td>
								<td>06</td>
								<td>08</td>
								<td class="minimizar">Santa María Nebaj</td>
								<td>Profesorado en Educación Primaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 11 -->

							<!-- VALOR DE TUPLA 12 -->
							<!--tr>
								<td>40</td>
								<td>10</td>
								<td>03</td>
								<td class="minimizar">Pachalún</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 12 -->

							<!-- VALOR DE TUPLA 13 -->
							<!--tr>
								<td>40</td>
								<td>10</td>
								<td>04</td>
								<td class="minimizar">Pachalún</td>
								<td>Ingeniería Agronómica en Sistemas de Producción Agrícola</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 13 -->

							<!-- VALOR DE TUPLA 14 -->
							<!--tr>
								<td>40</td>
								<td>04</td>
								<td>01</td>
								<td class="minimizar">Cantón Chicuá</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 14 -->

							<!-- VALOR DE TUPLA 15 -->
							<!--tr>
								<td>40</td>
								<td>04</td>
								<td>08</td>
								<td class="minimizar">Cantón Chicuá I, Chichicastenango</td>
								<td>Profesorado en Educación Primaria Bilingüe Intercultural</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 15 -->

							<!-- VALOR DE TUPLA 16 -->
							<!--tr>
								<td>40</td>
								<td>12</td>
								<td>03</td>
								<td class="minimizar">Joyaba</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 16 -->

							<!-- VALOR DE TUPLA 17 -->
							<!--tr>
								<td>40</td>
								<td>12</td>
								<td>06</td>
								<td class="minimizar">Joyaba</td>
								<td>Administración de Empresas</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 17 -->

							<!-- VALOR DE TUPLA 18 -->
							<!--tr>
								<td>40</td>
								<td>15</td>
								<td>01</td>
								<td class="minimizar">Joyaba</td>
								<td>Profesorado de Enseñanza Media en Pedagogía y Técnico en Administrción Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 18 -->

							<!-- VALOR DE TUPLA 19 -->
							<!--tr>
								<td>40</td>
								<td>11</td>
								<td>03</td>
								<td class="minimizar">Ixcán</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 19 -->

							<!-- VALOR DE TUPLA 20 -->
							<!--tr>
								<td>40</td>
								<td>13</td>
								<td>01</td>
								<td class="minimizar">San Andrés Sajcabajá</td>
								<td>Profesorado de Enseñanza Media Pedagogía y Técnico en Administración Educativa con Orientación en Medio Ambiente</S></td>
								<td>6</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 20-->


						<!--/tbody>
					</table-->

					<a id="sitio" href="https://cusacq.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de El Quiché -->


	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Zacapa-->
	<div id="tabla_41" class="modal">
		<div class="t21" id="t21">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Zacapa - Guía de Inscripción 2024</h2>
					<span class="close" id="close21"></span>
				</div>
				<div class="modal-body">
					<!--table class="table caption-top">
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
						<tbody>

							<!-- VALOR DE TUPLA 1 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Ingeniería en Industrias Agropecuarias y Forestales</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Ingeniero Agrónomo</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Contaduría Pública y Auditoría</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<!--tr>
								<td>41</td>
								<td>01</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Contaduría Pública y Auditoría</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Psicología</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->

							<!-- VALOR DE TUPLA 6 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 6 -->

							<!-- VALOR DE TUPLA 7 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>07</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Nutrición</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 7 -->

							<!-- VALOR DE TUPLA 8 -->
							<!--tr>
								<td>41</td>
								<td>01</td>
								<td>06</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Administración de Empresas</S></td>
								<td>11</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 8 -->

							<!-- VALOR DE TUPLA 9 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>08</td>
								<td class="minimizar"></td>
								<td>Técnico en Enfermería</S></td>
								<td>6</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 9 -->

							<!-- VALOR DE TUPLA 10 -->
							<!--tr>
								<td>41</td>
								<td>00</td>
								<td>09</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Enfermería</S></td>
								<td>5</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>
							<!-- VALOR DE TUPLA 10 -->

							
						<!--/tbody>
					</table-->

					<a id="sitio" href="https://cunzac.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al sitio<span
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Zacapa -->


	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Sololá -->
	<div id="tabla_42" class="modal">
		<div class="t13" id="t13">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Sololá - Guía de Inscripción 2024</h2>
					<span class="close" id="close13"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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
								<td>42</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar">Sololá</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="5"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Guía de Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<tr>
								<td>42</td>
								<td>00</td>
								<td>02</td>
								<td class="minimizar">Sololá</td>
								<td>Contador Público y Auditor</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Guía de Auditoría</td>
							</tr>
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<tr>
								<td>42</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar">Sololá</td>
								<td>Licenciatura en Trabajo Social</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Guía de Trabajo Social</td>
							</tr>
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>42</td>
								<td>05</td>
								<td>01</td>
								<td class="minimizar">San Juan la Laguna</td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogacía y Notariado</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Guía de Derecho</td>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>42</td>
								<td>05</td>
								<td>02</td>
								<td class="minimizar">San Juan la Laguna</td>
								<td>Contador Público y Auditor</S></td>
								<td>11</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>

                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Guía de Auditoría</td>
							</tr>
							<!-- VALOR DE TUPLA 5 -->
							
						</tbody>
					</table>

					<a id="sitio" href="https://cunsol.edu.gt/"
						class="object-btn btn btn-secondary " target="_blank" >Ir al sitio<span class="hidden-xs-down"> </span> </a>

				</div>
				<div class="footer">
					<!-- aqui estara el logo de rye -->

					<br>
					<a href="#"><img src="{{ asset('assets2/img/logo.svg')}}" width="120" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Sololá -->

	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Sacatepéquez -->
	<div id="tabla_44" class="modal">
		<div class="t14" id="t14">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2 class="titulo_modal">Centro Universitario de Sacatepéquez - Guía de Inscripción 2024</h2>
					<span class="close" id="close14"></span>
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
								<th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Módulo o Edificio</th>
                                <th style="border: 1px solid white;"colspan="5" class="ultimo">Pruebas de Conocimientos Básicos</th>
                                <th style="border: 1px solid white;"colspan="1" rowspan="2" class="minimizar">Prueba Específica</th>
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
								<td>44</td>
								<td>00</td>
								<td>01</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Psicología</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>17:30 - 20:30</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar" rowspan="3">Instituto Normal para Varones, Antonio Larrazabal</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);" class="minimizar">Comprensión Lectora y Personalidad</tr>
							<!-- VALOR DE TUPLA 1 -->

							<!-- VALOR DE TUPLA 2 -->
							<!--<tr>
								<td>44</td>
								<td>01</td>
								<td>02</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía de Ciencias Sociales y Organización Comunitaria</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td>X</td>
								<td>X</td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 2 -->

							<!-- VALOR DE TUPLA 3 -->
							<!--<tr>
								<td>44</td>
								<td>01</td>
								<td>03</td>
								<td class="minimizar"></td>
								<td>Profesorado de Enseñanza Media en Pedagogía de Ciencias Naturales y Ecología</S></td>
								<td>7</td>

								<td></td>
								<td>X</td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>X</td>
								<td></td>
							</tr>-->
							<!-- VALOR DE TUPLA 3 -->

							<!-- VALOR DE TUPLA 4 -->
							<tr>
								<td>44</td>
								<td>00</td>
								<td>04</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Administración Turística, Aventura y Hospitalidad</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td>17:30 - 20:30</td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">Liderazgo y Servicio</tr>
							</tr>
							<!-- VALOR DE TUPLA 4 -->

							<!-- VALOR DE TUPLA 5 -->
							<tr>
								<td>44</td>
								<td>00</td>
								<td>05</td>
								<td class="minimizar"></td>
								<td>Licenciatura en Ciencias Jurídicas y Sociales, Abogado y Notario</S></td>
								<td>10</td>

								<td>X</td>
								<td></td>
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">X</td>
                            	<td style="border: 1px solid rgb(122, 125, 131);"></td>
                            	<td style="border: 1px solid rgb(122, 125, 131);">Conceptos Básicos del Derecho y Realidad Nacional</tr>
							
							</tr>
							<!-- VALOR DE TUPLA 5 -->
						</tbody>
					</table>


					<a id="sitio" href="http://cunsac.usac.edu.gt/" class="object-btn btn btn-secondary " target="_blank">Ir al
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
	<!-- TABLA PARA EL CENTRO UNIVERSITARIO DE Estudios de Sacatepéquez -->



	<script src="{{ asset('assets2/js/main_centros.js')}}"></script>
</body>

</html>