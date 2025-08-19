{{-- Formulario para Subir Pdf y Verificacion de CUI --}}

<div class="offset-1 col-md-10 mt-3">

    <div class="card">
        <div class="card-header" style="background-color: #006994; color:white">
            Documento de Identificación
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>Se debe adjuntar un Certificado de Nacimiento, cumpliendo las siguientes restricciones:</p>
                    
                    <div class="mt-3">
                        <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span> El archivo debe estar en formato PDF (.pdf) y contener ambos lados del Certificado de Nacimiento </span>
                    </div>
                    <div class="mt-1">
                        <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span> El archivo debe contener únicamente 2 páginas </span>
                    </div>
                    <div class="mt-1">
                        <ion-icon name="checkmark-circle-outline" style="vertical-align: middle"></ion-icon> <span> El Certificado de Nacimiento tiene que ser emitido por el RENAP </span>
                    </div>
                    <br/>
                    <div class="mt-1 mb-5">
                        El certificado será validado por personal del Departamento de Registro y Estadística,
                        si el certificado no es válido se requerirá nuevamente.
                    </div>
                </div>
            </div>
            <div class="row mt-3" >
                <div class="offset-2 col-md-8">
                    <form action="">
                        @csrf
                        <div class="form-row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputPDF">Adjuntar Certificado de Nacimiento</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputPDF" name="inputPDF" onchange="cargaPDF(this)" required>
                                        <label class="custom-file-label" for="inputPDF" id="labelInputPDF">Seleccionar archivo</label>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center mt-3" id="divPreviewCertificado">
                            <div class="form-row col-md-12 justify-content-center" >
                                <h4>Previsualización - Certificado de Nacimiento</h4>
                            </div>
                                <canvas class= "mt-4" id="the-canvas" style="margin:0 auto; display:block"></canvas>
        
                                <div class="form-row col-md-12 mt-3 justify-content-center">
                                    <a id="prev" class="btn mr-2" style="background-color: #006994; color:white"><</a>
                                    <a id="next" class="btn " style="background-color: #006994; color:white">></a>
                                </div>
            
                                <div class="form-row col-md-12 justify-content-center">
                                    <span class="mt-2"><span id="page_num"></span> / <span id="page_count"></span></span>
                                </div>
                            
                        </div>
                        <div class="form-row mt-2 justify-content-center">
                            <div class="col-md-5 mt-3">    
                                 
                                <button type="button" class="btn btn-success btn-block disabled" style="background-color: #006994" id="buttonContinuarStep3" onclick="continuarStep3()">Continuar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let partidaNacimientoFile = null
    let handleDivPreviewCertificado = document.getElementById("divPreviewCertificado");
        handleDivPreviewCertificado.style.display = "none";

    async function cargaPDF(e) {
        console.log(e.files[0]);
        try {
            if(!e.files || !e.files[0]) throw errorModel('warning', 'Oops', 'No se eligió ningún archivo')
            if(!e.files[0].type.match('application/pdf')) throw errorModel('error', 'Oops','El formato del archivo debe ser PDF (.pdf)')
            if(e.files[0].size >= 1000001) throw errorModel('error', 'Oops', 'El archivo debe ser máximo de 1MB')
            if(!(await checkPaginas(e.files[0], 2))) throw errorModel('error', 'Oops', 'El archivo no cumple con las páginas requeridas')
                partidaNacimientoFile = e.files[0];
                document.getElementById("labelInputPDF").textContent = e.files[0].name
                document.getElementById("buttonContinuarStep3").classList.remove("disabled");
                
                handleDivPreviewCertificado.style.display= "block";
                pdfURL = URL.createObjectURL(e.files[0]);
                pdfjsLib.getDocument(pdfURL).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;
                    pageNum = 1;
                    renderPage(pageNum);
                });

        } catch (err) {
            console.log(err);
            defaultValuesStep2();
            Swal.fire({
                icon: err.icon,
                title: err.title,
                text: err.message
            });
        }
    }            

    async function continuarStep3() {
        if (!partidaNacimientoFile) return


        //Terminos y condiciones de la aplicacion
        let res = await Swal.fire({
            title: 'Terminos y Condiciones',
            html: `<p class="text-justify">Declaro bajo mi responsabilidad, que todos los datos son ciertos y \n
                    que el documento que envío para mi Inscripción Universitaria,\n
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
            html: 'Estamos validando tu Certificado de Nacimiento'
        })
        Swal.showLoading()

        let formData = new FormData();
        console.log($('#inputPDF'));
        
        jQuery.each(jQuery('#inputPDF')[0].files, function(i, file) {
            formData.append('inputPDF', file);
        });

        token = $('meta[name="csrf-token"]').attr('content')? 
            $('meta[name="csrf-token"]').attr('content'):
            document.getElementsByName('_token')[0].value;

        console.log(formData);

        $.ajax({
            method: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{$ruta_carga}}",
            data: formData,
            success: function(data) {
                console.log(data);
                switch (data.statusCode) {
                    case 400:{
                        defaultValuesStep2();
                        Swal.close()
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.body,
                        })
                        return;
                    }
                    case 401:{
                        Swal.close();
                        //redirección a 'aspirante/inscripcion/automatica'
                        window.location="/aspirante/inscripcion/automatica";
                    }
                }
                Swal.close()
                Swal.fire(
                    '',
                    '¡El archivo se ha cargado correctamente!',
                    'success'
                )

                try{
                    cerrar();
                    $('#multistepform').smartWizard('nextStep');
                } catch(error){
                    setTimeout = setTimeout(()=>location='/estudiante', 5000);
                }
            },
            error: function(data) {
                console.log(data);
                defaultValuesStep2();
                Swal.close()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error en la carga del archivo',
                })
            }
        })
    }

    function defaultValuesStep2() {
        document.getElementById("inputPDF").value = "";
        document.getElementById("labelInputPDF").textContent = "Seleccionar archivo"
        document.getElementById("buttonContinuarStep3").classList.add("disabled");
        partidaNacimientoFile = null
        handleDivPreviewCertificado.style.display = "none";
    }

    async function checkPaginas(file, paginasRequeridas) {       
        pdfURL = URL.createObjectURL(file);
        let loadTask = pdfjsLib.getDocument(pdfURL);
        let countPages = 0
        
        await loadTask.promise.then((doc) =>{
            countPages = doc.numPages; 
        });       
        
        return countPages == paginasRequeridas ? true : false
    }


    /**
    +   Funciones para ver el renderizar pdf dentro del html
    */

    let pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 0.8,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');


   function renderPage(num) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport({scale: scale});
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            //Contexto del Canvas
            var renderContext = {
            canvasContext: ctx,
            viewport: viewport
            };
        
            var renderTask = page.render(renderContext);

            // Esperamos a que renderiza la pagina
            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    //Verificamos que lapgina ha sido renderizada
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

    //Actualizamos el numero de la pagina
    document.getElementById('page_num').textContent = num;
    }

    /**
     * Si tiene a continuacion una pagina para renderizar
     * Automaticamente se renderiza para su visualizacion 
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    /**
    * Visualiza la pagina anterior del pdf
    */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Visualiza la pagina siguiente del pdf.
     */
    function onNextPage() {
      if (pageNum >= pdfDoc.numPages) {
        return;
      }
      pageNum++;
      queueRenderPage(pageNum);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

</script>