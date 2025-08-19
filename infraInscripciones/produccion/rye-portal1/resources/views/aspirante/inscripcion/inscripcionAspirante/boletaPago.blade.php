<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ $css }}" rel="stylesheet" type="text/css">
</head>

<body>
    <table width="100%" cellspacing="2" cellpadding="2" style="margin:0 auto;background-color: white">
        <tr>
            <td>Fecha de emisión:</td>
            <td>{{ $fechaGeneracion->format('d/m/Y') }}</td>
            <td>Fecha de impresión:</td>
            <td>{{ date('d/m/Y') }}</td>
            <td colspan="2" style="text-align: center;"><b>Para uso exclusivo del banco</b></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center;"><b>Orden de Pago</b></td>
            <td>Orden de Pago No.</td>
            <td>{{ $idOrdenPago }}</td>
        </tr>
        <tr>
            <td> No.</td>
            <td colspan="3">{{ $idOrdenPago }}</td>
            <td>Carné</td>
            <td>{{ $carnet }}</td>
        </tr>
        <tr>
            <td>Carné</td>
            <td colspan="3">{{ $carnet }}</td>
            <td>Total a pagar Q.</td>
            <td>{{ $monto }}.00</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td colspan="3">{{ $nombre }}</td>
            <td>Unidad</td>
            <td>{{ $ua }}</td>
        </tr>
        <tr>
            <td>Unidad</td>
            <td colspan="3">{{ $facultad }}</td>
            <td>Extension</td>
            <td>{{ $ext }}</td>
        </tr>
        <tr>
            <td>Extension</td>
            <td colspan="3">{{ $extension }}</td>
            <td>Carrera</td>
            <td>{{ $idCarrera }}</td>
        </tr>
        <tr>
            <td>Carrera</td>
            <td colspan="3">{{ $carrera }}</td>
            <td>Fecha de Emisión</td>
            <td>{{ $fechaGeneracion->format('Ymd') }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"><b>Detalle de pago</b></td>
            <td>Rubro de pago</td>
            <td>{{ $rubroPago }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Matricula estudiantil anual {{ $cicloactivo }}</td>
            <td>Q{{ $monto }}.00</td>
            <td>Llave</td>
            <td>{{ $checksum }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><b>Total</b></td>
            <td>Q{{ $monto }}.00</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2"> Puede efectuar su pago en cualquier agencia</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2"> o banca virtual de BANRURAL (ATX-253), </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2">GyT Continental o BANTRAB. </td>
        </tr>
    </table>
    <b>**El documento es válido para su pago únicamente hasta el día {{ $fechaVencimiento }}.**</b>
</body>
<html>
