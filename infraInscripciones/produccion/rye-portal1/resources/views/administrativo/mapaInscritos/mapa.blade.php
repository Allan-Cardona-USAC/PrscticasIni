<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ isset($title) ? $title : '' }}</title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">
    <!-- CSRF Token -->
    <meta name="token" content="{{ csrf_token() }}">
    @yield('head')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('pike/images/favicon.ico') }}">

    <!-- Switchery css -->
    <link href="{{ asset('pike/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('pike/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="{{ asset('pike/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('pike/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Loading animation -->
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet" type="text/css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->
    <style>
        acento {
            background-color: #e0dd43;
        }
    </style>

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 100px;
			width: 200px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>

	<style>
		.carreras {
 overflow: auto; /*Graceful degradation para Firefox*/
 overflow: overlay;/*Progressive enhancement para Opera*/
 scrollbar-gutter: stable;
}

/*Webkit(Chrome, Android browser, Safari, Edge...)*/
.carreras::-webkit-scrollbar {
 display: none; /*Para que scrollbar-gutter funcione la barra de scroll debe existir*/
 background-color: transparent;
}
.carreras:hover::-webkit-scrollbar {
 display: initial;
}
 /*Ahora para esconderlo deberemos cambiar el color del manejador a transparente*/
.carreras::-webkit-scrollbar-thumb {
background-color: transparent;
}
.carreras:hover::-webkit-scrollbar-thumb {
background-color: rgb(147, 214, 151);
}

	#map { width: 100%; height: 100vh; display: flex; z-index: 10;}
	.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
	.legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }
	.carreras {max-width: 50.24661810613944vh; max-height: 83.24661810613944vh; padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; overflow-y: scroll;}

	@media (max-width: 800px) {
  	/* … */
  	.carreras {max-width: 25.24661810613944vh; max-height: 83.24661810613944vh; padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; overflow-y: scroll;}
	}
	table{
		width: 100%;
		table-layout: auto;
	}
	thead{
		border-radius: 30px;
		background-color: #3db9dc;
		color: #0c2c84;
		text-align: center
	}
	
	tr{
		border-bottom: 1px solid;
		height: 60px;
	}
	td{
		text-align: center;
		padding-left: 10px;
		color: #555;
	}
	#nombre_car{
		text-align: left;
	}

	.custom-select {
  	position: relative;
  	font-family: Arial;
	}

	.custom-select select {
	display: none; /*hide original SELECT element: */
	}

	.select-selected {
	background-color: DodgerBlue;
	}

	/* Style the arrow inside the select element: */
	.select-selected:after {
	position: absolute;
	content: "";
	top: 14px;
	right: 10px;
	width: 0;
	height: 0;
	border: 6px solid transparent;
	border-color: #fff transparent transparent transparent;
	}

	/* Point the arrow upwards when the select box is open (active): */
	.select-selected.select-arrow-active:after {
	border-color: transparent transparent #fff transparent;
	top: 7px;
	}

	/* style the items (options), including the selected item: */
	.select-items div,.select-selected {
	color: #ffffff;
	padding: 8px 16px;
	border: 1px solid transparent;
	border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
	cursor: pointer;
	}

	/* Style items (options): */
	.select-items {
	position: absolute;
	background-color: DodgerBlue;
	top: 100%;
	left: 0;
	right: 0;
	z-index: 99;
	}

	/* Hide the items when the select box is closed: */
	.select-hide {
	display: none;
	}

	.select-items div:hover, .same-as-selected {
	background-color: rgba(0, 0, 0, 0.1);
	}

	.leaflet-control-resetview {
    a {
        cursor: pointer;

        .leaflet-control-resetview-icon {
            display: inline-block;
            width: 16px;
            height: 16px;
            margin: 7px;
            background-color: black;
            -webkit-mask-image: url('assets2/img/redo-solid.svg');
            mask-image: url('assets2/img/redo-solid.svg');
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            -webkit-mask-position: center;
            mask-position: center;
        }
    }
}
	</style>
	</head>

<body class="adminbody">
<div id="main">
		<div id="map" class="div2"></div>
		<div class="card mb-12">
    </div>


   
</div>

<!-- END main -->

<script src="{{ asset('pike/js/modernizr.min.js') }}"></script>
<script src="{{ asset('pike/js/jquery.min.js') }}"></script>
<script src="{{ asset('pike/js/moment.min.js') }}"></script>

<script src="{{ asset('pike/js/popper.min.js') }}"></script>
<script src="{{ asset('pike/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('pike/js/detect.js') }}"></script>
<script src="{{ asset('pike/js/fastclick.js') }}"></script>
<script src="{{ asset('pike/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('pike/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('pike/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('pike/plugins/switchery/switchery.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('pike/js/pikeadmin.js') }}"></script>
<script>
$(document).ready(function(){

	var height = $(window).height();

	$('#div2').height(height);
});
</script>
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>
<!-- Java Script for guatemala map -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script type="text/javascript" src="{{asset('assets2/js/gt-coordenadas.js')}}"></script>
<script>

	alto = window.screen.height;
	ancho = window.screen.width;

	if(alto <= 800 && ancho <= 800){
		tamanio = 6.5
	}else{
		tamanio = 7.5
	}

	// map to set coords
	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://portalregistro.usac.edu.gt">Registro y Estadistica</a>'
	})
	//end to map ser coords

	var IconCunoc = L.icon({
        iconUrl: "assets2/img/marker_cunoc.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunoc = L.marker([14.84523925147176, -91.53562915201863], {icon:IconCunoc}).openPopup().bindPopup('<b>CUNOC</b>').on('click', function(e) {
      map.setView(e.latlng, 16);
	
	});

	var IconCunor = L.icon({
        iconUrl: "assets2/img/marker_cunor.png",

        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunor = L.marker([15.464997696847414, -90.38960191152927], {icon:IconCunor}).openPopup().bindPopup('<b>CUNOR</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunori = L.icon({
        iconUrl: "assets2/img/marker_cunori.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunori = L.marker([14.8023824861374, -89.53172852495966], {icon:IconCunori}).openPopup().bindPopup('<b>CUNORI</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunoroc = L.icon({
        iconUrl: "assets2/img/marker_cunoroc.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunoroc = L.marker([15.310375806309473, -91.53257761707306], {icon:IconCunoroc}).openPopup().bindPopup('<b>CUNOROC</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunsur = L.icon({
        iconUrl: "assets2/img/marker_cunsur.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunsur = L.marker([14.31705255744074, -90.78422211001585], {icon:IconCunsur}).openPopup().bindPopup('<b>CUNSUR</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunsuroc = L.icon({
        iconUrl: "assets2/img/marker_cunsuroc.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunsuroc = L.marker([14.528927100216613, -91.5210538863994], {icon:IconCunsuroc}).openPopup().bindPopup('<b>CUNSUROC</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunsurori = L.icon({
        iconUrl: "assets2/img/marker_cunsurori.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunsurori = L.marker([14.629048898280784, -89.98506115611191], {icon:IconCunsurori}).openPopup().bindPopup('<b>CUNSURORI</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCema = L.icon({
        iconUrl: "assets2/img/marker_cema.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cema = L.marker([14.583991317412515, -90.55712987475212], {icon:IconCema}).openPopup().bindPopup('<b>CEMA</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCusam = L.icon({
        iconUrl: "assets2/img/marker_cusam.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cusam = L.marker([14.965049100279098, -91.79949682348102], {icon:IconCusam}).openPopup().bindPopup('<b>CUSAM</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCudep = L.icon({
        iconUrl: "assets2/img/marker_cudep.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cudep = L.marker([16.91871169046982, -89.88543343608846], {icon:IconCudep}).openPopup().bindPopup('<b>CUDEP</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunizab = L.icon({
        iconUrl: "assets2/img/marker_cunizab.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunizab = L.marker([15.69389511592418, -88.58385753056244], {icon:IconCunizab}).openPopup().bindPopup('<b>CUNIZAB</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunsaro = L.icon({
        iconUrl: "assets2/img/marker_cunsaro.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunsaro = L.marker([14.265648040572183, -90.28622603665734], {icon:IconCunsaro}).openPopup().bindPopup('<b>CUNSARO</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconJusac = L.icon({
        iconUrl: "assets2/img/marker_jusac.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const jusac = L.marker([14.294722642715813, -89.89832810359063], {icon:IconJusac}).openPopup().bindPopup('<b>JUSAC</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCundech = L.icon({
        iconUrl: "assets2/img/marker_cundech.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

const cundech = L.marker([14.639296429931488, -90.80777953846939], {icon:IconCundech}).openPopup().bindPopup('<b>CUNDECH</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunbav = L.icon({
        iconUrl: "assets2/img/marker_cunbav.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunbav = L.marker([15.11405933976859, -90.36983473241669], {icon:IconCunbav}).openPopup().bindPopup('<b>CUNBAV</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunprogreso = L.icon({
        iconUrl: "assets2/img/marker_cunbav.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
        
    });

    const cunprogreso = L.marker([14.860942188356788, -90.07823657892997], {icon:IconCunprogreso}).openPopup().bindPopup('<b>CUNPROGRESO</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCuntoto = L.icon({
        iconUrl: "assets2/img/marker_cuntoto.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cuntoto = L.marker([14.930023951841637, -91.33460077900563], {icon:IconCuntoto}).openPopup().bindPopup('<b>CUNTOTO</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCusacq = L.icon({
        iconUrl: "assets2/img/marker_cusacq.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cusacq = L.marker([15.033055541160056, -91.15176402387544], {icon:IconCusacq}).openPopup().bindPopup('<b>CUSACQ</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunzac = L.icon({
        iconUrl: "assets2/img/marker_cunzac.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunzac = L.marker([14.966834986274877, -89.52907852309629], {icon:IconCunzac}).openPopup().bindPopup('<b>CUNZAC</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunsol = L.icon({
        iconUrl: "assets2/img/marker_cunsol.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunsol = L.marker([14.775288553569972, -91.18194789776199], {icon:IconCunsol}).openPopup().bindPopup('<b>CUNSOL</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCunsac = L.icon({
        iconUrl: "assets2/img/marker_cunsac.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const cunsac = L.marker([14.547927576999024, -90.7815101501248], {icon:IconCunsac}).openPopup().bindPopup('<b>CUNSAC</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconTecMaya = L.icon({
        iconUrl: "assets2/img/marker_tecmaya.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const tecmaya = L.marker([15.409041817116705, -90.32598883027357], {icon:IconTecMaya}).openPopup().bindPopup('<b>ITMES</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconInap = L.icon({
        iconUrl: "assets2/img/marker_inap.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const inap = L.marker([14.589228527309272, -90.50412122313286], {icon:IconInap}).openPopup().bindPopup('<b>INAP</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconItugs = L.icon({
        iconUrl: "assets2/img/marker_itugs.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const itugs = L.marker([14.375021944827587, -90.72321993057776], {icon:IconItugs}).openPopup().bindPopup('<b>ITUGS</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaCienciasPsicologicas = L.icon({
        iconUrl: "assets2/img/marker_escuelacienciaspsicologicas.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelacienciaspsicologicas = L.marker([14.612751630386848, -90.54579248741045], {icon:IconEscuelaCienciasPsicologicas}).openPopup().bindPopup('<b>Escuela Ciencias Psicologicas</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaHIstoria = L.icon({
        iconUrl: "assets2/img/marker_escuelahistoria.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelahistoria = L.marker([14.587742245425734, -90.5489139501742], {icon:IconEscuelaHIstoria}).openPopup().bindPopup('<b>Escuela Historia</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaTrabajoSocial = L.icon({
        iconUrl: "assets2/img/marker_escuelatrabajosocial.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelatrabajosocial = L.marker([14.587739581595134, -90.54883005386884], {icon:IconEscuelaTrabajoSocial}).openPopup().bindPopup('<b>Escuela Trabajo Social</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaComunicacion = L.icon({
        iconUrl: "assets2/img/marker_escuelacomunicacion.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelacomunicacion = L.marker([14.588744727413241, -90.54902746125802], {icon:IconEscuelaComunicacion}).openPopup().bindPopup('<b>Escuela Comunicacion</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaArte = L.icon({
        iconUrl: "assets2/img/marker_escuelaarte.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelaarte = L.marker([14.588744727413241, -90.54902746125802], {icon:IconEscuelaArte}).openPopup().bindPopup('<b>Escuela Arte</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaCienciaPolitica = L.icon({
        iconUrl: "assets2/img/marker_escuelacienciapolitica.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow 
    });

    const escuelacienciapolitica = L.marker([14.587934728216142, -90.55012878824607], {icon:IconEscuelaCienciaPolitica}).openPopup().bindPopup('<b>Escuela Ciencia Politica</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaEFPEM = L.icon({
        iconUrl: "assets2/img/marker_efpem.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const efpem = L.marker([14.588248661990756, -90.54544044591671], {icon:IconEscuelaEFPEM}).openPopup().bindPopup('<b>Escuela de Formacion de Profesores de Enseñanza Media </b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconEscuelaCienciasLinguisticas = L.icon({
        iconUrl: "assets2/img/marker_escuelacienciaslinguisticas.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelacienciaslinguisticas = L.marker([14.586220221927553, -90.55206706868248], {icon:IconEscuelaCienciasLinguisticas}).openPopup().bindPopup('<b>Escuela de Ciencias Linguisticas</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

	var IconEscuelaCienciasFisicasMatematicas = L.icon({
        iconUrl: "assets2/img/marker_escuelacienciasfisicasmatematicas.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const escuelacienciasfisicasmatematicas = L.marker([14.58846116189591, -90.55362943847426], {icon:IconEscuelaCienciasFisicasMatematicas}).openPopup().bindPopup('<b>Escuela de Ciencias Fisicas y Matematicas</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconAgronomia = L.icon({
        iconUrl: "assets2/img/marker_agronomia.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadagronomia = L.marker([14.58506473242333, -90.5525099747521], {icon:IconAgronomia}).openPopup().bindPopup('<b>Facultad de Agronomia</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconArquitectura = L.icon({
        iconUrl: "assets2/img/marker_arquitectura.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadarquitectura = L.marker([14.588442812976513, -90.5526805305754], {icon:IconArquitectura}).openPopup().bindPopup('<b>Facultad de Arquitectura</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCienciasEconomicas = L.icon({
        iconUrl: "assets2/img/marker_economicas.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadeconomicas = L.marker([14.583044166658377, -90.55605340358746], {icon:IconCienciasEconomicas}).openPopup().bindPopup('<b>Facultad de Economicas</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCienciasJuridicas = L.icon({
        iconUrl: "assets2/img/marker_juridicas.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadjuridicas = L.marker([14.587198913916266, -90.55026151708144], {icon:IconCienciasJuridicas}).openPopup().bindPopup('<b>Facultad de Ciencias Juridicas y Sociales</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCienciasMedicas = L.icon({
        iconUrl: "assets2/img/marker_medicina.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadmedicina = L.marker([14.611930037938427, -90.54493057881334], {icon:IconCienciasMedicas}).openPopup().bindPopup('<b>Facultad de Ciencias Medicas</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconCienciasQuimicasFarmacia = L.icon({
        iconUrl: "assets2/img/marker_farmacia.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadfarmacia = L.marker([14.584709383312504, -90.55446386125807], {icon:IconCienciasQuimicasFarmacia}).openPopup().bindPopup('<b>Facultad de Ciencias Quimicas y Farmacia</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconHumanidades = L.icon({
        iconUrl: "assets2/img/marker_humanidades.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadhumanidades = L.marker([14.586938599034333, -90.5508129747521], {icon:IconHumanidades}).openPopup().bindPopup('<b>Facultad de Humanidades</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconIngenieria = L.icon({
        iconUrl: "assets2/img/marker_ingenieria.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadingenieria = L.marker([14.58774521350352, -90.55311441892873], {icon:IconIngenieria}).openPopup().bindPopup('<b>Facultad de Ingenieria</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconOdontologia = L.icon({
        iconUrl: "assets2/img/marker_odontologia.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadodontologia = L.marker([14.58813952574236, -90.54905852313298], {icon:IconOdontologia}).openPopup().bindPopup('<b>Facultad de Odontologia</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

var IconVeterinaria = L.icon({
        iconUrl: "assets2/img/marker_veterinaria.png",
        iconSize:     [60, 60], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
    });

    const facultadveterinaria = L.marker([14.58813952574236, -90.54905852313298], {icon:IconVeterinaria}).openPopup().bindPopup('<b>Facultad de Medicina y Zootecnia</b>').on('click', function(e) {
      map.setView(e.latlng, 16);});;

	var centros = L.layerGroup([cunoc, cunori, cunor, cunoroc, cunsur, cunsuroc, cunsurori, cusam, cudep, cunizab, cunsaro, jusac, cundech, cunbav, cunprogreso, cuntoto, cusacq, cunzac, cunsol, cunsac]);
	var institutos = L.layerGroup([tecmaya, inap, itugs ]);
	var escuelas = L.layerGroup([escuelacienciaspsicologicas, escuelahistoria, escuelatrabajosocial, escuelacomunicacion, escuelaarte, escuelacienciapolitica, efpem, escuelacienciaslinguisticas, escuelacienciasfisicasmatematicas]);
	var facultades = L.layerGroup([facultadagronomia, facultadarquitectura, facultadeconomicas, facultadjuridicas, facultadmedicina, facultadfarmacia, facultadhumanidades, facultadingenieria, facultadodontologia, facultadveterinaria]);
	var baseMaps = {
        "Mapa": tiles
    };
	var overlayMaps = {
        "Centros": centros
    };
	

	const map = L.map('map', {scrollWheelZoom: false, maxZoom: 18.5, minZoom: 6.5, maxBounds: [[22.93464143877106, -97.92527560430194],[10.314272264508773, -81.21737997990927]], dragging: !L.Browser.mobile, layers: [tiles]}).setView([15.830797, -90.269165], tamanio);
	tiles.addTo(map);
	//Set custom image for markers
	var IconUSAC = L.icon({
        iconUrl: "assets2/img/usaclogo1.png",
        iconSize:     [380, 180], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        shadowAnchor: [4, 62],  // the same for the shadow
        
    });

    const usac = L.marker([16.968132430209096, -86.89593952221529], {icon:IconUSAC}).addTo(map).openPopup();

	var mapa = {!! $geojson !!}

	/* global statesData */
	var geojson = L.geoJson(mapa, {
		style,
		onEachFeature
	}).addTo(map);

	// all to set inscritos by ciclo semestre on div in map
	const inscritos = L.control({position: 'bottomright'});

	inscritos.onAdd = function(map){
		this._div = L.DomUtil.create('div', 'inscritos');
		this.updateinscritos();
		return this._div;
	}

	inscritos.updateinscritos= function(props){
		const labels = [];
		if(props){
			console.log('entroooooo')
			verificaInscritos(props.feature.id, test);
		}else{

		// "date" is object of Date() class
		let n = new Date().getFullYear();
		power = ""
		for (var i = 0; i<5; i++){
			dataam = `<option value="${n-i}">${n-i}</option>`
			power = power+dataam
		}

		const contents = `	<select id="cicloInsc" class="custom-select">
							`+ power  + `
							</select>
							<select id="semestreIns" class="custom-select">
							<option value="3" selected>Todos</option>
							<option value="1">1</option>
							<option value="2">2</option>
							</select>
							<button type="button" class="btn btn-info btn-lg btn-block" onclick="verificaInscritos()">Buscar</button>	
							`
		labels.push(contents);
		this._div.innerHTML = labels.join('');
		return labels
		}
	}

	inscritos.update2Inscritos = async function(data){
		
		data = JSON.parse(data)

		geojson =  L.geoJson(data, {
		style,
		onEachFeature
		}).addTo(map);
	}

	inscritos.addTo(map)

	
	map.on('zoomend', function(e) {
	var currentZoom = map.getZoom();
	if(currentZoom >= 13){
	console.log('entro por zoom '+ currentZoom);
	geojson.setStyle(style2);
	}else{
	geojson.resetStyle(e.target.layer)
	}
	var currentZoom = map.getZoom();
	console.log(currentZoom);
	});
	//end open popup when click on map

	// control that shows state info on hover
	const info = L.control();

	info.onAdd = function (map) {
		this._div = L.DomUtil.create('div', 'info');
		this.update();
		return this._div;
	};

	info.update = function (props) {
		const contents = props ? `<b>${props.properties.name} | ${props.properties.nombre}</b><br />${props.properties.density} inscritos, año ${props.properties.ciclo}<br/><p><p>` : 'Colocate sobre un departamento';
		this._div.innerHTML = `<h4>Estudiantes Inscritos</h4>${contents}`;

	};

	info.addTo(map);

	var layerControl = L.control.layers(baseMaps,overlayMaps).addTo(map);
	layerControl.addOverlay(institutos, 'Institutos'); 
	layerControl.addOverlay(facultades, 'Facultades');
	layerControl.addOverlay(escuelas, 'Escuelas');


	//end of info container functions

	// get color depending on population density value
	function getColor(d) {
		return d > 20000 ? '#0c2c84' :
			d > 15000  ? '#225ea8' :
			d > 10000  ? '#1d91c0' :
			d > 6000  ? '#41b6c4' :
			d > 4000   ? '#7fcdbb' :
			d > 2000   ? '#c7e9b4' :
			d > 1000   ? '#edf8b1' : '#ffffd9';
	}

	function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'green',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.density)
		};
	}

	function style2(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'green',
			dashArray: '3',
			fillOpacity: 0,
			fillColor: getColor(feature.properties.density)
		};
	}

	function highlightFeature(e) {
		const layer = e.target;

		var currentZoom = map.getZoom();
		if(currentZoom < 13){
		layer.setStyle({
			weight: 5,
			color: '#2c7fb8',
			dashArray: '',
			fillOpacity: 0.7
		});
		}

		layer.bringToFront();

		info.update(layer.feature);

	}



	function resetHighlight(e) {
		var currentZoom = map.getZoom();
		if(currentZoom < 13){
		console.log('entro por zoommm '+ currentZoom);
		geojson.resetStyle(e.target);
		}
		info.update();
	}

	function zoomToFeature(e) {
		console.log('esto hace al hacer click: '+e.target.feature.id+' y este año ' +e.target.feature.properties.ciclo);
		test.updateTest(e.target);
	}


	//end all to set inscritos by ciclo semestre on div in map

	// all to set carreras on div in map
	const test = L.control({position: 'bottomleft'});

	test.onAdd = function(map){
		this._div = L.DomUtil.create('div', 'carreras');
		this.updateTest();
		return this._div;
	}

	test.updateTest= function(props){
		const labels = [];
		if(props){
			console.log('entroooooo')
			verifica(props.feature.id, test, props.feature.properties.ciclo, props.feature.properties.semestre);
		}else{
		const contents = ''
		labels.push(contents);
		this._div.innerHTML = labels.join('');
		return labels
		}
	}

	test.update2Test = function(data){
		
		const labels = [];
		const tablaUp = `<div id="tablaCarreras"><button type="button" class="btn btn-outline-info" onclick="salir()" style="position: absolute; right: 8px; color: white">X</button>
			<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<td>Unidad</td>
				<!--<td>Extension</td>-->
				<td>Carrera</td>
				<td>Inscritos</td>
				<td>Nombre Carrera</td>
			</thead>
			`
		labels.push(tablaUp)
		const contents = data ? data.forEach((datal, index) =>{ texto = `
			<tr>
			<td id="anio"> ${datal.ua}</td>
			<!--<td id="anio"> ${datal.ext}</td>-->
			<td id="anio"> ${datal.car}</td>
			<td id="anio"> ${datal.total}</td>
			<td id="nombre_car"> ${datal.nombre_carrera}</td>
			</tr>
			`
			labels.push(texto)
		}) : ''
		const tablaDown = '</table></div>'
		labels.push(tablaDown)
		//labels.push(contents);
		this._div.innerHTML = labels.join('');
		return labels
	}

	test.addTo(map)

	//end all to set carreras on div in map


	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
	}

	//map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


	const legend = L.control({position: 'bottomright'});

	legend.onAdd = function (map) {

		const div = L.DomUtil.create('div', 'info legend');
		const grades = [0, 1000, 2000, 4000, 6000, 10000, 15000, 20000];
		const labels = [];
		let from, to;

		for (let i = 0; i < grades.length; i++) {
			from = grades[i];
			to = grades[i + 1];

			labels.push(`<i style="background:${getColor(from + 1)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};

	legend.addTo(map);


	// function to get carreras by dep
	function verifica(id, test, ciclo, semestre) {

	let anio = ciclo;
	let departamento = id;
	let semest = semestre;
	console.log(departamento);

	let formData = new FormData();
	formData.append('departamento', departamento)
	formData.append('anio', anio)
	formData.append('semest', semest)
	console.log(formData);

	Swal.fire({
        title: 'Cargando',
        html: 'Espere un momento, Recopilando datos de las carreras',
        allowOutsideClick: true,
        didOpen: function(){
            Swal.showLoading();
            fetch("{{ route('administrativo.buscaCarreras')}}",{
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                    body: formData
                }).then(respuesta =>{
                    return respuesta.text();
                }).then(resultado =>{
				let dato = JSON.parse(resultado)
				test.update2Test(dato[0].content)
				Swal.close();
            }).catch(error =>{
                console.log(error);
				Swal.close()
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'No pudimos obtener las carreras',
				})
            })
        }
    })

	}
	//end function to get carreras by dep

	

	// function to get carreras by dep
	function verificaInscritos(cicloInsc, semestreIns) {

	let ciclo = document.getElementById("cicloInsc").value;
	console.log(ciclo);
	let semestre = document.getElementById("semestreIns").value;
	console.log(semestre);

	let formData = new FormData();
	formData.append('ciclo', ciclo)
	formData.append('semestre', semestre)
	console.log(formData);

	if(semestre==3){semestreTipo = 'todos los semestres'}else{semestreTipo = 'el semestre '+semestre};

	Swal.fire({
        title: 'Cargando',
        html: 'Espere un momento, Recopilando datos de estudiantes inscritos en el año '+ ciclo+', para '+semestreTipo,
        allowOutsideClick: true,
        didOpen: function(){
            Swal.showLoading();
            fetch("{{ route('administrativo.buscaInscritosCicloSemestre')}}",{
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                    body: formData
                }).then(respuesta =>{
                    return respuesta.text();
                }).then(resultado =>{
				map.removeLayer(geojson)
                inscritos.update2Inscritos(resultado)
				var currentZoom = map.getZoom();
				if(currentZoom >= 13){
				console.log('entro por zoom '+ currentZoom);
				geojson.setStyle(style2);
				}
				Swal.close();
            }).catch(error =>{
                console.log(error);
            })
        }
    })


	}

	function salir( ) {
		document.getElementById('tablaCarreras').innerHTML = "";
	}
	//end function to get carreras by dep

	(function (factory, window) {
    if (typeof define === "function" && define.amd) {
        define(["leaflet"], factory);
    } else if (typeof exports === "object") {
        module.exports = factory(require("leaflet"));
    }

    if (typeof window !== "undefined" && window.L) {
        window.L.Control.ResetView = factory(L);
    }
}(function (L) {
    ResetView = L.Control.extend({
        options: {
            position: "topleft",
            title: "Reset view",
            latlng: null,
            zoom: null,
        },

        onAdd: function(map) {
            this._map = map;

            this._container = L.DomUtil.create("div", "leaflet-control-resetview leaflet-bar leaflet-control");
            this._link = L.DomUtil.create("a", "leaflet-bar-part leaflet-bar-part-single", this._container);
            this._link.title = this.options.title;
            this._link.href = "#";
            this._link.setAttribute("role", "button");
            this._icon = L.DomUtil.create("span", "leaflet-control-resetview-icon", this._link);

            L.DomEvent.on(this._link, "click", this._resetView, this);

            return this._container;
        },

        onRemove: function(map) {
            L.DomEvent.off(this._link, "click", this._resetView, this);
        },

        _resetView: function(e) {
            this._map.setView(this.options.latlng, this.options.zoom);
        },
    });

    L.control.resetView = function(options) {
        return new ResetView(options);
    };

    return ResetView;
}, window));

	L.control.resetView({
        position: "topleft",
        title: "Reset view",
        latlng: L.latLng([15.830797, -90.269165]),
        zoom: tamanio,
    }).addTo(map);

</script>
</body>
</html>
