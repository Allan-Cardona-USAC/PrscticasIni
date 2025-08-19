@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <style>
    
    @media (max-width: 1822px) {
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
    width: 104px;
    }
    }
    </style>
@endsection

@section('content')

@if($errors->any())
        <div class="card mb-3">
                <div class='card-header' style="text-align: center;">
                        <h3>Mensaje</h3>
                </div>
                <div class="alert alert-danger" role="alert" style="margin-bottom: 0px; text-align:center;">
                        {{$errors->first()}}
                </div>
        </div>
@endif
@if($datosMineduc)
<div class="card mb-3">
    <div class='card-header' style="text-align: center;">
            <h3>Tipo Estudiante</h3>
    </div>
    <div class="alert alert-primary" role="alert" style="margin-bottom: 0px; text-align:center;">
        <h3>@if($tipoIngreso == 1) Inscrito en linea @elseif($tipoIngreso == 2) Inscrito Presencial @else No se pudo obtener origen de inscripcion @endif</h3>
    </div>
</div>
@else
<div class="row justify-content-around">
    <div class="card col-md-5" style="padding: 0px; margin-bottom: 1rem !important;">
        <div class='card-header' style="text-align: center;">
                <h3>Tipo Estudiante</h3>
        </div>
        <div class="alert alert-primary" role="alert" style="margin-bottom: 0px; text-align:center;">
            <h3>@if($tipoIngreso == 1) Inscrito en linea @elseif($tipoIngreso == 2) Inscrito Presencial @else No se pudo obtener origen de inscripcion @endif</h3>
            <h3 style="color: red">No se encuentra en MINEDUC</h3>
        </div>
    </div>
</div>
@endif
<div class="row justify-content-around">
    <div class="card col-md-5" style="padding: 0px">
        <div class="card-header">
            <h5>Registro y Estadística</h5>
        </div>
        <div class="card-body">
            <div class="form-row justify-content-center">
                <div class="form-group">
                    @if($carnetmd5 == NULL)
                    <img style="border: 2px; border-style:solid; border-color: #6b6b6b" id="foto_md5" class="img-responsive center-block" src="https://registro.usac.edu.gt/images/Carne/SinFoto.jpg" height="240" width="200">
                    @else
                    <img style="border: 2px; border-style:solid; border-color: #6b6b6b" id="foto_md5" class="img-responsive center-block" src="{{$carnetmd5}}" height="240" width="200">
                    @endif
                </div>
            </div>
        <div class="container">
            <div class="form-row justify-content-start">
                <div class="form-group col-md-12">
                    <label for="carnet">Nombre Completo</label>
                    <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="carnet" name="carnet" value="{{$nombreCompleto}}" readonly required>
                </div>
            </div>
            <div class="form-row justify-content-start">
                <div class="form-group col-md-4">
                    <label for="nombre">Registro Académico</label>
                    <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="nombre" name="nombre" value="{{$numeroRegistro}}" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="carnet">CUI</label>
                    <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="carnet" name="carnet" value="{{$cui}}" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cat">Pruebas Basicas</label>
                    <select class="js-example-basic-single" title="Ver Pruebas" multiple data-live-search="" name="">
                            @foreach($pruebasBasicas as $pruebaBasica)
                            @if($pruebaBasica->id_prueba == 1)
                            <option value="{{$pruebaBasica->id_prueba}}">Biologia</option>
                            @elseif($pruebaBasica->id_prueba == 2)
                            <option value="{{$pruebaBasica->id_prueba}}">Fisica</option>
                            @elseif($pruebaBasica->id_prueba == 3)
                            <option value="{{$pruebaBasica->id_prueba}}">Lenguaje</option>
                            @elseif($pruebaBasica->id_prueba == 4)
                            <option value="{{$pruebaBasica->id_prueba}}">Matematicas</option>
                            @elseif($pruebaBasica->id_prueba == 5)
                            <option value="{{$pruebaBasica->id_prueba}}">Quimica</option>
                            @endif
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row justify-content-start align-items-center">
                <div class="form-group col-md-4">
                    <label for="cui">Fecha Nacimiento</label>
                    <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="cui" name="cui" value="{{$fechaNacimiento}}" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cui">Prueba Específica</label>
                    <input style="background-color: #fff;" type="text" onkeydown="return false;" class="form-control" id="cui" name="cui" value="{{$pruebasEspecificas}}" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cui">Certificado Nacimiento</label>
                    <button type="button" class="btn btn-primary btn-block" onClick="showCerti()" value="">Mostrar</button>
                </div>
            </div>
        </div>
        </div>
    </div>
<!----------------------------------------Tarjeta-------------------------------------------------------------->
@if($datosMineduc)
<div class="card col-md-6" style="padding: 0px">
    <div class="card-header">
        <h5>Mineduc</h5>
    </div>
    <div class="card-body">
        <div class="container">
        <div class="form-row justify-content-start">
            @csrf
            <div class="form-group col-md-4">
                <label for="registro_academico">Registro Académico</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="registro_academico" name="registro_academico" value="{{$numeroRegistro}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="nombres">Nombres</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="nombres" name="nombres" value="{{$datosMineduc->TituloMedio->nombres}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="apellidos">Apellidos</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="apellidos" name="apellidos" value="{{$datosMineduc->TituloMedio->apellidos}}" readonly required>
            </div>
        </div>
        <div class="form-row justify-content-start">
            <div class="form-group col-md-4">
                <label for="cui">CUI</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="cui" name="cui" value="{{$datosMineduc->TituloMedio->cui}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$datosMineduc->TituloMedio->fecha_nacimiento}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="rama">Rama</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="rama" name="rama" value="{{$datosMineduc->TituloMedio->rama}}" readonly required>
            </div>
        </div>
        <div class="form-row justify-content-start">
            <div class="form-group col-md-4">
                <label for="no_registro_titulo">No. Registro Título</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="no_registro_titulo" name="no_registro_titulo" value="{{$datosMineduc->TituloMedio->no_registro_titulo}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="carrera">Carrera</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="carrera" name="carrera" value="{{$datosMineduc->TituloMedio->carrera}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="promovido">Promovido</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="promovido" name="promovido" value="{{$datosMineduc->TituloMedio->promovido}}" readonly required>
            </div>
        </div>
        <div class="form-row justify-content-start">
            <div class="form-group col-md-4">
                <label for="codigo_carrera">Código Carrera</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="codigo_carrera" name="codigo_carrera" value="{{$datosMineduc->TituloMedio->codigo_carrera}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre_carrera">Nombre Carrera</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{$datosMineduc->TituloMedio->nombre_carrera}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="codigo_establecimiento">Código Establecimiento</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="codigo_establecimiento" name="codigo_establecimiento" value="{{$datosMineduc->TituloMedio->codigo_establecimiento}}" readonly required>
            </div>
        </div>
        <div class="form-row justify-content-start">
            <div class="form-group col-md-4">
                <label for="nombre_establecimiento">Nombre Establecimiento</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="nombre_establecimiento" name="nombre_establecimiento" value="{{$datosMineduc->TituloMedio->nombre_establecimiento}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="codigo_Sector">Código Sector</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="codigo_Sector" name="codigo_Sector" value="{{$datosMineduc->TituloMedio->codigo_sector}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="codigo_departamento">Código Departamento</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="codigo_departamento" name="codigo_departamento" value="{{$datosMineduc->TituloMedio->codigo_departamento}}" readonly required>
            </div>
        </div>
        <div class="form-row justify-content-start">
            <div class="form-group col-md-4">
                <label for="codigo_municipio">Código Municipio</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="codigo_municipio" name="codigo_municipio" value="{{$datosMineduc->TituloMedio->codigo_municipio}}" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="fecha_promocion">Fecha Promoción</label>
                <input  type="text" onkeydown="return false;" class="form-control" id="fecha_promocion" name="fecha_promocion" value="{{$datosMineduc->TituloMedio->fecha_promocion}}" readonly required>
            </div>            
        </div>
        </div>
    </div>
</div>
    @if($tipoIngreso == 1)
    <div class="col-md-16" style="background-color: #fff">
        <input type="button" value="Validar" class="btn btn-outline-primary" style="height: 100%;" onClick="continuar('{{$numeroRegistro}}','{{$datosMineduc->TituloMedio->nombres}}', '{{$datosMineduc->TituloMedio->apellidos}}', '{{$datosMineduc->TituloMedio->cui}}', '{{$nivel}}', '{{$nacionalidad_id}}', '{{$ultimaInscripcion[0]['ciclo']}}', '{{$ultimaInscripcion[0]['fecha_inscripcion']}}')"/>
    </div>
    @endif

</div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>
<script src="{{ asset('js/multiStepForm.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
        $('select').selectpicker();
</script>
<script>
        function showCerti(){

        var url = "https://registro.usac.edu.gt/images/Carne/certificados/nov_{{$certiNacimiento}}";
        $.ajax(url,
        {
            statusCode: {
            307: function() {
                alert('page redirect');
            }
        }
        });   

        Swal.fire({
        title: "Certificado de Nacimiento",
        html: '@if($certiNacimiento == NULL)<p>El certificado no se encuentra en nuestros sistemas</p>@else<iframe width="480" height="600" src="{{$certiNacimiento}}"></iframe>@endif'
        });
        }
</script>
<script>
    function continuar(carne, nombre, apellido, cui, nivel, nacionalidad_id, ciclo, fecha_inscripcion){

        console.log(carne)
        console.log(nombre)
        console.log(apellido)
        console.log(nivel)
        console.log(nacionalidad_id)
        console.log(ciclo)
        console.log(fecha_inscripcion)
            data = {
                carne: carne,
                nombre: nombre,
                apellido: apellido,
                cui: cui,
                nivel: nivel,
                nacionalidad_id: nacionalidad_id,
                ciclo: ciclo,
                fecha_inscripcion: fecha_inscripcion
            }

            console.log(data)

            Swal.fire({
                title: '¿Deseas cargar el expediente?',
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
                        data: data,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('administrativo.archivos.generaData') }}",
                        success: function(data) {
                            if (data.statusCode === 400) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.body,
                                })
                                console.log(data.body);
                                return;
                            }

                            Swal.close()
                            Swal.fire(
                                '',
                                '¡La información se ha agregado con éxito!',
                                'success'
                            )
                            
                        },
                        error: function(data) {
                            console.log(data)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar cargar el expediente.',
                            })
                        }
                    })


                }
            })
        }
</script>

<script>


</script>

@endsection