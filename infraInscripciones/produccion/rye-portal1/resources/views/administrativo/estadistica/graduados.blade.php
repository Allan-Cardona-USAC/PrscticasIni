@extends('layouts.master')

@section('content')

<!----------------------------------------Tarjeta-------------------------------------------------------------->
<div class="card">
    <div class="card-header">
        <h5>Administrativo :: Estadistica</h5>
    </div>
   
        <div class="row">
            <div class="card-body">
                <div class="card bg-light">
                    <div class="contenedor">
                        <div class="contenedor_reporte">
                            <div class="card-header" style="background-color: #0F2949; color: white;" align="center">
                                <div class="item row-1">
                                    <span>
                                        <h2>Reporte Estadística Graduados</h2>
                                    </span>
                                </div>
                            </div>

                            <div style="margin-top:10px;margin-left:10px">
                            <input class="btn btn-primary btn-sm" type="submit" value="Seleccionar Todo" name="Reporte" onclick="Consulta_Completa()">
                            </div>
                                <form action="reporteEstadistica/consultaGraduados" method="post">
                                 @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="item row-2 form-group form-group-xxx">
                                            <span>Fecha Inicial:</span>
                                            <input type="date" value="2017-06-01" name="fechaInicio" />
                                            <span>Fecha Final:</span>
                                            <input type="date" value="2017-06-01" name="fechaFin"/>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                               
                                    <div class="col-sm col-sm-xxx">
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="carnet" id="carnet" class="check">
                                            <span>Carnet</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cOrientacion" id="cOrientacion" class="check">
                                            <span>Código de Orientación</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="completo" id="completo" class="check">
                                            <span>Nombre Completo</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="apellidos" id="apellidos" class="check">
                                            <span>Apellidos</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nombres" id="nombres" class="check">
                                            <span>Nombres</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="celular" id="celular" class="check">
                                            <span>Celular</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fnacimiento" id="fnacimiento" class="check">
                                            <span>Fecha de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="cui" id="cui" class="check">
                                            <span>CUI </span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="email" id="email" class="check">
                                            <span>Email</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoUA" id="codigoUA" class="check">
                                            <span>Código Unidad Académica</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="unidadA" id="unidadA" class="check">
                                            <span>Unidad Académica </span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoExt" id="codigoExt" class="check">
                                            <span>Código de Extensión</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="extension" id="extension" class="check">
                                            <span>Extensión</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoCarrera" id="codigoCarrera" class="check">
                                            <span>Código de Carrera</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="carrera" id="carrera" class="check">
                                            <span>Carrera</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nivelAc" id="nivelAc" class="check">
                                            <span>Nivel Académico</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="sexo" id="sexo" class="check">
                                            <span>Sexo</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="estadoCivil" id="estadoCivil" class="check">
                                            <span>Estado Civil</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="direccion" id="direccion" class="check">
                                            <span>Dirección</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoPostal" id="codigoPostal" class="check">
                                            <span>Código Postal</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nombrePostal" id="nombrePostal" class="check">
                                            <span>Nombre Postal</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="situacionAc" id="situacionAc" class="check">
                                            <span>Situación Académica</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="etnia" id="etnia" class="check">
                                            <span>Etnia</span>
                                        </div>
                                    </div>
                                    <div class="col-sm col-sm-xxx">
                                        
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="idioma" id="idioma" class="check">
                                            <span>Idioma</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="idiomados" id="idiomados" class="check">
                                            <span>Segundo Idioma</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoNac" id="codigoNac" class="check">
                                            <span>Código Nacionalidad</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="nacionalidad" id="nacionalidad" class="check">
                                            <span>Nacionalidad</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoDepR" id="codigoDepR" class="check">
                                            <span>Código de Departamendo Donde Recide</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="departamentoR" id="departamentoR" class="check">
                                            <span>Departamento Donde Recide</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoPaisNac" id="codigoPaisNac" class="check">
                                            <span>Código de País de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="paisNac" id="paisNac" class="check">
                                            <span>País de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoDepNac" id="codigoDepNac" class="check">
                                            <span>Código Departemento de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="departamentoNac" id="dn" class="check">
                                            <span>Departemento de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoMunNac" id="codigoMunNac" class="check">
                                            <span>Código Municipio de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="municipioNac" id="municipioNac" class="check">
                                            <span>Municipio de Nacimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoMunR" id="codigoMunR" class="check">
                                            <span>Código Municipio de Residencia</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="municipioR" id="municipioR" class="check">
                                            <span>Municipio de Residencia</span>
                                        </div>

                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="edad" id="edad" class="check">
                                            <span>Edad</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="codigoDepDiv" id="codigoDepDiv" class="check">
                                            <span>Código Departamento del Establecimiento Diversificado</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="departamentoDiv" id="departamentoDiv" class="check">
                                            <span>Departamento del Establecimiento</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fechaIni" id="fechaIni" class="check">
                                            <span>Fecha de Inicio de la Carrera</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fechaCierre" id="fechaCierre" class="check">
                                            <span>Fecha de Cierre</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="fechaGraduacion" id="fechaGraduacion" class="check">
                                            <span>Fecha de Graduación</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="tituloDiv" id="tituloDiv" class="check">
                                            <span>Título Diversificado</span>
                                        </div>
                                        <div class="contenedor_reporte--checkbox">
                                            <input type="checkbox" name="tipoDiv" id="tipoDiv" class="check">
                                            <span>Tipo de Establecimiento Diversificado</span>
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
                                <!-- <input class="btn btn-primary" type="submit" value="Descargar Base" onclick="Consulta()">-->
                                </div>
                                <span class="salir" id="salir">&times;</span>
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
