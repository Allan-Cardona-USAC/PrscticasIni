<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
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
    @yield('css')

</head>

<body class="adminbody">

<div id="main">

    {{-- Navbar  --}}
    @include('common.include.navbar')

    {{-- Sidebar  --}}
    @include('common.include.sidebar')


    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">{{ isset($title) ? $title : '' }}</h1>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">&nbsp;</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                @include('common.include.flashMessage')

                <div class="row">
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                </div>



            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->

    <footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Registro y Estadística</a>
		</span>
        <span class="float-right">
	{{--	Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>--}}
		</span>
    </footer>

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

<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->

@yield('javascript')

</body>
</html>
