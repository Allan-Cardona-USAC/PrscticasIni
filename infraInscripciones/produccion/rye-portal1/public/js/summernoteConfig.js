var editSummernote = function() {
    $('#summernote').summernote({focus: true});
    var btn = document.getElementById("btnSummernote");
    btn.className = "btn btn-sm btn-success";
    btn.value = "Guardar";
    btn.onclick = saveSummernote;
    console.log("funcion editar");
};

var saveSummernote = function() {
    $('.contenidoEditable').empty();
    guardarContenido();
    $('#summernote').summernote('destroy');
    var btn = document.getElementById("btnSummernote");
    btn.className = "btn btn-sm btn-info";
    btn.value = "Vista Previa";
    btn.onclick = editSummernote;
    console.log("funcion guardar");
};

function guardarContenido(){
    $('#summernote').summernote({focus: true});
    document.getElementById("contenido").value = $('.contenidoEditable').summernote('code');
}