<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pike Admin - Free Bootstrap 4 Admin Template</title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

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

    <!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->

    @yield('css')

</head>

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->
    <div class="headerbar">

        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="index.html" class="logo">
                <img alt="logo" src="{{ asset('pike/images/logo.png') }}"/>
                <span>RyE</span>
            </a>
        </div>

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">

                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-fw fa-question-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><small>Información Generica</small></h5>
                        </div>

                        <!-- item-->
                        <a target="_blank" href="#" class="dropdown-item notify-item">
                            <p class="notify-details ml-0">
                                <b>Puras casacas</b>
                                <span>Contact Us</span>
                            </p>
                        </a>

                        <!-- item-->
                        <a target="_blank" href="#" class="dropdown-item notify-item">
                            <p class="notify-details ml-0">
                                <b>Más casacas</b>
                                <span>Pike Admin</span>
                            </p>
                        </a>

                        <!-- All-->
                        <a title="Clcik to visit Pike Admin Website" target="_blank" href="#" class="dropdown-item notify-item notify-all">
                            <i class="fa fa-link"></i> No le den click
                        </a>

                    </div>
                </li>

                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('pike/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>Hello, admin</small> </h5>
                        </div>

                        <!-- item-->
                        <a href="pro-profile.html" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </a>

                        <!-- item-->
                        <a target="_blank" href="https://www.pikeadmin.com" class="dropdown-item notify-item">
                            <i class="fa fa-external-link"></i> <span>Pike Admin</span>
                        </a>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
            </ul>

        </nav>

    </div>
    <!-- End Navigation -->


    <!-- Left Sidebar -->
    <div class="left main-sidebar">

        <div class="sidebar-inner leftscroll">

            <div id="sidebar-menu">

                <ul>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-user"></i><span> Perfil </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class=""></i><span> Acciones </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-edit text-yellow"></i><span> Inscripción </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-calendar"></i><span> Calendario de inscripción </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-check-square-o"></i><span> Requisitos </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-money"></i><span> Valor de matricula </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-file-text-o"></i><span> Consulta de PBC </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class=""></i><span> Otros Enlaces </span></a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-university"></i> <span> Reingreso </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Tramites Administrativos</a></li>
                            <li><a href="#">Pensum Cerrado</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-graduation-cap"></i> <span> Postgrado </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Requisitos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-user-plus"></i> <span> Incorporaciones </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Requisitos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-balance-scale"></i> <span> Equivalencias </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Requisitos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-file-archive-o"></i> <span> Títulos </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Requisitos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-bar-chart"></i> <span> Estadísticas </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Requisitos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-files-o"></i> <span> Formularios </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Calendario de inscripcion</a></li>
                            <li><a href="#">Requisitos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="label radius-circle bg-primary float-right">9</span><i class="fa fa-fw fa-indent"></i><span> Menu Levels </span></a>
                        <ul>
                            <li>
                                <a href="#"><span>Second Level</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><span>Third Level</span> <span class="menu-arrow"></span> </a>
                                <ul style="">
                                    <li><a href="#"><span>Third Level Item</span></a></li>
                                    <li><a href="#"><span>Third Level Item</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- End Sidebar -->


    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Tìtulo de la página</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Inscripción</li>
                                <li class="breadcrumb-item active">Fase 2</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


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
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
        <span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
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
