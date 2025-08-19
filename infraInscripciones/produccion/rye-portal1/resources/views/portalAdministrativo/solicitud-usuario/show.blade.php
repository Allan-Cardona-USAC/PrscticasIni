@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Solicitud Usuario - {{ $solicitudusuario->CUI }}</div>
        <div class="card-body">

            <a href="{{ url('/solicitud-usuario') }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>ID</th><td>{{ $solicitudusuario->idsolicitud }}</td>
                    </tr>
                    <tr><th> Tipo </th>
                        @if($solicitudusuario->tipo === 'I')
                            <td> Interno </td>
                        @else
                            <td> Externo </td>
                        @endif
                    </tr>
                    <tr><th> CUI </th><td> {{ $solicitudusuario->CUI }} </td></tr>
                    @isset($solicitudusuario->registro_personal)
                        <tr><th> Registro  </th><td> {{ $solicitudusuario->registro_personal }} </td></tr>
                    @endisset
                    <tr><th> Nombre Completo </th><td> {{ $solicitudusuario->nombre }} {{$solicitudusuario->apellidos}} </td></tr>
                    <tr><th> Nombre Corto </th><td> {{ $solicitudusuario->nom_corto }}</td></tr>
                    <tr><th> Dependencia</th><td> {{ $solicitudusuario->dependencia_iddependencia }} - {{$solicitudusuario->getDependenciaNombre()}}</td></tr>
                    <tr><th> Puesto</th><td> {{ $solicitudusuario->puesto }}</td></tr>
                    <tr><th> Fecha Solicitud </th><td> {{ $solicitudusuario->getFechaSolicitud() }}</td></tr>
                    <tr><th> Correo Institucional </th><td> {{ $solicitudusuario->correo_institucional }}</td></tr>
                    <tr><th> Correo Personal</th><td> {{ $solicitudusuario->correo_personal }}</td></tr>
                    <tr><th> Teléfono Celular</th><td> {{ $solicitudusuario->telefono_cel }}</td></tr>
                    <tr><th> Teléfono Casa </th><td> {{ $solicitudusuario->telefono_casa }}</td></tr>
                    <tr><th> Teléfono Trabajo</th><td> {{ $solicitudusuario->telefono_trabajo }}</td></tr>
                    @isset($solicitudusuario->institucion)
                        <tr><th> Institución </th><td> {{ $solicitudusuario->institucion }}</td></tr>
                    @endisset
                    @isset($solicitudusuario->autoridad_responsable)
                        <tr><th> Autoridad Responsable </th><td> {{ $solicitudusuario->autoridad_responsable }}</td></tr>
                    @endisset
                    <tr><th colspan="2" class="text-center"> Documentos </th></tr>
                    @if(@empty($solicitudusuario->copia_dpi))
                        <tr>
                            <td colspan="2" class="text-center text-danger">
                                El usuario no subió la copia de DPI, ni copia de oficio.
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2">
                                <div class="text-center">
                                    <a class="btn btn-sm btn-success col-md-2" data-toggle="collapse" href="#collapseCopiaDPI" role="button" aria-expanded="false" aria-controls="Copia DPI">Copia DPI</a>
                                    <button class="btn  btn-sm btn-success col-md-2" type="button" data-toggle="collapse" data-target="#collapseCopiaOficio" aria-expanded="false" aria-controls="Copia Oficio">Copia Oficio</button>
                                </div>
                                <div class="collapse multi-collapse" id="collapseCopiaDPI">
                                    <div class="card card-body embed-responsive embed-responsive-16by9">
                                        <embed src="{{ asset('storage/' . $solicitudusuario->copia_dpi)}}" >
                                    </div>
                                </div>
                                <div class="collapse multi-collapse" id="collapseCopiaOficio">
                                    <div class="card card-body embed-responsive embed-responsive-16by9">
                                        <embed src="{{ asset('storage/' . $solicitudusuario->copia_oficio)}}" >
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div align="center" class="py-2">
                <a href="{{ route('solicitar-usuario.aceptarSolicitud' , $solicitudusuario->idsolicitud ) }}" title="aceptarSolicitud solicitudUsuario"><button class="btn btn-primary btn-sm col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Aceptar Solicitud</button></a>

                <a href="{{ route('solicitar-usuario.denegarSolicitud' , $solicitudusuario->idsolicitud ) }}" title="denegarSolicitud solicitudUsuario"><button class="btn btn-danger btn-sm col-md-3"><i class="fa fa-trash-o" aria-hidden="true"></i>  Denegar Solicitud</button></a>
            </div>

        </div>
    </div>
@endsection

