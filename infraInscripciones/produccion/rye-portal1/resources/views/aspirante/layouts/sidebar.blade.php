<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::guard('aspirante')->user()->nombre1 . ' ' . Auth::guard('aspirante')->user()->apellido1 }}</p>
        </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ACCIONES</li>

           <li><a href="#"><i class="fa fa-calendar"></i> <span>Calendario de inscripción</span></a></li>
            <li><a href="#"><i class="fa fa-check-square-o"></i> <span>Requisitos</span></a></li>
            <li><a href="#"><i class="fa fa-money"></i> <span>Valor de la matrícula</span></a></li> --}}
            <li><a href="#"><i class="fa fa-file-text-o"></i> <span>Consulta de PCB</span></a></li>
            <li><a href="#"><i class="fa fa-user"></i> <span>Perfil</span></a></li>

        <li class="header">OTROS ENLACES</li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-university"></i> <span>Reingreso</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Trámites administrativos</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pénsum cerrado</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Postgrado</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Requisitos</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-user-plus"></i> <span>Incorporaciones</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Trámites administrativos</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pénsum cerrado</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-balance-scale"></i> <span>Equivalencias</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Trámites administrativos</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pénsum cerrado</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-certificate"></i> <span>Títulos</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Trámites administrativos</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pénsum cerrado</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Estadísticas</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Trámites administrativos</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pénsum cerrado</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i> <span>Formularios</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Calendario de inscripción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Trámites administrativos</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pénsum cerrado</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>