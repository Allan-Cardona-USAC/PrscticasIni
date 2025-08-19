@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Denegar Solicitud Usuario - {{ $solicitudusuario->CUI }}</div>
        <div class="card-body">

            <a href="{{ url('/solicitud-usuario/' . $solicitudusuario->idsolicitud ) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

            <br/>
            <br/>

            <div align="center" class="py-2">
                <form method="POST" action="{{ route('solicitar-usuario.solicitudDenegada', $solicitudusuario->idsolicitud ) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline ">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <h5 class="text-left pl-4">Introduzca las razones por las que la solicitud es denegada:</h5>
                    <br/>
                    <div class="form-group row">
                        <label for="observaciones" class="col-sm-3 col-form-label text-md-right">{{ __('Observaciones') }}</label>

                        <div class="col-md-6">
                            <textarea id="observaciones"  rows="4" type="text" class="form-control form-control-sm" name="observaciones" maxlength="200" autofocus></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm col-md-3" title="Denegar solicitudUsuario" onclick="return confirm('¿Desea denegar la solicitud de  {{ $solicitudusuario->nombre }} {{$solicitudusuario->apellidos}} ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Denegar Solicitud</button>
                </form>
            </div>

        </div>
    </div>
@endsection