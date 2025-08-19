<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>y<b>E</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            Registro y Estadística
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">
                {{ Auth::guard('aspirante')->user()->nombre1 . ' ' . Auth::guard('aspirante')->user()->apellido1 }}
                </span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                    {{ Auth::guard('aspirante')->user()->nombre1 . ' ' . Auth::guard('aspirante')->user()->apellido1 }}
                    <small>
                    {{ Auth::guard('aspirante')->user()->nov }}
                    </small>
                </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('aspirante.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('aspirante.logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </nav>
</header>