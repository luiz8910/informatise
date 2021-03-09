$(function (){


});

function save()
{

    var action = $("#form").attr('action');

    if(action.search('/faq/1') != -1)

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
        text: 'Você deseja excluir esta pergunta?',
        button: 'Excluir',
        success_msg: 'A pergunta foi excluída com sucesso',
        reload: true,
        id: $id
    };


    var ajax = {
        url: '/faq/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}
