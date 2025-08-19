<li class="submenu">
	<a href="{{ url('estudiante/reinscripcion') }}"><i class="fa fa-fw fa-edit"></i><span> Inscripción</span> </a>
</li>
<li>
	<a href="{{ url('estudiante/constancias') }}"><i class="fa fa-fw fa-list"></i><span> Constancia de Inscripción</span></a>
</li>
<li>
	<a href="{{ url('estudiante/PerfilgeneraCarnet') }}"><i class="fa fa-fw fa-id-badge"></i><span> Solicita Carné</span></a>
</li>
<li>
	<a href="{{ url('estudiante/CertificacionInscripcion') }}"><i class="fa fa-fw fa-edit"></i><span> Certificación de Inscripción</span></a>
</li>
@if( Carbon\Carbon::now()->toDateString() >= '2024-12-09')
<li>
	<a href="{{ route('estudiante.archivos.CarrerasEstudiante') }}"><i class="fa fa-certificate"></i><span>Constancia Expediente</span></a>
</li>
@endif
<!--<li>
	<a href="{{ url('estudiante/CarrerasCertificacionTitulos') }}"><i class="fa fa-fw fa-graduation-cap"></i><span> Certificación Titulos</span></a>
</li>-->
@if($cert_pendiente)
<li>
	<a href="{{route('cert_nacimiento')}}"><i class="fa fa-fw fa-id-card"></i><span> Cargar Certificado</span></a>
</li>
@endif
<!--<li class="submenu">
	<a href="{{ url('primerIngreso/consultarPCB') }}"><i class="fa fa-fw fa-file-text-o"></i><span> Consultar PCB </span> </a>
</li>-->
