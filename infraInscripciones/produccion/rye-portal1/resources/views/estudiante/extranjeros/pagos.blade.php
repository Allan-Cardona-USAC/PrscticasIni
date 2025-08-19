@extends('layouts.master')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-file-text-o"></i> Pago de Matricula</h3>
        </div>

        {{-- card body --}}
        <div class="card-body">
            <table class="table table-borderless table-hover">
                <tbody>
                {{-- Datos del estdiante --}}
                <tr>
                    <th>Matricula del año</th>
                    <td>{{ date('Y', strtotime($matricula->ciclo)) }}</td>
                </tr>
                <tr>
                    <th>Unidad Academica</th>
                    <td>{{ $matricula->unidadAcademica }} - {{ $matricula->nombreUnidadAcademica }}</td>
                </tr>
                <tr>
                    <th>Extensión</th>
                    <td>{{ $matricula->extension }} - {{ $matricula->nombreExtension }}</td>
                </tr>
                <tr>
                    <th>Carrera</th>
                    <td>{{ $matricula->carrera }} - {{ $matricula->nombreCarrera }}</td>
                </tr>
                <tr>
                    <th>Valor total de la matricula</th>
                    <td>Q{{ $valores->pregradoTotal }}</td>
                </tr>
                <tr>
                    <th>Monto mínimo a abonar</th>
                    <td>Q{{ $valores->pregrado }}</td>
                </tr>
                <tr>
                    <th>Cantidad de pagos por realizar</th>
                    <td>{{ $matricula->noPagosRestantes }}</td>
                </tr>

                <tr>
                    <th>Monto Restante</th>
                    <td>Q{{ $matricula->deuda }}</td>
                </tr>
                </tbody>
            </table>

            {{-- Form que sube el certificado de nacimiento --}}
            <form method="post" enctype="multipart/form-data" action="{{ route('estudiante.extranjero.generarBoleta') }}">
                {{ csrf_field() }}
                <div class="input-group col-md-6">
                    <input type="hidden" id="idMatricula" name="idMatricula" value="{{ $matricula->id }}">
                    <input type="number" id="noPagos" name="noPagos" class="form-control" value="1" min="1" max="{{ $matricula->noPagosRestantes }}">
                    <input type="submit" class="btn btn-sm btn-info" value="Generar">
                </div>
            </form>
        </div>
        {{-- end body --}}
    </div>
@endsection

