<!doctype html>
<html lang="es">

<head>
    <title>Boleta - Departamento de Registro y Estadística</title>
    <meta charset="utf-8">
    <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">
    <meta name="keywords" content="USAC,RyE,Primer Ingreso">
    <meta name="author" content="USAC">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="table-responsive">
    <h4>Constancias de Inscipción</h4>
    <table class="table table-borderless">
        <tbody>
        {{-- Datos del estdiante --}}
        <tr>
            <td>Ciclo:</td>
            <td><strong>{{ $ciclo->ciclo_activo }}</strong></td>
        </tr>
        <tr>
            <td>Registro Académico:</td>
            <td>{{ Auth::guard('estudiante')->user()->carnet }}</td>
        </tr>
        <tr>
            <td>C.U.I:</td>
            <td>{{ Auth::guard('estudiante')->user()->cui }}</td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td>{{ $nombreEstudiante }}</td>
        </tr>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Unidad académica:</td>
                <td><strong>{{ $carrera->idFacultad }}</strong> {{ $carrera->facultad }}</td>
                <td>Fecha de inscripción:</td>
                <td>{{ $carrera->fechaInscripcion }}</td>
            </tr>
            <tr>
                <td>Extensión:</td>
                <td><strong>{{ $carrera->idExtension }}</strong> {{ $carrera->extension }}</td>
            </tr>
            <tr>
                <td>Carrera:</td>
                <td><strong>{{ $carrera->idCarrera }}</strong> {{ $carrera->carrera }}</td>
            </tr>
            <tr>
                <td>No. Boleta</td>
                <td>{{ $carrera->boleta }}</td>
                <td>Fecha de pago:</td>
                <td>{{ $carrera->fechaBoleta }}</td>
            </tr>
            <tr>
                <td>Seguridad:</td>
                <td><strong>{{ substr($carrera->clave, 0,8) . '-' . substr($carrera->clave, 8,8) . '-' . substr($carrera->clave,16,8) . '-' . substr($carrera->clave,24,8) }}</strong></td>
            </tr>
        </tbody>
    </table>
</div>
</body>

</html>