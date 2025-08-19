@extends('layouts.master')



@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection


@section('content')
    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 col-12 mt-2 text-center">
            <img src="https://registro.usac.edu.gt/images/Carne/{{$carnetmd5}}.jpg" alt="..." class="img-thumbnail rounded " height="250" width="200" id="profile-picture"/>
        </div>
        <div class="col-lg-6 col-sm-12 col-12 mt-2 text-left">
            <h4>Requisitos de la fotograf&iacute;a: </h4>
            <p>
                - No debe de exceder los 800kbs.<br/>
                - La extensi&oacute;n de la foto es JPG (.jpg).<br/>
                - La fotograf&iacute;a debe ser reciente, es decir, no tener m&aacute;s de 6 meses de antig&uuml;edad<br/>
                - Debe ser de rostro completo, de frente y con ojos abiertos (No Selfie).<br/>
                - La cabeza y la parte superior de los hombros deben ocupar entre el 70 y el 80% de la fotograf&iacute;a.<br/>
                - Ha de ser en color, centrada y enfocada.<br/>
                - Los ojos deben estar abiertos, no rojos por el efecto del flash y no cubiertos por el pelo. <br/>
                - Si usa lentes, los lentes deben ser de cristales claros y tener una armadura no muy gruesa. <br/>
                - No debe incluir lentes oscuros, sombrero o gorra.<br/>
                - Tome la foto con un fondo blanco.<br/>
                - Evite sombras sobre el rostro o en el fondo.<br/>
                - El rostro en la foto debe tener una expresi&oacute;n normal (boca cerrada).<br/>
                - El contraste y la luz en la foto deben ser normales.<br/>
            </p>
        </div>
    </div>


    <div class="row mt-2 ">
        <div class="col-lg-6 col-sm-12 col-12 text-center mt-2">
            <input type="file" style="display:none;" class="form-control" id="foto" name="foto" onchange = "updateImage(this)"/>
            <input type="button"  class="btn btn-primary btn-lg w-75" value="Actualizar" onclick="openInputFile()"/>
        </div>

        <div class="col-lg-6 col-sm-12 col-12 text-lg-left text-center mt-2">
            <button type="button" id="continuar" onclick="continuar()" class="btn btn-success btn-lg w-75"> Continuar </buttpn>
        </div>
    </div>


    <div id="loading" class="modal fade " tabindex="-1" role="dialog" data-keyboard="false"
         data-backdrop="static">

    </div>


    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>



@endsection




@section('javascript')
 <script>
    function continuar(){
        let path = document.getElementById('profile-picture').src
        if(path.includes("SinFoto.jpg")){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes incluir una Fotografia antes de continuar',
            })
            return;
        }
        Swal.fire({
            title: 'Terminos y Condiciones',
            html: `<p class="text-justify">Declaro bajo mi responsabilidad, que todos los datos son ciertos y \n
                    que la foto que envío para mi Carné de  Identificación Universitaria,\n
                    cumple con los requisitos y características requeridas por el \n
                    Departamento de Registro y Estadística. En caso de incumplimiento \n
                    con lo requerido, me someto a las disposiciones de ley por el delito \n
                    de falsedad ideológica, establecidas en el Código Penal, artículo 322\n
                    y a la penalización que ello conlleva.</p> `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Acepto',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) window.location.href = "{{ url('estudiante/ValidaciongeneraCarnet') }}";
        })

    }

    function dataURLtoFile(dataurl, filename) {
        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {type:mime});
    }

    function  updateImage(e){
        var img = new Image();
        img.src = e.files[0]
        if(e.files && e.files[0]){
            //Verificar que sea una imagen JPG
            if(e.files[0].type.match('image/jpeg')){
                //Verificar que su tamaño maximo sea 1MB
                if(e.files[0].size <= 1000000 ){
                    let reader = new FileReader();
                    reader.onload = function(ee){

                        var img = new Image()
                        let file_img
                        img.src = reader.result
                        img.onload = function () {
                            if( this.height > 1200 || this.width > 1200 ){
                                Swal.close()
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Tu fotografía es demasiado grande.',
                                    text: 'Recuerda que las dimensiones de la fotografía no deben superarse de 900x900 px para un mejor control.'
                                })
                                return;
                            }
                            this.height = 500
                            this.width = 500
                            file_img = dataURLtoFile(this.src, 'filename.jpg')
                        }

                        Swal.fire({
                            title: '¿Deseas Actualizar tu foto?',
                            showCancelButton: true,
                            confirmButtonText: `Aceptar`,
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            //Acepta actualizarla
                            if (result.isConfirmed) {

                                Swal.fire({
                                    title: 'Espera un momento!',
                                    html: 'Estamos registrando tu nuevo fotografía.'
                                })
                                Swal.showLoading()

                                var formData = new FormData()
                                formData.append('foto', file_img)
                                $.ajax({
                                    type: "POST",
                                    processData: false,
                                    contentType: false,
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{ url('estudiante/updateFotoCarnet') }}",
                                    data: formData,
                                    success: function(data){
                                        if(data.statusCode === 400){
                                            Swal.close()
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: data.body,
                                            })
                                            return;
                                        }
                                        document.getElementById('profile-picture').src = ee.target.result

                                        Swal.close()
                                        Swal.fire(
                                            '',
                                            '¡La foto se ha actualizado con exito!',
                                            'success'
                                        )
                                    },
                                    error: function(data){
                                        document.getElementById("foto").value = "";
                                        Swal.close()
                                        console.log(data)
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Ha ocurrido un error con la actualizacion de la imagen',
                                        })
                                    }
                                })


                            }
                        })

                };
                    reader.onerror = function(e){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error con la lectura de la imagen',
                        })
                        document.getElementById("foto").value = "";
                    }

                    reader.readAsDataURL(e.files[0])
                }
                else{
                   Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Lo sentimos, la imagen es demasiado grande, no debe sobrepasar 1MB',
                    })
                    document.getElementById("foto").value = "";
                }

            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Lo sentimos, solamente se permite imagenes con formato JPG',
                })
                document.getElementById("foto").value = "";
            }
        }
    }

    function openInputFile(){
        document.getElementById("foto").click()
        // $("#foto").click()

    }
 </script>
@endsection
