@extends('layouts.master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection



@section('content')

    <div class="alert alert-primary animate__animated animate__shakeX">
        <strong>Puede inscribirse u obtener su constancia de ciclo {{$cicloActivo}} presionando clic en el siguiente botón: </strong>
        <a class="btn btn-warning" href="{{ url('estudiante/reinscripcion') }}"><i class="fa fa-fw fa-edit"></i><span>Inscripción</span></a>
    </div>

    @if($errors->any())
        <div class="card mb-3">
                <div class='card-header'>
                        <h3>Observaciones</h3>
                </div>
                <div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
                        {{$errors->first()}}
                </div>
        </div>
    @endif

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 mx-auto">
    <div class="card mx-auto">
      <div class="card-header">
        <h3><i class="fa fa-address-card-o"></i> Datos personales</h3>
      </div>
      <div class="card-body">
          <h1 class="profile-username text-center">
            {{ Auth::guard('estudiante')->user()->nombre1 . ' ' . Auth::guard('estudiante')->user()->primer_apellido }}
          </h1>
          <h3 class="text-muted text-center">
              PIN: {{ Auth::guard('estudiante')->user()->pin }}
          </h3>
          @if(Auth::guard('estudiante')->user()->activo == 0)
            <h5 class="text-danger text-center">Bloqueado por: {{Auth::guard('estudiante')->user()->observaciones}}</h5>
          @endif
          <img id="foto_md5" class="img-responsive center-block" src="https://registro.usac.edu.gt/images/Carne/{{$carnetmd5}}?{{$uid}}.jpg" height="200" width="150" border="0" alt="Fotografía pendiente">
          <br/>
          <input style="width: 150px;" type="button"  class="btn btn-success btn-sm" value="Actualizar Fotografía" onclick="openInputFile()"/>
          <br/>
        <form id="datos-personales" method="POST" action="{{ route('estudiante.perfil') }}">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="carnet">Registro Académico</label>
              <input type="text" class="form-control" id="carnet" name="carnet"
                  value="{{ Auth::guard('estudiante')->user()->carnet }}"
                  readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="cui">CUI/PASAPORTE</label>
              @if(Auth::guard('estudiante')->user()->cod_nac == 30)
                <input type="text" class="form-control" id="cui" name="cui"
                    value="{{ Auth::guard('estudiante')->user()->cui }}" required pattern="\d+" readonly/>
              @else
                <input type="text" class="form-control" id="cui" name="cui"
                  value="{{ Auth::guard('estudiante')->user()->numero_pasaporte }}" readonly/>
              @endif
                  <p id="cuiErr" class="text-danger"></p>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="nombre">Nombre completo</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ Auth::guard('estudiante')->user()->getNombreCompleto() }}"
                readonly
              >
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion"
                value="{{ Auth::guard('estudiante')->user()->direccion }}"
              >
              <p id="direccionErr" class="text-danger"></p>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="departamento">Departamento</label>
              <select class= "form-control custom-select" id="departamento" name ="departamento">
                  @foreach($departamentos as $departamento)
                    <option value="{{$departamento->codigo}}"
                          @if(Auth::guard('estudiante')->user()->codigo_departamento_recide == $departamento->codigo)
                          selected
                          @endif >{{$departamento->nombre}}
                    </option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="municipio">Municipio</label>
              <select class= "form-control custom-select" id="municipio" name = "municipio">
                  @foreach($municipios as $municipio)
                      <option value="{{$municipio->cod_muni}}"
                              @if(Auth::guard('estudiante')->user()->codigo_municipio_recide == $municipio->cod_muni)
                              selected
                              @endif >{{$municipio->municipio}}</option>
                  @endforeach
              </select>
            </div>
            <!--<div class="form-group col-md-3">
              <label for="postal">Zona</label>
              <select class="form-control custom-select" id="postal" name = "postal">
                  @foreach($codigosPostales as $codigoPostal)
                    <option value="{{$codigoPostal->cod_postal}}"
                        @if(Auth::guard('estudiante')->user()->cod_postal == $codigoPostal->cod_postal)
                        selected
                        @endif>{{$codigoPostal->pais}}
                    </option>
                  @endforeach
              </select>
            </div>-->
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="etnia">Autoadscripción étnica</label>
              <select class= "form-control custom-select" id="etnia" name ="etnia">
                  @foreach($etnias as $etnia)
                    <option value="{{$etnia->id}}"
                          @if(Auth::guard('estudiante')->user()->etnia== $etnia->id)
                          selected
                          @endif >{{$etnia->etnia}}
                    </option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-6" >
            <label for="discapacidad">¿Posee alguna discapacidad?</label>
              <select class="form-control custom-select" id="discapacidad" name="discapacidad">
                @foreach($discapacidades as $discapacidad)
                  <option value="{{$discapacidad->cod_discapacidad}}"
                    @if(Auth::guard('estudiante')->user()->cod_discapacidad == $discapacidad->cod_discapacidad))
                    selected
                    @endif >{{$discapacidad->discapacidad}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6" >
              <label for="idiomaMaterno">Idioma Materno</label>
              <select class="form-control custom-select" id="idiomaMaterno" name="idiomaMaterno">
                @foreach($idiomas as $idioma)
                  <option value="{{$idioma->cod_idioma}}"
                    @if(Auth::guard('estudiante')->user()->idioma == $idioma->cod_idioma))
                    selected
                    @endif >{{$idioma->idioma}}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="segundoIdioma">Segundo Idioma</label>
              <select class= "form-control custom-select" id="segundoIdioma" name ="segundoIdioma">
                @foreach($idiomas as $idioma)
                  <option value="{{$idioma->cod_idioma}}"
                    @if(Auth::guard('estudiante')->user()->otroIdioma == $idioma->cod_idioma))
                    selected
                    @endif >{{$idioma->idioma}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6" >
              <label for="nit">NIT</label>
              <input type="text" class="form-control" id="nit" name="nit"
                value="{{ Auth::guard('estudiante')->user()->nit }}"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ Auth::guard('estudiante')->user()->email }}"
                    required
                >
                <p id="emailErr" class="text-danger"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="telefono">Teléfono de casa</label>
              <input type="text" class="form-control" id="telefono"  name="telefono"
                  value="{{ Auth::guard('estudiante')->user()->telefono }}"
              >
            </div>
            <div class="form-group col-md-4">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular"  name="celular"
                  value="{{ Auth::guard('estudiante')->user()->celular }}"
                  required
              >
              <p id="celularErr" class="text-danger"></p>
            </div>

            <input type="button" name="btn" value="Actualizar datos" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary" />
            
            <div class="card-footer" style="margin-top:5px;">
              <p class="text-danger" > Si tu nombre es incorrecto, por favor dirígete a Registro y Estadística o a Control Académico de tu Centro Universitario con el siguiente documento: </p>
              <ul class="text-danger">
                <li> Certificación de Nacimiento para personas de nacionalidad guatemalteca ó Pasaporte legible para personas extranjeras</li>
              </ul>
           </div>
            
<!--
          <h4>Fotografia</h4>
          <p class="card-footer smal">
              - No debe de exceder los 1MB.<br>
              - La extensión de la foto es JPG (.jpg).<br>
              - La fotografía debe ser reciente, es decir, no tener más de 6 meses de antigüedad<br>
              - Debe ser de rostro completo, de frente y con ojos abiertos (No Selfie).<br>
              - La cabeza y la parte superior de los hombros deben ocupar entre el 70 y el 80% de la fotografía.<br>
              - Ha de ser en color, centrada y enfocada.<br>
              - Los ojos deben estar abiertos, no rojos por el efecto del flash y no cubiertos por el pelo.<br>
              - Si usa lentes, los lentes deben ser de cristales claros y tener una armadura no muy gruesa.<br>
              - No debe incluir lentes oscuros, sombrero o gorra.<br>
              - Tome la foto con un fondo blanco o con un fondo casi-blanco.<br>
              - Evite sombras sobre el rostro o en el fondo.<br>
              - El rostro en la foto debe tener una expresión normal (boca cerrada).<br>
              - El contraste y la luz en la foto deben ser normales.<br>
          </p>

          <div class="input-group col-md-6">
                <div class="custom-file">
                    <input type="file" id="foto" name="foto"
                           class="custom-file-input"
                           aria-describedby="fotoDescripcion" value="" onchange="function_perfil_imagen(this)"  required>
                    <label class="custom-file-label" for="foto">Fotografía tipo pasaporte reciente</label>
                </div>

            </div> -->

            <input type="file" style="display:none;" class="form-control" id="foto" name="foto" onchange = "updateImage(this)"/>

            <div class="col-md-6" id="fotoSubida"> </div>

            <br/>
          </div>
        </form>
      </div>

    </div>
  </div>

  <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4>Declaración de responsabilidad</h4>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                  Por medio de la presente declaro bajo mi estricta responsabilidad,
                  que todos los datos personales y documentos que aporto a la Universidad
                  de San Carlos de Guatemala para mi proceso de inscripción, son ciertos y
                  legítimos por lo que en caso de falsedad y/o alteración estoy enterado que
                  la Universidad de San Carlos de Guatemala a través del Departamento de
                  Registro y Estadística SUSPENDERÁ el proceso de inscripción que inicié.
                  En caso de duda autorizo expresamente al Departamento de Registro y Estadística
                  a efectuar todas las consultas que estime necesarias a efecto de determinar
                  la legitimidad o falsedad de las informaciones aportadas la que determinará
                  las acciones legales y reglamentarias a aplicar.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" id="cancelar" onclick="cerrar()" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <a href="#" id="submit" class="btn btn-sm btn-success success">Aceptar</a>
            </div>
        </div>
      </div>
  </div>
</div>

    <script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js"></script>


@endsection

@section('javascript')

  <script>
    $(document).ready(function(){
      $("#departamento").on("change",function(){
        let codigo_departamento = $(this).val();
        $.ajax({
          headers:{
            "x-csrf": $("meta[name=\"csrf-token\"]").attr("content")},
            url : "{{url('/municipios/get/')}}",
            type : "GET",
            dataType : "json",
            data : {departamento: codigo_departamento},
            success : function(data){
              $("#municipio").empty();
              $.each(data,function(key,value){
                $("#municipio").append("<option value= '"+ key +"'>"+ value + "</option>");
              });
            },
            error: function(data){
              console.log(data);
            }
        });  
      });

      Swal.fire({
                    icon: 'warning',
                    title: 'Información',
                    html: 'Recuerda mantener tus datos actualizados'
                });

      $("#municipio").on("change", function(){
        let codigo_municipio = $(this).val();
        let codigo_departamento = document.getElementById("departamento");
        let idDepto = codigo_departamento.options[codigo_departamento.selectedIndex].value;
        $.ajax({
          headers: {
            "x-csrf": $("meta[name=\"csrf-token\"]").attr("content")},
            url : "{{url('/codigosPostales/get/')}}",
            type: "GET",
            dataType: "json",
            data : {departamento: idDepto, municipio : codigo_municipio},
            success : function (data){
              console.log(data);
              $("#postal").empty();
              $.each(data, function (key,value){
                $("#postal").append("<option value '"+ key + "'>"+ value + "</option>");
              });
            },
            error: function (data){
              console.log(data);
            }
        })
      });
    });

    $('#submit').click(function(){
      /* when the submit button in the modal is clicked, submit the form */

      //cui = document.getElementById("cui").value;
      email = document.getElementById("email").value;
      celular = document.getElementById("celular").value;
      direccion = document.getElementById("direccion").value;
      departamento = document.getElementById("departamento");
      idDepto = departamento.options[departamento.selectedIndex].value;
      municipio = document.getElementById("municipio");
      idMuni = municipio.options[municipio.selectedIndex].value;
      //postal = document.getElementById("postal");
      //idPostal = postal.options[postal.selectedIndex].value;
      etnia = document.getElementById("etnia");
      idEtnia= etnia.options[etnia.selectedIndex].value;
      idiomaMaterno = document.getElementById("idiomaMaterno");
      idIdiomaMaterno = idiomaMaterno.options[idiomaMaterno.selectedIndex].value;
      segundoIdioma = document.getElementById("segundoIdioma");
      idSegundoIdioma = segundoIdioma.options[segundoIdioma.selectedIndex].value;
      discapacidad = document.getElementById("discapacidad");
      idDiscapacidad = discapacidad.options[discapacidad.selectedIndex].value;

      //if(cui.length == 0){
        //$('#confirm-submit').modal("hide");
        //return document.getElementById("cuiErr").innerHTML="CUI obligatorio";
      if(email.length == 0){
        $('#confirm-submit').modal("hide");
        return document.getElementById("emailErr").innerHTML="Correo obligatorio";
      }else if(celular.length == 0){
        $('#confirm-submit').modal("hide");
        return document.getElementById("celularErr").innerHTML= "Celular obligatorio";
      }else if (direccion.length == 0){
        $('#confirm-submit').modal("hide");
        return document.getElementById("direccionErr").innerHTML= "Dirección obligatoria";
      }else if (!validarCorreo()){
        $('#confirm-submit').modal("hide");
        return document.getElementById("emailErr").innerHTML="Correo invalido";
      }else{
        $('#datos-personales').submit();
      }
    });

    function function_perfil_imagen(e)
    {

      if(e.files && e.files[0])
      {

        if (e.files[0].type.match('image/jpeg')) {

          var reader=new FileReader();


          reader.onload=function(e) {
                    document.getElementById("fotoSubida").innerHTML="<br/><img  height='200px' src='"+e.target.result+"'>";

          }

          reader.onerror=function(e) {
            document.getElementById("fotoSubida").innerHTML="Error de lectura";
          }

          reader.readAsDataURL(e.files[0]);
        }else{
          console.log(e.files[0].type);
          document.getElementById("fotoSubida").innerHTML="Error al cargar al vista previa el archivo no es un formato de imagen valido";
        }

      }

    }

    // Actualizar foto

    function  updateImage(e){
        if(e.files && e.files[0]){
            //Verificar que sea una imagen JPG
            if(e.files[0].type.match('image/jpeg')){
                //Verificar que su tamaño maximo sea 1MB
                if(e.files[0].size <= 1000000 ){
                    let reader = new FileReader();
                    reader.onload = function(ee){
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
                                formData.append('foto',e.files[0])
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
                                        document.getElementById('foto_md5').src = ee.target.result
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
                    }

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
        $("#foto").click()
    }

    function validarCorreo() {
      const email = document.getElementById("email").value;
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return regex.test(email);
    }

  </script>
@endsection
