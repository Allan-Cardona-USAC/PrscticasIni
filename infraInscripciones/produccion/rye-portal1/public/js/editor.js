(function() {
                    
    var content = "<h1>Aqui</h1><small>va</small><br><p>código html así bien prron</p>";

            
    var $sumNote = $("#ta-1")
            .summernote({
                callbacks: {
                    onPaste: function(e, x, d) {
                        $sumNote.code(($($sumNote.code()).find("font").remove()));
                    }
                },

                dialogsInBody: true,
                dialogsFade: true,
                disableDragAndDrop: true,
                height: "150px", // <-- Ajustar altura del editor aquí
                tableClassName: function() {
                    alert("tbl");
                    $(this)
                        .addClass("table table-bordered")

                        .attr("cellpadding", 0)
                        .attr("cellspacing", 0)
                        .attr("border", 1)
                        .css("borderCollapse", "collapse")
                        .css("table-layout", "fixed")
                        .css("width", "100%");

                    $(this)
                        .find("td")
                        .css("borderColor", "#ccc")
                        .css("padding", "4px");
                }
            })
            .data("summernote");

    
    $("#btn-get-content").on("click", function() {
        var y =$($sumNote.code());

        console.log(y[0]);console.log(y.find("p> font"));
        var x = y.find("font").remove();
        $("#content").text($("#ta-1").val());
    });

    
    $("#btn-get-text").on("click", function() {
        $("#content").html($($sumNote.code()).text());
    });

    
    $("#btn-set-content").on("click", function() {
        $sumNote.code(content);
    });

    
    $("#btn-reset").on("click", function() {
        $sumNote.reset();
        $("#content").empty();
    });
})();

