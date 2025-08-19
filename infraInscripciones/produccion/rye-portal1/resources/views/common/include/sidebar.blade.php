<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>

{{--
                <li class="submenu acento">
                    <a href="#"><i class=""></i><span> Acciones </span></a>
                </li>
--}}
                @if(Auth::guard('aspirante')->check())
                    <li class="submenu">
                        <a href="{{route('aspirante.perfil')}}"><i class="fa fa-fw fa-user"></i><span> Perfil </span> </a>
                    </li>
                   @include('common.include.primerIngresoSidebar')
                @elseif(Auth::guard('estudiante')->check())
                    <li class="submenu">
                        <a href="{{route('estudiante.dashboard')}}"><i class="fa fa-fw fa-user"></i><span> Perfil </span> </a>
                    </li>
                        @include('common.include.reingresoSidebar')
                @elseif(Auth::guard('administrativo')->check())
                    <li class="submenu">
                        <a href="{{route('administrativo.dashboard')}}"><i class="fa fa-fw fa-user"></i><span> Perfil </span> </a>
                    </li>
                    @include('common.include.administrativoSidebar')
                @else

                @endif

                <hr>
{{--
                <li class="submenu acento">
                    <a href="#"><i class=""></i><span> Otros Enlaces </span></a>
                </li>
--}}            @if(!Auth::guard('administrativo')->check())
                    @include('common.include.categoriasSidebar')
                @endif
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
