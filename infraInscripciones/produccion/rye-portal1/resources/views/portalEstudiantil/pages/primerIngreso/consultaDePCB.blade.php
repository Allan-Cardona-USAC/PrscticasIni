
<div class="modal fade" id="modalPruebasAprobadas" tabindex="-1" role="dialog" aria-labelledby="modalPruebasAprobadasTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPruebasAprobadasTitle">Pruebas Aprobadas</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="overflow-y: auto;">
                <h1>Pruebas Básicas</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Prueba</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($basicos as $basico)
                        <tr>
                            <td>{{ $basico->nombre }}</td>
                            <td>Aprobado</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <h1>Pruebas Especificas</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Centro Universitario/Unidad Academica</th>
                        <th>Extension</th>
                        <th>Carrera</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($especificos as $especifico)
                        <tr>
                            <td>{{ $especifico->unidadAcademica }}</td>
                            <td>{{ $especifico->extension }}</td>
                            <td>{{ $especifico->carrera }}</td>
                            <td>Aprobado</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
