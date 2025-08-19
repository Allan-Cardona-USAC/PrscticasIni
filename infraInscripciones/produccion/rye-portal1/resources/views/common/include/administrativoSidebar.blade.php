@if(!empty(Auth::guard('administrativo')->user()->getPermisosUsuario()))
@if(in_array(1,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
<li class="submenu">
    <a href="#">
        <i class="fa fa-fw fa-users"></i>
        <span>Usuarios</span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        <li><a href="{{ url('/solicitud-usuario') }}">Solicitudes</a></li>
        <li><a href="{{route('administrativo.auditoria.index') }}">Auditoria</a></li>
        <li><a href="{{route('administrativo.usuarios')}}">Administración</a></li>
    </ul>
</li>
@endif
<!--@if(in_array(15,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(16,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(17,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(18,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(19,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(20,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
<li class="submenu">
    <a href="#">
        <i class="fa fa-fw fa-pencil-square-o"></i>
        <span class="text-center">Administrar UA</span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        @if(in_array(15,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(16,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li><a href="{{ url('/facultad') }}">Unidades Académicas</a></li>
        @endif
        @if(in_array(17,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(18,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li><a href="{{ url('/extension') }}">Extensiones</a></li>
        @endif
        @if(in_array(19,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(20,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li><a href="{{ url('/carrera') }}">Carreras</a></li>
        @endif
        <li><a href="{{ url('/carreraSolicitud') }}">Solicitud Carrera</a></li>

    </ul>
</li>
@endif-->
<li class="submenu">
    <a href="#">
        <i class="fa fa-fw fa-user-o"></i>
        <span> Aspirantes</span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        @if(in_array(2,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
{{--
        <li><a href="{{ route('administrativo.solicitudInscripcion')}}">Solicitud Inscripcion</a></li>
        @endif
        @if(in_array(3,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li><a href="{{ route('administrativo.Citas','sinCita') }}">Citas</a></li>
        @endif
        <li>
            <a href="{{ route('administrativo.resumenpreinscritos','PorFecha') }}"><!--Resumen Preinscritos--></a>
        </li>
        @if(in_array(5,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li> --}}
            <a href="{{ url('/administrativo/aspirantes') }}">Información Aspirantes</a>
        </li>
        @endif
        <li class="submenu">
        {{--
            <a href="#">
                <span>Exoneraciones</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('administrativo.listadoExonerados') }}">Listado Exonerados</a>
                </li>
                @if(in_array(23,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                    <li>
                        <a href="{{ route('administrativo.exoneracion') }}">Exonerar</a>
                    </li>
                @endif
            </ul>--}}
        </li>
        @if(in_array(41,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li class="submenu">
            <a href="#">
                <span>Pruebas Específicas</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('administrativo.PruebasEspecificas') }}">Carga</a>
                </li>
                <li>
                    <a href="{{ route('administrativo.aprobarPruebasEspecificas') }}">Aprobación</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</li>

@if(in_array(44,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
<!---Estadistica-------------->
<li class="submenu">
    <a href="#">
    <i class="fa fa-pie-chart" aria-hidden="true"></i>
        <span> Estadística</span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
@if(in_array(44,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                     <li class="submenu">
                     <a href="{{route('administrativo.inscritos.reportes.index')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Inscritos </span> </a>
                    </li>
@endif
@if(in_array(44,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                     <li class="submenu">
                        <a href="{{route('administrativo.graduados.reportes.index')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span> Graduados </span> </a>
                    </li>
@endif
@if(in_array(44,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                     <li class="submenu">
                     <a href="{{route('administrativo.mcarreras.reportes.index')}}"><i class="fa fa-th-list" aria-hidden="true"></i> <span> Maestro Carreras </span> </a>
                    </li>
@endif
@if(in_array(44,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                     <li class="submenu">
                     <a href="{{route('administrativo.discapacidad.reportes.index')}}"><i class="fa fa-wheelchair-alt" aria-hidden="true"></i><span> Discapacidades </span> </a>            
                    </li>
@endif
</ul>
</li>
@endif 



<!-- OPCION DE IMPRIMIR CARNET -->
@if(in_array(42,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-user-o"></i>
            <span> Impresión de Carné</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">                
                <li>
                    <a href="{{ route('administrativo.BusquedaGeneral') }}"> Carné Estudiantil </a>
                </li>               
                {{-- <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('administrativo.BusquedaGeneral') }}"> Búsqueda General </a>
                    </li>
                    <li>
                        <a href="{{ route('administrativo.PendientePagoCarnetEstudiante') }}"> Pendientes de Pago </a>
                    </li>
                    <li>
                        <a href="{{ route('administrativo.ImprimirCarnetEstudiante') }}"> Imprimir Carné </a>
                    </li> 
                    <li> 
                        <a href="{{ route('administrativo.CarnetsGenerados') }}"> Carnés Generados </a>
                    </li>
                </ul> --}}
            </li>
        </ul>
    </li>
@endif

<!-- OPCION DE GENERAR SOLICITUD -->
@if(in_array(47,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            <span> Certificación de titulo</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
            <a href="{{ route('administrativo.buscarTitulo') }}"> Generar Certificación </a>
            </li>
        </ul>
    </li>
@endif

<!-- OPCION DE CARGAS MASIVAS (MINEDUC POR EL MOMENTO) -->
@if(in_array(43,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-database"></i>
            <span> Carga Masiva</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
                <a href="#">
                    <span>Establecimientos</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('administrativo.PreviewCargaEstablecimientos') }}"> Carga de Establecimientos MINEDUC </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
@endif

<!-- OPCION DE POSTDOCTORADO -->
@if(in_array(48,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-user-o"></i>
            <span> PostGrado</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li>
                <a href="{{ route('administrativo.crearPostdoctorado') }}"> Nueva Carrera </a>
            </li>
            <li>
                <a href="{{ route('administrativo.inscribirPostdoctorado') }}"> Inscripción</a>
            </li>
        </ul>
    </li>
@endif

<!-- OPCION DE IMPRIMIR CARNET -->
<li class="submenu">
    {{--<a href="#">
        <i class="fa fa-fw fa-graduation-cap"></i>
        <span class="text-center">Inscritos</span>
        <span class="menu-arrow"></span>
    </a>--}}
  {{--  <ul class="list-unstyled">
        <li>
            <a href="{{ route('administrativo.resumeninscritos') }}">Resumen Inscritos</a>
        </li>
        @if(in_array(29,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
        <li>
            <a href="{{ url('/administrativo/inscritos') }}">Información Inscritos</a>
        </li>
        @endif
    </ul> --}}
</li>
@if(in_array(24,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())||in_array(25,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
<li class="submenu">
    <a href="#">
        <i class="fa fa-fw fa-money"></i>
        <span class="text-center">Becados</span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        <li>
            <a href="{{ route('administrativo.estadisticasBecados','genero') }}">Estadísticas Becados</a>
        </li>
            <li>
                <a href="{{ route('administrativo.infobecado') }}">Información Becado</a>
            </li>
    </ul>
</li>
@endif
@if(in_array(46,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span> Certificacion Inscripcion</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
                <a href="{{route('administrativo.inscripciones.indexReimpresion')}}">
                    <span>Reimpresión Certificación</span>
                </a>
            </li>
            <li class="submenu">
                <a href="{{route('administrativo.inscripciones.index')}}">
                    <span>Solicitudes Certificación</span>
                </a>
            </li>
            <li class="submenu">
                <a href="{{route('administrativo.inscripciones.indexGenerar')}}">
                    <span>Generar Certificación</span>
                </a>
            </li>
        </ul>
    </li>
@endif
@if(in_array(48,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span> Certificacion Postgrados</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
                <a href="{{route('administrativo.inscripciones.certificacionPostgrado')}}">
                    <span>Certificacion Inscripciones</span>
                </a>
            </li>
        </ul>
    </li>
@endif
@if(in_array(49,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-graduation-cap"></i>
            <span> Exonerados</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
                <a href="{{route('administrativo.exonerados.index')}}">
                    <span>Exoneración</span>
                </a>
            </li>
        </ul>
    </li>
@endif
@if(in_array(21,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-folder-open"></i>
            <span>Archivos</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
                <a href="{{route('administrativo.buscaCarnet')}}">
                    <span>Generar Expediente</span>
                </a>
            </li>
            <li class="submenu">
                <a href="{{route('administrativo.archivos.buscaConstanciaCarnet')}}">
                    <span>Constancia de Expediente Estudiantil</span>
                </a>
            </li>
        </ul>
    </li>
    </li>
@endif
@if(in_array(50,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
    <li class="submenu">
        <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span>Boletas</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="list-unstyled">
            <li class="submenu">
                <a href="{{route('administrativo.BoletaController.buscaEstudianteBoleta')}}">
                    <span>Generar Boleta</span>
                </a>
            </li>
        </ul>
    </li>
@endif
@endif
