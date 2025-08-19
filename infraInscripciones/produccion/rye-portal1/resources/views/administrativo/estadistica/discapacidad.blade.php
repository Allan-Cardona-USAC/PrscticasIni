@extends('layouts.master')

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class="card">
    <div class="card-header">
        <h5>Administrativo :: Estadistica</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <div class="row">
            <div class="card-body">
                <div class="card bg-light">
                    <div class="contenedor">
                        <div class="contenedor_reporte">
                            <div class="card-header" style="background-color: #0F2949; color: white;" align="center">
                                <div class="item row-1">
                                    <span>
                                        <h2>Reporte Discapacidad</h2>
                                    </span>
                                </div>
                            </div>
                            <div style="margin-top:10px;margin-left:10px">
                            <input class="btn btn-primary btn-sm" type="submit" value="Seleccionar Todo" name="Reporte" onclick="Consulta_Completa()">
                            </div>
                            <form action="reporteEstadistica/consultaDiscapacidad" method="post">
                                 @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                </div>
                                <div class="row">
                                    <div class="col-sm col-sm-xxx">
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="carnet" id="carnet" class="check">
                                            <span>Carnet</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nombre" id="nombre" class="check">
                                            <span>Nombre Completo</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nombres" id="nombres" class="check">
                                            <span>Nombres</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="apellidos" id="apellidos" class="check">
                                            <span>Apellidos</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="celular" id="celular" class="check">
                                            <span>Celular</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fechanac" id="fechanac" class="check">
                                            <span>Fecha de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cui" id="cui" class="check">
                                            <span>CUI</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="email" id="email" class="check">
                                            <span>Email</span>
                                        </div>    
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cua" id="cua" class="check">
                                            <span>C&oacute;digo Unidad Acad&eacute;mica</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="ua" id="ua" class="check">
                                            <span>Unidad Acad&eacute;mica</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="ce" id="ce" class="check">
                                            <span>C&oacute;digo Extensi&oacute;n</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="extension" id="extension" class="check">
                                            <span>Extensi&oacute;n</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cc" id="cc" class="check">
                                            <span>C&oacute;digo de Carrera </span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="carrera" id="carrera" class="check">
                                            <span>Carrera </span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="na" id="na" class="check">
                                            <span>Nivel Acad&eacute;mico</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="sexo" id="sexo" class="check">
                                            <span>Sexo</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="direccion" id="direccion" class="check">
                                            <span>Direcci&oacute;n </span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="sa" id="sa" class="check">
                                            <span>Situaci&oacute;n Acad&eacute;mica</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="etnia" id="etnia" class="check">
                                            <span>Etnia</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="idioma" id="idioma" class="check">
                                            <span>Idioma</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="idioma_2" id="idioma_2" class="check">
                                            <span>Segundo Idioma</span>
                                        </div>    
                                    </div>
                                    <div class="col-sm col-sm-xxx">
                                    
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cn" id="cn" class="check">
                                            <span>C&oacute;digo Nacionalidad </span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nacionalidad" id="nacionalidad" class="check">
                                            <span>Nacionalidad</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cdr" id="cdr" class="check">
                                            <span>C&oacute;digo de Departamendo Donde Reside</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="dr" id="dr" class="check">
                                            <span>Departamento Donde Reside</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cdn" id="cdn" class="check">
                                            <span>C&oacute;digo Departamento de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="dn" id="dn" class="check">
                                            <span>Departemento de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="edad" id="edad" class="check">
                                            <span>Edad</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cded" id="cded" class="check">
                                            <span>C&oacute;digo Departamento del Establecimiento Diversificado</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="de" id="de" class="check">
                                            <span>Departamento del Establecimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fic" id="fic" class="check">
                                            <span>Fecha de Inicio de la Carrera</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fc" id="fc" class="check">
                                            <span>Fecha de Cierre</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fg" id="fg" class="check">
                                            <span>Fecha de Graduaci&oacute;n</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="td" id="td" class="check">
                                            <span>T&iacute;tulo Diversificado</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="ted" id="ted" class="check">
                                            <span>Tipo de Establecimiento Diversificado</span>
                                        </div>

                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="dfes" id="dfes" class="check">
                                            <span>Dificultad Escalones</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="apyote" id="apyote" class="check">
                                            <span>Apoyo Técnico</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="ampt" id="ampt" class="check">
                                            <span>Amputaciones</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="aydamv" id="aydamv" class="check">
                                            <span>Ayuda Movilización</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="aydamvotr" id="aydamvotr" class="check">
                                            <span>Ayuda Movilización Otros</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="dfau" id="dfau" class="check">
                                            <span>Dificultad Auditiva</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="dfvis" id="dfvis" class="check">
                                            <span>Dificultad Visual</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group row form-group-row4">     
                                        <input class="btn btn-primary" type="submit" value="Reporte"> 
                                </div>
                            </div>
                            </form>  
                        </div>
                    </div>
                    <div class="modal" id="modal">
                        <div class="modal__contenedor" id="modal__contenedor">
                            <div class="modal__contenedor--box">
                                <div id="modal__contenedor--box--cabecera">
                                    <p>Campos Seleccionados</p>
                                </div>
                                <div id="modal__contenedor--box--table">
                                </div>
                                <div id="modal__contenedor--box--button">
                                    <input class="btn btn-primary" type="submit" value="Descargar Base" onclick="Consulta()">
                                </div>
                                <span class="salir" id="salir">&times;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<link rel="stylesheet" href="./reporte_estadistica.css">
<script text="text/javascript">
    
    function Consulta_Completa() {
        if ($('.check').prop('checked') == false) {
            $('.check').prop('checked', true);
            $('.check').parent().addClass("highlight");
        } else if ($('.check').prop('checked') == true) {
            $('.check').prop('checked', false);
            $('.check').parent().removeClass("highlight");
        };
    }

</script>
