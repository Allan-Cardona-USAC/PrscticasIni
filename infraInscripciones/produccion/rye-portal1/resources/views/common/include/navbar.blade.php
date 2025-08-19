<div class="headerbar">

    {{-- Logo --}}
    <div class="headerbar-left">
        <a href="#" class="logo">
            <img alt="logo" src="{{ asset('assets2/img/logo.svg') }}"/>
            <span></span>
        </a>
    </div>

    <nav class="navbar-custom">

        {{-- Cosas a la derecha de la barra --}}
        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notif">
                @if(Auth::guard('aspirante')->check())
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <small>{{ Auth::guard('aspirante')->user()->nombre1 . ' ' . Auth::guard('aspirante')->user()->apellido1 }}</small>
                        <img src="{{ asset('pike/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded"> {{-- todo conseguir imagen del aspirante --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        {{--
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>{{ Auth::guard('aspirante')->user()->nombre1 . ' ' . Auth::guard('aspirante')->user()->apellido1 }}</small> </h5>
                        </div>
                        --}}
                        <!-- item-->
                        <a class="dropdown-item notify-item" href="{{ route('aspirante.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('aspirante.logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                @elseif(Auth::guard('estudiante')->check())
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <small>{{ Auth::guard('estudiante')->user()->nombre1 . ' ' . Auth::guard('estudiante')->user()->primer_apellido }}</small>
                        {{--
                        <img src="{{ asset('pike/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded"> 
                        --}}
                        {{-- todo conseguir imagen del estudiante --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        {{--
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>{{ Auth::guard('estudiante')->user()->getNombreCompleto() }}</small> </h5>
                        </div>
                        --}}
                        <!-- item-->
                        <a href="{{ route('estudiante.dashboard') }}" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>Perfil</span>
                        </a>

                        <!-- item-->
                        <a class="dropdown-item notify-item" href="{{ route('estudiante.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('estudiante.logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                @elseif(Auth::guard('administrativo')->check())
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <small>{{ Auth::guard('administrativo')->user()->nom_corto}}</small>
                        <img src="{{ asset('pike/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded"> {{-- todo conseguir imagen del empleado --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <!-- item-->
                        <a href="{{ route('administrativo.dashboard') }}" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>Perfil</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('administrativo.logout') }}" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </a>
                    </div>
                @else
                    <h1></h1>
                @endif
            </li>
        </ul>

        {{-- Hamburgesa de la izquerda del menu --}}
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
