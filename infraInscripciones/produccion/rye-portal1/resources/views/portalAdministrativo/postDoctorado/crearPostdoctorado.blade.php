@extends('layouts.master')



@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <nav class="navbar navbar-light text-white" style="background-color: #0F2949">
        <div class="container-fluid">
            <div class="d-flex row">
                <div class="col-12 col-lg-8">
                    <input class="form-control me-2 mr-2  mt-2 mt-md-0" type="number" id="carnet" placeholder="Registro Académico"
                        aria-label="Search">
                </div>

                <div class="col-12 col-lg-4">
                    <button type="button" class="btn btn-success w-100   mt-2 mt-md-0"
                        onClick="buscarEstudiante()">Buscar</button>
                </div>

            </div>
        </div>
    </nav>
    
    <br/>
    <br/>
    <div id="datoEstudiante" class="" style="display:none">
        <div class="card mb-3">
            <div class="card-header">
            <h3>DATOS ESTUDIANTE</h3>
            </div>
            <div class="card-body" id="detalleEstudiante">
            </div>
            <div class="card-header">
            <h3>NUEVA CARRERA</h3>
            </div>
            <div class="card-body" id="unidadAcademica">
            <input type="hidden" id="nivelCarrera" name="nivelCarrera" value=""/>
                <div class="row"> 
                    <input class="col-md-2 form-control" type="number" id="codUnidad" placeholder="Código Unidad" aria-label="Código" onblur="unidadAcademica()"><br>
                    <p class="col-md-2" id="nombreUnidad"></p>
                </div>
                <div class="row" style="margin-top: 0.2em;"> 
                    <input class="col-md-2 form-control" type="number" id="codExtension" placeholder="Código Extensión" aria-label="Código" onblur="extension()"><br/>
                    <p class="col-md-2" id="nombreExtension"></p>
                </div>
                <div class="row" style="margin-top: 0.2em;"> 
                    <input class="col-md-2 form-control" type="number" id="codCarrera" placeholder="Código Carrera" aria-label="Código" onblur="carrera()"><br/>
                    <p class="col-md-2" id="nombreCarrera"></p>
                </div>
                <div class="row" style="margin-top: 0.2em;"> 
                    <input class="col-md-2 form-control" type="number" id="ciclo" placeholder="Ciclo" aria-label="Código"><br>
                </div>
                <div class="row" style="margin-top: 0.2em;"> 
                <select id="semestre" class="col-md-2 form-control">
                    <option value="none" selected>Semestre</option>
                    <option value="1" >1</option>
                    <option value="2">2</option>
                    </select>
                </div>
                @if(in_array(51,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray()))
                <div class="row" style="margin-top: 0.2em;">
                <input type="hidden" id="tipoRol" name="tipoRol" value="1"/>
                <select id="provisional" class="col-md-2 form-control">
                    <option value="none" selected>Modalidad de Graduación Postgrado</option>
                    <option value="1" >SI</option>
                    <option value="2">NO</option>
                </select>
                </div>
                <div class="row" style="margin-top: 0.2em;">
                <select id="jefe_firma" class="col-md-2 form-control" style="display:none;">
                            <option value="JEFE" >Jefe</option>
                            <option value="SUBJEFE">Subjefe</option>
                </select>
                </div>
                @else
                    <input type="hidden" id="provisional" name="provisional" value="2"/>
                    <input type="hidden" id="tipoRol" name="tipoRol" value="2"/>
                @endif
                <br/>
                <div class="row"> 
                    <button type="button" class="btn btn-success btn-lg"
                        onClick="crearCarrera()">Crear</button>
                    @if(in_array(51,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())) 
                    <form id ="resolucion" style="display:none;" method="post" action="/administrativo/api_post/descargarPDFResolucion">
                        @csrf
                        <input type="hidden" id="cer_ciclo" name="ciclo" value=""/>
                        <input type="hidden" id="cer_carnet" name="carnet" value=""/>
                        <input type="hidden" id="cer_ua" name="ua" value=""/>
                        <input type="hidden" id="cer_ext" name="ext" value=""/>
                        <input type="hidden" id="cer_car" name="car" value=""/>
                        <input type="hidden" id="firmaJefe" name="firmaJefe" value=""/>
                        <input style= "margin-left:20px;" type="submit" value="Descargar Resolución" class="btn btn-success btn-lg" onclick="recuperarFirma()"/>
                    </form>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>

@endsection

@section('javascript')
<script>
    function buscarEstudiante() {
        let carnet = document.getElementById('carnet').value;
        $('#nombreUnidad').empty();
        $('#nombreExtension').empty();
        $('#nombreCarrera').empty();
        $('#ciclo').empty();
        $('#detalleEstudiante').empty();
        document.getElementById('codExtension').value = undefined;
        document.getElementById('codCarrera').value = undefined;
        document.getElementById('codUnidad').value = undefined;
        document.getElementById('ciclo').value = undefined;
        $('#semestre').val("none");

        if (!carnet || carnet.length == 0){
            Swal.fire({"title": "Advertencia", "html": "Ingrese Registro Académico", "icon": "warning"});
            return 
        } 

        Swal.fire({"title":"Buscando","html":"Consultando información"});
        Swal.showLoading();
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/estudiante')}}",
            type: "GET",
            dataType: "json",
            data: {
                carnet: carnet
            },
            success: function(data) {
                if (data.error != 0){
                    Swal.fire({"title": "Advertencia", "html": "No se encontró el Registro Académico","icon": "warning"});
                    $('#datoEstudiante').hide();
                    return
                }
                let datos = $('#detalleEstudiante');
                let estudiante = data.estudiante;
                datos.append('<strong>CARNET: </strong>' + estudiante.carnet + "<br/>");
                datos.append('<strong>NOMBRE: </strong>' + estudiante.primer_apellido+ ' '+ estudiante.segundo_apellido+ ' '+ estudiante.primer_nombre + ' ' + estudiante.segundo_nombre + ' ' + estudiante.nombre + '<br/>');
                datos.append('<strong>CUI: </strong>' + estudiante.cui);
                $('#datoEstudiante').show("slow");
                Swal.close();
            }
        });
    }

    function unidadAcademica(){
        let cod_ua = document.getElementById('codUnidad').value;
        document.getElementById('codExtension').value = undefined;
        document.getElementById('codCarrera').value = undefined;
        $('#nombreUnidad').empty();
        $('#nombreExtension').empty();
        $('#nombreCarrera').empty();



        if (!cod_ua || cod_ua<=0){
            Swal.fire({"title": "Advertencia", "html": "Ingrese unidad académica válida", "icon": "warning"});
            return 
        }

        Swal.fire({"title":"Buscando","html":"Consultando información"});
        Swal.showLoading();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/unidad_academica')}}",
            type: "GET",
            dataType: 'json',
            data: {
                cod_ua: cod_ua
            },
            success: function(data){
                if (data.error !=0){
                    Swal.fire({"title": "Advertencia", "html": "No se encontró la Unidad Académica","icon": "warning"});
                    return                    
                }
                let nombreUA= $('#nombreUnidad');
                nombreUA.append(data.unidad_academica.nombre);
                Swal.close();
            }
        });
    }

    function extension(){
        let cod_ua = document.getElementById('codUnidad').value;
        let cod_ext = document.getElementById('codExtension').value;
        document.getElementById('codCarrera').value=undefined;
        $('#nombreExtension').empty();
        $('#nombreCarrera').empty();

        if (!cod_ext || cod_ext<0){
            Swal.fire({"title": "Advertencia", "html": "Ingrese extensión válida", "icon": "warning"});
            return 
        }

        Swal.fire({"title":"Buscando","html":"Consultando información"});
        Swal.showLoading();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/extension')}}",
            type: "GET",
            dataType: 'json',
            data: {
                cod_ua: cod_ua,
                cod_ext: cod_ext
            },
            success: function(data) {
                if (data.error !=0){
                    Swal.fire({"title": "Advertencia", "html": "No se encontró la Extensión","icon": "warning"});
                    return                    
                }
                let nombreExtension= $('#nombreExtension');
                nombreExtension.append(data.extension.nombre);
                Swal.close();
            }
        });
    }

    function carrera(){
        let cod_ua = document.getElementById('codUnidad').value;
        let cod_ext = document.getElementById('codExtension').value;
        let cod_car = document.getElementById('codCarrera').value;
        $('#nombreCarrera').empty();


        if (!cod_car || cod_car<=0){
            Swal.fire({"title": "Advertencia", "html": "Ingrese carrera válida", "icon": "warning"});
            return 
        }

        Swal.fire({"title":"Buscando","html":"Consultando información"});
        Swal.showLoading();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/carrera')}}",
            type: "GET",
            dataType: 'json',
            data: {
                cod_ua: cod_ua,
                cod_ext: cod_ext,
                cod_car: cod_car
            },
            success: function(data){
                if (data.error !=0){
                    Swal.fire({"title": "Advertencia", "html": "No se encontró la Carrera o Carrera no es de Postgrado","icon": "warning"});
                    return                    
                }
                let nombreCarrera = $('#nombreCarrera');
                $("#nivelCarrera").val(data.carrera.nivel);
                nombreCarrera.append(data.carrera.nombre_carrera);
                Swal.close();
            }
        });
    }

    function crearCarrera(){
        let carnet = document.getElementById('carnet').value;
        let cod_ua = document.getElementById('codUnidad').value;
        let cod_ext = document.getElementById('codExtension').value;
        let cod_car = document.getElementById('codCarrera').value;
        let ciclo = document.getElementById('ciclo').value;
        let semestre = document.getElementById('semestre').value;
        let provisional = document.getElementById('provisional').value;
        let tipoRol = document.getElementById('tipoRol').value;
        let nivelCarrera = document.getElementById('nivelCarrera').value;


        //let valsemestre = semestre.options[semestre.selectedIndex].value;

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/crear_carrera')}}",
            type: "POST",
            dataType: 'json',
            data: {
                ciclo: ciclo,
                semestre: semestre,
                carnet: carnet,
                cod_ua: cod_ua,
                cod_ext: cod_ext,
                cod_car: cod_car,
                provisional: provisional,
                tipoRol : tipoRol,
                nivelCarrera: nivelCarrera,
            },
            success: function (data){
                console.log(data);
                if (data.error !=0){
                    Swal.fire({"title": "Advertencia", "html": data.mensaje,"icon": "warning"});
                    return                    
                }

                if (provisional == 1){
                var resolucion = document.getElementById("resolucion");
                $("#cer_ciclo").val(ciclo);
                $("#cer_carnet").val(carnet);
                $("#cer_ua").val(cod_ua);
                $("#cer_ext").val(cod_ext);
                $("#cer_car").val(cod_car);

                resolucion.style.display = "block";
                document.getElementById("jefe_firma").style.display="block";
                }

                Swal.fire({"title": "Información", "html": "Se ha creado la carrera", "icon": "info"});
            },
            error: function(data) {
                    Swal.fire({"title": "Advertencia", "html": "Comunicarse a informaticarye@adm.usac.edu.gt, adjuntando Registro Académico y códigos de carrera.","icon": "warning"});
                    console.log(data);
                    return                    
            }
        });

    }

    function recuperarFirma(){
        let firmaJefe = document.getElementById('jefe_firma').value;
        $("#firmaJefe").val(firmaJefe);
    }

</script>


@endsection
