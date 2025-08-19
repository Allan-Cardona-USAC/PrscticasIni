@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Becas</div>
                    <div class="card-body">

                        <a href="{{ url('/administrativo/infobecado') }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

                        <br/>
                        <br/>

                        <form method="GET" action="{{ url('/administrativo/infobecado') }}" accept-charset="UTF-8" role="search">
                            <div class="row justify-content-center">
                                <div class="input-group col-sm-5">
                                    <input type="number" class="form-control form-control-sm" name="carnet" placeholder="Registro Académico"  value="{{ '' }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <br>

                        @if(isset($becado))


                            @if($tipo_becado == 1)

                            <form method="POST" action="{{ url('/administrativo/infobecado') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th> Registro Académico </th><td>{{ $becado->carnet }}</td>
                                        </tr>
                                        <tr>
                                            <th> CUI </th>
                                            <td colspan="2"> {{ $becado->estudiante->cui }} </td>
                                        </tr>
                                        <tr>
                                            <th> Nombres </th>
                                            <td colspan="2"> {{ $becado->estudiante->nombre1 . ' ' . $becado->estudiante->nombre2 . ' ' . $becado->estudiante->nombre }} </td>
                                            <th> Apellidos  </th>
                                            <td colspan="2"> {{ $becado->estudiante->primer_apellido . ' ' . $becado->estudiante->segundo_apellido }} </td>
                                        </tr>
                                        <tr>
                                            <th> Fecha Nacimiento  </th>
                                            <td colspan="2"> {{ $becado->estudiante->fec_nac->format('d/m/Y') }} </td>
                                            <th> Género  </th>
                                            <td colspan="2"> {{ $becado->estudiante->getGenero() }} </td>
                                        </tr>
                                        @if($datosSensibles)
                                            <tr>
                                                <th> Teléfono </th>
                                                <td colspan="2"> {{ $becado->estudiante->telefono }} </td>
                                                <th> Celular </th>
                                                <td colspan="2"> {{ $becado->estudiante->celular }} </td>
                                            </tr>
                                            <tr>
                                                <th> Email </th>
                                                <td  colspan="5"> {{ $becado->estudiante->email }} </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                @if(in_array(25,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                <div class="row justify-content-center">
                                    <div class="input-group col-sm-5">
                                        <select class="form-control form-control-sm" onchange="resetExtension()" name="ua" id="ua">
                                            <option value=-1> Seleccionar Unidad Académica </option>
                                            @foreach($unidades as $unidad )
                                                <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="carnet" name="carnet" value="{{ $becado->carnet }}">
                                <div align="center" class="py-2">
                                    <input class="btn btn-primary btn-sm col-md-3" type="submit" value="Becar">
                                </div>
                                @endif
                            </form>
                            <br>
                            <h3>Estudiante becado en:</h3>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                            @foreach($becadoaux as $b_aux)
                                                <tr>

                                                    <form method="POST" action="{{ url('/administrativo/infobecado') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                        {{ method_field('PATCH') }}
                                                        {{ csrf_field() }}
                                                        <input type="hidden" id="carnet" name="carnet" value="{{ $becado->carnet }}">
                                                    <th> Unidad Académica </th>
                                                    <td  colspan="2"> {{ $b_aux->unidad_academica->nomfac }} </td>
                                                    <input type="hidden" id="ua" name="ua" value="{{ $b_aux->unidad_academica->codfac }}">
                                                        @if(in_array(25,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                                            @if($b_aux->tramiteTitulo == 1)
                                                            <input type="hidden"  id="tramiteTitulo" name="tramiteTitulo" value="0">
                                                            <td  colspan="2"><input class="btn btn-success btn-sm " type="submit" value="Desbloquear trámite de título"></td>
                                                            @elseif($b_aux->tramiteTitulo == 0)
                                                                <input type="hidden" id="tramiteTitulo" name="tramiteTitulo" value="1">
                                                                <td  colspan="2"><input class="btn btn-danger btn-sm " type="submit" value="Bloquear trámite de título"></td>
                                                            @endif
                                                        @endif
                                                    </form>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                            @elseif($tipo_becado == 2)
                                <form method="POST" action="{{ url('/administrativo/infobecado') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th> Registro Académico </th><td>{{ $becado->carnet }}</td>
                                            </tr>
                                            <tr>
                                                <th> CUI </th>
                                                <td colspan="2"> {{ $becado->cui }} </td>
                                            </tr>
                                            <tr>
                                                <th> Nombres </th>
                                                <td colspan="2"> {{ $becado->nombre1 . ' ' . $becado->nombre2 . ' ' . $becado->nombre }} </td>
                                                <th> Apellidos  </th>
                                                <td colspan="2"> {{ $becado->primer_apellido . ' ' . $becado->segundo_apellido }} </td>
                                            </tr>
                                            <tr>
                                                <th> Fecha Nacimiento  </th>
                                                <td colspan="2"> {{ $becado->fec_nac }} </td>
                                                <th> Género  </th>
                                                <td colspan="2"> {{ $becado->getGenero()  }} </td>
                                            </tr>
                                            <tr>
                                                <th> Teléfono </th>
                                                <td colspan="2"> {{ $becado->telefono }} </td>
                                                <th> Celular </th>
                                                <td colspan="2"> {{ $becado->celular }} </td>
                                            </tr>
                                            <tr>
                                                <th> Email </th>
                                                <td  colspan="5"> {{ $becado->email }} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @if(in_array(25,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                                    <div class="row justify-content-center">
                                        <div class="input-group col-sm-5">
                                            <select class="form-control form-control-sm" onchange="resetExtension()" name="ua" id="ua">
                                                <option value=-1> Seleccionar Unidad Académica </option>
                                                @foreach($unidades as $unidad )
                                                    <option value="{{ $unidad->codfac }}">{{ $unidad->nomfac }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="carnet" name="carnet" value="{{ $becado->carnet }}">
                                    <div align="center" class="py-2">
                                        <input class="btn btn-primary btn-sm col-md-3" type="submit" value="Becar">
                                    </div>
                                    @endif
                                </form>
                                <br>
                                <h3>Estudiante becado en:</h3>
                                <span><b class="text-danger">El estudiante no tiene ninguna beca.</b></span>
                            @endif


                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
