@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiStepForm_dots.css') }}" rel="stylesheet">

    <style>
        .ocultarDiv{
            display: none;
        }
    </style>

    <base targert='_parent'>
@endsection

@section('content')
<div title="Click para Cerrar" id="carga" style="cursor:pointer;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;box-shadow:inset # 696763 0px 0px 14px;background-position:center;background-size:100%;background-color:# fff;width:300px;color:# fff;text-align:center;height:170px;padding:52px 12px 12px 12px;position:fixed;top:30%;left:40%;z-index:6;">
    <img AlternateText="Loading" src="{{asset('img/25.gif')}}" />
    </div>
    <div class="container">
        <br/>

        {{-- id necesario para el funcionamiento y estetica del formulario --}}
        <div id="multistepform">

            {{-- Lista de pasos del formulario --}}
            <ul>
                <li><a href="#step-5">PASO 4<br /><small>Datos Personales</small></a></li>
                <li><a href="#step-6">PASO 5<br /><small>Estudios previos</small></a></li>
            </ul>

            {{-- div que no hace nada pero sin el no sirve el formulario --}}
            <div>

                <div id="step-5" class="">
                     @include('aspirante.inscripcion.fase2.paso5')
                </div>

               {{--  PASO 6: Estudios Previos --}}
                <div id="step-6" class="">
                    @include('aspirante.inscripcion.fase2.paso7')
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
                <button type="button" class="close" data-bs-dismiss="modal" onclick='$("#errorModal").modal("toggle")'>&times;</button>
            </div>
            <div class="modal-body" >
                <strong>
                Se encontraron los siguientes errores al procesar tu solicitud:
                <ul id="listaError">
                    <li>Falta</li>
                </ul>
                <strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick='$("#errorModal").modal("toggle")'>cerrar</button>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/multiStepForm.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.js"></script>

    <script type="text/javascript">
        function mensajes(valor){
            if (valor.includes("apellido1")) return "El primer apellido es obligatorio.";

            if (valor.includes("pin")) return "El pin es obligatorio y debe tener como máximo 10 carácteres";

            if(valor.includes("nombre1")) return "El primer nombre es obligatorio.";

            if(valor.includes("direccion")) return "La dirección es obligatoria.";

            if(valor.includes("celular")) return "El número de celular es obligatorio.";

            if(valor.includes("correo electronico")) return "El correo electrónico es obligatorio.";

            let nac = document.getElementById("inputLugarNacimientoPais");
            if(valor.includes("numero registro") && nac.value == 30){
                return "El CUI es obligatorio.";
            }else if(valor.includes("numero registro")){
                return "El número de pasaporte es obligatorio.";
            }

            if(valor.includes("Registro")){
                return "N.O.V. duplicado, debes comunicarte al siguiente correo soporterye@adm.usac.edu.gt indicando el N.O.V. con el que realizaste tu proceso de ingreso a la Universidad de San Carlos De Guatemala";
            }

            return "Error de comunicación con el servidor regrese más tarde";
        }
        $(document).ready(function() {
            cerrar();
            {{-- Configuración del MultiStepForm --}}
            $('#multistepform').smartWizard({
                keyNavigation:false, {{-- Deshabilita la navegacion con las flechas del teclado --}}
                backButtonSupport: false, {{-- Deshabilita regresar al paso anterior con el teclado --}}
                theme: 'dots', {{-- Usa el tema de pdeuntitos engazados --}}
                lang: {
                    next: 'Siguiente',
                    previous: 'Anterior'
                },
                anchorSettings: {
                    anchorClickable: true,
                    removeDoneStepOnNavigateBack: true
                }
            });

            {{-- Dependiendo de la nacionalidad muestra ciertos campos --}}
            $('#inputNacionalidad').on('change', function () {
                var nacionalidad = $(this).val();
                $("div.ocultarDiv").hide();
                if (nacionalidad == 30){ {{-- 30 = código de guatemala --}}
                    $('#cui').show();
                    $('#pasaporte').hide();
                    $('#autoAdscripcionEtnicaEtnia').show();
                    $('#autoAdscripcionEtnicaIdiomaGuatemalteco').show();
                } else {
                    $('#pasaporte').show();
                    $('#cui').hide();
                    $('#autoAdscripcionEtnicaEtnia').hide();
                    $('#autoAdscripcionEtnicaIdiomaGuatemalteco').hide();
                }
            });

            {{-- Obtiene los Municipios del Departamento seleccionado --}}
            $("#inputDepartamento").on('change', function(){
                var idDepartamento = $(this).val();
                if(idDepartamento) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/municipios/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamento
                        },
                        success:function(data) {
                            $("#inputMunicipio").empty();
                            $.each(data, function(key, value){
                                $("#inputMunicipio").append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
            });


            $("#inputTipoEstablecimiento").on('change', getEstablecimientos);
            $('#inputNombreEstablecimiento').on('change', setDireccion);
            {{-- Obtiene los Códigos Postales del Municipio seleccionado --}}
            $("#inputMunicipio").on('change', function(){
                var idMunicipio = $(this).val();
                var input = document.getElementById("inputDepartamento");
                var idDepartamento = input.options[input.selectedIndex].value;
                if(idMunicipio) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/codigosPostales/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamento,
                            municipio: idMunicipio
                        },
                        success:function(data) {
                            $("#inputCodigoPostal").empty();
                            $.each(data, function(key, value){
                                $("#inputCodigoPostal").append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
            });

            {{-- Dependiendo del pais de nacimiento muestra ciertos campos --}}
            $('#inputLugarNacimientoPais').on('change', function () {
                var pais = $(this).val();
                $("div.ocultarDiv").hide();
                if (pais == 30){ {{-- 30 = código de guatemala --}}
                    $('#inputLugarNacimientoDepartamento').show();
                    $('#inputLugarNacimientoMunicipio').show();
                } else {
                    $('#inputLugarNacimientoDepartamento').hide();
                    $('#inputLugarNacimientoMunicipio').hide();
                    $('#inputCodigoPostalEstudio').hide();
                }
            });

            {{-- Lugar de Estudios PAIS, si es distinto de 30 no muestra los campos depto y muni --}}
             $('#inputLugarEstudioPais').on('change', function () {
                var paisestudio = $(this).val();
                $("div.ocultarDiv").hide();
                if (paisestudio == 30){
                    $('#di_departamento').show();
                    $('#di_municipio').show();
                    $('#di_postal').show();
                    $('#di_establecimiento').show();
                    $('#di_jornada').show();
                    $('#di_direccion').show();
                } else {
                    $('#di_departamento').hide();
                    $('#di_municipio').hide();
                    $('#di_postal').hide();
                    $('#di_establecimiento').hide();
                    $('#di_jornada').hide();
                    $('#di_direccion').hide();
                }
            });

             {{-- InputLugarEstudio Depto y Municipio de Estudio--}}
            $("#inputDepartamentoEstudio").on('change', function(){
                var idDepartamentoEstudio = $(this).val();
                if(idDepartamentoEstudio) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/municipios/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamentoEstudio
                        },
                        success:function(data) {
                            let combo = $("#inputMunicipioEstudio");
                            combo.empty();
                            $.each(data, function(key, value){
                                $("#inputMunicipioEstudio").append('<option value="'+ key +'">' + value + '</option>');
                            });
                            combo.change();
                            getEstablecimientos();
                        }
                    });
                }
            });



             {{--Municipio--}}
             $("#inputMunicipioEstudio").on('change', function(){
                var idMunicipioEstudio = $(this).val();
                var input = document.getElementById("inputDepartamentoEstudio");
                var idDepartamentoEstudio = input.options[input.selectedIndex].value;
                if(idMunicipioEstudio) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/codigosPostales/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamentoEstudio,
                            municipio: idMunicipioEstudio
                        },
                        success:function(data) {
                            $("#inputCodigoPostalEstudio").empty();
                            $.each(data, function(key, value){
                                $("#inputCodigoPostalEstudio").append('<option value="'+ key +'">' + value + '</option>');
                            });
                            getEstablecimientos();
                        }
                    });
                }
            });
            {{-- Input Zona lugar de estudio--}}

            {{-- Obtiene los Municipios del Departamento seleccionado para el lugar de nacimiento--}}
            $("#inputLugarNacimientoDepartamento").on('change', function(){
                var idDepartamento = $(this).val();
                if(idDepartamento) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/municipios/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            departamento: idDepartamento
                        },
                        success:function(data) {
                            $("#inputLugarNacimientoMunicipio").empty();
                            $.each(data, function(key, value){
                                $("#inputLugarNacimientoMunicipio").append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
            });

            {{-- Obtiene los Municipios del Departamento seleccionado --}}
            $("#inputNacionalidad").on('change', function(){
                var idNacionalidad = $(this).val();
                if(idNacionalidad) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/valorMatricula/get/') }}",
                        type:"GET",
                        dataType:"json",
                        data: {
                            idNacionalidad: idNacionalidad
                        },
                        success:function(data) {
                            $("#inputMatricula").empty().val('Q' + data + '.00');
                        }
                    });
                }
            });
            let paso = window.location.href.split('#');
            if(paso[1] != "step-5"){
                console.log(paso[1])
                window.location = paso[0];
            }
        });
        //------------------------------------
        $("#formRegistroTitulo").submit(function (event) {
                event.preventDefault();

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });


                $.ajax({
                    url: "{{ route('aspirante.fase2.getDatosMINEDUC') }}",
                    type: 'POST',
                    data: new FormData(this),
                    datatype: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data){
                        $("#datosMineduc").remove();

                        $("#datosRegistroTitulo").append("<div id=\"datosMineduc\">" +
                            "<table class=\"table table-hover table-bordered table-striped\">\n" +
                                "<tbody>\n" +
                                    "<tr>\n" +
                                        "<th>CUI</th>\n" +
                                        "<td>" + data['CUI'] + "</td>\n" +
                                    "</tr>\n" +
                                    "<tr>\n" +
                                        "<th>Registro de Título</th>\n" +
                                        "<td>" + data['registroTitulo'] + "</td>\n" +
                                    "</tr>\n" +
                                    "<tr>\n" +
                                        "<th>Apellidos</th>\n" +
                                        "<td>" + data['apellidos'] + "</td>\n" +
                                    "</tr>\n" +
                                    "<tr>\n" +
                                        "<th>Nombres</th>\n" +
                                        "<td>" + data['nombres'] + "</td>\n" +
                                    "</tr>\n" +
                                    "<tr>\n" +
                                        "<th>Establecimiento</th>\n" +
                                        "<td>" + data['establecimiento'] + "</td>\n" +
                                    "</tr>\n" +
                                    "<tr>\n" +
                                        "<th>Carrera</th>\n" +
                                        "<td>" + data['carrera'] + "</td>\n" +
                                    "</tr>\n" +
                                    "<tr>\n" +
                                        "<th>Fecha de promoción</th>\n" +
                                        "<td>" + data['fechaPromocion'] + "</td>\n" +
                                    "</tr>\n" +
                                "</tbody>\n" +
                            "</table>" +
                            "</div>");

                        alert(JSON.stringify(data));
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        console.log(data);
                        $('#flashMessage').html('');
                        $('#flashMessage').append("<p class=\"alert alert-danger\" >"+data.responseJSON+"\n" +
                            "<button type=\"button\" class=\"close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">\n" +
                            "<span aria-hidden=\"true\">&times;</span>\n" +
                            "</button>\n" +
                            "</p>");
                    }
                });
            });

        {{-- Habilita los tooltips de bootstrap --}}
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    function validarNombres(nombre){
        const regex = /(([A-Z](\w|[áéíóú])+)(\s([A-Z](\w|[áéíóúü'])+))+)|(([a-z](\w|[áéíóú])+)(\s([A-Z](\w|[áéíóúü'])+))+)|([A-ZÑÁÉÍÓÚ](\w|[áéíóúü'])+)|[A-ZÑÁÉÍÓÚ]/g;
        const upperText = nombre.toUpperCase();
        let error = false;

        if(upperText === nombre && nombre.length > 1)
            error =  true;
        else if(nombre.length == 1 && upperText === nombre)
            return true

        const lowerText = nombre.toLowerCase();
        if(lowerText === nombre)
            error = true;

        const valnombre = nombre.match(regex);

        if (!valnombre)
            error = true;

        if(error){
            const listaError = $("#listaError");
            listaError.empty();
            cerrar();
            listaError.append("<li>Los nombres y apellidos deben ingresarse con la primera letra en mayúscula y el resto en minúsculas. Por ejemplo: Elisabeth Swan, Andrea de León</li><br/>Si el sistema no acepta tu nombre, mándanos un correo a soporterye@adm.usac.edu.gt con una copia de tu certificado de nacimiento reciente emitido por RENAP.");
            $("#errorModal").modal();
            document.getElementById("inputSubmit").disabled = false;
        }
        return !error;
    }

	function saveEstudiosPrevios(){
        	cargando();
        	let mun = $('#inputMunicipioEstudio').val();
        	let depto = $('#inputDepartamentoEstudio').val();
        	let tipoE = $('#inputTipoEstablecimiento').val();
        	data = {
        		tipoTitulo: $('#tipoTitulo').val(),
        		inputTipoEstablecimiento: tipoE? tipoE: 0,
        		inputLugarEstudioPais: $('#inputLugarEstudioPais').val(),
        		inputDepartamentoEstudio: depto? depto : 0,
        		inputMunicipioEstudio: mun ==='null'? 0 : mun,
        		inputCodigoPostalEstudio: $('#inputCodigoPostalEstudio').val(),
        		inputNombreEstablecimiento: $('#inputNombreEstablecimiento').val(),
        		inputDireccionEstablecimiento: $('#inputDireccionEstablecimiento').val(),
        		'_token': "{{ csrf_token() }}"
        	}

        	$.ajax({
        		headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        		url: "{{route('aspirante.fase2.estPrev')}}",
        		type:"POST",
        		data: data,
        		dataType: 'JSON',
        		success: function(data){
        			cerrar();
        			$(location).attr('href', "{{route('aspirante.constancia')}}");
        		},
        		error: function(data){
        			cerrar();
        			console.log(data);
        			let listaError = $("#listaError");
                    listaError.empty();
                    listaError.append("<li>Error de comunicación con el servidor, regrese más tarde</li>");
                    $("#errorModal").modal();
        		}
        	});
        }

        function validarcui(cui){
            if(cui === null || cui === undefined || cui === '' || cui.length != 13){
                return false;
            }

            const re = /\d+/g;
            const rst = cui.match(re);

            if (!rst) return false;

            // complemento a 11
            let suma = 0;
            for(let index=0; index<8; index++){
                suma += (index + 2) * parseInt(cui[index]);
            }

            let modulo = suma % 11;

            if(parseInt(cui[8]) !== modulo) return false;

            //validando depto y municipio
            let depto = parseInt(cui.substring(9, 11));
            let muni = parseInt(cui.substring(11))
            if(!(depto<=22) && !(muni <= 32)) return false;

            return true;
        }

        function paso4(){
            cargando();
            document.getElementById("inputSubmit").disabled = true;
            {{-- Datos personales --}}
            var nov = $('#inputNOV').val();
            var pin = $('#inputPIN').val();
            var primerApellido = $('#inputApellido1').val();
            var segundoApellido = $('#inputApellido2').val();
            var primerNombre = $('#inputNombre1').val();
            var segundoNombre = $('#inputNombre2').val();
            var nombre = $('#inputNombre3').val();
            var sexo = document.getElementById("inputSexo");
            sexo = sexo.options[sexo.selectedIndex].value;
            var fechaNacimiento = $('#inputFechaNacimiento').val();

            {{-- Datos de contacto --}}
            var direccion = $('#inputDireccion').val();
            var departamento = document.getElementById("inputDepartamento");
            departamento = departamento.options[departamento.selectedIndex].value;
            var municipio = document.getElementById("inputMunicipio");
            municipio = municipio.options[municipio.selectedIndex].value;
            var codigoPostal = document.getElementById("inputCodigoPostal");
            codigoPostal = codigoPostal.options[codigoPostal.selectedIndex].value;
            var telefono = $('#inputTelefono').val();
            var celular = $('#inputCelular').val();
            var email = $('#inputEmail').val();
            var nit = $('#inputNIT').val();
            //TODO verificar celular

            {{-- Lugar de Nacimiento --}}
            var lugarNacimientoPais = document.getElementById("inputLugarNacimientoPais");
            lugarNacimientoPais = lugarNacimientoPais.options[lugarNacimientoPais.selectedIndex].value;
            var lugarNacimientoDepartamento = document.getElementById("inputLugarNacimientoDepartamento");
            lugarNacimientoDepartamento = lugarNacimientoDepartamento.options[lugarNacimientoDepartamento.selectedIndex].value;
            var lugarNacimientoMunicipio = document.getElementById("inputLugarNacimientoMunicipio");
            lugarNacimientoMunicipio = lugarNacimientoMunicipio.options[lugarNacimientoMunicipio.selectedIndex].value;

            {{-- Nacionalidad y cui o pasaporte --}}
            var nacionalidad = document.getElementById("inputNacionalidad");
            nacionalidad = nacionalidad.options[nacionalidad.selectedIndex].value;
            var numeroRegistro = 0;
            let listaError = $("#listaError");

            if(!validarNombres(primerNombre)) return;
            if(segundoNombre && segundoNombre !== '' && !validarNombres(segundoNombre)) return;
            if(!validarNombres(primerApellido)) return;
            if(segundoApellido && segundoApellido !== '' && !validarNombres(segundoApellido)) return;
            if(nombre && nombre !== '' && !validarNombres(nombre)) return;

            if (nacionalidad == 30){
                numeroRegistro = $('#inputCUI').val();
                let valcui = validarcui(numeroRegistro);
                if(!valcui){
                    document.getElementById("inputSubmit").disabled = false;
                    cerrar();
                    listaError.empty();
                    listaError.append("<li>Ingrese un CUI valido.</li>");
                    $("#errorModal").modal();
                    return;
                }

            } else {
                numeroRegistro = $('#inputPasaporte').val();
                if (numeroRegistro.length < 0){
                    document.getElementById("inputSubmit").disabled = false;
                    cerrar();
                    listaError.empty();
                    listaError.append("<li>El pasaporte es obligatorio</li>");
                    $("#errorModal").modal();
                    return;
                }
            }

            {{-- Autoadscripción Étnica --}}
            var etnia = document.getElementById("inputEtnia");
            etnia = etnia.options[etnia.selectedIndex].value;
            var idiomaMaterno = document.getElementById("inputIdiomaMaterno");
            idiomaMaterno = idiomaMaterno.options[idiomaMaterno.selectedIndex].value;
            var idiomaGuatemalteco = document.getElementById("inputIdiomaGuatemalteco");
            idiomaGuatemalteco = idiomaGuatemalteco.options[idiomaGuatemalteco.selectedIndex].value;
            var idiomaNoGuatemalteco = $('#inputIdiomaNoGuatemalteco').val();

            {{-- Inserta los datos en la tabla información_aspirante --}}
            {{-- donde va route va aspirante.fase2.paso5--}}
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('aspirante.fase2.paso5') }}",
                type:"POST",
                dataType:"JSON",
                data: {
                    nov: nov,
                    pin: pin,
                    apellido1: primerApellido,
                    apellido2: segundoApellido,
                    nombre1: primerNombre,
                    nombre2: segundoNombre,
                    otros_nombres: nombre,
                    //direccion
                    muni_recide: municipio,
                    depto_recide: departamento,
                    cod_Postal: codigoPostal,
                    nacionalidad: nacionalidad,
                    fecha_nacimiento: fechaNacimiento,
                    correo_electronico: email,
                    etnia: etnia,
                    idioma_etnia: idiomaMaterno,
                    idioma_gt: idiomaGuatemalteco,
                    idioma_no_gt: idiomaNoGuatemalteco,
                    sexo: sexo,
                    telefono: telefono,
                    celular: celular,
                    numero_registro: numeroRegistro,
                    pais_nac: lugarNacimientoPais,
                    depto_nac: lugarNacimientoDepartamento,
                    muni_nac: lugarNacimientoMunicipio,

                    direccion: direccion,
                    nit:nit,'_token': "{{ csrf_token() }}"
                },

                success:function(data) {
                    $('#di_msj_establecimiento').hide();
                    if(data.encontrado){
                        bloquearFormulario(data);
                        $('#di_msj_establecimiento').show();
                    }
                    cerrar();
                    document.getElementById("inputSubmit").disabled = false;
                    $('#multistepform').smartWizard('nextStep');
                },

                error: function (data) {
                    cerrar();
                    document.getElementById("inputSubmit").disabled = false;
                    let listaError = $("#listaError");
                    listaError.empty();
                    if( !data.responseJSON || data.responseJSON.length == 0){
                        listaError.append("<li>Error de comunicación con el servidor, regrese más tarde</li>");
                        $("#errorModal").modal();
                        return;
                    }

                    for(var indice in data.responseJSON ){
                        let valor = data.responseJSON[indice];
                        if(data.status == 425){
                            listaError.append("<li>" + mensajes(valor) + "</li>");
                            continue;
                        }
                        listaError.append("<li>"+ mensajes(valor[0]) +"</li>");
                    }
                    $("#errorModal").modal();
                }
            });
        }

function bloquearFormulario(data){
    //selector.empty
    $('#almacenar').val('0');

    if(data.tipo_estudio != 6){
        let tipoT = document.getElementById('tipoTitulo');
        tipoT.value = data.tipo_estudio;
        tipoT.disabled = true;
    }

    let tipoE = document.getElementById('inputTipoEstablecimiento');
    tipoE.value = data.tipo_establecimiento;
    tipoE.disabled = true;

    document.getElementById('inputLugarEstudioPais').disabled = true;
    $('#inputLugarEstudioPais').val('30');

    let deptoE = document.getElementById('inputDepartamentoEstudio');
    deptoE.value = data.cod_depto;
    deptoE.disabled = true;

    let muniE = $('#inputMunicipioEstudio');
    muniE.empty();
    muniE.append('<option value=\'' + data.cod_muni + '\' selected>' + data.municipio + '</option>');
    document.getElementById('inputMunicipioEstudio').disabled = true;

    let codP = $('#inputCodigoPostalEstudio');
    codP.empty();
    codP.append('<option value=\'' + data.cod_postal + '\' selected>' + data.cod_postal + '</option>');
    document.getElementById('inputCodigoPostalEstudio').disabled = true;

    let establecimiento = $('#inputNombreEstablecimiento');
    establecimiento.empty();
    establecimiento.append('<option value=\'' + data.cod_establecimiento + '\' selected >'
        + data.nombre + '</option>');
    document.getElementById('inputNombreEstablecimiento').disabled = true;

    $('#inputDireccionEstablecimiento').val(data.direccion);
    $('#inputJornadaEst').val(data.jornada);
}

let establecimientos = new Map();

    function getEstablecimientos(){
        let depto = $("#inputDepartamentoEstudio").val();
        let sec = $("#inputTipoEstablecimiento").val();
        let muni = $("#inputMunicipioEstudio").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/establecimiento')}}",
            type: "GET",
            dataType: "json",
            data: {
                depto: depto,
                sec: sec,
                muni: muni
            },
            success: function(data){
                let est = $('#inputNombreEstablecimiento');
                est.empty();

                if(!data)
                    return;
                establecimientos = new Map();
                data.forEach(function(elemento){
                    establecimientos.set(elemento.codigo, elemento);
                    est.append('<option value="'+ elemento.codigo +'">' + elemento.nombre + '</option>');
                });

                setDireccion();
            }
        });
    }

    getEstablecimientos();
    function setDireccion(){
        let inputEst = $('#inputNombreEstablecimiento').val();
        if(!inputEst)
            return;

        let establecimiento = establecimientos.get(inputEst);
        $('#inputDireccionEstablecimiento').empty();
        $('#inputDireccionEstablecimiento').val(establecimiento.direccion);
        $('#inputJornadaEst').val(establecimiento.jornada)

    }
        //_________________________________________

    function cargando() {
        $("#carga").animate({ "opacity": "1" }, 1000, function () { $("#carga").css("display", "Block"); });
    }

    function cerrar() {
        $("#carga").animate({ "opacity": "0" }, 1000, function () { $("#carga").css("display", "none"); });
    }
   

    </script>
@endsection
