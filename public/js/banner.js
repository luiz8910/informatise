$(function (){

    var width = document.getElementById("subtitle").clientWidth;

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

function save()
{
    var action = $("#form").attr('action');

    if(action.search('/banner/1') != -1)

        $("#btn_submit").trigger('click');

    else{
        $("#form").attr('action', action + '/1');

        $("#btn_submit").trigger('click');
    }

}

function destroy($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir este banner?',
        button: 'Excluir',
        success_msg: 'O banner foi excluído com sucesso',
        reload: true,
        id: $id
    };


    var ajax = {
        url: '/banner/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}
