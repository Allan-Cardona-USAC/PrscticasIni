@extends('layouts.master')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h2>{{$tituloError}}</h2>
        <strong>{{$nombreEstudiante}}</strong> no puedes continuar.
        <ul>
        @if(!$extranjero)
            @if($solventemedicina == 0)
                <li>
                    {{$mensajeMedicina}}
                </li>
                <li>
                Por favor, comuníquese con el área financiera de la Escuela de Estudios de Postgrado de la Facultad de Ciencias Médicas.
                </li>
            @endif
            <br/>
            @if($bloqueoBiblioteca)
                <li>
                Posee una insolvencia en la biblioteca. Le recomendamos dirigirse a
                la Biblioteca Central para solventar la situación. Si no cuenta con
                su CUI, preséntese en las ventanillas de Registro y Estadística para actualización de datos.
                </li>
            @endif
            @if($bloqueoUnidadSalud[0])
                <li>
                {{ $bloqueoUnidadSalud[1] }}
                </li>
            @endif
            @if($bloqueoEventoElectoral)
                <li>En su unidad académica se están llevando a cabo elecciones, por lo que el proceso de inscripción 
                    no está disponible en este momento.</li>
            @endif
            @if($bloqueoBecado)
                <li>
                    <h5>Becados Registro y Estadística</h5>
                    <strong>Por favor ponerse en contacto con Dirección General Financiera, Sección de Cobros<br/>
                    Teléfonos y correos electrónicos de los encargados de Becas Préstamo: <br/></strong>
                    <ul>
                        <li><strong>Tel.: 5698-6330, Correo: abregofrancisco@usac.edu.gt</strong></li>
                        <li><strong>Tel.: 3347-1032, Correo: gerardoa@usac.edu.gt</strong></li>
                    </ul>
                    <a href='https://secciondecobros.usac.edu.gt'>Página web</a>
                </li>
            @endif
            @if($primerIngreso)
                <li>Si ya ha realizado su pago, por favor espere hasta 48 horas para que su inscripción sea registrada.</li>
                <li>Si se venció su boleta ingrese nuevamente a: <a href="https://portalregistro.usac.edu.gt/login#FormAspirante/">Incripción en línea</a></li>
            @endif
        @else
            <li>
                Favor ponerse en contacto con el Departamento de Caja de la Universidad de San Carlos de Guatemala
            </li>
            <li>
            Si ya ha realizado su pago, por favor espere hasta 48 horas para que su inscripción sea registrada.
            </li>
        @endif

        
        </ul>
    </div>
@endsection
