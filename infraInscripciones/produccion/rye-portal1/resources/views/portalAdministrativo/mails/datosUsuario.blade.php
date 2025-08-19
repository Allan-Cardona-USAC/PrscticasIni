Estimado <i>{{ $solicitante->nombre }}</i>,
<p>Su solicitud de usuario fue Aceptada. </p>
<p>Al ingresar a su cuenta, cambie su contraseña. </p>
<p>Los datos para ingresar a su cuenta son los siguientes: </p>
<ul>

    <li type="disc"><b>Dependencia:</b> {{$solicitante->dependencia}}</li>

    <li type="disc"><b>Usuario:</b>{{$solicitante->usuario}} </li>

    <li type="disc"><b>Contraseña:</b> {{$solicitante->pwd}} </li>

</ul>

<br/>
<i>Departamento de Registro y Estadística, USAC</i>