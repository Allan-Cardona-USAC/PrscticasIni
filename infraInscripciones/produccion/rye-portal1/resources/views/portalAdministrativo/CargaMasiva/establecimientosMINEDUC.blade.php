@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Carga Masiva de Establecimientos</div>
        <div class="card-body">

        <div class="row mt-2 ">
            <div class="col-lg-6 col-sm-12 col-12 text-center mt-2">
                <input type="file" style="display:none;" class="form-control" id="archivo" name="archivo" />
                <input type="button"  class="btn btn-primary btn-lg w-75" value="Agregar Archivo" onclick="openInputFile()"/>
            </div>

            <div class="col-lg-6 col-sm-12 col-12 text-lg-left text-center mt-2">
                <button type="button" name="continuar" id="continuar" onclick="continuar()" class="btn btn-success btn-lg w-75">
                    <i class="fa fa-plus" aria-hidden="true"></i> Cargar Establecimientos </buttpn>
            </div>
        </div>

            <br/>
            <div class="table-responsive" id="TablaPreview2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>DEPARTAMENTO</th>
                        <th>MUNICIPIO</th>
                        <th>ESTABLECIMIENTO</th>
                        <th>DIRECCION</th>
                    </tr>
                    </thead>
                    <tbody id="TablaPreviewDatos">
                        <!-- <div id="TablaPreviewDatos">

                        </div> -->

                    <!-- @foreach($solicitudusuario as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> -->

                            <!-- Boton para ver una tupla especifica -->
                            <!-- <td>
                                <a href="{{ url('/establecimiento/' . 1) }}" title="View solicitudUsuario"><button class="btn btn-info btn-sm col-md-8 col-sm-8"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                            </td>
                        </tr>
                    @endforeach -->

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>
@endsection


@section('javascript')
    <script>
        let array_result = {};
        let cantidad = 0

        function continuar(){
            Swal.fire({
                title: '¿Deseas cargar el archivo?',
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
                        data: {'array': JSON.stringify(array_result)},
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('administrativo/CargaEstablecimientos') }}",
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
                                '¡La información de los establecimientos se ha agregado con éxito!',
                                'success'
                            ).then((result) => {
                                //Acepta ver reporte
                                if (result.isConfirmed) {
                                    Swal.fire({
                                        title: '¿Deseas ver el reporte de errores?',
                                        showCancelButton: true,
                                        confirmButtonText: `Aceptar`,
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        //Acepta actualizarla
                                        if (result.isConfirmed) {
                                            reporte = data.body

                                            if(reporte[2].length == 0){
                                                // No hay problemas pero si duplicados
                                                var totaldup = reporte[0].length
                                                Swal.fire(
                                                    '',
                                                    'Se han encontrado [' + totaldup + '/' + cantidad + '] códigos duplicados. ',
                                                    'warning'
                                                ).then((result) => {
                                                    window.location.href = "{{ url('administrativo/PreviewCargaEstablecimientos') }}";
                                                })
                                            }
                                            else{
                                                // Hay problemas
                                                var totaldup = reporte[0].length
                                                var totalprob = reporte[2].length
                                                Swal.fire({
                                                    title:  'Se han encontrado [' + totaldup + '/' + cantidad + '] códigos duplicados. \n' +
                                                            'Se han encontrado [' + totalprob + '/' + cantidad+ '] problemas en los códigos: ' + reporte[2] ,
                                                    showDenyButton: true,
                                                    showCancelButton: false,
                                                    confirmButtonText: 'Finalizar',
                                                    denyButtonText: `Permanecer con los datos`,
                                                }).then((result) => {
                                                    /* Read more about isConfirmed, isDenied below */
                                                    if (result.isConfirmed) {
                                                        window.location.href = "{{ url('administrativo/PreviewCargaEstablecimientos') }}";
                                                    } else if (result.isDenied) {
                                                        // Se mantienen los datos
                                                    }
                                                })
                                            }
                                        }
                                    })
                                }
                            })
                            console.log(data.body)

                            console.log(data.succes)
                        },
                        error: function(data) {
                            console.log(data)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido al intentar cargar el archivo.',
                            })
                        }
                    })


                }
            })
        }

        function openInputFile(){
            document.getElementById("archivo").click();
            // $("#archivo").click()
        }


        document.getElementById('archivo')
        .addEventListener('change', leerArchivo, false);

        function leerArchivo(e) {

            var archivo = e.target.files[0];
            if (!archivo) {
                return;
            }
            var lector = new FileReader();
            lector.onload = function(e) {
                Swal.fire({
                    title: 'Espera un momento!',
                    html: 'Estamos leyendo la información...'
                })
                Swal.showLoading()
                var contenido = e.target.result.replaceAll('"', '');
                mostrarContenido(contenido);
            };
            lector.readAsText(archivo, 'ISO-8859-1');
        }

        function mostrarContenido(contenido) {
            var lineas = contenido.trim().split('\n')
            // lineas[0] = ''  // Nombre de los parametros
            var ResultingData = lineas.map(function(linea) {
                var columnas = linea.trim().split('\t')
                var result = columnas.map(function(columna) {
                    // es una tupla valida
                    if (columnas.length > 1){
                        return columna
                    }
                    return undefined
                });

                if (result[0] != undefined)
                return result
            });

            // Nombrando indices respectivamente

            var TempArray = ResultingData[0]
            var ArrayFinal = {}
            var Valor = ResultingData

            for (var i = 1; i < Valor.length; i++) {
                ArrayFinal[i] = {};

                if( Valor[i] != undefined){
                    for (var e = 0; e < Valor[i].length; e++) {
                        var param = String(TempArray[e]).toLocaleUpperCase()
                        ArrayFinal[i][param] = Valor[i][e];

                    }
                }
            }
            // console.log(ArrayFinal)
            llenarTablaPreview(ArrayFinal)
        }

        function llenarTablaPreview(ResultingData){
            ResultingData = Object.values(ResultingData);
            document.getElementById('TablaPreviewDatos').innerHTML = ''
            array_result = ResultingData
            var i = 0

            for (tupla of ResultingData){
                if (tupla != undefined && tupla['CODIGO'] != undefined){
                    i ++
                    cantidad ++
                    document.getElementById('TablaPreviewDatos').innerHTML += `

                    <tr>
                        <td> ${i} </td>
                        <td> ${tupla['CODIGO']} </td>
                        <td> ${tupla['DEPARTAMENTO']} </td>
                        <td> ${tupla['MUNICIPIO']} </td>
                        <td> ${tupla['ESTABLECIMIENTO']} </td>
                        <td> ${tupla['DIRECCION']} </td>
                    </tr>`

                    // <!-- Boton para ver una tupla especifica -->
                    // <td>
                    //     <a href="#" title="View Establecimiento"><button class="btn btn-info btn-sm col-md-8 col-sm-8"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                    // </td>
                    //     <a href="{{ url('/solicitud-usuario/' . 1) }}" title="View solicitudUsuario"><button class="btn btn-info btn-sm col-md-8 col-sm-8"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>

                }
            }
            Swal.close()
        }

    </script>
@endsection
