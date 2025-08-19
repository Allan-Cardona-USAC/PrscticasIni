{{-- Formulario para la validacion del CUI y titulo--}}
<style type="text/css">
  
a.toolcustomize span {
display: none;
}

a.toolcustomize:hover span {
top:2em;
display:block;
left:5em;
position:sticky;
background: #ffffff;
}
</style>


<!-- Card para seleccion por titulo -->
<div class="offset-1 col-md-10 mt-3" id="divChoose">
    <div class="card">
        <div class="card-header" style="background-color: #006994; color:white">
            Verificaci&oacute;n de T&iacute;tulo 
        </div>
    <div class="card-body">
        <div class="row mt-2 ml-2">
            <div class="col-md-12">
                <p class="card-text">Seleccione la Opción para continuar <br><br>
                </p>
            </div>
            <div class="col-md-9 ml-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="opcionRegistro" value="2">
                    <label class="form-check-label" for="exampleRadios2">
                      Verificación por Registro de Título
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="opcionDefault" value="3" checked>
                    <label class="form-check-label" for="exampleRadios3">
                      No posee Título o No se encuentran datos en el MINEDUC
                    </label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <p class="card-text text-danger"> <strong>VERIFIQUE QUE EL NOMBRE Y CUI INGRESADO EN LA PREINSCRIPCÓN ESTE CORRECTO</strong></p>
        </div>
        <div class="form-row mt-3 justify-content-center">
            <div class="col-md-4 mt-3">    
                <button type="button" class="btn btn-success btn-block" style="background-color: #006994" id="buttonContinuarStep4" onclick="mostrarStep()">Continuar</button>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Card para Casos Especiales-->

    <div class="offset-1 col-md-10 mt-3" id="divWarning">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning" style="color: white">
                <h5 class="card-title">Casos Especiales</h5>
            </div>
            <div class="card-body">
              
              <p class="card-text">Excepciones: </p>
              <ul>
                  <li>Ser graduado antes del año 2005.</li>
                  <li>No estar Registrado en la Base de Datos del Ministerio de Educación (MINEDUC)</li>
                  <li>Recién graduado y aún no posee Título</li>
              </ul>
              <p class="card-text">Debes presentarte con todos los documentos requeridos al Departamento de Registro y Estadística, en horario de 8:00 a 15:00.</b></p>
              <br/>
              <div class="row justify-content-center">
                <span class="card-text text-danger h4"><a href="{{asset('assets2/requisitosPing/1.jpg')}}" download="Graduados_en_Guatemala" target="_blank" >DESCARGAR REQUISITOS GRADUADOS EN GUATEMALA</a></span>
              </div>
              <br>
              <!--div class="row justify-content-center">
                <span class="card-text text-danger h4"><a href="{{asset('assets2/requisitosPing/calendario.pdf')}}" download="Calendario_PrimerIngreso2023" target="_blank" >DESCARGAR CALENDARIO DE INSCRIPCIONES PRIMER INGRESO 2023</a></span>
              </div-->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <button type="button" class="btn btn-warning btn-block" id="regresarWarning" onclick="regresarWarning()">Regresar</button>
            </div>
        </div>
    </div>

<!-- Div para verificacion por CUI -->

<div class="offset-1 col-md-10 mt-3" id="divIngresoCUI">
    <div class="card">
        <div class="card-header" style="background-color: #006994; color:white">
            Verificacón de Estudios de Nivel Medio
        </div>
    <div class="card-body">
        <div class="row mt-2 ml-2">
            <div class="col-md-12">
                <p>A continuación deberá ingresar su Código Único de Identificación 
                    para la comprobación de Estudios de Nivel Medio.
                </p>
            </div>
        </div>
            <div class="row mt-3" >
                <div class="offset-2 col-md-8">
                    <form action="" >
                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="labelInputCUI" >Ingrese Código Único de Identificación </label>
                                    <input type="text" name="someid" id="inputCUI" class="form-control" placeholder="Ejemplo 2990209830101">
                                    <small class="formt-text text-muted">-CUI- Código Único de Identificación 
                                        <a href="#" class="toolcustomize">v&eacute;ase 
                                            <span>
                                                <img src="{{asset('assets2/img/examples/rye_example3.png')}}" height="400" width="700">
                                            </span>
                                        </a>
                                    </small>
                                </div>  
                            </div>
                        </div>
                        <div class="form-row mt-2 justify-content-center">
                            <div class="col-md-5 mt-3">    
                                <button type="button" class="btn btn-success btn-block" style="background-color: #006994" id="buttonContinuarStep4" onclick="continuarStep4()">Continuar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Div para verificacion por Registro de Titulo -->

<div class="offset-1 col-md-10 mt-3" id="divRegistroTitulo">
    <div class="card">
        <div class="card-header" style="background-color: #006994; color:white">
            Verificaci&oacute;n de T&iacute;tulo 
        </div>
    <div class="card-body">
        <div class="row mt-2 ml-2">
            <div class="col-md-12">
                <p>A continuaci&oacute;n deber&aacute; ingresar el registro del título del Ministerio de Educación 
                    para la comprobaci&oacute;n del mismo.
                </p>
            </div>
        </div>
            <div class="row mt-3" >
                <div class="offset-2 col-md-8">
                    <form action="" >
                        <div class="form-row mt-3" id="divRegistroTitulo">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="labelInputRegistro">Ingrese Registro del T&iacute;tulo Obtenido </label>
                                    <input type="text" name="someid" id="inputRegistro" class="form-control" placeholder="Ejemplo 201001010001791146000212">
                                    <small class="formt-text text-muted">N&uacute;mero de Registro del T&iacute;tulo <a href="">v&eacute;ase</a></small>
                                </div>  
                            </div>
                        </div>
                        <div class="form-row mt-2 justify-content-center">
                            <div class="col-md-5 mt-3">    
                                <button type="button" class="btn btn-success btn-block" style="background-color: #006994" id="buttonContinuarStep4" onclick="continuarStep4RegistroTitulo()">Continuar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Correo al que deben avocarse los estudiantes
    let correo = "<b>usac2022primeringreso@gmail.com</b>";

    let handleDivRegistroTitulo = document.getElementById("divRegistroTitulo");
        handleDivRegistroTitulo.style.display = "none";

    let handleDivIngresoCUI = document.getElementById("divIngresoCUI");
    //    handleDivIngresoCUI.style.display = "none";
    
    let handleDivWarning = document.getElementById("divWarning");
        handleDivWarning.style.display = "none";

    let handleDivChoose = document.getElementById("divChoose");
        handleDivChoose.style.display = "none";

    function regresarWarning(){
        handleDivChoose.style.display = "block";
        handleDivIngresoCUI.style.display = "none";
        handleDivRegistroTitulo.style.display = "none";
        handleDivWarning.style.display = "none";
    }

    function mostrarStep(){
        
        let opcionRegistro = document.getElementById("opcionRegistro");
        let opcionDefault = document.getElementById("opcionDefault");
        let tipoConsulta =0;
        

        if(opcionRegistro.checked){
            handleDivChoose.style.display = "none";
            handleDivIngresoCUI.style.display = "none";
            handleDivRegistroTitulo.style.display = "block";
            handleDivWarning.style.display = "none";

        }else if(opcionDefault.checked){
            handleDivChoose.style.display = "none";
            handleDivIngresoCUI.style.display = "none";
            handleDivRegistroTitulo.style.display = "none";
            handleDivWarning.style.display = "block";

        }else{
            handleDivChoose.style.display = "block";
            handleDivIngresoCUI.style.display = "none";
            handleDivRegistroTitulo.style.display = "none";
            handleDivWarning.style.display = "none";
        }
    }


    function continuarStep4() {
        try {
            let aspiranteCUI = document.getElementById("inputCUI").value;
            //let aspiranteRegistro = "";
            let tipoConsulta= "";

            if(aspiranteCUI.length == 0)throw errorModel('info', 'Oops', 'Debe ingresar un Número C.U.I., para realizar la comprobación del título');
            if(isNaN(aspiranteCUI)) throw errorModel('error', 'Oops', 'Debe ingresar un número C.U.I. válido sin espacios ni guiones');
            if(aspiranteCUI.length != 13) throw errorModel('error', 'Oops', 'El C.U.I. debe tener 13 dígitos');

            Swal.fire({
            title: '¡Espera un momento!',
            html: 'Verificando título'
            })
            Swal.showLoading()

            $.ajax({
                type: "POST",
                dataType : "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('aspirante/inscripcion/titulo') }}",
                data: {registro: aspiranteCUI, tipoConsulta: 1},
                success: function(data) {
                    console.log(data);
                    Swal.close();
                    /**
                    *Respuesta desde el Controlador
                    */
                    switch(data.statusCode){
                    case 404: {
                        lanzarErrorSwal('error', 'Oops', data.message);
                        return;
                    }

                    case 400: {
                        let handleDivChoose = document.getElementById("divChoose");
                        handleDivChoose.style.display = "block";
                        let handleDivIngresoCUI = document.getElementById("divIngresoCUI");
                        handleDivIngresoCUI.style.display = "none";
                        lanzarErrorSwal('error', 'Oops', data.message);
                        return;
                    }
                    
                    case 401: {
                        window.location = '/aspirante/inscripcion/automatica';
                        return;
                    }

                    case 402: {
                        lanzarErrorSwal('error', 'Oops', data.message);
                        return;
                    }

                    case  200: {
                        console.log(data)
                        if(data.tipoInscripcion == 0){
                            Swal.fire(
                                '',
                                '¡Título Verificado!',
                                'success'
                            )
                            
                        }else {
                            Swal.fire(
                                'Importante',
                                html='Podrá continuar con el proceso de inscripción, sin embargo queda pendiente la verificación del Registro de su Título de Nivel Medio, en caso que su Registro no pueda ser verificado se le notificará por correo electrónico, una vez notificado, de no atender lo solicitado se aplicará el <b>Art. 16 del Reglamento Estudiantil para anular su inscripción</b>',
                                'warning'
                            )
                        }
                        $('#multistepform').smartWizard('nextStep');
                        cerrar();
                    }   
                }
                },
                error: function(data) {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops',
                        text: 'No se ha podido obtener la información del Ministerio de Educación, por favor intente más tarde'
                    });
                }
            });
        } catch (err) {
            console.log(err);
            Swal.fire({
                icon: err.icon,
                title: err.title,
                text: err.message
            });
        }
    }

    function continuarStep4RegistroTitulo() {
        try {
            //let aspiranteCUI = "";
            let aspiranteRegistro = document.getElementById("inputRegistro").value;
            let tipoConsulta="";

            if(aspiranteRegistro.length == 0)  throw errorModel('error', 'Oops', 'Debe ingresar un número de título válido sin espacios ni guiones');
            

            Swal.fire({
            title: '¡Espera un momento!',
            html: 'Verificando título'
            })
            Swal.showLoading()

            $.ajax({
                type: "POST",
                dataType : "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('aspirante/inscripcion/titulo') }}",
                //data: {cui: aspiranteCUI, registro: aspiranteRegistro},
                data: {registro:aspiranteRegistro, tipoConsulta:2},
                success: function(data) {
                    console.log(data);
                    Swal.close();

                    /**
                    *Respuesta desde el Controlador
                    */
                    if(data.statusCode == 404) {
                        lanzarErrorSwal('error', 'Oops', data.message + ', Verifique los datos y vuelva a intentar');
                        return;
                    }

                    if(data.statusCode == 400){
                        lanzarErrorSwal('error', 'Oops', data.message + ', Verifique los datos y vuelva a intentar');
                        return;
                    }

                    if(data.statusCode == 402){
                        lanzarErrorSwal('error', 'Oops', data.message);
                        return;
                    }

                    if(data.statusCode == 200){
                        Swal.fire(
                        '',
                        '¡Título Verificado!',
                        'success'
                        )
                        $('#multistepform').smartWizard('nextStep');
                        cerrar();
                    }
                },
                error: function(data) {
                    Swal.close()
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops',
                        text: 'No se ha podido obtener la información del Ministerio de Educación, por favor intente más tarde'
                    });
                }
            });
        } catch (err) {
            Swal.fire({
                icon: err.icon,
                title: err.title,
                text: err.message
            });
        }
    }

</script>