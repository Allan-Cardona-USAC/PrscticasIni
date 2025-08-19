@extends('layouts.master')



@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection


@section('content')
    <nav class="navbar navbar-light text-white" style="background-color: #0F2949">
        <div class="container-fluid">
            {{-- <button type="button" class="btn btn-secondary mb-2" id="abrirFormulario">Ingresar Boleta</button> --}}
            <div class="d-flex row">
                <div class="col-12 col-lg-8">
                    <input class="form-control me-2 mr-2  mt-2 mt-md-0" type="number" id="search" placeholder="Search"
                        aria-label="Search" onkeypress="handlekey(event)">
                </div>

                <div class="col-12 col-lg-4">
                    <button type="button" class="btn btn-success w-100   mt-2 mt-md-0"
                        onClick="buscarCarnet()">Buscar</button>
                </div>

            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5" id="cuerpo">
            @foreach ($data as $estudiante)
                <div class="col-12 col-md-6 col-xl-4 mb-3" id="{{$estudiante["carnet"]}}">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header"
                            style="background-color:transparent; border-bottom:none; padding: 25px;">
                            Estudiante
                        </div>
                        <img src="https://registro.usac.edu.gt/images/Carne/{{ $estudiante['carnetmd5'] }}?{{$uid}}.jpg"
                            class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                        <div class="card-body">
                            <h5 class="f-w-600 m-t-25 m-b-10">{{ $estudiante['nombre'] }}</h5>
                            <h6 class="f-w-600 m-t-25 m-b-10">{{ $estudiante['carnet'] }}</h6>
                            @if ($estudiante['estado'] == 1)
                                <p class="text-muted">Pendiente de Pago</p>
                            @endif
                            @if ($estudiante['estado'] == 2)
                                <p class="text-muted">Pago Validado</p>
                            @endif
                            @if ($estudiante['estado'] == 3)
                                <p class="text-muted">Entregado</p>
                            @endif

                            <div class="row">
                                
                                
                                @if ($estudiante['estado'] == 1)
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-danger" style="font-size:small" 
                                            onClick="eliminarFoto('{{$estudiante['carnetmd5']}}','{{$estudiante["carnet"]}}')">Eliminar Fotografia
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                    <button type="button" class="btn btn-primary" style="font-size:small"
                                        onClick="validarPago({{ $estudiante['id_orden_pago'] }},{{ $estudiante['carnet'] }})">Validar
                                        Pago</button>
                                    </div>
                                @endif

                                @if ($estudiante['estado'] == 2) 
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-danger" style="font-size:small" 
                                            onClick="eliminarFoto('{{$estudiante['carnetmd5']}}','{{$estudiante["carnet"]}}')">Eliminar Fotografia
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-primary" style="font-size:small" 
                                            onClick="imprimirCarnet('{{$estudiante["carnetmd5"]}}','{{$estudiante["id_orden_pago"]}}','{{$estudiante["carnet"]}}')"><i class="fa fa-print"></i> <br>Imprimir
                                        </button>
                                    </div>
                                @endif

                                @if ($estudiante['estado'] == 3)
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-danger" style="font-size:small" 
                                            onClick="eliminarFoto('{{$estudiante['carnetmd5']}}','{{$estudiante["carnet"]}}')">Eliminar Fotografia
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-primary" style="font-size:small"; onClick="imprimirCarnet('{{$estudiante["carnetmd5"]}}','{{$estudiante["id_orden_pago"]}}','{{$estudiante["carnet"]}}')"> <i class="fa fa-print"></i> <br>Imprimir</button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-warning" style="font-size:small";  onClick="regresarEstado('{{$estudiante["id_orden_pago"]}}','{{$estudiante["carnet"]}}')"> Regresar Estado</button>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>

        <div class="row mt-2 d-flex justify-content-center">
            <nav>
                <ul class="pagination flex-wrap">
                    <li class="page-item"><a class="page-link"
                            href="{{ url('estudiante/BusquedaGeneral?page=') . $previus }}">Previous</a>
                    </li>
                    @for ($i = 0; $i < $pages; $i++)
                        @if ($i + 1 <= $pages)
                            @if ($i + 1 == $page)
                                <li class="page-item active"><a class="page-link"
                                        href="{{ url('administrativo/BusquedaGeneral?page=') . ($i + 1) }}">{{ $i + 1 }}
                                    </a>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ url('administrativo/BusquedaGeneral?page=') . ($i + 1) }}">{{ $i + 1 }}</a>
                                </li>
                            @endif
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link"
                            href="{{ url('administrativo/BusquedaGeneral?page=') . $next }}">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Modal para el ingreso Manual de las boletas -->
    <div class="modal fade" id="modalBoleta" tabindex="-1" role="dialog" aria-labelledby="modalBoleta"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ingreso de Boleta Manual</h5>
                </div>
                <div class="modal-body" id="modal-bodyid">
                    <form id="formulario" enctype="multipart/form-data" method='post'>
                        <div class="row mb-3">
                            <div class="col">
                                <label fo r="carnet" class="form-label">Carnet</label>
                                <input type="number" class="form-control" id="carnet" name="carnet" required>
                                <input type="hidden" class="form-control" id="idboleta" name="idboleta" readonly> 
                            </div>
                            <div class="col">
                                <label fo r="boletaDeposito" class="form-label">No. Boleta Deposito</label>
                                <input type="number" class="form-control" id="boletaDeposito" name="boletaDeposito"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label fo r="transferenciaBancaria" class="form-label">No. Transferencia
                                    Bancaria</label>
                                <input type="number" class="form-control" id="transferenciaBancaria"
                                    name="transferenciaBancaria" required>
                            </div>
                            <div class="col">
                                <label fo r="monto" class="form-label">Monto</label>
                                <input type="number" class="form-control" id="monto" name="monto" required>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col">
                                <label for="banco">Banco</label>
                                <select id="banco" class="form-control" name="banco">
                                    <option selected>Banrural</option>
                                    <option>G&T</option>
                                    <option>Bantrab</option>
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 input-group ">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="boleta" name="boleta"
                                    onchange="updateImage(this)">
                                <label class="custom-file-label" for="boleta">Subir Boleta</label>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <img src="" alt="Uploaded" id="preview" class="img-thumbnail" style="display:none">
                        </div>          
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" id="enviarBoleta" onClick="enviar()"
                                        class="btn btn-primary btn-lg btn-block">Enviar</button>
                                </div>
                                
                                <div class="col">
                                    <button type="button" class="btn btn-secondary btn-lg btn-block" id="cerrarformulario" onClick="cerrarModal()" >Cerrar</button>
                                    </div>
                            </div>              
                        </div>  
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>



@endsection




@section('javascript')
    <script>
        var data = {!! json_encode($data) !!}
        var uid = {!! json_encode($uid) !!}



        /*
         Metodo para escuchar el ingreso de enter

        */



        function handlekey(e){
            if(e.keyCode === 13){
                e.preventDefault(); // Ensure it is only this code that runs
                buscarCarnet();
            }
        }


        function llenarmodalconDatosEstudiante(data){   
            //console.log(data)
            document.getElementById('modal-bodyid').innerHTML = ''    
            document.getElementById('modal-bodyid').innerHTML += `
            <form id="formulario" enctype="multipart/form-data" method='post'>
                        <div class="row mb-3">
                            <div class="col">
                                <label fo r="carnet" class="form-label">Carnet</label>
                                <input type="number" class="form-control" id="carnet" name="carnet" value="${data.carnet}" readonly>                                 
                                <input type="hidden" class="form-control" id="idboleta" name="idboleta" value="${data.id}" readonly>                                 
                            </div>
                            <div class="col">
                                <label fo r="boletaDeposito" class="form-label">No. Boleta Deposito</label>
                                <input type="number" class="form-control" id="boletaDeposito" name="boletaDeposito"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label fo r="transferenciaBancaria" class="form-label">No. Transferencia
                                    Bancaria</label>
                                <input type="number" class="form-control" id="transferenciaBancaria"
                                    name="transferenciaBancaria" required>
                            </div>
                            <div class="col">
                                <label fo r="monto" class="form-label">Monto</label>
                                <input type="number" class="form-control" id="monto" name="monto" required>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col">
                                <label for="banco">Banco</label>
                                <select id="banco" class="form-control" name="banco">
                                    <option selected>Banrural</option>
                                    <option>G&T</option>
                                    <option>Bantrab</option>
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 input-group ">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="boleta" name="boleta"
                                    onchange="updateImage(this)">
                                <label class="custom-file-label" for="boleta">Subir Boleta</label>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <img src="" alt="Uploaded" id="preview" class="img-thumbnail" style="display:none">
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" id="enviarBoleta" onClick="enviar()"
                                        class="btn btn-primary btn-lg btn-block">Enviar</button>
                                </div>
                                
                                <div class="col">
                                    <button type="button" class="btn btn-secondary btn-lg btn-block" id="cerrarformulario" onClick="cerrarModal()" >Cerrar</button>
                                    </div>
                            </div>              
                        </div>                                                    
                    </form>

            `
        }

        /*
         * Controla el tipo de imagen que se esta subiendo
         * y muestra un preview de la misma
         */
        function updateImage(e) {
            if (e.files && e.files[0]) {
                //Verificar que su tamaño maximo sea 1MB
                if (e.files[0].size <= 1000000) {
                    let reader = new FileReader();
                    reader.onload = function(ee) {
                        if ($("#preview").css('display') === 'none') $("#preview").toggle()
                        if (e.files[0].type.match('image/jpeg')) document.getElementById('preview').src = ee.target
                            .result
                        else document.getElementById('preview').src =
                            "https://img.flaticon.com/icons/png/512/337/337946.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF"
                    }

                    reader.onerror = function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error con la lectura de la imagen'
                        })
                        document.getElementById("boleta").value = "";
                    }

                    reader.readAsDataURL(e.files[0])
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Lo sentimos, la imagen es demasiado grande, no debe sobrepasar 1MB'
                    })
                    document.getElementById("boleta").value = "";
                }
            }
        }

        function eliminarFoto(carnet, carnet2) {
            data = {
                carnet: carnet,
                carnet2: carnet2
            }

            Swal.fire({
                title: '¿Estas seguro de eliminar la fotografia?',
                text: "No se puede revertir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        data: data,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('administrativo/eliminarFoto') }}",
                        success: function(data) {
                            if (data.statusCode === 400) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.body
                                })
                                return;
                            }
                            //console.log(data)
                            Swal.fire(
                                '',
                                '¡Imagen Eliminada!',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            //console.log(data)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar eliminar la fotografia'
                            })
                        }
                    })

                }
            })

        }


        async function enviar() {
            $("#formulario").on('submit', function(e) {
                e.preventDefault()
                let image = document.getElementById("preview")
                if (image.getAttribute('src') == "") {
                    Swal.fire({
                        icon: 'warning',
                        text: 'La imagen es obligatoria'
                    })
                    return;
                }

                Swal.fire({
                    title: 'Terminos y Condiciones',
                    html: `<p class="text-justify">Declaro bajo mi responsabilidad,que me hago responsable de la veracidad de los datos.</p> `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Acepto',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    //Acepta actualizarla
                    if (result.isConfirmed) {

                        var form = $("#formulario")[0];
                        var formData = new FormData(form)

                        Swal.fire({
                            title: 'Creando ...',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        })
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ url('administrativo/boletaManual') }}",
                            data: formData,
                            success: function(data) {
                                if (data.statusCode === 400) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: data.body
                                    })
                                    return;
                                }

                                $("#formulario").trigger("reset");
                                image.src = ""
                                $("#preview").toggle()

                                Swal.fire(
                                    '',
                                    "¡Boleta Almacenada Exitosamente!",
                                    // '¡Boleta Almacenada Exitosamente!',
                                    'success'
                                ).then(async function() {
                                    await buscarCarnet(formData.carnet)
                                });
                            },
                            error: function(data) {
                                console.log(data)
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Ha ocurrido un error el ingreso de la boleta'
                                })
                            }
                        })


                    }
                })
            })
        }

        /*
         * Valida si la boleta ha sido pagada,
         * si es asi la actualiza al estado 2
         */
        async function validarPago(id, carnet) {
            data = {
                id: id,
                carnet: carnet
            }
            const data2 = data;
            $.ajax({
                data: data,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('administrativo/validarBoleta') }}",
                success: function(data) {                    
                    if (data.statusCode == 400) {                        

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "Error al validar la boleta"
                        })
                        .then(async function() {                    
                            llenarmodalconDatosEstudiante(data2)
                            $("#modalBoleta").modal('show')
                            return;
                        })
                        return;
                    }

                    
                    //console.log(data)
                    Swal.fire(
                        '',
                        '¡Pago Validado!',
                        'success'                    
                    ).then(async function() {
                        await buscarCarnet(carnet)                          
                    });
                },
                error: function(data) {
                    //console.log(data)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ha ocurrido al intentar validar la boleta'
                    })               
                }
            })
        }


        async function buscarCarnet(cardef = null) {
            let carnet = document.getElementById("search").value
            
            if (cardef !== null) {
                carnet = cardef
            }
            data = {
                carnet: carnet,
                estado: 1
            }
            $.ajax({
                data: data,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('administrativo/buscarImprimeCarnetSinEstado') }}",
                success: function(data) {
                    if (data.statusCode === 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.body
                        }).then(function() {
                            
                        })
                        return;
                    }
                    //console.log(data)
                    if (cardef !== null) {
                        //console.log(data.body[0])
                        llenarEstudiante(data.body)                        
                    }else {
                        //console.log(data.body)
                        llenarEstudiantes(data.body)
                    }
                    // document.getElementById("search").value = ""
                },
                error: function(data) {
                    //console.log(data)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ha ocurrido al intentar buscar el carnet'
                    })
                }
            })

        }

        function imprimirCarnet(carnetmd5, id,carnet) {
            data = {
                carnetmd5: carnetmd5,
                id: id,
                carnet: carnet
            }

            Swal.fire({
                title: '¿Desea generar el carnet?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    // retornar las carreras que tiene el estudiante
                    $.ajax({
                        data: data,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('administrativo/buscarCarrerasSimultaneo') }}",
                        success: function(data3) {
                            //console.log(data3)
                            data2 = data3.body
                            if (data2 === null) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Error al buscar las carreras del estudiante'
                                })
                                return;
                            }
                            // swalfire con un select box para seleccionar la carrera
                            let options = {}
                            data2.forEach(function(carrera) {
                                console.log(`${carrera.cod_ua.toString()}${carrera.cod_ext.toString()}${carrera.cod_car.toString()}`)
                                options[`${carrera.cod_ua.toString()}${carrera.cod_ext.toString()}${carrera.cod_car.toString()}`] = carrera.nombre_carrera
                                
                            })
                            //console.log(options)
                            Swal.fire({
                                title: 'Seleccione la carrera',
                                input: 'select',
                                inputOptions: options,                                
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si',
                                cancelButtonText: "No",
                                inputValidator: (value) => {
                                    return new Promise((resolve) => {
                                        if (value === '') {
                                            resolve('Debe seleccionar una carrera')
                                        } else {
                                            resolve()
                                        }
                                    })
                                }
                            }).then((result) => {
                                //console.log(result)
                                if (result.isConfirmed) {
                                    var datacon; 
                                    for(let i = 0; i < data2.length; i++){
                                        const data3 = data2[i].cod_ua.toString()+data2[i].cod_ext.toString()+data2[i].cod_car.toString()
                                        if(data3 == result.value){
                                            datacon = data2[i]
                                        }
                                    }
                                    //console.log(result.value)
                                    console.log(datacon)
                                    ////
                                    $.ajax({
                                        data: data,
                                        type: "POST",
                                        dataType: "json",
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        url: "{{ url('administrativo/imprimirCarnetPDF') }}",
                                        success: function(data) {
                                            if (data.statusCode === 400) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: data.body
                                                })
                                                return;
                                            }
                                            //REEMPLAZAR DATOS PARA LA CREACION DEL PDF
                                            //datacon.carnet
                                            //datacon.cod_ua
                                            //datacon.cod_ext
                                            //datacon.cod_car
                                            const urlcarnet = `https://registro.usac.edu.gt/imprimeCarne/ejecutarCarnet.php?PARAM_CARNET_IN=${datacon.carnet}&PARAM_COD_CAR_IN=${datacon.cod_car}&PARAM_COD_UA_IN=${datacon.cod_ua}&PARAM_COD_EXT_IN=${datacon.cod_ext}&nombre=${carnetmd5}_firmado.pdf&currentUri=/reports/ryenuevo/CarnePVC_1`;
                                            window.open(urlcarnet, '_blank');
                                            Swal.fire(
                                                '',
                                                '¡Carnet generado!',
                                                'success'
                                            ).then(function() {
                                                buscarCarnet(carnet)
                                            });
                                        },
                                        error: function(data) {
                                            console.log(data)
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Ha ocurrido al intentar generar el carnet'
                                            })
                                        }
                                    })

                                    /////

                                }
                            })
                        },
                        error: function(data) {
                            //console.log(data)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar buscar las carreras del estudiante'
                            })
                        }
                    })
                    
                    
                    

                }
            })
        }

        function cerrarModal() {
            $("#modalBoleta").modal('hide');
        }
        
        async function regresarEstado(boleta, carnet) {
            console.log(carnet)
            data = {
                id: boleta,
                carnet: carnet
            }

            Swal.fire({
                title: '¿Estas seguro de regresar a "Pagado"?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        data: data,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('administrativo/regresarEstado2') }}",
                        success:  function(data) {
                            if (data.statusCode === 400) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.body
                                })
                                return;
                            }
                            //console.log(data)
                            Swal.fire(
                                '',
                                '¡Se ha actualizado el estado!',
                                'success'
                            ).then(async function() {
                                await buscarCarnet(carnet)                          
                            });
                        },
                        error: function(data) {
                            //console.log(data)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar actualizar el estado'
                            })
                        }
                    })

                }
            })

        }

        $("#abrirFormulario").click(function() {
            $("#modalBoleta").modal('show')
        })

        $("#cerrarformulario").click(function() {
            $("#modalBoleta").modal('hide');
        });
        /*
         * Muestra en la vista, los estudiantes
         * agregando un div con su informacion
         */
        function llenarEstudiantes(data) {
            //console.log(data)
            document.getElementById('cuerpo').innerHTML = ''
            data.forEach(function(estudiante) {
                if (estudiante.estado == 1) {
                    
                    document.getElementById('cuerpo').innerHTML += `
                    <div class="col-12 col-md-6 col-xl-4 mb-3" id="${estudiante.carnet}">                    
                        <div class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                                Estudiante
                            </div>
                            <img src="https://registro.usac.edu.gt/images/Carne/${estudiante.carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                            <div class="card-body">
                                <h5 class="f-w-600 m-t-25 m-b-10">${estudiante.nombre}</h5>
                                <h6 class="f-w-600 m-t-25 m-b-10">${estudiante.carnet}</h6>
                                <p class="text-muted">Pendiente de Pago</p>
                                <div class="row">
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-danger" style="font-size:small" 
                                            onClick="eliminarFoto(\'${estudiante.carnetmd5}\',\'${estudiante.carnet}\')">Eliminar Fotografia
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                    <button type="button" class="btn btn-primary" style="font-size:small"
                                            onClick="validarPago(\'${estudiante.id_orden_pago}\',\'${estudiante.carnet}\')">Validar
                                        Pago</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                } else if (estudiante.estado == 2){
                    document.getElementById('cuerpo').innerHTML += `
                    <div class="col-12 col-md-6 col-xl-4 mb-3" id="${estudiante.carnet}">    
                        <div class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                                Estudiante
                            </div>
                            <img src="https://registro.usac.edu.gt/images/Carne/${estudiante.carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                            <div class="card-body">
                                <h5 class="f-w-600 m-t-25 m-b-10">${estudiante.nombre}</h5>
                                <h6 class="f-w-600 m-t-25 m-b-10">${estudiante.carnet}</h6>
                                <p class="text-muted">Pago Valido</p>
                                <div class="row">
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-danger" style="font-size:small" 
                                            onClick="eliminarFoto(\'${estudiante.carnetmd5}\',\'${estudiante.carnet}\')">Eliminar Fotografia
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-primary" style="font-size:small" 
                                            onClick="imprimirCarnet(\'${estudiante.carnetmd5}\',\'${estudiante.id_orden_pago}\',\'${estudiante.carnet}\')"><i class="fa fa-print"></i> <br>Imprimir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                } else if (estudiante.estado == 3){
                    document.getElementById('cuerpo').innerHTML += `
                    <div class="col-12 col-md-6 col-xl-4 mb-3" id="${estudiante.carnet}">    
                        <div class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                                Estudiante
                            </div>
                            <img src="https://registro.usac.edu.gt/images/Carne/${estudiante.carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                            <div class="card-body">
                                <h5 class="f-w-600 m-t-25 m-b-10">${estudiante.nombre}</h5>
                                <h6 class="f-w-600 m-t-25 m-b-10">${estudiante.carnet}</h6>
                                <p class="text-muted">Entregado</p>
                                <div class="row">
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-danger" style="font-size:small" 
                                            onClick="eliminarFoto(\'${estudiante.carnetmd5}\',\'${estudiante.carnet}\')">Eliminar Fotografia
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-primary" style="font-size:small"; onClick="imprimirCarnet(\'${estudiante.carnetmd5}\',\'${estudiante.id_orden_pago}\',\'${estudiante.carnet}\')"> <i class="fa fa-print"></i> <br>Imprimir</button>
                                    </div>
                                    <div class="col-sm-12 col-12 col-lg-4">
                                        <button type="button" class="btn btn-warning" style="font-size:small";  onClick="regresarEstado(\'${estudiante.id_orden_pago}\',\'${estudiante.carnet}\')"> Regresar Estado</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                }
            })
        }
    
        function llenarEstudiante(data) {
            //console.log(data)
            document.getElementById(data[0].carnet).innerHTML = ''
            if (data[0].estado == 1) {
                document.getElementById(data[0].carnet).innerHTML += `
                <div class="card" style="width: 18rem;">
                    <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                        Estudiante
                    </div>
                    <img src="https://registro.usac.edu.gt/images/Carne/${data[0].carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                    <div class="card-body">
                        <h5 class="f-w-600 m-t-25 m-b-10">${data[0].nombre}</h5>
                        <h6 class="f-w-600 m-t-25 m-b-10">${data[0].carnet}</h6>
                        <p class="text-muted
                        ">Pendiente de Pago</p>
                        <div class="row">
                            <div class="col-sm-12 col-12 col-lg-4">
                                <button type="button" class="btn btn-danger" style="font-size:small" 
                                    onClick="eliminarFoto(\'${data[0].carnetmd5}\',\'${data[0].carnet}\')">Eliminar Fotografia
                                </button>
                            </div>
                            <div class="col-sm-12 col-12 col-lg-4">
                            <button type="button" class="btn btn-primary" style="font-size:small"
                                    onClick="validarPago(\'${data[0].id_orden_pago}\',\'${data[0].carnet}\')">Validar
                                Pago</button>
                            </div>
                        </div>
                    </div>
                </div>`
            } else if (data[0].estado == 2){
                document.getElementById(data[0].carnet).innerHTML += `
                <div class="card" style="width: 18rem;">
                    <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                        Estudiante
                    </div>
                    <img src="https://registro.usac.edu.gt/images/Carne/${data[0].carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                    <div class="card-body">
                        <h5 class="f-w-600 m-t-25 m-b-10">${data[0].nombre}</h5>
                        <h6 class="f-w-600 m-t-25 m-b-10">${data[0].carnet}</h6>
                        <p class="text-muted
                        ">Pago Valido</p>
                        <div class="row">
                            <div class="col-sm-12 col-12 col-lg-4">
                                <button type="button" class="btn btn-danger" style="font-size:small" 
                                    onClick="eliminarFoto(\'${data[0].carnetmd5}\',\'${data[0].carnet}\')">Eliminar Fotografia
                                </button>
                            </div>
                            <div class="col-sm-12 col-12 col-lg-4">
                                <button type="button" class="btn btn-primary" style="font-size:small" 
                                onClick="imprimirCarnet(\'${data[0].carnetmd5}\',\'${data[0].id_orden_pago}\',\'${data[0].carnet}\')"><i class="fa fa-print"></i> <br>Imprimir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>`
            } else if (data[0].estado == 3){
                document.getElementById(data[0].carnet).innerHTML += `
                <div class="card" style="width: 18rem;">
                    <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                        Estudiante
                    </div>
                    <img src="https://registro.usac.edu.gt/images/Carne/${data[0].carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                    <div class="card-body">
                        <h5 class="f-w-600 m-t-25 m-b-10">${data[0].nombre}</h5>
                        <h6 class="f-w-600 m-t-25 m-b-10">${data[0].carnet}</h6>
                        <p class="text-muted
                        ">Entregado</p>
                        <div class="row">
                            <div class="col-sm-12 col-12 col-lg-4">
                                <button type="button" class="btn btn-danger" style="font-size:small" 
                                    onClick="eliminarFoto(\'${data[0].carnetmd5}\',\'${data[0].carnet}\')">Eliminar Fotografia
                                </button>
                            </div>
                            <div class="col-sm-12 col-12 col-lg-4">
                                <button type="button" class="btn btn-primary" style="font-size:small"; onClick="imprimirCarnet(\'${data[0].carnetmd5}\',\'${data[0].id_orden_pago}\',\'${data[0].carnet}\')"> <i class="fa fa-print"></i> <br>Imprimir</button>
                            </div>
                            <div class="col-sm-12 col-12 col-lg-4">
                                <button type="button" class="btn btn-warning" style="font-size:small";  onClick="regresarEstado(\'${data[0].id_orden_pago}\',\'${data[0].carnet}\')"> Regresar Estado</button>
                            </div>
                        </div>
                    </div>
                </div>`
            }

        }


        
    </script>
@endsection
