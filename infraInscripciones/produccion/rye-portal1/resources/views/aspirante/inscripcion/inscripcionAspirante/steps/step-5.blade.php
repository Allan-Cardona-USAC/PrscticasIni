<div>
    <div class="offset-1 col-md-10 mt-5">
        <div class="card">
            <div class="card-header" style="background-color: #006994; color:white">
              Informaci&oacute;n General 
            </div>

            <div class="card-body">
                <div>
                    <p>A continuaci&oacute;n, podr&aacute; verificar y/o modificar informaci&oacute;n general de su inscripci&oacute;n.
                    </p>
        
                </div>
                <form>
                    <div class="form-group">
                        <label for="inputCorreo">Correo Electr&oacute;nico</label>
                        <input type="email" class="form-control" id="inputCorreo">
                        <small id="smallInputCorreo" class="form-text text-muted">Ingrese un correo v&aacute;lido ejemplos: usuario@gmail.com, usuario2@hotmail.com </small>
                    </div>
                    <div class="form-group">
                      <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                      <input type="date" class="form-control" id="inputFechaNacimiento">
                      <small id="smallFechaNacimiento" class="form-text text-muted">Fecha de Nacimiento del Estudiante</small>
                    </div>
                    <div class="form-row">
                        <div class="col-md-1">
                            <label for="inputGenero">G&eacute;nero</label>
                        </div>
                        <div class="col-md-11" id="divGenero">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inputRadioM" value="1">
                                <label class="form-check-label" for="inputRadioM">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inputRadioF" value="2">
                                <label class="form-check-label" for="inputRadioF">F</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="inputNumeroFijo">Número de Télefono Residencial</label>
                        <input type="text" class="form-control" id="inputNumeroFijo">
                        <small id="smallNumeroFijo" class="form-text text-muted">Ingrese n&uacute;mero sin guiones ni espacios, si no posee dejar en blanco</small>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="inputNumeroCelular">Número de Celular</label>
                            <input type="text" class="form-control" id="inputNumeroCelular">
                            <small id="smallNumeroCelular" class="form-text text-muted">Ingrese n&uacute;mero sin guiones ni espacios</small>
                        </div>
                        <div class="offset-1 col-md-3 mt-4">
                            <label for="inputCompania">Seleccione su Operador</label>
                        </div>
                        <div class="col-md-4 mt-4" id="divOperadores">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inputRadioTigo" value="tigo">
                                <label class="form-check-label" for="inputRadioTigo">Tigo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inputRadioClaro" value="claro">
                                <label class="form-check-label" for="inputRadioClaro">Claro</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inputRadioMovistar" value="movistar">
                                <label class="form-check-label" for="inputRadioMovistar">Movistar</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2 justify-content-center">
                        <div class="col-md-3 mt-3">
                            <button type="button" class="btn btn-success btn-block" style="background-color: #006994" id="buttonGuardar" onclick="continuarStep6()">Guardar y Continuar</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

<script>
        let fechaNacimiento = "{{$aspirante['fecha_nacimiento']}}";
        document.getElementById("inputCorreo").value = "{{$aspirante['correo_electronico']}}";
        document.getElementById("inputFechaNacimiento").value = fechaNacimiento.split("/").reverse().join("-");
        selectRadioButtonGenero();
        document.getElementById("inputNumeroFijo").value = "{{$aspirante['telefono']}}";
        document.getElementById("inputNumeroCelular").value = "{{$aspirante['celular']}}";
        selectRadioButtonProveedor();
  
    function continuarStep6() {

        try {
            let regexEmail =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if(!regexEmail.test(document.getElementById("inputCorreo").value)) throw errorModel('error', 'Oops', 'Ingrese un Correo Válido');
            if(verificarSeleccionRadioButtons('divGenero') == null) throw errorModel('error', 'Oops', 'Seleccione un Género');
            if(verificarSeleccionRadioButtons('divOperadores') == null) throw   errorModel('error', 'Oops', 'Seleccione un Operador de Telefonía');
            if(document.getElementById("inputFechaNacimiento").value.length == 0) throw   errorModel('error', 'Oops', 'Seleccione una Fecha de Nacimiento Válida');
            if(isNaN(document.getElementById("inputNumeroFijo").value)) throw errorModel('error', 'Oops', 'Debe ingresar un Número Residencial válido sin guiones ni espacios');
            if(isNaN(document.getElementById("inputNumeroCelular").value)) throw errorModel('error', 'Oops', 'Debe ingresar un Número de Celular válido sin guiones ni espacios');
            if(document.getElementById("inputNumeroCelular").value.length == 0) throw errorModel('error', 'Oops', 'Debe ingresar por lo menos un Número Celular');

            Swal.fire({
            title: '!Espera un momento!',
            html: 'Verificando Datos'
            })
            Swal.showLoading()

            $.ajax({
                type: "POST",
                dataType : "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('aspirante/inscripcion/actualizacion') }}",
                data: {
                    email: document.getElementById("inputCorreo").value,
                    fechaNacimiento: document.getElementById("inputFechaNacimiento").value,
                    numeroFijo: document.getElementById("inputNumeroFijo").value,
                    numeroCelular: document.getElementById("inputNumeroCelular").value,
                    operador: verificarSeleccionRadioButtons('divOperadores'),
                    genero: verificarSeleccionRadioButtons('divGenero')
                },
                success: function(data) {
                    if(data.statusCode == 401){
                        window.location='/aspirante/inscripcion/automatica';
                        return;
                    }
                    if(data.statusCode != 200){
                        lanzarErrorSwal('error', 'Oops', data.message);
                        return;
                    }
    
                    console.log(data);
                    Swal.close()
                    Swal.fire(
                        '',
                        'Información Actualizada',
                        'success'
                    )
                    $('#multistepform').smartWizard('nextStep');
                    },
                error: function(data) {
                    console.log(data);
                    Swal.close()
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops',
                        text: 'No se ha podido Actualizar la Información en el Servidor, Intente Más Tarde'
                    });
                }
            });
        } catch (e) {
            console.log(e);
            lanzarErrorSwal(e.icon, e.title, e.message)
        }
    }

    function selectRadioButtonGenero() {
        let type = "{{$aspirante['genero']}}";
        if(type.toLowerCase() == "masculino") document.getElementById("inputRadioM").checked = true; return;        
        if(type.toLowerCase() == "femenino") document.getElementById("inputRadioF").checked = true; return;

    }

    function selectRadioButtonProveedor() {
        let operador = "{{$aspirante['proveedor_cel']}}";
        if(operador.toLowerCase() == "tigo") document.getElementById("inputRadioTigo").checked = true; return;
        if(operador.toLowerCase() == "claro") document.getElementById("inputRadioClaro").checked = true; return;
        if(operador.toLowerCase() == "movistar") document.getElementById("inputRadioMovistar").checked = true; return;
    }


    function verificarSeleccionRadioButtons(idDiv) {
        let items = document.getElementById(idDiv).children

        for (let itemsIndex = 0; itemsIndex < items.length; itemsIndex++) {
            let item = items[itemsIndex];
            if(item.children.length != 0){
                for (let childrenIndex = 0; childrenIndex < item.children.length; childrenIndex++) {
                    let child = item.children[childrenIndex];         
                    console.log(child.tagName);  
                    console.log(child.type);  
                    console.log(child.checked);  
                    if(child.tagName == 'INPUT' && child.type == 'radio' && child.checked == true){
                        return child.defaultValue;
                    }
                }
            }
        }
        return null;
    }

</script>