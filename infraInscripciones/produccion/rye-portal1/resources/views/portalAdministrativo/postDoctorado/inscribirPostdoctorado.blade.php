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
    </div>
    </div>
    <div id="carreras">

    </div>

    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>

@endsection

@section('javascript')
<script>

    function buscarEstudiante() {
        let carnet = document.getElementById('carnet').value;
        
        $('#detalleEstudiante').empty();
        $('#carreraEstudiante').empty();


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
                if (data.error !=0){
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
                consultarCarrera();
            }
        });
    }

    function consultarCarrera(){
        let carnet = document.getElementById('carnet').value;

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/carrera_estudiante')}}",
            type: "GET",
            dataType: "json",
            data : {
                carnet: carnet
            },
            success: function(data){

                Swal.close();

                if (data.error !=0 || data.carreras.length==0){
                    Swal.fire({"title": "Advertencia", "html": "El estudiante no cuenta con carreras de Postdoctorado","icon": "warning"});
                    $('#datoEstudiante').hide();
                    return
                }

                let datos = $('#carreras');
                let carreras = data.carreras;

                console.log(carreras);

                carreras.forEach(function(car, id){
                    if (car.eventoActivo == 1)
                        return;
                    if (car.becado == 1)
                        return;

                    let provisional = "";
                    let botonProvisional ="";

                    if (car.provisional == 1){
                        provisional ="PROVISIONAL PREGRADO POSTGRADO";
                        botonProvisional= `<button type="button" style= "margin-left:1em;" class="btn btn-warning btn-lg" onClick="completoPregrado(${car.codfac},${car.codigo_extension},${car.codigo_carrera},${carnet});">Completo Pregrado</button>`;
                    }


                    let div =  `
                        <div id="datoEstudiante" class="">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class= "col-10"><h3>Carrera</h3></div>
                                        <div class= "col-2 d-flex justify-content-end"> ${botonProvisional}</div>
                                    </div>
                                </div>
                                <div class="card-body" id="detalleEstudiante">
                                    <strong>CÓDIGO UNIDAD: </strong>${car.codfac}<strong> UNIDAD ACADÉMICA: </strong>${car.nomfac} <br/>
                                    <strong>CÓDIGO EXTENSIÓN: </strong>${car.codigo_extension}<strong> EXTENSION: </strong>${car.nombre_extension}<br/>
                                    <strong>CÓDIGO CARRERA:</strong>${car.codigo_carrera}<strong> CARRERA: </strong>${car.nombre_carrera}<br/>
                                    <strong style="color:red; font-size:2.0em"> ${provisional}</strong>
                                    <div class="row" style="margin-top: 0.2em;"> <input class="col-md-2 form-control" type="text" id="boleta${id}" placeholder="Número boleta"> </div>
                                    <div class="row" style="margin-top: 0.2em;"> <input class="col-md-2 form-control" type="date" id="fechaBoleta${id}" placeholder="Fecha Boleta"> </div>
                                    <div class="row" style="margin-top: 0.2em;"> <input class="col-md-2 form-control" type="number" id="ciclo${id}" placeholder="Ciclo"> </div>
                                    <div class="row" style="margin-top: 0.2em;"> <select id="semestre${id}" class="col-md-2 form-control"> <option value="none" selected>Semestre</option> <option value="1" >1</option> <option value="2">2</option> </select> </div>
                                    <div class="row" style="margin-top: 0.2em;"> <button type="button" class="btn btn-success btn-lg" onClick="inscribir(${car.codfac},${car.codigo_extension},${car.codigo_carrera},${carnet},${id});">Inscribir</button></div>
                                </div>
                            </div>
                        </div>
                    `;
                    datos.append(div);
                })
            }

        });
    }

    function inscribir(codUnidad,codExtension,codCarrera,carnet, id){
        event.preventDefault();
        let ciclo = document.getElementById('ciclo'+id).value;
        let semestre = document.getElementById('semestre'+id).value;
        let boleta = document.getElementById('boleta'+id).value;
        let fechaBoleta = document.getElementById('fechaBoleta'+id).value;

        if (!ciclo || ciclo<0){
            Swal.fire({"title": "Advertencia", "html": "Ingrese ciclo válido", "icon": "warning"});
            return 
        }

        if (semestre == "none"){
            Swal.fire({"title": "Advertencia", "html": "Seleccione semestre", "icon": "warning"});
            return 
        }

        if (!boleta || boleta.length==0){
            Swal.fire({"title": "Advertencia", "html": "Ingrese boleta válida", "icon": "warning"});
            return 
        }

        if (!fechaBoleta){
            Swal.fire({"title": "Advertencia", "html": "Ingrese fecha válida", "icon": "warning"});
            return 
        }


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/inscribir')}}",
            type: "POST",
            dataType: "json",
            data : {
                ciclo: ciclo,
                semestre : semestre,
                boleta : boleta,
                fecha_boleta: fechaBoleta,
                cod_ua: codUnidad,
                cod_ext: codExtension,
                cod_car: codCarrera,
                carnet : carnet
            },
            success: function(data){
                if(data.error!=0){
                    Swal.fire({"title": "Advertencia", "html": data.mensaje,"icon": "warning"});
                    return
                }

                Swal.fire({"title": "Información", "html": "Inscripción exitosa", "icon": "info"});
            },
            error: function(data){
                Swal.fire({"title": "Advertencia", "html": "Comunicarse a informaticarye@adm.usac.edu.gt, adjuntando Registro Académico y códigos de carrera, ciclo y semestre."});
                return 
            }
        });

    }

    function completoPregrado(codUnidad,codExtension,codCarrera,carnet){
        event.preventDefault();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')},
            url: "{{url('/administrativo/api_post/completoPregrado')}}",
            type: "POST",
            dataType: "json",
            data : {
                cod_ua: codUnidad,
                cod_ext: codExtension,
                cod_car: codCarrera,
                carnet : carnet
            },
            success: function(data){
                if(data.error!=0){
                    Swal.fire({"title": "Advertencia", "html": data.mensaje,"icon": "warning"});
                    return
                }

                Swal.fire({"title": "Información", "html": "Actualización exitosa", "icon": "info"});
                setTimeout(()=> {
                        location.reload();
                    }, 1000);
            },
            error: function(data){
                console.log(data);
                Swal.fire({"title": "Advertencia", "html": "Comunicarse a informaticarye@adm.usac.edu.gt, adjuntando Registro Académico y códigos de carrera, ciclo y semestre."});
                return 
            }
        });

    }
</script>

@endsection
