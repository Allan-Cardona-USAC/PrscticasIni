@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 align="center">Resumen Preinscritos</h2>
        </div>
        <div class="card-body">
            <div align="center" class="py-2">
                <a href="{{ route('administrativo.resumenpreinscritos','PorFecha') }}" title="Ordenar por fecha"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-calendar" aria-hidden="true"></i> Por Fecha</button></a>
                <a href="{{ route('administrativo.resumenpreinscritos','UA')}}" title="Ordenar por Unidad Académica"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Por Unidad Académica</button></a>
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead style="background-color: #0F2949; color: white">
                <tr>
                    <th scope="col">Fecha Inscripción</th>
                    <th scope="col">Preinscritos</th>
                </tr>
                <tr style="background-color: grey; color: black;">
                    @php
                        $ua_actual = '';
                        $sub_total = 0;
                        $total_preinscritos =0;
                        $total_central = 0;
                        foreach($preinscritos as $preinscrito2){
                            $total_preinscritos = $total_preinscritos + $preinscrito2->total;
                        }
                        if($porFecha === 1){
                            foreach($central as $usac){
                                $total_preinscritos = $total_preinscritos + $usac->total;
                                $total_central = $total_central + $usac->total;
                            }
                        }
                    @endphp
                    <th scope="col" >TOTAL PREINSCRITOS</th>
                    <th scope="col" >{{$total_preinscritos}}</th>
                </tr>
                </thead>
                @if($porFecha === 1)
                    <tbody>
                    <tr class="clickable" style="background-color: #407EC9; color: white" data-toggle="collapse" data-target="#ua00" aria-expanded="false" aria-controls="ua00">
                        <td><i class="fa fa-plus" aria-hidden="true" style="color: black"></i> <b>00 - USAC</b></td>
                        <td><b>{{$total_central}}</b></td>
                    </tr>
                    </tbody>
                    <tbody id="ua00" class="collapse">
                    @foreach($central as $usac)
                        <tr>
                            @if($usac->fecha_inscripcion === '0000-00-00')
                                <td class="pl-4">00/00/0000</td>
                            @else
                                <td class="pl-4">{{\Carbon\Carbon::parse($usac->fecha_inscripcion)->format('d/m/Y')}}</td>
                            @endif
                            <td>{{$usac->total}}</td>
                        </tr>
                    @endforeach
                @endif
                @foreach($preinscritos as $preinscrito)
                    @if($preinscrito->nomcorto != $ua_actual)
                        @php
                            $ua_actual = $preinscrito->nomcorto;
                            $sub_total = 0;
                            foreach($preinscritos as $preinscrito2){
                                if($preinscrito2->nomcorto === $ua_actual){
                                    $sub_total = $sub_total + $preinscrito2->total;
                                }
                            }
                        @endphp
                        <tbody>
                        <tr class="clickable" style="background-color: #407EC9; color: white" data-toggle="collapse" data-target="#ua{{$preinscrito->codfac}}" aria-expanded="false" aria-controls="ua{{$preinscrito->codfac}}">
                            <td><i class="fa fa-plus" aria-hidden="true" style="color: black"></i> <b>{{$preinscrito->codfac}} - {{$preinscrito->nomcorto}}</b></td>
                            <td><b>{{$sub_total}}</b></td>
                        </tr>
                        </tbody>
                        <tbody id="ua{{$preinscrito->codfac}}" class="collapse">
                    @endif
                        <tr>
                            @if($preinscrito->fecha_inscripcion === '0000-00-00')
                                <td class="pl-4">00/00/0000</td>
                            @else
                                <td class="pl-4">{{\Carbon\Carbon::parse($preinscrito->fecha_inscripcion)->format('d/m/Y')}}</td>
                            @endif
                            <td>{{$preinscrito->total}}</td>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection