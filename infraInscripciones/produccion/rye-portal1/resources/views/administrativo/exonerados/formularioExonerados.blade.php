
@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

<div class="d-flex justify-content-center">
<div class="col-xl-6">

@if($errors->any())
        <div class="card mb-3">
        <div class="card-header">
        <h5>Error</h5>
        <h6 style="color: red;">Estado de la solicitud: {{$errors->first()}}</h6>
        </div>
        </div>
@endif

<div class='container justify-content-center'>

    <div class="card mb-3">
        <div class='card-header'>
            <h3><i class='fa fa-info-circle'></i> Numero de Orientación Vocacional</h3>
        </div>
        <div class="card-body">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="novEstudiante" name="novEstudiante" value="">
                    </div>
                    <div class="form-row">
                        <div class="form-col col-md-6 align-items-center">
                            <input type="button" value="Buscar" class="btn btn-primary" id="submit-btn" onclick="buscarNov()"/>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</div>

<div class='container justify-content-center'>

    <div class="card mb-3">
        <div class='card-header'>
            <h3><i class='fa fa-info-circle'></i> Formulario de Exoneración</h3>
        </div>
        <div class="card-body">
            <form id="datos-personales" method="POST" action="onClick='exonerar()'" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="nombre" name="nombre" value="" readonly required>
                    </div>
                    <div class="form-group col-md-6" id="novDiv" name="novDiv" contentEditable="true">
                        <label for="nov">NOV</label>
                        <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="nov" name="nov" value="" readonly required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="unidad_academica">Unidad Académica</label>
                        <input style="background-color: #fff;" type="text"  class="form-control" pattern="^[0-9]+$" maxlength="2" minlength="2" placeholder="01" id="ua" name="ua" value=""  required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="extension">Extensión</label>
                        <input style="background-color: #fff;" type="text"  class="form-control" pattern="^[0-9]+$" maxlength="2" minlength="2" placeholder="01" id="ext" name="ext" value="" required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="nombre_carrera">Carrera</label>
                        <input style="background-color: #fff;" type="text"  class="form-control" pattern="^[0-9]+$" maxlength="2" minlength="2" placeholder="01" id="car" name="car" value="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="unidad_academica">Autorización</label>
                        <input style="background-color: #fff;" type="text"  class="form-control" placeholder="REF-EX.SOV.000-0000" id="autorizacion" name="autorizacion" value="" required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="fecha">Fecha Aprobado</label>
                        <input type="date" class="form-control form-control-sm" id="fechaAprobado" name="fechaAprobado" value="" required>
                    </div>
                    <div class="form-group col-md-6">
                    </div>
                </div>
                <div class="form-row justify-content-start">
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-row col-md-8 justify-content-center">
                        <input type="button" value="Realizar Exoneración" class="btn btn-primary" id="submit-btn" onclick="exonerar()"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>
@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>
<script src="{{ asset('js/multiStepForm.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

jQuery(document).ready(function(){

			// Listen for the input event.
			jQuery("#ua").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});

            jQuery("#ext").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});

            jQuery("#car").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
});



function buscarNov(){

    novEstudiante = document.getElementById('novEstudiante').value

    estudiante = {
        nov: novEstudiante
    }

    $.ajax({
                data: estudiante,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('administrativo.exonerados.buscarNov') }}",
                success: function(data) {

                    nombreCompletoEstudiante = data.nombre+' '+data.apellido
                    
                    document.getElementById('nov').setAttribute("Value",data.nov)
                    document.getElementById('nombre').setAttribute("Value",nombreCompletoEstudiante)
                    
                },
                error: function(data) {
                    if (data.status === 401) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se han encontrado las pruebas basicas del estudiante',
                        })
                    }else if(data.status == 400){

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El numero de orientacion vocacional ingresado no existe',
                    })
                    }else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido realizar la consulta',
                    })
                    }
                }
            })
}


function exonerar(){

    nov = document.getElementById('nov').value
    ua = document.getElementById('ua').value
    ext = document.getElementById('ext').value
    car = document.getElementById('car').value
    autorizacion = document.getElementById('autorizacion').value
    fechaAprobado = document.getElementById('fechaAprobado').value

    ualength = document.getElementById("ua").value.length
    extlength = document.getElementById("ext").value.length
    carlength = document.getElementById("car").value.length

    if (document.getElementById("nombre").value != "" ) {} else {
        Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, el nombre se encuentra vacio.'
        })
        return true
    }

    if (document.getElementById("ua").value != "") {     
        if(ualength < 2 & ualength >0 ){
            Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, la unidad académica debe contenter 2 digitos.'
            })
            return true
        }
    } else {
            Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, debes ingresar la unidad académica.'    
        })
            return true
    }

    if (document.getElementById("ext").value != "") {     
        if(extlength < 2 & extlength >0 ){
            Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, la extensión debe contenter 2 digitos.'
            })
            return true
        }
    } else {
            Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, debes ingresar la extensión.'    
        })
            return true
    }

    if (document.getElementById("car").value != "") {     
        if(carlength < 2 & carlength >0 ){
            Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, la carrera debe contenter 2 digitos.'
            })
            return true
        }
    } else {
            Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, debes ingresar la carrera.'    
        })
            return true
    }

    if (document.getElementById("autorizacion").value != "") {} else {
        Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, debes ingresar la autorización.'
        })

        return true
    }

    
    if (document.getElementById("fechaAprobado").value != "") {} else {
        Swal.fire({
            title: 'Advertencia',
            html: 'Campo requerido, debes ingresar la fecha aprobado.'
        })

        return true
    }

        datas = {
            nov: nov,
            ua: ua,
            ext: ext,
            car: car,
            autorizacion: autorizacion,
            fechaAprobado: fechaAprobado
        }

        carreraExonerados = {
            ua: ua,
            ext: ext,
            car: car
        }

        $.ajax({
                    data: carreraExonerados,
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('administrativo.exonerados.CarreraExonerar') }}",
                    success: function(data) {
                        if (data.statusCode === 400) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.body,
                            })
                            
                            return;
                        }
                        if (data.statusCode === 401) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.body,
                            })
                            
                            return;
                        }
                        

                        Swal.fire({
                            title: '¿Deseas cargar la exoneración a la unidad académica de '+JSON.stringify(data[0]['unidad_academica'])+', con la extensión en '+JSON.stringify(data[0]['extension'])+', y la carrera de '+JSON.stringify(data[0]['carrera'])+'?',
                            showCancelButton: true,
                            confirmButtonText: `Aceptar`,
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                        //Acepta actualizarla
                        if (result.isConfirmed) {

                        Swal.fire({
                        title: 'Espera un momento!',
                        html: 'Estamos agregando la información a la Base de Datos.'
                        })
                        Swal.showLoading()

                        $.ajax({
                            data: datas,
                            type: "POST",
                            dataType: "json",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('administrativo.exonerados.generar') }}",
                            success: function(data) {
                                if (data.statusCode === 400) {
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.body,
                                })
                            
                                return;
                            }
                                if (data.statusCode === 401) {
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.body,
                                })
                            
                                return;
                            }

                            Swal.close()
                            Swal.fire(
                                '',
                                '¡La carga se ha realizado con éxito!',
                                'success'
                            )
                        
                        },
                        error: function(data) {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar cargar la exoneración.',
                            })
                        }
                    })
                }
            })    
                    },
                    error: function(data) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido al intentar cargar la exoneración.'+data,
                        })
                    }
                })

    }
</script>

<script>


</script>

@endsection