<div class="modal fade" id="modalInfoUsac" tabindex="-1" role="dialog" aria-labelledby="modalInfoUsacTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoUsac">Preinscripción 2021</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div align="center">

 <div class="row">

            <div class="info-card-a    col-sm">
<br/><br/>
                <div class="center-content">
                    <a href="https://registro.usac.edu.gt/inscripcionenlinea/" >


                        <img alt="Responsive image" src="{{ asset('img/2.3primeringreso.png') }}"/>
                        <span>Inscripción</span>

                    </a>
                </div>
            </div>

            <div class="info-card-b   col-sm">
<br/><br/>
                <div class="center-content">
                    <a href="" id="mostrarPreinscripcion">    

                        <img alt="Responsive image" src="{{ asset('img/preinscripcion.png') }}"/>
                        <span>Preinscripción</span>
                    </a>
                </div>
            </div>
            Títulos
            Formularios
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
    document.getElementById("mostrarPreinscripcion").addEventListener("click",function (e){
    e.preventDefault();
    $("#modalInfoUsac").modal("toggle");
    $("body").removeClass("modal-open");
    $("#modalInfoPreinscripcion").modal("toggle");
})
</script>