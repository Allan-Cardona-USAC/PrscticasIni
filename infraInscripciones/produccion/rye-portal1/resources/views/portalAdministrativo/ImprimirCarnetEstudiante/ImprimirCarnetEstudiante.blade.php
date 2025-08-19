@extends('layouts.master')



@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection


@section('content')
    <nav class="navbar navbar-light text-white" style="background-color: #0F2949">
        <div class="container-fluid">
            <div class="d-flex row ml-auto">
                <div class="col-12 col-lg-8">
                    <input class="form-control me-2 mr-2  mt-2 mt-md-0" type="number" id="search" placeholder="Search"
                        aria-label="Search">
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
                <div class="col-12 col-md-6 col-xl-4 mb-3">
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
                             <p class="text-muted">Pagada</p>
                            <div class="row">
                                <div class="col-sm-12 col-12 col-lg-6">
                                    <button type="button" class="btn btn-danger btn-lg w-100" style="font-size:medium" onClick="eliminarFoto('{{$estudiante['carnetmd5']}}','{{$estudiante["carnet"]}}')">Eliminar Fotografia</button>
                                </div>
                                <div class="col-sm-12 col-12 col-lg-6">
                                    <button type="button" class="btn btn-primary mt-2 mt-md-0 btn-lg w-100 " style="font-size:medium" onClick="imprimirCarnet('{{$estudiante["carnetmd5"]}}','{{$estudiante["id_orden_pago"]}}','{{$estudiante["carnet"]}}')">Imprimir y Entregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row mt-2 d-flex justify-content-center">
            <nav>
                <ul class="pagination flex-wrap">
                    <li class="page-item"><a class="page-link"
                            href="{{ url('administrativo/ImprimirCarnetEstudiante?page=') . $previus }}">Previous</a></li>
                    @for ($i = 0; $i < $pages; $i++)
                        @if ($i + 1 <= $pages)
                            @if ($i + 1 == $page)
                                <li class="page-item active"><a class="page-link"
                                        href="{{ url('administrativo/ImprimirCarnetEstudiante?page=') . ($i + 1) }}">{{ $i + 1 }} </a>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ url('administrativo/ImprimirCarnetEstudiante?page=') . ($i + 1) }}">{{ $i + 1 }}</a>
                                </li>
                            @endif
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link"
                            href="{{ url('administrativo/ImprimirCarnetEstudiante?page=') . $next }}">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>


    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>



@endsection




@section('javascript')
    <script>
        var data = {!! json_encode($data) !!};
        var uid = {!! json_encode($uid) !!}


        /*
         * Muestra en la vista, los estudiantes
         * agregando un div con su informacion
         */
        function llenarEstudiantes(data) {
            document.getElementById('cuerpo').innerHTML = ''
            data.forEach((estudiante) => {
                document.getElementById('cuerpo').innerHTML += `
                <div class="col-auto mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color:transparent; border-bottom:none; padding: 25px;">
                            Estudiante
                        </div>
                        <img src="https://registro.usac.edu.gt/images/Carne/${estudiante.carnetmd5}?${uid}.jpg" class="card-img-top" alt="No tiene Imagen" style="width:10rem; height:10rem; margin:auto;">
                        <div class="card-body">
                            <h5 class="f-w-600 m-t-25 m-b-10">${estudiante.nombre}</h5>
                            <h6 class="f-w-600 m-t-25 m-b-10">${estudiante.carnet}</h6>
                            <p class="text-muted">Pagado</p>
                            <div class="row">
                                <div class="col-sm-12 col-12 col-lg-6">
                                    <button type="button" class="btn btn-danger btn-lg w-100" style="font-size:medium"; onClick="eliminarFoto(\'${estudiante.carnetmd5}\',\'${estudiante.carnet}\')">Eliminar Fotografia</button>
                                </div>
                                <div class="col-sm-12 col-12 col-lg-6">
                                    <button type="button" class="btn btn-primary mt-2 mt-md-0 btn-lg w-100 " style="font-size:medium"; onClick="imprimirCarnet(\'${estudiante.carnetmd5}\',\'${estudiante.id_orden_pago}\',\'${estudiante.carnet}\')">Imprimir y Entregar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>`
            })
        }


        /*
         * Consumir la ruta que
         * eliminara la fotografia del estudiante
         */

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
                                    text: data.body,
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
                                text: 'Ha ocurrido al intentar eliminar la fotografia',
                            })
                        }
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
                                    text: data.body,
                                })
                                return;
                            }
                            console.log(data)
                            window.open(`https://registro.usac.edu.gt/imprimeCarne/ejecutarCarnet.php?PARAM_CARNET_IN=${carnet}&nombre=${carnetmd5}_firmado.pdf&currentUri=/reports/rye/CarnePVC`, '_blank');
                            Swal.fire(
                                '',
                                '¡Carnet generado!',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            console.log(data)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar generar el carnet',
                            })
                        }
                    })

                }
            })
        }


          function buscarCarnet() {
            let carnet = document.getElementById("search").value
            data = {
                carnet: carnet,
                estado: 2
            }
            $.ajax({
                data: data,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('administrativo/buscarImprimeCarnet') }}",
                success: function(data) {
                    if (data.statusCode === 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.body,
                        })
                        return;
                    }
                    //console.log(data)
                    document.getElementById("search").value = ""
                    llenarEstudiantes(data.body)
                },
                error: function(data) {
                    //console.log(data)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ha ocurrido al intentar buscar el carnet',
                    })
                }
            })

        }

    </script>
@endsection
