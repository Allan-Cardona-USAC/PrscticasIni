<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="#" class="logo">
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
                    <a href="#" class="dropdown-item notify-item">
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
