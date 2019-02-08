/* Add here all your JS customizations */
$(document).ready(function () {

    var URL = $("#urlRoot").val();

    $('#summernote').summernote({
        height: 250, 
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']]
        ]
    });

    $("#direccion").change(function () {

        var id_direccion = $(this).val();
        var controller = URL + "Unidades/listarPorDireccion";

        $.post(controller, {id_direccion: id_direccion}, function (responsetext) {
            $("#unidad").html(responsetext);
        });
    });

    $("#tags-input-multiple").change(function () {
        var tag = $(this).val();
        $("#tag").val(tag);
    });

    $("#plantillas").on('click', '#btn-plan1', function () {

        var texto = $("#txt-plan1").html();
        //$("#MsgPlantilla").html(texto);    
        $('#summernote').summernote('code', texto);
    });

    $("#plantillas").on('click', '#btn-plan2', function () {

        var texto = $("#txt-plan2").html();
        //$("#MsgPlantilla").html(texto);    
        $('#summernote').summernote('code', texto);
    });

    $("#plantillas").on('click', '#btn-plan3', function () {

        var texto = $("#txt-plan3").html();
        //$("#MsgPlantilla").html(texto);    
        $('#summernote').summernote('code', texto);
    });

});