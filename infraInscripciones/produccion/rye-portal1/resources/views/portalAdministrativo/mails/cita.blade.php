Estimado(a) <i>{{ $aspirante->nombre }}</i>,
<p>Se le informa que se le ha asignado una cita para resolver su inconveniente. </p>

<p>Favor de generar su boleta y realizar el pago, y traer todos sus documentos que se le fueron solicitados.</p>
<p>Si reprogramo su cita y no a realizado su pago por favor generar su boleta y realizar el pago.</p>
<p>Su cita fue programada para:<b> {{ Carbon\Carbon::parse($aspirante->cita)->format('d/m/Y H:i')}}</b></p>

<br/>
<i>Departamento de Registro y Estadística, USAC</i>
