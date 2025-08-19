{{-- Formulario para Subir fotografía de Perfil --}}

<style>
    ion-icon {
        color:#01fc01e0;
        font-size: 24px;
    }
</style>

<div class="offset-1 col-md-10 mt-3">

    <div class="card">

        <div class="card-header" style="background-color: #006994; color:white">
            Selección de Fotografía
        </div>

        <div class="card-body">
            <h5>Requisitos de Fotografía: </h5>


            <div class="mt-3">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>No debe de exceder los 1MB.</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>La extensión de la fotografía debe ser JPG
                    (.jpg).</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>La fotografía no debe tener más
                    de 6 meses de antigüedad</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>Debe ser de rostro completo, de frente y con
                    ojos abiertos (No Selfie).</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>La cabeza y la parte superior de los hombros
                    deben ocupar entre el 70% y el 80% de la fotografía.</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>Ha de ser en color, centrada y enfocada.</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>Los ojos deben estar abiertos, no rojos por
                    el efecto del flash y no cubiertos por el cabello. </span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>Si usa lentes, los lentes deben ser de
                    cristales claros y tener un aro no muy grueso. </span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>No debe incluir lentes oscuros, sombrero o
                    gorra.</span>
            </div>
            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span> Evite sombras sobre el rostro o en el
                    fondo.</span>
            </div>

            <div class="mt-1">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>El rostro en la fotografía debe tener una
                    expresión normal (boca cerrada).</span>
            </div>

            <div class="mt-1 mb-5">
                <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span>El contraste y la luz en la fotografía deben ser
                    normales.</span>
            </div>

            <div class="row justify-content-center mt-10">
                <div class="col-md-10 ">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">        
                            <img class="d-block w-100" src="{{asset('assets2/img/examples/rye_example.png')}}" alt="Primera Imagen" border="0">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100"  src="{{asset('assets2/img/examples/rye_example2.png')}}" alt="Second slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            
        
            <div class="row justify-content-center mt-3">
                <img src="http://registro.usac.edu.gt/images/Carne/SinFoto.jpg" height="300" width="200" border="0"
                class="img-thumbnail rounded w-30" id="fotoAspirante" />
            </div>

            <div class="row justify-content-center">
                <label for="fileToUpload">Seleccione la fotografía</label>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 custom-file">
                    <input type="file" class="custom-file-input" id="fileToUpload"
                    onchange="actualizarImagen(this)">
                    <label class="custom-file-label" for="fileToUpload" id="fileToUploadLabel">Elegir fotografía</label>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-block disabled" style="background-color: #006994"
                    id="continue" onclick="uploadImage()">Continuar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    /**
     * Variables Globales
     */
    let file = null;
    //recordario cambiar ip por https://registro.usac.edu.gt
    let defaultImage = "http://registro.usac.edu.gt/images/Carne/SinFoto.jpg";
    let imageProfile = "http://registro.usac.edu.gt/images/Carne/{{ $novmd5 }}?{{ $uid }}.jpg"

    console.log(imageProfile);

    /***
     * Funcion para actualiza imagen 
     */
    function actualizarImagen(e) {
        try {
            if (!e.files && !e.files[0]) return
            if (!e.files[0].type.match('image/jpeg')) throw errorModel('error', 'Oops', 'La fotografía debe ser tipo JPG')
            if (e.files[0].size >= 1000001) throw errorModel('error', 'Oops', 'La fotografía debe ser máximo de 1MB')
            
            let img = document.getElementById("fotoAspirante");
            if(img.height > 1200 || img.width > 1200) throw errorModel('error', 'Oops', 'La Fotografía debe ser de máximo 900x900 px');

            document.getElementById("fileToUploadLabel").textContent = e.files[0].name
            document.getElementById("fotoAspirante").src = URL.createObjectURL(e.files[0]);
            document.getElementById("continue").classList.remove("disabled");
            file = e.files[0];

        } catch (e) {
            Swal.fire({
                icon: e.icon,
                title: e.title,
                text: e.message
            });
            defaultValues();
        }
    }

    /**
     * Funcion para subir Imagen y Continuar
     */
    async function uploadImage() {
        if (!file) return


        //Terminos y condiciones de la aplicacion
        let res = await Swal.fire({
            title: 'Terminos y Condiciones',
            html: `<p class="text-justify">Declaro bajo mi responsabilidad, que todos los datos son ciertos y \n
                    que la fotografía que envío para mi Carné de Identificación Universitaria,\n
                    cumple con los requisitos y características requeridas por el \n
                    Departamento de Registro y Estadística. En caso de incumplimiento \n
                    con lo requerido, me someto a las disposiciones de ley por el delito \n
                    de falsedad ideológica, establecidas en el Código Penal, artículo 322\n
                    y a la penalización que ello conlleva.</p> `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Acepto',
            cancelButtonText: 'Cancelar',
        }).then((res) => {
            if (res.isConfirmed) return true;
            return false
        });

        //Verifica si ha aceptado terminos y condiciones
        if (!res) return
        Swal.fire({
            title: 'Espera un momento!',
            html: 'Estamos registrando tu nueva fotografía.'
        })
        Swal.showLoading()

        let formData = new FormData();
        formData.append('foto', file)

        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('aspirante/inscripcion/subirFoto') }}",
            data: formData,
            success: function(data) {
                console.log(data);
                switch(data.statusCode){
                    case 400:{
                        Swal.close()
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.body,
                        })
                        return;
                    }
                    //no autorizado
                    case 401:{
                        Swal.close();
                        window.location="/aspirante/inscripcion/automatica";
                    }
                }
                Swal.close()
                Swal.fire(
                    '',
                    '¡Fotografía Cargada Correctamente!',
                    'success'
                )

                //Actualizamos la fotografia para el step 4 - informacion
                document.getElementById("fotoInformacion").src = imageProfile;
                $('#multistepform').smartWizard('nextStep');
                cerrar();
            },
            error: function(data) {
                defaultValues()
                console.log(data)
                Swal.close()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error con la actualización de la fotografía',
                })
            }
        })
    }

    function defaultValues() {
        document.getElementById("fileToUpload").value = "";
        document.getElementById("fileToUploadLabel").textContent = "Elegir fotografía"
        document.getElementById("fotoAspirante").src = defaultImage
        document.getElementById("continue").classList.add("disabled");
        file = null
    }
</script>
