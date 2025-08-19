<div class="modal fade" id="modalInfoTramites" tabindex="-1" role="dialog" aria-labelledby="modalInfoTramitesTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 align="center-content" class="modal-title" id="modalInfoTramites">Trámites</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div align="center">

 <div class="row">

            {{-- Equivalencias --}}


            {{-- Incorporaciones --}}

            <div class="info-card-a    col-xs-6  col-md-2">
<br/><br/>
                <div class="center-content">
                    <a href="https://registro.usac.edu.gt/inscripcionenlinea/" >


                        <img alt="Responsive image" src="{{ asset('img/2.3primeringreso.png') }}"/>

                    </a>
                </div>
            </div>

            <div class="info-card-b   col-xs-6  col-md-2">
<br/><br/>
                <div class="center-content">
                    <a href="" id="mostrarReingreso">    

                        <img alt="Responsive image" src="{{ asset('img/2.2reingreso.png') }}"/>
                    </a>
                </div>
            </div>



            <div class="info-card-c    col-xs-6  col-md-2">
<br/><br/>
                <div class="center-content">
                    <a href="https://registro.usac.edu.gt/inscripcion_peg/">

                        <img alt="Responsive image"
src="{{ asset('img/2.1matriculaconsolidada.png') }}"/>

                    </a>
                </div>
            </div>
             <div class="info-card-d    col-xs-6  col-md-2">
<br/><br/>
                <div class="center-content">
<a href="https://registro.usac.edu.gt/index.php?posg=1">

                        <img alt="Responsive image" src="{{ asset('img/2.4_postgrado.png') }}"/>

                    </a>
                </div>
            </div>

            <div class="info-card-a  col-xs-6  col-md-2">
<br/><br/>
                <div class="center-content">
                    <a href="" data-bs-dismiss="modal" data-toggle="modal" data-target="#modalInfoArchivo" >

                        <img alt="Responsive image" src="{{ asset('img/2.6_archivo.png') }}"/>

                    </a>
                </div>
            </div>

           <div class="info-card-b col-xs-6  col-md-2">
<br/><br/>
                <div class="center-content">

                   <a href="" data-bs-dismiss="modal" data-toggle="modal" data-target="#modalInfoEquivalencias" >
<p>
                        <img alt="Responsive image" src="{{ asset('img/2.5_equivalencias.png') }}"/></p>

                    </a>
                </div>
            </div>

            {{-- Títulos --}}


            {{-- Formularios --}}

        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById("mostrarReingreso").addEventListener("click",function (e){
    e.preventDefault();
    $("#modalInfoTramites").modal("toggle");
    $("body").removeClass("modal-open");
    $("#modalInfoReingreso").modal();
})
</script>