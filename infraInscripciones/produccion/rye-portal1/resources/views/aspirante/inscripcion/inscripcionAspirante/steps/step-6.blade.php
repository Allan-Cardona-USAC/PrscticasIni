<div class="container ">

    @switch($estado)
        @case(0)

            @break
        @case(1)
            <div class="alert alert-warning mt-2 w-100" role="alert">
                <ion-icon name="alert-circle-outline" style="font-size: 64px; color:#F1AC0E; vertical-align: middle"></ion-icon> 
                Despu&eacute;s de realizar el pago de Inscripci&oacute;n, dentro de 48 horas deber&aacute; Ingresar al portal para <strong>Descargar su Constancia de Inscripci&oacute;n</strong> 
            </div>
            @break
        @default
            <div class="alert alert-danger mt-2 w-100" role="alert">
                {{$mensajeError}}
            </div>
    @endswitch


    <div class="card ">
        <div class="card-header"  style="background-color: #006994; color:white">
            <h3>
                @switch($estado)
                    @case(0)
                        <i class="fa fa-money"></i> Generar Boleta de Pago
                    @break
                    @case(1)
                        <i class="fa fa-download"></i> Descargar Boleta de Pago
                    @break
                    @default
                        <i class="fa fa-exclamation-triangle"></i> Error
                @endswitch
            </h3>
        </div>

        <div class="card-body">
            <!-- Ciclo y Carnet -->
            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            <h6 class="mb-0 ">Ciclo</h6>
                        </div>
                        <div class="col-sm-9 col-lg-9 align-self-center">
                            {{ $ciclo->ciclo_web_pregrado }}
                        </div>
                    </div>
                </div>
                @if (isset($carnet))
                    <div class="col mt-2 mt-md-0 ">
                        <div class="row pt-2 pl-2 d-flex  ">
                            <div class="col-sm-3 align-self-center">
                                <h6 class="mb-0 ">Registro Acad&eacute;mico </h6>
                            </div>
                            <div class="col-sm-9 col-lg-9 align-self-center">
                                @if($carnet == -2 ) 
                                    Sin carn&eacute; disponible
                                @elseif($carnet == -1)
                                    Error de &aacute;rea
                                @elseif($carnet == 0)
                                    Sin Generar Carn&eacute;
                                @else
                                    {{ $carnet }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <hr class="mt-2 mb-2 ">

            <!-- NOV Y CUI -->
            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            <h6 class="mb-0 ">N.O.V</h6>
                        </div>
                        <div class="col-sm-9 col-lg-9 align-self-center">
                            {{ $nov }}
                        </div>
                    </div>
                </div>
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            @if (Auth::guard('aspirante')->user()->esExtranjero())
                                <h6 class="mb-0 ">Pasaporte</h6>
                            @else
                                <h6 class="mb-0 ">CUI</h6>
                            @endif

                        </div>
                        <div class="col-sm-9 col-lg-9 align-self-center">
                            {{ $aspirante['cui'] }}
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-2 mb-2 ">

            <!-- NOMBRE COMPLETO -->
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
            </div>
            <hr class="mt-2 mb-2 ">
            @if( $aspirante["dataCarrera"] != null)
                <!-- UNIDAD Y CARRERA -->
                <div class="row ">
                    <div class="col mt-2 mt-md-0 ">
                        <div class="row pt-2 pl-2 d-flex  ">
                            <div class="col-sm-4 align-self-center">
                                <h6 class="mb-0 ">Unidad Acad&eacute;mica</h6>
                            </div>
                            <div class="col-sm-8 col-lg-8 align-self-center">
                                {{ $aspirante['dataCarrera']->idUA }} - {{ $aspirante['facultad'] }}
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 mt-md-0 ">
                        <div class="row pt-2 pl-2 d-flex  ">
                            <div class="col-sm-3 align-self-center">
                                <h6 class="mb-0 ">Carrera</h6>
                            </div>
                            <div class="col-sm-9 col-lg-9 align-self-center">
                                {{ $aspirante['dataCarrera']->idCar }} - {{ $aspirante['carrera'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-2 mb-2 ">

                <!-- EXTENSION -->
                <div class="row ">
                    <div class="col mt-2 mt-md-0 ">
                        <div class="row pt-2 pl-2 d-flex  ">
                            <div class="col-sm-3 align-self-center">
                                <h6 class="mb-0 ">Extensi&oacute;n</h6>
                            </div>
                            <div class="col-sm-9 col-lg-9 align-self-center">
                                {{ $aspirante['dataCarrera']->idExt }} - {{ $aspirante['extension'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-2 mb-2 ">
            @endif
            <!-- ESTADO -->
            <div class="row ">
                <div class="col mt-2 mt-md-0 ">
                    <div class="row pt-2 pl-2 d-flex  ">
                        <div class="col-sm-3 align-self-center">
                            <h6 class="mb-0 ">Estado</h6>
                        </div>
                        <div class="col-sm-9 col-lg-9 align-self-center">
                            @switch($estado)
                                @case(0)
                                    Pendiente de Generar Boleta
                                @break
                                @case(1)
                                    Pendiente de Pagar Matr&iacute;cula
                                @break
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Card -->
    @switch($estado)
        @case(0)
            <form action="{{ route('Aspirante.Inscripcion.GenerarBoleta') }}" method="post" target="_blank">
                @csrf
                <input type="hidden" id="idFacultad" name="idFacultad" value="{{ $aspirante["dataCarrera"]->idUA }}">
                <input type="hidden" id="idExtension" name="idExtension" value="{{ $aspirante["dataCarrera"]->idExt }}">
                <input type="submit" class="btn btn-primary btn-lg btn-block mt-2" style="background-color: #006994" value="Generar boleta"  onclick="generarBoleta()">
            </form>
        
        @break
        @case(1)
            <form action="{{ route('Aspirante.Inscripcion.GenerarBoleta') }}" method="post" target="_blank">
                @csrf
                <input type="hidden" id="idFacultad" name="idFacultad" value="{{ $aspirante["dataCarrera"]->idUA }}">
                <input type="hidden" id="idExtension" name="idExtension" value="{{ $aspirante["dataCarrera"]->idExt }}">
                <input type="submit" class="btn btn-primary btn-lg btn-block mt-2" style="background-color: #006994" onclick="generarBoleta()" value="Generar boleta">
            </form>

            <div class="alert alert-warning mt-2 w-100" role="alert">
                <div class="row justify-content-center">
                    Si se venci&oacute; su boleta al Generar Boleta autom&aacute;ticamente se generara una nueva
                </div>
            </div>
        @break
        @default
            <button type="button" class="btn btn-primary btn-lg btn-block mt-2 disabled">Error</button>
            
    @endswitch


</div>

<script>

    function continuarStep5() {
        $('#multistepform').smartWizard('nextStep');
    }
    
</script>
