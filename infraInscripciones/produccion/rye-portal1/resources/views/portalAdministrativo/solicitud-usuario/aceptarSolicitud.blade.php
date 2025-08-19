@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Aceptar Solicitud Usuario - {{ $solicitudusuario->CUI }} - {{ $solicitudusuario->nombre }} {{$solicitudusuario->apellidos}}</div>
        <div class="card-body">

            <a href="{{ url('/solicitud-usuario/' . $solicitudusuario->idsolicitud ) }}" title="Back"><button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
            <br/>
            <br/>
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <h5 class="text-center">Asignación de Permisos</h5>
            <hr>
            <h6 class="text-center">Asignar un rol con permisos predeterminados.</h6>
            <div class="row justify-content-center">
                <div class="input-group col-sm-5">
                    <select  name="selectRol" class="form-control form-control-sm " id="selectRol" onchange="SeleccionRol(this)">
                        <option value="-1">Rol</option>
                        @foreach($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br/>
            <div class="text-center py-2">
                <form method="POST" action="{{ route('solicitud-usuario.registrarUsuario', $solicitudusuario->idsolicitud) }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline " name="formAceptarSolicitud">
                    {{ csrf_field() }}
                    <input hidden class="form-control form-control-sm bg-transparent border-0" style="color:transparent;" name="idrolAplicacion" type="text" id="idrolAplicacion">
                    @php
                        $numero = 0;
                        $columnas = 0;
                    @endphp
                    @foreach ($permisos as $permiso)
                        @if($columnas === 0 && $numero === 0)
                            <div class=" row text-justify">
                                @endif
                                @if($numero === 0)
                                    <div class="col">
                                        @endif
                                        <div class="form-check">
                                            <label class="form-check-label text-left">
                                                <input type="checkbox" class="form-check-input" value="{{$permiso->idpermiso}}" id="permiso{{$permiso->idpermiso}}" name="permisos[]" disabled>{{$permiso->nombre_permiso}}
                                            </label>
                                        </div>
                                        @if ($numero ===12 ||$loop->last)
                                            @php($numero = 0)
                                            @php( $columnas++)
                                    </div>
                                @else
                                    @php($numero++)
                                @endif
                                @if($columnas === 3 ||$loop->last)
                                    @php( $columnas =0)
                            </div>
                        @endif
                    @endforeach
                    <div class="py-0">
                        <hr>
                        <p>
                            <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseUnidadAcademica" role="button" aria-expanded="false" aria-controls="collapseUnidadAcademica">Catálogo Unidad Académicas</a>
                        </p>
                        <h6>Introducir todas las unidades académicas separadas por coma.</h6>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="collapseUnidadAcademica">
                                    <div class="card card-body text-justify pre-scrollable">
                                        <table class="table table-striped table-sm">
                                            <tr><th>Código</th><th>Unidad</th></tr>
                                            @foreach($unidadAcademica as $ua)
                                                <tr>
                                                    <td>{{$ua->codfac}}</td><td>{{$ua->nomfac}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="ua_validas" class="col-sm-5 col-form-label col-form-label-sm text-md-right">{{ __('Unidades Académicas') }}</label>
                                    <div class="col-md-7">
                                        <input id="ua_validas" type="text" class="form-control form-control-sm" name="ua_validas" >
                                    </div>
                                    {!! $errors->first('ua_validas', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-0">
                        <hr>
                        <p>
                            <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseNiveles" role="button" aria-expanded="false" aria-controls="collapseNiveles">Catálogo Nivel Académico</a>
                        </p>
                        <h6>Introducir los niveles académicos separados por coma.</h6>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="collapseNiveles">
                                    <div class="card card-body text-justify pre-scrollable">
                                        <table class="table table-striped table-sm">
                                            <tr><th>Código</th><th>Nivel</th></tr>
                                            @foreach($niveles as $nivel)
                                                <tr>
                                                    <td>{{$nivel->codigo_nivel_academico}}</td><td>{{$nivel->nombre}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="nivel_valido" class="col-sm-5 col-form-label col-form-label-sm text-md-right">{{ __('Nivel Académico') }}</label>
                                    <div class="col-md-7">
                                        <input id="nivel_valido" type="text" class="form-control form-control-sm" name="nivel_valido" >
                                        {!! $errors->first('nivel_valido', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-0">
                        <hr>
                        <div class="form-group row">
                            <label for="fecha_desactivacion" class="col-sm-4 col-form-label col-form-label-sm text-md-right">{{ __('Fecha de Desactivación') }}</label>
                            <div class="col-md-4">
                                <input id="fecha_desactivacion" type="date" class="form-control form-control-sm" name="fecha_desactivacion" >
                            </div>
                            <div class="form-check pt-1">
                                <input class="form-check-input" type="checkbox" value="" id="checkIndefinido" onclick="EsIndefinida()">
                                <label class="form-check-label" for="checkIndefinido">
                                    Indefinida
                                </label>
                            </div>
                            {!! $errors->first('fecha_desactivacion', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group row" id="auxiliar" style="display: none;">
                            <label for="num_aux" class="col-sm-4 col-form-label col-form-label-sm text-md-right">{{ __('Número Auxiliar') }}</label>
                            <div class="col-md-4">
                                <input id="num_aux" type="number" class="form-control form-control-sm" name="num_aux" maxlength="2">
                            </div>
                            {!! $errors->first('num_aux', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm col-md-3 " title="Aceptar solicitudUsuario" onclick="return confirm('¿Desea aceptar la solicitud de  {{ $solicitudusuario->nombre }} {{$solicitudusuario->apellidos}} ?')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Aceptar Solicitud</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('javascript')
    <script>
        //Definir fecha indefinida de desactivación del usuario
        function EsIndefinida() {
            var checkBox = document.getElementById("checkIndefinido");
            // Get the output text

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                var n =  new Date();
                //Año
                var y = n.getFullYear()+4;
                //Mes
                var m = n.getMonth() + 1;
                //Día
                var d = n.getDate();

                if(d<10) {
                    d='0'+d
                }

                if(m<10) {
                    m='0'+m
                }

                $('#fecha_desactivacion').val(y + '-' + m + '-' + d);
            }else{
                $('#fecha_desactivacion').val("");
            }
        }

        function deseleccionar_todo(){
            for (i=0;i<document.formAceptarSolicitud.elements.length;i++)
                if(document.formAceptarSolicitud.elements[i].type === "checkbox")
                    document.formAceptarSolicitud.elements[i].checked=0
        }
        function seleccionar_todo(){
            for (i=0;i<document.formAceptarSolicitud.elements.length;i++)
                if(document.formAceptarSolicitud.elements[i].type === "checkbox")
                    document.formAceptarSolicitud.elements[i].checked=1
        }

        function SeleccionRol(select) {
            deseleccionar_todo();
            switch (select.value) {
                case '1':
                    $('#idrolAplicacion').val('1');
                    $('#permiso26').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '2':
                    $('#idrolAplicacion').val('2');
                    $('#permiso26').prop("checked", true);
                    $('#permiso27').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '3':
                    $('#idrolAplicacion').val('3');
                    $('#permiso2').prop("checked", true);
                    $('#permiso3').prop("checked", true);
                    $('#permiso4').prop("checked", true);
                    $('#permiso5').prop("checked", true);
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').show();
                    break;
                case '4':
                    seleccionar_todo();
                    $('#idrolAplicacion').val('4');
                    $('#auxiliar').val('00').hide();
                    break;
                case '5':
                    $('#idrolAplicacion').val('5');
                    seleccionar_todo();
                    $('#auxiliar').val('00').hide();
                    break;
                case '6':
                    $('#idrolAplicacion').val('6');
                    $('#permiso2').prop("checked", true);
                    $('#permiso3').prop("checked", true);
                    $('#permiso4').prop("checked", true);
                    $('#permiso5').prop("checked", true);
                    $('#permiso6').prop("checked", true);
                    $('#permiso7').prop("checked", true);
                    $('#permiso19').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').show();
                    break;
                case '7':
                    $('#idrolAplicacion').val('7');
                    $('#permiso7').prop("checked", true);
                    $('#permiso19').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '8':
                    $('#idrolAplicacion').val('8');
                    $('#permiso7').prop("checked", true);
                    $('#permiso8').prop("checked", true);
                    $('#permiso9').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '9':
                    $('#idrolAplicacion').val('9');
                    $('#permiso7').prop("checked", true);
                    $('#permiso20').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '10':
                    $('#idrolAplicacion').val('10');
                    seleccionar_todo();
                    $('#auxiliar').val('00').hide();
                    break;
                case '11':
                    $('#idrolAplicacion').val('11');
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '12':
                    $('#idrolAplicacion').val('12');
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '13':
                    $('#idrolAplicacion').val('13');
                    $('#permiso2').prop("checked", true);
                    $('#permiso3').prop("checked", true);
                    $('#permiso4').prop("checked", true);
                    $('#permiso5').prop("checked", true);
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '14':
                    $('#idrolAplicacion').val('14');
                    $('#permiso7').prop("checked", true);
                    $('#permiso21').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '15':
                    $('#idrolAplicacion').val('15');
                    $('#permiso7').prop("checked", true);
                    $('#permiso22').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '16':
                    $('#idrolAplicacion').val('16');
                    $('#permiso6').prop("checked", true);
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '17':
                    $('#idrolAplicacion').val('17');
                    $('#permiso23').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '18':
                    $('#idrolAplicacion').val('18');
                    $('#permiso25').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '19':
                    $('#idrolAplicacion').val('19');
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '20':
                    $('#idrolAplicacion').val('20');
                    $('#permiso30').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '21':
                    $('#idrolAplicacion').val('21');
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;
                case '22':
                    $('#idrolAplicacion').val('22');
                    $('#permiso31').prop("checked", true);
                    $('#auxiliar').val('00').hide();
                    break;

            }
        }
    </script>
@endsection