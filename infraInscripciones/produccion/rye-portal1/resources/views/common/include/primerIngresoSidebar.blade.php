<li class="submenu">
	<a href="{{ url('aspirante/inscripcion') }}"><i class="fa fa-fw fa-edit"></i><span> PreInscripción </span> </a>
</li>

@isset($inscripcionActiva)
    @if ($inscripcionActiva)
        <li class="submenu">
            <a href="{{url('aspirante/inscripcion/automatica')}}"><i class="fa fa-fw fa-address-card"></i><span> Inscripci&oacute;n </span> </a>
        </li> 
    @endif
@endisset