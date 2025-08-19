@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Estadísticas Becados</h2>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <div align="center" class="py-2">
                    <a href="{{ route('administrativo.estadisticasBecados','genero') }}" title="Ordenar por fecha"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-calendar" aria-hidden="true"></i> Por Genero</button></a>
                    <a href="{{ route('administrativo.estadisticasBecados','UA')}}" title="Ordenar por Unidad Académica"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Por Unidad Académica</button></a>
                </div>
                @php
                    $ua_actual = '';
                    $sub_total = 0;
                    $total_central = 0;
                @endphp
                @if($ordenamiento === 0)
                    <table class="table table-striped table-sm ">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Género</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Porcentaje (%)</th>
                        </tr>
                        <tr>
                            <th scope="col" >TOTAL BECADOS</th>
                            <th scope="col" >{{$becados->sum('total')}}</th>
                            <th scope="col" >{{($becados->sum('total')/$becados->sum('total'))*100}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($becados as $becado)
                        <tr>
                            @if($becado->sexo === 0)
                                <th scope="row">No asignado</th>
                            @elseif($becado->sexo === 1)
                                <th scope="row">Masculino</th>
                            @else
                                <th scope="row">Femenino</th>
                            @endif
                            <td>{{$becado->total}}</td>
                            <td>{{number_format(($becado->total/$becados->sum('total'))*100,2)}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Unidad Académica</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Porcentaje (%)</th>
                            </tr>
                            <tr style="background-color: grey; color: black;">
                                <th scope="col" >TOTAL BECADOS</th>
                                <th scope="col" >{{$becados->sum('total')}}</th>
                                <th scope="col" >{{($becados->sum('total')/$becados->sum('total'))*100}}</th>
                            </tr>
                            </thead>
                            @foreach($becados as $becado)
                                @if($becado->nomcorto != $ua_actual)
                                    @php
                                        $ua_actual = $becado->nomcorto;
                                        $sub_total = 0;
                                        foreach($becados as $becado2){
                                            if($becado2->nomcorto === $ua_actual){
                                                $sub_total = $sub_total + $becado2->total;
                                            }
                                        }
                                    @endphp
                                    <tbody>
                                    <tr class="clickable" style="background-color: #407EC9; color: white" data-toggle="collapse" data-target="#ua{{$becado->ua}}" aria-expanded="false" aria-controls="ua{{$becado->ua}}">
                                        <td><i class="fa fa-plus" aria-hidden="true" style="color: black"></i> <b>{{$becado->ua}} - {{$becado->nomcorto}}</b></td>
                                        <td><b>{{$sub_total}}</b></td>
                                        <td><b>{{number_format(($sub_total/$becados->sum('total'))*100,2)}}</b></td>
                                    </tr>
                                    </tbody>
                                    <tbody id="ua{{$becado->ua}}" class="collapse">
                                    @endif
                                    <tr>
                                        @if($becado->sexo === 0)
                                            <th class="pl-4" scope="row">No asignado</th>
                                        @elseif($becado->sexo === 1)
                                            <th class="pl-4" scope="row">Masculino</th>
                                        @else
                                            <th class="pl-4" scope="row">Femenino</th>
                                        @endif
                                        <td>{{$becado->total}}</td>
                                        <td>{{number_format(($becado->total/$becados->sum('total'))*100,2)}}</td>
                                    </tr>
                                    @endforeach
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
