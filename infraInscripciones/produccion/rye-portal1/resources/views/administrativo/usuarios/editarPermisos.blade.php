@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Editar Permisos Usuario <b>{{ $usuarios->nombre }}</b></div>
        <div class="card-body">
            <a href="{{ route('administrativo.usuarios.show',[$usuarios->dependencia,$usuarios->login]) }}"
               title="Back">
                <button class="btn btn-warning btn-sm col-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Regresar
                </button>
            </a>
            <br/>
            <br/>

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <h5 class="text-center">Actualización de Permisos</h5>
            <hr>
            <h6 class="text-center">Asignar un rol con permisos predeterminados.</h6>
            <div class="row justify-content-center">
                <div class="input-group col-sm-5">
                    <select  name="selectRol" class="form-control form-control-sm " id="selectRol" onchange="SeleccionRol(this)">
                        <option value="-1">Rol</option>
                        @foreach($roles as $rol)
                            <option value="{{$rol->id}}" @if(isset($usuarios->getRol()->rolAplicaciones->id)? $usuarios->getRol()->rolAplicaciones->id === $rol->id: '') selected @endif>{{$rol->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br/>
            <form method="POST"
                  action="{{route('administrativo.usuarios.actualizarPermisos',[$usuarios->dependencia,$usuarios->login])}}"
                  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" name="formEditarPermisos">
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
                                            <input type="checkbox" class="form-check-input"
                                                   value="{{$permiso->idpermiso}}" id="permiso{{$permiso->idpermiso}}"
                                                   name="permisos[]"
                                                   @if(isset($usuarios->getRol()->rolAplicaciones->id))
                                                   @foreach($permisos_usuario as $permiso_usuario)
                                                   @if($permiso->idpermiso === $permiso_usuario->permiso_idpermiso)
                                                   checked
                                                    @endif
                                                    @endforeach
                                                   @endif
                                            disabled>{{$permiso->nombre_permiso}}
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
                <hr>
                <div class="form-group row">
                    <label for="fecha_desactivacion"
                           class="col-sm-4 col-form-label col-form-label-sm text-md-right">{{ __('Fecha de Desactivación') }}</label>
                    <div class="col-md-4">
                        <input id="fecha_desactivacion" type="date" class="form-control form-control-sm"
                               name="fecha_desactivacion" value="{{$usuarios->fecha_desactivacion}}">
                    </div>
                    {!! $errors->first('fecha_desactivacion', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group">
                    <div align="center" class="py-2">
                        <input class="btn btn-primary btn-sm col-md-3" type="submit" value="Actualizar"
                               onclick="return confirm('¿Desea editar el usuario {{ $usuarios->nombre }}?')">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('javascript')
    <script>

        function deseleccionar_todo(){
            for (i=0;i<document.formEditarPermisos.elements.length;i++)
                if(document.formEditarPermisos.elements[i].type === "checkbox")
                    document.formEditarPermisos.elements[i].checked=0
        }
        function seleccionar_todo(){
            for (i=0;i<document.formEditarPermisos.elements.length;i++)
                if(document.formEditarPermisos.elements[i].type === "checkbox")
                    document.formEditarPermisos.elements[i].checked=1
        }

        function SeleccionRol(select) {
            deseleccionar_todo();
            switch (select.value) {
                case '1':
                    $('#idrolAplicacion').val('1');
                    $('#permiso26').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '2':
                    $('#idrolAplicacion').val('2');
                    $('#permiso26').prop("checked", true);
                    $('#permiso27').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
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
                    break;
                case '4':
                    seleccionar_todo();
                    $('#idrolAplicacion').val('4');
                    break;
                case '5':
                    $('#idrolAplicacion').val('5');
                    seleccionar_todo();
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
                    break;
                case '7':
                    $('#idrolAplicacion').val('7');
                    $('#permiso7').prop("checked", true);
                    $('#permiso19').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '8':
                    $('#idrolAplicacion').val('8');
                    $('#permiso7').prop("checked", true);
                    $('#permiso8').prop("checked", true);
                    $('#permiso9').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '9':
                    $('#idrolAplicacion').val('9');
                    $('#permiso7').prop("checked", true);
                    $('#permiso20').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '10':
                    $('#idrolAplicacion').val('10');
                    seleccionar_todo();
                    break;
                case '11':
                    $('#idrolAplicacion').val('11');
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '12':
                    $('#idrolAplicacion').val('12');
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
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
                    break;
                case '14':
                    $('#idrolAplicacion').val('14');
                    $('#permiso7').prop("checked", true);
                    $('#permiso21').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '15':
                    $('#idrolAplicacion').val('15');
                    $('#permiso7').prop("checked", true);
                    $('#permiso22').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '16':
                    $('#idrolAplicacion').val('16');
                    $('#permiso6').prop("checked", true);
                    $('#permiso7').prop("checked", true);
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '17':
                    $('#idrolAplicacion').val('17');
                    $('#permiso23').prop("checked", true);
                    break;
                case '18':
                    $('#idrolAplicacion').val('18');
                    $('#permiso25').prop("checked", true);
                    break;
                case '19':
                    $('#idrolAplicacion').val('19');
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '20':
                    $('#idrolAplicacion').val('20');
                    $('#permiso30').prop("checked", true);
                    break;
                case '21':
                    $('#idrolAplicacion').val('21');
                    $('#permiso28').prop("checked", true);
                    $('#permiso29').prop("checked", true);
                    break;
                case '22':
                    $('#idrolAplicacion').val('22');
                    $('#permiso31').prop("checked", true);
                    break;

            }
        }
    </script>
@endsection