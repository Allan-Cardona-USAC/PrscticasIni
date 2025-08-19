<div>
    <table class="table table-hover table-striped" id="centrosUniversitarios">
        <thead>
        <tr>
            <th>#</th><th>Centro Universitario o Región</th><th> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($lugaresDeEstudio as $key => $lugar)
            @if(strtolower($key) == 'campus central')
                <tr class="table-success">
            @else
                <tr>
            @endif

                {{-- Número de opcion, la variable loop sale de la nada --}}
                <td>{{ $loop->iteration }}</td>

                {{-- Nombre del Centro Universitario --}}
                <td>{{ $key }}</td>
                <td>
                    <a href="#" title="View facultad">
                        {{-- sw-btn-next pasa al siguiente formulario al darle click al boton --}}
                        <button class="btn btn-info btn-sm" onclick="paso2('{{ $key }}')">Seleccionar</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
function cargando() {
    $("#carga").animate({ "opacity": "1" }, 1000, function () { $("#carga").css("display", "Block"); });

}

function cerrar() {
    $("#carga").animate({ "opacity": "0" }, 1000, function () { $("#carga").css("display", "none"); });
}
   
</script>
