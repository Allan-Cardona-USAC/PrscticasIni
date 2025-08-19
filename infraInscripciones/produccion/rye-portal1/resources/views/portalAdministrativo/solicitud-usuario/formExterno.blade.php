<form method="POST" action="{{ url('/solicitud-usuario') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="FormExterno" style="display: none;">
    {{ csrf_field() }}
    <div class="row justify-content-center">
        <div class="col-md-3 form-group {{ $errors->has('dependencia_iddependencia') ? 'has-error' : ''}}" id="ExternosDependencia">
            <label for="dependencia_iddependencia" class="control-label">{{ 'Dependencia' }}</label>
            <select name="dependencia_iddependencia" class="form-control" id="dependencia_iddependencia">
                @foreach($dependencias as $dependencia )
                    <option value="{{ $dependencia->id }}">{{ $dependencia->id }} - {{$dependencia->descripcion}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input hidden class="form-control form-control-sm bg-transparent border-0" style="color:transparent;" name="tipo" type="text" id="tipo" value="E">
    <div class="row">
        <div class="col-md-6 form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
            <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
            <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($solicitudusuario->nombre) ? $solicitudusuario->nombre : ''}}" required>
            {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
            <label for="apellidos" class="control-label">{{ 'Apellidos' }}</label>
            <input class="form-control" name="apellidos" type="text" id="apellidos"  value="{{ isset($solicitudusuario->apellidos) ? $solicitudusuario->apellidos : ''}}" required>
            {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 form-group {{ $errors->has('nom_corto') ? 'has-error' : ''}}">
            <label for="nom_corto" class="control-label">{{ 'Nombre Corto' }}</label>
            <input class="form-control" name="nom_corto" type="text" id="nom_corto" value="{{ isset($solicitudusuario->nom_corto) ? $solicitudusuario->nom_corto : ''}}" required>
            <small class="alert-info">Ejemplo: Ing. Nombre Apellido <br> Lic. Nombre Apellido</small>
            {!! $errors->first('nom_corto', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-3 form-group {{ $errors->has('puesto') ? 'has-error' : ''}}">
            <label for="puesto" class="control-label">{{ 'Puesto' }}</label>
            <input class="form-control" name="puesto" type="text" id="puesto" value="{{ isset($solicitudusuario->puesto) ? $solicitudusuario->puesto : ''}}" required>
            {!! $errors->first('puesto', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-3 form-group {{ $errors->has('CUI') ? 'has-error' : ''}}">
            <label for="CUI" class="control-label">{{ 'CUI' }}</label>
            <input class="form-control" name="CUI" type="number" id="CUI" value="{{ isset($solicitudusuario->CUI) ? $solicitudusuario->CUI : ''}}" required>
            {!! $errors->first('CUI', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 form-group {{ $errors->has('correo_institucional') ? 'has-error' : ''}}">
            <label for="correo_institucional" class="control-label">{{ 'Correo Institucional' }}</label>
            <input class="form-control" name="correo_institucional" type="email" id="correo_institucional" value="{{ isset($solicitudusuario->correo_institucional) ? $solicitudusuario->correo_institucional : ''}}">
            {!! $errors->first('correo_institucional', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('correo_personal') ? 'has-error' : ''}}">
            <label for="correo_personal" class="control-label">{{ 'Correo Personal' }}</label>
            <input class="form-control" name="correo_personal" type="email" id="correo_personal" value="{{ isset($solicitudusuario->correo_personal) ? $solicitudusuario->correo_personal : ''}}" required>
            {!! $errors->first('correo_personal', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 form-group {{ $errors->has('telefono_cel') ? 'has-error' : ''}}">
            <label for="telefono_cel" class="control-label">{{ 'Telefono Cel' }}</label>
            <input class="form-control" name="telefono_cel" type="number" id="telefono_cel" value="{{ isset($solicitudusuario->telefono_cel) ? $solicitudusuario->telefono_cel : ''}}" required>
            {!! $errors->first('telefono_cel', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4 form-group {{ $errors->has('telefono_trabajo') ? 'has-error' : ''}}">
            <label for="telefono_trabajo" class="control-label">{{ 'Telefono Trabajo' }}</label>
            <input class="form-control" name="telefono_trabajo" type="number" id="telefono_trabajo" value="{{ isset($solicitudusuario->telefono_trabajo) ? $solicitudusuario->telefono_trabajo : ''}}">
            {!! $errors->first('telefono_trabajo', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4 form-group {{ $errors->has('telefono_casa') ? 'has-error' : ''}}">
            <label for="telefono_casa" class="control-label">{{ 'Telefono Casa' }}</label>
            <input class="form-control" name="telefono_casa" type="number" id="telefono_casa" value="{{ isset($solicitudusuario->telefono_casa) ? $solicitudusuario->telefono_casa : ''}}">
            {!! $errors->first('telefono_casa', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="row" >
        <div class="col-md-6 form-group {{ $errors->has('institucion') ? 'has-error' : ''}}">
            <label for="institucion" class="control-label">{{ 'Institucion' }}</label>
            <input class="form-control" name="institucion" type="text" id="institucion" value="{{ isset($solicitudusuario->institucion) ? $solicitudusuario->institucion : ''}}" required>
            {!! $errors->first('institucion', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('autoridad_responsable') ? 'has-error' : ''}}">
            <label for="autoridad_responsable" class="control-label">{{ 'Autoridad Responsable' }}</label>
            <input class="form-control" name="autoridad_responsable" type="text" id="autoridad_responsable" value="{{ isset($solicitudusuario->autoridad_responsable) ? $solicitudusuario->autoridad_responsable : ''}}" required>
            {!! $errors->first('autoridad_responsable', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="row">
        <div class="offset-md-2 col-md-4 form-group {{ $errors->has('copia_dpi') ? 'has-error' : ''}}">
            <label for="copia_dpi" class="control-label">{{ 'Copia Dpi' }}</label>
            <input class="form-control" name="copia_dpi" type="file" id="copia_dpi" value="{{ isset($solicitudusuario->copia_dpi) ? $solicitudusuario->copia_dpi : ''}}" required>
            {!! $errors->first('copia_dpi', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4 form-group {{ $errors->has('copia_oficio) ? 'has-error' : ''}}">
            <label for="copia_oficio" class="control-label">{{ 'Copia Oficio' }}</label>
            <input class="form-control" name="copia_oficio" type="file" id="copia_oficio" value="{{ isset($solicitudusuario->copia_oficio) ? $solicitudusuario->copia_oficio : ''}}" required>
            {!! $errors->first('copia_oficio', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div align="center" class="py-2">
            <input class="btn btn-primary btn-sm col-md-3" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
        </div>
    </div>
</form>