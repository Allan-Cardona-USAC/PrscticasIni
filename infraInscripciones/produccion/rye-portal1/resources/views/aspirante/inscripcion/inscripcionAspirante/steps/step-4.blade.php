<div class="container mt-4">
    <!-- Informacion Personal -->
    <div class="card">
        <div class="card-header" style="background-color: #006994; color:white">
            <h6>Informaci&oacute;n Personal</h6>
        </div>

        <div class="card-body ">
            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">

                        <img src = "{{$pathUrl}}" 
                            alt="Recargue la Página"
                            class="card-img-top"  id="fotoInformacion" alt="Fotografia Pendiente"
                            style="width:10rem; height:13rem; margin:auto;">

                    </div>
                </div>

                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">N.O.V</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $nov }}
                        </div>
                    </div>
                    <hr class="mt-2 mb-2 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">Fecha de Nacimiento</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $aspirante['fecha_nacimiento'] }}
                        </div>
                    </div>
                    <hr class="mt-2 mb-2 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">G&eacute;nero</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $aspirante['genero'] }}
                        </div>
                    </div>
                    <hr class="mt-2 mb-2 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">Departamento</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $aspirante['departamento'] }}
                        </div>
                    </div>
                    <hr class="mt-2 mb-2 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">Municipio</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $aspirante['municipio'] }}
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-2 mb-2 ">
            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            <h6 class="mb-0 ">Nombre Completo</h6>
                        </div>
                        <div class="col-sm-9 col-lg-9 align-self-center">
                            {{ $aspirante['nombre'] }}
                        </div>
                    </div>
                </div>

                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            <h6 class="mb-0 ">CUI</h6>
                        </div>
                        <div class="col-sm-9 col-lg-9 align-self-center">
                            {{ $aspirante['cui'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Carrera  -->


    <div class="card mt-2">
        <div class="card-header" style="background-color: #006994; color:white">
            <h6>Carrera</h6>
        </div>

        <div class="card-body ">
            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            <h6 class="mb-0 ">Facultad</h6>
                        </div>
                        <div class="col-sm-9 col-lg-9  align-self-center">
                            {{ $aspirante['facultad'] }}
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-2 mb-2 ">

            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">Carrera</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $aspirante['carrera'] }}
                        </div>
                    </div>
                </div>

                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-4 align-self-center">
                            <h6 class="mb-0 ">Extensi&oacute;n</h6>
                        </div>
                        <div class="col-sm-8 col-lg-8  align-self-center">
                            {{ $aspirante['extension'] }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Pruebas Basicas  -->
    <div class="card mt-2">
        <div class="card-header" style="background-color: #006994; color:white">
            <h6>Pruebas B&aacute;sicas</h6>
        </div>

        <div class="card-body ">
            @if (!$aspirante['flagPCB'])
                @foreach ($aspirante['pcb'] as $carrera)
                    <div class="col mt-2 mt-md-0 ">
                        <div class="row pt-2 pl-2 d-flex">
                            <div class="col-sm-4 align-self-center">
                                <h6 class="mb-0 ">{{$carrera}}</h6>
                            </div>
                            <div class="col-sm-8 col-lg-8 align-self-center">
                                Satisfactorio
                            </div>
                        </div>
                    </div>
                    <hr class="mt-2 mb-2 ">
                @endforeach
            @else
                <div>
                    No tiene pruebas de conocimiento b&aacute;sico para esta carrera
                </div>
            @endif

        </div>
    </div>


     <!-- Pruebas Especificas  -->
    <div class="card mt-2">
        <div class="card-header"  style="background-color: #006994; color:white">
            <h6>Pruebas Específicas</h6>
        </div>

        <div class="card-body ">
            @if (is_string($aspirante['pruebasEspecificas']))
                <div>
                    {{$aspirante['pruebasEspecificas']}}
                </div>
            @else
                <div>
                    Pruebas Específicas Satisfactorias
                </div>
            @endif

        </div>
    </div>
    @if (!is_string($aspirante['pruebasEspecificas']))
        <div class="row justify-content-center">
            <div class=" col-md-3 justify-content-center mt-3">
                <button type="button" class="btn btn-success btn-block" style="background-color: #006994" id="buttonContinuarStep5" onclick="continuarStep5()">Continuar</button>
            </div>
        </div>
    @endif
</div>

<script>

    function continuarStep5() {
        $('#multistepform').smartWizard('nextStep');
    }

</script>
