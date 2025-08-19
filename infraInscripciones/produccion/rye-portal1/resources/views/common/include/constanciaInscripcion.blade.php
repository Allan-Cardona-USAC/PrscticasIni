<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Constancia de inscripción</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/estiloConstanciaInscripcion.css') }}" rel="stylesheet" type="text/css">
</head>
<table>
    <tbody>
    <tr>
        <td colspan="4" class="titulo">Constancia de Inscripción</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Ciclo</td>
        <td colspan="3">{{ $ciclo }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Registro académico</td>
        <td colspan="3">{{ $carnet }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">CUI/Pasaporte</td>
        <td colspan="3">{{ $cui }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Nombre</td>
        <td colspan="3">{{ $nombreCompleto }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Unidad académica</td>
        <td colspan="3">{{ $idFacultad }} - {{ $facultad }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Extensión</td>
        <td colspan="3">{{ $idExtension }} - {{ $extension }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Carrera</td>
        <td colspan="3">{{ $idCarrera }} - {{ $carrera }}</td>
    </tr>
    <tr>
        <td colspan="4" >&nbsp;</td>
    </tr>
    <tr>
        <td class="titulo-seccion">No. boleta</td>
        <td colspan="3">{{ $noBoleta }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Fecha de inscripción</td>
        <td colspan="3">{{ $fechaInscripcion }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Fecha de pago</td>
        <td colspan="3">{{ $fechaPago }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Seguridad</td>
        <td colspan="3">{{ $clave }}</td>
    </tr>
    <tr>
        <td colspan="4" >&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center"><strong>Universidad de San Carlos de Guatemala</strong><br>**Fecha de impresión: {{ date('d/m/Y') }}**</td>
    </tr>
    </tbody>
</table>

<button onclick="imprimir()" id="boton">Print this page</button>

<script>
    function imprimir() {
        document.getElementById('boton').style.visibility = 'hidden';
        window.print();
        document.getElementById('boton').style.visibility = 'visible';
    }
</script>

<body>
</body>
</html>
