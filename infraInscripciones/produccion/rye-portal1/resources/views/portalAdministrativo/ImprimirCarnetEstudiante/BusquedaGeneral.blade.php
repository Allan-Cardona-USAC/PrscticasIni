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

    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>



@endsection


@section('javascript')
    <script>
        var data = {!! json_encode($data) !!}
        var uid = {!! json_encode($uid) !!}


        function buscarCarnet() {
            let carnet = document.getElementById("search").value
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
                url: "{{ url('administrativo/buscarImprimeCarnet') }}",
                success: function(data) {
                    if (data.statusCode === 400) {
                      // busqueda al estado 2
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
                                  // busqueda al estado 3
                                    data = {
                                        carnet: carnet,
                                        estado: 3
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
                                                    text: 'No se ha encontrado al estudiante con el carné: ' + carnet + ' en ninguna parte.' ,
                                                })
                                                return;
                                            }

                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Se ha encontrado!',
                                                text: 'El estudiante con el carné: ' + carnet + ' se ha encontrado con su carné generado.',
                                                footer: '<a href="{{ route('administrativo.CarnetsGenerados') }}">Desea ir allí?</a>'
                                            })
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
                                  // fin de la busqueda en el estado 3
                                }

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Se ha encontrado!',
                                    text: 'El estudiante con el carné: ' + carnet + ' se ha encontrado listo para generar el carné.',
                                    footer: '<a href="{{ route('administrativo.ImprimirCarnetEstudiante') }}">Desea ir allí?</a>'
                                })
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
                      // fin de la busqueda en el estado 2
                    }

                    Swal.fire({
                        icon: 'success',
                        title: 'Se ha encontrado!',
                        text: 'El estudiante con el carné: ' + carnet + ' se ha encontrado listo para validar su pago.',
                        footer: '<a href="{{ route('administrativo.PendientePagoCarnetEstudiante') }}">Desea ir allí?</a>'
                    })
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


        $("#abrirFormulario").click(function() {
            $("#modalBoleta").modal('show')
        })
    </script>
@endsection
