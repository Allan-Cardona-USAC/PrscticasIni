<!doctype html>
<html lang="es">
<title>Boleta - Departamento de Registro y Estadística</title>
    <meta charset="utf-8">
    <meta name="description" content="Portal Oficial del Departamento de Registro y Estadística">
    <meta name="keywords" content="USAC,RyE,Primer Ingreso">
    <meta name="author" content="USAC">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Sección para agregar css desde otro archivo --}}
    {{--<link type="text/css" rel="stylesheet" media="screen,projection "  href="{{ URL::asset('css/bootstrap.min.css.css') }}" />--}}
    <link type="text/css" rel="stylesheet" media="screen,projection,print"  href="{{ URL::asset('css/estilo-boleta.css') }}" />
<body onload="window.print()">

<table>
    <tbody>
    <tr>
        <td class="titulo-seccion">Fecha gen.:</td>
        <td>{{ date_format($fechaGeneracion, 'd/m/Y') }}</td>
        <td class="titulo-seccion">Fecha impresión:</td>
        <td>{{ date("d/m/Y h:i") }}</td>
        <td class="titulo banco" colspan="2">Para uso exclusivo del banco</td>
    </tr>
    <tr>
        <td colspan="4" class="titulo">Orden de pago</td>
        <td class="banco titulo-seccion">No.</td>
        <td>{{ $idOrdenPago }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">No.</td>
        <td colspan="3">{{ $idOrdenPago }}</td>
        <td class="banco titulo-seccion">{{ $tipoRegistro }}</td>
        <td>{{ $registro }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Registro académico</td>
        <td colspan="3">{{ $registro }}</td>
        <td class="banco titulo-seccion">Total a pagar Q.</td>
        <td>{{ $monto }}.00</td>
    </tr>
    <tr>
        <td class="titulo-seccion">CUI/Pasaporte</td>
        <td colspan="3">{{ $CUI }}</td>
        <td class="banco titulo-seccion">Código de unidad</td>
        <td>{{ $idUnidadAcademica }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Nombre</td>
        <td colspan="3">{{ $nombreCompleto }}</td>
        <td class="banco titulo-seccion">Código de extensión</td>
        <td>{{ $idExtension }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Facultad</td>
        <td colspan="3">{{ $unidadAcademica }}</td>
        <td class="banco titulo-seccion">Código de carrera</td>
        <td>{{ $idCarrera }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Extensión</td>
        <td colspan="3">{{ $extension }}</td>
        <td class="banco titulo-seccion">Fecha emisión</td>
        <td>{{ date("Ymd", strtotime($fechaGeneracion)) }}</td>
    </tr>
    <tr>
        <td class="titulo-seccion">Carrera</td>
        <td colspan="3">{{ $carrera }}</td>
        <td class="banco titulo-seccion">Rubro de pago</td>
        <td>{{ $rubro }}</td>
    </tr>
    <tr>
        <td colspan="4" class="titulo">Detalle de pago</td>
        <td class="banco titulo-seccion">Llave</td>
        <td>{{ $checksum }}</td>
    </tr>
    <tr>
        <td colspan="3" class="detalle">Pago de mátricula estudiantil</td>
        <td class="valor">{{ $monto }}.00</td>
        <td class="banco informacion" colspan="2" rowspan="3">Puede efectuar su pago en cualquier agencia o<br>banca virtual de BANRURAL, GyT Continental o Bantrab.</td>
    </tr>
    <tr>
        <td colspan="3" class="detalle" style="font-weight: bold;">Total a pagar Q.</td>
        <td class="valor" style="font-weight: bold;">{{ $monto }}.00</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center"><strong>Información importante:</strong><br>**El documento es válido únicamente hasta el día {{ $fechaVencimiento }}**</td>
    </tr>
    </tbody>
</table>

{{--<button onclick="imprimir()" id="boton">Print this page</button>

<script>
    function imprimir() {
        document.getElementById('boton').style.visibility = 'hidden';
        window.print();
        document.getElementById('boton').style.visibility = 'visible';
    }
</script>--}}

<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
