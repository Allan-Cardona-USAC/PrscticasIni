@extends('portalEstudiantil.layouts.master')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
<div class="account-pages mt-3 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="card" style="height: 1080px">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="text-center main-title">
                            Graduados en Guatemala
                        </h3>
                        <h4 class="text-center" style="font-family: 'Verdana',ui-serif">Solo se recibirán documentos
                            <b>originales</b> y ordenados según esta guía </h4>
                        <hr class="rounded">
                    </div>
                    <div id="table" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable" style="width: 100%;" role="grid">
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Una fotografía tamaño cédula ( <b>reciente y de estudio fotográfico</b>).
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Tarjeta de Orientación Vocacional (extendida por el
                                            Departamento de Orientación Vocacional).
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Constancia de Pruebas de Conocimientos Básicos con resultado
                                            <b>SATISFACTORIO</b>
                                            <div style="font-size:16px; display: inline;">
                                                (Extendida por el SUN)
                                            </div>
                                            o constancia del Programa Académico Preparatorio -PAP-.
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Constancia de Pruebas Específicas con resultado <b>SATISFACTORIO</b>
                                            <div style="font-size:16px; display: inline;">
                                                (Extendida por la Unidad Académica).
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Solicitud de Ingreso.
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Título de Enseñanza Media otorgado por el Ministerio de Educación
                                            <div style="font-size:16px; display: inline;">
                                                (se devuelve después de confrontarlo con la fotostática).
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Fotostática de ambos lados del Título en tamaño 5'' x 7'' de
                                            estudio fotográfico. <br>
                                            <div style="font-size:16px; display: inline;">
                                                (La persona de reciente graduación que no posea Título, debe presentar
                                                constancia de Cierre de Pénsum extendida por el establecimiento donde
                                                se graduó con el Visto Bueno, Firma y Sello <b>Original</b> de la
                                                autoridad competente, nombrada por la Dirección Departamental
                                                respectiva del Ministerio de Educación.) </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Certificación General de Estudios de Educación Media, extendida por el
                                            Establecimiento donde se graduó, con firma y sellos <b>originales</b>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Certificación original reciente de la Partida de Nacimiento, extendida por
                                            el Registro Nacional de las Personas -RENAP-.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="rounded">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="account-pages mt-3 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="card" style="height: 2080px">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="text-center main-title">
                            Graduados en el Extranjero
                        </h3>
                        <h4 class="text-center" style="font-family: 'Verdana',ui-serif">Solo se recibirán documentos
                            <b>originales</b> y ordenados según esta guía </h4>
                        <hr class="rounded">
                    </div>
                    <div id="table" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable" style="width: 100%;" role="grid">
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Una fotografía tamaño cédula (<b>reciente</b>).
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Tarjeta de Orientación Vocacional (extendida por el
                                            Departamento de Orientación Vocacional).
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Constancia de Pruebas de Conocimientos Básicos con resultado
                                            <b>SATISFACTORIO</b>
                                            <div style="font-size:16px; display: inline;">
                                                (Extendida por el SUN)
                                            </div>
                                            o constancia del Programa Académico Preparatorio -PAP-.
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Constancia de Pruebas Específicas con resultado <b>SATISFACTORIO</b>
                                            <div style="font-size:16px; display: inline;">
                                                (Extendida por la Unidad Académica).
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Solicitud de Ingreso.
                                        </td>
                                    </tr>


                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Equiparación de Estudios, extendida por el Ministerio de Educación de
                                            Guatemala, <div style="font-size:16px; display: inline;">
                                                        (<b>Avenida Simeón Cañas No. 3-37 zona 2, ciudad de
                                                        Guatemala</b>)
                                                        </div> o en las sedes de las Direcciones Departamentales del
                                            Ministerio de Educación.
                                            <div style="font-size:16px; display: inline;">
                                                <b>(No se aceptan constancias de equiparación en trámite)</b>
                                            </div>.
                                        </td>
                                    </tr>


                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Título o Diploma el cual deberá estar debidamente autentificado por las
                                            autoridades de la institución que lo expide y los conductos diplomáticos
                                            correspondientes
                                            <div style="font-size:16px; display: inline;">
                                                <b>(se devuelve después de la confrontación con fotostática)</b>
                                            </div>.
                                        </td>
                                    </tr>

                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Fotostática del Título y de sus auténticas en tamaño 5'' x 7'' de
                                            estudio fotográfico.
                                        </td>
                                    </tr>

                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Certificación General de Estudios correspondientes al plan oficial que
                                            haya cursado en relación equivalente al ciclo básico y diversificado,
                                            debidamente legalizado por los conductos diplomáticos; se deberán incluir
                                            las materias cursadas, el resultado obtenido en los exámenes, notas de
                                            promoción y/o los métodos de evaluación utilizados.
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Documentos que acreditan la nacionalidad del solicitante:<br>
                                            <b>Si es guatemalteco:</b> Certificado reciente de la Partida de
                                            Nacimiento<br>
                                            <b>Si es extranjero:</b> Pasaporte y fotocopia del mismo, legalizado por
                                            Notario guatemalteco o Certificación reciente de la Partida de Nacimiento
                                            autenticada por los conductos diplomáticos correspondientes.
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <i class='fas fa-angle-double-right' style='font-size:15px'></i>
                                            Los documentos que estén redactados en idioma extranjero, deberán
                                            presentarse con su respectiva traducción jurada, efectuada por traductor
                                            jurado guatemalteco y en este país.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="rounded">
                    <div class="text-center">
                        <h3 class="text-center main-title">
                            <b style="font-family: 'Verdana',ui-serif">Trámite por los Conductos Diplomáticos</b>
                        </h3>
                        <h4 class="text-center" style="font-family: 'Verdana',ui-serif">
                            Antes de iniciar el trámite en el Departamento de Registro y Estadística, los documentos
                            provenientes de Instituciones de Enseñanza Superior del extranjero, deberán cumplir con los
                            requisitos siguientes:
                        </h4>
                        <hr class="rounded">
                    </div>
                    <div id="table2" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable" style="width: 100%;" role="grid">
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <b>Para América Latina, Europa y Asia:</b><br>
                                            1. El Título deberá llevar la firma de la autoridad que expide el
                                            documento (<b>Director, Secretario, Registrador</b>) la cual deberá
                                            ser autenticada por el Ministerio del Exterior o las autoridades
                                            competentes del país que expide el mismo.
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            2. La firma de las autoridades del Ministerio del Exterior del país que
                                            expide el documento deberá autenticarla el Cónsul de Guatemala, acreditado
                                            en dicho país.
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            3. La firma del Cónsul de Guatemala en el país que expide el documento
                                            deberá ser autenticada en el Ministerio de Relaciones Exteriores de
                                            Guatemala. (<b>el cual se encuentra ubicada en la 2av. 4-17 Zona 10</b>).
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            <b>Para Estados Unidos de Norteamérica:</b><br>
                                            1. La firma de la autoridad de la Institución que expide el Título
                                            (<b>Director, Secretario, Registrador</b>) la cual deberá
                                            ser autenticada por un notario de Estados Unidos de Norteamérica.

                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            2. La firma del Notario deberá autenticarla el Jefe del Condado más
                                            cercano o autoridad de la Alcaldía de la Ciudad.
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            3. La firma del Jefe o Alcalde del Condado la deberá autenticar él
                                            Cónsul de Guatemala en Estados Unidos.
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="font-size:20px;">
                                            4. La firma del Cónsul de Guatemala en Estados Unidos la autentican en el
                                            Ministerio de Relaciones Exteriores de Guatemala (<b>el cual se encuentra
                                            ubicado en la 2av. 4-17 Zona 10</b>).
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="rounded">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
@endsection