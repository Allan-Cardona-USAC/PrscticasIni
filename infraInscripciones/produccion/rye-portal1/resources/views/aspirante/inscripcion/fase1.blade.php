@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">
    {{-- Oculta div's del formulario --}}
    <style>
        .ocultarDiv{
            display: none;
        }
    </style>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    
    <div title="Click para Cerrar" id="carga" style="cursor:pointer;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;box-shadow:inset # 696763 0px 0px 14px;background-position:center;background-size:100%;background-color:# fff;width:300px;color:# fff;text-align:center;height:170px;padding:52px 12px 12px 12px;position:fixed;top:30%;left:40%;z-index:6;">
    <img AlternateText="Loading" src="{{asset('img/25.gif')}}" />
    </div>
    <div class="container">
        <br/>

        {{-- id necesario para el funcionamiento y estetica del formulario --}}
        <div id="multistepform">

            {{-- Lista de pasos del formulario --}}
            <ul>

                <li><a href="#step-1">PASO 1<br /><small>Selección de Lugar de Estudios</small></a></li>
                <li><a href="#step-2">PASO 2<br /><small>Selección de Unidad Académica</small></a></li>
                <li><a href="#step-3">PASO 3<br /><small>Selección de Carrera</small></a></li>
               {{-- <li><a href="#step-4">PASO 4<br /><small>Datos personales</small></a></li> --}}
            </ul>

            {{-- div que no hace nada pero sin el no sirve el formulario --}}
            <div>
                {{-- PASO 1: Llenar Formulario de Datos Personales
                    @include('aspirante.inscripcion.fase1.paso1')
                <div id="step-1" class="">
                    @include('aspirante.inscripcion.fase1.paso1')
                </div> --}}

                {{-- PASO 1: Seleccion de Lugar de Estudios --}}
                <div id="step-1" class="">
                    @include('aspirante.inscripcion.fase1.paso2')
                </div>

                {{-- PASO 2: Selección de Unidad Académica --}}
                <div id="step-2" class="">
                    <div>
                        <table class="table table-hover table-striped" id="unidadesAcademicas">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Unidad Académica.</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tbodyUA">
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- PASO 3: Selección de Carrera --}}
                <div id="step-3" class="">
                    <div class="alert alert-warning" role="alert">
                        Selecciona un plan de estudio para ver las carreras disponibles
                    </div>
                    <div class="table-responsive" id="carreras">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal con animacion de carga
    @include('common.include.loading') --}}
@endsection

@section('javascript')
<div class="modal fade" id="errorModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header" style="background: red;">
                <h5 class="modal-title" style="color: white;">Advertencia</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" >
                <strong>

                <div id="divError">

                </div>
                <strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmarModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmarModalLabel">Confirmar Información</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        A continuación se presenta la información de tu carrera:
        <ul id="infoCarrera">

        </ul>
        Presiona clic en "Aceptar" si la información es correcta o "Cerrar" si deseas seleccionar otra carrera.
      </div>
      <div class="modal-footer" id="confBotones">
      </div>
    </div>
  </div>
</div>

    <script src="{{ asset('js/multiStepForm.js') }}"></script>

    <script type="text/javascript">
        let lugaresDeEstudio = {!! $lugaresDeEstudio!!};
        $(document).ready(function() {
            cerrar();
            {{-- Configuración del MultiStepForm --}}
            $('#multistepform').smartWizard({
                keyNavigation:false, {{-- Deshabilita la navegacion con las flechas del teclado --}}
                backButtonSupport: false, {{-- Deshabilita regresar al paso anterior con el teclado --}}
                theme: 'dots', {{-- Usa el tema de puntitos engazados --}}
                lang: {
                    next: 'Siguiente',
                    previous: 'Anterior'
                },
                anchorSettings: {
                    anchorClickable: true,
                    removeDoneStepOnNavigateBack: true
                }
            });

        });

        {{-- Habilita los tooltips de bootstrap --}}
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


        /**
         * Filtra el conjunto de datos enviados desde el controlador
         * Para crear la tabla de unidades academicas del siguiente paso
         * @param {string} lugarDeEstudio - Nombre del lugar de estudio seleccionado
         */
        function paso2(lugarDeEstudio) {
            {{-- Obtengo la tabla HTML de Unidades academicas y elimino su contenido --}}
            cargando();
            var table = document.getElementById("tbodyUA");
            table.innerHTML="";

            {{-- Obtengo todas las unidades academicas del lugar de estudio seleccionado --}}
            var facultades = lugaresDeEstudio[lugarDeEstudio];

            {{-- Ciclo para llenar la tabla de unidades academicas --}}
            Object.keys(facultades).forEach(function (key) {
                var row = table.insertRow(table.rows.length); {{-- Añado una fila al final de la tabla --}}
                var codigo = row.insertCell(0);
                var nombre = row.insertCell(1);
                var boton = row.insertCell(2);

                var subkey = Object.keys(facultades[key])[0]; {{-- Obtengo el nombre de la primera extension en la unidad academica --}}
                codigo.innerHTML = facultades[key][subkey][0]['idFacultad']; {{-- Obtengo el codigo de la unidad academica --}}
                nombre.innerHTML = facultades[key][subkey][0]['facultad']; {{-- Obtengo el nombre de la uniadad academica --}}
                boton.innerHTML = "<button class='btn btn-info btn-sm' onclick=\"paso3('".concat(
                    facultades[key][subkey][0]['facultad'],
                    "','",
                    facultades[key][subkey][0]['lugarEstudios'],
                    "')\">Seleccionar</button>");
            });

            $('#multistepform').smartWizard('nextStep');
            cerrar();
        }

        /**
         * Filtra nuevamente el conjunto de datos enviados desde el controlador
         * Para crear una tabla por extension llena de las carreras de dicha extensión
         * @param {string} facultad - nombre de la unidad academica selecionada
         * @param {string} lugarEstudios - nombre del lugar de estudio selecionado
         */
        function paso3(facultad, lugarEstudios){
            cargando();
            console.log("paso3: " + facultad + ", " + lugarEstudios);
            var extensiones = lugaresDeEstudio[lugarEstudios][facultad];

            var carreras = document.getElementById('carreras');
            carreras.innerHTML = "";

            var tabla = document.createElement('table');
            tabla.classList.add('table');
            tabla.classList.add('table-hover');
            tabla.classList.add('table-striped');

            Object.keys(extensiones).forEach(function (key) {

                var body = document.createElement('tbody');
                var plan = body.insertRow();
                plan.classList.add("clickable");
                plan.setAttribute("style", "background-color: white;");

                //data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1"
                var toggle = document.createAttribute("data-toggle");
                toggle.value = "collapse";
                plan.setAttributeNode(toggle);

                var target = document.createAttribute("data-target");
                target.value = "#plan" + extensiones[key][0]['idExtension'];
                plan.setAttributeNode(target);

                var expanded = document.createAttribute("aria-expanded");
                expanded.value = "false";
                plan.setAttributeNode(expanded);

                var controls = document.createAttribute("aria-controls");
                controls.value = "plan" + extensiones[key][0]['idExtension'];
                plan.setAttributeNode(controls);


                var icon = plan.insertCell(0);
                var tituloNombre = plan.insertCell(1);
                icon.innerHTML = "<i class=\"fa fa-chevron-circle-down\" aria-hidden=\"true\"></i>";
                icon.setAttribute("width", "5%");
                tituloNombre.innerHTML = extensiones[key][0]['extension'];
                tituloNombre.setAttribute("colspan", 2);
                //tituloNombre.setAttribute("style", "text-align: center;");

                tabla.appendChild(body);

                var bodyinterno = document.createElement('tbody');
                Object.keys(extensiones[key]).forEach(function (subkey) {
                    bodyinterno.classList.add("collapse");
                    bodyinterno.setAttribute("id", "plan" + extensiones[key][0]['idExtension']);


                    var row = bodyinterno.insertRow();
                    var codigo = row.insertCell(0);
                    var nombre = row.insertCell(1);
                    var boton = row.insertCell(2);
                    codigo.innerHTML = extensiones[key][subkey]['idCarrera'];
                    nombre.innerHTML = extensiones[key][subkey]['carrera'];

                    let carrera = "'" + extensiones[key][subkey]['carrera'] + "'";
                    let lugarEstudio = "'" + extensiones[key][subkey]['lugarEstudios'] + "'";
                    let extension = "'" + extensiones[key][subkey]['extension'] + "'";
                    let facultad = "'" + extensiones[key][subkey]['facultad'] + "'";

                    boton.innerHTML = "<button class='btn btn-info btn-sm' onclick=\"confirmar(".concat(
                        extensiones[key][subkey]['idFacultad'],
                        ",",
                        extensiones[key][subkey]['idExtension'],
                        ",",
                        extensiones[key][subkey]['idCarrera'],
                        ",",
                        carrera,
                        ",",
                        lugarEstudio,
                        ",",
                        extension,
                        ",",
                        facultad,
                        ")\">Seleccionar</button>");
                    tabla.appendChild(bodyinterno);
                });
            });
            carreras.appendChild(tabla);

            $('#multistepform').smartWizard('nextStep');
            cerrar();
        }

        function confirmar(idFacultad, idExtension, idCarrera, carrera, lugarEstudio, extension, facultad){
            let infoCarrera = $('#infoCarrera');
            infoCarrera.empty();
            infoCarrera.append("<li>" + carrera + "</li>");
            infoCarrera.append("<li>" + extension + "</li>");
            infoCarrera.append("<li>" + facultad + "</li>");
            infoCarrera.append("<li>" + lugarEstudio + "</li>");


            let btnConf = $('#confBotones')
            btnConf.empty();
            btnConf.append("<button type=\"button\" class=\"btn btn-primary\" onClick='paso4("
                + idFacultad + ","
                + idExtension + ","
                + idCarrera
                +")'>Aceptar</button>");
            btnConf.append("<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\">Cerrar</button>");

            $('#confirmarModal').modal();

        }

        function paso4(idFacultad, idExtension, idCarrera){
            $('#confirmarModal').modal('toggle');
            cargando();
            {{-- todo poner algo para confirmar si desean esa carrera --}}
            {{-- Inserta los datos en la tabla información_aspirante --}}
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('aspirante.fase1.paso5') }}",
                type:"POST",
                data: {
                    idFacultad: idFacultad,
                    idExtension: idExtension,
                    idCarrera: idCarrera
                },
                success:function(data) {
                    alert(data);
                    window.location.href = '{{ route('aspirante.fase2') }}';
                },
                error: function (data) {
                    let divError = $('#divError');
                    divError.empty();

                    let mensaje = data.responseText ? data.responseText : "Error de comunicación con el servidor, intenta mas tarde";
                    mensaje = mensaje.replace(/\\u00e1/g, 'á');
                    mensaje = mensaje.replace(/\\u00e9/g, 'é');
                    mensaje = mensaje.replace(/\\u00ed/g, 'í');
                    mensaje = mensaje.replace(/\\u00f3/g, 'ó');
                    mensaje = mensaje.replace(/\\u00fa/g, 'ú');
                    mensaje = mensaje.replace(/\\u00c1/g, 'Á');
                    mensaje = mensaje.replace(/\\u00c9/g, 'É');
                    mensaje = mensaje.replace(/\\u00cd/g, 'Í');
                    mensaje = mensaje.replace(/\\u00d3/g, 'Ó');
                    mensaje = mensaje.replace(/\\u00da/g, 'Ú');

                    divError.append("<p>" +mensaje+ "</p>");
                    cerrar();
                    $("#errorModal").modal();
                }
            });
        }
    </script>
@endsection
