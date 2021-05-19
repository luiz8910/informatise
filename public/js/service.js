$(function (){

    var width = document.getElementById("name").clientWidth;

    if(getWidth() < 768)
        width = getWidth() / 1.171875;

    $(".img-preview").css('max-width', width);

    $("#editor1").summernote({
        //width: getWidth() / 2.915625,
        width: width,
        height: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    $("#btn_submit").submit(function (e){
        if($("#preview_img")[0].src == "")
        {
            e.preventDefault();
            sweet_alert_error('Faça upload de uma imagem');
        }

    });
});
